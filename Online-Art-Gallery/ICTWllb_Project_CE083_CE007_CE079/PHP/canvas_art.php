<?php 

require_once "config.php";
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mate+SC&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Art Gallary</title>
  <link rel="icon" href="img.png">
	<style type="text/css">
	img{
			margin: 5px;
			width: 280px;
			height: 200px;
            border: 5px solid black;
		}
		.image{
			float: left;
			margin-left: 66px;
			margin-top: 35px;
		}
		p{margin-left: 5px; color: black;}

		.box {
		float: left;
		margin-left: 80px;
		margin-top: 50px;
    background-color: #dcdcdc;
    padding: 12px 14px;
	}

  button{
    background-color: black;
    color: white;
    border: none;
    padding: 10px;
  }
  button:hover{
    background-color: red;
  }
  header{
    /*background-color: #f0f0f0;*/
    background-image: url("wc1.jpg");
    background-size: cover;
    padding: 50px 100px;
    color: white;
    font-size: 20px;
    text-align: justify;
    font-family: "Lucida Console", "Courier New", monospace;
    
  }
  h1{
    text-align: center;
    background-color: #16161D;
    padding: 20px ;
    color: white;
    margin-top: 0%;
    font-family:  'Mate SC', serif;
}
.box button:hover{background-color: red;}
  
  .form{
    display: flex;
  }
  .view-btn{
    margin-left: 10px;
    padding: 10px 20px;
  }
  a{
    text-decoration: none;
    color: black;
        }
        
	</style>
</head>
<body>
  
    <div class="heading">
<div class="go-back">
            <a href = "javascript:history.back()"><i class="fa fa-arrow-left" style="font-size:24px"></i></a>
        </div>
<h1 style="margin-top:5px">
        
    <div>
    <?php 
    if(isset($_SESSION['username']))
        echo "<span style='font-size:20px;float:left;font-family:arial'>".$_SESSION['username']. "</span>";
    ?>
</div>
Canvas Paintings</h1>

<a href="mycart.php" style="color:white;float:right;margin-right:50px;margin-top:-78px"><i class="fa fa-shopping-cart" style="font-size:36px"></i></a>
</div>
<header style="margin-top: -5px">Art is not, as the metaphysicians say, the manifestation of some mysterious idea of beauty or God; it is not, as the aesthetical physiologists say, a game in which man lets off his excess of stored-up energy; it is not the expression of man’s emotions by external signs; it is not the production of pleasing objects; and, above all, it is not inly pleasure; but it is a means of union among men, joining them together in the same feelings, and indispensable for the life and progress toward well-being of individuals and of humanity. – Leo Tolstoy </header>


<?php 

	
	$sql = "SELECT * FROM art";
	$query = mysqli_query($link, $sql);
    $count = 0;
	while($row = mysqli_fetch_array($query)){
		if($row['category'] == "canvas"){
            $count++;
			?>

				<div class="box">
                    <img src="<?php echo $row['image'];?>">
                    <div class="info">
										<p>Category: <?php echo $row['category'] ?></p>
										<p>Price: Rs.<?php echo $row['prize'] ?> </p>
										<p>Name: <?php echo $row['ArtName'] ?></p>
										</div>
                                        <div class="form">
                    <form action="canvas_art.php" method="post">
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
	}
    if($count == 0){echo "No Paintings.";}

?>

<?php
	
	if(isset($_POST['add-to-cart'])){
  if(isset($_SESSION['id'])){
 
      if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "id");

        if(in_array($_POST['id_no'], $item_array_id)){
            echo "<script>alert('This painting is already added in the cart..!')</script>";
            echo "<script>window.location = 'canvas_art.php'</script>";
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
            echo "<script>window.location = 'canvas_art.php'</script>";
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
            echo "<script>window.location = 'canvas_art.php'</script>";
     
    }

}else{
    echo "<script>alert('Please login to use cart.')</script>";
            echo "<script>window.location = 'login.php'</script>";
}

}

?>

</body>
</html>