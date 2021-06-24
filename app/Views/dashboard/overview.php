<?= $this->extend($config->dashboard) ?> 
<?= $this->section('scripts') ?>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
      <div class="btn-toolbar">
          <button class="btn btn-primary btn-sm mr-2 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-plus mr-2"></span>New Task</button>
          <div class="dropdown-menu dashboard-dropdown dropdown-menu-left mt-2">
              <a class="dropdown-item font-weight-bold" href="#"><span class="fas fa-tasks mr-2"></span>New Task</a>
              <a class="dropdown-item font-weight-bold" href="#"><span class="fas fa-cloud-upload-alt mr-2"></span>Upload Files</a>
              <a class="dropdown-item font-weight-bold" href="#"><span class="fas fa-user-shield mr-2"></span>Preview Security</a>
              <div role="separator" class="dropdown-divider"></div>
              <a class="dropdown-item font-weight-bold" href="#"><span class="fas fa-rocket text-danger mr-2"></span>Upgrade to Pro</a>
          </div>
      </div>
      <div class="btn-group mr-2"><button type="button" class="btn btn-sm btn-outline-secondary">Share</button> <button type="button" class="btn btn-sm btn-outline-secondary">Export</button></div>
  </div>
  <div class="row justify-content-md-center">
      <div class="col-12 col-sm-6 col-xl-4 mb-4">
          <div class="card border-light shadow-sm">
              <div class="card-body">
                  <div class="row d-block d-xl-flex align-items-center">
                      <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                          <div class="icon icon-shape icon-md icon-shape-primary rounded mr-4 mr-sm-0"><span class="fas fa-chart-line"></span></div>
                          <div class="d-sm-none">
                              <h2 class="h5">Total Visits</h2>
                              <h3 class="mb-1">345,678</h3>
                          </div>
                      </div>
                      <div class="col-12 col-xl-7 px-xl-0">
                          <div class="d-none d-sm-block">
                              <h2 class="h5">Total Visits</h2>
                              <h3 class="mb-1">345,678</h3>
                          </div>
                          <small>
                              Feb 1 - Apr 1, <span class="icon icon-small"><span class="fas fa-globe-europe"></span></span> WorldWide
                          </small>
                          <div class="small mt-2"><span class="fas fa-angle-up text-success"></span> <span class="text-success font-weight-bold">18.2%</span> Since last month</div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-12 col-sm-6 col-xl-4 mb-4">
          <div class="card border-light shadow-sm">
              <div class="card-body">
                  <div class="row d-block d-xl-flex align-items-center">
                      <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                          <div class="icon icon-shape icon-md icon-shape-tertiary rounded mr-4"><span class="fas fa-users"></span></div>
                          <div class="d-sm-none">
                              <h2 class="h5">New Users</h2>
                              <h3 class="mb-1">5,342</h3>
                          </div>
                      </div>
                      <div class="col-12 col-xl-7 px-xl-0">
                          <div class="d-none d-sm-block">
                              <h2 class="h5">New Users</h2>
                              <h3 class="mb-1">5,342</h3>
                          </div>
                          <small>
                              Feb 1 - Apr 1, <span class="icon icon-small"><span class="fas fa-globe-europe"></span></span> Worldwide
                          </small>
                          <div class="small mt-2"><span class="fas fa-angle-up text-success"></span> <span class="text-success font-weight-bold">28.2%</span> Since last month</div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-12 col-sm-6 col-xl-4 mb-4">
          <div class="card border-light shadow-sm">
              <div class="card-body">
                  <div class="row d-block d-xl-flex align-items-center">
                      <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center"><div class="ct-chart-traffic-share ct-golden-section ct-series-a"></div></div>
                      <div class="col-12 col-xl-7 px-xl-0">
                          <h2 class="h5">Traffic Share</h2>
                          <div class="mb-3 small">
                              Feb 1 - Apr 1, <span class="icon icon-small"><span class="fas fa-globe-europe"></span></span> Worldwide
                          </div>
                          <h6 class="font-weight-normal text-gray">
                              <span class="icon w-20 icon-xs icon-secondary mr-1"><span class="fas fa-desktop"></span></span> Desktop <a href="#" class="h6">70%</a>
                          </h6>
                          <h6 class="font-weight-normal text-gray">
                              <span class="icon w-20 icon-xs icon-primary mr-1"><span class="fas fa-mobile-alt"></span></span> Mobile Web <a href="#" class="h6">30%</a>
                          </h6>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-12 col-sm-6 col-xl-4 mb-4">
          <div class="card border-light shadow-sm">
              <div class="card-body d-flex flex-row align-items-center flex-0 border-bottom">
                  <div class="d-block">
                      <div class="h6 font-weight-normal text-gray mb-2">App Ranking</div>
                      <h2 class="h3">452</h2>
                      <div class="small mt-2"><span class="fas fa-angle-up text-success"></span> <span class="text-success font-weight-bold">18.2%</span></div>
                  </div>
                  <div class="d-block ml-auto">
                      <div class="d-flex align-items-center text-right mb-2"><span class="shape-xs rounded-circle bg-primary mr-2"></span> <span class="font-weight-normal small">All</span></div>
                      <div class="d-flex align-items-center text-right"><span class="shape-xs rounded-circle bg-secondary mr-2"></span> <span class="font-weight-normal small">Widgets</span></div>
                  </div>
              </div>
              <div class="card-body p-2"><div class="ct-chart-ranking ct-golden-section ct-series-a"></div></div>
          </div>
      </div>
      <div class="col-12 col-lg-6 col-xl-4 mb-4">
          <div class="card border-light shadow-sm">
              <div class="card-body d-flex flex-row align-items-center flex-0 border-bottom">
                  <div class="d-block">
                      <div class="h6 font-weight-normal text-gray mb-2">Traffic by Source</div>
                      <h2 class="h4">Google</h2>
                      <div class="small mt-2"><span class="fas fa-angle-up text-success"></span> <span class="text-success font-weight-bold">10.57%</span></div>
                  </div>
                  <div class="d-block ml-auto">
                      <div class="d-flex align-items-center text-right mb-2"><span class="shape-xs rounded-circle bg-primary mr-2"></span> <span class="font-weight-normal small">Google</span></div>
                      <div class="d-flex align-items-center text-right mb-2"><span class="shape-xs rounded-circle bg-secondary mr-2"></span> <span class="font-weight-normal small">Yahoo</span></div>
                      <div class="d-flex align-items-center text-right mb-2"><span class="shape-xs rounded-circle bg-tertiary mr-2"></span> <span class="font-weight-normal small">Yandex</span></div>
                  </div>
              </div>
              <div class="card-body p-2"><div class="ct-chart-traffic-source ct-golden-section ct-series-a"></div></div>
          </div>
      </div>
      <div class="col-12 col-lg-6 col-xl-4 mb-4">
          <div class="card border-light shadow-sm">
              <div class="card-body d-flex flex-row align-items-center flex-0 border-bottom">
                  <div class="d-block">
                      <div class="h6 font-weight-normal text-gray mb-2">Organic vs Paid Search</div>
                      <h2 class="h4">Trafic Distibution</h2>
                      <div class="small mt-2"><span class="fas fa-angle-up text-success"></span> <span class="text-success font-weight-bold">$10.57%</span></div>
                  </div>
                  <div class="d-block ml-auto">
                      <div class="d-flex align-items-center text-right mb-2"><span class="shape-xs rounded-circle bg-secondary mr-2"></span> <span class="font-weight-normal small">Organic</span></div>
                      <div class="d-flex align-items-center text-right mb-2"><span class="shape-xs rounded-circle bg-tertiary mr-2"></span> <span class="font-weight-normal small">Direct</span></div>
                      <div class="d-flex align-items-center text-right mb-2"><span class="shape-xs rounded-circle bg-primary mr-2"></span> <span class="font-weight-normal small">Paid</span></div>
                  </div>
              </div>
              <div class="card-body p-2"><div class="ct-chart-distribution ct-golden-section ct-series-a"></div></div>
          </div>
      </div>
  </div>
  <div class="row">
      <div class="col-12 col-xl-8 mb-4">
          <div class="row">
              <div class="col-12 mb-4">
                  <div class="card border-light shadow-sm">
                      <div class="card-body d-flex flex-row align-items-center flex-0 border-bottom">
                          <div class="d-block">
                              <div class="h6 font-weight-normal text-gray mb-2">Sales Value</div>
                              <h2 class="h3">10,567</h2>
                              <div class="small mt-2"><span class="fas fa-angle-up text-success"></span> <span class="text-success font-weight-bold">$10.57%</span></div>
                          </div>
                          <div class="d-flex ml-auto"><a href="#" class="btn btn-tertiary btn-sm mr-3">Month</a> <a href="#" class="btn btn-white border-light btn-sm mr-3">Week</a></div>
                      </div>
                      <div class="card-body p-2"><div class="ct-chart-sales-value ct-major-tenth ct-series-b"></div></div>
                  </div>
              </div>
              <div class="col-12">
                  <div class="card border-light shadow-sm">
                      <div class="card-header">
                          <div class="row align-items-center">
                              <div class="col"><h2 class="h5">Page visits</h2></div>
                              <div class="col text-right"><a href="#" class="btn btn-sm btn-secondary">See all</a></div>
                          </div>
                      </div>
                      <div class="table-responsive">
                          <table class="table align-items-center table-flush">
                              <thead class="thead-light">
                                  <tr>
                                      <th scope="col">Page name</th>
                                      <th scope="col">Page Views</th>
                                      <th scope="col">Page Value</th>
                                      <th scope="col">Bounce rate</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <th scope="row">/demo/admin/index.html</th>
                                      <td>3,225</td>
                                      <td>$20</td>
                                      <td><span class="fas fa-arrow-up text-danger mr-3"></span> 42,55%</td>
                                  </tr>
                                  <tr>
                                      <th scope="row">/demo/admin/forms.html</th>
                                      <td>2,987</td>
                                      <td>0</td>
                                      <td><span class="fas fa-arrow-down text-success mr-3"></span> 43,52%</td>
                                  </tr>
                                  <tr>
                                      <th scope="row">/demo/admin/util.html</th>
                                      <td>2,844</td>
                                      <td>294</td>
                                      <td><span class="fas fa-arrow-down text-success mr-3"></span> 32,35%</td>
                                  </tr>
                                  <tr>
                                      <th scope="row">/demo/admin/validation.html</th>
                                      <td>2,050</td>
                                      <td>$147</td>
                                      <td><span class="fas fa-arrow-up text-danger mr-3"></span> 50,87%</td>
                                  </tr>
                                  <tr>
                                      <th scope="row">/demo/admin/modals.html</th>
                                      <td>1,483</td>
                                      <td>$19</td>
                                      <td><span class="fas fa-arrow-down text-success mr-3"></span> 32,24%</td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-12 col-xl-4 mb-4">
          <div class="col-12 px-0 mb-4">
              <div class="card border-light shadow-sm">
                  <div class="card-body">
                      <div class="d-flex align-items-center justify-content-between border-bottom border-light pb-3">
                          <div>
                              <h6 class="mb-0">
                                  <span class="icon icon-xs mr-3"><span class="fas fa-globe-europe"></span></span>Global Rank
                              </h6>
                          </div>
                          <div>
                              <a href="#" class="text-primary font-weight-bold">#755<span class="fas fa-chart-line ml-2"></span></a>
                          </div>
                      </div>
                      <div class="d-flex align-items-center justify-content-between border-bottom border-light py-3">
                          <div>
                              <h6 class="mb-0">
                                  <span class="icon icon-xs mr-3"><span class="fas fa-flag-usa"></span></span>Country Rank
                              </h6>
                              <div class="small card-stats">
                                  United States<span class="icon icon-xs text-success ml-2"><span class="fas fa-angle-up"></span></span>
                              </div>
                          </div>
                          <div>
                              <a href="#" class="text-primary font-weight-bold">#32<span class="fas fa-chart-line ml-2"></span></a>
                          </div>
                      </div>
                      <div class="d-flex align-items-center justify-content-between pt-3">
                          <div>
                              <h6 class="mb-0">
                                  <span class="icon icon-xs mr-3"><span class="fas fa-folder-open"></span></span>Category Rank
                              </h6>
                              <a href="#" class="small card-stats">Travel > Accomodation</a>
                          </div>
                          <div>
                              <a href="#" class="text-primary font-weight-bold">#16<span class="fas fa-chart-line ml-2"></span></a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-12 px-0 mb-4">
              <div class="card border-light shadow-sm">
                  <div class="card-body">
                      <h2 class="h5">Acquisition</h2>
                      <p>Tells you where your visitors originated from, such as search engines, social networks or website referrals.</p>
                      <div class="d-block">
                          <div class="d-flex align-items-center pt-3 mr-5">
                              <div class="icon icon-shape icon-sm icon-shape-primary rounded mr-3"><span class="fas fa-chart-bar"></span></div>
                              <div class="d-block">
                                  <label class="mb-0">Bounce Rate</label>
                                  <h4 class="mb-0">33.50%</h4>
                              </div>
                          </div>
                          <div class="d-flex align-items-center pt-3">
                              <div class="icon icon-shape icon-sm icon-shape-secondary rounded mr-3"><span class="fas fa-chart-area"></span></div>
                              <div class="d-block">
                                  <label class="mb-0">Sessions</label>
                                  <h4 class="mb-0">9,567</h4>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-12 px-0">
              <div class="card border-light shadow-sm">
                  <div class="card-header pb-0">
                      <h2 class="h5">Visits By Country</h2>
                      <div id="vmap" style="width: 100%; height: 300px;"></div>
                  </div>
                  <div class="card-body">
                      <div class="row align-items-center mb-4">
                          <div class="col-auto">
                              <a href="#" class="image image-xs rounded-circle"><img alt="Image placeholder" src="../../assets/img/flags/united-states-of-america.svg" /></a>
                          </div>
                          <div class="col">
                              <div class="progress-wrapper">
                                  <div class="progress-info">
                                      <div class="h6 mb-0">United States</div>
                                      <div class="small font-weight-bold text-dark"><span>34 %</span></div>
                                  </div>
                                  <div class="progress mb-0"><div class="progress-bar bg-primary" role="progressbar" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100" style="width: 34%;"></div></div>
                              </div>
                          </div>
                      </div>
                      <div class="row align-items-center mb-4">
                          <div class="col-auto">
                              <a href="#" class="image image-xs rounded-circle"><img alt="Image placeholder" src="../../assets/img/flags/canada.svg" /></a>
                          </div>
                          <div class="col">
                              <div class="progress-wrapper">
                                  <div class="progress-info">
                                      <div class="h6 mb-0">Canada</div>
                                      <div class="small font-weight-bold text-dark"><span>20 %</span></div>
                                  </div>
                                  <div class="progress mb-0"><div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 24%;"></div></div>
                              </div>
                          </div>
                      </div>
                      <div class="row align-items-center mb-4">
                          <div class="col-auto">
                              <a href="#" class="image image-xs rounded-circle"><img alt="Image placeholder" src="../../assets/img/flags/germany.svg" /></a>
                          </div>
                          <div class="col">
                              <div class="progress-wrapper">
                                  <div class="progress-info">
                                      <div class="h6 mb-0">Germany</div>
                                      <div class="small font-weight-bold text-dark"><span>15 %</span></div>
                                  </div>
                                  <div class="progress mb-0"><div class="progress-bar bg-tertiary" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" style="width: 15%;"></div></div>
                              </div>
                          </div>
                      </div>
                      <div class="row align-items-center">
                          <div class="col-auto">
                              <a href="#" class="image image-xs rounded-circle"><img alt="Image placeholder" src="../../assets/img/flags/france.svg" /></a>
                          </div>
                          <div class="col">
                              <div class="progress-wrapper">
                                  <div class="progress-info">
                                      <div class="h6 mb-0">France</div>
                                      <div class="small font-weight-bold text-dark"><span>8 %</span></div>
                                  </div>
                                  <div class="progress mb-0"><div class="progress-bar bg-primary" role="progressbar" aria-valuenow="8" aria-valuemin="0" aria-valuemax="100" style="width: 8%;"></div></div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
<?= $this->endSection() ?>
