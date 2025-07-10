$(document).ready(function () {
    const video_element = document.getElementById('video');
    const btn_capturar_element = document.getElementById('btn-capturar');
    const btn_capturar_span_element = btn_capturar_element.querySelector('span');
    const imagen_element = document.getElementById('imagen');

    let stream;

    async function start_video() {
        try {
            stream = await navigator.mediaDevices.getUserMedia({ 
                video: true
            });
            video_element.srcObject = stream;
        }
        catch (e) {
            console.error('Error al acceder a la camara:', e);
        }
    }

    start_video();

    btn_capturar_element.addEventListener('click', () => {
        if (!stream) return;
        
        if (btn_capturar_span_element.textContent === 'Capturar') {
            video_element.pause();

            btn_capturar_span_element.textContent = 'Recapturar';

            const canvas = document.createElement('canvas');

            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;

            const ctx = canvas.getContext('2d');
            
            ctx.imageSmoothingEnabled = true;
            ctx.imageSmoothingQuality = 'high';
            
            ctx.drawImage(video, 0, 0);

            canvas.toBlob(blob => {
                const datetime = new Date().toISOString().slice(0, 19).replace('T', ' ').replace(/:/g, '-');

                const file = new File([blob], `FICHADA CAPTURA ${datetime}.png`, {
                    type: 'image/png'
                });

                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);

                imagen_element.files = dataTransfer.files;
            }, 'image/png');
        }
        else {
            video_element.play();

            btn_capturar_span_element.textContent = 'Capturar';
        }

        btn_capturar_element.blur();
    });
});
