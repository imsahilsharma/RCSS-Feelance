<!DOCTYPE HTML>
<html>
	<head>
		<title>RCSS - Staff Details</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
		<noscript><link rel="stylesheet" href="{{ asset('assets/css/noscript.css') }}" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
				<header id="header">
						<h1><a href="/AdminHome">RCSS</a></h1>
						<nav id="nav">
							<ul>
								<li class="special">
									<a href="#menu" class="menuToggle"><span>Menu</span></a>
									<div id="menu">
										<ul>
											<li><a href="/AdminHome">Home</a></li>
											<li><a href="/ManageStaff">Staff</a></li>
											<li><a href="/ViewStud">Students</a></li>
											<li><a href="/ViewPay">Payment</a></li>
											<li><hr></li>
											<li><a href="/logout">Logout</a></li>
										</ul>
									</div>
								</li>
							</ul>
						</nav>
					</header>

				<!-- Main -->
					<article id="main">
						<header style="background: linear-gradient(90deg, #1CB5E0 0%, #000851 100%);">
							<h2>Staff Details</h2>
							<p>Accounts Department, Rajagiri College of Social Sciences(Autonomous)</p>
						</header>
						<section class="wrapper style5">
							<div class="inner">
							@if(Session::get('msg1'))
            <div class="alert alert-danger">
            {{Session::get('msg1')}}
            </div>
            @endif
						<div class="table-wrapper">
										<table>
											<thead>
												<tr>
													<th>ID</th>
													<th>NAME</th>
													<th>DESIGNATION</th>
													<th>GENDER</th>
													<th>PHONE</th>
													<th>EMAIL ID</th>
												</tr>
											</thead>
											
											<tbody>
											@foreach($stfs as $stf)
												<tr>
													<td>{{ $stf->id }}</td>
													<td>{{ $stf->name }}</td>
													<td>{{ $stf->designation }}</td>
													<td>{{ $stf->gender }}</td>
													<td>{{ $stf->phone }}</td>
													<td>{{ $stf->email }}</td>
													<td><a href="/staffdetail/{{$stf->id}}/edit" style="color: #1a1aff;">Update</a></td>
													<td><a href="/staffdetail/{{$stf->id}}/del" onclick="return confirm('Are you sure want to Delete? Click OK to Delete')" style="color: #ff1a1a;">Delete</a></td>
												</tr>
											@endforeach
											</tbody>											
										</table>
									</div>
									<div style="text-align: center;">
									<br>
									<a href="/AddStaff" class="button primary" style="background: #003366; font-size: 16px;">
									Add New Staff</a>
								</div>
								</div>
						</section>
					</article>

				<!-- Footer -->
					<footer id="footer">
						<ul class="icons">
							<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="#" class="icon brands fa-dribbble"><span class="label">Dribbble</span></a></li>
							<li><a href="#" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
						</ul>
						<ul class="copyright">
							<li>&copy; Untitled</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
						</ul>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
			<script src="{{ asset('assets/js/jquery.scrollex.min.js') }}"></script>
			<script src="{{ asset('assets/js/jquery.scrolly.min.js') }}"></script>
			<script src="{{ asset('assets/js/browser.min.js') }}"></script>
			<script src="{{ asset('assets/js/breakpoints.min.js') }}"></script>
			<script src="{{ asset('assets/js/util.js') }}"></script>
			<script src="{{ asset('assets/js/main.js') }}"></script>

	</body>
</html>