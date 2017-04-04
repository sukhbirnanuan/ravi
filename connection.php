<?PHP

$conn =mysqli_connect("gator4107","nagendra_mission","mission12345","nagendra_contactform1");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM contacts";
$allcontacts = $conn->query($sql);

?>