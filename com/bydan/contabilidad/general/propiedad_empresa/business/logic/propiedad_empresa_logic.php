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

namespace com\bydan\contabilidad\general\propiedad_empresa\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\general\propiedad_empresa\util\propiedad_empresa_carga;
use com\bydan\contabilidad\general\propiedad_empresa\util\propiedad_empresa_param_return;


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

use com\bydan\contabilidad\general\propiedad_empresa\util\propiedad_empresa_util;
use com\bydan\contabilidad\general\propiedad_empresa\business\entity\propiedad_empresa;
use com\bydan\contabilidad\general\propiedad_empresa\business\data\propiedad_empresa_data;

//FK


//REL


//REL DETALLES




class propiedad_empresa_logic  extends GeneralEntityLogic implements propiedad_empresa_logicI {	
	/*GENERAL*/
	public propiedad_empresa_data $propiedad_empresaDataAccess;
	//public ?propiedad_empresa_logic_add $propiedad_empresaLogicAdditional=null;
	public ?propiedad_empresa $propiedad_empresa;
	public array $propiedad_empresas;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->propiedad_empresaDataAccess = new propiedad_empresa_data();			
			$this->propiedad_empresas = array();
			$this->propiedad_empresa = new propiedad_empresa();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->propiedad_empresaLogicAdditional = new propiedad_empresa_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->propiedad_empresaLogicAdditional==null) {
		//	$this->propiedad_empresaLogicAdditional=new propiedad_empresa_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->propiedad_empresaDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->propiedad_empresaDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->propiedad_empresaDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->propiedad_empresaDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->propiedad_empresas = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->propiedad_empresas=$this->propiedad_empresaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				propiedad_empresa_util::refrescarFKDescripciones($this->propiedad_empresas);
			}
			
			//propiedad_empresa_logic_add::checkpropiedad_empresaToGets($this->propiedad_empresas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->propiedad_empresas);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->propiedad_empresas = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->propiedad_empresas=$this->propiedad_empresaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				propiedad_empresa_util::refrescarFKDescripciones($this->propiedad_empresas);
			}
			
			//propiedad_empresa_logic_add::checkpropiedad_empresaToGets($this->propiedad_empresas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->propiedad_empresas);
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
		$this->propiedad_empresa = new propiedad_empresa();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->propiedad_empresa=$this->propiedad_empresaDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->propiedad_empresa,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				propiedad_empresa_util::refrescarFKDescripcion($this->propiedad_empresa);
			}
						
			//propiedad_empresa_logic_add::checkpropiedad_empresaToGet($this->propiedad_empresa,$this->datosCliente);
			//propiedad_empresa_logic_add::updatepropiedad_empresaToGet($this->propiedad_empresa);
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
		$this->propiedad_empresa = new  propiedad_empresa();
		  		  
        try {		
			$this->propiedad_empresa=$this->propiedad_empresaDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->propiedad_empresa,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				propiedad_empresa_util::refrescarFKDescripcion($this->propiedad_empresa);
			}
			
			//propiedad_empresa_logic_add::checkpropiedad_empresaToGet($this->propiedad_empresa,$this->datosCliente);
			//propiedad_empresa_logic_add::updatepropiedad_empresaToGet($this->propiedad_empresa);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?propiedad_empresa {
		$propiedad_empresaLogic = new  propiedad_empresa_logic();
		  		  
        try {		
			$propiedad_empresaLogic->setConnexion($connexion);			
			$propiedad_empresaLogic->getEntity($id);			
			return $propiedad_empresaLogic->getpropiedad_empresa();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->propiedad_empresa = new  propiedad_empresa();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->propiedad_empresa=$this->propiedad_empresaDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->propiedad_empresa,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				propiedad_empresa_util::refrescarFKDescripcion($this->propiedad_empresa);
			}
			
			//propiedad_empresa_logic_add::checkpropiedad_empresaToGet($this->propiedad_empresa,$this->datosCliente);
			//propiedad_empresa_logic_add::updatepropiedad_empresaToGet($this->propiedad_empresa);
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
		$this->propiedad_empresa = new  propiedad_empresa();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->propiedad_empresa=$this->propiedad_empresaDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->propiedad_empresa,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				propiedad_empresa_util::refrescarFKDescripcion($this->propiedad_empresa);
			}
			
			//propiedad_empresa_logic_add::checkpropiedad_empresaToGet($this->propiedad_empresa,$this->datosCliente);
			//propiedad_empresa_logic_add::updatepropiedad_empresaToGet($this->propiedad_empresa);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?propiedad_empresa {
		$propiedad_empresaLogic = new  propiedad_empresa_logic();
		  		  
        try {		
			$propiedad_empresaLogic->setConnexion($connexion);			
			$propiedad_empresaLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $propiedad_empresaLogic->getpropiedad_empresa();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->propiedad_empresas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->propiedad_empresas=$this->propiedad_empresaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				propiedad_empresa_util::refrescarFKDescripciones($this->propiedad_empresas);
			}
			
			//propiedad_empresa_logic_add::checkpropiedad_empresaToGets($this->propiedad_empresas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->propiedad_empresas);			
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
		$this->propiedad_empresas = array();
		  		  
        try {			
			$this->propiedad_empresas=$this->propiedad_empresaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				propiedad_empresa_util::refrescarFKDescripciones($this->propiedad_empresas);
			}
			
			//propiedad_empresa_logic_add::checkpropiedad_empresaToGets($this->propiedad_empresas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->propiedad_empresas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->propiedad_empresas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->propiedad_empresas=$this->propiedad_empresaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				propiedad_empresa_util::refrescarFKDescripciones($this->propiedad_empresas);
			}
			
			//propiedad_empresa_logic_add::checkpropiedad_empresaToGets($this->propiedad_empresas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->propiedad_empresas);
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
		$this->propiedad_empresas = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->propiedad_empresas=$this->propiedad_empresaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				propiedad_empresa_util::refrescarFKDescripciones($this->propiedad_empresas);
			}
			
			//propiedad_empresa_logic_add::checkpropiedad_empresaToGets($this->propiedad_empresas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->propiedad_empresas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$propiedad_empresaLogic = new  propiedad_empresa_logic();
		  		  
        try {		
			$propiedad_empresaLogic->setConnexion($connexion);			
			$propiedad_empresaLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $propiedad_empresaLogic->getpropiedad_empresas();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->propiedad_empresas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->propiedad_empresas=$this->propiedad_empresaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				propiedad_empresa_util::refrescarFKDescripciones($this->propiedad_empresas);
			}
			
			//propiedad_empresa_logic_add::checkpropiedad_empresaToGets($this->propiedad_empresas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->propiedad_empresas);
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
		$this->propiedad_empresas = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->propiedad_empresas=$this->propiedad_empresaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				propiedad_empresa_util::refrescarFKDescripciones($this->propiedad_empresas);
			}
			
			//propiedad_empresa_logic_add::checkpropiedad_empresaToGets($this->propiedad_empresas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->propiedad_empresas);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->propiedad_empresas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->propiedad_empresas=$this->propiedad_empresaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				propiedad_empresa_util::refrescarFKDescripciones($this->propiedad_empresas);
			}
			
			//propiedad_empresa_logic_add::checkpropiedad_empresaToGets($this->propiedad_empresas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->propiedad_empresas);
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
		$this->propiedad_empresas = array();
		  		  
        try {			
			$this->propiedad_empresas=$this->propiedad_empresaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				propiedad_empresa_util::refrescarFKDescripciones($this->propiedad_empresas);
			}	
			
			//propiedad_empresa_logic_add::checkpropiedad_empresaToGets($this->propiedad_empresas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->propiedad_empresas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->propiedad_empresas = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->propiedad_empresas=$this->propiedad_empresaDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				propiedad_empresa_util::refrescarFKDescripciones($this->propiedad_empresas);
			}
			
			//propiedad_empresa_logic_add::checkpropiedad_empresaToGets($this->propiedad_empresas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->propiedad_empresas);
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
		$this->propiedad_empresas = array();
		  		  
        try {		
			$this->propiedad_empresas=$this->propiedad_empresaDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				propiedad_empresa_util::refrescarFKDescripciones($this->propiedad_empresas);
			}
			
			//propiedad_empresa_logic_add::checkpropiedad_empresaToGets($this->propiedad_empresas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->propiedad_empresas);

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
						
			//propiedad_empresa_logic_add::checkpropiedad_empresaToSave($this->propiedad_empresa,$this->datosCliente,$this->connexion);	       
			//propiedad_empresa_logic_add::updatepropiedad_empresaToSave($this->propiedad_empresa);			
			propiedad_empresa_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->propiedad_empresa,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->propiedad_empresaLogicAdditional->checkGeneralEntityToSave($this,$this->propiedad_empresa,$this->datosCliente,$this->connexion);
			
			
			propiedad_empresa_data::save($this->propiedad_empresa, $this->connexion);	    	       	 				
			//propiedad_empresa_logic_add::checkpropiedad_empresaToSaveAfter($this->propiedad_empresa,$this->datosCliente,$this->connexion);			
			//$this->propiedad_empresaLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->propiedad_empresa,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->propiedad_empresa,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->propiedad_empresa,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				propiedad_empresa_util::refrescarFKDescripcion($this->propiedad_empresa);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->propiedad_empresa->getIsDeleted()) {
				$this->propiedad_empresa=null;
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
						
			/*propiedad_empresa_logic_add::checkpropiedad_empresaToSave($this->propiedad_empresa,$this->datosCliente,$this->connexion);*/	        
			//propiedad_empresa_logic_add::updatepropiedad_empresaToSave($this->propiedad_empresa);			
			//$this->propiedad_empresaLogicAdditional->checkGeneralEntityToSave($this,$this->propiedad_empresa,$this->datosCliente,$this->connexion);			
			propiedad_empresa_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->propiedad_empresa,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			propiedad_empresa_data::save($this->propiedad_empresa, $this->connexion);	    	       	 						
			/*propiedad_empresa_logic_add::checkpropiedad_empresaToSaveAfter($this->propiedad_empresa,$this->datosCliente,$this->connexion);*/			
			//$this->propiedad_empresaLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->propiedad_empresa,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->propiedad_empresa,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->propiedad_empresa,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				propiedad_empresa_util::refrescarFKDescripcion($this->propiedad_empresa);				
			}
			
			if($this->propiedad_empresa->getIsDeleted()) {
				$this->propiedad_empresa=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(propiedad_empresa $propiedad_empresa,Connexion $connexion)  {
		$propiedad_empresaLogic = new  propiedad_empresa_logic();		  		  
        try {		
			$propiedad_empresaLogic->setConnexion($connexion);			
			$propiedad_empresaLogic->setpropiedad_empresa($propiedad_empresa);			
			$propiedad_empresaLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*propiedad_empresa_logic_add::checkpropiedad_empresaToSaves($this->propiedad_empresas,$this->datosCliente,$this->connexion);*/	        	
			//$this->propiedad_empresaLogicAdditional->checkGeneralEntitiesToSaves($this,$this->propiedad_empresas,$this->datosCliente,$this->connexion);
			
	   		foreach($this->propiedad_empresas as $propiedad_empresaLocal) {				
								
				//propiedad_empresa_logic_add::updatepropiedad_empresaToSave($propiedad_empresaLocal);	        	
				propiedad_empresa_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$propiedad_empresaLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				propiedad_empresa_data::save($propiedad_empresaLocal, $this->connexion);				
			}
			
			/*propiedad_empresa_logic_add::checkpropiedad_empresaToSavesAfter($this->propiedad_empresas,$this->datosCliente,$this->connexion);*/			
			//$this->propiedad_empresaLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->propiedad_empresas,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				propiedad_empresa_util::refrescarFKDescripciones($this->propiedad_empresas);
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
			/*propiedad_empresa_logic_add::checkpropiedad_empresaToSaves($this->propiedad_empresas,$this->datosCliente,$this->connexion);*/			
			//$this->propiedad_empresaLogicAdditional->checkGeneralEntitiesToSaves($this,$this->propiedad_empresas,$this->datosCliente,$this->connexion);
			
	   		foreach($this->propiedad_empresas as $propiedad_empresaLocal) {				
								
				//propiedad_empresa_logic_add::updatepropiedad_empresaToSave($propiedad_empresaLocal);	        	
				propiedad_empresa_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$propiedad_empresaLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				propiedad_empresa_data::save($propiedad_empresaLocal, $this->connexion);				
			}			
			
			/*propiedad_empresa_logic_add::checkpropiedad_empresaToSavesAfter($this->propiedad_empresas,$this->datosCliente,$this->connexion);*/			
			//$this->propiedad_empresaLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->propiedad_empresas,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				propiedad_empresa_util::refrescarFKDescripciones($this->propiedad_empresas);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $propiedad_empresas,Connexion $connexion)  {
		$propiedad_empresaLogic = new  propiedad_empresa_logic();
		  		  
        try {		
			$propiedad_empresaLogic->setConnexion($connexion);			
			$propiedad_empresaLogic->setpropiedad_empresas($propiedad_empresas);			
			$propiedad_empresaLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$propiedad_empresasAux=array();
		
		foreach($this->propiedad_empresas as $propiedad_empresa) {
			if($propiedad_empresa->getIsDeleted()==false) {
				$propiedad_empresasAux[]=$propiedad_empresa;
			}
		}
		
		$this->propiedad_empresas=$propiedad_empresasAux;
	}
	
	public function updateToGetsAuxiliar(array &$propiedad_empresas) {
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
	
	
	
	public function saveRelacionesWithConnection($propiedad_empresa) {
		$this->saveRelacionesBase($propiedad_empresa,true);
	}

	public function saveRelaciones($propiedad_empresa) {
		$this->saveRelacionesBase($propiedad_empresa,false);
	}

	public function saveRelacionesBase($propiedad_empresa,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setpropiedad_empresa($propiedad_empresa);

			if(true) {

				//propiedad_empresa_logic_add::updateRelacionesToSave($propiedad_empresa,$this);

				if(($this->propiedad_empresa->getIsNew() || $this->propiedad_empresa->getIsChanged()) && !$this->propiedad_empresa->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->propiedad_empresa->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//propiedad_empresa_logic_add::updateRelacionesToSaveAfter($propiedad_empresa,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $propiedad_empresas,propiedad_empresa_param_return $propiedad_empresaParameterGeneral) : propiedad_empresa_param_return {
		$propiedad_empresaReturnGeneral=new propiedad_empresa_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $propiedad_empresaReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $propiedad_empresas,propiedad_empresa_param_return $propiedad_empresaParameterGeneral) : propiedad_empresa_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$propiedad_empresaReturnGeneral=new propiedad_empresa_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $propiedad_empresaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $propiedad_empresas,propiedad_empresa $propiedad_empresa,propiedad_empresa_param_return $propiedad_empresaParameterGeneral,bool $isEsNuevopropiedad_empresa,array $clases) : propiedad_empresa_param_return {
		 try {	
			$propiedad_empresaReturnGeneral=new propiedad_empresa_param_return();
	
			$propiedad_empresaReturnGeneral->setpropiedad_empresa($propiedad_empresa);
			$propiedad_empresaReturnGeneral->setpropiedad_empresas($propiedad_empresas);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$propiedad_empresaReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $propiedad_empresaReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $propiedad_empresas,propiedad_empresa $propiedad_empresa,propiedad_empresa_param_return $propiedad_empresaParameterGeneral,bool $isEsNuevopropiedad_empresa,array $clases) : propiedad_empresa_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$propiedad_empresaReturnGeneral=new propiedad_empresa_param_return();
	
			$propiedad_empresaReturnGeneral->setpropiedad_empresa($propiedad_empresa);
			$propiedad_empresaReturnGeneral->setpropiedad_empresas($propiedad_empresas);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$propiedad_empresaReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $propiedad_empresaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $propiedad_empresas,propiedad_empresa $propiedad_empresa,propiedad_empresa_param_return $propiedad_empresaParameterGeneral,bool $isEsNuevopropiedad_empresa,array $clases) : propiedad_empresa_param_return {
		 try {	
			$propiedad_empresaReturnGeneral=new propiedad_empresa_param_return();
	
			$propiedad_empresaReturnGeneral->setpropiedad_empresa($propiedad_empresa);
			$propiedad_empresaReturnGeneral->setpropiedad_empresas($propiedad_empresas);
			
			
			
			return $propiedad_empresaReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $propiedad_empresas,propiedad_empresa $propiedad_empresa,propiedad_empresa_param_return $propiedad_empresaParameterGeneral,bool $isEsNuevopropiedad_empresa,array $clases) : propiedad_empresa_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$propiedad_empresaReturnGeneral=new propiedad_empresa_param_return();
	
			$propiedad_empresaReturnGeneral->setpropiedad_empresa($propiedad_empresa);
			$propiedad_empresaReturnGeneral->setpropiedad_empresas($propiedad_empresas);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $propiedad_empresaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,propiedad_empresa $propiedad_empresa,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,propiedad_empresa $propiedad_empresa,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	
	
	
	public function deepLoad(propiedad_empresa $propiedad_empresa,bool $isDeep,string $deepLoadType,array $clases) {
		
		
		try {
			
			
			
			//propiedad_empresa_logic_add::updatepropiedad_empresaToGet($this->propiedad_empresa);
			
			
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		
	}
	
	public function deepSave(propiedad_empresa $propiedad_empresa,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		
		
		try {
			
			
			//propiedad_empresa_logic_add::updatepropiedad_empresaToSave($this->propiedad_empresa);			
			
			if(!$paraDeleteCascade) {				
				propiedad_empresa_data::save($propiedad_empresa, $this->connexion);
			}
			
			
			
			if($paraDeleteCascade) {				
				propiedad_empresa_data::save($propiedad_empresa, $this->connexion);
			}
			
		}catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}	
		
		
	}
		
	public function deepLoadWithConnection(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje) {		
		try {
			$this->getNewConnexionToDeep();
			
			$this->deepLoad($this->propiedad_empresa,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->propiedad_empresas as $propiedad_empresa) {
				$this->deepLoad($propiedad_empresa,$isDeep,$deepLoadType,$clases);
								
				propiedad_empresa_util::refrescarFKDescripciones($this->propiedad_empresas);
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
			
			foreach($this->propiedad_empresas as $propiedad_empresa) {
				$this->deepLoad($propiedad_empresa,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->propiedad_empresa,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->propiedad_empresas as $propiedad_empresa) {
				$this->deepSave($propiedad_empresa,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->propiedad_empresas as $propiedad_empresa) {
				$this->deepSave($propiedad_empresa,$isDeep,$deepLoadType,$clases,false);
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
	
	
	
	
	
	
	
	public function getpropiedad_empresa() : ?propiedad_empresa {	
		/*
		propiedad_empresa_logic_add::checkpropiedad_empresaToGet($this->propiedad_empresa,$this->datosCliente);
		propiedad_empresa_logic_add::updatepropiedad_empresaToGet($this->propiedad_empresa);
		*/
			
		return $this->propiedad_empresa;
	}
		
	public function setpropiedad_empresa(propiedad_empresa $newpropiedad_empresa) {
		$this->propiedad_empresa = $newpropiedad_empresa;
	}
	
	public function getpropiedad_empresas() : array {		
		/*
		propiedad_empresa_logic_add::checkpropiedad_empresaToGets($this->propiedad_empresas,$this->datosCliente);
		
		foreach ($this->propiedad_empresas as $propiedad_empresaLocal ) {
			propiedad_empresa_logic_add::updatepropiedad_empresaToGet($propiedad_empresaLocal);
		}
		*/
		
		return $this->propiedad_empresas;
	}
	
	public function setpropiedad_empresas(array $newpropiedad_empresas) {
		$this->propiedad_empresas = $newpropiedad_empresas;
	}
	
	public function getpropiedad_empresaDataAccess() : propiedad_empresa_data {
		return $this->propiedad_empresaDataAccess;
	}
	
	public function setpropiedad_empresaDataAccess(propiedad_empresa_data $newpropiedad_empresaDataAccess) {
		$this->propiedad_empresaDataAccess = $newpropiedad_empresaDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        propiedad_empresa_carga::$CONTROLLER;;        
		
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
