<style type="text/css">
	.subdiv{
		padding: 10px;
	}

</style>
<form method="post">
	<?php
	$rows = 1;
	if(isset($_GET['number_of_rows'])){
		$rows = $_GET['number_of_rows'];
	}

		for ($i=0; $i < $rows; $i++) { 
			# code...
			?>
			<h2>
				Student No. <?=$i+1?>
			</h2>
			<div style="margin:20px;background: ghostwhite;border:2px solid black;padding:20px;">
				
				<div class="subdiv">
					
				<input placeholder="student name" type="text" name='name<?=$i?>' required>
				</div>
				<div class="subdiv">
					
				<input type="text" placeholder="fathername" name='fname<?=$i?>' required>
				</div>
				<div class="subdiv">
					<select required name='class<?=$i?>'>
						<option selected disabled >Please select a class</option>
						<option>Nur</option>
						<option>Lkg</option>
						<option>Ukg</option>
						<option>1<sup>st</sup></option>
						<option>2<sup>nd</sup></option>
						<option>3<sup>rd</sup></option>
						<option>4<sup>th</sup></option>
						<option>5<sup>th</sup></option>
						<option>6<sup>th</sup></option>
						<option>7<sup>th</sup></option>
						<option>8<sup>th</sup></option>
						<option>9<sup>th</sup></option>
						<option>10<sup>th</sup></option>
						<option>+1</option>
						<option>+2</option>
					</select>
				
				</div>
				<div class="subdiv">
					
				<input type="text" placeholder="admission fee" name='admfee<?=$i?>' required>
				</div>
				<div class="subdiv">
					
				<input type="text" placeholder="tution fee" name='tutfee<?=$i?>' required>
				</div>
				<div class="subdiv">
					
				<input type="text" placeholder="van fee" name='vanfee<?=$i?>' required>
				</div>
				<div class="subdiv">
					
				<input type="text" placeholder="lab fee" name='labfee<?=$i?>' required>
				</div>
				<div class="subdiv">
					
				<input type="text" placeholder="other fee" name='othfee<?=$i?>' required>
				</div>
			</div>
			<?php
		}
	?>

<div>
	<input type="submit" name="submit">
</div>

</form>
<form method="get">
	<input type="number" value="<?=$rows?>" max=10 min="1" name="number_of_rows" required>
	<input type="submit" name="submit2">
</form>

<?php
	function insert_into_db($data){
			foreach($data as $key => $value){
		$k[] = $key;
		$v[] = "'".$value."'";
	}
	$k=implode(",", $k);
	$v=implode(",", $v);

	$conn= mysqli_connect("localhost","root","","demo");
	$sql="INSERT INTO students($k) VALUES($v)";
	$run_query=mysqli_query($conn,$sql);

		}
if(isset($_POST['submit'])){
	for ($i=1; $i < $rows ; $i++) { 
		# code...
		$data=array(
			'name' => $_POST['name'.$i],
			'fname' => $_POST['fname'.$i],
			'class' => $_POST['class'.$i],
			'admfee' => $_POST['admfee'.$i],
			'tutfee' => $_POST['tutfee'.$i],
			'vanfee' => $_POST['vanfee'.$i],
			'labfee' => $_POST['labfee'.$i],
			'othfee' => $_POST['othfee'.$i],
			'student_id' => uniqid()




	);
		insert_into_db($data);
header("location:viewstudents.php?row=".$rows);
	
	
	}

	

}

?>