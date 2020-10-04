


<nav class="navbar ftco_navbar navbar-expand-lg bg-white navbar-info sticky-top">
<div class="container">
   <!-- Brand -->
  <a class="navbar-brand" href="."><?php echo web("web_title"); ?></a>

  <button class="navbar-toggler text-primary" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="oi oi-menu"></span> Menu
	  </button>

  <div class="collapse navbar-collapse" id="ftco-nav">

    <!-- Links -->
    <ul class="navbar-nav">

      <li class="nav-item">
        <a class="nav-link" href="."> <i class="fa fa-home"></i> Home</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="answer"><i class="fa fa-edit"></i> Answer</a>
      </li>

      <?php if(isset($_SESSION['name'])): ?>
      <li class="nav-item">
        <a class="nav-link" href="notifications"><i class="fa fa-bell"></i> Notifications</a>
      </li>
      <?php endif ?>

      <li class="nav-item">
        <a class="nav-link"><input type="text" ng-model="searchText" placeholder="Search <?php echo web("web_title"); ?>"></a>
      </li>

      <li class="nav-item dropdown">
        <?php if(isset($_SESSION['name'])): ?>
        <a class="nav-link dropdown-toggle" href id="navbardrop" data-toggle="dropdown">

         <img class="m-img-round-sm" src="./<?php echo getImageByID($id); ?>" alt="profile">
         </a>

        <div class="dropdown-menu">
          <a class='dropdown-item' href='user/<?php echo $_SESSION['name']; ?>'>
          <h4><?php echo $_SESSION['name']; ?></h4>
          <h6><?php echo getUserJobById($_SESSION['id']); ?></h6>
          </a>
          <hr>
          <a class='dropdown-item' href='bookmark'>Bookmark</a>
          <hr>
          <small>
          <a class='dropdown-item' href='settings'>Settings</a>
          <a class='dropdown-item' href='help'>Help</a>
          <a class='dropdown-item' href='logout'>Logout</a>
          </small>
          <hr>
          <small>
          <a class='dropdown-item' href='about'>About</a>
          <a class='dropdown-item' href='careers'>Careers</a>
          <a class='dropdown-item' href='adchoices'>Your Ad Choices</a>
          
          </small>
        </div>

        <?php else: ?>
          <a class="nav-link dropdown-toggle" href id="navbardrop" data-toggle="dropdown">Account</a>
        <div class="dropdown-menu">
          <a class='dropdown-item' href='login'>Login</a>
          <a class='dropdown-item' href='register'>Register</a>
        </div>

         <?php endif ?>

        <li class="nav-item">
          <a data-toggle='modal' data-target='#addQuestionDialog' class="nav-link text-white btn waves-effect border-round bg-danger m-btn-block" href=""> Add Question </a>
        </li>

       </li>

     </ul>
  </div>
</div>
 
</nav>