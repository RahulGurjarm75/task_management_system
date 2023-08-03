<?php
include "db_conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Level-2a Task</title>
   <!-- link css -->
   <link rel="stylesheet" type="text/css" href="style.css"/>
</head>

<body>
<nav class="navbar">
  <div class="container-fluid" style="justify-content: flex-end">
    <!-- <form class=""> -->
      <button class="btn btn-success m-2" type="submit"><a href=http://localhost/level2a/index.html">Home</a></button>
      <button class="btn btn-success m-2" type="submit"><a href="http://localhost/level2a/about.html">About</a></button>
    <!-- </form> -->
  </div>
</nav>

    <?php
    if (isset($_POST["search"])) {
    //$search = $_POST['search'];
    $searchText = $_POST['search'];
    }
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      echo '<div class="alert " role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <div class="form-group" style="display: flex;">   
    <div class="col">
    <a href="add-new.php" class="btn btn-success m-3" style="border-radius: 20px;">Add Student</a>
  </div>
  <form action="phpSearch.php" method="post">
		    <div class="col m-3" style="display: flex;">
		      <input type="text" class="form-control" style="border-radius: 20px;
    width: 288px;" name="search" placeholder="search here"> 
		      <button type="submit"  name="save" class="fa fa-search search"></button>
		    </div>
 
   </form>
   <!-- filter button -->
   <div>
   <button class="btn  m-3" onclick="myFunction()">Filter</button>
  </div>
		</div>

    <!-- filter -->
    <div class="container-fluid" id="myDIV" style="display: none;padding-left: 490px;" >
  <form action="filter.php" method="post">
<div class="col m-3" style="display: flex;">
   <select style="padding: 9px 15px;
  border-radius:20px;" class="custom-select" name="taskStatus">
  <option value="">Task Status</option>
  <option value="New">New</option>
  <option value="Pending">Pending</option>
  <option value="Completed">Completed</option>
  </select>&nbsp

  <label style="padding-top: 5px;">Date:</label>
			<input type="date" class="form-control" style="width: 206px;border-radius: 20px;" placeholder="Start"  name="date1" value="<?php echo isset($_POST['date1']) ? $_POST['date1'] : '' ?>" />
			<label style="padding-top: 5px;">To</label>
			<input type="date" class="form-control" style="width: 206px;border-radius: 20px;" placeholder="End"  name="date2" value="<?php echo isset($_POST['date2']) ? $_POST['date2'] : '' ?>"/>

		  <button type="Go"  name="save" class="btn btn-success btn-sm">Submit</button>
	 </div>
  </form>
  </div>
    <table class="table table-hover text-center">
      <thead class="table-light">
        <tr>
          <th scope="col">Sr.no</th>
          <th scope="col">Name<a href="asc_data.php"><i class="fa fa-long-arrow-up"></i></a><a href="desc_data.php"><i class="fa fa-long-arrow-down"></i></a></th>
          <th scope="col">Start Date<a href="asc_date.php"><i class="fa fa-long-arrow-up"></i></a><a href="desc_date.php"><i class="fa fa-long-arrow-down"></i></a></th>
          <th scope="col">Discription</th>
          <th scope="col">Task Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $search = $_POST['search'];
        
        $sql = "select * from task where Name like '%$search%' or Sdate like '%$search%'";
      // $x for sr no
        $x=0;
        $result = $conn->query($sql);
        while ($row = mysqli_fetch_assoc($result)) {
          $x++;
        ?>
           <tr>
            <td><?php echo $x ?></td>
            <td><?php echo $row["Name"] ?></td>
            <td><?php echo $row["Sdate"] ?></td>
            <td><?php echo $row["discription"] ?></td>
            
            <?php if($row["taskStatus"] == 'Completed') { ?>
            <td style="color:red"><?php echo $row["taskStatus"] ?></td>
           
            <?php } ?>
            <?php if($row["taskStatus"] == 'Pending') { ?>
            <td style="color:blue"><?php echo $row["taskStatus"] ?></td>
           
            <?php } ?>
            <?php if($row["taskStatus"] == 'New') { ?>
            <td style="color:green"><?php echo $row["taskStatus"] ?></td>
           
            <?php } ?>
            
              
            <td>
              <!-- page add perform -->
              <a href="edit.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
              <a href="delete.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
            </td>
          </tr>
          
        <?php
        }
        ?>
      </tbody>
      <!-- filter -->
     
    </table>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
 <!-- js file -->
<script src="script.js"></script>
</body>

</html>