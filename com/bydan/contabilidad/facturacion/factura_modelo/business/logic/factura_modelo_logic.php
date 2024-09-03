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

namespace com\bydan\contabilidad\facturacion\factura_modelo\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\facturacion\factura_modelo\util\factura_modelo_carga;
use com\bydan\contabilidad\facturacion\factura_modelo\util\factura_modelo_param_return;

use com\bydan\contabilidad\facturacion\factura_modelo\presentation\session\factura_modelo_session;

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

use com\bydan\contabilidad\facturacion\factura_modelo\util\factura_modelo_util;
use com\bydan\contabilidad\facturacion\factura_modelo\business\entity\factura_modelo;
use com\bydan\contabilidad\facturacion\factura_modelo\business\data\factura_modelo_data;

//FK


use com\bydan\contabilidad\facturacion\factura_lote\business\entity\factura_lote;
use com\bydan\contabilidad\facturacion\factura_lote\business\data\factura_lote_data;
use com\bydan\contabilidad\facturacion\factura_lote\business\logic\factura_lote_logic;
use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_util;

use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\business\data\cliente_data;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;

//REL


//REL DETALLES




class factura_modelo_logic  extends GeneralEntityLogic implements factura_modelo_logicI {	
	/*GENERAL*/
	public factura_modelo_data $factura_modeloDataAccess;
	//public ?factura_modelo_logic_add $factura_modeloLogicAdditional=null;
	public ?factura_modelo $factura_modelo;
	public array $factura_modelos;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->factura_modeloDataAccess = new factura_modelo_data();			
			$this->factura_modelos = array();
			$this->factura_modelo = new factura_modelo();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->factura_modeloLogicAdditional = new factura_modelo_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->factura_modeloLogicAdditional==null) {
		//	$this->factura_modeloLogicAdditional=new factura_modelo_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->factura_modeloDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->factura_modeloDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->factura_modeloDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->factura_modeloDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->factura_modelos = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->factura_modelos=$this->factura_modeloDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_modelo_util::refrescarFKDescripciones($this->factura_modelos);
			}
			
			//factura_modelo_logic_add::checkfactura_modeloToGets($this->factura_modelos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->factura_modelos);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->factura_modelos = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->factura_modelos=$this->factura_modeloDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_modelo_util::refrescarFKDescripciones($this->factura_modelos);
			}
			
			//factura_modelo_logic_add::checkfactura_modeloToGets($this->factura_modelos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->factura_modelos);
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
		$this->factura_modelo = new factura_modelo();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->factura_modelo=$this->factura_modeloDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->factura_modelo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				factura_modelo_util::refrescarFKDescripcion($this->factura_modelo);
			}
						
			//factura_modelo_logic_add::checkfactura_modeloToGet($this->factura_modelo,$this->datosCliente);
			//factura_modelo_logic_add::updatefactura_modeloToGet($this->factura_modelo);
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
		$this->factura_modelo = new  factura_modelo();
		  		  
        try {		
			$this->factura_modelo=$this->factura_modeloDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->factura_modelo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				factura_modelo_util::refrescarFKDescripcion($this->factura_modelo);
			}
			
			//factura_modelo_logic_add::checkfactura_modeloToGet($this->factura_modelo,$this->datosCliente);
			//factura_modelo_logic_add::updatefactura_modeloToGet($this->factura_modelo);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?factura_modelo {
		$factura_modeloLogic = new  factura_modelo_logic();
		  		  
        try {		
			$factura_modeloLogic->setConnexion($connexion);			
			$factura_modeloLogic->getEntity($id);			
			return $factura_modeloLogic->getfactura_modelo();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->factura_modelo = new  factura_modelo();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->factura_modelo=$this->factura_modeloDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->factura_modelo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				factura_modelo_util::refrescarFKDescripcion($this->factura_modelo);
			}
			
			//factura_modelo_logic_add::checkfactura_modeloToGet($this->factura_modelo,$this->datosCliente);
			//factura_modelo_logic_add::updatefactura_modeloToGet($this->factura_modelo);
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
		$this->factura_modelo = new  factura_modelo();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->factura_modelo=$this->factura_modeloDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->factura_modelo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				factura_modelo_util::refrescarFKDescripcion($this->factura_modelo);
			}
			
			//factura_modelo_logic_add::checkfactura_modeloToGet($this->factura_modelo,$this->datosCliente);
			//factura_modelo_logic_add::updatefactura_modeloToGet($this->factura_modelo);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?factura_modelo {
		$factura_modeloLogic = new  factura_modelo_logic();
		  		  
        try {		
			$factura_modeloLogic->setConnexion($connexion);			
			$factura_modeloLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $factura_modeloLogic->getfactura_modelo();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->factura_modelos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->factura_modelos=$this->factura_modeloDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_modelo_util::refrescarFKDescripciones($this->factura_modelos);
			}
			
			//factura_modelo_logic_add::checkfactura_modeloToGets($this->factura_modelos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->factura_modelos);			
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
		$this->factura_modelos = array();
		  		  
        try {			
			$this->factura_modelos=$this->factura_modeloDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_modelo_util::refrescarFKDescripciones($this->factura_modelos);
			}
			
			//factura_modelo_logic_add::checkfactura_modeloToGets($this->factura_modelos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->factura_modelos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->factura_modelos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->factura_modelos=$this->factura_modeloDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_modelo_util::refrescarFKDescripciones($this->factura_modelos);
			}
			
			//factura_modelo_logic_add::checkfactura_modeloToGets($this->factura_modelos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->factura_modelos);
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
		$this->factura_modelos = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->factura_modelos=$this->factura_modeloDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_modelo_util::refrescarFKDescripciones($this->factura_modelos);
			}
			
			//factura_modelo_logic_add::checkfactura_modeloToGets($this->factura_modelos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->factura_modelos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$factura_modeloLogic = new  factura_modelo_logic();
		  		  
        try {		
			$factura_modeloLogic->setConnexion($connexion);			
			$factura_modeloLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $factura_modeloLogic->getfactura_modelos();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->factura_modelos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->factura_modelos=$this->factura_modeloDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_modelo_util::refrescarFKDescripciones($this->factura_modelos);
			}
			
			//factura_modelo_logic_add::checkfactura_modeloToGets($this->factura_modelos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->factura_modelos);
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
		$this->factura_modelos = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->factura_modelos=$this->factura_modeloDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_modelo_util::refrescarFKDescripciones($this->factura_modelos);
			}
			
			//factura_modelo_logic_add::checkfactura_modeloToGets($this->factura_modelos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->factura_modelos);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->factura_modelos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->factura_modelos=$this->factura_modeloDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_modelo_util::refrescarFKDescripciones($this->factura_modelos);
			}
			
			//factura_modelo_logic_add::checkfactura_modeloToGets($this->factura_modelos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->factura_modelos);
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
		$this->factura_modelos = array();
		  		  
        try {			
			$this->factura_modelos=$this->factura_modeloDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_modelo_util::refrescarFKDescripciones($this->factura_modelos);
			}	
			
			//factura_modelo_logic_add::checkfactura_modeloToGets($this->factura_modelos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->factura_modelos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->factura_modelos = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->factura_modelos=$this->factura_modeloDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_modelo_util::refrescarFKDescripciones($this->factura_modelos);
			}
			
			//factura_modelo_logic_add::checkfactura_modeloToGets($this->factura_modelos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->factura_modelos);
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
		$this->factura_modelos = array();
		  		  
        try {		
			$this->factura_modelos=$this->factura_modeloDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_modelo_util::refrescarFKDescripciones($this->factura_modelos);
			}
			
			//factura_modelo_logic_add::checkfactura_modeloToGets($this->factura_modelos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->factura_modelos);

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
			$parameterSelectionGeneralid_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cliente,factura_modelo_util::$ID_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cliente);

			$this->factura_modelos=$this->factura_modeloDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_modelo_util::refrescarFKDescripciones($this->factura_modelos);
			}
			//factura_modelo_logic_add::checkfactura_modeloToGets($this->factura_modelos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->factura_modelos);

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
			$parameterSelectionGeneralid_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cliente,factura_modelo_util::$ID_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cliente);

			$this->factura_modelos=$this->factura_modeloDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_modelo_util::refrescarFKDescripciones($this->factura_modelos);
			}
			//factura_modelo_logic_add::checkfactura_modeloToGets($this->factura_modelos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->factura_modelos);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idfactura_loteWithConnection(string $strFinalQuery,Pagination $pagination,int $id_factura_lote) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_factura_lote= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_factura_lote->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_factura_lote,factura_modelo_util::$ID_FACTURA_LOTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_factura_lote);

			$this->factura_modelos=$this->factura_modeloDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_modelo_util::refrescarFKDescripciones($this->factura_modelos);
			}
			//factura_modelo_logic_add::checkfactura_modeloToGets($this->factura_modelos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->factura_modelos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idfactura_lote(string $strFinalQuery,Pagination $pagination,int $id_factura_lote) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_factura_lote= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_factura_lote->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_factura_lote,factura_modelo_util::$ID_FACTURA_LOTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_factura_lote);

			$this->factura_modelos=$this->factura_modeloDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_modelo_util::refrescarFKDescripciones($this->factura_modelos);
			}
			//factura_modelo_logic_add::checkfactura_modeloToGets($this->factura_modelos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->factura_modelos);
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
						
			//factura_modelo_logic_add::checkfactura_modeloToSave($this->factura_modelo,$this->datosCliente,$this->connexion);	       
			//factura_modelo_logic_add::updatefactura_modeloToSave($this->factura_modelo);			
			factura_modelo_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->factura_modelo,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->factura_modeloLogicAdditional->checkGeneralEntityToSave($this,$this->factura_modelo,$this->datosCliente,$this->connexion);
			
			
			factura_modelo_data::save($this->factura_modelo, $this->connexion);	    	       	 				
			//factura_modelo_logic_add::checkfactura_modeloToSaveAfter($this->factura_modelo,$this->datosCliente,$this->connexion);			
			//$this->factura_modeloLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->factura_modelo,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->factura_modelo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->factura_modelo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				factura_modelo_util::refrescarFKDescripcion($this->factura_modelo);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->factura_modelo->getIsDeleted()) {
				$this->factura_modelo=null;
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
						
			/*factura_modelo_logic_add::checkfactura_modeloToSave($this->factura_modelo,$this->datosCliente,$this->connexion);*/	        
			//factura_modelo_logic_add::updatefactura_modeloToSave($this->factura_modelo);			
			//$this->factura_modeloLogicAdditional->checkGeneralEntityToSave($this,$this->factura_modelo,$this->datosCliente,$this->connexion);			
			factura_modelo_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->factura_modelo,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			factura_modelo_data::save($this->factura_modelo, $this->connexion);	    	       	 						
			/*factura_modelo_logic_add::checkfactura_modeloToSaveAfter($this->factura_modelo,$this->datosCliente,$this->connexion);*/			
			//$this->factura_modeloLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->factura_modelo,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->factura_modelo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->factura_modelo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				factura_modelo_util::refrescarFKDescripcion($this->factura_modelo);				
			}
			
			if($this->factura_modelo->getIsDeleted()) {
				$this->factura_modelo=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(factura_modelo $factura_modelo,Connexion $connexion)  {
		$factura_modeloLogic = new  factura_modelo_logic();		  		  
        try {		
			$factura_modeloLogic->setConnexion($connexion);			
			$factura_modeloLogic->setfactura_modelo($factura_modelo);			
			$factura_modeloLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*factura_modelo_logic_add::checkfactura_modeloToSaves($this->factura_modelos,$this->datosCliente,$this->connexion);*/	        	
			//$this->factura_modeloLogicAdditional->checkGeneralEntitiesToSaves($this,$this->factura_modelos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->factura_modelos as $factura_modeloLocal) {				
								
				//factura_modelo_logic_add::updatefactura_modeloToSave($factura_modeloLocal);	        	
				factura_modelo_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$factura_modeloLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				factura_modelo_data::save($factura_modeloLocal, $this->connexion);				
			}
			
			/*factura_modelo_logic_add::checkfactura_modeloToSavesAfter($this->factura_modelos,$this->datosCliente,$this->connexion);*/			
			//$this->factura_modeloLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->factura_modelos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_modelo_util::refrescarFKDescripciones($this->factura_modelos);
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
			/*factura_modelo_logic_add::checkfactura_modeloToSaves($this->factura_modelos,$this->datosCliente,$this->connexion);*/			
			//$this->factura_modeloLogicAdditional->checkGeneralEntitiesToSaves($this,$this->factura_modelos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->factura_modelos as $factura_modeloLocal) {				
								
				//factura_modelo_logic_add::updatefactura_modeloToSave($factura_modeloLocal);	        	
				factura_modelo_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$factura_modeloLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				factura_modelo_data::save($factura_modeloLocal, $this->connexion);				
			}			
			
			/*factura_modelo_logic_add::checkfactura_modeloToSavesAfter($this->factura_modelos,$this->datosCliente,$this->connexion);*/			
			//$this->factura_modeloLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->factura_modelos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_modelo_util::refrescarFKDescripciones($this->factura_modelos);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $factura_modelos,Connexion $connexion)  {
		$factura_modeloLogic = new  factura_modelo_logic();
		  		  
        try {		
			$factura_modeloLogic->setConnexion($connexion);			
			$factura_modeloLogic->setfactura_modelos($factura_modelos);			
			$factura_modeloLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$factura_modelosAux=array();
		
		foreach($this->factura_modelos as $factura_modelo) {
			if($factura_modelo->getIsDeleted()==false) {
				$factura_modelosAux[]=$factura_modelo;
			}
		}
		
		$this->factura_modelos=$factura_modelosAux;
	}
	
	public function updateToGetsAuxiliar(array &$factura_modelos) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->factura_modelos as $factura_modelo) {
				
				$factura_modelo->setid_factura_lote_Descripcion(factura_modelo_util::getfactura_loteDescripcion($factura_modelo->getfactura_lote()));
				$factura_modelo->setid_cliente_Descripcion(factura_modelo_util::getclienteDescripcion($factura_modelo->getcliente()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$factura_modelo_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$factura_modelo_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$factura_modelo_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$factura_modelo_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$factura_modelo_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$factura_modeloForeignKey=new factura_modelo_param_return();//factura_modeloForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_factura_lote',$strRecargarFkTipos,',')) {
				$this->cargarCombosfactura_lotesFK($this->connexion,$strRecargarFkQuery,$factura_modeloForeignKey,$factura_modelo_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cliente',$strRecargarFkTipos,',')) {
				$this->cargarCombosclientesFK($this->connexion,$strRecargarFkQuery,$factura_modeloForeignKey,$factura_modelo_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_factura_lote',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosfactura_lotesFK($this->connexion,' where id=-1 ',$factura_modeloForeignKey,$factura_modelo_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cliente',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosclientesFK($this->connexion,' where id=-1 ',$factura_modeloForeignKey,$factura_modelo_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $factura_modeloForeignKey;
			
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
	
	
	public function cargarCombosfactura_lotesFK($connexion=null,$strRecargarFkQuery='',$factura_modeloForeignKey,$factura_modelo_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$factura_loteLogic= new factura_lote_logic();
		$pagination= new Pagination();
		$factura_modeloForeignKey->factura_lotesFK=array();

		$factura_loteLogic->setConnexion($connexion);
		$factura_loteLogic->getfactura_loteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($factura_modelo_session==null) {
			$factura_modelo_session=new factura_modelo_session();
		}
		
		if($factura_modelo_session->bitBusquedaDesdeFKSesionfactura_lote!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=factura_lote_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalfactura_lote=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalfactura_lote=Funciones::GetFinalQueryAppend($finalQueryGlobalfactura_lote, '');
				$finalQueryGlobalfactura_lote.=factura_lote_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalfactura_lote.$strRecargarFkQuery;		

				$factura_loteLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($factura_loteLogic->getfactura_lotes() as $factura_loteLocal ) {
				if($factura_modeloForeignKey->idfactura_loteDefaultFK==0) {
					$factura_modeloForeignKey->idfactura_loteDefaultFK=$factura_loteLocal->getId();
				}

				$factura_modeloForeignKey->factura_lotesFK[$factura_loteLocal->getId()]=factura_modelo_util::getfactura_loteDescripcion($factura_loteLocal);
			}

		} else {

			if($factura_modelo_session->bigidfactura_loteActual!=null && $factura_modelo_session->bigidfactura_loteActual > 0) {
				$factura_loteLogic->getEntity($factura_modelo_session->bigidfactura_loteActual);//WithConnection

				$factura_modeloForeignKey->factura_lotesFK[$factura_loteLogic->getfactura_lote()->getId()]=factura_modelo_util::getfactura_loteDescripcion($factura_loteLogic->getfactura_lote());
				$factura_modeloForeignKey->idfactura_loteDefaultFK=$factura_loteLogic->getfactura_lote()->getId();
			}
		}
	}

	public function cargarCombosclientesFK($connexion=null,$strRecargarFkQuery='',$factura_modeloForeignKey,$factura_modelo_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$clienteLogic= new cliente_logic();
		$pagination= new Pagination();
		$factura_modeloForeignKey->clientesFK=array();

		$clienteLogic->setConnexion($connexion);
		$clienteLogic->getclienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($factura_modelo_session==null) {
			$factura_modelo_session=new factura_modelo_session();
		}
		
		if($factura_modelo_session->bitBusquedaDesdeFKSesioncliente!=true) {
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
				if($factura_modeloForeignKey->idclienteDefaultFK==0) {
					$factura_modeloForeignKey->idclienteDefaultFK=$clienteLocal->getId();
				}

				$factura_modeloForeignKey->clientesFK[$clienteLocal->getId()]=factura_modelo_util::getclienteDescripcion($clienteLocal);
			}

		} else {

			if($factura_modelo_session->bigidclienteActual!=null && $factura_modelo_session->bigidclienteActual > 0) {
				$clienteLogic->getEntity($factura_modelo_session->bigidclienteActual);//WithConnection

				$factura_modeloForeignKey->clientesFK[$clienteLogic->getcliente()->getId()]=factura_modelo_util::getclienteDescripcion($clienteLogic->getcliente());
				$factura_modeloForeignKey->idclienteDefaultFK=$clienteLogic->getcliente()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($factura_modelo) {
		$this->saveRelacionesBase($factura_modelo,true);
	}

	public function saveRelaciones($factura_modelo) {
		$this->saveRelacionesBase($factura_modelo,false);
	}

	public function saveRelacionesBase($factura_modelo,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setfactura_modelo($factura_modelo);

			if(true) {

				//factura_modelo_logic_add::updateRelacionesToSave($factura_modelo,$this);

				if(($this->factura_modelo->getIsNew() || $this->factura_modelo->getIsChanged()) && !$this->factura_modelo->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->factura_modelo->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//factura_modelo_logic_add::updateRelacionesToSaveAfter($factura_modelo,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $factura_modelos,factura_modelo_param_return $factura_modeloParameterGeneral) : factura_modelo_param_return {
		$factura_modeloReturnGeneral=new factura_modelo_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $factura_modeloReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $factura_modelos,factura_modelo_param_return $factura_modeloParameterGeneral) : factura_modelo_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$factura_modeloReturnGeneral=new factura_modelo_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $factura_modeloReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $factura_modelos,factura_modelo $factura_modelo,factura_modelo_param_return $factura_modeloParameterGeneral,bool $isEsNuevofactura_modelo,array $clases) : factura_modelo_param_return {
		 try {	
			$factura_modeloReturnGeneral=new factura_modelo_param_return();
	
			$factura_modeloReturnGeneral->setfactura_modelo($factura_modelo);
			$factura_modeloReturnGeneral->setfactura_modelos($factura_modelos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$factura_modeloReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $factura_modeloReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $factura_modelos,factura_modelo $factura_modelo,factura_modelo_param_return $factura_modeloParameterGeneral,bool $isEsNuevofactura_modelo,array $clases) : factura_modelo_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$factura_modeloReturnGeneral=new factura_modelo_param_return();
	
			$factura_modeloReturnGeneral->setfactura_modelo($factura_modelo);
			$factura_modeloReturnGeneral->setfactura_modelos($factura_modelos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$factura_modeloReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $factura_modeloReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $factura_modelos,factura_modelo $factura_modelo,factura_modelo_param_return $factura_modeloParameterGeneral,bool $isEsNuevofactura_modelo,array $clases) : factura_modelo_param_return {
		 try {	
			$factura_modeloReturnGeneral=new factura_modelo_param_return();
	
			$factura_modeloReturnGeneral->setfactura_modelo($factura_modelo);
			$factura_modeloReturnGeneral->setfactura_modelos($factura_modelos);
			
			
			
			return $factura_modeloReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $factura_modelos,factura_modelo $factura_modelo,factura_modelo_param_return $factura_modeloParameterGeneral,bool $isEsNuevofactura_modelo,array $clases) : factura_modelo_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$factura_modeloReturnGeneral=new factura_modelo_param_return();
	
			$factura_modeloReturnGeneral->setfactura_modelo($factura_modelo);
			$factura_modeloReturnGeneral->setfactura_modelos($factura_modelos);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $factura_modeloReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,factura_modelo $factura_modelo,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,factura_modelo $factura_modelo,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		factura_modelo_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(factura_modelo $factura_modelo,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//factura_modelo_logic_add::updatefactura_modeloToGet($this->factura_modelo);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$factura_modelo->setfactura_lote($this->factura_modeloDataAccess->getfactura_lote($this->connexion,$factura_modelo));
		$factura_modelo->setcliente($this->factura_modeloDataAccess->getcliente($this->connexion,$factura_modelo));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==factura_lote::$class.'') {
				$factura_modelo->setfactura_lote($this->factura_modeloDataAccess->getfactura_lote($this->connexion,$factura_modelo));
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				$factura_modelo->setcliente($this->factura_modeloDataAccess->getcliente($this->connexion,$factura_modelo));
				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==factura_lote::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura_modelo->setfactura_lote($this->factura_modeloDataAccess->getfactura_lote($this->connexion,$factura_modelo));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura_modelo->setcliente($this->factura_modeloDataAccess->getcliente($this->connexion,$factura_modelo));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$factura_modelo->setfactura_lote($this->factura_modeloDataAccess->getfactura_lote($this->connexion,$factura_modelo));
		$factura_loteLogic= new factura_lote_logic($this->connexion);
		$factura_loteLogic->deepLoad($factura_modelo->getfactura_lote(),$isDeep,$deepLoadType,$clases);
				
		$factura_modelo->setcliente($this->factura_modeloDataAccess->getcliente($this->connexion,$factura_modelo));
		$clienteLogic= new cliente_logic($this->connexion);
		$clienteLogic->deepLoad($factura_modelo->getcliente(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==factura_lote::$class.'') {
				$factura_modelo->setfactura_lote($this->factura_modeloDataAccess->getfactura_lote($this->connexion,$factura_modelo));
				$factura_loteLogic= new factura_lote_logic($this->connexion);
				$factura_loteLogic->deepLoad($factura_modelo->getfactura_lote(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				$factura_modelo->setcliente($this->factura_modeloDataAccess->getcliente($this->connexion,$factura_modelo));
				$clienteLogic= new cliente_logic($this->connexion);
				$clienteLogic->deepLoad($factura_modelo->getcliente(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==factura_lote::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura_modelo->setfactura_lote($this->factura_modeloDataAccess->getfactura_lote($this->connexion,$factura_modelo));
			$factura_loteLogic= new factura_lote_logic($this->connexion);
			$factura_loteLogic->deepLoad($factura_modelo->getfactura_lote(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura_modelo->setcliente($this->factura_modeloDataAccess->getcliente($this->connexion,$factura_modelo));
			$clienteLogic= new cliente_logic($this->connexion);
			$clienteLogic->deepLoad($factura_modelo->getcliente(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(factura_modelo $factura_modelo,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//factura_modelo_logic_add::updatefactura_modeloToSave($this->factura_modelo);			
			
			if(!$paraDeleteCascade) {				
				factura_modelo_data::save($factura_modelo, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		factura_lote_data::save($factura_modelo->getfactura_lote(),$this->connexion);
		cliente_data::save($factura_modelo->getcliente(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==factura_lote::$class.'') {
				factura_lote_data::save($factura_modelo->getfactura_lote(),$this->connexion);
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				cliente_data::save($factura_modelo->getcliente(),$this->connexion);
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==factura_lote::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			factura_lote_data::save($factura_modelo->getfactura_lote(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cliente_data::save($factura_modelo->getcliente(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		factura_lote_data::save($factura_modelo->getfactura_lote(),$this->connexion);
		$factura_loteLogic= new factura_lote_logic($this->connexion);
		$factura_loteLogic->deepSave($factura_modelo->getfactura_lote(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cliente_data::save($factura_modelo->getcliente(),$this->connexion);
		$clienteLogic= new cliente_logic($this->connexion);
		$clienteLogic->deepSave($factura_modelo->getcliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==factura_lote::$class.'') {
				factura_lote_data::save($factura_modelo->getfactura_lote(),$this->connexion);
				$factura_loteLogic= new factura_lote_logic($this->connexion);
				$factura_loteLogic->deepSave($factura_modelo->getfactura_lote(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				cliente_data::save($factura_modelo->getcliente(),$this->connexion);
				$clienteLogic= new cliente_logic($this->connexion);
				$clienteLogic->deepSave($factura_modelo->getcliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==factura_lote::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			factura_lote_data::save($factura_modelo->getfactura_lote(),$this->connexion);
			$factura_loteLogic= new factura_lote_logic($this->connexion);
			$factura_loteLogic->deepSave($factura_modelo->getfactura_lote(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cliente_data::save($factura_modelo->getcliente(),$this->connexion);
			$clienteLogic= new cliente_logic($this->connexion);
			$clienteLogic->deepSave($factura_modelo->getcliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				factura_modelo_data::save($factura_modelo, $this->connexion);
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
			
			$this->deepLoad($this->factura_modelo,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->factura_modelos as $factura_modelo) {
				$this->deepLoad($factura_modelo,$isDeep,$deepLoadType,$clases);
								
				factura_modelo_util::refrescarFKDescripciones($this->factura_modelos);
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
			
			foreach($this->factura_modelos as $factura_modelo) {
				$this->deepLoad($factura_modelo,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->factura_modelo,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->factura_modelos as $factura_modelo) {
				$this->deepSave($factura_modelo,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->factura_modelos as $factura_modelo) {
				$this->deepSave($factura_modelo,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(factura_lote::$class);
				$classes[]=new Classe(cliente::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==factura_lote::$class) {
						$classes[]=new Classe(factura_lote::$class);
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
					if($clas->clas==factura_lote::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(factura_lote::$class);
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
	
	
	
	
	
	
	
	public function getfactura_modelo() : ?factura_modelo {	
		/*
		factura_modelo_logic_add::checkfactura_modeloToGet($this->factura_modelo,$this->datosCliente);
		factura_modelo_logic_add::updatefactura_modeloToGet($this->factura_modelo);
		*/
			
		return $this->factura_modelo;
	}
		
	public function setfactura_modelo(factura_modelo $newfactura_modelo) {
		$this->factura_modelo = $newfactura_modelo;
	}
	
	public function getfactura_modelos() : array {		
		/*
		factura_modelo_logic_add::checkfactura_modeloToGets($this->factura_modelos,$this->datosCliente);
		
		foreach ($this->factura_modelos as $factura_modeloLocal ) {
			factura_modelo_logic_add::updatefactura_modeloToGet($factura_modeloLocal);
		}
		*/
		
		return $this->factura_modelos;
	}
	
	public function setfactura_modelos(array $newfactura_modelos) {
		$this->factura_modelos = $newfactura_modelos;
	}
	
	public function getfactura_modeloDataAccess() : factura_modelo_data {
		return $this->factura_modeloDataAccess;
	}
	
	public function setfactura_modeloDataAccess(factura_modelo_data $newfactura_modeloDataAccess) {
		$this->factura_modeloDataAccess = $newfactura_modeloDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        factura_modelo_carga::$CONTROLLER;;        
		
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
