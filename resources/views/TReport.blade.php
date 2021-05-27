<!DOCTYPE HTML>
<html>
	<head>
		<title>RCSS - Student Report</title>
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
						<h1><a href="/StudentHome">RCSS</a></h1>
						
					</header>

				<!-- Main -->
					<article id="main">
							
						<section class="wrapper style5">
							<div class="inner">
                            <h2 style="text-align:center">Rajagiri College of Social Sciences<br>(Autonomous)<br>Kalamassery, Kerala</h2>
							<br><br>
                            <p style="text-align:center;font-size:24px;"><strong><u>STUDENT FEE REPORT</u></strong></p>
						    
                            @foreach( $stud as $st)
                        <div class="row gtr-uniform">


                            <div class="col-6 col-12-xsmall" style="text-align: center;">
								<label style="color: #000851;">Student Name</label>
							</div>

							<div class="col-6 col-12-xsmall" style="text-align: center;">
								<label style="color: #000851;">{{$st->name}}</label>
							</div>

                            <div class="col-6 col-12-xsmall" style="text-align: center;">
								<label style="color: #000851;">Course</label>
							</div>

							<div class="col-6 col-12-xsmall" style="text-align: center;">
								<label style="color: #000851;">{{$st->course}}</label>
							</div>
							
                            <div class="col-6 col-12-xsmall" style="text-align: center;">
								<label style="color: #000851;">Email ID</label>
							</div>

							<div class="col-6 col-12-xsmall" style="text-align: center;">
								<label style="color: #000851;">{{$st->email}}</label>
							</div>

							<div class="col-6 col-12-xsmall" style="text-align: center;">
								<label style="color: #000851;">Total Course Fee(in Rs.)</label>
							</div>

							<div class="col-6 col-12-xsmall" style="text-align: center;">
								<label style="color: #000851;">{{$st->tot_fees}}</label>
							</div>

							<div class="col-6 col-12-xsmall" style="text-align: center;">
								<label style="color: #000851;">Fees Paid(in Rs.)</label>
							</div>

							<div class="col-6 col-12-xsmall" style="text-align: center;">
								<label style="color: #000851;">{{$st->paid}}</label>
							</div>

							<div class="col-6 col-12-xsmall" style="text-align: center;">
								<label style="color:red;">Due to be Paid(in Rs.)</label>
							</div>

							<div class="col-6 col-12-xsmall" style="text-align: center;">
								<label style="color:red;">{{$st->due}}</label>
							</div>
						</div>
                            @endforeach
							<br><br>
							<p style="text-align:center;font-size:24px;"><strong><u>Transaction Details</u></strong></p>
							<div class="table-wrapper">
										<table>
											<thead>
												<tr>
												
													<th>TRANSACTION ID</th>
													<th >DATE</th>
													<th>AMOUNT</th>
												</tr>
											</thead>
											<tbody>
											@foreach($stpays as $pay)
												<tr>
													
													<td>{{ $pay->transactionid }}</td>
													<td>{{ $pay->date }}</td>
													<td>{{ $pay->amount }}</td>
												</tr>
											@endforeach
											</tbody>											
										</table>
									</div>
                            <div class="col-12" style="text-align:center;">
								<br><br>
								<a href="/StudentHome" class="button primary" onclick="window.print();" style="background: #003366; font-size: 16px;">Download Fee Report</a>
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