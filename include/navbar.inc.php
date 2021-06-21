<nav class=" sticky-top navbar navbar-expand-xl shadow-lg nav-pills nav-fill">
    <div class="container-fluid">

        <a class="navbar-brand" href="../core/home">
            <img src="../img/logo.svg" alt="logo bts hassan 2 " width="200" height="50" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-align-right text-light"></i>
        </button>
        <div class="collapse navbar-collapse justify-content-start " id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto w-100 justify-content-end">
                <?php
                if (isset($_SESSION['specialite'])) {
                    if ($_SESSION['specialite'] != 'no') { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Cours<b class="caret"></b>
                            </a>
                            <div class="dropdown-menu">
                                <a href="../cours/create" class="dropdown-item"> ajouter</a>
                                <a href="../cours/update" class="dropdown-item"> modifier</a>
                                <a href="../cours/delete" class="dropdown-item"> supprimer</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Chapitre<b class="caret"></b>
                            </a>
                            <div class="dropdown-menu">
                                <a href="../chapitre/create" class="dropdown-item"> ajouter</a>
                                <a href="../chapitre/update" class="dropdown-item"> modifier</a>
                                <a href="../chapitre/delete" class="dropdown-item"> supprimer</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Exercice<b class="caret"></b>
                            </a>
                            <div class="dropdown-menu">
                                <a href="../exercice/create" class="dropdown-item"> ajouter</a>
                                <a href="../exercice/update" class="dropdown-item"> modifier</a>
                                <a href="../exercice/delete" class="dropdown-item"> supprimer</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Correction<b class="caret"></b>
                            </a>
                            <div class="dropdown-menu">
                                <a href="../correction/create" class="dropdown-item"> ajouter</a>
                                <a href="../correction/update" class="dropdown-item"> modifier</a>
                                <a href="../correction/delete" class="dropdown-item"> supprimer</a>
                            </div>
                        </li>
                        <div class=" navbar-nav ml-auto action-buttons">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php echo '../img/photo/' . $_SESSION['pictureAdr']; ?>" class="avatar raduis" alt="Avatar" />
                                    <?php echo  ucfirst($_SESSION['prenom']) . ' ' . strtoupper($_SESSION['nom']); ?><b class="caret"></b>
                                </a>

                                <div class="dropdown-menu">
                                    <a href="../utilisateur/edite" class="dropdown-item"><i class="fas fa-user-edit"></i>Modifier profil</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="../utilisateur/log_out" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Se déconnecter</a>
                                </div>
                            </li>
                        </div>

                    <?php

                    } else { ?>
            </ul>
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo '../img/photo/' . $_SESSION['pictureAdr']; ?>" class="avatar raduis" alt="Avatar" />
                    <?php echo  ucfirst($_SESSION['prenom']) . ' ' . strtoupper($_SESSION['nom']); ?><b class="caret"></b>
                </a>

                <div class="dropdown-menu">
                    <a href="../utilisateur/edite" class="dropdown-item"><i class="fas fa-user-edit"></i>Modifier profil</a>
                    <div class="dropdown-divider"></div>
                    <a href="../utilisateur/log_out" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Se déconnecter</a>
                </div>
            </div>

        <?php
                    }
                } else {
        ?>
        <li class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-outline-light" style="margin: 3px; border-radius: 30px; width: 8rem" href="../utilisateur/create">
                S'inscrire
            </a>
            <a class="btn btn-bts btn-outline-connecter me-md-2" style="
                margin: 3px;
                border-radius: 30px;
                width: 8rem;
              " href="../utilisateur/check">
                Se connecter
            </a>
        </li>
    <?php
                }
    ?>

        </div>

    </div>
</nav>