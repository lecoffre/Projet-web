//Variables globales

let number_of_item=10;
let first=0;
var actual_page=1;
var candidature;


// Fonction pour afficher toutes les candidatures
 function afficher_candidature()
 { 
     var xhr = new XMLHttpRequest();
     xhr.open("GET", "api/candidature/lire_candidature.php", true);
     xhr.onload = function()
     {
         var html = '';
         if( xhr.status == 200 )
         {
             var response = JSON.parse(xhr.response);          
              candidature= response.candidature;              
                
             for(let i=first ;i< first + number_of_item;i++)
             {
                 
                 if(i<candidature.length)
                 {
                     current_candidature = candidature[i];
                  
                    // à modifier selon le contenu souhaité   
                    html+=  `<tr>
                            <td style="border-top: 2px solid  ;">`+ current_candidature.Nom + ' ' + current_candidature.Prenom + `</td>
                            <td style="border-top:2px solid ;">`+ current_candidature.Entreprise_offre +`</td>
                            <td style="border-top:2px solid ;">`+ current_candidature.Candidature_step_1 +`</td>
                            <td style="border-top:2px solid ;">`+ current_candidature.Candidature_step_2 +`</td>
                            <td style="border-top:2px solid ;">`+ current_candidature.Candidature_step_3 +`</td>
                            <td style="border-top:2px solid ;">`+ current_candidature.Candidature_step_4 +`</td>
                            <td style="border-top:2px solid ;">`+ current_candidature.Candidature_step_5 +`</td>
                            <td style="border-top:2px solid ;">`+ current_candidature.Candidature_step_6 +`</td>
                           
                            </tr>`;
                 }
             }
 
         }
         else{
             html = '<p>Wrong request. Error: ' + xhr.status + '</p>';
         }
         
     document.getElementById("js-result-candidature").innerHTML = html;
     document.getElementById("nbResultat-candidature").innerHTML = candidature.length + " Résultats";
   
     show_page_info();
     };
     xhr.send();
     
 }

 // Fonction pour passer à la page précédente
 function previous_page()
{
    if(first - number_of_item >= 0)
    {
        first-=number_of_item;
        actual_page --;
        afficher_candidature();
    }
    
    
}

// Fonction pour passer à la page suivante
function next_page()
{
    if(first + number_of_item <= candidature.length)
    {
        first+=number_of_item;
        actual_page++;
        afficher_candidature();
    }
    
} 
// Fonction pour savoir la page actuelle et la page maximum
function show_page_info()
{
    var max_page = Math.ceil (candidature.length  / number_of_item);
    document.getElementById('page_info_candidature').innerHTML= `${actual_page} / ${max_page}`;
    
}

window.onload = afficher_candidature();