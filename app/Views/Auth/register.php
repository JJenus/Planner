
<?= $this->extend($config->viewLayout) ?>

<?= $this->section('scripts') ?>
  
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<style>
 
</style>
  <section class="h-100 section-header bg-soft pb-5">
      <div class="container h-100 ">
          <div class="row h-100 justify-content-center align-items-center form-bg-image" data-background="../assets/img/illustrations/signin.svg">
              <div class="col-auto align-items-center justify-content-center">
                  <div class="signin-inner bg-white shadow-soft border border-light rounded p-4 p-lg-5 w-100 fmxw-500">
                      <div class="text-center text-md-center mb-4 mt-md-0"><h1 class="h3 font-weight-bold mb-3">Create an account</h1></div>
                      
                      <?= view('Auth/_message_block') ?>
                      <span class="clearfix"></span>
                      
                      <form novalidate class="needs-validation" role="form" action="<?= route_to('attemptRegister') ?>" method="post">
                          <?= csrf_field() ?>
                          <div class="form-group">
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="far fa-user"></i></span>
                                  </div>
                                  <input value="<?= old('fullname') ?>" name="fullname" type="text" class="form-control" id="input-fullname" placeholder="Enter fullname" required />
                              </div>
                              <div class="invalid-feedback d-block">
                								<?= session('errors.fullname') ?>
                							</div>
                          </div>
                          
                          <div class="form-group">
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="far fa-envelope"></i></span>
                                  </div>
                                  <input value="<?= old('email') ?>" name="email" type="email" class="form-control" id="input-email" placeholder="Enter email" required />
                              </div>
                          </div>
                         
                          <div class="form-group">
                              
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                                  </div>
                                  <input  value="<?= old('password') ?>" class="form-control" name="password" placeholder="Password" type="password" required />
                                  <div class="input-group-append show-password">
                                      <span class="input-group-text"><i id="pass-eye" class="far fa-eye"></i></span>
                                  </div>
                                  
                              </div>
                              
                              <div class="input-group mt-3">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                                  </div>
                                  <input name="confirm_password" value="<?= old('confirm_password') ?>" type="password" class="form-control" id="input-password-confirm" placeholder="Confirm password" required />
                              </div>
                              <div class="d-block d-sm-flex justify-content-between align-items-center mt-2">
                                  <div class="form-group form-check mt-3">
                                      <input type="checkbox" class="form-check-input" id="agreeTerms" required/>
                                      <label class="form-check-label form-check-sign-white" for="agreeTerms">I agree to the <a href="<?= route_to('terms') ?>">terms and conditions</a></label>
                                      <div class="invalid-feedback">
                                        Please accept the terms to continue 
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="mt-3"><button type="submit" class="btn btn-block btn-warning">Sign in</button></div>
                      </form>
                      <div class="mt-3 mb-4 text-center"><span class="font-weight-normal">or</span></div>
                      <div class="btn-wrapper my-4 text-center">
                          <button class="btn mr-2 btn-icon-only btn-pill btn-twitter" type="button">
                              <span class="btn-inner-icon"><i class="fab fa-twitter"></i></span>
                          </button>
                          <button class="btn mr-2 btn-icon-only btn-pill btn-facebook" type="button">
                              <span class="btn-inner-icon"><i class="fab fa-facebook-f"></i></span>
                          </button>
                          <button class="btn mr-2 btn-icon-only btn-pill btn-google" type="button">
                              <span class="btn-inner-icon"><i class="fab fa-google"></i></span>
                          </button>
                      </div>
                      <div class="d-block d-sm-flex justify-content-center align-items-center mt-4">
                          <span class="font-weight-normal">Already have an account? <a href="<?= route_to('login') ?>" class="font-weight-bold">Login here</a></span>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  
<?= $this->endSection() ?>  