app.directive("fileInput", function ($parse) {
    return {
        link: function ($scope, element, attrs) {
            element.on("change", function (event) {
                var files = event.target.files;
                $parse(attrs.fileInput).assign($scope, element[0].files);
                $scope.$apply();
            });
        }
    }
});


/*
app.controller("myController", function($scope, $http){
    $scope.uploadFile = function(){
        var form_data = new FormData();
        angular.forEach($scope.files, function(file){
            form_data.append('file', file);
        });
        $http.post('./api/upload.php', form_data,{
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        }).then(function(response){
            alert(response.data);
            $scope.select();
        });
    }
    $scope.select = function(){
        $http.get("./api/select.php").then(function(data){
            $scope.images = data.data;
        });
    }
});
*/