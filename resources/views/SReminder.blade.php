@extends("layoutStaff")
@section("content")
				<!-- Main -->
					<article id="main">
						<header style="background: linear-gradient(90deg, #1CB5E0 0%, #000851 100%);">
							<h2>Send Reminder</h2>
							<p>Rajagiri College of Social Sciences(Autonomous)</p>
						</header>
						<section class="wrapper style5" >
							<div class="inner">
								
								<form action="/feereminder" method="post" >
										<div class="row gtr-uniform">
											{{ csrf_field() }}
											<div class="col-6 col-12-xsmall" style="text-align: center;">
												<label for="stuid">Student ID</label>
											</div>
											<div class="col-6 col-12-xsmall">
												<input type="text" name="stuid" value="{{$remdisp->sid}}" style="text-align:center;" readonly/>
											</div>

											<div class="col-6 col-12-xsmall" style="text-align: center;">
												<label for="stuname">Student Name</label>
											</div>
											<div class="col-6 col-12-xsmall">
												<input type="text" name="stuname" value="{{$remdisp->name}}" style="text-align:center;" readonly/>
											</div>
											<div class="col-6 col-12-xsmall" style="text-align: center;">
												<label for="stumsg">Message</label>
											</div>
											<div class="col-6 col-12-xsmall">
											<textarea name="stumsg" rows="6">This is a reminder message to inform you that you have last 10 Days left to pay your dues. If failed to pay, then strict action can be taken. So, kindly pay the Fee Due amount asap.
											</textarea>
											</div>	
											
											<div class="col-12" style="text-align:center;">
												<br>
												<input type="submit" value="Send" class="primary" style="background: #003366; font-size: 16px;" />
											</div>
										</div>
									</form>
							</div>
						</section>
					</article>

@endsection