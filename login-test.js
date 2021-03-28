window.onload = function() {
    get_api_connexion();
}; 




/*----------------------------------PAGE LOG-IN----------------------------------------------------------*/
document.getElementById("login").onclick = function(){login();};

/*----------------------------------PAGE LOG-IN----------------------------------------------------------*/


function get_api_connexion() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "http://localhost/api/test/test_connexion.php" , true);
    xhr.onload = function()
    { 
        var html = '';
        try{
        if( xhr.status == 200 )
        {
            var response = JSON.parse(xhr.response);
            var message_co = response.message_connexion;

            html = '<div class="alert alert-success" role="alert">'+message_co+'</div>';
            document.getElementsByClassName('chargement_login')[0].style.visibility = 'visible';

        }
        else{html = '<p>Wrong request. Error: ' + xhr.status + '</p>';}
      }catch(e){
        console.log(e);
        html = '<div class="alert alert-danger" role="alert">Erreur de connexion à la bdd/API, actualisez ou réessayez plus tard</div>';
     }
        document.getElementById("connexion_js").innerHTML = html;
    };
    xhr.send();   
    
}










function login() {
    var Login = document.forms["se_connecter"]["Login"].value;
    var Mot_de_passe = document.forms["se_connecter"]["Mot_de_passe"].value;
    var html = '';
    if(Login != "" && Mot_de_passe != "")
    {
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
                    if( xhr.status == 200 )
                        {
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
                        if(typeof current_user.Token !== 'undefined'){html += '<p> token: '+current_user.Token+'</p>';};
                        if(typeof current_user.Nouveau_Token !== 'undefined'){html += '<p> nouveau token: '+current_user.Nouveau_Token+'</p>';};
                        html += '<p>image : --------------------------------</p><img style="height: auto; width: auto; max-height: 80px;  max-width: 80px" src="'+ current_user.Photo_Utilisateur+'">';
                        html += '<p>----------------------------------------</p>';
                        html += '</div><hr>';
                        console.log('fin html');
                        }catch(e){
                            if(e=="SyntaxError: Unexpected end of JSON input"){
                                html = 'JSON incorrect (vide)';
                            }else if(e==   "SyntaxError: Unexpected token < in JSON at position 0"){
                                html = "L'utilisateur n'existe pas"
                              }else{
                                  html ='erreur ==> '+e+'';
                                }
                    }
                }
                else{
                        html = '<p>Wrong request. Error: ' + xhr.status + '</p>';
                    }
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
        html = 'Les champs ne sont pas bien renseignés'
        document.getElementById("resultat-requete").innerHTML = html;
    }
};