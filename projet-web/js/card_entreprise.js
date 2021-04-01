var number_of_item=8;
var first=0;
var actual_page=1;
let entreprise;




function afficher_company()
{ 
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "api/entreprise/lire_entreprise.php", true);
    xhr.onload = function()
    {
         var html = '';
         if( xhr.status == 200 )
         {
            var response = JSON.parse(xhr.response);          
            entreprise= response.entreprise;              
                
            for(let i=first ;i< first + number_of_item;i++)
            {
                 if(i<entreprise.length)
                {
                    current_company = entreprise[i];
                    html += `<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6" onclick="show_one_company(this.id)" id="`+ current_company.ID_Entreprise +`" style=" background-color: rgba(206, 206, 206, 0.247); padding: 10px;">
                                <div class="card border-bottom-dark">
                                    <img style="width: auto; height: 110px;  max-width: auto" src="` + current_company.Logo_Entreprise + `" >
                                    <div class="card-body" style="padding: 10px"><h5 class="card-title" style="font-size: 15px; margin: 0 0 4px 7px">` + current_company.Nom_entreprise +`</h5>
                                        <p class="card-text" style="font-size: 12px; margin: 0 0 0 7px">` + current_company.Localite_entreprise + `</p>
                                    </div>
                                </div>
                            </div>`;
                }
            }
        }
        else{
            html = '<p>Wrong request. Error: ' + xhr.status + '</p>';
        }
         
        document.getElementById("js-result-entreprise").innerHTML = html;
        document.getElementById("nbResultat-entreprise").innerHTML = entreprise.length + " Résultats";
   
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
        afficher_company();
    }    
}

function next_page()
{
    if(first + number_of_item <=entreprise.length)
    {
        first+=number_of_item;
        actual_page++;
        afficher_company();
    }
} 

function show_page_info()
{
    var max_page = Math.ceil (entreprise.length  / number_of_item);
    document.getElementById('page_info_entreprise').innerHTML= `${actual_page}/${max_page}`
    
}



function show_one_company(id_entre){
    var param={
        "ID_Entreprise":id_entre
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
                uneEntreprise= response; 

                // Ici, j'utilise le bouton pour lancer la fonction d'affichage de la popup modifier en recuperant l'ID
                html += `<div class="card-body">
                        <div class="row">
                            
                            <div class="col-lg-4">
                                <h6 class="card-title">`+ uneEntreprise.Nom_entreprise +`</h6>
                                <p class="card-text" style="margin-bottom: 0;"> `+ uneEntreprise.Localite_entreprise + `</p>
                                <div style="height: 1px; background-color: rgb(223, 223, 223);"></div>
                
                                <button
                                type="button"                                                           
                                data-toggle="modal"
                                data-target="#popup-modifier-entreprise"
                                class="btn btn-primary" 
                                onclick="popup_modifier_entreprise(this.id)" 
                                id="`+ uneEntreprise.ID_Entreprise + `"
                                style="margin: 13px 0 13px 0"
                                >Modifier</button>
                                <div style="height: 1px; background-color: rgb(223, 223, 223);"></div>

                            </div>
                            <div class="col-lg-4" style="border-left: 1px solid rgb(218, 218, 218);">
                                <div style="height: 1px; background-color: rgb(223, 223, 223);"></div>

                                <p class="card-text" style="margin-bottom: 0; margin-top: 8px; ">Secteur d'activité : `+ uneEntreprise.Secteur_activite +`</p>
                                <p class="card-text" style="margin-bottom: 0;">Compétences recherchées : `+ uneEntreprise.Competences_recherchees_dans_les_stages +`</p>
                                <p class="card-text" style="margin-bottom: 0;">Stagiaires CESI acceptés : `+ uneEntreprise.Nombre_de_stagiaires_CESI_deja_acceptes_en_stage+`</p>
                                <p class="card-text" style="margin-bottom: 0;">Evalutation_des_stagiaires : `+ uneEntreprise.Evaluation_des_stagiaires+`</p>
                                <p class="card-text" style="margin-bottom: 0;">Confiance du pilote de promotion : `+uneEntreprise.Confiance_du_Pilote_de_promotion+`</p>
                                <div style="height: 1px; background-color: rgb(223, 223, 223); margin-top: 2px;"></div>
                            </div>
                            <div class="col-lg-4" style="border-left: 1px solid rgb(218, 218, 218);">
                                <img class="image-company " alt="100x100" src="`+ uneEntreprise.Logo_Entreprise +`" >
                            </div>
                        </div>
                    </div>`;
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
        document.getElementById("afficher_une_entreprise").innerHTML = html;
       
    });
    
    xhr.open("POST", "api/entreprise/lire_une_entreprise.php", true);

    xhr.setRequestHeader("Content-Type", "application/json");
    
    xhr.responseType = 'text';

    console.log('envoi=> '+data);
    xhr.send(data);  
};



