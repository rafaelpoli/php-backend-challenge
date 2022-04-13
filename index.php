<?php
/**
 * Back-end Challenge.
 * 
 * Nome do candidato: Rafael Poli <rafaelpoli@gmail.com>
 *
 * PHP version 7.2
 *
 * Este será o arquivo chamado na execução dos testes automátizados.
 *
 * @category Challenge
 * @package  Back-end
 * @author   Seu Nome <seu-email@seu-provedor.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     https://github.com/apiki/back-end-challenge
 */
declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use \App\Conversao;

$request = rtrim( $_SERVER['REQUEST_URI'], "/" );
$parts = explode( "/", $request );
$conversao = new Conversao($parts);

$conversao->responseCode();
$conversao->responseContent();



