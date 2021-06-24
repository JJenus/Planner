<!DOCTYPE html>
<html lang="en">
    <?=view('dashboard/template/header')?>
    <body>
      <div class="preloader d-none bg-soft flex-column justify-content-center align-items-center">
        <img class="loader-element" height="50" src="<?= base_url() ?>/assets/img/favicon/logo-dark.png" alt="Logo dark" />
      </div>
      <nav class="navbar navbar-dark navbar-theme-warning col-12 d-md-none">
            <a class="navbar-brand mr-lg-5" href="<?=base_url()?>">
                <img class="navbar-brand-dark" src="<?=base_url()?>/assets/img/favicon/logo-white.png" alt="Pixel Logo Dark" />
                <img class="navbar-brand-light" src="<?=base_url()?>/assets/img/favicon/logo-dark.png" alt="Pixel Logo Dark" />
                <?= APP_NAME ?>
            </a>
            <div class="d-flex align-items-center">
                <button class="navbar-toggler d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        <div class="container-fluid bg-soft">
            <div class="row">
                <div class="col-12">
                    <?=view('dashboard/template/nav')?>
                    <main class="content">
                      <?= $this->renderSection('main') ?>
                      <?=view('dashboard/template/footer')?>
                    </main>
                </div>
            </div>
        </div>
        
        <?=  view('template/common_scripts')  ?>
        
    </body>
</html>