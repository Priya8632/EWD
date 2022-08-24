<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>index</title>
  <link rel="stylesheet" href="./css/index.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css" />
  <style>
    ion-icon {
      font-size: xx-large;
    }

    .card-img-top {
      object-fit: cover;
      height: 300px;
      width: 300px;
    }
    nav{
      background-color: rgb(42, 153, 96);
    }
  </style>
</head>

<body>
  <!-- navigation -->
  <nav class="navbar fixed-top shadow-sm p-3">
    <div class="container-lg">

      <a class="navbar-brand text-light" href="#">
        <i class="fa-solid fa-heart-circle-plus"></i>
        HEALTH
      </a>
      <!-- <a class="navbar-brand text-success fw-bold fs-4" href="#">HEALTH</a> -->
      <ul class="nav jastify-content-end">
        <li class="nav-item"><a class="nav-link text-success text-light" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link text-success text-light" href="#about">About Us</a></li>
        <li class="nav-item"><a class="nav-link text-success text-light" href="#team">Team</a></li>
        <li class="nav-item"><a class="nav-link text-success text-light" href="#contact">Contact</a></li>
        <li class="nav-item"><a class="nav-link text-success text-light" href="./admin/admin_login.php">Signin</a></li>
      </ul>
    </div>
  </nav>
  <!-- navigation end -->

  <!-- header  -->
  <section class="banner">
    <div class="center">
      <h1>Doctor Appointment System</h1>
      <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam, mollitia.
        Lorem ipsum dolor sitectetur adipisicing elit. Qu or sitectetur adipisicing elit.
        or sitectetur adipisicing elit. or sitectetur adipisicing elit. or sitectetur adipisicing elit. </h5>
      <a href="./user/login.php" class="btn btn-success">Appointment</a>
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
            ing elit. Aperiam aspern ansectetur adipisicing elit. Aperiam aspern ansectetur adipisicing elit. Aperiam aspe
          </h5><br>
          <button class="btn btn-success">Read More</button>
        </div>
      </div>

      <div class="col-md-5 mt-3 p-3">
        <div data-aos="fade-left" data-aos-duration="2000">
          <img src="./img/d1.jpg" alt="" height="400px" width="500px">
        </div>
      </div>
    </div>
  </div>
  <!-- about end -->

  <!-- image -->
  <div class="container-fluid py-5">
    <div class="row justify-content-center mr-auto">

      <div class="col-md-4 p-3" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
        <div class="data bg-light">
          <i class="fa-solid fa-hand-holding-medical"></i>
          <h3 class="text-success">PROGRAMS</h3>
          <h6 class="p-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam assumenda illum repellat
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam assumenda illum repellaLorem ipsum dol
          </h6><br>
          <button class="btn btn-success  mb-4">LEARN MORE</button>
        </div>
      </div>

      <div class="col-md-4 p-3" data-aos="flip-right" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
        <div class="data bg-success">
          <i class="fa-solid fa-user-group"></i>
          <h3 class="text-light">FECILITYES</h3>
          <h6 class="text-light p-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam assumenda illum repellat
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam assumenda illum repellaLorem ipsum dol
          </h6><br>
          <button class="btn btn-light  mb-4">LEARN MORE</button>
        </div>
      </div>

      <div class="col-md-4 p-3" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
        <div class="data bg-light">
          <i class="fa-brands fa-accessible-icon"></i>
          <h3 class="text-success">PATIENTS</h3>
          <h6 class="p-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam assumenda illum repellat
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam assumenda illum repellaLorem ipsum dol
          </h6><br>
          <button class="btn btn-success mb-4">LEARN MORE</button>
        </div>
      </div>

    </div>
  </div>
  <!-- image -->

  <!-- about section start -->

  <section class="about py-5 bg-white" id="about">
    <div class="container">

      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="section-title text-center">
            <h2 class="fw-bold mb-3">ABOUT US</h2>
            <!-- <hr style="background-color:green;height:4px;border-radius:18px;"> -->
            <!-- <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, aliquam!</span> -->
          </div>
        </div>
      </div>

      <div class="flex-container py-4">

        <div data-aos="flip-left" data-aos-duration="2000">
          <i class="fa-solid fa-bolt-lightning"></i><br>
          <span>Advanced Technology</span>
        </div>

        <div data-aos="flip-left" data-aos-duration="2000">
          <i class="fa-solid fa-clock"></i><br>
          <span>24 Hours Services</span>
        </div>

        <div data-aos="flip-left" data-aos-duration="2000">
          <i class="fa-solid fa-users"></i><br>
          <span>All Experts Staffs</span>
        </div>

        <div data-aos="flip-left" data-aos-duration="2000">
          <i class="fa-solid fa-bookmark"></i><br>
          <span>Extensive History</span>
        </div>

      </div>

    </div>
  </section>

  <section>
    <h2 class="fw-bold mb-3 text-center">OUR SERVICES</h2>
    <div class="grid-container">
      <div data-aos="flip-right" data-aos-duration="2000">
        <i class="fa-solid fa-heart-pulse"></i>
        <h5>Mother Care</h5>
        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit.
          Lorem ipsum dolor sit amet Reprehenderit, itaque.
        </span>
      </div>

      <div data-aos="flip-right" data-aos-duration="2000">
        <i class="fa-solid fa-user-doctor"></i>
        <h5>Child Care</h5>
        <span>Lorem ipsum, dolor sit amet consectetur adipisicing elit.
          Lorem ipsum dolor sit amet Reprehenderit, itaque.
        </span>
      </div>

      <div data-aos="flip-right" data-aos-duration="2000">
        <i class="fa-solid fa-truck-medical"></i>
        <h5>Parent Care</h5>
        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit
          Lorem ipsum dolor sit amet Reprehenderit, itaque.
        </span>
      </div>
    </div>

    <div class="grid-container">
      <div data-aos="flip-right" data-aos-duration="2000">
        <i class="fa-solid fa-stethoscope"></i>
        <h5>Critical Treatments</h5>
        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit.
          Lorem ipsum dolor sit amet Reprehenderit, itaque.
        </span>
      </div>

      <div data-aos="flip-right" data-aos-duration="2000">
        <i class="fa-solid fa-briefcase-medical"></i>
        <h5>All Major Tests</h5>
        <span>Lorem ipsum, dolor sit amet consectetur adipisicing elit.
          Lorem ipsum dolor sit amet Reprehenderit, itaque.
        </span>
      </div>

      <div data-aos="flip-right" data-aos-duration="2000">
        <i class="fas fa-flask"></i>
        <h5>Modern Laboratory</h5>
        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit.
          Lorem ipsum dolor sit amet Reprehenderit, itaque.
        </span>
      </div>
    </div>
  </section>

  <!-- team ection -->

  <section id="team">

    <h2 class="fw-bold text-center">EXPERT DOCTORS</h2>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 m-auto">
          <div class="card" data-aos="zoom-in-up" data-aos-duration="2000">
            <img src="./img/d1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">ROBERT SMITH</h5>
              <p class="card-text">Neurology</p>
              <a href="#" class="btn btn-success">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 m-auto">

          <div class="card" data-aos="zoom-in-up" data-aos-duration="2000">
            <img src="./img/d3.jfif" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">BRENT GRUNDY</h5>
              <p class="card-text">Arthology</p>
              <a href="#" class="btn btn-success">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 m-auto">

          <div class="card" data-aos="zoom-in-up" data-aos-duration="2000">
            <img src="./img/d4.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">JEFT BENSON</h5>
              <p class="card-text">Cardiology</p>
              <a href="#" class="btn btn-success">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 m-auto">

          <div class="card" data-aos="zoom-in-up" data-aos-duration="2000">
            <img src="./img/d2.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">DANNY ASHTON</h5>
              <p class="card-text">Medicine</p>
              <a href="#" class="btn btn-success">Read More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- contact section start -->
  <section class="contact py-5" id="contact">
    <div class="container-lg py-4">

      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="section-title text-center">
            <h2 class="fw-bold mb-5">Get In Touch</h2>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="contact-form">

          <form action="">
            <div class="row">
              <div class="col-lg-6">
                <input type="text" placeholder="first name" class="form-control form-control-lg fs-6 border-0 shadow p-3 mb-5 bg-light rounded">
              </div>
              <div class="col-lg-6">
                <input type="text" placeholder="last name" class="form-control form-control-lg fs-6 border-0 shadow p-3 mb-5 bg-light rounded">
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <input type="text" placeholder="email" class="form-control form-control-lg fs-6 border-0 shadow p-3 mb-5 bg-light rounded">
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <textarea placeholder="your message" rows="5" class="form-control form-control-lg fs-6 border-0 shadow p-3 mb-5 bg-light rounded"></textarea>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <button type="submit" class="btn btn-success px-3">Send Message</button>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>

    </div>
  </section>
  <!-- contact section end -->

  <style>
    input {
      background-color: gray;
    }
  </style>


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
    window.addEventListener("scroll", function() {
      var header = document.querySelector("header");
      header.classList.toggle("sticky", window.scrollY > 0);
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>