// =====================================
// A MACHINE LEARNING MODEL TO PREDICT
// DISEASE IN BEAN LEAF
// =====================================

// Image Preview Before Upload

document.addEventListener("DOMContentLoaded", function () {

    const fileInput =
        document.querySelector(
            'input[type="file"]'
        );

    if (!fileInput) return;

    const preview =
        document.createElement("img");

    preview.style.maxWidth = "300px";
    preview.style.marginTop = "20px";
    preview.style.display = "none";
    preview.style.borderRadius = "10px";

    fileInput.parentNode.appendChild(
        preview
    );

    fileInput.addEventListener(
        "change",
        function () {

            const file =
                this.files[0];

            if (!file) return;

            const reader =
                new FileReader();

            reader.onload = function (e) {

                preview.src =
                    e.target.result;

                preview.style.display =
                    "block";

            };

            reader.readAsDataURL(
                file
            );

        }
    );

});

// =====================================
// Form Loading Animation
// =====================================

document.addEventListener(
    "DOMContentLoaded",
    function () {

        const form =
            document.querySelector("form");

        if (!form) return;

        form.addEventListener(
            "submit",
            function () {

                const btn =
                    document.querySelector(
                        ".predict-btn"
                    );

                if (btn) {

                    btn.innerHTML =
                        '<i class="fas fa-spinner fa-spin"></i> Processing...';

                    btn.disabled = true;

                }

            }
        );

    }
);

// =====================================
// Confirm PDF Download
// =====================================

function confirmPDF() {

    return confirm(
        "Download prediction report PDF?"
    );

}