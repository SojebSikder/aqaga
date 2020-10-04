<?php

$db = new Database();

/**
 * Post Code
 */
function getPost(){
    global $db;
    $result = $db->select("SELECT * FROM post ORDER BY id DESC");

    if($result){
        return $result;
    }else{
        return "Cannot fetch data :(";
    }

}

function getAnswerByPostId($id){
    global $db;
    $result = $db->select("SELECT * FROM answer WHERE post_id='$id' ");

    return $result;
}


function getPostNameById($id){
    global $db;
    $result = $db->select("SELECT * FROM post WHERE post_id='$id'")->fetch_assoc();

    return $result['post_name'];
}

function getPostIdByAnsId($id){
    global $db;
    $result = $db->select("SELECT * FROM answer WHERE ans_id='$id'")->fetch_assoc();

    return $result['post_id'];
}

function getPostById($id){
    global $db;
    $result = $db->select("SELECT * FROM post WHERE post_id='$id' ORDER BY id DESC")->fetch_assoc();

    return $result;
}

function getPostByName($name){
    global $db;
    $result = $db->select("SELECT * FROM post WHERE post_author='$name' ORDER BY id DESC")->fetch_assoc();

    return $result;
}

function getLatestPost(){
    global $db;
    $result = $db->select("SELECT * FROM post ORDER BY id DESC LIMIT 2");

    return $result;
}

function getBlogCategory(){
    global $db;
    $result = $db->select("SELECT * FROM post_category");

    return $result;
}

function getBlogTagByPostId($id){
    global $db;
    $result = $db->select("SELECT * FROM post WHERE post_id='$id'");

    return $result->fetch_assoc()['blog_tag'];
}

function getBlogIdByBlogName($name){

    global $db;
    $result = $db->select("SELECT * FROM post WHERE post_name= '$name' ");
    
    if($result){
        $exe = $result->fetch_assoc();
        return $exe;
    }

}

//..........post info.........

function addToPostInfo($postid, $postkeyword, $postcategory){
    global $db;
    $sql = "INSERT INTO post_info(post_id, post_keywords, post_category) 
        VALUES('$postid', '$postkeyword', '$postcategory')";

    $result = $db->insert($sql);
}

function getAnswerCount($userid){
    global $db;
    $rs = $db->select("SELECT COUNT(*) AS total FROM answer WHERE user_id='$userid'");

    if($rs){
        $result = $rs->fetch_assoc()['total'];
        return $result;
    }
}

function getAnswerCountByName($username){
    global $db;
    $rs = $db->select("SELECT COUNT(*) AS total FROM answer WHERE user_name='$username'");

    if($rs){
        $result = $rs->fetch_assoc()['total'];
        return $result;
    }
}

function getQuestionCount($userid){
    global $db;
    $rs = $db->select("SELECT COUNT(*) AS total FROM post WHERE author_id='$userid' AND visibility='Public'");

    if($rs){
        $result = $rs->fetch_assoc()['total'];
        return $result;
    }
}

function getQuestionCountByName($username){
    global $db;
    $rs = $db->select("SELECT COUNT(*) AS total FROM post WHERE post_author='$username' AND visibility='Public'");

    if($rs){
        $result = $rs->fetch_assoc()['total'];
        return $result;
    }
}
//..........end post info......

//getting bookmark
function getBookmarkById($user_id){
    global $db;
    $sql = "SELECT * FROM user_bookmark WHERE user_id='$user_id' ORDER BY id DESC ";
    $result = $db->select($sql);

    if($result){
        return $result;
    }
}

function isBookmarkAdded($post_id, $user_id){
    global $db;
    $sql = "SELECT * FROM user_bookmark WHERE post_id='$post_id' AND user_id='$user_id' ";
    $result = $db->select($sql);

    if($result){
        return true;
    }else{
        return false;
    }
}

