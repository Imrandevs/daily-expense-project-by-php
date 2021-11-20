<?php require_once "app/autoload.php" ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daily Expense || Daywise Expense  Details</title>
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
                <li class="active">Daywise Expense </li>
            </ol>
        </div>
        
        <div class="row">
            <div class="col-lg-8">

                <div class="panel panel-default">
                    <div class="panel-heading">Daywise Expense Details</div>
                    <div class="panel-body">
                        
                        <div class="col-md-12">

                        <?php 
                            if(isset($_GET['submit'])){
                                
                                $fromdate=$_GET['fromdate'];
                                $todate=$_GET['todate'];
                            }
                            
                        
                        ?>
                            
                            <h5 align="center" style="color:slateblue">Daywise Expense Details From <?php echo $fromdate; ?> To <?php echo $todate; ?> </h5>
                            <hr>
                            <table class="table table-bordered dt-responsive nowrap" style="border-collapse:collapse;">
                                <thead>
                                    <tr>
                                        <th>S.NO</th>
                                        <th>Category</th>
                                        <th>Paid TO</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                    <?php 
                                    
                                    
                                    $ql="SELECT * ,sum(amount) AS total FROM expenses WHERE (date BETWEEN '$fromdate' AND '$todate' ) GROUP BY date";
                                    $all_data=$connection->query($ql);
                                    $i=1;
                                    
                                    $total_amount_list=0;
                                    while($data=$all_data->fetch_assoc()):
                                        
                               
                                    
                                    ?>
                                <tr>
                                    <td><?php echo $i;$i++; ?></td>
                                    <td><?php echo $data['category'] ?></td>
                                    <td><?php echo $data['paid'] ?></td>
                                    <td><?php echo $data['date'] ?></td>
                                    <td><?php echo $data['total'] ?></td>
                                </tr>
                               <?php
                                    
                                        $total_amount_list+=$data['total']; 
                                   
                                    
                            
                                    endwhile;?>
                                
                                <tr>
                                    <th colspan="4" style="text-align:center;">Grand Total</th>
                                    <td><?php echo $total_amount_list ;?></td>
                                </tr>
                            </table>
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
