<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Rocket - Landing 3 Page</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no" />
        <meta name="title" content="Rocket - Landing 3 Page" />
        <meta name="author" content="Themesberg" />
        <meta name="description" content="Rocket is a premium SaaS Bootstrap 4 Dashboard template featuring over 27 presentational and technical pages including pricing, support, team, careers and many more." />
        <meta name="keywords" content="bootstrap, bootstrap template, saas website template, saas bootstrap template, saas bootstrap 4 template, saas bootstrap theme, saas bootstrap 4 theme, dashboard, saas dashboard, themesberg" />
        <link rel="canonical" href="external.html?link=https://themes.getbootstrap.com/product/rocket/" />
        <link rel="apple-touch-icon" sizes="120x120" href="assets/assets/img/favicon/apple-touch-icon.png" />
        <link rel="icon" type="image/png" sizes="32x32" href="/assets/assets/img/favicon/favicon-32x32.png" />
        <link rel="icon" type="image/png" sizes="16x16" href="/assets/assets/img/favicon/favicon-16x16.png" />
        <link rel="manifest" href="<?= base_url() ?>/assets/assets/img/favicon/site.webmanifest" />
        <link rel="mask-icon" href="<?= base_url() ?>/assets/assets/img/favicon/safari-pinned-tab.svg" color="#ffffff" />
        <meta name="msapplication-TileColor" content="#ffffff" />
        <meta name="theme-color" content="#ffffff" />
        <link type="text/css" href="<?= base_url() ?>/assets/libs/%40fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
        <link type="text/css" href="<?= base_url() ?>/assets/libs/prismjs/themes/prism.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?= base_url() ?>/assets/libs/jqvmap/dist/jqvmap.min.css" />
        <link type="text/css" href="<?= base_url() ?>/assets/css/rocket.css" rel="stylesheet" />
        <script src="<?=base_url()?>/node_modules/eruda/eruda.js"></script>
        <script>eruda.init();</script>
        <?= $this->renderSection('styles') ?> 
    </head>
    <body>
      <div class="preloader bg-soft flex-column justify-content-center align-items-center">
        <img class="loader-element" height="50" src="<?= base_url() ?>/assets/img/favicon/logo-dark.png" alt="Logo dark" />
      </div>
        <?=  view('template/nav')  ?>
        <main>
          <?= $this->renderSection('main') ?>
          <?= view('template/footer') ?>
        </main>
        <?=  view('template/common_scripts')  ?>
    </body>
</html>