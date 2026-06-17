<?php

require_once "config.php";

if (!isset($_SESSION['prediction'])) {

    header("Location: index.php");
    exit();

}

$data = $_SESSION['prediction'];

$disease = $data['disease'];
$confidence = $data['confidence'];
$image = $data['image'];
$lang = $data['lang'];

if (!file_exists("languages/$lang.php")) {

    $lang = "en";

}

include "languages/$lang.php";

$diseaseName =
    $disease_names[$disease]
    ?? formatDiseaseName($disease);

$cause =
    $disease_causes[$disease]
    ?? "Information not available.";

$prevention =
    $disease_prevention[$disease]
    ?? "Information not available.";

$advice =
    $disease_advice[$disease]
    ?? "Information not available.";

$color =
    diseaseColor($disease);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>

Prediction Result

</title>

<link rel="stylesheet"
href="assets/css/style.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>

<div class="container">

<div class="card">

<h1 class="title">

<i class="fas fa-leaf"></i>

<br>

<?php echo SYSTEM_TITLE; ?>

</h1>

<p class="subtitle">

Bean Leaf Disease Prediction Result

</p>

<div class="image-box">

<img
src="<?php echo htmlspecialchars($image); ?>"
alt="Bean Leaf">

</div>

<div class="result">

<h2
style="color:<?php echo $color; ?>">

<?php echo htmlspecialchars($diseaseName); ?>

</h2>

<p class="confidence">

Confidence:
<?php echo $confidence; ?>%

</p>

</div>

<div class="section">

<h2>

<i class="fas fa-bug"></i>

Disease Cause

</h2>

<p>

<?php echo htmlspecialchars($cause); ?>

</p>

</div>

<div class="section">

<h2>

<i class="fas fa-shield-virus"></i>

Prevention Measures

</h2>

<p>

<?php echo htmlspecialchars($prevention); ?>

</p>

</div>

<div class="section">

<h2>

<i class="fas fa-user-doctor"></i>

Recommended Action

</h2>

<p>

<?php echo htmlspecialchars($advice); ?>

</p>

</div>

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

<a
href="generate_pdf.php"
class="btn pdf"
onclick="return confirmPDF();">

<i class="fas fa-file-pdf"></i>

Download PDF Report

<a href="generate_pdf.php"
   class="btn pdf"
   onclick="return confirmPDF();">
    <i class="fas fa-file-pdf"></i>
    
</a>

Prediction Date:
<?php echo date("d M Y H:i"); ?>

</p>

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