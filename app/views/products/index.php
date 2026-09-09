<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
</head>
<body>

<h1>Product List</h1>

<a href="/LavaLust/products/create">Add Product</a>

<br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Product Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Created At</th>
        <th>Action</th>
    </tr>

    <?php foreach ($products as $product): ?>
    <tr>
        <td><?= $product['id'] ?></td>
        <td><?= $product['product_name'] ?></td>
        <td><?= $product['description'] ?></td>
        <td>₱<?= number_format($product['price'], 2) ?></td>
        <td><?= $product['quantity'] ?></td>
        <td><?= $product['created_at'] ?></td>
        <td>
            <a href="/LavaLust/products/edit/<?= $product['id'] ?>">Edit</a>
            |
            <a href="/LavaLust/products/delete/<?= $product['id'] ?>">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>

</table>

</body>
</html>