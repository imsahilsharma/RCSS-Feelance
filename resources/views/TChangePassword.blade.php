@extends("layoutStudent")
@section("content")
				<!-- Main -->
					<article id="main">
						<header style="background: linear-gradient(90deg, #1CB5E0 0%, #000851 100%);">
							<h2>Change Password</h2>
							<p>Rajagiri College of Social Sciences(Autonomous)</p>
						</header>
						<section class="wrapper style5">
							<div class="inner">
							@if(session()->has('message'))
							<div class="col-12 col-12-xsmall" style="text-align: center; background:#ccf5ac;">
    							<div class="alert alert-success" style="color: #11270b;">
        							{{ session()->get('message') }}
    							</div>
							</div>	
							@endif
							<br>
							<form action="\pchange" method="post">
							{{csrf_field()}}
							<div class="row gtr-uniform">
							
							<div class="col-6 col-12-xsmall" style="text-align: center;">
								<label style="color: #000851;">Current Password</label>
							</div>
							<div class="col-6 col-12-xsmall" style="text-align: center;">
								<input type="password" id="oldpass" style="text-align:center;" onkeyup='check();'/>
								<span id='stat'></span>
							</div>

							<div class="col-12 col-12-xsmall"><br>
								<hr style="border: 2px solid #000851;">
							</div>
							<div class="col-6 col-12-xsmall" style="text-align: center;">
								<label style="color: #000851;">New Password</label>
							</div>
							<div class="col-6 col-12-xsmall" style="text-align: center;">
								<input type="password" name="newpass" id="newpass" style="text-align:center;" onkeyup='comp_pass();' disabled/>
							</div>

							<div class="col-6 col-12-xsmall" style="text-align: center;">
								<label style="color: #000851;">Confirm Password</label>
							</div>
							<div class="col-6 col-12-xsmall" style="text-align: center;">
								<input type="password" name="cnfpass" id="cnfpass" style="text-align:center;" onkeyup='comp_pass();' disabled/>
								<span id='message'></span>
							</div>

							<div class="col-12" style="text-align:center;">
								<br>
								<button type="submit" href="" class="button primary" id="myBtn" style="background: #003366; font-size: 16px;" disabled > Update </button>
							</div>
							</div>
							</form>
							</div>
						</section>
					</article>

<script>
	var check = function() {
  if (document.getElementById('oldpass').value =="{{$cps->password}}") {
    document.getElementById('stat').style.color = 'green';
    document.getElementById('stat').innerHTML = 'Valid';
	document.getElementById('newpass').disabled=false;
	document.getElementById('cnfpass').disabled=false;

  } else {
    document.getElementById('stat').style.color = 'red';
    document.getElementById('stat').innerHTML = 'Invalid';
  }
}

var comp_pass = function() {
  if (document.getElementById('newpass').value ==
    document.getElementById('cnfpass').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Matching';
	document.getElementById('myBtn').disabled=false;

  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Not Matching';
	document.getElementById('myBtn').disabled=true;

  }
}
</script>
@endsection		