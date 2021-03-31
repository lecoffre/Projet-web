//document.getElementById("logout").onclick=
function logout(){
    
    console.log(Token_by_cookie);
    Token_by_cookie="";
    console.log("Fesse");
    console.log(Token_by_cookie);
    ck_delete_token();
    //location.reload();
    //window.location.remplace("localhost/projet-web-frontend/login.html");
};

function session(Token_by_cookie){
    console.log(Token_by_cookie);
    if(Token_by_cookie != "" /* && Token_by_cookie != "undefined" && typeof(Token_by_cookie) === "undefined"*/){
        document.getElementById("session").style.visibility = "visible";
    }
    else {document.getElementById("session").style.visibility = "hidden";}
}
window.onload=function(){session(Token_by_cookie);};

