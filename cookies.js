/*----------------------------------------------------------------------------------------------------------*/
// Variables cookies
var cookie_remember = ck_getCookie("RemeberMe");
var Login_by_cookie=ck_getCookie("Login");
var Mot_de_passe_by_cookie=ck_getCookie("Mot_de_passe");
var Token_by_cookie =ck_getCookie("Token");
var Role_by_cookie = ck_getCookie("Role");
var ID_Utilisateur_by_cookie = ck_getCookie('ID_utilisateur');
var ID_Login_by_cookie = ck_getCookie('ID_Login');
var Photo_Utilisateur_by_cookie = ck_getCookie('Photo_Utilisateur');






// Variables
var Remember_me;
/*----------------------------------------------------------------------------------------------------------*/

/*----------------------------------------------- AU LANCEMENT -----------------------------------------------------------*/
console.log('Cookies.js chargé');

/*----------------------------------------------- AU LANCEMENT -----------------------------------------------------------*/



/*----------------------------------------------- FONCTION COOKIES (ck_)-----------------------------------------------------------*/
function ck_delete_token(){
    ck_erase_unused_cookies();
    location.reload();
}

//Fonction utilisé sur login.html pour consentir aux cookies
function ck_popup_cookie(){
    var_alert_cookie='vous consentez à ce que ces informations soient provisoirement stockées sur votre ordinateur via des cookies: Logins, droits cotés client, informations de compte';
    alert(var_alert_cookie);
}


//Sert à remplir les champs de Login et mot de passe dans login.html
function ck_set_new_logins_fields(){
    document.forms["se_connecter"]["Login"].value = Login_by_cookie;
    document.forms["se_connecter"]["Mot_de_passe"].value = Mot_de_passe_by_cookie;
    }
    
    //Sert à effacer les champs de Login et mot de passe dans login.html
    function ck_erase_fields(){
        document.forms["se_connecter"]["Login"].autocomplete = "off";
        document.forms["se_connecter"]["Mot_de_passe"].autocomplete = "off";
        document.forms["se_connecter"]["Login"].autocomplete = "chrome-off";
        document.forms["se_connecter"]["Mot_de_passe"].autocomplete = "chrome-off";
        document.forms["se_connecter"]["Login"].value = "";
        document.forms["se_connecter"]["Mot_de_passe"].value = "";
    }
    

//Sert à créer un nouveau cookie en passant en parametre (nom du cookie et sa valeur)
function ck_setCookie(name, value) {
            var date = new Date(),
                expires = 'expires=';
                date.setDate(date.getDate() + 1);
            expires += date.toGMTString();
            document.cookie = name + '=' + value + '; ' + expires + '; path=/';
        }


//Sert à supprimer tout les cookies 
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

//Sert à supprimer tout les cookies qui ne sont pas ==> Login, mot de passe et Remember me
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

//Affiche les cookies dans la console log
function ck_display_cookies_in_log() {
    console.log("cookies => "+document.cookie);
}

//Retourne la valeur du cookie dont le nom est passé en paramètre 
function ck_getCookie(name)
    {
        var value = "; " + document.cookie;
        var parts = value.split("; " + name + "=");
        if (parts.length == 2) return parts.pop().split(";").shift();
    }

//Fonction test similaire à ck_getCookie
function ck_decode_cookie(variable){
    var value = document.cookie.match('(^|;)\\s*' + variable + '\\s*=\\s*([^;]+)')?.pop() || '';
    return value;
}


/*----------------------------------------------- FONCTION COOKIES (ck_)-----------------------------------------------------------*/
