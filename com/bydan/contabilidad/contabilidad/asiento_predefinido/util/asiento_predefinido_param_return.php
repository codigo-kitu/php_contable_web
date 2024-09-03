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

namespace com\bydan\contabilidad\contabilidad\asiento_predefinido\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\contabilidad\asiento_predefinido\business\entity\asiento_predefinido;

use com\bydan\contabilidad\contabilidad\asiento_predefinido\presentation\session\asiento_predefinido_session;

class asiento_predefinido_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?asiento_predefinido $asiento_predefinido = null;	
	public ?array $asiento_predefinidos = array();
	
	/*SESSION*/
	public ?asiento_predefinido_session $asiento_predefinido_session = null;
	
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

	public bool $con_modulosFK=false;
	public array $modulosFK=array();
	public int $idmoduloDefaultFK=-1;

	public bool $con_fuentesFK=false;
	public array $fuentesFK=array();
	public int $idfuenteDefaultFK=-1;

	public bool $con_libro_auxiliarsFK=false;
	public array $libro_auxiliarsFK=array();
	public int $idlibro_auxiliarDefaultFK=-1;

	public bool $con_centro_costosFK=false;
	public array $centro_costosFK=array();
	public int $idcentro_costoDefaultFK=-1;

	public bool $con_documento_contablesFK=false;
	public array $documento_contablesFK=array();
	public int $iddocumento_contableDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->asiento_predefinidos= array();
		$this->asiento_predefinido= new asiento_predefinido();
		
		/*SESSION*/
		$this->asiento_predefinido_session=$this->Session->unserialize(asiento_predefinido_util::$STR_SESSION_NAME);

		if($this->asiento_predefinido_session==null) {
			$this->asiento_predefinido_session=new asiento_predefinido_session();
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

		$this->con_modulosFK=false;
		$this->modulosFK=array();
		$this->idmoduloDefaultFK=-1;

		$this->con_fuentesFK=false;
		$this->fuentesFK=array();
		$this->idfuenteDefaultFK=-1;

		$this->con_libro_auxiliarsFK=false;
		$this->libro_auxiliarsFK=array();
		$this->idlibro_auxiliarDefaultFK=-1;

		$this->con_centro_costosFK=false;
		$this->centro_costosFK=array();
		$this->idcentro_costoDefaultFK=-1;

		$this->con_documento_contablesFK=false;
		$this->documento_contablesFK=array();
		$this->iddocumento_contableDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getasiento_predefinido() : asiento_predefinido {	
		return $this->asiento_predefinido;
	}
		
	public function setasiento_predefinido(asiento_predefinido $newasiento_predefinido) {
		$this->asiento_predefinido = $newasiento_predefinido;
	}
	
	public function getasiento_predefinidos() : array {		
		return $this->asiento_predefinidos;
	}
	
	public function setasiento_predefinidos(array $newasiento_predefinidos) {
		$this->asiento_predefinidos = $newasiento_predefinidos;
	}
	
	/*SESSION*/
	public function getasiento_predefinido_session() : asiento_predefinido_session {	
		return $this->asiento_predefinido_session;
	}
		
	public function setasiento_predefinido_session(asiento_predefinido_session $newasiento_predefinido_session) {
		$this->asiento_predefinido_session = $newasiento_predefinido_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
