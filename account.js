function login(){ 
    var xhr = new XMLHttpRequest();    
    xhr.open("GET", "http://localhost/api/login/lire_login.php" , true);
    xhr.onload = function()
    {
        var html = '';
        if( xhr.status == 200 )
        {

        var response = JSON.parse(xhr.response);
        var entreprise = response.entreprise;
            try{
                current_company = entreprise[i];
                html += `<h1>Account TEST</h1>
                        <p id="ID_Login">ID_Login : `+ current_company.ID_Login + `</p>
                        <p id="Login">Login : `+ current_company.Login +` </p>
                        <p id="Mot_de_passe">Mot de Passe : `+ current_company.Mot_de_passe +`</p>
                        <p id="ID_Utilisateur">ID Utilisateur : `+ current_company.ID_Utilisateur+`</p>
                        <p id="Nom">Nom : `+ current_company.Nom+`</p>
                        <p id="Prenom">Prénom : `+ current_company.Prenom+`</p>
                        <p id="Photo_Utilisateur">Photo Utilisateur : `+ current_company.Photo_Utilisateur+`</p>
                        <p id="Role">Rôle : `+ current_company.Role+`</p>
                        <p id="Token">Token : `+ current_company.Token+`</p>
                        <p id="Centre_etudiant">Centre étudiant : `+current_company.Centre_etudiant+`</p>
                        <p id="Promotion_etudiant">Promotion étudiant : `+current_company.Promotion_etudiant+`</p>
                        <p id="Specialite">Spécialité : `+ current_company.Specialite + `</p>
                        <p id="Centre_delegue">Centre délégué : `+ current_company.Centre_delegue+`</p>
                        <p id="Promotion_delegue">Promotion délégué : `+ current_company.Promotion_delegue +`</p>
                        <p id="Centre_pilote">Centre pilote : `+ current_company.Centre_pilote +`</p>
                        <p id="Promotion_pilote">Promotion pilote : `+ current_company.Promotion_pilote + `</p>`;
                }
            catch (e){
                if(e=="bidon"){
                console.log(e);
                }else{
                console.log(e);
                }
            }

        document.getElementById("resultat-requete").innerHTML = html;
        }
        else
            html = '<p>Wrong request. Error: ' + xhr.status + '</p>';
        document.getElementById("resultat-requete").innerHTML = html;
    };
    xhr.send();
};

window.onload = login();

