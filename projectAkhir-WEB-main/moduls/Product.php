<?php 
  class Post {
    // DB stuff
    //test
    private $conn;
    private $table = 'dataproduk';

    // Post Properties
    public $id;
    public $nama_produk;
    public $harga_produk;
    public $merek;
    public $warna;
    public $stock; 
    public $jenis; 

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Posts
    public function read() {
      // Create query
      $query = 'SELECT * FROM ' . $this->table . ' ORDER BY Id';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    public function update() {
      // Create query
      $query = 'UPDATE ' . $this->table . '
                            SET id = :id, nama_produk = :nama_produk, harga_produk = :harga_produk, merek = :merek, warna = :warna, stock = :stock, jenis = :jenis
                            WHERE id = :id';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean data
      $this->id = htmlspecialchars(strip_tags($this->id));
      $this->nama_produk = htmlspecialchars(strip_tags($this->nama_barang));
      $this->harga_produk = htmlspecialchars(strip_tags($this->stock));
      $this->merek = htmlspecialchars(strip_tags($this->merek));
      $this->warna = htmlspecialchars(strip_tags($this->category));
      $this->stock = htmlspecialchars(strip_tags($this->harga));
      $this->jenis = htmlspecialchars(strip_tags($this->warna));

      // Bind data
      $stmt->bindParam(':id', $this->id);
      $stmt->bindParam(':nama_produk', $this->nama_produk);
      $stmt->bindParam(':harga_produk', $this->harga_produk);
      $stmt->bindParam(':merek', $this->merek);
      $stmt->bindParam(':warna', $this->warna);
      $stmt->bindParam(':stock', $this->stock);
      $stmt->bindParam(':jenis', $this->jenis);

      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
  }

  // Delete Post
  public function delete() {
    // Create query
    $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->id = htmlspecialchars(strip_tags($this->id));

    // Bind data
    $stmt->bindParam(':id', $this->id);

    // Execute query
    if($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);

    return false;
  }



    // Get Single Post
    public function read_single() {
          // Create query
          $query = 'SELECT * FROM ' . $this->table . ' WHERE id = ?';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Bind ID
          $stmt->bindParam(1, $this->id);

          // Execute query
          $stmt->execute();

          $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
          $this->id = $row['id'];
          $this->nama_produk = $row['nama_produk'];
          $this->harga_produk = $row['stock'];
          $this->merek = $row['merek'];
          $this->warna = $row['warna'];
          $this->stock = $row['stock']; 
          $this->jenis = $row['jenis']; 
    }

    public function create() {
      // Create query
      $query = 'INSERT INTO ' . $this->table . ' SET id = :id, nama_produk = :nama_produk, harga_produk = :harga_produk, merek = :merek, warna = :warna ,stock = :stock, jenis = :jenis';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean data
      $this->id = htmlspecialchars(strip_tags($this->id));
      $this->nama_produk = htmlspecialchars(strip_tags($this->nama_produk));
      $this->harga_produk = htmlspecialchars(strip_tags($this->harga_produk));
      $this->merek = htmlspecialchars(strip_tags($this->merek));
      $this->warna = htmlspecialchars(strip_tags($this->warna));
      $this->stock = htmlspecialchars(strip_tags($this->stock));
      $this->jenis = htmlspecialchars(strip_tags($this->jenis));

      // Bind data
      $stmt->bindParam(':id', $this->id);
      $stmt->bindParam(':nama_produk', $this->nama_produk);
      $stmt->bindParam(':harga_produk', $this->harga_prdouk);
      $stmt->bindParam(':merek', $this->merek);
      $stmt->bindParam(':warna', $this->warna);
      $stmt->bindParam(':stock', $this->stock);
      $stmt->bindParam(':jenis', $this->jenis);


      // Execute query
      if($stmt->execute()) {
        return true;
      }

       // Print error if something goes wrong
       printf("Error: %s.\n", $stmt->error);

       return false;
  }
  }