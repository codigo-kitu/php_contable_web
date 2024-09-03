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

namespace com\bydan\contabilidad\contabilidad\cierre_contable\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\contabilidad\cierre_contable\business\entity\cierre_contable;

use com\bydan\contabilidad\contabilidad\cierre_contable\presentation\session\cierre_contable_session;

class cierre_contable_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?cierre_contable $cierre_contable = null;	
	public ?array $cierre_contables = array();
	
	/*SESSION*/
	public ?cierre_contable_session $cierre_contable_session = null;
	
	/*FKs*/
	

	public bool $con_empresasFK=false;
	public array $empresasFK=array();
	public int $idempresaDefaultFK=-1;

	public bool $con_ejerciciosFK=false;
	public array $ejerciciosFK=array();
	public int $idejercicioDefaultFK=-1;

	public bool $con_periodosFK=false;
	public array $periodosFK=array();
	public int $idperiodoDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->cierre_contables= array();
		$this->cierre_contable= new cierre_contable();
		
		/*SESSION*/
		$this->cierre_contable_session=$this->Session->unserialize(cierre_contable_util::$STR_SESSION_NAME);

		if($this->cierre_contable_session==null) {
			$this->cierre_contable_session=new cierre_contable_session();
		}
		
		/*FKs*/
		

		$this->con_empresasFK=false;
		$this->empresasFK=array();
		$this->idempresaDefaultFK=-1;

		$this->con_ejerciciosFK=false;
		$this->ejerciciosFK=array();
		$this->idejercicioDefaultFK=-1;

		$this->con_periodosFK=false;
		$this->periodosFK=array();
		$this->idperiodoDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getcierre_contable() : cierre_contable {	
		return $this->cierre_contable;
	}
		
	public function setcierre_contable(cierre_contable $newcierre_contable) {
		$this->cierre_contable = $newcierre_contable;
	}
	
	public function getcierre_contables() : array {		
		return $this->cierre_contables;
	}
	
	public function setcierre_contables(array $newcierre_contables) {
		$this->cierre_contables = $newcierre_contables;
	}
	
	/*SESSION*/
	public function getcierre_contable_session() : cierre_contable_session {	
		return $this->cierre_contable_session;
	}
		
	public function setcierre_contable_session(cierre_contable_session $newcierre_contable_session) {
		$this->cierre_contable_session = $newcierre_contable_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
