
function jestJava() {
    var jestJ = '';
    if(deployJava.getJREs()=='') {
        jestJ = 'none';
    } else {
        jestJ = deployJava.getJREs();
    }
    return jestJ;
}
$(document).ready(function(){
    $(".red").mouseover(function(){
        $("body").css("background-color", "red");
    });
});
$(document).ready(function(){
    $(".orange").mouseover(function(){
        $("body").css("background-color", "orange");
    });
});
$(document).ready(function(){
    $(".yellow").mouseover(function(){
        $("body").css("background-color", "yellow");
    });
});
$(document).ready(function(){
    $(".green").mouseover(function(){
        $("body").css("background-color", "green");
    });
});
$(document).ready(function(){
    $(".lblue").mouseover(function(){
        $("body").css("background-color", "lightblue");
    });
});
$(document).ready(function(){
    $(".indigo").mouseover(function(){
        $("body").css("background-color", "indigo");
    });
});
$(document).ready(function(){
    $(".purple").mouseover(function(){
        $("body").css("background-color", "purple");
    });
});
