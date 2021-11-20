<?php require_once "app/autoload.php" ;?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daily Expense -Register</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/styles.css" rel="stylesheet">
</head>

<?php 

//data get

    if(isset($_POST['submit'])){

        $name        = $_POST['name'];
        $email       = $_POST['email'];
        $password    = $_POST['password'];
        $repeat_pass = $_POST['repeat_pass'];
        

        $hash_pass=password_hash($password,PASSWORD_DEFAULT);

        $file_name=$_FILES['photo']['name'];
        $file_tmp_name=$_FILES['photo']['tmp_name'];
        $unique_name=md5(time().rand()).$file_name;
        move_uploaded_file($file_tmp_name,'photos/'.$unique_name);

        //email check
        
        $emailCheck=valueCheck('registers','email',$email);

        //validation

         if( empty($name) || empty($email) ||empty( $password)  ){
   
   
             $mess=validate('All fields are require !');
   
         }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
   
            $mess=validate('Invalid Email !','warning');
   
         }else if($password!=$repeat_pass){
   
            $mess=validate('Password not match !','warning');
   
         }else if($emailCheck > 0){
   
            $mess=validate('Email already exists !','warning');
   
         }else{
            
            //data send

           insert("INSERT INTO registers(name,email,photo,password)values('$name','$email','$unique_name','$hash_pass') ");
   
            $mess=validate('Registration successful','success');
       
         }
        

    }


?>


<body>
    <div class="row">
        <h2 align="center">Daily Expense</h2>
        <hr>
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">Sign Up</div>
                <?php require"template/message.php" ;?>
                <div class="panel-body">
                    <form  method="POST" enctype="multipart/form-data">
                        
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Your Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="Your E-mail">
                            </div>
                            <div class="form-group">
                                <label for="file_icon" name="photo"><img style="width: 60px;" src="assets/img/download.png" alt=""></label>
                                <input id="file_icon" type="file" class="hidden" name="photo">
                            </div>
                            
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Type Password">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="repeat_pass" placeholder="Repeat Password" >
                            </div>
                            <div class="checkbox">
                                
                                <input value="Register" type="submit" class="btn btn-primary" name="submit">
                                <div class="pull-right">
                                    <span><a href="index.php" class="btn btn-primary">Login</a></span>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>
