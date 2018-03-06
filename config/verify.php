<?php
session_start();
function verify(){
    if(!isset($_SESSION['username'])){
        echo "<script>window.parent.location.href='../config/error.php';</script>";
    }
}
verify();


