<?php
session_start();

require "../../config/conn.php";
require "../../src/lib/Database.php";
require "../../src/helpers/Format.php";
require "../../src/classes/User.php";
//set session values
 if(isset($_SESSION['name'])){
    $name = $_SESSION['name'];
    $id = $_SESSION['id'];
}else{
    $id='';
    $name='';
}

?>

<div class="container" ng-controller="fetchAnsByIdController">
<br>


    <div class="m-justify-sm">
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


                    <?php if(isset($_SESSION['name'])): ?>
                    <div ng-if="getBlogs[0].isAnswered == false">
                        <!---------------------------Start Model--------------- -->
                        <!-- The Modal -->
                        <div class="m-justify-sm">
                            <div class="m-card m-text-left">
                            <div class="m-card-body">
                                <!-- Modal Header -->
                                <h4 class="modal-title text-primary">Add Answer</h4>
                                
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                <a class="m-btn waves-effect" ng-href="addanswer/{{getBlogs[0].id}}">Add Answer</a>
                                </div>

                                </div>

                            </div>
                            </div>
                        </div>
                    <!--------------------------------end Model ----------->
                    
                    <?php endif ?>


        <div ng-repeat="answer in getanswer">

        <div ng-if="answer.isAnswered== true">True</div>

            <div class="m-justify-sm">
            <div class="m-card m-text-left">
                <div class="m-card-body">
                    
                    <section>

                        <p><img class="m-img-round" src="./{{ answer.user_image }}" alt="profile">
                            <a ng-href="user/{{ answer.author }}"> <strong>{{ answer.author }}</strong> .</a> <span class="badge">Updated {{ answer.date }}</span>
                            <span class="badge">{{ answer.job }}</span>


                        <?php if($id): ?>
                        <span ng-if="answer.loggedUser == false">
                            <span ng-if="answer.isFollowed == true">
                                <input id="follow" class="m-right follow {{ answer.user_id}}" ng-click="follow(answer.user_id)" type="button" value="Following">
                            </span>
                            <span ng-if="answer.isFollowed == false">
                                <input id="follow" class="m-right follow {{ answer.user_id}}" ng-click="follow(answer.user_id)" type="button" value="Follow">
                            </span>
                        </span>

                        <?php endif ?>

                            

                        </p>
                    
                    </section>

                    <p style="white-space: break-spaces;" ng-bind-html="answer.answer | trust"></p>

                    <div class="btn-group">

                    <?php if($id): ?>
                    <span ng-if="answer.isLiked == true">
                            <form method="get" ng-submit='dislike(answer.ansid, answer.ans_id)'>
                            <button type="submit" class="m-btn waves-effect m-btn-selected text-white" >{{ answer.like }} <i class="fa fa-thumbs-up"></i></button>
                            </form>
                        </span>

                    <span ng-if="answer.isLiked == false">
                        <form method="get" ng-submit='like(answer.ansid, answer.ans_id)'>
                        <button type="submit" class="m-btn waves-effect text-white">{{ answer.like }} <i class="fa fa-thumbs-up"></i></button>
                        </form>
                    </span>


                    <?php else: ?>

                    <span ng-if="answer.isLiked == true">
                        <button type="submit" class="m-btn waves-effect m-btn-selected text-white">{{ answer.like }} <i class="fa fa-thumbs-up"></i></button>
                    </span>

                    <span ng-if="answer.isLiked == false">
                        <button type="submit" class="m-btn waves-effect text-white">{{ answer.like }} <i class="fa fa-thumbs-up"></i></button>
                    </span>

                    <?php endif ?>

                    
                    <a class="m-btn waves-effect text-white" ng-href="comments/{{answer.ans_id}}">{{ answer.comment }} <i class="fa fa-comment"></i></a>


                    <?php if($id): ?>
                            <!-- more -->
                        <div class="dropdown">
                            <button type="button" class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown">
                                More
                                <span class="caret"></span>
                            </button>

                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                    <li role="presentation">


                                    <div ng-if="answer.loggedUser == true">
                                        <a role="menuitem" class="dropdown-item" tabindex="-1" ng-href="editanswer/{{answer.ans_id}}">Edit Answer</a>
                                    </div>

                                    </li>
                                </ul>
                            </div>
                            <!-- more -->
                        <?php else: ?>
                        <?php endif ?>


                    </div>

                </div>   
                </div>


                </div>

            </div>

                     <div>
                        

                        <div ng-repeat="reQ in getReletedQuestions">
                            <div class="m-justify-sm">
                            <div class="m-card text-left">
                            <div class="m-card-body">
                                <hr>
                                <h4>Releted Questions</h4>
                                <p><a ng-href="post/{{reQ.id}}">{{ reQ.title}}</a></p>
                            </div>
                            </div>
                            </div>
                            
                        </div>
                    </div>

        
    
</div>