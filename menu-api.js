window.onload = function() {
    get_api_connexion()
};

document.getElementById("delete").onclick = function(){delete_()};
document.getElementById("test1").onclick = function(){get_company()};











function delete_() {
    html = 'Appuyez sur TEST'
    document.getElementById("resultat-requete").innerHTML = html;
};


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




function get_company()
{ 
    document.getElementById("resultat-requete").innerHTML = 'test1';
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
                    html += '<p>image : -- -- -- -- -- -- -- -- -- -- -- </p><img style="height: auto; width: auto; max-height: 110px" src="'+ current_company.Logo_Entreprise+'">';
                    html += '</div><hr>'
            
            }
            catch (e){
                console.log(e)   ;
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



