<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// MySQL database connection parameters
$hostname = "db"; // MySQL hostname (container name)
$username = "root"; // MySQL username
$password = ""; // MySQL password (empty for no password)
$database = "studentdb"; // MySQL database name

// Attempt to connect to MySQL database
$conn = mysqli_connect($hostname, $username, $password, $database);

// Check if connection was successful
if (mysqli_connect_errno()) {
    die("Database connection failed: " . mysqli_connect_error());
}

// SQL query to fetch data from the 'student' table
$sql = "SELECT * FROM student";

// Execute the SQL query
$result = mysqli_query($conn, $sql);

// debugging
//////var_dump($result);

// Check if query execution was successful
if (!$result) {
    die("Error executing query: " . mysqli_error($conn));
}

// Start HTML table to display data
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Name</th><th>Age</th><th>CGPA</th><th>Department</th></tr>";

// Fetch data from the result set and display it in HTML format
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['ID'] . "</td>";
    echo "<td>" . $row['Name'] . "</td>";
    echo "<td>" . $row['Age'] . "</td>";
    echo "<td>" . $row['CGPA'] . "</td>";
    echo "<td>" . $row['Department'] . "</td>";
    echo "</tr>";
}

// End HTML table
echo "</table>";

// Close the database connection
mysqli_close($conn);
?>
