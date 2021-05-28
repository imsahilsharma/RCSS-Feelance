<!DOCTYPE HTML>
<html>
	<head>
		<title>RCSS - Staff Report</title>
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
						<h1><a href="/">RCSS</a></h1>
						
					</header>
				<!-- Main -->
					<article id="main">
						<header style="background: linear-gradient(90deg, #1CB5E0 0%, #000851 100%);">
							<h2>Forgot Password</h2>
							<p>Rajagiri College of Social Sciences(Autonomous)</p>
						</header>
						<section class="wrapper style5">
							<div class="inner">
							
							<form action="\submitfpass" method="post">
							{{csrf_field()}}
							<div class="row gtr-uniform">	
											
							<div class="col-12 col-12-xsmall" style="text-align: center;">
								<label style="color: #000851;">Enter Your Email ID</label>
							</div>
							<div class="col-12 col-12-xsmall" style="text-align: center;">
								<input type="eamil" name="email" style="text-align:center;" />
							</div>

							<div class="col-6 col-12-xsmall" style="text-align: center;">
								<label style="color: #000851;">New Password</label>
							</div>
							<div class="col-6 col-12-xsmall" style="text-align: center;">
								<input type="password" name="newpass" id="newpass" style="text-align:center;" onkeyup='comp_pass();' disabled/>
							</div>

							<div class="col-6 col-12-xsmall" style="text-align: center;">
								<label style="color: #000851;">Confirm Password</label>
							</div>
							<div class="col-6 col-12-xsmall" style="text-align: center;">
								<input type="password" name="cnfpass" id="cnfpass" style="text-align:center;" onkeyup='comp_pass();' disabled/>
								<span id='message'></span>
							</div>

							

							

							<div class="col-12" style="text-align:center;">
								<br>
								<button type="submit" href="" class="button primary" id="myBtn" style="background: #003366; font-size: 16px;"  > Submit </button>
							</div>
							</div>
							</form>
							</div>
						</section>
					</article>

			

					</div>
					<script>
	
var comp_pass = function() {
  if (document.getElementById('newpass').value ==
    document.getElementById('cnfpass').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Matching';
	document.getElementById('myBtn').disabled=false;

  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Not Matching';
	document.getElementById('myBtn').disabled=true;

  }
}
</script>
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