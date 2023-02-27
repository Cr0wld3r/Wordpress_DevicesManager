<?php force_login(); ?>
<?php 

 /*
   Template Name: All Device Page     
 */


?>

<?php get_header();
error_reporting(E_ALL & ~E_NOTICE); 
error_reporting(E_ERROR | E_PARSE);
?>

<script type="text/javascript">
    (function($){
    $(document).ready(function(){
        $('.click_edit_detail').click(function(){
        var post_id = $(this).data('postid');
          $.ajax({
            type : "post", 
            dataType : "json", 
            url : '<?php echo admin_url('admin-ajax.php');?>', 
            data : {
            action: "editDetail", 
            post_id : post_id,
            },
          context: this,
          beforeSend: function(){

            },
          success: function(response) {

              if(response.success) {
                  $('.device-edit-detail').html(response.data);
              }
              else {
                  alert('Đã có lỗi xảy ra');
                }
            },
          error: function( jqXHR, textStatus, errorThrown ){

              console.log( 'The following error occured: ' + textStatus, errorThrown );
            }
          })
      return false;
      })
    })
  })(jQuery)
</script>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  if (isset($_POST['submit1'])) {
  
    $receiveSttValue = $_POST['stt'];
    $receiveCodenameValue = $_POST['codename'];
    $receiveDescriptionValue = $_POST['description'];
    $receiveDeviceNameValue = $_POST['device_name'];
    $receiveQuantityValue = $_POST['quantity'];
    $receiveCheckValue = $_POST['check'];
    $receiveSPQValue = $_POST['sub_part_quantity'];
    $receiveLicensseValue = $_POST['licensse'];
    $receiveReceiveDateValue = $_POST['receive_date'];
    $receiveCheckNumberValue = $_POST['check_number'];
    $receiveProjectNameValue = $_POST['project_name'];
    $receiveOldTypeValue = $_POST['old_type'];
    $receiveBrokenValue = $_POST['broken'];
    
    
    $post_data = array(
        'post_title'    => $receiveCodenameValue,
        'post_type'     => 'product',
        'post_status'   => 'publish'
    );
    $post_id = wp_insert_post( $post_data );
    
    $field_key = 'stt';
    $value = $receiveSttValue;
    update_field( $field_key, $value, $post_id );
    
    
    $field_key = 'codename';
    $value = $receiveCodenameValue;
    update_field( $field_key, $value, $post_id );
    
    $field_key = 'description';
    $value = $receiveDescriptionValue;
    update_field( $field_key, $value, $post_id );
    
    $field_key = 'device_name';
    $value = $receiveDeviceNameValue;
    update_field( $field_key, $value, $post_id );
    
    $field_key = 'quantity';
    $value = $receiveQuantityValue;
    update_field( $field_key, $value, $post_id );
    
    $field_key = 'check';
    $value = $receiveCheckValue;
    update_field( $field_key, $value, $post_id );
    
    $field_key = 'sub_part_quantity';
    $value = $receiveSPQValue;
    update_field( $field_key, $value, $post_id );
    
    $field_key = 'licensse';
    $value = $receiveLicensseValue;
    update_field( $field_key, $value, $post_id );
    
    $field_key = 'receive_date';
    $value = $receiveReceiveDateValue;
    update_field( $field_key, $value, $post_id );
    
    $field_key = 'old_type';
    $value = $receiveOldTypeValue;
    update_field( $field_key, $value, $post_id );
    
    $field_key = 'sub_part_quantity';
    $value = $receiveSPQValue;
    update_field( $field_key, $value, $post_id );
    
    $field_key = 'project_name';
    $value = $receiveProjectNameValue;
    update_field( $field_key, $value, $post_id );
    
    $field_key = 'broken';
    $value = $receiveBrokenValue;
    update_field( $field_key, $value, $post_id );
    
  }

  else if(isset($_POST['submit3'])){
    $force_delete = false;
    $receiveDelPostId=$_POST['IDdelete'];
    $post_delId=$receiveDelPostId;
  
    wp_delete_post($post_delId, $force_delete);
    wp_redirect('/index.php/all-devices/');
  }

  else if(isset($_POST['submit4'])){

    $receiveIDEditValue = $_POST['IDEdit'];
    $post_id = $receiveIDEditValue;
  
    $receiveCodenameValue = $_POST['codenameEdit'];
    $receiveDescriptionValue = $_POST['descriptionEdit'];
    $receiveDeviceNameValue = $_POST['device_nameEdit'];
     $receiveQuantityValue = $_POST['quantityEdit'];
     $receiveCheckValue = $_POST['checkEdit'];
     $receiveSPQValue = $_POST['sub_part_quantityEdit'];
     $receiveLicensseValue = $_POST['licensseEdit'];
     $receiveReceiveDateValue = $_POST['receive_dateEdit'];
     $receiveReceiverEditValue = $_POST['note1Edit'];
     $receiveReceiveDateEditValue = $_POST['note2Edit'];
     $receiveBrokenValue = $_POST['brokenEdit'];
     $receiveCheckNumberValue = $_POST['check_numberEdit'];
     $receiveProjectNameValue = $_POST['project_nameEdit'];
  
    $field_key = 'codename';
    $value = $receiveCodenameValue;
    update_field( $field_key, $value, $post_id );
  
    $field_key = 'description';
    $value = $receiveDescriptionValue;
    update_field( $field_key, $value, $post_id );
  
    $field_key = 'device_name';
    $value = $receiveDeviceNameValue;
    update_field( $field_key, $value, $post_id );
  
    $field_key = 'quantity';
    $value = $receiveQuantityValue;
    update_field( $field_key, $value, $post_id );
  
    $field_key = 'check';
    $value = $receiveCheckValue;
    update_field( $field_key, $value, $post_id );
  
    $field_key = 'sub_part_quantity';
    $value = $receiveSPQValue;
    update_field( $field_key, $value, $post_id );
  
    $field_key = 'licensse';
    $value = $receiveLicensseValue;
    update_field( $field_key, $value, $post_id );
  
    $field_key = 'receive_date';
    $value = $receiveReceiveDateValue;
    update_field( $field_key, $value, $post_id );
  
    $field_key = 'broken';
    $value = $receiveBrokenValue;
    update_field( $field_key, $value, $post_id );
    
    $field_key = 'check_number';
    $value = $receiveCheckNumberValue;
    update_field( $field_key, $value, $post_id );
  
    $field_key = 'project_name';
    $value = $receiveProjectNameValue;
    update_field( $field_key, $value, $post_id );
  
  }
}
?>

