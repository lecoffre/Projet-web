<?php
/* Smarty version 3.1.39, created on 2021-03-31 19:46:23
  from 'C:\xampp\htdocs\projet-web-frontend\tpl\pilote.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6064b56f999b33_88273688',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eccd8d41b275afbeeaf12f178385a5217a8769c2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projet-web-frontend\\tpl\\pilote.tpl',
      1 => 1617210783,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6064b56f999b33_88273688 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div
        class="d-sm-flex align-items-center justify-content-between mb-4"
    >
        <h1 class="h3 mb-0 text-gray-800">Pilotes</h1>
    </div> 
    <!-- Contenu de la page en dessous -->

    <div class="control-bar row">
        <div
        class="alert alert-success"
        id="nbResultat-pilote"
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
                        <!-- Création de pilote -->
                        <!-- Boutton -->
                        <button
                        type="button"
                        data-toggle="modal" 
                        data-target="#popup-pilote"
                        style="border-radius: 5px 0 0 5px"
                        class="btn btn-primary float-left col-2"
                        >
                            <span aria-hidden="true"><i class="fa fa-plus" aria-hidden="true"></i></span>
                        </button>
                        <!-- Pop-up -->
                        <div id="popup-pilote" class="modal">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <p> Ajout d'un pilote </p>
                                    </div>
                                    <div class="modal-body">
                                        <form id="creationPiloteForm" class="needs-validation" novalidate>
                                            <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom01">Nom</label>
                                                    <input type="text" class="form-control" id="nomPilote" required>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom01">Prénom</label>
                                                    <input type="text" class="form-control" id="prenomPilote" required>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom02">Login</label>
                                                    <input type="text" class="form-control" id="loginPilote" required>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="validationCustom03">Mot de passe</label>
                                                    <input type="text" class="form-control" id="mdpPilote" required>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom04">Centre de formation</label>
                                                    <select class="form-control" id="centrePilote" required>
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
                                                    <select class="form-control" id="promotionPilote"required>
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
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-10 mb-3">
                                                    <label class="form-label" for="customFile">Photo de profil</label>
                                                    <input type="file" class="form-control" id="photoPilote" required />
                                                    <div class="invalid-feedback">
                                                        Merci de fournir une photo de profil.
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary" id="btnCreationPilote" onclick="creation_pilote()" type="submit">Créer le pilote</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer le pop-up</button>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        <div id="popup-modifier-pilote" class="modal">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <p> Modification d'un pilote </p>
                                    </div>
                                    <div class="modal-body">
                                        <form id="modifierPiloteForm" class="needs-validation" novalidate>
                                            <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom01">Nom</label>
                                                    <input type="text" class="form-control" id="nomPilote1" required>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom01">Prénom</label>
                                                    <input type="text" class="form-control" id="prenomPilote1" required>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom02">Login</label>
                                                    <input type="text" class="form-control" id="loginPilote1" required>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="validationCustom03">Mot de passe</label>
                                                    <input type="text" class="form-control" id="mdpPilote1" required>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom04">Centre de formation</label>
                                                    <select class="form-control" id="centrePilote1" required>
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
                                                    <select class="form-control" id="promotionPilote1"required>
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
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-10 mb-3">
                                                    <label class="form-label" for="customFile">Photo de profil</label>
                                                    <input type="file" class="form-control" id="photoPilote1" required />
                                                    <div class="invalid-feedback">
                                                        Merci de fournir une photo de profil.
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary" id="btnModifierPilote" onclick="modifier_pilote(this.id)" type="submit">Modifier le pilote</button>
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
            id="js-result-pilote"
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
                        <span id="page_info_pilote"></span>
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
                        <div id="afficher_un_pilote">
 
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
 src="js/creation.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/card_pilote.js"><?php echo '</script'; ?>
>  <?php }
}
