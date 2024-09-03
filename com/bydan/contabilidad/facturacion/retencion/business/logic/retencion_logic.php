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

namespace com\bydan\contabilidad\facturacion\retencion\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\facturacion\retencion\util\retencion_carga;
use com\bydan\contabilidad\facturacion\retencion\util\retencion_param_return;

use com\bydan\contabilidad\facturacion\retencion\presentation\session\retencion_session;

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

use com\bydan\contabilidad\facturacion\retencion\util\retencion_util;
use com\bydan\contabilidad\facturacion\retencion\business\entity\retencion;
use com\bydan\contabilidad\facturacion\retencion\business\data\retencion_data;

//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\data\cuenta_data;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

//REL


use com\bydan\contabilidad\inventario\lista_producto\business\entity\lista_producto;
use com\bydan\contabilidad\inventario\lista_producto\business\data\lista_producto_data;
use com\bydan\contabilidad\inventario\lista_producto\business\logic\lista_producto_logic;
use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_carga;
use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_util;

use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\business\data\producto_data;
use com\bydan\contabilidad\inventario\producto\business\logic\producto_logic;
use com\bydan\contabilidad\inventario\producto\util\producto_carga;
use com\bydan\contabilidad\inventario\producto\util\producto_util;

use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\business\data\cliente_data;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\data\proveedor_data;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

//REL DETALLES




