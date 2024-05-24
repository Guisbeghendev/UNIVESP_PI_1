// modal login sucesso

    // Função para obter parâmetros da URL
    function getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }
        return false;
    }

    // Verifica se o parâmetro "cadastro" existe na URL e se é igual a "sucesso"
    $(document).ready(function() {
        if (getUrlParameter('cadastro') === 'sucesso') {
            // Exibe o modal
            $('#successModal').modal('show');
        }
    });
