<?= $this->extend($config->dashboard) ?> 
<?= $this->section('scripts') ?>
  <script src="<?=base_url()?>/assets/libs/DataTables/datatables.min.js"></script>
  <script>
    $(function () {
      var table = $('#table-transactions').DataTable({
        lengthChange: false,
        buttons: ['pdf', 'excel']
      })
      
      table.buttons().container()
        .appendTo( '#export-buttons' );
    }) 
  </script>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item">
                        <a href="<?=base_url()?>/dashboard"><span class="fas fa-home"></span></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Transactions</li>
                </ol>
            </nav>
            <h2 class="h4">All Transactions</h2>
            <p class="mb-0">Keep track of all transactions here.</p>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div id="export-buttons" class="btn-group"></div>
        </div>
    </div>
    <div class="table-settings mb-4">
        <div class="row align-items-center justify-content-between">
            <div class="col col-md-6 col-lg-3 col-xl-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><span class="fas fa-search"></span></span>
                    </div>
                    <input class="form-control" id="searchInputdashboard1" placeholder="Search" type="text" aria-label="Dashboard user search" />
                </div>
            </div>
            <div class="col-4 col-md-2 col-xl-1 pl-md-0 text-right">
                <div class="btn-group">
                    <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="icon icon-sm icon-gray"><span class="fas fa-cog"></span> </span><span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-xs dropdown-menu-right">
                        <span class="dropdown-item font-weight-bold text-dark">Show</span>
                        <a class="dropdown-item d-flex font-weight-bold" href="#">
                            10 <span class="icon icon-small ml-auto"><span class="fas fa-check"></span></span>
                        </a>
                        <a class="dropdown-item font-weight-bold" href="#">20</a> <a class="dropdown-item font-weight-bold" href="#">30</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card ">
      <div class="card-body border-light shadow-sm table-wrapper py-4 px-3">
          <table id="table-transactions" class="table table-hover table-responsive">
              <thead>
                  <tr>
                      <th class="border-0">ID</th>
                      <th class="border-0">reference</th>
                      <th class="border-0">user id</th>
                      <th class="border-0">Date</th>
                      <th class="border-0">Amount</th>
                      <th class="border-0">Status</th>
                      <th class="border-0">Action</th>
                  </tr>
              </thead>
              <tbody>
                <?php foreach ($transactions as $transaction): ?>
                  <!-- html... -->
                  <tr>
                      <td><a  class="font-weight-bold"><?= $transaction->id ?></a></td>
                      <td><span class="font-weight-normal"><?= $transaction->transaction_ref ?></span></td>
                      <td><a href="<?= base_url ().'/dashboard/user/'.$transaction->user_id ?>" class="font-weight-normal"><?= $transaction->user_id ?></a></td>
                      <td><span class="font-weight-normal"><?= date('d M Y', strtotime($transaction->created_at)) ?></span></td>
                      <td><span class="font-weight-bold"><?= $transaction->amount ?></span></td>
                      <td><span class="font-weight-bold text-warning"><?= $transaction->status ?></span></td>
                      <td>
                          <div class="btn-group">
                              <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span class="icon icon-sm"><span class="fas fa-ellipsis-h icon-dark"></span> </span><span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <div class="dropdown-menu">
                                  <a class="dropdown-item" href="<?= base_url ().'/dashboard/plan/'.$transaction->user_id ?>">
                                    <span class="fas fa-eye mr-2"></span>
                                    View Details
                                  </a> 
                                  <a class="dropdown-item" href="#">
                                    <span class="fas fa-edit mr-2"></span>
                                    Refund
                                  </a>
                                  <a class="dropdown-item text-danger" href="#">
                                    <span class="fas fa-trash-alt mr-2"></span>Remove
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