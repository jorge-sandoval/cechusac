<?php
	class InicioController extends Controller
	{
		private $em;

		public function __CONSTRUCT()
		{
			parent::__CONSTRUCT();
			$this->em = $this->LoadModel('EntradaModel');
		}

		public function Index()
		{
			$this->Attach = $this->em->Ultimos();
			$this->LoadView();
		}

		public function Entrada()
		{
			$this->Layout = false;
			
			//$this->em->Lectura($_REQUEST['idproducto']);
			$this->Attach = $this->em->Obtener($_REQUEST['id']);
			$this->LoadView();
			
		}

		public function Nosotros()
		{
			$this->em->Lectura(1);
			$this->Attach = $this->em->Obtener(1);
			$this->LoadView('inicio/paginas');
		}

		public function Mision()
		{
			$this->em->Lectura(10);
			$this->Attach = $this->em->Obtener(10);
			$this->LoadView('inicio/paginas');
		}

		public function Vision()
		{
			$this->em->Lectura(9);
			$this->Attach = $this->em->Obtener(9);
			$this->LoadView('inicio/paginas');
		}
	}