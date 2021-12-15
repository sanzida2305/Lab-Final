<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>

<?php

include_once("connection.php");

if(isset($_POST['update']))
{	
    $id = $_POST['id'];
	
    $name = $_POST['name'];
    $qty = $_POST['eml'];
    $price = $_POST['phn'];	
	
    // checking empty fields
    if(empty($name) || empty($eml) || empty($phn)) {				
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
		
        if(empty($eml)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }
		
        if(empty($phn)) {
            echo "<font color='red'>Phone field is empty.</font><br/>";
        }		
    } else {	
        
        $result = mysqli_query($mysqli, "UPDATE products SET name='$name', eml='$eml', phn='$phn' WHERE id=$id");
		
        
        header("Location: view.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];

$result = mysqli_query($mysqli, "SELECT * FROM products WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
    $name = $res['name'];
    $eml = $res['eml'];
    $phn = $res['phn'];
}
?>
<html>
<head>	
    <title>Edit Data</title>
</head>

<body>
    <a href="index.php">Home</a> | <a href="view.php">View Products</a> | <a href="logout.php">Logout</a>
    <br/><br/>
	
    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $name;?>"></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="text" name="qty" value="<?php echo $qty;?>"></td>
            </tr>
            <tr> 
                <td>Phone</td>
                <td><input type="text" name="price" value="<?php echo $price;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>