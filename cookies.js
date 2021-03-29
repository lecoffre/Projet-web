

var Login_by_cookie=ck_decode_cookie("Login");
var Mot_de_passe_by_cookie=ck_decode_cookie("Mot_de_passe");
var Token_by_cookie;
var cookie_remember;
var Remember_me;


console.log('Cookies.js chargé');
ck_display_cookies_in_log();










/*------------------------------------------COOOOOKIIIIESSSSS----------------------------------------------------------------------------------------------------------- */

function ck_popup_cookie(){
    var_alert_cookie='vous consentez à ce que ces informations soient provisoirement stockées sur votre ordinateur via des cookies: '+document.cookie;
    //document.getElementById("resultat-requete").innerHTML += var_alert_cookie;
    alert(var_alert_cookie);
   
}


function ck_setCookie(name, value) {
            var date = new Date(),
                expires = 'expires=';
                date.setDate(date.getDate() + 1);
            expires += date.toGMTString();
            document.cookie = name + '=' + value + '; ' + expires + '; path=/';
        }

function ck_set_new_logins_fields(){
document.forms["se_connecter"]["Login"].value = Login_by_cookie;
document.forms["se_connecter"]["Mot_de_passe"].value = Mot_de_passe_by_cookie;
}

function ck_erase_fields(){
    document.forms["se_connecter"]["Login"].autocomplete = "off";
    document.forms["se_connecter"]["Mot_de_passe"].autocomplete = "off";
    document.forms["se_connecter"]["Login"].autocomplete = "chrome-off";
    document.forms["se_connecter"]["Mot_de_passe"].autocomplete = "chrome-off";
    document.forms["se_connecter"]["Login"].value = "";
    document.forms["se_connecter"]["Mot_de_passe"].value = "";
}


function ck_set_new_logins_cookies(){
if(Remember_me==true && (Login_by_cookie!="" && Mot_de_passe_by_cookie!="")){
 
    ck_setCookie("Login",Login_by_cookie);
    ck_setCookie("Mot_de_passe",Mot_de_passe_by_cookie);
}else{
    
    ck_setCookie("rememberMe",cookie_remember);
}
}

function ck_control_logins_field(){
    if(document.forms["se_connecter"]["Login"].value != "undefined" || document.forms["se_connecter"]["Mot_de_passe"].value == "undefined"){
        document.forms["se_connecter"]["Login"].value = "";
        document.forms["se_connecter"]["Mot_de_passe"].value = "";
    }
}

function ck_deleteAllCookies() {
    console.log("suppression des cookies inutiles");
    var cookies = document.cookie.split(";");

    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        var eqPos = cookie.indexOf("=");
        var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    }
}

function ck_erase_unused_cookies() {
    if((Login_by_cookie=="" || Mot_de_passe_by_cookie=="") || (Login_by_cookie=="undefined" || Mot_de_passe_by_cookie=="undefined")){
        ck_deleteAllCookies();
    }else{
        ck_deleteAllCookies();
        ck_setCookie("Login",Login_by_cookie);
        ck_setCookie("Mot_de_passe",Mot_de_passe_by_cookie);
        ck_setCookie("rememberMe",cookie_remember);
    }
    console.log("cookies restants => "+ document.cookie);
}


function ck_display_cookies_in_log() {
    console.log("cookies => "+document.cookie);
}


function ck_getCookie(name)
    {
        var value = "; " + document.cookie;
        var parts = value.split("; " + name + "=");
        if (parts.length == 2) return parts.pop().split(";").shift();
    }


function ck_decode_cookie(variable){
    var value = document.cookie.match('(^|;)\\s*' + variable + '\\s*=\\s*([^;]+)')?.pop() || '';
    return value;
}

function ck_get_cookie_remeber_me() {
    //(typeof variable !== 'undefined')
    
    console.log("cookie se souvenir de moi => "+ck_decode_cookie("rememberMe"));
    cookie_remember=ck_decode_cookie("rememberMe");
    if(cookie_remember=="yes"){
        console.log("le cookie se souvenir de moi est fixé sur oui")
        checkBox.checked = true;
        Remember_me = true;
        if((Login_by_cookie!="" && Mot_de_passe_by_cookie!="")&&(Login_by_cookie!="undefined" && Mot_de_passe_by_cookie!="undefined")){
           
            ck_set_new_logins_fields();
        }else{
            console.log("Les cookies ne peuvent pas etres utilisés pour le login, suppression des cookies de Login");
            ck_erase_unused_cookies;
        }

    }else if(cookie_remember=="no"){
        console.log("le cookie se souvenir de moi est fixé sur non")
        checkBox.checked = false;
        Remember_me = false;
    }else{
        console.log("le cookie se souvenir de moi n'existe pas");
        checkBox.checked = true;
        Remember_me = true;
    }
}


function ck_remeber_me() {
    if (checkBox.checked == true){
    console.log('checked');
    ck_setCookie("rememberMe","yes");

    }else{
    console.log('not checked');
    ck_setCookie("rememberMe","no");
    ck_get_cookie_remeber_me();

    }
}


/*------------------------------------------COOOOOKIIIIESSSSS----------------------------------------------------------------------------------------------------------- */
