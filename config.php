<?php

// =====================================
// START SESSION
// =====================================

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

date_default_timezone_set('Africa/Kampala');

// =====================================
// PROJECT SETTINGS
// =====================================

define(
    'SYSTEM_TITLE',
    'A MACHINE LEARNING MODEL TO PREDICT DISEASE IN BEAN LEAF'
);

// =====================================
// DATABASE SETTINGS
// =====================================

$host = "localhost";

$dbname =
"a_machine_learning_model_to_predict_disease_in_bean_leaf";

$username = "root";

$password = "";

try {

    $db = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password
    );

    $db->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

} catch (PDOException $e) {

    die(
        "Database Connection Failed: " .
        $e->getMessage()
    );

}

// =====================================
// PYTHON CONFIGURATION
// =====================================

define(
    'PYTHON_EXECUTABLE',
    'py -3.11'
);

define(
    'PYTHON_SCRIPT',
    __DIR__ . '/python/predict.py'
);

// =====================================
// MODEL CONFIGURATION
// =====================================

define(
    'MODEL_PATH',
    __DIR__ . '/model/best_bean_model.keras'
);

// =====================================
// IMAGE SETTINGS
// =====================================

define(
    'IMG_WIDTH',
    224
);

define(
    'IMG_HEIGHT',
    224
);

define(
    'MAX_FILE_SIZE',
    10 * 1024 * 1024
);

// =====================================
// UPLOAD DIRECTORY
// =====================================

define(
    'UPLOAD_DIR',
    __DIR__ . '/uploads/'
);

if (!file_exists(UPLOAD_DIR)) {

    mkdir(
        UPLOAD_DIR,
        0777,
        true
    );

}

// =====================================
// ALLOWED IMAGE TYPES
// =====================================

$allowed_extensions = [

    'jpg',
    'jpeg',
    'png',
    'webp'

];

// =====================================
// IMAGE VALIDATION FUNCTION
// =====================================

function validateImage(
    $file,
    $allowed_extensions
) {

    if ($file['error'] !== 0) {
        return false;
    }

    if ($file['size'] > MAX_FILE_SIZE) {
        return false;
    }

    $extension = strtolower(
        pathinfo(
            $file['name'],
            PATHINFO_EXTENSION
        )
    );

    return in_array(
        $extension,
        $allowed_extensions
    );

}

// =====================================
// FORMAT DISEASE NAME
// =====================================

function formatDiseaseName($disease)
{

    return ucwords(
        str_replace(
            "_",
            " ",
            $disease
        )
    );

}

// =====================================
// DISEASE COLOR FUNCTION
// =====================================

function diseaseColor($disease)
{

    $colors = [

        "healthy" =>
        "#2e7d32",

        "Minor_angular_leaf_spot" =>
        "#f9a825",

        "Minor_bean_rust" =>
        "#fb8c00",

        "severe_angular_leaf_spot" =>
        "#e53935",

        "severe_bean_rust" =>
        "#b71c1c"

    ];

    return
        $colors[$disease]
        ?? "#1565c0";

}

?>