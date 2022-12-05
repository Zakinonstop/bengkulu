<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Baru extends CI_Controller {

	public function index()
	{
        $data = [
            'getApi'=> json_decode($this->url_get_contents()),
        ];
        $this->load->view('baru-2', $data);
	}
    
    function url_get_contents()
    {
        if (!function_exists('curl_init')) {
            die('CURL is not installed!');
        }
        
        $ch = curl_init();
        $post = ['id' => 'BENGKULU'];
        $username = 'outdoor';
        $password = 'qmzDaFwbqRtXx39q';
        curl_setopt($ch, CURLOPT_URL, 'https://ispu.menlhk.go.id/api/public/outdoor');
        curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
        curl_setopt_array($ch, array(CURLOPT_RETURNTRANSFER => TRUE));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

    function get()
    {
        if (!function_exists('curl_init')) {
            die('CURL is not installed!');
        }

        $ch = curl_init();
        $post = ['id' => 'BENGKULU'];
        $username = 'outdoor';
        $password = 'qmzDaFwbqRtXx39q';
        curl_setopt($ch, CURLOPT_URL, 'https://ispu.menlhk.go.id/api/public/outdoor');
        curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
        curl_setopt_array($ch, array(CURLOPT_RETURNTRANSFER => TRUE));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        $output = curl_exec($ch);
        curl_close($ch);
        echo $output;

        // $this->load->view('baru-api');
        // $json_string = json_encode($output, JSON_PRETTY_PRINT);
        // echo $json_string;
    }
}
