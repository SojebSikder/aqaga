//Controller for managing blog
app.controller("fetchController", function ($scope, $http) {

    $scope.getBlog = [];

    $http({
        method: "GET",
        url: "./api/fetchBlog.php"

    }).then(function (res) {

        $scope.getBlog = res.data;
    });


    $scope.ref = function () {
        location.reload();
    };


});

//home page post with ans
app.controller("fetchPostWithAnsController", function ($scope, $http) {

    $scope.getBlog = [];

    $http({
        method: "GET",
        url: "./api/fetchPostWithAns.php"

    }).then(function (res) {
        $scope.getBlog = res.data;
        loader();
    });


    //for like program
    $scope.like = function (postId) {
        $http({
            method: "GET",
            url: "./api/like.php?postid=" + postId

        }).then(function (res) {
            $scope.getBlog = res.data;
        });

    };
    //end like

    //for dislike program
    $scope.dislike = function (postId) {
        $http({
            method: "GET",
            url: "./api/unlike.php?postid=" + postId

        }).then(function (res) {

            $scope.getBlog = res.data;
        });
    };
    //end dislike

    //adding bookmark
    $scope.addBookmark = function (post_id) {
        $http({
            method: "GET",
            url: "./api/addBookmark.php?postid=" + post_id
        }).then(function (res) {

        });
    };

    //delete bookmark
    $scope.deleteBookmark = function (post_id) {
        $http({
            method: "GET",
            url: "./api/addBookmark.php?delBookmark=" + post_id
        }).then(function (res) {

        });
    };



    //Follow/ Unfollow
    $scope.follow = function (ownerid) {

        var follow = document.getElementsByClassName(ownerid);
        if (follow) {

            for (var i = 0; i < follow.length; i++) {

                var val = follow[i].value;

                if (val == "Following") {

                    $http({
                        method: "GET",
                        url: "./api/like-single.php?action=unfollow&ownerid=" + ownerid

                    }).then(function (res) {

                        //$scope.getanswer = res.data;
                    });

                    follow[i].value = "Follow";
                } else if (val == "Follow") {

                    $http({
                        method: "GET",
                        url: "./api/like-single.php?action=follow&ownerid=" + ownerid

                    }).then(function (res) {

                        //$scope.getanswer = res.data;
                    });
                    follow[i].value = "Following";
                }

            }
        }
    }



    $scope.ref = function () {
        location.reload();
    };


});

//post page.only question. for single post question
app.controller("fetchPostWithAnsByIdController", function ($scope, $routeParams, $http) {

    $scope.id = $routeParams.id;
    $scope.getBlogs = [];

    $http({
        url: "./api/fetchBlogById.php?id=" + $scope.id,
        method: "GET"

    }).then(function (res) {
        $scope.getBlogs = res.data;
    });

    //getting releted questions
    $scope.getReletedQuestions = [];
    $http({
        url: "./api/fetchBlogById.php?reid=" + $scope.id,
        method: "GET"

    }).then(function (res) {
        $scope.getReletedQuestions = res.data;
    });
    //end getting releted questions


    //adding bookmark
    $scope.addBookmark = function (post_id) {
        $http({
            method: "GET",
            url: "./api/addBookmark.php?postid=" + post_id
        }).then(function (res) {

        });
    };

    //delete bookmark
    $scope.deleteBookmark = function (post_id) {
        $http({
            method: "GET",
            url: "./api/addBookmark.php?delBookmark=" + post_id
        }).then(function (res) {

        });
    };


    $scope.ref = function () {
        location.reload();
    };


});
//end single post


