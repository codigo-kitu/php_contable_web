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

namespace com\bydan\contabilidad\inventario\bodega\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\inventario\bodega\util\bodega_carga;
use com\bydan\contabilidad\inventario\bodega\util\bodega_param_return;

use com\bydan\contabilidad\inventario\bodega\presentation\session\bodega_session;

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

use com\bydan\contabilidad\inventario\bodega\util\bodega_util;
use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;
use com\bydan\contabilidad\inventario\bodega\business\data\bodega_data;

//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;
use com\bydan\contabilidad\general\sucursal\business\data\sucursal_data;
use com\bydan\contabilidad\general\sucursal\business\logic\sucursal_logic;
use com\bydan\contabilidad\general\sucursal\util\sucursal_util;

//REL


use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\business\data\producto_data;
use com\bydan\contabilidad\inventario\producto\business\logic\producto_logic;
use com\bydan\contabilidad\inventario\producto\util\producto_carga;
use com\bydan\contabilidad\inventario\producto\util\producto_util;

use com\bydan\contabilidad\inventario\producto_bodega\business\entity\producto_bodega;
use com\bydan\contabilidad\inventario\producto_bodega\business\data\producto_bodega_data;
use com\bydan\contabilidad\inventario\producto_bodega\business\logic\producto_bodega_logic;
use com\bydan\contabilidad\inventario\producto_bodega\util\producto_bodega_carga;
use com\bydan\contabilidad\inventario\producto_bodega\util\producto_bodega_util;

//REL DETALLES




