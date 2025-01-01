importScripts('https://www.gstatic.com/firebasejs/8.10.1/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.10.1/firebase-messaging.js');

// Firebase configuration (replace with your Firebase project settings)
 const firebaseConfig = {
            apiKey: "AIzaSyBApHvbMI0D-FChzr72DuSTW1tpoZ6cQ0U",
            authDomain: "vilab-dabf2.firebaseapp.com",
            projectId: "vilab-dabf2",
            storageBucket: "vilab-dabf2.firebasestorage.app",
            messagingSenderId: "601059128658",
            appId: "1:601059128658:web:4b6348f5daed6f84de368b"
        };

firebase.initializeApp(firebaseConfig);

const messaging = firebase.messaging();

// Background message handler
messaging.onBackgroundMessage(function (payload) {
    console.log('[firebase-messaging-sw.js] Received background message:', payload);

    const notificationTitle = payload.notification.title;
    const notificationOptions = {
        body: payload.notification.body,
        icon: payload.notification.icon,
    };

    return self.registration.showNotification(notificationTitle, notificationOptions);
});
