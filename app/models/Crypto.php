<?php

class Crypto {
    
    protected $string;
    protected $alpha;
    
    public function __construct( $string ) {
        $this->string = strtolower( $string );
        $this->alpha = range('A', 'Z');
        return $this;
    }
    
    public function encrypt()
    {
        $new_alphas = $this->scramble($this->alpha);
        for ( $i = 0; $i < 26; $i++ ) {
            $ol = $this->alpha[$i];
            $this->string = str_replace( strtolower($ol), $new_alphas[$i], $this->string );            
        }

        return $this->string;
    }

    private function scramble($alphas)
    {
        shuffle($alphas);
    
        return $alphas;
    }
        
    public function formatted()
    {
        $string = $this->encrypt();
        $str_mod = str_split( $string ); 
        $output = '<div class="wrapper"><div class="word-wrapper">';
        $i = 0;
        foreach ( $str_mod as $s ) {
            if ( ctype_alpha( $s ) ) {
                $output .= '<div class="letter-wrapper"><div><input type="text" name="crypto['.$i.']" '
                        . 'id="crypto_'.$i.'" class="inp_'.$s.' cclass" tabindex="'.($i+1).'"/></div>'.$s.'</div>';
                $i++;
            } elseif ( $s == ' ') {
                $output .= '</div><div class="word-wrapper">';
            } else {
                $output .= '<div class="letter-wrapper"><div>'.$s.'</div>'.$s.'</div>';
            }
        }
        $output .= '</div></div>';
        return $output;
    }
}