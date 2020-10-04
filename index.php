<?php session_start(); 
require("config/conn.php");
require("src/lib/Database.php");
require("src/helpers/Format.php");
require("src/classes/Web.php");
require("src/classes/User.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <base href="<?php echo $config['url']['baseUrl']; ?>">
  <meta charset="UTF-8">

  <link rel="icon" href="<?php echo $config['web']['info']['web_icon']; ?>" type="image/png" sizes="16x16">

  <meta name="description" content="Ask Question and get Answer">
  <meta name="keywords" content="askme">
  <meta name="author" content="<?php echo $config['web']['user']['user_name']; ?>">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title><?php echo web("web_title"); ?> - <?php echo web("web_slogan"); ?></title>

<!-- Load library -->
  <script src="assets/js/angular.min.js"></script>
  <script src="assets/js/angular-route.js"></script>
 <!-- Router -->
  <script src="app/routes.js"></script>
<!-- diective -->
  <script src="app/directive/directive.js"></script>
<!-- End directive -->
<!-- Controller -->
  <script src="app/controllers/BlogController.js"></script>
<!-- End Controller -->
<!-- Helper -->
  <script src="app/helper/disable.js"></script>
<!-- End Helper -->

<!-- Filter -->
<script src="app/filter/trust.js"></script>
<!-- End Filter -->


<!-- Bootstrap-->
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
<!-- End Bootstrap-->
<!-- bihongo css -->
  <link rel="stylesheet" type="text/css" href="assets/css/material/material.css">
  <script src="assets/css/material/material.js"></script>
<!-- end bihongo css-->
<!-- bihongo js -->
  <script src="assets/js/jsoj.js"></script>
<!-- end bihongo js-->
<!-- Helper css-->
  <link rel="stylesheet" type="text/css" href="assets/css/helper.css">
<!-- Helper js-->
<!-- Font Awesome css-->
<link rel="stylesheet" type="text/css" href="assets/css/fontawesome/all.min.css">
<script src="assets/css/fontawesome/all.min.js"></script>
<!-- Font Awesome js-->
  <script src="assets/js/helper.js"></script>


</head>
<body ng-app="main-app" class="m-body-gray">

<!-- navbar-->
<?php require_once "app/inc/navbar.php";?>
<!-- End navbar-->

<?php
/*
require "src/lib/ML/Tokenizer.php";

$text = "how to create a software";
$data = Tokenizer::getKeyword($text);


$x = '';
foreach($data as $key){   
  $number = $key;
  $x = $x.$number.","; //number separated by comma
}
echo $x;
*/

?>




  <ng-view>Loading...</ng-view>


<!---------------------------Start Model------------------>
  <!-- The Modal -->
  <div ng-controller="PostController" class="modal" id="addQuestionDialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title text-primary">Add Question</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <form method="post" ng-submit="postQuestion()">
        <!-- Modal body -->
        <div class="modal-body">

        You Asked
        <select ng-init="postData.visibility = 'Public'" ng-model="postData.visibility" style="width: 40%;" class="form-control">
          <option value="Public" title="Everyone can see your name after question">Public</option>
          <option value="Anonymous" title="Your identity will never be associated with this">Anonymous</option>
          <option value="Limited" title="Your identity will be shown but this question will not apear in your followers feeds or your profile">Limited</option>
        </select>

          <input ng-model="postData.question" class="m-input" placeholder="Start your question with What, How, Why etc" type="text" required autofocus>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">

          <button type="button" class="btn" data-dismiss="modal">Close</button>
          <button type="submit" class="m-btn waves-effect">Add Question</button>

        </div>
        </form>

      </div>
    </div>
  </div>
<!--------------------------------end Model ----------->

    
</body>
</html>