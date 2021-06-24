<?= $this->extend($config->dashboard) ?> 
<?= $this->section('scripts') ?>
  <script src="<?=base_url()?>/assets/libs/DataTables/datatables.min.js"></script>
  <script>
    $(function () {
      var table = $('#datatable-user').DataTable({
        lengthChange: false,
        buttons: ['pdf', 'excel']
      })
      
      table.buttons().container()
        .appendTo( '#export-buttons' );
    }) 
  </script>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
  
  
  <div class="row justify-content-between  align-items-bottom py-4">
      <div class="col-auto mb-4 mb-md-0">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
              <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                  <li class="breadcrumb-item">
                      <a href="<?=base_url()?>/dashboard"><span class="fas fa-home"></span></a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">Users List</li>
              </ol>
          </nav>
          <h2 class="h4">Users List</h2>
          <p class="mb-0">All registered potential buyers.</p>
      </div>
      
      <div class="col-auto mb-2 row mb-md-0">
         <div class="col-md-6">
            <a href="<?= base_url() ?>/dashboard/new-user" class="btn btn-primary">
              <span class="fas fa-plus"></span> 
              <span>Add New User</span>
            </a>
         </div>
          <div id="export-buttons" class="col-md-6 pt-3 pt-md-0">
            <strong class="d-block text-primary">Export to</strong>
          </div>
      </div>
      
  </div>
  <div class="table-settings mb-4">
      <div class="row justify-content-between align-items-center">
          
          <div class="col-12 col-md-6 col-lg-3 align-items-center d-flex">
              <div class="form-group mb-0 mr-2">
                  
                  <select  class="custom-select col-4" id="">
                      <option selected="selected">All</option>
                      <option value="1">Active</option>
                      <option value="2">Inactive</option>
                      <option value="3">Pending</option>
                      <option value="3">Canceled</option>
                  </select>
              
                  <select class="custom-select col-7" id="">
                      <option selected="selected" disabled>Bulk Action</option>
                      <option value="1">Send Email</option>
                      <option value="2">Change Group</option>
                      <option value="3">Delete User</option>
                  </select>
              </div>
              <div><a href="#" class="btn btn-md btn-white border-light">Apply</a></div>
          </div>
          
      </div>
  </div>
  <div class="card border-light shadow-soft p-0">
    <div class="card-body px-3 py-4">
      <table id="datatable-user" class="table table-hover table-responsive ">
          <thead>
              <tr>
                  <th class="border-0">
                      <div class="form-check dashboard-check"><input class="form-check-input" type="checkbox" value="" id="userCheck55" /> <label class="form-check-label" for="userCheck55"></label></div>
                  </th>
                  <th class="border-0">Name</th>
                  <th class="border-0">Date Created</th>
                  <th class="border-0">Verified</th>
                  <th class="border-0">Status</th>
                  <th class="border-0">Action</th>
              </tr>
          </thead>
          <tbody>
            
             <?php foreach ($users as $user ): ?>
               <!-- html... -->
               <tr>
                  <td>
                      <div class="form-check dashboard-check"><input class="form-check-input" type="checkbox" value="" id="userCheck2" /> <label class="form-check-label" for="userCheck2"></label></div>
                  </td>
                  <td>
                      <a href="#" class="d-flex align-items-center">
                          <div class="user-avatar bg-secondary p-3 mr-3">
                            <span class="text-uppercase">
                              <?= $user->fullname[1] ?>
                            </span>
                          </div>
                          <div class="d-block">
                              <span class="font-weight-bold"><?= $user->fullname ?></span>
                              <div class="small text-gray">
                                <span class="__cf_email__" data-cfemail="test1@gmail.com">
                                  [email protected]
                                </span>
                              </div>
                          </div>
                      </a>
                  </td>
                  <td>
                    <span class="font-weight-normal">
                      <?= date('d M Y', strtotime($user->created_at) ) ?>
                    </span>
                  </td>
                  
                  <td>
                      <span class="font-weight-normal">
                        <?php if ($user->active): ?>
                          <span class="fas fa-check-circle text-success mr-2"></span>
                        <?php else: ?>
                          <span class="fas fa-info-circle mr-2"></span>
                        <?php endif; ?>
                        Email
                      </span>
                  </td>
                  
                  <td>
                    <?php if (empty($user->status) ): ?>
                      <!-- html... -->
                      <span class="font-weight-normal text-success">Active</span> 
                    <?php else: ?>
                      <!-- html... -->
                      <span class="font-weight-normal text-danger">Suspended</span>
                    <?php endif; ?>
                  </td>
                  <td>
                      <div class="btn-group">
                          <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="icon icon-sm"><span class="fas fa-ellipsis-h icon-dark"></span> </span><span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu">
                              <a class="dropdown-item" href="#">
                                <span class="fas fa-user-shield mr-2"></span> 
                                Reset Pass
                              </a>
                              <a class="dropdown-item" href="#">
                                <span class="fas fa-eye mr-2"></span>View Details
                              </a>
                              <a class="dropdown-item text-danger" href="#">
                                <span class="fas fa-user-times mr-2"></span>Suspend
                              </a>
                              <a class="dropdown-item font-weight-bold text-danger" href="#">
                                <span class="fas fa-trash mr-2"></span>Delete
                              </a>
                          </div>
                      </div>
                  </td>
              </tr>
             
             <?php endforeach; ?>
              
          </tbody>
      </table>
    </div>
  </div>
  
<?= $this->endSection() ?>
       
