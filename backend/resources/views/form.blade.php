<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<body>
    <h1>Add Product</h1>
    <form action="{{ url('/products') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea name="description" required></textarea>
        </div>
        <div>
            <label for="price">Price:</label>
            <input type="number" step="0.01" name="price" required>
        </div>
        <div>
            <label for="stock">Stock:</label>
            <input type="number" name="stock" required>
        </div>
        <button type="submit">Add</button>
    </form>
</body>
</html>
