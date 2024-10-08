<?php
session_start();
if (isset($_GET['DB_name'])) {
    $_SESSION['DB_name']=$_GET['DB_name'];
    $conn=new mysqli($_SESSION['servername'],$_SESSION['username'],$_SESSION['password'], $_SESSION['DB_name']);
    $result=$conn->query('SHOW TABLES');
}
else{
    header('location: index.php');
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
        <a href="home_page.php"><li class="breadcrumb-item"><i class="fa-solid fa-server"></i> Server: 127.0.0.1</li></a>>>
        <li class="breadcrumb-item active"><i class="fa-solid fa-database"> </i> Database: <?=$_SESSION['DB_name']?></li>
    </ul>
    <form action="new_table.php?DB_name=<?=$_GET['DB_name']?>" method="post">
        <div class="d-inline-flex">
        <input class="form-control text-center" type="text" name="table_name" id="" placeholder="Table Name" required >
        <input class="form-control text-center" type="number" min="1" name="column_number" id=""  placeholder="Number of Column" required>
        </div>
        <input  class="btn btn-success m-2" type="submit" name="create_table" value="New Table">
    </form>
    
   <table class="table table-hover table-bordered mt-4">
    <thead>
        <tr>
            <th><i class="fa-solid fa-table"></i> Tables  </th>
        
            <th>Action</th>
        </tr>
        
    </thead>
    <tbody>
    <?php if ($result->num_rows > 0) {
             while ($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><i class="fa-solid fa-table"></i> <?=$row['Tables_in_'.$_GET['DB_name']]?></td>
            <td><a href="home_page.php?delete_table=<?=$row['Tables_in_'.$_GET['DB_name']]?>"><i class="fa-solid fa-trash btn btn-danger"></i></a>
                <a href="show_table.php?table=<?=$row['Tables_in_'.$_GET['DB_name']]?>"><i class="fa-regular fa-folder-open btn btn-success"></i></a></td>
            
        </tr>

        <?php }}?>
    
    </tbody>

   </table>
    </div>
   
</body>
</html>