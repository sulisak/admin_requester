
 <script src="<?php echo URL ;?>public/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function() {	 
	
	

	 getAjaxProject() ;
	 function getAjaxProject() {

					$.ajax({    //create an ajax request to display.php
							type: "GET",
							url: <?php echo  "'".  URL  ."Stationary/LoadData'";?>,             
							dataType: "html",   //expect html to be returned                
							success: function(response){                    
								$("#response").html(response); 
								//alert(response);
							}

						});
	};
	var generateRandomNDigits = (n) => {
	return Math.floor(Math.random() * (9 * (Math.pow(10, n)))) + (Math.pow(10, n));
	}
	var vrr = generateRandomNDigits(7);
	$('#vr').val(vrr);
	$('#vr1').val(vrr);
	$(".addnew").click(function(){  
	var generateRandomNDigits = (n) => {
	return Math.floor(Math.random() * (9 * (Math.pow(10, n)))) + (Math.pow(10, n));
	}
	var vrr = generateRandomNDigits(7);
	$('#vr').val(vrr);
	$('#vr1').val(vrr);
	
	});


	$("#cid").change(function(){  
		//alert($("#cid").val());
		var cid=$("#cid").val();
		$("#productselect").show();
		$.ajax({    //create an ajax request to display.php
							type: "GET",
							url: <?php echo  "'".  URL  ."'";?> + "Stationary/LoadStock?cid=" + cid,             
							dataType: "html",   //expect html to be returned                
							success: function(response){                    
								$("#user").html(response); 
								//alert(response);
							}

						});
		return false;
			
		
	});
	$("#catid").change(function(){  
		//alert($("#cid").val());
		var catid=$("#catid").val();
		$.ajax({    //create an ajax request to display.php
							type: "GET",
							url: <?php echo  "'".  URL  ."'";?> + "Stationary/LoadProduct?catid=" + catid,             
							dataType: "html",   //expect html to be returned                
							success: function(response){                    
								$("#product").html(response); 
								//alert(response);
							}

						});
		return false;
			
		
	});

// ================= add new 01/06/2021 =============================



// ================= add new 01/06/2021 =============================





		
	$("#addData").submit(function(){  
	//============================
				
	//=======================
           
			
			var user=$("#userid").val();
		var catid=$("#catid").val();
		var barcode=$("#barcode").val();
		
		if(user=="" || user ==0){
			alert("Select User!");
			$("#user").focus();
		}else if(catid=="" || catid ==0){
				alert("Select Category!");
			$("#catid").focus();
		}else if(barcode=="" || barcode ==0){
			alert("Select barcode!");
			$("#barcode").focus();
		}else{
				$.ajax({
							type: "POST",
								url:  <?php echo '"'. URL .'"';?> + "Stationary/AddData", 
							data: $(this).serialize()
							})
							.done(function(data){
							$('#addres').fadeOut(500).html(data).fadeIn(300);
							
							if(data=="Create Successfully!"){
							getAjaxProject() ;
							$('#addData').trigger("reset");							
							location.reload();
							}
							})
							.fail(function() {
							alert( "Posting failed." );
							});
	}
	return false;
		
	}
	
	
	
	
	);
	

	
});

</script>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Approve Stationary /
			<span class="laotext">ລາຍການເບີກເຄື່ອງ</span></h1>
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
				<div id="response"></div>
				</div>
		 </div>
		 
		 
		 
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<style>
.container input[type="radio"]
{
    display:block;
    width:200px;
    float:left;
    clear:both;
	
}

.container label 
{
    display:block;
    width:calc(100% - 30px);
    float:left;
	margin-right:200px;
}

.container label>span
{
    display:block;
    margin:5px 0;
    font-style:italic;
}
</style>







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
