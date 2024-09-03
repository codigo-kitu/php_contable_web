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

namespace com\bydan\contabilidad\general\parametro_auxiliar_facturacion\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\general\parametro_auxiliar_facturacion\business\entity\parametro_auxiliar_facturacion;

use com\bydan\contabilidad\general\parametro_auxiliar_facturacion\presentation\session\parametro_auxiliar_facturacion_session;

class parametro_auxiliar_facturacion_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?parametro_auxiliar_facturacion $parametro_auxiliar_facturacion = null;	
	public ?array $parametro_auxiliar_facturacions = array();
	
	/*SESSION*/
	public ?parametro_auxiliar_facturacion_session $parametro_auxiliar_facturacion_session = null;
	
	/*FKs*/
	

	public bool $con_empresasFK=false;
	public array $empresasFK=array();
	public int $idempresaDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->parametro_auxiliar_facturacions= array();
		$this->parametro_auxiliar_facturacion= new parametro_auxiliar_facturacion();
		
		/*SESSION*/
		$this->parametro_auxiliar_facturacion_session=$this->Session->unserialize(parametro_auxiliar_facturacion_util::$STR_SESSION_NAME);

		if($this->parametro_auxiliar_facturacion_session==null) {
			$this->parametro_auxiliar_facturacion_session=new parametro_auxiliar_facturacion_session();
		}
		
		/*FKs*/
		

		$this->con_empresasFK=false;
		$this->empresasFK=array();
		$this->idempresaDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getparametro_auxiliar_facturacion() : parametro_auxiliar_facturacion {	
		return $this->parametro_auxiliar_facturacion;
	}
		
	public function setparametro_auxiliar_facturacion(parametro_auxiliar_facturacion $newparametro_auxiliar_facturacion) {
		$this->parametro_auxiliar_facturacion = $newparametro_auxiliar_facturacion;
	}
	
	public function getparametro_auxiliar_facturacions() : array {		
		return $this->parametro_auxiliar_facturacions;
	}
	
	public function setparametro_auxiliar_facturacions(array $newparametro_auxiliar_facturacions) {
		$this->parametro_auxiliar_facturacions = $newparametro_auxiliar_facturacions;
	}
	
	/*SESSION*/
	public function getparametro_auxiliar_facturacion_session() : parametro_auxiliar_facturacion_session {	
		return $this->parametro_auxiliar_facturacion_session;
	}
		
	public function setparametro_auxiliar_facturacion_session(parametro_auxiliar_facturacion_session $newparametro_auxiliar_facturacion_session) {
		$this->parametro_auxiliar_facturacion_session = $newparametro_auxiliar_facturacion_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
