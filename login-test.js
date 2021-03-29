
var Login_by_cookie=ck_decode_cookie("Login");
var Mot_de_passe_by_cookie=ck_decode_cookie("Mot_de_passe");
var Token_by_cookie;
var cookie_remember;
var Remember_me;
var message_json ='';
var alert_html = '';
var error = '';
var loggedin;

/*----------------------------------PAGE LOG-IN----------------------------------------------------------*/
var checkBox = document.getElementById("RemeberMe");
checkBox.onclick = function(){
    ck_remeber_me();
    ck_get_cookie_remeber_me();}
document.getElementById("login").onclick = function(){
    login();
    
    ck_set_new_logins_cookies();
    ck_display_cookies_in_log();
    
    
}


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


























function error_or_not(error){
   


    if(error=='0'){
        alert_html = '<div class="alert alert-success" role="alert">Requete terminé, tout s\'est bien passé</div>';
        ck_popup_cookie();
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
















async function  login() {
    
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
                                         /*
                                        console.log('debut html');
                                        html += '<div class="infos" style="padding:10px 15px 0 15px">';
                                        html += '<p>ID_Login : '+current_user.ID_Login+'</p>';
                                        html += '<p>Login : '+current_user.Login+'</p>';
                                        html += '<p>Mot_de_passe : '+current_user.Mot_de_passe+'</p>';
                                        html += '<p>Nom : '+current_user.Nom+'</p>';
                                        html += '<p>Prenom : '+current_user.Prenom+'</p>';
                                        html += '<p>Role : '+current_user.Role+'</p>';
                                        html += '<p>ID_Utilisateur : '+current_user.ID_Utilisateur+'</p>';
                                        if(typeof current_user.Token != 'undefined'){
                                
                                            html += '<p> token: '+current_user.Token+'</p>';
                                        };
                                        if(typeof current_user.Nouveau_Token != 'undefined'){
                                     
                                            html += '<p> nouveau token: '+current_user.Nouveau_Token+'</p>';
                                        };
                                        html += '<p>image : --------------------------------</p><img style="height: auto; width: auto; max-height: 80px;  max-width: 80px" src="'+ current_user.Photo_Utilisateur+'">';
                                        html += '<p>----------------------------------------</p>';
                                        html += '</div><hr>';
                                        */
                                        Token_by_cookie = current_user.Token;
                                        console.log('fin html '+ Token_by_cookie);
                                        ck_setCookie("Token", Token_by_cookie);
                                        error_or_not('0');

                                        
                                        
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
                                                error = 'Problème interne';
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
                            
                            //document.getElementById("resultat-requete").innerHTML = html;

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