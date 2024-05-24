//  webcam 
const cameraInputDiv = document.getElementById('cameraInputDiv');
const video = document.getElementById('video');
const takePhotoButton = document.getElementById('takePhotoButton');
const preview = document.getElementById('preview');
const canvas = document.getElementById('canvas');
const retakePhotoButton = document.getElementById('retakePhotoButton');
const submit = document.getElementById('submit'); // Asegurarse de que el ID sea 'submit'

function hidePreview() {
    preview.classList.add('hidden');
    preview.src = '';
}

function startVideoStream() {
    if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
        navigator.mediaDevices.getUserMedia({ video: true }).then((stream) => {
            video.srcObject = stream;
            video.play();
        }).catch(err => {
            console.error('Error al acceder a la cámara:', err);
            alert('No se pudo acceder a la cámara.');
        });
    }
}

function stopVideoStream() {
    const stream = video.srcObject;
    if (stream) {
        const tracks = stream.getTracks();
        tracks.forEach(track => track.stop());
        video.srcObject = null;
    }
    video.classList.add('hidden');
    takePhotoButton.classList.add('hidden');
}

takePhotoButton.addEventListener('click', function() {
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
    const dataURL = canvas.toDataURL('image/png');
    preview.src = dataURL;
    preview.classList.remove('hidden');
    stopVideoStream();
});

retakePhotoButton.addEventListener('click', function(event) {
    event.preventDefault(); // Evita la recarga de la página
    canvas.classList.add('hidden');
    preview.classList.add('hidden');
    video.classList.remove('hidden');
    takePhotoButton.classList.remove('hidden');
    startVideoStream();
});

// Inicia el stream de video al cargar la página
startVideoStream();

// firma 
const signaturePadCanvas = document.getElementById('signature-pad');
const clearSignatureButton = document.getElementById('clearSignature');
const signaturePad = new SignaturePad(signaturePadCanvas, {
    backgroundColor: 'rgba(255, 255, 255, 0)',
    penColor: 'rgb(0, 0, 0)'
});

// Clear signature
clearSignatureButton.addEventListener('click', () => {
    signaturePad.clear();
});

// Envío de datos
submit.addEventListener('click', (e) => {
    e.preventDefault();
    
    canvas.toBlob((fotoBlob) => {
        signaturePadCanvas.toBlob((firmaBlob) => {
            const formData = new FormData();
            formData.append('foto', fotoBlob, 'foto.png');
            formData.append('firma', firmaBlob, 'firma.png');

            fetch('process.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    throw new Error(data.error);
                }
                document.getElementById('message').innerText = data.message;
            })
            .catch(error => {
                document.getElementById('message').innerText = 'Ocurrió un error al enviar el formulario: ' + error.message;
            });
        });
    });
});

