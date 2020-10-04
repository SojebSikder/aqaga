<?php
session_start();
require "../config/conn.php";
require "../src/lib/Database.php";
require "../src/helpers/Format.php";
require "../src/classes/Blog.php";
require "../src/lib/ML/Tokenizer.php";

$db = new Database();

if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
}else{
    $id ='';
    $name='';
    $email ='';
}

/*

$text = "how to create a software";
$data = Tokenizer::parseGrammer($text);


foreach ($data as $key) {
 echo $key."<br>";
 //echo str_replace("how", "", $key);
}
*/

$form_data = json_decode(file_get_contents("php://input"));

if(isset($_SESSION['name'])){

    $postId = uniqid(true);
    $author = $name;
    $author_id = $id;
    $email = $email;
    $post_title = Format::Stext($form_data->question);
    $post_visibility = Format::Stext($form_data->visibility);

    $post_name = $post_title;
    $tag = $post_name;

    $sql =  "INSERT INTO post(post_id, post_title, post_author, author_id, post_name, post_status, visibility, post_tag) 
        VALUES('$postId', '$post_title', '$author', '$author_id', '$post_name', 'Publish', '$post_visibility', '$tag')";

    $result = $db->insert($sql);

    //inserting post info
    $postInfo = Tokenizer::parseGrammer($post_title);

    $keyword = '';
    foreach($postInfo as $key){   
        $number = $key;
        $keyword = $keyword.$number.","; //number separated by comma
    }
    $insertInfo = addToPostInfo($postId, $keyword, '');


    $data = array();

    if($result){

        $data[] = array(
            "success" => "post created"
        );
    }else{
        $data[] = array(
            "error" => "post not created"
        );
    }

    echo json_encode($data);
}else{
    $data[] = array(
        "error" => "please login first"
    );

    echo json_encode($data);
}

?>