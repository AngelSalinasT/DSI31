// Elementos de la cámara
const video = document.getElementById('video');
const takePhotoButton = document.getElementById('takePhotoButton');
const preview = document.getElementById('preview');
const canvas = document.getElementById('canvas');
const retakePhotoButton = document.getElementById('retakePhotoButton');

// Elementos de la firma
const signaturePadCanvas = document.getElementById('signature-pad');
const clearSignatureButton = document.getElementById('clearSignature');
const signaturePad = new SignaturePad(signaturePadCanvas, {
    backgroundColor: 'rgba(255, 255, 255, 0)',
    penColor: 'rgb(0, 0, 0)'
});

// Elementos del formulario
const submit = document.getElementById('submit');

// Funciones de la cámara
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

// Función para limpiar la firma
clearSignatureButton.addEventListener('click', () => {
    signaturePad.clear();
});

// Envío de datos
submit.addEventListener('click', (e) => {
    e.preventDefault();

    // Verifica si hay una foto y una firma
    if (canvas.toDataURL() === '' || signaturePad.isEmpty()) {
        alert('Por favor, asegúrese de que se haya tomado una foto y se haya proporcionado una firma.');
        return;
    }

    // Convertir canvas de foto a Blob
    canvas.toBlob((fotoBlob) => {
        // Convertir canvas de firma a Blob
        signaturePadCanvas.toBlob((firmaBlob) => {
            // Crear FormData y añadir los demás campos del formulario
            const formData = new FormData();
            formData.append('foto', fotoBlob, 'foto.png');
            formData.append('firma', firmaBlob, 'firma.png');

            // Añadir los demás campos del formulario
            formData.append('NOLICENCIA', document.getElementById('NOLICENCIA').value);
            formData.append('TIPO', document.getElementById('TIPO').value);
            formData.append('FECHAEXPEDICION', document.getElementById('FECHAEXPEDICION').value);
            formData.append('VIGENCIA', document.getElementById('VIGENCIA').value);
            formData.append('ANTIGUEDAD', document.getElementById('ANTIGUEDAD').value);
            formData.append('CONDUCTOR', document.getElementById('CONDUCTOR').value);
            formData.append('RESTRICCIONES', document.getElementById('RESTRICCIONES').value);

            // Enviar los datos mediante fetch
            fetch('../../php forms/add/ILicencias.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
               
                alert('Formulario enviado exitosamente.');
                // Redirigir o mostrar mensaje de éxito
            })
            .catch(error => {
                alert('Ocurrió un error al enviar el formulario: ' + error.message);
            });
        });
    });
});
