<!DOCTYPE HTML>
<head>
    <title>View Records</title>
</head>
<body>
<!-- ---------------------------- PEOPLE table ------------------------------->
<?php
// connect to the database
include('connect-db.php');
$result = mysqli_query($connection, "SELECT * FROM people")
or die(mysqli_error($connection));

// display data in table
echo "<p><b>PEOPLE</b></p>";

echo "<table border='1' cellpadding='10'>";
echo "<tr> <th>ID</th> <th>First Name</th> <th>Middle Name</th> <th>Last Name</th> <th>URL</th><th></th> <th></th></tr>";

// loop through results of database query, displaying them in the table
while($row = mysqli_fetch_array( $result )) {

    // echo out the contents of each row into a table
    echo "<tr>";
    echo '<td>' . $row['id'] . '</td>';
    echo '<td>' . $row['first_name'] . '</td>';
    echo '<td>' . $row['middle_name'] . '</td>';
    echo '<td>' . $row['last_name'] . '</td>';
    echo '<td>' . $row['url'] . '</td>';
    echo '<td><a href="update_people.php?id=' . $row['id'] . '">Edit</a></td>';
    echo '<td><a href="remove_people.php?id=' . $row['id'] . '">Delete</a></td>';
    echo "</tr>";
}
echo "</table>";
?>
<p><a href="add_people.php">Add a PEOPLE record</a></p>

<!-- ---------------------------- NEWS table ------------------------------->
<?php
// connect to the database
include('connect-db.php');
$result = mysqli_query($connection, "SELECT * FROM news")
or die(mysqli_error($connection));

// display data in table
echo "<p><b>NEWS</b></p>";

echo "<table border='1' cellpadding='10'>";
echo "<tr> <th>ID</th> <th>Title</th> <th>Content</th><th></th> <th></th></tr>";

// loop through results of database query, displaying them in the table
while($row = mysqli_fetch_array( $result )) {

    // echo out the contents of each row into a table
    echo "<tr>";
    echo '<td>' . $row['id'] . '</td>';
    echo '<td>' . $row['title'] . '</td>';
    echo '<td>' . $row['content'] . '</td>';
    echo '<td><a href="update_news.php?id=' . $row['id'] . '">Edit</a></td>';
    echo '<td><a href="remove_news.php?id=' . $row['id'] . '">Delete</a></td>';
    echo "</tr>";
}
echo "</table>";
?>
<p><a href="add_news.php">Add a NEWS record</a></p>

<!-- ---------------------------- WEBSITE table ------------------------------->
<?php
// connect to the database
include('connect-db.php');
$result = mysqli_query($connection, "SELECT * FROM website")
or die(mysqli_error($connection));

// display data in table
echo "<p><b>WEBSITE</b></p>";

echo "<table border='1' cellpadding='10'>";
echo "<tr> <th>ID</th> <th>URL</th> <th></th> <th></th></tr>";

// loop through results of database query, displaying them in the table
while($row = mysqli_fetch_array( $result )) {

    // echo out the contents of each row into a table
    echo "<tr>";
    echo '<td>' . $row['id'] . '</td>';
    echo '<td>' . $row['url'] . '</td>';
    echo '<td><a href="update_website.php?id=' . $row['id'] . '">Edit</a></td>';
    echo '<td><a href="remove_website.php?id=' . $row['id'] . '">Delete</a></td>';
    echo "</tr>";
}
echo "</table>";
?>
<p><a href="add_website.php">Add a WEBSITE record</a></p>

<!-- ---------------------------- PROJECT table ------------------------------->
<?php
// connect to the database
include('connect-db.php');
$result = mysqli_query($connection, "SELECT * FROM project")
or die(mysqli_error($connection));

// display data in table
echo "<p><b>PROJECT</b></p>";

echo "<table border='1' cellpadding='10'>";
echo "<tr> <th>ID</th> <th>Name</th> <th>Description</th> <th>Content</th> <th>URL</th><th></th> <th></th></tr>";

// loop through results of database query, displaying them in the table
while($row = mysqli_fetch_array( $result )) {

    // echo out the contents of each row into a table
    echo "<tr>";
    echo '<td>' . $row['id'] . '</td>';
    echo '<td>' . $row['pname'] . '</td>';
    echo '<td>' . $row['pdescp'] . '</td>';
    echo '<td>' . $row['pcontent'] . '</td>';
    echo '<td>' . $row['url'] . '</td>';
    echo '<td><a href="update_project.php?id=' . $row['id'] . '">Edit</a></td>';
    echo '<td><a href="remove_project.php?id=' . $row['id'] . '">Delete</a></td>';
    echo "</tr>";
}
echo "</table>";
?>
<p><a href="add_project.php">Add a PROJECT record</a></p>

</body>
</html>