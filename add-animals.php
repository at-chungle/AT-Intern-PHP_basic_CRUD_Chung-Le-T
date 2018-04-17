
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
         <div class="form-container">
            <h1>
                ADD
            </h1>
        <div class="panel-body">
    <?php
            if(isset($_POST['add'])){
              $name = $_POST['name'];
              $gender = $_POST['gender'];
              $dob = $_POST['dob'];
              $sql_add = "insert into animals (name,gender,dob) values ('$name','$gender',' $dob')";
              $stmt_add = $conn->prepare($sql_add);
              try{
                $check = $stmt_add->execute();
                if($check === true ){
                  header("LOCATION:animals.php");
                  exit();
                }
              }catch(PDOException $e){
              ?>
              <div class="error">
                Sua that bai!
              </div>
            <?php
            }}
          ?>
                <form method="post" id="reused_form" >
                    <label >Name:</label>
                   <input type="text" name="name" required class="form-control" placeholder="Nhap Ten">
                    <label >Gender:</label>
                   <input type="text" name="gender" required class="form-control" placeholder="Gioi Tinh" >
                    <label >Dob:</label>
                   <input type="text" name="dob" required  class="form-control" placeholder="Ngay Sinh" >
                    <button type="submit" name="add">Add</button>
                    <button type="reset" name="reset">Reset</button>
                </form>
            </div>
        </div>
    </body>
</html>