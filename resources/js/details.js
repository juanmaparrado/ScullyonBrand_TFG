const selectSize = document.getElementById('sizeSelect');
const size = document.getElementById('size');

window.onload = function() {
    size.value = 'S';
}

selectSize.addEventListener('change',function(event) {
    size.value = selectSize.value ;
}); 