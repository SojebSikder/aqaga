<?php
session_start();
require "../config/conn.php";
require "../src/lib/Database.php";
require "../src/helpers/Format.php";

$db = new Database();
$id= $_SESSION['id'];

if(!empty($_FILES)){
    $path = '../assets/images/profile/'.$_FILES['file']['name'];
    $name = "assets/images/profile/".$_FILES['file']['name'];

    if(move_uploaded_file($_FILES['file']['tmp_name'], $path)){
        
        $insert = $db->update("UPDATE users SET profile_image ='$name' WHERE user_id ='$id' ");
        if($insert){
            echo "profile uploaded";
        }else{
            echo "profile not uploaded";
        }
    }
}else{
    echo "something wrong";
}

?>