var number_of_item=6;
var first=0;
var actual_page=1;
var etudiant;


function show_etudiant()
{ 
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "api/etudiant/lire_etudiant.php", true);
    xhr.onload = function()
    {
         var html = '';
         if( xhr.status == 200 )
         {
            var response = JSON.parse(xhr.response);          
            etudiant= response.etudiant;              
                
            for(let i=first ;i< first + number_of_item;i++)
            {
                 if(i<etudiant.length)
                {
                    current_etudiant = etudiant[i];
                    html += `<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6" id="`+ current_etudiant.ID_Login +`" onclick="afficher_un_etudiant(this.id)" "style=" background-color: rgba(206, 206, 206, 0.247); padding: 10px; max-width:15%;">
                                <div class="card border-bottom-dark">
                                    <img style="width: auto; max-height: auto" src="` + current_etudiant.Photo_Utilisateur + `" >
                                    <div class="card-body" style="padding: 10px">
                                        <h5 class="card-title" style="font-size: 15px; margin: 0 0 4px 7px; text-align: center;">` + current_etudiant.Nom  + ' ' + current_etudiant.Prenom  + `</h5>
                                    </div>
                                </div>
                            </div>`;
                }
            }
        }
        else{
            html = '<p>Wrong request. Error: ' + xhr.status + '</p>';
        }
         
        document.getElementById("js-result-etudiant").innerHTML = html;
        document.getElementById("nbResultat-etudiant").innerHTML = etudiant.length + " Résultats";
   
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
        show_etudiant();
    }    
}

function next_page()
{
    if(first + number_of_item <=etudiant.length)
    {
        first+=number_of_item;
        actual_page++;
        show_etudiant();
    }
} 

function show_page_info()
{
    var max_page = Math.ceil (etudiant.length  / number_of_item);
    document.getElementById('page_info_etudiant').innerHTML= `${actual_page}/${max_page}`
    
}

function afficher_un_etudiant(id_etudiant){
    var param={
        "ID_Login":id_etudiant
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
                unEtudiant= response; 

                // Ici, j'utilise le bouton pour lancer la fonction d'affichage de la popup modifier en recuperant l'ID
                html += `<div class="card-body">
                        <div class="row">
                            
                            <div class="col-lg-4">
                            <h6 class="card-title">`+ unEtudiant.Nom + ` `+ unEtudiant.Prenom +`</h6>
                            <p class="card-text" style="margin-bottom: 0;"> `+ unEtudiant.Role + `</p>
                            <div style="height: 1px; background-color: rgb(223, 223, 223);"></div>
                
                                <button
                                type="button"                                                           
                                data-toggle="modal"
                                data-target="#popup-modifier-etudiant"
                                class="btn btn-primary" 
                                onclick="popup_modifier_etudiant(this.id)" 
                                id="`+ id_etudiant + `"
                                style="margin: 13px 0 13px 0"
                                >Modifier</button>
                                <div style="height: 1px; background-color: rgb(223, 223, 223);"></div>

                            </div>
                            <div class="col-lg-4" style="border-left: 1px solid rgb(218, 218, 218);">
                                <div style="height: 1px; background-color: rgb(223, 223, 223);"></div>

                                <p class="card-text" style="margin-bottom: 0; margin-top: 8px; ">Centre de formation : `+ unEtudiant.Centre_etudiant +`</p>
                                <p class="card-text" style="margin-bottom: 0;">Promotion : `+ unEtudiant.Promotion_etudiant +`</p>
                                <p class="card-text" style="margin-bottom: 0;">Spécialité : `+ unEtudiant.Specialite+`</p>
                                <div style="height: 1px; background-color: rgb(223, 223, 223); margin-top: 2px;"></div>
                            </div>
                            <div class="col-lg-4" style="border-left: 1px solid rgb(218, 218, 218);">
                                <img class="image-company " alt="100x100" src="`+ unEtudiant.Photo_Utilisateur +`" >
                            </div>
                        </div>
                    </div>`;
                }catch(e){
                    if(e=="SyntaxError: Unexpected end of JSON input"){
                        html = 'JSON incorrect (vide)';}
                    else if(e==   "SyntaxError: Unexpected token < in JSON at position 0"){
                        html = "L'etudiant n'existe pas"
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
        document.getElementById("afficher_un_etudiant").innerHTML = html;
       
    });
    
    xhr.open("POST", "api/etudiant/lire_un_etudiant.php", true);

    xhr.setRequestHeader("Content-Type", "application/json");
    
    xhr.responseType = 'text';

    console.log('envoi=> '+data);
    xhr.send(data);  
};

