<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>index</title>
    <!-- <link href="../css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css"/>

    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: sans-serif;
      }
      body {
        min-height: 200vh;
      }
      header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: 0.6s;
        padding: 20px 100px;
        z-index: 100000;
      }
      header.sticky {
        padding: 10px 100px;
        background-color:rgb(63, 195, 113);
      }
      header .logo {
        position: relative;
        font-weight: 700;
        color: white;
        text-decoration: none;
        font-size: 2em;
        text-transform: uppercase;
        letter-spacing: 2px;
        transition: 0.6s;
      }
      header ul {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
      }
      ul li {
        position: relative;
        list-style: none;
      }
      ul li a {
        position: relative;
        margin: 0px 15px;
        text-decoration: none;
        color: white;
        letter-spacing: 2px;
        font-weight: 500px;
        transition: 0.6s;
        font-size:large;
      }
      .banner {
        position: relative;
        width: 100%;
        height: 100vh;
        background: url(../img/piron-guillaume-U4FyCp3-KzY-unsplash.jpg);
        background-size: cover;
        text-align: center;
      }
      .center{
        position: absolute;
        top:60%;
        left:50%;
        transform: translate(-50%,-50%);
        color:rgb(255, 255, 255);

      }
      .text{
          margin-top:60px;
      }
      .data{
        text-align: center;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
      }
      .fa-hand-holding-medical,.fa-accessible-icon,.fa-user-group{
        font-size:50px;
        color:green;
        padding:30px;
      }
      .fa-user-group{
        color:white;
      }
      .footer{
            background-color:rgb(25, 31, 27);
            padding:10px;
            margin-top:30px;
            text-align: center;
        }

      @media only screen and (max-width: 600px) {
        header.stiky {
          margin:0;
        }
      }
    </style>
  </head>

<body>
<!-- navigation -->
    <header>
      <a href="#" class="logo">Health</a>
      <nav class="navbar navbar-expand-lg ">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link  text-light fs-5" href="#">Home</a></li>
            <li class="nav-item"><a class="nav-link  text-light fs-5" href="#">About</a></li>
            <li class="nav-item"><a class="nav-link  text-light fs-5" href="#">Contact</a></li>
            <li class="nav-item"><a class="nav-link  text-light fs-5" href="#">Team</a></li>
            <li class="nav-item"><a class="nav-link  text-light fs-5" href="admin_login.php">SignIn</a></li>
          </ul>
        </div>
      </nav>
    </header>
<!-- navigation end -->

<!-- header  -->
    <section class="banner">
      <div class="center">
            <h1>Doctor Appointment System</h1>
            <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam, mollitia.
                Lorem ipsum dolor sitectetur adipisicing elit. Qu or sitectetur adipisicing elit. 
                or sitectetur adipisicing elit. or sitectetur adipisicing elit. or sitectetur adipisicing elit. </h5>
            <a href="login.php" class="btn btn-success">Appointment</a>   
            <button class="btn btn-light">More info</button>            
      </div>
    </section>
<!-- header end -->

<!-- about  -->
    <div class="container py-5">
      <div class="row justify-content-center mr-auto">

        <div class="col-md-6 p-3 mt-3">
          <div class="text">
            <h2>Welcome To <span style="color:rgb(59, 173, 82);">HealthCare</span></h2>
              <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam aspernatur qisquam itaque!
              nsect. Aperiam aspernansectetur adipisicing elit. Aperiam asperna
              nsectetur adipisicing elit. Aperiam aspernansectetur adipisicing elit. Aperiam asperna<br><br>
              ing elit. Aperiam aspern ansectetur adipisicing elit.  Aperiam aspern ansectetur adipisicing elit. Aperiam aspe
              </h5><br>
              <button class="btn btn-success">Read More</button>
          </div>
        </div>

        <div class="col-md-5 mt-3 p-3">
          <div data-aos="fade-left" data-aos-delay="40" >
          <img src="../img/d1.jpg" alt="" height="400px" width="500px">
          </div>
        </div>
      </div>
    </div>
<!-- about end -->

<!-- image -->
<div class="container-fluid py-5">
  <div class="row justify-content-center mr-auto">

    <div class="col-md-4 p-3">
      <div class="data bg-light">
      <i class="fa-solid fa-hand-holding-medical"></i>
        <h3 class="text-success">PROGRAMS</h3>
        <h6 class="p-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam assumenda illum repellat
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam assumenda illum repellaLorem ipsum dol
        </h6><br>
        <button class="btn btn-success  mb-4">LEARN MORE</button>
      </div>
    </div>

  <div class="col-md-4 p-3">
    <div class="data bg-success">
        <i class="fa-solid fa-user-group"></i>
        <h3 class="text-light">PROGRAMS</h3>
        <h6 class="text-light p-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam assumenda illum repellat
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam assumenda illum repellaLorem ipsum dol
        </h6><br>
      <button class="btn btn-light  mb-4">LEARN MORE</button>
    </div>
    </div>

    <div class="col-md-4 p-3">
      <div class="data bg-light">
      <i class="fa-brands fa-accessible-icon"></i>
        <h3 class="text-success">PROGRAMS</h3>
        <h6 class="p-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam assumenda illum repellat
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam assumenda illum repellaLorem ipsum dol
        </h6><br>
        <button class="btn btn-success mb-4">LEARN MORE</button>
      </div>
    </div>

</div>
</div>
<!-- image -->

<!-- footer -->
<div class="footer">
    <p class="text-light">Copyright © HealthCare Department Website</p>
</div>
<!-- footer -->

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>

    <script>
      window.addEventListener("scroll", function () {
        var header = document.querySelector("header");
        header.classList.toggle("sticky", window.scrollY > 0);
      });
    </script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  
  </body>
</html>