//for single post answer
app.controller("fetchAnsByIdController", function ($scope, $routeParams, $http) {

    $scope.id = $routeParams.id;
    $scope.getanswer = [];

    $http({
        url: "./api/fetchAnsById.php?id=" + $scope.id,
        method: "GET"

    }).then(function (res) {
        $scope.getanswer = res.data;
        loader();
    });


    //post answer
    $scope.tempUserData = {};

    $scope.getID = function (user, id) {
        $scope.tempUserData = {
            id: id,
            answer: user.answer
        };
    };

    $scope.postAnswer = function () {
        $http({
            method: "POST",
            url: "./api/answer.php",
            data: $scope.tempUserData

        }).then(function (data) {

            if (data.error != '') {
                $scope.alertMessage = data.error;
            }
            else {
            }

            location.reload();
        });
    };

    //end post answer


    //for like program
    $scope.like = function (qid, postId) {
        $http({
            method: "GET",
            url: "./api/like-single.php?quesid=" + qid + "&postid=" + postId

        }).then(function (res) {

            $scope.getanswer = res.data;
        });

    };
    //end like

    //for dislike program
    $scope.dislike = function (qid, postId) {
        $http({
            method: "GET",
            url: "./api/unlike-single.php?quesid=" + qid + "&postid=" + postId

        }).then(function (res) {

            $scope.getanswer = res.data;
        });
    };
    //end dislike



    //Follow/ Unfollow

    $scope.follow = function (ownerid) {

        var follow = document.getElementsByClassName(ownerid);
        if (follow) {

            for (var i = 0; i < follow.length; i++) {

                var val = follow[i].value;

                if (val == "Following") {

                    $http({
                        method: "GET",
                        url: "./api/like-single.php?action=unfollow&ownerid=" + ownerid

                    }).then(function (res) {

                        //$scope.getanswer = res.data;
                    });

                    follow[i].value = "Follow";
                } else if (val == "Follow") {

                    $http({
                        method: "GET",
                        url: "./api/like-single.php?action=follow&ownerid=" + ownerid

                    }).then(function (res) {

                        //$scope.getanswer = res.data;
                    });
                    follow[i].value = "Following";
                }

            }


        }
    }


});
//end single post answer


//for single post answer
app.controller("addAnswerController", function ($scope, $routeParams, $http) {

    $scope.id = $routeParams.id;
    $scope.getanswer = [];

    $scope.closeMsg = function(){
        $scope.alertMsg = false;
    };


    //post answer
    $scope.tempUserData = {};

    $scope.getID = function () {
        $scope.tempUserData = {
            id: $routeParams.id,
            answer: document.querySelector('#answerText').value//user.answer.value
        };
    };

    $scope.postAnswer = function () {
        $http({
            method: "POST",
            url: "./api/answer.php",
            data: $scope.tempUserData

        }).then(function (data) {

            if (data.data.error == 1) {
                $scope.alertMsg = true;
                $scope.alertMessage = data.data.success;
            }
            else {
                window.location = '.';
            }

            //location.reload();
            //window.location = window.history - 1;
        });
    };


    j('#answerText').beditor('.editor-container');

    //end post answer



});
//end single post answer


//for single post answer
app.controller("editanswerController",function ($scope, $routeParams, $http) {

    $scope.getanswer = [];
    $scope.tempUserDataForEdit = {};

    $http({
        url: "./api/fetchAnsById.php?edit=" + $routeParams.id,
        method: "GET"

    }).then(function (res) {

        $scope.getanswer = res.data;
        j('#answerText').element.innerHTML = $scope.getanswer[0].answer;
        j('#answerText').beditor('.editor-container');

        loader();
    });

    //For answer Edit
    $scope.getID = function () {
        $scope.tempUserDataForEdit = {
            ansid: $routeParams.id,
            answer: j('#answerText').element.value
        };
    };


    $scope.editAnswer = function () {

        $http({
            method: "POST",
            url: "./api/answer.php",
            data: $scope.tempUserDataForEdit

        }).then(function (data) {

            if (data.data.error != '') {
                $scope.alertMessage = data.data.error;
            }
            else {
            }

            location.reload();
        });
    };

    //end post answer

    
    //adding bookmark
    $scope.addBookmark = function (post_id) {
        $http({
            method: "GET",
            url: "./api/addBookmark.php?postid=" + post_id
        }).then(function (res) {

        });
    };

    //delete bookmark
    $scope.deleteBookmark = function (post_id) {
        $http({
            method: "GET",
            url: "./api/addBookmark.php?delBookmark=" + post_id
        }).then(function (res) {

        });
    };



});
//end single post answer



app.controller("BlogByIdController", function ($scope, $routeParams, $http) {

    $scope.id = $routeParams.id;
    $scope.getBlogs = [];

    var data = {
        blogid: $scope.id
    }

    $http({
        url: "./api/fetchBlogById.php?id=" + $scope.id,
        method: "GET"
        //headers : {
        //    'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'
        //}

    }).then(function (res) {

        $scope.getBlogs = res.data;
    });


});



