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

namespace com\bydan\contabilidad\contabilidad\cambio_dolar\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\contabilidad\cambio_dolar\util\cambio_dolar_carga;
use com\bydan\contabilidad\contabilidad\cambio_dolar\util\cambio_dolar_param_return;


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

use com\bydan\contabilidad\contabilidad\cambio_dolar\util\cambio_dolar_util;
use com\bydan\contabilidad\contabilidad\cambio_dolar\business\entity\cambio_dolar;
use com\bydan\contabilidad\contabilidad\cambio_dolar\business\data\cambio_dolar_data;

//FK


//REL


//REL DETALLES




class cambio_dolar_logic  extends GeneralEntityLogic implements cambio_dolar_logicI {	
	/*GENERAL*/
	public cambio_dolar_data $cambio_dolarDataAccess;
	//public ?cambio_dolar_logic_add $cambio_dolarLogicAdditional=null;
	public ?cambio_dolar $cambio_dolar;
	public array $cambio_dolars;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->cambio_dolarDataAccess = new cambio_dolar_data();			
			$this->cambio_dolars = array();
			$this->cambio_dolar = new cambio_dolar();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->cambio_dolarLogicAdditional = new cambio_dolar_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->cambio_dolarLogicAdditional==null) {
		//	$this->cambio_dolarLogicAdditional=new cambio_dolar_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->cambio_dolarDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->cambio_dolarDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->cambio_dolarDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->cambio_dolarDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->cambio_dolars = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cambio_dolars=$this->cambio_dolarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cambio_dolar_util::refrescarFKDescripciones($this->cambio_dolars);
			}
			
			//cambio_dolar_logic_add::checkcambio_dolarToGets($this->cambio_dolars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cambio_dolars);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->cambio_dolars = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cambio_dolars=$this->cambio_dolarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cambio_dolar_util::refrescarFKDescripciones($this->cambio_dolars);
			}
			
			//cambio_dolar_logic_add::checkcambio_dolarToGets($this->cambio_dolars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cambio_dolars);
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
		$this->cambio_dolar = new cambio_dolar();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->cambio_dolar=$this->cambio_dolarDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->cambio_dolar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cambio_dolar_util::refrescarFKDescripcion($this->cambio_dolar);
			}
						
			//cambio_dolar_logic_add::checkcambio_dolarToGet($this->cambio_dolar,$this->datosCliente);
			//cambio_dolar_logic_add::updatecambio_dolarToGet($this->cambio_dolar);
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
		$this->cambio_dolar = new  cambio_dolar();
		  		  
        try {		
			$this->cambio_dolar=$this->cambio_dolarDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->cambio_dolar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cambio_dolar_util::refrescarFKDescripcion($this->cambio_dolar);
			}
			
			//cambio_dolar_logic_add::checkcambio_dolarToGet($this->cambio_dolar,$this->datosCliente);
			//cambio_dolar_logic_add::updatecambio_dolarToGet($this->cambio_dolar);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?cambio_dolar {
		$cambio_dolarLogic = new  cambio_dolar_logic();
		  		  
        try {		
			$cambio_dolarLogic->setConnexion($connexion);			
			$cambio_dolarLogic->getEntity($id);			
			return $cambio_dolarLogic->getcambio_dolar();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->cambio_dolar = new  cambio_dolar();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->cambio_dolar=$this->cambio_dolarDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->cambio_dolar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cambio_dolar_util::refrescarFKDescripcion($this->cambio_dolar);
			}
			
			//cambio_dolar_logic_add::checkcambio_dolarToGet($this->cambio_dolar,$this->datosCliente);
			//cambio_dolar_logic_add::updatecambio_dolarToGet($this->cambio_dolar);
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
		$this->cambio_dolar = new  cambio_dolar();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cambio_dolar=$this->cambio_dolarDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->cambio_dolar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cambio_dolar_util::refrescarFKDescripcion($this->cambio_dolar);
			}
			
			//cambio_dolar_logic_add::checkcambio_dolarToGet($this->cambio_dolar,$this->datosCliente);
			//cambio_dolar_logic_add::updatecambio_dolarToGet($this->cambio_dolar);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?cambio_dolar {
		$cambio_dolarLogic = new  cambio_dolar_logic();
		  		  
        try {		
			$cambio_dolarLogic->setConnexion($connexion);			
			$cambio_dolarLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $cambio_dolarLogic->getcambio_dolar();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->cambio_dolars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->cambio_dolars=$this->cambio_dolarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cambio_dolar_util::refrescarFKDescripciones($this->cambio_dolars);
			}
			
			//cambio_dolar_logic_add::checkcambio_dolarToGets($this->cambio_dolars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cambio_dolars);			
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
		$this->cambio_dolars = array();
		  		  
        try {			
			$this->cambio_dolars=$this->cambio_dolarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cambio_dolar_util::refrescarFKDescripciones($this->cambio_dolars);
			}
			
			//cambio_dolar_logic_add::checkcambio_dolarToGets($this->cambio_dolars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cambio_dolars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->cambio_dolars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cambio_dolars=$this->cambio_dolarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cambio_dolar_util::refrescarFKDescripciones($this->cambio_dolars);
			}
			
			//cambio_dolar_logic_add::checkcambio_dolarToGets($this->cambio_dolars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cambio_dolars);
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
		$this->cambio_dolars = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cambio_dolars=$this->cambio_dolarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cambio_dolar_util::refrescarFKDescripciones($this->cambio_dolars);
			}
			
			//cambio_dolar_logic_add::checkcambio_dolarToGets($this->cambio_dolars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cambio_dolars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$cambio_dolarLogic = new  cambio_dolar_logic();
		  		  
        try {		
			$cambio_dolarLogic->setConnexion($connexion);			
			$cambio_dolarLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $cambio_dolarLogic->getcambio_dolars();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->cambio_dolars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->cambio_dolars=$this->cambio_dolarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cambio_dolar_util::refrescarFKDescripciones($this->cambio_dolars);
			}
			
			//cambio_dolar_logic_add::checkcambio_dolarToGets($this->cambio_dolars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cambio_dolars);
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
		$this->cambio_dolars = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cambio_dolars=$this->cambio_dolarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cambio_dolar_util::refrescarFKDescripciones($this->cambio_dolars);
			}
			
			//cambio_dolar_logic_add::checkcambio_dolarToGets($this->cambio_dolars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cambio_dolars);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->cambio_dolars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cambio_dolars=$this->cambio_dolarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cambio_dolar_util::refrescarFKDescripciones($this->cambio_dolars);
			}
			
			//cambio_dolar_logic_add::checkcambio_dolarToGets($this->cambio_dolars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cambio_dolars);
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
		$this->cambio_dolars = array();
		  		  
        try {			
			$this->cambio_dolars=$this->cambio_dolarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cambio_dolar_util::refrescarFKDescripciones($this->cambio_dolars);
			}	
			
			//cambio_dolar_logic_add::checkcambio_dolarToGets($this->cambio_dolars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cambio_dolars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->cambio_dolars = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->cambio_dolars=$this->cambio_dolarDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cambio_dolar_util::refrescarFKDescripciones($this->cambio_dolars);
			}
			
			//cambio_dolar_logic_add::checkcambio_dolarToGets($this->cambio_dolars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cambio_dolars);
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
		$this->cambio_dolars = array();
		  		  
        try {		
			$this->cambio_dolars=$this->cambio_dolarDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cambio_dolar_util::refrescarFKDescripciones($this->cambio_dolars);
			}
			
			//cambio_dolar_logic_add::checkcambio_dolarToGets($this->cambio_dolars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cambio_dolars);

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
						
			//cambio_dolar_logic_add::checkcambio_dolarToSave($this->cambio_dolar,$this->datosCliente,$this->connexion);	       
			//cambio_dolar_logic_add::updatecambio_dolarToSave($this->cambio_dolar);			
			cambio_dolar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->cambio_dolar,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->cambio_dolarLogicAdditional->checkGeneralEntityToSave($this,$this->cambio_dolar,$this->datosCliente,$this->connexion);
			
			
			cambio_dolar_data::save($this->cambio_dolar, $this->connexion);	    	       	 				
			//cambio_dolar_logic_add::checkcambio_dolarToSaveAfter($this->cambio_dolar,$this->datosCliente,$this->connexion);			
			//$this->cambio_dolarLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->cambio_dolar,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->cambio_dolar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->cambio_dolar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				cambio_dolar_util::refrescarFKDescripcion($this->cambio_dolar);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->cambio_dolar->getIsDeleted()) {
				$this->cambio_dolar=null;
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
						
			/*cambio_dolar_logic_add::checkcambio_dolarToSave($this->cambio_dolar,$this->datosCliente,$this->connexion);*/	        
			//cambio_dolar_logic_add::updatecambio_dolarToSave($this->cambio_dolar);			
			//$this->cambio_dolarLogicAdditional->checkGeneralEntityToSave($this,$this->cambio_dolar,$this->datosCliente,$this->connexion);			
			cambio_dolar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->cambio_dolar,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			cambio_dolar_data::save($this->cambio_dolar, $this->connexion);	    	       	 						
			/*cambio_dolar_logic_add::checkcambio_dolarToSaveAfter($this->cambio_dolar,$this->datosCliente,$this->connexion);*/			
			//$this->cambio_dolarLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->cambio_dolar,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->cambio_dolar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->cambio_dolar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				cambio_dolar_util::refrescarFKDescripcion($this->cambio_dolar);				
			}
			
			if($this->cambio_dolar->getIsDeleted()) {
				$this->cambio_dolar=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(cambio_dolar $cambio_dolar,Connexion $connexion)  {
		$cambio_dolarLogic = new  cambio_dolar_logic();		  		  
        try {		
			$cambio_dolarLogic->setConnexion($connexion);			
			$cambio_dolarLogic->setcambio_dolar($cambio_dolar);			
			$cambio_dolarLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*cambio_dolar_logic_add::checkcambio_dolarToSaves($this->cambio_dolars,$this->datosCliente,$this->connexion);*/	        	
			//$this->cambio_dolarLogicAdditional->checkGeneralEntitiesToSaves($this,$this->cambio_dolars,$this->datosCliente,$this->connexion);
			
	   		foreach($this->cambio_dolars as $cambio_dolarLocal) {				
								
				//cambio_dolar_logic_add::updatecambio_dolarToSave($cambio_dolarLocal);	        	
				cambio_dolar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$cambio_dolarLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				cambio_dolar_data::save($cambio_dolarLocal, $this->connexion);				
			}
			
			/*cambio_dolar_logic_add::checkcambio_dolarToSavesAfter($this->cambio_dolars,$this->datosCliente,$this->connexion);*/			
			//$this->cambio_dolarLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->cambio_dolars,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cambio_dolar_util::refrescarFKDescripciones($this->cambio_dolars);
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
			/*cambio_dolar_logic_add::checkcambio_dolarToSaves($this->cambio_dolars,$this->datosCliente,$this->connexion);*/			
			//$this->cambio_dolarLogicAdditional->checkGeneralEntitiesToSaves($this,$this->cambio_dolars,$this->datosCliente,$this->connexion);
			
	   		foreach($this->cambio_dolars as $cambio_dolarLocal) {				
								
				//cambio_dolar_logic_add::updatecambio_dolarToSave($cambio_dolarLocal);	        	
				cambio_dolar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$cambio_dolarLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				cambio_dolar_data::save($cambio_dolarLocal, $this->connexion);				
			}			
			
			/*cambio_dolar_logic_add::checkcambio_dolarToSavesAfter($this->cambio_dolars,$this->datosCliente,$this->connexion);*/			
			//$this->cambio_dolarLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->cambio_dolars,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cambio_dolar_util::refrescarFKDescripciones($this->cambio_dolars);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $cambio_dolars,Connexion $connexion)  {
		$cambio_dolarLogic = new  cambio_dolar_logic();
		  		  
        try {		
			$cambio_dolarLogic->setConnexion($connexion);			
			$cambio_dolarLogic->setcambio_dolars($cambio_dolars);			
			$cambio_dolarLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$cambio_dolarsAux=array();
		
		foreach($this->cambio_dolars as $cambio_dolar) {
			if($cambio_dolar->getIsDeleted()==false) {
				$cambio_dolarsAux[]=$cambio_dolar;
			}
		}
		
		$this->cambio_dolars=$cambio_dolarsAux;
	}
	
	public function updateToGetsAuxiliar(array &$cambio_dolars) {
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
	
	
	
	public function saveRelacionesWithConnection($cambio_dolar) {
		$this->saveRelacionesBase($cambio_dolar,true);
	}

	public function saveRelaciones($cambio_dolar) {
		$this->saveRelacionesBase($cambio_dolar,false);
	}

	public function saveRelacionesBase($cambio_dolar,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setcambio_dolar($cambio_dolar);

			if(true) {

				//cambio_dolar_logic_add::updateRelacionesToSave($cambio_dolar,$this);

				if(($this->cambio_dolar->getIsNew() || $this->cambio_dolar->getIsChanged()) && !$this->cambio_dolar->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->cambio_dolar->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//cambio_dolar_logic_add::updateRelacionesToSaveAfter($cambio_dolar,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $cambio_dolars,cambio_dolar_param_return $cambio_dolarParameterGeneral) : cambio_dolar_param_return {
		$cambio_dolarReturnGeneral=new cambio_dolar_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $cambio_dolarReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $cambio_dolars,cambio_dolar_param_return $cambio_dolarParameterGeneral) : cambio_dolar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$cambio_dolarReturnGeneral=new cambio_dolar_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $cambio_dolarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cambio_dolars,cambio_dolar $cambio_dolar,cambio_dolar_param_return $cambio_dolarParameterGeneral,bool $isEsNuevocambio_dolar,array $clases) : cambio_dolar_param_return {
		 try {	
			$cambio_dolarReturnGeneral=new cambio_dolar_param_return();
	
			$cambio_dolarReturnGeneral->setcambio_dolar($cambio_dolar);
			$cambio_dolarReturnGeneral->setcambio_dolars($cambio_dolars);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$cambio_dolarReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $cambio_dolarReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cambio_dolars,cambio_dolar $cambio_dolar,cambio_dolar_param_return $cambio_dolarParameterGeneral,bool $isEsNuevocambio_dolar,array $clases) : cambio_dolar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$cambio_dolarReturnGeneral=new cambio_dolar_param_return();
	
			$cambio_dolarReturnGeneral->setcambio_dolar($cambio_dolar);
			$cambio_dolarReturnGeneral->setcambio_dolars($cambio_dolars);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$cambio_dolarReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $cambio_dolarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cambio_dolars,cambio_dolar $cambio_dolar,cambio_dolar_param_return $cambio_dolarParameterGeneral,bool $isEsNuevocambio_dolar,array $clases) : cambio_dolar_param_return {
		 try {	
			$cambio_dolarReturnGeneral=new cambio_dolar_param_return();
	
			$cambio_dolarReturnGeneral->setcambio_dolar($cambio_dolar);
			$cambio_dolarReturnGeneral->setcambio_dolars($cambio_dolars);
			
			
			
			return $cambio_dolarReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cambio_dolars,cambio_dolar $cambio_dolar,cambio_dolar_param_return $cambio_dolarParameterGeneral,bool $isEsNuevocambio_dolar,array $clases) : cambio_dolar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$cambio_dolarReturnGeneral=new cambio_dolar_param_return();
	
			$cambio_dolarReturnGeneral->setcambio_dolar($cambio_dolar);
			$cambio_dolarReturnGeneral->setcambio_dolars($cambio_dolars);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $cambio_dolarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,cambio_dolar $cambio_dolar,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,cambio_dolar $cambio_dolar,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	
	
	
	public function deepLoad(cambio_dolar $cambio_dolar,bool $isDeep,string $deepLoadType,array $clases) {
		
		
		try {
			
			
			
			//cambio_dolar_logic_add::updatecambio_dolarToGet($this->cambio_dolar);
			
			
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		
	}
	
	public function deepSave(cambio_dolar $cambio_dolar,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		
		
		try {
			
			
			//cambio_dolar_logic_add::updatecambio_dolarToSave($this->cambio_dolar);			
			
			if(!$paraDeleteCascade) {				
				cambio_dolar_data::save($cambio_dolar, $this->connexion);
			}
			
			
			
			if($paraDeleteCascade) {				
				cambio_dolar_data::save($cambio_dolar, $this->connexion);
			}
			
		}catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}	
		
		
	}
		
	public function deepLoadWithConnection(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje) {		
		try {
			$this->getNewConnexionToDeep();
			
			$this->deepLoad($this->cambio_dolar,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->cambio_dolars as $cambio_dolar) {
				$this->deepLoad($cambio_dolar,$isDeep,$deepLoadType,$clases);
								
				cambio_dolar_util::refrescarFKDescripciones($this->cambio_dolars);
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
			
			foreach($this->cambio_dolars as $cambio_dolar) {
				$this->deepLoad($cambio_dolar,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->cambio_dolar,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->cambio_dolars as $cambio_dolar) {
				$this->deepSave($cambio_dolar,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->cambio_dolars as $cambio_dolar) {
				$this->deepSave($cambio_dolar,$isDeep,$deepLoadType,$clases,false);
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
	
	
	
	
	
	
	
	public function getcambio_dolar() : ?cambio_dolar {	
		/*
		cambio_dolar_logic_add::checkcambio_dolarToGet($this->cambio_dolar,$this->datosCliente);
		cambio_dolar_logic_add::updatecambio_dolarToGet($this->cambio_dolar);
		*/
			
		return $this->cambio_dolar;
	}
		
	public function setcambio_dolar(cambio_dolar $newcambio_dolar) {
		$this->cambio_dolar = $newcambio_dolar;
	}
	
	public function getcambio_dolars() : array {		
		/*
		cambio_dolar_logic_add::checkcambio_dolarToGets($this->cambio_dolars,$this->datosCliente);
		
		foreach ($this->cambio_dolars as $cambio_dolarLocal ) {
			cambio_dolar_logic_add::updatecambio_dolarToGet($cambio_dolarLocal);
		}
		*/
		
		return $this->cambio_dolars;
	}
	
	public function setcambio_dolars(array $newcambio_dolars) {
		$this->cambio_dolars = $newcambio_dolars;
	}
	
	public function getcambio_dolarDataAccess() : cambio_dolar_data {
		return $this->cambio_dolarDataAccess;
	}
	
	public function setcambio_dolarDataAccess(cambio_dolar_data $newcambio_dolarDataAccess) {
		$this->cambio_dolarDataAccess = $newcambio_dolarDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        cambio_dolar_carga::$CONTROLLER;;        
		
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
