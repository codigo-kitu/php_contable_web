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

namespace com\bydan\contabilidad\contabilidad\parametro_contabilidad\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\contabilidad\parametro_contabilidad\util\parametro_contabilidad_carga;
use com\bydan\contabilidad\contabilidad\parametro_contabilidad\util\parametro_contabilidad_param_return;

use com\bydan\contabilidad\contabilidad\parametro_contabilidad\presentation\session\parametro_contabilidad_session;

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

use com\bydan\contabilidad\contabilidad\parametro_contabilidad\util\parametro_contabilidad_util;
use com\bydan\contabilidad\contabilidad\parametro_contabilidad\business\entity\parametro_contabilidad;
use com\bydan\contabilidad\contabilidad\parametro_contabilidad\business\data\parametro_contabilidad_data;

//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

//REL


//REL DETALLES




class parametro_contabilidad_logic  extends GeneralEntityLogic implements parametro_contabilidad_logicI {	
	/*GENERAL*/
	public parametro_contabilidad_data $parametro_contabilidadDataAccess;
	//public ?parametro_contabilidad_logic_add $parametro_contabilidadLogicAdditional=null;
	public ?parametro_contabilidad $parametro_contabilidad;
	public array $parametro_contabilidads;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->parametro_contabilidadDataAccess = new parametro_contabilidad_data();			
			$this->parametro_contabilidads = array();
			$this->parametro_contabilidad = new parametro_contabilidad();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->parametro_contabilidadLogicAdditional = new parametro_contabilidad_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->parametro_contabilidadLogicAdditional==null) {
		//	$this->parametro_contabilidadLogicAdditional=new parametro_contabilidad_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->parametro_contabilidadDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->parametro_contabilidadDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->parametro_contabilidadDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->parametro_contabilidadDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->parametro_contabilidads = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_contabilidads=$this->parametro_contabilidadDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_contabilidad_util::refrescarFKDescripciones($this->parametro_contabilidads);
			}
			
			//parametro_contabilidad_logic_add::checkparametro_contabilidadToGets($this->parametro_contabilidads,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_contabilidads);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->parametro_contabilidads = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_contabilidads=$this->parametro_contabilidadDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_contabilidad_util::refrescarFKDescripciones($this->parametro_contabilidads);
			}
			
			//parametro_contabilidad_logic_add::checkparametro_contabilidadToGets($this->parametro_contabilidads,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_contabilidads);
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
		$this->parametro_contabilidad = new parametro_contabilidad();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->parametro_contabilidad=$this->parametro_contabilidadDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_contabilidad,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_contabilidad_util::refrescarFKDescripcion($this->parametro_contabilidad);
			}
						
			//parametro_contabilidad_logic_add::checkparametro_contabilidadToGet($this->parametro_contabilidad,$this->datosCliente);
			//parametro_contabilidad_logic_add::updateparametro_contabilidadToGet($this->parametro_contabilidad);
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
		$this->parametro_contabilidad = new  parametro_contabilidad();
		  		  
        try {		
			$this->parametro_contabilidad=$this->parametro_contabilidadDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_contabilidad,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_contabilidad_util::refrescarFKDescripcion($this->parametro_contabilidad);
			}
			
			//parametro_contabilidad_logic_add::checkparametro_contabilidadToGet($this->parametro_contabilidad,$this->datosCliente);
			//parametro_contabilidad_logic_add::updateparametro_contabilidadToGet($this->parametro_contabilidad);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?parametro_contabilidad {
		$parametro_contabilidadLogic = new  parametro_contabilidad_logic();
		  		  
        try {		
			$parametro_contabilidadLogic->setConnexion($connexion);			
			$parametro_contabilidadLogic->getEntity($id);			
			return $parametro_contabilidadLogic->getparametro_contabilidad();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->parametro_contabilidad = new  parametro_contabilidad();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->parametro_contabilidad=$this->parametro_contabilidadDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_contabilidad,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_contabilidad_util::refrescarFKDescripcion($this->parametro_contabilidad);
			}
			
			//parametro_contabilidad_logic_add::checkparametro_contabilidadToGet($this->parametro_contabilidad,$this->datosCliente);
			//parametro_contabilidad_logic_add::updateparametro_contabilidadToGet($this->parametro_contabilidad);
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
		$this->parametro_contabilidad = new  parametro_contabilidad();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_contabilidad=$this->parametro_contabilidadDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_contabilidad,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_contabilidad_util::refrescarFKDescripcion($this->parametro_contabilidad);
			}
			
			//parametro_contabilidad_logic_add::checkparametro_contabilidadToGet($this->parametro_contabilidad,$this->datosCliente);
			//parametro_contabilidad_logic_add::updateparametro_contabilidadToGet($this->parametro_contabilidad);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?parametro_contabilidad {
		$parametro_contabilidadLogic = new  parametro_contabilidad_logic();
		  		  
        try {		
			$parametro_contabilidadLogic->setConnexion($connexion);			
			$parametro_contabilidadLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $parametro_contabilidadLogic->getparametro_contabilidad();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->parametro_contabilidads = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->parametro_contabilidads=$this->parametro_contabilidadDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_contabilidad_util::refrescarFKDescripciones($this->parametro_contabilidads);
			}
			
			//parametro_contabilidad_logic_add::checkparametro_contabilidadToGets($this->parametro_contabilidads,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_contabilidads);			
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
		$this->parametro_contabilidads = array();
		  		  
        try {			
			$this->parametro_contabilidads=$this->parametro_contabilidadDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_contabilidad_util::refrescarFKDescripciones($this->parametro_contabilidads);
			}
			
			//parametro_contabilidad_logic_add::checkparametro_contabilidadToGets($this->parametro_contabilidads,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_contabilidads);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->parametro_contabilidads = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_contabilidads=$this->parametro_contabilidadDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_contabilidad_util::refrescarFKDescripciones($this->parametro_contabilidads);
			}
			
			//parametro_contabilidad_logic_add::checkparametro_contabilidadToGets($this->parametro_contabilidads,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_contabilidads);
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
		$this->parametro_contabilidads = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_contabilidads=$this->parametro_contabilidadDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_contabilidad_util::refrescarFKDescripciones($this->parametro_contabilidads);
			}
			
			//parametro_contabilidad_logic_add::checkparametro_contabilidadToGets($this->parametro_contabilidads,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_contabilidads);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$parametro_contabilidadLogic = new  parametro_contabilidad_logic();
		  		  
        try {		
			$parametro_contabilidadLogic->setConnexion($connexion);			
			$parametro_contabilidadLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $parametro_contabilidadLogic->getparametro_contabilidads();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->parametro_contabilidads = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->parametro_contabilidads=$this->parametro_contabilidadDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_contabilidad_util::refrescarFKDescripciones($this->parametro_contabilidads);
			}
			
			//parametro_contabilidad_logic_add::checkparametro_contabilidadToGets($this->parametro_contabilidads,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_contabilidads);
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
		$this->parametro_contabilidads = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_contabilidads=$this->parametro_contabilidadDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_contabilidad_util::refrescarFKDescripciones($this->parametro_contabilidads);
			}
			
			//parametro_contabilidad_logic_add::checkparametro_contabilidadToGets($this->parametro_contabilidads,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_contabilidads);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->parametro_contabilidads = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_contabilidads=$this->parametro_contabilidadDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_contabilidad_util::refrescarFKDescripciones($this->parametro_contabilidads);
			}
			
			//parametro_contabilidad_logic_add::checkparametro_contabilidadToGets($this->parametro_contabilidads,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_contabilidads);
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
		$this->parametro_contabilidads = array();
		  		  
        try {			
			$this->parametro_contabilidads=$this->parametro_contabilidadDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_contabilidad_util::refrescarFKDescripciones($this->parametro_contabilidads);
			}	
			
			//parametro_contabilidad_logic_add::checkparametro_contabilidadToGets($this->parametro_contabilidads,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_contabilidads);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->parametro_contabilidads = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->parametro_contabilidads=$this->parametro_contabilidadDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_contabilidad_util::refrescarFKDescripciones($this->parametro_contabilidads);
			}
			
			//parametro_contabilidad_logic_add::checkparametro_contabilidadToGets($this->parametro_contabilidads,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_contabilidads);
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
		$this->parametro_contabilidads = array();
		  		  
        try {		
			$this->parametro_contabilidads=$this->parametro_contabilidadDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_contabilidad_util::refrescarFKDescripciones($this->parametro_contabilidads);
			}
			
			//parametro_contabilidad_logic_add::checkparametro_contabilidadToGets($this->parametro_contabilidads,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_contabilidads);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,parametro_contabilidad_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->parametro_contabilidads=$this->parametro_contabilidadDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				parametro_contabilidad_util::refrescarFKDescripciones($this->parametro_contabilidads);
			}
			//parametro_contabilidad_logic_add::checkparametro_contabilidadToGets($this->parametro_contabilidads,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->parametro_contabilidads);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,parametro_contabilidad_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->parametro_contabilidads=$this->parametro_contabilidadDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				parametro_contabilidad_util::refrescarFKDescripciones($this->parametro_contabilidads);
			}
			//parametro_contabilidad_logic_add::checkparametro_contabilidadToGets($this->parametro_contabilidads,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->parametro_contabilidads);
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
						
			//parametro_contabilidad_logic_add::checkparametro_contabilidadToSave($this->parametro_contabilidad,$this->datosCliente,$this->connexion);	       
			//parametro_contabilidad_logic_add::updateparametro_contabilidadToSave($this->parametro_contabilidad);			
			parametro_contabilidad_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->parametro_contabilidad,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->parametro_contabilidadLogicAdditional->checkGeneralEntityToSave($this,$this->parametro_contabilidad,$this->datosCliente,$this->connexion);
			
			
			parametro_contabilidad_data::save($this->parametro_contabilidad, $this->connexion);	    	       	 				
			//parametro_contabilidad_logic_add::checkparametro_contabilidadToSaveAfter($this->parametro_contabilidad,$this->datosCliente,$this->connexion);			
			//$this->parametro_contabilidadLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->parametro_contabilidad,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->parametro_contabilidad,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->parametro_contabilidad,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				parametro_contabilidad_util::refrescarFKDescripcion($this->parametro_contabilidad);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->parametro_contabilidad->getIsDeleted()) {
				$this->parametro_contabilidad=null;
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
						
			/*parametro_contabilidad_logic_add::checkparametro_contabilidadToSave($this->parametro_contabilidad,$this->datosCliente,$this->connexion);*/	        
			//parametro_contabilidad_logic_add::updateparametro_contabilidadToSave($this->parametro_contabilidad);			
			//$this->parametro_contabilidadLogicAdditional->checkGeneralEntityToSave($this,$this->parametro_contabilidad,$this->datosCliente,$this->connexion);			
			parametro_contabilidad_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->parametro_contabilidad,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			parametro_contabilidad_data::save($this->parametro_contabilidad, $this->connexion);	    	       	 						
			/*parametro_contabilidad_logic_add::checkparametro_contabilidadToSaveAfter($this->parametro_contabilidad,$this->datosCliente,$this->connexion);*/			
			//$this->parametro_contabilidadLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->parametro_contabilidad,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->parametro_contabilidad,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->parametro_contabilidad,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				parametro_contabilidad_util::refrescarFKDescripcion($this->parametro_contabilidad);				
			}
			
			if($this->parametro_contabilidad->getIsDeleted()) {
				$this->parametro_contabilidad=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(parametro_contabilidad $parametro_contabilidad,Connexion $connexion)  {
		$parametro_contabilidadLogic = new  parametro_contabilidad_logic();		  		  
        try {		
			$parametro_contabilidadLogic->setConnexion($connexion);			
			$parametro_contabilidadLogic->setparametro_contabilidad($parametro_contabilidad);			
			$parametro_contabilidadLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*parametro_contabilidad_logic_add::checkparametro_contabilidadToSaves($this->parametro_contabilidads,$this->datosCliente,$this->connexion);*/	        	
			//$this->parametro_contabilidadLogicAdditional->checkGeneralEntitiesToSaves($this,$this->parametro_contabilidads,$this->datosCliente,$this->connexion);
			
	   		foreach($this->parametro_contabilidads as $parametro_contabilidadLocal) {				
								
				//parametro_contabilidad_logic_add::updateparametro_contabilidadToSave($parametro_contabilidadLocal);	        	
				parametro_contabilidad_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$parametro_contabilidadLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				parametro_contabilidad_data::save($parametro_contabilidadLocal, $this->connexion);				
			}
			
			/*parametro_contabilidad_logic_add::checkparametro_contabilidadToSavesAfter($this->parametro_contabilidads,$this->datosCliente,$this->connexion);*/			
			//$this->parametro_contabilidadLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->parametro_contabilidads,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_contabilidad_util::refrescarFKDescripciones($this->parametro_contabilidads);
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
			/*parametro_contabilidad_logic_add::checkparametro_contabilidadToSaves($this->parametro_contabilidads,$this->datosCliente,$this->connexion);*/			
			//$this->parametro_contabilidadLogicAdditional->checkGeneralEntitiesToSaves($this,$this->parametro_contabilidads,$this->datosCliente,$this->connexion);
			
	   		foreach($this->parametro_contabilidads as $parametro_contabilidadLocal) {				
								
				//parametro_contabilidad_logic_add::updateparametro_contabilidadToSave($parametro_contabilidadLocal);	        	
				parametro_contabilidad_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$parametro_contabilidadLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				parametro_contabilidad_data::save($parametro_contabilidadLocal, $this->connexion);				
			}			
			
			/*parametro_contabilidad_logic_add::checkparametro_contabilidadToSavesAfter($this->parametro_contabilidads,$this->datosCliente,$this->connexion);*/			
			//$this->parametro_contabilidadLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->parametro_contabilidads,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_contabilidad_util::refrescarFKDescripciones($this->parametro_contabilidads);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $parametro_contabilidads,Connexion $connexion)  {
		$parametro_contabilidadLogic = new  parametro_contabilidad_logic();
		  		  
        try {		
			$parametro_contabilidadLogic->setConnexion($connexion);			
			$parametro_contabilidadLogic->setparametro_contabilidads($parametro_contabilidads);			
			$parametro_contabilidadLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$parametro_contabilidadsAux=array();
		
		foreach($this->parametro_contabilidads as $parametro_contabilidad) {
			if($parametro_contabilidad->getIsDeleted()==false) {
				$parametro_contabilidadsAux[]=$parametro_contabilidad;
			}
		}
		
		$this->parametro_contabilidads=$parametro_contabilidadsAux;
	}
	
	public function updateToGetsAuxiliar(array &$parametro_contabilidads) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->parametro_contabilidads as $parametro_contabilidad) {
				
				$parametro_contabilidad->setid_empresa_Descripcion(parametro_contabilidad_util::getempresaDescripcion($parametro_contabilidad->getempresa()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$parametro_contabilidad_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$parametro_contabilidad_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$parametro_contabilidad_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$parametro_contabilidad_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$parametro_contabilidad_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$parametro_contabilidadForeignKey=new parametro_contabilidad_param_return();//parametro_contabilidadForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$parametro_contabilidadForeignKey,$parametro_contabilidad_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$parametro_contabilidadForeignKey,$parametro_contabilidad_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $parametro_contabilidadForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$parametro_contabilidadForeignKey,$parametro_contabilidad_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$parametro_contabilidadForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($parametro_contabilidad_session==null) {
			$parametro_contabilidad_session=new parametro_contabilidad_session();
		}
		
		if($parametro_contabilidad_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($parametro_contabilidadForeignKey->idempresaDefaultFK==0) {
					$parametro_contabilidadForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$parametro_contabilidadForeignKey->empresasFK[$empresaLocal->getId()]=parametro_contabilidad_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($parametro_contabilidad_session->bigidempresaActual!=null && $parametro_contabilidad_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($parametro_contabilidad_session->bigidempresaActual);//WithConnection

				$parametro_contabilidadForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=parametro_contabilidad_util::getempresaDescripcion($empresaLogic->getempresa());
				$parametro_contabilidadForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($parametro_contabilidad) {
		$this->saveRelacionesBase($parametro_contabilidad,true);
	}

	public function saveRelaciones($parametro_contabilidad) {
		$this->saveRelacionesBase($parametro_contabilidad,false);
	}

	public function saveRelacionesBase($parametro_contabilidad,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setparametro_contabilidad($parametro_contabilidad);

			if(true) {

				//parametro_contabilidad_logic_add::updateRelacionesToSave($parametro_contabilidad,$this);

				if(($this->parametro_contabilidad->getIsNew() || $this->parametro_contabilidad->getIsChanged()) && !$this->parametro_contabilidad->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->parametro_contabilidad->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//parametro_contabilidad_logic_add::updateRelacionesToSaveAfter($parametro_contabilidad,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $parametro_contabilidads,parametro_contabilidad_param_return $parametro_contabilidadParameterGeneral) : parametro_contabilidad_param_return {
		$parametro_contabilidadReturnGeneral=new parametro_contabilidad_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $parametro_contabilidadReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $parametro_contabilidads,parametro_contabilidad_param_return $parametro_contabilidadParameterGeneral) : parametro_contabilidad_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$parametro_contabilidadReturnGeneral=new parametro_contabilidad_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $parametro_contabilidadReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_contabilidads,parametro_contabilidad $parametro_contabilidad,parametro_contabilidad_param_return $parametro_contabilidadParameterGeneral,bool $isEsNuevoparametro_contabilidad,array $clases) : parametro_contabilidad_param_return {
		 try {	
			$parametro_contabilidadReturnGeneral=new parametro_contabilidad_param_return();
	
			$parametro_contabilidadReturnGeneral->setparametro_contabilidad($parametro_contabilidad);
			$parametro_contabilidadReturnGeneral->setparametro_contabilidads($parametro_contabilidads);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$parametro_contabilidadReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $parametro_contabilidadReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_contabilidads,parametro_contabilidad $parametro_contabilidad,parametro_contabilidad_param_return $parametro_contabilidadParameterGeneral,bool $isEsNuevoparametro_contabilidad,array $clases) : parametro_contabilidad_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$parametro_contabilidadReturnGeneral=new parametro_contabilidad_param_return();
	
			$parametro_contabilidadReturnGeneral->setparametro_contabilidad($parametro_contabilidad);
			$parametro_contabilidadReturnGeneral->setparametro_contabilidads($parametro_contabilidads);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$parametro_contabilidadReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $parametro_contabilidadReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_contabilidads,parametro_contabilidad $parametro_contabilidad,parametro_contabilidad_param_return $parametro_contabilidadParameterGeneral,bool $isEsNuevoparametro_contabilidad,array $clases) : parametro_contabilidad_param_return {
		 try {	
			$parametro_contabilidadReturnGeneral=new parametro_contabilidad_param_return();
	
			$parametro_contabilidadReturnGeneral->setparametro_contabilidad($parametro_contabilidad);
			$parametro_contabilidadReturnGeneral->setparametro_contabilidads($parametro_contabilidads);
			
			
			
			return $parametro_contabilidadReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_contabilidads,parametro_contabilidad $parametro_contabilidad,parametro_contabilidad_param_return $parametro_contabilidadParameterGeneral,bool $isEsNuevoparametro_contabilidad,array $clases) : parametro_contabilidad_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$parametro_contabilidadReturnGeneral=new parametro_contabilidad_param_return();
	
			$parametro_contabilidadReturnGeneral->setparametro_contabilidad($parametro_contabilidad);
			$parametro_contabilidadReturnGeneral->setparametro_contabilidads($parametro_contabilidads);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $parametro_contabilidadReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,parametro_contabilidad $parametro_contabilidad,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,parametro_contabilidad $parametro_contabilidad,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		parametro_contabilidad_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(parametro_contabilidad $parametro_contabilidad,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//parametro_contabilidad_logic_add::updateparametro_contabilidadToGet($this->parametro_contabilidad);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$parametro_contabilidad->setempresa($this->parametro_contabilidadDataAccess->getempresa($this->connexion,$parametro_contabilidad));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$parametro_contabilidad->setempresa($this->parametro_contabilidadDataAccess->getempresa($this->connexion,$parametro_contabilidad));
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
			$parametro_contabilidad->setempresa($this->parametro_contabilidadDataAccess->getempresa($this->connexion,$parametro_contabilidad));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$parametro_contabilidad->setempresa($this->parametro_contabilidadDataAccess->getempresa($this->connexion,$parametro_contabilidad));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($parametro_contabilidad->getempresa(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$parametro_contabilidad->setempresa($this->parametro_contabilidadDataAccess->getempresa($this->connexion,$parametro_contabilidad));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($parametro_contabilidad->getempresa(),$isDeep,$deepLoadType,$clases);				
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
			$parametro_contabilidad->setempresa($this->parametro_contabilidadDataAccess->getempresa($this->connexion,$parametro_contabilidad));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($parametro_contabilidad->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(parametro_contabilidad $parametro_contabilidad,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//parametro_contabilidad_logic_add::updateparametro_contabilidadToSave($this->parametro_contabilidad);			
			
			if(!$paraDeleteCascade) {				
				parametro_contabilidad_data::save($parametro_contabilidad, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($parametro_contabilidad->getempresa(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($parametro_contabilidad->getempresa(),$this->connexion);
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
			empresa_data::save($parametro_contabilidad->getempresa(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($parametro_contabilidad->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($parametro_contabilidad->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($parametro_contabilidad->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($parametro_contabilidad->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
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
			empresa_data::save($parametro_contabilidad->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($parametro_contabilidad->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				parametro_contabilidad_data::save($parametro_contabilidad, $this->connexion);
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
			
			$this->deepLoad($this->parametro_contabilidad,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->parametro_contabilidads as $parametro_contabilidad) {
				$this->deepLoad($parametro_contabilidad,$isDeep,$deepLoadType,$clases);
								
				parametro_contabilidad_util::refrescarFKDescripciones($this->parametro_contabilidads);
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
			
			foreach($this->parametro_contabilidads as $parametro_contabilidad) {
				$this->deepLoad($parametro_contabilidad,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->parametro_contabilidad,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->parametro_contabilidads as $parametro_contabilidad) {
				$this->deepSave($parametro_contabilidad,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->parametro_contabilidads as $parametro_contabilidad) {
				$this->deepSave($parametro_contabilidad,$isDeep,$deepLoadType,$clases,false);
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
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
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
	
	
	
	
	
	
	
	public function getparametro_contabilidad() : ?parametro_contabilidad {	
		/*
		parametro_contabilidad_logic_add::checkparametro_contabilidadToGet($this->parametro_contabilidad,$this->datosCliente);
		parametro_contabilidad_logic_add::updateparametro_contabilidadToGet($this->parametro_contabilidad);
		*/
			
		return $this->parametro_contabilidad;
	}
		
	public function setparametro_contabilidad(parametro_contabilidad $newparametro_contabilidad) {
		$this->parametro_contabilidad = $newparametro_contabilidad;
	}
	
	public function getparametro_contabilidads() : array {		
		/*
		parametro_contabilidad_logic_add::checkparametro_contabilidadToGets($this->parametro_contabilidads,$this->datosCliente);
		
		foreach ($this->parametro_contabilidads as $parametro_contabilidadLocal ) {
			parametro_contabilidad_logic_add::updateparametro_contabilidadToGet($parametro_contabilidadLocal);
		}
		*/
		
		return $this->parametro_contabilidads;
	}
	
	public function setparametro_contabilidads(array $newparametro_contabilidads) {
		$this->parametro_contabilidads = $newparametro_contabilidads;
	}
	
	public function getparametro_contabilidadDataAccess() : parametro_contabilidad_data {
		return $this->parametro_contabilidadDataAccess;
	}
	
	public function setparametro_contabilidadDataAccess(parametro_contabilidad_data $newparametro_contabilidadDataAccess) {
		$this->parametro_contabilidadDataAccess = $newparametro_contabilidadDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        parametro_contabilidad_carga::$CONTROLLER;;        
		
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
