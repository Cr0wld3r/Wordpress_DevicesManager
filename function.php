<?php 

function loadFiles(){
wp_enqueue_style('css_header_style', get_theme_file_uri('/webCss/header.css'));
wp_enqueue_style('css_style', get_theme_file_uri('/webCss/index.css'));
wp_enqueue_style('css_home_style', get_theme_file_uri('/webCss/home.css'));
wp_enqueue_style('css_footer_style', get_theme_file_uri('/webCss/footer.css'));
}

function loadJStoSite()
{
	?>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	<!-- <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script> -->
	<script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>
	<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
	<script>
    	$(document).ready(function () {
    	 $('#example').DataTable(
		 );
		
	});
	</script>

	<script>
			
	</script>

	<!-- Avoid submitting form after refresh -->
	<script>
    	if ( window.history.replaceState ) {
        	window.history.replaceState( null, null, window.location.href );
    	}
	</script>


	<!-- Del Post Function -->
	<script>
		function deletePost(clicked){
			toggleDel();
			document.getElementById('IDdelete').value = clicked;
		}
	</script>

	<!-- Pop Up Handler -->
	<script>
	
		function toggle(){
			var blur = document.getElementById('blur');
			blur.classList.toggle('active');
			var popup = document.getElementById('addPopUp');
			popup.classList.toggle('active');
		}

		function toggleDel(){
			var blur = document.getElementById('blur');
			blur.classList.toggle('active');
			var delPopup = document.getElementById('delPopUp');
			delPopup.classList.toggle('active');
		}


		function addBorrwer(clicked) {
			toggle();
			document.getElementById('borrowerID').value = clicked;
		}

		function closeFormAdd(){
			toggle();
		}

		function closeFormDel(){
			toggleDel();
		}
	</script>

	<!-- Render Borrower For Add Pop Up Form -->
	<script>
		function renderBorrower() {
			value = document.getElementById('q2').value;
			document.getElementById('borrower2').innerHTML = "";
			document.getElementById('borrowDate2').innerHTML = "";
				for(let i = 1; i <= Number(value); i++){
					document.getElementById('borrower2').innerHTML += "<input class='input-field' type='text' name='bname[]' value=''><br>" ;
					document.getElementById('borrowDate2').innerHTML += "<input class='input-field' type='date' name='bdate[]' value=''><br>";
			}
		}
	</script> 

	<script>
		function toggleEdit(){
			var blur = document.getElementById('blur');
			blur.classList.toggle('active');
			var editPopUp = document.getElementById('editPopUp');
			editPopUp.classList.toggle('active');
		}

		function editPost(clicked) {	
			document.getElementById('IDEdit').value = clicked;
			toggleEdit();	
		}

		function closeFormEdit(){
			toggleEdit();
		}

	</script>


	<script>
			function toggleAddProduct(){
			var blur = document.getElementById('blur');
			blur.classList.toggle('active');
			var editPopUp = document.getElementById('addProductForm');
			editPopUp.classList.toggle('active');
		}

			function addProdcut(){
				toggleAddProduct();
			}

			function closeAppProduct(){
				toggleAddProduct();
		}
	</script>

	<script>
		function toggleViewDetail(){
			var blur = document.getElementById('blur');
			blur.classList.toggle('active');
			var editPopUp = document.getElementById('viewDevicesDetailPopUp');
			editPopUp.classList.toggle('active');
		}

		function viewDetail(clicked) {	
			toggleViewDetail();
			//document.getElementById('IDEdit').value = clicked;	
		}

		function closeViewDetail(){
			toggleViewDetail();
		}

	</script>

	<!-- Functions For front-page.php -->
	<script>
		function toggleAddNewBorrowerForm(){
			var blur = document.getElementById('blur');
			blur.classList.toggle('active');
			var popup = document.getElementById('addNewBorrowerForm');
			popup.classList.toggle('active');
		}

		function closeAddNewBorrowerForm(){
			toggleAddNewBorrowerForm();
		}

		function toggleReturnDeviceForm(clicked){
			document.getElementById('IdRet').value = clicked;
			var blur = document.getElementById('blur');
			blur.classList.toggle('active');
			var popup = document.getElementById('returnDeviceForm');
			popup.classList.toggle('active');
		}

		function closeReturnDeviceForm(){
			toggleReturnDeviceForm();
		}

	</script>

	<script>
		function toggleViewDetail(){
			var blur = document.getElementById('blur');
			blur.classList.toggle('active');
			var editPopUp = document.getElementById('viewDevicesDetailPopUp');
			editPopUp.classList.toggle('active');
		}

		function viewDetail(clicked) {	
			toggleViewDetail();
			//document.getElementById('IDEdit').value = clicked;	
		}

		function closeViewDetail(){
			toggleViewDetail();
		}

		function toggleViewDeviceForm(){
			var blur = document.getElementById('blur');
			blur.classList.toggle('active');
			var editPopUp = document.getElementById('viewDeviceForm');
			editPopUp.classList.toggle('active');
		}

		function viewDetail(clicked) {	
			toggleViewDeviceForm();
			//document.getElementById('IDEdit').value = clicked;	
		}

		function closeViewDetail(){
			toggleViewDeviceForm();
		}



	</script>
	<!-- Functions For front-page.php -->


	<?php
}


