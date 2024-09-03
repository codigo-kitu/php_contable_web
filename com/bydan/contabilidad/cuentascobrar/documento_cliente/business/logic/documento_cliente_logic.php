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

namespace com\bydan\contabilidad\cuentascobrar\documento_cliente\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\cuentascobrar\documento_cliente\util\documento_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\documento_cliente\util\documento_cliente_param_return;

use com\bydan\contabilidad\cuentascobrar\documento_cliente\presentation\session\documento_cliente_session;

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

use com\bydan\contabilidad\cuentascobrar\documento_cliente\util\documento_cliente_util;
use com\bydan\contabilidad\cuentascobrar\documento_cliente\business\entity\documento_cliente;
use com\bydan\contabilidad\cuentascobrar\documento_cliente\business\data\documento_cliente_data;

//FK


use com\bydan\contabilidad\cuentaspagar\documento_proveedor\business\entity\documento_proveedor;
use com\bydan\contabilidad\cuentaspagar\documento_proveedor\business\data\documento_proveedor_data;
use com\bydan\contabilidad\cuentaspagar\documento_proveedor\business\logic\documento_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\documento_proveedor\util\documento_proveedor_util;

use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\business\data\cliente_data;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;

//REL


//REL DETALLES




class documento_cliente_logic  extends GeneralEntityLogic implements documento_cliente_logicI {	
	/*GENERAL*/
	public documento_cliente_data $documento_clienteDataAccess;
	//public ?documento_cliente_logic_add $documento_clienteLogicAdditional=null;
	public ?documento_cliente $documento_cliente;
	public array $documento_clientes;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->documento_clienteDataAccess = new documento_cliente_data();			
			$this->documento_clientes = array();
			$this->documento_cliente = new documento_cliente();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->documento_clienteLogicAdditional = new documento_cliente_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->documento_clienteLogicAdditional==null) {
		//	$this->documento_clienteLogicAdditional=new documento_cliente_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->documento_clienteDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->documento_clienteDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->documento_clienteDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->documento_clienteDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->documento_clientes = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->documento_clientes=$this->documento_clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_cliente_util::refrescarFKDescripciones($this->documento_clientes);
			}
			
			//documento_cliente_logic_add::checkdocumento_clienteToGets($this->documento_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_clientes);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->documento_clientes = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->documento_clientes=$this->documento_clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_cliente_util::refrescarFKDescripciones($this->documento_clientes);
			}
			
			//documento_cliente_logic_add::checkdocumento_clienteToGets($this->documento_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_clientes);
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
		$this->documento_cliente = new documento_cliente();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->documento_cliente=$this->documento_clienteDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->documento_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				documento_cliente_util::refrescarFKDescripcion($this->documento_cliente);
			}
						
			//documento_cliente_logic_add::checkdocumento_clienteToGet($this->documento_cliente,$this->datosCliente);
			//documento_cliente_logic_add::updatedocumento_clienteToGet($this->documento_cliente);
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
		$this->documento_cliente = new  documento_cliente();
		  		  
        try {		
			$this->documento_cliente=$this->documento_clienteDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->documento_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				documento_cliente_util::refrescarFKDescripcion($this->documento_cliente);
			}
			
			//documento_cliente_logic_add::checkdocumento_clienteToGet($this->documento_cliente,$this->datosCliente);
			//documento_cliente_logic_add::updatedocumento_clienteToGet($this->documento_cliente);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?documento_cliente {
		$documento_clienteLogic = new  documento_cliente_logic();
		  		  
        try {		
			$documento_clienteLogic->setConnexion($connexion);			
			$documento_clienteLogic->getEntity($id);			
			return $documento_clienteLogic->getdocumento_cliente();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->documento_cliente = new  documento_cliente();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->documento_cliente=$this->documento_clienteDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->documento_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				documento_cliente_util::refrescarFKDescripcion($this->documento_cliente);
			}
			
			//documento_cliente_logic_add::checkdocumento_clienteToGet($this->documento_cliente,$this->datosCliente);
			//documento_cliente_logic_add::updatedocumento_clienteToGet($this->documento_cliente);
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
		$this->documento_cliente = new  documento_cliente();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->documento_cliente=$this->documento_clienteDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->documento_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				documento_cliente_util::refrescarFKDescripcion($this->documento_cliente);
			}
			
			//documento_cliente_logic_add::checkdocumento_clienteToGet($this->documento_cliente,$this->datosCliente);
			//documento_cliente_logic_add::updatedocumento_clienteToGet($this->documento_cliente);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?documento_cliente {
		$documento_clienteLogic = new  documento_cliente_logic();
		  		  
        try {		
			$documento_clienteLogic->setConnexion($connexion);			
			$documento_clienteLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $documento_clienteLogic->getdocumento_cliente();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->documento_clientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->documento_clientes=$this->documento_clienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_cliente_util::refrescarFKDescripciones($this->documento_clientes);
			}
			
			//documento_cliente_logic_add::checkdocumento_clienteToGets($this->documento_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_clientes);			
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
		$this->documento_clientes = array();
		  		  
        try {			
			$this->documento_clientes=$this->documento_clienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_cliente_util::refrescarFKDescripciones($this->documento_clientes);
			}
			
			//documento_cliente_logic_add::checkdocumento_clienteToGets($this->documento_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_clientes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->documento_clientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->documento_clientes=$this->documento_clienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_cliente_util::refrescarFKDescripciones($this->documento_clientes);
			}
			
			//documento_cliente_logic_add::checkdocumento_clienteToGets($this->documento_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_clientes);
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
		$this->documento_clientes = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->documento_clientes=$this->documento_clienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_cliente_util::refrescarFKDescripciones($this->documento_clientes);
			}
			
			//documento_cliente_logic_add::checkdocumento_clienteToGets($this->documento_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_clientes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$documento_clienteLogic = new  documento_cliente_logic();
		  		  
        try {		
			$documento_clienteLogic->setConnexion($connexion);			
			$documento_clienteLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $documento_clienteLogic->getdocumento_clientes();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->documento_clientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->documento_clientes=$this->documento_clienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_cliente_util::refrescarFKDescripciones($this->documento_clientes);
			}
			
			//documento_cliente_logic_add::checkdocumento_clienteToGets($this->documento_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_clientes);
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
		$this->documento_clientes = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->documento_clientes=$this->documento_clienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_cliente_util::refrescarFKDescripciones($this->documento_clientes);
			}
			
			//documento_cliente_logic_add::checkdocumento_clienteToGets($this->documento_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_clientes);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->documento_clientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->documento_clientes=$this->documento_clienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_cliente_util::refrescarFKDescripciones($this->documento_clientes);
			}
			
			//documento_cliente_logic_add::checkdocumento_clienteToGets($this->documento_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_clientes);
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
		$this->documento_clientes = array();
		  		  
        try {			
			$this->documento_clientes=$this->documento_clienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_cliente_util::refrescarFKDescripciones($this->documento_clientes);
			}	
			
			//documento_cliente_logic_add::checkdocumento_clienteToGets($this->documento_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_clientes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->documento_clientes = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->documento_clientes=$this->documento_clienteDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_cliente_util::refrescarFKDescripciones($this->documento_clientes);
			}
			
			//documento_cliente_logic_add::checkdocumento_clienteToGets($this->documento_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_clientes);
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
		$this->documento_clientes = array();
		  		  
        try {		
			$this->documento_clientes=$this->documento_clienteDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_cliente_util::refrescarFKDescripciones($this->documento_clientes);
			}
			
			//documento_cliente_logic_add::checkdocumento_clienteToGets($this->documento_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_clientes);

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
			$parameterSelectionGeneralid_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cliente,documento_cliente_util::$ID_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cliente);

			$this->documento_clientes=$this->documento_clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				documento_cliente_util::refrescarFKDescripciones($this->documento_clientes);
			}
			//documento_cliente_logic_add::checkdocumento_clienteToGets($this->documento_clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->documento_clientes);

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
			$parameterSelectionGeneralid_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cliente,documento_cliente_util::$ID_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cliente);

			$this->documento_clientes=$this->documento_clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				documento_cliente_util::refrescarFKDescripciones($this->documento_clientes);
			}
			//documento_cliente_logic_add::checkdocumento_clienteToGets($this->documento_clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->documento_clientes);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Iddocumento_proveedorWithConnection(string $strFinalQuery,Pagination $pagination,int $id_documento_proveedor) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_documento_proveedor= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_documento_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_documento_proveedor,documento_cliente_util::$ID_DOCUMENTO_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_documento_proveedor);

			$this->documento_clientes=$this->documento_clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				documento_cliente_util::refrescarFKDescripciones($this->documento_clientes);
			}
			//documento_cliente_logic_add::checkdocumento_clienteToGets($this->documento_clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->documento_clientes);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Iddocumento_proveedor(string $strFinalQuery,Pagination $pagination,int $id_documento_proveedor) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_documento_proveedor= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_documento_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_documento_proveedor,documento_cliente_util::$ID_DOCUMENTO_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_documento_proveedor);

			$this->documento_clientes=$this->documento_clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				documento_cliente_util::refrescarFKDescripciones($this->documento_clientes);
			}
			//documento_cliente_logic_add::checkdocumento_clienteToGets($this->documento_clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->documento_clientes);
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
						
			//documento_cliente_logic_add::checkdocumento_clienteToSave($this->documento_cliente,$this->datosCliente,$this->connexion);	       
			//documento_cliente_logic_add::updatedocumento_clienteToSave($this->documento_cliente);			
			documento_cliente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->documento_cliente,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->documento_clienteLogicAdditional->checkGeneralEntityToSave($this,$this->documento_cliente,$this->datosCliente,$this->connexion);
			
			
			documento_cliente_data::save($this->documento_cliente, $this->connexion);	    	       	 				
			//documento_cliente_logic_add::checkdocumento_clienteToSaveAfter($this->documento_cliente,$this->datosCliente,$this->connexion);			
			//$this->documento_clienteLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->documento_cliente,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->documento_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->documento_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				documento_cliente_util::refrescarFKDescripcion($this->documento_cliente);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->documento_cliente->getIsDeleted()) {
				$this->documento_cliente=null;
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
						
			/*documento_cliente_logic_add::checkdocumento_clienteToSave($this->documento_cliente,$this->datosCliente,$this->connexion);*/	        
			//documento_cliente_logic_add::updatedocumento_clienteToSave($this->documento_cliente);			
			//$this->documento_clienteLogicAdditional->checkGeneralEntityToSave($this,$this->documento_cliente,$this->datosCliente,$this->connexion);			
			documento_cliente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->documento_cliente,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			documento_cliente_data::save($this->documento_cliente, $this->connexion);	    	       	 						
			/*documento_cliente_logic_add::checkdocumento_clienteToSaveAfter($this->documento_cliente,$this->datosCliente,$this->connexion);*/			
			//$this->documento_clienteLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->documento_cliente,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->documento_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->documento_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				documento_cliente_util::refrescarFKDescripcion($this->documento_cliente);				
			}
			
			if($this->documento_cliente->getIsDeleted()) {
				$this->documento_cliente=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(documento_cliente $documento_cliente,Connexion $connexion)  {
		$documento_clienteLogic = new  documento_cliente_logic();		  		  
        try {		
			$documento_clienteLogic->setConnexion($connexion);			
			$documento_clienteLogic->setdocumento_cliente($documento_cliente);			
			$documento_clienteLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*documento_cliente_logic_add::checkdocumento_clienteToSaves($this->documento_clientes,$this->datosCliente,$this->connexion);*/	        	
			//$this->documento_clienteLogicAdditional->checkGeneralEntitiesToSaves($this,$this->documento_clientes,$this->datosCliente,$this->connexion);
			
	   		foreach($this->documento_clientes as $documento_clienteLocal) {				
								
				//documento_cliente_logic_add::updatedocumento_clienteToSave($documento_clienteLocal);	        	
				documento_cliente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$documento_clienteLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				documento_cliente_data::save($documento_clienteLocal, $this->connexion);				
			}
			
			/*documento_cliente_logic_add::checkdocumento_clienteToSavesAfter($this->documento_clientes,$this->datosCliente,$this->connexion);*/			
			//$this->documento_clienteLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->documento_clientes,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_cliente_util::refrescarFKDescripciones($this->documento_clientes);
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
			/*documento_cliente_logic_add::checkdocumento_clienteToSaves($this->documento_clientes,$this->datosCliente,$this->connexion);*/			
			//$this->documento_clienteLogicAdditional->checkGeneralEntitiesToSaves($this,$this->documento_clientes,$this->datosCliente,$this->connexion);
			
	   		foreach($this->documento_clientes as $documento_clienteLocal) {				
								
				//documento_cliente_logic_add::updatedocumento_clienteToSave($documento_clienteLocal);	        	
				documento_cliente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$documento_clienteLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				documento_cliente_data::save($documento_clienteLocal, $this->connexion);				
			}			
			
			/*documento_cliente_logic_add::checkdocumento_clienteToSavesAfter($this->documento_clientes,$this->datosCliente,$this->connexion);*/			
			//$this->documento_clienteLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->documento_clientes,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_cliente_util::refrescarFKDescripciones($this->documento_clientes);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $documento_clientes,Connexion $connexion)  {
		$documento_clienteLogic = new  documento_cliente_logic();
		  		  
        try {		
			$documento_clienteLogic->setConnexion($connexion);			
			$documento_clienteLogic->setdocumento_clientes($documento_clientes);			
			$documento_clienteLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$documento_clientesAux=array();
		
		foreach($this->documento_clientes as $documento_cliente) {
			if($documento_cliente->getIsDeleted()==false) {
				$documento_clientesAux[]=$documento_cliente;
			}
		}
		
		$this->documento_clientes=$documento_clientesAux;
	}
	
	public function updateToGetsAuxiliar(array &$documento_clientes) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->documento_clientes as $documento_cliente) {
				
				$documento_cliente->setid_documento_proveedor_Descripcion(documento_cliente_util::getdocumento_proveedorDescripcion($documento_cliente->getdocumento_proveedor()));
				$documento_cliente->setid_cliente_Descripcion(documento_cliente_util::getclienteDescripcion($documento_cliente->getcliente()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$documento_cliente_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$documento_cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$documento_cliente_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$documento_cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$documento_cliente_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$documento_clienteForeignKey=new documento_cliente_param_return();//documento_clienteForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_documento_proveedor',$strRecargarFkTipos,',')) {
				$this->cargarCombosdocumento_proveedorsFK($this->connexion,$strRecargarFkQuery,$documento_clienteForeignKey,$documento_cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cliente',$strRecargarFkTipos,',')) {
				$this->cargarCombosclientesFK($this->connexion,$strRecargarFkQuery,$documento_clienteForeignKey,$documento_cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_documento_proveedor',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosdocumento_proveedorsFK($this->connexion,' where id=-1 ',$documento_clienteForeignKey,$documento_cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cliente',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosclientesFK($this->connexion,' where id=-1 ',$documento_clienteForeignKey,$documento_cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $documento_clienteForeignKey;
			
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
	
	
	public function cargarCombosdocumento_proveedorsFK($connexion=null,$strRecargarFkQuery='',$documento_clienteForeignKey,$documento_cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$documento_proveedorLogic= new documento_proveedor_logic();
		$pagination= new Pagination();
		$documento_clienteForeignKey->documento_proveedorsFK=array();

		$documento_proveedorLogic->setConnexion($connexion);
		$documento_proveedorLogic->getdocumento_proveedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($documento_cliente_session==null) {
			$documento_cliente_session=new documento_cliente_session();
		}
		
		if($documento_cliente_session->bitBusquedaDesdeFKSesiondocumento_proveedor!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=documento_proveedor_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobaldocumento_proveedor=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaldocumento_proveedor=Funciones::GetFinalQueryAppend($finalQueryGlobaldocumento_proveedor, '');
				$finalQueryGlobaldocumento_proveedor.=documento_proveedor_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaldocumento_proveedor.$strRecargarFkQuery;		

				$documento_proveedorLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($documento_proveedorLogic->getdocumento_proveedors() as $documento_proveedorLocal ) {
				if($documento_clienteForeignKey->iddocumento_proveedorDefaultFK==0) {
					$documento_clienteForeignKey->iddocumento_proveedorDefaultFK=$documento_proveedorLocal->getId();
				}

				$documento_clienteForeignKey->documento_proveedorsFK[$documento_proveedorLocal->getId()]=documento_cliente_util::getdocumento_proveedorDescripcion($documento_proveedorLocal);
			}

		} else {

			if($documento_cliente_session->bigiddocumento_proveedorActual!=null && $documento_cliente_session->bigiddocumento_proveedorActual > 0) {
				$documento_proveedorLogic->getEntity($documento_cliente_session->bigiddocumento_proveedorActual);//WithConnection

				$documento_clienteForeignKey->documento_proveedorsFK[$documento_proveedorLogic->getdocumento_proveedor()->getId()]=documento_cliente_util::getdocumento_proveedorDescripcion($documento_proveedorLogic->getdocumento_proveedor());
				$documento_clienteForeignKey->iddocumento_proveedorDefaultFK=$documento_proveedorLogic->getdocumento_proveedor()->getId();
			}
		}
	}

	public function cargarCombosclientesFK($connexion=null,$strRecargarFkQuery='',$documento_clienteForeignKey,$documento_cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$clienteLogic= new cliente_logic();
		$pagination= new Pagination();
		$documento_clienteForeignKey->clientesFK=array();

		$clienteLogic->setConnexion($connexion);
		$clienteLogic->getclienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($documento_cliente_session==null) {
			$documento_cliente_session=new documento_cliente_session();
		}
		
		if($documento_cliente_session->bitBusquedaDesdeFKSesioncliente!=true) {
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
				if($documento_clienteForeignKey->idclienteDefaultFK==0) {
					$documento_clienteForeignKey->idclienteDefaultFK=$clienteLocal->getId();
				}

				$documento_clienteForeignKey->clientesFK[$clienteLocal->getId()]=documento_cliente_util::getclienteDescripcion($clienteLocal);
			}

		} else {

			if($documento_cliente_session->bigidclienteActual!=null && $documento_cliente_session->bigidclienteActual > 0) {
				$clienteLogic->getEntity($documento_cliente_session->bigidclienteActual);//WithConnection

				$documento_clienteForeignKey->clientesFK[$clienteLogic->getcliente()->getId()]=documento_cliente_util::getclienteDescripcion($clienteLogic->getcliente());
				$documento_clienteForeignKey->idclienteDefaultFK=$clienteLogic->getcliente()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($documento_cliente) {
		$this->saveRelacionesBase($documento_cliente,true);
	}

	public function saveRelaciones($documento_cliente) {
		$this->saveRelacionesBase($documento_cliente,false);
	}

	public function saveRelacionesBase($documento_cliente,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setdocumento_cliente($documento_cliente);

			if(true) {

				//documento_cliente_logic_add::updateRelacionesToSave($documento_cliente,$this);

				if(($this->documento_cliente->getIsNew() || $this->documento_cliente->getIsChanged()) && !$this->documento_cliente->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->documento_cliente->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//documento_cliente_logic_add::updateRelacionesToSaveAfter($documento_cliente,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $documento_clientes,documento_cliente_param_return $documento_clienteParameterGeneral) : documento_cliente_param_return {
		$documento_clienteReturnGeneral=new documento_cliente_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $documento_clienteReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $documento_clientes,documento_cliente_param_return $documento_clienteParameterGeneral) : documento_cliente_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$documento_clienteReturnGeneral=new documento_cliente_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $documento_clienteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $documento_clientes,documento_cliente $documento_cliente,documento_cliente_param_return $documento_clienteParameterGeneral,bool $isEsNuevodocumento_cliente,array $clases) : documento_cliente_param_return {
		 try {	
			$documento_clienteReturnGeneral=new documento_cliente_param_return();
	
			$documento_clienteReturnGeneral->setdocumento_cliente($documento_cliente);
			$documento_clienteReturnGeneral->setdocumento_clientes($documento_clientes);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$documento_clienteReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $documento_clienteReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $documento_clientes,documento_cliente $documento_cliente,documento_cliente_param_return $documento_clienteParameterGeneral,bool $isEsNuevodocumento_cliente,array $clases) : documento_cliente_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$documento_clienteReturnGeneral=new documento_cliente_param_return();
	
			$documento_clienteReturnGeneral->setdocumento_cliente($documento_cliente);
			$documento_clienteReturnGeneral->setdocumento_clientes($documento_clientes);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$documento_clienteReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $documento_clienteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $documento_clientes,documento_cliente $documento_cliente,documento_cliente_param_return $documento_clienteParameterGeneral,bool $isEsNuevodocumento_cliente,array $clases) : documento_cliente_param_return {
		 try {	
			$documento_clienteReturnGeneral=new documento_cliente_param_return();
	
			$documento_clienteReturnGeneral->setdocumento_cliente($documento_cliente);
			$documento_clienteReturnGeneral->setdocumento_clientes($documento_clientes);
			
			
			
			return $documento_clienteReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $documento_clientes,documento_cliente $documento_cliente,documento_cliente_param_return $documento_clienteParameterGeneral,bool $isEsNuevodocumento_cliente,array $clases) : documento_cliente_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$documento_clienteReturnGeneral=new documento_cliente_param_return();
	
			$documento_clienteReturnGeneral->setdocumento_cliente($documento_cliente);
			$documento_clienteReturnGeneral->setdocumento_clientes($documento_clientes);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $documento_clienteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,documento_cliente $documento_cliente,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,documento_cliente $documento_cliente,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		documento_cliente_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(documento_cliente $documento_cliente,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//documento_cliente_logic_add::updatedocumento_clienteToGet($this->documento_cliente);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$documento_cliente->setdocumento_proveedor($this->documento_clienteDataAccess->getdocumento_proveedor($this->connexion,$documento_cliente));
		$documento_cliente->setcliente($this->documento_clienteDataAccess->getcliente($this->connexion,$documento_cliente));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==documento_proveedor::$class.'') {
				$documento_cliente->setdocumento_proveedor($this->documento_clienteDataAccess->getdocumento_proveedor($this->connexion,$documento_cliente));
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				$documento_cliente->setcliente($this->documento_clienteDataAccess->getcliente($this->connexion,$documento_cliente));
				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==documento_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$documento_cliente->setdocumento_proveedor($this->documento_clienteDataAccess->getdocumento_proveedor($this->connexion,$documento_cliente));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$documento_cliente->setcliente($this->documento_clienteDataAccess->getcliente($this->connexion,$documento_cliente));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$documento_cliente->setdocumento_proveedor($this->documento_clienteDataAccess->getdocumento_proveedor($this->connexion,$documento_cliente));
		$documento_proveedorLogic= new documento_proveedor_logic($this->connexion);
		$documento_proveedorLogic->deepLoad($documento_cliente->getdocumento_proveedor(),$isDeep,$deepLoadType,$clases);
				
		$documento_cliente->setcliente($this->documento_clienteDataAccess->getcliente($this->connexion,$documento_cliente));
		$clienteLogic= new cliente_logic($this->connexion);
		$clienteLogic->deepLoad($documento_cliente->getcliente(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==documento_proveedor::$class.'') {
				$documento_cliente->setdocumento_proveedor($this->documento_clienteDataAccess->getdocumento_proveedor($this->connexion,$documento_cliente));
				$documento_proveedorLogic= new documento_proveedor_logic($this->connexion);
				$documento_proveedorLogic->deepLoad($documento_cliente->getdocumento_proveedor(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				$documento_cliente->setcliente($this->documento_clienteDataAccess->getcliente($this->connexion,$documento_cliente));
				$clienteLogic= new cliente_logic($this->connexion);
				$clienteLogic->deepLoad($documento_cliente->getcliente(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==documento_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$documento_cliente->setdocumento_proveedor($this->documento_clienteDataAccess->getdocumento_proveedor($this->connexion,$documento_cliente));
			$documento_proveedorLogic= new documento_proveedor_logic($this->connexion);
			$documento_proveedorLogic->deepLoad($documento_cliente->getdocumento_proveedor(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$documento_cliente->setcliente($this->documento_clienteDataAccess->getcliente($this->connexion,$documento_cliente));
			$clienteLogic= new cliente_logic($this->connexion);
			$clienteLogic->deepLoad($documento_cliente->getcliente(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(documento_cliente $documento_cliente,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//documento_cliente_logic_add::updatedocumento_clienteToSave($this->documento_cliente);			
			
			if(!$paraDeleteCascade) {				
				documento_cliente_data::save($documento_cliente, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		documento_proveedor_data::save($documento_cliente->getdocumento_proveedor(),$this->connexion);
		cliente_data::save($documento_cliente->getcliente(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==documento_proveedor::$class.'') {
				documento_proveedor_data::save($documento_cliente->getdocumento_proveedor(),$this->connexion);
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				cliente_data::save($documento_cliente->getcliente(),$this->connexion);
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==documento_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			documento_proveedor_data::save($documento_cliente->getdocumento_proveedor(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cliente_data::save($documento_cliente->getcliente(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		documento_proveedor_data::save($documento_cliente->getdocumento_proveedor(),$this->connexion);
		$documento_proveedorLogic= new documento_proveedor_logic($this->connexion);
		$documento_proveedorLogic->deepSave($documento_cliente->getdocumento_proveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cliente_data::save($documento_cliente->getcliente(),$this->connexion);
		$clienteLogic= new cliente_logic($this->connexion);
		$clienteLogic->deepSave($documento_cliente->getcliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==documento_proveedor::$class.'') {
				documento_proveedor_data::save($documento_cliente->getdocumento_proveedor(),$this->connexion);
				$documento_proveedorLogic= new documento_proveedor_logic($this->connexion);
				$documento_proveedorLogic->deepSave($documento_cliente->getdocumento_proveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				cliente_data::save($documento_cliente->getcliente(),$this->connexion);
				$clienteLogic= new cliente_logic($this->connexion);
				$clienteLogic->deepSave($documento_cliente->getcliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==documento_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			documento_proveedor_data::save($documento_cliente->getdocumento_proveedor(),$this->connexion);
			$documento_proveedorLogic= new documento_proveedor_logic($this->connexion);
			$documento_proveedorLogic->deepSave($documento_cliente->getdocumento_proveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cliente_data::save($documento_cliente->getcliente(),$this->connexion);
			$clienteLogic= new cliente_logic($this->connexion);
			$clienteLogic->deepSave($documento_cliente->getcliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				documento_cliente_data::save($documento_cliente, $this->connexion);
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
			
			$this->deepLoad($this->documento_cliente,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->documento_clientes as $documento_cliente) {
				$this->deepLoad($documento_cliente,$isDeep,$deepLoadType,$clases);
								
				documento_cliente_util::refrescarFKDescripciones($this->documento_clientes);
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
			
			foreach($this->documento_clientes as $documento_cliente) {
				$this->deepLoad($documento_cliente,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->documento_cliente,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->documento_clientes as $documento_cliente) {
				$this->deepSave($documento_cliente,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->documento_clientes as $documento_cliente) {
				$this->deepSave($documento_cliente,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(documento_proveedor::$class);
				$classes[]=new Classe(cliente::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==documento_proveedor::$class) {
						$classes[]=new Classe(documento_proveedor::$class);
					}
				}

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
					if($clas->clas==documento_proveedor::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(documento_proveedor::$class);
				}

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
	
	
	
	
	
	
	
	public function getdocumento_cliente() : ?documento_cliente {	
		/*
		documento_cliente_logic_add::checkdocumento_clienteToGet($this->documento_cliente,$this->datosCliente);
		documento_cliente_logic_add::updatedocumento_clienteToGet($this->documento_cliente);
		*/
			
		return $this->documento_cliente;
	}
		
	public function setdocumento_cliente(documento_cliente $newdocumento_cliente) {
		$this->documento_cliente = $newdocumento_cliente;
	}
	
	public function getdocumento_clientes() : array {		
		/*
		documento_cliente_logic_add::checkdocumento_clienteToGets($this->documento_clientes,$this->datosCliente);
		
		foreach ($this->documento_clientes as $documento_clienteLocal ) {
			documento_cliente_logic_add::updatedocumento_clienteToGet($documento_clienteLocal);
		}
		*/
		
		return $this->documento_clientes;
	}
	
	public function setdocumento_clientes(array $newdocumento_clientes) {
		$this->documento_clientes = $newdocumento_clientes;
	}
	
	public function getdocumento_clienteDataAccess() : documento_cliente_data {
		return $this->documento_clienteDataAccess;
	}
	
	public function setdocumento_clienteDataAccess(documento_cliente_data $newdocumento_clienteDataAccess) {
		$this->documento_clienteDataAccess = $newdocumento_clienteDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        documento_cliente_carga::$CONTROLLER;;        
		
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