function popup_modifier_etudiant(id_etudiant){
    
    var param={
        "ID_Login":id_etudiant,
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
                unEtudiant= response; 

                // Ici, j'essaye de mettre dans les placeholder les données de l'admin, le seul qui ne marche pas est le logo.
                document.getElementById("btnModifierEtudiant").id = id_etudiant;
                document.getElementById("btnSupprimerEtudiant").id = id_etudiant;
                document.getElementById("nomEtudiant1").value= unEtudiant.Nom;
                document.getElementById("prenomEtudiant1").value = unEtudiant.Prenom;
                document.getElementById("loginEtudiant1").value =  unEtudiant.Login;
                document.getElementById("mdpEtudiant1").value = unEtudiant.Mot_de_passe;
                document.getElementById("centreEtudiant1").value= unEtudiant.Centre_etudiant;
                document.getElementById("promotionEtudiant1").value = unEtudiant.Promotion_etudiant;
                document.getElementById("photoEtudiant1").value = unEtudiant.Photo_Utilisateur;

                
              
                console.log('fin html');
                }catch(e){
                    if(e=="SyntaxError: Unexpected end of JSON input"){
                        html = 'JSON incorrect (vide)';}
                    else if(e==   "SyntaxError: Unexpected token < in JSON at position 0"){
                        html = "L'etudiant n'existe pas"
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
    
    xhr.open("POST", "api/etudiant/lire_un_etudiant.php", true);

    xhr.setRequestHeader("Content-Type", "application/json");
    
    xhr.responseType = 'text';

    console.log('envoi=> '+data);
    xhr.send(data);  
};

function modifier_etudiant(id_etudiant){
    var ID_Login = id_etudiant;
    var Nom = document.getElementById("nomEtudiant1").value;
    var Prenom = document.getElementById("prenomEtudiant1").value;
    var Login = document.getElementById("loginEtudiant1").value;
    var Mot_de_passe = document.getElementById("mdpEtudiant1").value;
    var Centre_etudiant = document.getElementById("centreEtudiant1").value;
    var Promotion_etudiant = document.getElementById("promotionEtudiant1").value;

    var logo = document.getElementById("photoEtudiant1").files[0].name;


    var html = '';
    if(true){
        
        param={
            "ID_Login":id_etudiant,
            "Nom":Nom,
            "Prenom" : Prenom,
            "Login" : Login,
            "Mot_de_passe" : Mot_de_passe,
            "Role" : "etudiant",
            "Centre_etudiant":Centre_etudiant,
            "Promotion_etudiant": Promotion_etudiant,
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
                        if(!window.alert(Nom + ' ' + Prenom + ' a bien été modifié')){document.forms['modifierEtudiantForm'].reset();window.location.reload();}
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

function supprimer_etudiant(id){
    var Nom = document.getElementById("nomEtudiant1").value;
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
                        if(!window.alert(Nom + ' a bien été supprimée')){document.forms['modifierEtudiantForm'].reset();window.location.reload();}
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
    
        xhr.open("DELETE", "api/suppression/suppression_etudiant.php", true);

        xhr.setRequestHeader("Content-Type", "application/json");
        
        xhr.responseType = 'text';

        console.log('envoi=> '+data);
        xhr.send(data);
    }
    
  
    else{
    html="Parametres incorrects ou incomplets";
        }
}


window.onload = show_etudiant();

