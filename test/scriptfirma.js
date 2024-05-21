const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');

let drawing = false;
let lastX = 0;
let lastY = 0;

canvas.addEventListener('mousedown', startDrawing);
canvas.addEventListener('mousemove', draw);
canvas.addEventListener('mouseup', stopDrawing);
canvas.addEventListener('mouseout', stopDrawing);
canvas.addEventListener('touchstart', startDrawing);
canvas.addEventListener('touchmove', draw);
canvas.addEventListener('touchend', stopDrawing);

function startDrawing(event) {
  drawing = true;
  const { offsetX, offsetY } = getOffset(event);
  lastX = offsetX;
  lastY = offsetY;
  draw(event);
}

function draw(event) {
  if (!drawing) return;
  
  event.preventDefault();
  
  const { offsetX, offsetY } = getOffset(event);
  
  ctx.lineWidth = 2;
  ctx.lineCap = 'round';
  ctx.strokeStyle = '#000';
  
  ctx.beginPath();
  ctx.moveTo(lastX, lastY);
  ctx.lineTo(offsetX, offsetY);
  ctx.stroke();
  
  lastX = offsetX;
  lastY = offsetY;
}

function stopDrawing() {
  drawing = false;
}

function limpiarFirma() {
  ctx.clearRect(0, 0, canvas.width, canvas.height);
}

function guardarFirma() {
  const dataURL = canvas.toDataURL('image/png');
  const link = document.createElement('a');
  link.href = dataURL;
  link.download = 'firma.png';
  link.click();
}

function getOffset(event) {
  let offsetX, offsetY;
  if (event.type.startsWith('touch')) {
    const rect = canvas.getBoundingClientRect();
    offsetX = event.touches[0].clientX - rect.left;
    offsetY = event.touches[0].clientY - rect.top;
  } else {
    offsetX = event.offsetX;
    offsetY = event.offsetY;
  }
  return { offsetX, offsetY };
}
