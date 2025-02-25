@extends('admin.layouts.list')
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
            <h1 class="m-0">Admin List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             <a  href="{{ route('admin.addadmin') }}" class="btn btn-primary"> Add New Admin </a>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          @include('admin.layouts._message')

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl No.</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                 @foreach($getRecord as $record)
                 

                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>  <img src="{{ $record->getProfileImageUrl() }}" 
                    alt="Profile Image" width="50" height="50" class="img-thumbnail"></td>
                    <td>{{$record->name}}</td>
                    <td>{{$record->email}}</td>
                    <td>{{ ($record->is_active== 1) ? 'Active' : 'Inactive'}}</td>
                    <td>
                    <a href="{{ route('admin.editadmin', ['id' => encrypt($record->id)]) }}" class="btn btn-primary">Edit</a>
                    <a  href="{{ route('admin.deleteadmin' , ['id' => encrypt($record->id)]) }}" onclick="return confirm('Are you sure you want to delete this record?');" class="btn btn-danger"> Delete </a>

                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Sl No.</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

 
  </div>
  @endsection
  @section('script')  
  

  @endsection