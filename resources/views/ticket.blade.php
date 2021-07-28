<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

    <div class="container text-center">   
        <div class="row  justify-content-center pt-5 pb-4">
            <div class="col-lg-5">
                <div class="feature-car-rent-box-1">
                     <div class="card card-default" style="border:solid 1px grey;">
                         <div class="card-header" style="text-align:left;">
                            <div class="row">
                                <div class="col-md-6 pt-4">
                                    <h3>Mololine<h3>
                                </div>
                                <div class="col-md-6 pt-3">
                                    <p style="float:right; color:green;">Ticket Number</p>
                                    <p style="float:right; margin-top:-13px; font-weight:bold;">QRWGH1V3V</p>
                                </div>
                            </div>
                         </div>
                         <div class="card-body" style="text-align:left">
                            <h5 style="font-weight:bold; color:green;">Customer Info</h5>
                            <div><span>Customer Name : </span><span> Kevin Amayi</span></div>
                            <div><span>Customer ID : </span><span> 34643511</span></div>
                            <div><span>Seat Number : </span><span> 8 </span></div>
                            <hr style="width:100%">
                            <h5 style="font-weight:bold; color:green;">Trave Info</h5>
                            <div><span>From  : </span><span> Nairobi</span></div>
                            <div><span>To : </span><span> Nakuru</span></div>
                            <div><span>Pickup Station : </span><span> Afya Center </span></div>
                            <div><span>Alight Station : </span><span> Thika </span></div>
                            <div><span>Vehicle Number : </span><span> ARTDF345 </span></div>
                            <div><span>Travel Date : </span><span> 12/02/2021 </span></div>
                            <div><span>Travel Time : </span><span> 11:30am </span></div>
                            <hr style="width:100%">
                            <h5 style="font-weight:bold; color:green;">Amount Paid  <span style="float:right;">KSH 800</span> </h5>
                            <button id="printbtn" class="btn btn-info hidden-print" onclick="printTicket()"><span  aria-hidden="true"></span> Print</button>
                         </div>
                     </div>              
                </div>
              </div>
    
        </div>
    </div>
    
<script>
    function printTicket() {
    var printbtn = document.getElementById('printbtn');
    printbtn.style.visibility = 'hidden';
    window.print();
    printbtn.style.visibility = 'visible';
    window.location.href = 'http://localhost:8000/index';
    }
</script> 
    
</body>
</html>

