<?php require_once "app/autoload.php";?>

<?php 

    if(!isset($_SESSION['user_id'])){

        header('location:index.php');

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daily Expense - Dashboard</title>
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
            <li class="active">Dashboard</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <h1 class="page-header">Dashboard</h1>
        </div>
        
    </div>

    <div class="row">
        <div class="col-xs-6 col-md-3">
            <div class="panel panel-default bg-blue">
                <div class="panel-body ">
                   <?php  

                        $tdate=date('Y-m-d');
                        $sql="SELECT sum(amount) AS total FROM expenses WHERE date='$tdate' ";
                        $all_data=$connection->query($sql);
                        $data=$all_data->fetch_assoc();
                        $todays=$data['total'];
                   
                    ?>
                    <h4 style="color:beige;text-align:center;">Today's Expense</h4>
                    <div class="easypiechart">
                        <span class="percent">
                            <?php 
                            
                                if($todays == ""){

                                    echo 0;

                                }else{

                                    echo $todays.'<span> &#2547;<span>';
                                }
                            
                            
                            ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>

       
        <div class="col-xs-6 col-md-3">
            <div class="panel panel-default bg-teal">
                <div class="panel-body ">

                     <?php  
                        $monthdate= date("Y-m-d", strtotime("-1 month")); 
                        $tdate=date('Y-m-d');
                        $sql="SELECT sum(amount) AS total FROM expenses WHERE (date BETWEEN '$monthdate' AND '$tdate') ";
                        $all_data=$connection->query($sql);
                        $data=$all_data->fetch_assoc();
                        $months=$data['total'];

                        ?>
                                  
                    <h4 style="color:beige;text-align:center;">Monthly Expenses</h4>
                    <div class="easypiechart" >
                        <span class="percent">
                        <?php 
                            
                            if($months == ""){

                                echo 0;

                            }else{

                                echo  $months.'<span> &#2547;<span>';
                            }
                        
                        
                        ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3">
            <div class="panel panel-default bg-orange">
                <div class="panel-body ">
                <?php  
                       
                        $cyear=date('Y');
                        $sql="SELECT sum(amount) AS total FROM expenses WHERE year(date)='$cyear'  ";
                        $all_data=$connection->query($sql);
                        $data=$all_data->fetch_assoc();
                        $year=$data['total'];

                ?>
                    <h4 style="color:beige;text-align:center;">Current Year Expenses</h4>
                    <div class="easypiechart">
                        <span class="percent">
                        <?php 
                            
                            if( $year == ""){

                                echo 0;

                            }else{

                                echo $year.'<span> &#2547;<span>';
                            }
                        
                        
                        ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3 ">
            <div class="panel panel-default bg-danger">
                <div class="panel-body">
                <?php  

                       $sql="SELECT sum(amount) AS total FROM expenses ";
                       $all_data=$connection->query($sql);
                       $data=$all_data->fetch_assoc();
                       $total=$data['total'];

               ?>
                    <h4 style="color:beige;text-align:center;">Total Expenses</h4>
                    <div class="easypiechart" data-percent="" >
                        <span class="percent">
                        <?php 
                            
                            if( $total == ""){

                                echo 0;

                            }else{

                                echo $total.'<span> &#2547;<span>';
                            }
                        
                        
                        ?>
                        </span>
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
