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

namespace com\bydan\contabilidad\general\tipo_costeo_kardex\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\general\tipo_costeo_kardex\business\entity\tipo_costeo_kardex;


class tipo_costeo_kardex_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?tipo_costeo_kardex $tipo_costeo_kardex = null;	
	public ?array $tipo_costeo_kardexs = array();
	
	/*SESSION*/
	
	/*FKs*/
	
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->tipo_costeo_kardexs= array();
		$this->tipo_costeo_kardex= new tipo_costeo_kardex();
		
		/*SESSION*/
		
		/*FKs*/
		
	} 
	
	/*OBJETO LISTA*/
	public function gettipo_costeo_kardex() : tipo_costeo_kardex {	
		return $this->tipo_costeo_kardex;
	}
		
	public function settipo_costeo_kardex(tipo_costeo_kardex $newtipo_costeo_kardex) {
		$this->tipo_costeo_kardex = $newtipo_costeo_kardex;
	}
	
	public function gettipo_costeo_kardexs() : array {		
		return $this->tipo_costeo_kardexs;
	}
	
	public function settipo_costeo_kardexs(array $newtipo_costeo_kardexs) {
		$this->tipo_costeo_kardexs = $newtipo_costeo_kardexs;
	}
	

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
