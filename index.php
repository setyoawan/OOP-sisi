<?php 

//autoload
//spl_autoload_register();
require 'alamat.php';
require 'salam.php';


//public bisa diakses oleh semua 
//protected hanya bisa diakses oleh kelas itu sendiri dan child
//private hanya bisa diakses oleh kelas tertentu aja


interface infoProduk {
	//menarik dari method satu satunya dari bawah (++)
	public function getInfoProduk();
}

//kelas abstrak harus memiliki method abstrak sedangkan method sudah di pindah ke interface diatas (++)
//script ebelum ada implements interface =====> abstract class Produk
class Produk {


	public 	$judul, 
			$penulis, 
			$penerbit,
			$harga;	 
			


	public function __construct ($judul ="judul", $penulis ="penulis", $penerbit ="penerbit", $harga =0) {
		//memakai this karena mengambil dari properti atas(lain)
		$this->judul = $judul;
		$this->penulis = $penulis;
		$this->penerbit = $penerbit;
		$this->harga = $harga;
		
	}
	//jika visibility kelas Produk(parent) menggunakan private
	// public function getHarga(){
	// 	return $this->harga;
	// }

	public function getLabel() {
		return "$this->penulis, $this->penerbit";
	}

	//membuat method baru abstract (++)
	//abstract public function getInfoProduk();

	public function getInfo() {
		$str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";

		return $str;
	}

}

//inheritance (kelas child) untuk menangani kategori produk yang berbeda
class Buku extends Produk implements infoProduk{

	public $jmlHalaman;
	
	//overrid
	public function __construct($judul ="judul", $penulis ="penulis", $penerbit ="penerbit", $harga =0, $jmlHalaman=0) {

		//menjalankan kelas parent construct
		parent::__construct( $judul, $penulis, $penerbit, $harga);

		$this->jmlHalaman = $jmlHalaman;

	}

	public function  getInfoProduk() {
		//parent disini dimaksudkan mengambil info produk dari parent di class produk
		//$str ="Buku : " . parent::getInfoProduk() . " - {$this->jmlHalaman} Halaman.";

		//ketika sudah ada method abstract(di kelas Produk) diganti
		$str ="Buku : " . $this->getInfo() . " - {$this->jmlHalaman} Halaman.";

		return $str;
	}
}

//inheritance (kelas child) untuk menangani kategori produk yang berbeda
// mewarisi kelas Produk mengimplementasikan infoProduk
class Game extends Produk implements infoProduk {

	public $waktuMain;

	public function __construct($judul ="judul", $penulis ="penulis", $penerbit ="penerbit", $harga =0, $waktuMain=0) {

		//menjalankan kelas parent construct
		parent::__construct( $judul, $penulis, $penerbit, $harga);

		$this->waktuMain = $waktuMain;

	}
	//jika visibility kelas Produk(parent)menggunakan protected
	// public function getHarga(){
	// 	return $this->harga;
	// }


	public function  getInfoProduk() {
		//parent disini dimaksudkan mengambil info produk dari parent di class produk
		//$str ="Game : " . parent::getInfoProduk() . " - {$this->waktuMain} Jam.";

		//ketika sudah ada method abstract(di kelas Produk) diganti
		$str ="Game : " .$this->getInfo() . " - {$this->waktuMain} Jam.";

		return $str;
	}
}


//instansiasi
$salam = new Pesan();
$produk1 = new Buku("11:11","fiersa besari","sik googling", 110000, 200,);
$produk2 = new Game("clash of clan","supercell","sik googling",30000, 4);



//cetak dari file salam
$salam = new Pesan();
echo $salam->selamatPagi();
echo $salam->sapaan();

//cetak dari file alamat
echo "<br>";
echo NAMA;
echo "<br>";
echo JALAN;
echo "<br>";
echo "<hr>";

//file internal
echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();




