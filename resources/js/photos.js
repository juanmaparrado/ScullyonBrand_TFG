const dragArea = document.querySelector(".drag-area");
const dragText = document.querySelector(".header");
//when file is inside the drag area

dragArea.addEventListener("dragover", (event) => {
    event.preventDefault();
    dragText.textContent = "Release to Upload File";
    dragArea.classList.add("active");
});
//when file is outside the drag area
dragArea.addEventListener("dragleave", (event) => {
    dragText.textContent = "Drag & Drop";
    dragArea.classList.remove("active");
});
//when file is dropped inside the drag area
dragArea.addEventListener("drop", (event) => {
    event.preventDefault();

});



//////                      https://www.youtube.com/watch?v=HuVI3p1MNPo
//////