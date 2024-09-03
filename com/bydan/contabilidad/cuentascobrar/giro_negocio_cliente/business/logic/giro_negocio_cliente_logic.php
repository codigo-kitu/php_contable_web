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

namespace com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\util\giro_negocio_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\util\giro_negocio_cliente_param_return;


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

use com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\util\giro_negocio_cliente_util;
use com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\business\entity\giro_negocio_cliente;
use com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\business\data\giro_negocio_cliente_data;

//FK


//REL


use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\business\data\cliente_data;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;

//REL DETALLES




class giro_negocio_cliente_logic  extends GeneralEntityLogic implements giro_negocio_cliente_logicI {	
	/*GENERAL*/
	public giro_negocio_cliente_data $giro_negocio_clienteDataAccess;
	//public ?giro_negocio_cliente_logic_add $giro_negocio_clienteLogicAdditional=null;
	public ?giro_negocio_cliente $giro_negocio_cliente;
	public array $giro_negocio_clientes;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->giro_negocio_clienteDataAccess = new giro_negocio_cliente_data();			
			$this->giro_negocio_clientes = array();
			$this->giro_negocio_cliente = new giro_negocio_cliente();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->giro_negocio_clienteLogicAdditional = new giro_negocio_cliente_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->giro_negocio_clienteLogicAdditional==null) {
		//	$this->giro_negocio_clienteLogicAdditional=new giro_negocio_cliente_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->giro_negocio_clienteDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->giro_negocio_clienteDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->giro_negocio_clienteDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->giro_negocio_clienteDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->giro_negocio_clientes = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->giro_negocio_clientes=$this->giro_negocio_clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				giro_negocio_cliente_util::refrescarFKDescripciones($this->giro_negocio_clientes);
			}
			
			//giro_negocio_cliente_logic_add::checkgiro_negocio_clienteToGets($this->giro_negocio_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->giro_negocio_clientes);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->giro_negocio_clientes = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->giro_negocio_clientes=$this->giro_negocio_clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				giro_negocio_cliente_util::refrescarFKDescripciones($this->giro_negocio_clientes);
			}
			
			//giro_negocio_cliente_logic_add::checkgiro_negocio_clienteToGets($this->giro_negocio_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->giro_negocio_clientes);
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
		$this->giro_negocio_cliente = new giro_negocio_cliente();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->giro_negocio_cliente=$this->giro_negocio_clienteDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->giro_negocio_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				giro_negocio_cliente_util::refrescarFKDescripcion($this->giro_negocio_cliente);
			}
						
			//giro_negocio_cliente_logic_add::checkgiro_negocio_clienteToGet($this->giro_negocio_cliente,$this->datosCliente);
			//giro_negocio_cliente_logic_add::updategiro_negocio_clienteToGet($this->giro_negocio_cliente);
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
		$this->giro_negocio_cliente = new  giro_negocio_cliente();
		  		  
        try {		
			$this->giro_negocio_cliente=$this->giro_negocio_clienteDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->giro_negocio_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				giro_negocio_cliente_util::refrescarFKDescripcion($this->giro_negocio_cliente);
			}
			
			//giro_negocio_cliente_logic_add::checkgiro_negocio_clienteToGet($this->giro_negocio_cliente,$this->datosCliente);
			//giro_negocio_cliente_logic_add::updategiro_negocio_clienteToGet($this->giro_negocio_cliente);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?giro_negocio_cliente {
		$giro_negocio_clienteLogic = new  giro_negocio_cliente_logic();
		  		  
        try {		
			$giro_negocio_clienteLogic->setConnexion($connexion);			
			$giro_negocio_clienteLogic->getEntity($id);			
			return $giro_negocio_clienteLogic->getgiro_negocio_cliente();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->giro_negocio_cliente = new  giro_negocio_cliente();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->giro_negocio_cliente=$this->giro_negocio_clienteDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->giro_negocio_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				giro_negocio_cliente_util::refrescarFKDescripcion($this->giro_negocio_cliente);
			}
			
			//giro_negocio_cliente_logic_add::checkgiro_negocio_clienteToGet($this->giro_negocio_cliente,$this->datosCliente);
			//giro_negocio_cliente_logic_add::updategiro_negocio_clienteToGet($this->giro_negocio_cliente);
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
		$this->giro_negocio_cliente = new  giro_negocio_cliente();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->giro_negocio_cliente=$this->giro_negocio_clienteDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->giro_negocio_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				giro_negocio_cliente_util::refrescarFKDescripcion($this->giro_negocio_cliente);
			}
			
			//giro_negocio_cliente_logic_add::checkgiro_negocio_clienteToGet($this->giro_negocio_cliente,$this->datosCliente);
			//giro_negocio_cliente_logic_add::updategiro_negocio_clienteToGet($this->giro_negocio_cliente);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?giro_negocio_cliente {
		$giro_negocio_clienteLogic = new  giro_negocio_cliente_logic();
		  		  
        try {		
			$giro_negocio_clienteLogic->setConnexion($connexion);			
			$giro_negocio_clienteLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $giro_negocio_clienteLogic->getgiro_negocio_cliente();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->giro_negocio_clientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->giro_negocio_clientes=$this->giro_negocio_clienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				giro_negocio_cliente_util::refrescarFKDescripciones($this->giro_negocio_clientes);
			}
			
			//giro_negocio_cliente_logic_add::checkgiro_negocio_clienteToGets($this->giro_negocio_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->giro_negocio_clientes);			
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
		$this->giro_negocio_clientes = array();
		  		  
        try {			
			$this->giro_negocio_clientes=$this->giro_negocio_clienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				giro_negocio_cliente_util::refrescarFKDescripciones($this->giro_negocio_clientes);
			}
			
			//giro_negocio_cliente_logic_add::checkgiro_negocio_clienteToGets($this->giro_negocio_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->giro_negocio_clientes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->giro_negocio_clientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->giro_negocio_clientes=$this->giro_negocio_clienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				giro_negocio_cliente_util::refrescarFKDescripciones($this->giro_negocio_clientes);
			}
			
			//giro_negocio_cliente_logic_add::checkgiro_negocio_clienteToGets($this->giro_negocio_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->giro_negocio_clientes);
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
		$this->giro_negocio_clientes = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->giro_negocio_clientes=$this->giro_negocio_clienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				giro_negocio_cliente_util::refrescarFKDescripciones($this->giro_negocio_clientes);
			}
			
			//giro_negocio_cliente_logic_add::checkgiro_negocio_clienteToGets($this->giro_negocio_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->giro_negocio_clientes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$giro_negocio_clienteLogic = new  giro_negocio_cliente_logic();
		  		  
        try {		
			$giro_negocio_clienteLogic->setConnexion($connexion);			
			$giro_negocio_clienteLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $giro_negocio_clienteLogic->getgiro_negocio_clientes();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->giro_negocio_clientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->giro_negocio_clientes=$this->giro_negocio_clienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				giro_negocio_cliente_util::refrescarFKDescripciones($this->giro_negocio_clientes);
			}
			
			//giro_negocio_cliente_logic_add::checkgiro_negocio_clienteToGets($this->giro_negocio_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->giro_negocio_clientes);
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
		$this->giro_negocio_clientes = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->giro_negocio_clientes=$this->giro_negocio_clienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				giro_negocio_cliente_util::refrescarFKDescripciones($this->giro_negocio_clientes);
			}
			
			//giro_negocio_cliente_logic_add::checkgiro_negocio_clienteToGets($this->giro_negocio_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->giro_negocio_clientes);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->giro_negocio_clientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->giro_negocio_clientes=$this->giro_negocio_clienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				giro_negocio_cliente_util::refrescarFKDescripciones($this->giro_negocio_clientes);
			}
			
			//giro_negocio_cliente_logic_add::checkgiro_negocio_clienteToGets($this->giro_negocio_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->giro_negocio_clientes);
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
		$this->giro_negocio_clientes = array();
		  		  
        try {			
			$this->giro_negocio_clientes=$this->giro_negocio_clienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				giro_negocio_cliente_util::refrescarFKDescripciones($this->giro_negocio_clientes);
			}	
			
			//giro_negocio_cliente_logic_add::checkgiro_negocio_clienteToGets($this->giro_negocio_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->giro_negocio_clientes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->giro_negocio_clientes = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->giro_negocio_clientes=$this->giro_negocio_clienteDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				giro_negocio_cliente_util::refrescarFKDescripciones($this->giro_negocio_clientes);
			}
			
			//giro_negocio_cliente_logic_add::checkgiro_negocio_clienteToGets($this->giro_negocio_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->giro_negocio_clientes);
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
		$this->giro_negocio_clientes = array();
		  		  
        try {		
			$this->giro_negocio_clientes=$this->giro_negocio_clienteDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				giro_negocio_cliente_util::refrescarFKDescripciones($this->giro_negocio_clientes);
			}
			
			//giro_negocio_cliente_logic_add::checkgiro_negocio_clienteToGets($this->giro_negocio_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->giro_negocio_clientes);

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
						
			//giro_negocio_cliente_logic_add::checkgiro_negocio_clienteToSave($this->giro_negocio_cliente,$this->datosCliente,$this->connexion);	       
			//giro_negocio_cliente_logic_add::updategiro_negocio_clienteToSave($this->giro_negocio_cliente);			
			giro_negocio_cliente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->giro_negocio_cliente,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->giro_negocio_clienteLogicAdditional->checkGeneralEntityToSave($this,$this->giro_negocio_cliente,$this->datosCliente,$this->connexion);
			
			
			giro_negocio_cliente_data::save($this->giro_negocio_cliente, $this->connexion);	    	       	 				
			//giro_negocio_cliente_logic_add::checkgiro_negocio_clienteToSaveAfter($this->giro_negocio_cliente,$this->datosCliente,$this->connexion);			
			//$this->giro_negocio_clienteLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->giro_negocio_cliente,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->giro_negocio_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->giro_negocio_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				giro_negocio_cliente_util::refrescarFKDescripcion($this->giro_negocio_cliente);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->giro_negocio_cliente->getIsDeleted()) {
				$this->giro_negocio_cliente=null;
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
						
			/*giro_negocio_cliente_logic_add::checkgiro_negocio_clienteToSave($this->giro_negocio_cliente,$this->datosCliente,$this->connexion);*/	        
			//giro_negocio_cliente_logic_add::updategiro_negocio_clienteToSave($this->giro_negocio_cliente);			
			//$this->giro_negocio_clienteLogicAdditional->checkGeneralEntityToSave($this,$this->giro_negocio_cliente,$this->datosCliente,$this->connexion);			
			giro_negocio_cliente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->giro_negocio_cliente,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			giro_negocio_cliente_data::save($this->giro_negocio_cliente, $this->connexion);	    	       	 						
			/*giro_negocio_cliente_logic_add::checkgiro_negocio_clienteToSaveAfter($this->giro_negocio_cliente,$this->datosCliente,$this->connexion);*/			
			//$this->giro_negocio_clienteLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->giro_negocio_cliente,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->giro_negocio_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->giro_negocio_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				giro_negocio_cliente_util::refrescarFKDescripcion($this->giro_negocio_cliente);				
			}
			
			if($this->giro_negocio_cliente->getIsDeleted()) {
				$this->giro_negocio_cliente=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(giro_negocio_cliente $giro_negocio_cliente,Connexion $connexion)  {
		$giro_negocio_clienteLogic = new  giro_negocio_cliente_logic();		  		  
        try {		
			$giro_negocio_clienteLogic->setConnexion($connexion);			
			$giro_negocio_clienteLogic->setgiro_negocio_cliente($giro_negocio_cliente);			
			$giro_negocio_clienteLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*giro_negocio_cliente_logic_add::checkgiro_negocio_clienteToSaves($this->giro_negocio_clientes,$this->datosCliente,$this->connexion);*/	        	
			//$this->giro_negocio_clienteLogicAdditional->checkGeneralEntitiesToSaves($this,$this->giro_negocio_clientes,$this->datosCliente,$this->connexion);
			
	   		foreach($this->giro_negocio_clientes as $giro_negocio_clienteLocal) {				
								
				//giro_negocio_cliente_logic_add::updategiro_negocio_clienteToSave($giro_negocio_clienteLocal);	        	
				giro_negocio_cliente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$giro_negocio_clienteLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				giro_negocio_cliente_data::save($giro_negocio_clienteLocal, $this->connexion);				
			}
			
			/*giro_negocio_cliente_logic_add::checkgiro_negocio_clienteToSavesAfter($this->giro_negocio_clientes,$this->datosCliente,$this->connexion);*/			
			//$this->giro_negocio_clienteLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->giro_negocio_clientes,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				giro_negocio_cliente_util::refrescarFKDescripciones($this->giro_negocio_clientes);
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
			/*giro_negocio_cliente_logic_add::checkgiro_negocio_clienteToSaves($this->giro_negocio_clientes,$this->datosCliente,$this->connexion);*/			
			//$this->giro_negocio_clienteLogicAdditional->checkGeneralEntitiesToSaves($this,$this->giro_negocio_clientes,$this->datosCliente,$this->connexion);
			
	   		foreach($this->giro_negocio_clientes as $giro_negocio_clienteLocal) {				
								
				//giro_negocio_cliente_logic_add::updategiro_negocio_clienteToSave($giro_negocio_clienteLocal);	        	
				giro_negocio_cliente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$giro_negocio_clienteLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				giro_negocio_cliente_data::save($giro_negocio_clienteLocal, $this->connexion);				
			}			
			
			/*giro_negocio_cliente_logic_add::checkgiro_negocio_clienteToSavesAfter($this->giro_negocio_clientes,$this->datosCliente,$this->connexion);*/			
			//$this->giro_negocio_clienteLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->giro_negocio_clientes,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				giro_negocio_cliente_util::refrescarFKDescripciones($this->giro_negocio_clientes);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $giro_negocio_clientes,Connexion $connexion)  {
		$giro_negocio_clienteLogic = new  giro_negocio_cliente_logic();
		  		  
        try {		
			$giro_negocio_clienteLogic->setConnexion($connexion);			
			$giro_negocio_clienteLogic->setgiro_negocio_clientes($giro_negocio_clientes);			
			$giro_negocio_clienteLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$giro_negocio_clientesAux=array();
		
		foreach($this->giro_negocio_clientes as $giro_negocio_cliente) {
			if($giro_negocio_cliente->getIsDeleted()==false) {
				$giro_negocio_clientesAux[]=$giro_negocio_cliente;
			}
		}
		
		$this->giro_negocio_clientes=$giro_negocio_clientesAux;
	}
	
	public function updateToGetsAuxiliar(array &$giro_negocio_clientes) {
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
	
	
	
	public function saveRelacionesWithConnection($giro_negocio_cliente,$clientes) {
		$this->saveRelacionesBase($giro_negocio_cliente,$clientes,true);
	}

	public function saveRelaciones($giro_negocio_cliente,$clientes) {
		$this->saveRelacionesBase($giro_negocio_cliente,$clientes,false);
	}

	public function saveRelacionesBase($giro_negocio_cliente,$clientes=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$giro_negocio_cliente->setclientes($clientes);
			$this->setgiro_negocio_cliente($giro_negocio_cliente);

			if(true) {

				//giro_negocio_cliente_logic_add::updateRelacionesToSave($giro_negocio_cliente,$this);

				if(($this->giro_negocio_cliente->getIsNew() || $this->giro_negocio_cliente->getIsChanged()) && !$this->giro_negocio_cliente->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($clientes);

				} else if($this->giro_negocio_cliente->getIsDeleted()) {
					$this->saveRelacionesDetalles($clientes);
					$this->save();
				}

				//giro_negocio_cliente_logic_add::updateRelacionesToSaveAfter($giro_negocio_cliente,$this);

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
	
	
	public function saveRelacionesDetalles($clientes=array()) {
		try {
	

			$idgiro_negocio_clienteActual=$this->getgiro_negocio_cliente()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/cliente_carga.php');
			cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$clienteLogic_Desde_giro_negocio_cliente=new cliente_logic();
			$clienteLogic_Desde_giro_negocio_cliente->setclientes($clientes);

			$clienteLogic_Desde_giro_negocio_cliente->setConnexion($this->getConnexion());
			$clienteLogic_Desde_giro_negocio_cliente->setDatosCliente($this->datosCliente);

			foreach($clienteLogic_Desde_giro_negocio_cliente->getclientes() as $cliente_Desde_giro_negocio_cliente) {
				$cliente_Desde_giro_negocio_cliente->setid_giro_negocio_cliente($idgiro_negocio_clienteActual);

				$clienteLogic_Desde_giro_negocio_cliente->setcliente($cliente_Desde_giro_negocio_cliente);
				$clienteLogic_Desde_giro_negocio_cliente->save();
			}


		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
	public function deleteCascade()  {
		/*NO-GENERATED*/
	}
	
	public function deleteCascadeWithConnection()  {
		/*NO GENERATED*/
	}
	
	public function deleteCascades()  {	
		/*NO GENERATED*/
	}
	
	public function deleteCascadesWithConnection()  {
		/*NO GENERATED*/
	}
	
	/*PROCESAR ACCIONES*/
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $giro_negocio_clientes,giro_negocio_cliente_param_return $giro_negocio_clienteParameterGeneral) : giro_negocio_cliente_param_return {
		$giro_negocio_clienteReturnGeneral=new giro_negocio_cliente_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $giro_negocio_clienteReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $giro_negocio_clientes,giro_negocio_cliente_param_return $giro_negocio_clienteParameterGeneral) : giro_negocio_cliente_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$giro_negocio_clienteReturnGeneral=new giro_negocio_cliente_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $giro_negocio_clienteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $giro_negocio_clientes,giro_negocio_cliente $giro_negocio_cliente,giro_negocio_cliente_param_return $giro_negocio_clienteParameterGeneral,bool $isEsNuevogiro_negocio_cliente,array $clases) : giro_negocio_cliente_param_return {
		 try {	
			$giro_negocio_clienteReturnGeneral=new giro_negocio_cliente_param_return();
	
			$giro_negocio_clienteReturnGeneral->setgiro_negocio_cliente($giro_negocio_cliente);
			$giro_negocio_clienteReturnGeneral->setgiro_negocio_clientes($giro_negocio_clientes);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$giro_negocio_clienteReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $giro_negocio_clienteReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $giro_negocio_clientes,giro_negocio_cliente $giro_negocio_cliente,giro_negocio_cliente_param_return $giro_negocio_clienteParameterGeneral,bool $isEsNuevogiro_negocio_cliente,array $clases) : giro_negocio_cliente_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$giro_negocio_clienteReturnGeneral=new giro_negocio_cliente_param_return();
	
			$giro_negocio_clienteReturnGeneral->setgiro_negocio_cliente($giro_negocio_cliente);
			$giro_negocio_clienteReturnGeneral->setgiro_negocio_clientes($giro_negocio_clientes);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$giro_negocio_clienteReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $giro_negocio_clienteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $giro_negocio_clientes,giro_negocio_cliente $giro_negocio_cliente,giro_negocio_cliente_param_return $giro_negocio_clienteParameterGeneral,bool $isEsNuevogiro_negocio_cliente,array $clases) : giro_negocio_cliente_param_return {
		 try {	
			$giro_negocio_clienteReturnGeneral=new giro_negocio_cliente_param_return();
	
			$giro_negocio_clienteReturnGeneral->setgiro_negocio_cliente($giro_negocio_cliente);
			$giro_negocio_clienteReturnGeneral->setgiro_negocio_clientes($giro_negocio_clientes);
			
			
			
			return $giro_negocio_clienteReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $giro_negocio_clientes,giro_negocio_cliente $giro_negocio_cliente,giro_negocio_cliente_param_return $giro_negocio_clienteParameterGeneral,bool $isEsNuevogiro_negocio_cliente,array $clases) : giro_negocio_cliente_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$giro_negocio_clienteReturnGeneral=new giro_negocio_cliente_param_return();
	
			$giro_negocio_clienteReturnGeneral->setgiro_negocio_cliente($giro_negocio_cliente);
			$giro_negocio_clienteReturnGeneral->setgiro_negocio_clientes($giro_negocio_clientes);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $giro_negocio_clienteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,giro_negocio_cliente $giro_negocio_cliente,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,giro_negocio_cliente $giro_negocio_cliente,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		giro_negocio_cliente_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(giro_negocio_cliente $giro_negocio_cliente,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//giro_negocio_cliente_logic_add::updategiro_negocio_clienteToGet($this->giro_negocio_cliente);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$giro_negocio_cliente->setclientes($this->giro_negocio_clienteDataAccess->getclientes($this->connexion,$giro_negocio_cliente));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$giro_negocio_cliente->setclientes($this->giro_negocio_clienteDataAccess->getclientes($this->connexion,$giro_negocio_cliente));

				if($this->isConDeep) {
					$clienteLogic= new cliente_logic($this->connexion);
					$clienteLogic->setclientes($giro_negocio_cliente->getclientes());
					$classesLocal=cliente_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$clienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					cliente_util::refrescarFKDescripciones($clienteLogic->getclientes());
					$giro_negocio_cliente->setclientes($clienteLogic->getclientes());
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cliente::$class);
			$giro_negocio_cliente->setclientes($this->giro_negocio_clienteDataAccess->getclientes($this->connexion,$giro_negocio_cliente));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {


		$giro_negocio_cliente->setclientes($this->giro_negocio_clienteDataAccess->getclientes($this->connexion,$giro_negocio_cliente));

		foreach($giro_negocio_cliente->getclientes() as $cliente) {
			$clienteLogic= new cliente_logic($this->connexion);
			$clienteLogic->deepLoad($cliente,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$giro_negocio_cliente->setclientes($this->giro_negocio_clienteDataAccess->getclientes($this->connexion,$giro_negocio_cliente));

				foreach($giro_negocio_cliente->getclientes() as $cliente) {
					$clienteLogic= new cliente_logic($this->connexion);
					$clienteLogic->deepLoad($cliente,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cliente::$class);
			$giro_negocio_cliente->setclientes($this->giro_negocio_clienteDataAccess->getclientes($this->connexion,$giro_negocio_cliente));

			foreach($giro_negocio_cliente->getclientes() as $cliente) {
				$clienteLogic= new cliente_logic($this->connexion);
				$clienteLogic->deepLoad($cliente,$isDeep,$deepLoadType,$clases);
			}
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(giro_negocio_cliente $giro_negocio_cliente,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//giro_negocio_cliente_logic_add::updategiro_negocio_clienteToSave($this->giro_negocio_cliente);			
			
			if(!$paraDeleteCascade) {				
				giro_negocio_cliente_data::save($giro_negocio_cliente, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($giro_negocio_cliente->getclientes() as $cliente) {
			$cliente->setid_giro_negocio_cliente($giro_negocio_cliente->getId());
			cliente_data::save($cliente,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($giro_negocio_cliente->getclientes() as $cliente) {
					$cliente->setid_giro_negocio_cliente($giro_negocio_cliente->getId());
					cliente_data::save($cliente,$this->connexion);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cliente::$class);

			foreach($giro_negocio_cliente->getclientes() as $cliente) {
				$cliente->setid_giro_negocio_cliente($giro_negocio_cliente->getId());
				cliente_data::save($cliente,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($giro_negocio_cliente->getclientes() as $cliente) {
			$clienteLogic= new cliente_logic($this->connexion);
			$cliente->setid_giro_negocio_cliente($giro_negocio_cliente->getId());
			cliente_data::save($cliente,$this->connexion);
			$clienteLogic->deepSave($cliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($giro_negocio_cliente->getclientes() as $cliente) {
					$clienteLogic= new cliente_logic($this->connexion);
					$cliente->setid_giro_negocio_cliente($giro_negocio_cliente->getId());
					cliente_data::save($cliente,$this->connexion);
					$clienteLogic->deepSave($cliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {



		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cliente::$class);

			foreach($giro_negocio_cliente->getclientes() as $cliente) {
				$clienteLogic= new cliente_logic($this->connexion);
				$cliente->setid_giro_negocio_cliente($giro_negocio_cliente->getId());
				cliente_data::save($cliente,$this->connexion);
				$clienteLogic->deepSave($cliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				giro_negocio_cliente_data::save($giro_negocio_cliente, $this->connexion);
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
			
			$this->deepLoad($this->giro_negocio_cliente,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->giro_negocio_clientes as $giro_negocio_cliente) {
				$this->deepLoad($giro_negocio_cliente,$isDeep,$deepLoadType,$clases);
								
				giro_negocio_cliente_util::refrescarFKDescripciones($this->giro_negocio_clientes);
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
			
			foreach($this->giro_negocio_clientes as $giro_negocio_cliente) {
				$this->deepLoad($giro_negocio_cliente,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->giro_negocio_cliente,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->giro_negocio_clientes as $giro_negocio_cliente) {
				$this->deepSave($giro_negocio_cliente,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->giro_negocio_clientes as $giro_negocio_cliente) {
				$this->deepSave($giro_negocio_cliente,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(cliente::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==cliente::$class) {
						$classes[]=new Classe(cliente::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
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
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getgiro_negocio_cliente() : ?giro_negocio_cliente {	
		/*
		giro_negocio_cliente_logic_add::checkgiro_negocio_clienteToGet($this->giro_negocio_cliente,$this->datosCliente);
		giro_negocio_cliente_logic_add::updategiro_negocio_clienteToGet($this->giro_negocio_cliente);
		*/
			
		return $this->giro_negocio_cliente;
	}
		
	public function setgiro_negocio_cliente(giro_negocio_cliente $newgiro_negocio_cliente) {
		$this->giro_negocio_cliente = $newgiro_negocio_cliente;
	}
	
	public function getgiro_negocio_clientes() : array {		
		/*
		giro_negocio_cliente_logic_add::checkgiro_negocio_clienteToGets($this->giro_negocio_clientes,$this->datosCliente);
		
		foreach ($this->giro_negocio_clientes as $giro_negocio_clienteLocal ) {
			giro_negocio_cliente_logic_add::updategiro_negocio_clienteToGet($giro_negocio_clienteLocal);
		}
		*/
		
		return $this->giro_negocio_clientes;
	}
	
	public function setgiro_negocio_clientes(array $newgiro_negocio_clientes) {
		$this->giro_negocio_clientes = $newgiro_negocio_clientes;
	}
	
	public function getgiro_negocio_clienteDataAccess() : giro_negocio_cliente_data {
		return $this->giro_negocio_clienteDataAccess;
	}
	
	public function setgiro_negocio_clienteDataAccess(giro_negocio_cliente_data $newgiro_negocio_clienteDataAccess) {
		$this->giro_negocio_clienteDataAccess = $newgiro_negocio_clienteDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        giro_negocio_cliente_carga::$CONTROLLER;;        
		
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
