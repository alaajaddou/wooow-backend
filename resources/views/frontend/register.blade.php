<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<style>
	html, body {height: 100%;} body{font-family:roboto,sans-serif;background-image: linear-gradient(to right, #8E6801, #FEBE10);}p{color:#b3b3b3;font-weight:300}h1,h2,h3,h4,h5,h6,.h1,.h2,.h3,.h4,.h5,.h6{font-family:roboto,sans-serif}a{-webkit-transition:.3s all ease;-o-transition:.3s all ease;transition:.3s all ease}a:hover{text-decoration:none!important}.content{padding:7rem 0}h2{font-size:20px}.form-block{background:#fff;padding:60px;-webkit-box-shadow:0 2px 3px 0 rgba(0,0,0,.1);box-shadow:0 2px 3px 0 rgba(0,0,0,.1)}@media(max-width:991.98px){.form-block{padding:30px}}@media(max-width:991.98px){.content .bg{height:500px}}.content .contents,.content .bg{width:50%}@media(max-width:1199.98px){.content .contents,.content .bg{width:100%}}.content .contents .form-group,.content .bg .form-group{position:relative}.content .contents .form-group label,.content .bg .form-group label{position:absolute;top:50%;-webkit-transform:translateY(-50%);-ms-transform:translateY(-50%);transform:translateY(-50%);-webkit-transition:.3s all ease;-o-transition:.3s all ease;transition:.3s all ease}.content .contents .form-group input,.content .bg .form-group input{background:0 0;border-bottom:1px solid #ccc}.content .contents .form-group.first,.content .bg .form-group.first{border-top-left-radius:7px;border-top-right-radius:7px}.content .contents .form-group.last,.content .bg .form-group.last{border-bottom-left-radius:7px;border-bottom-right-radius:7px}.content .contents .form-group label,.content .bg .form-group label{font-size:12px;display:block;margin-bottom:0;color:#b3b3b3}.content .contents .form-group.focus,.content .bg .form-group.focus{background:#fff}.content .contents .form-group.field--not-empty label,.content .bg .form-group.field--not-empty label{margin-top:-25px}.content .contents .form-control,.content .bg .form-control{border:none;padding:0;font-size:20px;border-radius:0}.content .contents .form-control:active,.content .contents .form-control:focus,.content .bg .form-control:active,.content .bg .form-control:focus{outline:none;-webkit-box-shadow:none;box-shadow:none}.content .bg{background-size:cover;background-position:center}.content a{color:#888;text-decoration:underline}.content .btn{height:54px;padding-left:30px;padding-right:30px}.content .forgot-pass{position:relative;top:2px;font-size:14px}.content .btn-pill{border-radius:30px}.social-login a{text-decoration:none;position:relative;text-align:center;color:#fff;margin-bottom:10px;width:50px;height:50px;border-radius:50%;display:inline-block}.social-login a span{position:absolute;top:50%;left:50%;-webkit-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%)}.social-login a:hover{color:#fff}.social-login a.facebook{background:#3b5998}.social-login a.facebook:hover{background:#344e86}.social-login a.twitter{background:#1da1f2}.social-login a.twitter:hover{background:#0d95e8}.social-login a.google{background:#ea4335}.social-login a.google:hover{background:#e82e1e}.control{display:block;position:relative;padding-left:30px;margin-bottom:15px;cursor:pointer;font-size:14px}.control .caption{position:relative;top:.2rem;color:#888}.control input{position:absolute;z-index:-1;opacity:0}.control__indicator{position:absolute;top:2px;left:0;height:20px;width:20px;background:#e6e6e6;border-radius:4px}.control--radio .control__indicator{border-radius:50%}.control:hover input~.control__indicator,.control input:focus~.control__indicator{background:#ccc}.control input:checked~.control__indicator{background:#38d39f}.control:hover input:not([disabled]):checked~.control__indicator,.control input:checked:focus~.control__indicator{background:#4dd8a9}.control input:disabled~.control__indicator{background:#e6e6e6;opacity:.9;pointer-events:none}.control__indicator:after{font-family:icomoon;content:'\e5ca';position:absolute;display:none;font-size:16px;-webkit-transition:.3s all ease;-o-transition:.3s all ease;transition:.3s all ease}.control input:checked~.control__indicator:after{display:block;color:#fff}.control--checkbox .control__indicator:after{top:50%;left:50%;margin-top:-1px;-webkit-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%)}.control--checkbox input:disabled~.control__indicator:after{border-color:#7b7b7b}.control--checkbox input:disabled:checked~.control__indicator{background-color:#7e0cf5;opacity:.2}
	.line {
  width: 30%;
  height: 0;
  border-top: 1px solid #C4C4C4;
  margin: 3px;
  display:inline-block;
}
</style>
</head>
<body>
	<div class="container-fluid h-100">
		<div class="row justify-content-center align-items-center h-100">
			<div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
				<div class="form-block text-center">
					<div class="mb-4">
						<img src="{{ Voyager::Image(setting('site.logo')) }}" style="width: 60%; height: auto;" />
					</div>
					{{ Form::open(array('route' => 'create-user', 'method' => 'post')) }}
					{{ Form::token() }}
						<div class="form-group first">
							<label class="text-left" for="name">Name</label>
							<input type="text" class="form-control" id="name" name="name">
						</div>
						<div class="form-group">
							<label class="text-left" for="email">Email</label>
							<input type="text" class="form-control" id="email" name="email">
						</div>
						<div class="form-group">
							<label class="text-left" for="password">Password</label>
							<input type="password" class="form-control" id="password" name="password">
						</div>
						<div class="form-group last mb-5">
							<label class="text-left" for="password_confirmation">Confirm Password</label>
							<input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
						</div>
						<input type="submit" value="Register" class="btn btn-pill text-white btn-block btn-primary">
						@if(false)
						<span class="d-block text-center my-4 text-muted">
							<div class="line"></div>
							<div style="display:inline-block;"> or sign in with </div>
							<div class="line"></div>
						</span>
						<div class="social-login text-center">
							<a href="#" class="facebook">
								<span class="fa fa-facebook mr-3"></span>
							</a>
							<a href="#" class="twitter">
								<span class="fa fa-twitter mr-3"></span>
							</a>
							<a href="#" class="google">
								<span class="fa fa-google mr-3"></span>
							</a>
						</div>
						@endif
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
