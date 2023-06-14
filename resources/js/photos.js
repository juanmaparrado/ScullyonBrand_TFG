const dragArea = document.querySelector(".drag-area");
const dragText = document.querySelector(".header");
const output = document.querySelector(".output");

let button = document.querySelector(".button");
let input = document.querySelector(".input");

let file;

button.onclick = () => {
    input.click();
}

input.addEventListener("change", function() {
    file = this.files[0];
    displayFile();
});

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

    file = event.dataTransfer.files[0];
    displayFile();
    });

//boton submit
    document.querySelector("form").addEventListener("submit", function(event) {
        event.preventDefault();
    });
    

    function displayFile() {
        let fileType = file.type;
        let validExtensions = ["image/jpeg", "image/jpg", "image/png"];
        if (validExtensions.includes(fileType)) {
            let fileReader = new FileReader();
            fileReader.onload = () => {
                let fileURL = fileReader.result;
                let imgTag = `<img src="${fileURL}" alt="">`;
                output.style.display = "grid";
                output.style.placeItems = "center";
                output.innerHTML = imgTag;
            };
            fileReader.readAsDataURL(file);
        }else{
            alert("This is not an Image File!");
            dragArea.classList.remove("active");
            dragText.textContent = "Drag & Drop";
        }
    }
