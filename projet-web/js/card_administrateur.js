var number_of_item=6;
var first=0;
var actual_page=1;
var administrateur;


function show_administrateur()
{ 
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/api/administrateur/lire_administrateur.php", true);
    xhr.onload = function()
    {
         var html = '';
         if( xhr.status == 200 )
         {
            var response = JSON.parse(xhr.response);          
            administrateur= response.administrateur;
                
            for(let i=first ;i< first + number_of_item;i++)
            {
                 if(i<administrateur.length)
                {
                    current_administrateur = administrateur[i];
                    html += `<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6" id="`+ current_administrateur.ID_Login +`" onclick="show_one_admin(this.id)" style="background-color: rgba(206, 206, 206, 0.247); padding: 10px; max-width:15%;">
                                <div class="card border-bottom-dark">
                                    <img style="width: auto; height:auto;" src="` + current_administrateur.Photo_Utilisateur + `" >
                                    <div class="card-body" style="padding: 10px">
                                        <h5 class="card-title" style="font-size: 15px; margin: 0 0 4px 7px;text-align: center;">` + current_administrateur.Nom  + ' ' + current_administrateur.Prenom  + `</h5>
                                    </div>
                                </div>
                            </div>`;
                }
            }
        }
        else{
            html = '<p>Wrong request. Error: ' + xhr.status + '</p>';
        }
         
        document.getElementById("js-result-administrateur").innerHTML = html;
        document.getElementById("nbResultat-administrateur").innerHTML = administrateur.length + " Résultats";
   
        show_page_info();
    };
    xhr.send();   
}


 
 function previous_page()
{
    if(first - number_of_item >= 0)
    {
        first-=number_of_item;
        actual_page --;
        show_administrateur();
    }    
}

function next_page()
{
    if(first + number_of_item <=administrateur.length)
    {
        first+=number_of_item;
        actual_page++;
        show_administrateur();
    }
} 

function show_page_info()
{
    var max_page = Math.ceil (administrateur.length  / number_of_item);
    document.getElementById('page_info_administrateur').innerHTML= `${actual_page}/${max_page}`
    
}

function show_one_admin(id_admin){
    var param={
        "ID_Login":id_admin
    }
    var html = '';
    var data = JSON.stringify(param);
    var xhr = new XMLHttpRequest();
    xhr.withCredentials = true;
    xhr.addEventListener("readystatechange", function() 
    {
        if( this.readyState === 4) 
        {
        
            console.log(xhr.readyState+", requete finie, statut : "+ xhr.status+", reponse: "+ xhr.response);
            if( xhr.status == 200 )
                {
                try{
                
                var response = JSON.parse(xhr.response);
                unAdmin= response; 

                // Ici, j'utilise le bouton pour lancer la fonction d'affichage de la popup modifier en recuperant l'ID
                html += `<div class="card-body">
                        <div class="row">
                            
                            <div class="col-lg-4">
                                <h6 class="card-title">`+ unAdmin.Nom + ` `+ unAdmin.Prenom +`</h6>
                                <p class="card-text" style="margin-bottom: 0;"> `+ unAdmin.Role + `</p>
                                <div style="height: 1px; background-color: rgb(223, 223, 223);"></div>
                
                                <button
                                type="button"                                                           
                                data-toggle="modal"
                                data-target="#popup-modifier-administrateur"
                                class="btn btn-primary" 
                                onclick="popup_modifier_admin(this.id)" 
                                id="`+ unAdmin.ID_Login + `"
                                style="margin: 13px 0 13px 0"
                                >Modifier</button>
                                <div style="height: 1px; background-color: rgb(223, 223, 223);"></div>

                            </div>
                            <div class="col-lg-4" style="border-left: 1px solid rgb(218, 218, 218);">
                                <div style="height: 1px; background-color: rgb(223, 223, 223);"></div>
                            </div>
                            <div class="col-lg-4" style="border-left: 1px solid rgb(218, 218, 218);">
                                <img class="image-company " alt="100x100" src="`+ unAdmin.Photo_Utilisateur +`" >
                            </div>
                        </div>
                    </div>`;
                }catch(e){
                    if(e=="SyntaxError: Unexpected end of JSON input"){
                        html = 'JSON incorrect (vide)';}
                    else if(e==   "SyntaxError: Unexpected token < in JSON at position 0"){
                        html = "L'admin n'existe pas"
                        }
                    else{
                        html ='erreur ==> '+e+'';
                    }
                }
            }
            else{
                    html = '<p>Wrong request. Error: ' + xhr.status + '</p>';
                }
        }
        document.getElementById("afficher_un_admin").innerHTML = html;
       
    });
    
    xhr.open("POST", "/api/administrateur/lire_un_administrateur.php", true);

    xhr.setRequestHeader("Content-Type", "application/json");
    
    xhr.responseType = 'text';

    console.log('envoi=> '+data);
    xhr.send(data);  
};

