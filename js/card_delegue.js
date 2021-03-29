var number_of_item=4;
var first=0;
var actual_page=1;
var delegue;


function show_delegue()
{ 
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "http://localhost/projet-web-frontend/api/delegue/lire_delegue.php", true);
    xhr.onload = function()
    {
         var html = '';
         if( xhr.status == 200 )
         {
            var response = JSON.parse(xhr.response);          
            delegue= response.delegue;              
                
            for(let i=first ;i< first + number_of_item;i++)
            {
                 if(i<delegue.length)
                {
                    current_delegue = delegue[i];
                    html += `<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6" style=" background-color: rgba(206, 206, 206, 0.247); padding: 10px; max-width:15%;">
                                <div class="card border-bottom-dark">
                                    <img style="width: auto; height:auto;" src="`+ current_delegue.Photo_Utilisateur + `">
                                    <div class="card-body" style="padding: 10px">
                                        <h5 class="card-title" style="font-size: 15px; margin: 0 0 4px 7px;text-align: center;">`
                                            + current_delegue.Nom  + ' ' + current_delegue.Prenom  + 
                                        `</h5>
                                    </div>
                                </div>
                            </div>`;
                }
            }
        }
        else{
            html = '<p>Wrong request. Error: ' + xhr.status + '</p>';
        }
         
        document.getElementById("js-result-delegue").innerHTML = html;
        document.getElementById("nbResultat-delegue").innerHTML = delegue.length + " Résultats";
   
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
        show_delegue();
    }    
}

function next_page()
{
    if(first + number_of_item <=delegue.length)
    {
        first+=number_of_item;
        actual_page++;
        show_delegue();
    }
} 

function show_page_info()
{
    var max_page = Math.ceil (delegue.length  / number_of_item);
    document.getElementById('page_info_delegue').innerHTML= `${actual_page}/${max_page}`
    
}


window.onload = show_delegue();

