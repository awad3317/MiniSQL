<?php
session_start();
if(isset($_POST['submit'])){
$servername=$_POST['servername'];
$username=$_POST['username'];
$password=$_POST['password'];
try {
    $conn=new mysqli($servername,$username,$password);
    $_SESSION['servername'] = $servername;
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    header('location: home_page.php');
} catch (\Throwable $th) {
    $validation='Connected failed';
}
}

?>

<!DOCTYPE html>
<html lang="en">
<?php include('head.html')?>
<body style="background-image:linear-gradient(to left , rgb(185, 184, 184) 10px, transparent)">
    
    <center>
        <?php if (isset($validation)) {
            ?>
            <div class="alert alert-warning"><?=$validation?></div>
        <?php } ?>
        <h1 class="display-1 mt-4 " style="font-weight:bold"><span class="text-primary">awad</span><span class="text-warning">MyAdmin</span></h1>
        <div class="w-50 h-50 rounded-4 p-4 mt-4" style="box-shadow:0 0px 30px 0 rgb(185, 184, 184)">
            <form action="" method="post">
                <div class="form-group mb-4">
                    <input class="form-control text-center" type="text" name="servername" id="" placeholder="Server Name">
                </div>
                <div class="form-group mb-4">
                    <input class="form-control text-center" type="text" name="username" id="" placeholder="UserName">
                </div>
                <div class="form-group mb-4">
                    <input class="form-control text-center" type="password" name="password" id="" placeholder="Password">
                </div>
            
                <input type="submit" class="btn btn-success m-2 w-50" value="submit" name="submit">
        </form>
        </div>
    </center>
        
        
    
</body>
</html>