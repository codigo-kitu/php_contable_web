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

namespace com\bydan\contabilidad\general\tipo_persona\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\general\tipo_persona\business\entity\tipo_persona;


class tipo_persona_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?tipo_persona $tipo_persona = null;	
	public ?array $tipo_personas = array();
	
	/*SESSION*/
	
	/*FKs*/
	
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->tipo_personas= array();
		$this->tipo_persona= new tipo_persona();
		
		/*SESSION*/
		
		/*FKs*/
		
	} 
	
	/*OBJETO LISTA*/
	public function gettipo_persona() : tipo_persona {	
		return $this->tipo_persona;
	}
		
	public function settipo_persona(tipo_persona $newtipo_persona) {
		$this->tipo_persona = $newtipo_persona;
	}
	
	public function gettipo_personas() : array {		
		return $this->tipo_personas;
	}
	
	public function settipo_personas(array $newtipo_personas) {
		$this->tipo_personas = $newtipo_personas;
	}
	

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