function edit_init() {
	//do b??n js ????? d???ng json n??n gi?? tr??? tr??? v??? d??ng ph???i encode
	$website = (isset($_POST['website']))?esc_attr($_POST['website']) : '';
	ob_start(); //b???t ?????u b??? nh??? ?????m
	$post_new = new WP_Query(array(
		'post_type' =>  'product',
		'posts_per_page'    =>  '1',
		'p' => $website
		));
	if($post_new->have_posts()):
		while($post_new->have_posts()):$post_new->the_post();
			
			echo'<div class="labels">';
			echo '<label id="name-label" for="name">* K?? hi???u</label></div>';
			echo '<div class="input-tab"><input class="input-field" type="text" id="codenameEdit" name="codenameEdit" value="'.get_field('codename').'" autofocus></div>';
			echo '</br>';
			
			echo'<div class="labels">';
			 echo '<label id="name-label" for="name">* M?? t???</label></div>';
			 echo '<div class="input-tab"><textarea class="input-field" id="descriptionEdit" name="descriptionEdit" rows="5" cols="5" placeholder="">'.get_field('description').'</textarea></div>';
			 echo '</br>';

			 echo'<div class="labels">';
			echo '<label id="name-label" for="name">* T??n thi???t b???</label></div>';
			echo '<div class="input-tab"><input class="input-field" type="text" id="device_nameEdit" name="device_nameEdit" value="'.get_field('device_name').'" autofocus></div>';
			echo '</br>';

			echo'<div class="labels">';
			echo '<label id="name-label" for="name">* S??? l?????ng</label></div>';
			echo '<div class="input-tab"><input class="input-field" type="number" id="quantityEdit" name="quantityEdit" value="'.get_field('quantity').'" autofocus></div>';
			echo '</br>';

			echo'<div class="labels">';
			echo '<label id="name-label" for="name">* Ki???m k??</label></div>';
			echo '<div class="input-tab"><input class="input-field" type="text" id="checkEdit" name="checkEdit" value="'.get_field('check').'" autofocus></div>';
			echo '</br>';

			echo'<div class="labels">';
			echo '<label id="name-label" for="name">* S??? linh ki???n</label></div>';
			echo '<div class="input-tab"><input class="input-field" type="number" id="sub_part_quantityEdit" name="sub_part_quantityEdit" value="'.get_field('sub_part_quantity').'" autofocus></div>';
			echo '</br>';

			echo'<div class="labels">';
			echo '<label id="name-label" for="name">* License</label></div>';
			echo '<div class="input-tab"><input class="input-field" type="text" id="licensseEdit" name="licensseEdit" value="'.get_field('licensse').'" autofocus></div>';
			echo '</br>';

			echo'<div class="labels">';
			echo '<label id="name-label" for="name">* Ng??y nh???n</label></div>';
			echo '<div class="input-tab"><input class="input-field" type="date" id="receive_dateEdit" name="receive_dateEdit" value="'.get_field('receive_date').'" autofocus></div>';
			echo '</br>';

			echo'<div class="labels">';
			echo '<label id="name-label" for="name">* S??? bi??n b???n</label></div>';
			echo '<div class="input-tab"><input class="input-field" type="text" id="check_numberEdit" name="check_numberEdit" value="'.get_field('check_number').'" autofocus></div>';
			echo '</br>';

			echo'<div class="labels">';
			echo '<label id="name-label" for="name">* K?? hi???u</label></div>';
			echo '<div class="input-tab"><input class="input-field" type="text" id="codenameEdit" name="codenameEdit" value="'.get_field('codename').'" autofocus></div>';
			echo '</br>';

			echo'<div class="labels">';			  
			echo '<label id="name-label" for="name">* B??? h??</label></div>';
			echo '<div class="input-tab"><input class="input-field" type="number" id="brokenEdit" name="brokenEdit" value="'.get_field('broken').'" autofocus></div>';
			echo '</br>';

			echo'<div class="labels">';
			echo '<label id="name-label" for="name">* Th??ng s??? c??</label></div>';
			echo '<div class="input-tab"><input class="input-field" type="text" id="old_typeEdit" name="old_typeEdit" value="'.get_field('old_type').'" autofocus></div>';
			echo '</br>';

			echo'<div class="labels">';
			echo '<label id="name-label" for="name">* ????? t??i</label></div>';
			echo '<div class="input-tab"><input class="input-field" type="text" id="project_nameEdit" name="project_nameEdit" value="'.get_field('project_name').'" autofocus></div>';
			echo '</br>';
			

		endwhile;
		//echo '</ul>';
	endif; wp_reset_query();
	$result = ob_get_clean(); //cho h???t b??? nh??? ?????m v??o bi???n $result
	wp_send_json_success($result); // tr??? v??? gi?? tr??? d???ng json
	die();//b???t bu???c ph???i c?? khi k???t th??c

}

