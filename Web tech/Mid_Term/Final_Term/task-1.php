    <?php
    // Rectangle calculations
    $length = 20;
    $width = 10;
    echo "the area of the rectangle is " . ($length * $width);
    echo "<br>";
    echo "the perimeer of the rectangle is " . (2 * ($length + $width));

    // VAT calculation
    $vat = 0.15;
    $amount = 10000;
    echo "<br>";
    echo "vat of 10000 is " . ($vat * $amount);

    // Check if number is even or odd
    $number = 21;
    echo "<br>";

    if ($number % 2 == 0) {
        echo "{$number} is an even number";
    } else {
        echo "{$number} is an odd number";
    }

    // Find largest number
    $n1 = 5;
    $n2 = 1;
    $n3 = 57;
    echo "<br>";

    if ($n1 > $n2 && $n1 > $n3) {
        echo "large num {$n1}";
    } elseif ($n2 > $n1 && $n2 > $n3) {
        echo "large num {$n2}";
    } else {
        echo "large num {$n3}";
    }
    echo "<br>";

    // Print even numbers from 10 to 100
    for ($n = 10; $n < 101; $n++) {
        if ($n % 2 == 0) {
            echo "{$n},";
        }
    }

    // Search for 51 in array
    $arr = [2, 4, 51, 4, 6];
    echo "<br>";

    for ($i = 0; $i < 5; $i++) {
        if ($arr[$i] === 51) {
            echo "51 found at index {$i}";
        }
    }
    echo "<br>";
    echo '<br>';

    // Print star pattern (increasing)
    $c = 1;
    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < $c; $j++) {
            echo "*";
        }
        $c++;
        echo "<br>";
    }

    echo "<br>";

    // Print number pattern (decreasing)
    $c1 = 3;
    for ($i1 = 0; $i1 < 3; $i1++) {
        for ($j1 = 0; $j1 < $c1; $j1++) {
            echo ($j1 + 1);
        }
        $c1--;
        echo "<br>";
    }

    echo "<br>";

    // Print letter pattern (increasing)
    $c3 = 1;
    $char = 65;
    for ($i1 = 0; $i1 < 3; $i1++) {
        for ($j1 = 0; $j1 < $c3; $j1++) {
            echo (chr($char));
            $char++;
        }
        $c3++;
        echo "<br>";
    }

    echo '<br>';

    // 2D array patterns
    $arr = [
        [1, 2, 3, 'A'],
        [1, 2, 'B', 'C'],
        [1, 'D', 'E', 'F']
    ];

    // Print left triangle from 2D array
    $a = 3;
    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < $a; $j++) {
            echo $arr[$i][$j];
        }
        $a--;
        echo '<br>';
    }
    echo '<br>';

    // Print right triangle from 2D array
    $a = 3;
    for ($k = 0; $k < 3; $k++) {
        for ($l = $a; $l < 4; $l++) {
            echo $arr[$k][$l];
        }
        $a--;
        echo '<br>';
    }

    ?>
