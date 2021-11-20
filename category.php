<?php require_once "app/autoload.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daily Expense || Add Category</title>
    <link href="assets/css/font awesome/css/all.css" rel="stylesheet">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/styles.css" rel="stylesheet">t">
    <link href="css/styles.css" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>
<?php 

//data get

    if(isset($_POST['submit'])){

        $cat_name= $_POST['cat_name'];
        //validation

         if( empty($cat_name) ){
   
   
             $mess=validate('Field are require !');
   
         }else{
            
            //data update

           insert("INSERT INTO category (name)values('$cat_name') ");
   
            $mess=validate('Category Added  successful','success');
       
         }
        
    }

?>
<body>

    
    <?php include 'layouts/header.php'; ?>
    <?php include 'layouts/sidebar.php'; ?>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><em class="fa fa-home">&nbsp;</em></a></li>
                <li class="active">Category</li>
            </ol>
        </div>
        
        <div class="row">
            <div class="col-lg-12">

                <div class="panel panel-default">
                    <div class="panel-heading">Category Adding</div>
                    <?php include "template/message.php" ?>
                    <div class="panel-body">
                        
                        <div class="col-md-6">
                            <form method="POST">
                                     <div class="form-group">
                                        <label>Category Name</label>
                                        <input type="text" class="form-control" name="cat_name">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" name="submit" value="Add">
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
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>