<?php require_once "app/autoload.php";?>

<?php 

    if(isset($_GET['logout']) AND $_GET['logout']=='ok') {

        session_destroy();
        header('location:index.php');

    }


?>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
                <?php
                //users profile
                if(isset($_SESSION['user_id'])){

                    $all_data=$_SESSION['user_id'];
                    $sql= "SELECT * FROM registers WHERE id='$all_data' ";
            
                    $login_data=$connection->query($sql);
            
                    $pro=$login_data->fetch_assoc();
            
                }

                ?>
        <div class="profile-userpic">
            <img src="./photos/<?php echo $pro['photo'];?>" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
           
            <div class="profile-usertitle-name"><?php echo $pro['name'];?></div>
            <div class="profile-usertitle-status"></div>
        </div>
        <div class="clear"></div>
    </div>

    <div class="divider"></div>
    <ul class="nav menu">

        <li class="active"><a href="dashboard.php"><em class="fa fa-dashboard">&nbsp;</em>Dashboard</a></li>

        <li class="parent">
            <a href="#sub-item-1" data-toggle="collapse">
                <em class="fa fa-navicon">&nbsp;</em>Expenses <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>

            <ul class="children collapse" id="sub-item-1">
                <li><a href="category.php"><span class="fa fa-arrow-right">&nbsp;</span>Add Category</a></li>
                <li><a href="addexpense.php"><span class="fa fa-arrow-right">&nbsp;</span>Add Expenses</a></li>
                <li><a href="manageexpense.php"><span class="fa fa-arrow-right">&nbsp;</span>Manage Expenses</a></li>
            </ul>

        </li>

        <li class="parent">
            <a href="#sub-item-2" data-toggle="collapse">
                <em class="fa fa-navicon">&nbsp;</em>Expense Report <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>

            <ul class="children collapse" id="sub-item-2">
                <li><a href="daywiseexpense.php"><span class="fa fa-arrow-right">&nbsp;</span>Daywise Expenses</a></li>
                <li><a href="monthwiseexpense.php"><span class="fa fa-arrow-right">&nbsp;</span>Monthwise Expenses</a></li>
                <li><a href="yearwiseexpense.php"><span class="fa fa-arrow-right">&nbsp;</span>Yearwise Expenses</a></li>
                <li><a href="categorywise.php"><span class="fa fa-arrow-right">&nbsp;</span>Category Expenses</a></li>
            </ul>

        </li>

        <li><a href="profile.php"><em class="fa fa-user">&nbsp;</em>Profile</a></li>

        <li><a href="changepassword.php"><em class="fa fa-clone">&nbsp;</em>Change Password</a></li>

        <li><a href="?logout=ok"><em class="fa fa-power-off">&nbsp;</em>Log out</a></li>

    </ul>

</div>