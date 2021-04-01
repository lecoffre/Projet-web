<?php
/* Smarty version 3.1.39, created on 2021-04-01 02:58:07
  from 'C:\xampp\htdocs\projet-web\tpl\account.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60651a9f62f8d9_48970105',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dd6ca4acad1a6d730cb09268aa7406601059c2d2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projet-web\\tpl\\account.tpl',
      1 => 1617235726,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60651a9f62f8d9_48970105 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="account" style="padding: 27px;">
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

<div class="row" style="border: 1px solid black; border-radius:12px;">
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 col-12" style="padding: 10px;">
        <p>Infos supplémentaires</p> <!--authorisations dans info.js-->
            <hr>
            <p>Rechercher_une_entreprise: <span id="Rechercher_entreprise"></span></p>
            <p>Creer_une_entreprise: <span id="Creer_une_entreprise"></span></p>

        </div>

    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 col-12" style="padding: 10px;">
    <p>Droits | <span id="Authorisations"></span></p> <!--authorisations dans info.js-->
        <hr>
    </div>
</div>
</div> 
</div>   
<?php echo '<script'; ?>
 src="js/cookies.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/info.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
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
        
    <?php echo '</script'; ?>
>
<?php }
}
