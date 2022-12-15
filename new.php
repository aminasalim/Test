
<?php
$con=mysqli_connect('localhost','root','','php_crud');

if(mysqli_connect_errno())
{
	echo 'Failed to connect '.mysqli_connect_error();
}
?>



<?php
date_default_timezone_set('Asia/muscat');
$date_time = date('d-m-y h:i:s');
$date = date('Y-m-d');
echo $date;

session_start();
$caseID=3;
$cat_id=1;

    $query = "SELECT * FROM emergency_details where case_id= $caseID;"; 
    $result = $con->query($query); 
	    if($result->num_rows > 0){ 
		echo "data is available";//go to update form
		
		}else{
			// new form
		$result1 = mysqli_query($con,"SELECT * from emergency_master where e_cat_id=$cat_id");
		if (mysqli_num_rows($result1) > 0) {

    	
			?>
<form method="post">

			
			
			   <table id="search" class="display" style="width:100%">
        <thead>
            <tr >
<th scope="col"  style="text-align: center; vertical-align: middle;">It_ID</th>
<th scope="col"  style="text-align: center; vertical-align: middle;">Items</th>
<th scope="col"  style="text-align: center; vertical-align: middle;">Status</th>
<th scope="col"  style="text-align: center; vertical-align: middle;">Done By</th>
    </tr>
  </thead>
  <tbody>
<?php $i=0;
while($row = mysqli_fetch_array($result1)) { 
$i=$i+1;
	$rows = 4;
	//if(isset($_GET['number_of_rows'])){
//		$rows = $_GET['number_of_rows'];
//	}

	
			# code...

?>
<tr class='row' >
<td><?php echo "i= ".$i;?></td>
<td ><input type="text" class="form-control" name="id<?=$i?>"  value="<?php echo $row['e_id'];?>" style="display:none" ><?php echo $row['e_id'];?></td>
<td class="col-md-5"><?php echo $row['e_name'];?></td>


  	 <td>   <div  style="margin-left:100px;">
	<div class="form-control border-success" >
	<input type="radio" class="btn-check" value="P" name="status<?=$i?>" id="success-outlined" onclick="showDisplay(<?php echo $i;?>)" >
	<label class="btn btn-outline-success" for="success-outlined">Pending</label>
	<input type="radio" class="btn-check" value="D" name="status<?=$i?>" id="danger-outlined" onclick="hideDisplay(<?php echo $i;?>)" checked >
	<label class="btn btn-outline-danger" for="danger-outlined">Done</label>
  </div>
  </div></td>
<td ><input type="text" class="form-control" name="done_by<?=$i?>" disabled ></td>

</tr>
<tr>
<td colspan="3" ><div id="Remarks<?=$i?>" name="Remarks<?=$i?>" style="display:none">
    <label for="validationTextarea" class="form-label">Remark</label>
    <textarea style= "width:60%" class="form-control" name="Remark<?=$i?>" placeholder="Please enter your Issue,." ></textarea>
</div>
</td></tr>
<?php
}
?>
</table>

	<?php //} ?>
<input type="submit" class="btn btn-outline-primary" name="save" value=" Submit ">
</form>	
		<?php			
		}


	function insert_into_db($data){
			foreach($data as $key => $value){
		$k[] = $key;
		$v[] = "'".$value."'";
	}
	$k=implode(",", $k);
	$v=implode(",", $v);

	$conn= mysqli_connect("localhost","root","","data");
	$sql="INSERT INTO emergency_details($k) VALUES($v)";
	$run_query=mysqli_query($conn,$sql);

		}
if(isset($_POST['save'])){
	for ($i=1; $i <= $rows ; $i++) { 
		# code...
		$data=array(
			'd_id' => $_POST['id'.$i],
			'case_id' =>$caseID,
			'status' => $_POST['status'.$i],
			'remark' => $_POST['Remark'.$i],
			'd_date' => $date
	);
		insert_into_db($data);
//header("location:viewstudents.php?row=".$rows);
	echo"saved successfuly";
	
	}

}
}


?>




<? /*

if(isset($_POST['save']))
{ 
$e_name = $_POST['e_name'];
$a_name = $_POST['a_name'];

$sql = "INSERT INTO clinic_rooms (e_name,a_name,Clinic_id)
VALUES ('$e_name','$a_name','$clinicId')";
if (mysqli_query($con, $sql)) {
//header("location: index.php");
echo "saved successfully";
exit();
} else {
echo "Error: " . $sql . "
" . mysqli_error($con);
}
mysqli_close($con);
}


}
*/
?>
<script>
function showDisplay(id) {
  document.getElementById("Remarks"+id).style.display = "block";
  console.log(id);
}
function hideDisplay(id) {
  document.getElementById("Remarks"+id).style.display = "none";
  console.log(id);
}

var status=document.getElementById('id1').value;
  console.log(status);

</script>