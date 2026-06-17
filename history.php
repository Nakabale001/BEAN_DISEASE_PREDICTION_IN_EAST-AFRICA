<?php

require_once "config.php";

$search = $_GET['search'] ?? '';

try {

    if (!empty($search)) {

        $stmt = $db->prepare(
            "SELECT *
             FROM predictions
             WHERE disease LIKE :search
             ORDER BY prediction_date DESC"
        );

        $stmt->execute([
            ':search' => "%$search%"
        ]);

        $predictions = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } else {

        $stmt = $db->query(
            "SELECT *
             FROM predictions
             ORDER BY prediction_date DESC"
        );

        $predictions = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

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

<title>Prediction History</title>

<link rel="stylesheet"
href="assets/css/style.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>

<div class="container">

<div class="card">

<h1 class="title">

<i class="fas fa-history"></i>

<br>

Prediction History

</h1>

<p class="subtitle">

View all bean leaf disease predictions saved in the system.

</p>

<!-- Search Form -->

<div class="search-box">

<form method="GET">

<input
type="text"
name="search"
placeholder="Search disease..."
value="<?php echo htmlspecialchars($search); ?>">

<button
type="submit"
class="btn dashboard">

<i class="fas fa-search"></i>

Search

</button>

</form>

</div>

<!-- Table -->

<div class="section">

<h2>

<i class="fas fa-database"></i>

Stored Predictions

</h2>

<div class="table-container">

<table>

<tr>

<th>ID</th>

<th>Image Name</th>

<th>Disease</th>

<th>Confidence</th>

<th>Language</th>

<th>Date</th>

</tr>

<?php if(count($predictions) > 0): ?>

<?php foreach($predictions as $row): ?>

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

<?php else: ?>

<tr>

<td colspan="6">

No prediction records found.

</td>

</tr>

<?php endif; ?>

</table>

</div>

</div>

<!-- Statistics -->

<div class="section">

<h2>

<i class="fas fa-chart-bar"></i>

History Summary

</h2>

<p>

Total Records:

<strong>

<?php echo count($predictions); ?>

</strong>

</p>

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
href="dashboard.php"
class="btn dashboard">

<i class="fas fa-chart-line"></i>

Dashboard

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