<?php
  if(isset($_POST["username"]) && isset($_POST["password"])){
		require_once "config.php";
		$result = mysqli_query($link,"SELECT * FROM sign WHERE username='" . $_POST["username"] . "' and password = '". $_POST["password"]."'");
				$count  = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);
					if($count == 0) {
						echo "<script>alert('Invalid Username or Password!')</script>";
						echo "<script>window.location = 'login.php'</script>";
            exit();
					}
          else{
            session_start();
            $_SESSION["id"] = $row["id"];
            $_SESSION['username'] = $_POST['username'];
          }
        }
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <title>Art Gallary</title>
  <link rel="icon" href="img.png">
</head>
<body>
<style>
*{
	margin: 0;
	padding: 0;
	font-family: sans-serif;
}
body{
	line-height: 1.5;
}
.container{
	width: 100%;
	height: 100vh;
	background-image:linear-gradient(rgba(0,0,0,0.8),rgba(0,0,0,0.8)),url("bkg11.jpg");
	background-position: center;
	background-size: cover;
}
.logo{
	width: 150px;
	cursor: pointer;
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
  font-family:monospace;
  border: none;
  outline: none;
  color: white;
  padding: 20px 20px;
  background-color: inherit;
  font-family: inherit; /* Important for vertical align on mobile phones */
  margin: 0; /* Important for vertical align on mobile phones */
  color: white;
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
  font-family: monospace;
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
.text-box{
	width: 90%;
	color: white;
	position: absolute;
	top: 40%;
	left: 50%;
	transform: translate(-50%,0%);
}
.text-box h1{
	font-family: Copperplate, Papyrus, fantasy;
    color:#b35900;
    font-size: 30px;
}
.text-box p{
	text-shadow: 2px 2px 4px pink;
	font-family: Copperplate, Papyrus, fantasy;
}
.text-box button{
        
	width: 200px;
	font-family: monospace;
	color: black;
	border-radius: 15px;
	font-size: 15px;
	padding: 12px 0px;
	background: white;
	border:0;
	border-right: 20px;
	outline: transparent;
	margin-top: 30px;
	cursor: pointer;
}
.text-box button:hover{
	background-color: rosybrown;
	color: white;
}
nav .fa-sort-desc{
	display: inline-block;
}

.page2{
	width: 80%;
	padding-top: ;px
	margin: auto;
	text-align: center;
	text-decoration: none;
	font-family: sans-serif;
	font-weight: bold;
	align-items: center;
	justify-content: center;
	margin-top: 100px;
	margin-left: 150px;
	text-underline-position: inherit;
}
.page2 h1{
       color : brown;
}

.swiper-container {
	margin-top: 100px;
  height: 350px;
}
.swiper-wrapper{
  align-items: center;
}
.swiper-slide{
	width: 200px;
	height: 250px;
	border-radius: 7px;
}
.swiper-slide img{
	width: 200px;
	height: 250px;
	border-radius: 7px;
}



.f1{
	max-width: 1170px;
	margin: auto;
}
.row{
	display: flex;
	flex-wrap: wrap;
}
ul{
	list-style: none;
}
.footer{
	background-color: #24262b;
	padding: 70px 0;
}
.footer-col{
	width: 25%;
	padding: 0 15px;
}
.footer-col h4{
	font-size: 18px;
	color: #ffffff;
	text-transform: capitalize;
	margin-bottom: 35px;
	font-family: monospace;
	font-weight: 500;
	position: relative;
}
.footer-col h4::before{
	content: '';
	position: absolute;
	left: 0;
	bottom: -10px;
	background-color: #e91e63;
	height: 2px;
	box-sizing: border-box;
	width: 50px;
}
.footer-col ul li:not(:last-child){
	margin-bottom: 10px;
}
.footer-col ul li a{
	font-size: 16px;
	font-family: monospace;
	text-transform: capitalize;
	color: #fff;
	text-decoration: none;
	font-weight: 300;
	display: block;
	transition: all 0.3s ease;
}
.footer-col ul li a:hover{
	color: #fff;
	padding-left: 8px;
}
.footer-col .social a{
	display: inline-block;
	height: 40px;
	width: 40px;
	background-color: rgba(255, 255, 255, 0.2);
	margin: 0 10px 10px 0;
	text-align: center;
	line-height: 40px;
	border-radius: 50%;
	color: #fff;
	transition: all 0.5s ease;
}
.footer-col .social a:hover{
	color: #24262b;
	background-color: #fff;
}

      

</style>
  <div class="container">
        <nav>
          <img src="ag3.png" class="logo">
              <li><a href="logout.php">LOGOUT</a></li>
              <li><a href="upload.php">ADD ART</a></li>
              <li><a href="edit.php">EDIT MY PROFILE</a></li>
              <li><a href="mycart.php">MY CART</a></li> 
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
              <li><a href="mainpage.php">HOME</a></li>
      </nav>
      <div class="text-box">
        <center><h1>Welcome to the ART STUDIO , the art gallery</h1></center>
        <center><p>Design with creativity  &ensp;  Design with smile &ensp;  Keeping ART alive!! :) 🤍🎨🖌</p></center>
        <center><form action="shop.php"><button>Shop now</button></form></center>
      </div>
  </div>
</div>
     
    <div class="page2">
      <h1><u>Discover the creative world of Artists and their masterpiece</u></h1>
    </div>

 <!-- image slider -->
     <div class="swiper-container mySwiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide"><img src="abstract2.jpg"></div>
        <div class="swiper-slide"><img src="card1.jpg"></div>
        <div class="swiper-slide"><img src="modern1.jpg"></div>
        <div class="swiper-slide"><img src="s2.jpg"></div>
        <div class="swiper-slide"><img src="card3.jpg"></div>
        <div class="swiper-slide"><img src="acrylic1.jpg"></div>
        <div class="swiper-slide"><img src="card2.jpg"></div>
        <div class="swiper-slide"><img src="Lord Krishna Modern Art.jpg"></div>
        
        <div class="swiper-slide"><img src="s1.jpg"></div>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>

  


    <footer class="footer">
      <div class="f1">
        <div class="row">
          <div class="footer-col">
               <h4>Company</h4>
               <ul>
                 <li><a href="team.php">About our Team</a></li>
                 <li><a href="#">Our products</a></li>
                 <li><a href="#">Privacy policy</a></li>
               </ul>
          </div>
          <div class="footer-col">
               <h4>Get help</h4>
               <ul>
                 <li><a href="#">FAQs</a></li>
                 <li><a href="#">Shipping</a></li>
                 <li><a href="#">Returns</a></li>
                 <li><a href="#">Order status</a></li>
                 <li><a href="#">Payment options</a></li>
               </ul>
          </div>
          <div class="footer-col">
               <h4>Follow us</h4>
               <div class="social">
                 <a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                 <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></i></a>
                 <a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                 <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                </div>
          </div>
        </div>
      </div>
    </footer>
 

  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>



  <script>
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 5,
        spaceBetween: 10,
        slidesPerGroup: 3,
        loop: true,
        loopFillGroupWithBlank: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    </script>
    </body>
</html>