<?php
/* Smarty version 3.1.39, created on 2021-04-01 01:00:07
  from 'C:\xampp\htdocs\projet-web-frontend\tpl\delegue.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6064fef79818a2_73528185',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '36e1673ceffe851c68eae7c8ad97f63a05a18101' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projet-web-frontend\\tpl\\delegue.tpl',
      1 => 1617231583,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6064fef79818a2_73528185 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div
        class="d-sm-flex align-items-center justify-content-between mb-4"
    >
        <h1 class="h3 mb-0 text-gray-800">Délégués</h1>
    </div> 
    <!-- Contenu de la page en dessous -->

    <div class="control-bar row">
        <div
        class="alert alert-success"
        id="nbResultat-delegue"
        style="
            border-radius: 3px 3px 0 0;
            margin-bottom: 0;
            width: 100%;
            padding-top: 3px;
            padding-bottom: 3px;
        "
        role="alert"
        >
        </div>

        <div
        class="col-12 bg-black"
        style="height: 1px; margin-bottom: 5px"
        ></div>

        <div class="col-12">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <!-- Création de délégué -->
                        <!-- Boutton -->
                        <button
                        type="button"
                        data-toggle="modal" 
                        data-target="#popup-delegue"
                        style="border-radius: 5px 0 0 5px"
                        class="btn btn-primary float-left col-2"
                        >
                            <span aria-hidden="true"><i class="fa fa-plus" aria-hidden="true"></i></span>
                        </button>
                        <!-- Pop-up -->
                        <div id="popup-delegue" class="modal">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <p> Ajout d'un étudiant </p>
                                    </div>
                                    <div class="modal-body">
                                        <form id="creationDelegueForm" class="needs-validation" novalidate>
                                            <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom01">Nom</label>
                                                    <input type="text" class="form-control" id="nomDelegue" required>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom01">Prénom</label>
                                                    <input type="text" class="form-control" id="prenomDelegue" required>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom02">Login</label>
                                                    <input type="text" class="form-control" id="loginDelegue" required>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="validationCustom03">Mot de passe</label>
                                                    <input type="text" class="form-control" id="mdpDelegue" required>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom04">Centre de formation</label>
                                                    <select class="form-control" id="centreDelegue" required>
                                                        <option value="Aix-en-Provence">Aix-en-Provence</option>
                                                        <option value="Angoulême">Angoulême</option>
                                                        <option value="Arras">Arras</option>
                                                        <option value="Bordeaux">Bordeaux</option>
                                                        <option value="Brest">Brest</option>
                                                        <option value="Caen">Caen</option>
                                                        <option value="Châteauroux">Châteauroux</option>
                                                        <option value="Dijon">Dijon</option>
                                                        <option value="Grenoble">Grenoble</option>
                                                        <option value="La Rochelle">La Rochelle</option>
                                                        <option value="Le Mans">Le Mans</option>
                                                        <option value="Lille">Lille</option>
                                                        <option value="Lyon">Lyon</option>
                                                        <option value="Montpellier">Montpellier</option>
                                                        <option value="Nancy">Nancy</option>
                                                        <option value="Nanterre">Nanterre</option>
                                                        <option value="Nantes">Nantes</option>
                                                        <option value="Nice">Nice</option>
                                                        <option value="Orléans">Orléans</option>
                                                        <option value="Pau">Pau</option>
                                                        <option value="Reims">Reims</option>
                                                        <option value="Rouen">Rouen</option>
                                                        <option value="Saint-Nazaire">Saint-Nazaire</option>
                                                        <option value="Strasbourg">Strasbourg</option>
                                                        <option value="Toulouse">Toulouse</option>
                                                    </select>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom04">Promotion</label>
                                                    <select class="form-control" id="promotionDelegue"required>
                                                        <option value="CPI A1">CPI A1</option>
                                                        <option value="CPI A2">CPI A2</option>
                                                        <option value="CI A1">CI A1</option>
                                                        <option value="CI A2">CI A2</option>
                                                        <option value="CI A3">CI A3</option>
                                                    </select>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom04">Spécialité</label>
                                                    <select class="form-control" id="specialiteDelegue" required>
                                                        <option value="BTP">BTP</option>
                                                        <option value="Généraliste">Généraliste</option>
                                                        <option value="Informatique">Informatique</option>
                                                        <option value="S3E">S3E</option>
                                                    </select>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                            <ul>
                                                <li class="nav-item">
                                                    <a
                                                        class="nav-link collapsed"
                                                        href="#"
                                                        data-toggle="collapse"
                                                        data-target="#collapseDroit"
                                                        aria-expanded="true"
                                                        aria-controls="collapseDroit"
                                                    >
                                                        <i class="fas fa-fw fa-bookmark"></i>
                                                        <span>Droits Délégué</span>
                                                    </a>
                                                    <div
                                                        id="collapseDroit"
                                                        class="collapse"
                                                        aria-labelledby="headingDroit"
                                                        data-parent="#accordionSidebar"
                                                    >
                                                        <div >
                                                            <input type="checkbox" id="Creer_une_entreprise" name="Creer_une_entreprise">
                                                            <label for="Creer_une_entreprise">Creer_une_entreprise</label><br>
                                                            <input type="checkbox" id="Modifier_une_entreprise" name="Modifier_une_entreprise">
                                                            <label for="Modifier_une_entreprise">Modifier_une_entreprise</label><br>
                                                            <input type="checkbox" id="Evaluer_une_entreprise" name="Evaluer_une_entreprise">
                                                            <label for="Evaluer_une_entreprise">Evaluer_une_entreprise</label><br>
                                                            <input type="checkbox" id="Supprimer_une_entreprise" name="Supprimer_une_entreprise">
                                                            <label for="Supprimer_une_entreprise">Supprimer_une_entreprise</label><br>
                                                            <input type="checkbox" id="Consulter_les_stats_des_entreprises" name="Consulter_les_stats_des_entreprises">
                                                            <label for="Consulter_les_stats_des_entreprises">Consulter_les_stats_des_entreprises</label><br>
                                                            <input type="checkbox" id="Rechercher_une_offre" name="Rechercher_une_offre">
                                                            <label for="Rechercher_une_offre">Rechercher_une_offre</label><br>
                                                            <input type="checkbox" id="Creer_une_offre" name="Creer_une_offre">
                                                            <label for="Creer_une_offre">Creer_une_offre</label><br>
                                                            <input type="checkbox" id="Modifier_une_offre" name="Modifier_une_offre">
                                                            <label for="Modifier_une_offre">Modifier_une_offre</label><br>
                                                            <input type="checkbox" id="Supprimer_une_offre" name="Supprimer_une_offre">
                                                            <label for="Supprimer_une_offre">Supprimer_une_offre</label><br>
                                                            <input type="checkbox" id="Consulter_les_stats_des_offres" name="Consulter_les_stats_des_offres">
                                                            <label for="Consulter_les_stats_des_offres">Consulter_les_stats_des_offres</label><br>
                                                            <input type="checkbox" id="Rechercher_un_compte_pilote" name="Rechercher_un_compte_pilote">
                                                            <label for="Rechercher_un_compte_pilote">Rechercher_un_compte_pilote</label><br>
                                                            <input type="checkbox" id="Creer_un_compte_pilote" name="Creer_un_compte_pilote">
                                                            <label for="Creer_un_compte_pilote">Creer_un_compte_pilote</label><br>
                                                            <input type="checkbox" id="Creer_un_compte_etudiant" name="Creer_un_compte_etudiant">
                                                            <label for="Creer_un_compte_etudiant">Creer_un_compte_etudiant</label><br>
                                                            <input type="checkbox" id="Modifier_un_compte_etudiant" name="Modifier_un_compte_etudiant">
                                                            <label for="Modifier_un_compte_etudiant">Modifier_un_compte_etudiant</label><br>
                                                            <input type="checkbox" id="Supprimer_un_compte_etudiant" name="Supprimer_un_compte_etudiant">
                                                            <label for="Supprimer_un_compte_etudiant">Supprimer_un_compte_etudiant</label><br>
                                                            <input type="checkbox" id="Consulter_les_stats_des_etudiants" name="Consulter_les_stats_des_etudiants">
                                                            <label for="Consulter_les_stats_des_etudiants">Consulter_les_stats_des_etudiants</label><br>
                                                            <input type="checkbox" id="Informer_le_systeme_de_l_avancement_de_la_candidature_step_3" name="Informer_le_systeme_de_l_avancement_de_la_candidature_step_3">
                                                            <label for="Informer_le_systeme_de_l_avancement_de_la_candidature_step_3">Informer_le_systeme_de_l_avancement_de_la_candidature_step_3</label><br>
                                                            <input type="checkbox" id="Informer_le_systeme_de_l_avancement_de_la_candidature_step_4" name="Informer_le_systeme_de_l_avancement_de_la_candidature_step_4">
                                                            <label for="Informer_le_systeme_de_l_avancement_de_la_candidature_step_4">Informer_le_systeme_de_l_avancement_de_la_candidature_step_4</label><br>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="form-group">
                                                <div class="col-md-10 mb-3">
                                                    <label class="form-label" for="customFile">Photo de profil</label>
                                                    <input type="file" class="form-control" id="photoDelegue" required />
                                                    <div class="invalid-feedback">
                                                        Merci de fournir une photo de profil.
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary" id="btnCreationDelegue" onclick="creation_delegue()" type="submit">Créer le délégué</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer le pop-up</button>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div id="popup-modifier-delegue" class="modal">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <p> Ajout d'un délégué </p>
                                    </div>
                                    <div class="modal-body">
                                        <form id="modifierDelegueForm" class="needs-validation" novalidate>
                                            <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom01">Nom</label>
                                                    <input type="text" class="form-control" id="nomDelegue1" required>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom01">Prénom</label>
                                                    <input type="text" class="form-control" id="prenomDelegue1" required>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom02">Login</label>
                                                    <input type="text" class="form-control" id="loginDelegue1" required>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="validationCustom03">Mot de passe</label>
                                                    <input type="text" class="form-control" id="mdpDelegue1" required>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom04">Centre de formation</label>
                                                    <select class="form-control" id="centreDelegue1" required>
                                                        <option value="Aix-en-Provence">Aix-en-Provence</option>
                                                        <option value="Angoulême">Angoulême</option>
                                                        <option value="Arras">Arras</option>
                                                        <option value="Bordeaux">Bordeaux</option>
                                                        <option value="Brest">Brest</option>
                                                        <option value="Caen">Caen</option>
                                                        <option value="Châteauroux">Châteauroux</option>
                                                        <option value="Dijon">Dijon</option>
                                                        <option value="Grenoble">Grenoble</option>
                                                        <option value="La Rochelle">La Rochelle</option>
                                                        <option value="Le Mans">Le Mans</option>
                                                        <option value="Lille">Lille</option>
                                                        <option value="Lyon">Lyon</option>
                                                        <option value="Montpellier">Montpellier</option>
                                                        <option value="Nancy">Nancy</option>
                                                        <option value="Nanterre">Nanterre</option>
                                                        <option value="Nantes">Nantes</option>
                                                        <option value="Nice">Nice</option>
                                                        <option value="Orléans">Orléans</option>
                                                        <option value="Pau">Pau</option>
                                                        <option value="Reims">Reims</option>
                                                        <option value="Rouen">Rouen</option>
                                                        <option value="Saint-Nazaire">Saint-Nazaire</option>
                                                        <option value="Strasbourg">Strasbourg</option>
                                                        <option value="Toulouse">Toulouse</option>
                                                    </select>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom04">Promotion</label>
                                                    <select class="form-control" id="promotionDelegue1"required>
                                                        <option value="CPI A1">CPI A1</option>
                                                        <option value="CPI A2">CPI A2</option>
                                                        <option value="CI A1">CI A1</option>
                                                        <option value="CI A2">CI A2</option>
                                                        <option value="CI A3">CI A3</option>
                                                    </select>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom04">Spécialité</label>
                                                    <select class="form-control" id="specialiteDelegue1" required>
                                                        <option value="BTP">BTP</option>
                                                        <option value="Généraliste">Généraliste</option>
                                                        <option value="Informatique">Informatique</option>
                                                        <option value="S3E">S3E</option>
                                                    </select>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                            <ul>
                                                <li class="nav-item">
                                                    <a
                                                        class="nav-link collapsed"
                                                        href="#"
                                                        data-toggle="collapse"
                                                        data-target="#collapseDroit"
                                                        aria-expanded="true"
                                                        aria-controls="collapseDroit"
                                                    >
                                                        <i class="fas fa-fw fa-bookmark"></i>
                                                        <span>Droits Délégué</span>
                                                    </a>
                                                    <div
                                                        id="collapseDroit"
                                                        class="collapse"
                                                        aria-labelledby="headingDroit"
                                                        data-parent="#accordionSidebar"
                                                    >
                                                        <div >
                                                            <input type="checkbox" id="Creer_une_entreprise1" name="Creer_une_entreprise">
                                                            <label class="check_1" for="Creer_une_entreprise">Creer_une_entreprise</label><br>
                                                            <input type="checkbox" id="Modifier_une_entreprise1" name="Modifier_une_entreprise">
                                                            <label class="check_1" for="Modifier_une_entreprise">Modifier_une_entreprise</label><br>
                                                            <input type="checkbox" id="Evaluer_une_entreprise1" name="Evaluer_une_entreprise">
                                                            <label class="check_1" for="Evaluer_une_entreprise">Evaluer_une_entreprise</label><br>
                                                            <input type="checkbox" id="Supprimer_une_entreprise1" name="Supprimer_une_entreprise">
                                                            <label class="check_1" for="Supprimer_une_entreprise">Supprimer_une_entreprise</label><br>
                                                            <input type="checkbox" id="Consulter_les_stats_des_entreprises1" name="Consulter_les_stats_des_entreprises">
                                                            <label class="check_1" for="Consulter_les_stats_des_entreprises">Consulter_les_stats_des_entreprises</label><br>
                                                            <input type="checkbox" id="Rechercher_une_offre1" name="Rechercher_une_offre">
                                                            <label class="check_1" for="Rechercher_une_offre">Rechercher_une_offre</label><br>
                                                            <input type="checkbox" id="Creer_une_offre1" name="Creer_une_offre">
                                                            <label class="check_1" for="Creer_une_offre">Creer_une_offre</label><br>
                                                            <input type="checkbox" id="Modifier_une_offre1" name="Modifier_une_offre">
                                                            <label class="check_1" for="Modifier_une_offre">Modifier_une_offre</label><br>
                                                            <input type="checkbox" id="Supprimer_une_offre1" name="Supprimer_une_offre">
                                                            <label class="check_1" for="Supprimer_une_offre">Supprimer_une_offre</label><br>
                                                            <input type="checkbox" id="Consulter_les_stats_des_offres1" name="Consulter_les_stats_des_offres">
                                                            <label class="check_1" for="Consulter_les_stats_des_offres">Consulter_les_stats_des_offres</label><br>
                                                            <input type="checkbox" id="Rechercher_un_compte_pilote1" name="Rechercher_un_compte_pilote">
                                                            <label class="check_1" for="Rechercher_un_compte_pilote">Rechercher_un_compte_pilote</label><br>
                                                            <input type="checkbox" id="Creer_un_compte_pilote1" name="Creer_un_compte_pilote">
                                                            <label class="check_1" for="Creer_un_compte_pilote">Creer_un_compte_pilote</label><br>
                                                            <input type="checkbox" id="Creer_un_compte_etudiant1" name="Creer_un_compte_etudiant">
                                                            <label class="check_1" for="Creer_un_compte_etudiant">Creer_un_compte_etudiant</label><br>
                                                            <input type="checkbox" id="Modifier_un_compte_etudiant1" name="Modifier_un_compte_etudiant">
                                                            <label class="check_1" for="Modifier_un_compte_etudiant">Modifier_un_compte_etudiant</label><br>
                                                            <input type="checkbox" id="Supprimer_un_compte_etudiant1" name="Supprimer_un_compte_etudiant">
                                                            <label class="check_1" for="Supprimer_un_compte_etudiant">Supprimer_un_compte_etudiant</label><br>
                                                            <input type="checkbox" id="Consulter_les_stats_des_etudiants1" name="Consulter_les_stats_des_etudiants">
                                                            <label class="check_1" for="Consulter_les_stats_des_etudiants">Consulter_les_stats_des_etudiants</label><br>
                                                            <input type="checkbox" id="Informer_le_systeme_de_l_avancement_de_la_candidature_step_31" name="Informer_le_systeme_de_l_avancement_de_la_candidature_step_3">
                                                            <label class="check_1" for="Informer_le_systeme_de_l_avancement_de_la_candidature_step_3">Informer_le_systeme_de_l_avancement_de_la_candidature_step_3</label><br>
                                                            <input type="checkbox" id="Informer_le_systeme_de_l_avancement_de_la_candidature_step_41" name="Informer_le_systeme_de_l_avancement_de_la_candidature_step_4">
                                                            <label class="check_1" for="Informer_le_systeme_de_l_avancement_de_la_candidature_step_4">Informer_le_systeme_de_l_avancement_de_la_candidature_step_4</label><br>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="form-group">
                                                <div class="col-md-10 mb-3">
                                                    <label class="form-label" for="customFile">Photo de profil</label>
                                                    <input type="file" class="form-control" id="photoDelegue1" required />
                                                    <div class="invalid-feedback">
                                                        Merci de fournir une photo de profil.
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                    <button class="btn btn-primary" id="btnSupprimerDelegue" onclick="supprimer_delegue(this.id)" style="background-color: red;" type="submit">Supprimer</button>
                                        <button class="btn btn-primary" id="btnModifierDelegue" onclick="modifier_delegue(this.id)" type="submit">Modifier</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer le pop-up</button>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-floating col-10 ">
                            <div class="row">
                                <input
                                    class="search-input-bar col-9"
                                    type="email"
                                
                                    class="form-control col-9"
                                    id="floatingInput"
                                    placeholder="Rechercher"
                                />
                                <button
                                    type="button"
                                    style="border-radius: 0 5px 5px 0"
                                    class="btn btn-primary col-3"
                                >
                                    <span aria-hidden="true"><i class="fa fa-search" aria-hidden="true"></i></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                class="col-lg-1 col-md-0 col-sm-12 col-xs-12"
                style="height: 10px"
                >
                <div
                    class="col-12 bg-black"
                    style="height: 0.5px; margin: 5px 0px 9px 0px"
                ></div>
                </div>
                    <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                    
                            <div class="col-12 multi-selection-bar">
                                <select
                                class="form-control"
                                id="droit_delegue"
                                placeholder="Selection"
                                multiple
                                >
                                    <option value="">Droit</option>
                                    <option value="true">Créer une offre</option>
                                    <option value="true">Modifier une offre</option>
                                    <option value="true">Supprimer une offre</option>
                                    <option value="true">
                                        Rechercher un compte délégué
                                    </option>
                                    <option value="true">Créer un délégué</option>
                                    <option value="true">
                                        Modifier un compte délégué
                                    </option>
                                    <option value="true">
                                        Rechercher un compte étudiant
                                    </option>
                                    <option value="true">Créer un étudiant</option>
                                    <option value="true">Strasbourg</option>
                                    <option value="true">Modifier un étudiant</option>
                                    <option value="true">Supprimer un étudiant</option>
                                    <option value="true">
                                        Consulter les stats des étudiants
                                    </option>
                                    <option value="true">
                                        Informer le système de l'avancement de la
                                        candidature step 3
                                    </option>
                                    <option value="true">
                                        Informer le système de l'avancement de la
                                        candidature step 4
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div
            class="row"
            id="js-result-delegue"
            style="
            margin-top: 8px;
            margin-bottom: 2px;
            border: 1px rgba(201, 201, 201, 0.911) solid;
            border-radius: 12px;
            background-color: rgba(238, 238, 238, 0.178);
            "
        >     
        </div>

            <div class="row">
                <div class="col-8" style="margin: 0 0 0 0; padding: 0 0 0 5px">
                    
                </div>

                <div class="page col-4" style="padding: 4px">
                    <div class="arrow float-right">
                        <div
                            class="btn btn-primary"
                            onclick="previous_page()"
                            type="button"
                            style="
                            border-radius: 8px 0 0 8px;
                            padding-right: 15px;
                            padding-left: 15px;
                            "
                        >
                            
                            <a href=""><i class="fa fa-angle-left" aria-hidden="true" ></i></a>
                        </div>
                        <span id="page_info_delegue"></span>
                        <div
                            class="btn btn-primary"
                            onclick="next_page()"
                            type="button"
                            style="
                            border-radius: 0 8px 8px 0;
                            padding-right: 15px;
                            padding-left: 15px;
                            "
                        >  
                            <a href=""><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div
              class="col-12"
              style="
                height: 0.5px;
                margin: 0 0 10px 0;
                background-color: rgba(39, 37, 31, 0.219);
              "
            ></div>

            <div class="tab-content" id="pills-tabContent" style="padding-bottom: 10px;">
                <div
                    class="tab-pane fade show active"
                    id="pills-home"
                    role="tabpanel"
                    aria-labelledby="pills-home-tab"
                >
                    <!--1ere page-->

                    <div class="card">
                        <div class="card-header">
                        Informations - Synthèse
                        </div>
                        <div id="afficher_un_delegue">
                            
                        </div>
                    </div>
                </div>

            </div>

            <div
                class="col-12"
                style="
                height: 0.5px;
                margin-top: 1px;
                background-color: rgba(39, 37, 31, 0.219);
                "
            ></div>

            <div
                class="row"
                style="height: 250px; background-color: rgba(243, 243, 243, 0.63)"
            ></div>

        <!-- Contenu de la page au dessus -->
        </div>
    <!-- /.container-fluid -->
    </div>
<!-- End of Main Content -->

<?php echo '<script'; ?>
 src="js/card_delegue.js"><?php echo '</script'; ?>
>  
<?php echo '<script'; ?>
 src="js/creation.js"><?php echo '</script'; ?>
><?php }
}
