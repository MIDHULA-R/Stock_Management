<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'products');

if(isset($_POST['insertdata']))
{
    $pname = $_POST['pname'];
    $pr = $_POST['pr'];
    $sa = $_POST['sa'];

    $query = "INSERT INTO products (`pname`,`pr`,`sa`) VALUES ('$pname','$pr','$sa')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: index.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>