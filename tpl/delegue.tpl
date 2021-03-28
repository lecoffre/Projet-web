<!-- Begin Page Content -->
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
                        <button
                        type="button"
                        style="border-radius: 5px 0 0 5px"
                        class="btn btn-primary float-left col-2"
                        >
                            <span aria-hidden="true"><i class="fa fa-plus" aria-hidden="true"></i></span>
                        </button>
                        
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
</div>
<script src="js/card_delegue.js"></script>  