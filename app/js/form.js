$("#btnCadastrar").click(()=>{
    const campoDataPatrimonio   = $("#dataPatrimonio");
    const campoIdFundo          = $("#idFundo");
    const campoValorPatrimonio  = $("#valorPatrimonio");

    if(campoDataPatrimonio.val() == ''){
        alertMsg('Favor preencher o campo de Data do Patrimônio!');
        return false;
    }
    
    if(campoIdFundo.val() == '' || campoIdFundo.val() == '0'){
        alertMsg('Favor selecionar o campo de ID do Fundo!');
        return false;
    }

    if(campoValorPatrimonio.val() == ''){
        alertMsg('Favor preencher o campo de Valor do Patrimônio!');
        return false;
    }
    $("#formCrud").submit();
});