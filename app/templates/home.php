 <!-- loader -->
 <div id="ftco-loader" class="show fullscreen">
  <svg class="circular" width="48px" height="48px">
  <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
  <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/>
  </svg></div>



  

<div class="container-fluid">
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
<br>


<div class="row">


<!-- Sidebar -->
<div class="col-xs-3 col-md-3 col-sm">


<div class="m-card text-left">
<div class="m-card-body">
    <ul type="circle">
        <li><h6><a href=".">Feed</a></h6></li>
    </ul>

    <hr>
    <small>
        <a href="about">About</a>.
        <a href="career">Career</a>.
        <a href="">Terms</a>.
        <a href="">Acceptable</a>.
        <a href="">Use</a>.
        <a href="">Business</a>.
        <a href="adchoices">Your Ad Choices</a>
        
    </small>
    </div>
</div>



</div>

<!-- End Sidebar -->




<div class="col-xs-6 col-md-6 col-sm">


<?php if($name): ?>
    <div style="cursor:pointer;" class="m-justify-sm">
        <div class="m-card m-shadow-low m-text-left">
            <div data-toggle='modal' data-target='#addQuestionDialog' class="m-card-body margin-none">
            <div style="float:left;">
                <section>
                    <img class="m-img-round" src="./<?php echo getImageByID($id); ?>" alt="profile">
                    
                    <span><?php echo $name;?></span>

                    <p><b>What is your question or link?</b></p>
                </section>
             </div>    
             </div>        
         </div>
     </div>
     <?php endif ?>
<br>


        <div ng-repeat="blog in getBlog | filter:searchText">
        <div ng-if="blog.status == 0">
            <div class="m-justify-sm">
                <div class="m-card m-text-left">
                    <div class="m-card-body">

                        <section>
                        
                        <p><img class="m-img-round" src="./{{ blog.user_image }}" alt="profile">
                            <a ng-href="user/{{ blog.author }}"> <strong>{{ blog.author }}</strong> .</a> <span class="badge">Updated {{ blog.date }}</span>
                            <span class="badge">{{ blog.job }}</span>

                            <?php if($id): ?>
                            <span ng-if="blog.loggedUser == false">
                            <span ng-if="blog.isFollowed == true">
                                <input id="follow" class="m-right follow {{ blog.user_id}}" ng-click="follow(blog.user_id)" type="button" value="Following">
                            </span>
                            <span ng-if="blog.isFollowed == false">
                                <input id="follow" class="m-right follow {{ blog.user_id}}" ng-click="follow(blog.user_id)" type="button" value="Follow">
                            </span>
                            </span>

                            <?php endif ?>
                        </p>
                        
                        </section>


                        


                        <h4><a ng-href="post/{{ blog.id }}">{{ blog.title }}</a></h4>

                        <p><p style="white-space: break-spaces;" ng-bind-html="blog.short_answer | trust"></p><a ng-href="post/{{ blog.id }}">Read more</a></p>

                        <div class="btn-group">
                       
                            <?php if($id):?>
                            <span ng-if="blog.isLiked == true">
                                <form method="get" ng-submit='dislike(blog.ans_id)'>
                                <button type="submit" class="m-btn waves-effect m-btn-selected text-white">{{ blog.like }} <i class="fa fa-thumbs-up"></i></button>
                                </form>
                            </span>

                            <span ng-if="blog.isLiked == false">
                                <form method="get" ng-submit='like(blog.ans_id)'>
                                <button type="submit" class="m-btn waves-effect text-white">{{ blog.like }} <i class="fa fa-thumbs-up"></i></button>
                                </form>
                            </span>


                            <?php else:?>
                                <span ng-if="blog.isLiked == true">
                                <button type="submit" class="m-btn waves-effect m-btn-selected text-white">{{ blog.like }} <i class="fa fa-thumbs-up"></i></button>
                            </span>

                            <span ng-if="blog.isLiked == false">
                                <button type="submit" class="m-btn waves-effect text-white" >{{ blog.like }} <i class="fa fa-thumbs-up"></i></button>
                            </span>
                            <?php endif ?>
                        

                            <a class="m-btn waves-effect text-white" ng-href="comments/{{blog.ans_id}}">{{ blog.comment }} <i class="fa fa-comment"></i></a>
                        

                        <?php if($id): ?>
                            <!-- more -->
                        <div class="dropdown">
                            <button type="button" class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown">
                                More
                                <span class="caret"></span>
                            </button>

                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                    <li role="presentation">

                                    <div ng-if="blog.isBookmark == true">
                                        <a ng-click="deleteBookmark(blog.id)" role="menuitem" class="dropdown-item" tabindex="-1" href="#"><i class="fa fa-bookmark"></i> Bookmark added</a>
                                    </div>

                                    <div ng-if="blog.isBookmark == false">
                                        <a ng-click="addBookmark(blog.id)" role="menuitem" class="dropdown-item" tabindex="-1" href="#"><i class="fa fa-bookmark"></i> Add to Bookmark</a>
                                    </div>

                                    <div ng-if="blog.loggedUser == true">
                                        <a role="menuitem" class="dropdown-item" tabindex="-1" ng-href="editanswer/{{blog.ans_id}}"><i class="fa fa-edit"></i>Edit Answer</a>
                                    </div>

                                        

                                        <hr>
                                        <a role="menuitem" class="dropdown-item" tabindex="-1" href="#"><i class="fa fa-share-alt"></i> Share</a>
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
         </div>

    </div>
    </div>

</div>
