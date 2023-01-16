           <?php   
          include "koneksi.php";
          header('Access-Control-Allow-Origin:*');
           $sql = 'SELECT * FROM pendaftaran';  
           $result = mysqli_query($koneksi, $sql);  
           $json_array = array();  
           while($row = mysqli_fetch_assoc($result))  
           {  
                $json_array[] = $row;  
           }  
           /*echo '<pre>';  
           print_r(json_encode($json_array));  
           echo '</pre>';*/  
           echo json_encode($json_array);  
           ?>  
     