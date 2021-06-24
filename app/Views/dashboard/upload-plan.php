<?= $this->extend($config->dashboard) ?> 

<?= $this->section('styles') ?>
  <link type="text/css" href="<?= base_url() ?>/assets/libs/tiny-slider/dist/tiny-slider.css" rel="stylesheet" />
  <link type="text/css" href="<?= base_url() ?>/assets/css/cs-carousel.css" rel="stylesheet" />
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
  <script src="<?=base_url()?>/assets/libs/tiny-slider/dist/tiny-slider.js"></script>
  <script src="<?=base_url()?>/assets/js/cs-carousel.js"></script>
  <script>
    var imgIndex = '';
    var entered = false;
    
    
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
              var str = '#img'+imgIndex+', #thumb'+imgIndex;
              $(str).attr('src', e.target.result)
              $(str).removeClass('d-none')
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $(function (){
      
      $('#form-infos *').prop('disabled', true)
      
      $('.file-select').click(function (){
        imgIndex = $(this).data('input');
        $('#file'+imgIndex).click();
      })
      
      $('#form-infos').submit(function(e){
        e.preventDefault()
        console.log($("#input0").val())
        
        $('#btn-submit').prop('disabled', true)
        $('#spinner').toggleClass('d-none')
        
        var start = setInterval(()=>{
          if(entered === true){
            clearInterval(start)
            $.ajax({
              method: 'POST', 
              url: "<?= base_url() ?>/plan/saveplan", 
              data: $('#form-infos').serializeArray(), 
              success: (res)=>{
                $('#spinner').toggleClass('d-none')
                $('#btn-submit').prop('disabled', false)
                
                if(res.status){
                  console.log(res) 
                  showAlert('success', 'Saved')
                  $('#form-img button').prop('disabled', false)
                }else{
                  showAlert('error', 'Unknown error occurred')
                } 
                
              }, 
              error: (err)=>{
                showAlert('error', 'Error occurred')
                $('#spinner').toggleClass('d-none')
                $('#btn-submit').prop('disabled', false)
                console.log(err)
               
              }
            })
          } 
        }, 1100);
        
        setTimeout(()=>{
          if(!entered){
            $('#spinner').toggleClass('d-none')
            $('#btn-submit').prop('disabled', false)
            showAlert('Error', 'Failed to upload images. Try again.')
            $('#form-img button').prop('disabled', false)
                 
          } 
          clearInterval(start)
        }, 15000);
      })
      
      
      $('#form-img').submit(function (e){
        e.preventDefault()
        if($('#form-img')[0].checkValidity()){
          $('#form-img button').prop('disabled', true)
          $('#form-infos *').prop('disabled', false)
          
          entered = false;
          
          uploadedImg()
        }
      })
      
      
      function uploadedImg(){
        if(entered)
          return;
        var form = new FormData($('#form-img')[0]);
        console.warn('uploading...')
        
        $.ajax({
          processData: false,
          contentType: false,
          method: "POST", 
          url: "<?=base_url()?>/plan/savefiles", 
          data: form, 
          success: (res) => {
            if(res.status){
              console.log(res.data)
              var data = res.data
              for(var i = 0; i < data.length; i++){
                $('#input'+i).val(data[i])
              } 
              entered = true;
            }else{ 
              console.log(res)
              setTimeout(()=>{
                uploadedImg(form)
              }, 5000);
            } 
          }, 
          error: (err) => {
            showAlert('error', 'Check your connection and try again')
            console.log(err)
            setTimeout(()=>{
              //uploadedImg()
            }, 2000);
          }
        })
      } 
      
      var infos = 1;
      $('#btn-add').click(function (){
        $('#other-infos').append(
          `
            <div class="d-flex align-items-center mb-2">
              <input name="attr[${infos}][name]" type="text" class="form-control mr-2">
              <input name="attr[${infos}][value]" type="text" class="form-control">
            </div>
          `
        );
        infos++;
      });
      
    })
  </script>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="#"><span class="fas fa-home"></span></a>
                </li>
                <li class="breadcrumb-item"><a href="<?= base_url() ?>"><?= APP_NAME ?></a></li>
                <li class="breadcrumb-item active" aria-current="page">Transactions</li>
            </ol>
        </nav>
        <h2 class="h4">Upload New Plan</h2>
        <p class="mb-0">Your web analytics dashboard template.</p>
    </div>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div id="export-buttons" class="btn-group"></div>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col">
      
      <div class="card">
        <div class="card-header p-0">
          
          <!--IMAGE FORM  -->
          <form id="form-img" novalidate class="mb-3 needs-validation">
            <?= csrf_field() ?>
            <input name="images[]" required id="file1" class="d-none" onchange="readURL(this);" type="file">
            <input name="images[]"  required id="file2" class="d-none" onchange="readURL(this);" type="file">
            <input name="images[]" required id="file3" class="d-none" onchange="readURL(this);" type="file">
            <div class="invalid-feedback font-weight-bold p-3">
              At least 3 images are required
            </div> 
            <!-- Nav option: Thumbnails -->
            <div class="cs-carousel mb-3 ">
              <div class="cs-carousel-inner" data-carousel-options='{
                "gutter": 15,
                "loop": false,
                "navContainer": "#cs-thumbnails",
                "navAsThumbnails": true
              }'>
            
                <!-- Carousel item -->
                <div class="position-relative rounded">
                  <div  data-input="1" class="file-select position-absolute shadow bg-soft opacity-5 z-index-2 w-100 h-100 row justify-content-center align-items-center">
                    <div class="col text-center">
                      <i class="fas fa-plus fa-2x m-auto"></i>
                    </div>
                  </div>
                  <img  id="img1" class="d-none" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSgpJzUgX8_u1YBxD1dIDPVJHl9Nv1OJj3FAuZ9ZTgueQ9S7IpzMyUlaQL7&s=10">
                </div>
            
                <!-- Carousel item -->
                <div style="min-height : 200px;" class="position-relative">
                  <div data-input="2"  class="file-select position-absolute shadow bg-soft opacity-5 z-index-2 w-100 h-100 row justify-content-center align-items-center">
                    <div class="col text-center">
                      <i class="fas fa-plus fa-2x m-auto"></i>
                    </div>
                  </div>
                  <img id="img2" class="d-none" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSgpJzUgX8_u1YBxD1dIDPVJHl9Nv1OJj3FAuZ9ZTgueQ9S7IpzMyUlaQL7&s=10" alt="Slider image">
                </div>
                
                <!-- Carousel item -->
                <div style="min-height : 200px;" class="position-relative">
                  <div  data-input="3" class="file-select position-absolute shadow bg-soft opacity-5 z-index-2 w-100 h-100 row justify-content-center align-items-center">
                    <div class="col text-center">
                      <i class="fas fa-plus fa-2x m-auto"></i>
                    </div>
                  </div>
                  <img id="img3" class="d-none" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSgpJzUgX8_u1YBxD1dIDPVJHl9Nv1OJj3FAuZ9ZTgueQ9S7IpzMyUlaQL7&s=10" alt="Slider image">
                </div>
              </div>
            
              <!-- Thumbnails -->
              <div class="cs-thumbnails" id="cs-thumbnails">
                <button class="file-select" data-input="1" type="button" data-nav="0">
                  <img id="thumb1" src="<?= base_url () ?>/assets/img/plus.png" alt="Thumbnail">
                </button>
                <button class="file-select" data-input="2" type="button" data-nav="1">
                  <img id="thumb2" src="<?= base_url () ?>/assets/img/plus.png" alt="Thumbnail">
                </button>
                <button class="file-select" data-input="3" type="button" data-nav="2">
                  <img id="thumb3" src="<?= base_url () ?>/assets/img/plus.png" alt="Thumbnail">
                </button>
              </div>
            </div>
            <div class="text-center mb-3">
              <button id="img-btn" type="submit" class="btn btn-outline-primary">
                Confirm
              </button>
            </div>
          </form>
          
        </div>
        <div class="card-body">
          
          <form id="form-infos" class="needs-validation" novalidate>
            <?= csrf_field() ?>
          <input required id="input0" class="d-none" name="images[]" type="text">
          <input required id="input1"  class="d-none" name="images[]" type="text">
          <input required id="input2"  class="d-none" name="images[]" type="text"> 
            
              <div class="form-group">
                  <label for="exampleInputEmail1">Category</label>
                  <input type="text" name="category" class="form-control" id="category" aria-describedby="category" placeholder="e.g Farm House">
              </div>
              <div class="form-group">
                  <label for="dimension">Dimension</label>
                  <input type="text" name="dimension" class="form-control" id="dimension" placeholder="20km sq or 12x12 ft sq">
              </div>
              <div class="form-group">
                  <label for="cost">Cost</label>
                  <input type="text" name="price-basic" class="form-control" id="cost" placeholder="">
                  <small class="text-info">
                    <i class="fas fa-info-circle mr-2"></i> 
                    This should be the basic cost of plans. 
                    Other costs should be added in other informations as: 
                    price-{name}. e.g price-CAD. 
                  </small>
              </div>
              <hr>
              
              <div class="form-group">
                <label><strong>Other information </strong> </label>
                <div class="row justify-content-center align-items-end">
                  <div id="other-infos" class="col-md-10 col-lg-11 h-100 mb-2 mb-md-0">
                    <div class="d-flex align-items-bottom mb-2">
                      <input name="attr[0][name]" type="text" class="form-control mr-2">
                      <input name="attr[0][value]" type="text" class="form-control">
                    </div>
                  </div>
                  <div class="col">
                      <button id="btn-add" type="button" class="btn btn-block btn-warning mb-2 ">
                        <i class="fas fa-plus"></i>
                      </button> 
                  </div> 
                </div>
                <small class="text-info">
                    <i class="fas fa-info-circle mr-2"></i> 
                    Common attributes like beds should be added as:
                   <br> 1. attributes: beds 
                    value: 2 or  <br>
                    2. attributes: beds 
                    value: 1
                </small>
              </div>
              
              <div class="text-center">
                <button id="btn-submit" type="submit" class="btn btn-primary">
                  <span id="spinner" class="d-none">
                    <span  class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                    <span class="sr-only">Loading...</span>
                  </span> 
                  <span >Submit</span>
                </button> 
              </div>
          </form>
          
        </div>
      </div>
      
    </div>
  </div>
                        
<?= $this->endSection() ?>