<?php 
session_start();
if (isset($_GET['table'])) {
    $conn=new mysqli($_SESSION['servername'],$_SESSION['username'],$_SESSION['password'], $_SESSION['DB_name']);
    $table_name=$_GET['table'];
    $result=$conn->query("SELECT * FROM `$table_name`");
}

?>
<html lang="en">
<?php include('head.html')?>
<div class="container">
    <center>
    <h1 class="display-1 mt-4 " style="font-weight:bold"><span class="text-primary">awad</span><span class="text-warning">MyAdmin</span></h1>
    </center>
    <ul class="breadcrumb">
        <a href="home_page.php"><li class="breadcrumb-item"><i class="fa-solid fa-server"></i> Server: 127.0.0.1</li></a>>>
       <a href="table_page"> <li class="breadcrumb-item"><i class="fa-solid fa-database"> </i> Database: <?=$_SESSION['DB_name']?></li></a>>>
       <li class="breadcrumb-item active"><i class="fa-solid fa-database"> </i> table: <?=$table_name?></li>
    </ul>
    <table class="table table-hover table-bordered mt-4">
    <thead>
        <tr>
            <th> ID  </th>
            <th> First_name </th>
            <th> last_name </th>
            <th>Action</th>
        </tr>
        
    </thead>
    <tbody>
    <?php if ($result->num_rows > 0) {
             while ($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td> <?=$row['id']?></td>
            <td><?=$row['first_name']?></td>
            <td><?=$row['last_name']?></td>
            <td><a href="home_page.php?delete_table=<?=$row['first_name']?>"><i class="fa-solid fa-trash btn btn-danger"></i></a>
                <a href="edit.php?id=<?=$row['id']?>&table=<?=$table_name?>"><i class="fa-solid fa-pen btn btn-primary"></i></a></td>
            
        </tr>

        <?php }}?>
    
    </tbody>

   </table>
</div>
</body>
</html>