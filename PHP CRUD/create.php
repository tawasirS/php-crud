<?php
    if (isset($_POST['submit'])) {
      $Fname = $_POST['firstname'];
      $Lname = $_POST['lastname'];
      $Phone = $_POST['phone'];
      $Email = $_POST['email'];

      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "test";

      $conn = new mysqli($servername, $username, $password, $dbname);

      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "INSERT INTO `basic crud`(`name`, `lastname`, `phone number`, `email`) 
  VALUES ('$Fname','$Lname','$Phone','$Email')";

      if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

      $conn->close();
    }
    ?>