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
						<h1><a href="/StaffHome">RCSS</a></h1>
						
					</header>

				<!-- Main -->
					<article id="main">
							
						<section class="wrapper style5">
							<div class="inner">
                            <h2 style="text-align:center">Rajagiri College of Social Sciences<br>(Autonomous)<br>Kalamassery, Kerala</h2>
							<br><br>
                            <p style="text-align:center;font-size:24px;"><strong><u>REPORT</u></strong></p>
						    
							<div class="row gtr-uniform">


<div class="col-6 col-12-xsmall" style="text-align: center;">
	<label style="color: #000851;">Total Fee Received</label>
</div>
<div class="col-6 col-12-xsmall" style="text-align: center;">
								<label style="color: #000851;">{{$totfee['0']->total_fee}}</label>
							</div>

							<div class="col-6 col-12-xsmall" style="text-align: center;">
	<label style="color: #000851;">Total No. of Students</label>
</div>
<div class="col-6 col-12-xsmall" style="text-align: center;">
								<label style="color: #000851;">{{$totstu['0']->total_stu}}</label>
							</div>

							<div class="col-6 col-12-xsmall" style="text-align: center;">
	<label style="color: red;">Total Fee Due</label>
</div>
<div class="col-6 col-12-xsmall" style="text-align: center;">
								<label style="color: red;">{{$totdue['0']->total_due}}</label>
							</div>
							</div>
							<br><br>
							<p style="text-align:center;font-size:24px;"><strong><u>Course-wise Fee Report</u></strong></p>
							<div class="table-wrapper">
										<table>
											<thead>
												<tr>
													<th style="text-align:center;">COURSE</th>
													<th style="text-align:center;">TOTAL FEE RECEIVED</th>
												</tr>
											</thead>
											<tbody>
											@foreach($stf as $pay)
												<tr style="text-align:center;">
													<td>{{ $pay->course }}</td>
													<td>{{ $pay->total_fee }}</td>
												</tr>
											@endforeach
											</tbody>											
										</table>
									</div>
                            <div class="col-12" style="text-align:center;">
								<br><br>
								<a href="/StaffHome" class="button primary" onclick="window.print();" style="background: #003366; font-size: 16px;">Download Fee Report</a>
							</div>
                           
								</div>
						</section>
					</article>

				

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