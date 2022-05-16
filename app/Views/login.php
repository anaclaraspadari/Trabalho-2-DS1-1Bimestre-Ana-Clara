<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<div class="container" style="margin-top: 50px">
    <center><h1 style="color: green">TopGames - Artigos de Jogos</h1></center>
</div>
<div class="container" style="margin-top: 20px">
    <center><h3 style="color: green">Login</h3></center>
</div>
<div id="login">
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <form id="login-form" class="form" action="<?php echo base_url()?>/loginuser" method="post">
                            <div class="form-group">
                                <label for="email" style="color: green">E-mail:</label><br>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" style="color: green">Senha:</label><br>
                                <input type="password" name="senha" id="senha" class="form-control">
                            </div>
                            <div id="register-link">
                                <center><a href="<?php echo base_url()?>/registration" style="color: green">Não tem uma conta? Registre-se aqui!</a></center>
                            </div>
                            <div class="form-group">
                                <center><input type="submit" name="submit" class="btn btn-success btn-md" style="margin-top: 10px;" value="Entrar"></center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>