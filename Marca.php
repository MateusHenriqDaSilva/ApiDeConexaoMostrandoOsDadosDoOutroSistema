<?php
require_once 'Token.php';
class Marca
{
    public static $resultadoMarca;

    public static function PegarMarca()
    {
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => 'https://testeonline.adiantibuilder.com.br/60df5205baa88/e_soft/marca/',
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . Token::pegarToken(),
                'Content-Type: application/json',
                'x-li-format: json'
            ],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_PROTOCOLS => CURLPROTO_HTTPS
        ]);
        self::$resultadoMarca = curl_exec($ch);
        curl_close($ch);
    }

    public static function MostrarMarcaNaTela()
    {
        $decodificar = json_decode(self::$resultadoMarca, true);
        $todasMarcas = count($decodificar["data"]);
        echo "<div class='select'>";
        echo "<select name='tipoBeneficiario'>";
        for ($contador = 0; $contador < $todasMarcas; $contador++) {
            echo "<option value='" . $decodificar["data"][$contador]["id"] . "'>" . $decodificar["data"][$contador]["id"] . " - " . $decodificar["data"][$contador]["nome"] . "</option>";
        }
        echo "</select>";
        echo "</div>";
    }
}
