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

namespace com\bydan\contabilidad\general\parametro_general\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\general\parametro_general\util\parametro_general_carga;
use com\bydan\contabilidad\general\parametro_general\util\parametro_general_param_return;

use com\bydan\contabilidad\general\parametro_general\presentation\session\parametro_general_session;

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
use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
use com\bydan\contabilidad\seguridad\opcion\business\entity\opcion;
use com\bydan\contabilidad\seguridad\auditoria\business\entity\auditoria;

use com\bydan\contabilidad\general\parametro_general\util\parametro_general_util;
use com\bydan\contabilidad\general\parametro_general\business\entity\parametro_general;
use com\bydan\contabilidad\general\parametro_general\business\data\parametro_general_data;

//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\seguridad\pais\business\entity\pais;
use com\bydan\contabilidad\seguridad\pais\business\data\pais_data;
use com\bydan\contabilidad\seguridad\pais\business\logic\pais_logic;
use com\bydan\contabilidad\seguridad\pais\util\pais_util;

use com\bydan\contabilidad\contabilidad\moneda\business\entity\moneda;
use com\bydan\contabilidad\contabilidad\moneda\business\data\moneda_data;
use com\bydan\contabilidad\contabilidad\moneda\business\logic\moneda_logic;
use com\bydan\contabilidad\contabilidad\moneda\util\moneda_util;

//REL


//REL DETALLES




