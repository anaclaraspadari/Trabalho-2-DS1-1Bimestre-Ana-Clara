<div class="container" style="margin-top: 40px">
    <div style="text-align: right">
        <a href="#" role="button" class="btn btn-sm btn-success">Voltar</a>
    </div>
    <h3>Lista de Produtos - Administrador</h3>
    <br/>
    <a href="#" role="button" class="btn btn-sm btn-success">Adicionar Categoria</a>
    <a href="#" role="button" class="btn btn-sm btn-success">Adicionar Produto</a>
    <a href="#" role="button" class="btn btn-sm btn-success">Editar Produto</a>
    <a href="#" role="button" class="btn btn-sm btn-success">Excluir Produto</a>
    <br/>
    <h3>Tabela de Pedidos</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome do Produto</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Comprador</th>
                <th scope="col">E-mail</th>
            </tr>
        </thead>
        <?php
    
            $sql="SELECT produto.nome as nome_do_produto, pedido.quantidade, usuario.nome as comprador, usuario.email from produto
            join pedido on pedido.produto=produto.id_produto
            join usuario on pedido.usuario=usuario.email;";
            $busca=mysqli_query($conexao,$sql);
            while($array = mysqli_fetch_array($busca)){
                $nome_do_produto = $array['nome_do_produto'];
                $quantidade = $array['quantidade'];
                $comprador = $array['comprador'];
                $email = $array['email'];
        ?>
        <tr>
            <td> <?php echo $nome_do_produto ?></td>
            <td> <?php echo $quantidade ?></td>
            <td> <?php echo $comprador ?></td>
            <td> <?php echo $email ?></td>
        </tr>
        <?php 
            }
        ?>
    </table>
</div>