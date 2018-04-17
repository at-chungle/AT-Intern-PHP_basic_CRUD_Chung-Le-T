<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="js/main.js">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
</head>
<?php include('connectDB.php') ?>
<body>

 <div class="wrapper">
 
  <h1>List Animals</h1>
<a href="add-animals.php">Add animals</a>
<br/>
  <?php 
  	$stmt = $conn->prepare("SELECT * FROM animals"); 
    $stmt->execute();
    $result = $stmt->fetchAll(); 
   ?>

  <table id="keywords" cellspacing="0" cellpadding="0">

    <thead>

      <tr>
        <th><span>Id</span></th>
        <th><span>Name</span></th>
        <th><span>Gender</span></th>
        <th><span>Dob</span></th>
        <th><span>Action</span></th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($result as $value) {
    	$id = $value['id'];
    	$name = $value['name'];
    	$gender = $value['gender'];
    	$dob = $value['dob'];
    ?>

    	<tr>
    		<td><?php echo($id) ?></td>
    		<td><?php  echo($name)?></td>
    		<td><?php echo($gender) ?></td>
    		<td><?php echo($dob) ?></td>
    		<td><a href="edit-animals.php?id=<?php echo $id?>"><i class="glyphicon glyphicon-pencil"></i></a> 
				<a href="delete-animals.php?id=<?php echo $id?>"><i class="glyphicon glyphicon-trash"></i></a>
    		</td>
    	</tr>
			<?php 
		} ?>
    </tbody>
  </table>
 </div> 
</body>
</html>
 

