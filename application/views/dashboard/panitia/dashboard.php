<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
    $username = $this->session->userdata('username');
    $password = $this->session->userdata('password');
    $privilege = $this->session->userdata('privilege');

    if (empty($username) && empty($password)) {
        echo "Silakan login untuk mengakses halaman ini";
    } else if ($privilege!='Panitia') {
    	echo "Maaf, Halaman ini untuk Panitia";
    } else {
    	?>
Codingan dashboard
    	<?php
    }
?>