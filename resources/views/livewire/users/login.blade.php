<div>



    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- Include the above in your HEAD tag -->

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <div class="main">


        <div class="container">
    <center>
    <div class="middle">
          <div id="login">

            <form action="javascript:void(0);" method="get">

              <fieldset class="clearfix">

                <p ><span class="fa fa-user"></span><input type="text"  Placeholder="Username" required></p> <!-- JS because of IE support; better: placeholder="Username" -->
                <p><span class="fa fa-lock"></span><input type="password"  Placeholder="Password" required></p> <!-- JS because of IE support; better: placeholder="Password" -->

                 <div>
                                    <span style="width:48%; text-align:left;  display: inline-block;"><a class="small-text" href="#">Forgot
                                    password?</a></span>
                                    <span style="width:50%; text-align:right;  display: inline-block;"><input type="submit" value="Sign In"></span>
                                </div>

              </fieldset>
    <div class="clearfix"></div>
            </form>

            <div class="clearfix"></div>

          </div> <!-- end login -->
          <div class="logo">LOGO

              <div class="clearfix"></div>
          </div>

          </div>
    </center>
        </div>

    </div>



<style>
    @charset "utf-8";


@import url//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css);



div.main{
    background: #0264d6; /* Old browsers */
background: -moz-radial-gradient(center, ellipse cover,  #0264d6 1%, #1c2b5a 100%); /* FF3.6+ */
background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(1%,#0264d6), color-stop(100%,#1c2b5a)); /* Chrome,Safari4+ */
background: -webkit-radial-gradient(center, ellipse cover,  #0264d6 1%,#1c2b5a 100%); /* Chrome10+,Safari5.1+ */
background: -o-radial-gradient(center, ellipse cover,  #0264d6 1%,#1c2b5a 100%); /* Opera 12+ */
background: -ms-radial-gradient(center, ellipse cover,  #0264d6 1%,#1c2b5a 100%); /* IE10+ */
background: radial-gradient(ellipse at center,  #0264d6 1%,#1c2b5a 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#0264d6', endColorstr='#1c2b5a',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
height:calc(100vh);
width:100%;
}

[class*="fontawesome-"]:before {
  font-family: 'FontAwesome', sans-serif;
}

/* ---------- GENERAL ---------- */

* {
  box-sizing: border-box;
    margin:0px auto;

  &:before,
  &:after {
    box-sizing: border-box;
  }

}

body {

    color: #606468;
  font: 87.5%/1.5em 'Open Sans', sans-serif;
  margin: 0;
}

a {
	color: #eee;
	text-decoration: none;
}

a:hover {
	text-decoration: underline;
}

input {
	border: none;
	font-family: 'Open Sans', Arial, sans-serif;
	font-size: 14px;
	line-height: 1.5em;
	padding: 0;
	-webkit-appearance: none;
}

p {
	line-height: 1.5em;
}

.clearfix {
  *zoom: 1;

  &:before,
  &:after {
    content: ' ';
    display: table;
  }

  &:after {
    clear: both;
  }

}

.container {
  left: 50%;
  position: fixed;
  top: 50%;
  transform: translate(-50%, -50%);
}

/* ---------- LOGIN ---------- */

#login form{
	width: 250px;
}
#login, .logo{
    display:inline-block;
    width:40%;
}
#login{
border-right:1px solid #fff;
  padding: 0px 22px;
  width: 59%;
}
.logo{
color:#fff;
font-size:50px;
  line-height: 125px;
}

#login form span.fa {
	background-color: #fff;
	border-radius: 3px 0px 0px 3px;
	color: #000;
	display: block;
	float: left;
	height: 50px;
    font-size:24px;
	line-height: 50px;
	text-align: center;
	width: 50px;
}

#login form input {
	height: 50px;
}
fieldset{
    padding:0;
    border:0;
    margin: 0;

}
#login form input[type="text"], input[type="password"] {
	background-color: #fff;
	border-radius: 0px 3px 3px 0px;
	color: #000;
	margin-bottom: 1em;
	padding: 0 16px;
	width: 200px;
}

#login form input[type="submit"] {
  border-radius: 3px;
  -moz-border-radius: 3px;
  -webkit-border-radius: 3px;
  background-color: #000000;
  color: #eee;
  font-weight: bold;
  /* margin-bottom: 2em; */
  text-transform: uppercase;
  padding: 5px 10px;
  height: 30px;
}

#login form input[type="submit"]:hover {
	background-color: #d44179;
}

#login > p {
	text-align: center;
}

#login > p span {
	padding-left: 5px;
}
.middle {
  display: flex;
  width: 600px;
}
</style>
















    <!------- old Login
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" >


<section class="vh-100" style="background-color: #9A616D;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp"
                  alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">

                  <form  method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="d-flex align-items-center mb-3 pb-1">
                      <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                      <span class="h1 fw-bold mb-0">Logo</span>
                    </div>

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                    <div data-mdb-input-init class="form-outline mb-4">
                      <input  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                      <label class="form-label" for="form2Example17">Email address</label>
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                      <input  type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />
                      <label class="form-label" for="form2Example27">Password</label>
                      @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                    </div>

                    <div class="pt-1 mb-4">
                      <button data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-lg btn-block" type="button">Login</button>
                    </div>


                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script>

  !----------->
  </div>
