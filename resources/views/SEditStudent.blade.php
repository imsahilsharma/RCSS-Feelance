@extends("layoutStaff")
@section("content")
				<!-- Main -->
					<article id="main">
						<header style="background: linear-gradient(90deg, #1CB5E0 0%, #000851 100%);">
							<h2>Add New Student Detail</h2>
							<p>Rajagiri College of Social Sciences(Autonomous)</p>
						</header>
						<section class="wrapper style5" >
							<div class="inner">
								
								<form action="/studenteditprocess/{{$stus->id}}/edit" method="post" >
										<div class="row gtr-uniform">
											{{ csrf_field() }}
											<div class="col-6 col-12-xsmall">
												<input type="text" name="stuname" value="{{ $stus->name }}" placeholder="Enter Student's Name" style="text-align:center;" />
											</div>

											<div class="col-6 col-12-xsmall">
												<input type="text" name="stuphone" value="{{ $stus->phone }}" placeholder="Phone Number" style="text-align:center;"/>
											</div>	
											
											<div class="col-12" style="text-align:center;">
												<br>
												<input type="submit" value="Update" class="primary" style="background: #003366; font-size: 16px;" />
												<input type="reset" value="Reset" class="primary" style="background: #003366; font-size: 16px;"/>
											</div>
										</div>
									</form>
							</div>
						</section>
					</article>

@endsection