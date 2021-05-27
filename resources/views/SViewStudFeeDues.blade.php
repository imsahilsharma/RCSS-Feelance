@extends("layoutStaff")
@section("content")
				<!-- Main -->
					<article id="main">
						<header style="background: linear-gradient(90deg, #1CB5E0 0%, #000851 100%);">
							<h2>Fee Dues</h2>
							<p>Rajagiri College of Social Sciences(Autonomous)</p>
						</header>
						<section class="wrapper style5">
							<div class="inner">
					
						<div class="table-wrapper">
										<table>
											<thead>
												<tr>
													<th>NAME</th>
													<th>EMAIL</th>
													<th>COURSE</th>
													<th>PAID</th>
													<th>DUE</th>
													<th>REMINDER</th>
												</tr>
											</thead>
											<tbody>
											@foreach($dues as $due)
												<tr>													
													<td>{{ $due->name }}</td>
													<td>{{ $due->email }}</td>
													<td>{{ $due->course }}</td>
													<td>{{ $due->paid }}</td>
													<td>{{ $due->due }}</td>
													<td><a href="/reminder/{{$due->id}}/" style="color: #1a1aff;">Send</a></td>
												</tr>
											@endforeach
											</tbody>											
										</table>
									</div>


							</div>
						</section>
					</article>
					
@endsection