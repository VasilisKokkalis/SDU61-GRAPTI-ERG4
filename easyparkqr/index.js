document.addEventListener('deviceready', onDeviceReady, false);

function onDeviceReady() {
    console.log("Cordova is ready");
}

function scanQRCode() {
    cordova.plugins.barcodeScanner.scan(
        function (result) {
            if (!result.cancelled) {
                document.getElementById("result").innerText = 
                  "QR Σαρώθηκε: " + result.text;

                // Εδώ μπορείς να στείλεις το QR result σε backend ή να ενημερώσεις DB
                // π.χ. μέσω AJAX/Firebase κλπ
            }
        },
        function (error) {
            alert("Σφάλμα QR: " + error);
        },
        {
            preferFrontCamera: false,
            showFlipCameraButton: true,
            showTorchButton: true,
            prompt: "Σκάναρε τον QR κωδικό της θέσης",
            formats: "QR_CODE",
            orientation: "portrait"
        }
    );
}
