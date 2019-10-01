<?php

trait SelamatPagi {

    public function selamatPagi() {
        return "Selamat pagi ?" . PHP_EOL;
    }

}

trait Sapaan {

    public function sapaan() {
        return "selamat datang di toko kami";
    }
}

class Pesan {

    // menggunakan trait lebih dari satu
    use SelamatPagi, 
        Sapaan;
}

// $salam = new Pesan();
// echo $salam->selamatPagi();
// echo $salam->sapaan();


