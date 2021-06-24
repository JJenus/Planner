<header class="header-global">
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-light navbar-theme-warning headroom py-lg-2 px-lg-6">
        <div class="container">
            <a class="navbar-brand @@logo_classes" href="<?= base_url() ?>">
                <div class="d-flex align-items-center">
                    <img class="navbar-brand-dark rotate-logo" src="<?= base_url() ?>/assets/img/favicon/logo-white.png" alt="Logo light" />
                    <img class="navbar-brand-light rotate-logo" src="<?= base_url() ?>/assets/img/favicon/logo-dark.png" alt="Logo dark" />
                </div>
            </a>
            <div class="navbar-collapse collapse" id="navbar_global">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a class="d-flex align-items-center" href="../index.html">
                              <img src="<?= base_url() ?>/assets/img/favicon/logo-dark.png" alt="Logo dark" />
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <a href="#navbar_global" class="fas fa-times" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation"></a>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav navbar-nav-hover justify-content-center">
                    <li class="nav-item">
                      <a href="<?= base_url() ?>/" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url() ?>/login" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url() ?>/register" class="nav-link">Register</a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url() ?>/designs" class="nav-link">Designs</a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url() ?>/about" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url() ?>/contact" class="nav-link">Contact</a>
                    </li>
                </ul>
            </div>
           <div class="d-flex d-lg-none align-items-center ml-auto">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </nav>
</header>

        