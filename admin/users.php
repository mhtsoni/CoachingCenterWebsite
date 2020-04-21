<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<?php
include 'database.php';
if($_POST){
$query="SELECT*FROM login WHERE username LIKE '$_POST[username]'";
$ans=mysqli_query($link,$query);
if($row=mysqli_fetch_array($ans)){
if(md5(md5($row['id']).$_POST['password'])==$row['password']){
    
include 'database.php';
$query="SELECT*FROM users";
$row=mysqli_query($link,$query);
$table=mysqli_fetch_all($row);
echo"
<table>
    <tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone No</th>
<th>Course</th>
    </tr>";
    for($i=0;$i<count($table);$i++){
    echo "<tr><td><form  action='delete.php' method='post'><button id='form1' type='submit' name='id' value=".$table[$i][0].">DELETE $i</button></form></td>";for($j=1;$j<5;$j++){
    echo "<td>".$table[$i][$j]."</td>";
    }echo "</tr>";
    }
}
    
    else{
        echo "<h1>Incorrect Username Or Password</h1>";
    }
}
}
    ?>