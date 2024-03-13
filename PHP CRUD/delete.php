<?php
    if (isset($_POST['submit'])) {
        $case = $_POST['case'];
        $text = $_POST['text'];

      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "test";

      $conn = new mysqli($servername, $username, $password, $dbname);

      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "DELETE FROM `basic crud`
      WHERE `$case` = '$text'";

      if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

      $conn->close();
    }
    ?>