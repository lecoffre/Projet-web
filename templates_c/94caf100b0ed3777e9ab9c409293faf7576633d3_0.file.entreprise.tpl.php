<?php
/* Smarty version 3.1.39, created on 2021-03-31 15:50:41
  from 'C:\xampp\htdocs\projet-web-frontend\tpl\entreprise.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60647e310e62d2_01200359',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '94caf100b0ed3777e9ab9c409293faf7576633d3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projet-web-frontend\\tpl\\entreprise.tpl',
      1 => 1617198265,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60647e310e62d2_01200359 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div
        class="d-sm-flex align-items-center justify-content-between mb-4"
    >
        <h1 class="h3 mb-0 text-gray-800">Entreprises</h1>
    </div> 
    <!-- Contenu de la page en dessous -->

    <div class="control-bar row">
        <div
        class="alert alert-success"
        id="nbResultat-entreprise"
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
                        <!-- créer entreprise-->
                        <!-- Boutton -->
                        <button
                        type="button"
                        data-toggle="modal" 
                        data-target="#popup-entreprise"
                        style="border-radius: 5px 0 0 5px"
                        class="btn btn-primary float-left col-2"
                        >
                            <span aria-hidden="true"><i class="fa fa-plus" aria-hidden="true"></i></span>
                        </button>
                        <!-- Pop-up création entreprise -->
                        <div id="popup-entreprise" class="modal">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <p> Ajout d'une entreprise </p>
                                    </div>
                                    <div class="modal-body">
                                        <form class="needs-validation" novalidate>
                                            <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom01">Nom de l'entreprise</label>
                                                    <input type="text" class="form-control" id="nomEntreprise" placeholder="Nom de l'entreprise" required>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom02">Secteur d'activité</label>
                                                    <input type="text" class="form-control" id="SecteurActivie" placeholder="Secteur"  required>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="validationCustom03">Compétences recherchées dans les stages</label>
                                                    <textarea class="form-control" id="CompRecherchees" placeholder="Compétences" required></textarea>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom04">Nombre d'étudiants CESI déjà acceptés par l'entreprise</label>
                                                    <textarea class="form-control" id="nbStagiaireCESI" placeholder="Nombre d'étudiants acceptés par l'entreprise" required></textarea>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom04">Noter l'entreprise de 0 à 10</label>
                                                    <textarea class="form-control" id="noteEntreprise" placeholder="5 s'il n'y a pas encore eu de stage réalisé" required></textarea>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom04">Confiance du Pilote de Promotion de 0 à 10</label>
                                                    <textarea class="form-control" id="notePilote" placeholder="Voir avec votre pilote de promotion si vous êtes un élève" required></textarea>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom05">Ville</label>
                                                    <input type="text" class="form-control" id="localite" placeholder="Ville" required>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-10 mb-3">
                                                    <label class="form-label" for="customFile">Logo de l'entreprise</label>
                                                    <input type="file" class="form-control" id="logoEntreprise" required />
                                                    <div class="invalid-feedback">
                                                        Merci de fournir une photo d'illustration.
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary" id="btnCreationEntreprise" onclick="creation_entreprise()" type="submit">Créer l'entreprise</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer le pop-up</button>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Pop-up pour modifier l'entreprise-->
                        <div id="popup-modifier-entreprise" class="modal">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <p> Modifier l'entreprise </p>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">Nom de l'entreprise</label>
                                        <input type="text" class="form-control" id="nomEntreprise1" placeholder="" required>
                                        <div class="valid-feedback">
                                        </div>
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom02">Secteur d'activité</label>
                                        <input type="text" class="form-control" id="SecteurActivie1" placeholder =""  required>
                                        <div class="valid-feedback">
                                        </div>
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom03">Compétences recherchées dans les stages</label>
                                        <textarea class="form-control" id="CompRecherchees1" placeholder="" required></textarea>
                                        <div class="valid-feedback">
                                        </div>
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom04">Nombre d'étudiants CESI déjà acceptés par l'entreprise</label>
                                        <textarea class="form-control" id="nbStagiaireCESI1" placeholder="" required></textarea>
                                        <div class="valid-feedback">
                                        </div>
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom04">Noter l'entreprise de 0 à 10</label>
                                        <textarea class="form-control" id="noteEntreprise1" placeholder="" required></textarea>
                                        <div class="valid-feedback">
                                        </div>
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom04">Confiance du Pilote de Promotion de 0 à 10</label>
                                        <textarea class="form-control" id="notePilote1" placeholder="" required></textarea>
                                        <div class="valid-feedback">
                                        </div>
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom05">Ville</label>
                                        <input type="text" class="form-control" id="localite1" placeholder="" required>
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-10 mb-3">
                                        <label class="form-label" for="customFile">Logo de l'entreprise</label>
                                        <input type="file" class="form-control" id="logoEntreprise1" required />
                                        <div class="invalid-feedback">
                                            Merci de fournir une photo d'illustration.
                                        </div>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" id="btnModifierEntreprise" onclick="entreprise_modifier()" type="submit">Modifier l'entreprise</button>
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
            id="js-result-entreprise"
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
                    <ul
                    style="padding: 5px 0"
                    class="nav nav-pills"
                    id="pills-tab"
                    role="tablist"
                    >
                        <li class="nav-item">
                            <a
                            class="nav-link active"
                            id="pills-home-tab"
                            data-toggle="pill"
                            href="#pills-home"
                            role="tab"
                            aria-controls="pills-home"
                            aria-selected="true"
                            >
                                Informations
                            </a>
                        </li>
                        
                    </ul>
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
                        <span id="page_info_entreprise"></span>
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
<div id="donnee-a-modifier">
                </div>
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
                        <div id="afficher_une_entreprise">
                        
                    </div>
                </div>
                
                
            
                
                <div
                class="tab-pane fade"
                id="pills-contact"
                role="tabpanel"
                aria-labelledby="pills-contact-tab"
                >
                    3ème page
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
</div>
<?php echo '<script'; ?>
 src="js/card_entreprise.js"><?php echo '</script'; ?>
>  
<?php echo '<script'; ?>
 src="js/creation.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/modifier.js"><?php echo '</script'; ?>
>
<?php }
}
