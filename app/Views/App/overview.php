<?= $this->extend($config->viewLayout) ?>

<?= $this->section('scripts') ?>
 <script type="text/javascript">
  $(function(){
    
    $('.toggleEdit').click(function (){
      $('#edit-profile').collapse('toggle')
      $('#user-data').collapse('toggle')
      $('#back-btn').toggleClass('d-none')
      $('#user-nav').toggleClass('d-none')
    })
  })
</script>
<?= $this->endSection() ?>  

<?= $this->section('main') ?>

  <section class="section-header bg-soft">
    <div class="container-fluid">
                                                                                                                                                            
      <div class="row mb-3">
        <div class="col-lg-4 col-md-6 mb-3">
          <div class="profile-card ">
            <div class="card shadow-soft border-light text-center">
              <div class="profile-image">
                <div class="card-img-top square py-5 mt-n3 rounded-circle border bg-warning text-white" >
                  <i class="fas fa-user fa-3x"></i>
                </div>
                <img src="<?= base_url() ?>/assets/img/illustrations/arch-04.png" class="card-img-top d-none" alt="image" />
              </div>
              <div class="card-body pb-0 mt-n5">
                  <h5 class="card-title">
                    <?= $user->fullname ?>
                    <small id="edit-data" class="toggleEdit btn-link"><i class="fas fa-pen ml-2"></i></small>
                  </h5>
                  <p class="card-text text-left my-2 mb-3">
                    <span class="mb-1 d-block">
                      <i class="fa fa-envelope mr-2"></i>
                      <?= $user->email ?>
                    </span>
                    <span class="mb-1 d-block">
                      <i class="fa fa-globe mr-2"></i>
                      <?php if ($user->country ): ?>
                        <?= $user->country ?>
                      <?php else: ?>
                        Location unknown
                      <?php endif; ?>
                    </span>
                    <span class="mb-1 d-block">
                      <i class="fa mr-2 fa-map-marker"></i>
                      <?php if ($user->address ): ?>
                        <?= $user->address ?>
                      <?php else: ?>
                        Address unknown
                      <?php endif; ?>
                    </span>
                  </p>
                  <button id="back-btn" class="btn d-none mb-3 toggleEdit btn-warning btn-block">
                    <i class="fas fa-arrow-left"></i>
                    Back
                  </button>
                  <div id="user-nav" class="nav-wrapper position-relative">
                      <ul class="nav nav-pills nav-pill-square nav-fill  justify-content-between ">
                          <li class="nav-item">
                              <a class="nav-link active" data-toggle="tab" href="#favorites">
                                  <span class="nav-link-icon d-block"><i class="far fa-heart"></i></span>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#invoices">
                                  <span class="nav-link-icon d-block"><i class="fas fa-receipt"></i></span>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#orders">
                                  <span class="nav-link-icon d-block"><i class="fas fa-shopping-cart"></i></span>
                              </a>
                          </li>
                      </ul>
                  </div> 
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-lg-8 col-md-6">
          <div class="card">
            <div class="card-body">
              <div id="user-data" class="tab-content collapse show">
                <div class="tab-pane fade show active" id="favorites" role="tabpanel">
                  <h5 class="text-center"> Favorites </h5>
                  <div class="text-grey opacity-6 border border-grey p-4 text-center">
                    Empty 
                  </div>
                </div>
                
                <div class="tab-pane fade" id="invoices" role="tabpanel">
                  <h5 class="text-center"> Invoices </h5>
                  <div class="text-grey opacity-6 border border-grey p-4 text-center">
                    Empty 
                  </div>
                </div>
                
                <div class="tab-pane fade" id="orders" role="tabpanel">
                  <h5 class="text-center"> Orders </h5>
                  <div class="text-grey opacity-6 border border-grey p-4 text-center">
                    Your orders will appear here
                  </div>
                </div>
              </div>
              
              <div id="edit-profile" class="collapse ">
                <h5 class="text-center mb-3"> Edit profile </h5>
                <form class="needs-validation" novalidate>
                  <div class="form-row">
                    <div class="col-md-4 mb-3">
                      <label for="validationCustom01">Full name</label>
                      <input type="text" class="form-control" id="validationCustom01" placeholder="Enter full name" required>
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="validationCustom03">Country</label>
                      <input type="text" class="form-control" id="validationCustom03" placeholder="Country" required>
                      <div class="invalid-feedback">
                        Please provide a valid country.
                      </div>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label for="validationCustom04">Address</label>
                      <input type="text" class="form-control" id="validationCustom04" placeholder="State" required>
                      <div class="invalid-feedback">
                        Please provide a valid address.
                      </div>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label for="validationCustom05">Zip</label>
                      <input type="text" class="form-control" id="validationCustom05" placeholder="Zip" required>
                      <div class="invalid-feedback">
                        Please provide a valid zip.
                      </div>
                    </div>
                  </div>
                  
                  <button class="btn btn-primary" type="submit">Submit form</button>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
              
    </div>
  </section>
  
<?= $this->endSection() ?>  
  