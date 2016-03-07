<!DOCTYPE HTML>
<head>
    <title>Projects</title>
</head>
<body>
<?php
include('connect-db.php');

$result = $connection->query("SELECT id, pname, pdescp, url, pcontent FROM project");

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $id = $row["id"];
        echo $row["pname"]  . "<br>";
        $people = $connection->query("SELECT first_name, middle_name, last_name FROM people, people_project WHERE '$id' = people_project.project_id AND people_project.people_id = people.id");
        while($prow = $people->fetch_assoc()) {
            echo $prow["first_name"] . " " . $prow["middle_name"] . " " . $prow["last_name"] . " ";
        }
        echo "<br>";
        echo $row["pdescp"]. "<br>";
        echo $row["url"]. "<br>";
        echo $row["pcontent"]. "<br>";
    }
} else {
    echo "0 results";
}

$connection->close();
?>
</body>
</html>