<?php
 		   $device_posts = new WP_Query(array(
			"post_type" => "product",
      'posts_per_page'=>-1
		));
 
 		query_posts($device_posts); 
?>       

<div class="home" id="blur">
      <div class="home_container">
        <div class="title">
          <h2 style="font-weight:bold"><i class="fa fa-list" style="margin-right:10px"></i>Danh sách thiết bị</h2>
        </div>
        
         	<table id="example" class="table table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>Ký hiệu</th>
                <th>Mô tả</th>
                <th>Tên thiết bị</th>
                <th>Số lượng</th>
                <th>Kiểm kê</th>
                <th>Số linh kiện</th>
                <th>Licensse</th>
                <th>Ngày nhận</th>
                <th>Số biên bản</th>
                <th>Đã sử dụng</th>
                <th>Còn lại</th>
                <th>Bị hư</th>
                <th>Thông số cũ</th>
                <th>Đề tài</th>
                <th>Tùy chọn</th>
        </thead>
        <tbody>
        <?php 
 		while($device_posts -> have_posts()): 
 		$device_posts -> the_post();
 		$url = wp_get_attachment_url(get_post_thumbnail_id($device_posts->ID), 'full');
 		$post_id_field = get_field('post_object_field_name', false, false);
 		$stt = get_field('stt');
 		$codename = get_field('codename');
 		$description = get_field('description');
 		$device_name = get_field('device_name');
    $quantity = get_field('quantity');
 		$check = get_field('check');
 		$sub_part_quantity = get_field('sub_part_quantity');
 		$licensse = get_field('licensse');
 		$receive_date = get_field('receive_date');
 		$check_number = get_field('check_number');
 		$used = get_field('used');
 		$note1 = get_field('note1');
    $remanining = $quantity - $used;
    update_field('remaining', $remanining, $post_id = get_the_ID());
    $remain = get_field('remaining');
 		$note2 = get_field('note2');
 		$broken = get_field('broken');
 		$old_type = get_field('old_type');
 		$project_name = get_field('project_name');
