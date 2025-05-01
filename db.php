<?php
// Enable full error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get credentials from environment
$host = getenv('DB_HOST');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');
$db   = getenv('DB_NAME');

// Verify all required variables are set
foreach (['DB_HOST', 'DB_USER', 'DB_PASS', 'DB_NAME'] as $var) {
    if (empty(getenv($var))) {
        die("❌ Error: Missing required environment variable: $var\n");
    }
}

try {
    echo "🔌 Attempting to connect to database...\n";
    echo "Host: $host\n";
    echo "User: $user\n";
    echo "Database: $db\n\n";
    
    $conn = new mysqli($host, $user, $pass, $db);
    
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
    
    echo "✅ Successfully connected to MySQL server!\n";
    echo "Server version: " . $conn->server_version . "\n\n";
    
    // Your database operations here...
    $result = $conn->query("SHOW TABLES");
    if ($result) {
        echo "📊 Tables in database:\n";
        while ($row = $result->fetch_array()) {
            echo "- " . $row[0] . "\n";
        }
    }
    
    $conn->close();
} catch (Exception $e) {
    file_put_contents('php://stderr', "❌ ERROR: " . $e->getMessage() . "\n");
    exit(1);
}
?>
