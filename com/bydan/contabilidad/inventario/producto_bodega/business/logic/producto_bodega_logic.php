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

namespace com\bydan\contabilidad\inventario\producto_bodega\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\inventario\producto_bodega\util\producto_bodega_carga;
use com\bydan\contabilidad\inventario\producto_bodega\util\producto_bodega_param_return;

use com\bydan\contabilidad\inventario\producto_bodega\presentation\session\producto_bodega_session;

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

use com\bydan\contabilidad\inventario\producto_bodega\util\producto_bodega_util;
use com\bydan\contabilidad\inventario\producto_bodega\business\entity\producto_bodega;
use com\bydan\contabilidad\inventario\producto_bodega\business\data\producto_bodega_data;

//FK


use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;
use com\bydan\contabilidad\inventario\bodega\business\data\bodega_data;
use com\bydan\contabilidad\inventario\bodega\business\logic\bodega_logic;
use com\bydan\contabilidad\inventario\bodega\util\bodega_util;

use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\business\data\producto_data;
use com\bydan\contabilidad\inventario\producto\business\logic\producto_logic;
use com\bydan\contabilidad\inventario\producto\util\producto_util;

//REL


//REL DETALLES




class producto_bodega_logic  extends GeneralEntityLogic implements producto_bodega_logicI {	
	/*GENERAL*/
	public producto_bodega_data $producto_bodegaDataAccess;
	//public ?producto_bodega_logic_add $producto_bodegaLogicAdditional=null;
	public ?producto_bodega $producto_bodega;
	public array $producto_bodegas;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->producto_bodegaDataAccess = new producto_bodega_data();			
			$this->producto_bodegas = array();
			$this->producto_bodega = new producto_bodega();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->producto_bodegaLogicAdditional = new producto_bodega_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->producto_bodegaLogicAdditional==null) {
		//	$this->producto_bodegaLogicAdditional=new producto_bodega_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->producto_bodegaDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->producto_bodegaDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->producto_bodegaDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->producto_bodegaDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->producto_bodegas = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->producto_bodegas=$this->producto_bodegaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				producto_bodega_util::refrescarFKDescripciones($this->producto_bodegas);
			}
			
			//producto_bodega_logic_add::checkproducto_bodegaToGets($this->producto_bodegas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->producto_bodegas);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->producto_bodegas = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->producto_bodegas=$this->producto_bodegaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				producto_bodega_util::refrescarFKDescripciones($this->producto_bodegas);
			}
			
			//producto_bodega_logic_add::checkproducto_bodegaToGets($this->producto_bodegas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->producto_bodegas);
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
		$this->producto_bodega = new producto_bodega();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->producto_bodega=$this->producto_bodegaDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->producto_bodega,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				producto_bodega_util::refrescarFKDescripcion($this->producto_bodega);
			}
						
			//producto_bodega_logic_add::checkproducto_bodegaToGet($this->producto_bodega,$this->datosCliente);
			//producto_bodega_logic_add::updateproducto_bodegaToGet($this->producto_bodega);
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
		$this->producto_bodega = new  producto_bodega();
		  		  
        try {		
			$this->producto_bodega=$this->producto_bodegaDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->producto_bodega,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				producto_bodega_util::refrescarFKDescripcion($this->producto_bodega);
			}
			
			//producto_bodega_logic_add::checkproducto_bodegaToGet($this->producto_bodega,$this->datosCliente);
			//producto_bodega_logic_add::updateproducto_bodegaToGet($this->producto_bodega);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?producto_bodega {
		$producto_bodegaLogic = new  producto_bodega_logic();
		  		  
        try {		
			$producto_bodegaLogic->setConnexion($connexion);			
			$producto_bodegaLogic->getEntity($id);			
			return $producto_bodegaLogic->getproducto_bodega();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->producto_bodega = new  producto_bodega();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->producto_bodega=$this->producto_bodegaDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->producto_bodega,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				producto_bodega_util::refrescarFKDescripcion($this->producto_bodega);
			}
			
			//producto_bodega_logic_add::checkproducto_bodegaToGet($this->producto_bodega,$this->datosCliente);
			//producto_bodega_logic_add::updateproducto_bodegaToGet($this->producto_bodega);
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
		$this->producto_bodega = new  producto_bodega();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->producto_bodega=$this->producto_bodegaDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->producto_bodega,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				producto_bodega_util::refrescarFKDescripcion($this->producto_bodega);
			}
			
			//producto_bodega_logic_add::checkproducto_bodegaToGet($this->producto_bodega,$this->datosCliente);
			//producto_bodega_logic_add::updateproducto_bodegaToGet($this->producto_bodega);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?producto_bodega {
		$producto_bodegaLogic = new  producto_bodega_logic();
		  		  
        try {		
			$producto_bodegaLogic->setConnexion($connexion);			
			$producto_bodegaLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $producto_bodegaLogic->getproducto_bodega();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->producto_bodegas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->producto_bodegas=$this->producto_bodegaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				producto_bodega_util::refrescarFKDescripciones($this->producto_bodegas);
			}
			
			//producto_bodega_logic_add::checkproducto_bodegaToGets($this->producto_bodegas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->producto_bodegas);			
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
		$this->producto_bodegas = array();
		  		  
        try {			
			$this->producto_bodegas=$this->producto_bodegaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				producto_bodega_util::refrescarFKDescripciones($this->producto_bodegas);
			}
			
			//producto_bodega_logic_add::checkproducto_bodegaToGets($this->producto_bodegas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->producto_bodegas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->producto_bodegas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->producto_bodegas=$this->producto_bodegaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				producto_bodega_util::refrescarFKDescripciones($this->producto_bodegas);
			}
			
			//producto_bodega_logic_add::checkproducto_bodegaToGets($this->producto_bodegas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->producto_bodegas);
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
		$this->producto_bodegas = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->producto_bodegas=$this->producto_bodegaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				producto_bodega_util::refrescarFKDescripciones($this->producto_bodegas);
			}
			
			//producto_bodega_logic_add::checkproducto_bodegaToGets($this->producto_bodegas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->producto_bodegas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$producto_bodegaLogic = new  producto_bodega_logic();
		  		  
        try {		
			$producto_bodegaLogic->setConnexion($connexion);			
			$producto_bodegaLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $producto_bodegaLogic->getproducto_bodegas();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->producto_bodegas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->producto_bodegas=$this->producto_bodegaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				producto_bodega_util::refrescarFKDescripciones($this->producto_bodegas);
			}
			
			//producto_bodega_logic_add::checkproducto_bodegaToGets($this->producto_bodegas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->producto_bodegas);
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
		$this->producto_bodegas = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->producto_bodegas=$this->producto_bodegaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				producto_bodega_util::refrescarFKDescripciones($this->producto_bodegas);
			}
			
			//producto_bodega_logic_add::checkproducto_bodegaToGets($this->producto_bodegas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->producto_bodegas);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->producto_bodegas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->producto_bodegas=$this->producto_bodegaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				producto_bodega_util::refrescarFKDescripciones($this->producto_bodegas);
			}
			
			//producto_bodega_logic_add::checkproducto_bodegaToGets($this->producto_bodegas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->producto_bodegas);
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
		$this->producto_bodegas = array();
		  		  
        try {			
			$this->producto_bodegas=$this->producto_bodegaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				producto_bodega_util::refrescarFKDescripciones($this->producto_bodegas);
			}	
			
			//producto_bodega_logic_add::checkproducto_bodegaToGets($this->producto_bodegas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->producto_bodegas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->producto_bodegas = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->producto_bodegas=$this->producto_bodegaDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				producto_bodega_util::refrescarFKDescripciones($this->producto_bodegas);
			}
			
			//producto_bodega_logic_add::checkproducto_bodegaToGets($this->producto_bodegas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->producto_bodegas);
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
		$this->producto_bodegas = array();
		  		  
        try {		
			$this->producto_bodegas=$this->producto_bodegaDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				producto_bodega_util::refrescarFKDescripciones($this->producto_bodegas);
			}
			
			//producto_bodega_logic_add::checkproducto_bodegaToGets($this->producto_bodegas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->producto_bodegas);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_IdbodegaWithConnection(string $strFinalQuery,Pagination $pagination,int $id_bodega) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_bodega= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_bodega->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_bodega,producto_bodega_util::$ID_BODEGA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_bodega);

			$this->producto_bodegas=$this->producto_bodegaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				producto_bodega_util::refrescarFKDescripciones($this->producto_bodegas);
			}
			//producto_bodega_logic_add::checkproducto_bodegaToGets($this->producto_bodegas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->producto_bodegas);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idbodega(string $strFinalQuery,Pagination $pagination,int $id_bodega) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_bodega= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_bodega->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_bodega,producto_bodega_util::$ID_BODEGA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_bodega);

			$this->producto_bodegas=$this->producto_bodegaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				producto_bodega_util::refrescarFKDescripciones($this->producto_bodegas);
			}
			//producto_bodega_logic_add::checkproducto_bodegaToGets($this->producto_bodegas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->producto_bodegas);
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
			$parameterSelectionGeneralid_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_producto,producto_bodega_util::$ID_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_producto);

			$this->producto_bodegas=$this->producto_bodegaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				producto_bodega_util::refrescarFKDescripciones($this->producto_bodegas);
			}
			//producto_bodega_logic_add::checkproducto_bodegaToGets($this->producto_bodegas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->producto_bodegas);

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
			$parameterSelectionGeneralid_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_producto,producto_bodega_util::$ID_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_producto);

			$this->producto_bodegas=$this->producto_bodegaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				producto_bodega_util::refrescarFKDescripciones($this->producto_bodegas);
			}
			//producto_bodega_logic_add::checkproducto_bodegaToGets($this->producto_bodegas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->producto_bodegas);
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
						
			//producto_bodega_logic_add::checkproducto_bodegaToSave($this->producto_bodega,$this->datosCliente,$this->connexion);	       
			//producto_bodega_logic_add::updateproducto_bodegaToSave($this->producto_bodega);			
			producto_bodega_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->producto_bodega,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->producto_bodegaLogicAdditional->checkGeneralEntityToSave($this,$this->producto_bodega,$this->datosCliente,$this->connexion);
			
			
			producto_bodega_data::save($this->producto_bodega, $this->connexion);	    	       	 				
			//producto_bodega_logic_add::checkproducto_bodegaToSaveAfter($this->producto_bodega,$this->datosCliente,$this->connexion);			
			//$this->producto_bodegaLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->producto_bodega,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->producto_bodega,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->producto_bodega,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				producto_bodega_util::refrescarFKDescripcion($this->producto_bodega);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->producto_bodega->getIsDeleted()) {
				$this->producto_bodega=null;
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
						
			/*producto_bodega_logic_add::checkproducto_bodegaToSave($this->producto_bodega,$this->datosCliente,$this->connexion);*/	        
			//producto_bodega_logic_add::updateproducto_bodegaToSave($this->producto_bodega);			
			//$this->producto_bodegaLogicAdditional->checkGeneralEntityToSave($this,$this->producto_bodega,$this->datosCliente,$this->connexion);			
			producto_bodega_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->producto_bodega,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			producto_bodega_data::save($this->producto_bodega, $this->connexion);	    	       	 						
			/*producto_bodega_logic_add::checkproducto_bodegaToSaveAfter($this->producto_bodega,$this->datosCliente,$this->connexion);*/			
			//$this->producto_bodegaLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->producto_bodega,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->producto_bodega,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->producto_bodega,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				producto_bodega_util::refrescarFKDescripcion($this->producto_bodega);				
			}
			
			if($this->producto_bodega->getIsDeleted()) {
				$this->producto_bodega=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(producto_bodega $producto_bodega,Connexion $connexion)  {
		$producto_bodegaLogic = new  producto_bodega_logic();		  		  
        try {		
			$producto_bodegaLogic->setConnexion($connexion);			
			$producto_bodegaLogic->setproducto_bodega($producto_bodega);			
			$producto_bodegaLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*producto_bodega_logic_add::checkproducto_bodegaToSaves($this->producto_bodegas,$this->datosCliente,$this->connexion);*/	        	
			//$this->producto_bodegaLogicAdditional->checkGeneralEntitiesToSaves($this,$this->producto_bodegas,$this->datosCliente,$this->connexion);
			
	   		foreach($this->producto_bodegas as $producto_bodegaLocal) {				
								
				//producto_bodega_logic_add::updateproducto_bodegaToSave($producto_bodegaLocal);	        	
				producto_bodega_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$producto_bodegaLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				producto_bodega_data::save($producto_bodegaLocal, $this->connexion);				
			}
			
			/*producto_bodega_logic_add::checkproducto_bodegaToSavesAfter($this->producto_bodegas,$this->datosCliente,$this->connexion);*/			
			//$this->producto_bodegaLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->producto_bodegas,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				producto_bodega_util::refrescarFKDescripciones($this->producto_bodegas);
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
			/*producto_bodega_logic_add::checkproducto_bodegaToSaves($this->producto_bodegas,$this->datosCliente,$this->connexion);*/			
			//$this->producto_bodegaLogicAdditional->checkGeneralEntitiesToSaves($this,$this->producto_bodegas,$this->datosCliente,$this->connexion);
			
	   		foreach($this->producto_bodegas as $producto_bodegaLocal) {				
								
				//producto_bodega_logic_add::updateproducto_bodegaToSave($producto_bodegaLocal);	        	
				producto_bodega_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$producto_bodegaLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				producto_bodega_data::save($producto_bodegaLocal, $this->connexion);				
			}			
			
			/*producto_bodega_logic_add::checkproducto_bodegaToSavesAfter($this->producto_bodegas,$this->datosCliente,$this->connexion);*/			
			//$this->producto_bodegaLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->producto_bodegas,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				producto_bodega_util::refrescarFKDescripciones($this->producto_bodegas);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $producto_bodegas,Connexion $connexion)  {
		$producto_bodegaLogic = new  producto_bodega_logic();
		  		  
        try {		
			$producto_bodegaLogic->setConnexion($connexion);			
			$producto_bodegaLogic->setproducto_bodegas($producto_bodegas);			
			$producto_bodegaLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$producto_bodegasAux=array();
		
		foreach($this->producto_bodegas as $producto_bodega) {
			if($producto_bodega->getIsDeleted()==false) {
				$producto_bodegasAux[]=$producto_bodega;
			}
		}
		
		$this->producto_bodegas=$producto_bodegasAux;
	}
	
	public function updateToGetsAuxiliar(array &$producto_bodegas) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->producto_bodegas as $producto_bodega) {
				
				$producto_bodega->setid_bodega_Descripcion(producto_bodega_util::getbodegaDescripcion($producto_bodega->getbodega()));
				$producto_bodega->setid_producto_Descripcion(producto_bodega_util::getproductoDescripcion($producto_bodega->getproducto()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$producto_bodega_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$producto_bodega_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$producto_bodega_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$producto_bodega_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$producto_bodega_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$producto_bodegaForeignKey=new producto_bodega_param_return();//producto_bodegaForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_bodega',$strRecargarFkTipos,',')) {
				$this->cargarCombosbodegasFK($this->connexion,$strRecargarFkQuery,$producto_bodegaForeignKey,$producto_bodega_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_producto',$strRecargarFkTipos,',')) {
				$this->cargarCombosproductosFK($this->connexion,$strRecargarFkQuery,$producto_bodegaForeignKey,$producto_bodega_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_bodega',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosbodegasFK($this->connexion,' where id=-1 ',$producto_bodegaForeignKey,$producto_bodega_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_producto',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosproductosFK($this->connexion,' where id=-1 ',$producto_bodegaForeignKey,$producto_bodega_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $producto_bodegaForeignKey;
			
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
	
	
	public function cargarCombosbodegasFK($connexion=null,$strRecargarFkQuery='',$producto_bodegaForeignKey,$producto_bodega_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$bodegaLogic= new bodega_logic();
		$pagination= new Pagination();
		$producto_bodegaForeignKey->bodegasFK=array();

		$bodegaLogic->setConnexion($connexion);
		$bodegaLogic->getbodegaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($producto_bodega_session==null) {
			$producto_bodega_session=new producto_bodega_session();
		}
		
		if($producto_bodega_session->bitBusquedaDesdeFKSesionbodega!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=bodega_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalbodega=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalbodega=Funciones::GetFinalQueryAppend($finalQueryGlobalbodega, '');
				$finalQueryGlobalbodega.=bodega_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalbodega.$strRecargarFkQuery;		

				$bodegaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($bodegaLogic->getbodegas() as $bodegaLocal ) {
				if($producto_bodegaForeignKey->idbodegaDefaultFK==0) {
					$producto_bodegaForeignKey->idbodegaDefaultFK=$bodegaLocal->getId();
				}

				$producto_bodegaForeignKey->bodegasFK[$bodegaLocal->getId()]=producto_bodega_util::getbodegaDescripcion($bodegaLocal);
			}

		} else {

			if($producto_bodega_session->bigidbodegaActual!=null && $producto_bodega_session->bigidbodegaActual > 0) {
				$bodegaLogic->getEntity($producto_bodega_session->bigidbodegaActual);//WithConnection

				$producto_bodegaForeignKey->bodegasFK[$bodegaLogic->getbodega()->getId()]=producto_bodega_util::getbodegaDescripcion($bodegaLogic->getbodega());
				$producto_bodegaForeignKey->idbodegaDefaultFK=$bodegaLogic->getbodega()->getId();
			}
		}
	}

	public function cargarCombosproductosFK($connexion=null,$strRecargarFkQuery='',$producto_bodegaForeignKey,$producto_bodega_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$productoLogic= new producto_logic();
		$pagination= new Pagination();
		$producto_bodegaForeignKey->productosFK=array();

		$productoLogic->setConnexion($connexion);
		$productoLogic->getproductoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($producto_bodega_session==null) {
			$producto_bodega_session=new producto_bodega_session();
		}
		
		if($producto_bodega_session->bitBusquedaDesdeFKSesionproducto!=true) {
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
				if($producto_bodegaForeignKey->idproductoDefaultFK==0) {
					$producto_bodegaForeignKey->idproductoDefaultFK=$productoLocal->getId();
				}

				$producto_bodegaForeignKey->productosFK[$productoLocal->getId()]=producto_bodega_util::getproductoDescripcion($productoLocal);
			}

		} else {

			if($producto_bodega_session->bigidproductoActual!=null && $producto_bodega_session->bigidproductoActual > 0) {
				$productoLogic->getEntity($producto_bodega_session->bigidproductoActual);//WithConnection

				$producto_bodegaForeignKey->productosFK[$productoLogic->getproducto()->getId()]=producto_bodega_util::getproductoDescripcion($productoLogic->getproducto());
				$producto_bodegaForeignKey->idproductoDefaultFK=$productoLogic->getproducto()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($producto_bodega) {
		$this->saveRelacionesBase($producto_bodega,true);
	}

	public function saveRelaciones($producto_bodega) {
		$this->saveRelacionesBase($producto_bodega,false);
	}

	public function saveRelacionesBase($producto_bodega,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setproducto_bodega($producto_bodega);

			if(true) {

				//producto_bodega_logic_add::updateRelacionesToSave($producto_bodega,$this);

				if(($this->producto_bodega->getIsNew() || $this->producto_bodega->getIsChanged()) && !$this->producto_bodega->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->producto_bodega->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//producto_bodega_logic_add::updateRelacionesToSaveAfter($producto_bodega,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $producto_bodegas,producto_bodega_param_return $producto_bodegaParameterGeneral) : producto_bodega_param_return {
		$producto_bodegaReturnGeneral=new producto_bodega_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $producto_bodegaReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $producto_bodegas,producto_bodega_param_return $producto_bodegaParameterGeneral) : producto_bodega_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$producto_bodegaReturnGeneral=new producto_bodega_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $producto_bodegaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $producto_bodegas,producto_bodega $producto_bodega,producto_bodega_param_return $producto_bodegaParameterGeneral,bool $isEsNuevoproducto_bodega,array $clases) : producto_bodega_param_return {
		 try {	
			$producto_bodegaReturnGeneral=new producto_bodega_param_return();
	
			$producto_bodegaReturnGeneral->setproducto_bodega($producto_bodega);
			$producto_bodegaReturnGeneral->setproducto_bodegas($producto_bodegas);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$producto_bodegaReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $producto_bodegaReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $producto_bodegas,producto_bodega $producto_bodega,producto_bodega_param_return $producto_bodegaParameterGeneral,bool $isEsNuevoproducto_bodega,array $clases) : producto_bodega_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$producto_bodegaReturnGeneral=new producto_bodega_param_return();
	
			$producto_bodegaReturnGeneral->setproducto_bodega($producto_bodega);
			$producto_bodegaReturnGeneral->setproducto_bodegas($producto_bodegas);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$producto_bodegaReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $producto_bodegaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $producto_bodegas,producto_bodega $producto_bodega,producto_bodega_param_return $producto_bodegaParameterGeneral,bool $isEsNuevoproducto_bodega,array $clases) : producto_bodega_param_return {
		 try {	
			$producto_bodegaReturnGeneral=new producto_bodega_param_return();
	
			$producto_bodegaReturnGeneral->setproducto_bodega($producto_bodega);
			$producto_bodegaReturnGeneral->setproducto_bodegas($producto_bodegas);
			
			
			
			return $producto_bodegaReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $producto_bodegas,producto_bodega $producto_bodega,producto_bodega_param_return $producto_bodegaParameterGeneral,bool $isEsNuevoproducto_bodega,array $clases) : producto_bodega_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$producto_bodegaReturnGeneral=new producto_bodega_param_return();
	
			$producto_bodegaReturnGeneral->setproducto_bodega($producto_bodega);
			$producto_bodegaReturnGeneral->setproducto_bodegas($producto_bodegas);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $producto_bodegaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,producto_bodega $producto_bodega,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,producto_bodega $producto_bodega,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		producto_bodega_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(producto_bodega $producto_bodega,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//producto_bodega_logic_add::updateproducto_bodegaToGet($this->producto_bodega);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$producto_bodega->setbodega($this->producto_bodegaDataAccess->getbodega($this->connexion,$producto_bodega));
		$producto_bodega->setproducto($this->producto_bodegaDataAccess->getproducto($this->connexion,$producto_bodega));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$producto_bodega->setbodega($this->producto_bodegaDataAccess->getbodega($this->connexion,$producto_bodega));
				continue;
			}

			if($clas->clas==producto::$class.'') {
				$producto_bodega->setproducto($this->producto_bodegaDataAccess->getproducto($this->connexion,$producto_bodega));
				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$producto_bodega->setbodega($this->producto_bodegaDataAccess->getbodega($this->connexion,$producto_bodega));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$producto_bodega->setproducto($this->producto_bodegaDataAccess->getproducto($this->connexion,$producto_bodega));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$producto_bodega->setbodega($this->producto_bodegaDataAccess->getbodega($this->connexion,$producto_bodega));
		$bodegaLogic= new bodega_logic($this->connexion);
		$bodegaLogic->deepLoad($producto_bodega->getbodega(),$isDeep,$deepLoadType,$clases);
				
		$producto_bodega->setproducto($this->producto_bodegaDataAccess->getproducto($this->connexion,$producto_bodega));
		$productoLogic= new producto_logic($this->connexion);
		$productoLogic->deepLoad($producto_bodega->getproducto(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$producto_bodega->setbodega($this->producto_bodegaDataAccess->getbodega($this->connexion,$producto_bodega));
				$bodegaLogic= new bodega_logic($this->connexion);
				$bodegaLogic->deepLoad($producto_bodega->getbodega(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==producto::$class.'') {
				$producto_bodega->setproducto($this->producto_bodegaDataAccess->getproducto($this->connexion,$producto_bodega));
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepLoad($producto_bodega->getproducto(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$producto_bodega->setbodega($this->producto_bodegaDataAccess->getbodega($this->connexion,$producto_bodega));
			$bodegaLogic= new bodega_logic($this->connexion);
			$bodegaLogic->deepLoad($producto_bodega->getbodega(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$producto_bodega->setproducto($this->producto_bodegaDataAccess->getproducto($this->connexion,$producto_bodega));
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepLoad($producto_bodega->getproducto(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(producto_bodega $producto_bodega,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//producto_bodega_logic_add::updateproducto_bodegaToSave($this->producto_bodega);			
			
			if(!$paraDeleteCascade) {				
				producto_bodega_data::save($producto_bodega, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		bodega_data::save($producto_bodega->getbodega(),$this->connexion);
		producto_data::save($producto_bodega->getproducto(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				bodega_data::save($producto_bodega->getbodega(),$this->connexion);
				continue;
			}

			if($clas->clas==producto::$class.'') {
				producto_data::save($producto_bodega->getproducto(),$this->connexion);
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			bodega_data::save($producto_bodega->getbodega(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			producto_data::save($producto_bodega->getproducto(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		bodega_data::save($producto_bodega->getbodega(),$this->connexion);
		$bodegaLogic= new bodega_logic($this->connexion);
		$bodegaLogic->deepSave($producto_bodega->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		producto_data::save($producto_bodega->getproducto(),$this->connexion);
		$productoLogic= new producto_logic($this->connexion);
		$productoLogic->deepSave($producto_bodega->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				bodega_data::save($producto_bodega->getbodega(),$this->connexion);
				$bodegaLogic= new bodega_logic($this->connexion);
				$bodegaLogic->deepSave($producto_bodega->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==producto::$class.'') {
				producto_data::save($producto_bodega->getproducto(),$this->connexion);
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepSave($producto_bodega->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			bodega_data::save($producto_bodega->getbodega(),$this->connexion);
			$bodegaLogic= new bodega_logic($this->connexion);
			$bodegaLogic->deepSave($producto_bodega->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			producto_data::save($producto_bodega->getproducto(),$this->connexion);
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepSave($producto_bodega->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				producto_bodega_data::save($producto_bodega, $this->connexion);
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
			
			$this->deepLoad($this->producto_bodega,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->producto_bodegas as $producto_bodega) {
				$this->deepLoad($producto_bodega,$isDeep,$deepLoadType,$clases);
								
				producto_bodega_util::refrescarFKDescripciones($this->producto_bodegas);
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
			
			foreach($this->producto_bodegas as $producto_bodega) {
				$this->deepLoad($producto_bodega,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->producto_bodega,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->producto_bodegas as $producto_bodega) {
				$this->deepSave($producto_bodega,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->producto_bodegas as $producto_bodega) {
				$this->deepSave($producto_bodega,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(bodega::$class);
				$classes[]=new Classe(producto::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==bodega::$class) {
						$classes[]=new Classe(bodega::$class);
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
					if($clas->clas==bodega::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(bodega::$class);
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
	
	
	
	
	
	
	
	public function getproducto_bodega() : ?producto_bodega {	
		/*
		producto_bodega_logic_add::checkproducto_bodegaToGet($this->producto_bodega,$this->datosCliente);
		producto_bodega_logic_add::updateproducto_bodegaToGet($this->producto_bodega);
		*/
			
		return $this->producto_bodega;
	}
		
	public function setproducto_bodega(producto_bodega $newproducto_bodega) {
		$this->producto_bodega = $newproducto_bodega;
	}
	
	public function getproducto_bodegas() : array {		
		/*
		producto_bodega_logic_add::checkproducto_bodegaToGets($this->producto_bodegas,$this->datosCliente);
		
		foreach ($this->producto_bodegas as $producto_bodegaLocal ) {
			producto_bodega_logic_add::updateproducto_bodegaToGet($producto_bodegaLocal);
		}
		*/
		
		return $this->producto_bodegas;
	}
	
	public function setproducto_bodegas(array $newproducto_bodegas) {
		$this->producto_bodegas = $newproducto_bodegas;
	}
	
	public function getproducto_bodegaDataAccess() : producto_bodega_data {
		return $this->producto_bodegaDataAccess;
	}
	
	public function setproducto_bodegaDataAccess(producto_bodega_data $newproducto_bodegaDataAccess) {
		$this->producto_bodegaDataAccess = $newproducto_bodegaDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        producto_bodega_carga::$CONTROLLER;;        
		
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
