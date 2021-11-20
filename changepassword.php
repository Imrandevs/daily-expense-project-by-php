<?php include_once "app/autoload.php"; ?>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Daily Expense || Change Password</title>
        <link href="assets/css/font awesome/css/all.css" rel="stylesheet">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/styles.css" rel="stylesheet">
        
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    </head>

    <?php 

//data get

    if(isset($_POST['submit'])){

        $pass_id=$_SESSION['user_id'];


        $currentpassword  = $_POST['currentpassword'];
        $newpassword      = $_POST['newpassword'];
        $confirmpassword  = $_POST['confirmpassword'];

        $new_pass=password_hash($newpassword,PASSWORD_DEFAULT);


        //validation

         if(empty($currentpassword) || empty($newpassword ) || empty($confirmpassword ) ){
   
   
             $mess=validate('All fields are require !');
   
         }else if($newpassword!=$confirmpassword ){
   
            $mess=validate('New & confirm password Not Match ! ');
   
         }else{
            
            //data update

            $sql="SELECT * FROM registers WHERE id='$pass_id' ";

            $data=$connection->query( $sql);

            $count_pass=$data->num_rows;

            $old_pass=$data->fetch_assoc();

            if($count_pass > 0){


                if(password_verify($currentpassword,$old_pass['password'])){

                    update("UPDATE registers SET password='$new_pass' WHERE id='$pass_id' ");

                   $mess=validate('password change successful ','success');

                }else{

                    $mess=validate('Current password Not Match ! ');
                }



                

            }

           
         }
        

    }


?>
    <body>
    <?php include 'layouts/header.php'; ?>
    <?php include 'layouts/sidebar.php'; ?>
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#"><em class="fa fa-home"></em></a></li>
                    <li class="active">Change Password</li>
                </ol>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">Change Password</div>
                        <?php include "template/message.php";?>
                        <div class="panel-body">
                            <p style="font-size:medium;" align="center">
                            </p>
                            <div class="col-md-12">
                                <form  method="POST">
                                        <div class="form-group">
                                            <label>Current Password</label>
                                            <input type="password" class="form-control" name="currentpassword">
                                        </div>
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input type="password" class="form-control" name="newpassword">
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" class="form-control" name="confirmpassword">
                                        </div>
                                        <div class="form-group">
                                            <input value="Change" type="submit" class="btn btn-primary" name="submit">
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
