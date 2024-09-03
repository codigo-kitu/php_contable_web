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

namespace com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\business\entity\clasificacion_cheque;

use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\presentation\session\clasificacion_cheque_session;

class clasificacion_cheque_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?clasificacion_cheque $clasificacion_cheque = null;	
	public ?array $clasificacion_cheques = array();
	
	/*SESSION*/
	public ?clasificacion_cheque_session $clasificacion_cheque_session = null;
	
	/*FKs*/
	

	public bool $con_cuenta_corriente_detallesFK=false;
	public array $cuenta_corriente_detallesFK=array();
	public int $idcuenta_corriente_detalleDefaultFK=-1;

	public bool $con_categoria_chequesFK=false;
	public array $categoria_chequesFK=array();
	public int $idcategoria_chequeDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->clasificacion_cheques= array();
		$this->clasificacion_cheque= new clasificacion_cheque();
		
		/*SESSION*/
		$this->clasificacion_cheque_session=$this->Session->unserialize(clasificacion_cheque_util::$STR_SESSION_NAME);

		if($this->clasificacion_cheque_session==null) {
			$this->clasificacion_cheque_session=new clasificacion_cheque_session();
		}
		
		/*FKs*/
		

		$this->con_cuenta_corriente_detallesFK=false;
		$this->cuenta_corriente_detallesFK=array();
		$this->idcuenta_corriente_detalleDefaultFK=-1;

		$this->con_categoria_chequesFK=false;
		$this->categoria_chequesFK=array();
		$this->idcategoria_chequeDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getclasificacion_cheque() : clasificacion_cheque {	
		return $this->clasificacion_cheque;
	}
		
	public function setclasificacion_cheque(clasificacion_cheque $newclasificacion_cheque) {
		$this->clasificacion_cheque = $newclasificacion_cheque;
	}
	
	public function getclasificacion_cheques() : array {		
		return $this->clasificacion_cheques;
	}
	
	public function setclasificacion_cheques(array $newclasificacion_cheques) {
		$this->clasificacion_cheques = $newclasificacion_cheques;
	}
	
	/*SESSION*/
	public function getclasificacion_cheque_session() : clasificacion_cheque_session {	
		return $this->clasificacion_cheque_session;
	}
		
	public function setclasificacion_cheque_session(clasificacion_cheque_session $newclasificacion_cheque_session) {
		$this->clasificacion_cheque_session = $newclasificacion_cheque_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
