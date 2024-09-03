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

namespace com\bydan\contabilidad\inventario\bodega\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;

use com\bydan\contabilidad\inventario\bodega\presentation\session\bodega_session;

class bodega_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?bodega $bodega = null;	
	public ?array $bodegas = array();
	
	/*SESSION*/
	public ?bodega_session $bodega_session = null;
	
	/*FKs*/
	

	public bool $con_empresasFK=false;
	public array $empresasFK=array();
	public int $idempresaDefaultFK=-1;

	public bool $con_sucursalsFK=false;
	public array $sucursalsFK=array();
	public int $idsucursalDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->bodegas= array();
		$this->bodega= new bodega();
		
		/*SESSION*/
		$this->bodega_session=$this->Session->unserialize(bodega_util::$STR_SESSION_NAME);

		if($this->bodega_session==null) {
			$this->bodega_session=new bodega_session();
		}
		
		/*FKs*/
		

		$this->con_empresasFK=false;
		$this->empresasFK=array();
		$this->idempresaDefaultFK=-1;

		$this->con_sucursalsFK=false;
		$this->sucursalsFK=array();
		$this->idsucursalDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getbodega() : bodega {	
		return $this->bodega;
	}
		
	public function setbodega(bodega $newbodega) {
		$this->bodega = $newbodega;
	}
	
	public function getbodegas() : array {		
		return $this->bodegas;
	}
	
	public function setbodegas(array $newbodegas) {
		$this->bodegas = $newbodegas;
	}
	
	/*SESSION*/
	public function getbodega_session() : bodega_session {	
		return $this->bodega_session;
	}
		
	public function setbodega_session(bodega_session $newbodega_session) {
		$this->bodega_session = $newbodega_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
