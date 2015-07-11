<?php
// Cargamos un el jqgrid
require_once 'helper/jqgridhelper.php';

class EntradaModel extends DataAccessLayer
{
	private $jq;
	private $rh;

	public function __CONSTRUCT()
	{
		parent::__CONSTRUCT();

		$this->jq = new jqGridHelper();
		$this->rh = new ResponseHelper();
	}

	public function Ultimos($tipo=2)
	{
		$r = null;
		
		try 
		{
			$db = $this->Link
			          //->prepare("SELECT * FROM entrada WHERE Tipo = $tipo ORDER BY Fecha DESC LIMIT 20");
			            ->prepare("SELECT * FROM producto");
			          

			$db->execute();
			$r = $db->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			BaseHelper::ELog($e);
		}

		return $r;
	}

	public function Listar($tipo)
	{

		try 
		{
			$this->jq->Config(
				$this->Link->prepare("SELECT COUNT(*) FROM entrada WHERE Tipo = $tipo")
					 ->fetchColumn()
				);

			$entradas = array();

		    $sql = "SELECT * FROM entrada WHERE Tipo = $tipo ORDER BY " . $this->jq->sord;
		    foreach ($this->Link->query($sql) as $row) {
		        $entradas[] = (object) $row;
		    }

			$this->jq->DataSource($entradas);			
		} catch (Exception $e) {
			BaseHelper::ELog($e);
		}

		return $this->jq;
	}

	public function Obtener($id)
	{
		$r = null;
		
		try 
		{
			$db = $this->Link
			          ->prepare("SELECT * FROM producto WHERE idproducto = ?");
			          

			$db->execute(array($id));
			$r = $db->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			BaseHelper::ELog($e);
		}

		return $r;
	}

	public function Registrar($data, $file = null)
	{
		try 
		{
			if(!is_null($file))
			{
				$_ext = explode('.', $file['name']);
				$_nombre = date('ymdhis') . '.' . $_ext[count($_ext) - 1];

				move_uploaded_file ( $file['tmp_name'], _BASE_FOLDER_ . 'uploads\\' . $_nombre );

				$data->Imagen = $_nombre;
			}

			$this->Link->prepare(
				"INSERT INTO entrada(Nombre, Tipo, Descripcion, Contenido, Tags, Imagen, Fecha)
				VALUES (?, ?, ?, ?, ?, ?, ?)"
			)->execute(
				array(
					$data->Nombre,
					$data->Tipo,
					$data->Descripcion, 
					$data->Contenido, 
					$data->Tags,
					$data->Imagen,
					BaseHelper::GetDateTime())
				);

			$this->rh->result = $this->Link->lastInsertId();

			if(isset($data->Categorias))
			{
				foreach($data->Categorias as $c)
				{
					$this->Link->prepare(
						"INSERT INTO entradacategoria(Entrada_id, Categoria_id)
						VALUES (?, ?)"
					)->execute(
						array(
							$this->rh->result,
							$c)
						);
				}
			}

			$this->rh->SetResponse(true);
		} catch (Exception $e) {
			BaseHelper::ELog($e);
		}

		return $this->rh;
	}

	public function Actualizar($data, $file = null)
	{
		try 
		{
			if(!is_null($file))
			{
				$_ext = explode('.', $file['name']);
				$_nombre = date('ymdhis') . '.' . $_ext[count($_ext) - 1];

				move_uploaded_file ( $file['tmp_name'], _BASE_FOLDER_ . 'uploads\\' . $_nombre );

				$data->Imagen = $_nombre;
				$this->rh->href = 'self';
			}

			$sql = "UPDATE entrada SET 
					Nombre      = ?, 
					Descripcion = ?,
					Contenido   = ?, 
					Tags        = ?
					" . ($file != null ? ",Imagen = '" . $data->Imagen . "'" : "") . " WHERE id = ?";

			$this->Link->prepare($sql)
			     ->execute(
				array(
					$data->Nombre, 
					$data->Descripcion, 
					$data->Contenido, 
					$data->Tags, 
					$data->id)
				);

			if(isset($data->Categorias))
			{
				$this->Link->prepare("DELETE FROM entradacategoria WHERE Entrada_id = ?")
						   ->execute(array($data->id));

				foreach($data->Categorias as $c)
				{
					$this->Link->prepare(
						"INSERT INTO entradacategoria(Entrada_id, Categoria_id)
						VALUES (?, ?)"
					)->execute(
						array(
							$data->id,
							$c)
						);
				}
			}

			$this->rh->SetResponse(true);
		} catch (Exception $e) {
			BaseHelper::ELog($e);
		}

		return $this->rh;
	}

	public function Eliminar($id)
	{
		try 
		{
			$this->Link->prepare(
				"DELETE FROM categoria WHERE id = ?"
			)->execute(
				array(
					$id)
				);

			$this->rh->SetResponse(true);
		} catch (Exception $e) {
			BaseHelper::ELog($e);
		}

		return $this->rh;
	}

	public function Lectura($id)
	{
		try 
		{
			$this->Link->prepare(
				"UPDATE entrada SET Lectura = (Lectura + 1) WHERE id = ?"
			)->execute(
				array(
					$id)
				);

			$this->rh->SetResponse(true);
		} catch (Exception $e) {
			BaseHelper::ELog($e);
		}

		return $this->rh;
	}
}