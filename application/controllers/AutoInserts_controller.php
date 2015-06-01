<?php
class AutoInserts_controller extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('AutoInsert_model');
        }

        public function generate()
        {
			$data['result'] = $this->AutoInsert_model->autoInserts();
			$this->load->view('autoInserts_view', $data);
        }
}
?>