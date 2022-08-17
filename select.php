<?php
$connect = mysqli_connect("localhost", "root", "", "testmanu");
$output = '';
$sql = "SELECT * FROM clients ORDER BY id DESC";
$result = mysqli_query($connect, $sql);
$output .= '  
      <div class="table-responsive">  
           <table class="table">  
                <tr>  
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Adress</th>
                <th>Action</th>
                </tr>';
$rows = mysqli_num_rows($result);
if ($rows > 0) {
     if ($rows > 10) {
          $delete_records = $rows - 10;
          $delete_sql = "DELETE FROM clients LIMIT $delete_records";
          mysqli_query($connect, $delete_sql);
     }
     while ($row = mysqli_fetch_array($result)) {
          $output .= '  
                <tr>  
                     <td>' . $row["id"] . '</td>  
                     <td class="name" data-id1="' . $row["id"] . '" contenteditable>' . $row["name"] . '</td>  
                     <td class="email" data-id2="' . $row["id"] . '" contenteditable>' . $row["email"] . '</td> 
                     <td class="phone" data-id3="' . $row["id"] . '" contenteditable>' . $row["phone"] . '</td>  
                     <td class="address" data-id4="' . $row["id"] . '" contenteditable>' . $row["address"] . '</td>       
                     <td><button type="button" name="delete_btn" data-id5="' . $row["id"] . '" class="btn btn-xs btn-danger btn_delete">Delete</button></td>  
                </tr>  
           ';
     }
     $output .= '  
           <tr>  
                <td></td>  
                <td id="name" contenteditable></td>  
                <td id="email" contenteditable></td>  
                <td id="phone" contenteditable></td> 
                <td id="address" contenteditable></td> 
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">Add</button></td>  
           </tr>  
      ';
} else {
     $output .= '
				<tr>  
					<td></td>  
					<td id="name" contenteditable></td>  
					<td id="email" contenteditable></td> 
                         <td id="phone" contenteditable></td> 
                         <td id="address" contenteditable></td> 
					<td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">Add</button></td>  
			   </tr>';
}
$output .= '</table>  
      </div>';
echo $output;
