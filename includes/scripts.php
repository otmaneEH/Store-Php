
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- CK Editor -->
<script src="bower_components/ckeditor/ckeditor.js"></script>

<!-- javascript
    ========================sliderrrr========================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="bower_components/home_slide/js/jquery.js"></script>
<script src="bower_components/home_slide/js/jquery.easing.1.3.js"></script>
<script src="bower_components/home_slide/js/bootstrap.min.js"></script>
<script src="bower_components/home_slide/js/jquery.fancybox.pack.js"></script>
<script src="bower_components/home_slide/js/jquery.fancybox-media.js"></script> 
<script src="bower_components/home_slide/js/portfolio/jquery.quicksand.js"></script>
<script src="bower_components/home_slide/js/portfolio/setting.js"></script>
<script src="bower_components/home_slide/js/jquery.flexslider.js"></script>
<script src="bower_components/home_slide/js/animate.js"></script>
<script src="bower_components/home_slide/js/custom.js"></script>
<script src="bower_components/home_slide/js/owl-carousel/owl.carousel.js"></script>




<script>
  $(function () {
    // Datatable
    $('#example1').DataTable()
    //CK Editor
    CKEDITOR.replace('editor1')
  });
</script>
<!--Magnify -->
<script src="magnify/magnify.min.js"></script>
<script>
$(function(){
	$('.zoom').magnify();
});
</script>
<!-- Custom Scripts -->
<script>
$(function(){
  $('#navbar-search-input').focus(function(){
    $('#searchBtn').show();
  });

  $('#navbar-search-input').focusout(function(){
    $('#searchBtn').hide();
  });

  getCart();

  $('#productForm').submit(function(e){
  	e.preventDefault();
  	var product = $(this).serialize();
  	$.ajax({
  		type: 'POST',
  		url: 'cart_add.php',
  		data: product,
  		dataType: 'json',
  		success: function(response){
  			$('#callout').show();
  			$('.message').html(response.message);
  			if(response.error){
  				$('#callout').removeClass('callout-success').addClass('callout-danger');
  			}
  			else{
				$('#callout').removeClass('callout-danger').addClass('callout-success');
				getCart();
  			}
  		}
  	});
  });

  $(document).on('click', '.close', function(){
  	$('#callout').hide();
  });

});

function getCart(){
	$.ajax({
		type: 'POST',
		url: 'cart_fetch.php',
		dataType: 'json',
		success: function(response){
			$('#cart_menu').html(response.list);
			$('.cart_count').html(response.count);
		}
	});
}
</script>