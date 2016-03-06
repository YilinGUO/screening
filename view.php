<!DOCTYPE HTML>
<head>
    <title>View Records</title>
</head>
<body>

<?php
// connect to the database
include('connect-db.php');

// ---------------------------- PEOPLE table -------------------------------
$result = mysqli_query($connection, "SELECT * FROM people")
or die(mysqli_error($connection));

// display data in table
echo "<p><b>PEOPLE</b></p>";

echo "<table border='1' cellpadding='10'>";
echo "<tr> <th>ID</th> <th>First Name</th> <th>Middle Name</th> <th>Last Name</th> <th>url</th><th></th> <th></th></tr>";

// loop through results of database query, displaying them in the table
while($row = mysqli_fetch_array( $result )) {

    // echo out the contents of each row into a table
    echo "<tr>";
    echo '<td>' . $row['id'] . '</td>';
    echo '<td>' . $row['first_name'] . '</td>';
    echo '<td>' . $row['middle_name'] . '</td>';
    echo '<td>' . $row['last_name'] . '</td>';
    echo '<td>' . $row['url'] . '</td>';
    echo '<td><a href="update.php?id=' . $row['id'] . '">Edit</a></td>';
    echo '<td><a href="remove.php?id=' . $row['id'] . '">Delete</a></td>';
    echo "</tr>";
}
echo "</table>";
?>
<p><a href="add.php">Add a new people record</a></p>

</body>
</html>