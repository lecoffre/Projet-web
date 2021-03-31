

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
document.getElementById("forgot_psw").onclick = function(){
    error_or_not("forgot_psw");
}
document.getElementById("contact_admin").onclick = function(){
    error_or_not("contact_admin");
  
    
}
/*----------------------------------PAGE LOG-IN----------------------------------------------------------*/


window.onload = function() {
    get_api_connexion(); 
    ck_display_cookies_in_log();
    ck_get_cookie_remeber_me();
    ck_erase_fields();
    
    ck_display_cookies_in_log();
    ck_control_logins_field();
    ck_set_new_logins_fields();
    
}; 




    //Sert à remplir les cookies utilisés pour remplir les champs pour le rememberme dans login.html
    function ck_set_new_logins_cookies(){
        if(Remember_me==true && (Login_by_cookie!="" && Mot_de_passe_by_cookie!="")){
         
            ck_setCookie("Login",Login_by_cookie);
            ck_setCookie("Mot_de_passe",Mot_de_passe_by_cookie);
        }else{  
            ck_setCookie("rememberMe",cookie_remember);
        }
        }
        
        //Sert à verifier que les champs de login.html ne soient pas sur 'undefined'
        function ck_control_logins_field(){
            if(document.forms["se_connecter"]["Login"].value != "undefined" || document.forms["se_connecter"]["Mot_de_passe"].value == "undefined"){
                document.forms["se_connecter"]["Login"].value = "";
                document.forms["se_connecter"]["Mot_de_passe"].value = "";
            }
        }
        
        
        //Pour remember me index.html
        function ck_get_cookie_remeber_me() {
            console.log("cookie se souvenir de moi => "+ck_decode_cookie("rememberMe"));
            cookie_remember=ck_decode_cookie("rememberMe");
            if(cookie_remember=="yes"){
                console.log("le cookie se souvenir de moi est fixé sur oui")
                checkBox.checked = true;
                Remember_me = true;
                ck_setCookie("rememberMe", "yes");
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
                ck_setCookie("rememberMe", "no");
            }else{
                console.log("le cookie se souvenir de moi n'existe pas");
                checkBox.checked = true;
                Remember_me = true;
            }
        }
        
        //Pour remember me index.html
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
        

function error_or_not(error){
   
    
    if(error=='0'){
        ck_popup_cookie();
        window.location.href = "index.php";
    }else if(error=='reconnect'){    
        //alert('Votre token à été mis à jour, veuillez vous reconnecter');
        alert_html = '<div class="alert alert-info" role="alert">Votre token à été mis à jour, veuillez vous reconnecter</div>';

        //location.reload();
    }else if(error=='forgot_psw'){    
        //alert('Votre token à été mis à jour, veuillez vous reconnecter');
        alert_html = '<div class="alert alert-info" role="alert">La page de récupération de mot de passe est momentanément indisponible, veuillez contacter un administrateur</div>';

        //location.reload();
    }else if(error=='contact_admin'){    
        //alert('Votre token à été mis à jour, veuillez vous reconnecter');
        alert_html = '<div class="alert alert-info" role="alert"> <div class="row col-12"><div class="col-lg-8 col-md-8  col-sm-12 col-xs-12"> Veuiller reseigner un email</div>';
        alert_html += ' <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 row" ><input class="col-10 form-control form-control-user" style="height:30px"><button style="height:30px" class = "col-2 btn btn-primary"><i class="far fa-envelope"></i></button></div> </div>  </div>'
        //location.reload();
    } 
    else{
        
        alert_html = '<div class="alert alert-danger" role="alert">Une erreur s\'est produite: '+error+'</div>';

    }
    
    document.getElementById("connexion_js").innerHTML = alert_html;
    



}