function editDetail_init() {
	//do b??n js ????? d???ng json n??n gi?? tr??? tr??? v??? d??ng ph???i encode
	$post_id = (isset($_POST['post_id']))?esc_attr($_POST['post_id']) : '';
	ob_start(); //b???t ?????u b??? nh??? ?????m
	$post_new = new WP_Query(array(
		'post_type' =>  'product',
		'posts_per_page'    =>  '1',
		'p' => $post_id
		));
	if($post_new->have_posts()):
		while($post_new->have_posts()):$post_new->the_post();
			
			echo'<div class="labels">';
			echo '<label id="name-label" for="name">* K?? hi???u</label></div>';
			echo '<div class="input-tab"><input class="input-field" type="text" id="codenameEdit" name="codenameEdit" value="'.get_field('codename').'" autofocus></div>';
			echo '</br>';
			
			echo'<div class="labels">';
			echo '<label id="name-label" for="name">* M?? t???</label></div>';
			echo '<div class="input-tab"><textarea class="input-field" id="descriptionEdit" name="descriptionEdit" rows="5" cols="5" placeholder="">'.get_field('description').'</textarea></div>';
			echo '</br>';

			echo'<div class="labels">';
			echo '<label id="name-label" for="name">* T??n thi???t b???</label></div>';
			echo '<div class="input-tab"><input class="input-field" type="text" id="device_nameEdit" name="device_nameEdit" value="'.get_field('device_name').'" autofocus></div>';
			echo '</br>';
			
			echo'<div class="labels">';
			echo '<label id="name-label" for="name">* S??? l?????ng</label></div>';
			echo '<div class="input-tab"><input class="input-field" type="number" id="quantityEdit" name="quantityEdit" value="'.get_field('quantity').'" autofocus></div>';
			echo '</br>';

			echo'<div class="labels">';
			echo '<label id="name-label" for="name">* Ki???m k??</label></div>';
			echo '<div class="input-tab"><input class="input-field" type="text" id="checkEdit" name="checkEdit" value="'.get_field('check').'" autofocus></div>';
			echo '</br>';

			echo'<div class="labels">';
			echo '<label id="name-label" for="name">* S??? linh ki???n</label></div>';
			echo '<div class="input-tab"><input class="input-field" type="number" id="sub_part_quantityEdit" name="sub_part_quantityEdit" value="'.get_field('sub_part_quantity').'" autofocus></div>';
			echo '</br>';

			echo'<div class="labels">';
			echo '<label id="name-label" for="name">* License</label></div>';
			echo '<div class="input-tab"><input class="input-field" type="text" id="licensseEdit" name="licensseEdit" value="'.get_field('licensse').'" autofocus></div>';
			echo '</br>';

			echo'<div class="labels">';
			echo '<label id="name-label" for="name">* Ng??y nh???n</label></div>';
			echo '<div class="input-tab"><input class="input-field" type="date" id="receive_dateEdit" name="receive_dateEdit" value="'.get_field('receive_date').'" autofocus></div>';
			echo '</br>';

			echo'<div class="labels">';
			echo '<label id="name-label" for="name">* S??? bi??n b???n</label></div>';
			echo '<div class="input-tab"><input class="input-field" type="text" id="check_numberEdit" name="check_numberEdit" value="'.get_field('check_number').'" autofocus></div>';
			echo '</br>';

			echo'<div class="labels">';
			echo '<label id="name-label" for="name">* K?? hi???u</label></div>';
			echo '<div class="input-tab"><input class="input-field" type="text" id="codenameEdit" name="codenameEdit" value="'.get_field('codename').'" autofocus></div>';
			echo '</br>';

			echo'<div class="labels">';			  
			echo '<label id="name-label" for="name">* B??? h??</label></div>';
			echo '<div class="input-tab"><input class="input-field" type="number" id="brokenEdit" name="brokenEdit" value="'.get_field('broken').'" autofocus></div>';
			echo '</br>';

			echo'<div class="labels">';
			echo '<label id="name-label" for="name">* Th??ng s??? c??</label></div>';
			echo '<div class="input-tab"><input class="input-field" type="text" id="old_typeEdit" name="old_typeEdit" value="'.get_field('old_type').'" autofocus></div>';
			echo '</br>';

			echo'<div class="labels">';
			echo '<label id="name-label" for="name">* ????? t??i</label></div>';
			echo '<div class="input-tab"><input class="input-field" type="text" id="project_nameEdit" name="project_nameEdit" value="'.get_field('project_name').'" autofocus></div>';
			echo '</br>';
			

		endwhile;
		//echo '</ul>';
	endif; wp_reset_query();
	$result = ob_get_clean(); //cho h???t b??? nh??? ?????m v??o bi???n $result
	wp_send_json_success($result); // tr??? v??? gi?? tr??? d???ng json
	die();//b???t bu???c ph???i c?? khi k???t th??c

}

