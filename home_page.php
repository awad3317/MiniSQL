<?php
include('function.php');
session_start();

$conn=new mysqli($_SESSION['servername'],$_SESSION['username'],$_SESSION['password']);
if(isset($_GET['delete'])){
   delete_DB($conn,$_GET['delete']);
}
if(isset($_POST['create'])){
    Create_DB($conn,$_POST['DB_name']);
}
$sql = "SHOW DATABASES";
$result = $conn->query($sql);

$DB=array('mysql','information_schema','performance_schema','phpmyadmin');
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
        <li class="breadcrumb-item active"><i class="fa-solid fa-server"></i> Server: 127.0.0.1</li>
    </ul>
   <table class="table table-hover table-bordered mt-4">
    <thead>
        <tr>
        <th><i class="fa-solid fa-database"></i> DB_Name</th>
        <th>Action</th>
        </tr>
        
    </thead>
    <tbody>
    <?php if ($result and $result->num_rows > 0) {
             while ($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><i class="fa-solid fa-database"> </i> <?=$row['Database']?></td>
            <?php if(!array_search($row['Database'],$DB)) {
                ?>
            <td><a href="home_page.php?delete=<?=$row['Database']?>"><i class="fa-solid fa-trash btn btn-danger"></i></a>
                <a href="table_page.php?DB_name=<?=$row['Database']?>"><i class="fa-regular fa-folder-open btn btn-success"></i></a></td>
            <?php }?>
        </tr>
   <?php }}?>
        
    
    </tbody>
    <thead>
        <form action="" method="post">
        <th><input class="form-control text-center" type="text" name="DB_name" placeholder="DB_name" required></th>
        <th><button class="btn btn-success" type="submit" name="create">Create</button></th>
        </form>
       
    </thead>
    


   </table>
    </div>
   
</body>
</html>
