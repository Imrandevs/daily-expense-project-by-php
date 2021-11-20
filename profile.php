<?php require_once "app/autoload.php";?>

<?php 

if(!isset($_SESSION['user_id'])){

    header('location:index.php');
}

?>


<?php 

//data get

    if(isset($_POST['submit'])){

        $update_id=$_SESSION['user_id'];
        $sql= "SELECT * FROM registers WHERE id='$update_id' ";
        $old_data=$connection->query($sql);
        $old_val=$old_data->fetch_assoc();

        $name        = $_POST['name'];
        $email       = $_POST['email'];


        $photo_name='';
        if(empty($_FILES['new_photo']['name'])){

            $photo_name=$old_val['old_photo']; 

       

        }else{

            $file_name=$_FILES['new_photo']['name'];
            $file_tmp_name=$_FILES['new_photo']['tmp_name'];
            $photo_name=md5(time().rand()).$file_name;
            move_uploaded_file($file_tmp_name,'photos/'. $photo_name);

            unlink('photos/'.$old_val['photo']);
        }
  
        



        //validation

         if( empty($name) || empty($email) ){
   
   
             $mess=validate('All fields are require !');
   
         }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
   
            $mess=validate('Invalid Email !','warning');
   
         }else{
            
            //data update

           update("UPDATE registers SET name='$name',email='$email',photo='$photo_name' WHERE id='$update_id' ");
   
            $mess=validate('Update successful','success');
       
         }
        

    }


?>

<?php
     //users profile
     if(isset($_SESSION['user_id'])){

        $all_data=$_SESSION['user_id'];
        $sql= "SELECT * FROM registers WHERE id='$all_data' ";
        $login_data=$connection->query($sql);
        $pro=$login_data->fetch_assoc();
            
         }

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daily Expense || User Profile</title>
    <link href="assets/css/font awesome/css/all.css" rel="stylesheet">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/styles.css" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>
<body>
        
    <?php include 'layouts/header.php'; ?>
    <?php include 'layouts/sidebar.php'; ?>
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#"><em class="fa fa-home"></em></a></li>
                    <li class="active">User Profile</li>
                </ol>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">Profile</div>
                        <?php include "template/message.php"; ?>
                        <div class="panel-body">
                            <p style="font-size:medium;" align="center">
                                                                
                            </p>
                            <div class="col-md-12">
                               
                            <form  method="POST" enctype="multipart/form-data">
                        
                                    <div class="form-group">
                                        <input type="text" value="<?php echo $pro['name'];?>" class="form-control" name="name" placeholder="Your Name">
                                    </div>
                                    <div class="form-group">
                                        <input value="<?php echo $pro['email'];?>" type="text" class="form-control" name="email" placeholder="Your E-mail">
                                    </div>
                                    <div class="form-group">
                                        <img style="width: 120px;" src="./photos/<?php echo $pro['photo'];?>" alt="">
                                        <input type="file" value="<?php echo $pro['photo'];?>" class="hidden" name="old_photo" >
                                    </div>
                                    <div class="form-group">
                                        <label for="file_icon" name="new_photo"><img style="width: 60px;" src="assets/img/download.png" alt=""></label>
                                        <input id="file_icon" type="file" class="hidden" name="new_photo">
                                    </div>
                                    
                                    <div class="checkbox">
                                        
                                        <input value="Update" type="submit" class="btn btn-primary" name="submit">
                                        
                                    </div>
                            </form>
                            </div>       
                        </div>
                    </div>
                </div>
            </div>
        </div>

   
        <script src="assets/js/jquery-3.5.1.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/custom.js"></script>
</body>
</html>
