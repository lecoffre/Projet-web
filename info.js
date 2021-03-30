var infos_supp ='';
// On met dans infos supp les informations qui changent

if(ck_getCookie('Role')=='administrateur'){
console.log('administrateur');
var Authorisations_by_cookie = ck_getCookie('Authorisations');
infos_supp ='    <p>Pas d\'informations supplémentaires';
}else if(ck_getCookie('Role')=='pilote'){
    console.log('pilote');
    var Authorisations_by_cookie = ck_getCookie('Authorisations');
    var Centre_pilote_by_cookie = ck_getCookie('Centre_pilote');
    var Promotion_pilote_by_cookie = ck_getCookie('Promotion_pilote');
    infos_supp ='    <p>Centre_pilote: <span id="Centre_pilote">'+Centre_pilote_by_cookie+'</span></p>';
    infos_supp +='   <p>Promotion_pilote: <span id="Promotion_pilote">'+Promotion_pilote_by_cookie+'</span></p>';
}else if(ck_getCookie('Role')=='delegue'){
    console.log('delegue');
    var Authorisations_by_cookie = ck_getCookie('Authorisations');
    var Centre_Delegue_by_cookie = ck_getCookie('Centre_Delegue');
    var Promotion_delegue_by_cookie = ck_getCookie('Promotion_delegue');
    var Specialite_by_cookie = ck_getCookie('Specialite');
    var ID_Utilisateur__CREE_by_cookie = ck_getCookie('ID_Utilisateur__CREE');
    infos_supp ='    <p>Centre_Delegue: <span id="Centre_Delegue">'+Centre_Delegue_by_cookie+'</span></p>';
    infos_supp +='   <p>Promotion_delegue: <span id="Promotion_delegue">'+Promotion_delegue_by_cookie+'</span></p>';
    infos_supp +='   <p>Specialite: <span id="Specialite">'+Specialite_by_cookie+'</span></p>';
    infos_supp +='   <p>ID_Utilisateur__CREE: <span id="ID_Utilisateur__CREE">'+ID_Utilisateur__CREE_by_cookie+'</span></p>';
}else if(ck_getCookie('Role')=='etudiant'){
    console.log('etudiant');
    var Authorisations_by_cookie = ck_getCookie('Authorisations');
    var Centre_etudiant_by_cookie = ck_getCookie('Centre_etudiant');
    var Promotion_etudiant_by_cookie = ck_getCookie('Promotion_etudiant');
    var ID_Utilisateur__CREE_by_cookie = ck_getCookie('ID_Utilisateur__CREE');
    infos_supp ='    <p>Centre_etudiant_by_cookie: <span id="Centre_etudiant_by_cookie">'+Centre_etudiant_by_cookie+'</span></p>';
    infos_supp +='   <p>Promotion_etudiant_by_cookie: <span id="Promotion_etudiant_by_cookie">'+Promotion_etudiant_by_cookie+'</span></p>';
    infos_supp +='   <p>ID_Utilisateur__CREE: <span id="ID_Utilisateur__CREE">'+ID_Utilisateur__CREE_by_cookie+'</span></p>';
}else{
    console.log('aucun role')
}




function get_rights(Token) {
    var Token = Token;
    var html = '';
    if(Token != "")
    {
        var param = {
            "Token":Token
        }
        var data = JSON.stringify(param);
        console.log(data);
        var xhr = new XMLHttpRequest();

    
        xhr.addEventListener("readystatechange", function() 
        {
            if( this.readyState === 4) 
            {
          
                    console.log(xhr.readyState+", requete finie, statut : "+ xhr.status+", reponse: "+ xhr.response);
                    if( xhr.status == 200 )
                        {
                        try{
                       
                        var response = JSON.parse(xhr.response);
                        var current_company = response;
                        console.log('debut html');
                     
                        console.log('fin html');

                        

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
            document.getElementById("resultat-requete").innerHTML = html;
        });
    
        xhr.open("POST", "http://localhost/api/entreprise/lire_une_entreprise.php", true);

        xhr.setRequestHeader("Content-Type", "application/json");
        
        xhr.responseType = 'text';

        console.log('envoi=> '+data);
        xhr.send(data);
    }
    
    else if (ID_Entreprise == "") {
    html="ID d'entreprise non renseigné";
        }
    else{
    html="ID doit etre un int";
        }
    
};
