<?php
	class PedidoHasProductoController extends Controller
	{
		public function __CONSTRUCT()
		{
			parent::__CONSTRUCT();
		}

		public function Index()
		{
			$this->Attach = array(
				'Nombre'   => 'Eduardo',
				'Apellido' => 'Rodriguez Patiño'
			);
			$this->Layout = false;
			$this->LoadView();
		}
	}