//controller for register
app.controller("RegisterController", function ($scope, $http) {

    $scope.closeMsg = function(){
        $scope.alertMsg = false;
    };

    $scope.submitRegister = function () {
        $http({
            method: "POST",
            url: "./api/register.php",
            data: $scope.registerData

        }).then(function (data) {

            $scope.alertMsg = true;

            if (data.data.error != '') {

                $scope.alertClass = 'alert-danger';
                $scope.alertMessage = data.data.error;
            }
            else {
                window.location = 'login';

                $scope.alertClass = 'alert-success';
                $scope.alertMessage = data.data.message;
                $scope.registerData = {};
            }
        });

        //localtion.reload();
    };

    $scope.showPass = function () {
        j('#psk').on('click', function () {
            j('#password').showPass();
        });
    }

});

//controller for login
app.controller("LoginController", function ($scope, $http) {

    $scope.closeMsg = function(){
        $scope.alertMsg = false;
    };

    $scope.submitLogin = function () {
        $http({
            method: "POST",
            url: "./api/login.php",
            data: $scope.loginData

        }).then(function (data) {

            if (data.data.error != "") {

                $scope.alertMsg = true;
                $scope.alertClass = 'alert-danger';
                $scope.alertMessage = data.data.error;
            }
            else if(data.data.error == ""){
                window.location = '.';
            }

            
        });
    };

});


//controller for posting
app.controller("PostController", function ($scope, $http) {

    $scope.postQuestion = function () {
        $http({
            method: "POST",
            url: "./api/post.php",
            data: $scope.postData

        }).then(function (data) {

            if (data.error != '') {

                $scope.alertMsg = true;
                $scope.alertClass = 'alert-danger';
                $scope.alertMessage = data.error;
            }
            else {
            }

            location.reload();
        });
    };

});


//controller for posting answer
app.controller("AnswerController", function ($scope, $http) {

    $scope.tempUserData = {};

    $scope.getID = function (user, id) {
        $scope.tempUserData = {
            id: id,
            answer: user.answer
        };
    };

    $scope.postAnswer = function () {
        $http({
            method: "POST",
            url: "./api/answer.php",
            data: $scope.tempUserData

        }).then(function (data) {

            if (data.error != '') {
                $scope.alertMessage = data.error;
            }
            else {
            }

            location.reload();
        });
    };

});



//controller for profile view
app.controller("profileController", function ($scope, $routeParams, $http) {


    $scope.getProfile = [];

    $http({
        method: "GET",
        url: "./api/profile.php?username=" + $routeParams.username
    }).then(function (res) {
        $scope.getProfile = res.data;
    });

    //change profile photo
    $scope.changePhoto = function () {
        $http({
            method: "GET",
            url: "./api/profile.php?photo=" + $routeParams.username
        }).then(function (res) {
            $scope.getProfile = res.data;
        });
    }
    //end change profile photo


    $scope.picPhoto = function () {
        j('#profile_input').on('change', function () {
            j('#profile_input').imageSet(j('#profile_img'))
            j('#saveBtn').show();
        });
    };

    //container
    $scope.answer = function () {
        $('#answer').show();

        $('#question').hide();
        $('#profile').hide();
        $('#followers').hide();
        $('#following').hide();
    };
    $scope.question = function () {
        $('#question').show();

        $('#answer').hide();
        $('#profile').hide();
        $('#followers').hide();
        $('#following').hide();
    };
    $scope.profile = function () {
        $('#profile').show();

        $('#question').hide();
        $('#answer').hide();
        $('#followers').hide();
        $('#following').hide();
    };

    $scope.followers = function () {
        $('#followers').show();
        $('#following').hide();
        $('#answer').hide();
        $('#question').hide();
        $('#profile').hide();
    };

    $scope.following = function () {
        $('#following').show();
        $('#followers').hide();
        $('#answer').hide();
        $('#question').hide();
        $('#profile').hide();
    };




    //Follow/ Unfollow
    $scope.follow = function (ownerid) {

        var follow = document.getElementsByClassName(ownerid);
        if (follow) {

            for (var i = 0; i < follow.length; i++) {

                var val = follow[i].value;

                if (val == "Following") {

                    $http({
                        method: "GET",
                        url: "./api/like-single.php?action=unfollow&ownerid=" + ownerid

                    }).then(function (res) {

                        //$scope.getanswer = res.data;
                    });

                    follow[i].value = "Follow";
                } else if (val == "Follow") {

                    $http({
                        method: "GET",
                        url: "./api/like-single.php?action=follow&ownerid=" + ownerid

                    }).then(function (res) {

                        //$scope.getanswer = res.data;
                    });
                    follow[i].value = "Following";
                }

            }
        }
    }
});

