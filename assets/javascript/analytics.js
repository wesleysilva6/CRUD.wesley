        const ctx1 = document.getElementById('chartSimulacoesDia').getContext('2d');
        new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: chartDiasLabels, // variáveis JS
            datasets: [{
            label: 'Simulações por dia',
            data: chartDiasData,
            backgroundColor: 'rgba(6,62,145,0.6)'
            }]
        },
        options: {
            scales: {
            y: { beginAtZero: true }
            }
        }
        });

        const ctx2 = document.getElementById('chartResumo').getContext('2d');
        new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: ['Total de simulações', 'Valor Total (R$)'],
            datasets: [{
            data: chartResumoData,
            backgroundColor: ['#3e95cd', '#00d300']
            }]
        },
        options: { responsive: true }
        });
