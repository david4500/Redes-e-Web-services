<html>

<head>

<title></title>

</head>

<body>
    <form method="post" action="{{ route('passo1') }}">
        @csrf
        <input type="text" name="nome" placeholder="Nome" autocomplete="off" required><br>
        <input type="number" name="cep" minlength="9" maxlength="9" placeholder="CEP" autocomplete="off" required><br>
        
        
        <input type="submit">
    </form>
</body>

</html>