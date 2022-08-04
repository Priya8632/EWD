<?php

include 'config.php';

// search
if(isset($_POST['input'])){

    $input = $_POST['input'];
    $query = "SELECT * FROM users WHERE firstName LIKE '%$input%' OR lastName LIKE '%$input%' OR Email LIKE '%$input%'";
    $result = mysqli_query($conn,$query);
    $data = mysqli_num_rows($result);
    if($data > 0 )
    { 
        
        ?>

        <table class="table table-hover">
          <thead class="table table-dark">
            <tr>
              <th>ID</th>
              <th>FNAME</th>
              <th>LNAME</th>
              <th>EMAIL</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            
            while($row = mysqli_fetch_assoc($result)){

                $id = $row['id'];
                $fname = $row['firstName'];
                $lname = $row['lastName'];
                $email = $row['Email'];

                ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $fname; ?></td>
                <td><?php echo $lname; ?></td>
                <td><?php echo $email; ?></td>
            </tr>

                <?php
            }        
        ?>
          </tbody>
        </table>
<?php

    }else{
        echo "<h6 class='text-danger text-center mt-3'>no data founds</h6>";
    }
}
?>