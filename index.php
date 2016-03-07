<!DOCTYPE HTML>
<head>
    <title>Projects</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<button type="button" onclick=window.parent.location.href='sign-in.php'>Login</button>
<?php
include('connect-db.php');

$project = $connection->query("SELECT id, pname, pdescp, url, pcontent FROM project");

if ($project->num_rows > 0) {
    // output data of each row
    while($row = $project->fetch_assoc()) {
        $id = $row["id"];
        echo '<h2>' . $row["pname"]  . '</h2>';
        $url = $row["url"];
        echo '<h3><a href =' . $url . '>' . $row["pdescp"] . '</a></h3>';
        $url = "";
        // ---------------------------------- people -------------------------------------
        $people = $connection->query("SELECT first_name, middle_name, last_name, url FROM people, people_project WHERE '$id' = people_project.project_id AND people_project.people_id = people.id");
        if ($people->num_rows > 0) {
            echo '<p>';
            while($prow = $people->fetch_assoc()) {
                $url = $prow["url"];
                if ($url != "") {
                    echo '<a href=' . $url. '>' . $prow["first_name"] . " " . $prow["middle_name"] . " " . $prow["last_name"] . '<a>' . ";   ";
                    $url = "";
                }
                else {
                    echo $prow["first_name"] . " " . $prow["middle_name"] . " " . $prow["last_name"] . ";   ";
                }
            }
            echo '</p>';
        }
        echo '<p>' . $row["pcontent"] . '</p>';
        // ---------------------------------- news ---------------------------------------
        $news = $connection->query("SELECT title, content FROM news, project_news WHERE '$id' = project_news.project_id AND project_news.news_id = news.id");
        if ($news->num_rows > 0) {
            while($nrow = $news->fetch_assoc()) {
                echo '<div class="news-title">News: ' . $nrow["title"] . '</div>';
                echo '<div class="news-content">'. $nrow["content"] . '</div>';
            }
        }
        // ---------------------------------- publication --------------------------------
        $publication = $connection->query("SELECT pub_name, pdate, url, award FROM publication, project_publish WHERE '$id' = project_publish.project_id AND project_publish.pub_id = publication.id");
        if ($publication->num_rows > 0) {
            echo '<div class="pub-title">Publications: </div>';
            echo '<ul>';
            while($prow = $publication->fetch_assoc()) {
                echo '<li">'. $prow["pub_name"] . ", " .  $prow["pdate"] . '</li>';
            }
            echo '</ul>';
        }
    }
} else {
    echo "0 results";
}

$connection->close();
?>
</body>
</html>
