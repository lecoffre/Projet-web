
// Variables gloables

var number_of_item=4;
var first=0;
var actual_page=1;
let offre;

 // On appel la fonction pour afficher les offres



// Fonction afficher offre

 function afficher_offre()
 { 
     var xhr = new XMLHttpRequest();
     xhr.open("GET", "http://localhost/projet-web-frontend/api/offre/lire_offre.php", true);
     xhr.onload = function()
     {
         var html = '';
         if( xhr.status == 200 )
         {
             var response = JSON.parse(xhr.response);          
              offre= response.offre;              
                
             for(let i=first ;i< first + number_of_item;i++)
             {
                 if(i<offre.length)
                 {
                     current_offre = offre[i];
                     // à modifier selon le contenu souhaité
                     html +=    `<div id="`+ current_offre.ID_offre +`" class="col-lg-3 col-md-4 col-sm-4 col-xs-6" onclick="afficher_une_offre(this.id)" style=" background-color: rgba(206, 206, 206, 0.247); padding: 10px;">
                                    <div class="card border-bottom-dark">
                                        <h4>` + current_offre.Titre_offre + `</h4>
                                        <div class="card-body" style="padding: 10px">
                                            <h5 class="card-title" style="font-size: 15px; margin: 0 0 4px 7px">`+ current_offre.Competences_offre + 
                                            `<div class="card-body" style="padding: 10px">
                                                <h5 class="card-title" style="font-size: 15px; margin: 0 0 4px 7px">` + current_offre.Entreprise_offre + `</h5>
                                                <p class="card-text" style="font-size: 12px; margin: 0 0 0 7px">` + current_offre.Date_de_offre + `</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                 }
             }
 
         }
         else{
             html = '<p>Wrong request. Error: ' + xhr.status + '</p>';
         }
         
         document.getElementById("js-result-offre").innerHTML = html;
         document.getElementById("nbResultat-offre").innerHTML = offre.length + " Résultats";
   
     show_page_info();
     };
     xhr.send();
     
 }
 
 // Fonction pour revenir à la page précédente

 function previous_page()
{
    if(first - number_of_item >= 0)
    {
        first-=number_of_item;
        actual_page --;
        afficher_offre();
    }
    
    
}

// Fonction pour aller à la page suivante

function next_page()
{
    if(first + number_of_item <=offre.length)
    {
        first+=number_of_item;
        actual_page++;
        afficher_offre();
    }
    
} 

// Fonction pour afficher la page actuelle et le nombre de page maximum

function show_page_info()
{
    var max_page = Math.ceil (offre.length  / number_of_item);
    document.getElementById('page_info_offre').innerHTML= `Page ${actual_page} / ${max_page}`
    
}


function afficher_une_offre(id_offre){
    var param={
        "ID_offre":id_offre
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
                uneOffre= response; 

                html += `<div class="card-body">
                        <div class="row">
                            
                            <div class="col-lg-4">
                                <h6 class="card-title">`+ uneOffre.Entreprise_offre +`</h6>
                                <p class="card-text" style="margin-bottom: 0;"> `+ uneOffre.Localite_offre + `</p>
                                <div style="height: 1px; background-color: rgb(223, 223, 223);"></div>
                
                                <button
                                type="button"                                                           
                                data-toggle="modal"
                                data-target="#popup-candidature"
                                class="btn btn-primary" 
                                style="margin: 13px 0 13px 0"
                                >Candidature</button>
                                <button
                                type="button"                                                           
                                data-toggle="modal"
                                data-target="#popup-modifier_offre"
                                class="btn btn-primary" 
                                id="`+ uneOffre.ID_offre + `"
                                style="margin: 13px 0 13px 0"
                                >Modifier l'offre</button>
                                <div style="height: 1px; background-color: rgb(223, 223, 223);"></div>

                            </div>
                            <div class="col-lg-4" style="border-left: 1px solid rgb(218, 218, 218);">
                                <div style="height: 1px; background-color: rgb(223, 223, 223);"></div>

                                <p class="card-text" style="margin-bottom: 0; margin-top: 8px; ">Secteur d'activité : `+ uneOffre.Secteur +`</p>
                                <p class="card-text" style="margin-bottom: 0;">Compétences recherchées : `+ uneOffre.Competences_offre +`</p>
                                <p class="card-text" style="margin-bottom: 0;">Promotion concernée : `+ uneOffre.Type_de_promotion_concernee+`</p>
                                <p class="card-text" style="margin-bottom: 0;">Durée du stage : `+ uneOffre.Duree_du_stage+` mois</p>
                                <p class="card-text" style="margin-bottom: 0;">Rémunération : `+uneOffre.Base_de_remuneration+` €</p>
                                <p class="card-text" style="margin-bottom: 0;">Début de l'offre : `+uneOffre.Date_de_offre+`</p>
                                <p class="card-text" style="margin-bottom: 0;">Nombre de places disponible : `+uneOffre.Nombre_de_places_disponible+`</p>
                                <div style="height: 1px; background-color: rgb(223, 223, 223); margin-top: 2px;"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Pop-up -->
                                    <div id="popup-candidature" class="modal">
                                        <div class="modal-dialog ">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <p> Ajout d'une candidature </p>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="creationCandidatureForm" class="needs-validation" novalidate>
                                                        <div class="form-group">
                                                            <div class="col-md-10 mb-3">
                                                                <label class="form-label" for="customFile">CV</label>
                                                                <input type="file" class="form-control" id="cvEtudiant" required />
                                                                <div class="invalid-feedback">
                                                                    Merci de fournir un CV.
                                                                </div>
                                                            </div>
                                                            <div class="col-md-10 mb-3">
                                                                <label class="form-label" for="customFile">Lettre de Motivation</label>
                                                                <input type="file" class="form-control" id="lmEtudiant" required />
                                                                <div class="invalid-feedback">
                                                                    Merci de fournir une lettre de motivation.
                                                                </div>
                                                            </div>
                                                            <div class="col-md-10 mb-3">
                                                                <label class="form-label" for="customFile">Fiche de validation</label>
                                                                <input type="file" class="form-control" id="fvEtudiant" required />
                                                                <div class="invalid-feedback">
                                                                    Merci de fournir une fiche de validation.
                                                                </div>
                                                            </div>
                                                            <div class="col-md-10 mb-3">
                                                                <label class="form-label" for="customFile">Convention de Stage</label>
                                                                <input type="file" class="form-control" id="csEtudiant" required />
                                                                <div class="invalid-feedback">
                                                                    Merci de fournir une convention de stage.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" id="`+uneOffre.ID_offre+`" onclick="creation_candidature(this.id)" type="submit">Créer la candidature</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer le pop-up</button>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;
                }catch(e){
                    if(e=="SyntaxError: Unexpected end of JSON input"){
                        html = 'JSON incorrect (vide)';}
                    else if(e==   "SyntaxError: Unexpected token < in JSON at position 0"){
                        html = "L'offre n'existe pas"
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
        document.getElementById("afficher_une_offre").innerHTML = html;
       
    });
    
    xhr.open("POST", "http://localhost/projet-web-frontend/api/offre/lire_une_offre.php", true);

    xhr.setRequestHeader("Content-Type", "application/json");
    
    xhr.responseType = 'text';

    console.log('envoi=> '+data);
    xhr.send(data);
};

window.onload = afficher_offre();
                     /*   <div class="card-body">
                            <div class="row">
                                
                                <div class="col-lg-4">
                                    <h6 class="card-title">CESI - ÉCOLE D'INGÉNIEUR </h6>
                                    <p class="card-text" style="margin-bottom: 0;">93 boulevard de la seine</p>

                                    <p class="card-text">92000 Nanterre</p>
                                    <div style="height: 1px; background-color: rgb(223, 223, 223);"></div>
                                    <button
                                        type="button"                                                           
                                        data-toggle="modal"
                                        data-target="#popup-candidature"
                                        class="btn btn-primary" 
                                        style="margin: 13px 0 13px 0"
                                        >Candidature</button>
                                    <div style="height: 1px; background-color: rgb(223, 223, 223);"></div>
                                    <!-- Pop-up -->
                                    <div id="popup-candidature" class="modal">
                                        <div class="modal-dialog ">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <p> Ajout d'une candidature </p>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="creationCandidatureForm" class="needs-validation" novalidate>
                                                        <div class="form-group">
                                                            <div class="col-md-6 mb-3">
                                                                <label for="validationCustom01">Nom de l'offre</label>
                                                                <input type="text" class="form-control" id="nomAdmin" required>
                                                            </div>
                                                            <div class="col-md-10 mb-3">
                                                                <label class="form-label" for="customFile">CV</label>
                                                                <input type="file" class="form-control" id="cvEtudiant" required />
                                                                <div class="invalid-feedback">
                                                                    Merci de fournir un CV.
                                                                </div>
                                                            </div>
                                                            <div class="col-md-10 mb-3">
                                                                <label class="form-label" for="customFile">Lettre de Motivation</label>
                                                                <input type="file" class="form-control" id="lmEtudiant" required />
                                                                <div class="invalid-feedback">
                                                                    Merci de fournir une lettre de motivation.
                                                                </div>
                                                            </div>
                                                            <div class="col-md-10 mb-3">
                                                                <label class="form-label" for="customFile">Fiche de validation</label>
                                                                <input type="file" class="form-control" id="fvEtudiant" required />
                                                                <div class="invalid-feedback">
                                                                    Merci de fournir une fiche de validation.
                                                                </div>
                                                            </div>
                                                            <div class="col-md-10 mb-3">
                                                                <label class="form-label" for="customFile">Convention de Stage</label>
                                                                <input type="file" class="form-control" id="csEtudiant" required />
                                                                <div class="invalid-feedback">
                                                                    Merci de fournir une convention de stage.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" id="btnCreationCandidature" onclick="creation_candidature()" type="submit">Créer la candidature</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer le pop-up</button>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-4" style="border-left: 1px solid rgb(218, 218, 218);">
                                    <div style="height: 1px; background-color: rgb(223, 223, 223);"></div>

                                    <p class="card-text" style="margin-bottom: 0; margin-top: 8px; ">Nombre d'employés : XXXX</p>
                                    <p class="card-text" style="margin-bottom: 0;">Information</p>
                                    <p class="card-text" style="margin-bottom: 0;">Information</p>
                                    <p class="card-text" style="margin-bottom: 0;">Information</p>
                                    <p class="card-text" style="margin-bottom: 0;">Information</p>
                                    <p class="card-text" style="margin-bottom: 6px;">Information</p>
                                    <a href="" >Voir +</a>
                                    <div style="height: 1px; background-color: rgb(223, 223, 223); margin-top: 2px;"></div>


                                </div>
                                <div class="col-lg-4" style="border-left: 1px solid rgb(218, 218, 218);">
                                    <img class="image-company " alt="100x100" src="img/cesi-nanterre.png" >
                                </div>
                            </div>
                        </div>*/



