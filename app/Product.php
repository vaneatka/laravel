<?php 
    namespace App;
    
    use Illuminate\Support\Collection;
    use App\Price;

    class Product {
      public  $name;
      public  $image;
      public  $price;
        public function __construct(string $name, string $image, Price $price)
        {
            $this->name =setName($name) ;
            $this->image =collect(setImage($image)) ;
            $this->price =setPrice($price) ;
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

   
      public function getImage()
      {
            return $this->image;
      }

    
      public function setImage($image)
      {
            $this->image = $image;

            return $this;
      }

      public function addImage($image)
      {
            $this->image->push($image);
            return $this;
      }

      public function getMainImage(){
            return $this->image->first();
      }

     
      public function getPrice()
      {
            return $this->price;
      }

     
      public function setPrice($price)
      {
            $this->price = $price;

            return $this;
      }
    }