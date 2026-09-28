<?php
// =============================================
// PHP: Funkcje - zadania
// technikprogramista.pl
// =============================================

// 1. SUMA - obliczy i wyświetli sumę 2 liczb całkowitych
function SUMA($a, $b) {
    $wynik = $a + $b;
    echo "Suma: $wynik";
}

// 2. PODSTAWY - obliczy różnicę, iloczyn i iloraz 2 liczb
function PODSTAWY($a, $b) {
    $roznica = $a - $b;
    $iloczyn = $a * $b;
    if ($b != 0) {
        $iloraz = $a / $b;
        echo "Różnica: $roznica, Iloczyn: $iloczyn, Iloraz: $iloraz";
    } else {
        echo "Różnica: $roznica, Iloczyn: $iloczyn, Iloraz: dzielenie przez zero!";
    }
}

// 3. KALKULATOR - oblicza wybrane działanie i umieszcza wynik w kontenerze #wynik
function KALKULATOR($a, $b, $dzialanie) {
    switch ($dzialanie) {
        case 'suma':
            $wynik = $a + $b;
            break;
        case 'roznica':
            $wynik = $a - $b;
            break;
        case 'iloczyn':
            $wynik = $a * $b;
            break;
        case 'iloraz':
            if ($b != 0) {
                $wynik = $a / $b;
            } else {
                $wynik = "Dzielenie przez zero!";
            }
            break;
        default:
            $wynik = "Nieznane działanie";
    }
    echo "<div id='wynik'>$wynik</div>";
}

// 4. MAKS - wypisze największą spośród 3 liczb
function MAKS($a, $b, $c) {
    $maks = $a;
    if ($b > $maks) $maks = $b;
    if ($c > $maks) $maks = $c;
    echo "Największa liczba: $maks";
}

// 5. WZROST - klasyfikuje wzrost do kategorii
function WZROST($wzrost) {
    if ($wzrost < 150) {
        echo "Wzrost: niski";
    } elseif ($wzrost > 180) {
        echo "Wzrost: wysoki";
    } else {
        echo "Wzrost: średni";
    }
}

// 6. BMI - oblicza BMI i wyświetla komentarz
function BMI($wzrost_cm, $waga_kg) {
    $wzrost_m = $wzrost_cm / 100;
    $bmi = $waga_kg / ($wzrost_m * $wzrost_m);
    $bmi = round($bmi, 2);
    if ($bmi < 18.5) {
        $komentarz = "za mało!";
    } elseif ($bmi > 25) {
        $komentarz = "za dużo!";
    } else {
        $komentarz = "OK!";
    }
    echo "<div id='wynik'>BMI: $bmi - $komentarz</div>";
}

// 7. STARSZY - porównuje daty urodzenia dwóch osób
function STARSZY($data1, $data2) {
    $osoba1 = strtotime($data1);
    $osoba2 = strtotime($data2);
    if ($osoba1 < $osoba2) {
        echo "Osoba 1 jest starsza";
    } elseif ($osoba2 < $osoba1) {
        echo "Osoba 2 jest starsza";
    } else {
        echo "Obie osoby są w tym samym wieku";
    }
}

// 8. PRZESTĘPNY - sprawdza czy rok jest przestępny
function PRZESTĘPNY($rok) {
    if (($rok % 4 == 0 && $rok % 100 != 0) || ($rok % 400 == 0)) {
        echo "Rok $rok jest przestępny";
    } else {
        echo "Rok $rok nie jest przestępny";
    }
}

// 9. SIŁA - ocenia siłę hasła
function SIŁA($haslo) {
    $dlugosc = strlen($haslo);

    if ($dlugosc <= 4) {
        echo "Hasło słabe (za krótkie - do 4 znaków)";
        return;
    }

    if (!preg_match('/[0-9]/', $haslo)) {
        echo "Hasło słabe (brak cyfry)";
        return;
    }

    if (!preg_match('/[A-Z]/', $haslo)) {
        echo "Hasło słabe (brak dużej litery)";
        return;
    }

    if (!preg_match('/[a-z]/', $haslo)) {
        echo "Hasło słabe (brak małej litery)";
        return;
    }

    if (!preg_match('/[^a-zA-Z0-9]/', $haslo)) {
        echo "Hasło słabe (brak znaku specjalnego)";
        return;
    }

    if ($dlugosc <= 8) {
        echo "Hasło średnie";
    } else {
        echo "Hasło mocne";
    }
}

// 10. TROJKAT - sprawdza czy z 3 boków można zbudować trójkąt
function TROJKAT($a, $b, $c) {
    if ($a + $b > $c && $a + $c > $b && $b + $c > $a) {
        echo "Z podanych boków można zbudować trójkąt";
    } else {
        echo "Z podanych boków NIE można zbudować trójkąta";
    }
}

// 11. SZYFR - szyfruje tekst przesunięciem o 2 w alfabecie
function SZYFR($tekst) {
    $wynik = '';
    $alfabet = 'abcdefghijklmnopqrstuvwxyz';
    for ($i = 0; $i < strlen($tekst); $i++) {
        $znak = $tekst[$i];
        $pozycja = strpos($alfabet, strtolower($znak));
        if ($pozycja !== false) {
            $nowa_pozycja = ($pozycja + 2) % 26;
            $nowy_znak = $alfabet[$nowa_pozycja];
            if (ctype_upper($znak)) {
                $nowy_znak = strtoupper($nowy_znak);
            }
            $wynik .= $nowy_znak;
        } else {
            $wynik .= $znak;
        }
    }
    echo "Zaszyfrowany tekst: $wynik";
}

// =============================================
// PRZYKŁADOWE WYWOŁANIA
// =============================================

echo "=== 1. SUMA ===\n";
SUMA(5, 3);
echo "\n\n";

echo "=== 2. PODSTAWY ===\n";
PODSTAWY(10, 2);
echo "\n\n";

echo "=== 3. KALKULATOR ===\n";
KALKULATOR(8, 4, 'suma');
echo "\n\n";

echo "=== 4. MAKS ===\n";
MAKS(3, 7, 5);
echo "\n\n";

echo "=== 5. WZROST ===\n";
WZROST(175);
echo "\n\n";

echo "=== 6. BMI ===\n";
BMI(175, 70);
echo "\n\n";

echo "=== 7. STARSZY ===\n";
STARSZY('1990-05-10', '1985-03-22');
echo "\n\n";

echo "=== 8. PRZESTĘPNY ===\n";
PRZESTĘPNY(2024);
echo "\n\n";

echo "=== 9. SIŁA ===\n";
SIŁA('Haslo1!');
echo "\n\n";

echo "=== 10. TROJKAT ===\n";
TROJKAT(3, 4, 5);
echo "\n\n";

echo "=== 11. SZYFR ===\n";
SZYFR('abc');
echo "\n";
