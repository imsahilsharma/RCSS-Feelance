@extends("layoutStaff")
@section("content")
				<!-- Main -->
					<article id="main">
						<header style="background: linear-gradient(90deg, #1CB5E0 0%, #000851 100%);">
							<h2>Student Details</h2>
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
													<th>G LEVEL</th>
													<th>COURSE</th>
													<th>PHONE</th>
													<th>EMAIL ID</th>
												</tr>
											</thead>
											<tbody>
											@foreach($stus as $stu)
												<tr>
													<td>{{ $stu->id }}</td>
													<td>{{ $stu->name }}</td>
													<td>{{ $stu->glevel }}</td>
													<td>{{ $stu->course }}</td>
													<td>{{ $stu->phone }}</td>
													<td>{{ $stu->email }}</td>
													<td><a href="/studentdetail/{{$stu->id}}/edit" style="color: #1a1aff;">Update</a></td>
													<td><a href="/studentdetail/{{$stu->id}}/del" style="color: #ff1a1a;">Delete</a></td>
													
												</tr>
											@endforeach
											</tbody>											
										</table>
									</div>
									<div style="text-align: center;">
									<br>
									<a href="/AddStud" class="button primary" style="background: #003366; font-size: 16px;">
									Add New Student</a>
								</div>
								</div>
						</section>
					</article>

@endsection