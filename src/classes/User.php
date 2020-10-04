<?php
//include_once './lib/Database.php';
//include_once './helpers/Format.php';

$db = new Database();
$format = new Format();

//session_start();


//set session values
if(isset($_SESSION['name'])){
    $name = $_SESSION['name'];
    $id = $_SESSION['id'];
}else{
    $id='';
    $name='';
}

function getUserById($id){
    global $db;

    $result = $db->select("SELECT * FROM users WHERE user_id='$id' ");
    return $result->fetch_assoc()['user_name'];
}

function getUserByAnsid($id){
    global $db;

    $result = $db->select("SELECT * FROM answer WHERE ans_id='$id' ");
    return $result->fetch_assoc()['user_name'];
}

function getUserByPostid($id){
    global $db;

    $result = $db->select("SELECT * FROM post WHERE post_id='$id' ");
    return $result->fetch_assoc()['post_author'];
}

function getUserByName($id){
    global $db;

    $result = $db->select("SELECT * FROM users WHERE user_name='$id' ");
    return $result->fetch_assoc()['user_name'];
}

function getEmailByName($id){
    global $db;

    $result = $db->select("SELECT * FROM users WHERE user_name='$id' ");
    return $result->fetch_assoc()['user_email'];
}

function getUserJobById($id){
    global $db;

    $result = $db->select("SELECT * FROM users WHERE user_id='$id' ");
    return $result->fetch_assoc()['user_job'];
}

function getUserJobByName($id){
    global $db;

    $result = $db->select("SELECT * FROM users WHERE user_name='$id' ");
    return $result->fetch_assoc()['user_job'];
}


function getUserByEmail($email){
    global $db, $format;

    $result = $db->select("SELECT * FROM users WHERE user_email='$email' ");
    return $result->fetch_assoc()['user_name'];
}

function getUIDByEmail($email){
    global $db, $format;

    $result = $db->select("SELECT * FROM users WHERE user_email='$email' ");
    return $result->fetch_assoc()['user_id'];
}

function getUIDByName($name){
    global $db;

    $result = $db->select("SELECT * FROM users WHERE user_name='$name' ");
    return $result->fetch_assoc()['user_id'];
}

function getImageByID($id){
    global $db;

    $result = $db->select("SELECT * FROM users WHERE user_id='$id' ");

    if($result){
        return $result->fetch_assoc()['profile_image'];
    }else{
        return "No Photo";
    }
    
}

function getImageByName($id){
    global $db;

    $result = $db->select("SELECT * FROM users WHERE user_name='$id' ");

    if($result){
        return $result->fetch_assoc()['profile_image'];
    }else{
        return "No Photo";
    }
    
}


function getImageByEmail($email){
    global $db, $format;

    $result = $db->select("SELECT * FROM register WHERE user_email='$email' ");
    return $result->fetch_assoc()['user_image'];
}


function deleteAccountByEmail($email){
    global $db;

    $imageUrl = getImageByEmail($email);
    unlink($imageUrl);

    $result = $db->delete("DELETE FROM register WHERE user_email='$email' ");

    if($result){
        return true;
    }else{
        return false;
    }
}


//Send notification
function sendNotification($username, $sentFrom, $message, $ref, $type="info"){
    /**
     * message type: like, comment, someone give answer, report
     */
    if($username == $sentFrom){

    }else{
        global $db;
        $notification_id = uniqid(true);

        $query = "INSERT INTO notifications (user_name, ref, sentFrom, notification_type, message, status, created_at, notification_id)
            VALUES('$username', '$ref', '$sentFrom', '$type', '$message','unread',CURRENT_TIMESTAMP, '$notification_id')";
            
        $readup = $db->insert($query);
    }
}


?>