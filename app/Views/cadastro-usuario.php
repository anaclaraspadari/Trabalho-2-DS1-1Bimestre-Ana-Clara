<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<div class="container" style="margin-top: 50px">
    <center><h1 style="color: green">TopGames - Artigos de Jogos</h1></center>
</div>
<div class="container" style="margin-top: 20px">
    <center><h3 style="color: green">Cadastro de Usuario</h3></center>
</div>
<div id="cadastro">
        <div class="container"  style="margin-top: 20px">
            <div id="cadastro-row" class="row justify-content-center align-items-center">
                <div id="cadastro-column" class="col-md-6">
                    <div id="cadastro-box" class="col-md-12">
                        <form id="cadastro-usuario-form" class="form" action="/" method="post">
                            <div class="form-group">
                                <label for="nome" style="color: green">Nome do Usuario:</label><br>
                                <input type="text" name="nome" id="nome" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email" style="color: green">E-mail:</label><br>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" style="color: green">Senha:</label><br>
                                <input type="password" name="senha" id="senha" class="form-control">
                            </div>
                            <div class="form-group">
                                <center><input type="submit" name="submit" class="btn btn-success btn-md" style="margin-top: 10px;" value="Cadastrar"></center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>