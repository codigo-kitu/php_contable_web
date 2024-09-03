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

namespace com\bydan\contabilidad\cuentaspagar\giro_negocio_proveedor\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\cuentaspagar\giro_negocio_proveedor\util\giro_negocio_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\giro_negocio_proveedor\util\giro_negocio_proveedor_param_return;


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

use com\bydan\contabilidad\cuentaspagar\giro_negocio_proveedor\util\giro_negocio_proveedor_util;
use com\bydan\contabilidad\cuentaspagar\giro_negocio_proveedor\business\entity\giro_negocio_proveedor;
use com\bydan\contabilidad\cuentaspagar\giro_negocio_proveedor\business\data\giro_negocio_proveedor_data;

//FK


//REL


use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\data\proveedor_data;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

//REL DETALLES




class giro_negocio_proveedor_logic  extends GeneralEntityLogic implements giro_negocio_proveedor_logicI {	
	/*GENERAL*/
	public giro_negocio_proveedor_data $giro_negocio_proveedorDataAccess;
	//public ?giro_negocio_proveedor_logic_add $giro_negocio_proveedorLogicAdditional=null;
	public ?giro_negocio_proveedor $giro_negocio_proveedor;
	public array $giro_negocio_proveedors;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->giro_negocio_proveedorDataAccess = new giro_negocio_proveedor_data();			
			$this->giro_negocio_proveedors = array();
			$this->giro_negocio_proveedor = new giro_negocio_proveedor();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->giro_negocio_proveedorLogicAdditional = new giro_negocio_proveedor_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->giro_negocio_proveedorLogicAdditional==null) {
		//	$this->giro_negocio_proveedorLogicAdditional=new giro_negocio_proveedor_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->giro_negocio_proveedorDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->giro_negocio_proveedorDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->giro_negocio_proveedorDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->giro_negocio_proveedorDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->giro_negocio_proveedors = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->giro_negocio_proveedors=$this->giro_negocio_proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				giro_negocio_proveedor_util::refrescarFKDescripciones($this->giro_negocio_proveedors);
			}
			
			//giro_negocio_proveedor_logic_add::checkgiro_negocio_proveedorToGets($this->giro_negocio_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->giro_negocio_proveedors);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->giro_negocio_proveedors = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->giro_negocio_proveedors=$this->giro_negocio_proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				giro_negocio_proveedor_util::refrescarFKDescripciones($this->giro_negocio_proveedors);
			}
			
			//giro_negocio_proveedor_logic_add::checkgiro_negocio_proveedorToGets($this->giro_negocio_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->giro_negocio_proveedors);
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
		$this->giro_negocio_proveedor = new giro_negocio_proveedor();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->giro_negocio_proveedor=$this->giro_negocio_proveedorDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->giro_negocio_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				giro_negocio_proveedor_util::refrescarFKDescripcion($this->giro_negocio_proveedor);
			}
						
			//giro_negocio_proveedor_logic_add::checkgiro_negocio_proveedorToGet($this->giro_negocio_proveedor,$this->datosCliente);
			//giro_negocio_proveedor_logic_add::updategiro_negocio_proveedorToGet($this->giro_negocio_proveedor);
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
		$this->giro_negocio_proveedor = new  giro_negocio_proveedor();
		  		  
        try {		
			$this->giro_negocio_proveedor=$this->giro_negocio_proveedorDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->giro_negocio_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				giro_negocio_proveedor_util::refrescarFKDescripcion($this->giro_negocio_proveedor);
			}
			
			//giro_negocio_proveedor_logic_add::checkgiro_negocio_proveedorToGet($this->giro_negocio_proveedor,$this->datosCliente);
			//giro_negocio_proveedor_logic_add::updategiro_negocio_proveedorToGet($this->giro_negocio_proveedor);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?giro_negocio_proveedor {
		$giro_negocio_proveedorLogic = new  giro_negocio_proveedor_logic();
		  		  
        try {		
			$giro_negocio_proveedorLogic->setConnexion($connexion);			
			$giro_negocio_proveedorLogic->getEntity($id);			
			return $giro_negocio_proveedorLogic->getgiro_negocio_proveedor();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->giro_negocio_proveedor = new  giro_negocio_proveedor();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->giro_negocio_proveedor=$this->giro_negocio_proveedorDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->giro_negocio_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				giro_negocio_proveedor_util::refrescarFKDescripcion($this->giro_negocio_proveedor);
			}
			
			//giro_negocio_proveedor_logic_add::checkgiro_negocio_proveedorToGet($this->giro_negocio_proveedor,$this->datosCliente);
			//giro_negocio_proveedor_logic_add::updategiro_negocio_proveedorToGet($this->giro_negocio_proveedor);
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
		$this->giro_negocio_proveedor = new  giro_negocio_proveedor();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->giro_negocio_proveedor=$this->giro_negocio_proveedorDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->giro_negocio_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				giro_negocio_proveedor_util::refrescarFKDescripcion($this->giro_negocio_proveedor);
			}
			
			//giro_negocio_proveedor_logic_add::checkgiro_negocio_proveedorToGet($this->giro_negocio_proveedor,$this->datosCliente);
			//giro_negocio_proveedor_logic_add::updategiro_negocio_proveedorToGet($this->giro_negocio_proveedor);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?giro_negocio_proveedor {
		$giro_negocio_proveedorLogic = new  giro_negocio_proveedor_logic();
		  		  
        try {		
			$giro_negocio_proveedorLogic->setConnexion($connexion);			
			$giro_negocio_proveedorLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $giro_negocio_proveedorLogic->getgiro_negocio_proveedor();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->giro_negocio_proveedors = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->giro_negocio_proveedors=$this->giro_negocio_proveedorDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				giro_negocio_proveedor_util::refrescarFKDescripciones($this->giro_negocio_proveedors);
			}
			
			//giro_negocio_proveedor_logic_add::checkgiro_negocio_proveedorToGets($this->giro_negocio_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->giro_negocio_proveedors);			
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
		$this->giro_negocio_proveedors = array();
		  		  
        try {			
			$this->giro_negocio_proveedors=$this->giro_negocio_proveedorDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				giro_negocio_proveedor_util::refrescarFKDescripciones($this->giro_negocio_proveedors);
			}
			
			//giro_negocio_proveedor_logic_add::checkgiro_negocio_proveedorToGets($this->giro_negocio_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->giro_negocio_proveedors);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->giro_negocio_proveedors = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->giro_negocio_proveedors=$this->giro_negocio_proveedorDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				giro_negocio_proveedor_util::refrescarFKDescripciones($this->giro_negocio_proveedors);
			}
			
			//giro_negocio_proveedor_logic_add::checkgiro_negocio_proveedorToGets($this->giro_negocio_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->giro_negocio_proveedors);
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
		$this->giro_negocio_proveedors = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->giro_negocio_proveedors=$this->giro_negocio_proveedorDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				giro_negocio_proveedor_util::refrescarFKDescripciones($this->giro_negocio_proveedors);
			}
			
			//giro_negocio_proveedor_logic_add::checkgiro_negocio_proveedorToGets($this->giro_negocio_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->giro_negocio_proveedors);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$giro_negocio_proveedorLogic = new  giro_negocio_proveedor_logic();
		  		  
        try {		
			$giro_negocio_proveedorLogic->setConnexion($connexion);			
			$giro_negocio_proveedorLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $giro_negocio_proveedorLogic->getgiro_negocio_proveedors();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->giro_negocio_proveedors = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->giro_negocio_proveedors=$this->giro_negocio_proveedorDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				giro_negocio_proveedor_util::refrescarFKDescripciones($this->giro_negocio_proveedors);
			}
			
			//giro_negocio_proveedor_logic_add::checkgiro_negocio_proveedorToGets($this->giro_negocio_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->giro_negocio_proveedors);
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
		$this->giro_negocio_proveedors = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->giro_negocio_proveedors=$this->giro_negocio_proveedorDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				giro_negocio_proveedor_util::refrescarFKDescripciones($this->giro_negocio_proveedors);
			}
			
			//giro_negocio_proveedor_logic_add::checkgiro_negocio_proveedorToGets($this->giro_negocio_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->giro_negocio_proveedors);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->giro_negocio_proveedors = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->giro_negocio_proveedors=$this->giro_negocio_proveedorDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				giro_negocio_proveedor_util::refrescarFKDescripciones($this->giro_negocio_proveedors);
			}
			
			//giro_negocio_proveedor_logic_add::checkgiro_negocio_proveedorToGets($this->giro_negocio_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->giro_negocio_proveedors);
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
		$this->giro_negocio_proveedors = array();
		  		  
        try {			
			$this->giro_negocio_proveedors=$this->giro_negocio_proveedorDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				giro_negocio_proveedor_util::refrescarFKDescripciones($this->giro_negocio_proveedors);
			}	
			
			//giro_negocio_proveedor_logic_add::checkgiro_negocio_proveedorToGets($this->giro_negocio_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->giro_negocio_proveedors);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->giro_negocio_proveedors = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->giro_negocio_proveedors=$this->giro_negocio_proveedorDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				giro_negocio_proveedor_util::refrescarFKDescripciones($this->giro_negocio_proveedors);
			}
			
			//giro_negocio_proveedor_logic_add::checkgiro_negocio_proveedorToGets($this->giro_negocio_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->giro_negocio_proveedors);
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
		$this->giro_negocio_proveedors = array();
		  		  
        try {		
			$this->giro_negocio_proveedors=$this->giro_negocio_proveedorDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				giro_negocio_proveedor_util::refrescarFKDescripciones($this->giro_negocio_proveedors);
			}
			
			//giro_negocio_proveedor_logic_add::checkgiro_negocio_proveedorToGets($this->giro_negocio_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->giro_negocio_proveedors);

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
						
			//giro_negocio_proveedor_logic_add::checkgiro_negocio_proveedorToSave($this->giro_negocio_proveedor,$this->datosCliente,$this->connexion);	       
			//giro_negocio_proveedor_logic_add::updategiro_negocio_proveedorToSave($this->giro_negocio_proveedor);			
			giro_negocio_proveedor_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->giro_negocio_proveedor,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->giro_negocio_proveedorLogicAdditional->checkGeneralEntityToSave($this,$this->giro_negocio_proveedor,$this->datosCliente,$this->connexion);
			
			
			giro_negocio_proveedor_data::save($this->giro_negocio_proveedor, $this->connexion);	    	       	 				
			//giro_negocio_proveedor_logic_add::checkgiro_negocio_proveedorToSaveAfter($this->giro_negocio_proveedor,$this->datosCliente,$this->connexion);			
			//$this->giro_negocio_proveedorLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->giro_negocio_proveedor,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->giro_negocio_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->giro_negocio_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				giro_negocio_proveedor_util::refrescarFKDescripcion($this->giro_negocio_proveedor);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->giro_negocio_proveedor->getIsDeleted()) {
				$this->giro_negocio_proveedor=null;
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
						
			/*giro_negocio_proveedor_logic_add::checkgiro_negocio_proveedorToSave($this->giro_negocio_proveedor,$this->datosCliente,$this->connexion);*/	        
			//giro_negocio_proveedor_logic_add::updategiro_negocio_proveedorToSave($this->giro_negocio_proveedor);			
			//$this->giro_negocio_proveedorLogicAdditional->checkGeneralEntityToSave($this,$this->giro_negocio_proveedor,$this->datosCliente,$this->connexion);			
			giro_negocio_proveedor_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->giro_negocio_proveedor,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			giro_negocio_proveedor_data::save($this->giro_negocio_proveedor, $this->connexion);	    	       	 						
			/*giro_negocio_proveedor_logic_add::checkgiro_negocio_proveedorToSaveAfter($this->giro_negocio_proveedor,$this->datosCliente,$this->connexion);*/			
			//$this->giro_negocio_proveedorLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->giro_negocio_proveedor,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->giro_negocio_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->giro_negocio_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				giro_negocio_proveedor_util::refrescarFKDescripcion($this->giro_negocio_proveedor);				
			}
			
			if($this->giro_negocio_proveedor->getIsDeleted()) {
				$this->giro_negocio_proveedor=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(giro_negocio_proveedor $giro_negocio_proveedor,Connexion $connexion)  {
		$giro_negocio_proveedorLogic = new  giro_negocio_proveedor_logic();		  		  
        try {		
			$giro_negocio_proveedorLogic->setConnexion($connexion);			
			$giro_negocio_proveedorLogic->setgiro_negocio_proveedor($giro_negocio_proveedor);			
			$giro_negocio_proveedorLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*giro_negocio_proveedor_logic_add::checkgiro_negocio_proveedorToSaves($this->giro_negocio_proveedors,$this->datosCliente,$this->connexion);*/	        	
			//$this->giro_negocio_proveedorLogicAdditional->checkGeneralEntitiesToSaves($this,$this->giro_negocio_proveedors,$this->datosCliente,$this->connexion);
			
	   		foreach($this->giro_negocio_proveedors as $giro_negocio_proveedorLocal) {				
								
				//giro_negocio_proveedor_logic_add::updategiro_negocio_proveedorToSave($giro_negocio_proveedorLocal);	        	
				giro_negocio_proveedor_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$giro_negocio_proveedorLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				giro_negocio_proveedor_data::save($giro_negocio_proveedorLocal, $this->connexion);				
			}
			
			/*giro_negocio_proveedor_logic_add::checkgiro_negocio_proveedorToSavesAfter($this->giro_negocio_proveedors,$this->datosCliente,$this->connexion);*/			
			//$this->giro_negocio_proveedorLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->giro_negocio_proveedors,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				giro_negocio_proveedor_util::refrescarFKDescripciones($this->giro_negocio_proveedors);
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
			/*giro_negocio_proveedor_logic_add::checkgiro_negocio_proveedorToSaves($this->giro_negocio_proveedors,$this->datosCliente,$this->connexion);*/			
			//$this->giro_negocio_proveedorLogicAdditional->checkGeneralEntitiesToSaves($this,$this->giro_negocio_proveedors,$this->datosCliente,$this->connexion);
			
	   		foreach($this->giro_negocio_proveedors as $giro_negocio_proveedorLocal) {				
								
				//giro_negocio_proveedor_logic_add::updategiro_negocio_proveedorToSave($giro_negocio_proveedorLocal);	        	
				giro_negocio_proveedor_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$giro_negocio_proveedorLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				giro_negocio_proveedor_data::save($giro_negocio_proveedorLocal, $this->connexion);				
			}			
			
			/*giro_negocio_proveedor_logic_add::checkgiro_negocio_proveedorToSavesAfter($this->giro_negocio_proveedors,$this->datosCliente,$this->connexion);*/			
			//$this->giro_negocio_proveedorLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->giro_negocio_proveedors,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				giro_negocio_proveedor_util::refrescarFKDescripciones($this->giro_negocio_proveedors);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $giro_negocio_proveedors,Connexion $connexion)  {
		$giro_negocio_proveedorLogic = new  giro_negocio_proveedor_logic();
		  		  
        try {		
			$giro_negocio_proveedorLogic->setConnexion($connexion);			
			$giro_negocio_proveedorLogic->setgiro_negocio_proveedors($giro_negocio_proveedors);			
			$giro_negocio_proveedorLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$giro_negocio_proveedorsAux=array();
		
		foreach($this->giro_negocio_proveedors as $giro_negocio_proveedor) {
			if($giro_negocio_proveedor->getIsDeleted()==false) {
				$giro_negocio_proveedorsAux[]=$giro_negocio_proveedor;
			}
		}
		
		$this->giro_negocio_proveedors=$giro_negocio_proveedorsAux;
	}
	
	public function updateToGetsAuxiliar(array &$giro_negocio_proveedors) {
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
	
	
	
	public function saveRelacionesWithConnection($giro_negocio_proveedor,$proveedors) {
		$this->saveRelacionesBase($giro_negocio_proveedor,$proveedors,true);
	}

	public function saveRelaciones($giro_negocio_proveedor,$proveedors) {
		$this->saveRelacionesBase($giro_negocio_proveedor,$proveedors,false);
	}

	public function saveRelacionesBase($giro_negocio_proveedor,$proveedors=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$giro_negocio_proveedor->setproveedors($proveedors);
			$this->setgiro_negocio_proveedor($giro_negocio_proveedor);

			if(true) {

				//giro_negocio_proveedor_logic_add::updateRelacionesToSave($giro_negocio_proveedor,$this);

				if(($this->giro_negocio_proveedor->getIsNew() || $this->giro_negocio_proveedor->getIsChanged()) && !$this->giro_negocio_proveedor->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($proveedors);

				} else if($this->giro_negocio_proveedor->getIsDeleted()) {
					$this->saveRelacionesDetalles($proveedors);
					$this->save();
				}

				//giro_negocio_proveedor_logic_add::updateRelacionesToSaveAfter($giro_negocio_proveedor,$this);

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
	
	
	public function saveRelacionesDetalles($proveedors=array()) {
		try {
	

			$idgiro_negocio_proveedorActual=$this->getgiro_negocio_proveedor()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/proveedor_carga.php');
			proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$proveedorLogic_Desde_giro_negocio_proveedor=new proveedor_logic();
			$proveedorLogic_Desde_giro_negocio_proveedor->setproveedors($proveedors);

			$proveedorLogic_Desde_giro_negocio_proveedor->setConnexion($this->getConnexion());
			$proveedorLogic_Desde_giro_negocio_proveedor->setDatosCliente($this->datosCliente);

			foreach($proveedorLogic_Desde_giro_negocio_proveedor->getproveedors() as $proveedor_Desde_giro_negocio_proveedor) {
				$proveedor_Desde_giro_negocio_proveedor->setid_giro_negocio_proveedor($idgiro_negocio_proveedorActual);

				$proveedorLogic_Desde_giro_negocio_proveedor->setproveedor($proveedor_Desde_giro_negocio_proveedor);
				$proveedorLogic_Desde_giro_negocio_proveedor->save();
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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $giro_negocio_proveedors,giro_negocio_proveedor_param_return $giro_negocio_proveedorParameterGeneral) : giro_negocio_proveedor_param_return {
		$giro_negocio_proveedorReturnGeneral=new giro_negocio_proveedor_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $giro_negocio_proveedorReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $giro_negocio_proveedors,giro_negocio_proveedor_param_return $giro_negocio_proveedorParameterGeneral) : giro_negocio_proveedor_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$giro_negocio_proveedorReturnGeneral=new giro_negocio_proveedor_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $giro_negocio_proveedorReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $giro_negocio_proveedors,giro_negocio_proveedor $giro_negocio_proveedor,giro_negocio_proveedor_param_return $giro_negocio_proveedorParameterGeneral,bool $isEsNuevogiro_negocio_proveedor,array $clases) : giro_negocio_proveedor_param_return {
		 try {	
			$giro_negocio_proveedorReturnGeneral=new giro_negocio_proveedor_param_return();
	
			$giro_negocio_proveedorReturnGeneral->setgiro_negocio_proveedor($giro_negocio_proveedor);
			$giro_negocio_proveedorReturnGeneral->setgiro_negocio_proveedors($giro_negocio_proveedors);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$giro_negocio_proveedorReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $giro_negocio_proveedorReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $giro_negocio_proveedors,giro_negocio_proveedor $giro_negocio_proveedor,giro_negocio_proveedor_param_return $giro_negocio_proveedorParameterGeneral,bool $isEsNuevogiro_negocio_proveedor,array $clases) : giro_negocio_proveedor_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$giro_negocio_proveedorReturnGeneral=new giro_negocio_proveedor_param_return();
	
			$giro_negocio_proveedorReturnGeneral->setgiro_negocio_proveedor($giro_negocio_proveedor);
			$giro_negocio_proveedorReturnGeneral->setgiro_negocio_proveedors($giro_negocio_proveedors);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$giro_negocio_proveedorReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $giro_negocio_proveedorReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $giro_negocio_proveedors,giro_negocio_proveedor $giro_negocio_proveedor,giro_negocio_proveedor_param_return $giro_negocio_proveedorParameterGeneral,bool $isEsNuevogiro_negocio_proveedor,array $clases) : giro_negocio_proveedor_param_return {
		 try {	
			$giro_negocio_proveedorReturnGeneral=new giro_negocio_proveedor_param_return();
	
			$giro_negocio_proveedorReturnGeneral->setgiro_negocio_proveedor($giro_negocio_proveedor);
			$giro_negocio_proveedorReturnGeneral->setgiro_negocio_proveedors($giro_negocio_proveedors);
			
			
			
			return $giro_negocio_proveedorReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $giro_negocio_proveedors,giro_negocio_proveedor $giro_negocio_proveedor,giro_negocio_proveedor_param_return $giro_negocio_proveedorParameterGeneral,bool $isEsNuevogiro_negocio_proveedor,array $clases) : giro_negocio_proveedor_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$giro_negocio_proveedorReturnGeneral=new giro_negocio_proveedor_param_return();
	
			$giro_negocio_proveedorReturnGeneral->setgiro_negocio_proveedor($giro_negocio_proveedor);
			$giro_negocio_proveedorReturnGeneral->setgiro_negocio_proveedors($giro_negocio_proveedors);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $giro_negocio_proveedorReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,giro_negocio_proveedor $giro_negocio_proveedor,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,giro_negocio_proveedor $giro_negocio_proveedor,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		giro_negocio_proveedor_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(giro_negocio_proveedor $giro_negocio_proveedor,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//giro_negocio_proveedor_logic_add::updategiro_negocio_proveedorToGet($this->giro_negocio_proveedor);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$giro_negocio_proveedor->setproveedors($this->giro_negocio_proveedorDataAccess->getproveedors($this->connexion,$giro_negocio_proveedor));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$giro_negocio_proveedor->setproveedors($this->giro_negocio_proveedorDataAccess->getproveedors($this->connexion,$giro_negocio_proveedor));

				if($this->isConDeep) {
					$proveedorLogic= new proveedor_logic($this->connexion);
					$proveedorLogic->setproveedors($giro_negocio_proveedor->getproveedors());
					$classesLocal=proveedor_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$proveedorLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					proveedor_util::refrescarFKDescripciones($proveedorLogic->getproveedors());
					$giro_negocio_proveedor->setproveedors($proveedorLogic->getproveedors());
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


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
			$giro_negocio_proveedor->setproveedors($this->giro_negocio_proveedorDataAccess->getproveedors($this->connexion,$giro_negocio_proveedor));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {


		$giro_negocio_proveedor->setproveedors($this->giro_negocio_proveedorDataAccess->getproveedors($this->connexion,$giro_negocio_proveedor));

		foreach($giro_negocio_proveedor->getproveedors() as $proveedor) {
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedorLogic->deepLoad($proveedor,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$giro_negocio_proveedor->setproveedors($this->giro_negocio_proveedorDataAccess->getproveedors($this->connexion,$giro_negocio_proveedor));

				foreach($giro_negocio_proveedor->getproveedors() as $proveedor) {
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
			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(proveedor::$class);
			$giro_negocio_proveedor->setproveedors($this->giro_negocio_proveedorDataAccess->getproveedors($this->connexion,$giro_negocio_proveedor));

			foreach($giro_negocio_proveedor->getproveedors() as $proveedor) {
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
	
	public function deepSave(giro_negocio_proveedor $giro_negocio_proveedor,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//giro_negocio_proveedor_logic_add::updategiro_negocio_proveedorToSave($this->giro_negocio_proveedor);			
			
			if(!$paraDeleteCascade) {				
				giro_negocio_proveedor_data::save($giro_negocio_proveedor, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($giro_negocio_proveedor->getproveedors() as $proveedor) {
			$proveedor->setid_giro_negocio_proveedor($giro_negocio_proveedor->getId());
			proveedor_data::save($proveedor,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($giro_negocio_proveedor->getproveedors() as $proveedor) {
					$proveedor->setid_giro_negocio_proveedor($giro_negocio_proveedor->getId());
					proveedor_data::save($proveedor,$this->connexion);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


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

			foreach($giro_negocio_proveedor->getproveedors() as $proveedor) {
				$proveedor->setid_giro_negocio_proveedor($giro_negocio_proveedor->getId());
				proveedor_data::save($proveedor,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($giro_negocio_proveedor->getproveedors() as $proveedor) {
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedor->setid_giro_negocio_proveedor($giro_negocio_proveedor->getId());
			proveedor_data::save($proveedor,$this->connexion);
			$proveedorLogic->deepSave($proveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($giro_negocio_proveedor->getproveedors() as $proveedor) {
					$proveedorLogic= new proveedor_logic($this->connexion);
					$proveedor->setid_giro_negocio_proveedor($giro_negocio_proveedor->getId());
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
			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(proveedor::$class);

			foreach($giro_negocio_proveedor->getproveedors() as $proveedor) {
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedor->setid_giro_negocio_proveedor($giro_negocio_proveedor->getId());
				proveedor_data::save($proveedor,$this->connexion);
				$proveedorLogic->deepSave($proveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				giro_negocio_proveedor_data::save($giro_negocio_proveedor, $this->connexion);
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
			
			$this->deepLoad($this->giro_negocio_proveedor,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->giro_negocio_proveedors as $giro_negocio_proveedor) {
				$this->deepLoad($giro_negocio_proveedor,$isDeep,$deepLoadType,$clases);
								
				giro_negocio_proveedor_util::refrescarFKDescripciones($this->giro_negocio_proveedors);
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
			
			foreach($this->giro_negocio_proveedors as $giro_negocio_proveedor) {
				$this->deepLoad($giro_negocio_proveedor,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->giro_negocio_proveedor,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->giro_negocio_proveedors as $giro_negocio_proveedor) {
				$this->deepSave($giro_negocio_proveedor,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->giro_negocio_proveedors as $giro_negocio_proveedor) {
				$this->deepSave($giro_negocio_proveedor,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(proveedor::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==proveedor::$class) {
						$classes[]=new Classe(proveedor::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

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
	
	
	
	
	
	
	
	public function getgiro_negocio_proveedor() : ?giro_negocio_proveedor {	
		/*
		giro_negocio_proveedor_logic_add::checkgiro_negocio_proveedorToGet($this->giro_negocio_proveedor,$this->datosCliente);
		giro_negocio_proveedor_logic_add::updategiro_negocio_proveedorToGet($this->giro_negocio_proveedor);
		*/
			
		return $this->giro_negocio_proveedor;
	}
		
	public function setgiro_negocio_proveedor(giro_negocio_proveedor $newgiro_negocio_proveedor) {
		$this->giro_negocio_proveedor = $newgiro_negocio_proveedor;
	}
	
	public function getgiro_negocio_proveedors() : array {		
		/*
		giro_negocio_proveedor_logic_add::checkgiro_negocio_proveedorToGets($this->giro_negocio_proveedors,$this->datosCliente);
		
		foreach ($this->giro_negocio_proveedors as $giro_negocio_proveedorLocal ) {
			giro_negocio_proveedor_logic_add::updategiro_negocio_proveedorToGet($giro_negocio_proveedorLocal);
		}
		*/
		
		return $this->giro_negocio_proveedors;
	}
	
	public function setgiro_negocio_proveedors(array $newgiro_negocio_proveedors) {
		$this->giro_negocio_proveedors = $newgiro_negocio_proveedors;
	}
	
	public function getgiro_negocio_proveedorDataAccess() : giro_negocio_proveedor_data {
		return $this->giro_negocio_proveedorDataAccess;
	}
	
	public function setgiro_negocio_proveedorDataAccess(giro_negocio_proveedor_data $newgiro_negocio_proveedorDataAccess) {
		$this->giro_negocio_proveedorDataAccess = $newgiro_negocio_proveedorDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        giro_negocio_proveedor_carga::$CONTROLLER;;        
		
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
