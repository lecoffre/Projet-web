var number_of_item=4;
var first=0;
var actual_page=1;
var etudiant;


function show_etudiant()
{ 
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "http://localhost/projet-web-frontend/api/etudiant/lire_etudiant.php", true);
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
                    html += `<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6" style=" background-color: rgba(206, 206, 206, 0.247); padding: 10px;">
                                <div class="card border-bottom-dark">
                                    <img style="width: auto; max-height: 110px;  max-width: 210px" src="` + current_etudiant.Photo_Utilisateur + `" >
                                    <div class="card-body" style="padding: 10px">
                                        <h5 class="card-title" style="font-size: 15px; margin: 0 0 4px 7px">` + current_etudiant.Nom  + ' ' + current_etudiant.Prenom  + `</h5>
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


window.onload = show_etudiant();

