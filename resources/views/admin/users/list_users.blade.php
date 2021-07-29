@extends('../admin/layouts.app',['pageTitle' => 'Users'])

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row justify-content-end">
        <ol class="breadcrumb ">
          <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
          <li class="breadcrumb-item active">users</li>
        </ol>
     
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container">
<div class="row px-1">
  <a href="/admin/createuser" class="btn btn-lg btn-success  mx-2 mb-4" > <i class="fas fa-plus text-white pr-2"></i>Add user</a>
</div>

<div class="row">
  <div class="col-lg-12 px-3">
    <!-- /.card -->
<div class="card ">
  <div class="card-header">
    <h3 class="card-title">Here you can add, edit, delete users</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Avatar</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
                
        <tr>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td> {{ $user->phonenumber }}</td>
          <td><div class="image">
            <img src="{{ asset('user_images/'. $user->avatar_name ) }}" class="img-circle elevation-2" alt="User Image" width="50" height="50">
          </div>
        </td>
        <td>
          <a href="/admin/edit_user/{{ $user->id }}" class="btn btn-xs btn-info" style="font-weight:bold;"> Edit</a>
          <a href="/admin/deleteuser/{{ $user->id }}" class="btn btn-xs btn-danger" style="font-weight:bold;">Delete</a>
        </td>
        </tr>
            
        @endforeach
      
      </tbody>      
      <tfoot>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Avatar</th>
        <th>Action</th>
      </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.card-body -->
</div>
  </div>
</div>
</div>

@endsection