<?php
require_once "config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo SYSTEM_TITLE; ?></title>

    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>

<div class="container">

    <div class="card">

        <h1 class="title">

            <i class="fas fa-seedling"></i>

            <br>

            <?php echo SYSTEM_TITLE; ?>

        </h1>

        <p class="subtitle">

            Upload a bean leaf image and allow the Machine Learning model
            to predict whether the leaf is healthy or affected by
            Angular Leaf Spot or Bean Rust disease.

        </p>

        <form
            action="predict.php"
            method="POST"
            enctype="multipart/form-data">

            <label>

                <i class="fas fa-image"></i>

                Upload Bean Leaf Image

            </label>

            <input
                type="file"
                name="leaf_image"
                accept=".jpg,.jpeg,.png,.webp"
                required>

            <label>

                <i class="fas fa-language"></i>

                Select Language

            </label>

            <select name="lang">

                <option value="en">
                    English
                </option>

                <option value="lg">
                    Luganda
                </option>

                <option value="sw">
                    Swahili
                </option>

            </select>

            <button
                type="submit"
                class="predict-btn">

                <i class="fas fa-microscope"></i>

                Predict Disease

            </button>

        </form>

        <div class="actions">

            <a
                href="dashboard.php"
                class="btn dashboard">

                <i class="fas fa-chart-line"></i>

                Dashboard

            </a>

            <a
                href="history.php"
                class="btn history">

                <i class="fas fa-history"></i>

                History

            </a>

            <a
                href="guide.php"
                class="btn guide">

                <i class="fas fa-book"></i>

                Farmer Guide

            </a>

        </div>

        <div class="section">

            <h2>

                <i class="fas fa-info-circle"></i>

                About the System

            </h2>

            <p>

                This project uses Artificial Intelligence and Machine Learning
                techniques to detect diseases affecting bean leaves from uploaded
                images. The model analyzes the image and predicts one of the
                following classes:

            </p>

            <br>

            <ul>

                <li>Healthy</li>

                <li>Minor Angular Leaf Spot</li>

                <li>Severe Angular Leaf Spot</li>

                <li>Minor Bean Rust</li>

                <li>Severe Bean Rust</li>

            </ul>

        </div>

        <div class="footer">

            <p>

                © 2026 <?php echo SYSTEM_TITLE; ?>

            </p>

        </div>

    </div>

</div>

<script src="assets/js/script.js"></script>

</body>

</html>