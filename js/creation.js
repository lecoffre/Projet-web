

function creation_entreprise(){
    var nomEntreprise = document.getElementById("nomEntreprise").value;
    var secteurActivite = document.getElementById("SecteurActivie").value;
    var comp = document.getElementById("CompRecherchees").value;
    var nbStagiaire = document.getElementById("nbStagiaireCESI").value;
    var noteEntreprise = document.getElementById("noteEntreprise").value;
    var confPilote = document.getElementById("notePilote").value;
    var localtite = document.getElementById("localite").value;
    var logo = document.getElementById("logoEntreprise").files[0].name;
    var idUtilisateur = "1";

    var html = '';
    if(true){
        param={
            "Nom_entreprise":nomEntreprise,
            "Secteur_activite" : secteurActivite,
            "Competences_recherchees_dans_les_stages" : comp,
            "Nombre_de_stagiaires_CESI_deja_acceptes_en_stage" : nbStagiaire,
            "Evaluation_des_stagiaires" : noteEntreprise,
            "Confiance_du_Pilote_de_promotion" : confPilote,
            "Localite_entreprise" : localtite,
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
                if( xhr.status == 201 )
                {
                    try{
                    if(!window.alert(nomEntreprise + ' a bien été ajouté')){document.forms['creationEntrepriseForm'].reset();window.location.reload();}
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
    
        xhr.open("POST", "http://localhost/projet-web-frontend/api/entreprise/creer_entreprise.php", true);

        xhr.setRequestHeader("Content-Type", "application/json");
        
        xhr.responseType = 'text';
        xhr.send(data);
    }
    
  
    else{
        html="Parametres incorrects ou incomplets";
    }
}
   

function creation_offre(){
    var nomOffre = document.getElementById("nomOffre").value;
    var secteurActivite = document.getElementById("secteurActivite").value;
    var compRecherchees = document.getElementById("compRecherchees").value;
    var nomEntreprise = document.getElementById("nomEntreprise").value;
    var promoConcernee = document.getElementById("promoConcernee").value;
    var dureeStage = document.getElementById("dureeStage").value;
    var remuneration = document.getElementById("remuneration").value;
    var dateOffre = document.getElementById("dateOffre").value;
    var placeDispoOffre = document.getElementById("placeDispoOffre").value;
    var localite = document.getElementById("localite").value;
    var idEntreprise = document.getElementById("idEntreprise").value;
    var idUtilisateur = "1";

    var html = '';
    if(true){
        param={
            "Titre_offre":nomOffre,
            "Secteur" : secteurActivite,
            "Competences_offre" : compRecherchees,
            "Entreprise_offre" : nomEntreprise,
            "Type_de_promotion_concernee" : promoConcernee,
            "Duree_du_stage" : dureeStage,
            "Base_de_remuneration" : remuneration,
            "Date_de_offre" : dateOffre,
            "Nombre_de_places_disponible" : placeDispoOffre,
            "Localite_offre" : localite,
            "ID_Entreprise" : idEntreprise,
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
                if( xhr.status == 201 )
                {
                    try{
                    if(!window.alert('L\'offre pour '+nomEntreprise+' a bien été ajouté')){document.forms['creationOffreForm'].reset();window.location.reload();}
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
    
        xhr.open("POST", "http://localhost/projet-web-frontend/api/entreprise/creer_entreprise.php", true);

        xhr.setRequestHeader("Content-Type", "application/json");
        
        xhr.responseType = 'text';
        xhr.send(data);
    }
    
  
    else{
        html="Parametres incorrects ou incomplets";
    }
}


function creation_administrateur(){
    var nomAdmin = document.getElementById("nomAdmin").value;
    var prenomAdmin = document.getElementById("prenomAdmin").value;
    var loginAdmin = document.getElementById("loginAdmin").value;
    var mdpAdmin = document.getElementById("mdpAdmin").value;
    var photoAdmin = document.getElementById("photoAdmin").files[0].name;

    if(true){
        param={
            "Login" : loginAdmin,
            "Mot_de_passe" : mdpAdmin,
            "Nom":nomAdmin,
            "Prenom" : prenomAdmin,
            "Photo_Utilisateur" : "api/img/users/"+photoAdmin,
        }
        var data = JSON.stringify(param);
        console.log(data);
        var xhr = new XMLHttpRequest();
        xhr.withCredentials = true;
        xhr.addEventListener("readystatechange", function() 
        {
            if( this.readyState === 4) 
            {
                console.log(xhr.readyState+", requete finie, statut : "+ xhr.status+", reponse: "+ xhr.response);
                if( xhr.status == 201 )
                {
                    try{
                        if(!window.alert(nomAdmin + ' ' + prenomAdmin + ' a bien été ajouté')){document.forms['creationAdministrateurForm'].reset();window.location.reload();}
                    }catch(e){
                        if(e=="SyntaxError: Unexpected end of JSON input"){
                            window.alert('JSON incorrect (vide)');
                        }else{
                            window.alert('Erreur : '+e);
                        }
                    }
                }
                else{
                    window.alert('Mauvaise requête. Erreur : '+xhr.statuts);
                }
            }
        });
    
        xhr.open("POST", "http://localhost/projet-web-frontend/api/creation/creation_administrateur.php", true);

        xhr.setRequestHeader("Content-Type", "application/json");
        
        xhr.responseType = 'text';

        xhr.send(data);
    }
    
  
    else{
        html="Parametres incorrects ou incomplets";
    }
        
}


function creation_pilote(){
    var nomPilote = document.getElementById("nomPilote").value;
    var prenomPilote = document.getElementById("prenomPilote").value;
    var loginPilote = document.getElementById("loginPilote").value;
    var mdpPilote = document.getElementById("mdpPilote").value;
    var centrePilote = document.getElementById("centrePilote").value;
    var promotionPilote = document.getElementById("promotionPilote").value;
    var photoPilote = document.getElementById("photoPilote").files[0].name;
    var idCreateur = "1";

    var html = '';
    if(true){
        param={
            "Nom":nomPilote,
            "Prenom" : prenomPilote,
            "Login" : loginPilote,
            "Mot_de_passe" : mdpPilote,
            "Centre_pilote" : centrePilote,
            "Promotion_pilote" : promotionPilote,
            "Photo_Utilisateur" : "api/img/users/"+photoPilote,
            "ID_Utilisateur_Administrateur":idCreateur,
        }
        var data = JSON.stringify(param);
        var xhr = new XMLHttpRequest();
        xhr.withCredentials = true;
        xhr.addEventListener("readystatechange", function() 
        {
            if( this.readyState === 4) 
            {
                console.log(data);
                console.log(xhr.readyState+", requete finie, statut : "+ xhr.status+", reponse: "+ xhr.response);
                if( xhr.status == 201 )
                {
                    try{
                        if(!window.alert('Le pilote '+nomPilote + ' '+ prenomPilote +' a bien été ajouté')){document.forms['creationPiloteForm'].reset();window.location.reload();}
                    }catch(e){
                        if(e=="SyntaxError: Unexpected end of JSON input"){
                            window.alert('JSON incorrect (vide)');
                        }else{
                            window.alert('Erreur : '+e);
                        }
                    }
                }
                else{
                    window.alert('Mauvaise requête. Erreur : '+xhr.statuts);
                }
            }
        });
    
        xhr.open("POST", "http://localhost/projet-web-frontend/api/creation/creation_pilote.php", true);

        xhr.setRequestHeader("Content-Type", "application/json");
        
        xhr.responseType = 'text';

        xhr.send(data);
    }
    else{
        html="Parametres incorrects ou incomplets";
    }
}


function creation_delegue(){
    var nomDelegue = document.getElementById("nomDelegue").value;
    var prenomDelegue = document.getElementById("prenomDelegue").value;
    var loginDelegue = document.getElementById("loginDelegue").value;
    var mdpDelegue = document.getElementById("mdpDelegue").value;
    var centreDelegue = document.getElementById("centreDelegue").value;
    var promotionDelegue = document.getElementById("promotionDelegue").value;
    var specialiteDelegue = document.getElementById("specialiteDelegue").value;
    var photoDelegue = document.getElementById("photoDelegue").files[0].name;
    var idCreateur = "1";

    var html = '';
    if(true){
        param={
            "Nom":nomDelegue,
            "Prenom" : prenomDelegue,
            "Login" : loginDelegue,
            "Mot_de_passe" : mdpDelegue,
            "Centre_Delegue" : centreDelegue,
            "Promotion_delegue" : promotionDelegue,
            "Specialite" : specialiteDelegue,
            "Role" : "Delegue",
            "Photo_Utilisateur" : "api/img/users/"+photoDelegue,
            "ID_Utilisateur__CREE":idCreateur,
        }
        var data = JSON.stringify(param);
        var xhr = new XMLHttpRequest();
        xhr.withCredentials = true;
        xhr.addEventListener("readystatechange", function() 
        {
            if( this.readyState === 4) 
            {
                console.log(xhr.readyState+", requete finie, statut : "+ xhr.status+", reponse: "+ xhr.response);
                if( xhr.status == 201 )
                {
                    try{
                        if(!window.alert(nomDelegue + ' ' + prenomDelegue + ' a bien été ajouté')){document.forms['creationDelegueForm'].reset();window.location.reload();}
                    }catch(e){
                        if(e=="SyntaxError: Unexpected end of JSON input"){
                            window.alert('JSON incorrect (vide)');
                        }else{
                            window.alert('Erreur : '+e);
                        }
                    }
                }
                else{
                    window.alert('Mauvaise requête. Erreur : '+xhr.statuts);
                }
            }
        });
    
        xhr.open("POST", "http://localhost/projet-web-frontend/api/creation/creation_delegue.php", true);

        xhr.setRequestHeader("Content-Type", "application/json");
        
        xhr.responseType = 'text';

        console.log('envoi=> '+data);
        xhr.send(data);
    }
    
  
    else{
        html="Parametres incorrects ou incomplets";
    }
        
    document.getElementById("resultat-requete").innerHTML = html;
}


function creation_etudiant(){
    var nomEtudiant = document.getElementById("nomEtudiant").value;
    var prenomEtudiant = document.getElementById("prenomEtudiant").value;
    var loginEtudiant = document.getElementById("loginEtudiant").value;
    var mdpEtudiant = document.getElementById("mdpEtudiant").value;
    var centreEtudiant = document.getElementById("centreEtudiant").value;
    var promotionEtudiant = document.getElementById("promotionEtudiant").value;
    var specialiteEtudiant = document.getElementById("specialiteEtudiant").value;
    var photoEtudiant = document.getElementById("photoEtudiant").files[0].name;
    var idCreateur = "1";

    if(true){
        param={
            "Login" : loginEtudiant,
            "Mot_de_passe" : mdpEtudiant,
            "Nom":nomEtudiant,
            "Prenom" : prenomEtudiant,
            "Centre_etudiant" : centreEtudiant,
            "Promotion_etudiant" : promotionEtudiant,
            "Specialite" : specialiteEtudiant,
            "Role" : "Etudiant",
            "Photo_Utilisateur" : "api/img/users/"+photoEtudiant,
            "ID_Utilisateur__CREE":idCreateur,
        }
        var data = JSON.stringify(param);
        var xhr = new XMLHttpRequest();
        xhr.withCredentials = true;
        xhr.addEventListener("readystatechange", function() 
        {
            if( this.readyState === 4) 
            {
                console.log(xhr.readyState+", requete finie, statut : "+ xhr.status+", reponse: "+ xhr.response);
                if( xhr.status == 201 )
                {
                    try{
                        if(!window.alert(nomEtudiant + ' ' + prenomEtudiant + ' a bien été ajouté')){document.forms['creationEtudiantForm'].reset();window.location.reload();}
                    }catch(e){
                        if(e=="SyntaxError: Unexpected end of JSON input"){
                            window.alert('JSON incorrect (vide)');
                        }else{
                            window.alert('Erreur : '+e);
                        }
                    }
                }
                else{
                    window.alert('Mauvaise requête. Erreur : '+xhr.statuts);
                }
            }
        });
    
        xhr.open("POST", "http://localhost/projet-web-frontend/api/creation/creation_etudiant.php", true);

        xhr.setRequestHeader("Content-Type", "application/json");
        
        xhr.responseType = 'text';

        xhr.send(data);
    }
    
  
    else{
        html="Parametres incorrects ou incomplets";
    }
        
}