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

namespace com\bydan\contabilidad\cuentaspagar\documento_proveedor\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\cuentaspagar\documento_proveedor\util\documento_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\documento_proveedor\util\documento_proveedor_param_return;

use com\bydan\contabilidad\cuentaspagar\documento_proveedor\presentation\session\documento_proveedor_session;

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

use com\bydan\contabilidad\cuentaspagar\documento_proveedor\util\documento_proveedor_util;
use com\bydan\contabilidad\cuentaspagar\documento_proveedor\business\entity\documento_proveedor;
use com\bydan\contabilidad\cuentaspagar\documento_proveedor\business\data\documento_proveedor_data;

//FK


use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\data\proveedor_data;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

//REL


use com\bydan\contabilidad\cuentascobrar\documento_cliente\business\entity\documento_cliente;
use com\bydan\contabilidad\cuentascobrar\documento_cliente\business\data\documento_cliente_data;
use com\bydan\contabilidad\cuentascobrar\documento_cliente\business\logic\documento_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\documento_cliente\util\documento_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\documento_cliente\util\documento_cliente_util;

//REL DETALLES




class documento_proveedor_logic  extends GeneralEntityLogic implements documento_proveedor_logicI {	
	/*GENERAL*/
	public documento_proveedor_data $documento_proveedorDataAccess;
	//public ?documento_proveedor_logic_add $documento_proveedorLogicAdditional=null;
	public ?documento_proveedor $documento_proveedor;
	public array $documento_proveedors;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->documento_proveedorDataAccess = new documento_proveedor_data();			
			$this->documento_proveedors = array();
			$this->documento_proveedor = new documento_proveedor();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->documento_proveedorLogicAdditional = new documento_proveedor_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->documento_proveedorLogicAdditional==null) {
		//	$this->documento_proveedorLogicAdditional=new documento_proveedor_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->documento_proveedorDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->documento_proveedorDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->documento_proveedorDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->documento_proveedorDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->documento_proveedors = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->documento_proveedors=$this->documento_proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_proveedor_util::refrescarFKDescripciones($this->documento_proveedors);
			}
			
			//documento_proveedor_logic_add::checkdocumento_proveedorToGets($this->documento_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_proveedors);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->documento_proveedors = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->documento_proveedors=$this->documento_proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_proveedor_util::refrescarFKDescripciones($this->documento_proveedors);
			}
			
			//documento_proveedor_logic_add::checkdocumento_proveedorToGets($this->documento_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_proveedors);
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
		$this->documento_proveedor = new documento_proveedor();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->documento_proveedor=$this->documento_proveedorDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->documento_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				documento_proveedor_util::refrescarFKDescripcion($this->documento_proveedor);
			}
						
			//documento_proveedor_logic_add::checkdocumento_proveedorToGet($this->documento_proveedor,$this->datosCliente);
			//documento_proveedor_logic_add::updatedocumento_proveedorToGet($this->documento_proveedor);
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
		$this->documento_proveedor = new  documento_proveedor();
		  		  
        try {		
			$this->documento_proveedor=$this->documento_proveedorDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->documento_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				documento_proveedor_util::refrescarFKDescripcion($this->documento_proveedor);
			}
			
			//documento_proveedor_logic_add::checkdocumento_proveedorToGet($this->documento_proveedor,$this->datosCliente);
			//documento_proveedor_logic_add::updatedocumento_proveedorToGet($this->documento_proveedor);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?documento_proveedor {
		$documento_proveedorLogic = new  documento_proveedor_logic();
		  		  
        try {		
			$documento_proveedorLogic->setConnexion($connexion);			
			$documento_proveedorLogic->getEntity($id);			
			return $documento_proveedorLogic->getdocumento_proveedor();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->documento_proveedor = new  documento_proveedor();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->documento_proveedor=$this->documento_proveedorDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->documento_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				documento_proveedor_util::refrescarFKDescripcion($this->documento_proveedor);
			}
			
			//documento_proveedor_logic_add::checkdocumento_proveedorToGet($this->documento_proveedor,$this->datosCliente);
			//documento_proveedor_logic_add::updatedocumento_proveedorToGet($this->documento_proveedor);
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
		$this->documento_proveedor = new  documento_proveedor();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->documento_proveedor=$this->documento_proveedorDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->documento_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				documento_proveedor_util::refrescarFKDescripcion($this->documento_proveedor);
			}
			
			//documento_proveedor_logic_add::checkdocumento_proveedorToGet($this->documento_proveedor,$this->datosCliente);
			//documento_proveedor_logic_add::updatedocumento_proveedorToGet($this->documento_proveedor);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?documento_proveedor {
		$documento_proveedorLogic = new  documento_proveedor_logic();
		  		  
        try {		
			$documento_proveedorLogic->setConnexion($connexion);			
			$documento_proveedorLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $documento_proveedorLogic->getdocumento_proveedor();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->documento_proveedors = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->documento_proveedors=$this->documento_proveedorDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_proveedor_util::refrescarFKDescripciones($this->documento_proveedors);
			}
			
			//documento_proveedor_logic_add::checkdocumento_proveedorToGets($this->documento_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_proveedors);			
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
		$this->documento_proveedors = array();
		  		  
        try {			
			$this->documento_proveedors=$this->documento_proveedorDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_proveedor_util::refrescarFKDescripciones($this->documento_proveedors);
			}
			
			//documento_proveedor_logic_add::checkdocumento_proveedorToGets($this->documento_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_proveedors);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->documento_proveedors = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->documento_proveedors=$this->documento_proveedorDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_proveedor_util::refrescarFKDescripciones($this->documento_proveedors);
			}
			
			//documento_proveedor_logic_add::checkdocumento_proveedorToGets($this->documento_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_proveedors);
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
		$this->documento_proveedors = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->documento_proveedors=$this->documento_proveedorDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_proveedor_util::refrescarFKDescripciones($this->documento_proveedors);
			}
			
			//documento_proveedor_logic_add::checkdocumento_proveedorToGets($this->documento_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_proveedors);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$documento_proveedorLogic = new  documento_proveedor_logic();
		  		  
        try {		
			$documento_proveedorLogic->setConnexion($connexion);			
			$documento_proveedorLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $documento_proveedorLogic->getdocumento_proveedors();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->documento_proveedors = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->documento_proveedors=$this->documento_proveedorDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_proveedor_util::refrescarFKDescripciones($this->documento_proveedors);
			}
			
			//documento_proveedor_logic_add::checkdocumento_proveedorToGets($this->documento_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_proveedors);
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
		$this->documento_proveedors = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->documento_proveedors=$this->documento_proveedorDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_proveedor_util::refrescarFKDescripciones($this->documento_proveedors);
			}
			
			//documento_proveedor_logic_add::checkdocumento_proveedorToGets($this->documento_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_proveedors);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->documento_proveedors = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->documento_proveedors=$this->documento_proveedorDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_proveedor_util::refrescarFKDescripciones($this->documento_proveedors);
			}
			
			//documento_proveedor_logic_add::checkdocumento_proveedorToGets($this->documento_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_proveedors);
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
		$this->documento_proveedors = array();
		  		  
        try {			
			$this->documento_proveedors=$this->documento_proveedorDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_proveedor_util::refrescarFKDescripciones($this->documento_proveedors);
			}	
			
			//documento_proveedor_logic_add::checkdocumento_proveedorToGets($this->documento_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_proveedors);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->documento_proveedors = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->documento_proveedors=$this->documento_proveedorDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_proveedor_util::refrescarFKDescripciones($this->documento_proveedors);
			}
			
			//documento_proveedor_logic_add::checkdocumento_proveedorToGets($this->documento_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_proveedors);
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
		$this->documento_proveedors = array();
		  		  
        try {		
			$this->documento_proveedors=$this->documento_proveedorDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_proveedor_util::refrescarFKDescripciones($this->documento_proveedors);
			}
			
			//documento_proveedor_logic_add::checkdocumento_proveedorToGets($this->documento_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_proveedors);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_IdproveedorWithConnection(string $strFinalQuery,Pagination $pagination,int $id_proveedor) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_proveedor= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_proveedor,documento_proveedor_util::$ID_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_proveedor);

			$this->documento_proveedors=$this->documento_proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				documento_proveedor_util::refrescarFKDescripciones($this->documento_proveedors);
			}
			//documento_proveedor_logic_add::checkdocumento_proveedorToGets($this->documento_proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->documento_proveedors);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idproveedor(string $strFinalQuery,Pagination $pagination,int $id_proveedor) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_proveedor= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_proveedor,documento_proveedor_util::$ID_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_proveedor);

			$this->documento_proveedors=$this->documento_proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				documento_proveedor_util::refrescarFKDescripciones($this->documento_proveedors);
			}
			//documento_proveedor_logic_add::checkdocumento_proveedorToGets($this->documento_proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->documento_proveedors);
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
						
			//documento_proveedor_logic_add::checkdocumento_proveedorToSave($this->documento_proveedor,$this->datosCliente,$this->connexion);	       
			//documento_proveedor_logic_add::updatedocumento_proveedorToSave($this->documento_proveedor);			
			documento_proveedor_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->documento_proveedor,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->documento_proveedorLogicAdditional->checkGeneralEntityToSave($this,$this->documento_proveedor,$this->datosCliente,$this->connexion);
			
			
			documento_proveedor_data::save($this->documento_proveedor, $this->connexion);	    	       	 				
			//documento_proveedor_logic_add::checkdocumento_proveedorToSaveAfter($this->documento_proveedor,$this->datosCliente,$this->connexion);			
			//$this->documento_proveedorLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->documento_proveedor,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->documento_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->documento_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				documento_proveedor_util::refrescarFKDescripcion($this->documento_proveedor);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->documento_proveedor->getIsDeleted()) {
				$this->documento_proveedor=null;
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
						
			/*documento_proveedor_logic_add::checkdocumento_proveedorToSave($this->documento_proveedor,$this->datosCliente,$this->connexion);*/	        
			//documento_proveedor_logic_add::updatedocumento_proveedorToSave($this->documento_proveedor);			
			//$this->documento_proveedorLogicAdditional->checkGeneralEntityToSave($this,$this->documento_proveedor,$this->datosCliente,$this->connexion);			
			documento_proveedor_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->documento_proveedor,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			documento_proveedor_data::save($this->documento_proveedor, $this->connexion);	    	       	 						
			/*documento_proveedor_logic_add::checkdocumento_proveedorToSaveAfter($this->documento_proveedor,$this->datosCliente,$this->connexion);*/			
			//$this->documento_proveedorLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->documento_proveedor,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->documento_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->documento_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				documento_proveedor_util::refrescarFKDescripcion($this->documento_proveedor);				
			}
			
			if($this->documento_proveedor->getIsDeleted()) {
				$this->documento_proveedor=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(documento_proveedor $documento_proveedor,Connexion $connexion)  {
		$documento_proveedorLogic = new  documento_proveedor_logic();		  		  
        try {		
			$documento_proveedorLogic->setConnexion($connexion);			
			$documento_proveedorLogic->setdocumento_proveedor($documento_proveedor);			
			$documento_proveedorLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*documento_proveedor_logic_add::checkdocumento_proveedorToSaves($this->documento_proveedors,$this->datosCliente,$this->connexion);*/	        	
			//$this->documento_proveedorLogicAdditional->checkGeneralEntitiesToSaves($this,$this->documento_proveedors,$this->datosCliente,$this->connexion);
			
	   		foreach($this->documento_proveedors as $documento_proveedorLocal) {				
								
				//documento_proveedor_logic_add::updatedocumento_proveedorToSave($documento_proveedorLocal);	        	
				documento_proveedor_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$documento_proveedorLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				documento_proveedor_data::save($documento_proveedorLocal, $this->connexion);				
			}
			
			/*documento_proveedor_logic_add::checkdocumento_proveedorToSavesAfter($this->documento_proveedors,$this->datosCliente,$this->connexion);*/			
			//$this->documento_proveedorLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->documento_proveedors,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_proveedor_util::refrescarFKDescripciones($this->documento_proveedors);
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
			/*documento_proveedor_logic_add::checkdocumento_proveedorToSaves($this->documento_proveedors,$this->datosCliente,$this->connexion);*/			
			//$this->documento_proveedorLogicAdditional->checkGeneralEntitiesToSaves($this,$this->documento_proveedors,$this->datosCliente,$this->connexion);
			
	   		foreach($this->documento_proveedors as $documento_proveedorLocal) {				
								
				//documento_proveedor_logic_add::updatedocumento_proveedorToSave($documento_proveedorLocal);	        	
				documento_proveedor_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$documento_proveedorLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				documento_proveedor_data::save($documento_proveedorLocal, $this->connexion);				
			}			
			
			/*documento_proveedor_logic_add::checkdocumento_proveedorToSavesAfter($this->documento_proveedors,$this->datosCliente,$this->connexion);*/			
			//$this->documento_proveedorLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->documento_proveedors,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_proveedor_util::refrescarFKDescripciones($this->documento_proveedors);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $documento_proveedors,Connexion $connexion)  {
		$documento_proveedorLogic = new  documento_proveedor_logic();
		  		  
        try {		
			$documento_proveedorLogic->setConnexion($connexion);			
			$documento_proveedorLogic->setdocumento_proveedors($documento_proveedors);			
			$documento_proveedorLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$documento_proveedorsAux=array();
		
		foreach($this->documento_proveedors as $documento_proveedor) {
			if($documento_proveedor->getIsDeleted()==false) {
				$documento_proveedorsAux[]=$documento_proveedor;
			}
		}
		
		$this->documento_proveedors=$documento_proveedorsAux;
	}
	
	public function updateToGetsAuxiliar(array &$documento_proveedors) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->documento_proveedors as $documento_proveedor) {
				
				$documento_proveedor->setid_proveedor_Descripcion(documento_proveedor_util::getproveedorDescripcion($documento_proveedor->getproveedor()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$documento_proveedor_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$documento_proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$documento_proveedor_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$documento_proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$documento_proveedor_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$documento_proveedorForeignKey=new documento_proveedor_param_return();//documento_proveedorForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_proveedor',$strRecargarFkTipos,',')) {
				$this->cargarCombosproveedorsFK($this->connexion,$strRecargarFkQuery,$documento_proveedorForeignKey,$documento_proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_proveedor',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosproveedorsFK($this->connexion,' where id=-1 ',$documento_proveedorForeignKey,$documento_proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $documento_proveedorForeignKey;
			
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
	
	
	public function cargarCombosproveedorsFK($connexion=null,$strRecargarFkQuery='',$documento_proveedorForeignKey,$documento_proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$proveedorLogic= new proveedor_logic();
		$pagination= new Pagination();
		$documento_proveedorForeignKey->proveedorsFK=array();

		$proveedorLogic->setConnexion($connexion);
		$proveedorLogic->getproveedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($documento_proveedor_session==null) {
			$documento_proveedor_session=new documento_proveedor_session();
		}
		
		if($documento_proveedor_session->bitBusquedaDesdeFKSesionproveedor!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=proveedor_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalproveedor=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalproveedor=Funciones::GetFinalQueryAppend($finalQueryGlobalproveedor, '');
				$finalQueryGlobalproveedor.=proveedor_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalproveedor.$strRecargarFkQuery;		

				$proveedorLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($proveedorLogic->getproveedors() as $proveedorLocal ) {
				if($documento_proveedorForeignKey->idproveedorDefaultFK==0) {
					$documento_proveedorForeignKey->idproveedorDefaultFK=$proveedorLocal->getId();
				}

				$documento_proveedorForeignKey->proveedorsFK[$proveedorLocal->getId()]=documento_proveedor_util::getproveedorDescripcion($proveedorLocal);
			}

		} else {

			if($documento_proveedor_session->bigidproveedorActual!=null && $documento_proveedor_session->bigidproveedorActual > 0) {
				$proveedorLogic->getEntity($documento_proveedor_session->bigidproveedorActual);//WithConnection

				$documento_proveedorForeignKey->proveedorsFK[$proveedorLogic->getproveedor()->getId()]=documento_proveedor_util::getproveedorDescripcion($proveedorLogic->getproveedor());
				$documento_proveedorForeignKey->idproveedorDefaultFK=$proveedorLogic->getproveedor()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($documento_proveedor,$documentoclientes) {
		$this->saveRelacionesBase($documento_proveedor,$documentoclientes,true);
	}

	public function saveRelaciones($documento_proveedor,$documentoclientes) {
		$this->saveRelacionesBase($documento_proveedor,$documentoclientes,false);
	}

	public function saveRelacionesBase($documento_proveedor,$documentoclientes=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$documento_proveedor->setdocumento_clientes($documentoclientes);
			$this->setdocumento_proveedor($documento_proveedor);

			if(true) {

				//documento_proveedor_logic_add::updateRelacionesToSave($documento_proveedor,$this);

				if(($this->documento_proveedor->getIsNew() || $this->documento_proveedor->getIsChanged()) && !$this->documento_proveedor->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($documentoclientes);

				} else if($this->documento_proveedor->getIsDeleted()) {
					$this->saveRelacionesDetalles($documentoclientes);
					$this->save();
				}

				//documento_proveedor_logic_add::updateRelacionesToSaveAfter($documento_proveedor,$this);

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
	
	
	public function saveRelacionesDetalles($documentoclientes=array()) {
		try {
	

			$iddocumento_proveedorActual=$this->getdocumento_proveedor()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/documento_cliente_carga.php');
			documento_cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$documentoclienteLogic_Desde_documento_proveedor=new documento_cliente_logic();
			$documentoclienteLogic_Desde_documento_proveedor->setdocumento_clientes($documentoclientes);

			$documentoclienteLogic_Desde_documento_proveedor->setConnexion($this->getConnexion());
			$documentoclienteLogic_Desde_documento_proveedor->setDatosCliente($this->datosCliente);

			foreach($documentoclienteLogic_Desde_documento_proveedor->getdocumento_clientes() as $documentocliente_Desde_documento_proveedor) {
				$documentocliente_Desde_documento_proveedor->setid_documento_proveedor($iddocumento_proveedorActual);
			}

			$documentoclienteLogic_Desde_documento_proveedor->saves();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $documento_proveedors,documento_proveedor_param_return $documento_proveedorParameterGeneral) : documento_proveedor_param_return {
		$documento_proveedorReturnGeneral=new documento_proveedor_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $documento_proveedorReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $documento_proveedors,documento_proveedor_param_return $documento_proveedorParameterGeneral) : documento_proveedor_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$documento_proveedorReturnGeneral=new documento_proveedor_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $documento_proveedorReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $documento_proveedors,documento_proveedor $documento_proveedor,documento_proveedor_param_return $documento_proveedorParameterGeneral,bool $isEsNuevodocumento_proveedor,array $clases) : documento_proveedor_param_return {
		 try {	
			$documento_proveedorReturnGeneral=new documento_proveedor_param_return();
	
			$documento_proveedorReturnGeneral->setdocumento_proveedor($documento_proveedor);
			$documento_proveedorReturnGeneral->setdocumento_proveedors($documento_proveedors);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$documento_proveedorReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $documento_proveedorReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $documento_proveedors,documento_proveedor $documento_proveedor,documento_proveedor_param_return $documento_proveedorParameterGeneral,bool $isEsNuevodocumento_proveedor,array $clases) : documento_proveedor_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$documento_proveedorReturnGeneral=new documento_proveedor_param_return();
	
			$documento_proveedorReturnGeneral->setdocumento_proveedor($documento_proveedor);
			$documento_proveedorReturnGeneral->setdocumento_proveedors($documento_proveedors);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$documento_proveedorReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $documento_proveedorReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $documento_proveedors,documento_proveedor $documento_proveedor,documento_proveedor_param_return $documento_proveedorParameterGeneral,bool $isEsNuevodocumento_proveedor,array $clases) : documento_proveedor_param_return {
		 try {	
			$documento_proveedorReturnGeneral=new documento_proveedor_param_return();
	
			$documento_proveedorReturnGeneral->setdocumento_proveedor($documento_proveedor);
			$documento_proveedorReturnGeneral->setdocumento_proveedors($documento_proveedors);
			
			
			
			return $documento_proveedorReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $documento_proveedors,documento_proveedor $documento_proveedor,documento_proveedor_param_return $documento_proveedorParameterGeneral,bool $isEsNuevodocumento_proveedor,array $clases) : documento_proveedor_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$documento_proveedorReturnGeneral=new documento_proveedor_param_return();
	
			$documento_proveedorReturnGeneral->setdocumento_proveedor($documento_proveedor);
			$documento_proveedorReturnGeneral->setdocumento_proveedors($documento_proveedors);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $documento_proveedorReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,documento_proveedor $documento_proveedor,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,documento_proveedor $documento_proveedor,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		documento_proveedor_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		documento_proveedor_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(documento_proveedor $documento_proveedor,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//documento_proveedor_logic_add::updatedocumento_proveedorToGet($this->documento_proveedor);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$documento_proveedor->setproveedor($this->documento_proveedorDataAccess->getproveedor($this->connexion,$documento_proveedor));
		$documento_proveedor->setdocumento_clientes($this->documento_proveedorDataAccess->getdocumento_clientes($this->connexion,$documento_proveedor));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$documento_proveedor->setproveedor($this->documento_proveedorDataAccess->getproveedor($this->connexion,$documento_proveedor));
				continue;
			}

			if($clas->clas==documento_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$documento_proveedor->setdocumento_clientes($this->documento_proveedorDataAccess->getdocumento_clientes($this->connexion,$documento_proveedor));

				if($this->isConDeep) {
					$documentoclienteLogic= new documento_cliente_logic($this->connexion);
					$documentoclienteLogic->setdocumento_clientes($documento_proveedor->getdocumento_clientes());
					$classesLocal=documento_cliente_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$documentoclienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					documento_cliente_util::refrescarFKDescripciones($documentoclienteLogic->getdocumento_clientes());
					$documento_proveedor->setdocumento_clientes($documentoclienteLogic->getdocumento_clientes());
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$documento_proveedor->setproveedor($this->documento_proveedorDataAccess->getproveedor($this->connexion,$documento_proveedor));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==documento_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(documento_cliente::$class);
			$documento_proveedor->setdocumento_clientes($this->documento_proveedorDataAccess->getdocumento_clientes($this->connexion,$documento_proveedor));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$documento_proveedor->setproveedor($this->documento_proveedorDataAccess->getproveedor($this->connexion,$documento_proveedor));
		$proveedorLogic= new proveedor_logic($this->connexion);
		$proveedorLogic->deepLoad($documento_proveedor->getproveedor(),$isDeep,$deepLoadType,$clases);
				

		$documento_proveedor->setdocumento_clientes($this->documento_proveedorDataAccess->getdocumento_clientes($this->connexion,$documento_proveedor));

		foreach($documento_proveedor->getdocumento_clientes() as $documentocliente) {
			$documentoclienteLogic= new documento_cliente_logic($this->connexion);
			$documentoclienteLogic->deepLoad($documentocliente,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$documento_proveedor->setproveedor($this->documento_proveedorDataAccess->getproveedor($this->connexion,$documento_proveedor));
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedorLogic->deepLoad($documento_proveedor->getproveedor(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==documento_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$documento_proveedor->setdocumento_clientes($this->documento_proveedorDataAccess->getdocumento_clientes($this->connexion,$documento_proveedor));

				foreach($documento_proveedor->getdocumento_clientes() as $documentocliente) {
					$documentoclienteLogic= new documento_cliente_logic($this->connexion);
					$documentoclienteLogic->deepLoad($documentocliente,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$documento_proveedor->setproveedor($this->documento_proveedorDataAccess->getproveedor($this->connexion,$documento_proveedor));
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedorLogic->deepLoad($documento_proveedor->getproveedor(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==documento_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(documento_cliente::$class);
			$documento_proveedor->setdocumento_clientes($this->documento_proveedorDataAccess->getdocumento_clientes($this->connexion,$documento_proveedor));

			foreach($documento_proveedor->getdocumento_clientes() as $documentocliente) {
				$documentoclienteLogic= new documento_cliente_logic($this->connexion);
				$documentoclienteLogic->deepLoad($documentocliente,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(documento_proveedor $documento_proveedor,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//documento_proveedor_logic_add::updatedocumento_proveedorToSave($this->documento_proveedor);			
			
			if(!$paraDeleteCascade) {				
				documento_proveedor_data::save($documento_proveedor, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		proveedor_data::save($documento_proveedor->getproveedor(),$this->connexion);

		foreach($documento_proveedor->getdocumento_clientes() as $documentocliente) {
			$documentocliente->setid_documento_proveedor($documento_proveedor->getId());
			documento_cliente_data::save($documentocliente,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				proveedor_data::save($documento_proveedor->getproveedor(),$this->connexion);
				continue;
			}


			if($clas->clas==documento_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($documento_proveedor->getdocumento_clientes() as $documentocliente) {
					$documentocliente->setid_documento_proveedor($documento_proveedor->getId());
					documento_cliente_data::save($documentocliente,$this->connexion);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			proveedor_data::save($documento_proveedor->getproveedor(),$this->connexion);
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==documento_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(documento_cliente::$class);

			foreach($documento_proveedor->getdocumento_clientes() as $documentocliente) {
				$documentocliente->setid_documento_proveedor($documento_proveedor->getId());
				documento_cliente_data::save($documentocliente,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		proveedor_data::save($documento_proveedor->getproveedor(),$this->connexion);
		$proveedorLogic= new proveedor_logic($this->connexion);
		$proveedorLogic->deepSave($documento_proveedor->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($documento_proveedor->getdocumento_clientes() as $documentocliente) {
			$documentoclienteLogic= new documento_cliente_logic($this->connexion);
			$documentocliente->setid_documento_proveedor($documento_proveedor->getId());
			documento_cliente_data::save($documentocliente,$this->connexion);
			$documentoclienteLogic->deepSave($documentocliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				proveedor_data::save($documento_proveedor->getproveedor(),$this->connexion);
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedorLogic->deepSave($documento_proveedor->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==documento_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($documento_proveedor->getdocumento_clientes() as $documentocliente) {
					$documentoclienteLogic= new documento_cliente_logic($this->connexion);
					$documentocliente->setid_documento_proveedor($documento_proveedor->getId());
					documento_cliente_data::save($documentocliente,$this->connexion);
					$documentoclienteLogic->deepSave($documentocliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			proveedor_data::save($documento_proveedor->getproveedor(),$this->connexion);
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedorLogic->deepSave($documento_proveedor->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==documento_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(documento_cliente::$class);

			foreach($documento_proveedor->getdocumento_clientes() as $documentocliente) {
				$documentoclienteLogic= new documento_cliente_logic($this->connexion);
				$documentocliente->setid_documento_proveedor($documento_proveedor->getId());
				documento_cliente_data::save($documentocliente,$this->connexion);
				$documentoclienteLogic->deepSave($documentocliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				documento_proveedor_data::save($documento_proveedor, $this->connexion);
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
			
			$this->deepLoad($this->documento_proveedor,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->documento_proveedors as $documento_proveedor) {
				$this->deepLoad($documento_proveedor,$isDeep,$deepLoadType,$clases);
								
				documento_proveedor_util::refrescarFKDescripciones($this->documento_proveedors);
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
			
			foreach($this->documento_proveedors as $documento_proveedor) {
				$this->deepLoad($documento_proveedor,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->documento_proveedor,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->documento_proveedors as $documento_proveedor) {
				$this->deepSave($documento_proveedor,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->documento_proveedors as $documento_proveedor) {
				$this->deepSave($documento_proveedor,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(proveedor::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==proveedor::$class) {
						$classes[]=new Classe(proveedor::$class);
					}
				}

			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas)
				{
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
	
	public static function getClassesRelsOf(array $classesP,string $deepLoadType) : array {
		try {
			 $classes=array();			
			
			if($deepLoadType==DeepLoadType::$NONE) {
				
				$classes[]=new Classe(documento_cliente::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==documento_cliente::$class) {
						$classes[]=new Classe(documento_cliente::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==documento_cliente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(documento_cliente::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getdocumento_proveedor() : ?documento_proveedor {	
		/*
		documento_proveedor_logic_add::checkdocumento_proveedorToGet($this->documento_proveedor,$this->datosCliente);
		documento_proveedor_logic_add::updatedocumento_proveedorToGet($this->documento_proveedor);
		*/
			
		return $this->documento_proveedor;
	}
		
	public function setdocumento_proveedor(documento_proveedor $newdocumento_proveedor) {
		$this->documento_proveedor = $newdocumento_proveedor;
	}
	
	public function getdocumento_proveedors() : array {		
		/*
		documento_proveedor_logic_add::checkdocumento_proveedorToGets($this->documento_proveedors,$this->datosCliente);
		
		foreach ($this->documento_proveedors as $documento_proveedorLocal ) {
			documento_proveedor_logic_add::updatedocumento_proveedorToGet($documento_proveedorLocal);
		}
		*/
		
		return $this->documento_proveedors;
	}
	
	public function setdocumento_proveedors(array $newdocumento_proveedors) {
		$this->documento_proveedors = $newdocumento_proveedors;
	}
	
	public function getdocumento_proveedorDataAccess() : documento_proveedor_data {
		return $this->documento_proveedorDataAccess;
	}
	
	public function setdocumento_proveedorDataAccess(documento_proveedor_data $newdocumento_proveedorDataAccess) {
		$this->documento_proveedorDataAccess = $newdocumento_proveedorDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        documento_proveedor_carga::$CONTROLLER;;        
		
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
