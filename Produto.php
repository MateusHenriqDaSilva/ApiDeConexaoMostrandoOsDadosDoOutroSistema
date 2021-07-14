<?php
require_once 'Token.php';
class Produto
{
    public static $resultadoProduto;

    public static function PegarProduto()
    {
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => 'https://testeonline.adiantibuilder.com.br/60df5205baa88/e_soft/Produto/',
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . Token::pegarToken(),
                'Content-Type: application/json',
                'x-li-format: json'
            ],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_PROTOCOLS => CURLPROTO_HTTPS
        ]);
        self::$resultadoProduto = curl_exec($ch);
        curl_close($ch);
    }

    public static function MostrarProdutoNaTela()
    {
        $decodificar = json_decode(self::$resultadoProduto, true);
        $todasProdutos = count($decodificar);
        echo "<div class='select'>";
        echo "<select name='tipoBeneficiario'>";
        for ($contador = 0; $contador < $todasProdutos; $contador++) {
            echo "<option value='" . $decodificar["data"][$contador]["id"] . "'>". $decodificar["data"][$contador]["id"] . " - " . $decodificar["data"][$contador]["nome"] ."</option>";
        }
        echo "</select>";
        echo "</div>";
    }
}
