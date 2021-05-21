<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RCSS - Fee Payment</title>
</head>
<body>
   <!-- Header -->
   <header id="header" class="alt">
						<h1><a href="/">RCSS</a></h1>
						<nav id="nav">
							<ul>
								<li class="special">
									<a href="#menu" class="menuToggle"><span>Menu</span></a>
									<div id="menu">
										<ul>
											<li><a href="/">Home</a></li>
											<li><a href="/generic">Generic</a></li>
											<li><a href="/elements">Elements</a></li>
											<li><a href="#">Sign Up</a></li>
											<li><a href="/login">Log In</a></li>
										</ul>
									</div>
								</li>
							</ul>
						</nav>
					</header>

                     @yield("content") 

        <!-- Scripts -->
			<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
			<script src="{{ asset('assets/js/jquery.scrollex.min.js') }}"></script>
			<script src="{{ asset('assets/js/jquery.scrolly.min.js') }}"></script>
			<script src="{{ asset('assets/js/browser.min.js') }}"></script>
			<script src="{{ asset('assets/js/breakpoints.min.js') }}"></script>
			<script src="{{ asset('assets/js/util.js') }}"></script>
			<script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>