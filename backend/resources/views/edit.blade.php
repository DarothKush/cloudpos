<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form action="{{ url('/update/'.$product['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name:</label>
            <input type="string" name="name" value="{{ $product['name'] }}" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea type="string" name="description" required>{{ $product['description'] }}</textarea>
        </div>
        <div>
            <label for="price">Price:</label>
            <input type="numeric" name="price" value="{{ $product['price'] }}" required>
        </div>
        <div>
            <label for="stock">Stock:</label>
            <input type="integer" name="stock" value="{{ $product['stock'] }}" required>
        </div>
        <button type="submit">Update</button>
    </form>
</body>
</html>
