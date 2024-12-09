<style>
    /* Adiciona um estilo especial para a página ativa */
    .active-page {
        background-color: #007bf330;
        /* Azul, você pode mudar para a cor desejada */
        color: white;
        border-radius: 5px;

    }

    .timeline .timeline-item .timeline-point {
        height: 15px !important;
        width: 15px !important;
        text-align: center !important;
        margin-left: 4px !important;
        border: none !important;
    }
</style>

<section class="app-user-view-account">
    <div class="row">
        <!-- User Sidebar -->

        <!--/ User Sidebar -->

        <!-- User Content -->
        <div class="col-xl-12 col-lg-12 col-md-12 order-1 order-md-1">


            <!-- Activity Timeline -->
            <div class="row">
                <div class="col-8">
                </div>
                <div class="col-4">
                    <div class="dropdown" style="float:right !important; margin-top:-60px;">
                        <label for="itemsPerPage" style="font-size:12px;">Itens por Página:
                            <select id="itemsPerPage" class="form-control select" onchange="changeItemsPerPage()">
                                <option value="10">10</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select></label>
                    </div>
                </div>
            </div>
            <br />
            <div class="input-group mb-0">
                <span class="input-group-text" id="basic-addon-search1"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg></span>
                <input type="text" id="searchInput" oninput="searchData()" class="form-control" placeholder="Search..." aria-label="Search..." aria-describedby="basic-addon-search1">
            </div>
            <br />


            <div class="card" style="padding:20px; padding-bottom:20px;">
                <div class="content-body">
                    <!-- Timeline Starts -->
                    <section class="basic-timeline">

                        <ul class="timeline ms-50" id="timelines">

                        </ul>
                        <div class="no-results-message" id="noResultsMessage"></div>

                    </section>
                </div>
            </div>
            <br />
            <div class="pagination" id="pagination" style="border-radius:20px !important; overflow:hidden; background-color:#f3f2f7"></div>
            <br />

            <!-- /Activity Timeline -->

        </div>
        <!--/ User Content -->
    </div>
</section>

<script>
    const jsonData = <?php echo json_encode($timelines, true); ?>;
</script>
<script>
    class TimelineEnum {
        // Definição dos tipos com base no TimelineTypes
        static ACCOUNT_CREATION = 1;
        static LOGIN = 2;
        static TICKET_OPEN = 3;
        static PASSWORD_CHANGE = 4;
        static NEW_COMMENT = 5;
        static NEW_STAGE = 6;
        static NEW_TEACHER = 7;
        static NEW_SERVER = 8;
        static TICKET_CLOSED = 9;
        static NEW_STATUS = 10;
        static EMAIL_UPDATE = 11;
        static REGISTRATION_UPDATE = 12;
        static NAME_UPDATE = 13;
        static SURNAME_UPDATE = 14;
        static BIRTHDATE_UPDATE = 15;
        static PHOTO_UPDATE = 16;
        static USER_STATUS_UPDATE = 17;
        static COURSE_UPDATE = 18;
        static COURSE_STATUS_UPDATE = 19;
        static ROLE_UPDATE = 20;

        // Mapeamento das cores com base no TimelineTypeInfo
        static colorReal = {
            1: '#1E90FF', // Criação de Conta
            2: '#20B2AA', // Login
            3: '#FA8072', // Chamado registrado
            4: '#00BFFF', // Alteração de Senha
            5: '#2bff00', // Novo Comentário
            6: '#5521b6', // Mudança de etapa
            7: '#8caa21', // Professor Vinculado
            8: '#217ab6', // Servidor Vinculado
            9: '#eec12d', // Chamado Encerrado
            10: '#b72dee', // Novo Status
            11: '#ff5733', // Atualização de Email
            12: '#ff0037', // Atualização de Registro
            13: '#0c907e', // Atualização de Nome
            14: '#581845', // Atualização de Sobrenome
            15: '#b2ba1b', // Atualização de Data de Nascimento
            16: '#900C3F', // Atualização de Foto
            17: '#c53d9c', // Atualização de Status do Usuário
            18: '#FF5733', // Atualização de Curso
            19: '#FFC300', // Atualização de Status do Curso
            20: '#c49a12'  // Atualização de Função
        };

        // Mapeamento dos textos das badges
        static badgeText = {
            1: 'Criação de Conta',
            2: 'Login',
            3: 'Chamado Registrado',
            4: 'Alteração de Senha',
            5: 'Novo Comentário',
            6: 'Mudança de Etapa',
            7: 'Professor Vinculado',
            8: 'Servidor Vinculado',
            9: 'Chamado Encerrado',
            10: 'Novo Status',
            11: 'Atualização de Email',
            12: 'Atualização de Registro',
            13: 'Atualização de Nome',
            14: 'Atualização de Sobrenome',
            15: 'Atualização de Data de Nascimento',
            16: 'Atualização de Foto',
            17: 'Atualização de Status do Usuário',
            18: 'Atualização de Curso',
            19: 'Atualização de Status do Curso',
            20: 'Atualização de Função'
        };

        // Mapeamento dos botões (ajuste conforme necessário)
        static button = {
            4: 'Alterar Senha',
            11: 'Atualizar Email',
            12: 'Atualizar Registro',
            13: 'Atualizar Nome',
            14: 'Atualizar Sobrenome',
            15: 'Atualizar Data de Nascimento',
            16: 'Atualizar Foto',
            17: 'Atualizar Status do Usuário',
            18: 'Atualizar Curso',
            19: 'Atualizar Status do Curso',
            20: 'Atualizar Função'
        };

        // Mapeamento de invisibilidade (ajuste conforme necessário)
        static invisible = {
            1: 'hidden',
            2: 'hidden',
            3: '',
            4: '',
            5: '',
            6: '',
            7: '',
            8: '',
            9: '',
            10: '',
            11: '',
            12: '',
            13: '',
            14: '',
            15: '',
            16: '',
            17: '',
            18: '',
            19: '',
            20: ''
        };

        // Mapeamento das cores dos botões (ajuste conforme necessário)
        static buttonColor = {
            4: '#808080',
            11: '#ff5733',
            12: '#ff0037',
            13: '#0c907e',
            14: '#581845',
            15: '#DAF7A6',
            16: '#900C3F',
            17: '#c53d9c',
            18: '#FF5733',
            19: '#FFC300',
            20: '#c49a12'
        };

        // Método para obter os atributos com base no tipo
        static getAttributes(id) {
            return {
                colorReal: TimelineEnum.colorReal[id] || "#20B2AA",
                badgeText: TimelineEnum.badgeText[id] || "Geral",
                button: TimelineEnum.button[id] || null,
                invisible: TimelineEnum.invisible[id] || "hidden",
                buttonColor: TimelineEnum.buttonColor[id] || null
            };
        }
    }
