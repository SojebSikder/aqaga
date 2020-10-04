<?php
//for home page
session_start();
require "../config/conn.php";
require "../src/lib/Database.php";
require "../src/helpers/Format.php";
require "../src/classes/Blog.php";
require "../src/classes/User.php";

$db = new Database();

if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    $name = $_SESSION['name'];
}else{
    $id ='';
    $name='';
}



if($id){
    $data = array();

    $result = $db->select("SELECT * FROM notifications WHERE user_name='$name' ORDER BY id DESC");

    if($result){
        foreach ($result as $getNotification) {

            $data[] = array(
                "message" => $getNotification['message'],
                "from" => $getNotification['sentFrom'],
                "ref" => $getNotification['ref'],
                "type" => $getNotification['notification_type']
            );
            
        }
        echo json_encode($data);
    }
   
}
?>