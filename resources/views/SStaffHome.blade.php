@extends("layoutStaff")
@section("content")

				<!-- Main -->
					<article id="main">
					@foreach( $stfdet as $stf)
						<header style="background: linear-gradient(90deg, #1CB5E0 0%, #000851 100%);">
							<h2>Welcome {{$stf->name}} </h2>
							<p>{{$stf->designation}}, Accounts Department<br> Rajagiri College of Social Sciences(Autonomous)</p>
						</header>
						<section class="wrapper style5">
							<div class="inner">

							<div style="text-align: center;">
							<br>
							<p>Check Out New Payment Transaction, <a href="/StfViewPay" style="color:green;">Click here!!</a></p>
							<br>
							<p>For Checking Students Fee Dues, <a href="/StfViewDue" style="color:green;">Click here!!</a></p>
							<br>
							<p>Or else Generate Report with New Data, <a href="/StaffReport" style="color:green;">Click here!!</a></p>
							
							
							</div>

							</div>
						</section>
						@endforeach
					</article>

@endsection