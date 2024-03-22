<?php 
require_once "config.php"

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Tourney:wght@600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
                body{
                        background-color:lightblue;
                        font-family: monospace;
                    }
                h2{
                        color: purple;
                        font-family: 'Tourney', cursive;
                  }
		.container{
			display: flex;
			margin-left: 30%;
		}

		img{
			width: 300px;
		}
		.info{
			margin-left: 50px;
			font-size: 25px;
			font-family: times sans-serif;
		}
		a{
			text-decoration: none;
			color: black;
		}
		.image{
			background-color: mediumpurple;
			padding: 15px 20px;
		}
                .details{
                        font-weight: 300;
                        font-family: monospace;
                        font-size: 20px;
                        }
		
	</style>
</head>
<body>

	<?php $name = $_POST['img'];
	 ?>
	
	
		<div class="go-back">
			<a href = "javascript:history.back()"><i class="fa fa-arrow-left" style="font-size:24px"></i></a>
		</div>
		<div class="container">
		<div class="image">
		<img src="uploaded file\<?php echo $name; ?>">
		</div>
		<div class="info">
			<h2>
			Name: <?php echo $_POST['name']; ?>
		</h2>
			<br>
			<div class= "details" >Category of the painting: <?php echo $_POST['category']; ?> </div>
			<br><br>
			<div class= "details" >Details: <?php echo $_POST['detail']; ?></div>
			<br><br>
			<div class= "details" >Size: <?php echo $_POST['size']; ?></div>
			<br><br>
			<div class= "details" >Price: Rs.<?php echo $_POST['price']; ?></div>
		</div>
	</div>
<br>
	
	

</body>
</html>

