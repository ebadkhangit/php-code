<?php
 $userName = $pass = $gender = $displayName = $email = $mobile = $tblerror = $messg =  "";
 $userName=ucwords(stripslashes(trim($_POST['userName'])));  
    $pass=stripslashes(trim($_POST['pass']));  
	
$username=test_input($_POST['username']);
$password=test_input($_POST['password']);

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// select
$stmt = $conn->prepare("SELECT * FROM user_login WHERE user_password = ? AND user_name = ? ");
$stmt->bind_param("ss", $hasPass,$username);
 $stmt->execute();
$result = $stmt->get_result();   
if($result->num_rows === 0) exit('No rows found');
if ($result->num_rows > 0) {
$arrlogin = $result->fetch_assoc();
$_SESSION['login_user_id']=$arrlogin['user_id']; 
}
// insert data
$stmt = $conn->prepare("INSERT INTO user_login (user_name,user_password,forget_password,display_name,user_pic,user_emailid,user_mobile,user_status,created_by) VALUES (?,?,?,?,?,?,?,?,?)");
 $stmt->bind_param('sssssssss',$userName,$pass_md5,$pass,$displayName,$imgpath,$email,$mobile,$userstatus,$login_user_id);
$returnn = $stmt->execute();
   
if ($returnn>0) {  
mail send;
}

// update data
$stmt = $conn->prepare("update user_login set user_name=?, user_password=?,forget_password=?,display_name=?, user_emailid=?, user_mobile=? where user_id=? ");
 $stmt->bind_param('sssssss',$userName,$pass_md5,$pass,$displayName,$email,$mobile,$uid);
$returnn = $stmt->execute();
   if ($returnn>0) {  
   }

// prepare and bind
$stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $firstname, $lastname, $email);

// set parameters and execute
$firstname = "John";
$lastname = "Doe";
$email = "john@example.com";
$stmt->execute();



echo "New records created successfully";

$stmt->close();
$conn->close();

// prapared stmt

$stmt = $mysqli->prepare("SELECT * FROM myTable WHERE name = ? AND age = ?");
$stmt->bind_param("si", $_POST['name'], $_POST['age']);
$stmt->execute();
//fetching result would go here, but will be covered later
$stmt->close();

//Insert, Update and Delete


//Insert
$stmt = $mysqli->prepare("INSERT INTO myTable (name, age) VALUES (?, ?)");
$stmt->bind_param("si", $_POST['name'], $_POST['age']);
$stmt->execute();
$stmt->close();

//Update
$stmt = $mysqli->prepare("UPDATE myTable SET name = ? WHERE id = ?");
$stmt->bind_param("si", $_POST['name'], $_SESSION['id']);
$stmt->execute();
$stmt->close();

//Delete
$stmt = $mysqli->prepare("DELETE FROM myTable WHERE id = ?");
$stmt->bind_param("i", $_SESSION['id']);
$stmt->execute();
$stmt->close();

//Get Number of Affected Rows
$stmt = $mysqli->prepare("UPDATE myTable SET name = ?");
$stmt->bind_param("si", $_POST['name'], $_POST['age']);
$stmt->execute();
if($stmt->affected_rows === 0) exit('No rows updated');
$stmt->close();

//Get Latest Primary Key Inserted
$stmt = $mysqli->prepare("INSERT INTO myTable (name, age) VALUES (?, ?)");
$stmt->bind_param("si", $_POST['name'], $_POST['age']);
$stmt->execute();
echo $mysqli->insert_id;
$stmt->close();
// fetch all records
$stmt = $mysqli->prepare("SELECT * FROM myTable WHERE name = ?");
$stmt->bind_param("s", $_POST['name']);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows === 0) exit('No rows');
while($row = $result->fetch_assoc()) {
  $ids[] = $row['id'];
  $names[] = $row['name'];
  $ages[] = $row['age'];
}
var_export($ages);
$stmt->close();

// select data
$stmt = $mysqli->prepare("SELECT id, name, age FROM myTable WHERE name = ?");
$stmt->bind_param("s", $_POST['name']);
$stmt->execute();
$stmt->store_result();
if($stmt->num_rows === 0) exit('No rows');
$stmt->bind_result($idRow, $nameRow, $ageRow); 
while($stmt->fetch()) {
  $ids[] = $idRow;
  $names[] = $nameRow;
  $ages[] = $ageRow;
}
var_export($ids);
$stmt->close();

//[106, 221, 3, 55, 583, 72]

// select
$arr = [];
$stmt = $mysqli->prepare("SELECT id, name, age FROM myTable WHERE name = ?");
$stmt->bind_param("s", $_POST['name']);
$stmt->execute();
$result = $stmt->get_result();
while($row = $result->fetch_assoc()) {
  $arr[] = $row;
}
if(!$arr) exit('No rows');
var_export($arr);
$stmt->close();

