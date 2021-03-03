<?php include '../header.php';?>
	 <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">


	 <style> 
	.section {
    padding: 60px 0 60px 0!important;
}
.section-title {
    text-align: center;
    padding-bottom: 30px;
    color: #45526e;
}
.form-row>.col, .form-row>[class*=col-] {
    padding-right: 5px;
    padding-left: 5px;
}
.form-group {
    margin-bottom: 1rem;
}
.form-control {
    display: block;
    width: 100%;
    height: calc(1.5em + .75rem + 2px);
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
 /*--------------------------------------------------------------
# Contact Us
--------------------------------------------------------------*/
.contact .info-box {
  color: #444;
  text-align: center;
  box-shadow: 0 0 30px rgba(214, 215, 216, 0.6);
  padding: 20px 0 30px 0;
  margin-bottom: 30px;
  width: 100%;
}

.contact .info-box i {
  font-size: 21px;
  color: #428bca;
  border-radius: 50%;
  padding: 8px;
  border: 2px dotted #9eccf4;
}

.contact .info-box h3 {
  font-size: 23px;
  color: #666;
  font-weight: 700;
  margin: 10px 0;
  font-family: none;
}

.contact .info-box p {
 padding: 22px 7px 23px 7px;
    line-height: 24px;
    font-size: 17px;
    margin-bottom: 0;
}

.contact .php-email-form {
  box-shadow: 0 0 30px rgba(214, 215, 216, 0.6);
  padding: 30px;
}

.contact .php-email-form .validate {
  display: none;
  color: red;
  margin: 0 0 15px 0;
  font-weight: 400;
  font-size: 13px;
}

.contact .php-email-form .error-message {
  display: none;
  color: #fff;
  background: #ed3c0d;
  text-align: left;
  padding: 15px;
  font-weight: 600;
}

.contact .php-email-form .error-message br + br {
  margin-top: 25px;
}

.contact .php-email-form .sent-message {
  display: none;
  color: #fff;
  background: #18d26e;
  text-align: center;
  padding: 15px;
  font-weight: 600;
}

.contact .php-email-form .loading {
  display: none;
  background: #fff;
  text-align: center;
  padding: 15px;
}

.contact .php-email-form .loading:before {
  content: "";
  display: inline-block;
  border-radius: 50%;
  width: 24px;
  height: 24px;
  margin: 0 10px -6px 0;
  border: 3px solid #18d26e;
  border-top-color: #eee;
  -webkit-animation: animate-loading 1s linear infinite;
  animation: animate-loading 1s linear infinite;
}

.contact .php-email-form input, .contact .php-email-form textarea {
  border-radius: 0;
  box-shadow: none;
  font-size: 16px;
}

.contact .php-email-form input::focus, .contact .php-email-form textarea::focus {
  background-color: #428bca;
}

.contact .php-email-form input {
  padding:24px 21px;
}

.contact .php-email-form textarea {
  padding: 12px 15px;
}

.contact .php-email-form button[type="submit"] {
  background: #428bca;
  border: 0;
  padding: 10px 24px;
  color: #fff;
  transition: 0.4s;
}

.contact .php-email-form button[type="submit"]:hover {
  background: #6aa3d5;
}

@-webkit-keyframes animate-loading {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

@keyframes animate-loading {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
.bx {
    font-family: 'boxicons'!important;
    font-weight: normal;
    font-style: normal;
    font-variant: normal;
    line-height: 1;
    display: inline-block;
    text-transform: none;
    speak: none;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}


  </style>

  </head>
  <body>
      <br>
      <br>
 
 <div class="row">
        <div class="col-md-3">
           
        </div>
        <div class="col-md-6" style="border:1px solid #45526e; border-radius: 5px;box-shadow: 3px 5px 8px 2px;margin: 48px 0px 36px 0px;">
            <center>
                <img src="../images/2.gif" class="rounded" alt="Cinque Terre" style="height:100px">

                <h4 style="margin: 48px 0px 36px 0px;">Thank you</h4>
                <h4 style="margin: 48px 0px 36px 0px;">Your submission has been received.</h4>
                <button type="button" class="btn btn-primary"><a href="https://travelsasaservice.com/csr-new/">Go Back</a></button>

            </center>
            <span id="timer"></span>
        </div>
        <div class="col-md-3">
           
        </div>
    </div>
    
     <script type="text/javascript">
        var count = 5;
        var redirect = "https://travelsasaservice.com/csr-new";
        function countDown() {
            var timer = document.getElementById("timer");
            if (count > 0) {
                count--;
                // timer.innerHTML = "This page will redirect in " + count + " seconds.";
                setTimeout("countDown()", 1000);
            } else {
                window.location.href = redirect;
            }
        }
        countDown();
    </script>



     

<body>

  <!-- validate -->
    

  





  


  
<?php include '../footer.php';?>

