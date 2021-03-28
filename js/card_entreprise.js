var number_of_item=2;
var first=0;
var actual_page=1;
let entreprise;


function afficher_company()
{ 
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "http://localhost/projet-web-frontend/api/entreprise/lire_entreprise.php", true);
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
                html += `<div class="card-body">
                        <div class="row">
                            
                            <div class="col-lg-4">
                                <h6 class="card-title">`+ uneEntreprise.Nom_entreprise +`</h6>
                                <p class="card-text" style="margin-bottom: 0;"> `+ uneEntreprise.Localite_entreprise + `</p>
                                <div style="height: 1px; background-color: rgb(223, 223, 223);"></div>
                                <a href="#" class="btn btn-primary" style="margin: 13px 0 13px 0">Aller sur le site</a>
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
    
    xhr.open("POST", "http://localhost/projet-web-frontend/api/entreprise/lire_une_entreprise.php", true);

    xhr.setRequestHeader("Content-Type", "application/json");
    
    xhr.responseType = 'text';

    console.log('envoi=> '+data);
    xhr.send(data);  
};
    /*xhr.open("POST", 'http://localhost/projet-web-frontend/api/entreprise/lire_une_entreprise.php', true);
    xhr.onload = function()
    {
         
        if( xhr.status == 200 )
        {
            var response = JSON.parse(xhr.response);          
            uneEntreprise= response.entreprise;              
 
            html += `<div class="card-body">
                        <div class="row">
                            
                            <div class="col-lg-4">
                                <h6 class="card-title">`+ uneEntreprise.Nom_entreprise +`</h6>
                                <p class="card-text" style="margin-bottom: 0;"> `+ uneEntreprise.Localite_entreprise + `</p>
                                <div style="height: 1px; background-color: rgb(223, 223, 223);"></div>
                                <a href="#" class="btn btn-primary" style="margin: 13px 0 13px 0">Aller sur le site</a>
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
                    </div>`
        }
        else{
            html = '<p>Wrong request. Error: ' + xhr.status + '</p>';
        }
         
        document.getElementById("afficher_une_entreprise").innerHTML = html;
    };
    xhr.send();   
}
*/











window.onload = afficher_company();
