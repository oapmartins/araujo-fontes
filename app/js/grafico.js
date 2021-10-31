const labels = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
];
const data = {
    labels: labels,
    datasets: [
        {
            label: 'Fundo 1',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 10, 5, 2, 20, 30, 45],
        },

        {
            label: 'Fundo 2',
            backgroundColor: 'rgb(173 181 248)',
            borderColor: 'rgb(173 181 248)',
            data: [21, 20, 5, 2, 20, 30, 45],
        },

        {
            label: 'Fundo 3',
            backgroundColor: 'rgb(49 211 136)',
            borderColor: 'rgb(49 211 136)',
            data: [21, 20, 5, 2, 20, 30, 45],
        },

        {
            label: 'Fundo 4',
            backgroundColor: 'rgb(233 190 64)',
            borderColor: 'rgb(233 190 64)',
            data: [21, 20, 5, 2, 20, 30, 45],
        },
    ]
};

const config = {
    type: 'line',
    data: data,
};

const myChart = new Chart(
    document.getElementById('myChart'),
    config
);

$("#btnPesquisar").click(() => {

    const dataInicial   = $("#dataInicial");
    const dataFinal     = $("#dataFinal");

    $.ajax({
        url: "includes/dadosGrafico.php",
        type: "get",
        data : {
            dataInicial: dataInicial.val(),
            dataFinal: dataFinal.val()
        },
        success: function (response) {
            console.log(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
    });
}); 