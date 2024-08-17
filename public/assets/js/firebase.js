
           // Import the functions you need from the SDKs you need
           import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.5/firebase-app.js";
        import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.12.5/firebase-analytics.js";
        import { getMessaging, getToken } from "https://www.gstatic.com/firebasejs/10.12.5/firebase-messaging.js";

        // Your web app's Firebase configuration
        const firebaseConfig = {
            apiKey: "AIzaSyCQGVw4BMn7ygPG50QoBpPX2jUk3tuEe4Y",
            authDomain: "laravel-subscription-503fa.firebaseapp.com",
            projectId: "laravel-subscription-503fa",
            storageBucket: "laravel-subscription-503fa.appspot.com",
            messagingSenderId: "689335395795",
            appId: "1:689335395795:web:dd795048359785b45bbb26",
            measurementId: "G-6G29ER351C"
        };

        // Initialize Firebase
        const app = initializeApp(firebaseConfig);
        const analytics = getAnalytics(app);
        const messaging = getMessaging(app);

        // Get FCM token
        async function fetchToken() {
            try {
                const token = await getToken(messaging, { vapidKey: "BKagOny0KF_2pCJQ3m....moL0ewzQ8rZu" });
                if (token) {
                    console.log('FCM Token:', token);
                    // You can send this token to your server for further processing
                } else {
                    console.log('No registration token available. Request permission to generate one.');
                }
            } catch (error) {
                console.error('Error getting FCM token:', error);
            }
        }

        fetchToken();

