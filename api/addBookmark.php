<?php
session_start();
require "../config/conn.php";
require "../src/lib/Database.php";
require "../src/helpers/Format.php";
require "../src/classes/Blog.php";

$db = new Database();

if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
}else{
    $id ='';
}

if(isset($_SESSION['name'])){

    if(isset($_REQUEST['postid'])){

        $bookmarkid = uniqid(true);
        $post_id = Format::Stext($_REQUEST['postid']);

        $sql =  "INSERT INTO user_bookmark(user_id, bookmark_id, post_id) VALUES('$id', '$bookmarkid', '$post_id')";

        $result = $db->insert($sql);

        $data = array();

        if($result){
            $data[] = array(
                "success" => "bookmark added"
            );
        }else{
            $data[] = array(
                "error" => "bookmark not added"
            );
        }

        echo json_encode($data);
    }

    //delete bookmark
    if(isset($_REQUEST['delBookmark'])){

        $bookmarkid = uniqid(true);
        $post_id = Format::Stext($_REQUEST['delBookmark']);

        $result = deleteBookmarkByPostId($post_id, $id);
        $getBook = getBookmarkById($id);

        $data = array();

        if($result){

            if($getBook){
                foreach($getBook as $bookmark){

                    $data[] = array(
                        "bookmark_name" => getPostById($bookmark['post_id'])['post_title'],
                        "bookmark_postid" => $bookmark['post_id'],
                        "bookmark_id" => $bookmark['bookmark_id'],
                        "bookmark_status" => true,
                        "success" => "bookmark deleted"
                    );
                }
            }else{
                $data[] = array(
                    "success" => "bookmark deleted"
                );
            }

        }else{
            $data[] = array(
                "error" => "bookmark not deleted"
            );
        }

        echo json_encode($data);
    }
    //end delete bookmark


    //view bookmark
    if(isset($_REQUEST['action'])){

        $result = getBookmarkById($id);
        $data = array();

        if($result){

            foreach($result as $bookmark){

                $data[] = array(
                    "bookmark_name" => getPostById($bookmark['post_id'])['post_title'],
                    "bookmark_postid" => $bookmark['post_id'],
                    "bookmark_id" => $bookmark['bookmark_id'],
                    "bookmark_status" => true
                );
            }

        }else{
            $data[] = array(
                "error" => "bookmark not deleted"
            );
        }

        echo json_encode($data);
    }
    //end view bookmark


}else{
    $data[] = array(
        "error" => "please login first"
    );

    echo json_encode($data);
}

?>