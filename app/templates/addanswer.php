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
    <br>

    <div class="m-justify-sm" ng-controller="fetchPostWithAnsByIdController">
        <div class="m-card m-text-left">
            <div class="m-card-body">
                <h1><a>{{ getBlogs[0].title }}</a></h1>



                <?php if($id): ?>
                        <!-- more -->
                    <div class="dropdown">
                        <button type="button" class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown">
                            More
                            <span class="caret"></span>
                        </button>

                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                <li role="presentation">

                                <div ng-if="getBlogs[0].isBookmark == true">
                                    <a ng-click="deleteBookmark(getBlogs[0].id)" role="menuitem" class="dropdown-item" tabindex="-1" href="#">Bookmark added</a>
                                </div>

                                <div ng-if="getBlogs[0].isBookmark == false">
                                    <a ng-click="addBookmark(getBlogs[0].id)" role="menuitem" class="dropdown-item" tabindex="-1" href="#">Add to Bookmark</a>
                                </div>
     
                                    <hr>
                                    <a role="menuitem" class="dropdown-item" tabindex="-1" href="#">Share</a>
                                </li>
                            </ul>
                        </div>
                        <!-- more -->
                    <?php else: ?>
                    <?php endif ?>


                
                <hr>
                </div>      
            </div>
        </div>




<form method="post" ng-submit="postAnswer()">
        <div class="m-justify-sm">
            <div class="m-card">

                <div class="modal-header">
                    <h4 class="modal-title text-primary">Add Answer</h4>
                </div>

                <div class="m-card-body">

                    <div ng-if="alertMsg == true">
                    <div class="alert alert-danger alert-dismissible">{{ alertMessage }}
                        <a href="#" class="close" ng-click="closeMsg()" aria-label="close">&times;</a>
                    </div>
                    </div>


                <div style="text-align: left;" class="editor-container"></div>
                <textarea id="answerText" name="answer" class="m-input" placeholder="Write something..." required></textarea>
                </div>


                <div class="modal-footer">
                <button type="submit" ng-click="getID()" class="m-btn waves-effect">Post Answer</button>
                </div>
            
            </div>
        </div>
        
</form>





</div>
