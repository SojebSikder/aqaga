<?php
session_start();
require "../config/conn.php";
require "../src/lib/Database.php";
require "../src/helpers/Format.php";
require "../src/classes/User.php";
require "../src/classes/Blog.php";
require "../src/lib/ML/Tokenizer.php";

$db = new Database();

if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    $name = $_SESSION['name'];
}else{
    $id ='';
    $name='';
}



//for post page only question
if(isset($_REQUEST['id'])){

    $bid = Format::Stext($_REQUEST['id']);
    $result = $db->select("SELECT * FROM post WHERE post_id ='$bid' ORDER BY id DESC");

    $data = array();

    if($result){
        while($row = $result->fetch_assoc()){

            $post_id = $row['post_id'];

            $getAns = $db->select("SELECT * FROM answer WHERE post_id='$post_id' ");

            if($getAns){
                $getAnsExe = $getAns->fetch_assoc();
            
                $data[] = array(
                    "title" => $row['post_title'],
                    "id" => $row['post_id'],
                    "author" => getUserById($getAnsExe['user_id']),
                    "answer" => $getAnsExe['ans_description'],
                    "user_id" => $getAnsExe['user_id'],
                    "date" => $row['created_at'],
                    "isBookmark" => isBookmarkAdded($row['post_id'], $id),
                    "status" => "0",
                    "isAnswered" => isAnswered($id, $post_id)
                );
            }else{
                $data[] = array(
                    "title" => $row['post_title'],
                    "id" => $row['post_id'],
                    "isBookmark" => isBookmarkAdded($post_id, $id),
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


/**
 * Getting releted questions
 */

 //for post page only question
if(isset($_REQUEST['reid'])){
    $id = Format::Stext($_REQUEST['reid']);

    //getting question metadata
    $questionMeta = $db->select("SELECT * FROM post WHERE post_id ='$id' ORDER BY id DESC")->fetch_assoc()['post_title'];

    $token = Tokenizer::getKeyword($questionMeta);
    
    $result = $db->select("SELECT * FROM post WHERE post_title REGEXP '$token[0]?' AND NOT post_id ='$id' ORDER BY id DESC");

    $data = array();

    if($result){
        while($row = $result->fetch_assoc()){

            $post_id = $row['post_id'];

            $getAns = $db->select("SELECT * FROM answer WHERE post_id='$post_id' ");

            if($getAns){
                $getAnsExe = $getAns->fetch_assoc();
            
                $data[] = array(
                    "title" => $row['post_title'],
                    "id" => $row['post_id'],
                    "author" => getUserById($getAnsExe['user_id']),
                    "answer" => $getAnsExe['ans_description'],
                    "user_id" => $getAnsExe['user_id'],
                    "date" => $row['created_at'],
                    "isBookmark" => isBookmarkAdded($row['post_id'], $id),
                    "status" => "0",
                    "isAnswered" => isAnswered($id, $post_id)
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