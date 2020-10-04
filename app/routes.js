var app = angular.module("main-app", ['ngRoute']);
app.config(['$routeProvider', '$locationProvider', function ($routeProvider, $locationProvider) {

    $locationProvider.html5Mode(true);

    $routeProvider

        .when("/", {
            templateUrl: "app/templates/home.php",
            controller: "fetchPostWithAnsController"
        })

        .when("/post/:id", {
            templateUrl: "app/templates/post.php",
            controller: "fetchPostWithAnsByIdController"
        })

        .when("/user/:username", {
            templateUrl: "app/templates/profile.php",
            controller: "profileController"
        })

        .when("/register", {
            templateUrl: "app/templates/register.html",
            controller: "RegisterController"
        })

        .when("/login", {
            templateUrl: "app/templates/login.html",
            controller: "LoginController"
        })

        .when("/contact", {
            templateUrl: "app/templates/contact.html"
        })

        .when("/about", {
            templateUrl: "app/templates/about.html"
        })

        .when("/logout", {
            templateUrl: "api/logout.php",
            controller: "LogoutController"
        })

        .when("/answer", {
            templateUrl: "app/templates/answer.php",
            controller: "fetchController"
        })

        .when("/addanswer/:id", {
            templateUrl: "app/templates/addanswer.php",
            controller: "addAnswerController"
        })

        .when("/editanswer/:id", {
            templateUrl: "app/templates/editanswer.php",
            controller: "editanswerController"
        })

        .when("/notifications", {
            templateUrl: "app/templates/notifications.php",
            controller: "fetchNotificationController"
        })

        .when("/comments/:id", {
            templateUrl: "app/templates/comments.php",
            controller: "commentsController"
        })

        .when("/bookmark", {
            templateUrl: "app/templates/bookmark.php",
            controller: "bookmarkController"
        })

        .when("/settings", {
            templateUrl: "app/templates/settings.php"
        })

        .when("/help", {
            templateUrl: "app/templates/help.php"
        })

        .when("/careers", {
            templateUrl: "app/templates/careers.php"
        })

        .when("/adchoices", {
            templateUrl: "app/templates/adchoices.php"
        })

        .when("/404", {
            templateUrl: "app/templates/404.html"
        })

        .otherwise({ redirectTo: '/404' });

}]);