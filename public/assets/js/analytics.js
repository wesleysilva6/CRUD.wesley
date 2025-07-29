        const ctx1 = document.getElementById('chartSimulacoesDia').getContext('2d')
        new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: chartDiasLabels, // variáveis JS
            datasets: [{
            label: 'Simulações por dia',
            data: chartDiasData,
            backgroundColor: '#0b5ed7'
            }]
        },
        options: {
            scales: {
            y: { beginAtZero: true }
            }
        }
        })

        const ctx2 = document.getElementById('chartResumo').getContext('2d')
        new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: ['Total de simulações', 'Valor Total (R$)'],
            datasets: [{
            data: chartResumoData,
            backgroundColor: ['#0b5ed7', '#00d300']
            }]
        },
        options: { responsive: true }
        })
