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

namespace com\bydan\contabilidad\cuentascorrientes\categoria_cheque\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\business\entity\categoria_cheque;

use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\presentation\session\categoria_cheque_session;

class categoria_cheque_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?categoria_cheque $categoria_cheque = null;	
	public ?array $categoria_cheques = array();
	
	/*SESSION*/
	public ?categoria_cheque_session $categoria_cheque_session = null;
	
	/*FKs*/
	

	public bool $con_empresasFK=false;
	public array $empresasFK=array();
	public int $idempresaDefaultFK=-1;

	public bool $con_cuentasFK=false;
	public array $cuentasFK=array();
	public int $idcuentaDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->categoria_cheques= array();
		$this->categoria_cheque= new categoria_cheque();
		
		/*SESSION*/
		$this->categoria_cheque_session=$this->Session->unserialize(categoria_cheque_util::$STR_SESSION_NAME);

		if($this->categoria_cheque_session==null) {
			$this->categoria_cheque_session=new categoria_cheque_session();
		}
		
		/*FKs*/
		

		$this->con_empresasFK=false;
		$this->empresasFK=array();
		$this->idempresaDefaultFK=-1;

		$this->con_cuentasFK=false;
		$this->cuentasFK=array();
		$this->idcuentaDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getcategoria_cheque() : categoria_cheque {	
		return $this->categoria_cheque;
	}
		
	public function setcategoria_cheque(categoria_cheque $newcategoria_cheque) {
		$this->categoria_cheque = $newcategoria_cheque;
	}
	
	public function getcategoria_cheques() : array {		
		return $this->categoria_cheques;
	}
	
	public function setcategoria_cheques(array $newcategoria_cheques) {
		$this->categoria_cheques = $newcategoria_cheques;
	}
	
	/*SESSION*/
	public function getcategoria_cheque_session() : categoria_cheque_session {	
		return $this->categoria_cheque_session;
	}
		
	public function setcategoria_cheque_session(categoria_cheque_session $newcategoria_cheque_session) {
		$this->categoria_cheque_session = $newcategoria_cheque_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
