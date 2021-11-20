<?php require_once "app/autoload.php" ;?>

    <?php 
    
        if(isset($_GET['delete_id'])){

            $del_id=$_GET['delete_id'];
            $sql="DELETE FROM expenses WHERE id='$del_id' ";
            $connection->query($sql);
            header("location:manageexpense.php ");

        }
    
    
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daily Expense  || Manage Expense</title>
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
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Expense</li>
			</ol>
            
		</div>
		
		
				
		
		<div class="row">
			<div class="col-lg-12">		
				<div class="panel panel-default">
					<div class="panel-heading">
                        <div class="col-lg-7">
                            <h3>Expenses</h3>
                        </div>
                        <div class="col-lg-5">
                           
                            <form clas="form-inline" method="POST">
                                <div class="">
                                    <input type="text" name="search">
                                    <button name="submit" type="submit">search</button>
                                </div>    
                            </form>
                        </div>
                        

                    </div>

					<div class="panel-body">   
						<div class="col-md-12">
							
						<div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                    <th>S.NO</th>
                                    <th>Expense Category</th>
                                    <th>Expense Amount</th>
                                    <th>Paid To</th>
                                    <th>Expense Date</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php 

                                    if(isset($_POST['submit'])){
                                       
                                        $search=$_POST['search'];
                                        $date=date('Y-m-d');
                                        $ql="SELECT * FROM expenses WHERE category LIKE '%$search%' OR paid LIKE '%$search%' OR date='$date' ";
                                    }else{

                                        $ql="SELECT * FROM expenses";
                                        
                                    }
                                        
                                        $all_data=$connection->query($ql);
                                        $i=1;
                                        while($data=$all_data->fetch_assoc()){
                                    
                                    ?>
                                    <tr>
                                    <td><?php echo $i;$i++?></td>
                                    <td><?php echo $data['category']?></td>
                                    <td><?php echo $data['amount']?></td>
                                    <td><?php echo $data['paid']?></td>
                                    <td><?php echo $data['date']?></td>
                                    <td>
                                        <a  class="btn btn-sm btn-danger delete" href="?delete_id=<?php echo $data['id']?>">Delete</a>  
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
              </div>
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