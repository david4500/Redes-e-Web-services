<html>

<head>

<title></title>

</head>

<body>
    <form method="post" action="{{ route('cadastro_final') }}">
        @csrf
        <input type="text" placeholder="Nome" autocomplete="off" value="{{ $nome}}" required disabled><br>
        <input type="number" minlength="9" maxlength="9" placeholder="CEP" autocomplete="off" value="{{ $cep}}" required disabled><br>
        <hr>

        <input type="hidden" name="nome" value="{{ $nome}}">
        <input type="hidden" name="cep" value="{{ $cep}}">

        <input type="text" name="logradouro" placeholder="Logradouro" autocomplete="off" value = "{{$logradouro}}"><br>
        <input type="text" name="complemento" placeholder="Complemento" autocomplete="off" value="{{ $complemento}}"><br>
        <input type="text" name="bairro" placeholder="Bairro" autocomplete="off" value="{{ $bairro}}"><br>
        <input type="text" name="cidade" placeholder="Cidade" autocomplete="off"  value="{{ $cidade}}"><br>
        <input type="text" name="estado" placeholder="Estado" autocomplete="off" value="{{ $estado}}"><br>
        <hr>

        <input type="submit">
    </form>
</body>

</html>