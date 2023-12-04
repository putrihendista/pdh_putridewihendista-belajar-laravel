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
                </div>
                <!-- /.card-header -->
                <!-- <div id="container" style="width:100%; height:400px;"></div> -->
                <div id="productCountChart" style="height: 300px;"></div>
                <div id="totalPriceChart" style="height: 300px;"></div>
                <div id="stockCountChart" style="height: 300px;"></div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <!-- /.card -->
            </div>
            {{-- Pie Chart --}}
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

@section('script')
<script>
// Kolom Chart
Highcharts.chart('productCountChart', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Jumlah Produk per Kategori'
        },
        xAxis: {
            categories: @json($categories),
            crosshair: true
        },
        yAxis: {
            title: {
                text: 'Jumlah Produk'
            }
        },
        series: [{
            name: 'Jumlah Produk',
            data: @json($totalProducts)
        }]
    });
    // Pie Chart
    Highcharts.chart('totalPriceChart', {
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Jumlah Total Harga Produk per Kategori'
        },
        series: [{
            name: 'Total Harga',
            data: [
                @foreach($categories as $key => $category)
                {name: '{{ $category }}', y: {{ $totalPrice[$key] }}},
                @endforeach
            ]
        }]
    });

    //line chart
       Highcharts.chart('stockCountChart', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Jumlah Stok Produk per Kategori'
        },
        xAxis: {
            categories: @json($categories)
        },
        yAxis: {
            title: {
                text: 'Jumlah Stok'
            }
        },
        series: [{
            name: 'Jumlah Stok',
            data: [
                @foreach($categories as $key => $category)
                {name: '{{ $category }}', y: {{ $totalStock[$key] }}},
                @endforeach
            ]
        }]
    });

</script>
@endsection