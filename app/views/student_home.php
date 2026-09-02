<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kathleen's Student Hub</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f0ff;
            color: #2d2342;
        }

        nav {
            background: #6c4ab6;
            padding: 18px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav h2 {
            color: white;
            margin: 0;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            font-weight: bold;
        }

        .container {
            max-width: 850px;
            margin: 70px auto;
            background: white;
            padding: 50px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        h1 {
            color: #6c4ab6;
            font-size: 38px;
        }

        p {
            font-size: 18px;
            line-height: 1.7;
        }

        .button {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 22px;
            background: #6c4ab6;
            color: white;
            text-decoration: none;
            border-radius: 8px;
        }

        .button:hover {
            background: #54358f;
        }
    </style>
</head>

<body>

<nav>
    <h2>Kathleen's Student Hub</h2>

    <div>
        <a href="<?= site_url('student'); ?>">Home</a>
        <a href="<?= site_url('student/profile'); ?>">Student Profile</a>
    </div>
</nav>

<div class="container">
    <h1>Welcome to My Student Page!</h1>

    <p>
        Hello! This is my personal student information page
        created using the LavaLust PHP Framework.
    </p>

    <p>
        This page demonstrates routing, controllers, views,
        data passing, and middleware.
    </p>

    <a class="button" href="<?= site_url('student/profile'); ?>">
        View My Profile →
    </a>
</div>

</body>
</html>