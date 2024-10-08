<?php 
session_start();
if (isset($_POST['create_table'])) {
    $conn=new mysqli($_SESSION['servername'],$_SESSION['username'],$_SESSION['password'], $_SESSION['DB_name']);
    $number=$_POST['column_number'];
    $table_name=$_POST['table_name'];
}

?>
<!DOCTYPE html>
<html lang="en">
<?php include('head.html')?>
<body>
<div class="container">
    <center>
    <h1 class="display-1 mt-4 " style="font-weight:bold"><span class="text-primary">awad</span><span class="text-warning">MyAdmin</span></h1>
    </center>
    <ul class="breadcrumb">
        <a href="home_page.php"><li class="breadcrumb-item"><i class="fa-solid fa-server"></i> Server: 127.0.0.1</li></a> >>
        <li class="breadcrumb-item"><i class="fa-solid fa-database"> </i> Database: <?=$_SESSION['DB_name']?></li>
    </ul>
    <div class="d-inline-flex">
    <input class="form-control text-center" type="text" name="table_name" id="" value="<?=$table_name?>" required >

    <input class="form-control text-center" type="number" name="column_number" id=""  value="<?=$number?>" required>
    </div>
    
</div>
</body>
</html>