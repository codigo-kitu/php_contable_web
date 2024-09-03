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

namespace com\bydan\contabilidad\cuentascobrar\imagen_cliente\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\cuentascobrar\imagen_cliente\util\imagen_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\imagen_cliente\util\imagen_cliente_param_return;

use com\bydan\contabilidad\cuentascobrar\imagen_cliente\presentation\session\imagen_cliente_session;

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

use com\bydan\contabilidad\cuentascobrar\imagen_cliente\util\imagen_cliente_util;
use com\bydan\contabilidad\cuentascobrar\imagen_cliente\business\entity\imagen_cliente;
use com\bydan\contabilidad\cuentascobrar\imagen_cliente\business\data\imagen_cliente_data;

//FK


use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\business\data\cliente_data;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;

//REL


//REL DETALLES




class imagen_cliente_logic  extends GeneralEntityLogic implements imagen_cliente_logicI {	
	/*GENERAL*/
	public imagen_cliente_data $imagen_clienteDataAccess;
	//public ?imagen_cliente_logic_add $imagen_clienteLogicAdditional=null;
	public ?imagen_cliente $imagen_cliente;
	public array $imagen_clientes;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->imagen_clienteDataAccess = new imagen_cliente_data();			
			$this->imagen_clientes = array();
			$this->imagen_cliente = new imagen_cliente();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->imagen_clienteLogicAdditional = new imagen_cliente_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->imagen_clienteLogicAdditional==null) {
		//	$this->imagen_clienteLogicAdditional=new imagen_cliente_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->imagen_clienteDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->imagen_clienteDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->imagen_clienteDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->imagen_clienteDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->imagen_clientes = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_clientes=$this->imagen_clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_cliente_util::refrescarFKDescripciones($this->imagen_clientes);
			}
			
			//imagen_cliente_logic_add::checkimagen_clienteToGets($this->imagen_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_clientes);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->imagen_clientes = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_clientes=$this->imagen_clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_cliente_util::refrescarFKDescripciones($this->imagen_clientes);
			}
			
			//imagen_cliente_logic_add::checkimagen_clienteToGets($this->imagen_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_clientes);
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
		$this->imagen_cliente = new imagen_cliente();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->imagen_cliente=$this->imagen_clienteDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_cliente_util::refrescarFKDescripcion($this->imagen_cliente);
			}
						
			//imagen_cliente_logic_add::checkimagen_clienteToGet($this->imagen_cliente,$this->datosCliente);
			//imagen_cliente_logic_add::updateimagen_clienteToGet($this->imagen_cliente);
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
		$this->imagen_cliente = new  imagen_cliente();
		  		  
        try {		
			$this->imagen_cliente=$this->imagen_clienteDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_cliente_util::refrescarFKDescripcion($this->imagen_cliente);
			}
			
			//imagen_cliente_logic_add::checkimagen_clienteToGet($this->imagen_cliente,$this->datosCliente);
			//imagen_cliente_logic_add::updateimagen_clienteToGet($this->imagen_cliente);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?imagen_cliente {
		$imagen_clienteLogic = new  imagen_cliente_logic();
		  		  
        try {		
			$imagen_clienteLogic->setConnexion($connexion);			
			$imagen_clienteLogic->getEntity($id);			
			return $imagen_clienteLogic->getimagen_cliente();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->imagen_cliente = new  imagen_cliente();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->imagen_cliente=$this->imagen_clienteDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_cliente_util::refrescarFKDescripcion($this->imagen_cliente);
			}
			
			//imagen_cliente_logic_add::checkimagen_clienteToGet($this->imagen_cliente,$this->datosCliente);
			//imagen_cliente_logic_add::updateimagen_clienteToGet($this->imagen_cliente);
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
		$this->imagen_cliente = new  imagen_cliente();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_cliente=$this->imagen_clienteDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_cliente_util::refrescarFKDescripcion($this->imagen_cliente);
			}
			
			//imagen_cliente_logic_add::checkimagen_clienteToGet($this->imagen_cliente,$this->datosCliente);
			//imagen_cliente_logic_add::updateimagen_clienteToGet($this->imagen_cliente);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?imagen_cliente {
		$imagen_clienteLogic = new  imagen_cliente_logic();
		  		  
        try {		
			$imagen_clienteLogic->setConnexion($connexion);			
			$imagen_clienteLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $imagen_clienteLogic->getimagen_cliente();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->imagen_clientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->imagen_clientes=$this->imagen_clienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_cliente_util::refrescarFKDescripciones($this->imagen_clientes);
			}
			
			//imagen_cliente_logic_add::checkimagen_clienteToGets($this->imagen_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_clientes);			
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
		$this->imagen_clientes = array();
		  		  
        try {			
			$this->imagen_clientes=$this->imagen_clienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_cliente_util::refrescarFKDescripciones($this->imagen_clientes);
			}
			
			//imagen_cliente_logic_add::checkimagen_clienteToGets($this->imagen_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_clientes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->imagen_clientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_clientes=$this->imagen_clienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_cliente_util::refrescarFKDescripciones($this->imagen_clientes);
			}
			
			//imagen_cliente_logic_add::checkimagen_clienteToGets($this->imagen_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_clientes);
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
		$this->imagen_clientes = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_clientes=$this->imagen_clienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_cliente_util::refrescarFKDescripciones($this->imagen_clientes);
			}
			
			//imagen_cliente_logic_add::checkimagen_clienteToGets($this->imagen_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_clientes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$imagen_clienteLogic = new  imagen_cliente_logic();
		  		  
        try {		
			$imagen_clienteLogic->setConnexion($connexion);			
			$imagen_clienteLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $imagen_clienteLogic->getimagen_clientes();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->imagen_clientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->imagen_clientes=$this->imagen_clienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_cliente_util::refrescarFKDescripciones($this->imagen_clientes);
			}
			
			//imagen_cliente_logic_add::checkimagen_clienteToGets($this->imagen_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_clientes);
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
		$this->imagen_clientes = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_clientes=$this->imagen_clienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_cliente_util::refrescarFKDescripciones($this->imagen_clientes);
			}
			
			//imagen_cliente_logic_add::checkimagen_clienteToGets($this->imagen_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_clientes);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->imagen_clientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_clientes=$this->imagen_clienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_cliente_util::refrescarFKDescripciones($this->imagen_clientes);
			}
			
			//imagen_cliente_logic_add::checkimagen_clienteToGets($this->imagen_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_clientes);
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
		$this->imagen_clientes = array();
		  		  
        try {			
			$this->imagen_clientes=$this->imagen_clienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_cliente_util::refrescarFKDescripciones($this->imagen_clientes);
			}	
			
			//imagen_cliente_logic_add::checkimagen_clienteToGets($this->imagen_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_clientes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->imagen_clientes = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->imagen_clientes=$this->imagen_clienteDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_cliente_util::refrescarFKDescripciones($this->imagen_clientes);
			}
			
			//imagen_cliente_logic_add::checkimagen_clienteToGets($this->imagen_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_clientes);
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
		$this->imagen_clientes = array();
		  		  
        try {		
			$this->imagen_clientes=$this->imagen_clienteDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_cliente_util::refrescarFKDescripciones($this->imagen_clientes);
			}
			
			//imagen_cliente_logic_add::checkimagen_clienteToGets($this->imagen_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_clientes);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_IdclienteWithConnection(string $strFinalQuery,Pagination $pagination,int $id_cliente) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cliente= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cliente,imagen_cliente_util::$ID_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cliente);

			$this->imagen_clientes=$this->imagen_clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				imagen_cliente_util::refrescarFKDescripciones($this->imagen_clientes);
			}
			//imagen_cliente_logic_add::checkimagen_clienteToGets($this->imagen_clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->imagen_clientes);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcliente(string $strFinalQuery,Pagination $pagination,int $id_cliente) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cliente= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cliente,imagen_cliente_util::$ID_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cliente);

			$this->imagen_clientes=$this->imagen_clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				imagen_cliente_util::refrescarFKDescripciones($this->imagen_clientes);
			}
			//imagen_cliente_logic_add::checkimagen_clienteToGets($this->imagen_clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->imagen_clientes);
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
						
			//imagen_cliente_logic_add::checkimagen_clienteToSave($this->imagen_cliente,$this->datosCliente,$this->connexion);	       
			//imagen_cliente_logic_add::updateimagen_clienteToSave($this->imagen_cliente);			
			imagen_cliente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->imagen_cliente,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->imagen_clienteLogicAdditional->checkGeneralEntityToSave($this,$this->imagen_cliente,$this->datosCliente,$this->connexion);
			
			
			imagen_cliente_data::save($this->imagen_cliente, $this->connexion);	    	       	 				
			//imagen_cliente_logic_add::checkimagen_clienteToSaveAfter($this->imagen_cliente,$this->datosCliente,$this->connexion);			
			//$this->imagen_clienteLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->imagen_cliente,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->imagen_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->imagen_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				imagen_cliente_util::refrescarFKDescripcion($this->imagen_cliente);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->imagen_cliente->getIsDeleted()) {
				$this->imagen_cliente=null;
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
						
			/*imagen_cliente_logic_add::checkimagen_clienteToSave($this->imagen_cliente,$this->datosCliente,$this->connexion);*/	        
			//imagen_cliente_logic_add::updateimagen_clienteToSave($this->imagen_cliente);			
			//$this->imagen_clienteLogicAdditional->checkGeneralEntityToSave($this,$this->imagen_cliente,$this->datosCliente,$this->connexion);			
			imagen_cliente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->imagen_cliente,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			imagen_cliente_data::save($this->imagen_cliente, $this->connexion);	    	       	 						
			/*imagen_cliente_logic_add::checkimagen_clienteToSaveAfter($this->imagen_cliente,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_clienteLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->imagen_cliente,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->imagen_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->imagen_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				imagen_cliente_util::refrescarFKDescripcion($this->imagen_cliente);				
			}
			
			if($this->imagen_cliente->getIsDeleted()) {
				$this->imagen_cliente=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(imagen_cliente $imagen_cliente,Connexion $connexion)  {
		$imagen_clienteLogic = new  imagen_cliente_logic();		  		  
        try {		
			$imagen_clienteLogic->setConnexion($connexion);			
			$imagen_clienteLogic->setimagen_cliente($imagen_cliente);			
			$imagen_clienteLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*imagen_cliente_logic_add::checkimagen_clienteToSaves($this->imagen_clientes,$this->datosCliente,$this->connexion);*/	        	
			//$this->imagen_clienteLogicAdditional->checkGeneralEntitiesToSaves($this,$this->imagen_clientes,$this->datosCliente,$this->connexion);
			
	   		foreach($this->imagen_clientes as $imagen_clienteLocal) {				
								
				//imagen_cliente_logic_add::updateimagen_clienteToSave($imagen_clienteLocal);	        	
				imagen_cliente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$imagen_clienteLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				imagen_cliente_data::save($imagen_clienteLocal, $this->connexion);				
			}
			
			/*imagen_cliente_logic_add::checkimagen_clienteToSavesAfter($this->imagen_clientes,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_clienteLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->imagen_clientes,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_cliente_util::refrescarFKDescripciones($this->imagen_clientes);
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
			/*imagen_cliente_logic_add::checkimagen_clienteToSaves($this->imagen_clientes,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_clienteLogicAdditional->checkGeneralEntitiesToSaves($this,$this->imagen_clientes,$this->datosCliente,$this->connexion);
			
	   		foreach($this->imagen_clientes as $imagen_clienteLocal) {				
								
				//imagen_cliente_logic_add::updateimagen_clienteToSave($imagen_clienteLocal);	        	
				imagen_cliente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$imagen_clienteLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				imagen_cliente_data::save($imagen_clienteLocal, $this->connexion);				
			}			
			
			/*imagen_cliente_logic_add::checkimagen_clienteToSavesAfter($this->imagen_clientes,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_clienteLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->imagen_clientes,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_cliente_util::refrescarFKDescripciones($this->imagen_clientes);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $imagen_clientes,Connexion $connexion)  {
		$imagen_clienteLogic = new  imagen_cliente_logic();
		  		  
        try {		
			$imagen_clienteLogic->setConnexion($connexion);			
			$imagen_clienteLogic->setimagen_clientes($imagen_clientes);			
			$imagen_clienteLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$imagen_clientesAux=array();
		
		foreach($this->imagen_clientes as $imagen_cliente) {
			if($imagen_cliente->getIsDeleted()==false) {
				$imagen_clientesAux[]=$imagen_cliente;
			}
		}
		
		$this->imagen_clientes=$imagen_clientesAux;
	}
	
	public function updateToGetsAuxiliar(array &$imagen_clientes) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->imagen_clientes as $imagen_cliente) {
				
				$imagen_cliente->setid_cliente_Descripcion(imagen_cliente_util::getclienteDescripcion($imagen_cliente->getcliente()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$imagen_cliente_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$imagen_cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$imagen_cliente_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$imagen_cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$imagen_cliente_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$imagen_clienteForeignKey=new imagen_cliente_param_return();//imagen_clienteForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cliente',$strRecargarFkTipos,',')) {
				$this->cargarCombosclientesFK($this->connexion,$strRecargarFkQuery,$imagen_clienteForeignKey,$imagen_cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cliente',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosclientesFK($this->connexion,' where id=-1 ',$imagen_clienteForeignKey,$imagen_cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $imagen_clienteForeignKey;
			
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
	
	
	public function cargarCombosclientesFK($connexion=null,$strRecargarFkQuery='',$imagen_clienteForeignKey,$imagen_cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$clienteLogic= new cliente_logic();
		$pagination= new Pagination();
		$imagen_clienteForeignKey->clientesFK=array();

		$clienteLogic->setConnexion($connexion);
		$clienteLogic->getclienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($imagen_cliente_session==null) {
			$imagen_cliente_session=new imagen_cliente_session();
		}
		
		if($imagen_cliente_session->bitBusquedaDesdeFKSesioncliente!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=cliente_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalcliente=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcliente=Funciones::GetFinalQueryAppend($finalQueryGlobalcliente, '');
				$finalQueryGlobalcliente.=cliente_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcliente.$strRecargarFkQuery;		

				$clienteLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($clienteLogic->getclientes() as $clienteLocal ) {
				if($imagen_clienteForeignKey->idclienteDefaultFK==0) {
					$imagen_clienteForeignKey->idclienteDefaultFK=$clienteLocal->getId();
				}

				$imagen_clienteForeignKey->clientesFK[$clienteLocal->getId()]=imagen_cliente_util::getclienteDescripcion($clienteLocal);
			}

		} else {

			if($imagen_cliente_session->bigidclienteActual!=null && $imagen_cliente_session->bigidclienteActual > 0) {
				$clienteLogic->getEntity($imagen_cliente_session->bigidclienteActual);//WithConnection

				$imagen_clienteForeignKey->clientesFK[$clienteLogic->getcliente()->getId()]=imagen_cliente_util::getclienteDescripcion($clienteLogic->getcliente());
				$imagen_clienteForeignKey->idclienteDefaultFK=$clienteLogic->getcliente()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($imagen_cliente) {
		$this->saveRelacionesBase($imagen_cliente,true);
	}

	public function saveRelaciones($imagen_cliente) {
		$this->saveRelacionesBase($imagen_cliente,false);
	}

	public function saveRelacionesBase($imagen_cliente,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setimagen_cliente($imagen_cliente);

			if(true) {

				//imagen_cliente_logic_add::updateRelacionesToSave($imagen_cliente,$this);

				if(($this->imagen_cliente->getIsNew() || $this->imagen_cliente->getIsChanged()) && !$this->imagen_cliente->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->imagen_cliente->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//imagen_cliente_logic_add::updateRelacionesToSaveAfter($imagen_cliente,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $imagen_clientes,imagen_cliente_param_return $imagen_clienteParameterGeneral) : imagen_cliente_param_return {
		$imagen_clienteReturnGeneral=new imagen_cliente_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $imagen_clienteReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $imagen_clientes,imagen_cliente_param_return $imagen_clienteParameterGeneral) : imagen_cliente_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$imagen_clienteReturnGeneral=new imagen_cliente_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $imagen_clienteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_clientes,imagen_cliente $imagen_cliente,imagen_cliente_param_return $imagen_clienteParameterGeneral,bool $isEsNuevoimagen_cliente,array $clases) : imagen_cliente_param_return {
		 try {	
			$imagen_clienteReturnGeneral=new imagen_cliente_param_return();
	
			$imagen_clienteReturnGeneral->setimagen_cliente($imagen_cliente);
			$imagen_clienteReturnGeneral->setimagen_clientes($imagen_clientes);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$imagen_clienteReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $imagen_clienteReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_clientes,imagen_cliente $imagen_cliente,imagen_cliente_param_return $imagen_clienteParameterGeneral,bool $isEsNuevoimagen_cliente,array $clases) : imagen_cliente_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$imagen_clienteReturnGeneral=new imagen_cliente_param_return();
	
			$imagen_clienteReturnGeneral->setimagen_cliente($imagen_cliente);
			$imagen_clienteReturnGeneral->setimagen_clientes($imagen_clientes);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$imagen_clienteReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $imagen_clienteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_clientes,imagen_cliente $imagen_cliente,imagen_cliente_param_return $imagen_clienteParameterGeneral,bool $isEsNuevoimagen_cliente,array $clases) : imagen_cliente_param_return {
		 try {	
			$imagen_clienteReturnGeneral=new imagen_cliente_param_return();
	
			$imagen_clienteReturnGeneral->setimagen_cliente($imagen_cliente);
			$imagen_clienteReturnGeneral->setimagen_clientes($imagen_clientes);
			
			
			
			return $imagen_clienteReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_clientes,imagen_cliente $imagen_cliente,imagen_cliente_param_return $imagen_clienteParameterGeneral,bool $isEsNuevoimagen_cliente,array $clases) : imagen_cliente_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$imagen_clienteReturnGeneral=new imagen_cliente_param_return();
	
			$imagen_clienteReturnGeneral->setimagen_cliente($imagen_cliente);
			$imagen_clienteReturnGeneral->setimagen_clientes($imagen_clientes);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $imagen_clienteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,imagen_cliente $imagen_cliente,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,imagen_cliente $imagen_cliente,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		imagen_cliente_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(imagen_cliente $imagen_cliente,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//imagen_cliente_logic_add::updateimagen_clienteToGet($this->imagen_cliente);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$imagen_cliente->setcliente($this->imagen_clienteDataAccess->getcliente($this->connexion,$imagen_cliente));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$imagen_cliente->setcliente($this->imagen_clienteDataAccess->getcliente($this->connexion,$imagen_cliente));
				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$imagen_cliente->setcliente($this->imagen_clienteDataAccess->getcliente($this->connexion,$imagen_cliente));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$imagen_cliente->setcliente($this->imagen_clienteDataAccess->getcliente($this->connexion,$imagen_cliente));
		$clienteLogic= new cliente_logic($this->connexion);
		$clienteLogic->deepLoad($imagen_cliente->getcliente(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$imagen_cliente->setcliente($this->imagen_clienteDataAccess->getcliente($this->connexion,$imagen_cliente));
				$clienteLogic= new cliente_logic($this->connexion);
				$clienteLogic->deepLoad($imagen_cliente->getcliente(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$imagen_cliente->setcliente($this->imagen_clienteDataAccess->getcliente($this->connexion,$imagen_cliente));
			$clienteLogic= new cliente_logic($this->connexion);
			$clienteLogic->deepLoad($imagen_cliente->getcliente(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(imagen_cliente $imagen_cliente,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//imagen_cliente_logic_add::updateimagen_clienteToSave($this->imagen_cliente);			
			
			if(!$paraDeleteCascade) {				
				imagen_cliente_data::save($imagen_cliente, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		cliente_data::save($imagen_cliente->getcliente(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				cliente_data::save($imagen_cliente->getcliente(),$this->connexion);
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cliente_data::save($imagen_cliente->getcliente(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		cliente_data::save($imagen_cliente->getcliente(),$this->connexion);
		$clienteLogic= new cliente_logic($this->connexion);
		$clienteLogic->deepSave($imagen_cliente->getcliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				cliente_data::save($imagen_cliente->getcliente(),$this->connexion);
				$clienteLogic= new cliente_logic($this->connexion);
				$clienteLogic->deepSave($imagen_cliente->getcliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cliente_data::save($imagen_cliente->getcliente(),$this->connexion);
			$clienteLogic= new cliente_logic($this->connexion);
			$clienteLogic->deepSave($imagen_cliente->getcliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				imagen_cliente_data::save($imagen_cliente, $this->connexion);
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
			
			$this->deepLoad($this->imagen_cliente,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->imagen_clientes as $imagen_cliente) {
				$this->deepLoad($imagen_cliente,$isDeep,$deepLoadType,$clases);
								
				imagen_cliente_util::refrescarFKDescripciones($this->imagen_clientes);
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
			
			foreach($this->imagen_clientes as $imagen_cliente) {
				$this->deepLoad($imagen_cliente,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->imagen_cliente,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->imagen_clientes as $imagen_cliente) {
				$this->deepSave($imagen_cliente,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->imagen_clientes as $imagen_cliente) {
				$this->deepSave($imagen_cliente,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(cliente::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==cliente::$class) {
						$classes[]=new Classe(cliente::$class);
					}
				}

			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==cliente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cliente::$class);
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
	
	
	
	
	
	
	
	public function getimagen_cliente() : ?imagen_cliente {	
		/*
		imagen_cliente_logic_add::checkimagen_clienteToGet($this->imagen_cliente,$this->datosCliente);
		imagen_cliente_logic_add::updateimagen_clienteToGet($this->imagen_cliente);
		*/
			
		return $this->imagen_cliente;
	}
		
	public function setimagen_cliente(imagen_cliente $newimagen_cliente) {
		$this->imagen_cliente = $newimagen_cliente;
	}
	
	public function getimagen_clientes() : array {		
		/*
		imagen_cliente_logic_add::checkimagen_clienteToGets($this->imagen_clientes,$this->datosCliente);
		
		foreach ($this->imagen_clientes as $imagen_clienteLocal ) {
			imagen_cliente_logic_add::updateimagen_clienteToGet($imagen_clienteLocal);
		}
		*/
		
		return $this->imagen_clientes;
	}
	
	public function setimagen_clientes(array $newimagen_clientes) {
		$this->imagen_clientes = $newimagen_clientes;
	}
	
	public function getimagen_clienteDataAccess() : imagen_cliente_data {
		return $this->imagen_clienteDataAccess;
	}
	
	public function setimagen_clienteDataAccess(imagen_cliente_data $newimagen_clienteDataAccess) {
		$this->imagen_clienteDataAccess = $newimagen_clienteDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        imagen_cliente_carga::$CONTROLLER;;        
		
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
