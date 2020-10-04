<?php
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

if(isset($_SESSION['name'])){

    $form_data = json_decode(file_get_contents("php://input"));

if(isset($form_data->id)){

    $isAnswer = isAnswered($id, Format::Stext($form_data->id));
    $data = array();

    if($isAnswer){
        $data = array(
            'success' => 'One person have right to one answer',
            'error' => 1
        );

        echo json_encode($data);
    }else{

        $allowedTag = '<p>,<u>,<b>,<i>,<ul>,<li>,<ol>,<img>,<a>,<div>,<br>';

        $ansID = uniqid(true);
        $author = $_SESSION['name'];
        $author_id =  $_SESSION['id'];
        $email = $_SESSION['email'];
        $postDescription = Format::Stext($form_data->answer, $allowedTag);
        $post_Id = Format::Stext($form_data->id);

        $sql = "INSERT INTO answer(user_name, user_id, ans_description, post_id, ans_id, ans_status) 
            VALUES('$author', '$author_id', '$postDescription', '$post_Id', '$ansID', 'Publish')";

        $result = $db->insert($sql);


        if($result){

            sendNotification(getUserByPostid($post_Id), $name, "", $post_Id, "answer");

            $data[] = array(
                "success" => "answer created"
            );
        }else{
            $data[] = array(
                "success" => "answer not created"
            );
        }

        echo json_encode($data);

    }
    
}



//For updating answer
if(isset($form_data->ansid)){

    $allowedTag = '<p>, <u>, <b>, <i>, <ul>, <li>, <ol>, <img>, <a>, <div>, <br>';


    $ansID = $form_data->ansid;
    $author = $_SESSION['name'];
    $author_id =  $_SESSION['id'];
    $email = $_SESSION['email'];
    $postDescription = Format::Stext($form_data->answer, $allowedTag);
    //$post_Id = Format::Stext($form_data->id);

    $sql = "UPDATE answer SET ans_description = '$postDescription' WHERE user_id ='$author_id' AND ans_id='$ansID' ";

    $result = $db->update($sql);

    $data = array();

    if($result){

        //sendNotification(getUserByPostid($post_Id), $name, "", $post_Id, "answer");

        $data[] = array(
            "success" => "answer updated"
        );
    }else{
        $data[] = array(
            "error" => "answer not updated"
        );
    }

    echo json_encode($data);
}




}else{
    $data[] = array(
        "error" => "please login first"
    );

    echo json_encode($data);
    }

?>