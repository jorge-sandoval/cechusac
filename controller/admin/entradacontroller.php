<?php
	// Cargamos un el jqgrid
	require_once 'helper/jqgridhelper.php';

	class EntradaController extends Controller
	{
		private $em; // UsuarioModel
		private $cm; // UsuarioModel

		public function __CONSTRUCT()
		{
			parent::__CONSTRUCT();

			$this->em = $this->LoadModel('EntradaModel');
			$this->cm = $this->LoadModel('CategoriaModel');
		}

		public function Listar()
		{
			if (BaseHelper::IsAjaxRequest()) echo json_encode($this->em->Listar($_REQUEST['tipo']));
			else $this->LoadView();
		}

		public function Ver()
		{
			$this->Attach['Entrada'] = isset($_REQUEST['id']) ? 
											$this->em->Obtener($_REQUEST['id']) : 
											BaseHelper::GetEntity('entrada');

			// Si el el request tipo existe lo seteamos
			if(isset($_REQUEST['tipo']) && !isset($_REQUEST['id']))
				$this->Attach['Entrada']->Tipo = $_REQUEST['tipo'];

			$this->LoadView();
		}

		public function Guardar()
		{
			$rh = null;
			$entity = BaseHelper::ParseRequestParameterToEntity(
								BaseHelper::GetEntity('entrada'), $_POST);

			if($entity->id == 0)
			{
				$rh = $this->em->Registrar($entity, isset($_FILES['upload']) ? $_FILES['upload'] : null);
				if( $rh->response ) $rh->href = 'entrada/ver/?id=' . $rh->result;
			}
			else
			{
				$rh = $this->em->Actualizar($entity, isset($_FILES['upload']) ? $_FILES['upload'] : null);
			}

			echo json_encode($rh);	
		}

		public function Categorias()
		{
			$this->Layout = false;

			$this->Attach['action'] = $_REQUEST['action'];

			if($this->Attach['action'] == 'listar')
			{
				$this->Attach['Categorias'] = $this->cm->Listar();
				$this->Attach['Relaciones'] = $_REQUEST['entrada_id'] > 0 
													? $this->cm->Relaciones($_REQUEST['entrada_id']) 
													: array();
				$this->LoadView();
			}				

			if($this->Attach['action'] == 'ver')
			{
				$this->Attach['Categoria'] = $this->cm->Obtener($_REQUEST['id']);
				$this->LoadView();
			}

			if($this->Attach['action'] == 'registrar')
			{
				echo json_encode($this->cm->Registrar(
												BaseHelper::ParseRequestParameterToEntity(
													BaseHelper::GetEntity('categoria'), $_POST)));
			}
				
			if($this->Attach['action'] == 'actualizar')
			{
				echo json_encode($this->cm->Actualizar(
												BaseHelper::ParseRequestParameterToEntity(
													BaseHelper::GetEntity('categoria'), $_POST)));
			}

			if($this->Attach['action'] == 'eliminar')
			{
				echo json_encode($this->cm->Eliminar($_REQUEST['id']));
			}
		}
	}