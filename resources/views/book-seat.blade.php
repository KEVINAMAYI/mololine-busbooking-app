@extends('layouts.app',['backgroundcolor' => 'rgb(241,245,246)'])

@section('content')

<div class="container text-center" style="background-color:rgb(241,245,246)">   
    <div class="row text-center justify-content-center pt-5 pb-4">
        <div class="col-lg-5">
            <div class="feature-car-rent-box-1">
                  <form class="text-left">
                      <div class="form-group">
                          <label style="font-weight:bold;">Customer Number</label>
                          <input type="text" class="form-control" placeholder="Name" style="border:solid 1px grey">
                      </div>
                      <div class="form-group">
                          <label style="font-weight:bold;">Customer ID Number</label>
                          <input type="text" class="form-control" placeholder="Name" style="border:solid 1px grey">
                      </div>
                      <div class="form-group">
                          <label style="font-weight:bold;">Vehicle Route</label>
                          <select class="form-select select2 pl-1" data-placeholder="Select a Role" style="width: 100%; height:50px;">
                            <option>Nairobi-Nakuru</option>
                            <option>Nairobi-Mombasa</option>
                            <option>Nairobi-Eldoret</option>
                            <option>Kisumu-Nairobi</option>
                          </select>
                        </div>
                      <div class="form-group">
                          <label style="font-weight:bold;">Vehicle Number</label>
                          <input type="text" class="form-control" placeholder="Name" style="border:solid 1px grey">
                      </div>
                      <div class="form-group">
                          <label style="font-weight:bold;">Seat Number (Available seats)</label>
                          <select class="form-select select2 pl-1" data-placeholder="Select a Role" style="width: 100%; height:50px;">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                              <option>6</option>
                              <option>7</option>
                              <option>8</option>
                              <option>9</option>
                              <option>10</option>
                              <option>11</option>
                              <option>12</option>
                          </select>
                      </div>
                         
                      <div class="form-group">
                          <label for="exampleInputPassword1" style="font-weight:bold;">Amount</label>
                          <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Amount" style="border:solid 1px grey;">
                      </div> 
                      <div class="form-group">
                        <label for="exampleInputPassword1" style="font-weight:bold;">Depature Date and Time</label>
                          <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Departure Date and Time" style="border:solid 1px grey;">
                     </div>
                      <div class="form-group">
                          <a href="/confirm-booking" type="submit" class="btn btn-success btn-large" style="width:100%; color:white; font-weight:bold; font-size:20px; margin-top:10px;">Continue</a>
                      </div>                      
                  </form>                
            </div>
          </div>

    </div>
</div>

@endsection