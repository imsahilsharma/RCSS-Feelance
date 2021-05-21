function sum() {
    var txtFirstNumberValue = document.getElementById('coufee').value;
  var txtSecondNumberValue = document.getElementById('tutfee').value;
  var txtThirdNumberValue = document.getElementById('vaepfee').value;

  if (txtFirstNumberValue == "")
         txtFirstNumberValue = 0;
     if (txtSecondNumberValue == "")
         txtSecondNumberValue = 0;
  if (txtThirdNumberValue == "")
         txtThirdNumberValue = 0;

     var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue) + parseInt(txtThirdNumberValue);
     if (!isNaN(result)) {
         document.getElementById('tot').value = result;
     }
 }