<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>GEOTRACK-KU</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/creative.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <link rel="stylesheet" href="bootstrap.css"/>
  <script src="bootstrap.js"></script>
   <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <!-- Custom scripts for this template -->
    <script src="js/creative.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <script src="validate.js"></script>
 <script src="registration.js"></script>
  <style>
#loginModal{width:500px; margin-left: 30% ;}

.ms-header__title {
  -webkit-box-flex: 1;
      -ms-flex: 1 1 100%;
          flex: 1 1 100%;
  width: 100%;
  text-align: center;
  font-size: 2rem;
  font-weight: bold;
  color:#2B547E;
  text-shadow: 0px 0px 2px rgba(0, 0, 0, 0.4);
}

.ms-slider {
  display: inline-block;
  height: 1.3em;
  overflow: hidden;
  vertical-align: middle;
  -webkit-mask-image: -webkit-gradient(linear, left top, left bottom, from(transparent), color-stop(white), color-stop(white), color-stop(white), to(transparent));
  -webkit-mask-image: linear-gradient(transparent, white, white, white, transparent);
          mask-image: -webkit-gradient(linear, left top, left bottom, from(transparent), color-stop(white), color-stop(white), color-stop(white), to(transparent));
          mask-image: linear-gradient(transparent, white, white, white, transparent);
  mask-type: luminance;
  mask-mode: alpha;
}
.ms-slider__words {
  display: inline-block;
  margin: 0;
  padding: 0;
  list-style: none;
  -webkit-animation-name: wordSlider;
          animation-name: wordSlider;
  -webkit-animation-timing-function: ease-out;
          animation-timing-function: ease-out;
  -webkit-animation-iteration-count: infinite;
          animation-iteration-count: infinite;
  -webkit-animation-duration: 7s;
          animation-duration: 7s;
}
.ms-slider__word {
  display: block;
  line-height: 1.3em;
  text-align: left;
}

@-webkit-keyframes wordSlider {
  0%,
    27% {
    -webkit-transform: translateY(0%);
            transform: translateY(0%);
  }
  33%,
    60% {
    -webkit-transform: translateY(-25%);
            transform: translateY(-25%);
  }
  66%,
    93% {
    -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
  }
  100% {
    -webkit-transform: translateY(-75%);
            transform: translateY(-75%);
  }
}

@keyframes wordSlider {
  0%,
    27% {
    -webkit-transform: translateY(0%);
            transform: translateY(0%);
  }
  13%,
     40%{
      -webkit-transform: translateY(-20%);
            transform: translateY(-20%);
     }
  33%,
    60% {
    -webkit-transform: translateY(-40%);
            transform: translateY(-40%);
  }
  66%,
    93% {
    -webkit-transform: translateY(-60%);
            transform: translateY(-60%);
  }
  100% {
    -webkit-transform: translateY(-75%);
            transform: translateY(-75%);
  }
}
.tab { 
       display:inline-block; 
       margin-left: 5px; 
}
#data{
  color: blue;
}
img {
    border-radius: 50%;
    opacity: 1;
}
#brand
{
    -webkit-text-stroke: 1px white;
   text-shadow:
       3px 3px 0 #000,
     -1px -1px 0 #000,  
      1px -1px 0 #000,
      -1px 1px 0 #000,
       1px 1px 0 #000;
       color: black;
       font-size: 25px;
    
}
  .modal-login {    
    color: #636363;
    width: 350px;
  }
  .modal-login .modal-content {
    padding: 20px;
    border-radius: 5px;
    border: none;
  }
  .modal-login .modal-header {
    border-bottom: none;   
        position: relative;
        justify-content: center;
  }
  .modal-login h4 {
    text-align: center;
    font-size: 26px;
    margin: 30px 0 -15px;
  }
  .modal-login .form-control:focus {
    border-color: #70c5c0;
  }
  .modal-login .form-control, .modal-login .btn {
    min-height: 40px;
    border-radius: 3px; 
  }
  .modal-login .close {
        position: absolute;
    top: -5px;
    right: -5px;
  } 
  .modal-login .modal-footer {
    background: #ecf0f1;
    border-color: #dee4e7;
    text-align: center;
        justify-content: center;
    margin: 0 -20px -20px;
    border-radius: 5px;
    font-size: 13px;
  }
  .modal-login .modal-footer a {
    color: #999;
  }   
  .modal-login .avatar {
    position: absolute;
    margin: 0 auto;
    left: 0;
    right: 0;
    top: -70px;
    width: 95px;
    height: 95px;
    border-radius: 50%;
    z-index: 9;
    background: #60c7c1;
    padding: 15px;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
  }
  .modal-login .avatar img {
    width: 100%;
  }
  .modal-login.modal-dialog {
    margin-top: 80px;
  }
    .modal-login .btn {
        color: #fff;
        border-radius: 4px;
    background: #60c7c1;
    text-decoration: none;
    transition: all 0.4s;
        line-height: normal;
        border: none;
    }
  .modal-login .btn:hover, .modal-login .btn:focus {
    background: #45aba6;
    outline: none;
  }
  .trigger-btn {
    display: inline-block;
    margin: 100px auto;
  }
li a {
   -webkit-text-stroke: 1px black;
   text-shadow:
       1px 1px 0 #000,
     -1px -1px 0 #000,  
      1px -1px 0 #000,
      -1px 1px 0 #000,
       1px 1px 0 #000;
   

}
#top{
  -webkit-text-stroke: 1px white;
   text-shadow:
       1px 1px 0 #000,
     -1px -1px 0 #000,  
      1px -1px 0 #000,
      -1px 1px 0 #000,
       1px 1px 0 #000;





