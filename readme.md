de creat controller pentru currencies care are ruta currencies/import -> CurrencyController@import
de adaugat in model, coeficientul de schimb
https://packagist.org/packages/fadion/fixerio
sa umple baza de date de pe fixer.io



\ Currency---> Rates(Hasmany)-> currency rate

\ Currency----> currency(belongsTo) <--- Currencyrate

$c1-rates - incarca datele
$c1-rates() - incarca obiectul relatiei


ajustati migratiile pentru price product

Produs -> Preturi -> currencies -> rate

\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

1 hw 12 august

asemenator la telefon de adaugat
    email
    social+tipul retelei

CSRF - cross site request forgery protectie de boti @csrf

hw 16 august//


/admin/subscribers

    -> admin\clientCOntroller@subscribers
        ->views/admin/subscribers.blade.php
            +paginator(laravel)
            -TABLE(bootstrapp)
                ->email | created


hw 19 august//

BS 4 Accordion example 
categoria-> collapse subcategorie

// Cart logic
  - ServiceProvider
  - Session
  - Model 'cart' +relations

  Price-> product_id -> Product
  ??? ne trebuie Price-> ???-> Cart


  -separate CartServiceProvider + autoload
    - daca apar erori, cache:clear
  -boot -> only web( not for artisan)
        -only for some routes
  -Session Usage
  -> session <-> Cart <-> current user

  cream un middleware pentru a citi cosul din sesiune CartMiddleware



  1 punct, de integrat in layout + bootstrapp
  2. din json obtinut din charge, de extras starea, si de afisat mesajul(succes sau ba)
      daca tranzactia a fost cu succes, cosul care este al userului tre de setat achitat.(paid)
      de adaugat un filtru la cartMiddleware, asa incit sa se afiseze doar cart cu status open.(atentie la id din sesiune)

      pina sa trimitem cererea de achitare, suma si curency tre de scos din totalPrice, sa se adaoge automat % luat la tranzactie