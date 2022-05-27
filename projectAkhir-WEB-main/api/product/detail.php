<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../moduls/Product.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $post = new Post($db);

  // Get ID
  $post->id = isset($_GET['id']) ? $_GET['id'] : die();

  // Get post
  $post->read_single();

  // Create array
  $post_arr = array(
    'id' => $post->id,
    'nama_produk' => $post->nama_produk,
    'harga_produk' => $post->harga_produk,
    'merek' => $post->merek,
    'warna' => $post->warna, 
    'stock' => $post->stock, 
    'jenis' => $post->jenis
  );

  // Make JSON
  print_r(json_encode($post_arr));
