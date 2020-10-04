<?php session_start(); ?>
<div class="container">
<br>


    <div class="m-justify-sm">
        <div class="m-card m-text-left">
            <div class="m-card-header">
                <small>Questions For You</small>
            </div>
         </div>
     </div>

  <div ng-controller="AnswerController">

      <div ng-repeat="blog in getBlog">
      <form method="post" ng-submit="postAnswer()"> 
          <div class="m-justify-sm">
              <div class="m-card m-text-left">
                  <div class="m-card-body">
                  <p> <small>Question added</small> </p>

                  
                      <div ng-if="blog.total > 0">
                      <h4><a ng-href="post/{{ blog.id }}">{{ blog.title }}</a></h4>
                      </div>

                      <div ng-if="blog.total == 0">
                      <h4><a>{{ blog.title }}</a></h4>
                      </div>

                      <p>{{ blog.total }} answer given</p>
                        <?php if(isset($_SESSION['name'])): ?>
                        <div ng-if="blog.isAnswered == false">
                        <!---------------------------Start Model--------------- -->
                        <!-- The Modal -->
                        <div class="m-justify-sm">
                            <div class="m-card m-text-left">
                            <div class="m-card-body">
                                <!-- Modal Header -->
                                <h4 class="modal-title text-primary">Add Answer</h4>
                                
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                <a class="m-btn waves-effect" ng-href="addanswer/{{blog.id}}">Add Answer</a>
                                </div>

                                
                            </div>
                            </div>
                        </div>
                    <!--------------------------------end Model ----------->

                      </div>
                       <?php endif ?>

                      <a type="button" class="m-btn waves-effect text-white">Follow</a>
                      <a type="button" class="m-btn waves-effect text-white">Pass</a>

                    
                     
                      </div>


                  </div>      
              </div>
          </form>
        </div>
    </div>
    

</div>