class retencion_logic  extends GeneralEntityLogic implements retencion_logicI {	
	/*GENERAL*/
	public retencion_data $retencionDataAccess;
	//public ?retencion_logic_add $retencionLogicAdditional=null;
	public ?retencion $retencion;
	public array $retencions;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->retencionDataAccess = new retencion_data();			
			$this->retencions = array();
			$this->retencion = new retencion();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->retencionLogicAdditional = new retencion_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->retencionLogicAdditional==null) {
		//	$this->retencionLogicAdditional=new retencion_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->retencionDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->retencionDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->retencionDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->retencionDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->retencions = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->retencions=$this->retencionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				retencion_util::refrescarFKDescripciones($this->retencions);
			}
			
			//retencion_logic_add::checkretencionToGets($this->retencions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->retencions);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->retencions = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->retencions=$this->retencionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				retencion_util::refrescarFKDescripciones($this->retencions);
			}
			
			//retencion_logic_add::checkretencionToGets($this->retencions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->retencions);
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
		$this->retencion = new retencion();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->retencion=$this->retencionDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->retencion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				retencion_util::refrescarFKDescripcion($this->retencion);
			}
						
			//retencion_logic_add::checkretencionToGet($this->retencion,$this->datosCliente);
			//retencion_logic_add::updateretencionToGet($this->retencion);
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
		$this->retencion = new  retencion();
		  		  
        try {		
			$this->retencion=$this->retencionDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->retencion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				retencion_util::refrescarFKDescripcion($this->retencion);
			}
			
			//retencion_logic_add::checkretencionToGet($this->retencion,$this->datosCliente);
			//retencion_logic_add::updateretencionToGet($this->retencion);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?retencion {
		$retencionLogic = new  retencion_logic();
		  		  
        try {		
			$retencionLogic->setConnexion($connexion);			
			$retencionLogic->getEntity($id);			
			return $retencionLogic->getretencion();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->retencion = new  retencion();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->retencion=$this->retencionDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->retencion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				retencion_util::refrescarFKDescripcion($this->retencion);
			}
			
			//retencion_logic_add::checkretencionToGet($this->retencion,$this->datosCliente);
			//retencion_logic_add::updateretencionToGet($this->retencion);
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
		$this->retencion = new  retencion();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->retencion=$this->retencionDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->retencion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				retencion_util::refrescarFKDescripcion($this->retencion);
			}
			
			//retencion_logic_add::checkretencionToGet($this->retencion,$this->datosCliente);
			//retencion_logic_add::updateretencionToGet($this->retencion);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?retencion {
		$retencionLogic = new  retencion_logic();
		  		  
        try {		
			$retencionLogic->setConnexion($connexion);			
			$retencionLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $retencionLogic->getretencion();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->retencions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->retencions=$this->retencionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				retencion_util::refrescarFKDescripciones($this->retencions);
			}
			
			//retencion_logic_add::checkretencionToGets($this->retencions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->retencions);			
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
		$this->retencions = array();
		  		  
        try {			
			$this->retencions=$this->retencionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				retencion_util::refrescarFKDescripciones($this->retencions);
			}
			
			//retencion_logic_add::checkretencionToGets($this->retencions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->retencions);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->retencions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->retencions=$this->retencionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				retencion_util::refrescarFKDescripciones($this->retencions);
			}
			
			//retencion_logic_add::checkretencionToGets($this->retencions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->retencions);
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
		$this->retencions = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->retencions=$this->retencionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				retencion_util::refrescarFKDescripciones($this->retencions);
			}
			
			//retencion_logic_add::checkretencionToGets($this->retencions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->retencions);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$retencionLogic = new  retencion_logic();
		  		  
        try {		
			$retencionLogic->setConnexion($connexion);			
			$retencionLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $retencionLogic->getretencions();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->retencions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->retencions=$this->retencionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				retencion_util::refrescarFKDescripciones($this->retencions);
			}
			
			//retencion_logic_add::checkretencionToGets($this->retencions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->retencions);
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
		$this->retencions = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->retencions=$this->retencionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				retencion_util::refrescarFKDescripciones($this->retencions);
			}
			
			//retencion_logic_add::checkretencionToGets($this->retencions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->retencions);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->retencions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->retencions=$this->retencionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				retencion_util::refrescarFKDescripciones($this->retencions);
			}
			
			//retencion_logic_add::checkretencionToGets($this->retencions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->retencions);
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
		$this->retencions = array();
		  		  
        try {			
			$this->retencions=$this->retencionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				retencion_util::refrescarFKDescripciones($this->retencions);
			}	
			
			//retencion_logic_add::checkretencionToGets($this->retencions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->retencions);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->retencions = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->retencions=$this->retencionDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				retencion_util::refrescarFKDescripciones($this->retencions);
			}
			
			//retencion_logic_add::checkretencionToGets($this->retencions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->retencions);
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
		$this->retencions = array();
		  		  
        try {		
			$this->retencions=$this->retencionDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				retencion_util::refrescarFKDescripciones($this->retencions);
			}
			
			//retencion_logic_add::checkretencionToGets($this->retencions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->retencions);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_Idcuenta_comprasWithConnection(string $strFinalQuery,Pagination $pagination,?int $id_cuenta_compras) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_compras= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_compras->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_compras,retencion_util::$ID_CUENTA_COMPRAS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_compras);

			$this->retencions=$this->retencionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				retencion_util::refrescarFKDescripciones($this->retencions);
			}
			//retencion_logic_add::checkretencionToGets($this->retencions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->retencions);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcuenta_compras(string $strFinalQuery,Pagination $pagination,?int $id_cuenta_compras) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_compras= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_compras->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_compras,retencion_util::$ID_CUENTA_COMPRAS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_compras);

			$this->retencions=$this->retencionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				retencion_util::refrescarFKDescripciones($this->retencions);
			}
			//retencion_logic_add::checkretencionToGets($this->retencions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->retencions);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idcuenta_ventasWithConnection(string $strFinalQuery,Pagination $pagination,?int $id_cuenta_ventas) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_ventas= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_ventas->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_ventas,retencion_util::$ID_CUENTA_VENTAS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_ventas);

			$this->retencions=$this->retencionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				retencion_util::refrescarFKDescripciones($this->retencions);
			}
			//retencion_logic_add::checkretencionToGets($this->retencions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->retencions);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcuenta_ventas(string $strFinalQuery,Pagination $pagination,?int $id_cuenta_ventas) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_ventas= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_ventas->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_ventas,retencion_util::$ID_CUENTA_VENTAS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_ventas);

			$this->retencions=$this->retencionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				retencion_util::refrescarFKDescripciones($this->retencions);
			}
			//retencion_logic_add::checkretencionToGets($this->retencions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->retencions);
		} catch(Exception $e) {
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,retencion_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->retencions=$this->retencionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				retencion_util::refrescarFKDescripciones($this->retencions);
			}
			//retencion_logic_add::checkretencionToGets($this->retencions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->retencions);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,retencion_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->retencions=$this->retencionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				retencion_util::refrescarFKDescripciones($this->retencions);
			}
			//retencion_logic_add::checkretencionToGets($this->retencions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->retencions);
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
						
			//retencion_logic_add::checkretencionToSave($this->retencion,$this->datosCliente,$this->connexion);	       
			//retencion_logic_add::updateretencionToSave($this->retencion);			
			retencion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->retencion,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->retencionLogicAdditional->checkGeneralEntityToSave($this,$this->retencion,$this->datosCliente,$this->connexion);
			
			
			retencion_data::save($this->retencion, $this->connexion);	    	       	 				
			//retencion_logic_add::checkretencionToSaveAfter($this->retencion,$this->datosCliente,$this->connexion);			
			//$this->retencionLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->retencion,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->retencion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->retencion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				retencion_util::refrescarFKDescripcion($this->retencion);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->retencion->getIsDeleted()) {
				$this->retencion=null;
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
						
			/*retencion_logic_add::checkretencionToSave($this->retencion,$this->datosCliente,$this->connexion);*/	        
			//retencion_logic_add::updateretencionToSave($this->retencion);			
			//$this->retencionLogicAdditional->checkGeneralEntityToSave($this,$this->retencion,$this->datosCliente,$this->connexion);			
			retencion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->retencion,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			retencion_data::save($this->retencion, $this->connexion);	    	       	 						
			/*retencion_logic_add::checkretencionToSaveAfter($this->retencion,$this->datosCliente,$this->connexion);*/			
			//$this->retencionLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->retencion,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->retencion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->retencion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				retencion_util::refrescarFKDescripcion($this->retencion);				
			}
			
			if($this->retencion->getIsDeleted()) {
				$this->retencion=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(retencion $retencion,Connexion $connexion)  {
		$retencionLogic = new  retencion_logic();		  		  
        try {		
			$retencionLogic->setConnexion($connexion);			
			$retencionLogic->setretencion($retencion);			
			$retencionLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*retencion_logic_add::checkretencionToSaves($this->retencions,$this->datosCliente,$this->connexion);*/	        	
			//$this->retencionLogicAdditional->checkGeneralEntitiesToSaves($this,$this->retencions,$this->datosCliente,$this->connexion);
			
	   		foreach($this->retencions as $retencionLocal) {				
								
				//retencion_logic_add::updateretencionToSave($retencionLocal);	        	
				retencion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$retencionLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				retencion_data::save($retencionLocal, $this->connexion);				
			}
			
			/*retencion_logic_add::checkretencionToSavesAfter($this->retencions,$this->datosCliente,$this->connexion);*/			
			//$this->retencionLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->retencions,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				retencion_util::refrescarFKDescripciones($this->retencions);
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
			/*retencion_logic_add::checkretencionToSaves($this->retencions,$this->datosCliente,$this->connexion);*/			
			//$this->retencionLogicAdditional->checkGeneralEntitiesToSaves($this,$this->retencions,$this->datosCliente,$this->connexion);
			
	   		foreach($this->retencions as $retencionLocal) {				
								
				//retencion_logic_add::updateretencionToSave($retencionLocal);	        	
				retencion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$retencionLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				retencion_data::save($retencionLocal, $this->connexion);				
			}			
			
			/*retencion_logic_add::checkretencionToSavesAfter($this->retencions,$this->datosCliente,$this->connexion);*/			
			//$this->retencionLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->retencions,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				retencion_util::refrescarFKDescripciones($this->retencions);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $retencions,Connexion $connexion)  {
		$retencionLogic = new  retencion_logic();
		  		  
        try {		
			$retencionLogic->setConnexion($connexion);			
			$retencionLogic->setretencions($retencions);			
			$retencionLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$retencionsAux=array();
		
		foreach($this->retencions as $retencion) {
			if($retencion->getIsDeleted()==false) {
				$retencionsAux[]=$retencion;
			}
		}
		
		$this->retencions=$retencionsAux;
	}
	
	public function updateToGetsAuxiliar(array &$retencions) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->retencions as $retencion) {
				
				$retencion->setid_empresa_Descripcion(retencion_util::getempresaDescripcion($retencion->getempresa()));
				$retencion->setid_cuenta_ventas_Descripcion(retencion_util::getcuenta_ventasDescripcion($retencion->getcuenta_ventas()));
				$retencion->setid_cuenta_compras_Descripcion(retencion_util::getcuenta_comprasDescripcion($retencion->getcuenta_compras()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$retencion_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$retencion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$retencion_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$retencion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$retencion_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$retencionForeignKey=new retencion_param_return();//retencionForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$retencionForeignKey,$retencion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_ventas',$strRecargarFkTipos,',')) {
				$this->cargarComboscuenta_ventassFK($this->connexion,$strRecargarFkQuery,$retencionForeignKey,$retencion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_compras',$strRecargarFkTipos,',')) {
				$this->cargarComboscuenta_comprassFK($this->connexion,$strRecargarFkQuery,$retencionForeignKey,$retencion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$retencionForeignKey,$retencion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cuenta_ventas',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscuenta_ventassFK($this->connexion,' where id=-1 ',$retencionForeignKey,$retencion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cuenta_compras',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscuenta_comprassFK($this->connexion,' where id=-1 ',$retencionForeignKey,$retencion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $retencionForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$retencionForeignKey,$retencion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$retencionForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($retencion_session==null) {
			$retencion_session=new retencion_session();
		}
		
		if($retencion_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($retencionForeignKey->idempresaDefaultFK==0) {
					$retencionForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$retencionForeignKey->empresasFK[$empresaLocal->getId()]=retencion_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($retencion_session->bigidempresaActual!=null && $retencion_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($retencion_session->bigidempresaActual);//WithConnection

				$retencionForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=retencion_util::getempresaDescripcion($empresaLogic->getempresa());
				$retencionForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarComboscuenta_ventassFK($connexion=null,$strRecargarFkQuery='',$retencionForeignKey,$retencion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$cuentaLogic= new cuenta_logic();
		$pagination= new Pagination();
		$retencionForeignKey->cuenta_ventassFK=array();

		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($retencion_session==null) {
			$retencion_session=new retencion_session();
		}
		
		if($retencion_session->bitBusquedaDesdeFKSesioncuenta_ventas!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=cuenta_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalcuenta=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcuenta=Funciones::GetFinalQueryAppend($finalQueryGlobalcuenta, '');
				$finalQueryGlobalcuenta.=cuenta_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcuenta.$strRecargarFkQuery;		

				$cuentaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($cuentaLogic->getcuentas() as $cuentaLocal ) {
				if($retencionForeignKey->idcuenta_ventasDefaultFK==0) {
					$retencionForeignKey->idcuenta_ventasDefaultFK=$cuentaLocal->getId();
				}

				$retencionForeignKey->cuenta_ventassFK[$cuentaLocal->getId()]=retencion_util::getcuenta_ventasDescripcion($cuentaLocal);
			}

		} else {

			if($retencion_session->bigidcuenta_ventasActual!=null && $retencion_session->bigidcuenta_ventasActual > 0) {
				$cuentaLogic->getEntity($retencion_session->bigidcuenta_ventasActual);//WithConnection

				$retencionForeignKey->cuenta_ventassFK[$cuentaLogic->getcuenta()->getId()]=retencion_util::getcuenta_ventasDescripcion($cuentaLogic->getcuenta());
				$retencionForeignKey->idcuenta_ventasDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	public function cargarComboscuenta_comprassFK($connexion=null,$strRecargarFkQuery='',$retencionForeignKey,$retencion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$cuentaLogic= new cuenta_logic();
		$pagination= new Pagination();
		$retencionForeignKey->cuenta_comprassFK=array();

		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($retencion_session==null) {
			$retencion_session=new retencion_session();
		}
		
		if($retencion_session->bitBusquedaDesdeFKSesioncuenta_compras!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=cuenta_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalcuenta=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcuenta=Funciones::GetFinalQueryAppend($finalQueryGlobalcuenta, '');
				$finalQueryGlobalcuenta.=cuenta_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcuenta.$strRecargarFkQuery;		

				$cuentaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($cuentaLogic->getcuentas() as $cuentaLocal ) {
				if($retencionForeignKey->idcuenta_comprasDefaultFK==0) {
					$retencionForeignKey->idcuenta_comprasDefaultFK=$cuentaLocal->getId();
				}

				$retencionForeignKey->cuenta_comprassFK[$cuentaLocal->getId()]=retencion_util::getcuenta_comprasDescripcion($cuentaLocal);
			}

		} else {

			if($retencion_session->bigidcuenta_comprasActual!=null && $retencion_session->bigidcuenta_comprasActual > 0) {
				$cuentaLogic->getEntity($retencion_session->bigidcuenta_comprasActual);//WithConnection

				$retencionForeignKey->cuenta_comprassFK[$cuentaLogic->getcuenta()->getId()]=retencion_util::getcuenta_comprasDescripcion($cuentaLogic->getcuenta());
				$retencionForeignKey->idcuenta_comprasDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($retencion,$listaproducto_comprass,$productos,$clientes,$proveedors) {
		$this->saveRelacionesBase($retencion,$listaproducto_comprass,$productos,$clientes,$proveedors,true);
	}

	public function saveRelaciones($retencion,$listaproducto_comprass,$productos,$clientes,$proveedors) {
		$this->saveRelacionesBase($retencion,$listaproducto_comprass,$productos,$clientes,$proveedors,false);
	}

	public function saveRelacionesBase($retencion,$listaproducto_comprass=array(),$productos=array(),$clientes=array(),$proveedors=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$retencion->setlista_producto_comprass($listaproducto_comprass);
			$retencion->setproductos($productos);
			$retencion->setclientes($clientes);
			$retencion->setproveedors($proveedors);
			$this->setretencion($retencion);

			if(true) {

				//retencion_logic_add::updateRelacionesToSave($retencion,$this);

				if(($this->retencion->getIsNew() || $this->retencion->getIsChanged()) && !$this->retencion->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($listaproducto_comprass,$productos,$clientes,$proveedors);

				} else if($this->retencion->getIsDeleted()) {
					$this->saveRelacionesDetalles($listaproducto_comprass,$productos,$clientes,$proveedors);
					$this->save();
				}

				//retencion_logic_add::updateRelacionesToSaveAfter($retencion,$this);

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
	
	
	public function saveRelacionesDetalles($listaproducto_comprass=array(),$productos=array(),$clientes=array(),$proveedors=array()) {
		try {
	

			$idretencionActual=$this->getretencion()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/lista_producto_carga.php');
			lista_producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$listaproducto_comprasLogic_Desde_retencion=new lista_producto_logic();
			$listaproducto_comprasLogic_Desde_retencion->setlista_productos($listaproducto_comprass);

			$listaproducto_comprasLogic_Desde_retencion->setConnexion($this->getConnexion());
			$listaproducto_comprasLogic_Desde_retencion->setDatosCliente($this->datosCliente);

			foreach($listaproducto_comprasLogic_Desde_retencion->getlista_productos() as $listaproducto_Desde_retencion) {
				$listaproducto_Desde_retencion->setid_retencion_compras($idretencionActual);
			}

			$listaproducto_comprasLogic_Desde_retencion->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/producto_carga.php');
			producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$productoLogic_Desde_retencion=new producto_logic();
			$productoLogic_Desde_retencion->setproductos($productos);

			$productoLogic_Desde_retencion->setConnexion($this->getConnexion());
			$productoLogic_Desde_retencion->setDatosCliente($this->datosCliente);

			foreach($productoLogic_Desde_retencion->getproductos() as $producto_Desde_retencion) {
				$producto_Desde_retencion->setid_retencion($idretencionActual);

				$productoLogic_Desde_retencion->setproducto($producto_Desde_retencion);
				$productoLogic_Desde_retencion->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/cliente_carga.php');
			cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$clienteLogic_Desde_retencion=new cliente_logic();
			$clienteLogic_Desde_retencion->setclientes($clientes);

			$clienteLogic_Desde_retencion->setConnexion($this->getConnexion());
			$clienteLogic_Desde_retencion->setDatosCliente($this->datosCliente);

			foreach($clienteLogic_Desde_retencion->getclientes() as $cliente_Desde_retencion) {
				$cliente_Desde_retencion->setid_retencion($idretencionActual);

				$clienteLogic_Desde_retencion->setcliente($cliente_Desde_retencion);
				$clienteLogic_Desde_retencion->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/proveedor_carga.php');
			proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$proveedorLogic_Desde_retencion=new proveedor_logic();
			$proveedorLogic_Desde_retencion->setproveedors($proveedors);

			$proveedorLogic_Desde_retencion->setConnexion($this->getConnexion());
			$proveedorLogic_Desde_retencion->setDatosCliente($this->datosCliente);

			foreach($proveedorLogic_Desde_retencion->getproveedors() as $proveedor_Desde_retencion) {
				$proveedor_Desde_retencion->setid_retencion($idretencionActual);

				$proveedorLogic_Desde_retencion->setproveedor($proveedor_Desde_retencion);
				$proveedorLogic_Desde_retencion->save();
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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $retencions,retencion_param_return $retencionParameterGeneral) : retencion_param_return {
		$retencionReturnGeneral=new retencion_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $retencionReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $retencions,retencion_param_return $retencionParameterGeneral) : retencion_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$retencionReturnGeneral=new retencion_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $retencionReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $retencions,retencion $retencion,retencion_param_return $retencionParameterGeneral,bool $isEsNuevoretencion,array $clases) : retencion_param_return {
		 try {	
			$retencionReturnGeneral=new retencion_param_return();
	
			$retencionReturnGeneral->setretencion($retencion);
			$retencionReturnGeneral->setretencions($retencions);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$retencionReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $retencionReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $retencions,retencion $retencion,retencion_param_return $retencionParameterGeneral,bool $isEsNuevoretencion,array $clases) : retencion_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$retencionReturnGeneral=new retencion_param_return();
	
			$retencionReturnGeneral->setretencion($retencion);
			$retencionReturnGeneral->setretencions($retencions);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$retencionReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $retencionReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $retencions,retencion $retencion,retencion_param_return $retencionParameterGeneral,bool $isEsNuevoretencion,array $clases) : retencion_param_return {
		 try {	
			$retencionReturnGeneral=new retencion_param_return();
	
			$retencionReturnGeneral->setretencion($retencion);
			$retencionReturnGeneral->setretencions($retencions);
			
			
			
			return $retencionReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $retencions,retencion $retencion,retencion_param_return $retencionParameterGeneral,bool $isEsNuevoretencion,array $clases) : retencion_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$retencionReturnGeneral=new retencion_param_return();
	
			$retencionReturnGeneral->setretencion($retencion);
			$retencionReturnGeneral->setretencions($retencions);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $retencionReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,retencion $retencion,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,retencion $retencion,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		retencion_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		retencion_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(retencion $retencion,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//retencion_logic_add::updateretencionToGet($this->retencion);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$retencion->setempresa($this->retencionDataAccess->getempresa($this->connexion,$retencion));
		$retencion->setcuenta_ventas($this->retencionDataAccess->getcuenta_ventas($this->connexion,$retencion));
		$retencion->setcuenta_compras($this->retencionDataAccess->getcuenta_compras($this->connexion,$retencion));
		$retencion->setlista_producto_comprass($this->retencionDataAccess->getlista_producto_comprass($this->connexion,$retencion));
		$retencion->setproductos($this->retencionDataAccess->getproductos($this->connexion,$retencion));
		$retencion->setclientes($this->retencionDataAccess->getclientes($this->connexion,$retencion));
		$retencion->setproveedors($this->retencionDataAccess->getproveedors($this->connexion,$retencion));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$retencion->setempresa($this->retencionDataAccess->getempresa($this->connexion,$retencion));
				continue;
			}

			if($clas->clas==cuenta::$class.'_ventas') {
				$retencion->setcuenta_ventas($this->retencionDataAccess->getcuenta_ventas($this->connexion,$retencion));
				continue;
			}

			if($clas->clas==cuenta::$class.'_compras') {
				$retencion->setcuenta_compras($this->retencionDataAccess->getcuenta_compras($this->connexion,$retencion));
				continue;
			}

			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$retencion->setlista_producto_comprass($this->retencionDataAccess->getlista_producto_comprass($this->connexion,$retencion));

				if($this->isConDeep) {
					$listaproductoLogic= new lista_producto_logic($this->connexion);
					$listaproductoLogic->setlista_productos($retencion->getlista_producto_comprass());
					$classesLocal=lista_producto_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$listaproductoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					lista_producto_util::refrescarFKDescripciones($listaproductoLogic->getlista_productos());
					$retencion->setlista_producto_comprass($listaproductoLogic->getlista_productos());
				}

				continue;
			}

			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$retencion->setproductos($this->retencionDataAccess->getproductos($this->connexion,$retencion));

				if($this->isConDeep) {
					$productoLogic= new producto_logic($this->connexion);
					$productoLogic->setproductos($retencion->getproductos());
					$classesLocal=producto_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$productoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					producto_util::refrescarFKDescripciones($productoLogic->getproductos());
					$retencion->setproductos($productoLogic->getproductos());
				}

				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$retencion->setclientes($this->retencionDataAccess->getclientes($this->connexion,$retencion));

				if($this->isConDeep) {
					$clienteLogic= new cliente_logic($this->connexion);
					$clienteLogic->setclientes($retencion->getclientes());
					$classesLocal=cliente_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$clienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					cliente_util::refrescarFKDescripciones($clienteLogic->getclientes());
					$retencion->setclientes($clienteLogic->getclientes());
				}

				continue;
			}

			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$retencion->setproveedors($this->retencionDataAccess->getproveedors($this->connexion,$retencion));

				if($this->isConDeep) {
					$proveedorLogic= new proveedor_logic($this->connexion);
					$proveedorLogic->setproveedors($retencion->getproveedors());
					$classesLocal=proveedor_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$proveedorLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					proveedor_util::refrescarFKDescripciones($proveedorLogic->getproveedors());
					$retencion->setproveedors($proveedorLogic->getproveedors());
				}

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
			$retencion->setempresa($this->retencionDataAccess->getempresa($this->connexion,$retencion));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_ventas') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$retencion->setcuenta_ventas($this->retencionDataAccess->getcuenta_ventas($this->connexion,$retencion));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_compras') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$retencion->setcuenta_compras($this->retencionDataAccess->getcuenta_compras($this->connexion,$retencion));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(lista_producto::$class);
			$retencion->setlista_producto_comprass($this->retencionDataAccess->getlista_producto_comprass($this->connexion,$retencion));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(producto::$class);
			$retencion->setproductos($this->retencionDataAccess->getproductos($this->connexion,$retencion));
		}

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
			$retencion->setclientes($this->retencionDataAccess->getclientes($this->connexion,$retencion));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(proveedor::$class);
			$retencion->setproveedors($this->retencionDataAccess->getproveedors($this->connexion,$retencion));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$retencion->setempresa($this->retencionDataAccess->getempresa($this->connexion,$retencion));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($retencion->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$retencion->setcuenta_ventas($this->retencionDataAccess->getcuenta_ventas($this->connexion,$retencion));
		$cuenta_ventasLogic= new cuenta_logic($this->connexion);
		$cuenta_ventasLogic->deepLoad($retencion->getcuenta_ventas(),$isDeep,$deepLoadType,$clases);
				
		$retencion->setcuenta_compras($this->retencionDataAccess->getcuenta_compras($this->connexion,$retencion));
		$cuenta_comprasLogic= new cuenta_logic($this->connexion);
		$cuenta_comprasLogic->deepLoad($retencion->getcuenta_compras(),$isDeep,$deepLoadType,$clases);
				

		$retencion->setlista_producto_comprass($this->retencionDataAccess->getlista_producto_comprass($this->connexion,$retencion));

		foreach($retencion->getlista_producto_comprass() as $listaproducto) {
			$listaproductoLogic= new lista_producto_logic($this->connexion);
			$listaproductoLogic->deepLoad($listaproducto,$isDeep,$deepLoadType,$clases);
		}

		$retencion->setproductos($this->retencionDataAccess->getproductos($this->connexion,$retencion));

		foreach($retencion->getproductos() as $producto) {
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepLoad($producto,$isDeep,$deepLoadType,$clases);
		}

		$retencion->setclientes($this->retencionDataAccess->getclientes($this->connexion,$retencion));

		foreach($retencion->getclientes() as $cliente) {
			$clienteLogic= new cliente_logic($this->connexion);
			$clienteLogic->deepLoad($cliente,$isDeep,$deepLoadType,$clases);
		}

		$retencion->setproveedors($this->retencionDataAccess->getproveedors($this->connexion,$retencion));

		foreach($retencion->getproveedors() as $proveedor) {
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedorLogic->deepLoad($proveedor,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$retencion->setempresa($this->retencionDataAccess->getempresa($this->connexion,$retencion));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($retencion->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cuenta::$class.'_ventas') {
				$retencion->setcuenta_ventas($this->retencionDataAccess->getcuenta_ventas($this->connexion,$retencion));
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepLoad($retencion->getcuenta_ventas(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cuenta::$class.'_compras') {
				$retencion->setcuenta_compras($this->retencionDataAccess->getcuenta_compras($this->connexion,$retencion));
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepLoad($retencion->getcuenta_compras(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$retencion->setlista_producto_comprass($this->retencionDataAccess->getlista_producto_comprass($this->connexion,$retencion));

				foreach($retencion->getlista_producto_comprass() as $listaproducto) {
					$listaproductoLogic= new lista_producto_logic($this->connexion);
					$listaproductoLogic->deepLoad($listaproducto,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$retencion->setproductos($this->retencionDataAccess->getproductos($this->connexion,$retencion));

				foreach($retencion->getproductos() as $producto) {
					$productoLogic= new producto_logic($this->connexion);
					$productoLogic->deepLoad($producto,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$retencion->setclientes($this->retencionDataAccess->getclientes($this->connexion,$retencion));

				foreach($retencion->getclientes() as $cliente) {
					$clienteLogic= new cliente_logic($this->connexion);
					$clienteLogic->deepLoad($cliente,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$retencion->setproveedors($this->retencionDataAccess->getproveedors($this->connexion,$retencion));

				foreach($retencion->getproveedors() as $proveedor) {
					$proveedorLogic= new proveedor_logic($this->connexion);
					$proveedorLogic->deepLoad($proveedor,$isDeep,$deepLoadType,$clases);
				}
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
			$retencion->setempresa($this->retencionDataAccess->getempresa($this->connexion,$retencion));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($retencion->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_ventas') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$retencion->setcuenta_ventas($this->retencionDataAccess->getcuenta_ventas($this->connexion,$retencion));
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepLoad($retencion->getcuenta_ventas(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_compras') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$retencion->setcuenta_compras($this->retencionDataAccess->getcuenta_compras($this->connexion,$retencion));
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepLoad($retencion->getcuenta_compras(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(lista_producto::$class);
			$retencion->setlista_producto_comprass($this->retencionDataAccess->getlista_producto_comprass($this->connexion,$retencion));

			foreach($retencion->getlista_producto_comprass() as $listaproducto) {
				$listaproductoLogic= new lista_producto_logic($this->connexion);
				$listaproductoLogic->deepLoad($listaproducto,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(producto::$class);
			$retencion->setproductos($this->retencionDataAccess->getproductos($this->connexion,$retencion));

			foreach($retencion->getproductos() as $producto) {
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepLoad($producto,$isDeep,$deepLoadType,$clases);
			}
		}

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
			$retencion->setclientes($this->retencionDataAccess->getclientes($this->connexion,$retencion));

			foreach($retencion->getclientes() as $cliente) {
				$clienteLogic= new cliente_logic($this->connexion);
				$clienteLogic->deepLoad($cliente,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(proveedor::$class);
			$retencion->setproveedors($this->retencionDataAccess->getproveedors($this->connexion,$retencion));

			foreach($retencion->getproveedors() as $proveedor) {
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedorLogic->deepLoad($proveedor,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(retencion $retencion,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//retencion_logic_add::updateretencionToSave($this->retencion);			
			
			if(!$paraDeleteCascade) {				
				retencion_data::save($retencion, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($retencion->getempresa(),$this->connexion);
		cuenta_data::save($retencion->getcuenta_ventas(),$this->connexion);
		cuenta_data::save($retencion->getcuenta_compras(),$this->connexion);

		foreach($retencion->getlista_producto_comprass() as $listaproducto) {
			$listaproducto->setid_retencion($retencion->getId());
			lista_producto_data::save($listaproducto,$this->connexion);
		}


		foreach($retencion->getproductos() as $producto) {
			$producto->setid_retencion($retencion->getId());
			producto_data::save($producto,$this->connexion);
		}


		foreach($retencion->getclientes() as $cliente) {
			$cliente->setid_retencion($retencion->getId());
			cliente_data::save($cliente,$this->connexion);
		}


		foreach($retencion->getproveedors() as $proveedor) {
			$proveedor->setid_retencion($retencion->getId());
			proveedor_data::save($proveedor,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($retencion->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==cuenta::$class.'_ventas') {
				cuenta_data::save($retencion->getcuenta_ventas(),$this->connexion);
				continue;
			}

			if($clas->clas==cuenta::$class.'_compras') {
				cuenta_data::save($retencion->getcuenta_compras(),$this->connexion);
				continue;
			}


			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($retencion->getlista_producto_comprass() as $listaproducto) {
					$listaproducto->setid_retencion($retencion->getId());
					lista_producto_data::save($listaproducto,$this->connexion);
				}

				continue;
			}

			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($retencion->getproductos() as $producto) {
					$producto->setid_retencion($retencion->getId());
					producto_data::save($producto,$this->connexion);
				}

				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($retencion->getclientes() as $cliente) {
					$cliente->setid_retencion($retencion->getId());
					cliente_data::save($cliente,$this->connexion);
				}

				continue;
			}

			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($retencion->getproveedors() as $proveedor) {
					$proveedor->setid_retencion($retencion->getId());
					proveedor_data::save($proveedor,$this->connexion);
				}

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
			empresa_data::save($retencion->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_ventas') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($retencion->getcuenta_ventas(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_compras') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($retencion->getcuenta_compras(),$this->connexion);
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(lista_producto::$class);

			foreach($retencion->getlista_producto_comprass() as $listaproducto) {
				$listaproducto->setid_retencion($retencion->getId());
				lista_producto_data::save($listaproducto,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(producto::$class);

			foreach($retencion->getproductos() as $producto) {
				$producto->setid_retencion($retencion->getId());
				producto_data::save($producto,$this->connexion);
			}

		}

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

			foreach($retencion->getclientes() as $cliente) {
				$cliente->setid_retencion($retencion->getId());
				cliente_data::save($cliente,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(proveedor::$class);

			foreach($retencion->getproveedors() as $proveedor) {
				$proveedor->setid_retencion($retencion->getId());
				proveedor_data::save($proveedor,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($retencion->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($retencion->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cuenta_data::save($retencion->getcuenta_ventas(),$this->connexion);
		$cuenta_ventasLogic= new cuenta_logic($this->connexion);
		$cuenta_ventasLogic->deepSave($retencion->getcuenta_ventas(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cuenta_data::save($retencion->getcuenta_compras(),$this->connexion);
		$cuenta_comprasLogic= new cuenta_logic($this->connexion);
		$cuenta_comprasLogic->deepSave($retencion->getcuenta_compras(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($retencion->getlista_producto_comprass() as $listaproducto) {
			$listaproductoLogic= new lista_producto_logic($this->connexion);
			$listaproducto->setid_retencion($retencion->getId());
			lista_producto_data::save($listaproducto,$this->connexion);
			$listaproductoLogic->deepSave($listaproducto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($retencion->getproductos() as $producto) {
			$productoLogic= new producto_logic($this->connexion);
			$producto->setid_retencion($retencion->getId());
			producto_data::save($producto,$this->connexion);
			$productoLogic->deepSave($producto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($retencion->getclientes() as $cliente) {
			$clienteLogic= new cliente_logic($this->connexion);
			$cliente->setid_retencion($retencion->getId());
			cliente_data::save($cliente,$this->connexion);
			$clienteLogic->deepSave($cliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($retencion->getproveedors() as $proveedor) {
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedor->setid_retencion($retencion->getId());
			proveedor_data::save($proveedor,$this->connexion);
			$proveedorLogic->deepSave($proveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($retencion->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($retencion->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cuenta::$class.'_ventas') {
				cuenta_data::save($retencion->getcuenta_ventas(),$this->connexion);
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepSave($retencion->getcuenta_ventas(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cuenta::$class.'_compras') {
				cuenta_data::save($retencion->getcuenta_compras(),$this->connexion);
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepSave($retencion->getcuenta_compras(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($retencion->getlista_producto_comprass() as $listaproducto) {
					$listaproductoLogic= new lista_producto_logic($this->connexion);
					$listaproducto->setid_retencion($retencion->getId());
					lista_producto_data::save($listaproducto,$this->connexion);
					$listaproductoLogic->deepSave($listaproducto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($retencion->getproductos() as $producto) {
					$productoLogic= new producto_logic($this->connexion);
					$producto->setid_retencion($retencion->getId());
					producto_data::save($producto,$this->connexion);
					$productoLogic->deepSave($producto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($retencion->getclientes() as $cliente) {
					$clienteLogic= new cliente_logic($this->connexion);
					$cliente->setid_retencion($retencion->getId());
					cliente_data::save($cliente,$this->connexion);
					$clienteLogic->deepSave($cliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($retencion->getproveedors() as $proveedor) {
					$proveedorLogic= new proveedor_logic($this->connexion);
					$proveedor->setid_retencion($retencion->getId());
					proveedor_data::save($proveedor,$this->connexion);
					$proveedorLogic->deepSave($proveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

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
			empresa_data::save($retencion->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($retencion->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_ventas') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($retencion->getcuenta(),$this->connexion);
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepSave($retencion->getcuenta_ventas(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_compras') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($retencion->getcuenta(),$this->connexion);
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepSave($retencion->getcuenta_compras(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(lista_producto::$class);

			foreach($retencion->getlista_producto_comprass() as $listaproducto) {
				$listaproductoLogic= new lista_producto_logic($this->connexion);
				$listaproducto->setid_retencion($retencion->getId());
				lista_producto_data::save($listaproducto,$this->connexion);
				$listaproductoLogic->deepSave($listaproducto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(producto::$class);

			foreach($retencion->getproductos() as $producto) {
				$productoLogic= new producto_logic($this->connexion);
				$producto->setid_retencion($retencion->getId());
				producto_data::save($producto,$this->connexion);
				$productoLogic->deepSave($producto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


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

			foreach($retencion->getclientes() as $cliente) {
				$clienteLogic= new cliente_logic($this->connexion);
				$cliente->setid_retencion($retencion->getId());
				cliente_data::save($cliente,$this->connexion);
				$clienteLogic->deepSave($cliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(proveedor::$class);

			foreach($retencion->getproveedors() as $proveedor) {
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedor->setid_retencion($retencion->getId());
				proveedor_data::save($proveedor,$this->connexion);
				$proveedorLogic->deepSave($proveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				retencion_data::save($retencion, $this->connexion);
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
			
			$this->deepLoad($this->retencion,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->retencions as $retencion) {
				$this->deepLoad($retencion,$isDeep,$deepLoadType,$clases);
								
				retencion_util::refrescarFKDescripciones($this->retencions);
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
			
			foreach($this->retencions as $retencion) {
				$this->deepLoad($retencion,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->retencion,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->retencions as $retencion) {
				$this->deepSave($retencion,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->retencions as $retencion) {
				$this->deepSave($retencion,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(cuenta::$class);
				$classes[]=new Classe(cuenta::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==cuenta::$class) {
						$classes[]=new Classe(cuenta::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==cuenta::$class) {
						$classes[]=new Classe(cuenta::$class);
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
					if($clas->clas==cuenta::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==cuenta::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta::$class);
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
				
				$classes[]=new Classe(lista_producto::$class);
				$classes[]=new Classe(producto::$class);
				$classes[]=new Classe(cliente::$class);
				$classes[]=new Classe(proveedor::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==lista_producto::$class) {
						$classes[]=new Classe(lista_producto::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==producto::$class) {
						$classes[]=new Classe(producto::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==cliente::$class) {
						$classes[]=new Classe(cliente::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==proveedor::$class) {
						$classes[]=new Classe(proveedor::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==lista_producto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(lista_producto::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==producto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(producto::$class);
				}

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

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==proveedor::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(proveedor::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getretencion() : ?retencion {	
		/*
		retencion_logic_add::checkretencionToGet($this->retencion,$this->datosCliente);
		retencion_logic_add::updateretencionToGet($this->retencion);
		*/
			
		return $this->retencion;
	}
		
	public function setretencion(retencion $newretencion) {
		$this->retencion = $newretencion;
	}
	
	public function getretencions() : array {		
		/*
		retencion_logic_add::checkretencionToGets($this->retencions,$this->datosCliente);
		
		foreach ($this->retencions as $retencionLocal ) {
			retencion_logic_add::updateretencionToGet($retencionLocal);
		}
		*/
		
		return $this->retencions;
	}
	
	public function setretencions(array $newretencions) {
		$this->retencions = $newretencions;
	}
	
	public function getretencionDataAccess() : retencion_data {
		return $this->retencionDataAccess;
	}
	
	public function setretencionDataAccess(retencion_data $newretencionDataAccess) {
		$this->retencionDataAccess = $newretencionDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        retencion_carga::$CONTROLLER;;        
		
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
