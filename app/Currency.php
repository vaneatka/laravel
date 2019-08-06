<?php 
    namespace App;
    class Currency {
        public $name;
        public $code;

        public function __construct(string $name, string $code)
        {
            $this->name = $name;
            $this->code = $code;
        }
        

        public function getCode()
        {
                return $this->code;
        }


        public function setCode($code)
        {
                $this->code = $code;

                return $this;
        }


        public function getName()
        {
                return $this->name;
        }


        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }
    }