class bodega_logic  extends GeneralEntityLogic implements bodega_logicI {	
	/*GENERAL*/
	public bodega_data $bodegaDataAccess;
	//public ?bodega_logic_add $bodegaLogicAdditional=null;
	public ?bodega $bodega;
	public array $bodegas;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->bodegaDataAccess = new bodega_data();			
			$this->bodegas = array();
			$this->bodega = new bodega();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->bodegaLogicAdditional = new bodega_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->bodegaLogicAdditional==null) {
		//	$this->bodegaLogicAdditional=new bodega_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->bodegaDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->bodegaDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->bodegaDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->bodegaDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->bodegas = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->bodegas=$this->bodegaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				bodega_util::refrescarFKDescripciones($this->bodegas);
			}
			
			//bodega_logic_add::checkbodegaToGets($this->bodegas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->bodegas);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->bodegas = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->bodegas=$this->bodegaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				bodega_util::refrescarFKDescripciones($this->bodegas);
			}
			
			//bodega_logic_add::checkbodegaToGets($this->bodegas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->bodegas);
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
		$this->bodega = new bodega();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->bodega=$this->bodegaDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->bodega,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				bodega_util::refrescarFKDescripcion($this->bodega);
			}
						
			//bodega_logic_add::checkbodegaToGet($this->bodega,$this->datosCliente);
			//bodega_logic_add::updatebodegaToGet($this->bodega);
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
		$this->bodega = new  bodega();
		  		  
        try {		
			$this->bodega=$this->bodegaDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->bodega,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				bodega_util::refrescarFKDescripcion($this->bodega);
			}
			
			//bodega_logic_add::checkbodegaToGet($this->bodega,$this->datosCliente);
			//bodega_logic_add::updatebodegaToGet($this->bodega);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?bodega {
		$bodegaLogic = new  bodega_logic();
		  		  
        try {		
			$bodegaLogic->setConnexion($connexion);			
			$bodegaLogic->getEntity($id);			
			return $bodegaLogic->getbodega();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->bodega = new  bodega();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->bodega=$this->bodegaDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->bodega,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				bodega_util::refrescarFKDescripcion($this->bodega);
			}
			
			//bodega_logic_add::checkbodegaToGet($this->bodega,$this->datosCliente);
			//bodega_logic_add::updatebodegaToGet($this->bodega);
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
		$this->bodega = new  bodega();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->bodega=$this->bodegaDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->bodega,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				bodega_util::refrescarFKDescripcion($this->bodega);
			}
			
			//bodega_logic_add::checkbodegaToGet($this->bodega,$this->datosCliente);
			//bodega_logic_add::updatebodegaToGet($this->bodega);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?bodega {
		$bodegaLogic = new  bodega_logic();
		  		  
        try {		
			$bodegaLogic->setConnexion($connexion);			
			$bodegaLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $bodegaLogic->getbodega();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->bodegas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->bodegas=$this->bodegaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				bodega_util::refrescarFKDescripciones($this->bodegas);
			}
			
			//bodega_logic_add::checkbodegaToGets($this->bodegas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->bodegas);			
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
		$this->bodegas = array();
		  		  
        try {			
			$this->bodegas=$this->bodegaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				bodega_util::refrescarFKDescripciones($this->bodegas);
			}
			
			//bodega_logic_add::checkbodegaToGets($this->bodegas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->bodegas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->bodegas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->bodegas=$this->bodegaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				bodega_util::refrescarFKDescripciones($this->bodegas);
			}
			
			//bodega_logic_add::checkbodegaToGets($this->bodegas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->bodegas);
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
		$this->bodegas = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->bodegas=$this->bodegaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				bodega_util::refrescarFKDescripciones($this->bodegas);
			}
			
			//bodega_logic_add::checkbodegaToGets($this->bodegas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->bodegas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$bodegaLogic = new  bodega_logic();
		  		  
        try {		
			$bodegaLogic->setConnexion($connexion);			
			$bodegaLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $bodegaLogic->getbodegas();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->bodegas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->bodegas=$this->bodegaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				bodega_util::refrescarFKDescripciones($this->bodegas);
			}
			
			//bodega_logic_add::checkbodegaToGets($this->bodegas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->bodegas);
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
		$this->bodegas = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->bodegas=$this->bodegaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				bodega_util::refrescarFKDescripciones($this->bodegas);
			}
			
			//bodega_logic_add::checkbodegaToGets($this->bodegas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->bodegas);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->bodegas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->bodegas=$this->bodegaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				bodega_util::refrescarFKDescripciones($this->bodegas);
			}
			
			//bodega_logic_add::checkbodegaToGets($this->bodegas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->bodegas);
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
		$this->bodegas = array();
		  		  
        try {			
			$this->bodegas=$this->bodegaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				bodega_util::refrescarFKDescripciones($this->bodegas);
			}	
			
			//bodega_logic_add::checkbodegaToGets($this->bodegas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->bodegas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->bodegas = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->bodegas=$this->bodegaDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				bodega_util::refrescarFKDescripciones($this->bodegas);
			}
			
			//bodega_logic_add::checkbodegaToGets($this->bodegas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->bodegas);
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
		$this->bodegas = array();
		  		  
        try {		
			$this->bodegas=$this->bodegaDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				bodega_util::refrescarFKDescripciones($this->bodegas);
			}
			
			//bodega_logic_add::checkbodegaToGets($this->bodegas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->bodegas);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,bodega_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->bodegas=$this->bodegaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				bodega_util::refrescarFKDescripciones($this->bodegas);
			}
			//bodega_logic_add::checkbodegaToGets($this->bodegas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->bodegas);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,bodega_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->bodegas=$this->bodegaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				bodega_util::refrescarFKDescripciones($this->bodegas);
			}
			//bodega_logic_add::checkbodegaToGets($this->bodegas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->bodegas);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdsucursalWithConnection(string $strFinalQuery,Pagination $pagination,int $id_sucursal) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_sucursal= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,bodega_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->bodegas=$this->bodegaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				bodega_util::refrescarFKDescripciones($this->bodegas);
			}
			//bodega_logic_add::checkbodegaToGets($this->bodegas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->bodegas);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idsucursal(string $strFinalQuery,Pagination $pagination,int $id_sucursal) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_sucursal= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,bodega_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->bodegas=$this->bodegaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				bodega_util::refrescarFKDescripciones($this->bodegas);
			}
			//bodega_logic_add::checkbodegaToGets($this->bodegas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->bodegas);
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
						
			//bodega_logic_add::checkbodegaToSave($this->bodega,$this->datosCliente,$this->connexion);	       
			//bodega_logic_add::updatebodegaToSave($this->bodega);			
			bodega_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->bodega,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->bodegaLogicAdditional->checkGeneralEntityToSave($this,$this->bodega,$this->datosCliente,$this->connexion);
			
			
			bodega_data::save($this->bodega, $this->connexion);	    	       	 				
			//bodega_logic_add::checkbodegaToSaveAfter($this->bodega,$this->datosCliente,$this->connexion);			
			//$this->bodegaLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->bodega,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->bodega,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->bodega,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				bodega_util::refrescarFKDescripcion($this->bodega);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->bodega->getIsDeleted()) {
				$this->bodega=null;
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
						
			/*bodega_logic_add::checkbodegaToSave($this->bodega,$this->datosCliente,$this->connexion);*/	        
			//bodega_logic_add::updatebodegaToSave($this->bodega);			
			//$this->bodegaLogicAdditional->checkGeneralEntityToSave($this,$this->bodega,$this->datosCliente,$this->connexion);			
			bodega_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->bodega,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			bodega_data::save($this->bodega, $this->connexion);	    	       	 						
			/*bodega_logic_add::checkbodegaToSaveAfter($this->bodega,$this->datosCliente,$this->connexion);*/			
			//$this->bodegaLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->bodega,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->bodega,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->bodega,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				bodega_util::refrescarFKDescripcion($this->bodega);				
			}
			
			if($this->bodega->getIsDeleted()) {
				$this->bodega=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(bodega $bodega,Connexion $connexion)  {
		$bodegaLogic = new  bodega_logic();		  		  
        try {		
			$bodegaLogic->setConnexion($connexion);			
			$bodegaLogic->setbodega($bodega);			
			$bodegaLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*bodega_logic_add::checkbodegaToSaves($this->bodegas,$this->datosCliente,$this->connexion);*/	        	
			//$this->bodegaLogicAdditional->checkGeneralEntitiesToSaves($this,$this->bodegas,$this->datosCliente,$this->connexion);
			
	   		foreach($this->bodegas as $bodegaLocal) {				
								
				//bodega_logic_add::updatebodegaToSave($bodegaLocal);	        	
				bodega_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$bodegaLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				bodega_data::save($bodegaLocal, $this->connexion);				
			}
			
			/*bodega_logic_add::checkbodegaToSavesAfter($this->bodegas,$this->datosCliente,$this->connexion);*/			
			//$this->bodegaLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->bodegas,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				bodega_util::refrescarFKDescripciones($this->bodegas);
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
			/*bodega_logic_add::checkbodegaToSaves($this->bodegas,$this->datosCliente,$this->connexion);*/			
			//$this->bodegaLogicAdditional->checkGeneralEntitiesToSaves($this,$this->bodegas,$this->datosCliente,$this->connexion);
			
	   		foreach($this->bodegas as $bodegaLocal) {				
								
				//bodega_logic_add::updatebodegaToSave($bodegaLocal);	        	
				bodega_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$bodegaLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				bodega_data::save($bodegaLocal, $this->connexion);				
			}			
			
			/*bodega_logic_add::checkbodegaToSavesAfter($this->bodegas,$this->datosCliente,$this->connexion);*/			
			//$this->bodegaLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->bodegas,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				bodega_util::refrescarFKDescripciones($this->bodegas);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $bodegas,Connexion $connexion)  {
		$bodegaLogic = new  bodega_logic();
		  		  
        try {		
			$bodegaLogic->setConnexion($connexion);			
			$bodegaLogic->setbodegas($bodegas);			
			$bodegaLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$bodegasAux=array();
		
		foreach($this->bodegas as $bodega) {
			if($bodega->getIsDeleted()==false) {
				$bodegasAux[]=$bodega;
			}
		}
		
		$this->bodegas=$bodegasAux;
	}
	
	public function updateToGetsAuxiliar(array &$bodegas) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->bodegas as $bodega) {
				
				$bodega->setid_empresa_Descripcion(bodega_util::getempresaDescripcion($bodega->getempresa()));
				$bodega->setid_sucursal_Descripcion(bodega_util::getsucursalDescripcion($bodega->getsucursal()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$bodega_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$bodega_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$bodega_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$bodega_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$bodega_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$bodegaForeignKey=new bodega_param_return();//bodegaForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$bodegaForeignKey,$bodega_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTipos,',')) {
				$this->cargarCombossucursalsFK($this->connexion,$strRecargarFkQuery,$bodegaForeignKey,$bodega_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$bodegaForeignKey,$bodega_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombossucursalsFK($this->connexion,' where id=-1 ',$bodegaForeignKey,$bodega_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $bodegaForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$bodegaForeignKey,$bodega_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$bodegaForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($bodega_session==null) {
			$bodega_session=new bodega_session();
		}
		
		if($bodega_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($bodegaForeignKey->idempresaDefaultFK==0) {
					$bodegaForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$bodegaForeignKey->empresasFK[$empresaLocal->getId()]=bodega_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($bodega_session->bigidempresaActual!=null && $bodega_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($bodega_session->bigidempresaActual);//WithConnection

				$bodegaForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=bodega_util::getempresaDescripcion($empresaLogic->getempresa());
				$bodegaForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombossucursalsFK($connexion=null,$strRecargarFkQuery='',$bodegaForeignKey,$bodega_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$sucursalLogic= new sucursal_logic();
		$pagination= new Pagination();
		$bodegaForeignKey->sucursalsFK=array();

		$sucursalLogic->setConnexion($connexion);
		$sucursalLogic->getsucursalDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($bodega_session==null) {
			$bodega_session=new bodega_session();
		}
		
		if($bodega_session->bitBusquedaDesdeFKSesionsucursal!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=sucursal_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalsucursal=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalsucursal=Funciones::GetFinalQueryAppend($finalQueryGlobalsucursal, '');
				$finalQueryGlobalsucursal.=sucursal_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalsucursal.$strRecargarFkQuery;		

				$sucursalLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($sucursalLogic->getsucursals() as $sucursalLocal ) {
				if($bodegaForeignKey->idsucursalDefaultFK==0) {
					$bodegaForeignKey->idsucursalDefaultFK=$sucursalLocal->getId();
				}

				$bodegaForeignKey->sucursalsFK[$sucursalLocal->getId()]=bodega_util::getsucursalDescripcion($sucursalLocal);
			}

		} else {

			if($bodega_session->bigidsucursalActual!=null && $bodega_session->bigidsucursalActual > 0) {
				$sucursalLogic->getEntity($bodega_session->bigidsucursalActual);//WithConnection

				$bodegaForeignKey->sucursalsFK[$sucursalLogic->getsucursal()->getId()]=bodega_util::getsucursalDescripcion($sucursalLogic->getsucursal());
				$bodegaForeignKey->idsucursalDefaultFK=$sucursalLogic->getsucursal()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($bodega,$producto_defectos,$productobodegas) {
		$this->saveRelacionesBase($bodega,$producto_defectos,$productobodegas,true);
	}

	public function saveRelaciones($bodega,$producto_defectos,$productobodegas) {
		$this->saveRelacionesBase($bodega,$producto_defectos,$productobodegas,false);
	}

	public function saveRelacionesBase($bodega,$producto_defectos=array(),$productobodegas=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$bodega->setproducto_defectos($producto_defectos);
			$bodega->setproducto_bodegas($productobodegas);
			$this->setbodega($bodega);

			if(true) {

				//bodega_logic_add::updateRelacionesToSave($bodega,$this);

				if(($this->bodega->getIsNew() || $this->bodega->getIsChanged()) && !$this->bodega->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($producto_defectos,$productobodegas);

				} else if($this->bodega->getIsDeleted()) {
					$this->saveRelacionesDetalles($producto_defectos,$productobodegas);
					$this->save();
				}

				//bodega_logic_add::updateRelacionesToSaveAfter($bodega,$this);

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
	
	
	public function saveRelacionesDetalles($producto_defectos=array(),$productobodegas=array()) {
		try {
	

			$idbodegaActual=$this->getbodega()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/producto_carga.php');
			producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$producto_defectoLogic_Desde_bodega=new producto_logic();
			$producto_defectoLogic_Desde_bodega->setproductos($producto_defectos);

			$producto_defectoLogic_Desde_bodega->setConnexion($this->getConnexion());
			$producto_defectoLogic_Desde_bodega->setDatosCliente($this->datosCliente);

			foreach($producto_defectoLogic_Desde_bodega->getproductos() as $producto_Desde_bodega) {
				$producto_Desde_bodega->setid_bodega_defecto($idbodegaActual);

				$producto_defectoLogic_Desde_bodega->setproducto($producto_Desde_bodega);
				$producto_defectoLogic_Desde_bodega->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/producto_bodega_carga.php');
			producto_bodega_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$productobodegaLogic_Desde_bodega=new producto_bodega_logic();
			$productobodegaLogic_Desde_bodega->setproducto_bodegas($productobodegas);

			$productobodegaLogic_Desde_bodega->setConnexion($this->getConnexion());
			$productobodegaLogic_Desde_bodega->setDatosCliente($this->datosCliente);

			foreach($productobodegaLogic_Desde_bodega->getproducto_bodegas() as $productobodega_Desde_bodega) {
				$productobodega_Desde_bodega->setid_bodega($idbodegaActual);
			}

			$productobodegaLogic_Desde_bodega->saves();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $bodegas,bodega_param_return $bodegaParameterGeneral) : bodega_param_return {
		$bodegaReturnGeneral=new bodega_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $bodegaReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $bodegas,bodega_param_return $bodegaParameterGeneral) : bodega_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$bodegaReturnGeneral=new bodega_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $bodegaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $bodegas,bodega $bodega,bodega_param_return $bodegaParameterGeneral,bool $isEsNuevobodega,array $clases) : bodega_param_return {
		 try {	
			$bodegaReturnGeneral=new bodega_param_return();
	
			$bodegaReturnGeneral->setbodega($bodega);
			$bodegaReturnGeneral->setbodegas($bodegas);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$bodegaReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $bodegaReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $bodegas,bodega $bodega,bodega_param_return $bodegaParameterGeneral,bool $isEsNuevobodega,array $clases) : bodega_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$bodegaReturnGeneral=new bodega_param_return();
	
			$bodegaReturnGeneral->setbodega($bodega);
			$bodegaReturnGeneral->setbodegas($bodegas);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$bodegaReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $bodegaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $bodegas,bodega $bodega,bodega_param_return $bodegaParameterGeneral,bool $isEsNuevobodega,array $clases) : bodega_param_return {
		 try {	
			$bodegaReturnGeneral=new bodega_param_return();
	
			$bodegaReturnGeneral->setbodega($bodega);
			$bodegaReturnGeneral->setbodegas($bodegas);
			
			
			
			return $bodegaReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $bodegas,bodega $bodega,bodega_param_return $bodegaParameterGeneral,bool $isEsNuevobodega,array $clases) : bodega_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$bodegaReturnGeneral=new bodega_param_return();
	
			$bodegaReturnGeneral->setbodega($bodega);
			$bodegaReturnGeneral->setbodegas($bodegas);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $bodegaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,bodega $bodega,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,bodega $bodega,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		bodega_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		bodega_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(bodega $bodega,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//bodega_logic_add::updatebodegaToGet($this->bodega);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$bodega->setempresa($this->bodegaDataAccess->getempresa($this->connexion,$bodega));
		$bodega->setsucursal($this->bodegaDataAccess->getsucursal($this->connexion,$bodega));
		$bodega->setproducto_defectos($this->bodegaDataAccess->getproducto_defectos($this->connexion,$bodega));
		$bodega->setproducto_bodegas($this->bodegaDataAccess->getproducto_bodegas($this->connexion,$bodega));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$bodega->setempresa($this->bodegaDataAccess->getempresa($this->connexion,$bodega));
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$bodega->setsucursal($this->bodegaDataAccess->getsucursal($this->connexion,$bodega));
				continue;
			}

			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$bodega->setproducto_defectos($this->bodegaDataAccess->getproducto_defectos($this->connexion,$bodega));

				if($this->isConDeep) {
					$productoLogic= new producto_logic($this->connexion);
					$productoLogic->setproductos($bodega->getproducto_defectos());
					$classesLocal=producto_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$productoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					producto_util::refrescarFKDescripciones($productoLogic->getproductos());
					$bodega->setproducto_defectos($productoLogic->getproductos());
				}

				continue;
			}

			if($clas->clas==producto_bodega::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$bodega->setproducto_bodegas($this->bodegaDataAccess->getproducto_bodegas($this->connexion,$bodega));

				if($this->isConDeep) {
					$productobodegaLogic= new producto_bodega_logic($this->connexion);
					$productobodegaLogic->setproducto_bodegas($bodega->getproducto_bodegas());
					$classesLocal=producto_bodega_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$productobodegaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					producto_bodega_util::refrescarFKDescripciones($productobodegaLogic->getproducto_bodegas());
					$bodega->setproducto_bodegas($productobodegaLogic->getproducto_bodegas());
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
			$bodega->setempresa($this->bodegaDataAccess->getempresa($this->connexion,$bodega));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$bodega->setsucursal($this->bodegaDataAccess->getsucursal($this->connexion,$bodega));
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
			$bodega->setproducto_defectos($this->bodegaDataAccess->getproducto_defectos($this->connexion,$bodega));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto_bodega::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(producto_bodega::$class);
			$bodega->setproducto_bodegas($this->bodegaDataAccess->getproducto_bodegas($this->connexion,$bodega));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$bodega->setempresa($this->bodegaDataAccess->getempresa($this->connexion,$bodega));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($bodega->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$bodega->setsucursal($this->bodegaDataAccess->getsucursal($this->connexion,$bodega));
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepLoad($bodega->getsucursal(),$isDeep,$deepLoadType,$clases);
				

		$bodega->setproducto_defectos($this->bodegaDataAccess->getproducto_defectos($this->connexion,$bodega));

		foreach($bodega->getproducto_defectos() as $producto) {
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepLoad($producto,$isDeep,$deepLoadType,$clases);
		}

		$bodega->setproducto_bodegas($this->bodegaDataAccess->getproducto_bodegas($this->connexion,$bodega));

		foreach($bodega->getproducto_bodegas() as $productobodega) {
			$productobodegaLogic= new producto_bodega_logic($this->connexion);
			$productobodegaLogic->deepLoad($productobodega,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$bodega->setempresa($this->bodegaDataAccess->getempresa($this->connexion,$bodega));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($bodega->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$bodega->setsucursal($this->bodegaDataAccess->getsucursal($this->connexion,$bodega));
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepLoad($bodega->getsucursal(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$bodega->setproducto_defectos($this->bodegaDataAccess->getproducto_defectos($this->connexion,$bodega));

				foreach($bodega->getproducto_defectos() as $producto) {
					$productoLogic= new producto_logic($this->connexion);
					$productoLogic->deepLoad($producto,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==producto_bodega::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$bodega->setproducto_bodegas($this->bodegaDataAccess->getproducto_bodegas($this->connexion,$bodega));

				foreach($bodega->getproducto_bodegas() as $productobodega) {
					$productobodegaLogic= new producto_bodega_logic($this->connexion);
					$productobodegaLogic->deepLoad($productobodega,$isDeep,$deepLoadType,$clases);
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
			$bodega->setempresa($this->bodegaDataAccess->getempresa($this->connexion,$bodega));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($bodega->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$bodega->setsucursal($this->bodegaDataAccess->getsucursal($this->connexion,$bodega));
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepLoad($bodega->getsucursal(),$isDeep,$deepLoadType,$clases);
				
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
			$bodega->setproducto_defectos($this->bodegaDataAccess->getproducto_defectos($this->connexion,$bodega));

			foreach($bodega->getproducto_defectos() as $producto) {
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepLoad($producto,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto_bodega::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(producto_bodega::$class);
			$bodega->setproducto_bodegas($this->bodegaDataAccess->getproducto_bodegas($this->connexion,$bodega));

			foreach($bodega->getproducto_bodegas() as $productobodega) {
				$productobodegaLogic= new producto_bodega_logic($this->connexion);
				$productobodegaLogic->deepLoad($productobodega,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(bodega $bodega,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//bodega_logic_add::updatebodegaToSave($this->bodega);			
			
			if(!$paraDeleteCascade) {				
				bodega_data::save($bodega, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($bodega->getempresa(),$this->connexion);
		sucursal_data::save($bodega->getsucursal(),$this->connexion);

		foreach($bodega->getproducto_defectos() as $producto) {
			$producto->setid_bodega($bodega->getId());
			producto_data::save($producto,$this->connexion);
		}


		foreach($bodega->getproducto_bodegas() as $productobodega) {
			$productobodega->setid_bodega($bodega->getId());
			producto_bodega_data::save($productobodega,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($bodega->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($bodega->getsucursal(),$this->connexion);
				continue;
			}


			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($bodega->getproducto_defectos() as $producto) {
					$producto->setid_bodega($bodega->getId());
					producto_data::save($producto,$this->connexion);
				}

				continue;
			}

			if($clas->clas==producto_bodega::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($bodega->getproducto_bodegas() as $productobodega) {
					$productobodega->setid_bodega($bodega->getId());
					producto_bodega_data::save($productobodega,$this->connexion);
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
			empresa_data::save($bodega->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($bodega->getsucursal(),$this->connexion);
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

			foreach($bodega->getproducto_defectos() as $producto) {
				$producto->setid_bodega($bodega->getId());
				producto_data::save($producto,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto_bodega::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(producto_bodega::$class);

			foreach($bodega->getproducto_bodegas() as $productobodega) {
				$productobodega->setid_bodega($bodega->getId());
				producto_bodega_data::save($productobodega,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($bodega->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($bodega->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		sucursal_data::save($bodega->getsucursal(),$this->connexion);
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepSave($bodega->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($bodega->getproducto_defectos() as $producto) {
			$productoLogic= new producto_logic($this->connexion);
			$producto->setid_bodega($bodega->getId());
			producto_data::save($producto,$this->connexion);
			$productoLogic->deepSave($producto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($bodega->getproducto_bodegas() as $productobodega) {
			$productobodegaLogic= new producto_bodega_logic($this->connexion);
			$productobodega->setid_bodega($bodega->getId());
			producto_bodega_data::save($productobodega,$this->connexion);
			$productobodegaLogic->deepSave($productobodega,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($bodega->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($bodega->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($bodega->getsucursal(),$this->connexion);
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepSave($bodega->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($bodega->getproducto_defectos() as $producto) {
					$productoLogic= new producto_logic($this->connexion);
					$producto->setid_bodega($bodega->getId());
					producto_data::save($producto,$this->connexion);
					$productoLogic->deepSave($producto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==producto_bodega::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($bodega->getproducto_bodegas() as $productobodega) {
					$productobodegaLogic= new producto_bodega_logic($this->connexion);
					$productobodega->setid_bodega($bodega->getId());
					producto_bodega_data::save($productobodega,$this->connexion);
					$productobodegaLogic->deepSave($productobodega,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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
			empresa_data::save($bodega->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($bodega->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($bodega->getsucursal(),$this->connexion);
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepSave($bodega->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
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

			foreach($bodega->getproducto_defectos() as $producto) {
				$productoLogic= new producto_logic($this->connexion);
				$producto->setid_bodega($bodega->getId());
				producto_data::save($producto,$this->connexion);
				$productoLogic->deepSave($producto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto_bodega::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(producto_bodega::$class);

			foreach($bodega->getproducto_bodegas() as $productobodega) {
				$productobodegaLogic= new producto_bodega_logic($this->connexion);
				$productobodega->setid_bodega($bodega->getId());
				producto_bodega_data::save($productobodega,$this->connexion);
				$productobodegaLogic->deepSave($productobodega,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				bodega_data::save($bodega, $this->connexion);
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
			
			$this->deepLoad($this->bodega,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->bodegas as $bodega) {
				$this->deepLoad($bodega,$isDeep,$deepLoadType,$clases);
								
				bodega_util::refrescarFKDescripciones($this->bodegas);
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
			
			foreach($this->bodegas as $bodega) {
				$this->deepLoad($bodega,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->bodega,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->bodegas as $bodega) {
				$this->deepSave($bodega,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->bodegas as $bodega) {
				$this->deepSave($bodega,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(sucursal::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==sucursal::$class) {
						$classes[]=new Classe(sucursal::$class);
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
					if($clas->clas==sucursal::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(sucursal::$class);
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
				
				$classes[]=new Classe(producto::$class);
				$classes[]=new Classe(producto_bodega::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==producto::$class) {
						$classes[]=new Classe(producto::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==producto_bodega::$class) {
						$classes[]=new Classe(producto_bodega::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

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
					if($clas->clas==producto_bodega::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(producto_bodega::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getbodega() : ?bodega {	
		/*
		bodega_logic_add::checkbodegaToGet($this->bodega,$this->datosCliente);
		bodega_logic_add::updatebodegaToGet($this->bodega);
		*/
			
		return $this->bodega;
	}
		
	public function setbodega(bodega $newbodega) {
		$this->bodega = $newbodega;
	}
	
	public function getbodegas() : array {		
		/*
		bodega_logic_add::checkbodegaToGets($this->bodegas,$this->datosCliente);
		
		foreach ($this->bodegas as $bodegaLocal ) {
			bodega_logic_add::updatebodegaToGet($bodegaLocal);
		}
		*/
		
		return $this->bodegas;
	}
	
	public function setbodegas(array $newbodegas) {
		$this->bodegas = $newbodegas;
	}
	
	public function getbodegaDataAccess() : bodega_data {
		return $this->bodegaDataAccess;
	}
	
	public function setbodegaDataAccess(bodega_data $newbodegaDataAccess) {
		$this->bodegaDataAccess = $newbodegaDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        bodega_carga::$CONTROLLER;;        
		
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
