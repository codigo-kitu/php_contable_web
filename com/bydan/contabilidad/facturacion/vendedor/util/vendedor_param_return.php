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

namespace com\bydan\contabilidad\facturacion\vendedor\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\facturacion\vendedor\business\entity\vendedor;

use com\bydan\contabilidad\facturacion\vendedor\presentation\session\vendedor_session;

class vendedor_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?vendedor $vendedor = null;	
	public ?array $vendedors = array();
	
	/*SESSION*/
	public ?vendedor_session $vendedor_session = null;
	
	/*FKs*/
	

	public bool $con_empresasFK=false;
	public array $empresasFK=array();
	public int $idempresaDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->vendedors= array();
		$this->vendedor= new vendedor();
		
		/*SESSION*/
		$this->vendedor_session=$this->Session->unserialize(vendedor_util::$STR_SESSION_NAME);

		if($this->vendedor_session==null) {
			$this->vendedor_session=new vendedor_session();
		}
		
		/*FKs*/
		

		$this->con_empresasFK=false;
		$this->empresasFK=array();
		$this->idempresaDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getvendedor() : vendedor {	
		return $this->vendedor;
	}
		
	public function setvendedor(vendedor $newvendedor) {
		$this->vendedor = $newvendedor;
	}
	
	public function getvendedors() : array {		
		return $this->vendedors;
	}
	
	public function setvendedors(array $newvendedors) {
		$this->vendedors = $newvendedors;
	}
	
	/*SESSION*/
	public function getvendedor_session() : vendedor_session {	
		return $this->vendedor_session;
	}
		
	public function setvendedor_session(vendedor_session $newvendedor_session) {
		$this->vendedor_session = $newvendedor_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
