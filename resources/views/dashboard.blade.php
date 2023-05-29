@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header') 
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $completedOrders }}</h3>
                <p>Complete Orders</p>
            </div>
            <div class="icon">
                <i class="fas fa-shopping-cart"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $totalRevenue }}</h3>
                <p>Total Ingresos</p>
            </div>
            <div class="icon">
                <i class="fas fa-money-bill"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{ $totalUsers }}</h3>
                <p>Registered Users</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Productos más Vendidos</h3>
            </div>
            <div class="card-body">
                <div class="chart">
                    <canvas id="scatterChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Stores with Low Inventory</h3>
            </div>
            <div class="card-body">
                @foreach ($storesWithLowInventory as $store)
                    <div class="mb-3">
                        <strong>{{ $store->name }}</strong>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{ $store->inventories_count }}%;" aria-valuenow="{{ $store->inventories_count }}" aria-valuemin="0" aria-valuemax="100">{{ $store->inventories_count }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Top Reviewed Products</h3>
            </div>
            <div class="card-body">
                <canvas id="barChart"></canvas>
            </div>
        </div>
    </div>  
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
                // Obtén los datos de los productos más vendidos del backend
        var products = {!! json_encode($topProducts) !!};

        // Extrae los nombres de los productos y las cantidades de órdenes
        var productNames = products.map(function(product) {
            return product.name;
        });
        var orderCounts = products.map(function(product) {
            return product.order_items_count;
        });

        // Configura el gráfico de puntos
        var ctx = document.getElementById('scatterChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: productNames, // Utiliza los nombres de los productos como etiquetas en el eje X
                datasets: [{
                    label: 'Productos más Vendidos',
                    data: products.map(function(product) {
                        return {x: productNames.indexOf(product.name) + 1, y: product.order_items_count};
                    }),
                    backgroundColor: 'rgba(75, 192, 192, 0.5)', // Color de los puntos
                    borderColor: 'rgba(75, 192, 192, 1)', // Color del borde de los puntos
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        type: 'category', // Utiliza el tipo de escala "categoría" para el eje X
                        title: {
                            display: true,
                            text: 'Producto'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Cantidad de Órdenes'
                        }
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Productos más Vendidos'
                    }
                }
            }
        });


        // Obtén los datos de los productos y sus revisiones del backend
        var reviewedProducts = {!! json_encode($topReviewedProducts) !!};
        
        // Extrae los nombres de los productos y las cantidades de revisiones
        var reviewedProductNames = reviewedProducts.map(function(product) {
            return product.name;
        });
        var reviewCounts = reviewedProducts.map(function(product) {
            return product.reviews_count;
        });

        // Configura el gráfico de barras
        var ctx2 = document.getElementById('barChart').getContext('2d');
        var chart2 = new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: reviewedProductNames,
                datasets: [{
                    label: 'Reviews',
                    data: reviewCounts,
                    backgroundColor: ['rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)'], // Color de las barras
                    borderColor: 'rgba(54, 162, 235, 1)', // Color del borde de las barras
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Productos con más reviews'
                    }
                },
                layout: {
                    padding: {
                        left: 10,
                        right: 10,
                        top: 10,
                        bottom: 10
                    }
                }
            }
        });
    </script>
@stop