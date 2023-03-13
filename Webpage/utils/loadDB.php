<?php
    // Create database connection.
    $config = parse_ini_file(dirname(__FILE__) . '\\..\\others\\db-config.ini'); // Update before pushing
    $conn = new mysqli($config['servername'], $config['username'],
        $config['password'], $config['dbname']);
    // Check connection
    if ($conn->connect_error)
    {
        $errorMsg = "Connection failed: " . $conn->connect_error;
        $success = false;
    }
    $success = true;
?>