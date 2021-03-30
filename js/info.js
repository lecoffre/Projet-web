var infos_supp ='';
var droits_




var Rechercher_entreprise_by_cookie = ck_getCookie("Rechercher_entreprise");
var Creer_une_entreprise_by_cookie = ck_getCookie("Creer_une_entreprise");
var Modifier_une_entreprise_by_cookie = ck_getCookie("Modifier_une_entreprise");
var Evaluer_une_entreprise_by_cookie = ck_getCookie("Evaluer_une_entreprise");
var Supprimer_une_entreprise_by_cookie = ck_getCookie("Supprimer_une_entreprise");
var Consulter_les_stats_des_entreprises_by_cookie = ck_getCookie("Consulter_les_stats_des_entreprises");
var Rechercher_une_offre_by_cookie = ck_getCookie("Rechercher_une_offre");
var Creer_une_offre_by_cookie = ck_getCookie("Creer_une_offre");
var Modifier_une_offre_by_cookie = ck_getCookie("Modifier_une_offre");
var Supprimer_une_offre_by_cookie = ck_getCookie("Supprimer_une_offre");
var Consulter_les_stats_des_offres_by_cookie = ck_getCookie("Consulter_les_stats_des_offres");
var Rechercher_un_compte_pilote_by_cookie = ck_getCookie("Rechercher_un_compte_pilote");
var Creer_un_compte_pilote_by_cookie = ck_getCookie("Creer_un_compte_pilote");
var Modifier_un_compte_pilote_by_cookie = ck_getCookie("Modifier_un_compte_pilote");
var Supprimer_un_compte_pilote_by_cookie = ck_getCookie("Supprimer_un_compte_pilote");
var Rechercher_un_compte_delegue_by_cookie = ck_getCookie("Rechercher_un_compte_delegue");
var Creer_un_compte_delegue_by_cookie = ck_getCookie("Creer_un_compte_delegue");
var Modifier_un_compte_delegue_by_cookie = ck_getCookie("Modifier_un_compte_delegue");
var Supprimer_un_compte_delegue_by_cookie = ck_getCookie("Supprimer_un_compte_delegue");
var Assigner_des_droits_a_un_delegue_by_cookie = ck_getCookie("Assigner_des_droits_a_un_delegue");
var Rechercher_un_compte_etudiant_by_cookie = ck_getCookie("Rechercher_un_compte_etudiant");
var Creer_un_compte_etudiant_by_cookie = ck_getCookie("Creer_un_compte_etudiant");
var Modifier_un_compte_etudiant_by_cookie = ck_getCookie("Modifier_un_compte_etudiant");
var Supprimer_un_compte_etudiant_by_cookie = ck_getCookie("Supprimer_un_compte_etudiant");
var Consulter_les_stats_des_etudiants_by_cookie = ck_getCookie("Consulter_les_stats_des_etudiants");
var Ajouter_une_offre_a_la_wish_list_by_cookie = ck_getCookie("Ajouter_une_offre_a_la_wish_list");
var Retirer_une_offre_a_la_wish_list_by_cookie = ck_getCookie("Retirer_une_offre_a_la_wish_list");
var Postuler_a_une_offre_by_cookie = ck_getCookie("Postuler_a_une_offre");
var Informer_le_systeme_de_l_avancement_de_la_candidature_step_1_by_cookie = ck_getCookie("Informer_le_systeme_de_l_avancement_de_la_candidature_step_1");
var Informer_le_systeme_de_l_avancement_de_la_candidature_step_2_by_cookie = ck_getCookie("Informer_le_systeme_de_l_avancement_de_la_candidature_step_2");
var Informer_le_systeme_de_l_avancement_de_la_candidature_step_3_by_cookie = ck_getCookie("Informer_le_systeme_de_l_avancement_de_la_candidature_step_3");
var Informer_le_systeme_de_l_avancement_de_la_candidature_step_4_by_cookie = ck_getCookie("Informer_le_systeme_de_l_avancement_de_la_candidature_step_4");
var Informer_le_systeme_de_l_avancement_de_la_candidature_step_5_by_cookie = ck_getCookie("Informer_le_systeme_de_l_avancement_de_la_candidature_step_5");
var Informer_le_systeme_de_l_avancement_de_la_candidature_step_6_by_cookie = ck_getCookie("Informer_le_systeme_de_l_avancement_de_la_candidature_step_6");






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





