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

namespace com\bydan\contabilidad\cuentascobrar\cliente\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;

use com\bydan\contabilidad\cuentascobrar\cliente\presentation\session\cliente_session;

class cliente_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?cliente $cliente = null;	
	public ?array $clientes = array();
	
	/*SESSION*/
	public ?cliente_session $cliente_session = null;
	
	/*FKs*/
	

	public bool $con_empresasFK=false;
	public array $empresasFK=array();
	public int $idempresaDefaultFK=-1;

	public bool $con_tipo_personasFK=false;
	public array $tipo_personasFK=array();
	public int $idtipo_personaDefaultFK=-1;

	public bool $con_categoria_clientesFK=false;
	public array $categoria_clientesFK=array();
	public int $idcategoria_clienteDefaultFK=-1;

	public bool $con_tipo_preciosFK=false;
	public array $tipo_preciosFK=array();
	public int $idtipo_precioDefaultFK=-1;

	public bool $con_giro_negocio_clientesFK=false;
	public array $giro_negocio_clientesFK=array();
	public int $idgiro_negocio_clienteDefaultFK=-1;

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

	public bool $con_termino_pago_clientesFK=false;
	public array $termino_pago_clientesFK=array();
	public int $idtermino_pago_clienteDefaultFK=-1;

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
		$this->clientes= array();
		$this->cliente= new cliente();
		
		/*SESSION*/
		$this->cliente_session=$this->Session->unserialize(cliente_util::$STR_SESSION_NAME);

		if($this->cliente_session==null) {
			$this->cliente_session=new cliente_session();
		}
		
		/*FKs*/
		

		$this->con_empresasFK=false;
		$this->empresasFK=array();
		$this->idempresaDefaultFK=-1;

		$this->con_tipo_personasFK=false;
		$this->tipo_personasFK=array();
		$this->idtipo_personaDefaultFK=-1;

		$this->con_categoria_clientesFK=false;
		$this->categoria_clientesFK=array();
		$this->idcategoria_clienteDefaultFK=-1;

		$this->con_tipo_preciosFK=false;
		$this->tipo_preciosFK=array();
		$this->idtipo_precioDefaultFK=-1;

		$this->con_giro_negocio_clientesFK=false;
		$this->giro_negocio_clientesFK=array();
		$this->idgiro_negocio_clienteDefaultFK=-1;

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

		$this->con_termino_pago_clientesFK=false;
		$this->termino_pago_clientesFK=array();
		$this->idtermino_pago_clienteDefaultFK=-1;

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
	public function getcliente() : cliente {	
		return $this->cliente;
	}
		
	public function setcliente(cliente $newcliente) {
		$this->cliente = $newcliente;
	}
	
	public function getclientes() : array {		
		return $this->clientes;
	}
	
	public function setclientes(array $newclientes) {
		$this->clientes = $newclientes;
	}
	
	/*SESSION*/
	public function getcliente_session() : cliente_session {	
		return $this->cliente_session;
	}
		
	public function setcliente_session(cliente_session $newcliente_session) {
		$this->cliente_session = $newcliente_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