?>
            <tr>
                <td id="STT"><?php  echo $stt ?></td>
    		        <td><?php  echo $codename ?></td>
    		        <td><?php  echo $description ?></td>
    		        <td><?php  echo $device_name ?></td>
                <td><?php  echo $quantity ?></td>
    		        <td><?php  echo $check ?></td>
    		        <td><?php  echo $sub_part_quantity ?></td>
    		        <td><?php  echo $licensse ?></td>
    		        <td><?php  echo $receive_date ?></td>
    		        <td><?php  echo $check_number ?></td>
                <td style="background-color:#f2aac1;"><?php  echo $used?></td>
    		        <td style="background-color:#cffced;"><?php  echo $remain ?></td>
                <td><?php  echo $broken; ?></td>
    		        <td><?php  echo $old_type ?></td>
    		        <td><?php  echo $project_name ?></td>

    	          <td>
                  <button class="click_delete" 
                  id="<?php echo $extraCodename = get_the_ID(); ?>" 
                  onclick="deletePost(this.id)" 
                  style="margin:2px">
                  <i class="fa fa-trash-o" style="font-size:25px;color:white;margin-right:5px"></i>Xóa</button>

                  <button class="click_edit_detail" id="<?php echo $extraCodename = get_the_ID(); ?>" 
                  onclick="editPost(this.id)" 
                  data-postid="<?php echo $extraCodename = get_the_ID(); ?>"><i class="fa fa-pencil-square-o" 
                  style="font-size:17px;color:white;margin-right:5px"></i>Chỉnh sửa</button>

                  
                </td>
        
    		
            </tr>
            
            <?php     
endwhile;
?>
</tbody>
    </table>
    <button id="addProduct" onclick="addProdcut()"><i class="fa fa-plus" style="font-size:25px;color:white;margin-right:5px"></i>Thêm</button>
</div>
</div>


<!-- Pop Up Delete User Form -->
<div id="delPopUp">
      <form form method="POST" action="/index.php/all-devices/">
          <!-- <div class="title-del-popup">
            <h2>Xóa thiết bị</h2>
          </div> -->
          <div class="title-in-form">
        <h4><i class="fa fa-television" 
                  style="font-size:40px;color:#4899dd;margin-right:10px"></i>Xóa thiết bị</h4>
      </div>
            <input id ="IDdelete" type="text" name="IDdelete" value="" style="display: none"><br>
            <h3>Bạn có chắc muốn xóa thiết bị này không?</h3>
          <button id="submit_del_button" type="submit" name="submit3">Xóa</button>
      </form>
      <button class="close_del_button" onclick="closeFormDel()">Đóng</button>
</div>
<!-- End Of Pop Up Delete User Form -->


