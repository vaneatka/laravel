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