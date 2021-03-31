
    <h1 >Compte</h1>
    <hr>

    <!--<p>Remeber me: <span id="RemeberMe"></span></p>-->
    <p>Login: <span id="Login"></span></p>
    <p>Mot_de_passe: <span id="Mot_de_passe"></span></p>
    <p>Token: <span id="Token"></span></p>
    <p>Role: <span id="Role"></span></p>
    <p>ID_Utilisateur: <span id="ID_Utilisateur"></span></p>
    <p>ID_Login: <span id="ID_Login"></span></p>
    <p>image path: <span id="Photo_Utilisateur"></span></p>

    <div style="border: 1px solid black; padding: 10px;">
        <p>Infos supplémentaires</p> <!--authorisations dans info.js-->
            <hr>
            <p>Rechercher_une_entreprise: <span id="Rechercher_entreprise"></span></p>
            <p>Creer_une_entreprise: <span id="Creer_une_entreprise"></span></p>

        </div>

    <div style="border: 1px solid black; padding: 10px;">
    <p>Droits | <span id="Authorisations"></span></p> <!--authorisations dans info.js-->
        <hr>
    </div>
</div>
    

    <script>
        ck_display_cookies_in_log(); // pour afficher les cookies dans la console
        /*document.getElementById('RemeberMe').innerHTML = cookie_remember;*/
        document.getElementById('Login').innerHTML = Login_by_cookie;
        document.getElementById('Mot_de_passe').innerHTML = Mot_de_passe_by_cookie;
        document.getElementById('Token').innerHTML = Token_by_cookie;
        document.getElementById('Role').innerHTML = Role_by_cookie;
        document.getElementById('ID_Utilisateur').innerHTML = ID_Utilisateur_by_cookie;
        document.getElementById('ID_Login').innerHTML = ID_Login_by_cookie;
        document.getElementById('Photo_Utilisateur').innerHTML = Photo_Utilisateur_by_cookie;

        /*----------------------------------------Dans info.js-----------------------------------------------------------------------------*/
        
        document.getElementById('Authorisations').innerHTML = Authorisations_by_cookie;

        //Autorisations
        document.getElementById('Rechercher_entreprise').innerHTML = Rechercher_entreprise_by_cookie;
        document.getElementById('Creer_une_entreprise').innerHTML = Creer_une_entreprise_by_cookie;
        
    </script>
