<?= $this->extend($config->dashboard) ?> 
<?= $this->section('scripts') ?>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
                            <div>
                                <button class="btn btn-secondary mr-2 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-plus mr-2"></span>New</button>
                                <div class="dropdown-menu dashboard-dropdown dropdown-menu-left mt-2">
                                    <a class="dropdown-item font-weight-bold" href="#"><span class="far fa-file-alt mr-2"></span>Document</a>
                                    <a class="dropdown-item font-weight-bold" href="#"><span class="far fa-comment-dots mr-2"></span>Message</a>
                                    <a class="dropdown-item font-weight-bold" href="#"><span class="fas fa-box-open mr-2"></span>Product</a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item font-weight-bold" href="#"><span class="fas fa-rocket text-danger mr-2"></span>Subscription Plan</a>
                                </div>
                            </div>
                            <div>
                                <div class="btn-group">
                                    <button type="button" data-toggle="tooltip" title="Calendar" class="btn btn-primary"><span class="fas fa-calendar-alt"></span></button>
                                </div>
                                <button class="btn btn-primary mr-2 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="fas fa-clipboard mr-2"></span>Reports <span class="icon icon-small ml-1"><span class="fas fa-chevron-down"></span></span>
                                </button>
                                <div class="dropdown-menu dashboard-dropdown dropdown-menu-left mt-2">
                                    <a class="dropdown-item font-weight-bold" href="#"><span class="fas fa-box-open mr-2"></span>Products</a>
                                    <a class="dropdown-item font-weight-bold" href="#"><span class="fas fa-store mr-2"></span>Customers</a>
                                    <a class="dropdown-item font-weight-bold" href="#"><span class="fas fa-cart-arrow-down mr-2"></span>Orders</a>
                                    <a class="dropdown-item font-weight-bold" href="#"><span class="fas fa-chart-pie mr-2"></span>Console</a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item font-weight-bold" href="#"><span class="fas fa-rocket text-success mr-2"></span>All Reports</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-xl-8">
                                <div class="card card-body bg-white border-light shadow-sm mb-4">
                                    <h2 class="h5 mb-4">General information</h2>
                                    <form>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group"><label for="first_name">First Name</label> <input class="form-control" id="first_name" type="text" placeholder="Enter your first name" required /></div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group"><label for="last_name">Last Name</label> <input class="form-control" id="last_name" type="text" placeholder="Also your last name" required /></div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="birthday">Birthday</label> <input type="text" class="form-control flatpickr-input" id="birthday" data-toggle="date" placeholder="Select your birth date" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="gender">Gender</label>
                                                    <select class="custom-select" id="gender">
                                                        <option disabled="disabled" selected="selected">Select option</option>
                                                        <option value="1">Female</option>
                                                        <option value="2">Male</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group"><label for="email">Email</label> <input class="form-control" id="email" type="email" placeholder="name@company.com" required /></div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group"><label for="phone">Phone</label> <input class="form-control" id="phone" type="number" placeholder="+12-345 678 910" required /></div>
                                            </div>
                                        </div>
                                        <h2 class="h5 my-4">Adress</h2>
                                        <div class="row">
                                            <div class="col-sm-9 mb-3">
                                                <div class="form-group"><label for="address">Address</label> <input class="form-control" id="address" type="text" placeholder="Enter your home address" required /></div>
                                            </div>
                                            <div class="col-sm-3 mb-3">
                                                <div class="form-group"><label for="number">Number</label> <input class="form-control" id="number" type="number" placeholder="No." required /></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 mb-3">
                                                <div class="form-group"><label for="city">City</label> <input class="form-control" id="city" type="text" placeholder="City" required /></div>
                                            </div>
                                            <div class="col-sm-4 mb-3">
                                                <div class="form-group">
                                                    <label for="country">Country</label>
                                                    <select
                                                        class="form-control select2-hidden-accessible"
                                                        id="country"
                                                        data-toggle="select"
                                                        title="Country"
                                                        data-live-search="true"
                                                        data-live-search-placeholder="Country"
                                                        data-select2-id="1"
                                                        tabindex="-1"
                                                        aria-hidden="true"
                                                    >
                                                        <option data-select2-id="3">United States</option>
                                                        <option>Canada</option>
                                                        <option>Germany</option>
                                                        <option>Spain</option>
                                                        <option>Italy</option>
                                                        <option>UK</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group"><label for="zip">ZIP</label> <input class="form-control" id="zip" type="tel" placeholder="ZIP" required /></div>
                                            </div>
                                        </div>
                                        <div class="mt-3"><button type="submit" class="btn btn-primary">Save All</button></div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-12 col-xl-4">
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-xl-12">
                                        <div class="card card-body bg-white border-light shadow-sm mb-4">
                                            <h2 class="h5 mb-4">Select profile photo</h2>
                                            <div class="d-xl-flex align-items-center">
                                                <div>
                                                    <div class="user-avatar xl-avatar mb-3"><img class="rounded" src="../../assets/img/team/profile-picture-3.jpg" alt="change avatar" /></div>
                                                </div>
                                                <div class="file-field">
                                                    <div class="d-flex justify-content-xl-center ml-xl-3">
                                                        <div class="d-flex">
                                                            <span class="icon icon-md"><span class="fas fa-paperclip mr-3"></span></span> <input type="file" />
                                                            <div class="d-md-block text-left">
                                                                <div class="font-weight-normal text-dark mb-1">Choose Image</div>
                                                                <div class="text-gray small">JPG, GIF or PNG. Max size of 800K</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-xl-12">
                                        <div class="card card-body bg-white border-light shadow-sm mb-4">
                                            <h2 class="h5 mb-4">Select cover photo</h2>
                                            <div class="d-xl-flex align-items-center">
                                                <div>
                                                    <div class="user-avatar xl-avatar mb-3"><img class="rounded" src="../../assets/img/carousel/image-2.jpg" alt="change avatar" /></div>
                                                </div>
                                                <div class="file-field">
                                                    <div class="d-flex justify-content-xl-center ml-xl-3">
                                                        <div class="d-flex">
                                                            <span class="icon icon-md"><span class="fas fa-paperclip mr-3"></span></span> <input type="file" />
                                                            <div class="d-md-block text-left">
                                                                <div class="font-weight-normal text-dark mb-1">Choose Image</div>
                                                                <div class="text-gray small">JPG, GIF or PNG. Max size of 800K</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-4 mb-xl-0">
                                        <div class="card card-body bg-white border-light">
                                            <h2 class="h5 mb-4">Alerts & Notifications</h2>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item d-flex align-items-center justify-content-between px-0 border-bottom">
                                                    <div>
                                                        <h3 class="h6 mb-1">Company News</h3>
                                                        <p class="small pr-4">Get Rocket news, announcements, and product updates</p>
                                                    </div>
                                                    <div>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="user-notification-1" checked="checked" /> <label class="custom-control-label" for="user-notification-1"></label>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex align-items-center justify-content-between px-0 border-bottom">
                                                    <div>
                                                        <h3 class="h6 mb-1">Account Activity</h3>
                                                        <p class="small pr-4">Get important notifications about you or activity you've missed</p>
                                                    </div>
                                                    <div>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="user-notification-2" /> <label class="custom-control-label" for="user-notification-2"></label>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                                                    <div>
                                                        <h3 class="h6 mb-1">Meetups Near You</h3>
                                                        <p class="small pr-4">Get an email when a Dribbble Meetup is posted close to my location</p>
                                                    </div>
                                                    <div>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="user-notification-3" checked="checked" /> <label class="custom-control-label" for="user-notification-3"></label>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
<?= $this->endSection() ?>
