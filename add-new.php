<?php
include "db_conn.php";

if (isset($_POST["submit"])) {
   $Name = $_POST['Name'];
   $Sdate= $_POST['Sdate'];
   $taskStatus = $_POST['taskStatus'];
   $discription = $_POST['discription'];

   $sql = "INSERT INTO `task`(`id`, `Name`, `Sdate`,`taskStatus`,`discription`) VALUES (NULL,'$Name','$Sdate','$taskStatus','$discription')";

   $result = mysqli_query($conn, $sql);

   if ($result) {
      header("Location: index.php?msg=New record created successfully");
   } else {
      echo "Failed: " . mysqli_error($conn);
   }
}
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

   <title>Lavel 2A Task</title>
    <!-- link css -->
  <link rel="stylesheet" type="text/css" href="style.css"/>
</head>

<body>
<nav class="navbar">
  <div class="container-fluid" style="justify-content: flex-end">
    <!-- <form class=""> -->
      <button class="btn btn-success m-2" type="submit"><a href="http://localhost/level2a/index.html">Home</a></button>
      <button class="btn btn-success m-2" type="submit"><a href="http://localhost/level2a/about.html">About</a></button>
    <!-- </form> -->
  </div>
</nav>

   <div class="container">
      <div class="text-center mb-4">
         <h3>Add New Student Data</h3>
         <p class="text-muted">Complete the form below to add a new user</p>
      </div>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Name:</label>
                  <input type="text" class="form-control" name="Name" placeholder="Name" required>
               </div>

               <div class="col">
                  <label class="form-label">Start Date:</label>
                  <input type="date" class="form-control" name="Sdate" placeholder="Start Date" required>
               </div>
            </div>

     <select name="taskStatus" style="width: 309px; height: 37px; border-radius: 5px;" required>
  <option value="">Task Status</option>
  <option value="New">New</option>
  <option value="Pending">Pending</option>
  <option value="Completed">Completed</option>
</select>


            <div class="col">
                  <label class="form-label my-1">Discription:</label>
                  <input type="text-aria" class="form-control my-1" name="discription" placeholder="Write Discription" required>
               </div>
            <div>
               <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="index.php" class="btn btn-danger">Cancel</a>
            </div>
         </form>
      </div>
   </div>

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
   <!-- js file -->
<script src="script.js"></script>
</body>

</html>