<!-- Add Product Form -->
<div id="addProductForm">
    <div class="title-in-form">
        <h4><i class="fa fa-television" 
                  style="font-size:40px;color:#4899dd;margin-right:10px"></i>Thêm thiết bị mới</h4>
      </div>
      <form form id="survey-form" method="POST" action="/index.php/all-devices/">
        <div class="labels">
            <label id="name-label" for="name">* STT</label></div>
        <div class="input-tab">
          <input class="input-field" type="text" id="stt" name="stt" placeholder="" required autofocus autocomplete="off"></div>

          <div class="labels">
          <label id="name-label" for="name">* Ký hiệu</label></div>
        <div class="input-tab">
          <input class="input-field" type="text" id="codename" name="codename" placeholder="" required autofocus autocomplete="off"></div>

          <div class="labels">
          <label id="name-label" for="name">* Mô tả</label></div>
        <div class="input-tab">
          <textarea class="input-field" id="description" name="description" rows="5" cols="5" placeholder="" autocomplete="off"></textarea>
          </div>

          <div class="labels">
          <label id="name-label" for="name">* Tên thiết bị</label></div>
        <div class="input-tab">
          <input class="input-field" type="text" id="device_name" name="device_name" placeholder="" required autofocus autocomplete="off"></div>

          <div class="labels">
          <label id="name-label" for="name">* Số lượng</label></div>
        <div class="input-tab">
          <input class="input-field" type="number" id="quantity" name="quantity" placeholder="" min="1" required autofocus autocomplete="off"></div>


         <div class="labels">
          <label id="email-label" for="email">* Kiểm kê</label></div>
        <div class="input-tab">
          <input class="input-field" type="text" id="check" name="check" placeholder="" required autocomplete="off"></div>
        
         <div class="labels">
          <label id="number-label" for="number">* Số linh kiện</label></div>
        <div class="input-tab">
          <input class="input-field" type="number" id="sub_part_quantity" name="sub_part_quantity" min="1" placeholder="" required autocomplete="off"></div>

          <div class="labels">
          <label id="name-label" for="name">* License</label></div>
        <div class="input-tab">
          <input class="input-field" type="text" id="licensse" name="licensse" placeholder="" required autofocus autocomplete="off"></div>

          <div class="labels">
          <label id="name-label" for="name">* Ngày nhận</label></div>
        <div class="input-tab">
          <input class="input-field" type="date" id="receive_date" name="receive_date" placeholder="" required autocomplete="off"></div>

          <div class="labels">
          <label id="name-label" for="name">* Số biên bản</label></div>
        <div class="input-tab">
          <input class="input-field" type="text" id="check_number" name="check_number" placeholder="" required autofocus autocomplete="off"></div>

          <div class="labels">
          <label id="name-label" for="name">* Bị hư</label></div>
        <div class="input-tab">
          <input class="input-field" type="number" id="broken" name="broken" placeholder="" min="0" required autofocus autocomplete="off"></div>

          <div class="labels">
          <label id="name-label" for="name">* Thông số cũ</label></div>
        <div class="input-tab">
          <input class="input-field" type="text" id="old_type" name="old_type" placeholder="" required autofocus autocomplete="off"></div>

          <div class="labels">
          <label id="name-label" for="name">* Đề tài</label></div>
        <div class="input-tab">
          <input class="input-field" type="text" id="project_name" name="project_name" placeholder="" required autofocus autocomplete="off"></div>


          <div class="submit-button-wrapper">
          <button id="submit_adddevice_button" type="submit" name="submit1">Thêm thiết bị</button>
          </div>

        </form>
        <button class="close_adddevice_button" onclick="closeAppProduct()">Đóng</button>
</div>
<!-- End of Add Product Form -->

<!-- Edit Product Form -->
<div id="editPopUp">
<form form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <div class="title-in-form">
            <h4><i class="fa fa-television" 
                  style="font-size:40px;color:#4899dd;margin-right:10px"></i>Chỉnh sửa</h4>
          </div>
                  
            <input id ="IDEdit" type="text" name="IDEdit" value="" style="display: none"><br>
            
                <div class="device-edit-detail"></div>

          <button id="submit_edit_button" type="submit" name="submit4">Cập nhật</button>
      </form>
      <button class="close_edit_button" onclick="closeFormEdit()">Đóng</button>
</div>
<!-- End of Edit Product Form -->


<?php
 get_footer(); ?>

