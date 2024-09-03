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

namespace com\bydan\contabilidad\general\parametro_sql\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\general\parametro_sql\business\entity\parametro_sql;

use com\bydan\contabilidad\general\parametro_sql\presentation\session\parametro_sql_session;

class parametro_sql_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?parametro_sql $parametro_sql = null;	
	public ?array $parametro_sqls = array();
	
	/*SESSION*/
	public ?parametro_sql_session $parametro_sql_session = null;
	
	/*FKs*/
	
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->parametro_sqls= array();
		$this->parametro_sql= new parametro_sql();
		
		/*SESSION*/
		$this->parametro_sql_session=$this->Session->unserialize(parametro_sql_util::$STR_SESSION_NAME);

		if($this->parametro_sql_session==null) {
			$this->parametro_sql_session=new parametro_sql_session();
		}
		
		/*FKs*/
		
	} 
	
	/*OBJETO LISTA*/
	public function getparametro_sql() : parametro_sql {	
		return $this->parametro_sql;
	}
		
	public function setparametro_sql(parametro_sql $newparametro_sql) {
		$this->parametro_sql = $newparametro_sql;
	}
	
	public function getparametro_sqls() : array {		
		return $this->parametro_sqls;
	}
	
	public function setparametro_sqls(array $newparametro_sqls) {
		$this->parametro_sqls = $newparametro_sqls;
	}
	
	/*SESSION*/
	public function getparametro_sql_session() : parametro_sql_session {	
		return $this->parametro_sql_session;
	}
		
	public function setparametro_sql_session(parametro_sql_session $newparametro_sql_session) {
		$this->parametro_sql_session = $newparametro_sql_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
