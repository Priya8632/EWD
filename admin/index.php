<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>index</title>
  <link rel="stylesheet" href="../css/contact.css">
  <!-- <link href="../css/bootstrap.min.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css" />
  <style>
    ion-icon{
        font-size:xx-large;
        /* padding-right: 10px; */
    }
  </style>
</head>

<body>
  <!-- navigation -->
  <nav class="navbar navbar-light fixed-top bg-light shadow-sm p-3">
    <div class="container-lg">

      <a class="navbar-brand text-success" href="#">
          <i class="fa-solid fa-mortar-pestle"></i>
          HEALTH
        </a>
      <!-- <a class="navbar-brand text-success fw-bold fs-4" href="#">HEALTH</a> -->
      <ul class="nav jastify-content-end">
        <li class="nav-item"><a class="nav-link text-success" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link text-success" href="#about">About Us</a></li>
        <li class="nav-item"><a class="nav-link text-success" href="#team">Team</a></li>
        <li class="nav-item"><a class="nav-link text-success" href="#contact">Contact</a></li>
        <li class="nav-item"><a class="nav-link text-success" href="admin_login.php">Signin</a></li>
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
            ing elit. Aperiam aspern ansectetur adipisicing elit. Aperiam aspern ansectetur adipisicing elit. Aperiam aspe
          </h5><br>
          <button class="btn btn-success">Read More</button>
        </div>
      </div>

      <div class="col-md-5 mt-3 p-3">
        <div data-aos="fade-left" data-aos-duration="2000">
          <img src="../img/d1.jpg" alt="" height="400px" width="500px">
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

      <div class="card" style="width: 18rem;" data-aos="zoom-in-up" data-aos-duration="2000">
        <img src="../img/d3.jfif" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">ROBERT SMITH</h5>
          <p class="card-text">Neurology</p>
          <a href="#" class="btn btn-success">Read More</a>
        </div>
      </div>

      <div class="card" style="width: 18rem;" data-aos="zoom-in-up" data-aos-duration="2000">
        <img src="../img/d3.jfif" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">BRENT GRUNDY</h5>
          <p class="card-text">Arthology</p>
          <a href="#" class="btn btn-success">Read More</a>
        </div>
      </div>

      <div class="card" style="width: 18rem;" data-aos="zoom-in-up" data-aos-duration="2000">
        <img src="../img/d3.jfif" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">JEFT BENSON</h5>
          <p class="card-text">Cardiology</p>
          <a href="#" class="btn btn-success">Read More</a>
        </div>
      </div>

      <div class="card" style="width: 18rem;" data-aos="zoom-in-up" data-aos-duration="2000">
        <img src="../img/d3.jfif" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">DANNY ASHTON</h5>
          <p class="card-text">Medicine</p>
          <a href="#" class="btn btn-success">Read More</a>
        </div>
      </div>

    </div>
  </section>


  <!-- contact section -->
  <div class="back" id="contact">

    <div class="contactUs">
      <div class="title">
        <h2>Get in Touch</h2>
      </div>
      <div class="box">
        <!-- form -->
        <div class="contact form">
          <h3>Send a Message</h3>
          <form action="">

            <div class="formbox">
              <div class="row50">
                <div class="inputbox">
                  <span>First Name</span>
                  <input type="text" placeholder="first name">
                </div>
                <div class="inputbox">
                  <span>Last Name</span>
                  <input type="text" placeholder="last name">
                </div>
              </div>

              <div class="row50">
                <div class="inputbox">
                  <span>Email</span>
                  <input type="text" placeholder="email">
                </div>
                <div class="inputbox">
                  <span>Mobile</span>
                  <input type="text" placeholder="mobile">
                </div>
              </div>

              <div class="row100">
                <div class="inputbox">
                  <span>Message</span>
                  <textarea placeholder="type here...."></textarea>
                </div>
              </div>

              <div class="row100">
                <div class="inputbox">
                  <input type="submit" value="send">
                </div>
              </div>

            </div>
          </form>
        </div>

        <!-- info -->
        <div class="contact info">
          <h3>Contact Info</h3>
          <div class="infobox">
            <div>
              <span>
                <ion-icon name="location"></ion-icon>
              </span>
              <p>192 , saragam park society <br>SURAT</p>
            </div>
            <div>
              <span>
                <ion-icon name="mail"></ion-icon>
              </span>
              <a href="mailto:Lorem@gmail.com">Lorem@gmail.com</a>
            </div>
            <div>
              <span>
                <ion-icon name="call"></ion-icon>
              </span>
              <a href="tel:+9178678656">8946643782</a>
            </div>
            <ul class="sci">
              <li><a href="#">
                  <ion-icon name="logo-facebook"></ion-icon>
                </a></li>
              <li><a href="#">
                  <ion-icon name="logo-twitter"></ion-icon>
                </a></li>
              <li><a href="#">
                  <ion-icon name="logo-linkedin"></ion-icon>
                </a></li>
              <li><a href="#">
                  <ion-icon name="logo-instagram"></ion-icon>
                </a></li>
            </ul>
          </div>
        </div>


        <!-- map -->
        <div class="contact map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3718.831970336151!2d72.8456436147579!3d21.
          238510685960854!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04ed71aca8757%3A0x10eab773a707daf9!2sAmroli%20Char%20Rasta%2C%20Amroli%2C%20Surat%2C%20Gujarat%20394107!5e0!3m2!1sen!2sin!4v1658992851411!5m2!1sen!2sin" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>

  </div>

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