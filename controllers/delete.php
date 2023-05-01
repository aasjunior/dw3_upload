<?php
    include('../models/conn.php');

    $query = mysqli_query($conn, "SELECT dir FROM imagesPNG WHERE id=".$_GET['id']);
    while($dir = mysqli_fetch_array($query)){
        unlink($dir[0]);
    }
    mysqli_query($conn, "DELETE FROM imagesPNG WHERE id=".$_GET['id']);
    header("location:../views/inicio.php");
?>