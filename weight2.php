<?php
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'weight');
                if(!$connection)
                {
                    die("Connection Failed:" .mysqli_connect_error());
                }
               if(isset($_POST['search']))
               { 
                $txtStartDate=$_POST['txtStartDate'];
                $txtEndDate=$_POST['txtEndDate'];
                $query = mysqli_query($connection,"SELECT * FROM customer where ddate Between 'txtStartDate' and 'txtEndDate' order by ddate");
                $count=mysqli_num_rows($query);
               }
            ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> CUSTOMER </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
   <center> <h1> Customer Report</h1></center>
    
</head>
<body>
<form method="post">
   <center> <input type="date" name="txtStartDate">
    <input type="date" name="txtEndDate">
    <h3><input type="submit" name="search" value="Search Report...!!"></h3></center>

<?php
if($count < "0")
{
    echo '<h2> No Report Found Under The Condition...Please Check Again !!</h2>';
}
else{
    while($row = mysqli_fetch_array($query))
    {
                      
                              echo $row['cun'];                              
                             echo $row['com'];                              
                              echo $row['pn'];  
                             echo $row['email'];                              
                              echo $row['prd'];                           
                              echo $row['ddate'];                                                      
                                }
            }
            ?>
</form>              
</body>
</html>

