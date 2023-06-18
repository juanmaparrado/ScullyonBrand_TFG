
const i1 = "storage/ALLcollection.jpg";
const i2 = "storage/reverseHoodie.jpg";
const i3 = "storage/backorange.jpg";
const i4 = "storage/backBrown.jpg";


const images = [i1,i2,i3,i4]
const canvas = document.getElementById("canvas");
const ctx = canvas.getContext("2d");
let currentImageIndex = 0; 

function drawImage() {
    const image = new Image();
    image.src = images[currentImageIndex];
    image.onload = function() {
    ctx.drawImage(image, 0, 0, canvas.width, canvas.height);
    
    setTimeout(nextImage, 1200);
    };
}

function nextImage() {
    currentImageIndex++;
    if (currentImageIndex >= images.length) {
        currentImageIndex = 0;
    }
    drawImage();
}

drawImage();

const welcomeElement = document.getElementById('welcome');
const shippingElement = document.getElementById('shipping');
anime({
  targets: [welcomeElement,shippingElement],
  translateX: ['0%', '5%'],
  loop: true,
  direction: 'alternate',
  duration: 2000,
  easing: 'easeInOutQuad',
});


