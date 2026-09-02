<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kathleen's Profile</title>

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
            max-width: 750px;
            margin: 60px auto;
            background: white;
            padding: 45px;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        h1 {
            color: #6c4ab6;
            text-align: center;
            margin-bottom: 35px;
        }

        .info {
            padding: 15px;
            margin: 12px 0;
            background: #f4f0ff;
            border-radius: 10px;
        }

        .label {
            font-weight: bold;
            color: #6c4ab6;
        }

        .back {
            display: block;
            width: fit-content;
            margin: 30px auto 0;
            padding: 12px 22px;
            background: #6c4ab6;
            color: white;
            text-decoration: none;
            border-radius: 8px;
        }

        .back:hover {
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

    <h1>Student Information</h1>

    <div class="info">
        <span class="label">Student ID:</span>
        <?= $student_id; ?>
    </div>

    <div class="info">
        <span class="label">Student Name:</span>
        <?= $name; ?>
    </div>

    <div class="info">
        <span class="label">Course:</span>
        <?= $course; ?>
    </div>

    <div class="info">
        <span class="label">Year Level:</span>
        <?= $year; ?>
    </div>

    <div class="info">
        <span class="label">Section:</span>
        <?= $section; ?>
    </div>

    <div class="info">
        <span class="label">Email:</span>
        <?= $email; ?>
    </div>

    <a class="back" href="<?= site_url('student'); ?>">
        ← Back to Home
    </a>

</div>

</body>
</html>