<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "arsip_ptik_ukrida";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
    die('<script>console.log("Connection fail")</script>' . $conn->connect_error);
} 
echo '<script>console.log("Connection success")</script>';
?>