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

namespace com\bydan\contabilidad\facturacion\parametro_facturacion\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\facturacion\parametro_facturacion\business\entity\parametro_facturacion;

use com\bydan\contabilidad\facturacion\parametro_facturacion\presentation\session\parametro_facturacion_session;

class parametro_facturacion_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?parametro_facturacion $parametro_facturacion = null;	
	public ?array $parametro_facturacions = array();
	
	/*SESSION*/
	public ?parametro_facturacion_session $parametro_facturacion_session = null;
	
	/*FKs*/
	

	public bool $con_empresasFK=false;
	public array $empresasFK=array();
	public int $idempresaDefaultFK=-1;

	public bool $con_termino_pago_clientesFK=false;
	public array $termino_pago_clientesFK=array();
	public int $idtermino_pago_clienteDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->parametro_facturacions= array();
		$this->parametro_facturacion= new parametro_facturacion();
		
		/*SESSION*/
		$this->parametro_facturacion_session=$this->Session->unserialize(parametro_facturacion_util::$STR_SESSION_NAME);

		if($this->parametro_facturacion_session==null) {
			$this->parametro_facturacion_session=new parametro_facturacion_session();
		}
		
		/*FKs*/
		

		$this->con_empresasFK=false;
		$this->empresasFK=array();
		$this->idempresaDefaultFK=-1;

		$this->con_termino_pago_clientesFK=false;
		$this->termino_pago_clientesFK=array();
		$this->idtermino_pago_clienteDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getparametro_facturacion() : parametro_facturacion {	
		return $this->parametro_facturacion;
	}
		
	public function setparametro_facturacion(parametro_facturacion $newparametro_facturacion) {
		$this->parametro_facturacion = $newparametro_facturacion;
	}
	
	public function getparametro_facturacions() : array {		
		return $this->parametro_facturacions;
	}
	
	public function setparametro_facturacions(array $newparametro_facturacions) {
		$this->parametro_facturacions = $newparametro_facturacions;
	}
	
	/*SESSION*/
	public function getparametro_facturacion_session() : parametro_facturacion_session {	
		return $this->parametro_facturacion_session;
	}
		
	public function setparametro_facturacion_session(parametro_facturacion_session $newparametro_facturacion_session) {
		$this->parametro_facturacion_session = $newparametro_facturacion_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
