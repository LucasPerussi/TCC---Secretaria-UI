<?php

use API\Controller\Config;
?>
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
    });

    async function loadDefaultFields() {
        try {
            // Fetch campos padrões
            const defaultFieldsResponse = await axios.get('<?= Config::BASE_ACTION_URL ?>/load-default-fields');
            const defaultFields = defaultFieldsResponse.data;

            // Fetch campos do processo
            const proccessFieldsResponse = await axios.get('<?= Config::BASE_ACTION_URL ?>/load-proccess-fields/<?= $args["proccessId"] ?>');
            const proccessFields = proccessFieldsResponse.data;

            const container = document.getElementById('default-fields-container');
            container.innerHTML = ''; // Limpar conteúdo anterior

            if (!defaultFields || defaultFields.error || defaultFields.length === 0) {
                container.innerHTML = '<h6>Nada a listar</h6>';
                return;
            }

            // Criar mapa para rápida comparação usando 'tipo'
            const proccessFieldsMap = proccessFields.reduce((map, field) => {
                map[field.tipo] = true;
                return map;
            }, {});

            // Criar set de IDs de defaultFields
            const defaultFieldIds = new Set(defaultFields.map(field => field.id));

            // Encontrar campos em proccessFields que não estão em defaultFields (campos personalizados)
            const customFields = proccessFields.filter(field => !defaultFieldIds.has(field.tipo));

            // Renderizar os campos padrão
            defaultFields.forEach(field => {
                const card = document.createElement('div');
                card.className = 'card pb-0';
                card.id = `field-${field.id}`;
                card.style.marginBottom = '10px';

                const isInProcess = proccessFieldsMap[field.id];
                const iconClass = isInProcess ? 'bi-check-circle-fill' : 'bi-circle';
                const should = isInProcess ? 'delete' : 'add';

                card.innerHTML = `
                    <h5 style="margin-bottom:10px;">
                        ${field.etiqueta}
                        <a onclick="AddToProccess('${field.id}', '${should}')">
                            <i style="float:right;margin-left:10px;" class="bi ${iconClass}"></i>
                        </a>
                        <span style="font-size:12px; float:right; margin-left:10px;" class="badge rounded-pill bg-light-secondary">Padrão</span>
                    </h5>
                `;

                container.appendChild(card);
            });

            // Adicionar um separador se houver campos personalizados
            if (customFields.length > 0) {
                const separator = document.createElement('h5');
                separator.innerText = 'Campos Personalizados';
                separator.style.marginTop = '20px';
                container.appendChild(separator);

                // Renderizar os campos personalizados
                customFields.forEach(field => {
                    const card = document.createElement('div');
                    card.className = 'card pb-0';
                    card.id = `field-${field.id}`;
                    card.style.marginBottom = '10px';

                    const iconClass = 'bi-check-circle-fill';
                    const should = 'delete';

                    card.innerHTML = `
                        <h5 style="margin-bottom:10px;">
                            ${field.nome_exibicao}
                            <a onclick="RemoveCustomField('${field.id}')">
                                <i style="float:right;margin-left:10px;" class="bi ${iconClass}"></i>
                            </a>
                            <span style="font-size:12px; float:right; margin-left:10px;" class="badge rounded-pill bg-light-primary">Personalizado</span>
                        </h5>
                    `;

                    container.appendChild(card);
                });
            }

        } catch (error) {
            console.error('Erro ao carregar campos padrões ou campos do processo:', error);
            const container = document.getElementById('default-fields-container');
            container.innerHTML = '<h6>Erro ao carregar dados</h6>';
        }
    }

    function AddToProccess(field, should) {
        console.log('Operação:', should, 'Campo ID:', field);
        if (should === "delete") {
            axios.post('<?= Config::BASE_ACTION_URL ?>/remove-field-proccess/<?= $args["proccessId"] ?>/' + field)
                .then(response => {
                    if (response.status !== 200) {
                        throw response.data;
                    } else {
                        Toast.fire({
                            icon: 'success',
                            title: 'Campo removido do processo com sucesso!'
                        });
                        loadDefaultFields();
                    }
                })
                .catch(error => {
                    Toast.fire({
                        icon: 'error',
                        title: 'Erro ao remover o campo do processo'
                    });
                });
        } else {
            axios.post('<?= Config::BASE_ACTION_URL ?>/add-field-proccess/<?= $args["proccessId"] ?>/' + field)
                .then(response => {
                    if (response.status !== 200) {
                        throw response.data;
                    } else {
                        Toast.fire({
                            icon: 'success',
                            title: 'Campo adicionado ao processo com sucesso!'
                        });
                        loadDefaultFields();
                    }
                })
                .catch(error => {
                    Toast.fire({
                        icon: 'error',
                        title: 'Erro ao adicionar o campo ao processo'
                    });
                });
        }
    }

    function RemoveCustomField(fieldId) {
        console.log('Removendo campo personalizado:', fieldId);
        axios.post('<?= Config::BASE_ACTION_URL ?>/remove-custom-field-proccess/<?= $args["proccessId"] ?>/' + fieldId)
            .then(response => {
                if (response.status !== 200) {
                    throw response.data;
                } else {
                    Toast.fire({
                        icon: 'success',
                        title: 'Campo personalizado removido do processo com sucesso!'
                    });
                    loadDefaultFields();
                }
            })
            .catch(error => {
                Toast.fire({
                    icon: 'error',
                    title: 'Erro ao remover o campo personalizado do processo'
                });
            });
    }

    document.addEventListener('DOMContentLoaded', () => {
        loadDefaultFields();
    });
</script>
<script>
    $("#newField").submit(function(e) {
        e.preventDefault();
        const data = new FormData(e.target);
        const object = Object.fromEntries(data.entries());
        axios.post('<?= Config::BASE_ACTION_URL ?>/new-field-process/<?= $args["proccessId"] ?>', object)
            .then(function(response) {
                console.log(response)
                if ((response.data.status != 200) && (response.data.status != 201)) {
                    throw response.data;
                } else {
                    Toast.fire({
                        icon: 'success',
                        title: 'Campo personalizado criado com sucesso!'
                    });
                    loadDefaultFields();
                    var modalElement = document.getElementById('cadastrarCampoModal');
                    var modalInstance = bootstrap.Modal.getInstance(modalElement);
                    if (modalInstance) {
                        modalInstance.hide();
                    }
                }
            })
            .catch(function(error) {
                Swal.fire({
                    title: 'Tivemos um problema!',
                    text: 'Tivemos um problema ao cadastrar o campo (STATUS: ' + error.status + ')',
                    icon: 'error',
                    showCancelButton: false,
                    confirmButtonColor: '#1f8cd4',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OK'
                })
            });
    });
</script>