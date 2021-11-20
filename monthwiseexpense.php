<?php require_once "app/autoload.php" ;?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daily Expense || Monthwise Expense </title>
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
                <li><a href="#"><em class="fa fa-home">&nbsp;</em></a></li>
                <li class="active">Monthwise Expense Details</li>
            </ol>
        </div>
        
        <div class="row">
            <div class="col-lg-12">

                <div class="panel panel-default">
                    <div class="panel-heading">Monthwise Expense Details</div>
                    <div class="panel-body">
                        
                        <div class="col-md-6">
                            <form role="form" method="GET" action="monthdetail.php">
                                <fieldset>
                                    <div class="form-group">
                                        <label>From Date</label>
                                        <input type="date" class="form-control" name="fromdate" required>
                                    </div>
                                    <div class="form-group">
                                        <label>To Date</label>
                                        <input type="date" class="form-control" name="todate" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" name="submit" value="Search">
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
        <script src="assets/js/script.js"></script>
</body>
</html>
