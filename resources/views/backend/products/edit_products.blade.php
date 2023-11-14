@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ubah Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <form method="post" action="{{ route('products.update', $editData->id) }}">
            @csrf
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ubah <small>Products</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm">
                <div class="card-body">
                  <div class="form-group">
                    <label for="product_name">Product Name</label>
                    <input type="text" name="product_name" value="{{ $editData->product_name }}" class="form-control" required data-validation-required-message="This field is required">
                  </div>
                  <div class="form-group">
                    <label for="category_id">Category ID</label>
                    <input type="text" name="category_id" value="{{ $editData->category_id }}" class="form-control" required data-validation-required-message="This field is required">
                  </div>
                  <div class="form-group">
                    <label for="product_code">Products Code</label>
                    <input type="text" name="product_code" value="{{ $editData->product_code }}" class="form-control" required data-validation-required-message="This field is required">
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" value="{{ $editData->description }}" class="form-control" required data-validation-required-message="This field is required">
                  </div>
                  <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" name="price" value="{{ $editData->price }}" class="form-control" required data-validation-required-message="This field is required">
                  </div>
                  <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" name="stock" value="{{ $editData->stock }}" class="form-control" required data-validation-required-message="This field is required">
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
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection