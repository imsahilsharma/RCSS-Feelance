@extends("layoutStudent")
@section("content")
				<!-- Main -->
					<article id="main">
						<header style="background: linear-gradient(90deg, #1CB5E0 0%, #000851 100%);">
							<h2>Payment Transactions</h2>
							<p>Rajagiri College of Social Sciences(Autonomous)</p>
						</header>
						<section class="wrapper style5">
							<div class="inner">
					
						<div class="table-wrapper">
										<table>
											<thead>
												<tr>
													<th>PAYMENT ID</th>
													<th>TRANSACTION ID</th>
													<th>DATE</th>
													<th>AMOUNT</th>
												</tr>
											</thead>
											<tbody>
											@foreach($stpays as $pay)
												<tr>
													<td >{{ $pay->id }}</td>
													<td>{{ $pay->transactionid }}</td>
													<td>{{ $pay->date }}</td>
													<td>{{ $pay->amount }}</td>
												</tr>
											@endforeach
											<p id="error"></p>
											</tbody>											
										</table>
									</div>
								</div>
						</section>
					</article>
@endsection