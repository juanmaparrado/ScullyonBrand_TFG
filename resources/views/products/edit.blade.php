<!-- resources/views/products/edit.blade.php -->
<h1>Edit Product</h1>

<form action="{{ route('products.update', $product) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="{{ $product->name }}">

    <label for="price">Price:</label>
    <input type="text" name="price" id="price" value="{{ $product->price }}">

    <label for="stock">Stock:</label>
    <input type="text" name="stock" id="stock" value="{{ $product->stock }}">

    <label for="url_image">Image URL:</label>
    <input type="text" name="url_image" id="url_image" value="{{ $product->url_image }}">

    <label for="category_id">Category ID:</label>
    <input type="text" name="category_id" id="category_id" value="{{ $product->category_id }}">

    <button type="submit">Update</button>
</form>
