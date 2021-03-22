function get_company(ID_Entreprise)
{ 
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "http://localhost/projet-web-api/api/entreprise/lire_entreprise.php?entreprise=", true);
    xhr.onload = function()
    {
        var html = '';
        if( xhr.status == 200 )
        {
            var response = JSON.parse(xhr.response);
            var page_number = response.page; 
            var total_pages = response.total_pages;	
            var entreprise= response.entreprise;
            for(let i=0;i<entreprise.length;i++)
            {
                current_company = entreprise[i];
                html += '<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6" style=" background-color: rgba(206, 206, 206, 0.247); padding: 10px;"><div class="card border-bottom-dark">' + '<img src="' + current_company.Logo_Entreprise + '" />' + '<div class="card-body" style="padding: 10px"><h5 class="card-title" style="font-size: 15px; margin: 0 0 4px 7px">' + current_company.Nom_entreprise + ' ' + '</h5><p class="card-text" style="font-size: 12px; margin: 0 0 0 7px">' + current_company.Localite_entreprise + '</p></div></div></div>';
            }
            

                
            var next_page = page_number < total_pages ? ' - <a onclick="return get_company(' + (page_number + 1) + '); return false;" href="#">Page suivante</a>' : ''; 
            var previous_page = page_number > 1 ? '<a onclick="return get_company(' + (page_number - 1) + '); return false;" href="#">Page précédente</a> - ' : '';
            
            //html += '<div class="page col-4" style="padding: 4px"><div class="arrow float-right"><div class="btn btn-primary" id="btn-prev" style="border-radius: 8px 0 0 8px;padding-right: 15px;padding-left: 15px;"><a onclick="return get_users(' + (page_number + 1) + '); return false;" href="#"></a><i class="fa fa-angle-left" aria-hidden="true"></i></a></div><div class="btn btn-primary" id="btn-next" style="border-radius: 0 8px 8px 0;padding-right: 15px;padding-left: 15px;"><a onclick="return get_users(' + (page_number - 1) + '); return false;" href="#"></a><i class="fa fa-angle-right" aria-hidden="true"></i></a></div></div></div>';
            html += '<div class="page_info">' + previous_page + 'Page <strong>' + page_number + '</strong>/<strong>' + total_pages + '</strong>' + next_page + '</div>';
        }
        else
            html = '<p>Wrong request. Error: ' + xhr.status + '</p>';
            
            

    document.getElementById("js-result").innerHTML = html;
    };
    xhr.send();
    
}
        



