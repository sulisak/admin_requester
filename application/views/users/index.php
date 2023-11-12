
 <script src="<?php echo URL ;?>public/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function() {   

  getAjaxProject() ;
   function getAjaxProject() {
          $.ajax({    //create an ajax request to display.php
              type: "GET",
              url: <?php echo  "'".  URL  ."Users/ListUsers'";?>,             
              dataType: "html",   //expect html to be returned                
              success: function(response){                    
                $("#response").html(response); 
                //alert(response);
              }

            });
  };
  $("#addmaker").submit(function(){
        
          $("#res").html("");
          $.ajax({
              type: "POST",
                url: <?php echo  "'".  URL  ."Users/AddUser'";?>,         
              data: $(this).serialize()
              })
              .done(function(data){
              $("#res").html(data);
              
            
              alert(data);
              
              
              getAjaxProject() ;
              })
              .fail(function() {
              alert( "Posting failed." );
              });
              return false;
                      
        
        
  }); 
        
  
  
});

</script>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">User Setup</h1>
          </div><!-- /.col -->
          <!--  <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div>/.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
         <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
        <button class="btn btn-xs btn-block bg-gradient-primary btn-flat" data-toggle="modal" data-target="#modal-default">
                <i class="fas fa-plus"></i> Add new/ <span class="laotext">ເພີ່ມໃໝ່</span>
        </button>
        
        </h3>
              </div>
              <!-- /.card-header -->
          <div class="card-body">
          <div id="response"></div>
       

            </div>
           </div>
        </div>
     </div>
     
     
     
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<div class="modal fade" id="modal-default">
<form action="<?php echo URL ;?>Users/AddUser" method="Post" enctype="multipart/form-data" >
        <div class="modal-dialog modal-lg ">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add new user/ <span class="laotext">ເພີ່ມຜູ້ໃຊ້ໃໝ່</span></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
      <div class="row">
        <div class="col-md-4 mt-3 text-center">
        <img src="<?php echo URL ;?>public/img/profile/admin.png" class="img-circle" id="uploadPreview" width="150px" height="150px">
                    <br>
                     <label for="FileInput">
                    
                    <i class="fas fa-edit" style="color:#c7c7c7;font-size:16px">  click edit</i><br>
                    <i style="color:#c7c7c7;font-size:11px">
                    Set image profile</i>
                     </label>

                    <input id="FileInput" type="file" name="logo" required
                    onchange="PreviewImage()" style="cursor: pointer;  display: none"/>
          
                    <script>
                       function PreviewImage() {
                        var oFReader = new FileReader();
                        oFReader.readAsDataURL(document.getElementById("FileInput").files[0]);

                        oFReader.onload = function (oFREvent) {
                          document.getElementById("uploadPreview").src = oFREvent.target.result;
                        };
                      };
                    </script>
          </div>
          <div class="col-md-8">
            <div class="row">
              <div class="col-md-12">
              <b>USERNAME/ <span class="laotext">ຊື່ຜູ້ໃຊ້</span></b>
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="un" required placeholder="Enter Username">
                <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                </div>
              </div>
              <b>FULLNAME/ <span class="laotext">ຊື່ເຕັມຜູ້ໃຊ້</span></b>
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="fn" required placeholder="Enter Fullname">
                <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
              </div>
            </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <b>EMAIL/ <span class="laotext">ອີເມວ</span></b>
                <div class="input-group mb-3">
                  <input type="email" class="form-control" name="email" required placeholder="Enter Email">
                  <div class="input-group-append">
                  <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <b>CONTACT NUMBER/ <span class="laotext">ເບີຕິດຕໍ່</span></b>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="cn" required placeholder="Enter Contact Number">
                  <div class="input-group-append">
                  <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        
        <div class="row">
          <div class="col-md-6">
          <b>BUSINESS UNIT/ <span class="laotext">ຫົວໜ່ວຍທຸລະກິດ</span></b>
            <div class="input-group mb-3">
            
              <select class="form-control" name="bu" required >
              <?php
                foreach ($listcompany as $app) { 
                if (isset($app->cid))  $cid= $app->cid; 
                if (isset($app->cname))  $cname= $app->cname;
                echo '<option value="'.$cid.'">'.$cname.'</option>';
                }
              ?>
              
              </select>
              <div class="input-group-append">
              <span class="input-group-text"><i class="fas fa-filter"></i></span>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <b>DEPARTMENT</b>
              <div class="input-group mb-3">
              
                <select class="form-control" name="dep" required >
                <?php
                  foreach ($listdepartment as $app) { 
                  if (isset($app->did))  $did= $app->did; 
                  if (isset($app->department))  $department= $app->department;
                  echo '<option value="'.$did.'">'.$department.'</option>';
                  }
                ?>
                
                </select>
                <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-filter"></i></span>
                </div>
              </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-6">
            <b>USER TYPE/ <span class="laotext">ປະເພດຜູ້ໃຊ້</span></b>
            <div class="input-group mb-3">
            
              <select class="form-control" name="ut" required >
                    <option value="Requestor">Requestor/ <span class="laotext">ຜູ້ຮ້ອງຂໍ</span></option>
                <option value="DocumentController">DocumentController/ <span class="laotext">ຜູ້ຄຸ້ມຄອງເອກະສານ</span></option>
                            <option value="Finance">Finance</option>
            
              <option value="LineManager">LineManager/ <span class="laotext">ຫົວໜ້າສາຍງານ</span></option>
              <option value="Inspector">Inspector/ <span class="laotext">ຜູ້ກວດກາເຕັກນິກລົດ</span></option>
              <option value="Administration">Administration/<span class="laotext">ຜູ້ບໍລິຫານລະບົບ</span></option>
              
              
             </select>
              <div class="input-group-append">
              <span class="input-group-text"><i class="fas fa-filter"></i></span>
              </div>
            </div>
          </div>
          
          <div class="col-md-6">
            <b>POSITION/<span class="laotext">ຕຳແໜ່ງ</span></b>
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="position" placeholder="Enter Position " required >
                      <div class="input-group-append">
              <span class="input-group-text"><i class="fas fa-vote-yea"></i></span>
              </div>
            </div>
          </div>
          
        </div>
          <div class="row">
                <div class="col-md-6">
                <b>PASSWORD/<span class="laotext">ລະຫັດ</span></b>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="pw" required placeholder="Enter Password">
                  <div class="input-group-append">
                  <span class="input-group-text"><i class="fas fa-key"></i></span>
                  </div>
                </div>
              </div>
                <div class="col-md-6">
                <b>SIGNATORIES FOR PCM<span class="laotext">ເຂົ້າໃຊ້ລະບົບ PCM</span></b>
                <div class="input-group mb-3">
                   <select class="form-control" name="sig" required >
                            <option value="0">NO<span class="laotext">ບໍ່</span></option>
                        <option value="1">YES<span class="laotext"> ໃຊ້ງານ</span></option>
                        </select>
                  <div class="input-group-append">
                  <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                  </div>
                </div>
              </div>
            </div>
        
        
        
        
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close/<span class="laotext">ປິດ</span></button>
              <button type="submit" class="btn btn-primary">Save User/<span class="laotext">ບັນທຶກ</span></button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </form>
</div>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="https://aifgrouplaos.com/" target="_blank"></a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo URL ;?>public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo URL ;?>public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo URL ;?>public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo URL ;?>public/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo URL ;?>public/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo URL ;?>public/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo URL ;?>public/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo URL ;?>public/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo URL ;?>public/plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="<?php echo URL ;?>public/js/pages/dashboard2.js"></script>
</body>
</html>
