<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VGA + RAM 8 Example</title>
  <script src="https://cdn.jsdelivr.net/npm/qrcode/build/qrcode.min.js"></script>
</head>
<body>
  <h1>VGA + RAM 8 Example</h1>
  <div id="qr-code" style="margin-top: 20px;">
    <!-- QR Code will be rendered here -->
  </div>
  <script>
    // Static content for the QR code (can be a link, or any static text)
    var qrContent = 'https://www.example.com/vga-ram8';

    // Generate the QR code in the designated div
    QRCode.toCanvas(document.getElementById('qr-code'), qrContent, function (error) {
      if (error) console.error(error);
      console.log('QR code generated!');
    });
  </script>
</body>
</html>