<?php
function renderForm($id, $people_id, $pub_id, $error)
{
    ?>
    <!DOCTYPE HTML>
    <html>
    <head>
        <title>Edit Record</title>
    </head>
    <body>
    <?php
    // if there are any errors, display them
    if ($error != '')
    {
        echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
    }
    ?>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
        <div>
            <strong>People_id: *</strong> <input type="text" name="people_id" value="<?php echo $people_id; ?>" /><br/>
            <strong>Publication_id: *</strong> <input type="text" name="pub_id" value="<?php echo $pub_id; ?>" /><br/>
            <p>* required</p>
            <input type="submit" name="submit" value="Submit">
        </div>
    </form>
    </body>
    </html>
    <?php
}



// connect to the database
include('connect-db.php');

// check if the form has been submitted. If it has, process the form and save it to the database
if (isset($_POST['submit']))
{
    // confirm that the 'id' value is a valid integer before getting the form data
    if (is_numeric($_POST['id']))
    {
        // get form data, making sure it is valid
        $id = $_POST['id'];
        $people_id = mysqli_real_escape_string($connection, htmlspecialchars($_POST['people_id']));
        $pub_id = mysqli_real_escape_string($connection, htmlspecialchars($_POST['pub_id']));


        // check to make sure both fields are entered
        if ($people_id == '' || $pub_id == '')
        {
            // generate error message
            $error = 'ERROR: Please fill in all required fields!';

            // if either field is blank, display the form again
            renderForm($id, $people_id, $pub_id, $error);
        }
        else
        {
            $result = mysqli_query($connection, "SELECT * FROM people WHERE id=$people_id") or die (mysqli_error($connection));
            $result2 = mysqli_query($connection, "SELECT * FROM publication WHERE id=$pub_id") or die (mysqli_error($connection));
            if (!$result->num_rows) {
                $error = 'No related person in the database!';
                renderForm($id, $people_id, $pub_id, $error);
            }

            else if (!$result2->num_rows) {
                $error = 'No related publication in the database!';
                renderForm($id, $people_id, $pub_id, $error);
            }
            else {
                // save the data to the database
                mysqli_query($connection, "UPDATE people_publish SET people_id = '$people_id', pub_id = '$pub_id' WHERE id = '$id'")
                or die(mysqli_error($connection));

                // once saved, redirect back to the view page
                header("Location: ../view.php");
            }
        }
    }
    else
    {
        // if the 'id' isn't valid, display an error
        echo 'Error!';
    }
}
else
    // if the form hasn't been submitted, get the data from the db and display the form
{

    // get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)
    if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
    {
        // query db
        $id = $_GET['id'];
        $result = mysqli_query($connection, "SELECT * FROM people_publish WHERE id=$id")// TODO
        or die(mysqli_error($connection));
        $row = mysqli_fetch_array($result);

        // check that the 'id' matches up with a row in the databse
        if($row)
        {

            // get data from db
            $people_id = $row['people_id'];
            $pub_id = $row['pub_id'];

            // show form
            renderForm($id, $people_id, $pub_id, '');
        }
        else
            // if no match, display result
        {
            echo "No results!";
        }
    }
    else
        // if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error
    {
        echo 'Error!';
    }
}
?>