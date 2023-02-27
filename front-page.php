<?php force_login(); ?>
<?php get_header(); 
error_reporting(E_ALL & ~E_NOTICE); 
error_reporting(E_ERROR | E_PARSE);
?>

<?php
session_start();
$_SESSION['bQuantity'] = $_POST['bQuantity'];
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 if(isset($_POST['submit5']))
 {
  $nameQua = "";
	$receiverBorrowerCode = $_POST['borrowerCode'];
	$receiveBorrowerName = $_POST['borrowerName'];
	$receiveBorrowerDate = $_POST['borrowerDate'];
	$receiveDeviceOption = $_POST['deviceOp'];
	$receiveQuantity = $_POST['bQuantity'];

	$post_id = $receiveDeviceOption;
	$field_key1 = 'note1';
	$field_key2 = 'note2';
  $field_key3 = 'used';
	$value =  $receiveBorrowerName;
	$value2 = $receiveBorrowerDate;
	$previousNote1 = get_field('note1',$post_id);
	$previousNote2 = get_field('note2',$post_id);
  $previousQuantity = get_field('quantity',$post_id);
  $previousUsed = get_field('used',$post_id);
  $previousRemaining = get_field('remaining',$post_id);

  $result3 = $previousUsed + $receiveQuantity;

  if($receiveQuantity > $previousRemaining){
    $nameQua = "Số lượng không hợp lệ";
    echo '<script>alert("Số lượng không hợp lệ")</script>';
  } else {

	if(!empty($previousNote1)){
	$result = array_merge($previousNote1, $value);
	update_field( $field_key1, $result, $post_id );
	}

	else if(empty($previousNote1))
	{
	update_field( $field_key1, $value, $post_id );
	}

	if(!empty($previousNote2)){
	$result = array_merge($previousNote2, $value2);
	update_field( $field_key2, $result, $post_id );
	}

	else if(empty($previousNote2))
	{
	update_field( $field_key2, $value2, $post_id );
	}

  update_field( $field_key3, $result3, $post_id );

  }
}

 if(isset($_POST['submit6'])){
  $deviceID = $_POST['IdRet'];
  $bName = $_POST['borrowerName'];
  $bDate = $_POST['borrowerDate'];
  $bQuantity = $_POST['quantityReturn'];

  $post_id = $deviceID;
  $field_key1 = 'note1';
	$field_key2 = 'note2';
  $field_key3 = 'quantity';
  $field_key4 = 'used';

	$value = $bName;
	$value2 = $bDate;
  $previousNote1 = get_field('note1',$post_id);
	$previousNote2 = get_field('note2',$post_id);
  $previousQuantity = get_field('quantity',$post_id);
  $previousUsed = get_field('used',$post_id);

  $result1 = array_diff($previousNote1, ["$value"]);
  $result2 = array_diff($previousNote2, ["$value2"]);
  // $result3 = $previousQuantity + $bQuantity;
  $result4 = $previousUsed - $bQuantity;

  

  update_field( $field_key1, $result1, $post_id );
  update_field( $field_key2, $result2, $post_id );
  // update_field( $field_key3, $result3, $post_id );
  update_field( $field_key4, $result4, $post_id );
	
 }

}
?>

