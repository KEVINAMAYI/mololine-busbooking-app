@extends('../admin/layouts.app',['pageTitle' => 'Reports'])


@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2 justify-content-end">
          <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
            <li class="breadcrumb-item active">reports</li>
          </ol>
       
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

{{-- revenue --}}
<div class="row pt-3 pl-3">
    <div class="col-lg-6">

<!-- BAR CHART -->
<div class="card card-success">
    <div class="card-header">
      <h3 class="card-title">Monthly Bookings</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
      <div class="chart">
        <canvas id="barChart" style="min-height: 250px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
    </div>


    <div class="col-lg-6 pl-3">
    <!-- DONUT CHART -->
    <div class="card card-danger">
        <div class="card-header">
          <h3 class="card-title">Bookings per Route</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>

    
</div>

<div class="row pt-3 pl-3">
    <div class="col-lg-6">
        <!-- BAR CHART -->
        <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Monthly Revenue</h3>
        
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="chart">
                <canvas id="barChart2" style="min-height: 250px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      

        <div class="col-lg-6">
        <!-- PIE CHART -->
         <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title">Vehicles Per Route</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
                 

</div>




@endsection