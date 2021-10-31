// Aqui vou iniciar meu grafico com os dados padrões.
montaGrafico();

$("#btnPesquisar").click(() => {

    const dataInicial   = $("#dataInicial");
    const dataFinal     = $("#dataFinal");

    if(dataInicial.val() == '' && dataFinal.val() != ''){
        alertMsg('Favor preencher a Data Inicial para consultar!');
        return false;
    }
    
    if(dataFinal.val() == '' && dataInicial.val() != ''){
        alertMsg('Favor preencher a Data Final para consultar!');
        return false;
    }

    // Requisição AJAX para consultar o gráfico.
    $.ajax({
        url: "dados-grafico.php",
        type: "get",
        crossDomain: true,
        contentType: "application/json; charset=utf-8",
        dataType: 'json',
        data : {
            dataInicial: dataInicial.val(),
            dataFinal:  dataFinal.val()
        },
        success: function (response) {
            console.log(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(jqXHR,textStatus, errorThrown);
        }
    });

    // Aqui vou destruir o objeto do grafico, para adicionar o novo com os resultados.
    myChart.destroy()

    // Aqui estou instanciando o gráfico novamente.
    myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
}); 

function montaGrafico(idGrafico, dados){

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
    
    let myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
}