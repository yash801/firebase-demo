importScripts('https://www.gstatic.com/firebasejs/7.14.6/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.14.6/firebase-messaging.js');

var firebaseConfig = {

    apiKey: "AIzaSyA4wmiZypmGlrMvzIWBnUq9VT9ypxRUhK0",
    authDomain: "my-pro-1-93fdc.firebaseapp.com",
    databaseURL: "https://my-pro-1-93fdc.firebaseio.com",
    projectId: "my-pro-1-93fdc",
    storageBucket: "my-pro-1-93fdc.appspot.com",
    messagingSenderId: "263618971890",
    appId: "1:263618971890:web:d70fe73b0821523e66e86b",
    measurementId: "G-ZCC2ZBNFWK"
};

firebase.initializeApp(firebaseConfig);
const messaging=firebase.messaging();

messaging.setBackgroundMessageHandler(function (payload) {
    console.log(payload);
    const notification=JSON.parse(payload);
    const notificationOption={
        body:notification.body,
        icon:notification.icon
    };
    return self.registration.showNotification(payload.notification.title,notificationOption);
});