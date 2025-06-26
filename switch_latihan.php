<?php
$ukuran_baju = "M"; // Ganti dengan "S", "M", "L", atau "XL"

switch ($ukuran_baju) {
    case "S":
        echo "Ukuran baju Anda Small.";
        break;
    case "M":
        echo "Ukuran baju Anda Medium.";
        break;
    case "L":
        echo "Ukuran baju Anda Large.";
        break;
    case "XL":
        echo "Ukuran baju Anda Extra Large.";
        break;
    default:
        echo "Ukuran baju tidak tersedia.";
}
?>
