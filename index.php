<?php require_once "app/autoload.php";?>

<?php 


if(isset($_SESSION['user_id'])){

    header('location:dashboard.php');

}

?>


<?php 

   if(isset($_POST['submit'])){

      $email    =$_POST['email'];
      $password =$_POST['password'];

      if(empty($email)|| empty($password)){

         $mess=validate('All fields are require !');

      }else{

         $sql="SELECT * FROM registers WHERE email='$email' ";
         $all=$connection->query($sql);
         $user=$all->num_rows;
         $sing_user=$all->fetch_assoc();
         if($user == 1){

            if(password_verify($password,$sing_user['password'])){


               $_SESSION['user_id'] =$sing_user['id'];
            //    setcookie('log_user',$sing_user['id'],time()+(60*60*24*30*12));
              

               header('location:dashboard.php');

            }else{

               $mess=validate('password incorrect !');
            }

         }else{
            $mess=validate('Email incorrect !');
         }
      }
   }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daily Expense -Login</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/styles.css" rel="stylesheet">
</head>
<body>
    <div class="row">
        <h2 align="center">Daily Expense - Login </h2>
        <hr>
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">Login</div>
                <?php include "template/message.php";?>
                <div class="panel-body">
                    <form role="form" method="POST">
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" placeholder="E-mail" >
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input value="Login" type="submit" class="btn btn-primary" name="submit">
                                <div class="pull-right">
                                    <span><a href="register.php" class="btn btn-primary">Register</a></span>
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