function return_init(){
	//do b??n js ????? d???ng json n??n gi?? tr??? tr??? v??? d??ng ph???i encode
	$post_id = (isset($_POST['post_id']))?esc_attr($_POST['post_id']) : '';
	ob_start(); //b???t ?????u b??? nh??? ?????m
	$post_new = new WP_Query(array(
		'post_type' =>  'product',
		'posts_per_page'    =>  '1',
		'p' => $post_id
		));
	if($post_new->have_posts()):
		while($post_new->have_posts()):$post_new->the_post();
			
			echo'<div class="labels">';
			echo '<label id="name-label" for="name">* T??n thi???t b???</label></div>';
			echo '<div class="input-tab"><input class="input-field" type="text" id="codenameEdit" name="codenameEdit" value="'.get_field('codename').'" autofocus></div>';
			echo '</br>';
			
			echo'<div class="labels">';
			echo '<label id="name-label" for="name">* T??n thi???t b???</label></div>';
			echo '<div class="input-tab"><input class="input-field" type="text" id="device_nameEdit" name="device_nameEdit" value="'.get_field('device_name').'" autofocus></div>';
			echo '</br>';

			echo'<div class="labels">';
			echo '<label id="name-label" for="name">* S??? l?????ng</label></div>';
			echo '<div class="input-tab"><input class="input-field" type="number" id="quantityEdit" name="quantityReturn" value="1" min="1" required autofocus></div>';
			echo '</br>';

			$note1 = get_field('note1');
			$note2 = get_field('note2');

			echo'<div class="labels">';
			echo '<label id="name-label" for="name">* T??n ng?????i m?????n:</label></div>';
			echo '<div class="input-tab"><select class="input-field" name="borrowerName">';
			foreach($note1 as $note)
				          {
							echo '<option value="'.$note.'">'.$note.'</option>';
							echo '</br>';
			              
				          }
			echo '</select></div>';
			echo '</br>';

			echo'<div class="labels">';
			echo '<label id="name-label" for="name">* Ng??y m?????n:</label></div>';
			echo '<div class="input-tab"><select class="input-field" name="borrowerDate">';
			foreach($note2 as $note)
				          {
							echo '<option value="'.$note.'">'.$note.'</option>';
							echo '</br>';			              
				          }
			echo '</select></div>';
			echo '</br>';

		endwhile;
		//echo '</ul>';
	endif; wp_reset_query();
	$result = ob_get_clean(); //cho h???t b??? nh??? ?????m v??o bi???n $result
	wp_send_json_success($result); // tr??? v??? gi?? tr??? d???ng json
	die();//b???t bu???c ph???i c?? khi k???t th??c
}

 function view_init(){
	//do b??n js ????? d???ng json n??n gi?? tr??? tr??? v??? d??ng ph???i encode
	$post_id = (isset($_POST['post_id']))?esc_attr($_POST['post_id']) : '';
	ob_start(); //b???t ?????u b??? nh??? ?????m
	$post_new = new WP_Query(array(
		'post_type' =>  'product',
		'posts_per_page'    =>  '1',
		'p' => $post_id
		));
	if($post_new->have_posts()):
		while($post_new->have_posts()):$post_new->the_post();
			
			echo'<div class="labels">';
			echo '<label id="name-label" for="name">* M?? thi???t b???</label></div>';
			echo '<div class="input-tab"><input class="input-field" type="text" id="codenameEdit" name="codenameEdit" value="'.get_field('codename').'" autofocus readonly></div>';
			echo '</br>';
			
			echo'<div class="labels">';
			echo '<label id="name-label" for="name">* T??n thi???t b???</label></div>';
			echo '<div class="input-tab"><input class="input-field" type="text" id="device_nameEdit" name="device_nameEdit" value="'.get_field('device_name').'" autofocus readonly></div>';
			echo '</br>';
	
	
			$note1 = get_field('note1');
			$note2 = get_field('note2');
	
			echo'<div class="labels">';
				echo '<label id="name-label" for="name">* Th??nh vi??n:</label></div>';
				echo '<div class="input-tab">';
				foreach($note1 as $note)
							  {
								echo '<input class="input-field" type="text" value="'.$note.'" readonly>';
								echo '</br>';
							  
							  }
				echo '</div>';
				echo '</br>';
	
				echo'<div class="labels">';
				echo '<label id="name-label" for="name">* Ng??y m?????n:</label></div>';
				echo '<div class="input-tab">';
				foreach($note2 as $note)
							  {
								echo '<input class="input-field" type="text" value="'.$note.'" readonly>';
								echo '</br>';			              
							  }
				echo '</div>';
				echo '</br>';
	
			endwhile;
			//echo '</ul>';
		endif; wp_reset_query();
		$result = ob_get_clean(); //cho h???t b??? nh??? ?????m v??o bi???n $result
		wp_send_json_success($result); // tr??? v??? gi?? tr??? d???ng json
		die();//b???t bu???c ph???i c?? khi k???t th??c
 }

function force_login(){
	global $post;
	if(!is_user_logged_in()){
		auth_redirect();
	}
}

add_action( 'wp_ajax_view', 'view_init' );
add_action( 'wp_ajax_nopriv_view', 'view_init' );

add_filter( 'x_redirect_by', '__return_false' );

add_action( 'wp_ajax_edit', 'edit_init' );
add_action( 'wp_ajax_nopriv_edit', 'edit_init' );

add_action( 'wp_ajax_editDetail', 'editDetail_init' );
add_action( 'wp_ajax_nopriv_editDetail', 'editDetail_init' );

add_action( 'wp_ajax_return', 'return_init' );
add_action( 'wp_ajax_nopriv_return', 'return_init' );


add_action('wp_head','loadJStoSite');
add_action('wp_enqueue_scripts','loadFiles');
?>

