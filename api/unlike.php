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
}else{
    $id ='';
}

if(isset($_REQUEST['postid'])){
    $postid = Format::Stext($_REQUEST['postid']);
}

if($id){

    $unlike = unRating($id, $postid);
    $data = array();

    $result = $db->select("SELECT * FROM post ORDER BY id DESC");

    $data = array();

    if($result){
        while($row = $result->fetch_assoc()){

            $post_id = $row['post_id'];

            $getAns = $db->select("SELECT * FROM answer WHERE post_id='$post_id' ");

            if($getAns){
                $getAnsExe = $getAns->fetch_assoc();
            
                $loggedUser = null;
                if($id == $getAnsExe['user_id']){
                    $loggedUser = true;
                }else{
                    $loggedUser = false;
                }
                $data[] = array(
                    "title" => $row['post_title'],
                    "id" => $row['post_id'],
                    "author" => getUserById($getAnsExe['user_id']),
                    "answer" => $getAnsExe['ans_description'],
                    "short_answer" => Format::textShorten($getAnsExe['ans_description'], 1000),
                    "ans_id" => $getAnsExe['ans_id'],
                    "user_id" => $getAnsExe['user_id'],
                    "user_image" => getImageByID($getAnsExe['user_id']),
                    "job" => getUserJobById($getAnsExe['user_id']),
                    "like" => getLikes(getAnswerByPostId($row['post_id'])->fetch_assoc()['ans_id']),
                    "dislike" => getDislikes(getAnswerByPostId($row['post_id'])->fetch_assoc()['ans_id']),
                    "isLiked" => userLiked($id, $getAnsExe['ans_id']),
                    "isDisliked" => userDisliked($id, $getAnsExe['ans_id']),
                    "isBookmark" => isBookmarkAdded($row['post_id'], $id),
                    "isFollowed" => isFollowed($id, $getAnsExe['user_id']),
                    "comment" => getCommentCountByPostId($getAnsExe['ans_id']),
                    "date" => Format::formatDateNoTime($row['created_at']),
                    "status" => "0",
                    "loggedUser" => $loggedUser
                );
            }else{
                $data[] = array(
                    "status" => "1"
                );
            }
        }
    }else{
        $data[] = array(
            "error" => "Result not found"
        );
    }

    echo json_encode($data);
}
?>