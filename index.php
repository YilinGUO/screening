<!DOCTYPE HTML>
<head>
    <title>Projects</title>
</head>
<body>
<?php
include('connect-db.php');

$result = $connection->query("SELECT pname, pdescp, A.url, first_name, middle_name, last_name, pcontent FROM project A, people B, people_project C WHERE C.people_id = B.id AND C.project_id = A.id");

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["pname"] . " " . $row["pdescp"]. " " . $row["url"]. "<br>";
    }
} else {
    echo "0 results";
}

$connection->close();
?>
</body>
</html>
