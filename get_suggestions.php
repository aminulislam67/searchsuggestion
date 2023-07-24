<?php
$servername = "127.0.0.1:3307";
$username = "root"; 
$password = ""; 
$dbname = "search";

$q = $_GET["q"];
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name FROM players WHERE name LIKE '%$q%'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p>" . $row["name"] . "</p>";
    }
} else {
    echo "<p>No suggestions found</p>";
}
$conn->close();
?>