function deleteBookmarkByPostId($post_id, $user_id){
    global $db;
    $sql = "DELETE FROM user_bookmark WHERE post_id='$post_id' AND user_id='$user_id' ";
    $result = $db->delete($sql);

    if($result){
        return true;
    }else{
        return false;
    }
}
//end bookmark


//.........like and dislike...............

//do like and dislike
function doRating($userid, $postid, $like){
    global $db;
    $sql = "INSERT INTO rating_info(user_id, post_id, rating_action) VALUES('$userid', '$postid', '$like')";
    $rs = $db->insert($sql);

    if($rs){
        return true;
    }else{
        return false;
    }
}

//do like and dislike
function unRating($userid, $postid){
    global $db;
    $sql = "DELETE FROM rating_info WHERE user_id = '$userid' AND post_id = '$postid' ";
    $rs = $db->delete($sql);

    if($rs){
        return true;
    }else{
        return false;
    }
}

//get total number of likes for particular post
function getLikes($id){
    global $db;
    $rs = $db->select("SELECT COUNT(*) AS total FROM rating_info WHERE post_id='$id' AND rating_action='like'");

    if($rs){
        $result = $rs->fetch_assoc()['total'];
        return $result;
    }
}

//get total number of dislikes for a particular post
function getDislikes($id){
    global $db;
    $rs = $db->select("SELECT COUNT(*) AS total FROM rating_info WHERE post_id='$id' AND rating_action='dislike'");

    if($rs){
        $result = $rs->fetch_assoc()['total'];
        return $result;
    }
}