// Ici, la fonction pour afficher la popup modifier entreprise. J'ai mis en commentaire les variables logo car cela renvoit une erreur à propose de "files[0]".

function popup_modifier_entreprise(id_ent){

    var param={
        "ID_Entreprise":id_ent,
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
                uneEntreprise= response; 

                // Ici, j'essaye de mettre dans les placeholder les données de l'entreprise, le seul qui ne marche pas est le logo.
                document.getElementById("btnModifierEntreprise").id = id_ent;
                document.getElementById("btnSupprimerEntreprise").id = id_ent;
                document.getElementById("nomEntreprise1").value= uneEntreprise.Nom_entreprise;
                document.getElementById("SecteurActivie1").value = uneEntreprise.Secteur_activite;
                document.getElementById("CompRecherchees1").value =  uneEntreprise.Competences_recherchees_dans_les_stages;
                document.getElementById("nbStagiaireCESI1").value = uneEntreprise.Nombre_de_stagiaires_CESI_deja_acceptes_en_stage;
                document.getElementById("noteEntreprise1").value = uneEntreprise.Evaluation_des_stagiaires;
                document.getElementById("notePilote1").value = uneEntreprise.Confiance_du_Pilote_de_promotion;
                document.getElementById("localite1").value = uneEntreprise.Localite_entreprise;
                document.getElementById("logoEntreprise1").value= uneEntreprise.Logo_Entreprise; 

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
    
    xhr.open("POST", "api/entreprise/lire_une_entreprise.php", true);

    xhr.setRequestHeader("Content-Type", "application/json");
    
    xhr.responseType = 'text';

    console.log('envoi=> '+data);
    xhr.send(data);  
};



// Ici, cette fonction est lancé après avoir rempli le formulaire et lorsque l'on clique sur le bouton Modifier l'entreprise.cette fonction n'a pas encore été testé.

function modifier_entreprise(id_entre){
    var ID_Entreprise = id_entre;
    var nomEntreprise2 = document.getElementById("nomEntreprise1").value;
    var secteurActivite2 = document.getElementById("SecteurActivie1").value;
    var comp2 = document.getElementById("CompRecherchees1").value;
    var nbStagiaire2 = document.getElementById("nbStagiaireCESI1").value;
    var noteEntreprise2 = document.getElementById("noteEntreprise1").value;
    var confPilote2 = document.getElementById("notePilote1").value;
    var localtite2 = document.getElementById("localite1").value;
    var logo = document.getElementById("logoEntreprise1").files[0].name;
    var idUtilisateur = ID_Utilisateur_by_cookie;

    var html = '';
    if(true){
        
        param={
            "ID_Entreprise":ID_Entreprise,
            "Nom_entreprise":nomEntreprise2,
            "Secteur_activite" : secteurActivite2,
            "Competences_recherchees_dans_les_stages" : comp2,
            "Nombre_de_stagiaires_CESI_deja_acceptes_en_stage" : nbStagiaire2,
            "Evaluation_des_stagiaires" : noteEntreprise2,
            "Confiance_du_Pilote_de_promotion" : confPilote2,
            "Localite_entreprise" : localtite2,
            "Logo_Entreprise" : "api/img/entreprises/"+logo,
            "ID_Utilisateur":idUtilisateur,
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
                        if(!window.alert(nomEntreprise2 + ' a bien été modifié')){document.forms['ModifierEntrepriseForm'].reset();window.location.reload();}
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
    
        xhr.open("PUT", "api/entreprise/modifier_entreprise.php", true);

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


function supprimer_entreprise(id_entre){
    var nomEntreprise2 = document.getElementById("nomEntreprise1").value;
    if(true){
        
        param={
            "ID_Entreprise":id_entre,
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
                        if(!window.alert(nomEntreprise2 + ' a bien été supprimée')){document.forms['ModifierEntrepriseForm'].reset();window.location.reload();}
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
    
        xhr.open("DELETE", "api/entreprise/supprimer_entreprise.php", true);

        xhr.setRequestHeader("Content-Type", "application/json");
        
        xhr.responseType = 'text';

        console.log('envoi=> '+data);
        xhr.send(data);
    }
    
  
    else{
    html="Parametres incorrects ou incomplets";
        }
}

window.onload = afficher_company();
