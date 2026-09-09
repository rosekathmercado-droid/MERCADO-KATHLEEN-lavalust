```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f1ff;
            color: #333;
            padding: 40px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
        }

        .header {
            background: #6c4ccf;
            color: white;
            padding: 25px 30px;
            border-radius: 15px 15px 0 0;
        }

        .header h1 {
            margin-bottom: 6px;
        }

        .header p {
            opacity: 0.9;
        }

        .content {
            background: white;
            padding: 30px;
            border-radius: 0 0 15px 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .btn {
            display: inline-block;
            padding: 10px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
        }

        .add-btn {
            background: #6c4ccf;
            color: white;
        }

        .logout-btn {
            background: #eee;
            color: #555;
        }

        .add-btn:hover {
            background: #5638b5;
        }

        .logout-btn:hover {
            background: #ddd;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
        }

        th {
            background: #eee9ff;
            color: #4d378f;
            padding: 14px;
            text-align: left;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #eee;
        }

        tr:hover {
            background: #faf9ff;
        }

        .edit {
            color: #6c4ccf;
            text-decoration: none;
            font-weight: bold;
            margin-right: 10px;
        }

        .delete {
            color: #d9534f;
            text-decoration: none;
            font-weight: bold;
        }

        .price {
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1>Product Management</h1>
        <p>Manage your products easily</p>
    </div>

    <div class="content">

        <div class="actions">

            <a class="btn add-btn" href="/products/create">
                + Add Product
            </a>

            <a class="btn logout-btn" href="/logout">
                Logout
            </a>

        </div>

        <table>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>

            <?php foreach ($products as $product): ?>

            <tr>

                <td><?= $product['id'] ?></td>

                <td><?= $product['product_name'] ?></td>

                <td><?= $product['description'] ?></td>

                <td class="price">
                    ₱<?= number_format($product['price'], 2) ?>
                </td>

                <td><?= $product['quantity'] ?></td>

                <td><?= $product['created_at'] ?></td>

                <td>

                    <a class="edit"
                       href="/products/edit/<?= $product['id'] ?>">
                        Edit
                    </a>

                    <a class="delete"
                       href="/products/delete/<?= $product['id'] ?>"
                       onclick="return confirm('Are you sure you want to delete this product?');">
                        Delete
                    </a>

                </td>

            </tr>

            <?php endforeach; ?>

        </table>

    </div>

</div>

</body>
</html>
```
