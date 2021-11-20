<?php include_once"app/autoload.php" ; ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daily Expense || Add Expense</title>
    <link href="assets/css/font awesome/css/all.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/styles.css" rel="stylesheet">t">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>


<?php 

//data get

    if(isset($_POST['submit'])){

        $date    = $_POST['date'];
        $amount  = $_POST['amount'];
        if(isset($_POST['category'])){
        $category = $_POST['category'];
        $catlist=implode(',',$category);

        }
        if(isset($_POST['paid'])){
         $paid   = $_POST['paid'];
    
        }
        
        //validation

         if( empty($date)|| empty($amount) ||empty($category) ||empty($paid)){
   
   
             $mess=validate('All fields are require !');
   
         }else{
            
            //data send

           insert("INSERT INTO expenses (date,amount,category,paid)values('$date','$amount','$catlist','$paid') ");
   
            $mess=validate('Expenses Added  successful','success');
       
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
                <li class="active">Expense</li>
            </ol>
        </div>
        
        <div class="row">
            <div class="col-lg-12">

                <div class="panel panel-default">
                    <div class="panel-heading">Expense Add</div>
                    <?php require_once "template/message.php"; ?>
                    <div class="panel-body">
                        
                        <div class="col-md-6">
                            <form role="form" method="POST">
                                    <div class="form-group">
                                        <label>Date of Expense</label>
                                        <input type="date" class="form-control" name="date">
                                    </div>
                                    <div class="form-group">
                                        <label>Amount</label>
                                        <input type="number" class="form-control" name="amount">
                                    </div>
                                    <div class="form-group">
                                        <label>Category</label>
                                            
                                                <select style="width:100%" class="cat_select"  name="category[]" multiple="multiple">
                                                <?php 

                                                $sql="SELECT * FROM category";
                                                $cats=$connection->query($sql);

                                                foreach($cats as $all_cat)
                                                {
                                                    ?>
                                                    <option value="<?php echo $all_cat['name'] ?>"><?php echo $all_cat['name'] ?></option>
                                                    <?php }?>
                                                </select>

                                    </div>
                                    <div class="form-group">
                                        <label>Paid To</label>
                                        <input type="text" class="form-control" name="paid">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary test" name="submit" value="Add">
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>

         $('.cat_select').select2();
        
       
    </script>

</body>
</html>