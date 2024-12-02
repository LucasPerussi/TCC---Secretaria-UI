<?php

use API\Controller\Config;

$logs = $logs ?? []; // Certifique-se de que $logs é um array
?>
<script>
    // Converter o array PHP $logs para o formato JSON para uso no JavaScript
    let jsonData = <?= json_encode($logs, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE); ?>;

    // Garantir que jsonData é um array
    if (typeof jsonData === 'string') {
        jsonData = JSON.parse(jsonData);
    }

    // Variáveis para paginação, ordenação, pesquisa e itens por página
    let currentPage = 1;
    let sortField = null;
    let sortOrder = 'asc';
    let searchQuery = '';
    let itemsPerPage = 50;

    function formatDate(dateString) {
        const date = new Date(dateString);
        const day = ('0' + date.getDate()).slice(-2);
        const month = ('0' + (date.getMonth() + 1)).slice(-2); 
        const year = date.getFullYear();
        const hours = ('0' + date.getHours()).slice(-2); 
        const minutes = ('0' + date.getMinutes()).slice(-2); 

        return `${day}/${month}/${year} às ${hours}:${minutes}`;
    }

    // Função para ordenar os dados
    function sortData(field) {
        if (sortField === field) {
            // Inverter a ordem se já estiver ordenado pelo mesmo campo
            sortOrder = sortOrder === 'asc' ? 'desc' : 'asc';
        } else {
            // Definir o campo e a ordem de classificação
            sortField = field;
            sortOrder = 'asc';
        }

        // Ordenar os dados
        jsonData.sort((a, b) => {
            const aValue = a[field];
            const bValue = b[field];

            // Comparação para strings e números
            let comparison = 0;
            if (typeof aValue === 'string' && typeof bValue === 'string') {
                comparison = aValue.localeCompare(bValue);
            } else {
                comparison = aValue - bValue;
            }

            // Retornar dados ordenados
            return sortOrder === 'asc' ? comparison : -comparison;
        });

        // Exibir dados atualizados
        displayData();
    }

    // Função para exibir os dados com paginação
    function displayData() {
        const functionFilter = document.getElementById('functionFilter');
        const userFilter = document.getElementById('userEmailFilter');
        const statusFilter = document.getElementById('statusFilter');
        const tableBody = document.getElementById('table-body');
        const noResultsMessage = document.getElementById('noResultsMessage');

        // Filtrar dados com base na pesquisa e nos filtros
        const filteredData = jsonData.filter(item => {
            const matchesFunction = !functionFilter.value || item.funcao === functionFilter.value;
            const matchesUser = !userFilter.value || (item.usuario != null && item.usuario.toString() === userFilter.value);
            const matchesStatus = !statusFilter.value || item.status.toString() === statusFilter.value;
            const matchesSearch = Object.values(item).some(value => {
                if (value && typeof value === 'string') {
                    return value.toLowerCase().includes(searchQuery);
                } else if (value != null) {
                    return value.toString().toLowerCase().includes(searchQuery);
                }
                return false;
            });

            return matchesFunction && matchesUser && matchesStatus && matchesSearch;
        });

        // Calcular índices de paginação
        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = startIndex + itemsPerPage;

        // Dados da página atual
        const currentPageData = filteredData.slice(startIndex, endIndex);

        // Limpar a tabela e adicionar as novas linhas
        tableBody.innerHTML = '';
        currentPageData.forEach(item => {
            const row = document.createElement('tr');

            let statusBadge;
            switch (item.status) {
                case 'success':
                case 'OK':
                    statusBadge = '<span class="badge rounded-pill badge-light-success">Success</span>';
                    break;
                case 'error':
                case 'ERRO':
                    statusBadge = '<span class="badge rounded-pill badge-light-danger">Error</span>';
                    break;
                case 'info':
                case 'INFO':
                    statusBadge = '<span class="badge rounded-pill badge-light-info">Info</span>';
                    break;
                case 'warning':
                    statusBadge = '<span class="badge rounded-pill badge-light-warning">Warning</span>';
                    break;
                default:
                    statusBadge = `<span class="badge rounded-pill badge-light-secondary">Other (${item.status})</span>`;
                    break;
            }

            row.innerHTML = `
                <td><a href='#' style="font-weight:500 !important;">${item.id}</a></td>
                <td style="font-size:11px;">${item.funcao}</td>
                <td style="font-size:11px;">${item.usuario ?? 'N/A'}</td>
                <td style="font-size:11px;">${formatDate(item.data)}</td>
                <td>${statusBadge}</td>
                <td><a href='#' class='view-log' data-id='${item.id}'><i class="bi bi-eye"></i></a></td>
            `;
            tableBody.appendChild(row);
        });

        // Adicionar event listeners aos links de visualização
        document.querySelectorAll('.view-log').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const id = this.getAttribute('data-id');
                const item = jsonData.find(item => item.id == id);
                if (item) {
                    showLogDetails(item);
                }
            });
        });

        // Exibir mensagem 'Nenhum item encontrado' se necessário
        noResultsMessage.textContent = filteredData.length === 0 ? 'Nenhum item encontrado.' : '';

        // Gerar links de paginação
        const totalPages = Math.ceil(filteredData.length / itemsPerPage);
        generatePaginationLinks(totalPages);
    }

    // Função para mostrar os detalhes do log no modal
    function showLogDetails(item) {
        const modalTitle = document.getElementById('modalTitle');
        const modalBody = document.getElementById('modalBody');

        modalTitle.textContent = `Detalhes do Log ID: ${item.id}`;

        modalBody.innerHTML = `
            <p><strong>ID:</strong> ${item.id}</p>
            <p><strong>Função:</strong> ${item.funcao}</p>
            <p><strong>Usuário:</strong> ${item.usuario ?? 'N/A'}</p>
            <p><strong>Data:</strong> ${formatDate(item.data)}</p>
            <p><strong>Status:</strong> ${item.status}</p>
            <p><strong>Mensagem:</strong><br/> ${item.mensagem}</p>
        `;

        // Exibir o modal
        const logModal = new bootstrap.Modal(document.getElementById('logModal'));
        logModal.show();
    }

    // Função para alterar o número de itens por página
    function changeItemsPerPage() {
        itemsPerPage = parseInt(document.getElementById('itemsPerPage').value, 10);
        currentPage = 1;
        displayData();
    }

    // Função para pesquisar nos dados
    function searchData() {
        searchQuery = document.getElementById('searchInput').value.trim().toLowerCase();
        currentPage = 1;
        displayData();
    }

    // Função para popular os filtros dropdown
    function populateDropdowns() {
        const functionFilter = document.getElementById('functionFilter');
        const userFilter = document.getElementById('userEmailFilter');
        const statusFilter = document.getElementById('statusFilter');

        const functionSet = new Set();
        const userSet = new Set();
        const statusSet = new Set();

        jsonData.forEach(item => {
            if (item.funcao) {
                functionSet.add(item.funcao);
            }
            if (item.usuario != null) {
                userSet.add(item.usuario);
            }
            if (item.status !== undefined && item.status !== null) {
                statusSet.add(item.status);
            }
        });

        // Funções
        functionSet.forEach(funcao => {
            const option = document.createElement('option');
            option.value = funcao;
            option.textContent = funcao;
            functionFilter.appendChild(option);
        });

        // Usuários
        userSet.forEach(usuario => {
            const option = document.createElement('option');
            option.value = usuario;
            option.textContent = usuario;
            userFilter.appendChild(option);
        });

        // Status
        statusSet.forEach(status => {
            const option = document.createElement('option');
            option.value = status;
            option.textContent = status;
            statusFilter.appendChild(option);
        });
    }

    // Função para gerar os links de paginação
    function generatePaginationLinks(totalPages) {
        const paginationContainer = document.getElementById('pagination');
        paginationContainer.innerHTML = '';

        // Botão 'Anterior'
        const prevLink = document.createElement('a');
        prevLink.href = '#';
        prevLink.classList.add('page-link');
        prevLink.textContent = 'Anterior';
        prevLink.addEventListener('click', (e) => {
            e.preventDefault();
            if (currentPage > 1) {
                currentPage--;
                displayData();
            }
        });
        paginationContainer.appendChild(prevLink);

        // Números das páginas
        for (let i = 1; i <= totalPages; i++) {
            const pageLink = document.createElement('a');
            pageLink.href = '#';
            pageLink.classList.add('page-link');
            pageLink.textContent = i;
            if (i === currentPage) {
                pageLink.classList.add('active');
            }
            pageLink.addEventListener('click', (e) => {
                e.preventDefault();
                currentPage = i;
                displayData();
            });
            paginationContainer.appendChild(pageLink);
        }

        // Botão 'Próximo'
        const nextLink = document.createElement('a');
        nextLink.href = '#';
        nextLink.classList.add('page-link');
        nextLink.textContent = 'Próximo';
        nextLink.addEventListener('click', (e) => {
            e.preventDefault();
            if (currentPage < totalPages) {
                currentPage++;
                displayData();
            }
        });
        paginationContainer.appendChild(nextLink);
    }

    // Inicializar a exibição dos dados e os eventos
    document.addEventListener('DOMContentLoaded', () => {
        populateDropdowns();
        displayData();

        document.getElementById('id-header').addEventListener('click', () => sortData('id'));
        document.getElementById('function-header').addEventListener('click', () => sortData('funcao'));
        document.getElementById('user-header').addEventListener('click', () => sortData('usuario'));
        document.getElementById('date-header').addEventListener('click', () => sortData('data'));
        document.getElementById('status-header').addEventListener('click', () => sortData('status'));
    });
</script>
