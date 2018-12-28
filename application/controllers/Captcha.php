<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Captcha extends CI_Controller {

	public function index()
	{
		$this->form_validation->set_rules('captcha', 'Captcha','trim|callback_check_captcha|required');
		if($this->form_validation->run () == false)
		{
			$this->load->view('captcha/index', array('img' => $this->create_captcha()));
		}else
		{
			echo 'Success Captcha Code';
		}
	}
	public function create_captcha()
	{
		$options = array(
			'img_path'	=> './captcha/',
			'img_url'	=> base_url('captcha'),
			// 'img_url'	=> '/ci-chapca/captcha/',
			'img_width'	=> '100',
			'img_height'=> '40',
			'expiration'=> 7200
		);

		$cap = create_captcha($options);
		$image = $cap['image'];

		$this->session->set_userdata('captchaword',$cap['word']);

		return $image;
	}

	public function check_captcha()
	{
		if($this->input->post('captcha') == $this->session->userdata('captchaword'))
		{
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('check_captcha', 'Captcha is Wrong');
			return FALSE;
		}
	}
}
