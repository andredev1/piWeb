
<!DOCTYPE html>
<html>
<head>
<style>
body {
  margin: 0;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 25%;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

li a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

li a.active {
  background-color: #4CAF50;
  color: white;
}

li a:hover:not(.active) {
  background-color: #555;
  color: white;
}
</style>
</head>
<body>
<ul>
  <li><a class="hover" href="login_submit.php">pi Billing</a></li>
  <li><a class="active" href="movies_watched.php">movies watched</a></li>
<li><a class="hover" href="switchboard.php">switchboard</a></li>
</ul>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
  <h2>movies Watched</h2>
  
<?php
$con=mysqli_connect("localhost","root","root","dtb_test");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM tbl_moviePlayCount");


echo "<table border='1'>
<tr>
<th>play Count</th>
<th>file Name</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['fld_playCount'] . "</td>";
echo "<td>" . $row['fld_fileName'] . "</td>";
echo "</tr>";
}
echo "</table>";


mysqli_close($con);
?>
</div>

</body>
</html>


