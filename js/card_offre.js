
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
                     html +=    `<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6" style=" background-color: rgba(206, 206, 206, 0.247); padding: 10px;">
                                    <div class="card border-bottom-dark">
                                        <h4>` + current_offre.Entreprise_offre + `</h4>
                                        <div class="card-body" style="padding: 10px">
                                            <h5 class="card-title" style="font-size: 15px; margin: 0 0 4px 7px">`+ current_offre.Competences_offre + 
                                            `<div class="card-body" style="padding: 10px">
                                                <h5 class="card-title" style="font-size: 15px; margin: 0 0 4px 7px">` + current_offre.Localite_offre + `</h5>
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

window.onload = afficher_offre();