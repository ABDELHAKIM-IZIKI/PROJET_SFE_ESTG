<!DOCTYPE html>
<html>
<head>
    <title>Barcode Scanner</title>
  
</head>
<body>
    <button id="scanButton">Scan Barcode</button>
    <video id="video" ></video>

    <script src="
https://cdn.jsdelivr.net/npm/@zxing/library@0.21.0/umd/index.min.js
"></script>
    <script >
const video = document.getElementById('video');
const scanButton = document.getElementById('scanButton');

scanButton.addEventListener('click', async () => {
    const stream = await navigator.mediaDevices.getUserMedia({ video: { facingMode: 'environment' } });
    video.srcObject = stream;
    video.play();
    scanBarcode();
});

function scanBarcode() {
    video.addEventListener('loadedmetadata', () => {
        const canvas = document.createElement('canvas');
        const canvasContext = canvas.getContext('2d');
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;

        canvasContext.drawImage(video, 0, 0, canvas.width, canvas.height);
        const imageData = canvasContext.getImageData(0, 0, canvas.width, canvas.height);
        
        const codeReader = new ZXing.BrowserQRCodeReader();
        codeReader.decodeFromImage(undefined, imageData).then(result => {
            alert('Barcode detected: ' + result.text);
        }).catch(err => {
            console.error('Barcode detection error:', err);
        });
    });
}

    </script>
</body>
</html>
