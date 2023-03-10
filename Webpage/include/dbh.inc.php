<?php

/* dbh stands for database handler. This is the files that handles connecting
to the database so that we can then later on insert data/extract data by using
the variables inside this file. do what's best */

 $serverName = "localhost";
 $dBUsername= "";
 $dBPassword = "";
 $dBName = "";
 
 $conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);
 
 #If connection fails,
 if (!$conn){
     die("Connection failed: ". mysqli_connect_error());
 }
 
 ?>