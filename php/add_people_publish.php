<?php
/*
 NEW.PHP
 Allows user to create a new entry in the database
*/

// creates the new record form
// since this form is used multiple times in this file, I have made it a function that is easily reusable
function renderForm($people_id, $pub_id, $error)
{
    ?>
    <!DOCTYPE HTML>
    <html>
    <head>
        <title>New Record</title>
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

// check if the form has been submitted. If it has, start to process the form and save it to the database
if (isset($_POST['submit']))
{
    // get form data, making sure it is valid
    $people_id = mysqli_real_escape_string($connection, htmlspecialchars($_POST['people_id']));
    $pub_id = mysqli_real_escape_string($connection, htmlspecialchars($_POST['pub_id']));

    // check to make sure both fields are entered
    if ($people_id == '' || $pub_id == '')
    {
        // generate error message
        $error = 'ERROR: Please fill in all required fields!';

        // if either field is blank, display the form again
        renderForm($people_id, $pub_id, $error);
    }
    else
    {
        $result = mysqli_query($connection, "SELECT * FROM people WHERE id=$people_id") or die (mysqli_error($connection));
        $result2 = mysqli_query($connection, "SELECT * FROM publication WHERE id=$pub_id") or die (mysqli_error($connection));
        $result3 = mysqli_query($connection, "SELECT * FROM people_publish WHERE pub_id=$pub_id AND people_id=$people_id") or die (mysqli_error($connection));
        if (!$result->num_rows) {
             $error = 'No related person in the database!';
             renderForm($people_id, $pub_id, $error);
        }

        else if (!$result2->num_rows) {
             $error = 'No related publication in the database!';
             renderForm($people_id, $pub_id, $error);
        }
        else if ($result3->num_rows) {
            $error = 'Record already exists!';
            renderForm($people_id, $pub_id, $error);
        }
        else {
            // save the data to the database
            mysqli_query($connection, "INSERT INTO people_publish(people_id, pub_id) VALUES ('$people_id', '$pub_id')")
            or die(mysqli_error($connection));

            // once saved, redirect back to the view page
            header("Location: ../view.php");
        }
    }
}
else
    // if the form hasn't been submitted, display the form
{
    renderForm('','','');
}
?>