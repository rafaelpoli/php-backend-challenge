<?php

namespace App;

class Conversor {
    public $simboloMoeda = array(
        'BRL' => 'R$',
        'USD' => 'USD',
        'EUR' => '€'
    );
    public $parts;
    public $amount; 
    public $from;
    public $to;
    public $rate;
    public $code;
    public $content;
    public $valorConvertido;

    function __contruct(array $parts){
        if( isset( $parts[2] )) $this->amount = $parts[2]; else $this->code = 400;
        if( isset( $parts[3] )) $this->from = $parts[3]; else $this->code = 400;
        if( isset( $parts[4] )) $this->to = $parts[4]; else $this->code = 400;
        if( isset( $parts[5] )) $this->rate = $parts[5]; else $this->code = 400;
        $this->validarDados();   
    }

    public function validarDados(){
        if(!is_numeric($this->amount) || !is_numeric($this->rate) || !ctype_upper($this->from) || !ctype_upper($this->to))
            $this->code = 400;
        if($this->amount < 0 || $this->rate < 0)
            $this->code = 400;
        if( $this->from != 'BRL' || $this->from != 'USD' || $this->from != 'EUR')
            $this->code = 400;
        if( $this->to != 'BRL' || $this->to != 'USD' || $this->to != 'EUR')
            $this->code = 400;        
        $this->converter();
    }

    public function converter() {
        $this->code = 200;
        $this->valorConvertido = $this->amount * $this->rate;
        $this->content = [ 'valorConvertido' => $this->valorConvertido, 'simboloMoeda' => $this->simbolos[ $this->to ]];
        return;
    }

    public function responseCode() {
        http_response_code( $this->code );
    }


    public function responseContent() {        
        header( 'Content-Type: application/json; charset=utf-8' );        
        echo json_encode( $this->content, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE );
    }


}

