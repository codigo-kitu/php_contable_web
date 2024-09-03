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

namespace com\bydan\contabilidad\seguridad\parametro_general_usuario\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\seguridad\parametro_general_usuario\util\parametro_general_usuario_carga;
use com\bydan\contabilidad\seguridad\parametro_general_usuario\util\parametro_general_usuario_param_return;

use com\bydan\contabilidad\seguridad\parametro_general_usuario\presentation\session\parametro_general_usuario_session;

use com\bydan\framework\contabilidad\util\Connexion;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\ParameterDbType;


use com\bydan\framework\contabilidad\util\ParameterType;
use com\bydan\framework\contabilidad\util\ParameterTypeOperator;
use com\bydan\framework\contabilidad\business\logic\ParameterSelectionGeneral;

use com\bydan\framework\contabilidad\util\PaqueteTipo;
use com\bydan\framework\contabilidad\util\DeepLoadType;
use com\bydan\framework\contabilidad\util\EventoTipo;
use com\bydan\framework\contabilidad\util\EventoSubTipo;
use com\bydan\framework\contabilidad\util\ControlTipo;
use com\bydan\framework\contabilidad\util\EventoGlobalTipo;
use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\DatoGeneralMinimo;
use com\bydan\framework\contabilidad\business\logic\DatosCliente;
use com\bydan\framework\contabilidad\business\logic\DatosDeep;
use com\bydan\framework\contabilidad\business\logic\Pagination;
use com\bydan\framework\contabilidad\business\logic\QueryWhereSelectParameters;

use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;

use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
use com\bydan\contabilidad\seguridad\opcion\business\entity\opcion;
use com\bydan\contabilidad\seguridad\auditoria\business\entity\auditoria;

use com\bydan\contabilidad\seguridad\parametro_general_usuario\util\parametro_general_usuario_util;
use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\data\parametro_general_usuario_data;

//FK


use com\bydan\contabilidad\seguridad\usuario\business\data\usuario_data;
use com\bydan\contabilidad\seguridad\usuario\business\logic\usuario_logic;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

use com\bydan\contabilidad\seguridad\tipo_fondo\business\entity\tipo_fondo;
use com\bydan\contabilidad\seguridad\tipo_fondo\business\data\tipo_fondo_data;
use com\bydan\contabilidad\seguridad\tipo_fondo\business\logic\tipo_fondo_logic;
use com\bydan\contabilidad\seguridad\tipo_fondo\util\tipo_fondo_util;

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;
use com\bydan\contabilidad\general\sucursal\business\data\sucursal_data;
use com\bydan\contabilidad\general\sucursal\business\logic\sucursal_logic;
use com\bydan\contabilidad\general\sucursal\util\sucursal_util;

use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;
use com\bydan\contabilidad\contabilidad\ejercicio\business\data\ejercicio_data;
use com\bydan\contabilidad\contabilidad\ejercicio\business\logic\ejercicio_logic;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_util;

use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;
use com\bydan\contabilidad\contabilidad\periodo\business\data\periodo_data;
use com\bydan\contabilidad\contabilidad\periodo\business\logic\periodo_logic;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_util;

//REL


//REL DETALLES




