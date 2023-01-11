<?php 
 class template {
 protected $_ci;
 function __construct() {
 $this->_ci = &get_instance();
 }
 function views($template = NULL, $data = NULL) {
 if ($template != NULL) {
 // Bagian $data['head'] untuk memanggil file head.php dari folder Admin/_Template/
 // ['head'] data yang kita panggil dari file template.php dari folder Admin/_Template/
 $data['head'] = $this->_ci->load->view('admin/header', $data,
TRUE);

// Bagian $data['topbar'] untuk memanggil file topbar.php dari folder Admin/_Template/
// ['topbar'] data yang kita panggil dari file template.php dari folder Admin/_Template/
 $data['topbar'] = $this->_ci->load->view('admin/topbar', $data,
TRUE);

// Bagian $data['sidebar'] untuk memanggil file sidebar.php dari folder Admin/_Template/
// ['sidebae'] data yang kita panggil dari file template.php dari folder Admin/_Template/
 $data['sidebar'] = $this->_ci->load->view('admin/sidebar',
$data, TRUE);

// ['konten'] data yang kita panggil dari file content.php dari folder Admin/_Template/
 $data['konten'] = $this->_ci->load->view($template, $data, TRUE);

// Bagian $data['content'] untuk memanggil file content.php dari folder Admin/_Template/
// ['content'] data yang kita panggil dari file template.php dari folder Admin/_Template/
$data['content'] = $this->_ci->load->view('admin/content', $data,
TRUE);

// Bagian $data['footer'] untuk memanggil file footer.php dari folder Admin/_Template/
// ['footer'] data yang kita panggil dari file template.php dari folder Admin/_Template/
$data['footer'] = $this->_ci->load->view('admin/footer', $data, TRUE);


// Bagian $data['template'] untuk menampilkan file template.php dari folder Admin/_Template/
// view('Admin/_Template/Template', $data, TRUE); untuk memanggil $data diatas seperti $data['head'], dll
echo $data['Template']= $this->_ci->load->view('admin/scripts',
$data, TRUE); }}}?>
