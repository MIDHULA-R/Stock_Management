<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'products');

    if(isset($_POST['updatedata']))
    {   
        $id = $_POST['update_id'];
        
        $pname = $_POST['pname'];
        $pr = $_POST['pr'];
        $sa = $_POST['sa'];

        $query = "UPDATE products SET pname='$pname', pr='$pr', sa='$sa' WHERE id='$id'  ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:index.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>