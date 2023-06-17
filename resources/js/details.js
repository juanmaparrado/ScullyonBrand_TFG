const selectSize = document.getElementById('sizeSelect');
const size = document.getElementById('size');
const quantity = document.getElementById('quantity')
const selectQty = document.getElementById('qty')
const addToCart = document.getElementById('submitAdd');

selectSize.addEventListener('change',function(event) {
    size.value = selectSize.value ;
}); 

selectQty.addEventListener('change',function(event){
    quantity.value = selectQty.value;
    console.log(selectQty.value);
    console.log(quantity.value);
});

addToCart.addEventListener('click',function(event){
    quantity.value = selectQty.value;
    size.value = selectSize.value ;

});

const wrapper = document.querySelector('.wrapper');
const indicators = [...document.querySelectorAll('.indicators button')];

let currentTestimonial = 0; // Default 0

indicators.forEach((item, i) => {
    item.addEventListener('click', () => {
        indicators[currentTestimonial].classList.remove('active');
        wrapper.style.marginLeft = `-${100 * i}%`;
        item.classList.add('active');
        currentTestimonial = i;
    })
})

