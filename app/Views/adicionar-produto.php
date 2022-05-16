<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<div class="container" style="margin-top: 50px">
    <center><h1 style="color: green">TopGames - Artigos de Jogos</h1></center>
</div>
<div class="container" style="margin-top:30px">
    <center><h3 style="color: green; margin-top: 5px">Cadastro de Produtos</h3></center>
</div>
<div id="login" style="margin-top: 50px">
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <form id="cadastro-produto-form" class="form" action="/" method="post">
                        <div class="form-group">
                            <label for="nome-produto">Nome do Produto:</label>
                            <input type="text" class="form-control" id="nome-produto" name="nome"/>
                        </div>
                        <div class="form-group">
                            <label for="descricao-produto">Preço do Produto:</label>
                            <input type="text" class="form-control" id="preco-produto" name="preco"/>
                       </div>
                        <div class="form-group">
                            <label for="descricao-produto">Descrição do Produto:</label>
                            <input type="text" class="form-control" id="descricao-produto" name="descricao"/>
                       </div>
                        <div class="form-group">
                        <label for="tipo-produto">Tipo do Produto:</label>
                            <select name="tipo_produto" id="tipo-produto" class="form-control">
                                <option>Xicaras</option>
                                <option>Camisetas</option>
                                <option>Acessórios</option>
                                <option>Consoles</option>
                                <option>Games</option>
                                <option>Miniaturas</option>
                                <option>Posters</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <br/>
                            <center><input type="submit" name="submit" class="btn btn-success btn-md" style="margin-top: 10px;" value="Cadastrar Produto"/></center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>