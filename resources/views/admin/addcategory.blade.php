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
            <h1 class="m-0">Add Category</h1>
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
             
                <div class="card-body">
                @include('admin.layouts._message')
                <form action="{{ route('admin.isertcategory') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="catname">Category Name <span class="mandatory-span"> * </span></label>
                        <input type="text" class="form-control" id="catname" name="name" placeholder="Enter Category Name">
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    </div>
                 <div class="col-md-6">
                  <div class="form-group">
                    <label for="slug"> Slug <span class="mandatory-span"> * </span></label>
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter Slug">
                    @error('slug')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label  for="status">Status <span class="mandatory-span"> * </span> </label>
                    <select  class="form-control" id="status" name="status" placeholder="Enter Active Status">
                    <option value="" selected disabled>Select Data</option>
                      <option value="1">Active</option>
                      <option value="0">Deactive</option>
                    </select>
                    @error('status')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                 </div>

                 <div class="col-md-6">
                    <div class="form-group">
                        <label for="metatitle">Meta Title </label>
                        <input type="text" class="form-control" id="metatitle" name="metatitle" placeholder="Enter Meta Title">
                       
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="metadescription">Meta Description </label>
                       
                        <textarea class="form-control" id="metadescription" name="metadescription" placeholder="Enter Meta Title" ></textarea>
                       
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="metakeyword">Meta Keyword </label>
                        <input type="text" class="form-control" id="metakeyword" name="metakeyword" placeholder="Enter Meta Keyword">
                       
                    </div>
                </div>

                
                
                

                </div>
                <!-- /.card-body -->
                </div>
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