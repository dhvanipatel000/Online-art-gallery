<!DOCTYPE html>
<html>
<head>
	<title>Our team</title>
<link rel="icon" href="ag3.png">
     <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <style>

    body{
    margin:0;
    font-family: 'Open Sans', sans-serif;
}
*{
    box-sizing: border-box;
}

.team-section{
    background-color:mediumpurple;
    min-height: 100vh;
    padding:70px 15px 30px;
}

.container{
    max-width: 1170px;
    margin:auto;
}

.row{
    display: flex;
    flex-wrap: wrap;
}

.team-section .section-title{
    flex-basis: 100%;
    max-width: 100%;
    margin-bottom: 70px;
}

.team-section .section-title h1{
    font-size: 40px;
    text-align: center;
    margin:0;
    color: #ffffff;
    font-weight: 700;
}

.team-section .section-title p{
    font-size:16px;
    text-align: center;
    margin:15px 0 0;
    color:#ffffff;
}
.team-section .team-items{
    
    flex-basis: 100%;
    max-width: 100%;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}
.team-section .team-items .item{
 flex-basis: calc(25% - 30px);
 max-width: calc(25% - 30px);
 transition: all .5s ease;
 margin-bottom: 40px;
}
.team-section .team-items .item img{
    display: block;
    width: 100%;
    border-radius: 8px;
}

.team-section .team-items .item .inner{
    position: relative;
    z-index: 11;
    padding:0 15px;
}
.team-section .team-items .item .inner .info{
    background-color:purple;
    text-align: center;
    padding: 20px 15px;
    border-radius:8px;
    transition: all .5s ease;
    margin-top: -40px;
}
.team-section .team-items .item:hover  .info{
    transform: translateY(-20px);
}
.team-section .team-items .item:hover{
 transform: translateY(-10px);  
}
.team-section .team-items .item .inner .info h5{
    margin:0;
    font-size: 18px;
    font-weight: 600;
    color:#ffffff;
}
.team-section .team-items .item .inner .info p{
    font-size: 16px;
    font-weight: 400;
    color:#c5c5c5;
    margin:10px 0 0;
}

.team-section .team-items .item .inner .info .social-links{
    padding-top: 15px;
}

.team-section .team-items .item .inner .info .social-links a{
    display: inline-block;
    height: 32px;
    width: 32px;
    background-color: #ffffff;
    color:black;
    border-radius: 50%;
    margin:0 2px;
    text-align: center;
    line-height: 32px;
    font-size:16px;
    transition: all .5s ease;
}

.team-section .team-items .item .inner .info .social-links a:hover{
    box-shadow: 0 0 10px #000;
}

/*responsive*/
@media(max-width: 991px){
    .team-section .team-items .item{
      flex-basis: calc(50% - 30px);
       max-width: calc(50% - 30px);

   }
}

@media(max-width: 767px){
    .team-section .team-items .item{
      flex-basis: calc(100%);
       max-width: calc(100%);

   }
}

</style>
  
  <section class="team-section">
     <div class="container">
         <div class="row">
             <div class="section-title">
                 <h1>Our Team</h1>
                 
             </div>
         </div>
         <div class="row">
             <div class="team-items">
                  <div class="item">
                      <img src="priyanshi1.jpeg" alt="team" />
                      <div class="inner">
                          <div class="info">
                               <h5>Priyanshi Parmar</h5>
                               <p>Student</p>
                               <div class="social-links">
                                   <a href=""><span class="fa fa-facebook"></span></a>
                                   <a href=""><span class="fa fa-twitter"></span></a>
                                   <a href=""><span class="fa fa-linkedin"></span></a>
                                   <a href=""><span class="fa fa-youtube"></span></a>
                               </div>
                          </div>
                      </div>
                  </div>
                  <div class="item">
                      <img src="isha1.jpeg" alt="team" />
                      <div class="inner">
                          <div class="info">
                               <h5>Isha Patel</h5>
                               <p>Student</p>
                               <div class="social-links">
                                   <a href=""><span class="fa fa-facebook"></span></a>
                                   <a href=""><span class="fa fa-twitter"></span></a>
                                   <a href=""><span class="fa fa-linkedin"></span></a>
                                   <a href=""><span class="fa fa-youtube"></span></a>
                               </div>
                          </div>
                      </div>
                  </div>
                  <div class="item">
                      <img src="dhvani.jpeg" alt="team" />
                      <div class="inner">
                          <div class="info">
                               <h5>Dhvani Patel</h5>
                               <p>Student</p>
                               <div class="social-links">
                                   <a href=""><span class="fa fa-facebook"></span></a>
                                   <a href=""><span class="fa fa-twitter"></span></a>
                                   <a href=""><span class="fa fa-linkedin"></span></a>
                                   <a href=""><span class="fa fa-youtube"></span></a>
                               </div>
                          </div>
                      </div>
                  </div>
                  
             </div>
         </div>
     </div>
  </section>

</body>
</html>