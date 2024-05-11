<!-- Index.html file -->
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
          href="style.css">
    <title>QR Code Scanner / Reader
    </title>
</head>
 
<body>
   
  <h1>QR Code Scanner</h1>
    <video id="video" width="100%" height="auto" playsinline></video>
    <p id="result"></p>
    <script src="https://cdn.jsdelivr.net/npm/zxing-typescript@0.0.7/umd/index.js"></script>
  
  
  
  <script>
    const video = document.getElementById('video');
const result = document.getElementById('result');

async function initCamera() {
    try {
        const stream = await navigator.mediaDevices.getUserMedia({ video: { facingMode: 'environment' } });
        video.srcObject = stream;
        const codeReader = new ZXing.BrowserQRCodeReader();
        codeReader.decodeFromVideoElement(video, (result, err) => {
            if (result) {
                console.log(result.text);
                video.srcObject.getTracks().forEach(track => track.stop());
                result.innerText = result.text;
            }
            if (err && !(err instanceof ZXing.NotFoundException)) {
                console.error(err);
            }
        });
    } catch (err) {
        console.error(err);
    }
}

initCamera();

  </script>

</body>
</html>