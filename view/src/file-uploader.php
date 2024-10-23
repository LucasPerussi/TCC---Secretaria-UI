<!-- User Content -->
<?php

use API\Controller\Config; ?>

<style>
    h3 {
        font-size: 18px !important;
    }

    .dropzone {
        min-height: 100px !important;
        max-height: 190px !important;
    }

    .dropzone .dz-message:before {
        font-size: 30px !important;
        top: unset !important;
        width: 30px !important;
        height: 30px !important;
    }

    .dropzone .dz-message .dz-button {
        font-size: 0px !important;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">
<link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/app-assets/css/plugins/forms/form-file-uploader.css">
<h1>Upload de Arquivos</h1>
<form id="my-dropzone" class="dropzone" method="post">
    <input type="hidden" id="type" name="type" value="9998">
    <input type="hidden" id="reference" name="reference" value="<?=$_GET['serial-number'] ?>">
    <input type="hidden" id="descricao" name="descricao" value="BACKUP SERIAL <?=$_GET['serial-number'] ?>">
    <input type="hidden" id="csrf_token" name="csrf_token" value="<?= $_SESSION["csrf_token"] ?>">
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    // Configurações do Dropzone
    Dropzone.options.myDropzone = {
        url: "<?= Config::BASE_ACTION_URL ?>/upload/file",
        paramName: "file",
        maxFilesize: 2, // Tamanho máximo do arquivo em MB
        maxFiles: 1, // Número máximo de arquivos
        dictDefaultMessage: "Arraste os arquivos aqui para fazer o upload",
        // acceptedFiles: ".jpeg,.jpg,.png,.gif", // Tipos de arquivos aceitos
        init: function() {
            this.on("success", function(file, response) {
                console.log("Arquivo enviado com sucesso:", response);
                Toast.fire({
                    icon: 'success',
                    title: 'Seu arquivo foi enviado com sucesso!',
                })
            });
            this.on("error", function(file, response) {
                console.error("Erro ao enviar o arquivo:", response);
                Toast.fire({
                    icon: 'error',
                    title: response,
                })
            });
            this.on("maxfilesexceeded", function(file) {
                this.removeFile(file);
                Toast.fire({
                    icon: 'error',
                    title: 'Você não pode enviar mais do que 1 arquivo.',
                })
            });
            this.on("error", function(file, response) {
                if (file.size > this.options.maxFilesize * 1024 * 1024) {
                    Toast.fire({
                        icon: 'error',
                        title: 'O arquivo excede o tamanho máximo permitido de 2MB.',
                    })
                    this.removeFile(file);
                }
            });
        }
    };
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>