<?php require_once "config.php"; ?>
<?php 

    // $query = "SELECT img_id from cart";
    // $result = $link -> query($query);
    session_start();

    // if(isset($_GET['logout'])){
    //     unset($_SESSION['username']);
    //     unset($_SESSION['email']);
    //     unset($_SESSION['img']);
    // }
    // else{
    //     //
    // }

    // if(isset($_SESSION['username'])){
    //     $user = $_SESSION['username'];
    //     $ava = $_SESSION['img'];
    // }
    // else{
    //     header('location: login.php');
    // }


    if(isset($_GET['empty'])){
        unset($_SESSION['cart']);
    }

    if(isset($_GET['remove'])){
        $id = $_GET['remove'];
        foreach($_SESSION['cart'] as $k => $part){
            if($id == $part['id']){
                unset($_SESSION['cart'][$k]);
            }
        }
    }

    $total = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" href="ag3.png">
<title>My Cart</title>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;700&family=Poppins:wght@900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mate+SC&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/6d5ca9b667.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/checkout.css">
    
    <style type="text/css">
        body{
            
            background-color : lightblue ;
            }
        img{
            width: 200px;
            height: 150px;
        }
        table{
            font-family:  'Mate SC', serif;
            font-size: 22px;
            margin-top: 20px;
            /*margin-left: auto;*/
            /*margin-right: auto;*/
        }
        td{
            padding: 20px 30px;
        }
        /*i{color: red;}*/
        a{
            text-decoration: none;
            background-color: red;
            padding: 10px;
            color: white;
            border: red;
            border-radius: 8px;
        }
        /*table{
            border-collapse: collapse;

        }*/
        .btn-purchase {
            margin-left: auto;
            display: block;
            margin: 40px auto 80px auto;
            font-size: 1.75em;
}
.btn-primary:hover {
    background-color: #2D9CDB;
}
  


    </style>
</head>

<body>
<!-- 
<button onclick="goBack()">&larr;</button>
<script>
function goBack() {
  window.history.back();
}
</script> -->

 <center>
    <div class="table">
       
        <br>
        <table>
            <tr style="background-color: grey;">
               
                <th>Image</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Remove</th>
       
            </tr>


            <?php if(isset($_SESSION['cart'])) {?>
                <?php foreach($_SESSION['cart'] as $k => $item) {?>
                    <tr>
                        <td><img src="<?php echo $item['img']; ?>"></td>
                        <td><?php echo $item['name']; ?></td>
                        <td><?php echo $item['category']; ?></td>
                        <td><?php echo "Rs. " .$item['price']; 
                                        $pr = $item['price'];
                                        $total = $total + $pr;?></td>
                        <td><a href="mycart.php?remove=<?php echo $item['id']; ?>">Remove</td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </table>
        <hr style="width: 900px;float: center;">
        <div class="total" style="text-align:center;margin-right: -400px;">
            <h2>Total Rs: <span><?php echo $total; ?></span></h2>
             <a class='empty' href="mycart.php?empty=1" style="float:left;margin-left: 1100px;margin-top: -50px;font-size: 18px;font-family: 'Mate SC', serif;">EmptyCart</a>
             
        </div>
<button class="btn btn-primary btn-purchase" type="button" onclick="alert('Thanks for purchasing...the item will be delivered to your address soon')">Purchase</button>
<font size="5"><a href="mainpage.php">Back to Home Page</a></font>
    </div>

</center>

</body>

</html>