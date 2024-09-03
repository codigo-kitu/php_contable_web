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

namespace com\bydan\contabilidad\inventario\imagen_orden_compra\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\inventario\imagen_orden_compra\util\imagen_orden_compra_carga;
use com\bydan\contabilidad\inventario\imagen_orden_compra\util\imagen_orden_compra_param_return;


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

use com\bydan\contabilidad\inventario\imagen_orden_compra\util\imagen_orden_compra_util;
use com\bydan\contabilidad\inventario\imagen_orden_compra\business\entity\imagen_orden_compra;
use com\bydan\contabilidad\inventario\imagen_orden_compra\business\data\imagen_orden_compra_data;

//FK


//REL


//REL DETALLES




class imagen_orden_compra_logic  extends GeneralEntityLogic implements imagen_orden_compra_logicI {	
	/*GENERAL*/
	public imagen_orden_compra_data $imagen_orden_compraDataAccess;
	//public ?imagen_orden_compra_logic_add $imagen_orden_compraLogicAdditional=null;
	public ?imagen_orden_compra $imagen_orden_compra;
	public array $imagen_orden_compras;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->imagen_orden_compraDataAccess = new imagen_orden_compra_data();			
			$this->imagen_orden_compras = array();
			$this->imagen_orden_compra = new imagen_orden_compra();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->imagen_orden_compraLogicAdditional = new imagen_orden_compra_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->imagen_orden_compraLogicAdditional==null) {
		//	$this->imagen_orden_compraLogicAdditional=new imagen_orden_compra_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->imagen_orden_compraDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->imagen_orden_compraDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->imagen_orden_compraDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->imagen_orden_compraDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->imagen_orden_compras = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_orden_compras=$this->imagen_orden_compraDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_orden_compra_util::refrescarFKDescripciones($this->imagen_orden_compras);
			}
			
			//imagen_orden_compra_logic_add::checkimagen_orden_compraToGets($this->imagen_orden_compras,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_orden_compras);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->imagen_orden_compras = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_orden_compras=$this->imagen_orden_compraDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_orden_compra_util::refrescarFKDescripciones($this->imagen_orden_compras);
			}
			
			//imagen_orden_compra_logic_add::checkimagen_orden_compraToGets($this->imagen_orden_compras,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_orden_compras);
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
		$this->imagen_orden_compra = new imagen_orden_compra();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->imagen_orden_compra=$this->imagen_orden_compraDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_orden_compra,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_orden_compra_util::refrescarFKDescripcion($this->imagen_orden_compra);
			}
						
			//imagen_orden_compra_logic_add::checkimagen_orden_compraToGet($this->imagen_orden_compra,$this->datosCliente);
			//imagen_orden_compra_logic_add::updateimagen_orden_compraToGet($this->imagen_orden_compra);
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
		$this->imagen_orden_compra = new  imagen_orden_compra();
		  		  
        try {		
			$this->imagen_orden_compra=$this->imagen_orden_compraDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_orden_compra,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_orden_compra_util::refrescarFKDescripcion($this->imagen_orden_compra);
			}
			
			//imagen_orden_compra_logic_add::checkimagen_orden_compraToGet($this->imagen_orden_compra,$this->datosCliente);
			//imagen_orden_compra_logic_add::updateimagen_orden_compraToGet($this->imagen_orden_compra);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?imagen_orden_compra {
		$imagen_orden_compraLogic = new  imagen_orden_compra_logic();
		  		  
        try {		
			$imagen_orden_compraLogic->setConnexion($connexion);			
			$imagen_orden_compraLogic->getEntity($id);			
			return $imagen_orden_compraLogic->getimagen_orden_compra();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->imagen_orden_compra = new  imagen_orden_compra();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->imagen_orden_compra=$this->imagen_orden_compraDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_orden_compra,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_orden_compra_util::refrescarFKDescripcion($this->imagen_orden_compra);
			}
			
			//imagen_orden_compra_logic_add::checkimagen_orden_compraToGet($this->imagen_orden_compra,$this->datosCliente);
			//imagen_orden_compra_logic_add::updateimagen_orden_compraToGet($this->imagen_orden_compra);
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
		$this->imagen_orden_compra = new  imagen_orden_compra();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_orden_compra=$this->imagen_orden_compraDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_orden_compra,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_orden_compra_util::refrescarFKDescripcion($this->imagen_orden_compra);
			}
			
			//imagen_orden_compra_logic_add::checkimagen_orden_compraToGet($this->imagen_orden_compra,$this->datosCliente);
			//imagen_orden_compra_logic_add::updateimagen_orden_compraToGet($this->imagen_orden_compra);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?imagen_orden_compra {
		$imagen_orden_compraLogic = new  imagen_orden_compra_logic();
		  		  
        try {		
			$imagen_orden_compraLogic->setConnexion($connexion);			
			$imagen_orden_compraLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $imagen_orden_compraLogic->getimagen_orden_compra();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->imagen_orden_compras = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->imagen_orden_compras=$this->imagen_orden_compraDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_orden_compra_util::refrescarFKDescripciones($this->imagen_orden_compras);
			}
			
			//imagen_orden_compra_logic_add::checkimagen_orden_compraToGets($this->imagen_orden_compras,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_orden_compras);			
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
		$this->imagen_orden_compras = array();
		  		  
        try {			
			$this->imagen_orden_compras=$this->imagen_orden_compraDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_orden_compra_util::refrescarFKDescripciones($this->imagen_orden_compras);
			}
			
			//imagen_orden_compra_logic_add::checkimagen_orden_compraToGets($this->imagen_orden_compras,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_orden_compras);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->imagen_orden_compras = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_orden_compras=$this->imagen_orden_compraDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_orden_compra_util::refrescarFKDescripciones($this->imagen_orden_compras);
			}
			
			//imagen_orden_compra_logic_add::checkimagen_orden_compraToGets($this->imagen_orden_compras,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_orden_compras);
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
		$this->imagen_orden_compras = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_orden_compras=$this->imagen_orden_compraDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_orden_compra_util::refrescarFKDescripciones($this->imagen_orden_compras);
			}
			
			//imagen_orden_compra_logic_add::checkimagen_orden_compraToGets($this->imagen_orden_compras,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_orden_compras);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$imagen_orden_compraLogic = new  imagen_orden_compra_logic();
		  		  
        try {		
			$imagen_orden_compraLogic->setConnexion($connexion);			
			$imagen_orden_compraLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $imagen_orden_compraLogic->getimagen_orden_compras();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->imagen_orden_compras = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->imagen_orden_compras=$this->imagen_orden_compraDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_orden_compra_util::refrescarFKDescripciones($this->imagen_orden_compras);
			}
			
			//imagen_orden_compra_logic_add::checkimagen_orden_compraToGets($this->imagen_orden_compras,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_orden_compras);
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
		$this->imagen_orden_compras = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_orden_compras=$this->imagen_orden_compraDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_orden_compra_util::refrescarFKDescripciones($this->imagen_orden_compras);
			}
			
			//imagen_orden_compra_logic_add::checkimagen_orden_compraToGets($this->imagen_orden_compras,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_orden_compras);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->imagen_orden_compras = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_orden_compras=$this->imagen_orden_compraDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_orden_compra_util::refrescarFKDescripciones($this->imagen_orden_compras);
			}
			
			//imagen_orden_compra_logic_add::checkimagen_orden_compraToGets($this->imagen_orden_compras,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_orden_compras);
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
		$this->imagen_orden_compras = array();
		  		  
        try {			
			$this->imagen_orden_compras=$this->imagen_orden_compraDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_orden_compra_util::refrescarFKDescripciones($this->imagen_orden_compras);
			}	
			
			//imagen_orden_compra_logic_add::checkimagen_orden_compraToGets($this->imagen_orden_compras,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_orden_compras);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->imagen_orden_compras = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->imagen_orden_compras=$this->imagen_orden_compraDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_orden_compra_util::refrescarFKDescripciones($this->imagen_orden_compras);
			}
			
			//imagen_orden_compra_logic_add::checkimagen_orden_compraToGets($this->imagen_orden_compras,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_orden_compras);
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
		$this->imagen_orden_compras = array();
		  		  
        try {		
			$this->imagen_orden_compras=$this->imagen_orden_compraDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_orden_compra_util::refrescarFKDescripciones($this->imagen_orden_compras);
			}
			
			//imagen_orden_compra_logic_add::checkimagen_orden_compraToGets($this->imagen_orden_compras,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_orden_compras);

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
						
			//imagen_orden_compra_logic_add::checkimagen_orden_compraToSave($this->imagen_orden_compra,$this->datosCliente,$this->connexion);	       
			//imagen_orden_compra_logic_add::updateimagen_orden_compraToSave($this->imagen_orden_compra);			
			imagen_orden_compra_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->imagen_orden_compra,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->imagen_orden_compraLogicAdditional->checkGeneralEntityToSave($this,$this->imagen_orden_compra,$this->datosCliente,$this->connexion);
			
			
			imagen_orden_compra_data::save($this->imagen_orden_compra, $this->connexion);	    	       	 				
			//imagen_orden_compra_logic_add::checkimagen_orden_compraToSaveAfter($this->imagen_orden_compra,$this->datosCliente,$this->connexion);			
			//$this->imagen_orden_compraLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->imagen_orden_compra,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->imagen_orden_compra,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->imagen_orden_compra,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				imagen_orden_compra_util::refrescarFKDescripcion($this->imagen_orden_compra);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->imagen_orden_compra->getIsDeleted()) {
				$this->imagen_orden_compra=null;
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
						
			/*imagen_orden_compra_logic_add::checkimagen_orden_compraToSave($this->imagen_orden_compra,$this->datosCliente,$this->connexion);*/	        
			//imagen_orden_compra_logic_add::updateimagen_orden_compraToSave($this->imagen_orden_compra);			
			//$this->imagen_orden_compraLogicAdditional->checkGeneralEntityToSave($this,$this->imagen_orden_compra,$this->datosCliente,$this->connexion);			
			imagen_orden_compra_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->imagen_orden_compra,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			imagen_orden_compra_data::save($this->imagen_orden_compra, $this->connexion);	    	       	 						
			/*imagen_orden_compra_logic_add::checkimagen_orden_compraToSaveAfter($this->imagen_orden_compra,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_orden_compraLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->imagen_orden_compra,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->imagen_orden_compra,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->imagen_orden_compra,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				imagen_orden_compra_util::refrescarFKDescripcion($this->imagen_orden_compra);				
			}
			
			if($this->imagen_orden_compra->getIsDeleted()) {
				$this->imagen_orden_compra=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(imagen_orden_compra $imagen_orden_compra,Connexion $connexion)  {
		$imagen_orden_compraLogic = new  imagen_orden_compra_logic();		  		  
        try {		
			$imagen_orden_compraLogic->setConnexion($connexion);			
			$imagen_orden_compraLogic->setimagen_orden_compra($imagen_orden_compra);			
			$imagen_orden_compraLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*imagen_orden_compra_logic_add::checkimagen_orden_compraToSaves($this->imagen_orden_compras,$this->datosCliente,$this->connexion);*/	        	
			//$this->imagen_orden_compraLogicAdditional->checkGeneralEntitiesToSaves($this,$this->imagen_orden_compras,$this->datosCliente,$this->connexion);
			
	   		foreach($this->imagen_orden_compras as $imagen_orden_compraLocal) {				
								
				//imagen_orden_compra_logic_add::updateimagen_orden_compraToSave($imagen_orden_compraLocal);	        	
				imagen_orden_compra_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$imagen_orden_compraLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				imagen_orden_compra_data::save($imagen_orden_compraLocal, $this->connexion);				
			}
			
			/*imagen_orden_compra_logic_add::checkimagen_orden_compraToSavesAfter($this->imagen_orden_compras,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_orden_compraLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->imagen_orden_compras,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_orden_compra_util::refrescarFKDescripciones($this->imagen_orden_compras);
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
			/*imagen_orden_compra_logic_add::checkimagen_orden_compraToSaves($this->imagen_orden_compras,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_orden_compraLogicAdditional->checkGeneralEntitiesToSaves($this,$this->imagen_orden_compras,$this->datosCliente,$this->connexion);
			
	   		foreach($this->imagen_orden_compras as $imagen_orden_compraLocal) {				
								
				//imagen_orden_compra_logic_add::updateimagen_orden_compraToSave($imagen_orden_compraLocal);	        	
				imagen_orden_compra_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$imagen_orden_compraLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				imagen_orden_compra_data::save($imagen_orden_compraLocal, $this->connexion);				
			}			
			
			/*imagen_orden_compra_logic_add::checkimagen_orden_compraToSavesAfter($this->imagen_orden_compras,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_orden_compraLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->imagen_orden_compras,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_orden_compra_util::refrescarFKDescripciones($this->imagen_orden_compras);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $imagen_orden_compras,Connexion $connexion)  {
		$imagen_orden_compraLogic = new  imagen_orden_compra_logic();
		  		  
        try {		
			$imagen_orden_compraLogic->setConnexion($connexion);			
			$imagen_orden_compraLogic->setimagen_orden_compras($imagen_orden_compras);			
			$imagen_orden_compraLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$imagen_orden_comprasAux=array();
		
		foreach($this->imagen_orden_compras as $imagen_orden_compra) {
			if($imagen_orden_compra->getIsDeleted()==false) {
				$imagen_orden_comprasAux[]=$imagen_orden_compra;
			}
		}
		
		$this->imagen_orden_compras=$imagen_orden_comprasAux;
	}
	
	public function updateToGetsAuxiliar(array &$imagen_orden_compras) {
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
	
	
	
	public function saveRelacionesWithConnection($imagen_orden_compra) {
		$this->saveRelacionesBase($imagen_orden_compra,true);
	}

	public function saveRelaciones($imagen_orden_compra) {
		$this->saveRelacionesBase($imagen_orden_compra,false);
	}

	public function saveRelacionesBase($imagen_orden_compra,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setimagen_orden_compra($imagen_orden_compra);

			if(true) {

				//imagen_orden_compra_logic_add::updateRelacionesToSave($imagen_orden_compra,$this);

				if(($this->imagen_orden_compra->getIsNew() || $this->imagen_orden_compra->getIsChanged()) && !$this->imagen_orden_compra->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->imagen_orden_compra->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//imagen_orden_compra_logic_add::updateRelacionesToSaveAfter($imagen_orden_compra,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $imagen_orden_compras,imagen_orden_compra_param_return $imagen_orden_compraParameterGeneral) : imagen_orden_compra_param_return {
		$imagen_orden_compraReturnGeneral=new imagen_orden_compra_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $imagen_orden_compraReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $imagen_orden_compras,imagen_orden_compra_param_return $imagen_orden_compraParameterGeneral) : imagen_orden_compra_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$imagen_orden_compraReturnGeneral=new imagen_orden_compra_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $imagen_orden_compraReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_orden_compras,imagen_orden_compra $imagen_orden_compra,imagen_orden_compra_param_return $imagen_orden_compraParameterGeneral,bool $isEsNuevoimagen_orden_compra,array $clases) : imagen_orden_compra_param_return {
		 try {	
			$imagen_orden_compraReturnGeneral=new imagen_orden_compra_param_return();
	
			$imagen_orden_compraReturnGeneral->setimagen_orden_compra($imagen_orden_compra);
			$imagen_orden_compraReturnGeneral->setimagen_orden_compras($imagen_orden_compras);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$imagen_orden_compraReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $imagen_orden_compraReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_orden_compras,imagen_orden_compra $imagen_orden_compra,imagen_orden_compra_param_return $imagen_orden_compraParameterGeneral,bool $isEsNuevoimagen_orden_compra,array $clases) : imagen_orden_compra_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$imagen_orden_compraReturnGeneral=new imagen_orden_compra_param_return();
	
			$imagen_orden_compraReturnGeneral->setimagen_orden_compra($imagen_orden_compra);
			$imagen_orden_compraReturnGeneral->setimagen_orden_compras($imagen_orden_compras);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$imagen_orden_compraReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $imagen_orden_compraReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_orden_compras,imagen_orden_compra $imagen_orden_compra,imagen_orden_compra_param_return $imagen_orden_compraParameterGeneral,bool $isEsNuevoimagen_orden_compra,array $clases) : imagen_orden_compra_param_return {
		 try {	
			$imagen_orden_compraReturnGeneral=new imagen_orden_compra_param_return();
	
			$imagen_orden_compraReturnGeneral->setimagen_orden_compra($imagen_orden_compra);
			$imagen_orden_compraReturnGeneral->setimagen_orden_compras($imagen_orden_compras);
			
			
			
			return $imagen_orden_compraReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_orden_compras,imagen_orden_compra $imagen_orden_compra,imagen_orden_compra_param_return $imagen_orden_compraParameterGeneral,bool $isEsNuevoimagen_orden_compra,array $clases) : imagen_orden_compra_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$imagen_orden_compraReturnGeneral=new imagen_orden_compra_param_return();
	
			$imagen_orden_compraReturnGeneral->setimagen_orden_compra($imagen_orden_compra);
			$imagen_orden_compraReturnGeneral->setimagen_orden_compras($imagen_orden_compras);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $imagen_orden_compraReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,imagen_orden_compra $imagen_orden_compra,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,imagen_orden_compra $imagen_orden_compra,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	
	
	
	public function deepLoad(imagen_orden_compra $imagen_orden_compra,bool $isDeep,string $deepLoadType,array $clases) {
		
		
		try {
			
			
			
			//imagen_orden_compra_logic_add::updateimagen_orden_compraToGet($this->imagen_orden_compra);
			
			
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		
	}
	
	public function deepSave(imagen_orden_compra $imagen_orden_compra,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		
		
		try {
			
			
			//imagen_orden_compra_logic_add::updateimagen_orden_compraToSave($this->imagen_orden_compra);			
			
			if(!$paraDeleteCascade) {				
				imagen_orden_compra_data::save($imagen_orden_compra, $this->connexion);
			}
			
			
			
			if($paraDeleteCascade) {				
				imagen_orden_compra_data::save($imagen_orden_compra, $this->connexion);
			}
			
		}catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}	
		
		
	}
		
	public function deepLoadWithConnection(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje) {		
		try {
			$this->getNewConnexionToDeep();
			
			$this->deepLoad($this->imagen_orden_compra,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->imagen_orden_compras as $imagen_orden_compra) {
				$this->deepLoad($imagen_orden_compra,$isDeep,$deepLoadType,$clases);
								
				imagen_orden_compra_util::refrescarFKDescripciones($this->imagen_orden_compras);
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
			
			foreach($this->imagen_orden_compras as $imagen_orden_compra) {
				$this->deepLoad($imagen_orden_compra,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->imagen_orden_compra,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->imagen_orden_compras as $imagen_orden_compra) {
				$this->deepSave($imagen_orden_compra,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->imagen_orden_compras as $imagen_orden_compra) {
				$this->deepSave($imagen_orden_compra,$isDeep,$deepLoadType,$clases,false);
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
	
	
	
	
	
	
	
	public function getimagen_orden_compra() : ?imagen_orden_compra {	
		/*
		imagen_orden_compra_logic_add::checkimagen_orden_compraToGet($this->imagen_orden_compra,$this->datosCliente);
		imagen_orden_compra_logic_add::updateimagen_orden_compraToGet($this->imagen_orden_compra);
		*/
			
		return $this->imagen_orden_compra;
	}
		
	public function setimagen_orden_compra(imagen_orden_compra $newimagen_orden_compra) {
		$this->imagen_orden_compra = $newimagen_orden_compra;
	}
	
	public function getimagen_orden_compras() : array {		
		/*
		imagen_orden_compra_logic_add::checkimagen_orden_compraToGets($this->imagen_orden_compras,$this->datosCliente);
		
		foreach ($this->imagen_orden_compras as $imagen_orden_compraLocal ) {
			imagen_orden_compra_logic_add::updateimagen_orden_compraToGet($imagen_orden_compraLocal);
		}
		*/
		
		return $this->imagen_orden_compras;
	}
	
	public function setimagen_orden_compras(array $newimagen_orden_compras) {
		$this->imagen_orden_compras = $newimagen_orden_compras;
	}
	
	public function getimagen_orden_compraDataAccess() : imagen_orden_compra_data {
		return $this->imagen_orden_compraDataAccess;
	}
	
	public function setimagen_orden_compraDataAccess(imagen_orden_compra_data $newimagen_orden_compraDataAccess) {
		$this->imagen_orden_compraDataAccess = $newimagen_orden_compraDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        imagen_orden_compra_carga::$CONTROLLER;;        
		
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