class parametro_general_logic  extends GeneralEntityLogic implements parametro_general_logicI {	
	/*GENERAL*/
	public parametro_general_data $parametro_generalDataAccess;
	//public ?parametro_general_logic_add $parametro_generalLogicAdditional=null;
	public ?parametro_general $parametro_general;
	public array $parametro_generals;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->parametro_generalDataAccess = new parametro_general_data();			
			$this->parametro_generals = array();
			$this->parametro_general = new parametro_general();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->parametro_generalLogicAdditional = new parametro_general_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->parametro_generalLogicAdditional==null) {
		//	$this->parametro_generalLogicAdditional=new parametro_general_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->parametro_generalDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->parametro_generalDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->parametro_generalDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->parametro_generalDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->parametro_generals = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_generals=$this->parametro_generalDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_general_util::refrescarFKDescripciones($this->parametro_generals);
			}
			
			//parametro_general_logic_add::checkparametro_generalToGets($this->parametro_generals,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_generals);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->parametro_generals = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_generals=$this->parametro_generalDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_general_util::refrescarFKDescripciones($this->parametro_generals);
			}
			
			//parametro_general_logic_add::checkparametro_generalToGets($this->parametro_generals,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_generals);
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
		$this->parametro_general = new parametro_general();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->parametro_general=$this->parametro_generalDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_general,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_general_util::refrescarFKDescripcion($this->parametro_general);
			}
						
			//parametro_general_logic_add::checkparametro_generalToGet($this->parametro_general,$this->datosCliente);
			//parametro_general_logic_add::updateparametro_generalToGet($this->parametro_general);
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
		$this->parametro_general = new  parametro_general();
		  		  
        try {		
			$this->parametro_general=$this->parametro_generalDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_general,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_general_util::refrescarFKDescripcion($this->parametro_general);
			}
			
			//parametro_general_logic_add::checkparametro_generalToGet($this->parametro_general,$this->datosCliente);
			//parametro_general_logic_add::updateparametro_generalToGet($this->parametro_general);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?parametro_general {
		$parametro_generalLogic = new  parametro_general_logic();
		  		  
        try {		
			$parametro_generalLogic->setConnexion($connexion);			
			$parametro_generalLogic->getEntity($id);			
			return $parametro_generalLogic->getparametro_general();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->parametro_general = new  parametro_general();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->parametro_general=$this->parametro_generalDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_general,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_general_util::refrescarFKDescripcion($this->parametro_general);
			}
			
			//parametro_general_logic_add::checkparametro_generalToGet($this->parametro_general,$this->datosCliente);
			//parametro_general_logic_add::updateparametro_generalToGet($this->parametro_general);
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
		$this->parametro_general = new  parametro_general();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_general=$this->parametro_generalDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_general,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_general_util::refrescarFKDescripcion($this->parametro_general);
			}
			
			//parametro_general_logic_add::checkparametro_generalToGet($this->parametro_general,$this->datosCliente);
			//parametro_general_logic_add::updateparametro_generalToGet($this->parametro_general);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?parametro_general {
		$parametro_generalLogic = new  parametro_general_logic();
		  		  
        try {		
			$parametro_generalLogic->setConnexion($connexion);			
			$parametro_generalLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $parametro_generalLogic->getparametro_general();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->parametro_generals = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->parametro_generals=$this->parametro_generalDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_general_util::refrescarFKDescripciones($this->parametro_generals);
			}
			
			//parametro_general_logic_add::checkparametro_generalToGets($this->parametro_generals,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_generals);			
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
		$this->parametro_generals = array();
		  		  
        try {			
			$this->parametro_generals=$this->parametro_generalDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_general_util::refrescarFKDescripciones($this->parametro_generals);
			}
			
			//parametro_general_logic_add::checkparametro_generalToGets($this->parametro_generals,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_generals);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->parametro_generals = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_generals=$this->parametro_generalDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_general_util::refrescarFKDescripciones($this->parametro_generals);
			}
			
			//parametro_general_logic_add::checkparametro_generalToGets($this->parametro_generals,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_generals);
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
		$this->parametro_generals = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_generals=$this->parametro_generalDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_general_util::refrescarFKDescripciones($this->parametro_generals);
			}
			
			//parametro_general_logic_add::checkparametro_generalToGets($this->parametro_generals,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_generals);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$parametro_generalLogic = new  parametro_general_logic();
		  		  
        try {		
			$parametro_generalLogic->setConnexion($connexion);			
			$parametro_generalLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $parametro_generalLogic->getparametro_generals();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->parametro_generals = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->parametro_generals=$this->parametro_generalDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_general_util::refrescarFKDescripciones($this->parametro_generals);
			}
			
			//parametro_general_logic_add::checkparametro_generalToGets($this->parametro_generals,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_generals);
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
		$this->parametro_generals = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_generals=$this->parametro_generalDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_general_util::refrescarFKDescripciones($this->parametro_generals);
			}
			
			//parametro_general_logic_add::checkparametro_generalToGets($this->parametro_generals,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_generals);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->parametro_generals = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_generals=$this->parametro_generalDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_general_util::refrescarFKDescripciones($this->parametro_generals);
			}
			
			//parametro_general_logic_add::checkparametro_generalToGets($this->parametro_generals,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_generals);
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
		$this->parametro_generals = array();
		  		  
        try {			
			$this->parametro_generals=$this->parametro_generalDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_general_util::refrescarFKDescripciones($this->parametro_generals);
			}	
			
			//parametro_general_logic_add::checkparametro_generalToGets($this->parametro_generals,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_generals);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->parametro_generals = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->parametro_generals=$this->parametro_generalDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_general_util::refrescarFKDescripciones($this->parametro_generals);
			}
			
			//parametro_general_logic_add::checkparametro_generalToGets($this->parametro_generals,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_generals);
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
		$this->parametro_generals = array();
		  		  
        try {		
			$this->parametro_generals=$this->parametro_generalDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_general_util::refrescarFKDescripciones($this->parametro_generals);
			}
			
			//parametro_general_logic_add::checkparametro_generalToGets($this->parametro_generals,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_generals);

		}  catch(Exception $e) {						
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,parametro_general_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->parametro_generals=$this->parametro_generalDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				parametro_general_util::refrescarFKDescripciones($this->parametro_generals);
			}
			//parametro_general_logic_add::checkparametro_generalToGets($this->parametro_generals,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->parametro_generals);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,parametro_general_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->parametro_generals=$this->parametro_generalDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				parametro_general_util::refrescarFKDescripciones($this->parametro_generals);
			}
			//parametro_general_logic_add::checkparametro_generalToGets($this->parametro_generals,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->parametro_generals);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdmonedaWithConnection(string $strFinalQuery,Pagination $pagination,int $id_modena) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_moneda= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_moneda->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_modena,parametro_general_util::$ID_MONEDA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_moneda);

			$this->parametro_generals=$this->parametro_generalDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				parametro_general_util::refrescarFKDescripciones($this->parametro_generals);
			}
			//parametro_general_logic_add::checkparametro_generalToGets($this->parametro_generals,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->parametro_generals);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idmoneda(string $strFinalQuery,Pagination $pagination,int $id_modena) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_moneda= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_moneda->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_modena,parametro_general_util::$ID_MONEDA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_moneda);

			$this->parametro_generals=$this->parametro_generalDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				parametro_general_util::refrescarFKDescripciones($this->parametro_generals);
			}
			//parametro_general_logic_add::checkparametro_generalToGets($this->parametro_generals,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->parametro_generals);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdpaisWithConnection(string $strFinalQuery,Pagination $pagination,int $id_pais) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_pais= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_pais->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_pais,parametro_general_util::$ID_PAIS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_pais);

			$this->parametro_generals=$this->parametro_generalDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				parametro_general_util::refrescarFKDescripciones($this->parametro_generals);
			}
			//parametro_general_logic_add::checkparametro_generalToGets($this->parametro_generals,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->parametro_generals);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idpais(string $strFinalQuery,Pagination $pagination,int $id_pais) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_pais= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_pais->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_pais,parametro_general_util::$ID_PAIS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_pais);

			$this->parametro_generals=$this->parametro_generalDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				parametro_general_util::refrescarFKDescripciones($this->parametro_generals);
			}
			//parametro_general_logic_add::checkparametro_generalToGets($this->parametro_generals,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->parametro_generals);
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
						
			//parametro_general_logic_add::checkparametro_generalToSave($this->parametro_general,$this->datosCliente,$this->connexion);	       
			//parametro_general_logic_add::updateparametro_generalToSave($this->parametro_general);			
			parametro_general_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->parametro_general,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->parametro_generalLogicAdditional->checkGeneralEntityToSave($this,$this->parametro_general,$this->datosCliente,$this->connexion);
			
			
			parametro_general_data::save($this->parametro_general, $this->connexion);	    	       	 				
			//parametro_general_logic_add::checkparametro_generalToSaveAfter($this->parametro_general,$this->datosCliente,$this->connexion);			
			//$this->parametro_generalLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->parametro_general,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->parametro_general,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->parametro_general,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				parametro_general_util::refrescarFKDescripcion($this->parametro_general);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->parametro_general->getIsDeleted()) {
				$this->parametro_general=null;
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
						
			/*parametro_general_logic_add::checkparametro_generalToSave($this->parametro_general,$this->datosCliente,$this->connexion);*/	        
			//parametro_general_logic_add::updateparametro_generalToSave($this->parametro_general);			
			//$this->parametro_generalLogicAdditional->checkGeneralEntityToSave($this,$this->parametro_general,$this->datosCliente,$this->connexion);			
			parametro_general_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->parametro_general,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			parametro_general_data::save($this->parametro_general, $this->connexion);	    	       	 						
			/*parametro_general_logic_add::checkparametro_generalToSaveAfter($this->parametro_general,$this->datosCliente,$this->connexion);*/			
			//$this->parametro_generalLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->parametro_general,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->parametro_general,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->parametro_general,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				parametro_general_util::refrescarFKDescripcion($this->parametro_general);				
			}
			
			if($this->parametro_general->getIsDeleted()) {
				$this->parametro_general=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(parametro_general $parametro_general,Connexion $connexion)  {
		$parametro_generalLogic = new  parametro_general_logic();		  		  
        try {		
			$parametro_generalLogic->setConnexion($connexion);			
			$parametro_generalLogic->setparametro_general($parametro_general);			
			$parametro_generalLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*parametro_general_logic_add::checkparametro_generalToSaves($this->parametro_generals,$this->datosCliente,$this->connexion);*/	        	
			//$this->parametro_generalLogicAdditional->checkGeneralEntitiesToSaves($this,$this->parametro_generals,$this->datosCliente,$this->connexion);
			
	   		foreach($this->parametro_generals as $parametro_generalLocal) {				
								
				//parametro_general_logic_add::updateparametro_generalToSave($parametro_generalLocal);	        	
				parametro_general_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$parametro_generalLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				parametro_general_data::save($parametro_generalLocal, $this->connexion);				
			}
			
			/*parametro_general_logic_add::checkparametro_generalToSavesAfter($this->parametro_generals,$this->datosCliente,$this->connexion);*/			
			//$this->parametro_generalLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->parametro_generals,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_general_util::refrescarFKDescripciones($this->parametro_generals);
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
			/*parametro_general_logic_add::checkparametro_generalToSaves($this->parametro_generals,$this->datosCliente,$this->connexion);*/			
			//$this->parametro_generalLogicAdditional->checkGeneralEntitiesToSaves($this,$this->parametro_generals,$this->datosCliente,$this->connexion);
			
	   		foreach($this->parametro_generals as $parametro_generalLocal) {				
								
				//parametro_general_logic_add::updateparametro_generalToSave($parametro_generalLocal);	        	
				parametro_general_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$parametro_generalLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				parametro_general_data::save($parametro_generalLocal, $this->connexion);				
			}			
			
			/*parametro_general_logic_add::checkparametro_generalToSavesAfter($this->parametro_generals,$this->datosCliente,$this->connexion);*/			
			//$this->parametro_generalLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->parametro_generals,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_general_util::refrescarFKDescripciones($this->parametro_generals);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $parametro_generals,Connexion $connexion)  {
		$parametro_generalLogic = new  parametro_general_logic();
		  		  
        try {		
			$parametro_generalLogic->setConnexion($connexion);			
			$parametro_generalLogic->setparametro_generals($parametro_generals);			
			$parametro_generalLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$parametro_generalsAux=array();
		
		foreach($this->parametro_generals as $parametro_general) {
			if($parametro_general->getIsDeleted()==false) {
				$parametro_generalsAux[]=$parametro_general;
			}
		}
		
		$this->parametro_generals=$parametro_generalsAux;
	}
	
	public function updateToGetsAuxiliar(array &$parametro_generals) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->parametro_generals as $parametro_general) {
				
				$parametro_general->setid_empresa_Descripcion(parametro_general_util::getempresaDescripcion($parametro_general->getempresa()));
				$parametro_general->setid_pais_Descripcion(parametro_general_util::getpaisDescripcion($parametro_general->getpais()));
				$parametro_general->setid_modena_Descripcion(parametro_general_util::getmonedaDescripcion($parametro_general->getmoneda()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$parametro_general_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$parametro_general_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$parametro_general_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$parametro_general_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$parametro_general_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$parametro_generalForeignKey=new parametro_general_param_return();//parametro_generalForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$parametro_generalForeignKey,$parametro_general_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_pais',$strRecargarFkTipos,',')) {
				$this->cargarCombospaissFK($this->connexion,$strRecargarFkQuery,$parametro_generalForeignKey,$parametro_general_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_modena',$strRecargarFkTipos,',')) {
				$this->cargarCombosmonedasFK($this->connexion,$strRecargarFkQuery,$parametro_generalForeignKey,$parametro_general_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$parametro_generalForeignKey,$parametro_general_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_pais',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombospaissFK($this->connexion,' where id=-1 ',$parametro_generalForeignKey,$parametro_general_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_modena',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosmonedasFK($this->connexion,' where id=-1 ',$parametro_generalForeignKey,$parametro_general_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $parametro_generalForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$parametro_generalForeignKey,$parametro_general_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$parametro_generalForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($parametro_general_session==null) {
			$parametro_general_session=new parametro_general_session();
		}
		
		if($parametro_general_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($parametro_generalForeignKey->idempresaDefaultFK==0) {
					$parametro_generalForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$parametro_generalForeignKey->empresasFK[$empresaLocal->getId()]=parametro_general_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($parametro_general_session->bigidempresaActual!=null && $parametro_general_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($parametro_general_session->bigidempresaActual);//WithConnection

				$parametro_generalForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=parametro_general_util::getempresaDescripcion($empresaLogic->getempresa());
				$parametro_generalForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombospaissFK($connexion=null,$strRecargarFkQuery='',$parametro_generalForeignKey,$parametro_general_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$paisLogic= new pais_logic();
		$pagination= new Pagination();
		$parametro_generalForeignKey->paissFK=array();

		$paisLogic->setConnexion($connexion);
		$paisLogic->getpaisDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($parametro_general_session==null) {
			$parametro_general_session=new parametro_general_session();
		}
		
		if($parametro_general_session->bitBusquedaDesdeFKSesionpais!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=pais_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalpais=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalpais=Funciones::GetFinalQueryAppend($finalQueryGlobalpais, '');
				$finalQueryGlobalpais.=pais_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalpais.$strRecargarFkQuery;		

				$paisLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($paisLogic->getpaiss() as $paisLocal ) {
				if($parametro_generalForeignKey->idpaisDefaultFK==0) {
					$parametro_generalForeignKey->idpaisDefaultFK=$paisLocal->getId();
				}

				$parametro_generalForeignKey->paissFK[$paisLocal->getId()]=parametro_general_util::getpaisDescripcion($paisLocal);
			}

		} else {

			if($parametro_general_session->bigidpaisActual!=null && $parametro_general_session->bigidpaisActual > 0) {
				$paisLogic->getEntity($parametro_general_session->bigidpaisActual);//WithConnection

				$parametro_generalForeignKey->paissFK[$paisLogic->getpais()->getId()]=parametro_general_util::getpaisDescripcion($paisLogic->getpais());
				$parametro_generalForeignKey->idpaisDefaultFK=$paisLogic->getpais()->getId();
			}
		}
	}

	public function cargarCombosmonedasFK($connexion=null,$strRecargarFkQuery='',$parametro_generalForeignKey,$parametro_general_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$monedaLogic= new moneda_logic();
		$pagination= new Pagination();
		$parametro_generalForeignKey->monedasFK=array();

		$monedaLogic->setConnexion($connexion);
		$monedaLogic->getmonedaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($parametro_general_session==null) {
			$parametro_general_session=new parametro_general_session();
		}
		
		if($parametro_general_session->bitBusquedaDesdeFKSesionmoneda!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=moneda_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalmoneda=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalmoneda=Funciones::GetFinalQueryAppend($finalQueryGlobalmoneda, '');
				$finalQueryGlobalmoneda.=moneda_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalmoneda.$strRecargarFkQuery;		

				$monedaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($monedaLogic->getmonedas() as $monedaLocal ) {
				if($parametro_generalForeignKey->idmonedaDefaultFK==0) {
					$parametro_generalForeignKey->idmonedaDefaultFK=$monedaLocal->getId();
				}

				$parametro_generalForeignKey->monedasFK[$monedaLocal->getId()]=parametro_general_util::getmonedaDescripcion($monedaLocal);
			}

		} else {

			if($parametro_general_session->bigidmonedaActual!=null && $parametro_general_session->bigidmonedaActual > 0) {
				$monedaLogic->getEntity($parametro_general_session->bigidmonedaActual);//WithConnection

				$parametro_generalForeignKey->monedasFK[$monedaLogic->getmoneda()->getId()]=parametro_general_util::getmonedaDescripcion($monedaLogic->getmoneda());
				$parametro_generalForeignKey->idmonedaDefaultFK=$monedaLogic->getmoneda()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($parametro_general) {
		$this->saveRelacionesBase($parametro_general,true);
	}

	public function saveRelaciones($parametro_general) {
		$this->saveRelacionesBase($parametro_general,false);
	}

	public function saveRelacionesBase($parametro_general,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setparametro_general($parametro_general);

			if(true) {

				//parametro_general_logic_add::updateRelacionesToSave($parametro_general,$this);

				if(($this->parametro_general->getIsNew() || $this->parametro_general->getIsChanged()) && !$this->parametro_general->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->parametro_general->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//parametro_general_logic_add::updateRelacionesToSaveAfter($parametro_general,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $parametro_generals,parametro_general_param_return $parametro_generalParameterGeneral) : parametro_general_param_return {
		$parametro_generalReturnGeneral=new parametro_general_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $parametro_generalReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $parametro_generals,parametro_general_param_return $parametro_generalParameterGeneral) : parametro_general_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$parametro_generalReturnGeneral=new parametro_general_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $parametro_generalReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_generals,parametro_general $parametro_general,parametro_general_param_return $parametro_generalParameterGeneral,bool $isEsNuevoparametro_general,array $clases) : parametro_general_param_return {
		 try {	
			$parametro_generalReturnGeneral=new parametro_general_param_return();
	
			$parametro_generalReturnGeneral->setparametro_general($parametro_general);
			$parametro_generalReturnGeneral->setparametro_generals($parametro_generals);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$parametro_generalReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $parametro_generalReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_generals,parametro_general $parametro_general,parametro_general_param_return $parametro_generalParameterGeneral,bool $isEsNuevoparametro_general,array $clases) : parametro_general_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$parametro_generalReturnGeneral=new parametro_general_param_return();
	
			$parametro_generalReturnGeneral->setparametro_general($parametro_general);
			$parametro_generalReturnGeneral->setparametro_generals($parametro_generals);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$parametro_generalReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $parametro_generalReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_generals,parametro_general $parametro_general,parametro_general_param_return $parametro_generalParameterGeneral,bool $isEsNuevoparametro_general,array $clases) : parametro_general_param_return {
		 try {	
			$parametro_generalReturnGeneral=new parametro_general_param_return();
	
			$parametro_generalReturnGeneral->setparametro_general($parametro_general);
			$parametro_generalReturnGeneral->setparametro_generals($parametro_generals);
			
			
			
			return $parametro_generalReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_generals,parametro_general $parametro_general,parametro_general_param_return $parametro_generalParameterGeneral,bool $isEsNuevoparametro_general,array $clases) : parametro_general_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$parametro_generalReturnGeneral=new parametro_general_param_return();
	
			$parametro_generalReturnGeneral->setparametro_general($parametro_general);
			$parametro_generalReturnGeneral->setparametro_generals($parametro_generals);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $parametro_generalReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,parametro_general $parametro_general,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,parametro_general $parametro_general,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		parametro_general_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(parametro_general $parametro_general,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//parametro_general_logic_add::updateparametro_generalToGet($this->parametro_general);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$parametro_general->setempresa($this->parametro_generalDataAccess->getempresa($this->connexion,$parametro_general));
		$parametro_general->setpais($this->parametro_generalDataAccess->getpais($this->connexion,$parametro_general));
		$parametro_general->setmoneda($this->parametro_generalDataAccess->getmoneda($this->connexion,$parametro_general));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$parametro_general->setempresa($this->parametro_generalDataAccess->getempresa($this->connexion,$parametro_general));
				continue;
			}

			if($clas->clas==pais::$class.'') {
				$parametro_general->setpais($this->parametro_generalDataAccess->getpais($this->connexion,$parametro_general));
				continue;
			}

			if($clas->clas==moneda::$class.'') {
				$parametro_general->setmoneda($this->parametro_generalDataAccess->getmoneda($this->connexion,$parametro_general));
				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$parametro_general->setempresa($this->parametro_generalDataAccess->getempresa($this->connexion,$parametro_general));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==pais::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$parametro_general->setpais($this->parametro_generalDataAccess->getpais($this->connexion,$parametro_general));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==moneda::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$parametro_general->setmoneda($this->parametro_generalDataAccess->getmoneda($this->connexion,$parametro_general));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$parametro_general->setempresa($this->parametro_generalDataAccess->getempresa($this->connexion,$parametro_general));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($parametro_general->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$parametro_general->setpais($this->parametro_generalDataAccess->getpais($this->connexion,$parametro_general));
		$paisLogic= new pais_logic($this->connexion);
		$paisLogic->deepLoad($parametro_general->getpais(),$isDeep,$deepLoadType,$clases);
				
		$parametro_general->setmoneda($this->parametro_generalDataAccess->getmoneda($this->connexion,$parametro_general));
		$monedaLogic= new moneda_logic($this->connexion);
		$monedaLogic->deepLoad($parametro_general->getmoneda(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$parametro_general->setempresa($this->parametro_generalDataAccess->getempresa($this->connexion,$parametro_general));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($parametro_general->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==pais::$class.'') {
				$parametro_general->setpais($this->parametro_generalDataAccess->getpais($this->connexion,$parametro_general));
				$paisLogic= new pais_logic($this->connexion);
				$paisLogic->deepLoad($parametro_general->getpais(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==moneda::$class.'') {
				$parametro_general->setmoneda($this->parametro_generalDataAccess->getmoneda($this->connexion,$parametro_general));
				$monedaLogic= new moneda_logic($this->connexion);
				$monedaLogic->deepLoad($parametro_general->getmoneda(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$parametro_general->setempresa($this->parametro_generalDataAccess->getempresa($this->connexion,$parametro_general));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($parametro_general->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==pais::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$parametro_general->setpais($this->parametro_generalDataAccess->getpais($this->connexion,$parametro_general));
			$paisLogic= new pais_logic($this->connexion);
			$paisLogic->deepLoad($parametro_general->getpais(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==moneda::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$parametro_general->setmoneda($this->parametro_generalDataAccess->getmoneda($this->connexion,$parametro_general));
			$monedaLogic= new moneda_logic($this->connexion);
			$monedaLogic->deepLoad($parametro_general->getmoneda(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(parametro_general $parametro_general,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//parametro_general_logic_add::updateparametro_generalToSave($this->parametro_general);			
			
			if(!$paraDeleteCascade) {				
				parametro_general_data::save($parametro_general, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($parametro_general->getempresa(),$this->connexion);
		pais_data::save($parametro_general->getpais(),$this->connexion);
		moneda_data::save($parametro_general->getmoneda(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($parametro_general->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==pais::$class.'') {
				pais_data::save($parametro_general->getpais(),$this->connexion);
				continue;
			}

			if($clas->clas==moneda::$class.'') {
				moneda_data::save($parametro_general->getmoneda(),$this->connexion);
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			empresa_data::save($parametro_general->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==pais::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			pais_data::save($parametro_general->getpais(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==moneda::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			moneda_data::save($parametro_general->getmoneda(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($parametro_general->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($parametro_general->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		pais_data::save($parametro_general->getpais(),$this->connexion);
		$paisLogic= new pais_logic($this->connexion);
		$paisLogic->deepSave($parametro_general->getpais(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		moneda_data::save($parametro_general->getmoneda(),$this->connexion);
		$monedaLogic= new moneda_logic($this->connexion);
		$monedaLogic->deepSave($parametro_general->getmoneda(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($parametro_general->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($parametro_general->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==pais::$class.'') {
				pais_data::save($parametro_general->getpais(),$this->connexion);
				$paisLogic= new pais_logic($this->connexion);
				$paisLogic->deepSave($parametro_general->getpais(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==moneda::$class.'') {
				moneda_data::save($parametro_general->getmoneda(),$this->connexion);
				$monedaLogic= new moneda_logic($this->connexion);
				$monedaLogic->deepSave($parametro_general->getmoneda(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			empresa_data::save($parametro_general->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($parametro_general->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==pais::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			pais_data::save($parametro_general->getpais(),$this->connexion);
			$paisLogic= new pais_logic($this->connexion);
			$paisLogic->deepSave($parametro_general->getpais(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==moneda::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			moneda_data::save($parametro_general->getmoneda(),$this->connexion);
			$monedaLogic= new moneda_logic($this->connexion);
			$monedaLogic->deepSave($parametro_general->getmoneda(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				parametro_general_data::save($parametro_general, $this->connexion);
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
			
			$this->deepLoad($this->parametro_general,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->parametro_generals as $parametro_general) {
				$this->deepLoad($parametro_general,$isDeep,$deepLoadType,$clases);
								
				parametro_general_util::refrescarFKDescripciones($this->parametro_generals);
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
			
			foreach($this->parametro_generals as $parametro_general) {
				$this->deepLoad($parametro_general,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->parametro_general,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->parametro_generals as $parametro_general) {
				$this->deepSave($parametro_general,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->parametro_generals as $parametro_general) {
				$this->deepSave($parametro_general,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(empresa::$class);
				$classes[]=new Classe(pais::$class);
				$classes[]=new Classe(moneda::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==pais::$class) {
						$classes[]=new Classe(pais::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==moneda::$class) {
						$classes[]=new Classe(moneda::$class);
					}
				}

			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

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
					if($clas->clas==pais::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(pais::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==moneda::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(moneda::$class);
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
	
	
	
	
	
	
	
	public function getparametro_general() : ?parametro_general {	
		/*
		parametro_general_logic_add::checkparametro_generalToGet($this->parametro_general,$this->datosCliente);
		parametro_general_logic_add::updateparametro_generalToGet($this->parametro_general);
		*/
			
		return $this->parametro_general;
	}
		
	public function setparametro_general(parametro_general $newparametro_general) {
		$this->parametro_general = $newparametro_general;
	}
	
	public function getparametro_generals() : array {		
		/*
		parametro_general_logic_add::checkparametro_generalToGets($this->parametro_generals,$this->datosCliente);
		
		foreach ($this->parametro_generals as $parametro_generalLocal ) {
			parametro_general_logic_add::updateparametro_generalToGet($parametro_generalLocal);
		}
		*/
		
		return $this->parametro_generals;
	}
	
	public function setparametro_generals(array $newparametro_generals) {
		$this->parametro_generals = $newparametro_generals;
	}
	
	public function getparametro_generalDataAccess() : parametro_general_data {
		return $this->parametro_generalDataAccess;
	}
	
	public function setparametro_generalDataAccess(parametro_general_data $newparametro_generalDataAccess) {
		$this->parametro_generalDataAccess = $newparametro_generalDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        parametro_general_carga::$CONTROLLER;;        
		
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
