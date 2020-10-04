<?php
session_start();

require "../../config/conn.php";
require "../../src/lib/Database.php";
require "../../src/helpers/Format.php";
require "../../src/classes/User.php";
require "../../src/classes/Blog.php";
//set session values
 if(isset($_SESSION['name'])){
    $name = $_SESSION['name'];
    $id = $_SESSION['id'];
}else{
    $id='';
    $name='';
}

?>

<div class="container">



    <div class="m-justify-lg">
        <div class="m-card m-text-left">
            <div class="m-card-header">
                <h3>Bookmark</h3>
            </div>
            <div class="m-card-body">

                <ul ng-repeat="bookmark in getBookmark">
                    <div ng-if="bookmark.bookmark_status == true">

                        <li class="nav-item"> <a ng-href="post/{{ bookmark.bookmark_postid}}">{{ bookmark.bookmark_name}}</a> | 
                        <input class="m-btn waves-effect" ng-click="deleteBookmark(bookmark.bookmark_postid)" type="button" value="Delete"></li>
                        
                    </div>
                </ul>

             </div>
         </div>
     </div>







</div>