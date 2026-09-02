<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #000;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #eee;
        }
    </style>
</head>
<body>

    <h1>User Management</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Username</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['id']; ?></td>
                    <td><?= $user['firstname']; ?></td>
                    <td><?= $user['lastname']; ?></td>
                    <td><?= $user['email']; ?></td>
                    <td><?= $user['username']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>