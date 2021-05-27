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
							<h3><a href="/StaffPrintRep">Course Wise Report</a></h3><br><br>
							<h3><a href="/StaffPaymentRep">Payment Report (For Auditor and Accountants)</a></h3>
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
            <input type="submit" value='Get Report' class=' btn btn-success'>
            </div>
        </div>
        </form>
					
							</div>
						</section>
					</article>

@endsection