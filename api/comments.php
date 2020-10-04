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

$data = array();

//fetching comments
if(isset($_REQUEST['id'])){
    $postid = Format::Stext($_REQUEST['id']);

    $comments = getCommentByPostID($postid);

    if($comments){


        foreach ($comments as $comments ) {

        $loggedUser = null;
        if($id == $comments['user_id']){
            $loggedUser = true;
        }else{
            $loggedUser = false;
        }

            $data[] = array(
                "body" => $comments['body'],
                "author" => getUserById($comments['user_id']),
                "job" => getUserJobById($comments['user_id']),
                "user_image" => getImageByID($comments['user_id']),
                "ans_id" => $comments['ans_id'],
                "comment_id" => $comments['comment_id'],
                "comment" => getCommentCountByPostId($comments['ans_id']),
                "date" => Format::formatDateNoTime($comments['created_at']),
                "loggedUser" => $loggedUser,
                "status" => 0
            );
        }
        echo json_encode($data);
    }
}


//adding comments
if(isset($_REQUEST['addcomment'])){
    $postid = Format::Stext($_REQUEST['addcomment']);
    $body = Format::Stext($_REQUEST['body']);

    $addComments = addComments($id, $postid, $body);
    if($addComments){

        $comments = getCommentByPostID($postid);
        if($comments){

            foreach ($comments as $comments ) {

                $loggedUser = null;
                if($id == $comments['user_id']){
                    $loggedUser = true;
                }else{
                    $loggedUser = false;
                }

                $data[] = array(
                    "body" => $comments['body'],
                    "author" => getUserById($comments['user_id']),
                    "job" => getUserJobById($comments['user_id']),
                    "user_image" => getImageByID($comments['user_id']),
                    "ans_id" => $comments['ans_id'],
                    "comment_id" => $comments['comment_id'],
                    "comment" => getCommentCountByPostId($comments['ans_id']),
                    "date" => Format::formatDateNoTime($comments['created_at']),
                    "loggedUser" => $loggedUser,
                    "status" => 0
                );
            }

            sendNotification(getUserByAnsid($postid), $name, "", $postid, "comment");
            echo json_encode($data);
        }
    }
}


//delete comments
if(isset($_REQUEST['deletecomment'])){
    $commentid = Format::Stext($_REQUEST['deletecomment']);
    $postid = Format::Stext($_REQUEST['postid']);

    $deleteComments = deleteCommentByCommentID($id, $commentid);
    if($deleteComments){

        $comments = getCommentByPostID($postid);
        if($comments){

            foreach ($comments as $comments ) {

                $loggedUser = null;
                if($id == $comments['user_id']){
                    $loggedUser = true;
                }else{
                    $loggedUser = false;
                }

                $data[] = array(
                    "body" => $comments['body'],
                    "author" => getUserById($comments['user_id']),
                    "job" => getUserJobById($comments['user_id']),
                    "user_image" => getImageByID($comments['user_id']),
                    "ans_id" => $comments['ans_id'],
                    "comment_id" => $comments['comment_id'],
                    "comment" => getCommentCountByPostId($comments['ans_id']),
                    "date" => Format::formatDateNoTime($comments['created_at']),
                    "loggedUser" => $loggedUser,
                    "status" => 0
                );
            }

            sendNotification(getUserByAnsid($postid), $name, "", $postid, "comment");
            echo json_encode($data);
        }
    }
}




//adding reply


//fetching reply

?>