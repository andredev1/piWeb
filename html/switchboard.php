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
  <li><a class="hover" href="movies_watched.php">movies watched</a></li>
<li><a class="active" href="switchboard.php">switchboard</a></li>
</ul>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
  <h2>switchboard</h2>
  
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
$result = mysqli_query($con,"SELECT fld_serial,(fld_daysPayedFor-fld_daysRunning) as daysLeft FROM tbl_piBilling");

echo "<table border='1'>
<tr>
<th>Serial</th>
<th>Days behind in payment</th>
</tr>";

$rowCount=0;
while($row = mysqli_fetch_array($result))
{
$rowCount++;
echo "<tr>";
echo "<td>" . $row['fld_serial'] . "</td>" ;
echo "<td>" . $row['daysLeft'] . "</td>";
 
echo "</tr>";
}
echo "</table>";
$loopIteration=0;
while($loopIteration<$rowCount){
$loopIteration++;
echo "toggle switch </br>";
}
}
mysqli_close($con);

if (isset($_POST['submit'])) {
	if (isset($_POST['user-out']) && $_POST['user-out'] == '1') { // if checkbox value is 1

		/*
		UPDATE database, set 1 to user-out
		if you want to update user-out to be 0 after unsubscribe you can remove $_POST['user-out'] and set it to 0 manually in code
		*/
		$insert['ID'] = Mysql::SQLValue('');
        $insert['user_name'] = Mysql::SQLValue($_POST['user-name']);
        $insert['user_email'] = Mysql::SQLValue($_POST['user-email']);
        $insert['user_out'] = Mysql::SQLValue($_POST['user-out']);	// instead of $_POST['user-out'] put '0'
        if (!$db->insertRow('subscribers', $insert)) {
            $user_message = '<p class="alert alert-danger">' . $db->error() . '<br>' . $db->getLastSql() . '</p>' . "\n";
        } else {
            $user_message = '<p class="alert alert-success">Thanks for subscribing!</p>' . "\n";
            Form::clear('newsletter-suscribe-form');
        }
	}
}
?>
</div>

</body>
</html>




