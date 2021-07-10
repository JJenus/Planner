<?= $this->extend($config->viewLayout) ?>

<?= $this->section('styles') ?>
  <link type="text/css" href="<?= base_url() ?>/assets/libs/tiny-slider/dist/tiny-slider.css" rel="stylesheet" />
  <link type="text/css" href="<?= base_url() ?>/assets/css/cs-carousel.css" rel="stylesheet" />
<style>
  
</style>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="<?=base_url()?>/assets/libs/tiny-slider/dist/tiny-slider.js"></script>
<script src="<?=base_url()?>/assets/js/cs-carousel.js"></script>
  
<script src="<?= base_url() ?>/assets/js/vue.min.js"></script>
<script src="<?= base_url() ?>/assets/js/home.vue.js"></script>
<script >
  console.log(<?= json_encode($plan) ?>)
</script>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
      
      <section class="section-header pb-7 pb-lg-11 bg-soft">
          <div class="container-fluid">
              <div class="row justify-content-between align-items-center">
                  <div class="col-12 col-lg-5">
                      <!-- Nav option: Thumbnails -->
                      <div class="cs-carousel mb-3 border border-light rounded">
                        <div class="cs-carousel-inner" data-carousel-options='{
                          "gutter": 15,
                          "loop": false,
                          "navContainer": "#cs-thumbnails",
                          "navAsThumbnails": true
                        }'>
                      
                          <!-- Carousel item -->
                          <div class="position-relative rounded">
                            <img class="rounded-top" src="<?= $plan->images[0]["url"]  ?>">
                          </div>
                      
                          <!-- Carousel item -->
                          <div style="min-height : 200px;" class="position-relative">
                            <img class="rounded-top" src="<?= $plan->images[1]["url"]  ?>" alt="Slider image">
                          </div>
                          
                          <!-- Carousel item -->
                          <div style="min-height : 200px;" class="position-relative">
                            <img class="rounded-top" src="<?= $plan->images[2]["url"]  ?>" alt="Slider image">
                          </div>
                        </div>
                      
                        <!-- Thumbnails -->
                        <div class="cs-thumbnails" id="cs-thumbnails">
                          <button style="min-width: 25%; " class="file-select" data-input="1" type="button" data-nav="0">
                            <img id="thumb1" src="<?= $plan->images[0]["url"]  ?>" alt="Thumbnail">
                          </button>
                          <button style="min-width: 25%;"  class="file-select" data-input="2" type="button" data-nav="1">
                            <img id="thumb2" src="<?= $plan->images[1]["url"]  ?>" alt="Thumbnail">
                          </button>
                          <button style="min-width: 25%;"  class="file-select" data-input="3" type="button" data-nav="2">
                            <img id="thumb3" src="<?= $plan->images[2]["url"]  ?>" alt="Thumbnail">
                          </button>
                        </div>
                      </div>
                    <div class="d-flex d-flex-column justify-content-between ">
                      <span class="h6 "><?= $plan->category ?></span>
                      <span class="h6">Cost: <?= $plan->cost ?></span>
                    </div>
                    <div class="my-2">
                      <h4>Description</h4>
                      <p class="mb-4">
                        I am a php codeigniter developer that follows the best practices 
                        to eliminate the need for a href to be willing to help you out with 
                      </p>
                      <p class="mb-2">
                        <strong class="">Plan-<?= $plan->id ?></strong>
                      </p>
                      <?php foreach ($plan->infos as $info): ?>
                        <!-- html... -->
                        <p class="mb-1 font-size-sm"> <strong><?= $info['name'] ?>: <?= $info['value'] ?></strong> </p>
                      <?php endforeach; ?>
                    </div>
                    <div class="text-center pt-3 mt-5">
                      <button class="btn btn-warning ">
                        Buy Now
                      </button>
                    </div> 
                  </div>
              </div>
          </div>
          <div class="pattern bottom"></div>
      </section>
     
      <section class="section section-lg pt-6">
          <div class="container-fluid">
           
          </div>
      </section>
      
      <section class="section section-lg pt-6">
          <div class="container-fluid">
              <div class="row justify-content-center mb-5 mb-md-7">
                  <div class="col-12 col-md-8 text-center">
                      <h2 class="h1 font-weight-bolder mb-4">Similar plans</h2>
                  </div>
              </div>
              
          </div>
      </section>
      
<?= $this->endSection() ?>  
