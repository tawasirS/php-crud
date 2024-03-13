<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>basic crud</title>
  <link rel="stylesheet" href="style.css">

</head>

<body>
  <div class="head">
    <h1>Basic CRUD</h1>
    <p>
      for practice PHP and My SQL
    </p>
  </div>

  <div class="raw-data">
  <h2>
    raw data
  </h2>
  <table class="table table-success">
    <thead>
      <tr>
        <th scope="col">name</th>
        <th scope="col">lastname</th>
        <th scope="col">phone number</th>
        <th scope="col">email</th>
      </tr>
    </thead>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM `basic crud`";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>";
        echo $row["name"];
        echo "</td>";
        echo "<td>";
        echo $row["lastname"];
        echo "</td>";
        echo "<td>";
        echo $row["phone number"];
        echo "</td>";
        echo "<td>";
        echo $row["email"];
        echo "</td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='3'>No data found.</td></tr>";
    }

    $conn->close();
    ?>
  </table>
  </div>
  
  <div class="create">
    <h2>C : create</h2>
    <form action="create.php" method="post" target="_parent"
      <div>
        <label class="form-label">firstname</label>
        <input type="text" name="firstname" placeholder="srisawat">

        <label class="form-label">lastname</label>
        <input type="text" name="lastname" placeholder="saosoong">

        <label class="form-label">phone number</label>
        <input type="phone" name="phone" placeholder="08X-XXX-XXXX">

        <label class="form-label">email</label>
        <input type="email" name="email" placeholder="AAA@email.com">
      <br>
      <button type="submit" name="submit">create</button>
    </form>
</div>
  </div>
  <div class="read">
    <form action="" method="post">
      <h2>R : read</h2>
      <h4>read where</h4>
      <select name="case" id="color">
        <option value="name">first name</option>
        <option value="lastname">last name</option>
        <option value="phone number">phone number</option>
        <option value="email">email</option>
      </select>
      <h4>is</h4>
      <input type="text" name="text">
      <button type="submit" name="submit">find</button>
    </form>

    <table class="table table-success">
    <thead>
      <tr>
        <th scope="col">name</th>
        <th scope="col">lastname</th>
        <th scope="col">phone number</th>
        <th scope="col">email</th>
      </tr>
    </thead>

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

      $sql = "SELECT * FROM `basic crud` WHERE `$case` = '$text'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>";
          echo $row["name"];
          echo "</td>";
          echo "<td>";
          echo $row["lastname"];
          echo "</td>";
          echo "<td>";
          echo $row["phone number"];
          echo "</td>";
          echo "<td>";
          echo $row["email"];
          echo "</td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='3'>No data found.</td></tr>";
      }

      $conn->close();
    }
    ?>
    </table>
  </div>
  <div class="update">
  <h2>U : update</h2>
  <form action="update.php" method="post">
      <h4>update where</h4>
      <select name="case" id="color">
        <option value="name">first name</option>
        <option value="lastname">last name</option>
        <option value="phone number">phone number</option>
        <option value="email">email</option>
      </select>
      <h4>is</h4>
      <input type="text" name="text">
      <h4>to</h4>
      <input type="text" name="change">
      <button type="submit" name="submit">update</button>
    </form>
  </div>
  <div class="delete">
  <h2>D : delete</h2>
  <form action="delete.php" method="post">
      <h4>delete where</h4>
      <select name="case" id="color">
        <option value="name">first name</option>
        <option value="lastname">last name</option>
        <option value="phone number">phone number</option>
        <option value="email">email</option>
      </select>
      <h4>is</h4>
      <input type="text" name="text">
      <button type="submit" name="submit">delete</button>
    </form>
  </div>
</body>

</html>