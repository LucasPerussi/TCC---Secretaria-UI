<?php

use API\Controller\Config;
?>
<?php $url = $_SERVER['REQUEST_URI']; ?>

<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<style>
    .swiper-slide {
        background-color: transparent !important;
        max-width: 180px !important;
    }

    .active {
        background-color: #00bcd533 !important;
        border-color: #00bcd5b7 !important;
    }
</style>

<!-- User Pills -->
<div class="swiper-container" style="overflow:hidden; margin-bottom:15px; max-height: 40px !important;">
    <div class="swiper-wrapper">
        <div class="swiper-slide" style="max-width:180px !important;">
            <a class="nav-link" style="padding:8px; text-align:left;margin-right:10px;" id="personalization-section-btn" href="#personalization-section">
                <i data-feather="sliders" class="font-medium-1 me-50"></i>
                <span class="fw-bold">Personalização</span>
            </a>
        </div>
        <div class="swiper-slide" style="max-width:110px !important;">
            <a class="nav-link" style="padding:8px;text-align:left; margin-right:10px;" id="blocks-section-btn" href="#blocks-section">
                <i data-feather="layout" class="font-medium-1 me-50"></i>
                <span class="fw-bold">Blocos</span>
            </a>
        </div>
        <div class="swiper-slide" style="max-width:110px !important;">
            <a class="nav-link" style="padding:8px;text-align:left; margin-right:10px;" id="social-section-btn" href="#social-section">
                <i data-feather="users" class="font-medium-1 me-50"></i>
                <span class="fw-bold">Dados</span>
            </a>
        </div>
        <div class="swiper-slide" style="max-width:190px !important;">
            <a class="nav-link" style="padding:8px;text-align:left; margin-right:10px;width:190px;" id="sharing-section-btn" href="#sharing-section">
                <i data-feather="share-2" class="font-medium-1 me-50"></i>
                <span class="fw-bold">Compartilhamento</span>
            </a>
        </div>
    </div>
</div>
<!--/ User Pills -->
<script>
    function processHash() {
        const hashValue = window.location.hash;
        const idWithParams = hashValue.substring(1); // Remove o '#' inicial
        const [sectionId, queryParams] = idWithParams.split('?'); // Separa o id da seção dos parâmetros

        const sections = [
            'personalization-section', 'social-section', 'sharing-section', 'blocks-section', 'edit-block', 'social-network', 'edit-links'
        ];
        const buttons = {
            'personalization-section': 'personalization-section-btn',
            'social-section': 'social-section-btn',
            'sharing-section': 'sharing-section-btn',
            'blocks-section': 'blocks-section-btn',
            'edit-block': 'blocks-section-btn',
            'edit-links': 'blocks-section-btn',
            'social-network': 'blocks-section-btn'
        };

        // Reset all sections and buttons
        sections.forEach(section => document.getElementById(section).hidden = true);
        Object.values(buttons).forEach(button => document.getElementById(button).classList.remove('active'));

        if (sections.includes(sectionId)) {
            // Show the section based on the hash in the URL
            document.getElementById(sectionId).hidden = false;
            // Activate the corresponding button
            document.getElementById(buttons[sectionId]).classList.add('active');

            // Process query parameters if present (e.g., for edit-block)
            if (sectionId === 'edit-block' && queryParams) {
                const params = new URLSearchParams(queryParams);
                const id = params.get('b'); // Obtém o valor do parâmetro 'b'

                // Exemplo de como você pode usar o ID
                loadBlockData(id);
                // console.log('ID capturado:', id);
                // Aqui você pode usar o ID como desejar, por exemplo, buscar dados no backend ou modificar a interface.
            }
            if (sectionId === 'edit-links' && queryParams) {
                const params = new URLSearchParams(queryParams);
                const id = params.get('b'); // Obtém o valor do parâmetro 'b'
                document.getElementById('parent').value = id;

                // Exemplo de como você pode usar o ID
                loadBlockLinks(id);
                // console.log('ID capturado:', id);
                // Aqui você pode usar o ID como desejar, por exemplo, buscar dados no backend ou modificar a interface.
            }
        } else {
            // Default to personalization section
            document.getElementById('personalization-section').hidden = false;
            document.getElementById('personalization-section-btn').classList.add('active');
        }
    }

    window.addEventListener('hashchange', processHash);
    document.addEventListener('DOMContentLoaded', processHash);
