<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div
        class="d-sm-flex align-items-center justify-content-between mb-4"
    >
        <h1 class="h3 mb-0 text-gray-800">Administrateurs</h1>
    </div> 
    <!-- Contenu de la page en dessous -->

    <div class="control-bar row">
        <div
        class="alert alert-success"
        id="nbResultat-administrateur"
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
                        <!-- Création de administrateur -->
                        <!-- Boutton -->
                        <button
                        type="button"
                        data-toggle="modal" 
                        data-target="#popup-administrateur"
                        style="border-radius: 5px 0 0 5px"
                        class="btn btn-primary float-left col-2"
                        >
                            <span aria-hidden="true"><i class="fa fa-plus" aria-hidden="true"></i></span>
                        </button>
                        <!-- Pop-up -->
                        <div id="popup-administrateur" class="modal">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <p> Ajout d'un administrateur </p>
                                    </div>
                                    <div class="modal-body">
                                        <form id="creationAdministrateurForm" class="needs-validation" novalidate>
                                            <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom01">Nom</label>
                                                    <input type="text" class="form-control" id="nomAdmin" required>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom01">Prénom</label>
                                                    <input type="text" class="form-control" id="prenomAdmin" required>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom02">Login</label>
                                                    <input type="text" class="form-control" id="loginAdmin" required>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="validationCustom03">Mot de passe</label>
                                                    <input type="text" class="form-control" id="mdpAdmin" required>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-10 mb-3">
                                                    <label class="form-label" for="customFile">Photo de profil</label>
                                                    <input type="file" class="form-control" id="photoAdmin" required />
                                                    <div class="invalid-feedback">
                                                        Merci de fournir une photo de profil.
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary" id="btnCreationAdministrateur" onclick="creation_administrateur(this.id)" type="submit">Créer l'administrateur</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer le pop-up</button>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="popup-modifier-administrateur" class="modal">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <p> Modification d'un administrateur </p>
                                    </div>
                                    <div class="modal-body">
                                        <form id="ModifierAdministrateurForm" class="needs-validation" novalidate>
                                            <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom01">Nom</label>
                                                    <input type="text" class="form-control" id="nomAdmin1" required>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom01">Prénom</label>
                                                    <input type="text" class="form-control" id="prenomAdmin1" required>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom02">Login</label>
                                                    <input type="text" class="form-control" id="loginAdmin1" required>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="validationCustom03">Mot de passe</label>
                                                    <input type="text" class="form-control" id="mdpAdmin1" required>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-10 mb-3">
                                                    <label class="form-label" for="customFile">Photo de profil</label>
                                                    <input type="file" class="form-control" id="photoAdmin1" required />
                                                    <div class="invalid-feedback">
                                                        Merci de fournir une photo de profil.
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary" id="btnSupprimerAdministrateur" onclick="supprimer_administrateur()" type="submit">Supprimer l'administrateur</button>
                                        <button class="btn btn-primary" id="btnModifierAdministrateur" onclick="modifier_administrateur()" type="submit">Modifier l'administrateur</button>
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
            id="js-result-administrateur"
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
                        <span id="page_info_administrateur"></span>
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
                        <div id="afficher_un_admin"></div>
                    </div>
                </div>
                <!--1ere page-->
            
                <div
                class="tab-pane fade"
                id="pills-profile"
                role="tabpanel"
                aria-labelledby="pills-profile-tab"
                >
                    2ème page
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
<script src="js/creation.js"></script>
<script src="js/card_administrateur.js"></script>  