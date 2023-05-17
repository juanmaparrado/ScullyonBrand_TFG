<!-- resources/views/products/create.blade.php -->
<h1>Create Product</h1>

<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" name="name" id="name">

    <label for="price">Price:</label>
    <input type="text" name="price" id="price">

    <label for="stock">Stock:</label>
    <input type="text" name="stock" id="stock">

    <label for="url_image">Image URL:</label>
    <input type="text" name="url_image" id="url_image">

    <label for="category_id">Category ID:</label>
    <input type="text" name="category_id" id="category_id">

    <button type="submit">Create</button>
</form>
