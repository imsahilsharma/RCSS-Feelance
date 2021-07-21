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
							@if(Session::get('msg1'))
            <div class="alert alert-danger" style="text-align: center; color:red;">
            {{Session::get('msg1')}}
            </div><br>
            @endif
								
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

@endsection