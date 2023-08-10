<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        {!! Form::token()!!}
        <!-- Name -->
        <div>
            <x-input-label for="nome" :value="__('Nome')"/>
            <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome" :value="old('nome')" required
                          autofocus autocomplete="nome"/>
            <x-input-error :messages="$errors->get('nome')" class="mt-2"/>
        </div>

        <!-- Documento -->
        <div class="mt-6">
            <x-input-label for="doc" :value="__('CPF')" class="mt-1"/>
            <input id="cpf" class="block mt-1" type="radio">
            <x-input-label for="doc" :value="__('CNPJ')"/>
            <input id="cnpj" class="block mt-1" type="radio">
            <x-text-input id="doc" class="block mt-1 w-full doc" type="text" name="doc" :value="old('doc')" required
                          autocomplete="CPF/CNPJ"/>
            <x-input-error :messages="$errors->get('doc')" class="mt-2"/>
        </div>
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('E-mail')"/>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                          autocomplete="username"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>


        <!-- CEP -->
        <div class="mt-4">
            <x-input-label for="cep" :value="__('CEP')"/>
            <x-text-input id="cep" class="block mt-1 w-full" type="text" name="cep" :value="old('cep')" required
                          autocomplete="cep"/>
            <x-input-error :messages="$errors->get('cep')" class="mt-2"/>
        </div>


        <!-- Pais -->
        <div class="mt-4">
            <x-input-label for="pais" :value="__('Pais')"/>
            <select id="pais" name="pais" class="block mt-1 w-full">
                <option value="">Selecione
            </select>
            {{--                @foreach() --}}
            {{--                    <option value=""></option>--}}
            {{--                @endforeach--}}
            <x-input-error :messages="$errors->get('pais')" class="mt-2"/>
        </div>

        <!-- UF -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('UF')"/>
            <select id="uf" name="uf" class="block mt-1 w-full">
                <option value="">Selecione</option>
                {{--                @foreach() --}}
                {{--                    <option value=""></option>--}}
                {{--                @endforeach--}}
            </select>
            <x-input-error :messages="$errors->get('uf')" class="mt-2"/>
        </div>

        <!-- Municipio -->
        <div class="mt-4">
            <x-input-label for="municipio" :value="__('Municipio')"/>
            <select id="municipio" name="municipio" class="block mt-1 w-full">
                <option value="">Selecione</option>
                {{--                @foreach() --}}
                {{--                    <option value=""></option>--}}
                {{--                @endforeach--}}
            </select>
            <x-input-error :messages="$errors->get('municipio')" class="mt-2"/>
        </div>


        <!-- Bairro -->
        <div class="mt-4">
            <x-input-label for="bairro" :value="__('Bairro')"/>
            <select id="bairro" name="bairro" class="block mt-1 w-full">
                <option value="">Selecione</option>
                {{--                @foreach() --}}
                {{--                    <option value=""></option>--}}
                {{--                @endforeach--}}
            </select>
            <x-input-error :messages="$errors->get('bairro')" class="mt-2"/>
        </div>

        <!-- Rua / Logradouro -->
        <div class="mt-4">
            <x-input-label for="logra" :value="__('Logradouro')"/>
            <select id="logra" name="logra" class="block mt-1 w-full">
                <option value="">Selecione</option>
                {{--                @foreach() --}}
                {{--                    <option value=""></option>--}}
                {{--                @endforeach--}}
            </select>
            <x-input-error :messages="$errors->get('logra')" class="mt-2"/>
        </div>

        <!-- Número do Logradouro -->
        <div class="mt-4">
            <x-input-label for="numero_logra" :value="__('Número da Residência')"/>
            <x-text-input id="numero_logra" class="block mt-1 w-full" type="text" name="numero_logra"
                          :value="old('numero_logra')" required autocomplete="numero_logra"/>
            <x-input-error :messages="$errors->get('numero_logra')" class="mt-2"/>
        </div>


        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')"/>

            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="new-password"/>

            <x-input-error :messages="$errors->get('password')" class="mt-2"/>
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')"/>

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                          type="password"
                          name="password_confirmation" required autocomplete="new-password"/>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
               href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

<script>
    $(document).ready(function () {
        teste()

        function teste() {
            ajaxcall('{{route('register.getEndereco')}}',
                {
                    teste1: 12,
                    teste2: 13
                },
                function (success) {
                    console.log(success)
                },
                function (fail){
                    return fail.msg;
                }
            );
        }


        $("#doc").prop('disabled', true);

        // // MASCARAS
        $("#cpf").on('click', function () {
            $("#doc").prop('disabled', false);
            if ($(this).prop('checked')) {
                var doc = new Cleave('#doc', {
                    delimiters: ['.', '.', '-'],
                    blocks: [3, 3, 3, 2],
                    numericOnly: true
                });
                $("#cnpj").prop('checked', false);
            }
        });
        $("#cnpj").on('click', function () {
            $("#doc").prop('disabled', false);
            if ($(this).prop('checked')) {
                var doc = new Cleave('#doc', {
                    delimiters: ['.', '.', '/', '-'],
                    blocks: [2, 3, 3, 4, 2],
                    numericOnly: true
                });
                $("#cpf").prop('checked', false);
            }
        });

        var cep = new Cleave('#cep', {
            delimiter: '-',
            blocks: [5, 3],
            numericOnly: true
        });
        var num = new Cleave('#numero_logra', {numericOnly: true});


        function limpa_formulário_cep() {
            // Limpa valores do formulário de cep.
            $("#logra").val("");
            $("#bairro").val("");
            $("#municipio").val("");
            $("#uf").val("");
            $("#pais").val("");
        }

        //Quando o campo cep perde o foco.
        $("#cep").blur(function () {

            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if (validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#logra").val("...");
                    $("#bairro").val("...");
                    $("#municipio").val("...");
                    $("#uf").val("...");
                    $("#pais").val("...");

                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {

                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.

                            $("#pais").append($('<option>', {
                                value: 1,
                                text: 'brasil',
                            }, '</option>'));

                            $("#uf").append($('<option>', {
                                value: 1,
                                text: dados.uf,
                            }, '</option>'));

                            $("#municipio").append($('<option>', {
                                value: 1,
                                text: dados.localidade,
                            }, '</option>'));

                            $("#bairro").append($('<option>', {
                                value: 1,
                                text: dados.bairro,
                            }, '</option>'));

                            $("#logra").append($('<option>', {
                                value: 1,
                                text: dados.logradouro,
                            }, '</option>'));
                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep();
                            alert("CEP não encontrado.");
                        }
                    });
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        });


    }); // DOCUMENT...

</script>
