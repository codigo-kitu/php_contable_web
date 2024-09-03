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

namespace com\bydan\contabilidad\inventario\tipo_kardex\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\inventario\tipo_kardex\business\entity\tipo_kardex;

use com\bydan\contabilidad\inventario\tipo_kardex\presentation\session\tipo_kardex_session;

class tipo_kardex_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?tipo_kardex $tipo_kardex = null;	
	public ?array $tipo_kardexs = array();
	
	/*SESSION*/
	public ?tipo_kardex_session $tipo_kardex_session = null;
	
	/*FKs*/
	
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->tipo_kardexs= array();
		$this->tipo_kardex= new tipo_kardex();
		
		/*SESSION*/
		$this->tipo_kardex_session=$this->Session->unserialize(tipo_kardex_util::$STR_SESSION_NAME);

		if($this->tipo_kardex_session==null) {
			$this->tipo_kardex_session=new tipo_kardex_session();
		}
		
		/*FKs*/
		
	} 
	
	/*OBJETO LISTA*/
	public function gettipo_kardex() : tipo_kardex {	
		return $this->tipo_kardex;
	}
		
	public function settipo_kardex(tipo_kardex $newtipo_kardex) {
		$this->tipo_kardex = $newtipo_kardex;
	}
	
	public function gettipo_kardexs() : array {		
		return $this->tipo_kardexs;
	}
	
	public function settipo_kardexs(array $newtipo_kardexs) {
		$this->tipo_kardexs = $newtipo_kardexs;
	}
	
	/*SESSION*/
	public function gettipo_kardex_session() : tipo_kardex_session {	
		return $this->tipo_kardex_session;
	}
		
	public function settipo_kardex_session(tipo_kardex_session $newtipo_kardex_session) {
		$this->tipo_kardex_session = $newtipo_kardex_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
