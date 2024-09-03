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

namespace com\bydan\contabilidad\cuentaspagar\proveedor\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;

use com\bydan\contabilidad\cuentaspagar\proveedor\presentation\session\proveedor_session;

class proveedor_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?proveedor $proveedor = null;	
	public ?array $proveedors = array();
	
	/*SESSION*/
	public ?proveedor_session $proveedor_session = null;
	
	/*FKs*/
	

	public bool $con_empresasFK=false;
	public array $empresasFK=array();
	public int $idempresaDefaultFK=-1;

	public bool $con_tipo_personasFK=false;
	public array $tipo_personasFK=array();
	public int $idtipo_personaDefaultFK=-1;

	public bool $con_categoria_proveedorsFK=false;
	public array $categoria_proveedorsFK=array();
	public int $idcategoria_proveedorDefaultFK=-1;

	public bool $con_giro_negocio_proveedorsFK=false;
	public array $giro_negocio_proveedorsFK=array();
	public int $idgiro_negocio_proveedorDefaultFK=-1;

	public bool $con_paissFK=false;
	public array $paissFK=array();
	public int $idpaisDefaultFK=-1;

	public bool $con_provinciasFK=false;
	public array $provinciasFK=array();
	public int $idprovinciaDefaultFK=-1;

	public bool $con_ciudadsFK=false;
	public array $ciudadsFK=array();
	public int $idciudadDefaultFK=-1;

	public bool $con_vendedorsFK=false;
	public array $vendedorsFK=array();
	public int $idvendedorDefaultFK=-1;

	public bool $con_termino_pago_proveedorsFK=false;
	public array $termino_pago_proveedorsFK=array();
	public int $idtermino_pago_proveedorDefaultFK=-1;

	public bool $con_cuentasFK=false;
	public array $cuentasFK=array();
	public int $idcuentaDefaultFK=-1;

	public bool $con_impuestosFK=false;
	public array $impuestosFK=array();
	public int $idimpuestoDefaultFK=-1;

	public bool $con_retencionsFK=false;
	public array $retencionsFK=array();
	public int $idretencionDefaultFK=-1;

	public bool $con_retencion_fuentesFK=false;
	public array $retencion_fuentesFK=array();
	public int $idretencion_fuenteDefaultFK=-1;

	public bool $con_retencion_icasFK=false;
	public array $retencion_icasFK=array();
	public int $idretencion_icaDefaultFK=-1;

	public bool $con_otro_impuestosFK=false;
	public array $otro_impuestosFK=array();
	public int $idotro_impuestoDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->proveedors= array();
		$this->proveedor= new proveedor();
		
		/*SESSION*/
		$this->proveedor_session=$this->Session->unserialize(proveedor_util::$STR_SESSION_NAME);

		if($this->proveedor_session==null) {
			$this->proveedor_session=new proveedor_session();
		}
		
		/*FKs*/
		

		$this->con_empresasFK=false;
		$this->empresasFK=array();
		$this->idempresaDefaultFK=-1;

		$this->con_tipo_personasFK=false;
		$this->tipo_personasFK=array();
		$this->idtipo_personaDefaultFK=-1;

		$this->con_categoria_proveedorsFK=false;
		$this->categoria_proveedorsFK=array();
		$this->idcategoria_proveedorDefaultFK=-1;

		$this->con_giro_negocio_proveedorsFK=false;
		$this->giro_negocio_proveedorsFK=array();
		$this->idgiro_negocio_proveedorDefaultFK=-1;

		$this->con_paissFK=false;
		$this->paissFK=array();
		$this->idpaisDefaultFK=-1;

		$this->con_provinciasFK=false;
		$this->provinciasFK=array();
		$this->idprovinciaDefaultFK=-1;

		$this->con_ciudadsFK=false;
		$this->ciudadsFK=array();
		$this->idciudadDefaultFK=-1;

		$this->con_vendedorsFK=false;
		$this->vendedorsFK=array();
		$this->idvendedorDefaultFK=-1;

		$this->con_termino_pago_proveedorsFK=false;
		$this->termino_pago_proveedorsFK=array();
		$this->idtermino_pago_proveedorDefaultFK=-1;

		$this->con_cuentasFK=false;
		$this->cuentasFK=array();
		$this->idcuentaDefaultFK=-1;

		$this->con_impuestosFK=false;
		$this->impuestosFK=array();
		$this->idimpuestoDefaultFK=-1;

		$this->con_retencionsFK=false;
		$this->retencionsFK=array();
		$this->idretencionDefaultFK=-1;

		$this->con_retencion_fuentesFK=false;
		$this->retencion_fuentesFK=array();
		$this->idretencion_fuenteDefaultFK=-1;

		$this->con_retencion_icasFK=false;
		$this->retencion_icasFK=array();
		$this->idretencion_icaDefaultFK=-1;

		$this->con_otro_impuestosFK=false;
		$this->otro_impuestosFK=array();
		$this->idotro_impuestoDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getproveedor() : proveedor {	
		return $this->proveedor;
	}
		
	public function setproveedor(proveedor $newproveedor) {
		$this->proveedor = $newproveedor;
	}
	
	public function getproveedors() : array {		
		return $this->proveedors;
	}
	
	public function setproveedors(array $newproveedors) {
		$this->proveedors = $newproveedors;
	}
	
	/*SESSION*/
	public function getproveedor_session() : proveedor_session {	
		return $this->proveedor_session;
	}
		
	public function setproveedor_session(proveedor_session $newproveedor_session) {
		$this->proveedor_session = $newproveedor_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
