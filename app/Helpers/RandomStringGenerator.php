<?php
    /**
     * RANDOM NUMBER(S) GENERATOR HELPER
     */
    if(!function_exists('GenerateRandom'))
    {
        function GenerateRandom($length=18)
        {
            $chars = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
            
            $chars_length = ( strlen($chars) - 1 );
            $string = str_shuffle( $chars [ rand( 0, $chars_length ) ] );
    
            for ( $i = 1; $i < $length; $i = strlen( $string ) ) 
            { 
                $r = $chars[ rand(0, $chars_length ) ];
                if ($r != $string[$i - 1]) $string .= $r;
            }
    
            return $string;
        }
    }