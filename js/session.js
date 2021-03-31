document.getElementById("logout").onclick=function(){
    ck_setCookie("Token","");
    Token_by_cookie = ck_getCookie("Token");
    session(Token_by_cookie);
    window.location.replace("login.html");
};

function session(Token_by_cookie){
    console.log(Token_by_cookie);
    if(Token_by_cookie != "" /* && Token_by_cookie != "undefined" && typeof(Token_by_cookie) === "undefined"*/){
        document.getElementById("session").style.visibility = "visible";
        document.getElementById("message-session").style.visibility = "hidden";
    }
    else {document.getElementById("session").style.visibility = "hidden";
    document.getElementById("message-session").style.visibility = "visible";
    document.getElementById("message-session").innerHTML = "<a style='padding:25px' href='Login.html'>Veuillez-vous reconnecter ici</a>" ;}
}
window.onload=function(){
    session(Token_by_cookie);
};
