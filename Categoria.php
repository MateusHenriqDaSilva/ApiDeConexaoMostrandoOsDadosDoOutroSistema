<?php
require_once 'Token.php';
class Categoria
{
    public static $resultadoCategoria;
    public static $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyIjoiYWRtaW4iLCJ1c2VyaWQiOjEsInVzZXJuYW1lIjoiQWRtaW5pc3RyYXRvciIsInVzZXJtYWlsIjoiYWRtaW5AYWRtaW4ubmV0IiwiZXhwaXJlcyI6MTYyNTc3ODQzNn0.3aUydcLRrxZGmsVQGV2hsB2kPOR8ReVadYz_3DCfbMU";

    public static function PegarCategoria()
    {
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => 'https://testeonline.adiantibuilder.com.br/60df5205baa88/e_soft/categoria/',
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . Token::pegarToken(),
                'Content-Type: application/json',
                'x-li-format: json'
            ],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_PROTOCOLS => CURLPROTO_HTTPS
        ]);
        self::$resultadoCategoria = curl_exec($ch);
        curl_close($ch);
    }

    public static function MostrarCategoriaNaTela()
    {
        $decodificar = json_decode(self::$resultadoCategoria, true);
        $todasCategorias = count($decodificar["data"]);
        echo "<div class='select'>";
        echo "<select name='tipoBeneficiario'>";
        for ($contador = 0; $contador < $todasCategorias; $contador++) {
            echo "<option value='" . $decodificar["data"][$contador]["id"] . "'>" . $decodificar["data"][$contador]["id"] . " - " . $decodificar["data"][$contador]["nome"] . "</option>";
        }
        echo "</select>";
        echo "</div>";
    }
}
