<!DOCTYPE HTML>
<html>
	<head>
		<title>Fee-Payment</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
		<noscript><link rel="stylesheet" href="{{ asset('assets/css/noscript.css') }}" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="/AdminHome">RCSS</a></h1>
						<nav id="nav">
							<ul>
								<li class="special">
									<a href="#menu" class="menuToggle"><span>Menu</span></a>
									<div id="menu">
										<ul>
											<li><a href="/AdminHome">Home</a></li>
											<li><a href="/ManageStaff">Staff</a></li>
											<li><a href="/ViewStud">Students</a></li>
											<li><a href="/ViewPay">Payment</a></li>
											<li><hr></li>
											<li><a href="/logout">Logout</a></li>
										</ul>
									</div>
								</li>
							</ul>
						</nav>
					</header>

				<!-- Main -->
					<article id="main">
						<header style="background: linear-gradient(90deg, #1CB5E0 0%, #000851 100%);">
							<h2>Welcome, {{ $data->email }}</h2>
							<p>Rajagiri College of Social Sciences(Autonomous)</p>
						</header>
						<section class="wrapper style5">
							<div class="inner">

							<div class="row gtr-uniform">
							
							<div class="col-12 col-12-xsmall"><br>
								<p style="color: #000; font-size: 32px;"><strong>Fee Dues</strong></p>
							</div>
							
							<div class="col-6 col-12-xsmall" style="text-align: center;">
								<label style="color: #000851;">Total Students</label>
							</div>
							<div class="col-6 col-12-xsmall" style="text-align: center;">
								<label style="color: #000851;">{{$totstu['0']->total_stu}}</label>
							</div>

							<div class="col-6 col-12-xsmall" style="text-align: center;">
								<label style="color: #000851;">Total Staff</label>
							</div>
							<div class="col-6 col-12-xsmall" style="text-align: center;">
								<label style="color: #000851;">{{$totstf['0']->total_stf}}</label>
							</div>

							<div class="col-6 col-12-xsmall" style="text-align: center;">
								<label style="color: #000851;">Total Courses</label>
							</div>
							<div class="col-6 col-12-xsmall" style="text-align: center;">
								<label style="color: #000851;">{{$totfee['0']->total_fee}}</label>
							</div>

							</div>
						</section>
					</article>

				<!-- Footer -->
					<footer id="footer">
						<ul class="icons">
							<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="#" class="icon brands fa-dribbble"><span class="label">Dribbble</span></a></li>
							<li><a href="#" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
						</ul>
						<ul class="copyright">
							<li>&copy; Untitled</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
						</ul>
					</footer>

			</div>

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