# Smart Bean Disease Prediction System

## Overview

The Smart Bean Disease Prediction System is an offline agricultural decision-support application developed using PHP, Python, TensorFlow Lite, SQLite, HTML, CSS, and JavaScript.

The system helps farmers identify bean leaf diseases by uploading an image of a bean leaf. After prediction, the system provides treatment recommendations, causes, and prevention measures in:

* English
* Luganda
* Kiswahili

The application works completely offline after installation.

---

## Supported Diseases

The TensorFlow Lite model predicts the following classes:

| Class Index | Disease                  |
| ----------- | ------------------------ |
| 0           | Minor Angular Leaf Spot  |
| 1           | Minor Bean Rust          |
| 2           | Healthy                  |
| 3           | Severe Angular Leaf Spot |
| 4           | Severe Bean Rust         |

---

## Technologies Used

### Frontend

* HTML5
* CSS3
* JavaScript

### Backend

* PHP 8+
* Python 3.10+

### Machine Learning

* TensorFlow Lite
* NumPy
* Pillow

### Database

* SQLite

---

## Project Structure

BeanDiseaseSystem/

├── assets/

│   ├── css/

│   │   └── style.css

│   ├── js/

│   │   └── script.js

│   └── images/

│       └── farm.jpg

├── languages/

│   ├── en.php

│   ├── lg.php

│   └── sw.php

├── uploads/

├── model/

│   └── bean_disease_model.tflite

├── python/

│   └── predict.py

├── database/

│   ├── create_database.php

│   └── bean_disease.db

├── index.php

├── predict.php

├── history.php

├── config.php

└── README.md

---

## Installation

### Step 1: Install XAMPP

Install XAMPP and start:

* Apache
* MySQL (optional)

---

### Step 2: Copy Project

Place the project inside:

htdocs/

Example:

C:\xampp\htdocs\BeanDiseaseSystem

---

### Step 3: Install Python Packages

Open Command Prompt:

pip install tensorflow

pip install pillow

pip install numpy

---

### Step 4: Place Model

Copy your TensorFlow Lite model:

model/bean_disease_model.tflite

---

### Step 5: Create Database

Open:

http://localhost/BeanDiseaseSystem/database/create_database.php

The database and prediction table will be created automatically.

---

### Step 6: Launch Application

Open:

http://localhost/BeanDiseaseSystem

---

## Features

* Offline disease prediction
* TensorFlow Lite integration
* English support
* Luganda support
* Kiswahili support
* Prediction history
* SQLite database storage
* Farmer recommendations
* Disease prevention advice
* Mobile-friendly interface

---

## Future Improvements

* Voice advice
* PDF reports
* Farmer dashboard
* Disease trend charts
* SMS notifications
* GPS farm mapping

---

## Developer

Smart Bean Disease Prediction System

Developed using PHP, Python, TensorFlow Lite and SQLite.
