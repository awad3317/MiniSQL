<?php 
include('function.php');
$conn=new mysqli($_SESSION['servername'],$_SESSION['username'],$_SESSION['password'], $_SESSION['DB_name']);
$table_name=$_GET['table'];
session_start();
if(isset($_GET['id'])){
   
    $id=$_GET['id'];
    $result=$conn->query("SELECT * FROM `$table_name` WHERE id='$id'");
}
if(isset($_GET['save'])){
    $conn->query("UPDATE  FROM `$table_name` WHERE id='$id'");
}



?>


<!DOCTYPE html>
<html lang="en">
<?php include('head.html') ?>
<body>
<div class="container">
    <center>
    <h1 class="display-1 mt-4 " style="font-weight:bold"><span class="text-primary">awad</span><span class="text-warning">MyAdmin</span></h1>
    </center>
    <ul class="breadcrumb">
        <a href="home_page.php"><li class="breadcrumb-item"><i class="fa-solid fa-server"></i> Server: 127.0.0.1</li></a>>>
       <a href="table_page"> <li class="breadcrumb-item"><i class="fa-solid fa-database"> </i> Database: <?=$_SESSION['DB_name']?></li></a>>>
       <li class="breadcrumb-item active"><i class="fa-solid fa-database"> </i> table: <?=$table_name?></li>
    </ul>
    <form action="" method="get">
    <?php if ($result->num_rows > 0) {
             while ($row = $result->fetch_assoc()) {
        ?>
        <div class="form-group">
            <label for="">first_name</label>
            <input class="form-control" type="text" name="" value="<?=$row['first_name']?>" id="">
        </div>
        <div class="form-group my-4">
            <label for="">last_name</label>
            <input class="form-control" type="text" name="" value="<?=$row['last_name']?>" id="">
        </div>
        <input type="submit" class="btn btn-outline-success " value="save" name="submit">
        <?php }}?>
    </form>
</div>
</body>
</html>