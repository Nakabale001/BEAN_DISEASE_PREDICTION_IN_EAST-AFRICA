-- =====================================================
-- PROJECT:
-- A MACHINE LEARNING MODEL TO PREDICT DISEASE IN BEAN LEAF
-- =====================================================

DROP DATABASE IF EXISTS a_machine_learning_model_to_predict_disease_in_bean_leaf;

CREATE DATABASE a_machine_learning_model_to_predict_disease_in_bean_leaf;

USE a_machine_learning_model_to_predict_disease_in_bean_leaf;

CREATE TABLE predictions (

    id INT AUTO_INCREMENT PRIMARY KEY,

    image_name VARCHAR(255) NOT NULL,

    disease VARCHAR(100) NOT NULL,

    confidence DECIMAL(5,2) NOT NULL,

    language VARCHAR(10) NOT NULL,

    prediction_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP



);

-- =====================================================
-- SAMPLE RECORDS
-- =====================================================

INSERT INTO predictions
(
    image_name,
    disease,
    confidence,
    language
)
VALUES
(
    'healthy_leaf.jpg',
    'healthy',
    98.75,
    'en'
),
(
    'rust_leaf.jpg',
    'Minor_bean_rust',
    92.40,
    'en'
),
(
    'angular_leaf.jpg',
    'Minor_angular_leaf_spot',
    95.20,
    'lg'
);

-- =====================================================
-- VERIFY DATA
-- =====================================================

SELECT * FROM predictions;