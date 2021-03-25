window.onload = function() {get_api_connexion()};
document.getElementById("del").onclick = function(){delete_()};
document.getElementById("test1").onclick = function(){get_company()};
document.getElementById("test2").onclick = function(){get_one_company();};
document.getElementById("test3").onclick = function(){create_company();};
document.getElementById("test4").onclick = function(){delete_company();};

document.getElementById("test5").onclick = function(){edit_company();};






function edit_company() {
    var ID_Entreprise = document.forms["test5"]["ID_Entreprise"].value;
    var Nom_entreprise = document.forms["test5"]["Nom_entreprise"].value;
    var Secteur_activite = document.forms["test5"]["Secteur_activite"].value;
    var Competences_recherchees_dans_les_stages = document.forms["test5"]["Competences_recherchees_dans_les_stages"].value;
    var Nombre_de_stagiaires_CESI_deja_acceptes_en_stage = document.forms["test3"]["Nombre_de_stagiaires_CESI_deja_acceptes_en_stage"].value;
    var Evaluation_des_stagiaires = document.forms["test5"]["Evaluation_des_stagiaires"].value;
    var Confiance_du_Pilote_de_promotion = document.forms["test5"]["Confiance_du_Pilote_de_promotion"].value;
    var Localite_entreprise = document.forms["test5"]["Localite_entreprise"].value;
    var Logo_Entreprise = document.forms["test5"]["Logo_Entreprise"].value;
    var ID_Utilisateur = document.forms["test5"]["ID_Utilisateur"].value;

    var html = '';
    if(true) /* Mettre les conditions de parametres valides */
    {
        var param = {
            "ID_Entreprise":ID_Entreprise,
            "Nom_entreprise":Nom_entreprise,
            "Secteur_activite":Secteur_activite,
            "Competences_recherchees_dans_les_stages":Competences_recherchees_dans_les_stages,
            "Nombre_de_stagiaires_CESI_deja_acceptes_en_stage":Nombre_de_stagiaires_CESI_deja_acceptes_en_stage,
            "Evaluation_des_stagiaires":Evaluation_des_stagiaires,
            "Confiance_du_Pilote_de_promotion":Confiance_du_Pilote_de_promotion,
            "Localite_entreprise":Localite_entreprise,
            "Logo_Entreprise":Logo_Entreprise,
            "ID_Utilisateur":ID_Utilisateur,

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
                    if( xhr.status == 200 )
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




                }
                else{
                        html = '<p>Wrong request. Error: ' + xhr.status + '</p>';
                    }
            }
            document.getElementById("resultat-requete").innerHTML = html;
        });
    
        xhr.open("PUT", "http://localhost/api/entreprise/modifier_entreprise.php", true);

        xhr.setRequestHeader("Content-Type", "application/json");
        
        xhr.responseType = 'text';

        console.log('envoi=> '+data);
        xhr.send(data);
    }
    
  
    else{
    html="Parametres incorrects ou incomplets";
    document.getElementById("resultat-requete").innerHTML = html;

        }

};







