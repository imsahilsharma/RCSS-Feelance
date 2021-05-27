@extends("layoutStaff")
@section("content")
				<!-- Main -->
					<article id="main">
						<header style="background: linear-gradient(90deg, #1CB5E0 0%, #000851 100%);">
							<h2>Reports</h2>
							<p>Rajagiri College of Social Sciences(Autonomous)</p>
						</header>
						<section class="wrapper style5">
							<div class="inner">
							<div style="text-align: center;">
							<div>
							<p>REPORT - 1</p>
							<a href="/AddStud" class="button primary" style="background: #003366; font-size: 16px;">Course Wise (For Clerks use)</a>
							</div><br>
							<div>
							<p>REPORT - 2</p>
							<a href="/StaffPaymentRep" class="button primary" style="background: #003366; font-size: 16px;">
							Payment Report (For Auditor and Accountants)</a>
							</div>
							<br><br>
							<p>REPORT - 3</p>
							</div>
						<form action="/report/show" method='get'>
        @csrf
        <div class="row">
           
            <div class="col-4">
            <div class="form-group">
                <div class="input-group date" id="date-start" data-target-input="nearest">
                        <input type="date" name='dateStart' class="form-control "/>
                    </div>
            </div>
            </div>
            <div class="col-4">
            	<div class="form-group">
           			<div class="input-group date" id="date-end" data-target-input="nearest">
                		<input type="date" name='dateEnd' class="form-control"/>
            		</div>
        		</div>            
            </div>
            <div class="col-4">
            	<input type="submit" value='Get Report' class="button primary" style="background: #003366; font-size: 16px;">								
            </div>
        </div>
        </form>

		
							
					
							</div>
						</section>
					</article>

@endsection