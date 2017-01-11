<!DOCTYPE html>
<html>
    <head>
        <title>Admin Panel Login.</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
        
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="login-page">
				  <div class="form">
					<form class="register-form">
					  <input type="text" placeholder="name"/>
					  <input type="password" placeholder="password"/>
					  <input type="text" placeholder="email address"/>
					  <button>create</button>
					  <p class="message">Already registered? <a href="#">Sign In</a></p>
					</form>
					<form class="login-form">
					  <input type="text" placeholder="username"/>
					  <input type="password" placeholder="password"/>
					  <button>login</button>
					  <p class="message">Not registered? <a href="#">Create an account</a></p>
					</form>
				  </div>
				</div>
        </div>
    </body>
</html>