class parametro_general_usuario_logic  extends GeneralEntityLogic implements parametro_general_usuario_logicI {	
	/*GENERAL*/
	public parametro_general_usuario_data $parametro_general_usuarioDataAccess;
	//public ?parametro_general_usuario_logic_add $parametro_general_usuarioLogicAdditional=null;
	public ?parametro_general_usuario $parametro_general_usuario;
	public array $parametro_general_usuarios;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->parametro_general_usuarioDataAccess = new parametro_general_usuario_data();			
			$this->parametro_general_usuarios = array();
			$this->parametro_general_usuario = new parametro_general_usuario();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->parametro_general_usuarioLogicAdditional = new parametro_general_usuario_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->parametro_general_usuarioLogicAdditional==null) {
		//	$this->parametro_general_usuarioLogicAdditional=new parametro_general_usuario_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->parametro_general_usuarioDataAccess->executeQuery($this->connexion, $sQueryExecute);			
			$this->connexion->getConnection()->commit();
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	public function executeQuery(string $sQueryExecute) {
		try {			
			$this->parametro_general_usuarioDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->parametro_general_usuarioDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
			$this->connexion->getConnection()->commit();							
			return $valor;	
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} finally {
			$this->connexion->getConnection()->close();			
		}
	}
	
	public function executeQueryValor(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$valor=$this->parametro_general_usuarioDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->parametro_general_usuarios = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_general_usuarios=$this->parametro_general_usuarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_general_usuario_util::refrescarFKDescripciones($this->parametro_general_usuarios);
			}
			
			//parametro_general_usuario_logic_add::checkparametro_general_usuarioToGets($this->parametro_general_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_general_usuarios);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->parametro_general_usuarios = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_general_usuarios=$this->parametro_general_usuarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_general_usuario_util::refrescarFKDescripciones($this->parametro_general_usuarios);
			}
			
			//parametro_general_usuario_logic_add::checkparametro_general_usuarioToGets($this->parametro_general_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_general_usuarios);
			$this->connexion->getConnection()->commit();						
			
		}  catch(Exception $e) {
			$this->connexion->getConnection()->rollback();								
			Funciones::logShowExceptionMessages($e);
			throw $e;			      	
		} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*TRAER UN OBJETO*/
	public function getEntityWithConnection(?int $id)  {
		$this->parametro_general_usuario = new parametro_general_usuario();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->parametro_general_usuario=$this->parametro_general_usuarioDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_general_usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_general_usuario_util::refrescarFKDescripcion($this->parametro_general_usuario);
			}
						
			//parametro_general_usuario_logic_add::checkparametro_general_usuarioToGet($this->parametro_general_usuario,$this->datosCliente);
			//parametro_general_usuario_logic_add::updateparametro_general_usuarioToGet($this->parametro_general_usuario);
			$this->connexion->getConnection()->commit();								
			
		}  catch(Exception $e) {
			$this->connexion->getConnection()->rollback();						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	public function getEntity(?int $id)  {
		$this->parametro_general_usuario = new  parametro_general_usuario();
		  		  
        try {		
			$this->parametro_general_usuario=$this->parametro_general_usuarioDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_general_usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_general_usuario_util::refrescarFKDescripcion($this->parametro_general_usuario);
			}
			
			//parametro_general_usuario_logic_add::checkparametro_general_usuarioToGet($this->parametro_general_usuario,$this->datosCliente);
			//parametro_general_usuario_logic_add::updateparametro_general_usuarioToGet($this->parametro_general_usuario);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?parametro_general_usuario {
		$parametro_general_usuarioLogic = new  parametro_general_usuario_logic();
		  		  
        try {		
			$parametro_general_usuarioLogic->setConnexion($connexion);			
			$parametro_general_usuarioLogic->getEntity($id);			
			return $parametro_general_usuarioLogic->getparametro_general_usuario();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->parametro_general_usuario = new  parametro_general_usuario();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->parametro_general_usuario=$this->parametro_general_usuarioDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_general_usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_general_usuario_util::refrescarFKDescripcion($this->parametro_general_usuario);
			}
			
			//parametro_general_usuario_logic_add::checkparametro_general_usuarioToGet($this->parametro_general_usuario,$this->datosCliente);
			//parametro_general_usuario_logic_add::updateparametro_general_usuarioToGet($this->parametro_general_usuario);
			$this->connexion->getConnection()->commit();								
			
		}  catch(Exception $e) {
			$this->connexion->getConnection()->rollback();			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	public function getEntityWithFinalQuery(string $strFinalQuery='')  {
		$this->parametro_general_usuario = new  parametro_general_usuario();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_general_usuario=$this->parametro_general_usuarioDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_general_usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_general_usuario_util::refrescarFKDescripcion($this->parametro_general_usuario);
			}
			
			//parametro_general_usuario_logic_add::checkparametro_general_usuarioToGet($this->parametro_general_usuario,$this->datosCliente);
			//parametro_general_usuario_logic_add::updateparametro_general_usuarioToGet($this->parametro_general_usuario);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?parametro_general_usuario {
		$parametro_general_usuarioLogic = new  parametro_general_usuario_logic();
		  		  
        try {		
			$parametro_general_usuarioLogic->setConnexion($connexion);			
			$parametro_general_usuarioLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $parametro_general_usuarioLogic->getparametro_general_usuario();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->parametro_general_usuarios = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->parametro_general_usuarios=$this->parametro_general_usuarioDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_general_usuario_util::refrescarFKDescripciones($this->parametro_general_usuarios);
			}
			
			//parametro_general_usuario_logic_add::checkparametro_general_usuarioToGets($this->parametro_general_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_general_usuarios);			
			$this->connexion->getConnection()->commit();					
			
		}  catch(Exception $e) {
			$this->connexion->getConnection()->rollback();			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	public function getEntities(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->parametro_general_usuarios = array();
		  		  
        try {			
			$this->parametro_general_usuarios=$this->parametro_general_usuarioDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_general_usuario_util::refrescarFKDescripciones($this->parametro_general_usuarios);
			}
			
			//parametro_general_usuario_logic_add::checkparametro_general_usuarioToGets($this->parametro_general_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_general_usuarios);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->parametro_general_usuarios = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_general_usuarios=$this->parametro_general_usuarioDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_general_usuario_util::refrescarFKDescripciones($this->parametro_general_usuarios);
			}
			
			//parametro_general_usuario_logic_add::checkparametro_general_usuarioToGets($this->parametro_general_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_general_usuarios);
			$this->connexion->getConnection()->commit();						
			
		}  catch(Exception $e) {
			$this->connexion->getConnection()->rollback();			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	public function getEntitiesWithFinalQuery(string $strFinalQuery) {	
		$this->parametro_general_usuarios = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_general_usuarios=$this->parametro_general_usuarioDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_general_usuario_util::refrescarFKDescripciones($this->parametro_general_usuarios);
			}
			
			//parametro_general_usuario_logic_add::checkparametro_general_usuarioToGets($this->parametro_general_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_general_usuarios);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$parametro_general_usuarioLogic = new  parametro_general_usuario_logic();
		  		  
        try {		
			$parametro_general_usuarioLogic->setConnexion($connexion);			
			$parametro_general_usuarioLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $parametro_general_usuarioLogic->getparametro_general_usuarios();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->parametro_general_usuarios = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->parametro_general_usuarios=$this->parametro_general_usuarioDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_general_usuario_util::refrescarFKDescripciones($this->parametro_general_usuarios);
			}
			
			//parametro_general_usuario_logic_add::checkparametro_general_usuarioToGets($this->parametro_general_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_general_usuarios);
			$this->connexion->getConnection()->commit();					
			
		}  catch(Exception $e) {
			$this->connexion->getConnection()->rollback();								
			Funciones::logShowExceptionMessages($e);
			throw $e;						
      	} finally{
			$this->connexion->getConnection()->close();
		}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQuery(string $strQuerySelect,string $strFinalQuery) {
		$this->parametro_general_usuarios = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_general_usuarios=$this->parametro_general_usuarioDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_general_usuario_util::refrescarFKDescripciones($this->parametro_general_usuarios);
			}
			
			//parametro_general_usuario_logic_add::checkparametro_general_usuarioToGets($this->parametro_general_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_general_usuarios);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->parametro_general_usuarios = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_general_usuarios=$this->parametro_general_usuarioDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_general_usuario_util::refrescarFKDescripciones($this->parametro_general_usuarios);
			}
			
			//parametro_general_usuario_logic_add::checkparametro_general_usuarioToGets($this->parametro_general_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_general_usuarios);
			$this->connexion->getConnection()->commit();						
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} finally{
			$this->connexion->getConnection()->close();
		}
	}
	
	public function getEntitiesWithQuerySelect(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->parametro_general_usuarios = array();
		  		  
        try {			
			$this->parametro_general_usuarios=$this->parametro_general_usuarioDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_general_usuario_util::refrescarFKDescripciones($this->parametro_general_usuarios);
			}	
			
			//parametro_general_usuario_logic_add::checkparametro_general_usuarioToGets($this->parametro_general_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_general_usuarios);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->parametro_general_usuarios = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->parametro_general_usuarios=$this->parametro_general_usuarioDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_general_usuario_util::refrescarFKDescripciones($this->parametro_general_usuarios);
			}
			
			//parametro_general_usuario_logic_add::checkparametro_general_usuarioToGets($this->parametro_general_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_general_usuarios);
			$this->connexion->getConnection()->commit();						
			
		}  catch(Exception $e) {
			$this->connexion->getConnection()->rollback();			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	public function getEntitiesSimpleQueryBuild(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->parametro_general_usuarios = array();
		  		  
        try {		
			$this->parametro_general_usuarios=$this->parametro_general_usuarioDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_general_usuario_util::refrescarFKDescripciones($this->parametro_general_usuarios);
			}
			
			//parametro_general_usuario_logic_add::checkparametro_general_usuarioToGets($this->parametro_general_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_general_usuarios);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_IdejercicioWithConnection(string $strFinalQuery,Pagination $pagination,int $id_ejercicio) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_ejercicio= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,parametro_general_usuario_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->parametro_general_usuarios=$this->parametro_general_usuarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				parametro_general_usuario_util::refrescarFKDescripciones($this->parametro_general_usuarios);
			}
			//parametro_general_usuario_logic_add::checkparametro_general_usuarioToGets($this->parametro_general_usuarios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->parametro_general_usuarios);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idejercicio(string $strFinalQuery,Pagination $pagination,int $id_ejercicio) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_ejercicio= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,parametro_general_usuario_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->parametro_general_usuarios=$this->parametro_general_usuarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				parametro_general_usuario_util::refrescarFKDescripciones($this->parametro_general_usuarios);
			}
			//parametro_general_usuario_logic_add::checkparametro_general_usuarioToGets($this->parametro_general_usuarios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->parametro_general_usuarios);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdempresaWithConnection(string $strFinalQuery,Pagination $pagination,int $id_empresa) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_empresa= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,parametro_general_usuario_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->parametro_general_usuarios=$this->parametro_general_usuarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				parametro_general_usuario_util::refrescarFKDescripciones($this->parametro_general_usuarios);
			}
			//parametro_general_usuario_logic_add::checkparametro_general_usuarioToGets($this->parametro_general_usuarios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->parametro_general_usuarios);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idempresa(string $strFinalQuery,Pagination $pagination,int $id_empresa) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_empresa= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,parametro_general_usuario_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->parametro_general_usuarios=$this->parametro_general_usuarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				parametro_general_usuario_util::refrescarFKDescripciones($this->parametro_general_usuarios);
			}
			//parametro_general_usuario_logic_add::checkparametro_general_usuarioToGets($this->parametro_general_usuarios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->parametro_general_usuarios);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdperiodoWithConnection(string $strFinalQuery,Pagination $pagination,int $id_periodo) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_periodo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,parametro_general_usuario_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->parametro_general_usuarios=$this->parametro_general_usuarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				parametro_general_usuario_util::refrescarFKDescripciones($this->parametro_general_usuarios);
			}
			//parametro_general_usuario_logic_add::checkparametro_general_usuarioToGets($this->parametro_general_usuarios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->parametro_general_usuarios);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idperiodo(string $strFinalQuery,Pagination $pagination,int $id_periodo) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_periodo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,parametro_general_usuario_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->parametro_general_usuarios=$this->parametro_general_usuarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				parametro_general_usuario_util::refrescarFKDescripciones($this->parametro_general_usuarios);
			}
			//parametro_general_usuario_logic_add::checkparametro_general_usuarioToGets($this->parametro_general_usuarios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->parametro_general_usuarios);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdsucursalWithConnection(string $strFinalQuery,Pagination $pagination,int $id_sucursal) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_sucursal= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,parametro_general_usuario_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->parametro_general_usuarios=$this->parametro_general_usuarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				parametro_general_usuario_util::refrescarFKDescripciones($this->parametro_general_usuarios);
			}
			//parametro_general_usuario_logic_add::checkparametro_general_usuarioToGets($this->parametro_general_usuarios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->parametro_general_usuarios);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idsucursal(string $strFinalQuery,Pagination $pagination,int $id_sucursal) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_sucursal= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,parametro_general_usuario_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->parametro_general_usuarios=$this->parametro_general_usuarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				parametro_general_usuario_util::refrescarFKDescripciones($this->parametro_general_usuarios);
			}
			//parametro_general_usuario_logic_add::checkparametro_general_usuarioToGets($this->parametro_general_usuarios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->parametro_general_usuarios);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idtipo_fondoWithConnection(string $strFinalQuery,Pagination $pagination,int $id_tipo_fondo) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_tipo_fondo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_tipo_fondo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_fondo,parametro_general_usuario_util::$ID_TIPO_FONDO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_fondo);

			$this->parametro_general_usuarios=$this->parametro_general_usuarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				parametro_general_usuario_util::refrescarFKDescripciones($this->parametro_general_usuarios);
			}
			//parametro_general_usuario_logic_add::checkparametro_general_usuarioToGets($this->parametro_general_usuarios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->parametro_general_usuarios);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idtipo_fondo(string $strFinalQuery,Pagination $pagination,int $id_tipo_fondo) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_tipo_fondo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_tipo_fondo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_fondo,parametro_general_usuario_util::$ID_TIPO_FONDO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_fondo);

			$this->parametro_general_usuarios=$this->parametro_general_usuarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				parametro_general_usuario_util::refrescarFKDescripciones($this->parametro_general_usuarios);
			}
			//parametro_general_usuario_logic_add::checkparametro_general_usuarioToGets($this->parametro_general_usuarios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->parametro_general_usuarios);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdusuarioidWithConnection(string $strFinalQuery,Pagination $pagination,int $id) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id,parametro_general_usuario_util::$ID,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid);

			$this->parametro_general_usuarios=$this->parametro_general_usuarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				parametro_general_usuario_util::refrescarFKDescripciones($this->parametro_general_usuarios);
			}
			//parametro_general_usuario_logic_add::checkparametro_general_usuarioToGets($this->parametro_general_usuarios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->parametro_general_usuarios);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idusuarioid(string $strFinalQuery,Pagination $pagination,int $id) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id,parametro_general_usuario_util::$ID,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid);

			$this->parametro_general_usuarios=$this->parametro_general_usuarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				parametro_general_usuario_util::refrescarFKDescripciones($this->parametro_general_usuarios);
			}
			//parametro_general_usuario_logic_add::checkparametro_general_usuarioToGets($this->parametro_general_usuarios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->parametro_general_usuarios);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
		
	
	/*MANTENIMIENTO*/
	public function saveWithConnection() {	
		 try {	
			$this->connexion = Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
						
			//parametro_general_usuario_logic_add::checkparametro_general_usuarioToSave($this->parametro_general_usuario,$this->datosCliente,$this->connexion);	       
			//parametro_general_usuario_logic_add::updateparametro_general_usuarioToSave($this->parametro_general_usuario);			
			parametro_general_usuario_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->parametro_general_usuario,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->parametro_general_usuarioLogicAdditional->checkGeneralEntityToSave($this,$this->parametro_general_usuario,$this->datosCliente,$this->connexion);
			
			
			parametro_general_usuario_data::save($this->parametro_general_usuario, $this->connexion);	    	       	 				
			//parametro_general_usuario_logic_add::checkparametro_general_usuarioToSaveAfter($this->parametro_general_usuario,$this->datosCliente,$this->connexion);			
			//$this->parametro_general_usuarioLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->parametro_general_usuario,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->parametro_general_usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->parametro_general_usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				parametro_general_usuario_util::refrescarFKDescripcion($this->parametro_general_usuario);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->parametro_general_usuario->getIsDeleted()) {
				$this->parametro_general_usuario=null;
			}			
		}  catch(Exception $e) {
			$this->connexion->getConnection()->rollback();			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	public function save() {	
		 try {				
			$this->inicializarLogicAdditional();			
						
			/*parametro_general_usuario_logic_add::checkparametro_general_usuarioToSave($this->parametro_general_usuario,$this->datosCliente,$this->connexion);*/	        
			//parametro_general_usuario_logic_add::updateparametro_general_usuarioToSave($this->parametro_general_usuario);			
			//$this->parametro_general_usuarioLogicAdditional->checkGeneralEntityToSave($this,$this->parametro_general_usuario,$this->datosCliente,$this->connexion);			
			parametro_general_usuario_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->parametro_general_usuario,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			parametro_general_usuario_data::save($this->parametro_general_usuario, $this->connexion);	    	       	 						
			/*parametro_general_usuario_logic_add::checkparametro_general_usuarioToSaveAfter($this->parametro_general_usuario,$this->datosCliente,$this->connexion);*/			
			//$this->parametro_general_usuarioLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->parametro_general_usuario,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->parametro_general_usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->parametro_general_usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				parametro_general_usuario_util::refrescarFKDescripcion($this->parametro_general_usuario);				
			}
			
			if($this->parametro_general_usuario->getIsDeleted()) {
				$this->parametro_general_usuario=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(parametro_general_usuario $parametro_general_usuario,Connexion $connexion)  {
		$parametro_general_usuarioLogic = new  parametro_general_usuario_logic();		  		  
        try {		
			$parametro_general_usuarioLogic->setConnexion($connexion);			
			$parametro_general_usuarioLogic->setparametro_general_usuario($parametro_general_usuario);			
			$parametro_general_usuarioLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*parametro_general_usuario_logic_add::checkparametro_general_usuarioToSaves($this->parametro_general_usuarios,$this->datosCliente,$this->connexion);*/	        	
			//$this->parametro_general_usuarioLogicAdditional->checkGeneralEntitiesToSaves($this,$this->parametro_general_usuarios,$this->datosCliente,$this->connexion);
			
	   		foreach($this->parametro_general_usuarios as $parametro_general_usuarioLocal) {				
								
				//parametro_general_usuario_logic_add::updateparametro_general_usuarioToSave($parametro_general_usuarioLocal);	        	
				parametro_general_usuario_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$parametro_general_usuarioLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				parametro_general_usuario_data::save($parametro_general_usuarioLocal, $this->connexion);				
			}
			
			/*parametro_general_usuario_logic_add::checkparametro_general_usuarioToSavesAfter($this->parametro_general_usuarios,$this->datosCliente,$this->connexion);*/			
			//$this->parametro_general_usuarioLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->parametro_general_usuarios,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_general_usuario_util::refrescarFKDescripciones($this->parametro_general_usuarios);
			}
			
			$this->connexion->getConnection()->commit();								
			$this->quitarEliminados();
			
		}  catch(Exception $e) {
			$this->connexion->getConnection()->rollback();			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	public function saves() {			
		 try {			
			$this->inicializarLogicAdditional();			
			/*parametro_general_usuario_logic_add::checkparametro_general_usuarioToSaves($this->parametro_general_usuarios,$this->datosCliente,$this->connexion);*/			
			//$this->parametro_general_usuarioLogicAdditional->checkGeneralEntitiesToSaves($this,$this->parametro_general_usuarios,$this->datosCliente,$this->connexion);
			
	   		foreach($this->parametro_general_usuarios as $parametro_general_usuarioLocal) {				
								
				//parametro_general_usuario_logic_add::updateparametro_general_usuarioToSave($parametro_general_usuarioLocal);	        	
				parametro_general_usuario_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$parametro_general_usuarioLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				parametro_general_usuario_data::save($parametro_general_usuarioLocal, $this->connexion);				
			}			
			
			/*parametro_general_usuario_logic_add::checkparametro_general_usuarioToSavesAfter($this->parametro_general_usuarios,$this->datosCliente,$this->connexion);*/			
			//$this->parametro_general_usuarioLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->parametro_general_usuarios,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_general_usuario_util::refrescarFKDescripciones($this->parametro_general_usuarios);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $parametro_general_usuarios,Connexion $connexion)  {
		$parametro_general_usuarioLogic = new  parametro_general_usuario_logic();
		  		  
        try {		
			$parametro_general_usuarioLogic->setConnexion($connexion);			
			$parametro_general_usuarioLogic->setparametro_general_usuarios($parametro_general_usuarios);			
			$parametro_general_usuarioLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$parametro_general_usuariosAux=array();
		
		foreach($this->parametro_general_usuarios as $parametro_general_usuario) {
			if($parametro_general_usuario->getIsDeleted()==false) {
				$parametro_general_usuariosAux[]=$parametro_general_usuario;
			}
		}
		
		$this->parametro_general_usuarios=$parametro_general_usuariosAux;
	}
	
	public function updateToGetsAuxiliar(array &$parametro_general_usuarios) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->parametro_general_usuarios as $parametro_general_usuario) {
				
				$parametro_general_usuario->setid_tipo_fondo_Descripcion(parametro_general_usuario_util::gettipo_fondoDescripcion($parametro_general_usuario->gettipo_fondo()));
				$parametro_general_usuario->setid_empresa_Descripcion(parametro_general_usuario_util::getempresaDescripcion($parametro_general_usuario->getempresa()));
				$parametro_general_usuario->setid_sucursal_Descripcion(parametro_general_usuario_util::getsucursalDescripcion($parametro_general_usuario->getsucursal()));
				$parametro_general_usuario->setid_ejercicio_Descripcion(parametro_general_usuario_util::getejercicioDescripcion($parametro_general_usuario->getejercicio()));
				$parametro_general_usuario->setid_periodo_Descripcion(parametro_general_usuario_util::getperiodoDescripcion($parametro_general_usuario->getperiodo()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$parametro_general_usuario_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$parametro_general_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$parametro_general_usuario_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$parametro_general_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$parametro_general_usuario_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$parametro_general_usuarioForeignKey=new parametro_general_usuario_param_return();//parametro_general_usuarioForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id',$strRecargarFkTipos,',')) {
				$this->cargarCombosusuariosFK($this->connexion,$strRecargarFkQuery,$parametro_general_usuarioForeignKey,$parametro_general_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tipo_fondo',$strRecargarFkTipos,',')) {
				$this->cargarCombostipo_fondosFK($this->connexion,$strRecargarFkQuery,$parametro_general_usuarioForeignKey,$parametro_general_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$parametro_general_usuarioForeignKey,$parametro_general_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTipos,',')) {
				$this->cargarCombossucursalsFK($this->connexion,$strRecargarFkQuery,$parametro_general_usuarioForeignKey,$parametro_general_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTipos,',')) {
				$this->cargarCombosejerciciosFK($this->connexion,$strRecargarFkQuery,$parametro_general_usuarioForeignKey,$parametro_general_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTipos,',')) {
				$this->cargarCombosperiodosFK($this->connexion,$strRecargarFkQuery,$parametro_general_usuarioForeignKey,$parametro_general_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosusuariosFK($this->connexion,' where id=-1 ',$parametro_general_usuarioForeignKey,$parametro_general_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_tipo_fondo',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombostipo_fondosFK($this->connexion,' where id=-1 ',$parametro_general_usuarioForeignKey,$parametro_general_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$parametro_general_usuarioForeignKey,$parametro_general_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombossucursalsFK($this->connexion,' where id=-1 ',$parametro_general_usuarioForeignKey,$parametro_general_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosejerciciosFK($this->connexion,' where id=-1 ',$parametro_general_usuarioForeignKey,$parametro_general_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosperiodosFK($this->connexion,' where id=-1 ',$parametro_general_usuarioForeignKey,$parametro_general_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $parametro_general_usuarioForeignKey;
			
		} catch(Exception $e) {
			
			if($conWithConnection) {
				$this->connexion->getConnection()->rollback();						
			}
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
		} finally {
			if($conWithConnection) {
				$this->connexion->getConnection()->close();	
			}
		}
	}
	
	
	public function cargarCombosusuariosFK($connexion=null,$strRecargarFkQuery='',$parametro_general_usuarioForeignKey,$parametro_general_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$usuarioLogic= new usuario_logic();
		$pagination= new Pagination();
		$parametro_general_usuarioForeignKey->usuariosFK=array();

		$usuarioLogic->setConnexion($connexion);
		$usuarioLogic->getusuarioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($parametro_general_usuario_session==null) {
			$parametro_general_usuario_session=new parametro_general_usuario_session();
		}
		
		if($parametro_general_usuario_session->bitBusquedaDesdeFKSesionusuario!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=usuario_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalusuario=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalusuario=Funciones::GetFinalQueryAppend($finalQueryGlobalusuario, '');
				$finalQueryGlobalusuario.=usuario_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalusuario.$strRecargarFkQuery;		

				$usuarioLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($usuarioLogic->getusuarios() as $usuarioLocal ) {
				if($parametro_general_usuarioForeignKey->idusuarioDefaultFK==0) {
					$parametro_general_usuarioForeignKey->idusuarioDefaultFK=$usuarioLocal->getId();
				}

				$parametro_general_usuarioForeignKey->usuariosFK[$usuarioLocal->getId()]=parametro_general_usuario_util::getusuarioDescripcion($usuarioLocal);
			}

		} else {

			if($parametro_general_usuario_session->bigidusuarioActual!=null && $parametro_general_usuario_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($parametro_general_usuario_session->bigidusuarioActual);//WithConnection

				$parametro_general_usuarioForeignKey->usuariosFK[$usuarioLogic->getusuario()->getId()]=parametro_general_usuario_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$parametro_general_usuarioForeignKey->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	public function cargarCombostipo_fondosFK($connexion=null,$strRecargarFkQuery='',$parametro_general_usuarioForeignKey,$parametro_general_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$tipo_fondoLogic= new tipo_fondo_logic();
		$pagination= new Pagination();
		$parametro_general_usuarioForeignKey->tipo_fondosFK=array();

		$tipo_fondoLogic->setConnexion($connexion);
		$tipo_fondoLogic->gettipo_fondoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($parametro_general_usuario_session==null) {
			$parametro_general_usuario_session=new parametro_general_usuario_session();
		}
		
		if($parametro_general_usuario_session->bitBusquedaDesdeFKSesiontipo_fondo!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=tipo_fondo_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobaltipo_fondo=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltipo_fondo=Funciones::GetFinalQueryAppend($finalQueryGlobaltipo_fondo, '');
				$finalQueryGlobaltipo_fondo.=tipo_fondo_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltipo_fondo.$strRecargarFkQuery;		

				$tipo_fondoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($tipo_fondoLogic->gettipo_fondos() as $tipo_fondoLocal ) {
				if($parametro_general_usuarioForeignKey->idtipo_fondoDefaultFK==0) {
					$parametro_general_usuarioForeignKey->idtipo_fondoDefaultFK=$tipo_fondoLocal->getId();
				}

				$parametro_general_usuarioForeignKey->tipo_fondosFK[$tipo_fondoLocal->getId()]=parametro_general_usuario_util::gettipo_fondoDescripcion($tipo_fondoLocal);
			}

		} else {

			if($parametro_general_usuario_session->bigidtipo_fondoActual!=null && $parametro_general_usuario_session->bigidtipo_fondoActual > 0) {
				$tipo_fondoLogic->getEntity($parametro_general_usuario_session->bigidtipo_fondoActual);//WithConnection

				$parametro_general_usuarioForeignKey->tipo_fondosFK[$tipo_fondoLogic->gettipo_fondo()->getId()]=parametro_general_usuario_util::gettipo_fondoDescripcion($tipo_fondoLogic->gettipo_fondo());
				$parametro_general_usuarioForeignKey->idtipo_fondoDefaultFK=$tipo_fondoLogic->gettipo_fondo()->getId();
			}
		}
	}

	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$parametro_general_usuarioForeignKey,$parametro_general_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$parametro_general_usuarioForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($parametro_general_usuario_session==null) {
			$parametro_general_usuario_session=new parametro_general_usuario_session();
		}
		
		if($parametro_general_usuario_session->bitBusquedaDesdeFKSesionempresa!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=empresa_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalempresa=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalempresa=Funciones::GetFinalQueryAppend($finalQueryGlobalempresa, '');
				$finalQueryGlobalempresa.=empresa_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalempresa.$strRecargarFkQuery;		

				$empresaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($empresaLogic->getempresas() as $empresaLocal ) {
				if($parametro_general_usuarioForeignKey->idempresaDefaultFK==0) {
					$parametro_general_usuarioForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$parametro_general_usuarioForeignKey->empresasFK[$empresaLocal->getId()]=parametro_general_usuario_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($parametro_general_usuario_session->bigidempresaActual!=null && $parametro_general_usuario_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($parametro_general_usuario_session->bigidempresaActual);//WithConnection

				$parametro_general_usuarioForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=parametro_general_usuario_util::getempresaDescripcion($empresaLogic->getempresa());
				$parametro_general_usuarioForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombossucursalsFK($connexion=null,$strRecargarFkQuery='',$parametro_general_usuarioForeignKey,$parametro_general_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$sucursalLogic= new sucursal_logic();
		$pagination= new Pagination();
		$parametro_general_usuarioForeignKey->sucursalsFK=array();

		$sucursalLogic->setConnexion($connexion);
		$sucursalLogic->getsucursalDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($parametro_general_usuario_session==null) {
			$parametro_general_usuario_session=new parametro_general_usuario_session();
		}
		
		if($parametro_general_usuario_session->bitBusquedaDesdeFKSesionsucursal!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=sucursal_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalsucursal=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalsucursal=Funciones::GetFinalQueryAppend($finalQueryGlobalsucursal, '');
				$finalQueryGlobalsucursal.=sucursal_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalsucursal.$strRecargarFkQuery;		

				$sucursalLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($sucursalLogic->getsucursals() as $sucursalLocal ) {
				if($parametro_general_usuarioForeignKey->idsucursalDefaultFK==0) {
					$parametro_general_usuarioForeignKey->idsucursalDefaultFK=$sucursalLocal->getId();
				}

				$parametro_general_usuarioForeignKey->sucursalsFK[$sucursalLocal->getId()]=parametro_general_usuario_util::getsucursalDescripcion($sucursalLocal);
			}

		} else {

			if($parametro_general_usuario_session->bigidsucursalActual!=null && $parametro_general_usuario_session->bigidsucursalActual > 0) {
				$sucursalLogic->getEntity($parametro_general_usuario_session->bigidsucursalActual);//WithConnection

				$parametro_general_usuarioForeignKey->sucursalsFK[$sucursalLogic->getsucursal()->getId()]=parametro_general_usuario_util::getsucursalDescripcion($sucursalLogic->getsucursal());
				$parametro_general_usuarioForeignKey->idsucursalDefaultFK=$sucursalLogic->getsucursal()->getId();
			}
		}
	}

	public function cargarCombosejerciciosFK($connexion=null,$strRecargarFkQuery='',$parametro_general_usuarioForeignKey,$parametro_general_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$ejercicioLogic= new ejercicio_logic();
		$pagination= new Pagination();
		$parametro_general_usuarioForeignKey->ejerciciosFK=array();

		$ejercicioLogic->setConnexion($connexion);
		$ejercicioLogic->getejercicioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($parametro_general_usuario_session==null) {
			$parametro_general_usuario_session=new parametro_general_usuario_session();
		}
		
		if($parametro_general_usuario_session->bitBusquedaDesdeFKSesionejercicio!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=ejercicio_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalejercicio=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalejercicio=Funciones::GetFinalQueryAppend($finalQueryGlobalejercicio, '');
				$finalQueryGlobalejercicio.=ejercicio_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalejercicio.$strRecargarFkQuery;		

				$ejercicioLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($ejercicioLogic->getejercicios() as $ejercicioLocal ) {
				if($parametro_general_usuarioForeignKey->idejercicioDefaultFK==0) {
					$parametro_general_usuarioForeignKey->idejercicioDefaultFK=$ejercicioLocal->getId();
				}

				$parametro_general_usuarioForeignKey->ejerciciosFK[$ejercicioLocal->getId()]=parametro_general_usuario_util::getejercicioDescripcion($ejercicioLocal);
			}

		} else {

			if($parametro_general_usuario_session->bigidejercicioActual!=null && $parametro_general_usuario_session->bigidejercicioActual > 0) {
				$ejercicioLogic->getEntity($parametro_general_usuario_session->bigidejercicioActual);//WithConnection

				$parametro_general_usuarioForeignKey->ejerciciosFK[$ejercicioLogic->getejercicio()->getId()]=parametro_general_usuario_util::getejercicioDescripcion($ejercicioLogic->getejercicio());
				$parametro_general_usuarioForeignKey->idejercicioDefaultFK=$ejercicioLogic->getejercicio()->getId();
			}
		}
	}

	public function cargarCombosperiodosFK($connexion=null,$strRecargarFkQuery='',$parametro_general_usuarioForeignKey,$parametro_general_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$periodoLogic= new periodo_logic();
		$pagination= new Pagination();
		$parametro_general_usuarioForeignKey->periodosFK=array();

		$periodoLogic->setConnexion($connexion);
		$periodoLogic->getperiodoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($parametro_general_usuario_session==null) {
			$parametro_general_usuario_session=new parametro_general_usuario_session();
		}
		
		if($parametro_general_usuario_session->bitBusquedaDesdeFKSesionperiodo!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=periodo_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalperiodo=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalperiodo=Funciones::GetFinalQueryAppend($finalQueryGlobalperiodo, '');
				$finalQueryGlobalperiodo.=periodo_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalperiodo.$strRecargarFkQuery;		

				$periodoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($periodoLogic->getperiodos() as $periodoLocal ) {
				if($parametro_general_usuarioForeignKey->idperiodoDefaultFK==0) {
					$parametro_general_usuarioForeignKey->idperiodoDefaultFK=$periodoLocal->getId();
				}

				$parametro_general_usuarioForeignKey->periodosFK[$periodoLocal->getId()]=parametro_general_usuario_util::getperiodoDescripcion($periodoLocal);
			}

		} else {

			if($parametro_general_usuario_session->bigidperiodoActual!=null && $parametro_general_usuario_session->bigidperiodoActual > 0) {
				$periodoLogic->getEntity($parametro_general_usuario_session->bigidperiodoActual);//WithConnection

				$parametro_general_usuarioForeignKey->periodosFK[$periodoLogic->getperiodo()->getId()]=parametro_general_usuario_util::getperiodoDescripcion($periodoLogic->getperiodo());
				$parametro_general_usuarioForeignKey->idperiodoDefaultFK=$periodoLogic->getperiodo()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($parametro_general_usuario) {
		$this->saveRelacionesBase($parametro_general_usuario,true);
	}

	public function saveRelaciones($parametro_general_usuario) {
		$this->saveRelacionesBase($parametro_general_usuario,false);
	}

	public function saveRelacionesBase($parametro_general_usuario,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setparametro_general_usuario($parametro_general_usuario);

				if(($this->parametro_general_usuario->getIsNew() || $this->parametro_general_usuario->getIsChanged()) && !$this->parametro_general_usuario->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->parametro_general_usuario->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

			if($conWithConnection){
				$this->connexion->getConnection()->commit();
			}

		} catch(Exception $e) {
			if($conWithConnection){
				$this->connexion->getConnection()->rollback();
			}

			Funciones::logShowExceptionMessages($e);

			throw $e;
		} 
		finally {

			if($conWithConnection){
				$this->connexion->getConnection()->close();
			}
		}
	}
	
	
	public function saveRelacionesDetalles() {
		try {
	

		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
	
	/*PROCESAR ACCIONES*/
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $parametro_general_usuarios,parametro_general_usuario_param_return $parametro_general_usuarioParameterGeneral) : parametro_general_usuario_param_return {
		$parametro_general_usuarioReturnGeneral=new parametro_general_usuario_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $parametro_general_usuarioReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $parametro_general_usuarios,parametro_general_usuario_param_return $parametro_general_usuarioParameterGeneral) : parametro_general_usuario_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$parametro_general_usuarioReturnGeneral=new parametro_general_usuario_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $parametro_general_usuarioReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_general_usuarios,parametro_general_usuario $parametro_general_usuario,parametro_general_usuario_param_return $parametro_general_usuarioParameterGeneral,bool $isEsNuevoparametro_general_usuario,array $clases) : parametro_general_usuario_param_return {
		 try {	
			$parametro_general_usuarioReturnGeneral=new parametro_general_usuario_param_return();
	
			$parametro_general_usuarioReturnGeneral->setparametro_general_usuario($parametro_general_usuario);
			$parametro_general_usuarioReturnGeneral->setparametro_general_usuarios($parametro_general_usuarios);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$parametro_general_usuarioReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $parametro_general_usuarioReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_general_usuarios,parametro_general_usuario $parametro_general_usuario,parametro_general_usuario_param_return $parametro_general_usuarioParameterGeneral,bool $isEsNuevoparametro_general_usuario,array $clases) : parametro_general_usuario_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$parametro_general_usuarioReturnGeneral=new parametro_general_usuario_param_return();
	
			$parametro_general_usuarioReturnGeneral->setparametro_general_usuario($parametro_general_usuario);
			$parametro_general_usuarioReturnGeneral->setparametro_general_usuarios($parametro_general_usuarios);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$parametro_general_usuarioReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $parametro_general_usuarioReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_general_usuarios,parametro_general_usuario $parametro_general_usuario,parametro_general_usuario_param_return $parametro_general_usuarioParameterGeneral,bool $isEsNuevoparametro_general_usuario,array $clases) : parametro_general_usuario_param_return {
		 try {	
			$parametro_general_usuarioReturnGeneral=new parametro_general_usuario_param_return();
	
			$parametro_general_usuarioReturnGeneral->setparametro_general_usuario($parametro_general_usuario);
			$parametro_general_usuarioReturnGeneral->setparametro_general_usuarios($parametro_general_usuarios);
			
			
			
			return $parametro_general_usuarioReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_general_usuarios,parametro_general_usuario $parametro_general_usuario,parametro_general_usuario_param_return $parametro_general_usuarioParameterGeneral,bool $isEsNuevoparametro_general_usuario,array $clases) : parametro_general_usuario_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$parametro_general_usuarioReturnGeneral=new parametro_general_usuario_param_return();
	
			$parametro_general_usuarioReturnGeneral->setparametro_general_usuario($parametro_general_usuario);
			$parametro_general_usuarioReturnGeneral->setparametro_general_usuarios($parametro_general_usuarios);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $parametro_general_usuarioReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,parametro_general_usuario $parametro_general_usuario,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,parametro_general_usuario $parametro_general_usuario,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		parametro_general_usuario_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(parametro_general_usuario $parametro_general_usuario,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//parametro_general_usuario_logic_add::updateparametro_general_usuarioToGet($this->parametro_general_usuario);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$parametro_general_usuario->setusuario($this->parametro_general_usuarioDataAccess->getusuario($this->connexion,$parametro_general_usuario));
		$parametro_general_usuario->settipo_fondo($this->parametro_general_usuarioDataAccess->gettipo_fondo($this->connexion,$parametro_general_usuario));
		$parametro_general_usuario->setempresa($this->parametro_general_usuarioDataAccess->getempresa($this->connexion,$parametro_general_usuario));
		$parametro_general_usuario->setsucursal($this->parametro_general_usuarioDataAccess->getsucursal($this->connexion,$parametro_general_usuario));
		$parametro_general_usuario->setejercicio($this->parametro_general_usuarioDataAccess->getejercicio($this->connexion,$parametro_general_usuario));
		$parametro_general_usuario->setperiodo($this->parametro_general_usuarioDataAccess->getperiodo($this->connexion,$parametro_general_usuario));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$parametro_general_usuario->setusuario($this->parametro_general_usuarioDataAccess->getusuario($this->connexion,$parametro_general_usuario));
				continue;
			}

			if($clas->clas==tipo_fondo::$class.'') {
				$parametro_general_usuario->settipo_fondo($this->parametro_general_usuarioDataAccess->gettipo_fondo($this->connexion,$parametro_general_usuario));
				continue;
			}

			if($clas->clas==empresa::$class.'') {
				$parametro_general_usuario->setempresa($this->parametro_general_usuarioDataAccess->getempresa($this->connexion,$parametro_general_usuario));
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$parametro_general_usuario->setsucursal($this->parametro_general_usuarioDataAccess->getsucursal($this->connexion,$parametro_general_usuario));
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$parametro_general_usuario->setejercicio($this->parametro_general_usuarioDataAccess->getejercicio($this->connexion,$parametro_general_usuario));
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$parametro_general_usuario->setperiodo($this->parametro_general_usuarioDataAccess->getperiodo($this->connexion,$parametro_general_usuario));
				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$parametro_general_usuario->setusuario($this->parametro_general_usuarioDataAccess->getusuario($this->connexion,$parametro_general_usuario));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==tipo_fondo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$parametro_general_usuario->settipo_fondo($this->parametro_general_usuarioDataAccess->gettipo_fondo($this->connexion,$parametro_general_usuario));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$parametro_general_usuario->setempresa($this->parametro_general_usuarioDataAccess->getempresa($this->connexion,$parametro_general_usuario));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$parametro_general_usuario->setsucursal($this->parametro_general_usuarioDataAccess->getsucursal($this->connexion,$parametro_general_usuario));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$parametro_general_usuario->setejercicio($this->parametro_general_usuarioDataAccess->getejercicio($this->connexion,$parametro_general_usuario));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$parametro_general_usuario->setperiodo($this->parametro_general_usuarioDataAccess->getperiodo($this->connexion,$parametro_general_usuario));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$parametro_general_usuario->setusuario($this->parametro_general_usuarioDataAccess->getusuario($this->connexion,$parametro_general_usuario));
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepLoad($parametro_general_usuario->getusuario(),$isDeep,$deepLoadType,$clases);
				
		$parametro_general_usuario->settipo_fondo($this->parametro_general_usuarioDataAccess->gettipo_fondo($this->connexion,$parametro_general_usuario));
		$tipo_fondoLogic= new tipo_fondo_logic($this->connexion);
		$tipo_fondoLogic->deepLoad($parametro_general_usuario->gettipo_fondo(),$isDeep,$deepLoadType,$clases);
				
		$parametro_general_usuario->setempresa($this->parametro_general_usuarioDataAccess->getempresa($this->connexion,$parametro_general_usuario));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($parametro_general_usuario->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$parametro_general_usuario->setsucursal($this->parametro_general_usuarioDataAccess->getsucursal($this->connexion,$parametro_general_usuario));
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepLoad($parametro_general_usuario->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		$parametro_general_usuario->setejercicio($this->parametro_general_usuarioDataAccess->getejercicio($this->connexion,$parametro_general_usuario));
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepLoad($parametro_general_usuario->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		$parametro_general_usuario->setperiodo($this->parametro_general_usuarioDataAccess->getperiodo($this->connexion,$parametro_general_usuario));
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepLoad($parametro_general_usuario->getperiodo(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$parametro_general_usuario->setusuario($this->parametro_general_usuarioDataAccess->getusuario($this->connexion,$parametro_general_usuario));
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepLoad($parametro_general_usuario->getusuario(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==tipo_fondo::$class.'') {
				$parametro_general_usuario->settipo_fondo($this->parametro_general_usuarioDataAccess->gettipo_fondo($this->connexion,$parametro_general_usuario));
				$tipo_fondoLogic= new tipo_fondo_logic($this->connexion);
				$tipo_fondoLogic->deepLoad($parametro_general_usuario->gettipo_fondo(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==empresa::$class.'') {
				$parametro_general_usuario->setempresa($this->parametro_general_usuarioDataAccess->getempresa($this->connexion,$parametro_general_usuario));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($parametro_general_usuario->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$parametro_general_usuario->setsucursal($this->parametro_general_usuarioDataAccess->getsucursal($this->connexion,$parametro_general_usuario));
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepLoad($parametro_general_usuario->getsucursal(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$parametro_general_usuario->setejercicio($this->parametro_general_usuarioDataAccess->getejercicio($this->connexion,$parametro_general_usuario));
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepLoad($parametro_general_usuario->getejercicio(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$parametro_general_usuario->setperiodo($this->parametro_general_usuarioDataAccess->getperiodo($this->connexion,$parametro_general_usuario));
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepLoad($parametro_general_usuario->getperiodo(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$parametro_general_usuario->setusuario($this->parametro_general_usuarioDataAccess->getusuario($this->connexion,$parametro_general_usuario));
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepLoad($parametro_general_usuario->getusuario(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_fondo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$parametro_general_usuario->settipo_fondo($this->parametro_general_usuarioDataAccess->gettipo_fondo($this->connexion,$parametro_general_usuario));
			$tipo_fondoLogic= new tipo_fondo_logic($this->connexion);
			$tipo_fondoLogic->deepLoad($parametro_general_usuario->gettipo_fondo(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$parametro_general_usuario->setempresa($this->parametro_general_usuarioDataAccess->getempresa($this->connexion,$parametro_general_usuario));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($parametro_general_usuario->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$parametro_general_usuario->setsucursal($this->parametro_general_usuarioDataAccess->getsucursal($this->connexion,$parametro_general_usuario));
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepLoad($parametro_general_usuario->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$parametro_general_usuario->setejercicio($this->parametro_general_usuarioDataAccess->getejercicio($this->connexion,$parametro_general_usuario));
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepLoad($parametro_general_usuario->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$parametro_general_usuario->setperiodo($this->parametro_general_usuarioDataAccess->getperiodo($this->connexion,$parametro_general_usuario));
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepLoad($parametro_general_usuario->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(parametro_general_usuario $parametro_general_usuario,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//parametro_general_usuario_logic_add::updateparametro_general_usuarioToSave($this->parametro_general_usuario);			
			
			if(!$paraDeleteCascade) {				
				parametro_general_usuario_data::save($parametro_general_usuario, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		usuario_data::save($parametro_general_usuario->getusuario(),$this->connexion);
		tipo_fondo_data::save($parametro_general_usuario->gettipo_fondo(),$this->connexion);
		empresa_data::save($parametro_general_usuario->getempresa(),$this->connexion);
		sucursal_data::save($parametro_general_usuario->getsucursal(),$this->connexion);
		ejercicio_data::save($parametro_general_usuario->getejercicio(),$this->connexion);
		periodo_data::save($parametro_general_usuario->getperiodo(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				usuario_data::save($parametro_general_usuario->getusuario(),$this->connexion);
				continue;
			}

			if($clas->clas==tipo_fondo::$class.'') {
				tipo_fondo_data::save($parametro_general_usuario->gettipo_fondo(),$this->connexion);
				continue;
			}

			if($clas->clas==empresa::$class.'') {
				empresa_data::save($parametro_general_usuario->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($parametro_general_usuario->getsucursal(),$this->connexion);
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($parametro_general_usuario->getejercicio(),$this->connexion);
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($parametro_general_usuario->getperiodo(),$this->connexion);
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($parametro_general_usuario->getusuario(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_fondo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_fondo_data::save($parametro_general_usuario->gettipo_fondo(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			empresa_data::save($parametro_general_usuario->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($parametro_general_usuario->getsucursal(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($parametro_general_usuario->getejercicio(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($parametro_general_usuario->getperiodo(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		usuario_data::save($parametro_general_usuario->getusuario(),$this->connexion);
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepSave($parametro_general_usuario->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		tipo_fondo_data::save($parametro_general_usuario->gettipo_fondo(),$this->connexion);
		$tipo_fondoLogic= new tipo_fondo_logic($this->connexion);
		$tipo_fondoLogic->deepSave($parametro_general_usuario->gettipo_fondo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		empresa_data::save($parametro_general_usuario->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($parametro_general_usuario->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		sucursal_data::save($parametro_general_usuario->getsucursal(),$this->connexion);
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepSave($parametro_general_usuario->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		ejercicio_data::save($parametro_general_usuario->getejercicio(),$this->connexion);
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepSave($parametro_general_usuario->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		periodo_data::save($parametro_general_usuario->getperiodo(),$this->connexion);
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepSave($parametro_general_usuario->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				usuario_data::save($parametro_general_usuario->getusuario(),$this->connexion);
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepSave($parametro_general_usuario->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==tipo_fondo::$class.'') {
				tipo_fondo_data::save($parametro_general_usuario->gettipo_fondo(),$this->connexion);
				$tipo_fondoLogic= new tipo_fondo_logic($this->connexion);
				$tipo_fondoLogic->deepSave($parametro_general_usuario->gettipo_fondo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==empresa::$class.'') {
				empresa_data::save($parametro_general_usuario->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($parametro_general_usuario->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($parametro_general_usuario->getsucursal(),$this->connexion);
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepSave($parametro_general_usuario->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($parametro_general_usuario->getejercicio(),$this->connexion);
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepSave($parametro_general_usuario->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($parametro_general_usuario->getperiodo(),$this->connexion);
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepSave($parametro_general_usuario->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($parametro_general_usuario->getusuario(),$this->connexion);
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepSave($parametro_general_usuario->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_fondo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_fondo_data::save($parametro_general_usuario->gettipo_fondo(),$this->connexion);
			$tipo_fondoLogic= new tipo_fondo_logic($this->connexion);
			$tipo_fondoLogic->deepSave($parametro_general_usuario->gettipo_fondo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			empresa_data::save($parametro_general_usuario->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($parametro_general_usuario->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($parametro_general_usuario->getsucursal(),$this->connexion);
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepSave($parametro_general_usuario->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($parametro_general_usuario->getejercicio(),$this->connexion);
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepSave($parametro_general_usuario->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($parametro_general_usuario->getperiodo(),$this->connexion);
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepSave($parametro_general_usuario->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				parametro_general_usuario_data::save($parametro_general_usuario, $this->connexion);
			}
			
		}catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}	
		
		if($existe!=null);
	}
		
	public function deepLoadWithConnection(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje) {		
		try {
			$this->getNewConnexionToDeep();
			
			$this->deepLoad($this->parametro_general_usuario,$isDeep,$deepLoadType,$clases);		
			
			$this->connexion->getConnection()->commit();			
			
		}  catch(Exception $e) {
			$this->connexion->getConnection()->rollback();			
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		} finally {
			$this->closeNewConnexionToDeep();
  		}
	}
	
	public function deepLoadsWithConnection(bool $isDeep,string $deepLoadType, array $clases,string $strTituloMensaje) {		
		try {
			$this->getNewConnexionToDeep();
			
			foreach($this->parametro_general_usuarios as $parametro_general_usuario) {
				$this->deepLoad($parametro_general_usuario,$isDeep,$deepLoadType,$clases);
								
				parametro_general_usuario_util::refrescarFKDescripciones($this->parametro_general_usuarios);
			}
			
			Funciones::resetearActivoClasses($clases);
								
			$this->connexion->getConnection()->commit();			
			
		}  catch(Exception $e) {
			$this->connexion->getConnection()->rollback();			
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		} finally{
			$this->closeNewConnexionToDeep();
  		}
	}
	
	public function deepLoads(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje) {		
		try {
			
			foreach($this->parametro_general_usuarios as $parametro_general_usuario) {
				$this->deepLoad($parametro_general_usuario,$isDeep,$deepLoadType,$clases);
				
				Funciones::resetearActivoClasses($clases);
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
		
	public function deepSaveWithConnection(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje) {		
		try {	
			$this->getNewConnexionToDeep();
			
			$this->deepSave($this->parametro_general_usuario,$isDeep,$deepLoadType,$clases,false);	
			
			$this->connexion->getConnection()->commit();			
			
		}  catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		} finally {
			$this->closeNewConnexionToDeep();
  		}
	}
	
	public function deepSavesWithConnection(bool $isDeep,string $deepLoadType, array $clases,string $strTituloMensaje) {		
		try {				
			$this->getNewConnexionToDeep();
			
			foreach($this->parametro_general_usuarios as $parametro_general_usuario) {
				$this->deepSave($parametro_general_usuario,$isDeep,$deepLoadType,$clases,false);
				Funciones::resetearActivoClasses($clases);
			}		
			
			$this->connexion->getConnection()->commit();
			
		}  catch(Exception $e) {
			$this->connexion->getConnection()->rollback();			
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		} finally {
			$this->closeNewConnexionToDeep();
  		}
	}
	
	public function deepSaves(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje) {		
		try {				
			foreach($this->parametro_general_usuarios as $parametro_general_usuario) {
				$this->deepSave($parametro_general_usuario,$isDeep,$deepLoadType,$clases,false);
				Funciones::resetearActivoClasses($clases);
			}		
					
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function getClassesFKsOf(array $classesP,string $deepLoadType) : array {
		try {
			$classes=array();	
			
			if($deepLoadType==DeepLoadType::$NONE) {
				
				$classes[]=new Classe(usuario::$class);
				$classes[]=new Classe(tipo_fondo::$class);
				$classes[]=new Classe(empresa::$class);
				$classes[]=new Classe(sucursal::$class);
				$classes[]=new Classe(ejercicio::$class);
				$classes[]=new Classe(periodo::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==usuario::$class) {
						$classes[]=new Classe(usuario::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==tipo_fondo::$class) {
						$classes[]=new Classe(tipo_fondo::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==sucursal::$class) {
						$classes[]=new Classe(sucursal::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==ejercicio::$class) {
						$classes[]=new Classe(ejercicio::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==periodo::$class) {
						$classes[]=new Classe(periodo::$class);
					}
				}

			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==usuario::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(usuario::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==tipo_fondo::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(tipo_fondo::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==empresa::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(empresa::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==sucursal::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(sucursal::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==ejercicio::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(ejercicio::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==periodo::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(periodo::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	public static function getClassesRelsOf(array $classesP,string $deepLoadType) : array {
		try {
			 $classes=array();			
			
			if($deepLoadType==DeepLoadType::$NONE) {
				
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getparametro_general_usuario() : ?parametro_general_usuario {	
		/*
		parametro_general_usuario_logic_add::checkparametro_general_usuarioToGet($this->parametro_general_usuario,$this->datosCliente);
		parametro_general_usuario_logic_add::updateparametro_general_usuarioToGet($this->parametro_general_usuario);
		*/
			
		return $this->parametro_general_usuario;
	}
		
	public function setparametro_general_usuario(parametro_general_usuario $newparametro_general_usuario) {
		$this->parametro_general_usuario = $newparametro_general_usuario;
	}
	
	public function getparametro_general_usuarios() : array {		
		/*
		parametro_general_usuario_logic_add::checkparametro_general_usuarioToGets($this->parametro_general_usuarios,$this->datosCliente);
		
		foreach ($this->parametro_general_usuarios as $parametro_general_usuarioLocal ) {
			parametro_general_usuario_logic_add::updateparametro_general_usuarioToGet($parametro_general_usuarioLocal);
		}
		*/
		
		return $this->parametro_general_usuarios;
	}
	
	public function setparametro_general_usuarios(array $newparametro_general_usuarios) {
		$this->parametro_general_usuarios = $newparametro_general_usuarios;
	}
	
	public function getparametro_general_usuarioDataAccess() : parametro_general_usuario_data {
		return $this->parametro_general_usuarioDataAccess;
	}
	
	public function setparametro_general_usuarioDataAccess(parametro_general_usuario_data $newparametro_general_usuarioDataAccess) {
		$this->parametro_general_usuarioDataAccess = $newparametro_general_usuarioDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        parametro_general_usuario_carga::$CONTROLLER;;        
		
		//REL DETALLES
		
    }
	
	
	/*
		executeQuery,executeQueryValor
		getTodos,getsFK_Idempresa
		getEntity,getEntityWithFinalQuery
		getEntities,getEntitiesWithFinalQuery
		getEntitiesWithQuerySelect,getEntitiesWithQuerySelect
		getEntitiesSimpleQueryBuild
		save,saves
		saveRelaciones,saveRelacionesDetalles
		quitarEliminados,deleteCascade
		loadFKsDescription
		cargarCombosLoteFK
		procesarAccions,procesarEventos,procesarPostAccions
		cargarArchivosPaquetesForeignKeys,cargarArchivosPaquetesRelaciones
		getClassesFKsOf,getClassesRelsOf
		getentity,getentities
		deepLoad,deepSave
	*/
}
?>
