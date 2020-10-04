function follow(){

    var follow = document.getElementsByClassName("follow");
    if(follow){

        for(var i=0; i<follow.length; i++){

            var val = follow[i].value;

            if(val == "Following"){
                follow[i].value = "Follow";
            }else if(val == "Follow"){
                follow[i].value = "Following";
            }
           
        }

        
    }
}


// loader
var loader = function() {
    setTimeout(function() { 
            $('#ftco-loader').removeClass('show');
    }, 1);
};
