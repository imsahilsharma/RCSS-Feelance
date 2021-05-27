<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Payment</title>
</head>
<body style="background: linear-gradient(90deg, #1CB5E0 0%, #000851 100%);">

   <div class="col-md-6 offset-md-3" >
                    <span class="anchor" id="formPayment"></span>
                    <hr class="my-4">

                    <!-- form card cc payment -->
                    <div class="card card-outline-secondary" style="border-radius:50px;">
                        <div class="card-body">
                            <h3 class="text-center">Credit Card Payment</h3>
                            <hr >
                            <div class="alert alert-info p-2 pb-3">
                                <a class="close font-weight-normal initialism" data-dismiss="alert" href="#"><samp>×</samp></a> 
                                Please DO NOT click Back or Refresh 
                            </div>
                            <form action="/paymentportal" method="post" class="form" role="form" autocomplete="off">
                            {{csrf_field() }}
                                <div class="form-group">
                                    <label for="cc_name">Card Holder's Name</label>
                                    <input type="text" class="form-control" id="cc_name" pattern="\w+ \w+.*" title="First and last name" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Card Number</label>
                                    <input type="text" class="form-control" autocomplete="off" maxlength="16" pattern="\d{16}" title="16 Digit Credit card number" required="">
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-12">Card Expiry</label>
                                    <div class="col-md-4">
                                        <select class="form-control" name="cc_exp_mo" size="0" >
                                            <option selected="true" disabled="disabled" >- Month -</option>
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control" name="cc_exp_yr" size="0">
                                            <option selected="true" disabled="disabled">- Year -</option>
                                            <option>2021</option>
                                            <option>2022</option>
                                            <option>2023</option>
                                            <option>2024</option>
                                            <option>2025</option>
                                            <option>2026</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="password" class="form-control" autocomplete="off" maxlength="3" pattern="\d{3}" title="Three digits at back of your card" required="" placeholder="CVV">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-4 col-12-small">
                                        <label for="fullpay">Full Payment</label>									    
                                        <input type="radio" name="payoption" id="fullpay" value="{{ $amt->Due }}" onclick="setText('fullpay');" checked>
							    	</div>
                                    <div class="col-4 col-12-small">
                                        <label for="custompay">Custom Pay</label>
										<input type="radio" name="payoption" id="custompay" value="" onclick="setText('custompay');" checked>
									</div>
                                </div>
                                <div class="row">
                                    <label class="col-md-12">Amount</label>
                                </div>
                                <div class="form-inline">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text">Rs.</span></div>
                                        <input type="text" name="payamt" class="form-control text-right" id="exampleInputAmount" onkeyup='check();' placeholder="X X X X" required>
                                        <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                        <span id='message'></span>

                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <a href="/StudentHome" class="btn btn-danger btn-lg btn-block" style="color: #fff;">Cancel</a>
                                    </div>
                                    <div class="col-md-6">
                                    <input type="submit" id="myBtn" value="Pay" class="btn btn-success btn-lg btn-block">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /form card cc payment -->
                
                <p class="copyright" style="text-align:center;padding:40px 0;color:#fff">Developed by DUMMY DESIGNS</a></p>
               
                <script type="text/javascript">
                   
                    function setText(target) {
                        var txt = document.getElementById(target);
                        var temp = txt.value;
                        var tf = document.getElementById("exampleInputAmount");
                        tf.value = temp;
                    }	

                    var check = function() {
                        if (document.getElementById('exampleInputAmount').value <= {{$amt->Due}} ) {
                            document.getElementById('message').style.color = 'green';
                            document.getElementById('message').innerHTML = 'Valid Amount';
                            document.getElementById("myBtn").disabled = false;
                        } else {
                            document.getElementById('message').style.color = 'red';
                            document.getElementById('message').innerHTML = 'Invalid Amount: Exceeding Due';
                            document.getElementById("myBtn").disabled = true;
                        }
                    }
                </script> 
        </body>
</html>