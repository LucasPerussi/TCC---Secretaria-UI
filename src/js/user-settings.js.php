<?php

use API\Controller\Config;
?>
<script>
    // Função genérica para manipular a submissão de formulários
    function handleFormSubmission(formId, endpoint, saveButtonId, successMessage, errorMessage) {
        $("#" + formId).submit(function(e) {
            e.preventDefault();
            const data = new FormData(e.target);
            const object = Object.fromEntries(data.entries());

            axios.post('<?= Config::BASE_ACTION_URL ?>/updateUser/' + endpoint, object)
                .then(function(response) {
                    if (response.data.status !== 200) {
                        Toast.fire({
                            icon: 'error',
                            title: errorMessage
                        });
                    } else {
                        document.getElementById(saveButtonId).hidden = true;
                        Toast.fire({
                            icon: 'success',
                            title: successMessage
                        });
                    }
                })
                .catch(function(error) {
                    Toast.fire({
                        icon: 'error',
                        title: errorMessage
                    });
                });
        });

        // Opcional: Mostrar o botão de salvar quando o campo for modificado
        $("#" + formId + " input").on('input change', function() {
            document.getElementById(saveButtonId).hidden = false;
        });
    }

    // Inicialização para cada formulário
    $(document).ready(function() {
        handleFormSubmission(
            'changeEmail',
            'email',
            'saveEmail',
            'E-mail alterado com sucesso!',
            'O e-mail não foi alterado.'
        );

        handleFormSubmission(
            'changeRegistro',
            'registro',
            'saveRegistro',
            'Registro alterado com sucesso!',
            'O registro não foi alterado.'
        );

        handleFormSubmission(
            'changeNome',
            'nome',
            'saveNome',
            'Nome alterado com sucesso!',
            'O nome não foi alterado.'
        );

        handleFormSubmission(
            'changeSobrenome',
            'sobrenome',
            'saveSobrenome',
            'Sobrenome alterado com sucesso!',
            'O sobrenome não foi alterado.'
        );

        handleFormSubmission(
            'changeNascimento',
            'nascimento',
            'saveNascimento',
            'Data de nascimento alterada com sucesso!',
            'A data de nascimento não foi alterada.'
        );

        handleFormSubmission(
            'changeCurso',
            'curso',
            'saveCurso',
            'Curso alterado com sucesso!',
            'O curso não foi alterado.'
        );
    });
</script>

<script>
    // Atualiza a imagem selecionada
    function updatePicture(element, picture) {
        document.querySelectorAll('.swiper-slide img').forEach(img => {
            img.classList.remove('selectedAvatar');
        });
        element.querySelector('img').classList.add('selectedAvatar');
        document.getElementById("preview").src = picture;
        document.getElementById("headerProfilePic").src = picture;
        defineProfilePic(picture)
    }

    function defineProfilePic(foto) {
        const data = {
            foto
        };

        axios.post('<?= Config::BASE_ACTION_URL ?>/updateUser/foto', data)
            .then(function(response) {
                if (response.data.status !== 200) {
                    throw response.data;
                } else {
                    Toast.fire({
                        icon: 'success',
                        title: '<?= __("complete_profile_js.pic") ?>'
                    });

                }
            })
            .catch(function(error) {
                Swal.fire({
                    title: '<?= __("complete_profile_js.falha") ?>',
                    text: "<?= __("complete_profile_js.text_erro") ?>",
                    icon: 'error',
                    showCancelButton: false,
                    outsideClick: false,
                    confirmButtonColor: '#1f8cd4',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '<?= __("complete_profile_js.ok") ?>'
                });
            });
    }
</script>

<script>
    var swiper = new Swiper('.swiper-container-avatar', {
        slidesPerView: 'auto',
        spaceBetween: 0,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            100: {
                slidesPerView: 2.5,
                spaceBetween: 5,
            },
            640: {
                slidesPerView: 2.4,
                spaceBetween: 5,
            },
            768: {
                slidesPerView: 2.4,
                spaceBetween: 5,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 5,
            },
        }
    });
</script>
<script>
    var swiper = new Swiper('.swiper-container-cartoon', {
        slidesPerView: 'auto',
        spaceBetween: 0,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            100: {
                slidesPerView: 2.5,
                spaceBetween: 5,
            },
            640: {
                slidesPerView: 2.4,
                spaceBetween: 5,
            },
            768: {
                slidesPerView: 2.4,
                spaceBetween: 5,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 5,
            },
        }
    });
</script>