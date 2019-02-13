<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends Public_Controller {

    public function __construct()
    {
		parent::__construct();

		$this->load->helper('captcha');

		$this->load->model('golongan_model');
		$this->load->model('stock_model');
		$this->load->model('reviews_model');
		
		require_once(APPPATH.'third_party/recaptcha-master/src/autoload.php');
		
		// $this->output->enable_profiler(TRUE);
	}

	
	public function index()
	{

		$this->data['golongan'] = $this->golongan_model->get_all();

		foreach ($this->data['golongan'] as $item) {
			$this->data['item_'.$item->kdgol] = $this->golongan_model->get_sample($item->kdgol);
		}

		if ($this->ion_auth->logged_in())
		{
			$member = $this->ion_auth->user()->row();
			$this->data['first_name'] = $member->first_name;
			$this->data['last_name']  = $member->last_name;
		}
        
        $kode = $this->uri->segment(2);
		
		$this->data['product']   = $this->stock_model->get_by_kodeurl($kode);
		$this->data['related']   = $this->stock_model->get_related($this->data['product']->kdgol2, $kode);
		$this->data['promotion'] = $this->stock_model->get_promotion($kode);

		$action  = $this->input->get('action');
		
		if ($action) {

			if ($action == 'add'):
			
				$kdbar = $this->input->get('code'); // kode barang => cart
				$qty   = $this->input->get('qty');  // qty barang => cart

				if ($kdbar != '') {
					
					// $detail = $this->stock_model->get_by_id($kdbar);
					$this->db->select('kdbar, kdurl, nama, hjual, format(hjual,0,"id") as hjualf, gambar');
					$this->db->where('kdurl', $kdbar);
					
					$detail = $this->db->get('stock')->row();
						
					if (!$qty) $qty = 1; //$this->input->post('qty');
					
					$itemArray = array( $kdbar => array( 'kdbar' => $detail->kdbar, 'kdurl' => $detail->kdurl,
														'nama'  => $detail->nama,
														'qty'   => $qty,
														'harga' => $detail->hjual,
														'hargaf'=> $detail->hjualf, // harga dgn pemisah ribuan
														'gambar'=> $detail->gambar
													));
		
					if(!empty($_SESSION["cart_item"])) {
		
						if(in_array($kdbar, array_keys($_SESSION["cart_item"]))) {
		
							foreach($_SESSION["cart_item"] as $k => $v) {
									
								if($kdbar == $k) {
										
									if(empty($_SESSION["cart_item"][$k]["qty"])) {
										$_SESSION["cart_item"][$k]["qty"] = 0;
									}
									$_SESSION["cart_item"][$k]["qty"] += $qty;
								}
							}

						} else {
							$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
						}
					} else {
						// data array kosong
						$_SESSION["cart_item"] = $itemArray;
					}

					$val = (int)$this->session->userdata('totqty') + $qty;
					$this->session->set_userdata('totqty', $val);
				}
					
				// inisiasi
				$item_price = 0;
				$total_price = 0;
							
				foreach($_SESSION["cart_item"] as $k => $v) {
					$item_price  = (float)$_SESSION["cart_item"][$k]["qty"]*$_SESSION["cart_item"][$k]["harga"];
					$total_price += $item_price;
				}
				$this->session->set_userdata('tot_price', $total_price);
				
				$url = strtok(current_url(), '?');
				header("location: ".$url);
			
			elseif ($action == 'remove'):
			
				$kdbar = $this->input->get('code'); // kode barang => cart
		
				if ($kdbar != '') {
					
					if(!empty($_SESSION["cart_item"])) {
		
						if(in_array($kdbar, array_keys($_SESSION["cart_item"]))) {
		
							foreach($_SESSION["cart_item"] as $k => $v) {
									
								if($kdbar == $k) {
										
									$val = (int)$this->session->userdata('totqty') - $_SESSION["cart_item"][$k]["qty"];
									$this->session->set_userdata('totqty', $val);
									unset($_SESSION['cart_item'][$k]);
								}
							}
						}
		
					}
			
				}
		
				// inisiasi
				$item_price  = 0;
				$total_price = 0;
							
				// hitung total dan simpan di variabel session
				foreach($_SESSION["cart_item"] as $k => $v) {
					$item_price  = (float)$_SESSION["cart_item"][$k]["qty"]*$_SESSION["cart_item"][$k]["harga"];
					$total_price += $item_price;
				}
				$this->session->set_userdata('tot_price', $total_price);
				
				$url = strtok(current_url(), '?');
				header("location: ".$url);
			
			else:

				$this->form_validation->set_rules('name', 'Name', 'required');
				$this->form_validation->set_rules('email', 'Email', 'required');
				$this->form_validation->set_rules('comment', 'Comment', 'required');

				if ($this->form_validation->run() == TRUE)
				{
					$data = array(
						"kdbar"    => $this->input->post('kdbar'),
						"name"     => $this->input->post('name'),
						"email"    => $this->input->post('email'),
						"comment"  => $this->input->post('comment'),
						"rating"   => $this->input->post('rating')
					);
					
					$captcha  = $this->input->post('captcha');
					$url 	  = $this->input->post('url');

					if ($captcha == $this->session->userdata('captcha'))
					{

						if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
							$file = 'D:\xampp\htdocs\asovic\images\captcha\\';
						} else {
							$file = './captcha/';
						}
						if (file_exists($file . $this->session->userdata['image']))
							unlink($file . $this->session->userdata['image']);
			
						$this->session->unset_userdata('captcha');
						$this->session->unset_userdata('image');

						$this->reviews_model->insert($data);
						header("location: ".$url);
					}
					else
					{

						// $this->session->set_flashdata('message', 'Kode yang Anda masukkan tidak cocok.');
						$this->data['name']    = $this->input->post('name');
						$this->data['email']   = $this->input->post('email');
						$this->data['comment'] = $this->input->post('comment');
						$this->data['rating']  = $this->input->post('rating');
						$this->data['message'] = 'Kode yang Anda masukkan tidak cocok.';
					}
				}
				else
				{
					$this->data['message'] = (validation_errors()) ? validation_errors() : '';
				}

			endif;
		}
		
		// prepare captcha
		$original_string = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));

		$original_string = implode("", $original_string);

		$captcha = substr(str_shuffle($original_string), 0, 6);
		
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
			$file = 'D:\xampp\htdocs\asovic\images\captcha\\';
		} else {
			$file = './captcha/';
		}

		$vals = array(

			'word' => $captcha,

			'img_path' => $file, //'D:\xampp\htdocs\asovic\images\captcha\\', //'./captcha'

			'img_url' => base_url('images/captcha'),

			'font_size' => 10,

			'img_width' => 150,

			'img_height' => 50,

			'expiration' => 7200

		);

		// note: pastikan folder captcha sudah dibuat
		$cap = create_captcha($vals);

		if (isset($this->session->userdata['image'])) {

			if (file_exists($file . $this->session->userdata['image']))
				unlink($file . $this->session->userdata['image']);
		}

		$this->session->set_userdata(array('captcha' => $captcha, 'image' => $cap['time'] . '.jpg'));
		
		$this->data['item_rating'] = $this->reviews_model->get_rating($kode);
		
		$totrevs = $this->reviews_model->total_rows($kode);
		
		if (!$action) // tampilkan tombol 'get all reviews'
		{
			if ($totrevs > 3) $this->data['showbutton'] = true;
			$this->data['reviews'] = $this->reviews_model->get_limit_data(3,0,$kode);
		}
		else
		{
			if ($action == 'getall') unset($this->data['showbutton']);
			$this->data['reviews'] = $this->reviews_model->get_all($kode);
		}
		$this->data['totreviews'] = $totrevs;

		$this->load->view('layout/header', $this->data);
		$this->load->view('detail/index', $this->data);
		$this->load->view('layout/footer', $this->data);
	}
}