//check if user already likes post or not
function userLiked($id, $post_id){
    global $db;
    $sql = "SELECT * FROM rating_info WHERE user_id='$id' AND post_id='$post_id' AND rating_action='like' ";
    $rs = $db->select($sql);

    if($rs){

        if(mysqli_num_rows($rs) > 0){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
    
}

//check if user already dislikes post or not
function userDisliked($id, $post_id){
    global $db;
    $sql = "SELECT * FROM rating_info WHERE user_id='$id' AND post_id='$post_id' AND rating_action='dislike' ";
    $rs = $db->select($sql);

    if($rs){

        if(mysqli_num_rows($rs) > 0){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}


//..............end like and dislike...............


//user
// Receives a user id and returns the username
function getUsernameById($id)
{
    global $db;
    $result = $db->select("SELECT user_name FROM users WHERE user_id='$id' LIMIT 1");
    // return the username
    return $result->fetch_assoc()['user_name'];
}

/**
 * Comment Code
 */
function getCommentByPostID($id){
    global $db;
    $comments = $db->select("SELECT * FROM post_comments WHERE ans_id = '$id' ORDER BY created_at DESC ");
    
    if($comments){
        $result = $comments;
        return $result;
    }
}


function getCommentCountByPostId($id){
    global $db;
    $result = $db->select("SELECT COUNT(*) AS total FROM post_comments WHERE ans_id='$id' ");
    $data = $result->fetch_assoc();
    return $data['total'];
}

// Receives a comment id and returns the username
function getRepliesByCommentId($id)
{
    global $db;
    $result = $db->select("SELECT * FROM post_reply WHERE comment_id = '$id' ");
    $replies = $result;
    return $replies;
}
// Receives a post id and returns the total number of comments on that post
function getCommentsCountByPostId($post_id)
{
    global $db;
    $result = $db->select("SELECT COUNT(*) AS total FROM post_comments");
    $data = $result->fetch_assoc();
    return $data['total'];
}

function addComments($user_id, $post_id, $body){
    global $db;
    $comment_id = uniqid(true);
    
    $sql = "INSERT INTO post_comments(user_id, ans_id, body, comment_id, created_at, updated_at)
         VALUES('$user_id', '$post_id', '$body', '$comment_id', now(), null)";
    $result = $db->insert($sql);
    $replies = $result;

    if($replies){
        return true;
    }else{
        return false;
    }
    
}


function addReply($user_id, $body, $comment_id){
    global $db;
    $sql = "INSERT INTO post_reply(user_id, body, comment_id, created_at, updated_at)
         VALUES('$user_id', '$body', '$comment_id', now(), null)";
    $result = $db->insert($sql);
    $replies = $result;

    if($replies){
        return true;
    }else{
        return false;
    }
    
}


//check if user already posted answer or not
function isAnswered($user_id, $post_id){
    global $db;
    $sql = "SELECT * FROM answer WHERE user_id='$user_id' AND post_id='$post_id' ";
    $rs = $db->select($sql);

    if($rs){

        if(mysqli_num_rows($rs) > 0){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
    
}

//get total number of answer for particular post
function getAnswer($id){
    global $db;
    $rs = $db->select("SELECT COUNT(*) AS total FROM answer WHERE post_id='$id' ");

    if($rs){
        $result = $rs->fetch_assoc()['total'];
        return $result;
    }
}


/**
 * Following Code
 */
function follow($user_id, $post_owner_id){
    global $db;
    $follow_id = uniqid(true);
    $sql = "INSERT INTO follow(follow_id, sender_id, receiver_id) 
        VALUES('$follow_id', '$user_id', '$post_owner_id')";
    $result = $db->insert($sql);

    if($result){
        return true;
    }else{
        return false;
    }

}

//unfollow
function unfollow($user_id, $post_owner_id){
    global $db;
    $sql = "DELETE FROM follow WHERE sender_id ='$user_id' AND receiver_id='$post_owner_id' ";
    $result = $db->delete($sql);

    if($result){
        return true;
    }else{
        return false;
    }

}

//get follower count
function getFollowerCount($post_owner_id){
    global $db;
    $rs = $db->select("SELECT COUNT(*) AS total FROM follow WHERE receiver_id='$post_owner_id' ");

    if($rs){
        $result = $rs->fetch_assoc()['total'];
        return $result;
    }
}

//get following count
function getFollowingCount($user_id){
    global $db;
    $rs = $db->select("SELECT COUNT(*) AS total FROM follow WHERE sender_id='$user_id' ");

    if($rs){
        $result = $rs->fetch_assoc()['total'];
        return $result;
    }
}

//get follower
function getFollower($post_owner_id){
    global $db;
    $rs = $db->select("SELECT * FROM follow WHERE receiver_id='$post_owner_id' ");

    if($rs){
        $result = $rs;
        return $result;
    }
}

//get following
function getFollowing($user_id){
    global $db;
    $rs = $db->select("SELECT * FROM follow WHERE sender_id='$user_id' ");

    if($rs){
        $result = $rs;
        return $result;
    }
}

//check if user already posted answer or not
function isFollowed($user_id, $post_owner_id){
    global $db;
    $sql = "SELECT * FROM follow WHERE sender_id='$user_id' AND receiver_id='$post_owner_id' ";
    $rs = $db->select($sql);

    if($rs){

        if(mysqli_num_rows($rs) > 0){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
    
}


/**
 * Reset Database
 */
function deleteAnswer($user_id, $ans_id){
    global $db;
    $rs = $db->delete("DELETE FROM answer WHERE user_id='$user_id' AND ans_id='$ans_id' ");

    if($rs){
        deleteLike($ans_id);
        deleteComment($ans_id);
        return true;
    }else{
        return false;
    }

    
}

function deleteLike($ans_id){
    global $db;
    $rs = $db->delete("DELETE FROM rating_info WHERE post_id='$ans_id' ");

    if($rs){
        return true;
    }else{
        return false;
    }
}

function deleteComment($ans_id){
    global $db;
    $rs = $db->delete("DELETE FROM post_comments WHERE ans_id='$ans_id' ");

    if($rs){
        return true;
    }else{
        return false;
    }
}

function deleteCommentByCommentID($user_id, $commentid){
    global $db;
    $rs = $db->delete("DELETE FROM post_comments WHERE user_id='$user_id' AND comment_id='$commentid' ");

    if($rs){
        return true;
    }else{
        return false;
    }
}

?>