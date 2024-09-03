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

namespace com\bydan\contabilidad\facturacion\imagen_factura\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\facturacion\imagen_factura\util\imagen_factura_carga;
use com\bydan\contabilidad\facturacion\imagen_factura\util\imagen_factura_param_return;

use com\bydan\contabilidad\facturacion\imagen_factura\presentation\session\imagen_factura_session;

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

use com\bydan\contabilidad\facturacion\imagen_factura\util\imagen_factura_util;
use com\bydan\contabilidad\facturacion\imagen_factura\business\entity\imagen_factura;
use com\bydan\contabilidad\facturacion\imagen_factura\business\data\imagen_factura_data;

//FK


use com\bydan\contabilidad\facturacion\factura\business\entity\factura;
use com\bydan\contabilidad\facturacion\factura\business\data\factura_data;
use com\bydan\contabilidad\facturacion\factura\business\logic\factura_logic;
use com\bydan\contabilidad\facturacion\factura\util\factura_util;

//REL


//REL DETALLES




class imagen_factura_logic  extends GeneralEntityLogic implements imagen_factura_logicI {	
	/*GENERAL*/
	public imagen_factura_data $imagen_facturaDataAccess;
	//public ?imagen_factura_logic_add $imagen_facturaLogicAdditional=null;
	public ?imagen_factura $imagen_factura;
	public array $imagen_facturas;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->imagen_facturaDataAccess = new imagen_factura_data();			
			$this->imagen_facturas = array();
			$this->imagen_factura = new imagen_factura();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->imagen_facturaLogicAdditional = new imagen_factura_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->imagen_facturaLogicAdditional==null) {
		//	$this->imagen_facturaLogicAdditional=new imagen_factura_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->imagen_facturaDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->imagen_facturaDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->imagen_facturaDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->imagen_facturaDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->imagen_facturas = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_facturas=$this->imagen_facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_factura_util::refrescarFKDescripciones($this->imagen_facturas);
			}
			
			//imagen_factura_logic_add::checkimagen_facturaToGets($this->imagen_facturas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_facturas);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->imagen_facturas = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_facturas=$this->imagen_facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_factura_util::refrescarFKDescripciones($this->imagen_facturas);
			}
			
			//imagen_factura_logic_add::checkimagen_facturaToGets($this->imagen_facturas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_facturas);
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
		$this->imagen_factura = new imagen_factura();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->imagen_factura=$this->imagen_facturaDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_factura,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_factura_util::refrescarFKDescripcion($this->imagen_factura);
			}
						
			//imagen_factura_logic_add::checkimagen_facturaToGet($this->imagen_factura,$this->datosCliente);
			//imagen_factura_logic_add::updateimagen_facturaToGet($this->imagen_factura);
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
		$this->imagen_factura = new  imagen_factura();
		  		  
        try {		
			$this->imagen_factura=$this->imagen_facturaDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_factura,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_factura_util::refrescarFKDescripcion($this->imagen_factura);
			}
			
			//imagen_factura_logic_add::checkimagen_facturaToGet($this->imagen_factura,$this->datosCliente);
			//imagen_factura_logic_add::updateimagen_facturaToGet($this->imagen_factura);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?imagen_factura {
		$imagen_facturaLogic = new  imagen_factura_logic();
		  		  
        try {		
			$imagen_facturaLogic->setConnexion($connexion);			
			$imagen_facturaLogic->getEntity($id);			
			return $imagen_facturaLogic->getimagen_factura();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->imagen_factura = new  imagen_factura();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->imagen_factura=$this->imagen_facturaDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_factura,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_factura_util::refrescarFKDescripcion($this->imagen_factura);
			}
			
			//imagen_factura_logic_add::checkimagen_facturaToGet($this->imagen_factura,$this->datosCliente);
			//imagen_factura_logic_add::updateimagen_facturaToGet($this->imagen_factura);
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
		$this->imagen_factura = new  imagen_factura();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_factura=$this->imagen_facturaDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_factura,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_factura_util::refrescarFKDescripcion($this->imagen_factura);
			}
			
			//imagen_factura_logic_add::checkimagen_facturaToGet($this->imagen_factura,$this->datosCliente);
			//imagen_factura_logic_add::updateimagen_facturaToGet($this->imagen_factura);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?imagen_factura {
		$imagen_facturaLogic = new  imagen_factura_logic();
		  		  
        try {		
			$imagen_facturaLogic->setConnexion($connexion);			
			$imagen_facturaLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $imagen_facturaLogic->getimagen_factura();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->imagen_facturas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->imagen_facturas=$this->imagen_facturaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_factura_util::refrescarFKDescripciones($this->imagen_facturas);
			}
			
			//imagen_factura_logic_add::checkimagen_facturaToGets($this->imagen_facturas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_facturas);			
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
		$this->imagen_facturas = array();
		  		  
        try {			
			$this->imagen_facturas=$this->imagen_facturaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_factura_util::refrescarFKDescripciones($this->imagen_facturas);
			}
			
			//imagen_factura_logic_add::checkimagen_facturaToGets($this->imagen_facturas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_facturas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->imagen_facturas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_facturas=$this->imagen_facturaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_factura_util::refrescarFKDescripciones($this->imagen_facturas);
			}
			
			//imagen_factura_logic_add::checkimagen_facturaToGets($this->imagen_facturas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_facturas);
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
		$this->imagen_facturas = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_facturas=$this->imagen_facturaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_factura_util::refrescarFKDescripciones($this->imagen_facturas);
			}
			
			//imagen_factura_logic_add::checkimagen_facturaToGets($this->imagen_facturas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_facturas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$imagen_facturaLogic = new  imagen_factura_logic();
		  		  
        try {		
			$imagen_facturaLogic->setConnexion($connexion);			
			$imagen_facturaLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $imagen_facturaLogic->getimagen_facturas();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->imagen_facturas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->imagen_facturas=$this->imagen_facturaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_factura_util::refrescarFKDescripciones($this->imagen_facturas);
			}
			
			//imagen_factura_logic_add::checkimagen_facturaToGets($this->imagen_facturas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_facturas);
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
		$this->imagen_facturas = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_facturas=$this->imagen_facturaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_factura_util::refrescarFKDescripciones($this->imagen_facturas);
			}
			
			//imagen_factura_logic_add::checkimagen_facturaToGets($this->imagen_facturas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_facturas);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->imagen_facturas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_facturas=$this->imagen_facturaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_factura_util::refrescarFKDescripciones($this->imagen_facturas);
			}
			
			//imagen_factura_logic_add::checkimagen_facturaToGets($this->imagen_facturas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_facturas);
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
		$this->imagen_facturas = array();
		  		  
        try {			
			$this->imagen_facturas=$this->imagen_facturaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_factura_util::refrescarFKDescripciones($this->imagen_facturas);
			}	
			
			//imagen_factura_logic_add::checkimagen_facturaToGets($this->imagen_facturas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_facturas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->imagen_facturas = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->imagen_facturas=$this->imagen_facturaDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_factura_util::refrescarFKDescripciones($this->imagen_facturas);
			}
			
			//imagen_factura_logic_add::checkimagen_facturaToGets($this->imagen_facturas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_facturas);
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
		$this->imagen_facturas = array();
		  		  
        try {		
			$this->imagen_facturas=$this->imagen_facturaDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_factura_util::refrescarFKDescripciones($this->imagen_facturas);
			}
			
			//imagen_factura_logic_add::checkimagen_facturaToGets($this->imagen_facturas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_facturas);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_IdfacturaWithConnection(string $strFinalQuery,Pagination $pagination,int $id_factura) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_factura= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_factura->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_factura,imagen_factura_util::$ID_FACTURA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_factura);

			$this->imagen_facturas=$this->imagen_facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				imagen_factura_util::refrescarFKDescripciones($this->imagen_facturas);
			}
			//imagen_factura_logic_add::checkimagen_facturaToGets($this->imagen_facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->imagen_facturas);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idfactura(string $strFinalQuery,Pagination $pagination,int $id_factura) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_factura= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_factura->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_factura,imagen_factura_util::$ID_FACTURA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_factura);

			$this->imagen_facturas=$this->imagen_facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				imagen_factura_util::refrescarFKDescripciones($this->imagen_facturas);
			}
			//imagen_factura_logic_add::checkimagen_facturaToGets($this->imagen_facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->imagen_facturas);
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
						
			//imagen_factura_logic_add::checkimagen_facturaToSave($this->imagen_factura,$this->datosCliente,$this->connexion);	       
			//imagen_factura_logic_add::updateimagen_facturaToSave($this->imagen_factura);			
			imagen_factura_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->imagen_factura,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->imagen_facturaLogicAdditional->checkGeneralEntityToSave($this,$this->imagen_factura,$this->datosCliente,$this->connexion);
			
			
			imagen_factura_data::save($this->imagen_factura, $this->connexion);	    	       	 				
			//imagen_factura_logic_add::checkimagen_facturaToSaveAfter($this->imagen_factura,$this->datosCliente,$this->connexion);			
			//$this->imagen_facturaLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->imagen_factura,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->imagen_factura,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->imagen_factura,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				imagen_factura_util::refrescarFKDescripcion($this->imagen_factura);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->imagen_factura->getIsDeleted()) {
				$this->imagen_factura=null;
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
						
			/*imagen_factura_logic_add::checkimagen_facturaToSave($this->imagen_factura,$this->datosCliente,$this->connexion);*/	        
			//imagen_factura_logic_add::updateimagen_facturaToSave($this->imagen_factura);			
			//$this->imagen_facturaLogicAdditional->checkGeneralEntityToSave($this,$this->imagen_factura,$this->datosCliente,$this->connexion);			
			imagen_factura_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->imagen_factura,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			imagen_factura_data::save($this->imagen_factura, $this->connexion);	    	       	 						
			/*imagen_factura_logic_add::checkimagen_facturaToSaveAfter($this->imagen_factura,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_facturaLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->imagen_factura,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->imagen_factura,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->imagen_factura,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				imagen_factura_util::refrescarFKDescripcion($this->imagen_factura);				
			}
			
			if($this->imagen_factura->getIsDeleted()) {
				$this->imagen_factura=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(imagen_factura $imagen_factura,Connexion $connexion)  {
		$imagen_facturaLogic = new  imagen_factura_logic();		  		  
        try {		
			$imagen_facturaLogic->setConnexion($connexion);			
			$imagen_facturaLogic->setimagen_factura($imagen_factura);			
			$imagen_facturaLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*imagen_factura_logic_add::checkimagen_facturaToSaves($this->imagen_facturas,$this->datosCliente,$this->connexion);*/	        	
			//$this->imagen_facturaLogicAdditional->checkGeneralEntitiesToSaves($this,$this->imagen_facturas,$this->datosCliente,$this->connexion);
			
	   		foreach($this->imagen_facturas as $imagen_facturaLocal) {				
								
				//imagen_factura_logic_add::updateimagen_facturaToSave($imagen_facturaLocal);	        	
				imagen_factura_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$imagen_facturaLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				imagen_factura_data::save($imagen_facturaLocal, $this->connexion);				
			}
			
			/*imagen_factura_logic_add::checkimagen_facturaToSavesAfter($this->imagen_facturas,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_facturaLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->imagen_facturas,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_factura_util::refrescarFKDescripciones($this->imagen_facturas);
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
			/*imagen_factura_logic_add::checkimagen_facturaToSaves($this->imagen_facturas,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_facturaLogicAdditional->checkGeneralEntitiesToSaves($this,$this->imagen_facturas,$this->datosCliente,$this->connexion);
			
	   		foreach($this->imagen_facturas as $imagen_facturaLocal) {				
								
				//imagen_factura_logic_add::updateimagen_facturaToSave($imagen_facturaLocal);	        	
				imagen_factura_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$imagen_facturaLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				imagen_factura_data::save($imagen_facturaLocal, $this->connexion);				
			}			
			
			/*imagen_factura_logic_add::checkimagen_facturaToSavesAfter($this->imagen_facturas,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_facturaLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->imagen_facturas,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_factura_util::refrescarFKDescripciones($this->imagen_facturas);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $imagen_facturas,Connexion $connexion)  {
		$imagen_facturaLogic = new  imagen_factura_logic();
		  		  
        try {		
			$imagen_facturaLogic->setConnexion($connexion);			
			$imagen_facturaLogic->setimagen_facturas($imagen_facturas);			
			$imagen_facturaLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$imagen_facturasAux=array();
		
		foreach($this->imagen_facturas as $imagen_factura) {
			if($imagen_factura->getIsDeleted()==false) {
				$imagen_facturasAux[]=$imagen_factura;
			}
		}
		
		$this->imagen_facturas=$imagen_facturasAux;
	}
	
	public function updateToGetsAuxiliar(array &$imagen_facturas) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->imagen_facturas as $imagen_factura) {
				
				$imagen_factura->setid_factura_Descripcion(imagen_factura_util::getfacturaDescripcion($imagen_factura->getfactura()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$imagen_factura_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$imagen_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$imagen_factura_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$imagen_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$imagen_factura_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$imagen_facturaForeignKey=new imagen_factura_param_return();//imagen_facturaForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_factura',$strRecargarFkTipos,',')) {
				$this->cargarCombosfacturasFK($this->connexion,$strRecargarFkQuery,$imagen_facturaForeignKey,$imagen_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_factura',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosfacturasFK($this->connexion,' where id=-1 ',$imagen_facturaForeignKey,$imagen_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $imagen_facturaForeignKey;
			
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
	
	
	public function cargarCombosfacturasFK($connexion=null,$strRecargarFkQuery='',$imagen_facturaForeignKey,$imagen_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$facturaLogic= new factura_logic();
		$pagination= new Pagination();
		$imagen_facturaForeignKey->facturasFK=array();

		$facturaLogic->setConnexion($connexion);
		$facturaLogic->getfacturaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($imagen_factura_session==null) {
			$imagen_factura_session=new imagen_factura_session();
		}
		
		if($imagen_factura_session->bitBusquedaDesdeFKSesionfactura!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=factura_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalfactura=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalfactura=Funciones::GetFinalQueryAppend($finalQueryGlobalfactura, '');
				$finalQueryGlobalfactura.=factura_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalfactura.$strRecargarFkQuery;		

				$facturaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($facturaLogic->getfacturas() as $facturaLocal ) {
				if($imagen_facturaForeignKey->idfacturaDefaultFK==0) {
					$imagen_facturaForeignKey->idfacturaDefaultFK=$facturaLocal->getId();
				}

				$imagen_facturaForeignKey->facturasFK[$facturaLocal->getId()]=imagen_factura_util::getfacturaDescripcion($facturaLocal);
			}

		} else {

			if($imagen_factura_session->bigidfacturaActual!=null && $imagen_factura_session->bigidfacturaActual > 0) {
				$facturaLogic->getEntity($imagen_factura_session->bigidfacturaActual);//WithConnection

				$imagen_facturaForeignKey->facturasFK[$facturaLogic->getfactura()->getId()]=imagen_factura_util::getfacturaDescripcion($facturaLogic->getfactura());
				$imagen_facturaForeignKey->idfacturaDefaultFK=$facturaLogic->getfactura()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($imagen_factura) {
		$this->saveRelacionesBase($imagen_factura,true);
	}

	public function saveRelaciones($imagen_factura) {
		$this->saveRelacionesBase($imagen_factura,false);
	}

	public function saveRelacionesBase($imagen_factura,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setimagen_factura($imagen_factura);

			if(true) {

				//imagen_factura_logic_add::updateRelacionesToSave($imagen_factura,$this);

				if(($this->imagen_factura->getIsNew() || $this->imagen_factura->getIsChanged()) && !$this->imagen_factura->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->imagen_factura->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//imagen_factura_logic_add::updateRelacionesToSaveAfter($imagen_factura,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $imagen_facturas,imagen_factura_param_return $imagen_facturaParameterGeneral) : imagen_factura_param_return {
		$imagen_facturaReturnGeneral=new imagen_factura_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $imagen_facturaReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $imagen_facturas,imagen_factura_param_return $imagen_facturaParameterGeneral) : imagen_factura_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$imagen_facturaReturnGeneral=new imagen_factura_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $imagen_facturaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_facturas,imagen_factura $imagen_factura,imagen_factura_param_return $imagen_facturaParameterGeneral,bool $isEsNuevoimagen_factura,array $clases) : imagen_factura_param_return {
		 try {	
			$imagen_facturaReturnGeneral=new imagen_factura_param_return();
	
			$imagen_facturaReturnGeneral->setimagen_factura($imagen_factura);
			$imagen_facturaReturnGeneral->setimagen_facturas($imagen_facturas);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$imagen_facturaReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $imagen_facturaReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_facturas,imagen_factura $imagen_factura,imagen_factura_param_return $imagen_facturaParameterGeneral,bool $isEsNuevoimagen_factura,array $clases) : imagen_factura_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$imagen_facturaReturnGeneral=new imagen_factura_param_return();
	
			$imagen_facturaReturnGeneral->setimagen_factura($imagen_factura);
			$imagen_facturaReturnGeneral->setimagen_facturas($imagen_facturas);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$imagen_facturaReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $imagen_facturaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_facturas,imagen_factura $imagen_factura,imagen_factura_param_return $imagen_facturaParameterGeneral,bool $isEsNuevoimagen_factura,array $clases) : imagen_factura_param_return {
		 try {	
			$imagen_facturaReturnGeneral=new imagen_factura_param_return();
	
			$imagen_facturaReturnGeneral->setimagen_factura($imagen_factura);
			$imagen_facturaReturnGeneral->setimagen_facturas($imagen_facturas);
			
			
			
			return $imagen_facturaReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_facturas,imagen_factura $imagen_factura,imagen_factura_param_return $imagen_facturaParameterGeneral,bool $isEsNuevoimagen_factura,array $clases) : imagen_factura_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$imagen_facturaReturnGeneral=new imagen_factura_param_return();
	
			$imagen_facturaReturnGeneral->setimagen_factura($imagen_factura);
			$imagen_facturaReturnGeneral->setimagen_facturas($imagen_facturas);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $imagen_facturaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,imagen_factura $imagen_factura,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,imagen_factura $imagen_factura,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		imagen_factura_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(imagen_factura $imagen_factura,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//imagen_factura_logic_add::updateimagen_facturaToGet($this->imagen_factura);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$imagen_factura->setfactura($this->imagen_facturaDataAccess->getfactura($this->connexion,$imagen_factura));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==factura::$class.'') {
				$imagen_factura->setfactura($this->imagen_facturaDataAccess->getfactura($this->connexion,$imagen_factura));
				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==factura::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$imagen_factura->setfactura($this->imagen_facturaDataAccess->getfactura($this->connexion,$imagen_factura));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$imagen_factura->setfactura($this->imagen_facturaDataAccess->getfactura($this->connexion,$imagen_factura));
		$facturaLogic= new factura_logic($this->connexion);
		$facturaLogic->deepLoad($imagen_factura->getfactura(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==factura::$class.'') {
				$imagen_factura->setfactura($this->imagen_facturaDataAccess->getfactura($this->connexion,$imagen_factura));
				$facturaLogic= new factura_logic($this->connexion);
				$facturaLogic->deepLoad($imagen_factura->getfactura(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==factura::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$imagen_factura->setfactura($this->imagen_facturaDataAccess->getfactura($this->connexion,$imagen_factura));
			$facturaLogic= new factura_logic($this->connexion);
			$facturaLogic->deepLoad($imagen_factura->getfactura(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(imagen_factura $imagen_factura,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//imagen_factura_logic_add::updateimagen_facturaToSave($this->imagen_factura);			
			
			if(!$paraDeleteCascade) {				
				imagen_factura_data::save($imagen_factura, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		factura_data::save($imagen_factura->getfactura(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==factura::$class.'') {
				factura_data::save($imagen_factura->getfactura(),$this->connexion);
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==factura::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			factura_data::save($imagen_factura->getfactura(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		factura_data::save($imagen_factura->getfactura(),$this->connexion);
		$facturaLogic= new factura_logic($this->connexion);
		$facturaLogic->deepSave($imagen_factura->getfactura(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==factura::$class.'') {
				factura_data::save($imagen_factura->getfactura(),$this->connexion);
				$facturaLogic= new factura_logic($this->connexion);
				$facturaLogic->deepSave($imagen_factura->getfactura(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==factura::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			factura_data::save($imagen_factura->getfactura(),$this->connexion);
			$facturaLogic= new factura_logic($this->connexion);
			$facturaLogic->deepSave($imagen_factura->getfactura(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				imagen_factura_data::save($imagen_factura, $this->connexion);
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
			
			$this->deepLoad($this->imagen_factura,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->imagen_facturas as $imagen_factura) {
				$this->deepLoad($imagen_factura,$isDeep,$deepLoadType,$clases);
								
				imagen_factura_util::refrescarFKDescripciones($this->imagen_facturas);
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
			
			foreach($this->imagen_facturas as $imagen_factura) {
				$this->deepLoad($imagen_factura,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->imagen_factura,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->imagen_facturas as $imagen_factura) {
				$this->deepSave($imagen_factura,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->imagen_facturas as $imagen_factura) {
				$this->deepSave($imagen_factura,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(factura::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==factura::$class) {
						$classes[]=new Classe(factura::$class);
					}
				}

			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==factura::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(factura::$class);
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
	
	
	
	
	
	
	
	public function getimagen_factura() : ?imagen_factura {	
		/*
		imagen_factura_logic_add::checkimagen_facturaToGet($this->imagen_factura,$this->datosCliente);
		imagen_factura_logic_add::updateimagen_facturaToGet($this->imagen_factura);
		*/
			
		return $this->imagen_factura;
	}
		
	public function setimagen_factura(imagen_factura $newimagen_factura) {
		$this->imagen_factura = $newimagen_factura;
	}
	
	public function getimagen_facturas() : array {		
		/*
		imagen_factura_logic_add::checkimagen_facturaToGets($this->imagen_facturas,$this->datosCliente);
		
		foreach ($this->imagen_facturas as $imagen_facturaLocal ) {
			imagen_factura_logic_add::updateimagen_facturaToGet($imagen_facturaLocal);
		}
		*/
		
		return $this->imagen_facturas;
	}
	
	public function setimagen_facturas(array $newimagen_facturas) {
		$this->imagen_facturas = $newimagen_facturas;
	}
	
	public function getimagen_facturaDataAccess() : imagen_factura_data {
		return $this->imagen_facturaDataAccess;
	}
	
	public function setimagen_facturaDataAccess(imagen_factura_data $newimagen_facturaDataAccess) {
		$this->imagen_facturaDataAccess = $newimagen_facturaDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        imagen_factura_carga::$CONTROLLER;;        
		
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