//controller for fetching answer Data
app.controller("fetchAnswerController", function ($scope, $routeParams, $http) {
    $scope.getAnswer = [];

    $http({
        method: "GET",
        url: "./api/profile.php?answer=" + $routeParams.username
    }).then(function (res) {
        $scope.getAnswer = res.data;
    });


    //delete answer
    $scope.deleteAnswer = function (ans_id) {
        $http({
            method: "GET",
            url: "./api/profile.php?delAnswer=" + ans_id
        }).then(function (res) {
            location.reload();
        });
    };

});

//controller for fetching question Data
app.controller("fetchQuestionController", function ($scope, $routeParams, $http) {
    $scope.getQuestion = [];

    $http({
        method: "GET",
        url: "./api/profile.php?question=" + $routeParams.username
    }).then(function (res) {
        $scope.getQuestion = res.data;
    });
});


//controller for fetching follower Data
app.controller("fetchFollowerController", function ($scope, $routeParams, $http) {
    $scope.getFollower = [];

    $http({
        method: "GET",
        url: "./api/profile.php?follower=" + $routeParams.username
    }).then(function (res) {
        $scope.getFollower = res.data;
    });
});

//controller for fetching following Data
app.controller("fetchFollowingController", function ($scope, $routeParams, $http) {
    $scope.getFollowing = [];

    $http({
        method: "GET",
        url: "./api/profile.php?following=" + $routeParams.username
    }).then(function (res) {
        $scope.getFollowing = res.data;
    });
});


//profile photo upload and fetching
app.controller("PhotoController", function ($scope, $http) {
    $scope.uploadFile = function () {

        var form_data = new FormData();
        angular.forEach($scope.files, function (file) {
            form_data.append('file', file);
        });

        $http.post('./api/upload.php', form_data, {
            transformRequest: angular.identity,
            headers: { 'Content-Type': undefined, 'Process-Data': false }
        }).then(function (response) {
            alert(response.data);
            $scope.select();
        });
    }
    $scope.select = function () {
        $http.get("./api/select.php").then(function (data) {
            $scope.images = data.data;
        });
    }
});


//controller for fetching notifications
app.controller("fetchNotificationController", function ($scope, $http) {
    $scope.getNotification = [];

    $http({
        method: "GET",
        url: "./api/notification.php"
    }).then(function (res) {
        $scope.getNotification = res.data;
    });
});


//for bookmark function
app.controller("bookmarkController", function ($scope, $http) {

    $scope.getBookmark = [];

    $http({
        method: "GET",
        url: "./api/addBookmark.php?action=view"

    }).then(function (res) {

        $scope.getBookmark = res.data;
    });


    //delete bookmark
    $scope.deleteBookmark = function (post_id) {
        $http({
            method: "GET",
            url: "./api/addBookmark.php?delBookmark=" + post_id
        }).then(function (res) {
            $scope.getBookmark = res.data;
        });
    };

});


//For comments
app.controller("commentsController", function ($scope, $routeParams, $http) {

    $scope.getComments = [];

    $http({
        url: "./api/comments.php?id=" + $routeParams.id,
        method: "GET"

    }).then(function (res) {

        $scope.getComments = res.data;
    });


    //for adding comments
    $scope.addComment = function (body) {
        $http({
            method: "GET",
            url: "./api/comments.php?addcomment=" + $routeParams.id+"&body="+body

        }).then(function (res) {
            $scope.getComments = res.data;

            
        });

    };
    //end adding comments



    //for adding comments
    $scope.deleteComment = function (commentid) {
        $http({
            method: "GET",
            url: "./api/comments.php?deletecomment="+ commentid +"&postid="+$routeParams.id

        }).then(function (res) {
            $scope.getComments = res.data;

            
        });

    };
    //end adding comments



    //for adding reply
    $scope.addReply = function (commentid, body) {
        $http({
            method: "GET",
            url: "./api/comments.php?addreply=" + commentid+"&body="+body

        }).then(function (res) {
            $scope.getComments = res.data;
        });

    };
    //end adding reply
    


});



//controller for logout
app.controller("LogoutController", function () {

    window.location = 'login';

});



/*
    $scope.submitRegister = function(){
        $http({
                method:"POST",
                url:"data.php"

            }).then(function(data){

                $scope.students = data;
        });
    };
*/