function popup_modifier_admin(id_admin){

    var param={
        "ID_Login":id_admin,
    }
    var html = '';
    var data = JSON.stringify(param);
    var xhr = new XMLHttpRequest();
    xhr.withCredentials = true;
    xhr.addEventListener("readystatechange", function() 
    {
        if( this.readyState === 4) 
        {
        
            console.log(xhr.readyState+", requete finie, statut : "+ xhr.status+", reponse: "+ xhr.response);
            if( xhr.status == 200 )
                {
                try{
                
                var response = JSON.parse(xhr.response);
                unAdmin= response; 

                // Ici, j'essaye de mettre dans les placeholder les données de l'admin, le seul qui ne marche pas est le logo.
                document.getElementById("btnModifierAdministrateur").id = id_admin;
                document.getElementById("btnSupprimerAdministrateur").id = id_admin;
                document.getElementById("nomAdmin1").value= unAdmin.Nom;
                document.getElementById("prenomAdmin1").value = unAdmin.Prenom;
                document.getElementById("loginAdmin1").value =  unAdmin.Login;
                document.getElementById("mdpAdmin1").value = unAdmin.Mot_de_passe;
                document.getElementById("photoAdmin1").value = unAdmin.Photo_Utilisateur;

                
              
                console.log('fin html');
                }catch(e){
                    if(e=="SyntaxError: Unexpected end of JSON input"){
                        html = 'JSON incorrect (vide)';}
                    else if(e==   "SyntaxError: Unexpected token < in JSON at position 0"){
                        html = "L'entreprise n'existe pas"
                        }
                    else{
                        html ='erreur ==> '+e+'';
                    }
                }
            }
            else{
                    html = '<p>Wrong request. Error: ' + xhr.status + '</p>';
                }
        }
    });
    
    xhr.open("POST", "/api/administrateur/lire_un_administrateur.php", true);

    xhr.setRequestHeader("Content-Type", "application/json");
    
    xhr.responseType = 'text';

    console.log('envoi=> '+data);
    xhr.send(data);  
};

function modifier_administrateur(id_admin){
    var ID_Login = id_admin;
    var Nom = document.getElementById("nomAdmin1").value;
    var Prenom = document.getElementById("prenomAdmin1").value;
    var Login = document.getElementById("loginAdmin1").value;
    var Mot_de_passe = document.getElementById("mdpAdmin1").value;

    var logo = document.getElementById("photoAdmin1").files[0].name;

    var html = '';
    if(true){
        
        param={
            "ID_Login":id_admin,
            "Nom":Nom,
            "Prenom" : Prenom,
            //"Login" : Login,
            //"Mot_de_passe" : Mot_de_passe,
            "Role" : "administrateur",
            "Photo_Utilisateur" : "api/img/users/"+logo
        }
        var data = JSON.stringify(param);
        var xhr = new XMLHttpRequest();
        xhr.withCredentials = true;
        xhr.addEventListener("readystatechange", function() 
        {
            if( this.readyState === 4) 
            {
                console.log(xhr.readyState+", requete finie, statut : "+ xhr.status+", reponse: "+ xhr.response);
                if( xhr.status == 200 )
                {
                    try{
                        if(!window.alert(Nom + ' ' + Prenom + ' a bien été modifié')){document.forms['ModifierAdministrateurForm'].reset();window.location.reload();}
                    }catch(e){
                        if(e=="SyntaxError: Unexpected end of JSON input"){
                            html = 'JSON incorrect (vide)';
                        }else{
                            html ='erreur ==> '+e+'';
                        }
                    }
                }
                else{
                        window.alert('Mauvaise requête. Erreur : '+xhr.statuts);
                    }
            }
        });
    
        xhr.open("PUT", "/api/utilisateur/modifier_utilisateur.php", true);

        xhr.setRequestHeader("Content-Type", "application/json");
        
        xhr.responseType = 'text';

        console.log('envoi=> '+data);
        xhr.send(data);
    }
    
  
    else{
    html="Parametres incorrects ou incomplets";
        }
        
    //document.getElementById("resultat-requete").innerHTML = html;
}

function supprimer_administrateur(id_admin){
    var Nom = document.getElementById("nomAdmin1").value;
    if(true){
        
        param={
            "ID_Login":id_admin,
        }
        var data = JSON.stringify(param);
        var xhr = new XMLHttpRequest();
        xhr.withCredentials = true;
        xhr.addEventListener("readystatechange", function() 
        {
            if( this.readyState === 4) 
            {
                console.log(xhr.readyState+", requete finie, statut : "+ xhr.status+", reponse: "+ xhr.response);
                if( xhr.status == 200 )
                {
                    try{
                        if(!window.alert(Nom + ' a bien été supprimée')){document.forms['ModifierAdministrateurForm'].reset();window.location.reload();}
                    }catch(e){
                        if(e=="SyntaxError: Unexpected end of JSON input"){
                            html = 'JSON incorrect (vide)';
                        }else{
                            html ='erreur ==> '+e+'';
                        }
                    }
                }
                else{
                        window.alert('Mauvaise requête. Erreur : '+xhr.statuts);
                    }
            }
        });
    
        xhr.open("DELETE", "api/suppression/suppression_administrateur.php", true);

        xhr.setRequestHeader("Content-Type", "application/json");
        
        xhr.responseType = 'text';

        console.log('envoi=> '+data);
        xhr.send(data);
    }
    
  
    else{
    html="Parametres incorrects ou incomplets";
        }
}


window.onload = show_administrateur();

