function ajaxcall(url, data = {}, procSuccess, procFail, dataType = 'json', method) {

    // CRIANDO FUNÇÃO QUE SIMPLIFICA A PASSAGEM DE DADOS PARA O SERVIDOR/CONTROLLER
    //USANDO JQUERY
    $.ajax({
        //URL É UM PARAMETRO OBRIGATORIO, AQUI FEITO PARA RECEBER A ROTA DO CONTROLLER
        url: url,
        // TODOS ABAIXO SÃO AS CONFIGURAÇÕES OU OPTIONS
        // CADA UM COM SUA FUNÇÃO ESPECIFICADA

        // AQUI USADO PARA DEFINIR O TIPO DOS DADOS QUE VIRAM DO PARAMETRO data
        dataType: dataType,

        // method É ONDE DEFINIMOS OS VERBO HTTP APROPRIADO PARA A REQUISIÇÃO
        method: (!method) ? 'GET' : method,

        // data É A OPTION QUE IRÁ RECBER TODOS OS DADOS VINDO DO SCRIPT
        data: data,
        // ESSA OPTION É ESTÁ ENCARREGADA DE SER CHAMADA CASO O PROCESSO PARA QUAL URL DIRECIONA SEJA BEM SUCEDIDO.
        success: function (callback) {
            console.log(callback.msg)
            return data = procSuccess(callback);

        },
        // ESSA OPTION É ESTÁ ENCARREGADA DE SER CHAMADA CASO O PROCESSO PARA QUAL URL DIRECIONA MAL BEM SUCEDIDO.
        error: function (callback) {
            console.log(callback.msg)
            return data = procFail(callback);
        },



    });


}
