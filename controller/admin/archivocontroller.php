<?php
	class ArchivoController extends Controller
	{

		private $am;

		public function __CONSTRUCT()
		{
			parent::__CONSTRUCT();

			$this->Layout = false;
			$this->am = $this->LoadModel('ArchivoModel');
		}

		public function Index()
		{
			$this->Attach['Archivos'] = $this->am->Listar();
			$this->Attach['Render']   = $_REQUEST['render'];
			$this->LoadView();
		}

		public function Upload()
		{
			$rh = $this->am->Registrar($_FILES['upload']);

			if($rh->response) $rh->function = '__RefrescarArchivos();';

			echo json_encode($rh);
		}
	}