<?php

use API\Controller\Config;
?>
<script>
    // Converter o array PHP $users para o formato JSON para uso no JavaScript
    let jsonData = <?= json_encode($users, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE); ?>;

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
        return `${day}/${month}/${year}`;
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
            let aValue = a[field];
            let bValue = b[field];

            if (field === 'nome') {
                aValue = a.nome + ' ' + a.sobrenome;
                bValue = b.nome + ' ' + b.sobrenome;
            }

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
        const tableBody = document.getElementById('table-body');
        const noResultsMessage = document.getElementById('noResultsMessage');

        // Filtrar dados com base na pesquisa
        const filteredData = jsonData.filter(item => {
            const matchesSearch = Object.values(item).some(value => {
                if (value && typeof value === 'string') {
                    return value.toLowerCase().includes(searchQuery);
                } else if (value != null) {
                    return value.toString().toLowerCase().includes(searchQuery);
                }
                return false;
            });

            return matchesSearch;
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

            row.innerHTML = `
                <td><img src="${item.foto != "" ? "<?= Config::BASE_URL ?>" + item.foto : "<?= Config::BASE_URL ?>src/img/avatars/generic.webp"}" alt="Foto" style="width:50px; height:50px; object-fit:cover; border-radius:50%;"></td>
                <td>${item.nome} ${item.sobrenome}</td>
                <td>${item.email}</td>
                <td>${item.registro}</td>
                <td>${item.curso ? "<span class='badge rounded-pill bg-light-primary '>" + item.curso : "<span class='badge rounded-pill bg-light-secondary '>N/A"}</span></td>
                <td>
                    <a href='#' class='view-user' data-id='${item.id}'><span class='badge rounded-pill bg-light-primary '><i class="bi bi-eye"></i></span></a>
                    <a href='#' class='delete-user' data-id='${item.id}'><span class='badge rounded-pill bg-light-danger '><i class="bi bi-trash"></i></span></a>
                    <a href='#' class='change-user-role' data-id='${item.id}'><span class='badge rounded-pill bg-light-warning '><i class="bi bi-person-fill-gear"></i></span></a>
                </td>
            `;
            tableBody.appendChild(row);
        });

        // Adicionar event listeners aos links de visualização e exclusão
        document.querySelectorAll('.view-user').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const id = this.getAttribute('data-id');
                const item = jsonData.find(item => item.id == id);
                if (item) {
                    showUserDetails(item);
                }
            });
        });

        document.querySelectorAll('.delete-user').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const id = this.getAttribute('data-id');
                deleteUser(id);
            });
        });
        document.querySelectorAll('.change-user-role').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const id = this.getAttribute('data-id');

            });
        });


        /*$("#changeRole").submit(function(e) {
            e.preventDefault();
            const data = new FormData(e.target);
            const object = Object.fromEntries(data.entries());
            axios.patch('<?= Config::BASE_ACTION_URL ?>/change-role', object)
                .then(function(response) {
                    console.log(response)
                    if (response.data.status > 202) {
                        throw response.data;
                    } else {
                        location.reload();
                    }
                })
                .catch(function(error) {

                    console.log(error.status)
                    Swal.fire({
                        title: 'Tivemos um problema!',
                        text: 'Tivemos um problema ao cadastrar solicitacao (STATUS: ' + error.status + ')',
                        icon: 'error',
                        showCancelButton: false,
                        confirmButtonColor: '#1f8cd4',
                        cancelButtonColor: '#d33',
                        confirmButtonText: '<?= __("event_schedule_js.ok") ?>'
                    })
                });
        });*/

        function changeRole(user,role) {

            axios.patch('<?= Config::BASE_ACTION_URL ?>/change-role', object)
                .then(response => {
                    if (response.data.status !== 200) {
                        throw response.data;
                    } else {
                        location.reload();
                    }
                })
                .catch(error => {
                    Swal.fire({
                        title: 'Tivemos um problema!',
                        text: 'Tivemos um problema ao remover campo. Talvez ele já esteja em uso. (STATUS: ' + error.status + ')',
                        icon: 'error',
                        showCancelButton: false,
                        confirmButtonColor: '#1f8cd4',
                        cancelButtonColor: '#d33',
                        confirmButtonText: '<?= __("event_schedule_js.ok") ?>'
                    })
                });
        }



        // Exibir mensagem 'Nenhum item encontrado' se necessário
        noResultsMessage.textContent = filteredData.length === 0 ? 'Nenhum item encontrado.' : '';

        // Gerar links de paginação
        const totalPages = Math.ceil(filteredData.length / itemsPerPage);
        generatePaginationLinks(totalPages);
    }

    // Função para mostrar os detalhes do usuário no modal
    function showUserDetails(item) {
        const modalTitle = document.getElementById('modalTitle');
        const modalBody = document.getElementById('modalBody');

        modalTitle.textContent = `Detalhes do Usuário: ${item.nome} ${item.sobrenome}`;

        modalBody.innerHTML = `
            <p><strong>ID:</strong> ${item.id}</p>
            <p><strong>Nome:</strong> ${item.nome} ${item.sobrenome}</p>
            <p><strong>Email:</strong> ${item.email}</p>
            <p><strong>Registro:</strong> ${item.registro}</p>
            <p><strong>Curso:</strong> ${item.curso ?? 'N/A'}</p>
            <p><strong>Nascimento:</strong> ${formatDate(item.nascimento)}</p>
            <p><strong>Criado em:</strong> ${formatDate(item.criado_em)}</p>
        `;

        // Exibir o modal
        const userModal = new bootstrap.Modal(document.getElementById('logModal'));
        userModal.show();
    }

    // Função para excluir o usuário
    function deleteUser(id) {
        Swal.fire({
            title: 'Tem certeza?',
            text: "Você não poderá reverter isso!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim, excluir!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Remover o usuário de jsonData
                jsonData = jsonData.filter(item => item.id != id);
                // Atualizar a exibição
                displayData();
                Swal.fire(
                    'Excluído!',
                    'O usuário foi excluído.',
                    'success'
                )
            }
        })
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
        displayData();

        document.getElementById('name-header').addEventListener('click', () => sortData('nome'));
        document.getElementById('email-header').addEventListener('click', () => sortData('email'));
        document.getElementById('registro-header').addEventListener('click', () => sortData('registro'));
        document.getElementById('curso-header').addEventListener('click', () => sortData('curso'));
    });
</script>