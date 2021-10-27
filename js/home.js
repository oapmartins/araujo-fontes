$(document).ready(function() {

    const ctx = document.getElementById('myChart');

    const data = {
    labels: ['17','15', '56415'],
    datasets: [
        {
            label: 'FUNDO 1',
            data: [65, 59, 80, 81, 56, 55, 40],
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        },
        {
            label: 'FUNDO 2',
            data: [65, 59, 80, 81, 56, 55, 40],
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        },
        {
            label: 'FUNDO 3',
            data: [65, 59, 80, 81, 56, 55, 40],
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        },
        {
            label: 'FUNDO 4',
            data: [65, 59, 80, 81, 56, 55, 40],
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }
    ]
    };

    const config = {
        type: 'line',
        data: data,
    };

    const myChart = new Chart(ctx, config);

});