<?php
/*
 NEW.PHP
 Allows user to create a new entry in the database
*/

// creates the new record form
// since this form is used multiple times in this file, I have made it a function that is easily reusable
function renderForm($name, $descp, $content, $url, $error)
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
            <strong>Name: *</strong> <input type="text" name="name" value="<?php echo $name; ?>" /><br/>
            <strong>Description: </strong> <input type="text" name="descp" value="<?php echo $descp; ?>" /><br/>
            <strong>Content: *</strong> <input type="text" name="content" value="<?php echo $content; ?>" /><br/>
            <strong>URL: </strong> <input type="text" name="url" value="<?php echo $url; ?>" /><br/>
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
    $name = mysqli_real_escape_string($connection, htmlspecialchars($_POST['name']));
    $descp = mysqli_real_escape_string($connection, htmlspecialchars($_POST['descp']));
    $content = mysqli_real_escape_string($connection, htmlspecialchars($_POST['content']));
    $url = mysqli_real_escape_string($connection, htmlspecialchars($_POST['url']));


    // check to make sure both fields are entered
    if ($name == '' || $content == '')
    {
        // generate error message
        $error = 'ERROR: Please fill in all required fields!';

        // if either field is blank, display the form again
        renderForm($name, $descp, $content, $url, $error);
    }
    else
    {
        // save the data to the database
        mysqli_query($connection, "INSERT INTO project(pname, pdescp, pcontent, url) VALUES ('$name', '$descp', '$content', '$url')")
        or die(mysqli_error($connection));

        // once saved, redirect back to the view page
        header("Location: ../view.php");
    }
}
else
    // if the form hasn't been submitted, display the form
{
    renderForm('','','','','');
}
?>