</style>

  </head>

  <body id="page-top"  style="background-image:url(pet.jpg); background-repeat: no-repeat;background-position: center center;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  " >

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container" id="page-top">
        <a class="navbar-brand js-scroll-trigger" id="top" href="#page-top"><img src="p.png"height="47" width="50"><font style="font-size: 28px !important; color: brown;font-family: Arial;"><strong>GEOTRACK-KU</font></strong></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#page-top"><font color="chocolate">Home</font></a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger"name="register" id="register" class="btn btn-success" data-toggle="modal" data-target="#modalForm"  href="#services"><font color="chocolate">Register Your Document</font></a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about"><font color="chocolate">About</font></a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="map.php"><font color="chocolate">Find Location</font></a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact"><font color="chocolate">Contact</font></a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger"name="register" id="register" class="btn btn-success" data-toggle="modal" data-target="#myModal"  href="#services"><font color="chocolate">Admin Login</font></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h4 class="text-lowecase">
             <div class="ms-header">
  <h3 class="ms-header__title" id="brand">
    Your Location Based Intelligence</br> We Can Help You Find Places within KU as well as Locations of Your Lost:
    <div class="ms-slider">
      <ul class="ms-slider__words">
        <li class="rw-words rw-words-1" id="data"> <span class="tab">Student ID</span></li>
        <li class="ms-slider__word" id="data"> <span class="tab">Exam Card</span></li>
        <li class="ms-slider__word" id="data"> <span class="tab"> National ID</span></li>
        <li class="ms-slider__word" id="data"> <span class="tab"> ATM  Card</span></li>
        <li class="ms-slider__word" id="data"> <span class="tab"> Passport Doc</span></li>
        <li class="ms-slider__word" id="data"> <span class="tab"> Staff ID</span></li>
        <li class="ms-slider__word" id="data"> <span class="tab"> Staff ID</span></li>
        <li class="ms-slider__word" id="data"> <span class="tab"> Credit Card</span></li>
        <li class="ms-slider__word" id="data"> <span class="tab"> Certificates</span></li>
        <!-- This last word needs to duplicate the first one to ensure a smooth infinite animation -->
        <li class="ms-slider__word" id="data">  <span class="tab"> Student  ID</span></li>
      </ul>
    </div>
  </h3>
</div>
  <img src="https://www.localgoldmine.com/locallistingcrusher/wp-content/uploads/2015/08/google-local-listing-crusher.jpg" alt="Avatar" style="width:150px;" >
            </h4>
            <hr>
          </div>
          <div class="col-lg-8 mx-auto">
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="map.php">Lost a Document?</a>
          </div>
        </div>
      </div>

    </header>

    <section class="bg-primary" id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading text-white">How it works!</h2>
            <hr class="light my-4">
            <p class="text-faded mb-4">One of the special benefits the Our System Geotrack is that it's location intelligence enable users to get the location of their found documents within kenyatta university, it also help users find locations and facilities within the Campus, the system as well enables the users to navigate through through he direction widget</p>
            <a class="btn btn-light btn-xl js-scroll-trigger" href="map.php">Campus Map</a>
          </div>
        </div>
      </div>
    </section>
    <!-- Modal -->
 


    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">Let's Get In Touch!</h2>
            <hr class="my-4">
            <p class="mb-5">Having difficulty using our system?Give us a call or send us an email and we will get back to you as soon as possible!</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 ml-auto text-center">
            <i class="fa fa-phone fa-3x mb-3 sr-contact"></i>
            <p>0725272888</p>
          </div>
          <div class="col-lg-4 mr-auto text-center">
            <i class="fa fa-envelope-o fa-3x mb-3 sr-contact"></i>
            <p>
              <a href="mailto:your-email@your-domain.com">info@gondipeters.com</a>
            </p>
          </div>
        </div>
      </div>
    </section>

   <div class="modal fade" id="modalForm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel" text-align="center">Register Document</h4>
            </div>
           
            <!-- Modal Body -->
            <div class="modal-body">
              <div id="post" style="color:green"></div>
                <form role="form">
                    <div class="form-group">
                        <label for="inputName">Name</label>
                        <input type="text" name="name" class="form-control" id="inputName" placeholder="Enter your name"/>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Email</label>
                        <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Enter your email"/>
                    </div>
                    <div class="form-group">
                        
                         <label for="type">Document Type</label></br>
    <select id="type" name="type"></br>
      <option value="Student_id">Student ID</option>
      <option value="Exam_card">Exam Card</option>
      <option value="National_id">National ID</option>
      <option value="National_id">ATM card</option>
      <option value="National_id">Passport</option>
      <option value="National_id">Credit Card</option>
       <option value="National_id">Certificates</option>
        <option value="National_id">Other</option>
      </select></br>
    </div>
                       
                     <div class="form-group">
                        <label for="inputMessage">Document Number</label>
                         <input type="text" name="doc_num" class="form-control" id="inputnum" placeholder="Enter unique no of doc."/>
                    </div>
                </form>
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default"  data-dismiss="modal" id="modalForm1">Close</button>
                <button type="button" class="btn btn-primary submitBtn" id="form">SUBMIT</button>
            </div>
        
        </div>
    </div>
</div>

  </body>
  <!-- Modal HTML -->
<div id="myModal" class="modal fade">
  <div class="modal-dialog modal-login">
    <div class="modal-content">
      <div class="modal-header">
        <div class="avatar">
          <img src="https://www.w3schools.com/howto/img_avatar2.png" alt="Avatar">
        </div>     
        <h5 class="modal-title">Admin Login</h5> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <form action="login.php" method="post">
          <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Username" required="required">   
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required"> 
          </div>        
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block login-btn">Login</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>     

  

</html>
