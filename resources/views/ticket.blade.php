<?php

$seatnumber = $_GET['seatnumber'];
$vehiclenumber = $_GET['vehiclenumber'];
$from = $_GET['from'];
$to = $_GET['to'];
$travel_time = $_GET['travel_time'];
$amount_paid = $_GET['amountpaid'];

?>

@extends('layouts.app',['backgroundcolor' => 'rgb(241,245,246)'])

@section('content')

    <div class="container text-center">   
        <div class="row  justify-content-center pt-5 pb-4">
            <div class="col-lg-5">
                <div class="feature-car-rent-box-1">
                     <div class="card card-default" style="border:solid 1px grey;">
                         <div class="card-header" >
                              <p class="float-left pb-0" style="font-weight:bold; font-size:34px; margin-top:5px;">Mololine<p>
                              <div class="text-right" style=" margin-top:-5px;">
                                  <p style="font-size:18px; font-weight:bold; color:green;" style="">Ticket No:</p>   
                                  <p style="margin-top:-20px; margin-right:3px;">TRET2321</p> 
                              </div>
                                
                         </div>
                         <div class="card-body" style="text-align:left">
                            <h5 style="font-weight:bold; color:green;">Customer Info</h5>
                            <div><span>Customer Name : </span><span> Kevin Amayi</span></div>
                            <div><span>Customer ID : </span><span> 34643511</span></div>
                            <div><span>Seat Number : </span><span><?php echo $seatnumber; ?></span></div>
                            <hr style="width:100%">
                            <h5 style="font-weight:bold; color:green;">Trave Info</h5>
                            <div><span>From  : </span><span> <?php echo $from; ?></span></div>
                            <div><span>To : </span><span> <?php echo $to; ?></span></div>
                            {{-- <div><span>Pickup Station : </span><span> Afya Center </span></div>
                            <div><span>Alight Station : </span><span> Thika </span></div> --}}
                            <div><span>Vehicle Number : </span><span> <?php echo $vehiclenumber;?> </span></div>
                            <div><span>Travel Time : </span><span> <?php echo $travel_time; ?> </span></div>
                            <hr style="width:100%">
                            <h5 style="font-weight:bold; color:green;">Amount Paid  <span style="float:right;">KSH <?php echo"  $amount_paid";?></span> </h5>
                            <button id="printbtn" class="btn btn-info hidden-print" onclick="printTicket()"><span  aria-hidden="true"></span> Print</button>
                         </div>
                     </div>              
                </div>
              </div>
    
        </div>
    </div>
    
<@endsection

