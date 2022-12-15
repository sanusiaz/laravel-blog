<?php
    namespace App\Http\Service;

    class ValidatorService {

        protected $data;

        public function __construct(array $data = [])
        {
            $this->data = $data;
        }


        protected static function __patterns()
        {
            return [
                "password" => '/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/'
            ];
        }


      
        public static function __validatePassword(int $maxB, string $value) : bool
        {
            if ( strlen($value) >= $maxB 
                && preg_match( self::__patterns()['password'] ,$value) )
            {
                return true;
            }
            
            return false;
        }
    }
