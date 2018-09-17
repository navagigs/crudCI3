<?php

class Calculator extends CI_Controller 
{

	public function index () 
	{
		$this->load->view('kalkulator');

	}

	public function hitung() 
	{

		$bil1 		= ($this->input->POST('bil1'))?$this->input->POST('bil1'):'';
		$bil2		= ($this->input->POST('bil2'))?$this->input->POST('bil2'):'';
		$operasi	= ($this->input->POST('operasi'))?$this->input->POST('operasi'):'';

		switch ($operasi) {
			case 'tambah':
				$hasil = $bil1+$bil2;
			break;
			case 'kurang':
				$hasil = $bil1-$bil2;
			break;
			case 'kali':
				$hasil = $bil1*$bil2;
			break;
			case 'bagi':
				$hasil = $bil1/$bil2;
			break;			
		}

					$this->session->set_flashdata('success', 'Hasilnya "'.$hasil.'"');
			redirect('/calculator');
		
	}
}