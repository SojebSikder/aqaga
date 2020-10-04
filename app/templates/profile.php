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

<div ng-if="getProfile[0].loggedUser == true">

<!-- sidebar -->


<!-- end sidebar -->

    <div class="m-justify-lg">
        <div class="m-card">
            <div class="m-card-body">

                <section>
                    <table class="text-left">
                        <tr>

                        <div ng-controller="PhotoController" ng-init="select()">

                            <input ng-click="picPhoto()" file-input="files" type="file" class="m-hidden" id="profile_input"/>
                            <button ng-click='uploadFile()' class="m-btn waves-effect" style="display: none;" id="saveBtn">Save</button>
                            
                            <td rowspan="3"><label for="profile_input"><img id="profile_img" class="m-img-round-lg" ng-src="./{{ getProfile[0].userimage }}" alt="profile"></label>
                            </td>

                        </div>

                        </tr>

                        <tr>
                            <td>
                                <h3><strong>{{ getProfile[0].username }}</strong></h3>
                                <h6>{{ getProfile[0].job }} <a href>Edit</a></h6>
                                <p style="color: #9A9CA4;">About yourself <a href>Edit</a></p>
                                
                            </td>
                        </tr>

                        <tr>
                            <td><a href>Edit Info</a></td>
                        </tr>

                        </table>
                 </section>



                <!-- container -->
                 <ul id="myTab" class="nav nav-tabs">

                    <li class="nav-item">
                        <a class="nav-link" ng-click="profile()" href data-toggle="tab">Profile</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" ng-click="answer()" href data-toggle="tab">{{ getProfile[0].answer }} Answers</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" ng-click="question()" href data-toggle="tab">{{ getProfile[0].question }} Questions</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" ng-click="followers()" href data-toggle="tab">{{ getProfile[0].follower }} Followers</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" ng-click="following()" href data-toggle="tab">{{ getProfile[0].following }} Following</a>
                    </li>


                 </ul>

                 
                 <div id="myTabContent" class="tab-content">
                    <div class="tab-pane bg-white active" id="profile">
                        this is profile container
                    </div>

                    <div class="tab-pane bg-white" ng-controller="fetchAnswerController" id="answer">

                        <div class="text-left">
                            <ul ng-repeat="ans in getAnswer">
                                <li><a ng-href="post/{{ ans.postid}}">{{ ans.post_title}}</a> | <input type="button" ng-click="deleteAnswer(ans.ans_id)" class="m-btn waves-effect" value="delete"></li>
                            </ul>
                        </div>

                    </div>

                    <div class="tab-pane bg-white" ng-controller="fetchQuestionController" id="question">
                            <div class="text-left">
                                <ul ng-repeat="ques in getQuestion">
                                    <li> <a ng-href="post/{{ ques.postid}}">{{ ques.post_title}}</a> </li>
                                </ul>
                            </div>
                    </div>

                    <div class="tab-pane bg-white" ng-controller="fetchFollowerController" id="followers">
                        <div class="text-left">
                            <ul ng-repeat="follower in getFollower">
                                <li> <a ng-href="user/{{follower.follower_name}}">{{follower.follower_name}}</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="tab-pane bg-white" ng-controller="fetchFollowingController" id="following">
                       
                        <div class="text-left">
                            <ul ng-repeat="following in getFollowing">
                                <li> <a ng-href="user/{{following.following_name}}">{{following.following_name}}</a></li>
                            </ul>
                        </div>

                    </div>

                 </div>

                 <!-- end container -->
                 

                    


             </div>
         </div>
     </div>


</div>


<div ng-if="getProfile[0].loggedUser == false">


    <div class="m-justify-lg">
        <div class="m-card">
            <div class="m-card-body">

                <section>

                    <table class="text-left">
                        
                        <tr>
                            <td rowspan="3"><img class="m-img-round-lg" src="./{{ getProfile[0].userimage }}" alt="profile"></td>
                        </tr>

                        <tr>
                            <td>
                                <h3><strong>{{ getProfile[0].username }}</strong></h3>
                                <h6>{{ getProfile[0].job }}</h6>
                                <p style="color: #9A9CA4;"></p>

                            <?php if($id): ?>
                                <p>
                                <span ng-if="getProfile[0].loggedUser == false">
                                <span ng-if="getProfile[0].isFollowed == true">
                                <input id="follow" class="follow" ng-click="follow(getProfile[0].user_id)" type="button" value="Following">
                                </span>
                                 <span ng-if="getProfile[0].isFollowed == false">
                                <input id="follow" class="follow {{ getProfile[0].user_id}}" ng-click="follow(getProfile[0].user_id)" type="button" value="Follow">
                                </span>
                                </span>
                                </p>
                                <?php endif ?>
                                
                            </td>
                        </tr>

                        </table>
                    
                 </section>

                    <!-- container -->
                    <ul id="myTab" class="nav nav-tabs">

                    <li class="nav-item">
                        <a class="nav-link" ng-click="profile()" href data-toggle="tab">Profile</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" ng-click="answer()" href data-toggle="tab">{{ getProfile[0].answer }} Answers</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" ng-click="question()" href data-toggle="tab">{{ getProfile[0].question }} Questions</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" ng-click="followers()" href data-toggle="tab">{{ getProfile[0].follower }} Followers</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" ng-click="following()" href data-toggle="tab">{{ getProfile[0].following }} Following</a>
                    </li>


                    </ul>


                    <div id="myTabContent" class="tab-content">
                    <div class="tab-pane bg-white active" id="profile">
                        this is profile container
                    </div>

                    <div class="tab-pane bg-white" ng-controller="fetchAnswerController" id="answer">

                        <div class="text-left">
                            <ul ng-repeat="ans in getAnswer">
                                <li><a ng-href="post/{{ ans.postid}}">{{ ans.post_title}}</a></li>
                            </ul>
                        </div>

                    </div>


                    <div class="tab-pane bg-white" ng-controller="fetchQuestionController" id="question">
                        <div class="text-left">
                            <ul ng-repeat="ques in getQuestion">
                                <li> <a ng-href="post/{{ ques.postid}}">{{ ques.post_title}}</a> </li>
                            </ul>
                        </div>
                    </div>

                    <div class="tab-pane bg-white" ng-controller="fetchFollowerController" id="followers">
                        <div class="text-left">
                            <ul ng-repeat="follower in getFollower">
                                <li><a ng-href="user/{{follower.follower_name}}">{{follower.follower_name}}</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="tab-pane bg-white" ng-controller="fetchFollowingController" id="following">
                        
                        <div class="text-left">
                            <ul ng-repeat="following in getFollowing">
                                <li> <a ng-href="user/{{following.following_name}}">{{following.following_name}}</a></li>
                            </ul>
                        </div>

                    </div>

                    </div>

                    <!-- end container -->


             </div>
         </div>
     </div>

</div>

    


</div>