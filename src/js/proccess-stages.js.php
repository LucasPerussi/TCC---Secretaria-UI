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

    async function loadStages() {
        try {
            // Fetch etapas padrão (default stages)
            const defaultStagesResponse = await axios.get('<?= Config::BASE_ACTION_URL ?>/load-default-stages');
            let defaultStages = defaultStagesResponse.data;

            // Garantir que defaultStages seja um array
            defaultStages = Array.isArray(defaultStages) ? defaultStages : Object.values(defaultStages);

            // Fetch etapas do processo
            const processStagesResponse = await axios.get('<?= Config::BASE_ACTION_URL ?>/load-proccess-stages/<?= $args["proccessId"] ?>');
            let processStages = [];

            if (processStagesResponse.data.error) {
                // Se houver um erro, log e continue com processStages vazio
                console.error('Erro ao carregar stages do processo:', processStagesResponse.data.message);
            } else {
                processStages = processStagesResponse.data;
                processStages = Array.isArray(processStages) ? processStages : Object.values(processStages);
            }

            const container = document.getElementById('default-fields-container'); // Certifique-se de que o ID corresponda ao do HTML
            container.innerHTML = ''; // Limpar conteúdo anterior

            if (!defaultStages || defaultStages.length === 0) {
                container.innerHTML = '<h6>Nada a listar</h6>';
                return;
            }

            // Criar mapa para rápida comparação usando IDs das etapas do processo
            const processStagesMap = processStages.reduce((map, stage) => {
                map[stage.id] = true; // Marca que a etapa está no processo
                return map;
            }, {});

            // Renderizar os stages padrão
            defaultStages.forEach(stage => {
                const card = document.createElement('div');
                card.className = 'card pb-0';
                card.id = `stage-${stage.id}`;
                card.style.marginBottom = '10px';

                const isInProcess = processStagesMap[stage.id];
                const iconClass = isInProcess ? 'bi-check-circle-fill' : 'bi-circle';
                const should = isInProcess ? 'delete' : 'add';

                // Determinar o nome e a cor da etapa
                const stageName = stage.label || stage.nome || 'Sem Nome';
                const stageColor = stage.cor || '#000000';

                card.innerHTML = `
                    <h5 style="margin-bottom:10px;">
                        ${stageName}
                        <a onclick="ModifyStageInProcess('${stage.id}', '${should}')">
                            <i style="float:right;margin-left:10px;" class="bi ${iconClass}"></i>
                        </a>
                        <span style="font-size:12px; float:right; margin-left:10px;" class="badge rounded-pill" style="background-color: ${stageColor};">
                            Padrão
                        </span>
                    </h5>
                `;

                container.appendChild(card);
            });

            // Adicionar stages personalizados
            const customStages = processStages.filter(stage => stage.padrao === 0);

            if (customStages.length > 0) {
                const separator = document.createElement('h5');
                separator.innerText = 'Stages Personalizados';
                separator.style.marginTop = '20px';
                container.appendChild(separator);

                customStages.forEach(stage => {
                    const card = document.createElement('div');
                    card.className = 'card pb-0';
                    card.id = `stage-${stage.id}`;
                    card.style.marginBottom = '10px';

                    card.innerHTML = `
                        <h5 style="margin-bottom:10px;">
                            ${stage.nome}
                            <a onclick="RemoveCustomStage('${stage.id}')">
                                <i style="float:right;margin-left:10px;" class="bi bi-check-circle-fill"></i>
                            </a>
                            <span style="font-size:12px; float:right; margin-left:10px;" class="badge rounded-pill bg-light-primary">
                                Personalizado
                            </span>
                        </h5>
                    `;

                    container.appendChild(card);
                });
            }
        } catch (error) {
            console.error('Erro ao carregar dados:', error);
            const container = document.getElementById('default-fields-container');
            container.innerHTML = '<h6>Erro ao carregar dados</h6>';
        }
    }

    function ModifyStageInProcess(stageId, action) {
        console.log('Operação:', action, 'Stage ID:', stageId);
        if (action === "delete") {
            axios.post('<?= Config::BASE_ACTION_URL ?>/remove-stage-process/<?= $args["proccessId"] ?>/' + stageId)
                .then(response => {
                    if (response.status !== 200) {
                        throw response.data;
                    } else {
                        Toast.fire({
                            icon: 'success',
                            title: 'Stage removido do processo com sucesso!'
                        });
                        loadStages();
                    }
                })
                .catch(error => {
                    Toast.fire({
                        icon: 'error',
                        title: 'Erro ao remover o stage do processo'
                    });
                });
        } else {
            axios.post('<?= Config::BASE_ACTION_URL ?>/add-stage-process/<?= $args["proccessId"] ?>/' + stageId)
                .then(response => {
                    if (response.status !== 200) {
                        throw response.data;
                    } else {
                        Toast.fire({
                            icon: 'success',
                            title: 'Stage adicionado ao processo com sucesso!'
                        });
                        loadStages();
                    }
                })
                .catch(error => {
                    Toast.fire({
                        icon: 'error',
                        title: 'Erro ao adicionar o stage ao processo'
                    });
                });
        }
    }

    function RemoveCustomStage(stageId) {
        console.log('Removendo stage personalizado:', stageId);
        axios.post('<?= Config::BASE_ACTION_URL ?>/remove-custom-stage-process/<?= $args["proccessId"] ?>/' + stageId)
            .then(response => {
                if (response.status !== 200) {
                    throw response.data;
                } else {
                    Toast.fire({
                        icon: 'success',
                        title: 'Stage personalizado removido do processo com sucesso!'
                    });
                    loadStages();
                }
            })
            .catch(error => {
                Toast.fire({
                    icon: 'error',
                    title: 'Erro ao remover o stage personalizado do processo'
                });
            });
    }

    document.addEventListener('DOMContentLoaded', () => {
        loadStages();
    });
</script>
<script>
    $("#newStage").submit(function(e) {
        e.preventDefault();
        const data = new FormData(e.target);
        const object = Object.fromEntries(data.entries());
        axios.post('<?= Config::BASE_ACTION_URL ?>/new-stage-process/<?= $args["proccessId"] ?>', object)
            .then(function(response) {
                console.log(response)
                if ((response.data.status != 200) && (response.data.status != 201)) {
                    throw response.data;
                } else {
                    Toast.fire({
                        icon: 'success',
                        title: 'Stage personalizado criado com sucesso!'
                    });
                    loadStages();
                    var modalElement = document.getElementById('cadastrarStageModal');
                    var modalInstance = bootstrap.Modal.getInstance(modalElement);
                    if (modalInstance) {
                        modalInstance.hide();
                    }
                }
            })
            .catch(function(error) {
                Swal.fire({
                    title: 'Tivemos um problema!',
                    text: 'Tivemos um problema ao cadastrar o stage (STATUS: ' + error.status + ')',
                    icon: 'error',
                    showCancelButton: false,
                    confirmButtonColor: '#1f8cd4',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OK'
                })
            });
    });
</script>
