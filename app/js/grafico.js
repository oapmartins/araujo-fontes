let objGrafico = iniciaGrafico();

$("#btnPesquisar").click(() => {

    const dataInicial = $("#dataInicial");
    const dataFinal = $("#dataFinal");

    if (dataInicial.val() == '' && dataFinal.val() != '') {
        alertMsg('Favor preencher a Data Inicial para consultar!');
        return false;
    }

    if (dataFinal.val() == '' && dataInicial.val() != '') {
        alertMsg('Favor preencher a Data Final para consultar!');
        return false;
    }

    if(dataInicial.val() > dataFinal.val()){
        alertMsg('A data Final não pode ser menor que a Inicial. Favor Verificar!');
        return false;
    }

    // Aqui vou destruir o objeto do grafico, para adicionar o novo com os resultados.
    if(objGrafico != false){
        objGrafico.destroy();
    }

    // Consultando os dados do Grafico
    const dadosGrafico = consultaDadosGrafico(dataInicial.val(), dataFinal.val());;

    if(dadosGrafico.length > 0){

        $(".grafico-vazio").hide();
        objGrafico = criaGrafico(formataDataBR(dataInicial.val()), formataDataBR(dataFinal.val()), dadosGrafico);
    }
    else{
        $(".grafico-vazio").text('Não existem valores para os filtros selecionados. Consulte outras datas!').show();
        return false;
    }

});


function iniciaGrafico() {

    // Aqui vamos pegar a data atual
    const dataHoje = new Date()

    // Number of milliseconds in a day.
    const day = 86400000
    const data7diasAtras = new Date(dataHoje - (7 * day));

    const consultaDados = consultaDadosGrafico(formataDataBanco(data7diasAtras.toLocaleDateString()), formataDataBanco(dataHoje.toLocaleDateString()));
    
    if(consultaDados){
        $(".grafico-vazio").show();
        return false;
    }else{
        $(".grafico-vazio").hide();
    }
    return criaGrafico(data7diasAtras.toLocaleDateString(), dataHoje.toLocaleDateString(), consultaDados);
}

/**
 * Cria o grafico de conforme os parâmetro passados.
 * @param {String} dataInicial 
 * @param {String} dataFinal 
 * @param {object} dadosGrafico 
 * @returns objeto do Gráfico
 */
function criaGrafico(dataInicial = null, dataFinal = null, dadosGrafico = null) {

    let fundo1 = null;
    let fundo2 = null;
    let fundo3 = null;
    let fundo4 = null;
    let dataSet = [];

    const labels = [
        dataInicial,
        dataFinal,
    ];

    // Aqui vou percorrer meus dados para montar o grafico.
    dadosGrafico.forEach(fundo => {
        switch (fundo.fundo_id) {

            case '1':
                fundo1 = {
                    label: 'Fundo 1',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [fundo.value,fundo.value],
                }
                break;
            case '2':
                fundo2 = {
                    label: 'Fundo 2',
                    backgroundColor: 'rgb(173 181 248)',
                    borderColor: 'rgb(173 181 248)',
                    data: [fundo.value,fundo.value],
                }
                break;
            case '3':
                fundo3 = {
                    label: 'Fundo 3',
                    backgroundColor: 'rgb(49 211 136)',
                    borderColor: 'rgb(49 211 136)',
                    data: [fundo.value,fundo.value],
                }
                break;
            case '4':
                fundo4 = {
                    label: 'Fundo 4',
                    backgroundColor: 'rgb(233 190 64)',
                    borderColor: 'rgb(233 190 64)',
                    data: [fundo.value,fundo.value],
                }
                break;
        }
    });

    dataSet = [
        fundo1,
        fundo2,
        fundo3,
        fundo4,
    ]
    // Aqui vou remover as posições nulas.
    var dataSetFiltrado = dataSet.filter(function (el) {
        return el != null;
    });

    const data = {
        labels: labels,
        datasets: dataSetFiltrado
    };

    const config = {
        type: 'line',
        data: data,
    };

    return myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
}

/**
 * Consulta os dados entre das datas informadas.
 * @param {String} dataInicial 
 * @param {String} dataFinal 
 * @returns array de dados
 */
function consultaDadosGrafico(dataInicial = null, dataFinal = null) {
    let retornoConsulta = [];
    // Requisição AJAX para consultar o gráfico.
    $.ajax({
        url: "dados-grafico.php",
        type: "get",
        async: false,
        crossDomain: true,
        contentType: "application/json; charset=utf-8",
        dataType: 'json',
        data: {
            dataInicial,
            dataFinal
        },
        success: function (response) {
            retornoConsulta = response;
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR, textStatus, errorThrown);
        }
    });
    return retornoConsulta;
}

/**
 * Função para formatar a data do padrão do Banco para o BR.
 * @param {Date} data 
 * @returns 
 */
function formataDataBR(data){
    const dataQuebrada = data.split('-');
    return dataQuebrada[2] + '/' + dataQuebrada[1] + '/' + dataQuebrada[0];
}

/**
 * Função para formatar a data do padrão do BR para o BANCO.
 * @param {Date} data 
 * @returns 
 */
function formataDataBanco(data){
    const dataQuebrada = data.split('/');
    return dataQuebrada[2] + '-' + dataQuebrada[1] + '-' + dataQuebrada[0];
}