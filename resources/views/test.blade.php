<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>QR Code and Barcode Scanner</title>
<style>
    /* CSS for styling the camera feed */
    #video-container {
        width: 100%;
        text-align: center;
    }
    #video {
        width: 100%;
        max-width: 600px;
    }
</style>
</head>
<body>
<div id="video-container">
    <video id="video" autoplay></video>
</div>
<script src="https://cdn.jsdelivr.net/npm/quagga/dist/quagga.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    // Your code here


   

            // Configure QuaggaJS
            Quagga.init({
                inputStream: {
                    constraints: {
                        width: 640,
                        height: 480,
                        facingMode: "user" // or "user" for front camera
                    }
                },
                locator: {
                    patchSize: "medium",
                    halfSample: true
                },
                numOfWorkers: navigator.hardwareConcurrency,
                decoder: {
                    readers: ["code_128_reader", "ean_reader", "upc_reader", "code_39_reader", "code_39_vin_reader", "codabar_reader", "i2of5_reader", "2of5_reader", "code_93_reader"]
                },
                locate: true
            }, function (err) {
                if (err) {
                    console.error(err);
                    return;
                }
                Quagga.start();
            });

             // Access the camera and start scanning
    navigator.mediaDevices.getUserMedia({ video: { facingMode: "environment" } })
        .then(function (stream) {
            var video = document.getElementById("video");
        

            video.srcObject = stream;
            video.onloadedmetadata = function (e) {
                video.play();
            };
            
            // Handle scanned results
            Quagga.onDetected(function (result) {
                var code = result.codeResult.code;
                alert("Code detected: " + code);
                // You can handle the scanned code here (e.g., display it on the page)
            });
        })
        .catch(function (err) {
            console.error("Error accessing the camera: " + err);
        });

    });
</script>
</body>
</html>
