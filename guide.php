<?php
require_once "config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Farmer Guide</title>

<link rel="stylesheet" href="assets/css/style.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>

<div class="container">

<div class="card">

<h1 class="title">

<i class="fas fa-book-open"></i>

<br>

Farmer Guide

</h1>

<p class="subtitle">

Learn about bean leaf diseases, their symptoms, causes,
prevention measures and recommended management practices.

</p>

<div class="section">

<h2>

<i class="fas fa-seedling"></i>

About This System

</h2>

<p>

This system uses Machine Learning and Artificial Intelligence
to identify diseases affecting bean leaves from uploaded images.
The model analyzes the image and predicts the most likely disease
class together with a confidence score.

</p>

</div>

<div class="section">

<h2>

<i class="fas fa-leaf"></i>

Healthy Bean Leaf

</h2>

<ul>

<li>Uniform green colour.</li>

<li>No visible spots or lesions.</li>

<li>Strong and healthy leaf structure.</li>

<li>Good photosynthetic activity.</li>

</ul>

</div>

<div class="section">

<h2>

Minor Angular Leaf Spot

</h2>

<ul>

<li>Small angular brown spots appear on leaves.</li>

<li>Early-stage fungal infection.</li>

<li>Can spread if not managed early.</li>

<li>Regular field monitoring is recommended.</li>

</ul>

</div>

<div class="section">

<h2>

Severe Angular Leaf Spot

</h2>

<ul>

<li>Large angular lesions cover leaf surfaces.</li>

<li>Leaves may dry and fall off.</li>

<li>Reduces crop growth and yield.</li>

<li>Requires immediate intervention.</li>

</ul>

</div>

<div class="section">

<h2>

Minor Bean Rust

</h2>

<ul>

<li>Small rust-coloured pustules appear.</li>

<li>Usually affects older leaves first.</li>

<li>Can be controlled at an early stage.</li>

<li>Monitor neighbouring plants carefully.</li>

</ul>

</div>

<div class="section">

<h2>

Severe Bean Rust

</h2>

<ul>

<li>Large numbers of rust pustules.</li>

<li>Leaves become yellow and weak.</li>

<li>Can significantly reduce yields.</li>

<li>Immediate disease control is required.</li>

</ul>

</div>

<div class="section">

<h2>

<i class="fas fa-shield-virus"></i>

Disease Prevention Tips

</h2>

<ul>

<li>Use certified disease-free seeds.</li>

<li>Practice crop rotation.</li>

<li>Remove infected plant materials.</li>

<li>Maintain field sanitation.</li>

<li>Avoid excessive moisture on leaves.</li>

<li>Inspect crops regularly.</li>

<li>Use recommended fungicides where necessary.</li>

</ul>

</div>

<div class="section">

<h2>

<i class="fas fa-camera"></i>

How To Use This System

</h2>

<ol>

<li>Open the Home Page.</li>

<li>Upload a clear bean leaf image.</li>

<li>Select your preferred language.</li>

<li>Click <strong>Predict Disease</strong>.</li>

<li>Wait for the Machine Learning model to analyze the image.</li>

<li>View the prediction result and confidence score.</li>

<li>Read the disease advice and prevention measures.</li>

<li>Download the PDF report if needed.</li>

</ol>

</div>

<div class="section">

<h2>

<i class="fas fa-graduation-cap"></i>

Project Information

</h2>

<p>

<strong>Project Title:</strong>

A MACHINE LEARNING MODEL TO PREDICT DISEASE IN BEAN LEAF

</p>

<p>

<strong>Machine Learning Classes:</strong>

</p>

<ul>

<li>Healthy</li>

<li>Minor Angular Leaf Spot</li>

<li>Severe Angular Leaf Spot</li>

<li>Minor Bean Rust</li>

<li>Severe Bean Rust</li>

</ul>

</div>

<div class="actions">

<a href="index.php" class="btn home">

<i class="fas fa-home"></i>

Home

</a>

<a href="dashboard.php" class="btn dashboard">

<i class="fas fa-chart-line"></i>

Dashboard

</a>

<a href="history.php" class="btn history">

<i class="fas fa-history"></i>

History

</a>

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