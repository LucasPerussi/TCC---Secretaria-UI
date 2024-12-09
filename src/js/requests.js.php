<?php
use API\Controller\Config;

// Supondo que $solicitacoes seja o array PHP contendo os dados das solicitações
?>
<script>
    // Converter o array PHP $solicitacoes para o formato JSON para uso no JavaScript
    let jsonData = <?= json_encode($requests, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE); ?>;

    if (!jsonData) setTimeout(location.reload, 1000);

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

    /**
     * Formata uma string de data no formato DD/MM/AAAA.
     * @param {string} dateString - A string da data no formato ISO.
     * @returns {string} - Data formatada.
     */
    function formatDate(dateString) {
        const date = new Date(dateString);
        const day = ('0' + date.getDate()).slice(-2);
        const month = ('0' + (date.getMonth() + 1)).slice(-2);
        const year = date.getFullYear();
        return `${day}/${month}/${year}`;
    }

    /**
     * Recupera o valor de um campo, suportando campos aninhados.
     * @param {Object} item - O objeto de onde recuperar o valor.
     * @param {string} field - O campo a ser recuperado, podendo ser aninhado com pontos (e.g., 'usuario_processo_alunoTousuario.nome').
     * @returns {*} - O valor do campo ou undefined se não existir.
     */
    function getNestedValue(item, field) {
        return field.split('.').reduce((obj, key) => (obj && obj[key] !== undefined) ? obj[key] : undefined, item);
    }

    /**
     * Ordena os dados com base no campo especificado.
     * Suporta campos aninhados usando notação de ponto.
     * @param {string} field - O campo pelo qual ordenar (pode ser aninhado com pontos).
     */
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
            let aValue = getNestedValue(a, field);
            let bValue = getNestedValue(b, field);

            // Tratar valores nulos ou indefinidos
            aValue = aValue !== null && aValue !== undefined ? aValue : '';
            bValue = bValue !== null && bValue !== undefined ? bValue : '';

            // Tipo de comparação baseado no tipo dos valores
            if (typeof aValue === 'string' && typeof bValue === 'string') {
                aValue = aValue.toLowerCase();
                bValue = bValue.toLowerCase();
                if (aValue < bValue) return sortOrder === 'asc' ? -1 : 1;
                if (aValue > bValue) return sortOrder === 'asc' ? 1 : -1;
                return 0;
            } else if (typeof aValue === 'number' && typeof bValue === 'number') {
                return sortOrder === 'asc' ? aValue - bValue : bValue - aValue;
            } else if (aValue instanceof Date && bValue instanceof Date) {
                return sortOrder === 'asc' ? aValue - bValue : bValue - aValue;
            } else {
                // Conversão para string e comparação
                aValue = aValue.toString().toLowerCase();
                bValue = bValue.toString().toLowerCase();
                if (aValue < bValue) return sortOrder === 'asc' ? -1 : 1;
                if (aValue > bValue) return sortOrder === 'asc' ? 1 : -1;
                return 0;
            }
        });

        // Exibir dados atualizados
        displayData();
    }

    /**
     * Exibe os dados na tabela com base na paginação e filtros atuais.
     */
    function displayData() {
        const tableBody = document.getElementById('table-body');
        const noResultsMessage = document.getElementById('noResultsMessage');

        console.log('Total registros:', jsonData.length);

        // Filtrar dados com base na pesquisa
        const filteredData = jsonData.filter(item => {
            if (searchQuery === '') return true; // Sem filtro, mantém todos

            return Object.values(item).some(value => {
                if (value && typeof value === 'object') {
                    // Verifica valores em objetos aninhados
                    return Object.values(value).some(subValue => {
                        if (subValue && typeof subValue === 'string') {
                            return subValue.toLowerCase().includes(searchQuery);
                        } else if (subValue != null) {
                            return subValue.toString().toLowerCase().includes(searchQuery);
                        }
                        return false;
                    });
                } else if (value && typeof value === 'string') {
                    return value.toLowerCase().includes(searchQuery);
                } else if (value != null) {
                    return value.toString().toLowerCase().includes(searchQuery);
                }
                return false;
            });
        });

        console.log('Registros após filtro:', filteredData.length);

        // Calcular índices de paginação
        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = startIndex + itemsPerPage;

        // Dados da página atual
        const currentPageData = filteredData.slice(startIndex, endIndex);

        console.log('Exibindo registros de', startIndex, 'a', endIndex);

        // Limpar a tabela e adicionar as novas linhas
        tableBody.innerHTML = '';
        currentPageData.forEach(item => {
            const row = document.createElement('tr');

            row.innerHTML = `
                <td>${item.numero}</td>
                <td>${item.titulo}</td>
                <td>${getNestedValue(item, 'tipo_solicitacao_processo_tipo_solicitacaoTotipo_solicitacao.nome')}</td>
                <td>${formatDate(item.data_abertura)}</td>
                <td>
                    <div style="display: flex; align-items: center;">
                        <img src="${item.usuario_processo_alunoTousuario.foto ? "http://192.168.0.28/tcc-ui/" + item.usuario_processo_alunoTousuario.foto : "http://192.168.0.28/tcc-ui/src/img/avatars/generic.webp"}" 
                            alt="Foto Aluno" style="width:40px; height:40px; object-fit:cover; border-radius:50%; margin-right:10px;">
                        ${item.usuario_processo_alunoTousuario.nome} ${item.usuario_processo_alunoTousuario.sobrenome}
                    </div>
                </td>
                <td>
                    <div style="display: flex; align-items: center;">
                        <img src="${item.usuario_processo_professor_avaliadorTousuario && item.usuario_processo_professor_avaliadorTousuario.foto ? "http://192.168.0.28/tcc-ui/" + item.usuario_processo_professor_avaliadorTousuario.foto : "http://192.168.0.28/tcc-ui/src/img/avatars/generic.webp"}" 
                            alt="Foto Professor Avaliador" style="width:40px; height:40px; object-fit:cover; border-radius:50%; margin-right:10px;">
                        ${item.usuario_processo_professor_avaliadorTousuario ? `${item.usuario_processo_professor_avaliadorTousuario.nome} ${item.usuario_processo_professor_avaliadorTousuario.sobrenome}` : 'N/A'}
                    </div>
                </td>
                <td>
                    <div style="display: flex; align-items: center;">
                        ${item.usuario_processo_servidor_responsavelTousuario ? `
                            <img src="${item.usuario_processo_servidor_responsavelTousuario.foto ? "http://192.168.0.28/tcc-ui/" + item.usuario_processo_servidor_responsavelTousuario.foto : "http://192.168.0.28/tcc-ui/src/img/avatars/generic.webp"}" 
                                alt="Foto Servidor Responsável" style="width:40px; height:40px; object-fit:cover; border-radius:50%; margin-right:10px;">
                            ${item.usuario_processo_servidor_responsavelTousuario.nome} ${item.usuario_processo_servidor_responsavelTousuario.sobrenome}
                        ` : 'N/A'}
                    </div>
                </td>
                <td>
                    <a class="view-request" data-id="${item.id}">
                        <span class="badge rounded-pill bg-light-info">
                            <i class="bi bi-search"></i> 
                        </span>
                    </a>
                    <a href="http://192.168.0.28/tcc-ui/request/${item.identificador}">
                        <span class="badge rounded-pill bg-light-primary">
                            <i class="bi bi-eye"></i> 
                        </span>
                    </a>
            
                </td>
            `;
            tableBody.appendChild(row);
        });

        // Adicionar event listeners para ações (visualizar, excluir)
        document.querySelectorAll('.view-request').forEach(link => {
            link.addEventListener('click', function (event) {
                // Não previnir o comportamento padrão se o link leva a uma nova página
                // event.preventDefault();
                const id = this.getAttribute('data-id');
                const item = jsonData.find(data => data.id == id);
                if (item) {
                    showRequestDetails(item);
                }
            });
        });

        // Exibir mensagem 'Nenhum item encontrado' se necessário
        noResultsMessage.textContent = filteredData.length === 0 ? 'Nenhum item encontrado.' : '';

        // Gerar links de paginação
        const totalPages = Math.ceil(filteredData.length / itemsPerPage);
        generatePaginationLinks(totalPages);
    }

    /**
     * Mostra os detalhes da solicitação em um modal.
     * @param {Object} item - A solicitação a ser exibida.
     */
    function showRequestDetails(item) {
        const modalTitle = document.getElementById('modalTitle');
        const modalBody = document.getElementById('modalBody');

        modalTitle.textContent = `Detalhes da Solicitação: ${item.titulo}`;

        modalBody.innerHTML = `
            <p><strong>ID:</strong> ${item.id}</p>
            <p><strong>Número:</strong> ${item.numero}</p>
            <p><strong>Título:</strong> ${item.titulo}</p>
            <p><strong>Descrição:</strong> ${item.descricao}</p>
            <p><strong>Tipo de Solicitação:</strong> ${getNestedValue(item, 'tipo_solicitacao_processo_tipo_solicitacaoTotipo_solicitacao.nome')}</p>
            <p><strong>Status:</strong> ${item.status}</p>
            <p><strong>Data de Abertura:</strong> ${formatDate(item.data_abertura)}</p>
            <p><strong>Aluno:</strong> ${item.usuario_processo_alunoTousuario.nome} ${item.usuario_processo_alunoTousuario.sobrenome}</p>
            <p><strong>Email do Aluno:</strong> ${item.usuario_processo_alunoTousuario.email}</p>
            <p><strong>Professor Avaliador:</strong> ${item.usuario_processo_professor_avaliadorTousuario ? `${item.usuario_processo_professor_avaliadorTousuario.nome} ${item.usuario_processo_professor_avaliadorTousuario.sobrenome}` : 'N/A'}</p>
            <p><strong>Email do Professor Avaliador:</strong> ${item.usuario_processo_professor_avaliadorTousuario ? item.usuario_processo_professor_avaliadorTousuario.email : 'N/A'}</p>
            <p><strong>Servidor Responsável:</strong> ${item.usuario_processo_servidor_responsavelTousuario ? `${item.usuario_processo_servidor_responsavelTousuario.nome} ${item.usuario_processo_servidor_responsavelTousuario.sobrenome}` : 'N/A'}</p>
            <p><strong>Email do Servidor Responsável:</strong> ${item.usuario_processo_servidor_responsavelTousuario ? item.usuario_processo_servidor_responsavelTousuario.email : 'N/A'}</p>
            <p><strong>Identificador:</strong> ${item.identificador}</p>
            <p><strong>Justificativa de Conclusão:</strong> ${item.justificativa_conclusao ?? 'N/A'}</p>
            <p><strong>Data Limite para Resolução:</strong> ${item.data_limite_resolucao ? formatDate(item.data_limite_resolucao) : 'N/A'}</p>
            <p><strong>Etapa Atual:</strong> ${item.etapa_atual}</p>
        `;

        // Exibir o modal
        const requestModal = new bootstrap.Modal(document.getElementById('logModal'));
        requestModal.show();
    }

    /**
     * Exclui uma solicitação após confirmação do usuário.
     * @param {number} id - O ID da solicitação a ser excluída.
     */
    function deleteRequest(id) {
        Swal.fire({
            title: 'Tem certeza?',
            text: "Você não poderá reverter isso!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim, excluir!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Remover a solicitação de jsonData
                jsonData = jsonData.filter(item => item.id != id);
                // Atualizar a exibição
                displayData();
                Swal.fire(
                    'Excluído!',
                    'A solicitação foi excluída.',
                    'success'
                );
            }
        });
    }

    /**
     * Altera o número de itens por página e atualiza a exibição.
     */
    function changeItemsPerPage() {
        const itemsPerPageSelect = document.getElementById('itemsPerPage');
        itemsPerPage = parseInt(itemsPerPageSelect.value, 10);
        currentPage = 1;
        displayData();
    }

    /**
     * Filtra os dados com base na pesquisa e atualiza a exibição.
     */
    function searchData() {
        const searchInput = document.getElementById('searchInput');
        searchQuery = searchInput.value.trim().toLowerCase();
        currentPage = 1;
        displayData();
    }

    /**
     * Gera os links de paginação com base no número total de páginas.
     * @param {number} totalPages - O número total de páginas.
     */
    function generatePaginationLinks(totalPages) {
        const paginationContainer = document.getElementById('pagination');
        paginationContainer.innerHTML = '';

        // Botão 'Anterior'
        const prevLink = document.createElement('a');
        prevLink.href = '#';
        prevLink.classList.add('page-link', 'me-2');
        prevLink.textContent = 'Anterior';
        prevLink.addEventListener('click', (event) => {
            event.preventDefault();
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
            pageLink.classList.add('page-link', 'me-2');
            pageLink.textContent = i;
            if (i === currentPage) {
                pageLink.classList.add('active');
            }
            pageLink.addEventListener('click', (event) => {
                event.preventDefault();
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
        nextLink.addEventListener('click', (event) => {
            event.preventDefault();
            if (currentPage < totalPages) {
                currentPage++;
                displayData();
            }
        });
        paginationContainer.appendChild(nextLink);
    }

    /**
     * Inicializa a exibição dos dados e adiciona os event listeners aos elementos.
     */
    document.addEventListener('DOMContentLoaded', () => {
        displayData();

        // Adicionar event listeners para ordenação
        document.getElementById('numero-header').addEventListener('click', () => sortData('numero'));
        document.getElementById('titulo-header').addEventListener('click', () => sortData('titulo'));
        document.getElementById('tipo-solicitacao-header').addEventListener('click', () => sortData('tipo_solicitacao_processo_tipo_solicitacaoTotipo_solicitacao.nome'));
        document.getElementById('status-header').addEventListener('click', () => sortData('status'));
        document.getElementById('data-abertura-header').addEventListener('click', () => sortData('data_abertura'));

        // Event listener para alterar o número de itens por página
        document.getElementById('itemsPerPage').addEventListener('change', changeItemsPerPage);

        // Event listener para pesquisa
        document.getElementById('searchInput').addEventListener('input', searchData);
    });
</script>