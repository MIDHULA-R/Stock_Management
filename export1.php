<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "test4");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM registration";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                    <th>FIRSTNAME</th>  
                    <th>lASTNAME</th>  
                    <th>GENDER</th>  
  <th>NUMBER</th>
  <th>EMAIL</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["firstName"].'</td>  
                         <td>'.$row["lastName"].'</td>  
                         <td>'.$row["gender"].'</td>  
       <td>'.$row["number"].'</td>  
       <td>'.$row["email"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?>