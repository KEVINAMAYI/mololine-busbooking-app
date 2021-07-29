@extends('../admin/layouts.app',['pageTitle' => 'Edit User Details'])


@section('content')

 <!-- Register user modal -->
 <div class="container">

<div class="row px-1">
    <a href="/admin/users" class="btn btn-lg btn-success mt-3 mx-2 mb-3" > <i class="fas fa-arrow-left text-white pr-2"></i>Back</a>
    </div>

 <div class="row justify-content-center">
    <div class="col-md-9 mt-3 mb-3">
      <div class="card card-default">
        <div class="card-header">
          <h4 class="modal-title ml-3">Edit User</h4>
        </div>  
        
        {{-- display error on top of the form --}}
        @if ($errors->any())
        <div class="alert alert-info pl-2 pr-2 pt-2 pb-2 mt-3 ml-3 mr-3 mb-3">
            <ul class="list-group">
                @foreach ($errors->all() as $error )
                <li class="list-group-item text-red">
                  {{ $error }}  
                </li>
                @endforeach
            </ul>
        </div>
        @endif

         {{-- form for registering user --}}
          <form  method="POST" action="/admin/updateuser/{{ $user->id }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Name" required value="{{ $user->name }}">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control"  placeholder="Enter email" required value="{{ $user->email }}">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Phone Number</label>
                <input type="number" name="phonenumber" class="form-control"  placeholder="Enter phone number" required value="{{ $user->phonenumber }}">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"  placeholder="Password" required >
              </div>
              <div class="form-group">
                <label for="password">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Picture</label>
                <div class="form-group row">
                  <div class="col-md-12 ">
                      <input id="avatar" type="file" class="form-control" name="image" required value="{{ $user->avatar_name }}">
                  </div>
              </div>
              </div>
              <div class="form-group">
                <label>Role</label>
                <select class="select2 pt-2 pb-2 pl-2" name="role" data-placeholder="Select a Role" style="width: 100%;" required>
                  <option>{{ $user->role }}</option>
                  <option>Admin</option>
                </select>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit"  class="btn btn-success btn-large" style="width:100%; font-weight:bold; font-size:20px; margin-top:-30px;">Submit</button>
            </div>
          </form>  
      </div>
    </div>
 </div>
  
@endsection