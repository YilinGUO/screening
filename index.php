<?php
include('connect-db.php');

$result = $connection->query("SELECT pname, pdescp, purl, first_name, last_name, pcontent FROM project, people,
  project_content WHERE project.people_id = people.people_id AND project.pcid = project_content.pcid");

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}

$connection->close();
?>