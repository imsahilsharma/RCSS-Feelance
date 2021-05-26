@extends("layoutStaff")
@section("content")
				<!-- Main -->
					<article id="main">
						<header style="background: linear-gradient(90deg, #1CB5E0 0%, #000851 100%);">
							<h2>Fee Structures</h2>
							<p>Rajagiri College of Social Sciences(Autonomous)</p>
						</header>
						<section class="wrapper style5">
							<div class="inner">
							<div class="table-wrapper">
										<table>
											<thead>
												<tr>
													<th>STAFF ID</th>
													<th>G LEVEL</th>
													<th>COURSE</th>
													<th>COURSE FEE</th>
													<th>TUTION FEE</th>
													<th>VAEP FEE</th>
													<th>TOTAL</th>
												</tr>
											</thead>
											<tbody>
											@foreach($fees as $fee)
												<tr>
													<td>{{ $fee->staffid }}</td>
													<td>{{ $fee->glevel }}</td>
													<td>{{ $fee->course }}</td>
													<td>{{ $fee->coursefee }}</td>
													<td>{{ $fee->tutionfee }}</td>
													<td>{{ $fee->vaepfee }}</td>
													<td>{{ $fee->total }}</td>
													<td><a href="/feedetail/{{$fee->id}}/del" style="color: #ff1a1a;">Delete</a></td>
													
												</tr>
											@endforeach
											</tbody>											
										</table>
									</div>
					
								<div style="text-align: center;">
									<br>
									<a href="/AddFee" class="button primary" style="background: #003366; font-size: 16px;">
									Add New Fee Structure</a>
								</div>
					
								</div>
						</section>
					</article>

@endsection