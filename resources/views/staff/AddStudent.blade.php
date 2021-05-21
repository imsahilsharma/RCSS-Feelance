<!DOCTYPE HTML>
<html>
	<head>
		<title>RCSS - Add Students</title>
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
						<h1><a href="/StaffHome">RCSS</a></h1>
						<nav id="nav">
							<ul>
								<li class="special">
									<a href="#menu" class="menuToggle"><span>Menu</span></a>
									<div id="menu">
										<ul>
											<li><a href="/StaffHome">Home</a></li>
											<li><a href="/ManageStud">Student</a></li>
											<li><a href="/ManageFee">Fees Structure</a></li>
											<li><a href="/StfViewPay">Payment</a></li>
											<li><a href="/StaffPrintRep">Report</a></li>
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
							<h2>Add New Student Detail</h2>
							<p>Rajagiri College of Social Sciences(Autonomous)</p>
						</header>
						<section class="wrapper style5" >
							<div class="inner">
								
								<form action="/ReadStu" method="post" >
										<div class="row gtr-uniform">
											{{ csrf_field() }}
											<div class="col-6 col-12-xsmall">
												<input type="text" name="stuname" value="" placeholder="Enter Student's Name" style="text-align:center;" />
											</div>

											<div class="col-6 col-12-xsmall">
												<input type="text" name="stuphone" value="" placeholder="Phone Number" style="text-align:center;"/>
											</div>
																					
											<div class="col-4 col-12-small">
												<input type="radio" name="stugen" id="male-gen" value="Male" checked>
												<label for="male-gen">Male</label>
											</div>
											<div class="col-4 col-12-small">
												<input type="radio" name="stugen" id="female-gen" value="Female">
												<label for="female-gen">Female</label>
											</div>
											<div class="col-4 col-12-small">
												<input type="radio" name="stugen" id="trans-gen" value="Transgender">
												<label for="trans-gen">Transgender</label>
											</div>

											<div class="col-12"  style="text-align: center;">
												<select name="stuglvl" id="stuglvl">
													<option selected="true" disabled="disabled">- Select Graduation Level -</option>
													<option value="UG">UG (Under-Graduate)</option>
													<option value="PG">PG (Post-Graduate)</option>
												</select>
											</div>

											<div class="col-12"  style="text-align: center;">
												<select name="stucourse" id="stucourse">
													<option selected="true" disabled="disabled">- Select Course -</option>
													@foreach($flattened as $f)
														<option value="{{$f->course}}">{{$f->course}}</option>
													@endforeach

												</select>
											</div>

											<div class="col-6 col-12-xsmall">
												<input type="email" name="stuemail" value="" placeholder="Email ID" style="text-align:center;"/>
											</div>

											<div class="col-6 col-12-xsmall">
												<input type="password" name="stupass" value="rcss123#" style="text-align:center;" onfocus="(this.type='text')" onblur="(this.type='password')" readonly/>
											</div>				
											
											<div class="col-12" style="text-align:center;">
												<br>
												<input type="submit" value="Add" class="primary" style="background: #003366; font-size: 16px;" />
												<input type="reset" value="Reset" class="primary" style="background: #003366; font-size: 16px;"/>
											</div>
										</div>
									</form>
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