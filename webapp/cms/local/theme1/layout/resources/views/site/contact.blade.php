@extends('layout::site.master')

@section('sIte_tItle','Home Page')
@section('addlinks')
<style>



.flex-w {
	display: -webkit-box;
	display: -webkit-flex;
	display: -moz-box;
	display: -ms-flexbox;
	display: flex;
	-webkit-flex-wrap: wrap;
	-moz-flex-wrap: wrap;
	-ms-flex-wrap: wrap;
	-o-flex-wrap: wrap;
	flex-wrap: wrap;
}
.dis-flex {
	display: -webkit-box;
	display: -webkit-flex;
	display: -moz-box;
	display: -ms-flexbox;
	display: flex;
}
.flex-col {
	display: -webkit-box;
	display: -webkit-flex;
	display: -moz-box;
	display: -ms-flexbox;
	display: flex;
	-webkit-flex-direction: column;
	-moz-flex-direction: column;
	-ms-flex-direction: column;
	-o-flex-direction: column;
	flex-direction: column;
}
.p-b-47 {
    padding-bottom: 47px;
}
.p-b-47 {padding-bottom: 47px;}
.p-r-25 {padding-right: 25px;}

/*//////////////////////////////////////////////////////////////////
[ FONT ]*/

@font-face {
  font-family: Poppins-Regular;
  src: url('../fonts/poppins/Poppins-Regular.ttf'); 
}

@font-face {
  font-family: Poppins-Medium;
  src: url('../fonts/poppins/Poppins-Medium.ttf'); 
}

@font-face {
  font-family: Poppins-Bold;
  src: url('../fonts/poppins/Poppins-Bold.ttf'); 
}

@font-face {
  font-family: Poppins-SemiBold;
  src: url('../fonts/poppins/Poppins-SemiBold.ttf'); 
}

@font-face {
  font-family: Montserrat-Bold;
  src: url('../fonts/montserrat/Montserrat-Bold.ttf'); 
}


/*//////////////////////////////////////////////////////////////////
[ RESTYLE TAG ]*/

* {
	margin: 0px; 
	padding: 0px; 
	box-sizing: border-box;
}



/*---------------------------------------------*/


a:focus {
	outline: none !important;
}

a:hover {
	text-decoration: none;
}

/*---------------------------------------------*/






/*---------------------------------------------*/
input {
	outline: none;
	border: none;
}

textarea {
  outline: none;
  border: none;
}

textarea:focus, input:focus {
  border-color: transparent !important;
}

input:focus::-webkit-input-placeholder { color:transparent; }
input:focus:-moz-placeholder { color:transparent; }
input:focus::-moz-placeholder { color:transparent; }
input:focus:-ms-input-placeholder { color:transparent; }

textarea:focus::-webkit-input-placeholder { color:transparent; }
textarea:focus:-moz-placeholder { color:transparent; }
textarea:focus::-moz-placeholder { color:transparent; }
textarea:focus:-ms-input-placeholder { color:transparent; }

