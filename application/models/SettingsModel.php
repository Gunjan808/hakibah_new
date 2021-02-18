<?php defined('BASEPATH') or exit('No direct script access allowed');

class SettingsModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->database();
		$this->tableName = 'settings';
	}

	function get_option($option_key = null)
	{
		if (empty($option_key))
			return false;

		$setting = $this->first(['conditions' => ['option_key' => $option_key], 'datatype' => 'json']);

		if (is($setting) and is($setting->option_value))
			return $setting->option_value;

		return false;
	}

	function get_header_option()
	{
		$data = [];
		$data['site_favicon']  = $this->get_option('site_favicon');
		$data['site_name']     = $this->get_option('site_name');
		$data['site_logo']     = $this->get_option('site_logo');
		$data['site_mobile']   = $this->get_option('site_mobile');
		$data['site_mobile_2'] = $this->get_option('site_mobile_2');
		$data['site_address']  = $this->get_option('site_address');
		$data['email']         = $this->get_option('site_mail');
		$data['signature']     = $this->get_option('site_signature_image');
		$data['facebook']      = $this->get_option('social_facebook');
		$data['instagram']     = $this->get_option('social_instagram');
		$data['twitter']       = $this->get_option('social_twitter');
		$data['youtube']       = $this->get_option('social_youtube');
		return json_decode(json_encode($data));
	}
}

/* End of file SettingsModel.php */
