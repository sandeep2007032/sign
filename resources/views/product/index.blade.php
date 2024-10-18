<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div>
            @if(session()->has('success'))
                <div>
                    {{ session('success') }}
                </div>
            @endif
        </div>
        
        <div class="search-container">
            <input type="text" id="searchInput" placeholder="Search for products..." onkeyup="searchFunction()">
        </div>
        <div>
          
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Go to Dashboard</a>
        </div>

</body> <div class="container">
        <h1>Product List</h1>

        @if ($products->isEmpty())
            <p>No products found.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Phone</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->age }}</td>
                            <td>{{ $product->gender }}</td>
                            <td>{{ $product->phone }}</td>
                            <td>{{ $product->created_at->format('Y-m-d H:i') }}</td>
                            <td>
                            <a href="{{ route('product.edit', ['product' => $product]) }}">Edit</a>
                        </td>
                        <td>
                            <form method="post" action="{{ route('product.destroy', ['product' => $product]) }}">
                                @csrf 
                                @method('delete')
                                <input type="submit" value="Delete" />
                            </form>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <a href="{{ route('product.create') }}">Add New Product</a> <!-- Link to the product creation page -->
    </div>
</html>