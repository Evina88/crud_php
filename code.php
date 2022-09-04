<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_client']))
{
    $client_id = mysqli_real_escape_string($con, $_POST['delete_client']);

    $query = "DELETE FROM clients WHERE id='$client_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Client Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Client Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_client']))
{
    $client_id = mysqli_real_escape_string($con, $_POST['client_id']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $category = mysqli_real_escape_string($con, $_POST['caegory']);

    $query = "UPDATE clients SET last_name='$last_name',first_name='$first_name', email='$email', phone='$phone', category='$category' WHERE id='$client_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Client Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Client Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_client']))
{
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $category = mysqli_real_escape_string($con, $_POST['category']);

    $query = "INSERT INTO clients (last_name,first_name,email,phone,category) VALUES ('$last_name','$first_name','$email','$phone','$category')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Client Created Successfully";
        header("Location: client-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Client Not Created";
        header("Location: client-create.php");
        exit(0);
    }
}

?>