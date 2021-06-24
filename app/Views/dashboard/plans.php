<?= $this->extend($config->dashboard) ?> 

<?= $this->section('styles') ?>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
  <script src="<?=base_url()?>/assets/libs/DataTables/datatables.min.js"></script>
  
  <script>
    $(function () {
      var table = $('#datatable-plan').DataTable({
        lengthChange: false,
        buttons: ['pdf', 'excel']
      })
      
      table.buttons().container()
        .appendTo( '#export-buttons' );
    }) 
  </script>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
  <div class="d-lg-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
      <div class="d-block mb-4 mb-md-0">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
              <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                  <li class="breadcrumb-item">
                      <a href="<?=base_url()?>/dashboard"><span class="fas fa-home"></span></a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">Plans</li>
              </ol>
          </nav>
          <h2 class="h4">Plans</h2>
          <p class="mb-0">Keep track of all plans here.</p>
      </div>
      <div class="col-12 col-lg-6 px-0">
          <div id="export-buttons" class="form-group mb-0">
              
          </div>
      </div>
  </div>
  
  <div class="card border-light shadow-soft">
        <div class="card-body" >
          <table id="datatable-plan" class="table table-hover table-responsive">
            <thead>
              <tr>
                <th class="border-0" >#</th>
                <th class="border-0">Plan ID</th>
                <th class="border-0">Cost</th>
                <th class="border-0">Size</th>
                <th class="border-0">Orders</th>
                <th class="border-0">Actions</th> 
              </tr>
            </thead>
            <tbody>
              <?php foreach ($plans as $plan): ?>
                <!-- html... -->
              
                <tr>
                  <td>
                    <div>
                      <img class="w-100" src="<?= $plan->images[0]['url'] ?>" />
                    </div>
                  </td>
                  <td class="text-left"> <?= $plan->id ?> </td>
                  <td class="text-right"><?= $plan->cost ?></td>
                  <td class="text-right"><?= $plan->dimension ?></td>
                  <td class="text-center"><?= count($plan->orders) ?></td>
                  <td class="text-center">
                    <div class="btn-group">
                        <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="icon icon-sm"><span class="fas fa-ellipsis-h icon-dark"></span> </span><span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?= base_url(). '/dashboard/edit-plan/'. $plan->id ?>">
                              <span class="fas fa-edit mr-2"></span>Edit
                            </a>
                            <a class="dropdown-item" href="<?= base_url(). '/plan/details/'. $plan->id ?>">
                              <span class="fas fa-eye mr-2"></span>View Plan
                            </a>
                            <a class="dropdown-item font-weight-bold text-danger" data-plan="<?= $plan->id ?>" href="#">
                              <span class="fas fa-trash mr-2"></span> Delete
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