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
  <div class="d-lg-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
      
      <div class="col-12 col-lg-6 px-0">
          <div id="export-buttons" class="form-group mb-0">
              
          </div>
      </div>
  </div>
  
  <div class="card border-light shadow-soft">
        <div class="card-body" >
          <table id="datatable-user" class="table table-hover table-responsive">
            <thead>
              <tr>
                <th class="border-0" >Order ID</th>
                <th class="border-0">Plan ID</th>
                <th class="border-0">Date</th>
                <th class="border-0">status</th>
                <th class="border-0">Actions</th> 
              </tr>
            </thead>
            <tbody>
              <?php foreach ($orders as $order): ?>
                <!-- html... -->
              
                <tr>
                  <td><?= $order->id ?></td>
                  <td><?= $order->plan_id ?></td>
                  <td><?= date('d M Y', strtotime($order->created_at)) ?></td>
                  <td>Pending</td>
                  <td>
                    <div class="btn-group">
                        <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="icon icon-sm"><span class="fas fa-ellipsis-h icon-dark"></span> </span><span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">
                              <span class="fas fa-eye mr-2"></span>View Details
                            </a>
                            <a class="dropdown-item " href="#">
                              <span class="fas fa-check mr-2"></span>Set in progress
                            </a>
                            <a class="dropdown-item font-weight-bold text-danger" href="#">
                              <span class="fas fa-times-circle mr-2"></span> Cancel
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