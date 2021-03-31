<?php
require_once ("libs/Smarty.class.php");

$smarty = new Smarty();

if(empty($_GET["page"])) {
    $template="file:tpl/accueil.tpl";
    $smarty->assign('pagename', 'Accueil');
   }else {
   $page = $_GET["page"];
   switch ($page) {
        case "Entreprises":
            $template="tpl/entreprise.tpl";
            $smarty->assign('pagename', 'Entreprises');
            break;
        case "Candidature":
            $template="tpl/candidature.tpl";
            $smarty->assign('pagename', 'Candidature');
            break;
        case "Offres":
            $template="tpl/offre.tpl";
            $smarty->assign('pagename', 'Offres');
            break;
        case "Etudiants":
            $template="tpl/etudiant.tpl";
            $smarty->assign('pagename', 'Etudiants');
            break;
        case "Delegues":
            $template="tpl/delegue.tpl";
            $smarty->assign('pagename', 'Delegues');
            break;
        case "Pilotes":
            $template="tpl/pilote.tpl";
            $smarty->assign('pagename', 'Pilotes');
            break;
        case "Administrateurs":
            $template="tpl/administrateur.tpl";
            $smarty->assign('pagename', 'Administrateurs');
            break;
        case "Account":
            $template="tpl/account.tpl";
            $smarty->assign('pagename', 'Account');
            break;
        default:
            $smarty->display("file:tpl/404.tpl");
            break;
    }
}

$smarty->assign('template', $template);
$smarty->display("file:tpl/index.tpl");

