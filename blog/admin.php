<?php include('server.php'); ?>

<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM article WHERE id=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$name = $n['name'];
			$address = $n['address'];
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet"href="style.css">

<body>
<style>
	body{
		margin: 0px;
		border: 0px;
		}
		#header{
			width:100%;
			height:120px;
			background:black;
			color:white;
			}
			#sidebar{
				width:300px;
				height:400px;
				background:#27ae60;
				float:left;
				}
				#post{
					height:700px;
					background:#c0392b;
					}
					#logo{
						background:white;
						
						}
						ul li{
							padding:20px;
							border-bottom:2px solid grey;
							}
							ul li:hover{
								background:#c0392b;
								color:white;
								}
</style>
</head>
<div id="header">
<center><img src="admin.png" alt="logo" id="logo"><br>This is Admin Panel,Please proceed with caution!
</center>
</div>
<div id="sidebar">
<ul>
<li>Add Post</li>
<li>Delete Post</li>
<li>Update Post</li>
<a href="https://wwww.facebook.com" target="_blank" style="color:black;text-decoration:none;"><li>Developer</li></a>
</ul>
</div>
<div id="post">
</div>
	
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Address</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['address']; ?></td>
			<td>
				<a style="color:white;" href="admin.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a  style="color:white;"href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
<form method="post" action="server.php" >
        <input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="name" value="<?php echo $name; ?>">
		</div>
		<div class="input-group">
			<label>Address</label>
         <input type="text" name="address" value="<?php echo $address; ?>">
		</div>
		<div class="input-group">
		<?php if ($update == true): ?>
	<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
<?php else: ?>
	<button class="btn" type="submit" name="save" >Save</button>
<?php endif ?>
		</div>
	</form>
	
</body>
</html>