function get_api_connexion() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "http://localhost/projet-web-frontend/api/test/test_connexion.php" , true);
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
        console.log('creation des cookies Login et Mot de passe')
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
                                        ck_erase_unused_cookies;
                                        console.log('Creation des cookies apres login : Role, Token, ID_Utilisateur');
                                        ck_setCookie("Login", current_user.Login);
                                        ck_setCookie("Mot_de_passe", current_user.Mot_de_passe);
                                        ck_setCookie("Role", current_user.Role);
                                        ck_setCookie("Token", current_user.Token);
                                        ck_setCookie("ID_utilisateur", current_user.ID_Utilisateur);
                                        ck_setCookie("ID_Login", current_user.ID_Login);
                                        ck_setCookie("Photo_Utilisateur",  current_user.Photo_Utilisateur);




                                        ck_setCookie("Rechercher_entreprise", current_user.Rechercher_entreprise);
                                        ck_setCookie("Creer_une_entreprise", current_user.Creer_une_entreprise);
                                        ck_setCookie("Modifier_une_entreprise", current_user.Modifier_une_entreprise);
                                        ck_setCookie("Evaluer_une_entreprise", current_user.Evaluer_une_entreprise);
                                        ck_setCookie("Supprimer_une_entreprise", current_user.Supprimer_une_entreprise);
                                        ck_setCookie("Consulter_les_stats_des_entreprises", current_user.Consulter_les_stats_des_entreprises);
                                        ck_setCookie("Rechercher_une_offre", current_user.Rechercher_une_offre);
                                        ck_setCookie("Creer_une_offre", current_user.Creer_une_offre);
                                        ck_setCookie("Modifier_une_offre", current_user.Modifier_une_offre);
                                        ck_setCookie("Supprimer_une_offre", current_user.Supprimer_une_offre);
                                        ck_setCookie("Consulter_les_stats_des_offres", current_user.Consulter_les_stats_des_offres);
                                        ck_setCookie("Rechercher_un_compte_pilote", current_user.Rechercher_un_compte_pilote);
                                        ck_setCookie("Creer_un_compte_pilote", current_user.Creer_un_compte_pilote);
                                        ck_setCookie("Modifier_un_compte_pilote", current_user.Modifier_un_compte_pilote);
                                        ck_setCookie("Supprimer_un_compte_pilote", current_user.Supprimer_un_compte_pilote);
                                        ck_setCookie("Rechercher_un_compte_delegue", current_user.Rechercher_un_compte_delegue);
                                        ck_setCookie("Creer_un_compte_delegue", current_user.Creer_un_compte_delegue);
                                        ck_setCookie("Modifier_un_compte_delegue", current_user.Modifier_un_compte_delegue);
                                        ck_setCookie("Supprimer_un_compte_delegue", current_user.Supprimer_un_compte_delegue);
                                        ck_setCookie("Assigner_des_droits_a_un_delegue", current_user.Assigner_des_droits_a_un_delegue);
                                        ck_setCookie("Rechercher_un_compte_etudiant", current_user.Rechercher_un_compte_etudiant);
                                        ck_setCookie("Creer_un_compte_etudiant", current_user.Creer_un_compte_etudiant);
                                        ck_setCookie("Modifier_un_compte_etudiant", current_user.Modifier_un_compte_etudiant);
                                        ck_setCookie("Supprimer_un_compte_etudiant", current_user.Supprimer_un_compte_etudiant);
                                        ck_setCookie("Consulter_les_stats_des_etudiants", current_user.Consulter_les_stats_des_etudiants);
                                        ck_setCookie("Ajouter_une_offre_a_la_wish_list", current_user.Ajouter_une_offre_a_la_wish_list);
                                        ck_setCookie("Retirer_une_offre_a_la_wish_list", current_user.Retirer_une_offre_a_la_wish_list);
                                        ck_setCookie("Postuler_a_une_offre", current_user.Postuler_a_une_offre);
                                        ck_setCookie("Informer_le_systeme_de_l_avancement_de_la_candidature_step_1", current_user.Informer_le_systeme_de_l_avancement_de_la_candidature_step_1);
                                        ck_setCookie("Informer_le_systeme_de_l_avancement_de_la_candidature_step_2", current_user.Informer_le_systeme_de_l_avancement_de_la_candidature_step_2);
                                        ck_setCookie("Informer_le_systeme_de_l_avancement_de_la_candidature_step_3", current_user.Informer_le_systeme_de_l_avancement_de_la_candidature_step_3);
                                        ck_setCookie("Informer_le_systeme_de_l_avancement_de_la_candidature_step_4", current_user.Informer_le_systeme_de_l_avancement_de_la_candidature_step_4);
                                        ck_setCookie("Informer_le_systeme_de_l_avancement_de_la_candidature_step_5", current_user.Informer_le_systeme_de_l_avancement_de_la_candidature_step_5);
                                        ck_setCookie("Informer_le_systeme_de_l_avancement_de_la_candidature_step_6", current_user.Informer_le_systeme_de_l_avancement_de_la_candidature_step_6); 
                                       




























                                            if(current_user.Role=='administrateur'){
                                            ck_setCookie("Authorisations", current_user.Authorisations);
                                            }else if(current_user.Role=='pilote'){
                                            ck_setCookie("Authorisations", current_user.Authorisations);
                                            ck_setCookie("Centre_pilote", current_user.Centre_pilote);
                                            ck_setCookie("Promotion_pilote", current_user.Promotion_pilote);
                                            }else if(current_user.Role=='delegue'){
                                            ck_setCookie("Authorisations", current_user.Authorisations);
                                            ck_setCookie("Centre_Delegue", current_user.Centre_Delegue);
                                            ck_setCookie("Promotion_delegue", current_user.Promotion_delegue);
                                            ck_setCookie("Specialite", current_user.Specialite);
                                            ck_setCookie("ID_Utilisateur__CREE", current_user.ID_Utilisateur__CREE);
                                            }else if(current_user.Role=='etudiant'){
                                            ck_setCookie("Authorisations", current_user.Authorisations);
                                            ck_setCookie("Centre_etudiant", current_user.Centre_etudiant);
                                            ck_setCookie("Promotion_etudiant", current_user.Promotion_etudiant);
                                            ck_setCookie("ID_Utilisateur__CREE", current_user.ID_Utilisateur__CREE);
                                            }else{
                                                ck_setCookie("Authorisations", 'Aucune');
                                            }
















                                    
                                        
                                        
                                        alert_html = '<div class="alert alert-success" role="alert">Requete terminé, tout s\'est bien passé</div>';
                                        if(typeof(Token_by_cookie)  === 'undefined'){
                                            error_or_not('reconnect');
                                        }else{
                                            
                                            error_or_not('0');
                                        }
                                        

                                        
                                        
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
                        
                        xhr.open("POST", "http://localhost/projet-web-frontend/api/login/connexion.php", true);
                        xhr.responseType = 'text';
                        console.log('envoi=> '+data);
                        
                        xhr.send(data);
                        
                    
                        
        } 
        else{
        
        alert_html = '<div class="alert alert-danger" role="alert">Les champs ne sont pas bien renseignés</div>';
        }
        
    
};