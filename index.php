<?php
require_once 'vendor/autoload.php';
$faker = Faker\Factory::create();
echo "<h1>Some fake text</h1>";
echo $faker->text();
echo "<hr>";
?>

<?php // Get environment variables
$servername = getenv("MYSQL_HOST");
$username   = getenv("DATABASE_USER");
$password   = getenv("DATABASE_USER_PASSWORD");
$database   = getenv("MYSQL_DATABASE");
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