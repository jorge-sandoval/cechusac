<?php
	class PedidoHasProductoController extends Controller
	{
		private $em;

		public function __CONSTRUCT()
		{
			parent::__CONSTRUCT();
			$this->em = $this->LoadModel('PedidoHasProductoModel');
		}

		public function Registar()
		{
			$this->Layout = false;

			//$this->em->Lectura($_REQUEST['idproducto']);
			$this->Attach = $this->em->Registrar($_REQUEST['id']);
			$this->LoadView();

		}
		
		public function Listar()
		{
			$this->Layout = false;

			//$this->em->Lectura($_REQUEST['idproducto']);
			$this->Attach = $this->em->Listar($_REQUEST['idPedido']);
			$this->LoadView();

		}
		
		public function Eliminar()
		{
			$this->Layout = false;

			//$this->em->Lectura($_REQUEST['idproducto']);
			$this->Attach = $this->em->Listar($_REQUEST['idPedido'], $_REQUEST['idProducto']);
			$this->LoadView();

		}

	}
