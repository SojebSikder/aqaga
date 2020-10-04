app.config(['$httpProvider', function($httpProvider){
    //initialize get if not there
    if(!$httpProvider.defaults.headers.get){
        $httpProvider.defaults.headers.get = {};
    }

    //Answer edited to include suggestions from comments
    //because previus version of code intrudiced browser-related erros

    //disbale IE ajax request caching
    $httpProvider.defaults.headers.get['If-Modified-Since'] = 'Mon, 26 Jul 1997 05:00:00 GMT';
    //extra
    $httpProvider.defaults.headers.get['Cache-Control'] = 'no-cache';
    $httpProvider.defaults.headers.get['Pregma'] = 'no-cache';
}]);