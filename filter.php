<?php  
 //filter.php  
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
      $connect = mysqli_connect("localhost", "root", "", "customer");  
      $output = '';  
      $query = "  
           SELECT * FROM customer  
           WHERE ddate BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'  
      ";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
           <table class="table table-bordered">  
                <tr>  
                     <th width="5%">Customer Name</th>  
                     <th width="30%">Company Name</th>  
                     <th width="43%">Phone Number</th>  
                     <th width="10%">Email</th>  
                     <th width="12%">Product</th>  
                     <th width="15%">Date</th>  
                     
                     
                </tr>  
      ';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>'. $row["cun"] .'</td>  
                          <td>'. $row["com"] .'</td>  
                          <td>'. $row["pn"] .'</td>  
                          <td> '. $row["email"] .'</td>  
                          <td>'. $row["prd"] .'</td> 
                          <td>'. $row["ddate"] .'</td> 
                          

                     </tr>  
                ';  
           }  
      }  
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="5">No Order Found</td>  
                </tr>  
           ';  
      }  
      $output .= '</table>';  
      echo $output;  
 }  
 ?>