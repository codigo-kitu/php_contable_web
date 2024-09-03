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

namespace com\bydan\contabilidad\inventario\imagen_devolucion_cliente\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\inventario\imagen_devolucion_cliente\util\imagen_devolucion_cliente_carga;
use com\bydan\contabilidad\inventario\imagen_devolucion_cliente\util\imagen_devolucion_cliente_param_return;


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

use com\bydan\contabilidad\inventario\imagen_devolucion_cliente\util\imagen_devolucion_cliente_util;
use com\bydan\contabilidad\inventario\imagen_devolucion_cliente\business\entity\imagen_devolucion_cliente;
use com\bydan\contabilidad\inventario\imagen_devolucion_cliente\business\data\imagen_devolucion_cliente_data;

//FK


//REL


//REL DETALLES




class imagen_devolucion_cliente_logic  extends GeneralEntityLogic implements imagen_devolucion_cliente_logicI {	
	/*GENERAL*/
	public imagen_devolucion_cliente_data $imagen_devolucion_clienteDataAccess;
	//public ?imagen_devolucion_cliente_logic_add $imagen_devolucion_clienteLogicAdditional=null;
	public ?imagen_devolucion_cliente $imagen_devolucion_cliente;
	public array $imagen_devolucion_clientes;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->imagen_devolucion_clienteDataAccess = new imagen_devolucion_cliente_data();			
			$this->imagen_devolucion_clientes = array();
			$this->imagen_devolucion_cliente = new imagen_devolucion_cliente();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->imagen_devolucion_clienteLogicAdditional = new imagen_devolucion_cliente_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->imagen_devolucion_clienteLogicAdditional==null) {
		//	$this->imagen_devolucion_clienteLogicAdditional=new imagen_devolucion_cliente_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->imagen_devolucion_clienteDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->imagen_devolucion_clienteDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->imagen_devolucion_clienteDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->imagen_devolucion_clienteDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->imagen_devolucion_clientes = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_devolucion_clientes=$this->imagen_devolucion_clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_devolucion_cliente_util::refrescarFKDescripciones($this->imagen_devolucion_clientes);
			}
			
			//imagen_devolucion_cliente_logic_add::checkimagen_devolucion_clienteToGets($this->imagen_devolucion_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_devolucion_clientes);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->imagen_devolucion_clientes = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_devolucion_clientes=$this->imagen_devolucion_clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_devolucion_cliente_util::refrescarFKDescripciones($this->imagen_devolucion_clientes);
			}
			
			//imagen_devolucion_cliente_logic_add::checkimagen_devolucion_clienteToGets($this->imagen_devolucion_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_devolucion_clientes);
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
		$this->imagen_devolucion_cliente = new imagen_devolucion_cliente();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->imagen_devolucion_cliente=$this->imagen_devolucion_clienteDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_devolucion_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_devolucion_cliente_util::refrescarFKDescripcion($this->imagen_devolucion_cliente);
			}
						
			//imagen_devolucion_cliente_logic_add::checkimagen_devolucion_clienteToGet($this->imagen_devolucion_cliente,$this->datosCliente);
			//imagen_devolucion_cliente_logic_add::updateimagen_devolucion_clienteToGet($this->imagen_devolucion_cliente);
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
		$this->imagen_devolucion_cliente = new  imagen_devolucion_cliente();
		  		  
        try {		
			$this->imagen_devolucion_cliente=$this->imagen_devolucion_clienteDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_devolucion_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_devolucion_cliente_util::refrescarFKDescripcion($this->imagen_devolucion_cliente);
			}
			
			//imagen_devolucion_cliente_logic_add::checkimagen_devolucion_clienteToGet($this->imagen_devolucion_cliente,$this->datosCliente);
			//imagen_devolucion_cliente_logic_add::updateimagen_devolucion_clienteToGet($this->imagen_devolucion_cliente);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?imagen_devolucion_cliente {
		$imagen_devolucion_clienteLogic = new  imagen_devolucion_cliente_logic();
		  		  
        try {		
			$imagen_devolucion_clienteLogic->setConnexion($connexion);			
			$imagen_devolucion_clienteLogic->getEntity($id);			
			return $imagen_devolucion_clienteLogic->getimagen_devolucion_cliente();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->imagen_devolucion_cliente = new  imagen_devolucion_cliente();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->imagen_devolucion_cliente=$this->imagen_devolucion_clienteDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_devolucion_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_devolucion_cliente_util::refrescarFKDescripcion($this->imagen_devolucion_cliente);
			}
			
			//imagen_devolucion_cliente_logic_add::checkimagen_devolucion_clienteToGet($this->imagen_devolucion_cliente,$this->datosCliente);
			//imagen_devolucion_cliente_logic_add::updateimagen_devolucion_clienteToGet($this->imagen_devolucion_cliente);
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
		$this->imagen_devolucion_cliente = new  imagen_devolucion_cliente();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_devolucion_cliente=$this->imagen_devolucion_clienteDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_devolucion_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_devolucion_cliente_util::refrescarFKDescripcion($this->imagen_devolucion_cliente);
			}
			
			//imagen_devolucion_cliente_logic_add::checkimagen_devolucion_clienteToGet($this->imagen_devolucion_cliente,$this->datosCliente);
			//imagen_devolucion_cliente_logic_add::updateimagen_devolucion_clienteToGet($this->imagen_devolucion_cliente);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?imagen_devolucion_cliente {
		$imagen_devolucion_clienteLogic = new  imagen_devolucion_cliente_logic();
		  		  
        try {		
			$imagen_devolucion_clienteLogic->setConnexion($connexion);			
			$imagen_devolucion_clienteLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $imagen_devolucion_clienteLogic->getimagen_devolucion_cliente();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->imagen_devolucion_clientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->imagen_devolucion_clientes=$this->imagen_devolucion_clienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_devolucion_cliente_util::refrescarFKDescripciones($this->imagen_devolucion_clientes);
			}
			
			//imagen_devolucion_cliente_logic_add::checkimagen_devolucion_clienteToGets($this->imagen_devolucion_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_devolucion_clientes);			
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
		$this->imagen_devolucion_clientes = array();
		  		  
        try {			
			$this->imagen_devolucion_clientes=$this->imagen_devolucion_clienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_devolucion_cliente_util::refrescarFKDescripciones($this->imagen_devolucion_clientes);
			}
			
			//imagen_devolucion_cliente_logic_add::checkimagen_devolucion_clienteToGets($this->imagen_devolucion_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_devolucion_clientes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->imagen_devolucion_clientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_devolucion_clientes=$this->imagen_devolucion_clienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_devolucion_cliente_util::refrescarFKDescripciones($this->imagen_devolucion_clientes);
			}
			
			//imagen_devolucion_cliente_logic_add::checkimagen_devolucion_clienteToGets($this->imagen_devolucion_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_devolucion_clientes);
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
		$this->imagen_devolucion_clientes = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_devolucion_clientes=$this->imagen_devolucion_clienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_devolucion_cliente_util::refrescarFKDescripciones($this->imagen_devolucion_clientes);
			}
			
			//imagen_devolucion_cliente_logic_add::checkimagen_devolucion_clienteToGets($this->imagen_devolucion_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_devolucion_clientes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$imagen_devolucion_clienteLogic = new  imagen_devolucion_cliente_logic();
		  		  
        try {		
			$imagen_devolucion_clienteLogic->setConnexion($connexion);			
			$imagen_devolucion_clienteLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $imagen_devolucion_clienteLogic->getimagen_devolucion_clientes();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->imagen_devolucion_clientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->imagen_devolucion_clientes=$this->imagen_devolucion_clienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_devolucion_cliente_util::refrescarFKDescripciones($this->imagen_devolucion_clientes);
			}
			
			//imagen_devolucion_cliente_logic_add::checkimagen_devolucion_clienteToGets($this->imagen_devolucion_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_devolucion_clientes);
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
		$this->imagen_devolucion_clientes = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_devolucion_clientes=$this->imagen_devolucion_clienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_devolucion_cliente_util::refrescarFKDescripciones($this->imagen_devolucion_clientes);
			}
			
			//imagen_devolucion_cliente_logic_add::checkimagen_devolucion_clienteToGets($this->imagen_devolucion_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_devolucion_clientes);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->imagen_devolucion_clientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_devolucion_clientes=$this->imagen_devolucion_clienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_devolucion_cliente_util::refrescarFKDescripciones($this->imagen_devolucion_clientes);
			}
			
			//imagen_devolucion_cliente_logic_add::checkimagen_devolucion_clienteToGets($this->imagen_devolucion_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_devolucion_clientes);
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
		$this->imagen_devolucion_clientes = array();
		  		  
        try {			
			$this->imagen_devolucion_clientes=$this->imagen_devolucion_clienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_devolucion_cliente_util::refrescarFKDescripciones($this->imagen_devolucion_clientes);
			}	
			
			//imagen_devolucion_cliente_logic_add::checkimagen_devolucion_clienteToGets($this->imagen_devolucion_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_devolucion_clientes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->imagen_devolucion_clientes = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->imagen_devolucion_clientes=$this->imagen_devolucion_clienteDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_devolucion_cliente_util::refrescarFKDescripciones($this->imagen_devolucion_clientes);
			}
			
			//imagen_devolucion_cliente_logic_add::checkimagen_devolucion_clienteToGets($this->imagen_devolucion_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_devolucion_clientes);
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
		$this->imagen_devolucion_clientes = array();
		  		  
        try {		
			$this->imagen_devolucion_clientes=$this->imagen_devolucion_clienteDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_devolucion_cliente_util::refrescarFKDescripciones($this->imagen_devolucion_clientes);
			}
			
			//imagen_devolucion_cliente_logic_add::checkimagen_devolucion_clienteToGets($this->imagen_devolucion_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_devolucion_clientes);

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
						
			//imagen_devolucion_cliente_logic_add::checkimagen_devolucion_clienteToSave($this->imagen_devolucion_cliente,$this->datosCliente,$this->connexion);	       
			//imagen_devolucion_cliente_logic_add::updateimagen_devolucion_clienteToSave($this->imagen_devolucion_cliente);			
			imagen_devolucion_cliente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->imagen_devolucion_cliente,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->imagen_devolucion_clienteLogicAdditional->checkGeneralEntityToSave($this,$this->imagen_devolucion_cliente,$this->datosCliente,$this->connexion);
			
			
			imagen_devolucion_cliente_data::save($this->imagen_devolucion_cliente, $this->connexion);	    	       	 				
			//imagen_devolucion_cliente_logic_add::checkimagen_devolucion_clienteToSaveAfter($this->imagen_devolucion_cliente,$this->datosCliente,$this->connexion);			
			//$this->imagen_devolucion_clienteLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->imagen_devolucion_cliente,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->imagen_devolucion_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->imagen_devolucion_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				imagen_devolucion_cliente_util::refrescarFKDescripcion($this->imagen_devolucion_cliente);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->imagen_devolucion_cliente->getIsDeleted()) {
				$this->imagen_devolucion_cliente=null;
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
						
			/*imagen_devolucion_cliente_logic_add::checkimagen_devolucion_clienteToSave($this->imagen_devolucion_cliente,$this->datosCliente,$this->connexion);*/	        
			//imagen_devolucion_cliente_logic_add::updateimagen_devolucion_clienteToSave($this->imagen_devolucion_cliente);			
			//$this->imagen_devolucion_clienteLogicAdditional->checkGeneralEntityToSave($this,$this->imagen_devolucion_cliente,$this->datosCliente,$this->connexion);			
			imagen_devolucion_cliente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->imagen_devolucion_cliente,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			imagen_devolucion_cliente_data::save($this->imagen_devolucion_cliente, $this->connexion);	    	       	 						
			/*imagen_devolucion_cliente_logic_add::checkimagen_devolucion_clienteToSaveAfter($this->imagen_devolucion_cliente,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_devolucion_clienteLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->imagen_devolucion_cliente,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->imagen_devolucion_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->imagen_devolucion_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				imagen_devolucion_cliente_util::refrescarFKDescripcion($this->imagen_devolucion_cliente);				
			}
			
			if($this->imagen_devolucion_cliente->getIsDeleted()) {
				$this->imagen_devolucion_cliente=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(imagen_devolucion_cliente $imagen_devolucion_cliente,Connexion $connexion)  {
		$imagen_devolucion_clienteLogic = new  imagen_devolucion_cliente_logic();		  		  
        try {		
			$imagen_devolucion_clienteLogic->setConnexion($connexion);			
			$imagen_devolucion_clienteLogic->setimagen_devolucion_cliente($imagen_devolucion_cliente);			
			$imagen_devolucion_clienteLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*imagen_devolucion_cliente_logic_add::checkimagen_devolucion_clienteToSaves($this->imagen_devolucion_clientes,$this->datosCliente,$this->connexion);*/	        	
			//$this->imagen_devolucion_clienteLogicAdditional->checkGeneralEntitiesToSaves($this,$this->imagen_devolucion_clientes,$this->datosCliente,$this->connexion);
			
	   		foreach($this->imagen_devolucion_clientes as $imagen_devolucion_clienteLocal) {				
								
				//imagen_devolucion_cliente_logic_add::updateimagen_devolucion_clienteToSave($imagen_devolucion_clienteLocal);	        	
				imagen_devolucion_cliente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$imagen_devolucion_clienteLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				imagen_devolucion_cliente_data::save($imagen_devolucion_clienteLocal, $this->connexion);				
			}
			
			/*imagen_devolucion_cliente_logic_add::checkimagen_devolucion_clienteToSavesAfter($this->imagen_devolucion_clientes,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_devolucion_clienteLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->imagen_devolucion_clientes,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_devolucion_cliente_util::refrescarFKDescripciones($this->imagen_devolucion_clientes);
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
			/*imagen_devolucion_cliente_logic_add::checkimagen_devolucion_clienteToSaves($this->imagen_devolucion_clientes,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_devolucion_clienteLogicAdditional->checkGeneralEntitiesToSaves($this,$this->imagen_devolucion_clientes,$this->datosCliente,$this->connexion);
			
	   		foreach($this->imagen_devolucion_clientes as $imagen_devolucion_clienteLocal) {				
								
				//imagen_devolucion_cliente_logic_add::updateimagen_devolucion_clienteToSave($imagen_devolucion_clienteLocal);	        	
				imagen_devolucion_cliente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$imagen_devolucion_clienteLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				imagen_devolucion_cliente_data::save($imagen_devolucion_clienteLocal, $this->connexion);				
			}			
			
			/*imagen_devolucion_cliente_logic_add::checkimagen_devolucion_clienteToSavesAfter($this->imagen_devolucion_clientes,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_devolucion_clienteLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->imagen_devolucion_clientes,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_devolucion_cliente_util::refrescarFKDescripciones($this->imagen_devolucion_clientes);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $imagen_devolucion_clientes,Connexion $connexion)  {
		$imagen_devolucion_clienteLogic = new  imagen_devolucion_cliente_logic();
		  		  
        try {		
			$imagen_devolucion_clienteLogic->setConnexion($connexion);			
			$imagen_devolucion_clienteLogic->setimagen_devolucion_clientes($imagen_devolucion_clientes);			
			$imagen_devolucion_clienteLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$imagen_devolucion_clientesAux=array();
		
		foreach($this->imagen_devolucion_clientes as $imagen_devolucion_cliente) {
			if($imagen_devolucion_cliente->getIsDeleted()==false) {
				$imagen_devolucion_clientesAux[]=$imagen_devolucion_cliente;
			}
		}
		
		$this->imagen_devolucion_clientes=$imagen_devolucion_clientesAux;
	}
	
	public function updateToGetsAuxiliar(array &$imagen_devolucion_clientes) {
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
	
	
	
	public function saveRelacionesWithConnection($imagen_devolucion_cliente) {
		$this->saveRelacionesBase($imagen_devolucion_cliente,true);
	}

	public function saveRelaciones($imagen_devolucion_cliente) {
		$this->saveRelacionesBase($imagen_devolucion_cliente,false);
	}

	public function saveRelacionesBase($imagen_devolucion_cliente,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setimagen_devolucion_cliente($imagen_devolucion_cliente);

			if(true) {

				//imagen_devolucion_cliente_logic_add::updateRelacionesToSave($imagen_devolucion_cliente,$this);

				if(($this->imagen_devolucion_cliente->getIsNew() || $this->imagen_devolucion_cliente->getIsChanged()) && !$this->imagen_devolucion_cliente->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->imagen_devolucion_cliente->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//imagen_devolucion_cliente_logic_add::updateRelacionesToSaveAfter($imagen_devolucion_cliente,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $imagen_devolucion_clientes,imagen_devolucion_cliente_param_return $imagen_devolucion_clienteParameterGeneral) : imagen_devolucion_cliente_param_return {
		$imagen_devolucion_clienteReturnGeneral=new imagen_devolucion_cliente_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $imagen_devolucion_clienteReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $imagen_devolucion_clientes,imagen_devolucion_cliente_param_return $imagen_devolucion_clienteParameterGeneral) : imagen_devolucion_cliente_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$imagen_devolucion_clienteReturnGeneral=new imagen_devolucion_cliente_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $imagen_devolucion_clienteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_devolucion_clientes,imagen_devolucion_cliente $imagen_devolucion_cliente,imagen_devolucion_cliente_param_return $imagen_devolucion_clienteParameterGeneral,bool $isEsNuevoimagen_devolucion_cliente,array $clases) : imagen_devolucion_cliente_param_return {
		 try {	
			$imagen_devolucion_clienteReturnGeneral=new imagen_devolucion_cliente_param_return();
	
			$imagen_devolucion_clienteReturnGeneral->setimagen_devolucion_cliente($imagen_devolucion_cliente);
			$imagen_devolucion_clienteReturnGeneral->setimagen_devolucion_clientes($imagen_devolucion_clientes);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$imagen_devolucion_clienteReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $imagen_devolucion_clienteReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_devolucion_clientes,imagen_devolucion_cliente $imagen_devolucion_cliente,imagen_devolucion_cliente_param_return $imagen_devolucion_clienteParameterGeneral,bool $isEsNuevoimagen_devolucion_cliente,array $clases) : imagen_devolucion_cliente_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$imagen_devolucion_clienteReturnGeneral=new imagen_devolucion_cliente_param_return();
	
			$imagen_devolucion_clienteReturnGeneral->setimagen_devolucion_cliente($imagen_devolucion_cliente);
			$imagen_devolucion_clienteReturnGeneral->setimagen_devolucion_clientes($imagen_devolucion_clientes);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$imagen_devolucion_clienteReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $imagen_devolucion_clienteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_devolucion_clientes,imagen_devolucion_cliente $imagen_devolucion_cliente,imagen_devolucion_cliente_param_return $imagen_devolucion_clienteParameterGeneral,bool $isEsNuevoimagen_devolucion_cliente,array $clases) : imagen_devolucion_cliente_param_return {
		 try {	
			$imagen_devolucion_clienteReturnGeneral=new imagen_devolucion_cliente_param_return();
	
			$imagen_devolucion_clienteReturnGeneral->setimagen_devolucion_cliente($imagen_devolucion_cliente);
			$imagen_devolucion_clienteReturnGeneral->setimagen_devolucion_clientes($imagen_devolucion_clientes);
			
			
			
			return $imagen_devolucion_clienteReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_devolucion_clientes,imagen_devolucion_cliente $imagen_devolucion_cliente,imagen_devolucion_cliente_param_return $imagen_devolucion_clienteParameterGeneral,bool $isEsNuevoimagen_devolucion_cliente,array $clases) : imagen_devolucion_cliente_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$imagen_devolucion_clienteReturnGeneral=new imagen_devolucion_cliente_param_return();
	
			$imagen_devolucion_clienteReturnGeneral->setimagen_devolucion_cliente($imagen_devolucion_cliente);
			$imagen_devolucion_clienteReturnGeneral->setimagen_devolucion_clientes($imagen_devolucion_clientes);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $imagen_devolucion_clienteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,imagen_devolucion_cliente $imagen_devolucion_cliente,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,imagen_devolucion_cliente $imagen_devolucion_cliente,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	
	
	
	public function deepLoad(imagen_devolucion_cliente $imagen_devolucion_cliente,bool $isDeep,string $deepLoadType,array $clases) {
		
		
		try {
			
			
			
			//imagen_devolucion_cliente_logic_add::updateimagen_devolucion_clienteToGet($this->imagen_devolucion_cliente);
			
			
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		
	}
	
	public function deepSave(imagen_devolucion_cliente $imagen_devolucion_cliente,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		
		
		try {
			
			
			//imagen_devolucion_cliente_logic_add::updateimagen_devolucion_clienteToSave($this->imagen_devolucion_cliente);			
			
			if(!$paraDeleteCascade) {				
				imagen_devolucion_cliente_data::save($imagen_devolucion_cliente, $this->connexion);
			}
			
			
			
			if($paraDeleteCascade) {				
				imagen_devolucion_cliente_data::save($imagen_devolucion_cliente, $this->connexion);
			}
			
		}catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}	
		
		
	}
		
	public function deepLoadWithConnection(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje) {		
		try {
			$this->getNewConnexionToDeep();
			
			$this->deepLoad($this->imagen_devolucion_cliente,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->imagen_devolucion_clientes as $imagen_devolucion_cliente) {
				$this->deepLoad($imagen_devolucion_cliente,$isDeep,$deepLoadType,$clases);
								
				imagen_devolucion_cliente_util::refrescarFKDescripciones($this->imagen_devolucion_clientes);
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
			
			foreach($this->imagen_devolucion_clientes as $imagen_devolucion_cliente) {
				$this->deepLoad($imagen_devolucion_cliente,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->imagen_devolucion_cliente,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->imagen_devolucion_clientes as $imagen_devolucion_cliente) {
				$this->deepSave($imagen_devolucion_cliente,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->imagen_devolucion_clientes as $imagen_devolucion_cliente) {
				$this->deepSave($imagen_devolucion_cliente,$isDeep,$deepLoadType,$clases,false);
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
	
	
	
	
	
	
	
	public function getimagen_devolucion_cliente() : ?imagen_devolucion_cliente {	
		/*
		imagen_devolucion_cliente_logic_add::checkimagen_devolucion_clienteToGet($this->imagen_devolucion_cliente,$this->datosCliente);
		imagen_devolucion_cliente_logic_add::updateimagen_devolucion_clienteToGet($this->imagen_devolucion_cliente);
		*/
			
		return $this->imagen_devolucion_cliente;
	}
		
	public function setimagen_devolucion_cliente(imagen_devolucion_cliente $newimagen_devolucion_cliente) {
		$this->imagen_devolucion_cliente = $newimagen_devolucion_cliente;
	}
	
	public function getimagen_devolucion_clientes() : array {		
		/*
		imagen_devolucion_cliente_logic_add::checkimagen_devolucion_clienteToGets($this->imagen_devolucion_clientes,$this->datosCliente);
		
		foreach ($this->imagen_devolucion_clientes as $imagen_devolucion_clienteLocal ) {
			imagen_devolucion_cliente_logic_add::updateimagen_devolucion_clienteToGet($imagen_devolucion_clienteLocal);
		}
		*/
		
		return $this->imagen_devolucion_clientes;
	}
	
	public function setimagen_devolucion_clientes(array $newimagen_devolucion_clientes) {
		$this->imagen_devolucion_clientes = $newimagen_devolucion_clientes;
	}
	
	public function getimagen_devolucion_clienteDataAccess() : imagen_devolucion_cliente_data {
		return $this->imagen_devolucion_clienteDataAccess;
	}
	
	public function setimagen_devolucion_clienteDataAccess(imagen_devolucion_cliente_data $newimagen_devolucion_clienteDataAccess) {
		$this->imagen_devolucion_clienteDataAccess = $newimagen_devolucion_clienteDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        imagen_devolucion_cliente_carga::$CONTROLLER;;        
		
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
