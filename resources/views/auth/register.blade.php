
<!DOCTYPE html>
<html>
<head>
	<title>Sign Up in to AceLearningPluse</title>
      
	<!--login form start-->

	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="styles.css">
    
    <!--login form start-->
    <style>
        @import url('https://fonts.googleapis.com/css?family=Numans');

html,body{
background-image: url('public/images/logo/login.jpg');
background-size: cover;
background-repeat: no-repeat;
height: 100%;
font-family: 'Numans', sans-serif;
}

.container{
height: 100%;
align-content: center;
}

.card{
height: 370px;
margin-top: auto;
margin-bottom: auto;
width: 400px;
height: 530px;
background-color: rgba(0,0,0,0.5) !important;
}

.social_icon span{
font-size: 60px;
margin-left: 10px;
color: #FFC312;
}

.social_icon span:hover{
color: white;
cursor: pointer;
}

.card-header h3{
color: white;
}

.social_icon{
position: absolute;
right: 20px;
top: -45px;
}

.input-group-prepend span{
width: 50px;
background-color: #FFC312;
color: black;
border:0 !important;
}

input:focus{
outline: 0 0 0 0  !important;
box-shadow: 0 0 0 0 !important;

}

.remember{
color: white;
}

.remember input
{
width: 20px;
height: 20px;
margin-left: 15px;
margin-right: 5px;
}

.login_btn{
color: black;
background-color: #FFC312;
width: 100px;
}

.login_btn:hover{
color: black;
background-color: white;
}

.links{
color: white;
}

.links a{
margin-left: 4px;
}
    </style>
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign Up</h3>
			</div>
			<div class="card-body">
                <form method="POST" action="{{route('register')}}" id="signup-form" class="signup-form" enctype="multipart/form-data">
                    @csrf
					@if ($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					<div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input name="role" class="form-control" type="text" list="browsers" required placeholder="Enter User Type" />
                            <datalist id="browsers">
                            <option value="admin">
                            <option value="user">
                            </datalist>
                            @error('role')
                            <span
                            class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
					</div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input class="form-control  @error('name') is-invalid @enderror" name="name" id="name"  value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter Your Name" type="text" required placeholder="Enter Your Name" />
                        @error('name')
                        <span
                        class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                        <input class="form-control  @error('phone') is-invalid @enderror" name="phone" id="phone"  value="{{ old('phone') }}" required autocomplete="phone" autofocus  type="tel" required placeholder="Enter Your Phone Number" />
                        @error('phone')
                        <span
                        class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input class="form-control  @error('email') is-invalid @enderror" name="email" id="email"  value="{{ old('email') }}" required autocomplete="email" autofocus  type="email" required placeholder="Enter Your Email" />
                        @error('email')
                        <span
                        class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input class="form-control  @error('password') is-invalid @enderror" name="password" id="password"  value="{{ old('password') }}" required autocomplete="password" autofocus  type="password" required placeholder="Enter Your Password" />
                        @error('password')
                        <span
                        class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Your Password">
                        @error('password_confirmation')
                        <span
                        class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

					{{-- <div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div> --}}
					<div class="form-group">
						<input type="submit" value="Sign up" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			    <div class="card-footer">
				<div class="d-flex justify-content-center links">
                    Do you have an account?<a href="{{route('login')}} "> <span class="text-warning" >Loing Here</span></a>
				</div>
				{{-- <div class="d-flex justify-content-center">
					<a href="#">Forgot your password?</a>
				</div> --}}
			</div>
		</div>
	</div>
</div>
</body>
</html>






















