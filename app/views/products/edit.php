
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>

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
            max-width: 650px;
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

        .form-container {
            background: white;
            padding: 30px;
            border-radius: 0 0 15px 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: #4d378f;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 15px;
            font-family: Arial, sans-serif;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        input:focus,
        textarea:focus {
            outline: none;
            border-color: #6c4ccf;
            box-shadow: 0 0 0 2px #eee9ff;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn {
            padding: 12px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            border: none;
            cursor: pointer;
            font-size: 15px;
        }

        .update-btn {
            background: #6c4ccf;
            color: white;
        }

        .update-btn:hover {
            background: #5638b5;
        }

        .back-btn {
            background: #eee;
            color: #555;
        }

        .back-btn:hover {
            background: #ddd;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1>Edit Product</h1>
        <p>Update the product information below</p>
    </div>

    <div class="form-container">

        <form method="POST"
              action="/products/edit/<?= $product['id'] ?>">

            <div class="form-group">
                <label>Product Name</label>
                <input
                    type="text"
                    name="product_name"
                    value="<?= htmlspecialchars($product['product_name']) ?>"
                    required
                >
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea
                    name="description"
                ><?= htmlspecialchars($product['description']) ?></textarea>
            </div>

            <div class="form-group">
                <label>Price</label>
                <input
                    type="number"
                    name="price"
                    step="0.01"
                    value="<?= $product['price'] ?>"
                    required
                >
            </div>

            <div class="form-group">
                <label>Quantity</label>
                <input
                    type="number"
                    name="quantity"
                    min="0"
                    value="<?= $product['quantity'] ?>"
                    required
                >
            </div>

            <div class="buttons">

                <button type="submit" class="btn update-btn">
                    Update Product
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>

