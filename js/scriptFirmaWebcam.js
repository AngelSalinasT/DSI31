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
    console.log('Iniciando el stream de video...');
    if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
        navigator.mediaDevices.getUserMedia({ video: true }).then((stream) => {
            console.log('Stream de video iniciado');
            video.srcObject = stream;
            video.play();
        }).catch(err => {
            console.error('Error al acceder a la cámara:', err);
            alert('No se pudo acceder a la cámara.');
        });
    } else {
        console.error('navigator.mediaDevices o navigator.mediaDevices.getUserMedia no están disponibles');
    }
}

function stopVideoStream() {
    console.log('Deteniendo el stream de video...');
    const stream = video.srcObject;
    if (stream) {
        const tracks = stream.getTracks();
        tracks.forEach(track => track.stop());
        video.srcObject = null;
    }
    video.classList.add('hidden');
    takePhotoButton.classList.add('hidden');
    console.log('Stream de video detenido');
}

takePhotoButton.addEventListener('click', function() {
    console.log('Botón de tomar foto presionado');
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
    const dataURL = canvas.toDataURL('image/png');
    preview.src = dataURL;
    preview.classList.remove('hidden');
    console.log('Foto tomada y mostrada en la previsualización');
    stopVideoStream();
});

retakePhotoButton.addEventListener('click', function(event) {
    event.preventDefault(); // Evita la recarga de la página
    console.log('Botón de volver a tomar foto presionado');
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
    console.log('Botón de limpiar firma presionado');
    signaturePad.clear();
});

// Función para verificar el ID del conductor
function verificarIDConductor(idConductor) {
    console.log('Verificando ID del conductor:', idConductor);
    return fetch(`../../php forms/check_conductor.php?id=${idConductor}`)
        .then(response => response.json())
        .then(data => {
            console.log('Respuesta de la verificación del ID del conductor:', data);
            return data.valido;
        })
        .catch(error => {
            console.error('Error al verificar el ID del conductor:', error);
            return false;
        });
}

// Envío de datos
submit.addEventListener('click', async (e) => {
    e.preventDefault();
    console.log('Botón de enviar presionado');

    // Obtener el ID del conductor
    const idConductor = document.getElementById('CONDUCTOR').value;
    console.log('ID del conductor obtenido:', idConductor);

    // Verifica si hay una foto y una firma
    if (canvas.toDataURL() === '' || signaturePad.isEmpty()) {
        alert('Por favor, asegúrese de que se haya tomado una foto y se haya proporcionado una firma.');
        console.log('Falta foto o firma');
        return;
    }

    // Verifica el ID del conductor
    const idValido = await verificarIDConductor(idConductor);
    console.log('ID del conductor válido:', idValido);

    if (!idValido) {
        alert('ID de conductor no válido.');
        console.log('ID de conductor no válido');
        return;
    }

    // Convertir canvas de foto a Blob
    canvas.toBlob((fotoBlob) => {
        console.log('Foto convertida a Blob');
        // Convertir canvas de firma a Blob
        signaturePadCanvas.toBlob((firmaBlob) => {
            console.log('Firma convertida a Blob');
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

            console.log('Datos del formulario preparados para enviar');

            // Enviar los datos mediante fetch
            fetch('../../php forms/add/ILicencias.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                console.log('Respuesta del servidor:', data);
                alert('Formulario enviado favor de revisar la base, si el registro no se realizo, probablmente se ingreso un dato no existente.');
                // Redirigir o mostrar mensaje de éxito
            })
            .catch(error => {
                console.error('Error al enviar el formulario:', error);
                alert('Ocurrió un error al enviar el formulario: ' + error.message);
            });
        });
    });
});
