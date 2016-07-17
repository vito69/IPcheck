function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
function checkCookie() {
    if (readCookie('cookiesy')) {
        document.getElementById("cookie").style.display = "none";
    } else {
        document.getElementById("cookie").style.display = "block";
    }
}
window.onload = function() {
    checkCookie();
}
function cookieFunction() {
    document.getElementById("cookie").style.display = "none";
    document.cookie = "cookiesy=cookiesy";
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
