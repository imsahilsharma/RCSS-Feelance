@extends("layoutStudent")
@section("content")
				<!-- Main -->
					<article id="main">
					@foreach( $stufeedues as $stu)
						<header style="background: linear-gradient(90deg, #1CB5E0 0%, #000851 100%);">
							<h2>Welcome {{$stu->name}}</h2>
							<p>{{$stu->course}}, Rajagiri College of Social Sciences(Autonomous)</p>
						</header>
						<section class="wrapper style5">
							<div class="inner">
							<div class="row gtr-uniform">
							@if( ! empty($msg))
							<div class="col-12 col-12-xsmall" style="outline: thick dashed red">
								<p style="color:red;">***** IMPORTANT *****<br>{{$msg->message}}</p>
							</div>
							@endif
							
							<div class="col-12 col-12-xsmall"><br>
								<p style="color: #000; font-size: 32px;"><strong>Fee Dues</strong></p>
							</div>
							
							<div class="col-6 col-12-xsmall" style="text-align: center;">
								<label style="color: #000851;">Email ID</label>
							</div>
							<div class="col-6 col-12-xsmall" style="text-align: center;">
								<label style="color: #000851;">{{$stu->email}}</label>
							</div>

							<div class="col-6 col-12-xsmall" style="text-align: center;">
								<label style="color: #000851;">Total Course Fee(in Rs.)</label>
							</div>
							<div class="col-6 col-12-xsmall" style="text-align: center;">
								<label style="color: #000851;">{{$stu->tot_fees}}</label>
							</div>

							<div class="col-6 col-12-xsmall" style="text-align: center;">
								<label style="color: #000851;">Fees Paid(in Rs.)</label>
							</div>
							<div class="col-6 col-12-xsmall" style="text-align: center;">
								<label style="color: #000851;">{{$stu->Paid}}</label>
							</div>

							<div class="col-6 col-12-xsmall" style="text-align: center;">
								<label style="color:red;">Due(in Rs.)</label>
							</div>
							<div class="col-6 col-12-xsmall" style="text-align: center;">
								<label style="color:red;">{{$stu->Due}}</label>
							</div>
							@endforeach
							<div class="col-12" style="text-align:center;">
								<br>
								<a href="/feepayment" class="button primary" style="background: #003366; font-size: 16px;"> Pay Now </a>
							</div>
							</div>
							</div>
						</section>
					</article>
@endsection		