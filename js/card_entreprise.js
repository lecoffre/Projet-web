
let number_of_item=4;
let first=0;
 var actual_page=1;
 var entreprise;


 afficher_company();


 function afficher_company()
 { 
     var xhr = new XMLHttpRequest();
     xhr.open("GET", "http://localhost/projet-web-api/api/entreprise/lire_entreprise.php", true);
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
                     html += '<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6" style=" background-color: rgba(206, 206, 206, 0.247); padding: 10px;"><div class="card border-bottom-dark">' + '<img src="' + current_company.Logo_Entreprise + '" />' + '<div class="card-body" style="padding: 10px"><h5 class="card-title" style="font-size: 15px; margin: 0 0 4px 7px">' + current_company.Nom_entreprise + ' ' + '</h5><p class="card-text" style="font-size: 12px; margin: 0 0 0 7px">' + current_company.Localite_entreprise + '</p></div></div></div>';
                 
                 
                 }
             }
 
         }
         else{
             html = '<p>Wrong request. Error: ' + xhr.status + '</p>';
         }
         
     document.getElementById("js-result").innerHTML = html;
   
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
    document.getElementById('page_info').innerHTML= `Page ${actual_page} / ${max_page}`
    
}
