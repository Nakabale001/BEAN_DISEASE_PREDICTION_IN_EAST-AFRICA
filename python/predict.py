import os
import sys
import json
import numpy as np
from PIL import Image
import tensorflow as tf

# =====================================
# PROJECT SETTINGS
# =====================================

PROJECT_NAME = (
    "A MACHINE LEARNING MODEL TO "
    "PREDICT DISEASE IN BEAN LEAF"
)

IMG_WIDTH = 224
IMG_HEIGHT = 224

CLASS_NAMES = [
    "Minor_angular_leaf_spot",
    "Minor_bean_rust",
    "healthy",
    "severe_angular_leaf_spot",
    "severe_bean_rust"
]

# =====================================
# MODEL PATH
# =====================================

BASE_DIR = os.path.dirname(
    os.path.dirname(
        os.path.abspath(__file__)
    )
)

MODEL_PATH = os.path.join(
    BASE_DIR,
    "model",
    "best_bean_model.keras"
)

# =====================================
# LOAD MODEL
# =====================================

try:

    model = tf.keras.models.load_model(
        MODEL_PATH
    )

except Exception as e:

    print(json.dumps({
        "status": "error",
        "message": f"Failed to load model: {str(e)}"
    }))

    sys.exit(1)

# =====================================
# CHECK IMAGE ARGUMENT
# =====================================

if len(sys.argv) < 2:

    print(json.dumps({
        "status": "error",
        "message": "No image path supplied."
    }))

    sys.exit(1)

image_path = sys.argv[1]

if not os.path.exists(image_path):

    print(json.dumps({
        "status": "error",
        "message": "Image file not found."
    }))

    sys.exit(1)

# =====================================
# IMAGE PREPROCESSING
# =====================================

try:

    image = Image.open(
        image_path
    ).convert("RGB")

    image = image.resize(
        (IMG_WIDTH, IMG_HEIGHT)
    )

    image_array = np.array(
        image,
        dtype=np.float32
    )

    image_array = image_array / 255.0

    image_array = np.expand_dims(
        image_array,
        axis=0
    )

except Exception as e:

    print(json.dumps({
        "status": "error",
        "message": f"Image processing failed: {str(e)}"
    }))

    sys.exit(1)

# =====================================
# PREDICTION
# =====================================

try:

    prediction = model.predict(
        image_array,
        verbose=0
    )

    predicted_index = int(
        np.argmax(prediction[0])
    )

    confidence = float(
        np.max(prediction[0]) * 100
    )

    disease = CLASS_NAMES[
        predicted_index
    ]

    print(json.dumps({

        "status": "success",

        "project":
        PROJECT_NAME,

        "disease":
        disease,

        "confidence":
        round(confidence, 2)

    }))

except Exception as e:

    print(json.dumps({

        "status": "error",

        "message":
        f"Prediction failed: {str(e)}"

    }))

    sys.exit(1)