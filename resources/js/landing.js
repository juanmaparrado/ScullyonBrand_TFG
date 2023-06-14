
const i1 = "storage/cartel-publicidad.jpg";
const i2 = "storage/01.png";
const i3 = "storage/cartel-publicidad.jpg";
const i4 = "storage/cartel-publicidad.jpg";
const images = [i1,i2,i3,i4]
const canvas = document.getElementById("canvas");
const ctx = canvas.getContext("2d");
let currentImageIndex = 0;

function drawImage() {
const image = new Image();
image.src = images[currentImageIndex];
image.onload = function() {
ctx.drawImage(image, 0, 0, canvas.width, canvas.height);
setTimeout(nextImage, 5000);
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

const h1 = document.querySelector('#slideshow-container h1');
const button = document.querySelector('#slideshow-container button');

const bounceAnimation = anime({
targets: [h1, button],
translateY: {
    value: [+100, 0],
    duration: 3300,
    elasticity: 600,
},
loop: true
});
