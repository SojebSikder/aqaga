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


//fetching answer
if(isset($_REQUEST['id'])){
    $bid = Format::Stext($_REQUEST['id']);

    $result = getAnswerByPostId($bid);
    $ansArray = array();

    if($result){
        while($row = $result->fetch_assoc()){
            
            if($id == $row['user_id']){
            
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
                    "comment" => getCommentCountByPostId($row['ans_id']),
                    "isBookmark" => isBookmarkAdded($row['post_id'], $id),
                    "date" => Format::formatDateNoTime($row['created_at']),
                    "status" => "0",
                    "loggedUser" => true
                );
            }else{
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
                    "comment" => getCommentCountByPostId($row['ans_id']),
                    "isBookmark" => isBookmarkAdded($row['post_id'], $id),
                    "date" => Format::formatDateNoTime($row['created_at']),
                    "status" => "0",
                    "loggedUser" => false
                );
            }
        }
        echo json_encode($ansArray);

    }else{
        $ansArray[] = array(
            "error" => "Result not found"
        );

        echo json_encode($ansArray);
    }

}



//fetching answer by ans id for editing
if(isset($_REQUEST['edit'])){
    $bid = Format::Stext($_REQUEST['edit']);

    $result = $db->select("SELECT * FROM answer WHERE ans_id='$bid' ");
    $ansArray = array();

    if($result){
        while($row = $result->fetch_assoc()){
            
            if($id == $row['user_id']){
            
                $ansArray[] = array(
                    "title" => getPostById($row['post_id'])['post_title'],
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
                    "comment" => getCommentCountByPostId($row['ans_id']),
                    "isBookmark" => isBookmarkAdded($row['post_id'], $id),
                    "date" => Format::formatDateNoTime($row['created_at']),
                    "status" => "0",
                    "loggedUser" => true
                );
            }else{
                $ansArray[] = array(
                    "title" => getPostById($row['post_id'])['post_title'],
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
                    "comment" => getCommentCountByPostId($row['ans_id']),
                    "isBookmark" => isBookmarkAdded($row['post_id'], $id),
                    "date" => Format::formatDateNoTime($row['created_at']),
                    "status" => "0",
                    "loggedUser" => false
                );
            }
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