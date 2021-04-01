<?php
/* Smarty version 3.1.39, created on 2021-04-01 02:57:57
  from 'C:\xampp\htdocs\projet-web\tpl\candidature.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60651a95bf7227_39568147',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '461515171137b618ecddf607cd3b27842a986b3b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projet-web\\tpl\\candidature.tpl',
      1 => 1617235726,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60651a95bf7227_39568147 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div
        class="d-sm-flex align-items-center justify-content-between mb-4"
    >
        <h1 class="h3 mb-0 text-gray-800">Listes des candidatures</h1>
    </div> 
    <!-- Contenu de la page en dessous -->

    <div class="control-bar row">
        <div
        class="alert alert-success"
        id="nbResultat-candidature"
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
                        <!-- Création de candidature -->
                        <!-- Boutton -->
                        <button
                        type="button"
                        data-toggle="modal" 
                        data-target="#popup-candidature"
                        style="border-radius: 5px 0 0 5px"
                        class="btn btn-primary float-left col-2"
                        >
                            <span aria-hidden="true"><i class="fa fa-plus" aria-hidden="true"></i></span>
                        </button>
                        <!-- Pop-up -->
                        <div id="popup-candidature" class="modal">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <p> Ajout d'une candidature </p>
                                    </div>
                                    <div class="modal-body">
                                        <form id="creationCandidatureForm" class="needs-validation" novalidate>
                                            <div class="form-group">
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom01">Nom de l'offre</label>
                                                    <input type="text" class="form-control" id="nomAdmin" required>
                                                </div>
                                                <div class="col-md-10 mb-3">
                                                    <label class="form-label" for="customFile">CV</label>
                                                    <input type="file" class="form-control" id="cvEtudiant" required />
                                                    <div class="invalid-feedback">
                                                        Merci de fournir un CV.
                                                    </div>
                                                </div>
                                                <div class="col-md-10 mb-3">
                                                    <label class="form-label" for="customFile">Lettre de Motivation</label>
                                                    <input type="file" class="form-control" id="lmEtudiant" required />
                                                    <div class="invalid-feedback">
                                                        Merci de fournir une lettre de motivation.
                                                    </div>
                                                </div>
                                                <div class="col-md-10 mb-3">
                                                    <label class="form-label" for="customFile">Fiche de validation</label>
                                                    <input type="file" class="form-control" id="fvEtudiant" required />
                                                    <div class="invalid-feedback">
                                                        Merci de fournir une fiche de validation.
                                                    </div>
                                                </div>
                                                <div class="col-md-10 mb-3">
                                                    <label class="form-label" for="customFile">Convention de Stage</label>
                                                    <input type="file" class="form-control" id="csEtudiant" required />
                                                    <div class="invalid-feedback">
                                                        Merci de fournir une convention de stage.
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary" id="btnCreationCandidature" onclick="creation_candidature()" type="submit">Créer la candidature</button>
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

<!-- Tableau d'affichage des candidatures-->
        <div 
            
            class="row"
            style="margin-top: 8px;
            margin-bottom: 2px;
            border-radius: 12px;
            background-color: rgba(206, 206, 206, 0.247);
            padding: 10px;

            ">   
            <table class="table border-bottom-dark"
            style=" 
                background-color: white;
                border-radius: 10px;
                 ">
                <thead>
                    <tr>
                        <th scope="col"style="font-weight= bold " > Nom - Prenom </th>
                        <th scope="col"style="font-weight= bold " > Entreprise </th>
                        <th scope="col" style="font-weight= bold"> Candidature Etape 1 </th>
                        <th scope="col" style="font-weight= bold"> Candidature Etape 2 </th>
                        <th scope="col" style="font-weight= bold"> Candidature Etape 3 </th>
                        <th scope="col" style="font-weight= bold"> Candidature Etape 4 </th>
                        <th scope="col" style="font-weight= bold"> Candidature Etape 5 </th>
                        <th scope="col" style="font-weight= bold"> Candidature Etape 6 </th>
                       
                    </tr>
                </thead>
                <tbody id="js-result-candidature"
                style="height:auto;"
                >
                    
                </tbody>
            </table>
        </div>

            <div class="row">
                <div class="col-8" style="margin: 0 0 0 0; padding: 0 0 0 5px">
                    
                </div>

<!-- Boutons pour les pages-->
                  <div class="page col-4" style="padding: 4px">
                
                <div class="arrow float-right">
                  
                    <div
                    class="btn btn-primary" onclick="previous_page()" 
                    style="
                    border-radius: 8px 0 0 8px;
                    padding-right: 15px;
                    padding-left: 15px;
                    "
                    > 
                        <a href=""><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                    </div>

                  <span id="page_info_candidature"></span>

                  <div
                    class="btn btn-primary"   onclick="next_page()"
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
                        
                    </div>
                </div>
                <!--1ere page-->
            
               
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

<!-- Ajout du js pour l'affichage des candidatures-->
<?php echo '<script'; ?>
 src="js/card_candidature.js"><?php echo '</script'; ?>
>
<?php }
}
