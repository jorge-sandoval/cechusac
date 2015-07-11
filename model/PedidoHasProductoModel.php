<?php
require_once 'helper/jqgridhelper.php';

class PedidoHasProductoModel extends DataAccessLayer
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
			           ->prepare("SELECT * FROM pedido_has_producto WHERE pedido_idPedido = ?");

            $db->execute(
				array($idPedido)
				);
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
			          ->prepare("SELECT * FROM pedido_has_producto WHERE id = ?");


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
			//Diferirlo
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

	public function Registrar($idPedido, $idProducto)
	{
		try
		{
			$this->Link->prepare(
				"INSERT INTO pedido_has_producto(producto_idproducto, pedido_idpedido)
				 VALUES(?,?)"
			)->execute(
				array($idPedido, $idProducto)
				);

			$this->rh->SetResponse(true);
		} catch (Exception $e) {
			BaseHelper::ELog($e);
		}

		return $this->rh;
	}

	public function Eliminar($idCarrito,$id)
	{
		try
		{
			$this->Link->prepare(
				"DELETE FROM pedido_has_producto WHERE producto_idproducto = ? AND pedido_idPedido = ?"
			)->execute(
				array(
					$id, $idCarrito)
				);
			$this->rh->SetResponse(true);
		} catch (Exception $e) {
			BaseHelper::ELog($e);
		}

		return $this->rh;
	}
}
