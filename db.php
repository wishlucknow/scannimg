<?php
// $conn= mysqli_connect("localhost","root","","famillytree");
$conn = mysqli_connect("localhost","u800183464_familyhub","Nf1US9:b*","u800183464_familyhub");
?>                                      

<?php
$host = getenv('DB_HOST') ?: 'localhost';
$user = getenv('DB_USER') ?: 'u800183464_familyhub';
$pass = getenv('DB_PASSWORD') ?: 'Nf1US9:b*';
$db = getenv('DB_NAME') ?: 'test_db';

try {
    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully!";
    // Your database operations here
    $conn->close();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
