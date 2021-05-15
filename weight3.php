<?php
$conn = mysqli_connect("localhost","root","");
$db = mysqli_select_db($conn,'weight');
 if(!$conn){
     die("Connection Failed:" .mysqli_connect_error());
 }
 if(isset($_POST['search']))
 {
     $txtStartDate=$_POST['txtStartDate'];
     $txtEndDate=$_POST['txtEndDate'];
     //$sql = "SELECT * FROM users";
//$result = mysqli_query($db, $sql) or die( mysqli_error($db));

     $query=mysqli_query($conn,"SELECT cun FROM customer Where ddate Between 'txtStartDate' and 'txtEndDate' order by ddate ");
     $count=mysqli_num_rows($query);
 }

?>
<!DOCTYPE html>
<html>
<head>
<title> CUSTOMER </title>
<center> <h1> Customer Report</h1></center>
<hr/>
</head>
<body>
<form method="post">
<br>
<br>
   <center> <label>From :</label><input type="date" name="txtStartDate">
    <label>To :<input type="date" name="txtEndDate">
    <p><input type="submit" name="search" value="Search Report...!!"></p>
    <?php
    if($count == "0")
    {
        echo '<h2>No Records Matched Ur Condition...Plz Recheck It!!</h2>';
    }
    else{
        while($row = mysqli_fetch_array($query))
        {
            $result=$row['cun'];
            $output='<h2>'. $result. '</h2>';
            echo $output;
                
        }
    }
    ?>
    </form>   
</center>           
</body>
</html>



