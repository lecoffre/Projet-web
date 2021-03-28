var number_of_item=4;
var first=0;
var actual_page=1;
var administrateur;


function show_administrateur()
{ 
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "http://localhost/projet-web-frontend/api/administrateur/lire_administrateur.php", true);
    xhr.onload = function()
    {
         var html = '';
         if( xhr.status == 200 )
         {
            var response = JSON.parse(xhr.response);          
            administrateur= response.administrateur;              
                
            for(let i=first ;i< first + number_of_item;i++)
            {
                 if(i<administrateur.length)
                {
                    current_administrateur = administrateur[i];
                    html += `<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6" style=" background-color: rgba(206, 206, 206, 0.247); padding: 10px;">
                                <div class="card border-bottom-dark">
                                    <img style="width: auto; height:auto;  max-width: 210px" src="` + current_administrateur.Photo_Utilisateur + `" >
                                    <div class="card-body" style="padding: 10px">
                                        <h5 class="card-title" style="font-size: 15px; margin: 0 0 4px 7px">` + current_administrateur.Nom  + ' ' + current_administrateur.Prenom  + `</h5>
                                    </div>
                                </div>
                            </div>`;
                }
            }
        }
        else{
            html = '<p>Wrong request. Error: ' + xhr.status + '</p>';
        }
         
        document.getElementById("js-result-administrateur").innerHTML = html;
        document.getElementById("nbResultat-administrateur").innerHTML = administrateur.length + " Résultats";
   
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
        show_administrateur();
    }    
}

function next_page()
{
    if(first + number_of_item <=administrateur.length)
    {
        first+=number_of_item;
        actual_page++;
        show_administrateur();
    }
} 

function show_page_info()
{
    var max_page = Math.ceil (administrateur.length  / number_of_item);
    document.getElementById('page_info_administrateur').innerHTML= `${actual_page}/${max_page}`
    
}


window.onload = show_administrateur();