</script>

<script>
    function loadBlockLinks(id) {

        // Fazer as duas chamadas em paralelo
        Promise.all([
                axios.get('<?= Config::BASE_ACTION_URL ?>/get/block-links/' + id),
                axios.get('<?= Config::BASE_ACTION_URL ?>/get/block/' + id)
            ])
            .then(([linksResponse, blockResponse]) => {
                let blocks = linksResponse.data;
                let block = blockResponse.data;

                const sortableListLinks = document.getElementById('sortable-list-links');
                sortableListLinks.innerHTML = '';

                // Verificar se blocks é um array
                if (!Array.isArray(blocks)) {
                    console.error('Os dados retornados não são um array:', blocks);
                    return;
                }

                // Obter o array de ordem do campo 'order' do 'block'
                let orderArray = [];
                if (block && block.order) {
                    orderArray = JSON.parse(block.order); // Supondo que 'block.order' seja uma string JSON
                }

                // Criar um mapa de blocks com chave sendo o 'id' para acesso rápido
                let blocksMap = {};
                blocks.forEach(blockItem => {
                    blocksMap[blockItem.id] = blockItem;
                });

                // Construir a lista de blocks ordenados com base em 'orderArray'
                let orderedBlocks = [];
                orderArray.forEach(orderItem => {
                    let blockId = orderItem.button;
                    let blockItem = blocksMap[blockId];
                    if (blockItem) {
                        orderedBlocks.push(blockItem);
                    }
                });

                // Exibir os blocks ordenados
                orderedBlocks.forEach((block, index) => {
                    // console.log('Block:', block);

                    let $icon;
                    if (typeof block.coverImage === 'string' && block.coverImage.startsWith('bi ')) {
                        $icon = `<i class="${block.coverImage}" style="margin-right:30px;font-size:20px; padding:0px;"></i> `;
                    } else {
                        $icon = `<img src="${block.coverImage}" style="margin-right:30px;height:40px; border-radius:40px;"> `;
                    }

                    const listItemBlock = document.createElement('li');
                    listItemBlock.id = 'item-' + block.id;
                    listItemBlock.classList.add('sortingList');

                    listItemBlock.innerHTML = `
        <i class="bi bi-arrow-down-up" style="margin-right:30px;"></i> 
        ${$icon}

        <span style='font-size:16px; margin-top:-10px; font-weight: 500 !important;'>${block.title}</span>
        <a onclick="editLinks('${block.id}')"><i id="pencilbtnId${block.id}" style="float:right;margin-right:10px;font-size:15px; margin-top:5px;" class="bi bi-pencil"></i></a>
        <a onclick="deleteLink('${block.id}','${id}')"><i style="float:right;margin-right:10px;font-size:15px; margin-top:5px;" class="bi bi-trash"></i></a><br />
        <div id="editLinks-id${block.id}" hidden class="card" style="padding:10px !important;padding-top:0px !important; margin-top:10px;margin-bottom:0px;">
            <form class="editInfo">
                <div class="row">
                    <div class="col-3 mt-2">
                        <span style="float:right;">URL:</span>
                    </div>
                    <div class="col-6">
                        <input class="form-control mt-1" style="display:none;" name="idSocialMedia" value="${block.id}" type="text">
                        <input hidden value="<?= $_SESSION["csrf_token"] ?>" name="csrf_token" type="text">
                        <input class="form-control mt-1" name="url" placeholder="url" value="${block.url || ''}" type="text">
                    </div>
                    <div class="col-3">
                    </div>
                    <div class="col-3 mt-2">
                        <span style="float:right;">Nome:</span>
                    </div>
                    <div class="col-6">
                        <input class="form-control mt-1" name="label" value="${block.label}" type="text">
                    </div>
                    <div class="col-3">
                        <button class="btn btn-info mt-1" style="float:right;" type="submit">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
        `;

                    sortableListLinks.appendChild(listItemBlock);
                });

                initializeSortableListLinks();

                // Atualizar o título do bloco
                if (block.error) {
                    document.getElementById('linksTitle').textContent = block.message;
                    // console.log(block);
                } else {
                    document.getElementById('linksTitle').textContent = block.title;
                }

            })
            .catch(error => {
                console.error('Erro ao carregar os blocos:', error);
            });
    }



    function editLinks(id) {
        const editLinks = document.getElementById('editLinks-id' + id);
        const pencilIcons = document.getElementById('pencilbtnId' + id);


        if (editLinks.hidden) {
            editLinks.hidden = false;
            pencilIcons.classList.remove('bi-pencil');
            pencilIcons.classList.add('bi-pencil-fill');
            pencilIcons.style.color = "#00BBD3";
            pencilIcons.style.textShadow = "1px 1px 10px #00BBD360";
        } else {
            editLinks.hidden = true;
            pencilIcons.classList.remove('bi-pencil-fill');
            pencilIcons.classList.add('bi-pencil');
            pencilIcons.style.color = "";
            pencilIcons.style.textShadow = "";
        }
    }



    function initializeSortableListLinks() {
        document.getElementById('addbtnLink').hidden = false;
        var sortable = new Sortable(document.getElementById('sortable-list-links'), {
            animation: 150,
            ghostClass: 'blue-background-class',
            onEnd: function(evt) {
                var oldIndex = evt.oldIndex; // posição inicial
                var newIndex = evt.newIndex; // nova posição
                var item = evt.item; // item movido

                const hashValue = window.location.hash;
                const idWithParams = hashValue.substring(1);
                const [sectionId, queryParams] = idWithParams.split('?');
                const params = new URLSearchParams(queryParams);
                const block = params.get('b');

                var originalString = item.id;
                var idPure = originalString.replace('item-', '');

                const object = {
                    'id': idPure,
                    'newPosition': newIndex,
                    'oldPosition': oldIndex,
                    'parent': block,
                    'csrf_token': <?= json_encode($_SESSION['csrf_token']) ?>
                };

                axios.post('<?= Config::BASE_ACTION_URL ?>/updateBlockLinksOrder', object)
                    .then(function(response) {
                        if (response.data !== "sucesso!") {
                            throw new Error(response.data);
                        } else {
                            Toast.fire({
                                icon: 'success',
                                title: 'Ordem alterada com sucesso!'
                            });
                            // loadBlockData();
                        }
                    })
                    .catch(function(error) {
                        Toast.fire({
                            icon: 'error',
                            title: 'Tivemos um problema ao reordenar links: ' + error.message
                        });
                    });
            }
        });
    }
</script>
<script>
    function loadBlockData(id) {

        fetch('<?= Config::BASE_ACTION_URL ?>/get/block/' + id)
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    document.getElementById('lblBlockData').textContent = data.message;
                } else {
                    document.getElementById('lblBlockTitleh1').textContent = data.title;
                    document.getElementById('lblBlockDescription').textContent = data.description;
                    // console.log(data)
                    // console.log(id)
                }

            })
            .catch(error => console.log('Erro:', error));

    }
</script>
<script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 'auto',
        spaceBetween: 0,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        // navigation: {
        //     nextEl: '.swiper-button-next',
        //     prevEl: '.swiper-button-prev',
        // },
        breakpoints: {
            100: {
                slidesPerView: 1.6,
                spaceBetween: 0,
            },
            640: {
                slidesPerView: 2.4,
                spaceBetween: 1,
            },
            768: {
                slidesPerView: 2.5,
                spaceBetween: 5,
            },
            1024: {
                slidesPerView: 5,
                spaceBetween: 5,
            },
        }
    });
</script>