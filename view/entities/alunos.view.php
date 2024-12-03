<?php

use API\Controller\Config;

?>


<!-- END: Page CSS-->
<style>
    /* Estilos básicos para a responsividade */
    .table-container {
        width: 100%;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        padding: 8px;
        font-size: 12px !important;
        text-align: left;
        cursor: pointer;
    }

    th {
        border: solid 1px #001011db !important;
        background-color: #001011db !important;
    }

    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .page-link {
        cursor: pointer;
        padding: 10px;
        margin: 0 5px;
        text-decoration: none;
        color: #000;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .no-results-message {
        margin-top: 10px;
    }

    .modal .modal-content {
        padding: 0px !important;
        border-radius: 10px !important;
    }

    .page-link:hover {
        background-color: #f2f2f2;
    }
</style>


<div class="row">
    <div class="col-12">
        <div class="card" style="padding:20px !important;">
            <div class="row">
                <div class="col-6">
                    <h4 style="font-weight:bold !important;">Listagem de <?php $page = $_GET["page"] ?? 'alunos';
                                                                            switch ($page) {
                                                                                case 'alunos':
                                                                                    echo "Alunos";
                                                                                    break;
                                                                                case 'professores':
                                                                                    echo "Professores";
                                                                                    break;
                                                                                case 'servidores':
                                                                                    echo "Servidores UFPR";
                                                                                    break;
                                                                                case 'admins':
                                                                                    echo "Administradores";
                                                                                    break;
                                                                                default:
                                                                                    echo "Alunos";
                                                                                    break;
                                                                            } ?></h4>
                    <span style="font-size:13px;">Aqui você encontra todos os usuários registrados.</span>
                </div>
                <div class="col-6">
                    <div class="dropdown" style="position:absolute; right:30px;">
                        <label for="itemsPerPage" style="font-size:10px;">Itens por Pág.:
                            <select id="itemsPerPage" class="form-control select" style="width:80px;" onchange="changeItemsPerPage()">
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="500">500</option>
                            </select></label>
                    </div>
                </div>
            </div>
            <br />
            <div class="table-container" style="overflow:auto;">
                <div class="input-group mb-0">
                    <span class="input-group-text" id="basic-addon-search1"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg></span>
                    <input type="text" id="searchInput" oninput="searchData()" class="form-control" placeholder="Pesquisar..." aria-label="Pesquisar..." aria-describedby="basic-addon-search1">
                </div>
                <br />
                <table id="data-table" style="margin-top:0px;">
                    <thead id="table-header">
                        <tr>
                            <th id="photo-header" style="color:white !important;">Foto</th>
                            <th id="name-header" style="color:white !important;">Nome <i class="bi bi-arrow-down-up"></i></th>
                            <th id="email-header" style="color:white !important;">Email <i class="bi bi-arrow-down-up"></i></th>
                            <th id="registro-header" style="color:white !important;">Registro <i class="bi bi-arrow-down-up"></i></th>
                            <th id="curso-header" style="color:white !important;">Curso <i class="bi bi-arrow-down-up"></i></th>
                            <th style="color:white !important;">Ações</th>
                        </tr>
                    </thead>
                    <tbody id="table-body" style="border-radius: 20px !important;"></tbody>
                </table>
                <div class="no-results-message" id="noResultsMessage"></div>
            </div>
        </div>
        <div class="pagination" id="pagination"></div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="logModal" tabindex="-1" aria-labelledby="logModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-0">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalTitle">Detalhes do Usuário</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body" id="modalBody">
                <!-- Conteúdo será preenchido dinamicamente -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>


<?php
require __DIR__ . "/../../" . Config::BASE_PATH_JS . str_replace(".view", ".js.php", basename(__FILE__, ".php"));
?>