input::-webkit-input-placeholder { color: #adadad;}
input:-moz-placeholder { color: #adadad;}
input::-moz-placeholder { color: #adadad;}
input:-ms-input-placeholder { color: #adadad;}

textarea::-webkit-input-placeholder { color: #adadad;}
textarea:-moz-placeholder { color: #adadad;}
textarea::-moz-placeholder { color: #adadad;}
textarea:-ms-input-placeholder { color: #adadad;}

/*---------------------------------------------*/
button {
	outline: none !important;
	border: none;
	background: transparent;
}

button:hover {
	cursor: pointer;
}

iframe {
	border: none !important;
}

/*//////////////////////////////////////////////////////////////////
[ utility ]*/

/*==================================================================
[ Text ]*/
.txt1 {
  font-family: Poppins-Regular;
  font-size: 18px;
  line-height: 1.2;
  color: #fff;
}

.txt2 {
  font-family: Poppins-Regular;
  font-size: 15px;
  line-height: 1.6;
  color: #999999;
}

.txt3 {
  font-family: Poppins-Regular;
  font-size: 15px;
  line-height: 1.6;
  color: brown;
}

/*==================================================================
[ Size ]*/
.size1 {
  width: 355px;
  max-width: 100%;
}

.size2 {
  width: calc(100% - 43px);
}


/*//////////////////////////////////////////////////////////////////
[ Contact ]*/

.container-contact100 {
  width: 100%;  
  min-height: 100vh;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  padding: 15px;
  background: #f2f2f2;
  
}

.wrap-contact100 {
  width: 1120px;
  background: #fff;
  overflow: hidden;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  align-items: stretch;
  flex-direction: row-reverse;

}

/*==================================================================
[ Contact more ]*/
.contact100-more {
  width: 50%;
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  position: relative;
  z-index: 1;
  padding: 30px 15px 0px 15px;
}

.contact100-more::before {
  content: "";
  display: block;
  position: absolute;
  z-index: -1;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  background: rgba(0,0,0,0.8);
}



/*==================================================================
[ Form ]*/

.contact100-form {
  width: 50%;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  padding: 56px 55px 63px 55px;
}

.contact100-form-title {
  width: 100%;
  display: block;
  font-family: Poppins-Regular;
  font-size: 30px;
  color: #333333;
  line-height: 1.2;
  text-align: center;
  padding-bottom: 33px;
}



/*------------------------------------------------------------------
[ Input ]*/

.wrap-input100 {
  width: 100%;
  position: relative;
  border: 1px solid #e6e6e6;
}

.rs1-wrap-input100,
.rs2-wrap-input100 {
  width: 50%;
}

.rs2-wrap-input100 {
  border-left: none;
}

.label-input100 {
  font-family: Poppins-Regular;
  font-size: 12px;
  color: #555555;
  line-height: 1.5;
  text-transform: uppercase;
  letter-spacing: 1px;
  
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  align-items: center;
  width: 100%;
  min-height: 55px;
  border: 1px solid #e6e6e6;
  border-bottom: none; 
  padding: 10px 25px;
  margin-top: 15px;
  margin-bottom: 0;
}

.input100 {
  display: block;
  width: 100%;
  background: transparent;
  font-family: Poppins-Regular;
  font-size: 18px;
  color: #666666;
  line-height: 1.2;
  padding: 0 25px;
}

input.input100 {
  height: 55px;
}


textarea.input100 {
  min-height: 139px;
  padding-top: 19px;
  padding-bottom: 15px;
}

/*---------------------------------------------*/

.focus-input100 {
  position: absolute;
  display: block;
  width: calc(100% + 2px);
  height: calc(100% + 2px);
  top: -1px;
  left: -1px;
  pointer-events: none;
  border: 1px solid Brown;

  visibility: hidden;
  opacity: 0;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;

  -webkit-transform: scaleX(1.1) scaleY(1.3);
  -moz-transform: scaleX(1.1) scaleY(1.3);
  -ms-transform: scaleX(1.1) scaleY(1.3);
  -o-transform: scaleX(1.1) scaleY(1.3);
  transform: scaleX(1.1) scaleY(1.3);
}

.input100:focus + .focus-input100 {
  visibility: visible;
  opacity: 1;

  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  -o-transform: scale(1);
  transform: scale(1);
}



/*------------------------------------------------------------------
[ Button ]*/
.container-contact100-form-btn {
  width: 100%;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  padding-top: 23px;
}

.contact100-form-btn {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 0 20px;
  min-width: 200px;
  height: 50px;
  border-radius: 2px;
  background: brown;

  font-family: Montserrat-Bold;
  font-size: 12px;
  color: #fff;
  line-height: 1.2;
  text-transform: uppercase;
  letter-spacing: 1px;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}

.contact100-form-btn:hover {
  background: #333333;
}



/*------------------------------------------------------------------
[ Responsive ]*/

@media (max-width: 992px) {
  .contact100-form {
    width: 60%;
    padding: 56px 30px 63px 30px;
  }

  .contact100-more {
    width: 40%;
  }
}

@media (max-width: 768px) {
  .contact100-form {
    width: 100%;
  }

  .contact100-more {
    width: 100%;
  }
}

@media (max-width: 576px) {
  .contact100-form {
    padding: 56px 15px 63px 15px;
  }

  .rs1-wrap-input100,
  .rs2-wrap-input100 {
    width: 100%;
  }

  .rs2-wrap-input100 {
    border-left: 1px solid #e6e6e6;
    border-top: none;
  }
}


/*------------------------------------------------------------------
[ Alert validate ]*/

.validate-input {
  position: relative;
}

.alert-validate::before {
  content: attr(data-validate);
  position: absolute;
  max-width: 70%;
  background-color: #fff;
  border: 1px solid #c80000;
  border-radius: 2px;
  padding: 4px 25px 4px 10px;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  transform: translateY(-50%);
  right: 2px;
  pointer-events: none;

  font-family: Poppins-Regular;
  color: #c80000;
  font-size: 13px;
  line-height: 1.4;
  text-align: left;

  visibility: hidden;
  opacity: 0;

  -webkit-transition: opacity 0.4s;
  -o-transition: opacity 0.4s;
  -moz-transition: opacity 0.4s;
  transition: opacity 0.4s;
}

.alert-validate::after {
  content: "\f12a";
  font-family: FontAwesome;
  display: block;
  position: absolute;
  color: #c80000;
  font-size: 16px;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  transform: translateY(-50%);
  right: 8px;
}

.alert-validate:hover:before {
  visibility: visible;
  opacity: 1;
}

@media (max-width: 992px) {
  .alert-validate::before {
    visibility: visible;
    opacity: 1;
  }
}

</style>
@endsection
@section('body')
<section class="banner-area relative" id="home">	
    <div class="overlay overlay-bg"></div>
    <div class="container">				
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Contact Us				
                </h1>	
                <p class="text-white link-nav"><a href="{{url('/')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="#"> Contact Us</a></p>
            </div>	
        </div>
    </div>
</section>

<div class="container-contact100" style="padding:50px 0 50px 0;">
	  
		<div class="wrap-contact100">
		  
			<form class="contact100-form validate-form" action="{{url('contact-action')}}" method="post" name="form" id="contact-form" class="contact-form" novalidate="novalidate">
            {{ csrf_field() }}
				<span class="contact100-form-title">
					Send Us A Message
				</span>

				<div> 
                    <span id="super"></span>
                    <div class="alert alert-danger display-error" style="display: none; width: 150%;" ></div>
                </div>
				<label class="label-input100" for="first-name">Tell us your name *</label>
				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Type first name">
					<input id="name9" class="input100" type="text" name="first-name" placeholder="First name">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 rs2-wrap-input100 validate-input" data-validate="Type last name">
					<input class="input100" type="text" name="last-name" placeholder="Last name">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="email">Enter your email *</label>
				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<input id="email9" class="input100" type="text" name="email" placeholder="Eg. example@email.com">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="phone">Enter phone number</label>
				<div class="wrap-input100">
					<input id="mobile9" class="input100" type="text" name="phone" placeholder="Eg. +91 8899776655">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="message">Message *</label>
				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<textarea id="comments9" class="input100" name="message" placeholder="Write us a message"></textarea>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn" type="submit"  id="submit"name="submit-form">
						Send Message
					</button>
					<div id="loading" style="display:none"><img src="../images/ajax-loader.png" alt="loading"></div>
											<div class="contact-form-message"></div>
				</div>
			</form>

			<div class="contact100-more flex-col-c-m" style="background-image: url('../img/p1.jpg');padding: 11rem 0 0 8rem;">
				<div class="flex-w size1 p-b-47" >
					<div class="txt1 p-r-25">
						<span class="lnr lnr-map-marker"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Address
						</span>

						<span class="txt2">
							Mada Center 8th floor, 379 Hudson St, New York, NY 10018 US
						</span>
					</div>
				</div>

				<div class="dis-flex size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-phone-handset"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Lets Talk
						</span>

						<span class="txt2">
					+91 9000303003 
						</span>
					</div>
				</div>

				<div class="dis-flex size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-envelope"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							General Support
						</span>

						<span class="txt2">
						krishnareddyk@yahoo.com
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection