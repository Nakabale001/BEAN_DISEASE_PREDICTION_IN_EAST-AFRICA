<?php

require_once "config.php";

// =====================================
// VALIDATE REQUEST
// =====================================

if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    header("Location: index.php");
    exit();

}

// =====================================
// LANGUAGE SELECTION
// =====================================

$lang = $_POST['lang'] ?? 'en';

if (!file_exists("languages/$lang.php")) {

    $lang = 'en';

}

// =====================================
// VALIDATE IMAGE
// =====================================

if (
    !isset($_FILES['leaf_image']) ||
    $_FILES['leaf_image']['error'] !== 0
) {

    die("Please upload a valid bean leaf image.");

}

$file = $_FILES['leaf_image'];

$extension = strtolower(
    pathinfo(
        $file['name'],
        PATHINFO_EXTENSION
    )
);

if (
    !in_array(
        $extension,
        $allowed_extensions
    )
) {

    die("Unsupported image format.");

}

// =====================================
// CREATE UPLOAD FOLDER
// =====================================

if (!file_exists(UPLOAD_DIR)) {

    mkdir(
        UPLOAD_DIR,
        0777,
        true
    );

}

// =====================================
// SAVE IMAGE
// =====================================

$newFileName =
    "bean_" .
    date("YmdHis") .
    "_" .
    uniqid() .
    "." .
    $extension;

$uploadPath =
    UPLOAD_DIR .
    $newFileName;

if (
    !move_uploaded_file(
        $file['tmp_name'],
        $uploadPath
    )
) {

    die("Failed to save uploaded image.");

}

// =====================================
// RUN PYTHON MODEL
// =====================================

$command =
    PYTHON_EXECUTABLE .
    " " .
    escapeshellarg(PYTHON_SCRIPT) .
    " " .
    escapeshellarg($uploadPath);

$output = shell_exec($command);

if (!$output) {

    die(
        "AI prediction failed. No response received."
    );

}

// =====================================
// DECODE JSON RESPONSE
// =====================================

$result =
    json_decode(
        trim($output),
        true
    );

if (!$result) {

    echo "<pre>";
    echo htmlspecialchars($output);
    echo "</pre>";

    die(
        "Invalid response from prediction model."
    );

}

// =====================================
// HANDLE PYTHON ERRORS
// =====================================

if (
    isset($result['status']) &&
    $result['status'] === 'error'
) {

    die(
        htmlspecialchars(
            $result['message']
        )
    );

}

// =====================================
// EXTRACT RESULTS
// =====================================

$disease =
    $result['disease'];

$confidence =
    round(
        $result['confidence'],
        2
    );

// =====================================
// SAVE TO DATABASE
// =====================================

try {

    $stmt = $db->prepare(

        "INSERT INTO predictions
        (
            image_name,
            disease,
            confidence,
            language
        )
        VALUES
        (
            :image_name,
            :disease,
            :confidence,
            :language
        )"

    );

    $stmt->execute([

        ':image_name' =>
            $newFileName,

        ':disease' =>
            $disease,

        ':confidence' =>
            $confidence,

        ':language' =>
            $lang

    ]);

} catch (PDOException $e) {

    die(
        "Database Error: " .
        $e->getMessage()
    );

}

// =====================================
// STORE SESSION DATA
// =====================================

$_SESSION['prediction'] = [

    'image' =>
        'uploads/' .
        $newFileName,

    'disease' =>
        $disease,

    'confidence' =>
        $confidence,

    'lang' =>
        $lang,

    'prediction_date' =>
        date(
            "Y-m-d H:i:s"
        )

];

// =====================================
// REDIRECT TO RESULT PAGE
// =====================================

header(
    "Location: advice.php"
);

exit();

?>