var number_of_item=6;
var first=0;
var actual_page=1;
var delegue;


function show_delegue()
{ 
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "http://localhost/projet-web-frontend/api/delegue/lire_delegue.php", true);
    xhr.onload = function()
    {
         var html = '';
         if( xhr.status == 200 )
         {
            var response = JSON.parse(xhr.response);          
            delegue= response.delegue;              
                
            for(let i=first ;i< first + number_of_item;i++)
            {
                 if(i<delegue.length)
                {
                    current_delegue = delegue[i];
                    html += `<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6" id="`+ current_delegue.ID_Login +`" onclick="afficher_un_delegue(this.id)" style=" background-color: rgba(206, 206, 206, 0.247); padding: 10px; max-width:15%;">
                                <div class="card border-bottom-dark">
                                    <img style="width: auto; height:auto;" src="`+ current_delegue.Photo_Utilisateur + `">
                                    <div class="card-body" style="padding: 10px">
                                        <h5 class="card-title" style="font-size: 15px; margin: 0 0 4px 7px;text-align: center;">`
                                            + current_delegue.Nom  + ' ' + current_delegue.Prenom  + 
                                        `</h5>
                                    </div>
                                </div>
                            </div>`;
                }
            }
        }
        else{
            html = '<p>Wrong request. Error: ' + xhr.status + '</p>';
        }
         
        document.getElementById("js-result-delegue").innerHTML = html;
        document.getElementById("nbResultat-delegue").innerHTML = delegue.length + " Résultats";
   
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
        show_delegue();
    }    
}

function next_page()
{
    if(first + number_of_item <=delegue.length)
    {
        first+=number_of_item;
        actual_page++;
        show_delegue();
    }
} 

function show_page_info()
{
    var max_page = Math.ceil (delegue.length  / number_of_item);
    document.getElementById('page_info_delegue').innerHTML= `${actual_page}/${max_page}`
    
}

function afficher_un_delegue(id_delegue){
    var param={
        "ID_Login":id_delegue
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
                unDelegue= response; 

                // Ici, j'utilise le bouton pour lancer la fonction d'affichage de la popup modifier en recuperant l'ID
                html += `<div class="card-body">
                        <div class="row">
                            
                            <div class="col-lg-4">
                            <h6 class="card-title">`+ unDelegue.Nom + ` `+ unDelegue.Prenom +`</h6>
                            <p class="card-text" style="margin-bottom: 0;"> `+ unDelegue.Role + `</p>
                            <div style="height: 1px; background-color: rgb(223, 223, 223);"></div>
                
                                <button
                                type="button"                                                           
                                data-toggle="modal"
                                data-target="#popup-modifier-delegue"
                                class="btn btn-primary" 
                                onclick="popup_modifier_delegue(this.id)" 
                                id="`+ id_delegue + `"
                                style="margin: 13px 0 13px 0"
                                >Modifier</button>
                                <div style="height: 1px; background-color: rgb(223, 223, 223);"></div>

                            </div>
                            <div class="col-lg-4" style="border-left: 1px solid rgb(218, 218, 218);">
                                <div style="height: 1px; background-color: rgb(223, 223, 223);"></div>

                                <p class="card-text" style="margin-bottom: 0; margin-top: 8px; ">Centre de formation : `+ unDelegue.Centre_Delegue +`</p>
                                <p class="card-text" style="margin-bottom: 0;">Promotion : `+ unDelegue.Promotion_delegue +`</p>
                                <p class="card-text" style="margin-bottom: 0;">Spécialité : `+ unDelegue.Specialite+`</p>
                                <div style="height: 1px; background-color: rgb(223, 223, 223); margin-top: 2px;"></div>
                            </div>
                            <div class="col-lg-4" style="border-left: 1px solid rgb(218, 218, 218);">
                                <img class="image-company " alt="100x100" src="`+ unDelegue.Photo_Utilisateur +`" >
                            </div>
                        </div>
                    </div>`;
                }catch(e){
                    if(e=="SyntaxError: Unexpected end of JSON input"){
                        html = 'JSON incorrect (vide)';}
                    else if(e==   "SyntaxError: Unexpected token < in JSON at position 0"){
                        html = "Le delegue n'existe pas"
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
        document.getElementById("afficher_un_delegue").innerHTML = html;
       
    });
    
    xhr.open("POST", "http://localhost/projet-web-frontend/api/delegue/lire_un_delegue.php", true);

    xhr.setRequestHeader("Content-Type", "application/json");
    
    xhr.responseType = 'text';

    console.log('envoi=> '+data);
    xhr.send(data);  
};


