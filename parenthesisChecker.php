<?php

class parenthesisChecker
{
    protected $string;

    public function __construct( $string )
    {
        $this->string = $string;

        $this->checkString();
    }

    private function checkString() 
    {
        if ( ! $this->isGoodOrder() ) {
            throw new Exception("Exception Mismatched Parenthesis");     
        }

        if ( ! $this->isSameNumberOfParenthesis() ) {
            throw new Exception("Exception Mismatched Parenthesis");     
        }


        echo "\nSuccessful\n";
        return true;
    }

    private function isGoodOrder()
    {
        $firstOpen = strpos($this->string, '(');
        $firstClose = strpos($this->string, ')');

        if ( empty($firstOpen) xor empty($firstClose) ) {
            return false;
        }

        return ( $firstOpen < $firstClose ) ? true : false;
    }

    private function isSameNumberOfParenthesis()
    {
        $count_open = substr_count($this->string, "(");
        $count_close = substr_count($this->string, ")");

        return ( $count_open == $count_close ) ? true : false;
    }
}

try 
{
    $parenthesisChecker = new parenthesisChecker("Hola(prueba)(parentesis)");
} 
catch ( Exception $e )
{
    echo $e->getMessage();
}

?>