
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>A Contact Form Using Phpmailer - reusable form</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link rel="stylesheet" href="css/form.css">
	<link rel="stylesheet" href="js/form.js">
        <?php include('connectDB.php') ?>
    </head>
    <body >
        <div class="container">
         <?php
	      if(isset($_REQUEST['id'])){
	          $id = $_REQUEST['id'];
	        }else{
	          header("location:animals.php");
	          exit();
	        }
	        $sql = "select * from animals where id = {$id}";
	        $stmt = $conn->prepare($sql);
	        $stmt->execute();
	        $result = $stmt->fetch(PDO::FETCH_ASSOC);
	        // print_r($result);
	        $id = $result['id'];
	        $name = $result['name'];
	        $gender = $result['gender'];
	        $dob = $result['dob'];
    	?>
         <div class="form-container">
            <h1>
                Edit 
            </h1>
        <div class="panel-body">
		<?php
            if(isset($_POST['edit'])){
              $name = $_POST['name'];
              $gender = $_POST['gender'];
              $dob = $_POST['dob'];
              $sql_edit = "update animals set name = '$name', gender = '$gender', 
                          dob= '$dob' where id= {$id}";
              $stmt_edit = $conn->prepare($sql_edit);
              try{
                $check = $stmt_edit->execute();
                if($check === true ){
                  header("LOCATION:animals.php");
                  exit();
                }
              }catch(PDOException $e){
              ?>
              <div class="error" style="width:100%; height:100%; display:none; ">
                Sua that bai!
              </div>
            <?php
            }}
          ?>
                <form method="post" id="reused_form" >
                    <label>Name:</label>
                   <input type="text" name="name" required class="form-control" placeholder="Nhap Ten" value="<?php echo $name ?>">
                    <label>Gender:</label>
                   <input type="text" name="gender" required class="form-control" placeholder="Gioi Tinh" value="<?php echo $gender ?>" >
                    <label>Dob:</label>
                   <input type="text" name="dob" required  class="form-control" placeholder="Ngay Sinh" value="<?php echo $dob ?>" >
                    	<button type="submit" name="edit">Edit</button>
						<button type="reset" name="reset">Reset</button>
                </form>
                <div id="success_message" style="display:none">
                    <h3>Submitted the form successfully!</h3> 
                    <p> We will get back to you soon. </p>
                </div>
                <div id="error_message" style="width:100%; height:100%; display:none; "> <h3>Error</h3> Sorry there was an error sending your form. </div>
            </div>
        </div>
    </body>
</html>