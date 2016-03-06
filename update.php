<?php
/*
 EDIT.PHP
 Allows user to edit specific entry in database
*/

// creates the edit record form
// since this form is used multiple times in this file, I have made it a function that is easily reusable
function renderForm($id, $firstname, $middlename, $lastname, $url, $error)
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
            <p><strong>ID:</strong> <?php echo $id; ?></p>
            <strong>First Name: *</strong> <input type="text" name="first_name" value="<?php echo $firstname; ?>"/><br/>
            <strong>Middle Name: </strong> <input type="text" name="middle_name" value="<?php echo $middlename; ?>"/><br/>
            <strong>Last Name: *</strong> <input type="text" name="last_name" value="<?php echo $lastname; ?>"/><br/>
            <strong>url: </strong> <input type="text" name="url" value="<?php echo $url; ?>"/><br/>
            <p>* Required</p>
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
        $firstname = mysqli_real_escape_string($connection, htmlspecialchars($_POST['first_name']));
        $middlename = mysqli_real_escape_string($connection, htmlspecialchars($_POST['middle_name']));
        $lastname = mysqli_real_escape_string($connection, htmlspecialchars($_POST['last_name']));
        $url = mysqli_real_escape_string($connection, htmlspecialchars($_POST['url']));

        // check that firstname/lastname fields are both filled in
        if ($firstname == '' || $lastname == '')
        {
            // generate error message
            $error = 'ERROR: Please fill in all required fields!';

            //error, display form
            renderForm($id, $firstname, $middlename, $lastname, $error);
        }
        else
        {
            // save the data to the database
            mysqli_query($connection, "UPDATE people SET first_name='$firstname', middle_name = '$middlename', last_name='$lastname', url='$url' WHERE id='$id'")
            or die(mysqli_error($connection));

            // once saved, redirect back to the view page
            header("Location: view.php");
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
        $result = mysqli_query($connection, "SELECT * FROM people WHERE id=$id")// TODO
        or die(mysqli_error($connection));
        $row = mysqli_fetch_array($result);

        // check that the 'id' matches up with a row in the databse
        if($row)
        {

            // get data from db
            $firstname = $row['first_name'];
            $middlename = $row['middle_name'];
            $lastname = $row['last_name'];
            $url = $row['url'];

            // show form
            renderForm($id, $firstname, $middlename, $lastname, $url, '');
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