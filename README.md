error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "Hello, World!";

try {
    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        throw new Exception($conn->connect_error);
    }
    echo "✅ Connection successful\n";
    $conn->close();
} catch (Exception $e) {
    echo "❌ Connection failed: " . $e->getMessage() . "\n";
}
