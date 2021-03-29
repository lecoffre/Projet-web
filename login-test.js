

var Login_by_cookie=ck_decode_cookie("Login");
var Mot_de_passe_by_cookie=ck_decode_cookie("Mot_de_passe");
var cookie_remember;
var Remember_me;
var message_json ='';
var alert_html = '';
var error = '';

/*----------------------------------PAGE LOG-IN----------------------------------------------------------*/
var checkBox = document.getElementById("RemeberMe");
document.getElementById("login").onclick = function(){
    login();
    ck_set_new_logins_cookies();
    error_or_not();
    
};
checkBox.onclick = function(){
    ck_remeber_me();
    ck_get_cookie_remeber_me();};
/*----------------------------------PAGE LOG-IN----------------------------------------------------------*/


window.onload = function() {
    get_api_connexion(); 
    ck_display_cookies_in_log();
    ck_get_cookie_remeber_me();
    ck_erase_fields();
    ck_erase_unused_cookies();
    ck_display_cookies_in_log();
    ck_control_logins_field();
    ck_set_new_logins_fields();
    
}; 


/*------------------------------------------COOOOOKIIIIESSSSS----------------------------------------------------------------------------------------------------------- */




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
    ck_deleteAllCookies();
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



function error_or_not(error){
   


    if(error==''){
        alert_html = '<div class="alert alert-success" role="alert">Requete terminé, tout s\'est bien passé</div>';
    }else{
        
        alert_html = '<div class="alert alert-danger" role="alert">Une erreur s\'est produite: '+error+'</div>';
    }
    
    document.getElementById("connexion_js").innerHTML = alert_html;




}
























function get_api_connexion() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "http://localhost/api/test/test_connexion.php" , true);
    xhr.onload = function()
    { 
        

        try{
        if( xhr.status == 200 )
        {
            
            var response = JSON.parse(xhr.response);
            
            var message_co = response.message_connexion;

            alert_html = '<div class="alert alert-success" role="alert">'+message_co+'</div>';
            document.getElementsByClassName('chargement_login')[0].style.visibility = 'visible';
        }
        else{alert_html = '<p>Wrong request. Error: ' + xhr.status + '</p>';}
      }catch(e){
        console.log(e);
        alert_html = '<div class="alert alert-danger" role="alert">Erreur de connexion à la bdd/API, actualisez ou réessayez plus tard</div>';
     }
        document.getElementById("connexion_js").innerHTML = alert_html;
    };
    xhr.send();   
}
















function login() {
    
    var Login = document.forms["se_connecter"]["Login"].value;
    var Mot_de_passe = document.forms["se_connecter"]["Mot_de_passe"].value;
    if(Login != "" && Mot_de_passe != "")
    {
                    Login_by_cookie = Login;
                    Mot_de_passe_by_cookie = Mot_de_passe;

                    var html = '';

                    
                    var param = {
                    "Login":Login,
                    "Mot_de_passe":Mot_de_passe,
                    }
                    var data = JSON.stringify(param);
                    console.log(data);
                    var xhr = new XMLHttpRequest();
                    xhr.addEventListener("readystatechange", function() 
                    {
                        
                        if( this.readyState === 4) 
                            {
                                    console.log(xhr.readyState+", requete finie, statut : "+ xhr.status+", reponse: "+ xhr.response);
                                    if( xhr.status == 200 ){
                                        error = '';
                                        try{
                                            
                                        var response = JSON.parse(xhr.response);
                                        var current_user = response;
                                        console.log('debut html');
                                        html += '<div class="infos" style="padding:10px 15px 0 15px">';
                                        html += '<p>ID_Login : '+current_user.ID_Login+'</p>';
                                        html += '<p>Login : '+current_user.Login+'</p>';
                                        html += '<p>Mot_de_passe : '+current_user.Mot_de_passe+'</p>';
                                        html += '<p>Nom : '+current_user.Nom+'</p>';
                                        html += '<p>Prenom : '+current_user.Prenom+'</p>';
                                        html += '<p>Role : '+current_user.Role+'</p>';
                                        html += '<p>ID_Utilisateur : '+current_user.ID_Utilisateur+'</p>';
                                        if(typeof current_user.Token != 'undefined'){html += '<p> token: '+current_user.Token+'</p>';};
                                        if(typeof current_user.Nouveau_Token != 'undefined'){html += '<p> nouveau token: '+current_user.Nouveau_Token+'</p>';};
                                        html += '<p>image : --------------------------------</p><img style="height: auto; width: auto; max-height: 80px;  max-width: 80px" src="'+ current_user.Photo_Utilisateur+'">';
                                        html += '<p>----------------------------------------</p>';
                                        html += '</div><hr>';
                                        console.log('fin html');
                                        error_or_not('');
                                        
                                        }catch(e){
                                            if(e=="SyntaxError: Unexpected end of JSON input"){
                                                console.log("JSON incorrect (vide)");
                                                error = '1, ';
                                                error_or_not(error);

                                            }else if(e==   "SyntaxError: Unexpected token < in JSON at position 0"){
                                                console.log("L'utilisateur n'existe pas");
                                                error = '2, ';
                                                error_or_not(error);

                                            }else{
                                                console.log('erreur ==> '+e+'');
                                                error = '3, ';
                                                error_or_not(error);

                                                }
                                            }
                                    }else{
                                            error = '4, ';

                                            error_or_not(error);
                                            }
                            }if(xhr.status == 404){
                                error = 'erreur 404, ';
                                error_or_not(error);
                            }
                            document.getElementById("resultat-requete").innerHTML = html;

                        }


                        );
                        
                        xhr.open("POST", "http://localhost/api/login/connexion.php", true);
                        xhr.responseType = 'text';
                        console.log('envoi=> '+data);
                        
                        xhr.send(data);
                    
                        
        } 
        else{
        
        alert_html = '<div class="alert alert-danger" role="alert">Les champs ne sont pas bien renseignés</div>';
        }
        
    
};