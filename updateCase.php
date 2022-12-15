
<?php
// including the database connection file
$con=mysqli_connect('localhost','root','','emergency_crisis');

if(mysqli_connect_errno())
{
	echo 'Failed to connect '.mysqli_connect_error();
}
?>

<?php
session_start();
//getting id from url
$caseID=4;
$cat_id=2;

//selecting data associated with this particular id

$getData = mysqli_query($con,"SELECT * from emergancy_details where case_id=$caseID");
		if (mysqli_num_rows($getData) > 0) {

	
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
while($row = mysqli_fetch_array($getData)) { 
$i=$i+1;
	$rows = 4;
?>

<tr class='row'>
<td><?php echo "i= ".$i;?></td>
<td ><input type="text" class="form-control" name="id<?=$i?>"  value="<?php echo $row['em_id'];?>" style="display:none" ><?php echo $row['em_id'];?></td>
<td class="col-md-5"><?php echo $row['em_id'];?></td>


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
	<input type="submit" class="btn btn-outline-primary" name="Update" value=" Submit ">
</form>	
		<?php			
	}else{ 
	echo "test";
	}
		
		
?>