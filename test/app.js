const uploadOption = document.getElementById('uploadOption');
const cameraOption = document.getElementById('cameraOption');
const fileInput = document.getElementById('fileInput');
const camera = document.getElementById('camera');
const canvas = document.getElementById('canvas');
const preview = document.getElementById('preview');
const uploadForm = document.getElementById('uploadForm');

uploadOption.addEventListener('change', () => {
    if (uploadOption.checked) {
        fileInput.style.display = 'block';
        camera.style.display = 'none';
        preview.style.display = 'none';
    }
});

cameraOption.addEventListener('change', () => {
    if (cameraOption.checked) {
        fileInput.style.display = 'none';
        camera.style.display = 'block';
        preview.style.display = 'none';
        setupCamera();
    }
});

function setupCamera() {
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(stream => {
            camera.srcObject = stream;
        })
        .catch(error => {
            console.error('Error accessing camera: ', error);
        });
}

camera.addEventListener('click', () => {
    const context = canvas.getContext('2d');
    context.drawImage(camera, 0, 0, canvas.width, canvas.height);
    camera.style.display = 'none';
    canvas.style.display = 'block';
    preview.src = canvas.toDataURL('image/png');
    preview.style.display = 'block';
});

fileInput.addEventListener('change', () => {
    const file = fileInput.files[0];
    const reader = new FileReader();
    reader.onload = () => {
        preview.src = reader.result;
        preview.style.display = 'block';
    };
    reader.readAsDataURL(file);
});

uploadForm.addEventListener('submit', (event) => {
    event.preventDefault();
    if (cameraOption.checked) {
        const dataURL = canvas.toDataURL('image/png');
        // Aquí puedes enviar el dataURL al servidor o hacer lo que necesites con la imagen
        console.log(dataURL);
    } else {
        const file = fileInput.files[0];
        // Aquí puedes enviar el archivo al servidor o hacer lo que necesites con él
        console.log(file);
    }
    // Puedes agregar aquí el código para enviar el formulario si lo deseas
});