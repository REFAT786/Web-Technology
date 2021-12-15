<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "OSMS";

  $mysqli = new mysqli($servername, $username, $password, $dbname);
  if($mysqli->connect_error) {
    exit('Could not connect');
  }

  $sql = "SELECT id, username, password
  FROM employeeinfo WHERE username = ?";

  $stmt = $mysqli->prepare($sql);
  $stmt->bind_param("s", $_GET['q']);
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($id, $username, $password);
  $stmt->fetch();
  $stmt->close();

  echo "<table>";
  echo "<thead>";
  echo "<tr>";
  echo "<th>ID</th>";
  echo "<th>username</th>";
  echo "<th>password</th>";
  echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
  echo "<tr>";
  echo "<td>" . $id . "</td>";
  echo "<td>" . $username . "</td>";
  echo "<td>" . $password . "</td>";
  echo "</tr>";
  echo "</tbody>";

  echo "</table>";
?>