<?php
function sendNotification(){
    $url ="https://fcm.googleapis.com/fcm/send";

    $fields=array(
        "to"=>$_REQUEST['token'],
        "notification"=>array(
            "body"=>$_REQUEST['message'],
            "title"=>$_REQUEST['title'],
            "icon"=>$_REQUEST['icon'],
            "click_action"=>"https://google.com"
        )
    );

    $headers=array(
        'Authorization: key=AAAAPWDqSPI:APA91bFKCpDZRXD2eeezl84Vu4Ab5I7dmhjMFmgPhEryAGHwUzcibiziPEHL27IZqd3HYhvPQ1Z2kD5oG5yzsDjViqT2Be8SW8LB-ej97LDuYneSQxThSngdmME1knHh7TtcBfAyQt0W',
        'Content-Type:application/json'
    );

    $ch=curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_POST,true);
    curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($fields));
    $result=curl_exec($ch);
    print_r($result);
    curl_close($ch);
}
sendNotification();
//http://localhost/firebase/fbdemo6/send_notification.php?title=50%%20off&message=Diwali%20offer%2050%%20off%20pizza&token=eVhhfnXZB2LTGtRkizaE6N:APA91bFQCgiaid9u7DOEjFGvq_Gv-y5pkr2v8uOj3wx288ZPAoY3CWLoP2UhBNzvLCU0R-cEsZ4jLQ6Bh32pS_BDif1zeMLJiN91Xp_ifKhtWA0kxFn-RLvQlTIg0UEXPvzaxpho7sVC