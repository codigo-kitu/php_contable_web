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

namespace com\bydan\contabilidad\inventario\imagen_kardex\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\inventario\imagen_kardex\business\entity\imagen_kardex;

use com\bydan\contabilidad\inventario\imagen_kardex\presentation\session\imagen_kardex_session;

class imagen_kardex_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?imagen_kardex $imagen_kardex = null;	
	public ?array $imagen_kardexs = array();
	
	/*SESSION*/
	public ?imagen_kardex_session $imagen_kardex_session = null;
	
	/*FKs*/
	
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->imagen_kardexs= array();
		$this->imagen_kardex= new imagen_kardex();
		
		/*SESSION*/
		$this->imagen_kardex_session=$this->Session->unserialize(imagen_kardex_util::$STR_SESSION_NAME);

		if($this->imagen_kardex_session==null) {
			$this->imagen_kardex_session=new imagen_kardex_session();
		}
		
		/*FKs*/
		
	} 
	
	/*OBJETO LISTA*/
	public function getimagen_kardex() : imagen_kardex {	
		return $this->imagen_kardex;
	}
		
	public function setimagen_kardex(imagen_kardex $newimagen_kardex) {
		$this->imagen_kardex = $newimagen_kardex;
	}
	
	public function getimagen_kardexs() : array {		
		return $this->imagen_kardexs;
	}
	
	public function setimagen_kardexs(array $newimagen_kardexs) {
		$this->imagen_kardexs = $newimagen_kardexs;
	}
	
	/*SESSION*/
	public function getimagen_kardex_session() : imagen_kardex_session {	
		return $this->imagen_kardex_session;
	}
		
	public function setimagen_kardex_session(imagen_kardex_session $newimagen_kardex_session) {
		$this->imagen_kardex_session = $newimagen_kardex_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
