
const express = require('express');
const mysql = require('mysql');
const cors = require('cors');
const app = express();
const axios = require('axios');
const qr = require('qr-image');
const bodyParser = require('body-parser');
const port = 3000;

app.use(bodyParser.json());

const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'virtual_innovation_lab'
});

db.connect(err => {
    if (err) {
        throw err;
    }
    console.log('MySQL connected...');
});

// Use cors middleware
app.use(cors());

app.get('/courses', (req, res) => {
    const sql = 'SELECT * FROM Courses';
    db.query(sql, (err, results) => {
        if (err) throw err;
        res.json(results);
    });
});


app.get('/courses/:id', (req, res) => {
    const sql = 'SELECT * FROM Courses WHERE id = ?';
    db.query(sql, [req.params.id], (err, result) => {
        if (err) {
            console.error('Error executing query:', err);
            res.status(500).send('Server error');
            return;
        }
        if (result.length === 0) {
            res.status(404).send('Course not found');
        } else {
            res.json(result[0]);
        }
    });
});

// Endpoint to add course to user profile
app.get('/addCourseToProfile', (req, res) => {
    const { courseId, userId } = req.query;

    // Insert logic to add the course to the user's profile
    const sql = 'INSERT INTO user_courses (user_id, course_id) VALUES (?, ?)';
    db.query(sql, [userId, courseId], (err, result) => {
        if (err) {
            res.status(500).send('Error adding course to profile');
            return;
        }
        res.send('Course added to profile successfully');
    });
});


// Generate QR Code
app.get('/generate-qr', (req, res) => {
    const { amount } = req.query;
    const upiUrl = `upi://pay?pa=7355295772@ptsbi@upi&pn=Amar verma&am=${amount}&cu=INR&mode=02&purpose=00`;

    const qrImage = qr.image(upiUrl, { type: 'png' });
    res.type('png');
    qrImage.pipe(res);
});

// Handle payment POST request
app.post('/payment', (req, res) => {
    const { user_id, course_id, payment_method, amount, payment_id } = req.body;

    // Insert payment details into the payments table
    const paymentQuery = `
        INSERT INTO payments (user_id, course_id, payment_method, amount, payment_id)
        VALUES (?, ?, ?, ?, ?)
    `;
    db.query(paymentQuery, [user_id, course_id, payment_method, amount, payment_id], (err, result) => {
        if (err) {
            console.error('Error inserting payment details:', err);
            return res.status(500).send('Payment processing failed');
        }

        // Update user's profile with the new course
        const userProfileQuery = `
            UPDATE users
            SET courses = CONCAT(courses, ',', ?)
            WHERE id = ?
        `;
        db.query(userProfileQuery, [course_id, user_id], (err, result) => {
            if (err) {
                console.error('Error updating user profile:', err);
                return res.status(500).send('Failed to update user profile');
            }

            res.send('Payment successful and user profile updated');
        });
    });
});

// Poll for payment status (simulated)
app.get('/payment-status', (req, res) => {
    const { payment_id } = req.query;

    // Simulate payment verification
    // In a real application, you would verify payment status with Paytm or the UPI service
    setTimeout(() => {
        res.json({ status: 'success', payment_id });
    }, 5000); // Simulate 5 seconds delay for payment verification
});




app.listen(port, () => {
    console.log(`Server running on port ${port}`);
});
