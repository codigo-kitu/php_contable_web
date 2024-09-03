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

namespace com\bydan\contabilidad\contabilidad\asiento\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\contabilidad\asiento\business\entity\asiento;

use com\bydan\contabilidad\contabilidad\asiento\presentation\session\asiento_session;

class asiento_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?asiento $asiento = null;	
	public ?array $asientos = array();
	
	/*SESSION*/
	public ?asiento_session $asiento_session = null;
	
	/*FKs*/
	

	public bool $con_empresasFK=false;
	public array $empresasFK=array();
	public int $idempresaDefaultFK=-1;

	public bool $con_sucursalsFK=false;
	public array $sucursalsFK=array();
	public int $idsucursalDefaultFK=-1;

	public bool $con_ejerciciosFK=false;
	public array $ejerciciosFK=array();
	public int $idejercicioDefaultFK=-1;

	public bool $con_periodosFK=false;
	public array $periodosFK=array();
	public int $idperiodoDefaultFK=-1;

	public bool $con_usuariosFK=false;
	public array $usuariosFK=array();
	public int $idusuarioDefaultFK=-1;

	public bool $con_asiento_predefinidosFK=false;
	public array $asiento_predefinidosFK=array();
	public int $idasiento_predefinidoDefaultFK=-1;

	public bool $con_documento_contablesFK=false;
	public array $documento_contablesFK=array();
	public int $iddocumento_contableDefaultFK=-1;

	public bool $con_libro_auxiliarsFK=false;
	public array $libro_auxiliarsFK=array();
	public int $idlibro_auxiliarDefaultFK=-1;

	public bool $con_fuentesFK=false;
	public array $fuentesFK=array();
	public int $idfuenteDefaultFK=-1;

	public bool $con_centro_costosFK=false;
	public array $centro_costosFK=array();
	public int $idcentro_costoDefaultFK=-1;

	public bool $con_estadosFK=false;
	public array $estadosFK=array();
	public int $idestadoDefaultFK=-1;

	public bool $con_documento_contable_origensFK=false;
	public array $documento_contable_origensFK=array();
	public int $iddocumento_contable_origenDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->asientos= array();
		$this->asiento= new asiento();
		
		/*SESSION*/
		$this->asiento_session=$this->Session->unserialize(asiento_util::$STR_SESSION_NAME);

		if($this->asiento_session==null) {
			$this->asiento_session=new asiento_session();
		}
		
		/*FKs*/
		

		$this->con_empresasFK=false;
		$this->empresasFK=array();
		$this->idempresaDefaultFK=-1;

		$this->con_sucursalsFK=false;
		$this->sucursalsFK=array();
		$this->idsucursalDefaultFK=-1;

		$this->con_ejerciciosFK=false;
		$this->ejerciciosFK=array();
		$this->idejercicioDefaultFK=-1;

		$this->con_periodosFK=false;
		$this->periodosFK=array();
		$this->idperiodoDefaultFK=-1;

		$this->con_usuariosFK=false;
		$this->usuariosFK=array();
		$this->idusuarioDefaultFK=-1;

		$this->con_asiento_predefinidosFK=false;
		$this->asiento_predefinidosFK=array();
		$this->idasiento_predefinidoDefaultFK=-1;

		$this->con_documento_contablesFK=false;
		$this->documento_contablesFK=array();
		$this->iddocumento_contableDefaultFK=-1;

		$this->con_libro_auxiliarsFK=false;
		$this->libro_auxiliarsFK=array();
		$this->idlibro_auxiliarDefaultFK=-1;

		$this->con_fuentesFK=false;
		$this->fuentesFK=array();
		$this->idfuenteDefaultFK=-1;

		$this->con_centro_costosFK=false;
		$this->centro_costosFK=array();
		$this->idcentro_costoDefaultFK=-1;

		$this->con_estadosFK=false;
		$this->estadosFK=array();
		$this->idestadoDefaultFK=-1;

		$this->con_documento_contable_origensFK=false;
		$this->documento_contable_origensFK=array();
		$this->iddocumento_contable_origenDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getasiento() : asiento {	
		return $this->asiento;
	}
		
	public function setasiento(asiento $newasiento) {
		$this->asiento = $newasiento;
	}
	
	public function getasientos() : array {		
		return $this->asientos;
	}
	
	public function setasientos(array $newasientos) {
		$this->asientos = $newasientos;
	}
	
	/*SESSION*/
	public function getasiento_session() : asiento_session {	
		return $this->asiento_session;
	}
		
	public function setasiento_session(asiento_session $newasiento_session) {
		$this->asiento_session = $newasiento_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
