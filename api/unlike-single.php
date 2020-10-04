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
    $postid = $_REQUEST['postid'];
}

if(isset($_REQUEST['quesid'])){
    $qid = Format::Stext($_REQUEST['quesid']);
}

if($id){

    $dislike = unRating($id, $postid);

    //fetching answer
    $result = $db->select("SELECT * FROM answer WHERE post_id='$qid' ");
    $ansArray = array();

    if($result){
        while($row = $result->fetch_assoc()){

            $loggedUser = null;
            if($id == $row['user_id']){
                $loggedUser = true;
            }else{
                $loggedUser = false;
            }

            $ansArray[] = array(
                "ansid" => $row['post_id'],
                "author" => getUserById($row['user_id']),
                "answer" => $row['ans_description'],
                "user_id" => $row['user_id'],
                "ans_id" => $row['ans_id'],
                "user_image" => getImageByID($row['user_id']),
                "job" => getUserJobById($row['user_id']),
                "like" => getLikes($row['ans_id']),
                "dislike" => getDislikes($row['ans_id']),
                "isLiked" => userLiked($id, $row['ans_id']),
                "isDisliked" => userDisliked($id, $row['ans_id']),
                "isFollowed" => isFollowed($id, $row['user_id']),
                "isBookmark" => isBookmarkAdded($row['post_id'], $id),
                "comment" => getCommentCountByPostId($row['ans_id']),
                "date" => Format::formatDateNoTime($row['created_at']),
                "status" => "0",
                "loggedUser" => $loggedUser
            );
        }
        echo json_encode($ansArray);

    }else{
        $ansArray[] = array(
            "error" => "Result not found"
        );

        echo json_encode($ansArray);
    }
}
?>