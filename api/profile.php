<?php
session_start();
require "../config/conn.php";
require "../src/lib/Database.php";
require "../src/helpers/Format.php";
require "../src/classes/User.php";
require "../src/classes/Blog.php";

$db = new Database();

if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    $name = $_SESSION['name'];
}else{
    $id ='';
    $name='';
}

/**
 * Fetching Profile Data
 */
if(isset($_REQUEST['username'])){
    $username = Format::Stext($_REQUEST['username']);

    //fetching profile data
    $profileArray = array();

    if(getUserByName($username)){

        if($name == $username){
            //for logged user
            $profileArray[] = array(
                "username" => getUserByName($username),
                "useremail" => getEmailByName($username),
                "userimage" => getImageByName($username),
                "job" => getUserJobByName($name),
                "answer" => getAnswerCount($id),
                "question" => getQuestionCount($id),
                "follower" => getFollowerCount($id),
                "following" => getFollowingCount($id),
                "loggedUser" => true
            );

            echo json_encode($profileArray);

        }else{
            //for anyone profile
            $profileArray[] = array(
                "username" => getUserByName($username),
                "user_id" => getUIDByName($username),
                "useremail" => getEmailByName($username),
                "userimage" => getImageByName($username),
                "job" => getUserJobByName($username),
                "answer" => getAnswerCountByName($username),
                "question" => getQuestionCountByName($username),
                "follower" => getFollowerCount(getUIDByName($username)),
                "following" => getFollowingCount(getUIDByName($username)),
                "isFollowed" => isFollowed($id, getUIDByName($username)),
                "loggedUser" => false
            );
            echo json_encode($profileArray);
        }

    }else{
        $profileArray[] = array(
            "error" => "Result not found"
        );

        echo json_encode($profileArray);
    }

}



/**
 * Fetching Answer Data
 */
if(isset($_REQUEST['answer'])){
    $username = Format::Stext($_REQUEST['answer']);

    $yourAnswer = $db->select("SELECT * FROM answer WHERE user_name='$username' ");
    $AnswerArray = array();

    if(getUserByName($username)){

        if($name == $username){
            //for logged user
            if($yourAnswer){
                foreach ($yourAnswer as $asnwer) {
                
                    $AnswerArray[] = array(
                        "post_title" => getPostById($asnwer['post_id'])['post_title'],
                        "postid" => $asnwer['post_id'],
                        "ans_id" => $asnwer['ans_id'],
                        "loggedUser" => true
                    );

                }
                echo json_encode($AnswerArray);
            }

        }else{
            $yourAnswer = $db->select("SELECT * FROM answer WHERE user_name='$username' ");
            if($yourAnswer){
                foreach ($yourAnswer as $asnwer) {
                    //for anyone profile
                    $AnswerArray[] = array(
                        "post_title" => getPostById($asnwer['post_id'])['post_title'],
                        "postid" => $asnwer['post_id'],
                        "ans_id" => $asnwer['ans_id'],
                        "loggedUser" => false
                    );
                }

                echo json_encode($AnswerArray);
            }
        }

    }else{
        $AnswerArray[] = array(
            "error" => "Result not found"
        );

        echo json_encode($AnswerArray);
    }

}


/**
 * Fetching Question Data
 */
if(isset($_REQUEST['question'])){
    $username = Format::Stext($_REQUEST['question']);

    $yourQuestion= $db->select("SELECT * FROM post WHERE post_author='$username' AND visibility='Public' ");
    $AnswerArray = array();

    if(getUserByName($username)){

        if($name == $username){
            //for logged user
            if($yourQuestion){
                foreach ($yourQuestion as $question) {
                
                    $AnswerArray[] = array(
                        "post_title" => getPostById($question['post_id'])['post_title'],
                        "postid" => $question['post_id'],
                        "loggedUser" => true
                    );

                }
                echo json_encode($AnswerArray);
            }

        }else{
            $yourQuestion= $db->select("SELECT * FROM post WHERE post_author='$username' AND visibility='Public' ");
            if($yourQuestion){
                foreach ($yourQuestion as $question) {
            
                    //for anyone profile
                    $AnswerArray[] = array(
                        "post_title" => getPostById($question['post_id'])['post_title'],
                        "postid" => $question['post_id'],
                        "loggedUser" => false
                    );
                }
                echo json_encode($AnswerArray);
            }
        }

    }else{
        $AnswerArray[] = array(
            "error" => "Result not found"
        );

        echo json_encode($AnswerArray);
    }

}



/**
 * Fetching Follower Data
 */
if(isset($_REQUEST['follower'])){
    $username = Format::Stext($_REQUEST['follower']);

    $yourFollower= getFollower($id);
    $AnswerArray = array();

    if(getUserByName($username)){

        if($name == $username){
            //for logged user
            if($yourFollower){
                foreach ($yourFollower as $follower) {
                
                    $AnswerArray[] = array(
                        "follower_name" => getUserById($follower['sender_id']),
                        "loggedUser" => true
                    );

                }
                echo json_encode($AnswerArray);
            }

        }else{
            $yourFollower= getFollower(getUIDByName($username));
            if($yourFollower){
                foreach ($yourFollower as $follower) {
            
                    //for anyone profile
                    $AnswerArray[] = array(
                        "follower_name" => getUserById($follower['sender_id']),
                        "loggedUser" => false
                    );
                }
                echo json_encode($AnswerArray);
            }
        }

    }else{
        $AnswerArray[] = array(
            "error" => "Result not found"
        );

        echo json_encode($AnswerArray);
    }

}


/**
 * Fetching Following Data
 */
if(isset($_REQUEST['following'])){
    $username = Format::Stext($_REQUEST['following']);

    $yourFollower= getFollowing($id);
    $AnswerArray = array();

    if(getUserByName($username)){

        if($name == $username){
            //for logged user
            if($yourFollower){
                foreach ($yourFollower as $follower) {
                
                    $AnswerArray[] = array(
                        "following_name" => getUserById($follower['receiver_id']),
                        "loggedUser" => true
                    );

                }
                echo json_encode($AnswerArray);
            }

        }else{
            $yourFollower= getFollowing(getUIDByName($username));
            if($yourFollower){
                foreach ($yourFollower as $follower) {
            
                    //for anyone profile
                    $AnswerArray[] = array(
                        "following_name" => getUserById($follower['receiver_id']),
                        "loggedUser" => false
                    );
                }
                echo json_encode($AnswerArray);
            }
        }

    }else{
        $AnswerArray[] = array(
            "error" => "Result not found"
        );

        echo json_encode($AnswerArray);
    }

}



/**
 * Delete Answer Data
 */
if(isset($_REQUEST['delAnswer'])){
    $ans_id = Format::Stext($_REQUEST['delAnswer']);

    $del = deleteAnswer($id, $ans_id);

    $delAnswer = array();

    if($del){
        $delAnswer[] = array(
            "success" => "true"
        );

        echo json_encode($delAnswer);
    }else{
        $delAnswer[] = array(
            "success" => "false"
        );

        echo json_encode($delAnswer);
    }
}


?>