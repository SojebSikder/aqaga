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

$result = $db->select("SELECT * FROM post ORDER BY id DESC");

$data = array();

if($result){
    while($row = $result->fetch_assoc()){
        $post_id = $row['post_id'];

        $data[] = array(
            "title" => $row['post_title'],
            "id" => $row['post_id'],
            "author" => $row['post_author'],
            "date" => $row['created_at'],
            "total" => getAnswer($post_id),
            "isAnswered" => isAnswered($id, $post_id)
        );

    }
}else{
    $data[] = array(
        "error" => "Result not found"
    );
}

echo json_encode($data);

?>