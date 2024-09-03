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

namespace com\bydan\contabilidad\general\parametro_sql\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\general\parametro_sql\util\parametro_sql_carga;
use com\bydan\contabilidad\general\parametro_sql\util\parametro_sql_param_return;


use com\bydan\framework\contabilidad\util\Connexion;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\ParameterDbType;



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
use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
use com\bydan\contabilidad\seguridad\opcion\business\entity\opcion;
use com\bydan\contabilidad\seguridad\auditoria\business\entity\auditoria;

use com\bydan\contabilidad\general\parametro_sql\util\parametro_sql_util;
use com\bydan\contabilidad\general\parametro_sql\business\entity\parametro_sql;
use com\bydan\contabilidad\general\parametro_sql\business\data\parametro_sql_data;

//FK


//REL


//REL DETALLES




class parametro_sql_logic  extends GeneralEntityLogic implements parametro_sql_logicI {	
	/*GENERAL*/
	public parametro_sql_data $parametro_sqlDataAccess;
	//public ?parametro_sql_logic_add $parametro_sqlLogicAdditional=null;
	public ?parametro_sql $parametro_sql;
	public array $parametro_sqls;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->parametro_sqlDataAccess = new parametro_sql_data();			
			$this->parametro_sqls = array();
			$this->parametro_sql = new parametro_sql();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->parametro_sqlLogicAdditional = new parametro_sql_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->parametro_sqlLogicAdditional==null) {
		//	$this->parametro_sqlLogicAdditional=new parametro_sql_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->parametro_sqlDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->parametro_sqlDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->parametro_sqlDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->parametro_sqlDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->parametro_sqls = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_sqls=$this->parametro_sqlDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_sql_util::refrescarFKDescripciones($this->parametro_sqls);
			}
			
			//parametro_sql_logic_add::checkparametro_sqlToGets($this->parametro_sqls,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_sqls);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->parametro_sqls = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_sqls=$this->parametro_sqlDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_sql_util::refrescarFKDescripciones($this->parametro_sqls);
			}
			
			//parametro_sql_logic_add::checkparametro_sqlToGets($this->parametro_sqls,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_sqls);
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
		$this->parametro_sql = new parametro_sql();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->parametro_sql=$this->parametro_sqlDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_sql,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_sql_util::refrescarFKDescripcion($this->parametro_sql);
			}
						
			//parametro_sql_logic_add::checkparametro_sqlToGet($this->parametro_sql,$this->datosCliente);
			//parametro_sql_logic_add::updateparametro_sqlToGet($this->parametro_sql);
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
		$this->parametro_sql = new  parametro_sql();
		  		  
        try {		
			$this->parametro_sql=$this->parametro_sqlDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_sql,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_sql_util::refrescarFKDescripcion($this->parametro_sql);
			}
			
			//parametro_sql_logic_add::checkparametro_sqlToGet($this->parametro_sql,$this->datosCliente);
			//parametro_sql_logic_add::updateparametro_sqlToGet($this->parametro_sql);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?parametro_sql {
		$parametro_sqlLogic = new  parametro_sql_logic();
		  		  
        try {		
			$parametro_sqlLogic->setConnexion($connexion);			
			$parametro_sqlLogic->getEntity($id);			
			return $parametro_sqlLogic->getparametro_sql();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->parametro_sql = new  parametro_sql();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->parametro_sql=$this->parametro_sqlDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_sql,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_sql_util::refrescarFKDescripcion($this->parametro_sql);
			}
			
			//parametro_sql_logic_add::checkparametro_sqlToGet($this->parametro_sql,$this->datosCliente);
			//parametro_sql_logic_add::updateparametro_sqlToGet($this->parametro_sql);
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
		$this->parametro_sql = new  parametro_sql();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_sql=$this->parametro_sqlDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_sql,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_sql_util::refrescarFKDescripcion($this->parametro_sql);
			}
			
			//parametro_sql_logic_add::checkparametro_sqlToGet($this->parametro_sql,$this->datosCliente);
			//parametro_sql_logic_add::updateparametro_sqlToGet($this->parametro_sql);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?parametro_sql {
		$parametro_sqlLogic = new  parametro_sql_logic();
		  		  
        try {		
			$parametro_sqlLogic->setConnexion($connexion);			
			$parametro_sqlLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $parametro_sqlLogic->getparametro_sql();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->parametro_sqls = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->parametro_sqls=$this->parametro_sqlDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_sql_util::refrescarFKDescripciones($this->parametro_sqls);
			}
			
			//parametro_sql_logic_add::checkparametro_sqlToGets($this->parametro_sqls,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_sqls);			
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
		$this->parametro_sqls = array();
		  		  
        try {			
			$this->parametro_sqls=$this->parametro_sqlDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_sql_util::refrescarFKDescripciones($this->parametro_sqls);
			}
			
			//parametro_sql_logic_add::checkparametro_sqlToGets($this->parametro_sqls,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_sqls);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->parametro_sqls = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_sqls=$this->parametro_sqlDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_sql_util::refrescarFKDescripciones($this->parametro_sqls);
			}
			
			//parametro_sql_logic_add::checkparametro_sqlToGets($this->parametro_sqls,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_sqls);
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
		$this->parametro_sqls = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_sqls=$this->parametro_sqlDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_sql_util::refrescarFKDescripciones($this->parametro_sqls);
			}
			
			//parametro_sql_logic_add::checkparametro_sqlToGets($this->parametro_sqls,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_sqls);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$parametro_sqlLogic = new  parametro_sql_logic();
		  		  
        try {		
			$parametro_sqlLogic->setConnexion($connexion);			
			$parametro_sqlLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $parametro_sqlLogic->getparametro_sqls();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->parametro_sqls = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->parametro_sqls=$this->parametro_sqlDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_sql_util::refrescarFKDescripciones($this->parametro_sqls);
			}
			
			//parametro_sql_logic_add::checkparametro_sqlToGets($this->parametro_sqls,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_sqls);
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
		$this->parametro_sqls = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_sqls=$this->parametro_sqlDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_sql_util::refrescarFKDescripciones($this->parametro_sqls);
			}
			
			//parametro_sql_logic_add::checkparametro_sqlToGets($this->parametro_sqls,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_sqls);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->parametro_sqls = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_sqls=$this->parametro_sqlDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_sql_util::refrescarFKDescripciones($this->parametro_sqls);
			}
			
			//parametro_sql_logic_add::checkparametro_sqlToGets($this->parametro_sqls,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_sqls);
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
		$this->parametro_sqls = array();
		  		  
        try {			
			$this->parametro_sqls=$this->parametro_sqlDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_sql_util::refrescarFKDescripciones($this->parametro_sqls);
			}	
			
			//parametro_sql_logic_add::checkparametro_sqlToGets($this->parametro_sqls,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_sqls);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->parametro_sqls = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->parametro_sqls=$this->parametro_sqlDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_sql_util::refrescarFKDescripciones($this->parametro_sqls);
			}
			
			//parametro_sql_logic_add::checkparametro_sqlToGets($this->parametro_sqls,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_sqls);
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
		$this->parametro_sqls = array();
		  		  
        try {		
			$this->parametro_sqls=$this->parametro_sqlDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_sql_util::refrescarFKDescripciones($this->parametro_sqls);
			}
			
			//parametro_sql_logic_add::checkparametro_sqlToGets($this->parametro_sqls,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_sqls);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
				
	
	/*MANTENIMIENTO*/
	public function saveWithConnection() {	
		 try {	
			$this->connexion = Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
						
			//parametro_sql_logic_add::checkparametro_sqlToSave($this->parametro_sql,$this->datosCliente,$this->connexion);	       
			//parametro_sql_logic_add::updateparametro_sqlToSave($this->parametro_sql);			
			parametro_sql_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->parametro_sql,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->parametro_sqlLogicAdditional->checkGeneralEntityToSave($this,$this->parametro_sql,$this->datosCliente,$this->connexion);
			
			
			parametro_sql_data::save($this->parametro_sql, $this->connexion);	    	       	 				
			//parametro_sql_logic_add::checkparametro_sqlToSaveAfter($this->parametro_sql,$this->datosCliente,$this->connexion);			
			//$this->parametro_sqlLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->parametro_sql,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->parametro_sql,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->parametro_sql,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				parametro_sql_util::refrescarFKDescripcion($this->parametro_sql);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->parametro_sql->getIsDeleted()) {
				$this->parametro_sql=null;
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
						
			/*parametro_sql_logic_add::checkparametro_sqlToSave($this->parametro_sql,$this->datosCliente,$this->connexion);*/	        
			//parametro_sql_logic_add::updateparametro_sqlToSave($this->parametro_sql);			
			//$this->parametro_sqlLogicAdditional->checkGeneralEntityToSave($this,$this->parametro_sql,$this->datosCliente,$this->connexion);			
			parametro_sql_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->parametro_sql,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			parametro_sql_data::save($this->parametro_sql, $this->connexion);	    	       	 						
			/*parametro_sql_logic_add::checkparametro_sqlToSaveAfter($this->parametro_sql,$this->datosCliente,$this->connexion);*/			
			//$this->parametro_sqlLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->parametro_sql,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->parametro_sql,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->parametro_sql,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				parametro_sql_util::refrescarFKDescripcion($this->parametro_sql);				
			}
			
			if($this->parametro_sql->getIsDeleted()) {
				$this->parametro_sql=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(parametro_sql $parametro_sql,Connexion $connexion)  {
		$parametro_sqlLogic = new  parametro_sql_logic();		  		  
        try {		
			$parametro_sqlLogic->setConnexion($connexion);			
			$parametro_sqlLogic->setparametro_sql($parametro_sql);			
			$parametro_sqlLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*parametro_sql_logic_add::checkparametro_sqlToSaves($this->parametro_sqls,$this->datosCliente,$this->connexion);*/	        	
			//$this->parametro_sqlLogicAdditional->checkGeneralEntitiesToSaves($this,$this->parametro_sqls,$this->datosCliente,$this->connexion);
			
	   		foreach($this->parametro_sqls as $parametro_sqlLocal) {				
								
				//parametro_sql_logic_add::updateparametro_sqlToSave($parametro_sqlLocal);	        	
				parametro_sql_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$parametro_sqlLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				parametro_sql_data::save($parametro_sqlLocal, $this->connexion);				
			}
			
			/*parametro_sql_logic_add::checkparametro_sqlToSavesAfter($this->parametro_sqls,$this->datosCliente,$this->connexion);*/			
			//$this->parametro_sqlLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->parametro_sqls,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_sql_util::refrescarFKDescripciones($this->parametro_sqls);
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
			/*parametro_sql_logic_add::checkparametro_sqlToSaves($this->parametro_sqls,$this->datosCliente,$this->connexion);*/			
			//$this->parametro_sqlLogicAdditional->checkGeneralEntitiesToSaves($this,$this->parametro_sqls,$this->datosCliente,$this->connexion);
			
	   		foreach($this->parametro_sqls as $parametro_sqlLocal) {				
								
				//parametro_sql_logic_add::updateparametro_sqlToSave($parametro_sqlLocal);	        	
				parametro_sql_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$parametro_sqlLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				parametro_sql_data::save($parametro_sqlLocal, $this->connexion);				
			}			
			
			/*parametro_sql_logic_add::checkparametro_sqlToSavesAfter($this->parametro_sqls,$this->datosCliente,$this->connexion);*/			
			//$this->parametro_sqlLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->parametro_sqls,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_sql_util::refrescarFKDescripciones($this->parametro_sqls);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $parametro_sqls,Connexion $connexion)  {
		$parametro_sqlLogic = new  parametro_sql_logic();
		  		  
        try {		
			$parametro_sqlLogic->setConnexion($connexion);			
			$parametro_sqlLogic->setparametro_sqls($parametro_sqls);			
			$parametro_sqlLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$parametro_sqlsAux=array();
		
		foreach($this->parametro_sqls as $parametro_sql) {
			if($parametro_sql->getIsDeleted()==false) {
				$parametro_sqlsAux[]=$parametro_sql;
			}
		}
		
		$this->parametro_sqls=$parametro_sqlsAux;
	}
	
	public function updateToGetsAuxiliar(array &$parametro_sqls) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	
	
	
	public function saveRelacionesWithConnection($parametro_sql) {
		$this->saveRelacionesBase($parametro_sql,true);
	}

	public function saveRelaciones($parametro_sql) {
		$this->saveRelacionesBase($parametro_sql,false);
	}

	public function saveRelacionesBase($parametro_sql,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setparametro_sql($parametro_sql);

			if(true) {

				//parametro_sql_logic_add::updateRelacionesToSave($parametro_sql,$this);

				if(($this->parametro_sql->getIsNew() || $this->parametro_sql->getIsChanged()) && !$this->parametro_sql->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->parametro_sql->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//parametro_sql_logic_add::updateRelacionesToSaveAfter($parametro_sql,$this);

			} else {
				throw new Exception('LOS DATOS SON INVALIDOS');
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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $parametro_sqls,parametro_sql_param_return $parametro_sqlParameterGeneral) : parametro_sql_param_return {
		$parametro_sqlReturnGeneral=new parametro_sql_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $parametro_sqlReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $parametro_sqls,parametro_sql_param_return $parametro_sqlParameterGeneral) : parametro_sql_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$parametro_sqlReturnGeneral=new parametro_sql_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $parametro_sqlReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_sqls,parametro_sql $parametro_sql,parametro_sql_param_return $parametro_sqlParameterGeneral,bool $isEsNuevoparametro_sql,array $clases) : parametro_sql_param_return {
		 try {	
			$parametro_sqlReturnGeneral=new parametro_sql_param_return();
	
			$parametro_sqlReturnGeneral->setparametro_sql($parametro_sql);
			$parametro_sqlReturnGeneral->setparametro_sqls($parametro_sqls);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$parametro_sqlReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $parametro_sqlReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_sqls,parametro_sql $parametro_sql,parametro_sql_param_return $parametro_sqlParameterGeneral,bool $isEsNuevoparametro_sql,array $clases) : parametro_sql_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$parametro_sqlReturnGeneral=new parametro_sql_param_return();
	
			$parametro_sqlReturnGeneral->setparametro_sql($parametro_sql);
			$parametro_sqlReturnGeneral->setparametro_sqls($parametro_sqls);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$parametro_sqlReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $parametro_sqlReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_sqls,parametro_sql $parametro_sql,parametro_sql_param_return $parametro_sqlParameterGeneral,bool $isEsNuevoparametro_sql,array $clases) : parametro_sql_param_return {
		 try {	
			$parametro_sqlReturnGeneral=new parametro_sql_param_return();
	
			$parametro_sqlReturnGeneral->setparametro_sql($parametro_sql);
			$parametro_sqlReturnGeneral->setparametro_sqls($parametro_sqls);
			
			
			
			return $parametro_sqlReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_sqls,parametro_sql $parametro_sql,parametro_sql_param_return $parametro_sqlParameterGeneral,bool $isEsNuevoparametro_sql,array $clases) : parametro_sql_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$parametro_sqlReturnGeneral=new parametro_sql_param_return();
	
			$parametro_sqlReturnGeneral->setparametro_sql($parametro_sql);
			$parametro_sqlReturnGeneral->setparametro_sqls($parametro_sqls);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $parametro_sqlReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,parametro_sql $parametro_sql,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,parametro_sql $parametro_sql,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	
	
	
	public function deepLoad(parametro_sql $parametro_sql,bool $isDeep,string $deepLoadType,array $clases) {
		
		
		try {
			
			
			
			//parametro_sql_logic_add::updateparametro_sqlToGet($this->parametro_sql);
			
			
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		
	}
	
	public function deepSave(parametro_sql $parametro_sql,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		
		
		try {
			
			
			//parametro_sql_logic_add::updateparametro_sqlToSave($this->parametro_sql);			
			
			if(!$paraDeleteCascade) {				
				parametro_sql_data::save($parametro_sql, $this->connexion);
			}
			
			
			
			if($paraDeleteCascade) {				
				parametro_sql_data::save($parametro_sql, $this->connexion);
			}
			
		}catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}	
		
		
	}
		
	public function deepLoadWithConnection(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje) {		
		try {
			$this->getNewConnexionToDeep();
			
			$this->deepLoad($this->parametro_sql,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->parametro_sqls as $parametro_sql) {
				$this->deepLoad($parametro_sql,$isDeep,$deepLoadType,$clases);
								
				parametro_sql_util::refrescarFKDescripciones($this->parametro_sqls);
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
			
			foreach($this->parametro_sqls as $parametro_sql) {
				$this->deepLoad($parametro_sql,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->parametro_sql,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->parametro_sqls as $parametro_sql) {
				$this->deepSave($parametro_sql,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->parametro_sqls as $parametro_sql) {
				$this->deepSave($parametro_sql,$isDeep,$deepLoadType,$clases,false);
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
				
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
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
	
	
	
	
	
	
	
	public function getparametro_sql() : ?parametro_sql {	
		/*
		parametro_sql_logic_add::checkparametro_sqlToGet($this->parametro_sql,$this->datosCliente);
		parametro_sql_logic_add::updateparametro_sqlToGet($this->parametro_sql);
		*/
			
		return $this->parametro_sql;
	}
		
	public function setparametro_sql(parametro_sql $newparametro_sql) {
		$this->parametro_sql = $newparametro_sql;
	}
	
	public function getparametro_sqls() : array {		
		/*
		parametro_sql_logic_add::checkparametro_sqlToGets($this->parametro_sqls,$this->datosCliente);
		
		foreach ($this->parametro_sqls as $parametro_sqlLocal ) {
			parametro_sql_logic_add::updateparametro_sqlToGet($parametro_sqlLocal);
		}
		*/
		
		return $this->parametro_sqls;
	}
	
	public function setparametro_sqls(array $newparametro_sqls) {
		$this->parametro_sqls = $newparametro_sqls;
	}
	
	public function getparametro_sqlDataAccess() : parametro_sql_data {
		return $this->parametro_sqlDataAccess;
	}
	
	public function setparametro_sqlDataAccess(parametro_sql_data $newparametro_sqlDataAccess) {
		$this->parametro_sqlDataAccess = $newparametro_sqlDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        parametro_sql_carga::$CONTROLLER;;        
		
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
