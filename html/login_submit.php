

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
  <li><a class="active" href="login_submit.php">pi Billing</a></li>
  <li><a class="hover" href="movies_watched.php">movies watched</a></li>
<li><a class="hover" href="switchboard.php">switchboard</a></li>
</ul>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
  <h2>pi Billing</h2>
  
<?php

$con=mysqli_connect("localhost","root","root","dtb_test");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM tbl_users");
if ($result==null){
header("Location: index.html");
exit();
}
else{
$result = mysqli_query($con,"SELECT * FROM tbl_piBilling");

echo "<table border='1'>
<tr>
<th>Serial</th>
<th>Days Running</th>
<th>Days Payed For</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['fld_serial'] . "</td>";
echo "<td>" . $row['fld_daysRunning'] . "</td>";
echo "<td>" . $row['fld_daysPayedFor'] . "</td>";
echo "</tr>";
}
echo "</table>";

}
mysqli_close($con);
?>
</div>

</body>
</html>


