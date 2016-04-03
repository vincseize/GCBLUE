<?php
@session_start(); 
@session_unset(oid);
@session_destroy(oid);
header("location: home.php?pwd=OK");
?>