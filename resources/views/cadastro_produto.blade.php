<html>
<head>
    <title>
    </title>
</head>

<body>
    <h1>Cadastro de produtos</h1>
    <form method="POST" action="{{route('produto_salvar')}}">
        @csrf
        <input type="text" name="nome"> 
        <input type="number" name="preco" step="0.01">
        <input type="submit"> 
    </form>
</body>
</html>