<script type="text/javascript">
    (function($){
    $(document).ready(function(){
        $('.click_return_device').click(function(){
        var post_id = $(this).data('postid');
          $.ajax({
            type : "post", 
            dataType : "json", 
            url : '<?php echo admin_url('admin-ajax.php');?>', 
            data : {
            action: "return", 
            post_id : post_id,
            },
          context: this,
          beforeSend: function(){

            },
          success: function(response) {

              if(response.success) {
                  $('.return-device-form-display').html(response.data);
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

<!-- Ajax for View Divice -->
<script type="text/javascript">
    (function($){
    $(document).ready(function(){
        $('.click_view_device').click(function(){
        var post_id = $(this).data('postid');
          $.ajax({
            type : "post", 
            dataType : "json", 
            url : '<?php echo admin_url('admin-ajax.php');?>', 
            data : {
            action: "view", 
            post_id : post_id,
            },
          context: this,
          beforeSend: function(){

            },
          success: function(response) {

              if(response.success) {
                  $('.view-device-form-display').html(response.data);
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
<!-- Ajax for View Divice -->

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
    <h2 style="font-weight:bold"><i class="fa fa-list" style="margin-right:10px"></i>Danh sách thiết bị đang mượn</h2>
  </div>
         	<table id="example" class="table table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên thiết bị</th>
                <th>Đã sử dụng</th>
                <th>Người mượn</th>
                <th>Ngày mượn</th>
                <th>Tùy chọn</th>
        </thead>
        <tbody>
        <?php 
 		while($device_posts -> have_posts()): 
 		$device_posts -> the_post();
 		$stt = get_field('stt');
 		$device_name = get_field('device_name');
    $used = get_field('used');
    
 		$note1 = get_field('note1');
 		$note2 = get_field('note2');
     if(count(get_field('note1')) > 0){
?>
            <tr>
                <td id="STT"><?php  echo $stt ?></td>
    		        <td><?php  echo $device_name ?></td>
                <td><?php  echo $used ?></td>
                <td style="background-color:#f2aac1;"><?php foreach($note1 as $note)
				          {
			              print "$note</br>";
				          }?>
					      </td> 


    		        <td style="background-color:#cffced;"><?php foreach($note2 as $note)
				          {
			              print "$note</br>";
				          }?>
                </td> 
    	          <td id="option-td">
                  <button class="click_view_device" id="<?php echo $currentIdRow = get_the_ID(); ?>" onclick="toggleViewDeviceForm(this.id)" 
                  data-postid="<?php echo $currentIdRow = get_the_ID(); ?>"
                  style="margin:2px"><i class="fa fa-eye" 
                  style="font-size:25px;color:white;margin-right:5px"></i>Xem</button>


                  <button class="click_return_device" id="<?php echo $currentIdRow = get_the_ID(); ?>" 
                  onclick="toggleReturnDeviceForm(this.id)" 
                  style="margin:2px"
                  data-postid="<?php echo $currentIdRow = get_the_ID(); ?>"><i class="fa fa-arrow-circle-left" 
                  style="font-size:25px;color:white;margin-right:5px"></i>Trả thiết bị</i></button>
                </td> 		
            </tr>
            
            <?php   
      }  
endwhile;
?>
</tbody>
    </table>
    <button id="addProduct" onclick="toggleAddNewBorrowerForm()">Mượn thiết bị</button>
</div>
</div>

<!-- Pop Up Add User Form -->
<div id="addNewBorrowerForm">
      <form form class="form-inline" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <div class="title-in-form">
        	<h4><i class="fa fa-television" 
                  style="font-size:40px;color:#4899dd;margin-right:10px"></i>Mượn thiết bị mới</h4>
      		</div>
        <input id ="borrowerID" type="text" name="borrowerID" value="" style="display: none"><br>
           <!-- <div class="labels">
          <label id="name-label" for="name">MSSV:</label></div>
        <div id="borrower2" class="input-tab"><input class="input-field" type="text" name="borrowerCode" required autofocus><br></div> -->

        <div class="labels">
          <label id="name-label" for="name">Người mượn:</label></div>
		  <div id="borrower2" class="input-tab"><input class="input-field" type="text" name="borrowerName[]" placeholder="MSSV - Họ và tên" required autofocus><br></div>

		<div class="labels">
          <label id="name-label" for="name">Ngày mượn:</label></div>
        <div id="borrowDate2" class="input-tab"><input class="input-field" type="date" name="borrowerDate[]" required autofocus><br></div>

		<div class="labels">
          <label id="name-label" for="name">Loại thiết bị: </label></div>
		  <div id="borrower2" class="input-tab">
		  		<select class="input-field" name="deviceOp">
					<?php
						while($device_posts -> have_posts()): 
						$device_posts -> the_post();
						$show_device = get_field('device_name');
						?>	
  						<option value="<?php echo $id = get_the_ID(); ?>"><?php echo $show_device; ?></option>
						<?php
							endwhile;
					?>
				</select>
  				<br>
			</div>

		<div class="labels">
          <label id="name-label" for="name">Số lượng:</label></div>
        <div class="input-tab">
          <input class="input-field" type="number" name="bQuantity" placeholder="" value="1" min="1" required autofocus></div>

          <button id="submit_addBorrorwer_button" type="submit" name="submit5" style="margin: 20px;">Thêm Người Mượn</button>
      </form>
          <button class="close_addBorrorwer_button" onclick="closeAddNewBorrowerForm()" style="width: 230px;">Đóng</button>
</div>
<!-- End Of Pop Up Add User Form -->

<!-- Pop Up Return Device Form -->
<div id="returnDeviceForm">
      <form form class="form-inline" method="POST" action="/index.php/">

          <div class="title-in-form">
        	<h4><i class="fa fa-television" 
                  style="font-size:40px;color:#4899dd;margin-right:10px"></i>Trả thiết bị</h4>
      		</div>

			  <input id ="IdRet" type="text" name="IdRet" value="" style="display: none"><br>
            
			<div class="return-device-form-display"></div>

          <button id="submit_return_button" type="submit" name="submit6">Xác nhận</button>
      </form>
          <button class="close_return_button" onclick="closeReturnDeviceForm()">Đóng</button>
</div>
<!-- End Of Pop Up Return Device Form -->

<!-- Pop up View Device Form -->
<div id="viewDeviceForm">
      <form form class="form-inline" method="POST" action="/index.php/">

          <div class="title-in-form">
        	<h4><i class="fa fa-television" 
                  style="font-size:40px;color:#4899dd;margin-right:10px"></i>Xem thiết bị</h4>
      		</div>

			  <input id ="IdRet" type="text" name="IdRet" value="" style="display: none"><br>
			    <div class="view-device-form-display"></div>

      </form>
          <button class="close_view_button" onclick="closeViewDetail()">Đóng</button>
</div>
<!-- End Of Pop Up View Device Form -->

    <?php
 get_footer(); ?>

