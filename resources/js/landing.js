
const i1 = "https://images.unsplash.com/photo-1675257020144-ae2f0369900a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=710&q=80";
const i2 = "https://images.unsplash.com/photo-1674908850980-13d381e2c5f8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=684&q=80"; 
const i3 = "https://images.unsplash.com/photo-1675257020144-ae2f0369900a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=710&q=80";
const i4 = "https://images.unsplash.com/photo-1674908850980-13d381e2c5f8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=684&q=80"; 
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


  



