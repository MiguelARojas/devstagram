import {Dropzone} from 'dropzone';

Dropzone.autoDiscover = false;

if(document.getElementById("dropzone")) {
    const dropzone = new Dropzone("#dropzone", {
        dictDefaultMessage: 'Sube Tu Imagen',
        acceptedFiles: ".png,.jpg,.jpeg,.gif",
        addRemoveLinks: true,
        dictRemoveFile: 'Borrar Archivo',
        maxFiles: 1,
        uploadMultiple: false,
    
        // SE EJECUTA UNA VEZ SE INICIA DROPZONE
        init: function() {
            // SI SE EJECUTÓ Y HABÍA UNA IMAGEN SE ALMACENARÁ LA IMAGEN PARA PONERLA DE NUEVO 
            if (document.querySelector('[name="imagen"]').value.trim()) {
                const imagenPublicada = {}
                imagenPublicada.size = 1234;
                imagenPublicada.name = document.querySelector('[name="imagen"]').value;
    
                // SE ASIGNA LA IMAGEN PUBLICADA TANTO COMO EL SIZE COMO EL NAME
                this.options.addedfile.call(this, imagenPublicada);
                this.options.thumbnail.call(this, imagenPublicada,
                    `/uploads/${imagenPublicada.name}`);
                imagenPublicada.previewElement.classList.add('dz-success', 'dz-complete');
            }
        },
    });
    
    // METODOS QUE CUENTA DROPZONE
    dropzone.on('success', function(file, response) {
        console.log(response.imagen);
        document.querySelector('[name="imagen"]').value = response.imagen;
    });
    
    dropzone.on('removedFile', function() {
        document.querySelector('[name="imagen"]').value = '';
    });
}


