// Starfield Animation
const canvas = document.getElementById('starfield');
const ctx = canvas.getContext('2d');

let width, height;
let stars = [];
const numStars = 200;
const speed = 2;

// Resize canvas to fill window
function resize() {
    width = window.innerWidth;
    height = window.innerHeight;
    canvas.width = width;
    canvas.height = height;
}

// Star class
class Star {
    constructor() {
        this.reset();
    }
    
    reset() {
        this.x = (Math.random() - 0.5) * width * 2;
        this.y = (Math.random() - 0.5) * height * 2;
        this.z = Math.random() * width;
        this.pz = this.z;
    }
    
    update() {
        this.z -= speed;
        
        if (this.z < 1) {
            this.reset();
            this.z = width;
            this.pz = this.z;
        }
    }
    
    draw() {
        const sx = (this.x / this.z) * width + width / 2;
        const sy = (this.y / this.z) * height + height / 2;
        
        const r = (width / this.z) * 0.5;
        
        const px = (this.x / this.pz) * width + width / 2;
        const py = (this.y / this.pz) * height + height / 2;
        
        this.pz = this.z;
        
        // Draw star trail
        ctx.beginPath();
        ctx.strokeStyle = 'rgba(255, 255, 255, 0.8)';
        ctx.lineWidth = r;
        ctx.moveTo(px, py);
        ctx.lineTo(sx, sy);
        ctx.stroke();
        
        // Draw star point
        ctx.beginPath();
        ctx.fillStyle = 'rgba(255, 255, 255, 1)';
        ctx.arc(sx, sy, r, 0, Math.PI * 2);
        ctx.fill();
    }
}

// Initialize stars
function init() {
    resize();
    stars = [];
    for (let i = 0; i < numStars; i++) {
        stars.push(new Star());
    }
}

// Animation loop
function animate() {
    // Clear canvas with fade effect
    ctx.fillStyle = 'rgba(0, 0, 0, 0.4)';
    ctx.fillRect(0, 0, width, height);
    
    // Update and draw stars
    stars.forEach(star => {
        star.update();
        star.draw();
    });
    
    requestAnimationFrame(animate);
}

// Handle window resize
window.addEventListener('resize', resize);

// Start animation
init();
animate();
