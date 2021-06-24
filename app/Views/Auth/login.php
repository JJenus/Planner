<?= $this->extend($config->viewLayout) ?>

<?= $this->section('scripts') ?>
  
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<style type="text/css" media="all">
  
</style>
  <section class="h-100 section-header pb-5 bg-soft">
      <div class="container h-100">
          <div class="row h-100 justify-content-center align-items-center form-bg-image" data-background="../assets/img/illustrations/signin.svg">
              <div class="col-auto align-items-center justify-content-center">
                  <div class="signin-inner bg-white shadow-soft border border-light rounded p-4 p-lg-5 w-100 fmxw-500">
                      <div class="text-center text-md-center mb-4 mt-md-0">
                          <h1 class="mb-3 h3">Sign in to our platform</h1>
                          <p class="text-gray">Use your credentials to access your account.</p>
                      </div>
                      
                      <div class="my-3">
                        <?= view('App\Auth\_message_block') ?> 
                      </div>
                      
                      <form novalidate class=" needs-validation" role="form" action="<?= route_to('attemptLogin') ?>" method="post">
                        <?= csrf_field() ?>
                        
                          <div class="form-group">
                              <div class="input-group <?php if(session('errors.password')) : ?>has-danger<?php endif ?> ">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="far fa-envelope"></i></span>
                                  </div>
                                  <input value="<?= old('login') ?>" name="login" type="email" class="form-control <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>  " id="input-email" placeholder="Enter email" required />
                              </div>
                          </div>
                          
                          <div class="form-group">
                              <div class="input-group <?php if(session('errors.password')) : ?>has-danger<?php endif ?> ">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                                  </div>
                                  <input value="<?= old('password') ?>" name="password"  class="<?php if(session('errors.password')) : ?>is-invalid<?php endif ?>  form-control " placeholder="Password" type="password" required />
                                  <div class="input-group-append show-password">
                                      <span class="input-group-text"><i id="pass-eye" class="far fa-eye"></i></span>
                                  </div>
                              </div>
                              
                              <div class="invalid-feedback d-block">
                  								<?= session('errors.password') ?>
                  						</div>
                  						
                              <div class="d-block d-sm-flex justify-content-between align-items-center mt-2">
                                  <div class="form-group form-check mt-3">
                                      <input name="remember" type="checkbox" class="form-check-input" id="exampleCheck1" /> <label class="form-check-label form-check-sign-white" for="exampleCheck1">Remember me</label>
                                  </div>
                                  <div><a href="<?= route_to('forgot') ?>" class="small text-right">Lost password?</a></div>
                              </div>
                          </div>
                          <div class="mt-3"><button type="submit" class="btn btn-block btn-warning">Sign in</button></div>
                      </form>
                      <div class="mt-3 mb-4 text-center"><span class="font-weight-normal">or login with</span></div>
                      <div class="btn-wrapper my-4 text-center">
                          <button class="btn btn-icon-only btn-twitter mr-2" type="button">
                              <span><i class="fab fa-twitter"></i></span>
                          </button>
                          <button class="btn mr-2 btn-icon-only btn-pill btn-facebook" type="button">
                              <span class="btn-inner-icon"><i class="fab fa-facebook-f"></i></span>
                          </button>
                          <button class="btn mr-2 btn-icon-only btn-pill btn-google" type="button">
                              <span class="btn-inner-icon"><i class="fab fa-google"></i></span>
                          </button>
                      </div>
                      <div class="d-block d-sm-flex justify-content-center align-items-center mt-4">
                          <span class="font-weight-normal">Not registered? <a href="<?= route_to('register') ?>" class="font-weight-bold">Create account</a></span>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section> 
  
<?= $this->endSection() ?>
