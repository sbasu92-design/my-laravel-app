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
            <h1 class="m-0">Category List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             <a  href="{{ route('admin.addcategory') }}" class="btn btn-primary"> Add New Category </a>
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
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Meta Title</th>
                    <th>Meta Description</th>
                    <th>Meta Keyword</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                  @foreach($getRecord as $record)

                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$record->name}} </td>
                    <td>{{$record->slug}}</td>
                    <td>{{$record->meta_title}}</td>
                    <td>{{$record->meta_description}}</td>
                    <td>{{$record->meta_keyword}}</td>
                    <td>{{ ($record->status== 1) ? 'Active' : 'Inactive'}}</td>
                    <td>
                  
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Sl No.</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Meta Title</th>
                    <th>Meta Description</th>
                    <th>Meta Keyword</th>
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