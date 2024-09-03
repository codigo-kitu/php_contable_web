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

namespace com\bydan\contabilidad\inventario\inventario_fisico\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\inventario\inventario_fisico\business\entity\inventario_fisico;

use com\bydan\contabilidad\inventario\inventario_fisico\presentation\session\inventario_fisico_session;

class inventario_fisico_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?inventario_fisico $inventario_fisico = null;	
	public ?array $inventario_fisicos = array();
	
	/*SESSION*/
	public ?inventario_fisico_session $inventario_fisico_session = null;
	
	/*FKs*/
	

	public bool $con_inventario_fisicosFK=false;
	public array $inventario_fisicosFK=array();
	public int $idinventario_fisicoDefaultFK=-1;

	public bool $con_bodegasFK=false;
	public array $bodegasFK=array();
	public int $idbodegaDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->inventario_fisicos= array();
		$this->inventario_fisico= new inventario_fisico();
		
		/*SESSION*/
		$this->inventario_fisico_session=$this->Session->unserialize(inventario_fisico_util::$STR_SESSION_NAME);

		if($this->inventario_fisico_session==null) {
			$this->inventario_fisico_session=new inventario_fisico_session();
		}
		
		/*FKs*/
		

		$this->con_inventario_fisicosFK=false;
		$this->inventario_fisicosFK=array();
		$this->idinventario_fisicoDefaultFK=-1;

		$this->con_bodegasFK=false;
		$this->bodegasFK=array();
		$this->idbodegaDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getinventario_fisico() : inventario_fisico {	
		return $this->inventario_fisico;
	}
		
	public function setinventario_fisico(inventario_fisico $newinventario_fisico) {
		$this->inventario_fisico = $newinventario_fisico;
	}
	
	public function getinventario_fisicos() : array {		
		return $this->inventario_fisicos;
	}
	
	public function setinventario_fisicos(array $newinventario_fisicos) {
		$this->inventario_fisicos = $newinventario_fisicos;
	}
	
	/*SESSION*/
	public function getinventario_fisico_session() : inventario_fisico_session {	
		return $this->inventario_fisico_session;
	}
		
	public function setinventario_fisico_session(inventario_fisico_session $newinventario_fisico_session) {
		$this->inventario_fisico_session = $newinventario_fisico_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
