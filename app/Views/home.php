<?= $this->extend($config->viewLayout) ?>

<?= $this->section('scripts') ?>
<script src="<?= base_url() ?>/assets/js/vue.min.js"></script>
<script src="<?= base_url() ?>/assets/js/home.vue.js"></script>
  
<?= $this->endSection() ?>

<?= $this->section('main') ?>
      
      <section class="section-header pb-7 pb-lg-11 bg-soft">
          <div class="container-fluid">
              <div class="row justify-content-between align-items-center">
                  <div class="col-12 col-lg-6 order-2 order-lg-1"><img src="<?= base_url() ?>/assets/img/illustrations/arch-04.png" class="w-100" alt="" /></div>
                  <div class="col-12 col-lg-5 order-1 order-lg-2">
                      <h1 class="display-2 mb-3">Welcome to <span class="">Yohplanner.org</span></h1>
                      <p class="lead">Are you looking for beautiful and carefully crafted architectural designs?  You're at the right place at the right time.</p>
                      <div class="mt-4">
                          <form action="#" class="d-flex mb-5 mb-lg-0">
                              <input class="form-control mb-3 mr-2" type="text" name="search" placeholder="Search the kind of building, structure type, or price" required /> 
                              <div>
                                <button class="btn btn-warning" type="submit">search</button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
          <div class="pattern bottom"></div>
      </section>
      
      <section class="section section-lg pt-6">
          <div class="container-fluid">
              <div class="row justify-content-center mb-5 mb-md-7">
                  <div class="col-12 col-md-8 text-center">
                      <h2 class="h1 font-weight-bolder mb-4">Meet our creative platform</h2>
                      <p class="lead">
                        Yohplanner can provide an indepth design and analysis on your desired building in any level.
                      </p>
                  </div>
              </div>
              <div class="row row-grid align-items-center mb-5 mb-md-7">
                  <div class="col-12 col-md-5">
                      <h2 class="font-weight-bolder mb-4">Public Structures</h2>
                      <p class="lead">
                        Their is no limit to what you can find here, 
                        hotels and hospitals is just the start. 
                        All designs on this platform are fully customizable. 
                      </p>
                      <p class="lead">Are you running out of time? Not an issue.</p>
                      <a href="about.html" class="btn btn-warning mt-3 animate-up-2">
                          See more <span class="icon icon-xs ml-2"><i class="fas fa-external-link-alt"></i></span>
                      </a>
                  </div>
                  <div class="col-12 col-md-6 ml-md-auto"><img src="<?= base_url() ?>/assets/img/illustrations/arch-01.png" class="w-100" alt="" /></div>
              </div>
              <div class="row row-grid align-items-center mb-5 mb-md-7">
                  <div class="col-12 col-md-5 order-md-2">
                      <h2 class="font-weight-bolder mb-4">Homes</h2>
                      <p>
                        Find your dream home structure with detailed cost analysis at ease. 
                      </p>
                      <p>
                        Yohplanner is for both individuals and companies. 
                      </p>
                      <a href="dashboard/app-analysis.html" class="btn btn-warning mt-3 animate-up-2">
                         See more <span class="icon icon-xs ml-2"><i class="fas fa-external-link-alt"></i></span>
                      </a>
                  </div>
                  <div class="col-12 col-md-6 mr-lg-auto"><img src="<?= base_url() ?>/assets/img/illustrations/arch-03.png" class="w-100" alt="" /></div>
              </div>
              
          </div>
      </section>
      
      <section class="section section-lg pb-5 bg-soft">
          <div class="container-fluid">
              <div class="row mb-5">
                  <div class="col-12 text-center mb-5">
                      <h2 class="mb-4">Latest structures</h2>
                      <p class="lead">Join over <span class="font-weight-bolder">300,000+</span> users</p>
                  </div>
                  <div class="col-12 mb-3 text-center">
                      <button type="button" class="btn btn-secondary animate-up-2" data-toggle="modal" data-target=".pricing-modal">
                          <span class="mr-2"><i class="fas fa-hand-pointer"></i></span>
                          Create custom order
                      </button>
                  </div>
              </div>
              
               <!-- ARCHITECTURAL DESIGNS-->
              <div id="plans" class="app">
                <div class="row mb-3">
                  <plans v-for="design in plans" :plan="design" ></plans>
                </div>
                
                <div align="center" class="mt-3 mb-4">
                  <button v-if="plans.length > count" @click="loadPlans()" class="btn-soft btn btn-sm rounded-pill btn-outline-warning">
                    load more 
                  </button>
                </div>
              </div>
              
              <!-- OTHER INFORMATIONS -->
              <div class="row">
                  <div class="col-12 col-md-6 col-lg-4 mb-4">
                      <div class="card border-light p-4">
                          <div class="card-body">
                              <h2 class="display-2 mb-2">98%</h2>
                              <span>Average satisfaction rating received in the past year</span>
                          </div>
                      </div>
                  </div>
                  <div class="col-12 col-md-6 col-lg-4 mb-4">
                      <div class="card border-light p-4">
                          <div class="card-body">
                              <h2 class="display-2 mb-2">24/7</h2>
                              <span>Our support team is a quick chat or email away — 24 hours a day</span>
                          </div>
                      </div>
                  </div>
                  <div class="col-12 col-md-6 col-lg-4 mb-4">
                      <div class="card border-light p-4">
                          <div class="card-body">
                              <h2 class="display-2 mb-2">220k+</h2>
                              <span>Extension installs from the two major mobile app stores</span>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
        
<?= $this->endSection() ?>  
