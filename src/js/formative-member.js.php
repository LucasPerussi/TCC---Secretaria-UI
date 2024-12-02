<?php
// header("Content-Type: application/javascript");
use API\Controller\Config;
?>

<script>
        // Dados fornecidos em JSON
        const data = <?=json_encode($percentage, true)?>;

        // Filtrar tipos com percentual maior que 0 (opcional)
        const filteredData = data.filter(item => item.percentual > 0);

        // Preparar os dados para o Chart.js
        const labels = filteredData.map(item => item.nome);
        const percentuais = filteredData.map(item => item.percentual);

        // Cores para cada fatia do gráfico
        const cores = [
            '#FF5733', // Cor para id 1
            '#33FF57', // Cor para id 2
            '#3357FF', // Cor para id 3
            '#FF33A8', // Cor para id 4
            '#33FFF5'  // Cor para id 5
        ];

        // Selecionar apenas as cores dos tipos filtrados
        const coresFiltradas = filteredData.map(item => cores[item.id - 1]);

        // Configuração do gráfico de pizza
        const ctx = document.getElementById('pieChart').getContext('2d');
        const pieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    data: percentuais,
                    backgroundColor: coresFiltradas,
                    borderColor: '#ffffff',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            boxWidth: 20,
                            padding: 15
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.parsed || 0;
                                return `${label}: ${value}%`;
                            }
                        }
                    }
                }
            }
        });
    </script>
