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

namespace com\bydan\contabilidad\general\parametro_generico\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\general\parametro_generico\util\parametro_generico_carga;
use com\bydan\contabilidad\general\parametro_generico\util\parametro_generico_param_return;


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

use com\bydan\contabilidad\general\parametro_generico\util\parametro_generico_util;
use com\bydan\contabilidad\general\parametro_generico\business\entity\parametro_generico;
use com\bydan\contabilidad\general\parametro_generico\business\data\parametro_generico_data;

//FK


//REL


//REL DETALLES




class parametro_generico_logic  extends GeneralEntityLogic implements parametro_generico_logicI {	
	/*GENERAL*/
	public parametro_generico_data $parametro_genericoDataAccess;
	//public ?parametro_generico_logic_add $parametro_genericoLogicAdditional=null;
	public ?parametro_generico $parametro_generico;
	public array $parametro_genericos;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->parametro_genericoDataAccess = new parametro_generico_data();			
			$this->parametro_genericos = array();
			$this->parametro_generico = new parametro_generico();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->parametro_genericoLogicAdditional = new parametro_generico_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->parametro_genericoLogicAdditional==null) {
		//	$this->parametro_genericoLogicAdditional=new parametro_generico_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->parametro_genericoDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->parametro_genericoDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->parametro_genericoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->parametro_genericoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->parametro_genericos = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_genericos=$this->parametro_genericoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_generico_util::refrescarFKDescripciones($this->parametro_genericos);
			}
			
			//parametro_generico_logic_add::checkparametro_genericoToGets($this->parametro_genericos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_genericos);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->parametro_genericos = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_genericos=$this->parametro_genericoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_generico_util::refrescarFKDescripciones($this->parametro_genericos);
			}
			
			//parametro_generico_logic_add::checkparametro_genericoToGets($this->parametro_genericos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_genericos);
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
		$this->parametro_generico = new parametro_generico();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->parametro_generico=$this->parametro_genericoDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_generico,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_generico_util::refrescarFKDescripcion($this->parametro_generico);
			}
						
			//parametro_generico_logic_add::checkparametro_genericoToGet($this->parametro_generico,$this->datosCliente);
			//parametro_generico_logic_add::updateparametro_genericoToGet($this->parametro_generico);
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
		$this->parametro_generico = new  parametro_generico();
		  		  
        try {		
			$this->parametro_generico=$this->parametro_genericoDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_generico,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_generico_util::refrescarFKDescripcion($this->parametro_generico);
			}
			
			//parametro_generico_logic_add::checkparametro_genericoToGet($this->parametro_generico,$this->datosCliente);
			//parametro_generico_logic_add::updateparametro_genericoToGet($this->parametro_generico);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?parametro_generico {
		$parametro_genericoLogic = new  parametro_generico_logic();
		  		  
        try {		
			$parametro_genericoLogic->setConnexion($connexion);			
			$parametro_genericoLogic->getEntity($id);			
			return $parametro_genericoLogic->getparametro_generico();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->parametro_generico = new  parametro_generico();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->parametro_generico=$this->parametro_genericoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_generico,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_generico_util::refrescarFKDescripcion($this->parametro_generico);
			}
			
			//parametro_generico_logic_add::checkparametro_genericoToGet($this->parametro_generico,$this->datosCliente);
			//parametro_generico_logic_add::updateparametro_genericoToGet($this->parametro_generico);
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
		$this->parametro_generico = new  parametro_generico();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_generico=$this->parametro_genericoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_generico,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_generico_util::refrescarFKDescripcion($this->parametro_generico);
			}
			
			//parametro_generico_logic_add::checkparametro_genericoToGet($this->parametro_generico,$this->datosCliente);
			//parametro_generico_logic_add::updateparametro_genericoToGet($this->parametro_generico);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?parametro_generico {
		$parametro_genericoLogic = new  parametro_generico_logic();
		  		  
        try {		
			$parametro_genericoLogic->setConnexion($connexion);			
			$parametro_genericoLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $parametro_genericoLogic->getparametro_generico();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->parametro_genericos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->parametro_genericos=$this->parametro_genericoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_generico_util::refrescarFKDescripciones($this->parametro_genericos);
			}
			
			//parametro_generico_logic_add::checkparametro_genericoToGets($this->parametro_genericos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_genericos);			
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
		$this->parametro_genericos = array();
		  		  
        try {			
			$this->parametro_genericos=$this->parametro_genericoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_generico_util::refrescarFKDescripciones($this->parametro_genericos);
			}
			
			//parametro_generico_logic_add::checkparametro_genericoToGets($this->parametro_genericos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_genericos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->parametro_genericos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_genericos=$this->parametro_genericoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_generico_util::refrescarFKDescripciones($this->parametro_genericos);
			}
			
			//parametro_generico_logic_add::checkparametro_genericoToGets($this->parametro_genericos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_genericos);
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
		$this->parametro_genericos = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_genericos=$this->parametro_genericoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_generico_util::refrescarFKDescripciones($this->parametro_genericos);
			}
			
			//parametro_generico_logic_add::checkparametro_genericoToGets($this->parametro_genericos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_genericos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$parametro_genericoLogic = new  parametro_generico_logic();
		  		  
        try {		
			$parametro_genericoLogic->setConnexion($connexion);			
			$parametro_genericoLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $parametro_genericoLogic->getparametro_genericos();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->parametro_genericos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->parametro_genericos=$this->parametro_genericoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_generico_util::refrescarFKDescripciones($this->parametro_genericos);
			}
			
			//parametro_generico_logic_add::checkparametro_genericoToGets($this->parametro_genericos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_genericos);
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
		$this->parametro_genericos = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_genericos=$this->parametro_genericoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_generico_util::refrescarFKDescripciones($this->parametro_genericos);
			}
			
			//parametro_generico_logic_add::checkparametro_genericoToGets($this->parametro_genericos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_genericos);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->parametro_genericos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_genericos=$this->parametro_genericoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_generico_util::refrescarFKDescripciones($this->parametro_genericos);
			}
			
			//parametro_generico_logic_add::checkparametro_genericoToGets($this->parametro_genericos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_genericos);
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
		$this->parametro_genericos = array();
		  		  
        try {			
			$this->parametro_genericos=$this->parametro_genericoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_generico_util::refrescarFKDescripciones($this->parametro_genericos);
			}	
			
			//parametro_generico_logic_add::checkparametro_genericoToGets($this->parametro_genericos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_genericos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->parametro_genericos = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->parametro_genericos=$this->parametro_genericoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_generico_util::refrescarFKDescripciones($this->parametro_genericos);
			}
			
			//parametro_generico_logic_add::checkparametro_genericoToGets($this->parametro_genericos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_genericos);
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
		$this->parametro_genericos = array();
		  		  
        try {		
			$this->parametro_genericos=$this->parametro_genericoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_generico_util::refrescarFKDescripciones($this->parametro_genericos);
			}
			
			//parametro_generico_logic_add::checkparametro_genericoToGets($this->parametro_genericos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_genericos);

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
						
			//parametro_generico_logic_add::checkparametro_genericoToSave($this->parametro_generico,$this->datosCliente,$this->connexion);	       
			//parametro_generico_logic_add::updateparametro_genericoToSave($this->parametro_generico);			
			parametro_generico_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->parametro_generico,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->parametro_genericoLogicAdditional->checkGeneralEntityToSave($this,$this->parametro_generico,$this->datosCliente,$this->connexion);
			
			
			parametro_generico_data::save($this->parametro_generico, $this->connexion);	    	       	 				
			//parametro_generico_logic_add::checkparametro_genericoToSaveAfter($this->parametro_generico,$this->datosCliente,$this->connexion);			
			//$this->parametro_genericoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->parametro_generico,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->parametro_generico,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->parametro_generico,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				parametro_generico_util::refrescarFKDescripcion($this->parametro_generico);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->parametro_generico->getIsDeleted()) {
				$this->parametro_generico=null;
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
						
			/*parametro_generico_logic_add::checkparametro_genericoToSave($this->parametro_generico,$this->datosCliente,$this->connexion);*/	        
			//parametro_generico_logic_add::updateparametro_genericoToSave($this->parametro_generico);			
			//$this->parametro_genericoLogicAdditional->checkGeneralEntityToSave($this,$this->parametro_generico,$this->datosCliente,$this->connexion);			
			parametro_generico_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->parametro_generico,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			parametro_generico_data::save($this->parametro_generico, $this->connexion);	    	       	 						
			/*parametro_generico_logic_add::checkparametro_genericoToSaveAfter($this->parametro_generico,$this->datosCliente,$this->connexion);*/			
			//$this->parametro_genericoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->parametro_generico,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->parametro_generico,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->parametro_generico,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				parametro_generico_util::refrescarFKDescripcion($this->parametro_generico);				
			}
			
			if($this->parametro_generico->getIsDeleted()) {
				$this->parametro_generico=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(parametro_generico $parametro_generico,Connexion $connexion)  {
		$parametro_genericoLogic = new  parametro_generico_logic();		  		  
        try {		
			$parametro_genericoLogic->setConnexion($connexion);			
			$parametro_genericoLogic->setparametro_generico($parametro_generico);			
			$parametro_genericoLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*parametro_generico_logic_add::checkparametro_genericoToSaves($this->parametro_genericos,$this->datosCliente,$this->connexion);*/	        	
			//$this->parametro_genericoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->parametro_genericos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->parametro_genericos as $parametro_genericoLocal) {				
								
				//parametro_generico_logic_add::updateparametro_genericoToSave($parametro_genericoLocal);	        	
				parametro_generico_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$parametro_genericoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				parametro_generico_data::save($parametro_genericoLocal, $this->connexion);				
			}
			
			/*parametro_generico_logic_add::checkparametro_genericoToSavesAfter($this->parametro_genericos,$this->datosCliente,$this->connexion);*/			
			//$this->parametro_genericoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->parametro_genericos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_generico_util::refrescarFKDescripciones($this->parametro_genericos);
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
			/*parametro_generico_logic_add::checkparametro_genericoToSaves($this->parametro_genericos,$this->datosCliente,$this->connexion);*/			
			//$this->parametro_genericoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->parametro_genericos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->parametro_genericos as $parametro_genericoLocal) {				
								
				//parametro_generico_logic_add::updateparametro_genericoToSave($parametro_genericoLocal);	        	
				parametro_generico_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$parametro_genericoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				parametro_generico_data::save($parametro_genericoLocal, $this->connexion);				
			}			
			
			/*parametro_generico_logic_add::checkparametro_genericoToSavesAfter($this->parametro_genericos,$this->datosCliente,$this->connexion);*/			
			//$this->parametro_genericoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->parametro_genericos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_generico_util::refrescarFKDescripciones($this->parametro_genericos);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $parametro_genericos,Connexion $connexion)  {
		$parametro_genericoLogic = new  parametro_generico_logic();
		  		  
        try {		
			$parametro_genericoLogic->setConnexion($connexion);			
			$parametro_genericoLogic->setparametro_genericos($parametro_genericos);			
			$parametro_genericoLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$parametro_genericosAux=array();
		
		foreach($this->parametro_genericos as $parametro_generico) {
			if($parametro_generico->getIsDeleted()==false) {
				$parametro_genericosAux[]=$parametro_generico;
			}
		}
		
		$this->parametro_genericos=$parametro_genericosAux;
	}
	
	public function updateToGetsAuxiliar(array &$parametro_genericos) {
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
	
	
	
	public function saveRelacionesWithConnection($parametro_generico) {
		$this->saveRelacionesBase($parametro_generico,true);
	}

	public function saveRelaciones($parametro_generico) {
		$this->saveRelacionesBase($parametro_generico,false);
	}

	public function saveRelacionesBase($parametro_generico,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setparametro_generico($parametro_generico);

			if(true) {

				//parametro_generico_logic_add::updateRelacionesToSave($parametro_generico,$this);

				if(($this->parametro_generico->getIsNew() || $this->parametro_generico->getIsChanged()) && !$this->parametro_generico->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->parametro_generico->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//parametro_generico_logic_add::updateRelacionesToSaveAfter($parametro_generico,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $parametro_genericos,parametro_generico_param_return $parametro_genericoParameterGeneral) : parametro_generico_param_return {
		$parametro_genericoReturnGeneral=new parametro_generico_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $parametro_genericoReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $parametro_genericos,parametro_generico_param_return $parametro_genericoParameterGeneral) : parametro_generico_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$parametro_genericoReturnGeneral=new parametro_generico_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $parametro_genericoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_genericos,parametro_generico $parametro_generico,parametro_generico_param_return $parametro_genericoParameterGeneral,bool $isEsNuevoparametro_generico,array $clases) : parametro_generico_param_return {
		 try {	
			$parametro_genericoReturnGeneral=new parametro_generico_param_return();
	
			$parametro_genericoReturnGeneral->setparametro_generico($parametro_generico);
			$parametro_genericoReturnGeneral->setparametro_genericos($parametro_genericos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$parametro_genericoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $parametro_genericoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_genericos,parametro_generico $parametro_generico,parametro_generico_param_return $parametro_genericoParameterGeneral,bool $isEsNuevoparametro_generico,array $clases) : parametro_generico_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$parametro_genericoReturnGeneral=new parametro_generico_param_return();
	
			$parametro_genericoReturnGeneral->setparametro_generico($parametro_generico);
			$parametro_genericoReturnGeneral->setparametro_genericos($parametro_genericos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$parametro_genericoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $parametro_genericoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_genericos,parametro_generico $parametro_generico,parametro_generico_param_return $parametro_genericoParameterGeneral,bool $isEsNuevoparametro_generico,array $clases) : parametro_generico_param_return {
		 try {	
			$parametro_genericoReturnGeneral=new parametro_generico_param_return();
	
			$parametro_genericoReturnGeneral->setparametro_generico($parametro_generico);
			$parametro_genericoReturnGeneral->setparametro_genericos($parametro_genericos);
			
			
			
			return $parametro_genericoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_genericos,parametro_generico $parametro_generico,parametro_generico_param_return $parametro_genericoParameterGeneral,bool $isEsNuevoparametro_generico,array $clases) : parametro_generico_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$parametro_genericoReturnGeneral=new parametro_generico_param_return();
	
			$parametro_genericoReturnGeneral->setparametro_generico($parametro_generico);
			$parametro_genericoReturnGeneral->setparametro_genericos($parametro_genericos);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $parametro_genericoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,parametro_generico $parametro_generico,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,parametro_generico $parametro_generico,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	
	
	
	public function deepLoad(parametro_generico $parametro_generico,bool $isDeep,string $deepLoadType,array $clases) {
		
		
		try {
			
			
			
			//parametro_generico_logic_add::updateparametro_genericoToGet($this->parametro_generico);
			
			
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		
	}
	
	public function deepSave(parametro_generico $parametro_generico,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		
		
		try {
			
			
			//parametro_generico_logic_add::updateparametro_genericoToSave($this->parametro_generico);			
			
			if(!$paraDeleteCascade) {				
				parametro_generico_data::save($parametro_generico, $this->connexion);
			}
			
			
			
			if($paraDeleteCascade) {				
				parametro_generico_data::save($parametro_generico, $this->connexion);
			}
			
		}catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}	
		
		
	}
		
	public function deepLoadWithConnection(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje) {		
		try {
			$this->getNewConnexionToDeep();
			
			$this->deepLoad($this->parametro_generico,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->parametro_genericos as $parametro_generico) {
				$this->deepLoad($parametro_generico,$isDeep,$deepLoadType,$clases);
								
				parametro_generico_util::refrescarFKDescripciones($this->parametro_genericos);
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
			
			foreach($this->parametro_genericos as $parametro_generico) {
				$this->deepLoad($parametro_generico,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->parametro_generico,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->parametro_genericos as $parametro_generico) {
				$this->deepSave($parametro_generico,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->parametro_genericos as $parametro_generico) {
				$this->deepSave($parametro_generico,$isDeep,$deepLoadType,$clases,false);
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
	
	
	
	
	
	
	
	public function getparametro_generico() : ?parametro_generico {	
		/*
		parametro_generico_logic_add::checkparametro_genericoToGet($this->parametro_generico,$this->datosCliente);
		parametro_generico_logic_add::updateparametro_genericoToGet($this->parametro_generico);
		*/
			
		return $this->parametro_generico;
	}
		
	public function setparametro_generico(parametro_generico $newparametro_generico) {
		$this->parametro_generico = $newparametro_generico;
	}
	
	public function getparametro_genericos() : array {		
		/*
		parametro_generico_logic_add::checkparametro_genericoToGets($this->parametro_genericos,$this->datosCliente);
		
		foreach ($this->parametro_genericos as $parametro_genericoLocal ) {
			parametro_generico_logic_add::updateparametro_genericoToGet($parametro_genericoLocal);
		}
		*/
		
		return $this->parametro_genericos;
	}
	
	public function setparametro_genericos(array $newparametro_genericos) {
		$this->parametro_genericos = $newparametro_genericos;
	}
	
	public function getparametro_genericoDataAccess() : parametro_generico_data {
		return $this->parametro_genericoDataAccess;
	}
	
	public function setparametro_genericoDataAccess(parametro_generico_data $newparametro_genericoDataAccess) {
		$this->parametro_genericoDataAccess = $newparametro_genericoDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        parametro_generico_carga::$CONTROLLER;;        
		
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