function delete_company() {
    
    var ID_Entreprise = document.forms["test4"]["ID_Entreprise"].value;
    var html = '';
    if(ID_Entreprise != "" && Number.isInteger(parseInt(ID_Entreprise, 10)))
    {
        var param = {
            "ID_Entreprise":ID_Entreprise
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
                    if( xhr.status == 200 )
                        {
                        try{
                       
                        var response = JSON.parse(xhr.response);
                        var current_company = response;
                        console.log('debut html');
                        html += 'Reponse: '+ response.message;
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
            document.getElementById("resultat-requete").innerHTML = html;
        });
    
        xhr.open("DELETE", "http://localhost/api/entreprise/supprimer_entreprise.php", true);

        xhr.setRequestHeader("Content-Type", "application/json");
        
        xhr.responseType = 'text';

        console.log('envoi=> '+data);
        xhr.send(data);
    }
    
    else if (ID_Entreprise == "") {
    html="ID d'entreprise non renseigné";
        }
    else{
    html="ID doit etre un int";
        }
        document.getElementById("resultat-requete").innerHTML = html;

};











function create_company() {
    var Nom_entreprise = document.forms["test3"]["Nom_entreprise"].value;
    var Secteur_activite = document.forms["test3"]["Secteur_activite"].value;
    var Competences_recherchees_dans_les_stages = document.forms["test3"]["Competences_recherchees_dans_les_stages"].value;
    var Nombre_de_stagiaires_CESI_deja_acceptes_en_stage = document.forms["test3"]["Nombre_de_stagiaires_CESI_deja_acceptes_en_stage"].value;
    var Evaluation_des_stagiaires = document.forms["test3"]["Evaluation_des_stagiaires"].value;
    var Confiance_du_Pilote_de_promotion = document.forms["test3"]["Confiance_du_Pilote_de_promotion"].value;
    var Localite_entreprise = document.forms["test3"]["Localite_entreprise"].value;
    var Logo_Entreprise = document.forms["test3"]["Logo_Entreprise"].value;
    var ID_Utilisateur = document.forms["test3"]["ID_Utilisateur"].value;

    var html = '';
    if(true) /* Mettre les conditions de parametres valides */
    {
        var param = {
            "Nom_entreprise":Nom_entreprise,
            "Secteur_activite":Secteur_activite,
            "Competences_recherchees_dans_les_stages":Competences_recherchees_dans_les_stages,
            "Nombre_de_stagiaires_CESI_deja_acceptes_en_stage":Nombre_de_stagiaires_CESI_deja_acceptes_en_stage,
            "Evaluation_des_stagiaires":Evaluation_des_stagiaires,
            "Confiance_du_Pilote_de_promotion":Confiance_du_Pilote_de_promotion,
            "Localite_entreprise":Localite_entreprise,
            "Logo_Entreprise":Logo_Entreprise,
            "ID_Utilisateur":ID_Utilisateur,

        }
        var data = JSON.stringify(param);
        console.log(data);
        var xhr = new XMLHttpRequest();
        xhr.withCredentials = true;
        xhr.addEventListener("readystatechange", function() 
        {
            if( this.readyState === 4) 
            {
                                  console.log('OKKKKKKK');

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
    
        xhr.open("POST", "http://localhost/api/entreprise/creer_entreprise.php", true);

        xhr.setRequestHeader("Content-Type", "application/json");
        
        xhr.responseType = 'text';

        console.log('envoi=> '+data);
        xhr.send(data);
    }
    
  
    else{
    html="Parametres incorrects ou incomplets";
        }
        
        document.getElementById("resultat-requete").innerHTML = html;

    
};







function get_one_company() {
    
    var ID_Entreprise = document.forms["test2"]["ID_Entreprise"].value;
    var html = '';
    if(ID_Entreprise != "" && Number.isInteger(parseInt(ID_Entreprise, 10)))
    {
        var param = {
            "ID_Entreprise":ID_Entreprise
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
                    if( xhr.status == 200 )
                        {
                        try{
                       
                        var response = JSON.parse(xhr.response);
                        var current_company = response;
                        console.log('debut html');
                        html += '<div class="company">';
                        html += '<p>ID_Entreprise : '+current_company.ID_Entreprise+'</p>';
                        html += '<p>Nom_entreprise : '+current_company.Nom_entreprise+'</p>';
                        html += '<p>Secteur_activite : '+current_company.Secteur_activite+'</p>';
                        html += '<p>Competences_recherchees_dans_les_stages : '+current_company.Competences_recherchees_dans_les_stages+'</p>';
                        html += '<p>Nombre_de_stagiaires_CESI_deja_acceptes_en_stage : '+current_company.Nombre_de_stagiaires_CESI_deja_acceptes_en_stage+'</p>';
                        html += '<p>Evaluation_des_stagiaires : '+current_company.Evaluation_des_stagiaires+'</p>';
                        html += '<p>Confiance_du_Pilote_de_promotion : '+current_company.Confiance_du_Pilote_de_promotion+'</p>';
                        html += '<p>Localite_entreprise : '+current_company.Localite_entreprise+'</p>';
                        html += '<p>image : ------------------------------------------------</p><img style="height: auto; width: auto; max-height: 110px;  max-width: 210px" src="'+ current_company.Logo_Entreprise+'">';
                        html += '<p>--------------------------------------------------------</p>';
                        html += '</div><hr>';
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
            document.getElementById("resultat-requete").innerHTML = html;
        });
    
        xhr.open("POST", "http://localhost/api/entreprise/lire_une_entreprise.php", true);

        xhr.setRequestHeader("Content-Type", "application/json");
        
        xhr.responseType = 'text';

        console.log('envoi=> '+data);
        xhr.send(data);
    }
    
    else if (ID_Entreprise == "") {
    html="ID d'entreprise non renseigné";
        }
    else{
    html="ID doit etre un int";
        }
    
};





function delete_() {
    html = 'Appuyez sur TEST'
    document.getElementById("resultat-requete").innerHTML = html;
};


function get_api_connexion() {
    console.log('Connecté');
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
            document.getElementsByClassName('page-chargement')[0].style.visibility = 'visible';

            html = '<div class="alert alert-success" role="alert">'+message_co+'</div>';
        }
        else{html = '<p>Wrong request. Error: ' + xhr.status + '</p>';}
      }catch(e){
        console.log(e);
        html = '<div class="alert alert-danger" role="alert">Erreur de connexion</div>';
     }
        document.getElementById("connexion_js").innerHTML = html;
    };
    xhr.send();   
}













function get_company(){ 
    var xhr = new XMLHttpRequest();    
    xhr.open("GET", "http://localhost/api/entreprise/lire_entreprise.php" , true);
    xhr.onload = function()
    {
        var html = '';
        if( xhr.status == 200 )
        {

            var response = JSON.parse(xhr.response);
            var entreprise = response.entreprise;
            for(let i=0;i<10;i++){
                try{
                    current_company = entreprise[i];
                    html += '<div class="company">'
                    html += '<p>ID_Entreprise : '+current_company.ID_Entreprise+'</p>';
                    html += '<p>Nom_entreprise : '+current_company.Nom_entreprise+'</p>';
                    html += '<p>Secteur_activite : '+current_company.Secteur_activite+'</p>';
                    html += '<p>Competences_recherchees_dans_les_stages : '+current_company.Competences_recherchees_dans_les_stages+'</p>';
                    html += '<p>Nombre_de_stagiaires_CESI_deja_acceptes_en_stage : '+current_company.Nombre_de_stagiaires_CESI_deja_acceptes_en_stage+'</p>';
                    html += '<p>Evaluation_des_stagiaires : '+current_company.Evaluation_des_stagiaires+'</p>';
                    html += '<p>Confiance_du_Pilote_de_promotion : '+current_company.Confiance_du_Pilote_de_promotion+'</p>';
                    html += '<p>Localite_entreprise : '+current_company.Localite_entreprise+'</p>';
                    html += '<p>image : ------------------------------------------------</p><img style="height: auto; width: auto; max-height: 110px;  max-width: 210px" src="'+ current_company.Logo_Entreprise+'">';
                    html += '<p>--------------------------------------------------------</p>';
                    html += '</div><hr>';
            }
            catch (e){
                if(e=="bidon"){
                console.log(e);
                }else{
                console.log(e);
                }
                }

        }

        document.getElementById("resultat-requete").innerHTML = html;


    }
        else
            html = '<p>Wrong request. Error: ' + xhr.status + '</p>';
        document.getElementById("resultat-requete").innerHTML = html;
    };
    xhr.send();
}   



