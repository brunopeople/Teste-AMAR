jQuery.fn.extend({
    busca_cep: function(map) {
        let API_URL = 'https://viacep.com.br/ws/{cep}/json';

        // captura o dado posto no input do cep
        let cepInput = this;

        // pega os ids enviados em mapa e transforma em um objeto jquery
        let $to_disable = $(Object.values(map).reduce((previous, current) => previous + ',' + current));
        let $to_empty = $to_disable;

        // função para verificar se o cep é válido
        function cep_valido(cep) {
            return cep.length == 8;
        };

        // função para comunicar com a api
        function pegar_cep(cep, success_callback = function(){}, complete_callback = function(){}) {
            let url = API_URL.replace('{cep}', cep);
            $.ajax({
                'url': url,
                'success' : success_callback,
                'complete': complete_callback
            });
        };

        $(cepInput).on('change', function(e) {
            // só continua se digitar números
            if(!isNaN(String.fromCharCode(e.which)))
                return false;

            // apenas remove o traço do cep
            const cep = $(this).val().replace('-', '');

            // só continua se o cep for válido
            if(cep_valido(cep)) {
                // limpa e desabilita os inputs
                $to_empty.val('');
                $to_disable.attr('disabled', true);
                
                // comunica com a api
                pegar_cep(
                    cep,
                    function(result) {
                        if(!result.erro) {
                            // atualiza os valores dos inputs
                            // campos api: logradouro, bairro, localidade, uf
                            $(map.logradouro).val(result.logradouro)
                            $(map.bairro).val(result.bairro)
                            $(map.localidade).val(result.localidade)
                            $(map.uf).val(result.uf)
                        }
                    },
                    function() {
                        // habilita os campos novamente
                        setTimeout(() => $to_disable.attr('disabled', false), 750);
                    }
                );
            }
        });
    }
});