output
[
  ['id' => 27, 'name' => 'Jessica', 'age' => 27], 
  ['id' => 432, 'name' => 'Jimmy', 'age' => 19]
]

// select
$arr = [];
$stmt = $mysqli->prepare("SELECT location, favorite_color, age FROM myTable WHERE name = ?");
$stmt->bind_param("s", $_POST['name']);
$stmt->execute();
$result = $stmt->get_result();
while($row = $result->fetch_row()) {
  $arr[] = $row;
}
if(!$arr) exit('No rows');
var_export($arr);
$stmt->close();
[
  ['Boston', 'green', 28], 
  ['Seattle', 'blue', 49],
  ['Atlanta', 'pink', 24]
]

// select single row
$stmt = $mysqli->prepare("SELECT id, name, age FROM myTable WHERE name = ?");
$stmt->bind_param("s", $_POST['name']);
$stmt->execute();
$stmt->store_result();
if($stmt->num_rows === 0) exit('No rows');
$stmt->bind_result($id, $name, $age);
$stmt->fetch();
echo $name; //Output: 'Ryan'
$stmt->close();

$stmt = $mysqli->prepare("SELECT id, name, age FROM myTable WHERE name = ?");
$stmt->bind_param("s", $_POST['name']);
$stmt->execute();
$arr = $stmt->get_result()->fetch_assoc();
if(!$arr) exit('No rows');
var_export($arr);
$stmt->close();
['id' => 36, 'name' => 'Kevin', 'age' => 39]

// like search
$stmt = $mysqli->prepare("SELECT id, name, age FROM myTable WHERE Name LIKE %?%"); 

$search = "%{$_POST['search']}%";
$stmt = $mysqli->prepare("SELECT id, name, age FROM myTable WHERE name LIKE ?"); 
$stmt->bind_param("s", $search);
$stmt->execute();
$arr = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
if(!$arr) exit('No rows');
var_export($arr);
$stmt->close();

// search array
$inArr = [12, 23, 44];
$clause = implode(',', array_fill(0, count($inArr), '?')); //create 3 question marks
$types = str_repeat('i', count($inArr)); //create 3 ints for bind_param
$stmt = $mysqli->prepare("SELECT id, name FROM myTable WHERE id IN ($clause)");
$stmt->bind_param($types, ...$inArr);
$stmt->execute();
$resArr = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
if(!$resArr) exit('No rows');
var_export($resArr);
$stmt->close();

$inArr = [12, 23, 44];
$clause = implode(',', array_fill(0, count($inArr), '?')); //create 3 question marks
$types = str_repeat('i', count($inArr)); //create 3 ints for bind_param
$stmt = $mysqli->prepare("SELECT id, name FROM myTable WHERE id IN ($clause)");
$stmt->bind_param($types, ...$inArr);
$stmt->execute();
$resArr = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
if(!$resArr) exit('No rows');
var_export($resArr);
$stmt->close();
$inArr = [12, 23, 44];
$clause = implode(',', array_fill(0, count($inArr), '?')); //create 3 question marks
$types = str_repeat('i', count($inArr)); //create 3 ints for bind_param
$stmt = $mysqli->prepare("SELECT id, name FROM myTable WHERE id IN ($clause)");
$stmt->bind_param($types, ...$inArr);
$stmt->execute();
$resArr = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
if(!$resArr) exit('No rows');
var_export($resArr);
$stmt->close();

$inArr = [12, 23, 44];
$clause = implode(',', array_fill(0, count($inArr), '?')); //create 3 question marks
$types = str_repeat('i', count($inArr)); //create 3 ints for bind_param
$stmt = $mysqli->prepare("SELECT id, name FROM myTable WHERE id IN ($clause)");
$stmt->bind_param($types, ...$inArr);
$stmt->execute();
$resArr = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
if(!$resArr) exit('No rows');
var_export($resArr);
$stmt->close();

//With Other Placeholders
$inArr = [12, 23, 44];
$clause = implode(',', array_fill(0, count($inArr), '?')); //create 3 question marks
$types = str_repeat('i', count($inArr)); //create 3 ints for bind_param
$types .= 'i'; //add 1 more int type
$fullArr = array_merge($inArr, [26]); //merge WHERE IN array with other value(s)
$stmt = $mysqli->prepare("SELECT id, name FROM myTable WHERE id IN ($clause) AND age > ?");
$stmt->bind_param($types, ...$fullArr); //4 placeholders to bind
$stmt->execute();
$resArr = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
if(!$resArr) exit('No rows');
var_export($resArr);
$stmt->close();

//Multiple Prepared Statements in Transactions 





?>