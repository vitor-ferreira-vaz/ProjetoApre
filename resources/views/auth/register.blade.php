<x-guest-layout>
    <form>
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
            <x-input-label for="doc" :value="__('CPF/CNPJ')"/>
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
            <x-input-select id="pais" name="pais">
                <option value="">Selecione
            </x-input-select>
            {{--                @foreach() --}}
            {{--                    <option value=""></option>--}}
            {{--                @endforeach--}}
            <x-input-error :messages="$errors->get('pais')" class="mt-2"/>
        </div>

        <!-- UF -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('UF')"/>
            <x-input-select id="uf" name="uf">
                <option value="">Selecione</option>
                {{--                @foreach() --}}
                {{--                    <option value=""></option>--}}
                {{--                @endforeach--}}
            </x-input-select>
            <x-input-error :messages="$errors->get('uf')" class="mt-2"/>
        </div>

        <!-- Municipio -->
        <div class="mt-4">
            <x-input-label for="municipio" :value="__('Municipio')"/>
            <x-input-select id="municipio" name="municipio">
                <option value="">Selecione</option>
                {{--                @foreach() --}}
                {{--                    <option value=""></option>--}}
                {{--                @endforeach--}}
            </x-input-select>
            <x-input-error :messages="$errors->get('municipio')" class="mt-2"/>
        </div>


        <!-- Bairro -->
        <div class="mt-4">
            <x-input-label for="bairro" :value="__('Bairro')"/>
            <x-input-select id="bairro" name="bairro">
                <option value="">Selecione</option>
                {{--                @foreach() --}}
                {{--                    <option value=""></option>--}}
                {{--                @endforeach--}}
            </x-input-select>
            <x-input-error :messages="$errors->get('bairro')" class="mt-2"/>
        </div>

        <!-- Rua / Logradouro -->
        <div class="mt-4">
            <x-input-label for="logra" :value="__('Logradouro')"/>
            <x-input-select id="logra" name="logra">
                <option value="">Selecione</option>
                {{--                @foreach() --}}
                {{--                    <option value=""></option>--}}
                {{--                @endforeach--}}
            </x-input-select>
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

            <x-primary-button class="ml-4 save">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

<script>
    $(document).ready(function () {

        $('#cep').inputmask({mask: '99999-999', keepStatic: true});
        $('#doc').inputmask({
            mask: ['999.999.999-99', '99.999.999/9999-99'],
            keepStatic: true,
            showMaskOnHover: true
        });


        $(".save").on('click', function () {
            doAjax();
        });

        function doAjax() {

            // uf = $("#uf").val().replace(/\b\n/, "").replace('\n', "").replace(/\bSelecione/, "").replace('    ', '');
            nome = $("nome").val();
            email = $("email").val();
            doc = $("doc").val();
            cep = $("#cep option:selected").text();
            logradouro_id = $("#logra").val("");
            bairro_id = $("#bairro").val("");
            mun_id = $("#municipio").val("");
            uf = $("#uf option:selected").text();
            pais = $("#pais").val("");
            num_logra = $("#numero_logra").val();
            console.log('{{route('register.store')}}')
            ajaxcall('{{route('register.store')}}',
                {
                    nome: nome,
                    email: email,
                    doc: doc,
                    cep: cep,
                    logradouro_id: logradouro_id,
                    bairro_id: bairro_id,
                    mun_id: mun_id,
                    uf: uf,
                    pais: pais,
                    num_logra: num_logra

                },
                function (success) {
                },
                function (fail) {
                    return fail.msg;
                }
            );
        }

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
                            console.log(dados)
                            //Atualiza os campos com os valores da consulta.

                            $("#pais").append($('<option>', {
                                value: 1,
                                text: 'Brasil',
                            }, '</option>'));

                            $("#uf").append($('<option>', {
                                value: dados.uf,
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

                            $("#uf").val(dados.uf);
                            $("#municipio").val(1);
                            $("#bairro").val(1);
                            $("#logra").val(1);
                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep();
                            iziToast.show({
                                title: 'Falha!',
                                color: '#e5383b',
                                titleColor: "#FFF",
                                messageColor: "#FFF",
                                message: "CEP não encontrado.",
                                maxWidth: 600,
                                timeout: 6000,
                                icon: 'icon-material',
                                position: 'topRight'
                            });
                        }
                    });
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    iziToast.warning({
                        title: 'Falha!',
                        color: '#e5383b',
                        titleColor: "#FFF",
                        messageColor: "#FFF",
                        message: "Formato de CEP inválido.",
                        maxWidth: 600,
                        position: 'topRight'
                    });
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        });


    }); // DOCUMENT...

</script>
