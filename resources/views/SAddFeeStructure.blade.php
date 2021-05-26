@extends("layoutStaff")
@section("content")
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
					<script src="{{ asset('FeeStruct.js')}}"></script>

@endsection