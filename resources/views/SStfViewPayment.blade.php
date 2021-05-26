@extends("layoutStaff")
@section("content")
				<!-- Main -->
					<article id="main">
						<header style="background: linear-gradient(90deg, #1CB5E0 0%, #000851 100%);">
							<h2>Fee Payments</h2>
							<p>Rajagiri College of Social Sciences(Autonomous)</p>
						</header>
						<section class="wrapper style5">
							<div class="inner">
					
						<div class="table-wrapper">
										<table>
											<thead>
											<tr>
													<th>SID</th>
													<th>NAME</th>
													<th>EMAIL</th>
													<th>TRANSACTION ID</th>
													<th>DATE</th>
													<th>AMOUNT</th>
												</tr>
											</thead>
											<tbody>
											@foreach($sfpays as $pay)
												<tr>
													<td>{{ $pay->sid }}</td>
													<td>{{ $pay->name }}</td>
													<td>{{ $pay->email }}</td>
													<td>{{ $pay->transactionid }}</td>
													<td>{{ $pay->date }}</td>
													<td>{{ $pay->amount }}</td>
												</tr>
											@endforeach
											</tbody>											
										</table>
									</div>
								</div>
						</section>
					</article>

@endsection