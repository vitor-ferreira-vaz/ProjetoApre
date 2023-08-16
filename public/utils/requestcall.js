function ajaxcall(url, data = {}, procSuccess, procFail, dataType = 'json', method) {

    console.log(url)
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
            iziToast.success({
                title: 'Sucesso!',
                color: '#2dc653',
                titleColor: "#FFF",
                messageColor: "#FFF",
                message: callback.msg,
                maxWidth: 600,
                // timeout: 6000,
                // icon: 'icon-material',
                position: 'topRight'
            });
            return data = procSuccess(callback);

        },
        // ESSA OPTION É ESTÁ ENCARREGADA DE SER CHAMADA CASO O PROCESSO PARA QUAL URL DIRECIONA MAL BEM SUCEDIDO.
        error: function (callback) {
            iziToast.warning({
                title: 'Falha!',
                color: '#e5383b',
                titleColor: "#FFF",
                messageColor: "#FFF",
                message: callback.msg,
                maxWidth: 600,
                timeout: 6000,
                position: 'topRight'
            });
            return data = procFail(callback);
        },


    });


}
