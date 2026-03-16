// Starfield Example with Floating QR Code

const generateStarfield = () => {
  const canvas = document.getElementById('starfield');
  const ctx = canvas.getContext('2d');

  let stars = [];
  for (let i = 0; i < 1000; i++) {
    stars.push({
      x: Math.random() * canvas.width,
      y: Math.random() * canvas.height,
      size: Math.random() * 2 + 0.5,
      speed: Math.random() * 0.5 + 0.2
    });
  }

  const animateStarfield = () => {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    for (let i = 0; i < stars.length; i++) {
      const star = stars[i];
      ctx.beginPath();
      ctx.arc(star.x, star.y, star.size, 0, Math.PI * 2);
      ctx.fillStyle = 'white';
      ctx.fill();
      star.y += star.speed;
      if (star.y > canvas.height) {
        star.y = 0;
      }
    }

    requestAnimationFrame(animateStarfield);
  };

  animateStarfield();
};

const createQRCode = (content) => {
  const qrCodeContainer = document.getElementById('qr-code');
  const qrCode = new QRCode(qrCodeContainer, {
    text: content,
    width: 128,
    height: 128,
  });
};

const toggleQRCode = (isVisible) => {
  const qrCodeContainer = document.getElementById('qr-code');
  if (isVisible) {
    qrCodeContainer.style.display = 'block';
  } else {
    qrCodeContainer.style.display = 'none';
  }
};

window.onload = () => {
  generateStarfield();
  createQRCode('https://example.com'); // Add your QR Code URL here
  toggleQRCode(true); // Set to true or false to show/hide QR Code
};