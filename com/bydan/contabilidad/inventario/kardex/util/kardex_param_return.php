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

namespace com\bydan\contabilidad\inventario\kardex\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\inventario\kardex\business\entity\kardex;

use com\bydan\contabilidad\inventario\kardex\presentation\session\kardex_session;

class kardex_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?kardex $kardex = null;	
	public ?array $kardexs = array();
	
	/*SESSION*/
	public ?kardex_session $kardex_session = null;
	
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

	public bool $con_tipo_kardexsFK=false;
	public array $tipo_kardexsFK=array();
	public int $idtipo_kardexDefaultFK=-1;

	public bool $con_proveedorsFK=false;
	public array $proveedorsFK=array();
	public int $idproveedorDefaultFK=-1;

	public bool $con_clientesFK=false;
	public array $clientesFK=array();
	public int $idclienteDefaultFK=-1;

	public bool $con_estadosFK=false;
	public array $estadosFK=array();
	public int $idestadoDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->kardexs= array();
		$this->kardex= new kardex();
		
		/*SESSION*/
		$this->kardex_session=$this->Session->unserialize(kardex_util::$STR_SESSION_NAME);

		if($this->kardex_session==null) {
			$this->kardex_session=new kardex_session();
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

		$this->con_tipo_kardexsFK=false;
		$this->tipo_kardexsFK=array();
		$this->idtipo_kardexDefaultFK=-1;

		$this->con_proveedorsFK=false;
		$this->proveedorsFK=array();
		$this->idproveedorDefaultFK=-1;

		$this->con_clientesFK=false;
		$this->clientesFK=array();
		$this->idclienteDefaultFK=-1;

		$this->con_estadosFK=false;
		$this->estadosFK=array();
		$this->idestadoDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getkardex() : kardex {	
		return $this->kardex;
	}
		
	public function setkardex(kardex $newkardex) {
		$this->kardex = $newkardex;
	}
	
	public function getkardexs() : array {		
		return $this->kardexs;
	}
	
	public function setkardexs(array $newkardexs) {
		$this->kardexs = $newkardexs;
	}
	
	/*SESSION*/
	public function getkardex_session() : kardex_session {	
		return $this->kardex_session;
	}
		
	public function setkardex_session(kardex_session $newkardex_session) {
		$this->kardex_session = $newkardex_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
