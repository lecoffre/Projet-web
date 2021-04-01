var number_of_item=6;
var first=0;
var actual_page=1;
var pilote;


function show_pilote()
{ 
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "api/pilote/lire_pilote.php", true);
    xhr.onload = function()
    {
         var html = '';
         if( xhr.status == 200 )
         {
            var response = JSON.parse(xhr.response);          
            pilote= response.pilote;              
                
            for(let i=first ;i< first + number_of_item;i++)
            {
                 if(i<pilote.length)
                {
                    current_pilote = pilote[i];
                    html += `<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6" id="`+ current_pilote.ID_Login +`" onclick="afficher_un_pilote(this.id)" style=" background-color: rgba(206, 206, 206, 0.247); padding: 10px; max-width:15%;">
                                <div class="card border-bottom-dark">
                                    <img style="width: auto; height:auto;" src="` + current_pilote.Photo_Utilisateur + `" >
                                    <div class="card-body" style="padding: 10px">
                                        <h5 class="card-title" style="font-size: 15px; margin: 0 0 4px 7px; text-align: center;">` + current_pilote.Nom  + ' ' + current_pilote.Prenom  + `</h5>
                                    </div>
                                </div>
                            </div>`;
                }
            }
        }
        else{
            html = '<p>Wrong request. Error: ' + xhr.status + '</p>';
        }
         
        document.getElementById("js-result-pilote").innerHTML = html;
        document.getElementById("nbResultat-pilote").innerHTML = pilote.length + " Résultats";
   
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
        show_pilote();
    }    
}

function next_page()
{
    if(first + number_of_item <=pilote.length)
    {
        first+=number_of_item;
        actual_page++;
        show_pilote();
    }
} 

function show_page_info()
{
    var max_page = Math.ceil (pilote.length  / number_of_item);
    document.getElementById('page_info_pilote').innerHTML= `${actual_page}/${max_page}`
    
}

function afficher_un_pilote(id_pilote){
    var param={
        "ID_Login":id_pilote
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
                unPilote= response; 

                // Ici, j'utilise le bouton pour lancer la fonction d'affichage de la popup modifier en recuperant l'ID
                html += `<div class="card-body">
                        <div class="row">
                            
                            <div class="col-lg-4">
                            <h6 class="card-title">`+ unPilote.Nom + ` `+ unPilote.Prenom +`</h6>
                            <p class="card-text" style="margin-bottom: 0;"> `+ unPilote.Role + `</p>
                            <div style="height: 1px; background-color: rgb(223, 223, 223);"></div>
                
                                <button
                                type="button"                                                           
                                data-toggle="modal"
                                data-target="#popup-modifier-pilote"
                                class="btn btn-primary" 
                                onclick="popup_modifier_pilote(this.id)" 
                                id="`+ unPilote.ID_Login + `"
                                style="margin: 13px 0 13px 0"
                                >Modifier</button>
                                <div style="height: 1px; background-color: rgb(223, 223, 223);"></div>

                            </div>
                            <div class="col-lg-4" style="border-left: 1px solid rgb(218, 218, 218);">
                                <div style="height: 1px; background-color: rgb(223, 223, 223);"></div>

                                <p class="card-text" style="margin-bottom: 0; margin-top: 8px; ">Centre de formation : `+ unPilote.Centre_pilote +`</p>
                                <p class="card-text" style="margin-bottom: 0;">Promotion : `+ unPilote.Promotion_pilote +`</p>
                                <div style="height: 1px; background-color: rgb(223, 223, 223); margin-top: 2px;"></div>
                            </div>
                            <div class="col-lg-4" style="border-left: 1px solid rgb(218, 218, 218);">
                                <img class="image-company " alt="100x100" src="`+ unPilote.Photo_Utilisateur +`" >
                            </div>
                        </div>
                    </div>`;
                }catch(e){
                    if(e=="SyntaxError: Unexpected end of JSON input"){
                        html = 'JSON incorrect (vide)';}
                    else if(e==   "SyntaxError: Unexpected token < in JSON at position 0"){
                        html = "Le pilote n'existe pas"
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
        document.getElementById("afficher_un_pilote").innerHTML = html;
       
    });
    
    xhr.open("POST", "api/pilote/lire_un_pilote.php", true);

    xhr.setRequestHeader("Content-Type", "application/json");
    
    xhr.responseType = 'text';

    console.log('envoi=> '+data);
    xhr.send(data);  
};

function popup_modifier_pilote(id_pilote){

    var param={
        "ID_Login":id_pilote,
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
                unPilote= response; 

                // Ici, j'essaye de mettre dans les placeholder les données de l'admin, le seul qui ne marche pas est le logo.
                document.getElementById("btnModifierPilote").id = id_pilote;
                document.getElementById("btnSupprimerPilote").id = id_pilote;
                document.getElementById("nomPilote1").value= unPilote.Nom;
                document.getElementById("prenomPilote1").value = unPilote.Prenom;
                document.getElementById("loginPilote1").value =  unPilote.Login;
                document.getElementById("mdpPilote1").value = unPilote.Mot_de_passe;
                document.getElementById("centrePilote1").value= unPilote.Centre_pilote;
                document.getElementById("promotionPilote1").value = unPilote.Promotion_pilote;
                document.getElementById("photoPilote1").value = unPilote.Photo_Utilisateur;

                
                console.log('fin html');
                }catch(e){
                    if(e=="SyntaxError: Unexpected end of JSON input"){
                        html = 'JSON incorrect (vide)';}
                    else if(e==   "SyntaxError: Unexpected token < in JSON at position 0"){
                        html = "Le pilote n'existe pas"
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
    xhr.open("POST", "api/pilote/lire_un_pilote.php", true);

                xhr.setRequestHeader("Content-Type", "application/json");
                
                xhr.responseType = 'text';
            
                console.log('envoi=> '+data);
                xhr.send(data); 
              
    
 
};

function modifier_pilote(id){
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
                        if(!window.alert(Nom + ' ' + Prenom + ' a bien été modifié')){document.forms['modifierPiloteForm'].reset();window.location.reload();}
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
    
        xhr.open("PUT", "api/utilisateur/modifier_utilisateur.php", true);

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

function supprimer_pilote(id){
    var Nom = document.getElementById("nomPilote1").value;
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
                        if(!window.alert(Nom + ' a bien été supprimée')){document.forms['modifierPiloteForm'].reset();window.location.reload();}
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
    
        xhr.open("DELETE", "api/suppression/suppression_pilote.php", true);

        xhr.setRequestHeader("Content-Type", "application/json");
        
        xhr.responseType = 'text';

        console.log('envoi=> '+data);
        xhr.send(data);
    }
    
  
    else{
    html="Parametres incorrects ou incomplets";
        }
}

window.onload = show_pilote();

