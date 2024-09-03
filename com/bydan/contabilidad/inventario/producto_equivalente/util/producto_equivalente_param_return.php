<?php declare(strict_types = 1);
 /*
*AVISO LEGAL
(C) Copyright
*Este programa esta protegido por la ley de derechos de autor.
*La reproduccion o distribucion ilicita de este programa o de cualquiera de
*sus partes esta penado por la ley con severas sanciones civiles y penales,
*y seran objeto de todas las sanciones legales que correspondan.

*Su contenido no puede copiarse para fines comerciales o de otras,
*ni puede mostrarse, incluso en una version modificada, en otros sitios Web.
Solo esta permitido colocar hipervinculos al sitio web.
*/

namespace com\bydan\contabilidad\inventario\producto_equivalente\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\inventario\producto_equivalente\business\entity\producto_equivalente;

use com\bydan\contabilidad\inventario\producto_equivalente\presentation\session\producto_equivalente_session;

class producto_equivalente_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?producto_equivalente $producto_equivalente = null;	
	public ?array $producto_equivalentes = array();
	
	/*SESSION*/
	public ?producto_equivalente_session $producto_equivalente_session = null;
	
	/*FKs*/
	

	public bool $con_producto_principalsFK=false;
	public array $producto_principalsFK=array();
	public int $idproducto_principalDefaultFK=-1;

	public bool $con_producto_equivalentesFK=false;
	public array $producto_equivalentesFK=array();
	public int $idproducto_equivalenteDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->producto_equivalentes= array();
		$this->producto_equivalente= new producto_equivalente();
		
		/*SESSION*/
		$this->producto_equivalente_session=$this->Session->unserialize(producto_equivalente_util::$STR_SESSION_NAME);

		if($this->producto_equivalente_session==null) {
			$this->producto_equivalente_session=new producto_equivalente_session();
		}
		
		/*FKs*/
		

		$this->con_producto_principalsFK=false;
		$this->producto_principalsFK=array();
		$this->idproducto_principalDefaultFK=-1;

		$this->con_producto_equivalentesFK=false;
		$this->producto_equivalentesFK=array();
		$this->idproducto_equivalenteDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getproducto_equivalente() : producto_equivalente {	
		return $this->producto_equivalente;
	}
		
	public function setproducto_equivalente(producto_equivalente $newproducto_equivalente) {
		$this->producto_equivalente = $newproducto_equivalente;
	}
	
	public function getproducto_equivalentes() : array {		
		return $this->producto_equivalentes;
	}
	
	public function setproducto_equivalentes(array $newproducto_equivalentes) {
		$this->producto_equivalentes = $newproducto_equivalentes;
	}
	
	/*SESSION*/
	public function getproducto_equivalente_session() : producto_equivalente_session {	
		return $this->producto_equivalente_session;
	}
		
	public function setproducto_equivalente_session(producto_equivalente_session $newproducto_equivalente_session) {
		$this->producto_equivalente_session = $newproducto_equivalente_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
