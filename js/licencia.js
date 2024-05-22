document.addEventListener('DOMContentLoaded', (event) => {
    // Variables para la firma
    const signatureCanvas = document.getElementById('signatureCanvas');
    const ctx = signatureCanvas.getContext('2d');
    let drawing = false;
    let lastX = 0;
    let lastY = 0;

    signatureCanvas.addEventListener('mousedown', startDrawing);
    signatureCanvas.addEventListener('mousemove', draw);
    signatureCanvas.addEventListener('mouseup', stopDrawing);
    signatureCanvas.addEventListener('mouseout', stopDrawing);

    function startDrawing(event) {
        drawing = true;
        [lastX, lastY] = [event.offsetX, event.offsetY];
    }

    function draw(event) {
        if (!drawing) return;
        ctx.lineWidth = 2;
        ctx.lineCap = 'round';
        ctx.strokeStyle = '#000';

        ctx.beginPath();
        ctx.moveTo(lastX, lastY);
        ctx.lineTo(event.offsetX, event.offsetY);
        ctx.stroke();
        [lastX, lastY] = [event.offsetX, event.offsetY];
    }

    function stopDrawing() {
        drawing = false;
    }

    function clearSignature() {
        ctx.clearRect(0, 0, signatureCanvas.width, signatureCanvas.height);
    }

    function saveSignature() {
        const dataURL = signatureCanvas.toDataURL('image/png');
        const formData = new FormData(document.getElementById('licenciaForm'));
        formData.append('signature', dataURL);

        fetch('ILicencias.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            console.log(data);
            alert('Firma guardada correctamente');
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Hubo un error al guardar la firma');
        });
    }

    document.getElementById('clearSignatureButton').addEventListener('click', clearSignature);
    document.getElementById('saveSignatureButton').addEventListener('click', saveSignature);

    // Variables para la webcam
    const chooseFile = document.getElementById('chooseFile');
    const chooseCamera = document.getElementById('chooseCamera');
    const fileInputDiv = document.getElementById('fileInputDiv');
    const cameraInputDiv = document.getElementById('cameraInputDiv');
    const video = document.getElementById('video');
    const takePhotoButton = document.getElementById('takePhotoButton');
    const preview = document.getElementById('preview');
    const canvas = document.getElementById('canvas');

    chooseFile.addEventListener('change', function() {
        fileInputDiv.classList.remove('hidden');
        cameraInputDiv.classList.add('hidden');
        stopVideoStream();
        hidePreview();
    });

    chooseCamera.addEventListener('change', function() {
        fileInputDiv.classList.add('hidden');
        cameraInputDiv.classList.remove('hidden');
        startVideoStream();
    });

    function hidePreview() {
        preview.classList.add('hidden');
        preview.src = '';
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

    function startVideoStream() {
        navigator.mediaDevices.getUserMedia({ video: true })
            .then(stream => {
                video.srcObject = stream;
                video.classList.remove('hidden');
                takePhotoButton.classList.remove('hidden');
            })
            .catch(err => {
                console.error('Error al acceder a la cámara:', err);
                alert('No se pudo acceder a la cámara.');
            });
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

    document.getElementById('licenciaForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const fileInput = document.getElementById('fileInput');
        const files = fileInput.files.length > 0 ? fileInput.files : [];

        let formData = new FormData(document.getElementById('licenciaForm'));

        if (files.length > 0) {
            formData.append('file', files[0]);
        } else if (!preview.classList.contains('hidden')) {
            const dataURL = preview.src;
            const blob = dataURLtoBlob(dataURL);
            formData.append('file', blob, 'photo.png');
        } else {
            alert('Por favor, selecciona un archivo o toma una foto.');
            return;
        }

        fetch('ILicencias.php', {
            method: 'POST',
            body: formData
        }).then(response => response.json())
        .then(data => {
            alert('Archivo subido con éxito');
        }).catch(error => {
            console.error('Error al subir el archivo:', error);
            alert('Error al subir el archivo');
        });
    });

    function dataURLtoBlob(dataURL) {
        const byteString = atob(dataURL.split(',')[1]);
        const mimeString = dataURL.split(',')[0].split(':')[1].split(';')[0];
        const ab = new ArrayBuffer(byteString.length);
        const ia = new Uint8Array(ab);
        for (let i = 0; i < byteString.length; i++) {
            ia[i] = byteString.charCodeAt(i);
        }
        return new Blob([ab], { type: mimeString });
    }
});
