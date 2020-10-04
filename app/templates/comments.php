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
        <h3>{{getComments[0].comment}} Comments</h3>

            <?php if($id): ?>
            <form method="post" ng-submit="addComment(ansData.answer)">
            <!---------------------------Start Model--------------- -->
            <!-- The Modal -->
            <div id="addAnswerDialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-primary">Add Comments</h4>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                    <textarea id="answerText" ng-model="ansData.answer" name="answer" class="m-input" placeholder="Write something..." required></textarea>
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="m-btn waves-effect">Comment</button>
                </div>
                </div>
            </div>
            </div>
        <!--------------------------------end Model ----------->
        </form>
        <?php  else: ?>
        <?php endif ?>


        <div ng-repeat="comment in getComments">
        <div ng-if="comment.status == 0">
        

            <div class="m-justify-sm">
                <div class="m-card text-left">
                    <div class="m-card-body">
                        <section>
                            
                            <p><img class="m-img-round" src="./{{ comment.user_image }}" alt="profile">
                                <a ng-href="user/{{ comment.author }}"> <strong>{{ comment.author }}</strong>
                                .</a> <span class="badge">Updated {{ comment.date }}</span>
                            </p>
                            <pre style="overflow: hidden;"></pre>
                            <p> <p style="white-space: break-spaces;"> {{ comment.body }} </p>

                            <span ng-if="comment.loggedUser == true"> 
                                <input ng-click="deleteComment(comment.comment_id)" class="m-right m-btn waves-effect" type="button" value="Delete">
                            </span>
                            </p>
                            
                        </section>
                    </div>
                </div>
            </div>

        </div>
        </div>


</div>
