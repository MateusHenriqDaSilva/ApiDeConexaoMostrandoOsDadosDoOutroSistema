<?php
require_once 'Token.php';
class Pedido
{
    public static $resultadoPedido;
    public static function PegarPedido()
    {
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => 'https://testeonline.adiantibuilder.com.br/60df5205baa88/e_soft/Pedido/',
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . Token::pegarToken(),
                'Content-Type: application/json',
                'x-li-format: json'
            ],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_PROTOCOLS => CURLPROTO_HTTPS
        ]);
        self::$resultadoPedido = curl_exec($ch);
        curl_close($ch);
    }

    public static function MostrarPedidoNaTela()
    {
        $decodificar = json_decode(self::$resultadoPedido, true);
        $totalPedido = count($decodificar["data"]);
        echo "<div id='cabecalho' style='background:blue; width:400px; color:white'>";
        echo "<b style='padding: 20px'>ID</b>";
        echo "<b style='padding: 20px'>Data</b>";
        echo "<b style='padding: 20px'>Cliente</b>";
        echo "<b style='padding: 20px'>Vendedor</b>";
        echo "<b style='padding: 20px'>Total</b>";
        echo "</div>";
        echo "<div id='corpo' width:400px;>";
        for ($contador = 0; $contador < $totalPedido; $contador++) {
            echo "<i style='padding: 20px'>" . $decodificar["data"][$contador]["id"] . "</b>";
            echo "<i style='padding: 30px'>" . $decodificar["data"][$contador]["dt_venda"] . "</b>";
            echo "<i style='padding: 40px'>" . $decodificar["data"][$contador]["pessoa_id"] . "</b>";
            echo "<i style='padding: 90px'>" . $decodificar["data"][$contador]["vendedor_id"] . "</b>";
            echo "<i style='padding: 70px'>" . $decodificar["data"][$contador]["valor_total_venda"] . "</b>";
            echo "<br/>";
        }
        echo "</div>";
    }
    public static function EnviarPedidoNaTela($param)
    {
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => 'https://testeonline.adiantibuilder.com.br/60df5205baa88/e_soft/pedido/?id&system_unit_id=1&lt_unidade_id=1&status_venda_id=3&origem_venda_id=1&pessoa_id=1&vendedor_id=2&natureza_operacao_id=1&status_dfe&created_at&update_at&dt_venda&codigo_interno&valor_total_venda=1000&mes=06&ano=2021&valor_subtotal=1000',
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . Token::pegarToken(),
                'Content-Type: application/json',
                'x-li-format: json'
            ],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_PROTOCOLS => CURLPROTO_HTTPS
        ]);
        self::$resultadoPedido = curl_exec($ch);
        curl_close($ch);
    }
}
