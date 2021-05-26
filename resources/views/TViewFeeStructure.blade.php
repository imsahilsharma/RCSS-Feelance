@extends("layoutStudent")
@section("content")
				<!-- Main -->
					<article id="main">
						<header style="background: linear-gradient(90deg, #1CB5E0 0%, #000851 100%);">
							<h2>Fee Structure</h2>
							<p>Rajagiri College of Social Sciences(Autonomous)</p>
						</header>
						<section class="wrapper style5">
							<div class="inner">
							<div class="table-wrapper">
										<table>
											<thead>
												<tr>
													
													<th>COURSE</th>
													<th>COURSE FEE</th>
													<th>TUTION FEE</th>
													<th>VAEP FEE</th>
													<th>TOTAL</th>
												</tr>
											</thead>
											<tbody>
											@foreach($fee as $f)
												<tr>
													
													<td>{{ $f->course }}</td>
													<td>{{ $f->coursefee }}</td>
													<td>{{ $f->tutionfee }}</td>
													<td>{{ $f->vaepfee }}</td>
													<td>{{ $f->total }}</td>
													
												</tr>
											@endforeach
											</tbody>											
										</table>
									</div>
					
								
					
								</div>
						</section>
					</article>
@endsection