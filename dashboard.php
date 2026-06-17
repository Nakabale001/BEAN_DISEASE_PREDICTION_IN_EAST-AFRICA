<?php

require_once "config.php";

try {

    $totalPredictions = $db->query(
        "SELECT COUNT(*) FROM predictions"
    )->fetchColumn();

    $healthyCount = $db->query(
        "SELECT COUNT(*) FROM predictions
         WHERE disease='healthy'"
    )->fetchColumn();

    $diseasedCount = $totalPredictions - $healthyCount;

    $healthyPercentage =
        ($totalPredictions > 0)
        ? round(($healthyCount / $totalPredictions) * 100, 1)
        : 0;

    $diseaseStats = $db->query(
        "SELECT disease,
                COUNT(*) AS total
         FROM predictions
         GROUP BY disease
         ORDER BY total DESC"
    )->fetchAll(PDO::FETCH_ASSOC);

    $recentPredictions = $db->query(
        "SELECT *
         FROM predictions
         ORDER BY prediction_date DESC
         LIMIT 10"
    )->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $e) {

    die(
        "Database Error: " .
        $e->getMessage()
    );

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Dashboard</title>

<link rel="stylesheet"
href="assets/css/style.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>

<div class="container">

<div class="card">

<h1 class="title">

<i class="fas fa-chart-line"></i>

<br>

Dashboard

</h1>

<p class="subtitle">

System Analytics and Prediction Statistics

</p>

<!-- Statistics -->

<div class="stats">

<div class="stat-box total">

<h2>

<?php echo $totalPredictions; ?>

</h2>

<p>

Total Predictions

</p>

</div>

<div class="stat-box healthy">

<h2>

<?php echo $healthyCount; ?>

</h2>

<p>

Healthy Leaves

</p>

</div>

<div class="stat-box diseased">

<h2>

<?php echo $diseasedCount; ?>

</h2>

<p>

Diseased Leaves

</p>

</div>

</div>

<!-- Accuracy Overview -->

<div class="section">

<h2>

<i class="fas fa-percent"></i>

Healthy Prediction Rate

</h2>

<p>

<strong>

<?php echo $healthyPercentage; ?>%

</strong>

of all analyzed bean leaf images were classified as healthy.

</p>

</div>

<!-- Disease Distribution -->

<div class="section">

<h2>

<i class="fas fa-leaf"></i>

Disease Distribution

</h2>

<div class="table-container">

<table>

<tr>

<th>Disease</th>

<th>Total Cases</th>

</tr>

<?php foreach($diseaseStats as $row): ?>

<tr>

<td>

<?php echo formatDiseaseName(
    $row['disease']
); ?>

</td>

<td>

<?php echo $row['total']; ?>

</td>

</tr>

<?php endforeach; ?>

</table>

</div>

</div>

<!-- Recent Predictions -->

<div class="section">

<h2>

<i class="fas fa-clock"></i>

Recent Predictions

</h2>

<div class="table-container">

<table>

<tr>

<th>ID</th>

<th>Image</th>

<th>Disease</th>

<th>Confidence</th>

<th>Language</th>

<th>Date</th>

</tr>

<?php foreach($recentPredictions as $row): ?>

<tr>

<td>

<?php echo $row['id']; ?>

</td>

<td>

<?php echo htmlspecialchars(
    $row['image_name']
); ?>

</td>

<td>

<?php echo formatDiseaseName(
    $row['disease']
); ?>

</td>

<td>

<?php echo $row['confidence']; ?>%

</td>

<td>

<?php echo strtoupper(
    $row['language']
); ?>

</td>

<td>

<?php echo $row['prediction_date']; ?>

</td>

</tr>

<?php endforeach; ?>

</table>

</div>

</div>

<!-- Navigation -->

<div class="actions">

<a
href="index.php"
class="btn home">

<i class="fas fa-home"></i>

Home

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

<div class="footer">

<p>

© 2026

<?php echo SYSTEM_TITLE; ?>

</p>

</div>

</div>

</div>

<script src="assets/js/script.js"></script>

</body>

</html>