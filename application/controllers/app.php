<?php

class App extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_data', 'DATA', TRUE);
	}

	public function index () 
	{
		$data['dataLokasi'] = $this->DATA->viewdata()->result();
		$data['dataUnitKerja'] = $this->DATA->viewdata_unit()->result();
		$this->load->view('viewdata', $data);

	}

	public function add()
	{
		$this->load->view('add');
	}

	public function add_action()
	{
		$data['lokasi_kerja_id'] 		= ($this->input->POST('lokasi_kerja_id'))?$this->input->POST('lokasi_kerja_id'):'';
		$data['lokasi_kerja_nama'] 		= ($this->input->POST('lokasi_kerja_nama'))?$this->input->POST('lokasi_kerja_nama'):'';
		$add 				= $this->input->POST('add');
		if($add) {
			$insert['lokasi_kerja_id'] 		= ($data['lokasi_kerja_id']);
			$insert['lokasi_kerja_nama'] 	= ($data['lokasi_kerja_nama']);
			$this->DATA->add_data($insert);
			$this->session->set_flashdata('success', 'data telah berhasil ditambahkan');
			redirect('/app');
		}
	}

	public function edit($lokasi_kerja_id)
	{
		$where['lokasi_kerja_id'] = $lokasi_kerja_id;
		$data['dataLokasi']  = $this->DATA->edit_data($lokasi_kerja_id);
		$this->load->view('edit', $data);
	}

	public function edit_action($lokasi_kerja_id)
	{
		$data['lokasi_kerja_nama'] 		= ($this->input->POST('lokasi_kerja_nama'))?$this->input->POST('lokasi_kerja_nama'):'';
		$edit 							= $this->input->POST('edit');
		if($edit) {
			$where_edit['lokasi_kerja_id'] 		= $lokasi_kerja_id;
			$edits['lokasi_kerja_nama'] 	= ($data['lokasi_kerja_nama']);
			$this->DATA->update_data($where_edit, $edits);
			$this->session->set_flashdata('success', 'data telah berhasil diedit');
			redirect('/app');
		}
	}

	public function delete($lokasi_kerja_id)
	{
		$where['lokasi_kerja_id'] = $lokasi_kerja_id;
		$mhs = $this->DATA->delete_data($where);
		$this->session->set_flashdata('success', 'data telah berhasil didelete');
		redirect('/app');

	}

	public function add_unit()
	{
		$data['dataLokasi'] = $this->DATA->viewdata()->result();
		$this->load->view('add_unit', $data);
	}

	public function add_unit_action()
	{
		$data['unit_kerja_id'] 			= ($this->input->POST('unit_kerja_id'))?$this->input->POST('unit_kerja_id'):'';
		$data['unit_kerja_nama'] 		= ($this->input->POST('unit_kerja_nama'))?$this->input->POST('unit_kerja_nama'):'';
		$data['lokasi_kerja_id'] 		= ($this->input->POST('lokasi_kerja_id'))?$this->input->POST('lokasi_kerja_id'):'';
		$add 							= $this->input->POST('add');
		$where['unit_kerja_nama']		= $data['unit_kerja_nama'];
		$jml_unit						= $this->DATA->count_all_unit($where);
		if($add && $jml_unit < 1) {
			$insert['unit_kerja_id'] 		= ($data['unit_kerja_id']);
			$insert['unit_kerja_nama'] 		= ($data['unit_kerja_nama']);
			$insert['lokasi_kerja_id'] 		= ($data['lokasi_kerja_id']);
			$this->DATA->add_data_unit($insert);
			$this->session->set_flashdata('success', 'data telah berhasil ditambahkan');
			redirect('/app');
		} elseif($add && $jml_unit > 0 ){
			$this->session->set_flashdata('error', 'unit kerja telah ada');
			redirect('/app');
		}
	}

	public function edit_unit($unit_kerja_id)
	{
		$where['unit_kerja_id'] = $unit_kerja_id;
		$data['dataLokasi'] = $this->DATA->viewdata()->result();
		$data['dataUnit']  = $this->DATA->edit_data_unit($unit_kerja_id);
		$this->load->view('edit_unit', $data);
	}

	public function edit_unit_action($unit_kerja_id)
	{
		$data['unit_kerja_nama'] 		= ($this->input->POST('unit_kerja_nama'))?$this->input->POST('unit_kerja_nama'):'';
		$data['lokasi_kerja_id'] 		= ($this->input->POST('lokasi_kerja_id'))?$this->input->POST('lokasi_kerja_id'):'';
		$edit 							= $this->input->POST('edit');
		if($edit) {
			$where_edit['unit_kerja_id'] 		= $unit_kerja_id;
			$edits['unit_kerja_nama'] 	= ($data['unit_kerja_nama']);
			$edits['lokasi_kerja_id'] 	= ($data['lokasi_kerja_id']);
			$this->DATA->update_data_unit($where_edit, $edits);
			$this->session->set_flashdata('success', 'data telah berhasil diedit');
			redirect('/app');
		}
	}

	public function delete_unit($unit_kerja_id)
	{
		$where['unit_kerja_id'] = $unit_kerja_id;
		$mhs = $this->DATA->delete_data_unit($where);
		$this->session->set_flashdata('success', 'data telah berhasil didelete');
		redirect('/app');

	}
}