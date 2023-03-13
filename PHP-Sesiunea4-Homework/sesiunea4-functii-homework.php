<?php
/* 1.Construiti o functie care poate face urmatoarele calcule:
- adunare
- scadere
- inmultire
- intregul impartirii
- restul impartirii
- ridicare la putere
Functia trebuie sa poata primii 3 parametri, 2 parametri pentru efectuarea operatiei si unul pentru indicarea operatiei.
In cazul in care nu specificati operatia, functia trebuie sa faca standard operatia de adunare.
Nu sunt permise operatiile cu numere negative, sau impartirea/inmultirea/modulo cu 0.
Functia trebuie sa returneze rezultatul operatiei.
Parametrii si return value trebuie sa aiba tipul de data restrictionat.
Aratati pe ecran rezultatul operatiei pentru fiecare caz. */

function operation(int $param1, int $param2, string $operation = "addition")
{
  if ($param1 > 0 && $param2 > 0) {
    switch ($operation) {
      case "addition":
        $myOperation = $param1 + $param2;
        break;

      case "substraction":
        $myOperation = $param1 - $param2;
        break;

      case "multiplication":
        $myOperation = $param1 * $param2;
        break;

      case "division":
        $myOperation = intval($param1 / $param2);
        break;

      case "modulus":
        $myOperation = $param1 % $param2;
        break;

      case "exponentiation":
        $myOperation = $param1 ** $param2;
        break;

      default:
        $myOperation = $param1 + $param2;
    }

    return $myOperation;
  } else {
    echo "Va rugam sa introduceti doar numere intregi, mai mari decat 0.";
  }
}

echo "Rezultatul adunarii este " . operation(1, 3, "addition") . ".<br>";
echo "Rezultatul scaderii este " . operation(1, 3, "substraction") . ".<br>";
echo "Rezultatul inmultirii este " .
  operation(1, 3, "multiplication") .
  ".<br>";
echo "Intregul impartirii este " . operation(1, 3, "division") . ".<br>";
echo "Restul impartirii este " . operation(1, 3, "modulus") . ".<br>";
echo "Rezultatul ridicarii la putere este este " .
  operation(1, 3, "exponentiation") .
  ".<br>";
echo "Operatia default este " . operation(1, 3) . ".<br>";
operation(-1, 3) . ".<br>";

// nu am restrictionat return value deoarece primeam eroare la else, iar avand in vedere faptul ca param1 si param2 sunt de tip int, automat si myOperation e de tip int.

/* 2.Construiti o functie care poate calcula:
 - adunare
 - scadere
 - inmultire
 - ridicare la putere
toate numerele de tip int sau float din interiorul unui arrray cu mai multe tipuri de date.
ex: array(1,12.3,7,'mere', true, -9, 8.2, 'pere', 0);
Functia trebuie sa primeasca un singur parametru, restrictionat ca array si sa returneze o valoare corespunzatoare cu rezultatul predictibil.
Pentru verificarea tipului de data al fiecarui element in parte din array folositi: https://www.w3schools.com/php/func_var_gettype.asp
Functia gettype($valoareDeVerificat) --> returneaza tipul de data al valorii date ca parametru.
Functia nu trebuie sa permita operatii cu 0, insa permite operatii cu numere negative. */

function arrayOperation(array $myArray)
{
  $addition = 0;
  $substraction = 0;
  $multiplication = 1;

  foreach ($myArray as $element) {
    $elementType = gettype($element);

    if ($elementType === "integer" || $elementType === "double") {
      if ($element != 0) {
        $addition += $element;
        $substraction -= $element;
        $multiplication *= $element;
      }
    }
  }
  $operation = [$addition, $substraction, $multiplication];

  return $operation;
}

echo "<br>" . implode(",", arrayOperation([2, 3, "pisica", 3.4, -5, true]));
// nu am adaugat si operatia de ridicare la putere pentru ca nu stiam exact de unde sa incep calculul
?>