function popup_modifier_delegue(id_delegue){

    var param={
        "ID_Login":id_delegue,
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
                unDelegue= response; 

                // Ici, j'essaye de mettre dans les placeholder les données de l'admin, le seul qui ne marche pas est le logo.
                document.getElementById("btnModifierDelegue").id = id_delegue;
                document.getElementById("btnSupprimerDelegue").id = id_delegue;
                document.getElementById("nomDelegue1").value= unDelegue.Nom;
                document.getElementById("prenomDelegue1").value = unDelegue.Prenom;
                document.getElementById("loginDelegue1").value =  unDelegue.Login;
                document.getElementById("mdpDelegue1").value = unDelegue.Mot_de_passe;
                document.getElementById("centreDelegue1").value= unDelegue.Centre_Delegue;
                document.getElementById("promotionDelegue1").value = unDelegue.Promotion_delegue;
                document.getElementById("photoDelegue1").value = unDelegue.Photo_Utilisateur;
                document.getElementById("Creer_une_entreprise1").value = unDelegue.Creer_une_entreprise;
                document.getElementById("Modifier_une_entreprise1").value = unDelegue.Modifier_une_entreprise;
                document.getElementById("Evaluer_une_entreprise").value = unDelegue.Evaluer_une_entreprise;
                document.getElementById("Supprimer_une_entreprise").value = unDelegue.Supprimer_une_entreprise;
                document.getElementById("Consulter_les_stats_des_entreprises").value = unDelegue.Consulter_les_stats_des_entreprises;
                document.getElementById("Rechercher_une_offre").value = unDelegue.Rechercher_une_offre;
                document.getElementById("Creer_une_offre").value = unDelegue.Creer_une_offre;
                document.getElementById("Modifier_une_offre").value = unDelegue.Modifier_une_offre;
                document.getElementById("Supprimer_une_offre").value = unDelegue.Supprimer_une_offre;
                document.getElementById("Consulter_les_stats_des_offres").value = unDelegue.Consulter_les_stats_des_offres;
                document.getElementById("Rechercher_un_compte_pilote").value = unDelegue.Rechercher_un_compte_pilote;
                document.getElementById("Creer_un_compte_pilote").value = unDelegue.Creer_un_compte_pilote;
                document.getElementById("Creer_un_compte_etudiant").value = unDelegue.Creer_un_compte_etudiant;
                document.getElementById("Modifier_un_compte_etudiant").value = unDelegue.Modifier_un_compte_etudiant;
                document.getElementById("Supprimer_un_compte_etudiant").value = unDelegue.Supprimer_un_compte_etudiant;
                document.getElementById("Consulter_les_stats_des_etudiants").value = unDelegue.Consulter_les_stats_des_etudiants;
                document.getElementById("Informer_le_systeme_de_l_avancement_de_la_candidature_step_3").value = unDelegue.Informer_le_systeme_de_l_avancement_de_la_candidature_step_3;
                document.getElementById("Informer_le_systeme_de_l_avancement_de_la_candidature_step_4").value = unDelegue.Informer_le_systeme_de_l_avancement_de_la_candidature_step_4;
                
              
                console.log('fin html');
                }catch(e){
                    if(e=="SyntaxError: Unexpected end of JSON input"){
                        html = 'JSON incorrect (vide)';}
                    else if(e==   "SyntaxError: Unexpected token < in JSON at position 0"){
                        html = "Le delegue n'existe pas"
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
    
    xhr.open("POST", "http://localhost/projet-web-frontend/api/delegue/lire_un_delegue.php", true);

    xhr.setRequestHeader("Content-Type", "application/json");
    
    xhr.responseType = 'text';

    console.log('envoi=> '+data);
    xhr.send(data);  
};


function modifier_delegue(id){
    var ID_Login = id;
    var Nom = document.getElementById("nomPilote1").value;
    var Prenom = document.getElementById("prenomPilote1").value;
    var Login = document.getElementById("loginPilote1").value;
    var Mot_de_passe = document.getElementById("mdpPilote1").value;
    var Centre_pilote = document.getElementById("centrePilote1").value;
    var Promotion_pilote = document.getElementById("promotionPilote1").value;
    var logo = document.getElementById("photoPilote1").files[0].name;

    var html = '';
    if(true){
        
        param={
            "ID_Login":id,
            "Nom":Nom,
            "Prenom" : Prenom,
            "Login" : Login,
            "Mot_de_passe" : Mot_de_passe,
            "Role" : "pilote",
            "Centre_pilote":Centre_pilote,
            "Promotion_pilote": Promotion_pilote,
            "Photo_Utilisateur" : "api/img/users/"+logo,
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
                        if(!window.alert(Nom + ' ' + Prenom + ' a bien été modifié')){document.forms['ModifierDelegueForm'].reset();window.location.reload();}
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
    
        xhr.open("PUT", "http://localhost/projet-web-frontend/api/utilisateur/modifier_utilisateur.php", true);

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

function supprimer_delegue(id){
    var Nom = document.getElementById("nomDelegue1").value;
    if(true){
        
        param={
            "ID_Login":id,
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
                        
                        if(!window.alert(Nom + ' a bien été supprimée')){document.forms['ModifierDelegueForm'].reset();window.location.reload();}
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
        xhr.open("DELETE", "http://localhost/projet-web-frontend/api/suppression/suppression_delegue.php", true);

        xhr.setRequestHeader("Content-Type", "application/json");
        
        xhr.responseType = 'text';

        console.log('envoi=> '+data);
        xhr.send(data);

    }
    
  
    else{
    html="Parametres incorrects ou incomplets";
        }
}


window.onload = show_delegue();

