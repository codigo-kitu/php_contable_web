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

namespace com\bydan\contabilidad\general\estado\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\general\estado\business\entity\estado;


class estado_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?estado $estado = null;	
	public ?array $estados = array();
	
	/*SESSION*/
	
	/*FKs*/
	
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->estados= array();
		$this->estado= new estado();
		
		/*SESSION*/
		
		/*FKs*/
		
	} 
	
	/*OBJETO LISTA*/
	public function getestado() : estado {	
		return $this->estado;
	}
		
	public function setestado(estado $newestado) {
		$this->estado = $newestado;
	}
	
	public function getestados() : array {		
		return $this->estados;
	}
	
	public function setestados(array $newestados) {
		$this->estados = $newestados;
	}
	

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
