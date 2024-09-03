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

namespace com\bydan\contabilidad\inventario\tipo_precio\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\inventario\tipo_precio\business\entity\tipo_precio;

use com\bydan\contabilidad\inventario\tipo_precio\presentation\session\tipo_precio_session;

class tipo_precio_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?tipo_precio $tipo_precio = null;	
	public ?array $tipo_precios = array();
	
	/*SESSION*/
	public ?tipo_precio_session $tipo_precio_session = null;
	
	/*FKs*/
	

	public bool $con_empresasFK=false;
	public array $empresasFK=array();
	public int $idempresaDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->tipo_precios= array();
		$this->tipo_precio= new tipo_precio();
		
		/*SESSION*/
		$this->tipo_precio_session=$this->Session->unserialize(tipo_precio_util::$STR_SESSION_NAME);

		if($this->tipo_precio_session==null) {
			$this->tipo_precio_session=new tipo_precio_session();
		}
		
		/*FKs*/
		

		$this->con_empresasFK=false;
		$this->empresasFK=array();
		$this->idempresaDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function gettipo_precio() : tipo_precio {	
		return $this->tipo_precio;
	}
		
	public function settipo_precio(tipo_precio $newtipo_precio) {
		$this->tipo_precio = $newtipo_precio;
	}
	
	public function gettipo_precios() : array {		
		return $this->tipo_precios;
	}
	
	public function settipo_precios(array $newtipo_precios) {
		$this->tipo_precios = $newtipo_precios;
	}
	
	/*SESSION*/
	public function gettipo_precio_session() : tipo_precio_session {	
		return $this->tipo_precio_session;
	}
		
	public function settipo_precio_session(tipo_precio_session $newtipo_precio_session) {
		$this->tipo_precio_session = $newtipo_precio_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
