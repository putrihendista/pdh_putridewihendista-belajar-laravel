@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data Products</h3>
                  <a href="{{ route('products.add') }}" style="float:right;" type="button" class="btn btn-rounded btn-success mb-5">Tambah Products</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Product Name</th>
                        <th>Category ID</th>
                        <th>Product Code</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($allDataPr as $key => $pr)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $pr->product_name }}</td>
                            <td>{{ $pr->category_id }}</td>
                            <td>{{ $pr->product_code }}</td>
                            <td>{{ $pr->description }}</td>
                            <td>{{ $pr->price }}</td>
                            <td>{{ $pr->stock }}</td>
                            <td>
                              <a href="{{ route('products.edit', $pr->id) }}" class="btn btn-info">Edit</a>
                              <a href="{{ route('products.delete', $pr->id) }}" id= "delete" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
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
</div>

@endsection