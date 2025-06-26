<?php
$umur = 18;
$sudah_punya_sim = true; // Ubah menjadi true agar kondisi terpenuhi

if ($umur >= 17 && $sudah_punya_sim == true) {
    echo "Anda boleh mengemudi.";
} else {
    echo "Anda tidak boleh mengemudi.";
}
?>
