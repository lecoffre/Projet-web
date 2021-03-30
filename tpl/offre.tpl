<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div
        class="d-sm-flex align-items-center justify-content-between mb-4"
    >
        <h1 class="h3 mb-0 text-gray-800">Offres</h1>
    </div> 
    <!-- Contenu de la page en dessous -->

    <div class="control-bar row">
        <div
        class="alert alert-success"
        id="nbResultat-offre"
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
                        <!-- créer offre-->
                        <!-- Boutton -->
                        <button
                        type="button"
                        data-toggle="modal" 
                        data-target="#popup-offre"
                        style="border-radius: 5px 0 0 5px"
                        class="btn btn-primary float-left col-2"
                        >
                            <span aria-hidden="true"><i class="fa fa-plus" aria-hidden="true"></i></span>
                        </button>
                        <!-- Pop-up -->
                        <div id="popup-offre" class="modal">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <p> Ajout d'une offre </p>
                                    </div>
                                    <div class="modal-body">
                                        <form id="creationOffreForm" class="needs-validation" novalidate>
                                            <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom01">Nom de l'Offre</label>
                                                    <input type="text" class="form-control" id="nomOffre" required>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom02">Secteur d'activité</label>
                                                    <input type="text" class="form-control" id="secteurActivite" required>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="validationCustom03">Compétences recherchées dans le stage</label>
                                                    <textarea class="form-control" id="compRecherchees" required></textarea>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom04">Entreprise</label>
                                                    <input type="text" class="form-control" id="nomEntreprise" required>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom04">Promotion concernée</label>
                                                    <select type="text" class="form-control" id="promoConcernee" required>
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
                                                    <label for="validationCustom04">Durée du stage (en mois)</label>
                                                    <input type="number" class="form-control" id="dureeStage" required>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom05">Rémunération</label>
                                                    <input type="number" class="form-control" id="remuneration" required>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom06">Date de l'offre</label>
                                                    <input type="date" class="form-control" id="dateOffre" required>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom06">Nombre de places disponible</label>
                                                    <input type="input" class="form-control" id="placeDispoOffre" required>
                                                    <div class="valid-feedback">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom05">Ville</label>
                                                    <input type="text" class="form-control" id="localite" required>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary" id="btnCreationOffre" onclick="creation_offre()" type="submit">Créer l'offre</button>
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
            id="js-result-offre"
            style="
            margin-top: 8px;
            margin-bottom: 2px;
            border: 1px rgba(201, 201, 201, 0.911) solid;
            border-radius: 12px;
            background-color: rgba(238, 238, 238, 0.178);
            ">  
               
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
                        <li class="nav-item">
                            <a
                            class="nav-link"
                            id="pills-profile-tab"
                            data-toggle="pill"
                            href="#pills-profile"
                            role="tab"
                            aria-controls="pills-profile"
                            aria-selected="false"
                            >
                                Modifier
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                            class="nav-link"
                            id="pills-contact-tab"
                            data-toggle="pill"
                            href="#pills-contact"
                            role="tab"
                            aria-controls="pills-contact"
                            aria-selected="false"
                            >
                                Contacter
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="page col-4" style="padding: 4px">
                    <div class="arrow float-right">
                        <div
                            class="btn btn-primary"
                            onclick="previous_page()"
                            style="
                            border-radius: 8px 0 0 8px;
                            padding-right: 15px;
                            padding-left: 15px;
                            "
                        >
                            <button type="button"></button>
                            <a href=""><i class="fa fa-angle-left" aria-hidden="true" ></i></a>
                        </div>
                        <span id="page_info_offre"></span>
                        <div
                            class="btn btn-primary"
                            onclick="next_page()"
                            style="
                            border-radius: 0 8px 8px 0;
                            padding-right: 15px;
                            padding-left: 15px;
                            "
                        >
                            <button
                                    type="button"
                                    style="border-radius: 0 5px 5px 0"
                                    class="btn btn-primary col-3"
                                >
                                    <span aria-hidden="true"><i class="fa fa-search" aria-hidden="true"></i></span>
                                </button>
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
                        <div class="card-body">
                            <div class="row">
                                
                                <div class="col-lg-4">
                                    <h6 class="card-title">CESI - ÉCOLE D'INGÉNIEUR </h6>
                                    <p class="card-text" style="margin-bottom: 0;">93 boulevard de la seine</p>

                                    <p class="card-text">92000 Nanterre</p>
                                    <div style="height: 1px; background-color: rgb(223, 223, 223);"></div>
                                    <a href="#" class="btn btn-primary" style="margin: 13px 0 13px 0">Aller sur le site</a>
                                    <div style="height: 1px; background-color: rgb(223, 223, 223);"></div>

                                </div>
                                <div class="col-lg-4" style="border-left: 1px solid rgb(218, 218, 218);">
                                    <div style="height: 1px; background-color: rgb(223, 223, 223);"></div>

                                    <p class="card-text" style="margin-bottom: 0; margin-top: 8px; ">Nombre d'employés : XXXX</p>
                                    <p class="card-text" style="margin-bottom: 0;">Information</p>
                                    <p class="card-text" style="margin-bottom: 0;">Information</p>
                                    <p class="card-text" style="margin-bottom: 0;">Information</p>
                                    <p class="card-text" style="margin-bottom: 0;">Information</p>
                                    <p class="card-text" style="margin-bottom: 6px;">Information</p>
                                    <a href="" >Voir +</a>
                                    <div style="height: 1px; background-color: rgb(223, 223, 223); margin-top: 2px;"></div>


                                </div>
                                <div class="col-lg-4" style="border-left: 1px solid rgb(218, 218, 218);">
                                    <img class="image-company " alt="100x100" src="img/cesi-nanterre.png" >
                                </div>
                            </div>
                        </div>
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
 
<script src="js/card_offre.js"></script>  
