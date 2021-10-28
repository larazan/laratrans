<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .flex-table {
            display: flex;
            flex-direction: column;
            border: 1px solid #ccc;
            background: #fff;
            width: 900px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .flex-table thead {
            color: #fff;
            background: #009485;
        }

        .flex-table thead tr,
        .flex-table tbody tr {
            display: flex;
        }

        .flex-table tbody tr+tr {
            border-top: 1px solid #ccc;
        }

        .flex-table thead tr th,
        .flex-table tbody tr td {
            display: flex;
            flex: 1;
            padding: .5em;
            text-align: center;
        }

        @media screen and (max-width: 640px) {
            .flex-table {
                border: 0;
            }

            .flex-table thead {
                display: none;
            }

            .flex-table tbody tr {
                flex-direction: column;
                margin: 1em;
                border: 1px solid #ccc;
            }

            .flex-table tbody tr td {
                flex-direction: column;
            }

            .flex-table tbody tr td+td {
                border-top: 1px solid #ccc;
            }

            .flex-table tbody tr td:before {
                display: flex;
                align-items: center;
                margin: -.5em -.5em .75em -.5em;
                padding: .5em;
                content: attr(data-label);
                color: #fff;
                background: #009485;
            }
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
            <a href="{{ url('/cv') }}">CV</a>
        </div>
        @endif

        <div class="content">
        <h2>Products</h2>
            <table class="flex-table">
                <thead>
                    <tr>
                    <th>#</th>
                                <th>SKU</th>
                                <th>Type</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                @php
                                $i = 1
                                @endphp
                                @forelse ($products as $product)
                                    <tr>    
                                    <td>{{ $i++ }}</td>
                                        <td>{{ $product->sku }}</td>
                                        <!-- <td>{{ $product->type }}</td> -->
                                        <td>{{ $product->name }}</td>
                                        <td>{{ number_format($product->price) }}</td>
                                        <td>{{ $product->statusLabel() }}</td>
                                        </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">No records found</td>
                                    </tr>
                                @endforelse
                    
                </tbody>
            </table>
            <div class="pagination-style">
            {{ $products->links() }}
            </div>
        </div>
    </div>


</body>

</html>