<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>

<h1>Edit Product</h1>

<form method="POST" action="/LavaLust/products/edit/<?php echo $product['id']; ?>">

    <label>Product Name:</label><br>
    <input type="text"
           name="product_name"
           value="<?php echo htmlspecialchars($product['product_name']); ?>"
           required>

    <br><br>

    <label>Description:</label><br>
    <textarea name="description" required><?php echo htmlspecialchars($product['description']); ?></textarea>

    <br><br>

    <label>Price:</label><br>
    <input type="number"
           name="price"
           step="0.01"
           value="<?php echo $product['price']; ?>"
           required>

    <br><br>

    <label>Quantity:</label><br>
    <input type="number"
           name="quantity"
           value="<?php echo $product['quantity']; ?>"
           required>

    <br><br>

    <button type="submit">Update Product</button>

</form>

<br>

<a href="/LavaLust/products">Back to Products</a>

</body>
</html>