

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
                    var response = JSON.parse(xhr.response);
                    console.log('debut html');
                    
                    html += 'Reponse: '+ response.message;
                    console.log('fin html');
                    }catch(e){
                        if(e=="SyntaxError: Unexpected end of JSON input"){
                            html = 'JSON incorrect (vide)';
                        }else{
                            html ='erreur ==> '+e+'';
                        }
                    }
                    document.getElementById("resultat-requete").innerHTML = html;
                }
                else{
                        html = '<p>Wrong request. Error: ' + xhr.status + '</p>';
                    }
            }
        });
    
        xhr.open("POST", "http://localhost/projet-web-frontend/api/entreprise/creer_entreprise.php", true);

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
   

function creation_pilote(){
    var nomPilote = document.getElementById("nomPilote").value;
    var prenomPilote = document.getElementById("prenomPilote").value;
    var loginPilote = document.getElementById("loginPilote").value;
    var mdpPilote = document.getElementById("mdpPilote").value;
    var centrePilote = document.getElementById("centrePilote").value;
    var promotionPilote = document.getElementById("notePilote").value;
    var role = document.getElementById("role").value;
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
            "Role" : role,
            "Photo_Utilisateur" : "api/img/entreprises/"+photoPilote,
            "ID_Utilisateur_Administrateur ":idCreateur,
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
                    var response = JSON.parse(xhr.response);
                    console.log('debut html');
                    
                    html += 'Reponse: '+ response.message;
                    console.log('fin html');
                    }catch(e){
                        if(e=="SyntaxError: Unexpected end of JSON input"){
                            html = 'JSON incorrect (vide)';
                        }else{
                            html ='erreur ==> '+e+'';
                        }
                    }
                    document.getElementById("resultat-requete").innerHTML = html;
                }
                else{
                        html = '<p>Wrong request. Error: ' + xhr.status + '</p>';
                    }
            }
        });
    
        xhr.open("POST", "http://localhost/projet-web-frontend/api/pilote/creer_pilote.php", true);

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


function creation_delegue(){
    var nomDelegue = document.getElementById("nomDelegue").value;
    var prenomDelegue = document.getElementById("prenomDelegue").value;
    var loginDelegue = document.getElementById("loginDelegue").value;
    var mdpDelegue = document.getElementById("mdpDelegue").value;
    var centreDelegue = document.getElementById("centreDelegue").value;
    var promotionDelegue = document.getElementById("promotionDelegue").value;
    var specialiteDelegue = document.getElementById("specialiteDelegue").value;
    var role = document.getElementById("role").value;
    var photoDelegue = document.getElementById("photoDelegue").files[0].name;
    var idCreateur = "1";

    var html = '';
    if(true){
        param={
            "Nom":nomDelegue,
            "Prenom" : prenomDelegue,
            "Login" : loginDelegue,
            "Mot_de_passe" : mdpDelegue,
            "Centre_pilote" : centreDelegue,
            "Promotion_pilote" : promotionDelegue,
            "Specialite" : specialiteDelegue,
            "Role" : role,
            "Photo_Utilisateur" : "api/img/entreprises/"+photoDelegue,
            "ID_Utilisateur__CREE":idCreateur,
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
                    var response = JSON.parse(xhr.response);
                    console.log('debut html');
                    
                    html += 'Reponse: '+ response.message;
                    console.log('fin html');
                    }catch(e){
                        if(e=="SyntaxError: Unexpected end of JSON input"){
                            html = 'JSON incorrect (vide)';
                        }else{
                            html ='erreur ==> '+e+'';
                        }
                    }
                    document.getElementById("resultat-requete").innerHTML = html;
                }
                else{
                        html = '<p>Wrong request. Error: ' + xhr.status + '</p>';
                    }
            }
        });
    
        xhr.open("POST", "http://localhost/projet-web-frontend/api/pilote/creer_pilote.php", true);

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
    var role = document.getElementById("role").value;
    var photoEtudiant = document.getElementById("photoEtudiant").files[0].name;
    var idCreateur = "1";

    var html = '';
    if(true){
        param={
            "Nom":nomEtudiant,
            "Prenom" : prenomEtudiant,
            "Login" : loginEtudiant,
            "Mot_de_passe" : mdpEtudiant,
            "Centre_pilote" : centreEtudiant,
            "Promotion_pilote" : promotionEtudiant,
            "Specialite" : specialiteEtudiant,
            "Role" : role,
            "Photo_Utilisateur" : "api/img/entreprises/"+photoEtudiant,
            "ID_Utilisateur__CREE":idCreateur,
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
                    var response = JSON.parse(xhr.response);
                    console.log('debut html');
                    
                    html += 'Reponse: '+ response.message;
                    console.log('fin html');
                    }catch(e){
                        if(e=="SyntaxError: Unexpected end of JSON input"){
                            html = 'JSON incorrect (vide)';
                        }else{
                            html ='erreur ==> '+e+'';
                        }
                    }
                    document.getElementById("resultat-requete").innerHTML = html;
                }
                else{
                        html = '<p>Wrong request. Error: ' + xhr.status + '</p>';
                    }
            }
        });
    
        xhr.open("POST", "http://localhost/projet-web-frontend/api/pilote/creer_pilote.php", true);

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