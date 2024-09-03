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

namespace com\bydan\contabilidad\inventario\parametro_inventario\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\inventario\parametro_inventario\business\entity\parametro_inventario;

use com\bydan\contabilidad\inventario\parametro_inventario\presentation\session\parametro_inventario_session;

class parametro_inventario_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?parametro_inventario $parametro_inventario = null;	
	public ?array $parametro_inventarios = array();
	
	/*SESSION*/
	public ?parametro_inventario_session $parametro_inventario_session = null;
	
	/*FKs*/
	

	public bool $con_empresasFK=false;
	public array $empresasFK=array();
	public int $idempresaDefaultFK=-1;

	public bool $con_termino_pago_proveedorsFK=false;
	public array $termino_pago_proveedorsFK=array();
	public int $idtermino_pago_proveedorDefaultFK=-1;

	public bool $con_tipo_costeo_kardexsFK=false;
	public array $tipo_costeo_kardexsFK=array();
	public int $idtipo_costeo_kardexDefaultFK=-1;

	public bool $con_tipo_kardexsFK=false;
	public array $tipo_kardexsFK=array();
	public int $idtipo_kardexDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->parametro_inventarios= array();
		$this->parametro_inventario= new parametro_inventario();
		
		/*SESSION*/
		$this->parametro_inventario_session=$this->Session->unserialize(parametro_inventario_util::$STR_SESSION_NAME);

		if($this->parametro_inventario_session==null) {
			$this->parametro_inventario_session=new parametro_inventario_session();
		}
		
		/*FKs*/
		

		$this->con_empresasFK=false;
		$this->empresasFK=array();
		$this->idempresaDefaultFK=-1;

		$this->con_termino_pago_proveedorsFK=false;
		$this->termino_pago_proveedorsFK=array();
		$this->idtermino_pago_proveedorDefaultFK=-1;

		$this->con_tipo_costeo_kardexsFK=false;
		$this->tipo_costeo_kardexsFK=array();
		$this->idtipo_costeo_kardexDefaultFK=-1;

		$this->con_tipo_kardexsFK=false;
		$this->tipo_kardexsFK=array();
		$this->idtipo_kardexDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getparametro_inventario() : parametro_inventario {	
		return $this->parametro_inventario;
	}
		
	public function setparametro_inventario(parametro_inventario $newparametro_inventario) {
		$this->parametro_inventario = $newparametro_inventario;
	}
	
	public function getparametro_inventarios() : array {		
		return $this->parametro_inventarios;
	}
	
	public function setparametro_inventarios(array $newparametro_inventarios) {
		$this->parametro_inventarios = $newparametro_inventarios;
	}
	
	/*SESSION*/
	public function getparametro_inventario_session() : parametro_inventario_session {	
		return $this->parametro_inventario_session;
	}
		
	public function setparametro_inventario_session(parametro_inventario_session $newparametro_inventario_session) {
		$this->parametro_inventario_session = $newparametro_inventario_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
