<?php
class ArchivoModel extends DataAccessLayer
{
	private $rh;

	public function __CONSTRUCT()
	{
		parent::__CONSTRUCT();

		$this->rh = new ResponseHelper();
	}

	public function Listar()
	{
		$archivos = null;

		try 
		{
			$db = $this->Link
			           ->prepare("SELECT * FROM archivo ORDER BY Fecha DESC");

            $db->execute();
			$archivos = $db->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			BaseHelper::ELog($e);
		}

		return $archivos;
	}

	public function Registrar($file)
	{
		$_ext = explode('.', $file['name']);
		$_nombre = date('ymdhis') . '.' . $_ext[count($_ext) - 1];

		move_uploaded_file ( $file['tmp_name'], _BASE_FOLDER_ . 'uploads\\' . $_nombre );

		try 
		{
			$db = $this->Link
			           ->prepare("INSERT INTO archivo(Nombre, Tipo, Peso, Fecha)
			           			  VALUES(?, ?, ?, ?)
			           	");

            $db->execute(array($_nombre, BaseHelper::TipoDeArchivo($file['type']), $file['size'], BaseHelper::GetDateTime()));
            $this->rh->SetResponse(true);
		} catch (Exception $e) {
			BaseHelper::ELog($e);
		}

		return $this->rh;
	}
}