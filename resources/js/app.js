import './bootstrap';



const flashMessage = document.getElementById('alert-1');


if(flashMessage != null) {
    setTimeout(function() {
        flashMessage.style.display = 'none';
    }, 4000)
}

const reader = new FileReader(); 

const inputFile = document.getElementById('file');
const img = document.getElementById('img'); 

reader.onload = function(e) {
    img.src = e.target.result;
}

inputFile.addEventListener('change', e => {
    const f = e.target.files[0];
    reader.readAsDataURL(f);
})