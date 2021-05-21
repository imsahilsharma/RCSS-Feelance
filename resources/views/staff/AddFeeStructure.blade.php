<!DOCTYPE HTML>
<html>
	<head>
		<title>RCSS - Add Fee Structure</title>
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
							<h2>Add Fee Structure</h2>
							<p>Rajagiri College of Social Sciences(Autonomous)</p>
						</header>
						<section class="wrapper style5" >
							<div class="inner">
								
								<form action="/ReadFee" method="post" >
										<div class="row gtr-uniform">
											{{ csrf_field() }}
											
											<div class="col-12"  style="text-align: center;">
												<select name="fglvl" id="fglvl" required>
													<option selected="true" disabled="disabled">- Select Graduation Level -</option>
													<option value="UG">UG (Under-Graduate)</option>
													<option value="PG">PG (Post-Graduate)</option>
												</select>
											</div>

											<div class="col-12"  style="text-align: center;">
												<select name="fcourse" id="fcourse" required>
													<option selected="true" disabled="disabled">- Select Course -</option>
													<option value="MCA">MCA</option>
													<option value="MSC DA">MSC DA</option>
													<option value="MSW">MSW</option>
													<option value="BCOM CA">B.COM CA</option>
													<option value="BSW">BSW</option>
													<option value="BSC PSYCHOLOGY">BSC PSYCHOLOGY</option>

												</select>
											</div>
												
											<div class="col-12 col-12-xsmall" style="text-align: center;">
												<br><p style="color: #000; font-size: 32px;"><strong>Fee Details</strong></p>
											</div>

											<div class="col-6 col-12-xsmall" style="text-align: center;">
												<label for="coufee">Course Fee</label>
											</div>

											<div class="col-6 col-12-xsmall">
												<input type="text" name="coufee" id="coufee" onkeyup="sum();" style="text-align:center;" required/>
											</div>

											<div class="col-6 col-12-xsmall" style="text-align: center;">
												<label for="tutfee">Tution Fee</label>
											</div>

											<div class="col-6 col-12-xsmall">
												<input type="text" name="tutfee" id="tutfee" onkeyup="sum();" style="text-align:center;" required/>
											</div>
											
											<div class="col-6 col-12-xsmall" style="text-align: center;">
												<label for="vaepfee">Value Added & Employabilty Programmes Fee</label>
											</div>

											<div class="col-6 col-12-xsmall">
												<input type="text" name="vaepfee" id="vaepfee" onkeyup="sum();" style="text-align:center;" required/>
											</div>

											<div class="col-12 col-12-xsmall" style="text-align: center;"><hr></div>

											<div class="col-6 col-12-xsmall" style="text-align: center;">
												<label for="tot">Total</label>
											</div>

											<div class="col-6 col-12-xsmall">
												<input type="text" name="tot" id="tot" style="text-align:center;" readonly 	/>
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
			<script src="{{ asset('FeeStruct.js')}}"></script>

			

	</body>
</html>