</script>

<script>
    // Variáveis para controle de paginação, ordenação, pesquisa e itens por página
    let currentPage = 1;
    let sortField = null;
    let sortOrder = 'asc';
    let searchQuery = '';
    let itemsPerPage = 10; // Valor padrão

    // Função para ordenar os dados
    function sortData(field) {
        if (sortField === field) {
            // Se já estiver ordenado pelo mesmo campo, inverte a ordem
            sortOrder = sortOrder === 'asc' ? 'desc' : 'asc';
        } else {
            // Se for um novo campo, define a ordem como ascendente
            sortField = field;
            sortOrder = 'asc';
        }

        // Realiza a ordenação dos dados
        jsonData.sort((a, b) => {
            const aValue = a[field];
            const bValue = b[field];

            let comparison = 0;

            if (typeof aValue === 'string' && typeof bValue === 'string') {
                comparison = aValue.localeCompare(bValue);
            } else if (typeof aValue === 'number' && typeof bValue === 'number') {
                comparison = aValue - bValue;
            } else {
                // Caso os tipos sejam diferentes ou não sejam strings/números
                comparison = String(aValue).localeCompare(String(bValue));
            }

            return sortOrder === 'asc' ? comparison : -comparison;
        });

        // Exibe os dados atualizados
        displayData();
    }

    function formatDate(dateString) {
        const date = new Date(dateString);
        const day = ('0' + date.getDate()).slice(-2);
        const month = ('0' + (date.getMonth() + 1)).slice(-2); 
        const year = date.getFullYear();
        const hours = ('0' + date.getHours()).slice(-2); 
        const minutes = ('0' + date.getMinutes()).slice(-2); 

        return `${day}/${month}/${year} às ${hours}:${minutes}`;
    }
    // Função para exibir dados na lista de timelines com paginação
    function displayData() {
        const tableBody = document.getElementById('timelines');
        const paginationContainer = document.getElementById('pagination');
        const noResultsMessage = document.getElementById('noResultsMessage');

        // Filtra os dados com base na pesquisa
        const filteredData = jsonData.filter(item => {
            const lowerCaseQuery = searchQuery.toLowerCase();
            return (
                (item.id && item.id.toString().toLowerCase().includes(lowerCaseQuery)) ||
                (item.usuario && item.usuario.toString().toLowerCase().includes(lowerCaseQuery)) ||
                (item.referencia && item.referencia.toString().toLowerCase().includes(lowerCaseQuery)) ||
                (item.titulo && item.titulo.toLowerCase().includes(lowerCaseQuery)) ||
                (item.descricao && item.descricao.toLowerCase().includes(lowerCaseQuery)) ||
                (item.tipo && item.tipo.toString().toLowerCase().includes(lowerCaseQuery)) ||
                (item.data && item.data.toString().toLowerCase().includes(lowerCaseQuery))
            );
        });

        // Ordena os dados com base na coluna e ordem especificadas
        if (sortField) {
            filteredData.sort((a, b) => {
                const aValue = a[sortField];
                const bValue = b[sortField];

                let comparison = 0;

                if (typeof aValue === 'string' && typeof bValue === 'string') {
                    comparison = aValue.localeCompare(bValue);
                } else if (typeof aValue === 'number' && typeof bValue === 'number') {
                    comparison = aValue - bValue;
                } else {
                    comparison = String(aValue).localeCompare(String(bValue));
                }

                return sortOrder === 'asc' ? comparison : -comparison;
            });
        }

        // Calcula o índice inicial e final dos itens a serem exibidos
        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = startIndex + itemsPerPage;

        // Filtra os dados com base na página atual
        const currentPageData = filteredData.slice(startIndex, endIndex);

        // Limpa a lista de timelines e adiciona os novos itens
        tableBody.innerHTML = '';
        currentPageData.forEach(item => {
            const row = document.createElement('li');
            row.className = 'timeline-item';

            const attributes = TimelineEnum.getAttributes(item.tipo);
            const invisivel = attributes.invisible;

            row.innerHTML = `
                <span style="background-color: ${attributes.colorReal};" class="timeline-point"></span>
                <div class="timeline-event">
                    <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                        <h6>${item.titulo}</h6>
                        <span class="timeline-event-time">${formatDate(item.data)}</span>
                    </div>
                    <div>${item.descricao}</div>
                    <div class="d-flex flex-row align-items-center">
                        <span class='badge' style="
                            margin-top: 10px;
                            padding: 5px 10px;
                            border-radius: 10px;
                            border: 1px solid ${attributes.colorReal};
                            color: ${attributes.colorReal};
                            background-color: transparent;
                        ">
                            ${attributes.badgeText}
                        </span>
                        ${attributes.button ? `
                        <span class='badge ${invisivel}' style="
                            margin-top: 10px;
                            margin-left: 5px;
                            padding: 5px 10px;
                            border-radius: 10px;
                            border: 1px solid ${attributes.buttonColor};
                            color: ${attributes.buttonColor};
                            background-color: transparent;
                            cursor: pointer;
                        ">
                            ${attributes.button}
                        </span>
                        ` : ''}
                    </div>
                </div>
            `;
            tableBody.appendChild(row);
        });

        // Exibe a mensagem de nenhum item encontrado, se aplicável
        if (filteredData.length === 0) {
            noResultsMessage.textContent = 'Nenhum item encontrado.';
        } else {
            noResultsMessage.textContent = '';
        }

        // Calcula o número total de páginas
        const totalPages = Math.ceil(filteredData.length / itemsPerPage);

        // Gera os links de paginação
        generatePaginationLinks(totalPages, currentPage);
    }

    // Função para gerar os links de paginação com elipses
    function generatePaginationLinks(totalPages, currentPage) {
        const paginationContainer = document.getElementById('pagination');
        const maxPagesToShow = 5;
        let startPage, endPage;

        if (totalPages <= maxPagesToShow) {
            startPage = 1;
            endPage = totalPages;
        } else {
            const maxPagesBeforeCurrentPage = Math.floor(maxPagesToShow / 2);
            const maxPagesAfterCurrentPage = Math.ceil(maxPagesToShow / 2) - 1;
            if (currentPage <= maxPagesBeforeCurrentPage) {
                startPage = 1;
                endPage = maxPagesToShow;
            } else if (currentPage + maxPagesAfterCurrentPage >= totalPages) {
                startPage = totalPages - maxPagesToShow + 1;
                endPage = totalPages;
            } else {
                startPage = currentPage - maxPagesBeforeCurrentPage;
                endPage = currentPage + maxPagesAfterCurrentPage;
            }
        }

        // Limpa o contêiner de paginação
        paginationContainer.innerHTML = '';

        // Adiciona o primeiro link se necessário
        if (startPage > 1) {
            paginationContainer.appendChild(createPageLink(1, '1'));
            if (startPage > 2) {
                paginationContainer.appendChild(createPageLink(0, '...'));
            }
        }

        // Adiciona os links das páginas atuais
        for (let i = startPage; i <= endPage; i++) {
            paginationContainer.appendChild(createPageLink(i, i.toString()));
        }

        // Adiciona o último link se necessário
        if (endPage < totalPages) {
            if (endPage < totalPages - 1) {
                paginationContainer.appendChild(createPageLink(0, '...'));
            }
            paginationContainer.appendChild(createPageLink(totalPages, totalPages.toString()));
        }
    }

    // Função para criar um link de página
    function createPageLink(page, text) {
        const pageLink = document.createElement('a');
        pageLink.href = '#';
        pageLink.classList.add('page-link');
        pageLink.textContent = text;

        if (page === currentPage) {
            pageLink.classList.add('active-page');
        }

        if (page !== 0) { // 0 será usado para os '...'
            pageLink.addEventListener('click', (event) => {
                event.preventDefault();
                currentPage = page;
                displayData();
            });
        } else {
            // Desativa o cursor para os '...'
            pageLink.style.cursor = 'default';
            pageLink.style.color = '#000';
        }

        return pageLink;
    }

    // Função para alterar o número de itens por página
    function changeItemsPerPage() {
        const selectItens = document.getElementById('itemsPerPage');
        itemsPerPage = parseInt(selectItens.value, 10);
        currentPage = 1;
        displayData();
    }

    // Função para pesquisar os dados
    function searchData() {
        const searchInput = document.getElementById('searchInput');
        searchQuery = searchInput.value.toLowerCase();
        currentPage = 1;
        displayData();
    }

    // Exibe os dados na inicialização
    displayData();
</script>