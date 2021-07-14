<?php
require_once 'Marca.php';
require_once 'Categoria.php';
require_once 'Pessoa.php';
require_once 'Produto.php';
require_once 'Pedido.php';

echo "<div id='container' style='display:flex; width:90%; margin: 0px 60px;' > ";
echo "<div id='espacamento' style='flex-direction: row; width:50%;'>";
echo "<h4>Marca</h4>";
Marca::PegarMarca();
Marca::MostrarMarcaNaTela();
echo "<h4>Categoria</h4>";
Categoria::PegarCategoria();
Categoria::MostrarCategoriaNaTela();
echo "<h4>Pessoa</h4>";
Pessoa::PegarPessoa();
Pessoa::MostrarPessoaNaTela();
echo "<h4>Produto</h4>";
Produto::PegarProduto();
Produto::MostrarProdutoNaTela();
echo "<h4>Pedido</h4>";
Pedido::PegarPedido();
Pedido::MostrarPedidoNaTela();
echo "</div>";
echo "<div id='espacamento' style='flex-direction: row; width:50%; margin: 0px 60px;'>";
echo "<form method='post' action='salvarCliente.php'>
    <fieldset id=borda>
        <label for='id_uni'>Id Unitario: </label>
        <br />
        <input type='text' name='cpf' id='cpf' class='campo1' />
        <br />
        <label for='name'>Nome do cliente:</label>
        <br />
        <input type='text' name='nome' id='nome' />
        <br />
        <label for='name'>Nome do cliente:</label>
        <br />
        <input type='text' name='nome' id='nome' />
        <br />
        <label for='name'>Nome do cliente:</label>
        <br />
        <input type='text' name='nome' id='nome' />
        <br />
        <label for='name'>Nome do cliente:</label>
        <br />
        <input type='text' name='nome' id='nome' />
        <br />
        <label for='name'>Nome do cliente:</label>
        <br />
        <input type='text' name='nome' id='nome' />
        <br />
        <br />
        <button class='submit' style='color: white; margin: 10px; padding: 10px; background: blue;'>
            Enviar
        </button>
    </fieldset>
</form>";
echo "</div>";
Pedido::EnviarPedidoNaTela("ola");


