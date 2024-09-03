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

namespace com\bydan\contabilidad\general\sucursal\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;

use com\bydan\contabilidad\general\sucursal\presentation\session\sucursal_session;

class sucursal_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?sucursal $sucursal = null;	
	public ?array $sucursals = array();
	
	/*SESSION*/
	public ?sucursal_session $sucursal_session = null;
	
	/*FKs*/
	

	public bool $con_empresasFK=false;
	public array $empresasFK=array();
	public int $idempresaDefaultFK=-1;

	public bool $con_paissFK=false;
	public array $paissFK=array();
	public int $idpaisDefaultFK=-1;

	public bool $con_ciudadsFK=false;
	public array $ciudadsFK=array();
	public int $idciudadDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->sucursals= array();
		$this->sucursal= new sucursal();
		
		/*SESSION*/
		$this->sucursal_session=$this->Session->unserialize(sucursal_util::$STR_SESSION_NAME);

		if($this->sucursal_session==null) {
			$this->sucursal_session=new sucursal_session();
		}
		
		/*FKs*/
		

		$this->con_empresasFK=false;
		$this->empresasFK=array();
		$this->idempresaDefaultFK=-1;

		$this->con_paissFK=false;
		$this->paissFK=array();
		$this->idpaisDefaultFK=-1;

		$this->con_ciudadsFK=false;
		$this->ciudadsFK=array();
		$this->idciudadDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getsucursal() : sucursal {	
		return $this->sucursal;
	}
		
	public function setsucursal(sucursal $newsucursal) {
		$this->sucursal = $newsucursal;
	}
	
	public function getsucursals() : array {		
		return $this->sucursals;
	}
	
	public function setsucursals(array $newsucursals) {
		$this->sucursals = $newsucursals;
	}
	
	/*SESSION*/
	public function getsucursal_session() : sucursal_session {	
		return $this->sucursal_session;
	}
		
	public function setsucursal_session(sucursal_session $newsucursal_session) {
		$this->sucursal_session = $newsucursal_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
