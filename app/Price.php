<?php 
    namespace App;

    use App\Currency;

    class Price {
        public $value;
        public $currency;
        
        public function __construct(float $value, Currency $currency)
        {
            $this->value = $value;
            $this->currency = $currency;
        }

        
        public function getValue() : float
        {
                return $this->value;
        }

       
        public function setValue(float $value)
        {
                $this->value = $value;

                return $this;
        }

        
        public function getCurrency()
        {
                return $this->currency;
        }

      
        public function setCurrency(Currency $currency)
        {
                $this->currency = $currency;

                return $this;
        }
    }
