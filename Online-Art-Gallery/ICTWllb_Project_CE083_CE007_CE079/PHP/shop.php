<?php 

	// session_start();
	require_once "config.php"; 

?>

<?php 
      session_start();




if(isset($_POST['add-to-cart'])){
  if(isset($_SESSION['id'])){
 
      if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "id");

        if(in_array($_POST['id_no'], $item_array_id)){
            echo "<script>alert('This painting is already added in the cart..!')</script>";
            echo "<script>window.location = 'shop.php'</script>";
        }else{

            $count = count($_SESSION['cart']);
            $item_array = array(
                'id' => $_POST['id_no'],
                'name' => $_POST['name'],
            'price' => $_POST['price'],
            'category' => $_POST['category'],
            'img' => $_POST['img'],
            );

            $_SESSION['cart'][$count] = $item_array;
            echo "<script>alert('Painting added to the cart successfully.')</script>";
            echo "<script>window.location = 'shop.php'</script>";
        }

    }else{

        $item_array = array(
                'id' => $_POST['id_no'],
                'name' => $_POST['name'],
            'price' => $_POST['price'],
            'category' => $_POST['category'],
            'img' => $_POST['img'],
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        echo "<script>alert('Painting added to the cart successfully.')</script>";
            echo "<script>window.location = 'shop.php'</script>";
    }

}else{
    echo "<script>alert('Please login to use cart.')</script>";
            echo "<script>window.location = 'login.php'</script>";
}

}





?>


<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Art Gallary</title>
  <link rel="icon" href="img.png">
	<style type="text/css">
		img{
			margin: 5px;
			width: 280px;
			height: 200px;
		}
    .box img{border: 5px solid black;}
		.image{
			float: left;
			margin-left: 66px;
			margin-top: 35px;
		}
		p{margin-left: 5px; color: black;}

		.logo{
			width: 180px;
			height: 80px;
			cursor: pointer;
       		margin-left: 15px;
        	padding:1px;
}
nav{
	background-color: #3a3a3a;
}

nav li{
	display: flex;
	float: right;
	margin: 0;
	padding: 1px;
}
nav  li a{
	color: white;
	padding: 20px 7px;
	font-size: 17px;
	font-family: courier new;
	font-weight: bold;
	text-decoration: none;
	display: inline-block;
}
nav  li a:hover{
	opacity: 0.5;
}
/* The dropdown container */
.dropdown {
  float: right;
  overflow: hidden;
  font-family: courier new;
}

/* Dropdown button */
.dropdown .dropbtn {
  font-size: 17px;
  font-family: courier new;
  border: none;
  outline: none;
  color: white;
  padding: 20px 20px;
  background-color: inherit;
  font-family: inherit; /* Important for vertical align on mobile phones */
  margin: 0; /* Important for vertical align on mobile phones */
  
  font-family: courier new;
  font-weight: bold;
}

/* Add a red background color to navbar links on hover */
.dropdown:hover .dropbtn {
  opacity: 0.5;
}

/* Dropdown content (hidden by default) */
.dropdown-content {
  display: none;
  font-family: courier new;
  font-size: 15px;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  float: none;
  font-family: Monaco;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
  font-weight: bold;
}

/* Add a grey background color to dropdown links on hover */
.dropdown-content a:hover {
  background-color: #ddd;
}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}


	.box {
		float: left;
		margin-left: 80px;
		margin-top: 50px;
    background-color: #f0f0f0;
    padding: 12px 14px;
    	}

  button{
    background-color: black;
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
  }
  .box button:hover{background-color: red;}

  .form{
    display: flex;
  }
  .view-btn{
    margin-left: 10px;
    padding: 10px 20px;
  }
  .username p{
    padding: 10px;
  }
	</style>
	
	
</head>
<body>
  <p class="username">
  <?php 

    if(isset($_SESSION['username']))
        echo "<b><span style='font-size:20px;font-family:arial;margin-left:10px'>".$_SESSION['username']. "</b></span>";
    ?>
  <p>
	<nav>
          <img src="ag3.png" class="logo">
          
                <li><a href="logout.php">LOGOUT</li>
              <li><a href="edit.php">EDIT MY PROFILE</li>
              <li><a href="mycart.php">MY CART</li> 
              <div class="dropdown">
                        <button class="dropbtn">SEARCH BY CATEGORY
                            <i class="fa fa-sort-desc"></i>
                        </button>
                    <div class="dropdown-content">
                    <a href="abstract_art.php">Abstract Art</a>
                    <a href="modern_art.php">Modern Art</a>
                    <a href="canvas_art.php">Canvas Paintings</a>
                    <a href="graffitti_art.php">Graffitti</a>
                    <a href="pop_art.php">Pop Art</a>
                    
                    </div>
                    </div>
              <li><a href="mainpage.php">HOME</li>
               
      </nav>
     
<?php
	
	$sql = "SELECT * FROM art";
	$result = mysqli_query($link, $sql);
	while($row = mysqli_fetch_array($result)){  
		?>

		<div class="box">
                    <img src="<?php echo $row['image'];?>">
                    <div class="info">
										<p>Category: <?php echo $row['category'] ?></p>
										<p>Price: Rs.<?php echo $row['prize'] ?> </p>
										<p>Name: <?php echo $row['ArtName'] ?></p>
										</div>
                    <div class="form">
                    <form action="shop.php" method="post">
                        <input type="hidden" name="img" value="<?php echo $row['image'];?>" placeholder="Name" required>
                        <input type="hidden" name="category" value="<?php echo $row['category'];?>" placeholder="Name" required>
                        <input type="hidden" name="price" value="<?php echo $row['prize'];?>" placeholder="price" required>
                        <input type="hidden" name="name" value="<?php echo $row['ArtName'];?>" placeholder="price" required>
                        <input type="hidden" name="detail" value="<?php echo $row['detail'];?>" placeholder="detail" required>
                        <input type="hidden" name="size" value="<?php echo $row['size'];?>" placeholder="size" required>
                        <input type="hidden" name="id_no" value="<?php echo $row['id'];?>" placeholder="size" required>
                        <button type="submit" name="add-to-cart">Add To Cart</button>
                    </form>
                    <form action="info.php" method="post">
                        <input type="hidden" name="img" value="<?php echo $row['image'];?>" placeholder="Name" required>
                        <input type="hidden" name="category" value="<?php echo $row['category'];?>" placeholder="Name" required>
                        <input type="hidden" name="price" value="<?php echo $row['prize'];?>" placeholder="price" required>
                        <input type="hidden" name="name" value="<?php echo $row['ArtName'];?>" placeholder="price" required>
                        <input type="hidden" name="detail" value="<?php echo $row['detail'];?>" placeholder="detail" required>
                        <input type="hidden" name="size" value="<?php echo $row['size'];?>" placeholder="size" required>
                        <input type="hidden" name="id_no" value="<?php echo $row['id'];?>" placeholder="size" required>
                        <button class="view-btn" type="submit" name="view">View</button>
                    </form>
                    </div>
               </div>

<?php
	}


?>

</body>
</html>