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

			



		
        <div class="col-12">       
            <table class="myclass">
                <thead>
                <tr class='bg-primary text-white'>
                  
				<th style="text-align:center;">Transction ID</th>
													<th style="text-align:center;">Date</th>
													<th style="text-align:center;">Amount</th>
                </tr>    
                </thead>
            <tbody>
          
                @php
                    $amount=0;
                    $count=0;
                @endphp                
@foreach($sales as $s)
   
<tr style="text-align:center;">
													<td>{{ $s->transactionid }}</td>
													<td>{{ $s->date }}</td>
													<td>{{ $s->amount }}</td>
												</tr>
@php
    $amount=$amount+$s->amount;
    $count=$count+1;
@endphp
@endforeach 

@if($sales->count() >0)
            <div class="alert alert-success" style="color: green;">
           Total Payment Received between Dates {{$dateStart}} and {{$dateEnd}} is {{$amount}} and Transaction Count is {{$count}}<br><br>
</div>
            @else
<div class="alert alert-danger" style="color: red;">
No Payments Found for  Dates between {{$dateStart}} and {{$dateEnd}} <br><br>
</div>
            @endif 


            
            </tbody>
            </table><br>
            <div style="text-align:center;">
			<a href="/StaffHome" class="button primary" onclick="window.print();" style="background: #003366; font-size: 16px;">Download Fee Report</a>
            </div>
           
           
        </div> 
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