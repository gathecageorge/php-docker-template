<?php
include_once "vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();
?>

<?php // Get environment variables
$servername = "mysql";
$username   = $_ENV["DATABASE_USER"];
$password   = $_ENV["DATABASE_USER_PASSWORD"];
$database   = $_ENV["MYSQL_DATABASE"];
?>

<?php // PDO Database connection
try {
  $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "<h1>PDO Connected successfully</h1>";
  $conn = null;
} catch(PDOException $e) {
  echo "<h1>PDO Connection failed: " . $e->getMessage() . "</h1>";
}
?>

<hr>
<?php // MYSQLi Procedural connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
  echo "<h1>MYSQLi Procedural Connection failed: " . mysqli_connect_error() . "</h1>";
}else{
  echo "<h1>MYSQLi Procedural Connected successfully</h1>";
  mysqli_close($conn);
}
?>

<hr>
<?php // MYSQLi connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  echo "<h1>MYSQLi Connection failed: " . $conn->connect_error . "</h1>";
}else{
  echo "<h1>MYSQLi Connected successfully</h1>";
  $conn->close();
}
?>

<hr>
<?= phpinfo(); ?>