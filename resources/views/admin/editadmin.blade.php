@extends('admin.layouts.app')
  <!-- Content Wrapper. Contains page content -->
  @section('style')  
  
  @endsection
   @section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
           
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <!-- <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div> -->
              <!-- /.card-header -->
              <!-- form start -->
              @include('admin.layouts._message')
              <form action="{{ route('admin.updateadmin',['id' => $admin->id]) }}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <input type="text" class="form-control" id="fullname" name="name" value="{{$admin->name}}" placeholder="Enter Name">
                    @error('name')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="InputEmail1">Email address</label>
                    <input type="email" class="form-control" id="InputEmail1" name="email" value="{{$admin->email}}" placeholder="Enter email">
                    @error('email')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                    <p>Do you want to chage the password so please add.</p>
                    @error('password')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                    <div class="form-group">
                        <label for="InputFile">Profile Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="InputFile" name="profile_image" accept="image/*" onchange="updateFileName()">
                                <label class="custom-file-label" for="InputFile">Choose file</label>
                            </div>
                        </div>
                        <p> <img src="{{ $admin->getProfileImageUrl() }}" 
                        alt="Profile Image" width="50" height="50" class="img-thumbnail"> </p>
                        @error('profile_image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                  </div>
                  <div class="fform-group">
                    <label  for="activestatus">Active Status</label>
                    <select  class="form-control" id="activestatus" name="is_active" placeholder="Enter Active Status">
                    <option value="" selected disabled>Select Data</option>
                      <option {{ ($admin->is_active ==1) ? 'selected' : '' }} value="1">Active</option>
                      <option {{ ($admin->is_active ==0) ? 'selected' : '' }} value="0">Deactive</option>
                    </select>
                    @error('is_active')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->






          </div>
          <!--/.col (left) -->

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

 
  </div>
  @endsection
  @section('script')  


  @endsection