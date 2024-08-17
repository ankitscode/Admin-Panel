importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');

// Initialize Firebase in the service worker
firebase.initializeApp({
  apiKey: "AIzaSyCQGVw4BMn7ygPG50QoBpPX2jUk3tuEe4Y",
  authDomain: "laravel-subscription-503fa.firebaseapp.com",
  projectId: "laravel-subscription-503fa",
  storageBucket: "laravel-subscription-503fa.appspot.com",
  messagingSenderId: "689335395795",
  appId: "1:689335395795:web:dd795048359785b45bbb26",
  measurementId: "G-6G29ER351C"
});

const messaging = firebase.messaging();

// Handle background messages
messaging.onBackgroundMessage((payload) => {
  console.log('[firebase-messaging-sw.js] Received background message ', payload);
  const notificationTitle = 'Background Message Title';
  const notificationOptions = {
    body: 'Background Message body.',
    icon: '/firebase-logo.png'
  };

  self.registration.showNotification(notificationTitle, notificationOptions);
});
