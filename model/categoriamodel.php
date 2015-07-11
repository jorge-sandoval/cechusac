<?php
class CategoriaModel extends DataAccessLayer
{
	private $jq;
	private $rh;

	public function __CONSTRUCT()
	{
		parent::__CONSTRUCT();

		$this->jq = new jqGridHelper();
		$this->rh = new ResponseHelper();
	}

	public function Listar()
	{
		$categorias = null;

		try 
		{
			$db = $this->Link
			           ->prepare("SELECT * FROM categoria ORDER BY Nombre");

            $db->execute();
			$categorias = $db->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			BaseHelper::ELog($e);
		}

		return $categorias;
	}

	public function Relaciones($entrada_id)
	{
		$categorias = null;

		try 
		{
			$db = $this->Link
			           ->prepare("SELECT * FROM entradacategoria WHERE entrada_id = ?");

            $db->execute(array($entrada_id));
			$categorias = $db->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			BaseHelper::ELog($e);
		}

		return $categorias;
	}

	public function Obtener($id)
	{
		$r = null;
		
		try 
		{
			$db = $this->Link
			          ->prepare("SELECT * FROM categoria WHERE id = ?");
			          

			$db->execute(array($id));
			$r = $db->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			BaseHelper::ELog($e);
		}

		return $r;
	}

	public function Actualizar($data)
	{
		try 
		{
			$this->Link->prepare(
				"UPDATE categoria SET 
					Nombre      = ?
				 WHERE id = ?"
			)->execute(
				array(
					$data->Nombre,
					$data->id)
				);

			$this->rh->SetResponse(true);
		} catch (Exception $e) {
			BaseHelper::ELog($e);
		}

		return $this->rh;
	}

	public function Registrar($data)
	{
		try 
		{
			$this->Link->prepare(
				"INSERT INTO categoria(Nombre)
				 VALUES(?)"
			)->execute(
				array(
					$data->Nombre)
				);

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
}