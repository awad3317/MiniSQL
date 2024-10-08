<?php 
function delete_DB($conn,$dbName) {
    $sql = "DROP DATABASE `$dbName`";
    $conn->query($sql);
}
function Create_DB($conn,$dbName) {
    $sql = "CREATE DATABASE `$dbName`";
    $conn->query($sql);
}
function edit($conn,$table,$id,$first_name,$last_name){
   $conn->query("UPDATE `$table` SET  ");
}
?>