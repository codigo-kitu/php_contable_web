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

namespace com\bydan\contabilidad\inventario\lista_cliente\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\inventario\lista_cliente\util\lista_cliente_carga;
use com\bydan\contabilidad\inventario\lista_cliente\util\lista_cliente_param_return;

use com\bydan\contabilidad\inventario\lista_cliente\presentation\session\lista_cliente_session;

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

use com\bydan\contabilidad\inventario\lista_cliente\util\lista_cliente_util;
use com\bydan\contabilidad\inventario\lista_cliente\business\entity\lista_cliente;
use com\bydan\contabilidad\inventario\lista_cliente\business\data\lista_cliente_data;

//FK


use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\business\data\cliente_data;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;

use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\business\data\producto_data;
use com\bydan\contabilidad\inventario\producto\business\logic\producto_logic;
use com\bydan\contabilidad\inventario\producto\util\producto_util;

//REL


//REL DETALLES




class lista_cliente_logic  extends GeneralEntityLogic implements lista_cliente_logicI {	
	/*GENERAL*/
	public lista_cliente_data $lista_clienteDataAccess;
	//public ?lista_cliente_logic_add $lista_clienteLogicAdditional=null;
	public ?lista_cliente $lista_cliente;
	public array $lista_clientes;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->lista_clienteDataAccess = new lista_cliente_data();			
			$this->lista_clientes = array();
			$this->lista_cliente = new lista_cliente();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->lista_clienteLogicAdditional = new lista_cliente_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->lista_clienteLogicAdditional==null) {
		//	$this->lista_clienteLogicAdditional=new lista_cliente_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->lista_clienteDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->lista_clienteDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->lista_clienteDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->lista_clienteDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->lista_clientes = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->lista_clientes=$this->lista_clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lista_cliente_util::refrescarFKDescripciones($this->lista_clientes);
			}
			
			//lista_cliente_logic_add::checklista_clienteToGets($this->lista_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lista_clientes);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->lista_clientes = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->lista_clientes=$this->lista_clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lista_cliente_util::refrescarFKDescripciones($this->lista_clientes);
			}
			
			//lista_cliente_logic_add::checklista_clienteToGets($this->lista_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lista_clientes);
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
		$this->lista_cliente = new lista_cliente();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->lista_cliente=$this->lista_clienteDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->lista_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				lista_cliente_util::refrescarFKDescripcion($this->lista_cliente);
			}
						
			//lista_cliente_logic_add::checklista_clienteToGet($this->lista_cliente,$this->datosCliente);
			//lista_cliente_logic_add::updatelista_clienteToGet($this->lista_cliente);
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
		$this->lista_cliente = new  lista_cliente();
		  		  
        try {		
			$this->lista_cliente=$this->lista_clienteDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->lista_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				lista_cliente_util::refrescarFKDescripcion($this->lista_cliente);
			}
			
			//lista_cliente_logic_add::checklista_clienteToGet($this->lista_cliente,$this->datosCliente);
			//lista_cliente_logic_add::updatelista_clienteToGet($this->lista_cliente);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?lista_cliente {
		$lista_clienteLogic = new  lista_cliente_logic();
		  		  
        try {		
			$lista_clienteLogic->setConnexion($connexion);			
			$lista_clienteLogic->getEntity($id);			
			return $lista_clienteLogic->getlista_cliente();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->lista_cliente = new  lista_cliente();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->lista_cliente=$this->lista_clienteDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->lista_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				lista_cliente_util::refrescarFKDescripcion($this->lista_cliente);
			}
			
			//lista_cliente_logic_add::checklista_clienteToGet($this->lista_cliente,$this->datosCliente);
			//lista_cliente_logic_add::updatelista_clienteToGet($this->lista_cliente);
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
		$this->lista_cliente = new  lista_cliente();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->lista_cliente=$this->lista_clienteDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->lista_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				lista_cliente_util::refrescarFKDescripcion($this->lista_cliente);
			}
			
			//lista_cliente_logic_add::checklista_clienteToGet($this->lista_cliente,$this->datosCliente);
			//lista_cliente_logic_add::updatelista_clienteToGet($this->lista_cliente);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?lista_cliente {
		$lista_clienteLogic = new  lista_cliente_logic();
		  		  
        try {		
			$lista_clienteLogic->setConnexion($connexion);			
			$lista_clienteLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $lista_clienteLogic->getlista_cliente();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->lista_clientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->lista_clientes=$this->lista_clienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lista_cliente_util::refrescarFKDescripciones($this->lista_clientes);
			}
			
			//lista_cliente_logic_add::checklista_clienteToGets($this->lista_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lista_clientes);			
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
		$this->lista_clientes = array();
		  		  
        try {			
			$this->lista_clientes=$this->lista_clienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lista_cliente_util::refrescarFKDescripciones($this->lista_clientes);
			}
			
			//lista_cliente_logic_add::checklista_clienteToGets($this->lista_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lista_clientes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->lista_clientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->lista_clientes=$this->lista_clienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lista_cliente_util::refrescarFKDescripciones($this->lista_clientes);
			}
			
			//lista_cliente_logic_add::checklista_clienteToGets($this->lista_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lista_clientes);
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
		$this->lista_clientes = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->lista_clientes=$this->lista_clienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lista_cliente_util::refrescarFKDescripciones($this->lista_clientes);
			}
			
			//lista_cliente_logic_add::checklista_clienteToGets($this->lista_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lista_clientes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$lista_clienteLogic = new  lista_cliente_logic();
		  		  
        try {		
			$lista_clienteLogic->setConnexion($connexion);			
			$lista_clienteLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $lista_clienteLogic->getlista_clientes();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->lista_clientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->lista_clientes=$this->lista_clienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lista_cliente_util::refrescarFKDescripciones($this->lista_clientes);
			}
			
			//lista_cliente_logic_add::checklista_clienteToGets($this->lista_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lista_clientes);
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
		$this->lista_clientes = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->lista_clientes=$this->lista_clienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lista_cliente_util::refrescarFKDescripciones($this->lista_clientes);
			}
			
			//lista_cliente_logic_add::checklista_clienteToGets($this->lista_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lista_clientes);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->lista_clientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->lista_clientes=$this->lista_clienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lista_cliente_util::refrescarFKDescripciones($this->lista_clientes);
			}
			
			//lista_cliente_logic_add::checklista_clienteToGets($this->lista_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lista_clientes);
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
		$this->lista_clientes = array();
		  		  
        try {			
			$this->lista_clientes=$this->lista_clienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lista_cliente_util::refrescarFKDescripciones($this->lista_clientes);
			}	
			
			//lista_cliente_logic_add::checklista_clienteToGets($this->lista_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lista_clientes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->lista_clientes = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->lista_clientes=$this->lista_clienteDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lista_cliente_util::refrescarFKDescripciones($this->lista_clientes);
			}
			
			//lista_cliente_logic_add::checklista_clienteToGets($this->lista_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lista_clientes);
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
		$this->lista_clientes = array();
		  		  
        try {		
			$this->lista_clientes=$this->lista_clienteDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lista_cliente_util::refrescarFKDescripciones($this->lista_clientes);
			}
			
			//lista_cliente_logic_add::checklista_clienteToGets($this->lista_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lista_clientes);

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
			$parameterSelectionGeneralid_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cliente,lista_cliente_util::$ID_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cliente);

			$this->lista_clientes=$this->lista_clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_cliente_util::refrescarFKDescripciones($this->lista_clientes);
			}
			//lista_cliente_logic_add::checklista_clienteToGets($this->lista_clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_clientes);

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
			$parameterSelectionGeneralid_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cliente,lista_cliente_util::$ID_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cliente);

			$this->lista_clientes=$this->lista_clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_cliente_util::refrescarFKDescripciones($this->lista_clientes);
			}
			//lista_cliente_logic_add::checklista_clienteToGets($this->lista_clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_clientes);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdproductoWithConnection(string $strFinalQuery,Pagination $pagination,int $id_producto) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_producto= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_producto,lista_cliente_util::$ID_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_producto);

			$this->lista_clientes=$this->lista_clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_cliente_util::refrescarFKDescripciones($this->lista_clientes);
			}
			//lista_cliente_logic_add::checklista_clienteToGets($this->lista_clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_clientes);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idproducto(string $strFinalQuery,Pagination $pagination,int $id_producto) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_producto= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_producto,lista_cliente_util::$ID_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_producto);

			$this->lista_clientes=$this->lista_clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_cliente_util::refrescarFKDescripciones($this->lista_clientes);
			}
			//lista_cliente_logic_add::checklista_clienteToGets($this->lista_clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_clientes);
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
						
			//lista_cliente_logic_add::checklista_clienteToSave($this->lista_cliente,$this->datosCliente,$this->connexion);	       
			//lista_cliente_logic_add::updatelista_clienteToSave($this->lista_cliente);			
			lista_cliente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->lista_cliente,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->lista_clienteLogicAdditional->checkGeneralEntityToSave($this,$this->lista_cliente,$this->datosCliente,$this->connexion);
			
			
			lista_cliente_data::save($this->lista_cliente, $this->connexion);	    	       	 				
			//lista_cliente_logic_add::checklista_clienteToSaveAfter($this->lista_cliente,$this->datosCliente,$this->connexion);			
			//$this->lista_clienteLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->lista_cliente,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->lista_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->lista_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				lista_cliente_util::refrescarFKDescripcion($this->lista_cliente);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->lista_cliente->getIsDeleted()) {
				$this->lista_cliente=null;
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
						
			/*lista_cliente_logic_add::checklista_clienteToSave($this->lista_cliente,$this->datosCliente,$this->connexion);*/	        
			//lista_cliente_logic_add::updatelista_clienteToSave($this->lista_cliente);			
			//$this->lista_clienteLogicAdditional->checkGeneralEntityToSave($this,$this->lista_cliente,$this->datosCliente,$this->connexion);			
			lista_cliente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->lista_cliente,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			lista_cliente_data::save($this->lista_cliente, $this->connexion);	    	       	 						
			/*lista_cliente_logic_add::checklista_clienteToSaveAfter($this->lista_cliente,$this->datosCliente,$this->connexion);*/			
			//$this->lista_clienteLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->lista_cliente,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->lista_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->lista_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				lista_cliente_util::refrescarFKDescripcion($this->lista_cliente);				
			}
			
			if($this->lista_cliente->getIsDeleted()) {
				$this->lista_cliente=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(lista_cliente $lista_cliente,Connexion $connexion)  {
		$lista_clienteLogic = new  lista_cliente_logic();		  		  
        try {		
			$lista_clienteLogic->setConnexion($connexion);			
			$lista_clienteLogic->setlista_cliente($lista_cliente);			
			$lista_clienteLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*lista_cliente_logic_add::checklista_clienteToSaves($this->lista_clientes,$this->datosCliente,$this->connexion);*/	        	
			//$this->lista_clienteLogicAdditional->checkGeneralEntitiesToSaves($this,$this->lista_clientes,$this->datosCliente,$this->connexion);
			
	   		foreach($this->lista_clientes as $lista_clienteLocal) {				
								
				//lista_cliente_logic_add::updatelista_clienteToSave($lista_clienteLocal);	        	
				lista_cliente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$lista_clienteLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				lista_cliente_data::save($lista_clienteLocal, $this->connexion);				
			}
			
			/*lista_cliente_logic_add::checklista_clienteToSavesAfter($this->lista_clientes,$this->datosCliente,$this->connexion);*/			
			//$this->lista_clienteLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->lista_clientes,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lista_cliente_util::refrescarFKDescripciones($this->lista_clientes);
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
			/*lista_cliente_logic_add::checklista_clienteToSaves($this->lista_clientes,$this->datosCliente,$this->connexion);*/			
			//$this->lista_clienteLogicAdditional->checkGeneralEntitiesToSaves($this,$this->lista_clientes,$this->datosCliente,$this->connexion);
			
	   		foreach($this->lista_clientes as $lista_clienteLocal) {				
								
				//lista_cliente_logic_add::updatelista_clienteToSave($lista_clienteLocal);	        	
				lista_cliente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$lista_clienteLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				lista_cliente_data::save($lista_clienteLocal, $this->connexion);				
			}			
			
			/*lista_cliente_logic_add::checklista_clienteToSavesAfter($this->lista_clientes,$this->datosCliente,$this->connexion);*/			
			//$this->lista_clienteLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->lista_clientes,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lista_cliente_util::refrescarFKDescripciones($this->lista_clientes);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $lista_clientes,Connexion $connexion)  {
		$lista_clienteLogic = new  lista_cliente_logic();
		  		  
        try {		
			$lista_clienteLogic->setConnexion($connexion);			
			$lista_clienteLogic->setlista_clientes($lista_clientes);			
			$lista_clienteLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$lista_clientesAux=array();
		
		foreach($this->lista_clientes as $lista_cliente) {
			if($lista_cliente->getIsDeleted()==false) {
				$lista_clientesAux[]=$lista_cliente;
			}
		}
		
		$this->lista_clientes=$lista_clientesAux;
	}
	
	public function updateToGetsAuxiliar(array &$lista_clientes) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->lista_clientes as $lista_cliente) {
				
				$lista_cliente->setid_cliente_Descripcion(lista_cliente_util::getclienteDescripcion($lista_cliente->getcliente()));
				$lista_cliente->setid_producto_Descripcion(lista_cliente_util::getproductoDescripcion($lista_cliente->getproducto()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$lista_cliente_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$lista_cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$lista_cliente_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$lista_cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$lista_cliente_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$lista_clienteForeignKey=new lista_cliente_param_return();//lista_clienteForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cliente',$strRecargarFkTipos,',')) {
				$this->cargarCombosclientesFK($this->connexion,$strRecargarFkQuery,$lista_clienteForeignKey,$lista_cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_producto',$strRecargarFkTipos,',')) {
				$this->cargarCombosproductosFK($this->connexion,$strRecargarFkQuery,$lista_clienteForeignKey,$lista_cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cliente',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosclientesFK($this->connexion,' where id=-1 ',$lista_clienteForeignKey,$lista_cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_producto',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosproductosFK($this->connexion,' where id=-1 ',$lista_clienteForeignKey,$lista_cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $lista_clienteForeignKey;
			
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
	
	
	public function cargarCombosclientesFK($connexion=null,$strRecargarFkQuery='',$lista_clienteForeignKey,$lista_cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$clienteLogic= new cliente_logic();
		$pagination= new Pagination();
		$lista_clienteForeignKey->clientesFK=array();

		$clienteLogic->setConnexion($connexion);
		$clienteLogic->getclienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($lista_cliente_session==null) {
			$lista_cliente_session=new lista_cliente_session();
		}
		
		if($lista_cliente_session->bitBusquedaDesdeFKSesioncliente!=true) {
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
				if($lista_clienteForeignKey->idclienteDefaultFK==0) {
					$lista_clienteForeignKey->idclienteDefaultFK=$clienteLocal->getId();
				}

				$lista_clienteForeignKey->clientesFK[$clienteLocal->getId()]=lista_cliente_util::getclienteDescripcion($clienteLocal);
			}

		} else {

			if($lista_cliente_session->bigidclienteActual!=null && $lista_cliente_session->bigidclienteActual > 0) {
				$clienteLogic->getEntity($lista_cliente_session->bigidclienteActual);//WithConnection

				$lista_clienteForeignKey->clientesFK[$clienteLogic->getcliente()->getId()]=lista_cliente_util::getclienteDescripcion($clienteLogic->getcliente());
				$lista_clienteForeignKey->idclienteDefaultFK=$clienteLogic->getcliente()->getId();
			}
		}
	}

	public function cargarCombosproductosFK($connexion=null,$strRecargarFkQuery='',$lista_clienteForeignKey,$lista_cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$productoLogic= new producto_logic();
		$pagination= new Pagination();
		$lista_clienteForeignKey->productosFK=array();

		$productoLogic->setConnexion($connexion);
		$productoLogic->getproductoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($lista_cliente_session==null) {
			$lista_cliente_session=new lista_cliente_session();
		}
		
		if($lista_cliente_session->bitBusquedaDesdeFKSesionproducto!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=producto_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalproducto=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalproducto=Funciones::GetFinalQueryAppend($finalQueryGlobalproducto, '');
				$finalQueryGlobalproducto.=producto_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalproducto.$strRecargarFkQuery;		

				$productoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($productoLogic->getproductos() as $productoLocal ) {
				if($lista_clienteForeignKey->idproductoDefaultFK==0) {
					$lista_clienteForeignKey->idproductoDefaultFK=$productoLocal->getId();
				}

				$lista_clienteForeignKey->productosFK[$productoLocal->getId()]=lista_cliente_util::getproductoDescripcion($productoLocal);
			}

		} else {

			if($lista_cliente_session->bigidproductoActual!=null && $lista_cliente_session->bigidproductoActual > 0) {
				$productoLogic->getEntity($lista_cliente_session->bigidproductoActual);//WithConnection

				$lista_clienteForeignKey->productosFK[$productoLogic->getproducto()->getId()]=lista_cliente_util::getproductoDescripcion($productoLogic->getproducto());
				$lista_clienteForeignKey->idproductoDefaultFK=$productoLogic->getproducto()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($lista_cliente) {
		$this->saveRelacionesBase($lista_cliente,true);
	}

	public function saveRelaciones($lista_cliente) {
		$this->saveRelacionesBase($lista_cliente,false);
	}

	public function saveRelacionesBase($lista_cliente,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setlista_cliente($lista_cliente);

			if(true) {

				//lista_cliente_logic_add::updateRelacionesToSave($lista_cliente,$this);

				if(($this->lista_cliente->getIsNew() || $this->lista_cliente->getIsChanged()) && !$this->lista_cliente->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->lista_cliente->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//lista_cliente_logic_add::updateRelacionesToSaveAfter($lista_cliente,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $lista_clientes,lista_cliente_param_return $lista_clienteParameterGeneral) : lista_cliente_param_return {
		$lista_clienteReturnGeneral=new lista_cliente_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $lista_clienteReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $lista_clientes,lista_cliente_param_return $lista_clienteParameterGeneral) : lista_cliente_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$lista_clienteReturnGeneral=new lista_cliente_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $lista_clienteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $lista_clientes,lista_cliente $lista_cliente,lista_cliente_param_return $lista_clienteParameterGeneral,bool $isEsNuevolista_cliente,array $clases) : lista_cliente_param_return {
		 try {	
			$lista_clienteReturnGeneral=new lista_cliente_param_return();
	
			$lista_clienteReturnGeneral->setlista_cliente($lista_cliente);
			$lista_clienteReturnGeneral->setlista_clientes($lista_clientes);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$lista_clienteReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $lista_clienteReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $lista_clientes,lista_cliente $lista_cliente,lista_cliente_param_return $lista_clienteParameterGeneral,bool $isEsNuevolista_cliente,array $clases) : lista_cliente_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$lista_clienteReturnGeneral=new lista_cliente_param_return();
	
			$lista_clienteReturnGeneral->setlista_cliente($lista_cliente);
			$lista_clienteReturnGeneral->setlista_clientes($lista_clientes);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$lista_clienteReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $lista_clienteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $lista_clientes,lista_cliente $lista_cliente,lista_cliente_param_return $lista_clienteParameterGeneral,bool $isEsNuevolista_cliente,array $clases) : lista_cliente_param_return {
		 try {	
			$lista_clienteReturnGeneral=new lista_cliente_param_return();
	
			$lista_clienteReturnGeneral->setlista_cliente($lista_cliente);
			$lista_clienteReturnGeneral->setlista_clientes($lista_clientes);
			
			
			
			return $lista_clienteReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $lista_clientes,lista_cliente $lista_cliente,lista_cliente_param_return $lista_clienteParameterGeneral,bool $isEsNuevolista_cliente,array $clases) : lista_cliente_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$lista_clienteReturnGeneral=new lista_cliente_param_return();
	
			$lista_clienteReturnGeneral->setlista_cliente($lista_cliente);
			$lista_clienteReturnGeneral->setlista_clientes($lista_clientes);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $lista_clienteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,lista_cliente $lista_cliente,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,lista_cliente $lista_cliente,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		lista_cliente_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(lista_cliente $lista_cliente,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//lista_cliente_logic_add::updatelista_clienteToGet($this->lista_cliente);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$lista_cliente->setcliente($this->lista_clienteDataAccess->getcliente($this->connexion,$lista_cliente));
		$lista_cliente->setproducto($this->lista_clienteDataAccess->getproducto($this->connexion,$lista_cliente));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$lista_cliente->setcliente($this->lista_clienteDataAccess->getcliente($this->connexion,$lista_cliente));
				continue;
			}

			if($clas->clas==producto::$class.'') {
				$lista_cliente->setproducto($this->lista_clienteDataAccess->getproducto($this->connexion,$lista_cliente));
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
			$lista_cliente->setcliente($this->lista_clienteDataAccess->getcliente($this->connexion,$lista_cliente));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_cliente->setproducto($this->lista_clienteDataAccess->getproducto($this->connexion,$lista_cliente));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$lista_cliente->setcliente($this->lista_clienteDataAccess->getcliente($this->connexion,$lista_cliente));
		$clienteLogic= new cliente_logic($this->connexion);
		$clienteLogic->deepLoad($lista_cliente->getcliente(),$isDeep,$deepLoadType,$clases);
				
		$lista_cliente->setproducto($this->lista_clienteDataAccess->getproducto($this->connexion,$lista_cliente));
		$productoLogic= new producto_logic($this->connexion);
		$productoLogic->deepLoad($lista_cliente->getproducto(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$lista_cliente->setcliente($this->lista_clienteDataAccess->getcliente($this->connexion,$lista_cliente));
				$clienteLogic= new cliente_logic($this->connexion);
				$clienteLogic->deepLoad($lista_cliente->getcliente(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==producto::$class.'') {
				$lista_cliente->setproducto($this->lista_clienteDataAccess->getproducto($this->connexion,$lista_cliente));
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepLoad($lista_cliente->getproducto(),$isDeep,$deepLoadType,$clases);				
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
			$lista_cliente->setcliente($this->lista_clienteDataAccess->getcliente($this->connexion,$lista_cliente));
			$clienteLogic= new cliente_logic($this->connexion);
			$clienteLogic->deepLoad($lista_cliente->getcliente(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_cliente->setproducto($this->lista_clienteDataAccess->getproducto($this->connexion,$lista_cliente));
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepLoad($lista_cliente->getproducto(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(lista_cliente $lista_cliente,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//lista_cliente_logic_add::updatelista_clienteToSave($this->lista_cliente);			
			
			if(!$paraDeleteCascade) {				
				lista_cliente_data::save($lista_cliente, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		cliente_data::save($lista_cliente->getcliente(),$this->connexion);
		producto_data::save($lista_cliente->getproducto(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				cliente_data::save($lista_cliente->getcliente(),$this->connexion);
				continue;
			}

			if($clas->clas==producto::$class.'') {
				producto_data::save($lista_cliente->getproducto(),$this->connexion);
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
			cliente_data::save($lista_cliente->getcliente(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			producto_data::save($lista_cliente->getproducto(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		cliente_data::save($lista_cliente->getcliente(),$this->connexion);
		$clienteLogic= new cliente_logic($this->connexion);
		$clienteLogic->deepSave($lista_cliente->getcliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		producto_data::save($lista_cliente->getproducto(),$this->connexion);
		$productoLogic= new producto_logic($this->connexion);
		$productoLogic->deepSave($lista_cliente->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				cliente_data::save($lista_cliente->getcliente(),$this->connexion);
				$clienteLogic= new cliente_logic($this->connexion);
				$clienteLogic->deepSave($lista_cliente->getcliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==producto::$class.'') {
				producto_data::save($lista_cliente->getproducto(),$this->connexion);
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepSave($lista_cliente->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
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
			cliente_data::save($lista_cliente->getcliente(),$this->connexion);
			$clienteLogic= new cliente_logic($this->connexion);
			$clienteLogic->deepSave($lista_cliente->getcliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			producto_data::save($lista_cliente->getproducto(),$this->connexion);
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepSave($lista_cliente->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				lista_cliente_data::save($lista_cliente, $this->connexion);
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
			
			$this->deepLoad($this->lista_cliente,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->lista_clientes as $lista_cliente) {
				$this->deepLoad($lista_cliente,$isDeep,$deepLoadType,$clases);
								
				lista_cliente_util::refrescarFKDescripciones($this->lista_clientes);
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
			
			foreach($this->lista_clientes as $lista_cliente) {
				$this->deepLoad($lista_cliente,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->lista_cliente,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->lista_clientes as $lista_cliente) {
				$this->deepSave($lista_cliente,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->lista_clientes as $lista_cliente) {
				$this->deepSave($lista_cliente,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(producto::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==cliente::$class) {
						$classes[]=new Classe(cliente::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==producto::$class) {
						$classes[]=new Classe(producto::$class);
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

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==producto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(producto::$class);
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
	
	
	
	
	
	
	
	public function getlista_cliente() : ?lista_cliente {	
		/*
		lista_cliente_logic_add::checklista_clienteToGet($this->lista_cliente,$this->datosCliente);
		lista_cliente_logic_add::updatelista_clienteToGet($this->lista_cliente);
		*/
			
		return $this->lista_cliente;
	}
		
	public function setlista_cliente(lista_cliente $newlista_cliente) {
		$this->lista_cliente = $newlista_cliente;
	}
	
	public function getlista_clientes() : array {		
		/*
		lista_cliente_logic_add::checklista_clienteToGets($this->lista_clientes,$this->datosCliente);
		
		foreach ($this->lista_clientes as $lista_clienteLocal ) {
			lista_cliente_logic_add::updatelista_clienteToGet($lista_clienteLocal);
		}
		*/
		
		return $this->lista_clientes;
	}
	
	public function setlista_clientes(array $newlista_clientes) {
		$this->lista_clientes = $newlista_clientes;
	}
	
	public function getlista_clienteDataAccess() : lista_cliente_data {
		return $this->lista_clienteDataAccess;
	}
	
	public function setlista_clienteDataAccess(lista_cliente_data $newlista_clienteDataAccess) {
		$this->lista_clienteDataAccess = $newlista_clienteDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        lista_cliente_carga::$CONTROLLER;;        
		
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
