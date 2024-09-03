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

namespace com\bydan\contabilidad\general\sucursal\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\general\sucursal\util\sucursal_carga;
use com\bydan\contabilidad\general\sucursal\util\sucursal_param_return;

use com\bydan\contabilidad\general\sucursal\presentation\session\sucursal_session;

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

use com\bydan\contabilidad\general\sucursal\util\sucursal_util;
use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;
use com\bydan\contabilidad\general\sucursal\business\data\sucursal_data;

//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\seguridad\pais\business\entity\pais;
use com\bydan\contabilidad\seguridad\pais\business\data\pais_data;
use com\bydan\contabilidad\seguridad\pais\business\logic\pais_logic;
use com\bydan\contabilidad\seguridad\pais\util\pais_util;

use com\bydan\contabilidad\seguridad\ciudad\business\entity\ciudad;
use com\bydan\contabilidad\seguridad\ciudad\business\data\ciudad_data;
use com\bydan\contabilidad\seguridad\ciudad\business\logic\ciudad_logic;
use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_util;

//REL


//REL DETALLES




class sucursal_logic  extends GeneralEntityLogic implements sucursal_logicI {	
	/*GENERAL*/
	public sucursal_data $sucursalDataAccess;
	//public ?sucursal_logic_add $sucursalLogicAdditional=null;
	public ?sucursal $sucursal;
	public array $sucursals;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->sucursalDataAccess = new sucursal_data();			
			$this->sucursals = array();
			$this->sucursal = new sucursal();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->sucursalLogicAdditional = new sucursal_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->sucursalLogicAdditional==null) {
		//	$this->sucursalLogicAdditional=new sucursal_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->sucursalDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->sucursalDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->sucursalDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->sucursalDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->sucursals = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->sucursals=$this->sucursalDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				sucursal_util::refrescarFKDescripciones($this->sucursals);
			}
			
			//sucursal_logic_add::checksucursalToGets($this->sucursals,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->sucursals);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->sucursals = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->sucursals=$this->sucursalDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				sucursal_util::refrescarFKDescripciones($this->sucursals);
			}
			
			//sucursal_logic_add::checksucursalToGets($this->sucursals,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->sucursals);
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
		$this->sucursal = new sucursal();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->sucursal=$this->sucursalDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->sucursal,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				sucursal_util::refrescarFKDescripcion($this->sucursal);
			}
						
			//sucursal_logic_add::checksucursalToGet($this->sucursal,$this->datosCliente);
			//sucursal_logic_add::updatesucursalToGet($this->sucursal);
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
		$this->sucursal = new  sucursal();
		  		  
        try {		
			$this->sucursal=$this->sucursalDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->sucursal,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				sucursal_util::refrescarFKDescripcion($this->sucursal);
			}
			
			//sucursal_logic_add::checksucursalToGet($this->sucursal,$this->datosCliente);
			//sucursal_logic_add::updatesucursalToGet($this->sucursal);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?sucursal {
		$sucursalLogic = new  sucursal_logic();
		  		  
        try {		
			$sucursalLogic->setConnexion($connexion);			
			$sucursalLogic->getEntity($id);			
			return $sucursalLogic->getsucursal();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->sucursal = new  sucursal();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->sucursal=$this->sucursalDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->sucursal,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				sucursal_util::refrescarFKDescripcion($this->sucursal);
			}
			
			//sucursal_logic_add::checksucursalToGet($this->sucursal,$this->datosCliente);
			//sucursal_logic_add::updatesucursalToGet($this->sucursal);
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
		$this->sucursal = new  sucursal();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->sucursal=$this->sucursalDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->sucursal,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				sucursal_util::refrescarFKDescripcion($this->sucursal);
			}
			
			//sucursal_logic_add::checksucursalToGet($this->sucursal,$this->datosCliente);
			//sucursal_logic_add::updatesucursalToGet($this->sucursal);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?sucursal {
		$sucursalLogic = new  sucursal_logic();
		  		  
        try {		
			$sucursalLogic->setConnexion($connexion);			
			$sucursalLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $sucursalLogic->getsucursal();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->sucursals = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->sucursals=$this->sucursalDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				sucursal_util::refrescarFKDescripciones($this->sucursals);
			}
			
			//sucursal_logic_add::checksucursalToGets($this->sucursals,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->sucursals);			
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
		$this->sucursals = array();
		  		  
        try {			
			$this->sucursals=$this->sucursalDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				sucursal_util::refrescarFKDescripciones($this->sucursals);
			}
			
			//sucursal_logic_add::checksucursalToGets($this->sucursals,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->sucursals);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->sucursals = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->sucursals=$this->sucursalDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				sucursal_util::refrescarFKDescripciones($this->sucursals);
			}
			
			//sucursal_logic_add::checksucursalToGets($this->sucursals,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->sucursals);
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
		$this->sucursals = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->sucursals=$this->sucursalDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				sucursal_util::refrescarFKDescripciones($this->sucursals);
			}
			
			//sucursal_logic_add::checksucursalToGets($this->sucursals,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->sucursals);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$sucursalLogic = new  sucursal_logic();
		  		  
        try {		
			$sucursalLogic->setConnexion($connexion);			
			$sucursalLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $sucursalLogic->getsucursals();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->sucursals = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->sucursals=$this->sucursalDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				sucursal_util::refrescarFKDescripciones($this->sucursals);
			}
			
			//sucursal_logic_add::checksucursalToGets($this->sucursals,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->sucursals);
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
		$this->sucursals = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->sucursals=$this->sucursalDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				sucursal_util::refrescarFKDescripciones($this->sucursals);
			}
			
			//sucursal_logic_add::checksucursalToGets($this->sucursals,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->sucursals);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->sucursals = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->sucursals=$this->sucursalDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				sucursal_util::refrescarFKDescripciones($this->sucursals);
			}
			
			//sucursal_logic_add::checksucursalToGets($this->sucursals,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->sucursals);
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
		$this->sucursals = array();
		  		  
        try {			
			$this->sucursals=$this->sucursalDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				sucursal_util::refrescarFKDescripciones($this->sucursals);
			}	
			
			//sucursal_logic_add::checksucursalToGets($this->sucursals,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->sucursals);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->sucursals = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->sucursals=$this->sucursalDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				sucursal_util::refrescarFKDescripciones($this->sucursals);
			}
			
			//sucursal_logic_add::checksucursalToGets($this->sucursals,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->sucursals);
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
		$this->sucursals = array();
		  		  
        try {		
			$this->sucursals=$this->sucursalDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				sucursal_util::refrescarFKDescripciones($this->sucursals);
			}
			
			//sucursal_logic_add::checksucursalToGets($this->sucursals,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->sucursals);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_IdciudadWithConnection(string $strFinalQuery,Pagination $pagination,int $id_ciudad) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_ciudad= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_ciudad->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ciudad,sucursal_util::$ID_CIUDAD,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ciudad);

			$this->sucursals=$this->sucursalDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				sucursal_util::refrescarFKDescripciones($this->sucursals);
			}
			//sucursal_logic_add::checksucursalToGets($this->sucursals,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->sucursals);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idciudad(string $strFinalQuery,Pagination $pagination,int $id_ciudad) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_ciudad= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_ciudad->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ciudad,sucursal_util::$ID_CIUDAD,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ciudad);

			$this->sucursals=$this->sucursalDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				sucursal_util::refrescarFKDescripciones($this->sucursals);
			}
			//sucursal_logic_add::checksucursalToGets($this->sucursals,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->sucursals);
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,sucursal_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->sucursals=$this->sucursalDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				sucursal_util::refrescarFKDescripciones($this->sucursals);
			}
			//sucursal_logic_add::checksucursalToGets($this->sucursals,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->sucursals);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,sucursal_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->sucursals=$this->sucursalDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				sucursal_util::refrescarFKDescripciones($this->sucursals);
			}
			//sucursal_logic_add::checksucursalToGets($this->sucursals,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->sucursals);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdpaisWithConnection(string $strFinalQuery,Pagination $pagination,int $id_pais) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_pais= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_pais->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_pais,sucursal_util::$ID_PAIS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_pais);

			$this->sucursals=$this->sucursalDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				sucursal_util::refrescarFKDescripciones($this->sucursals);
			}
			//sucursal_logic_add::checksucursalToGets($this->sucursals,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->sucursals);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idpais(string $strFinalQuery,Pagination $pagination,int $id_pais) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_pais= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_pais->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_pais,sucursal_util::$ID_PAIS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_pais);

			$this->sucursals=$this->sucursalDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				sucursal_util::refrescarFKDescripciones($this->sucursals);
			}
			//sucursal_logic_add::checksucursalToGets($this->sucursals,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->sucursals);
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
						
			//sucursal_logic_add::checksucursalToSave($this->sucursal,$this->datosCliente,$this->connexion);	       
			//sucursal_logic_add::updatesucursalToSave($this->sucursal);			
			sucursal_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->sucursal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->sucursalLogicAdditional->checkGeneralEntityToSave($this,$this->sucursal,$this->datosCliente,$this->connexion);
			
			
			sucursal_data::save($this->sucursal, $this->connexion);	    	       	 				
			//sucursal_logic_add::checksucursalToSaveAfter($this->sucursal,$this->datosCliente,$this->connexion);			
			//$this->sucursalLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->sucursal,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->sucursal,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->sucursal,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				sucursal_util::refrescarFKDescripcion($this->sucursal);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->sucursal->getIsDeleted()) {
				$this->sucursal=null;
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
						
			/*sucursal_logic_add::checksucursalToSave($this->sucursal,$this->datosCliente,$this->connexion);*/	        
			//sucursal_logic_add::updatesucursalToSave($this->sucursal);			
			//$this->sucursalLogicAdditional->checkGeneralEntityToSave($this,$this->sucursal,$this->datosCliente,$this->connexion);			
			sucursal_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->sucursal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			sucursal_data::save($this->sucursal, $this->connexion);	    	       	 						
			/*sucursal_logic_add::checksucursalToSaveAfter($this->sucursal,$this->datosCliente,$this->connexion);*/			
			//$this->sucursalLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->sucursal,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->sucursal,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->sucursal,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				sucursal_util::refrescarFKDescripcion($this->sucursal);				
			}
			
			if($this->sucursal->getIsDeleted()) {
				$this->sucursal=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(sucursal $sucursal,Connexion $connexion)  {
		$sucursalLogic = new  sucursal_logic();		  		  
        try {		
			$sucursalLogic->setConnexion($connexion);			
			$sucursalLogic->setsucursal($sucursal);			
			$sucursalLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*sucursal_logic_add::checksucursalToSaves($this->sucursals,$this->datosCliente,$this->connexion);*/	        	
			//$this->sucursalLogicAdditional->checkGeneralEntitiesToSaves($this,$this->sucursals,$this->datosCliente,$this->connexion);
			
	   		foreach($this->sucursals as $sucursalLocal) {				
								
				//sucursal_logic_add::updatesucursalToSave($sucursalLocal);	        	
				sucursal_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$sucursalLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				sucursal_data::save($sucursalLocal, $this->connexion);				
			}
			
			/*sucursal_logic_add::checksucursalToSavesAfter($this->sucursals,$this->datosCliente,$this->connexion);*/			
			//$this->sucursalLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->sucursals,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				sucursal_util::refrescarFKDescripciones($this->sucursals);
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
			/*sucursal_logic_add::checksucursalToSaves($this->sucursals,$this->datosCliente,$this->connexion);*/			
			//$this->sucursalLogicAdditional->checkGeneralEntitiesToSaves($this,$this->sucursals,$this->datosCliente,$this->connexion);
			
	   		foreach($this->sucursals as $sucursalLocal) {				
								
				//sucursal_logic_add::updatesucursalToSave($sucursalLocal);	        	
				sucursal_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$sucursalLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				sucursal_data::save($sucursalLocal, $this->connexion);				
			}			
			
			/*sucursal_logic_add::checksucursalToSavesAfter($this->sucursals,$this->datosCliente,$this->connexion);*/			
			//$this->sucursalLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->sucursals,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				sucursal_util::refrescarFKDescripciones($this->sucursals);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $sucursals,Connexion $connexion)  {
		$sucursalLogic = new  sucursal_logic();
		  		  
        try {		
			$sucursalLogic->setConnexion($connexion);			
			$sucursalLogic->setsucursals($sucursals);			
			$sucursalLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$sucursalsAux=array();
		
		foreach($this->sucursals as $sucursal) {
			if($sucursal->getIsDeleted()==false) {
				$sucursalsAux[]=$sucursal;
			}
		}
		
		$this->sucursals=$sucursalsAux;
	}
	
	public function updateToGetsAuxiliar(array &$sucursals) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->sucursals as $sucursal) {
				
				$sucursal->setid_empresa_Descripcion(sucursal_util::getempresaDescripcion($sucursal->getempresa()));
				$sucursal->setid_pais_Descripcion(sucursal_util::getpaisDescripcion($sucursal->getpais()));
				$sucursal->setid_ciudad_Descripcion(sucursal_util::getciudadDescripcion($sucursal->getciudad()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$sucursal_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$sucursal_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$sucursal_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$sucursal_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$sucursal_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$sucursalForeignKey=new sucursal_param_return();//sucursalForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$sucursalForeignKey,$sucursal_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_pais',$strRecargarFkTipos,',')) {
				$this->cargarCombospaissFK($this->connexion,$strRecargarFkQuery,$sucursalForeignKey,$sucursal_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ciudad',$strRecargarFkTipos,',')) {
				$this->cargarCombosciudadsFK($this->connexion,$strRecargarFkQuery,$sucursalForeignKey,$sucursal_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$sucursalForeignKey,$sucursal_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_pais',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombospaissFK($this->connexion,' where id=-1 ',$sucursalForeignKey,$sucursal_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_ciudad',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosciudadsFK($this->connexion,' where id=-1 ',$sucursalForeignKey,$sucursal_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $sucursalForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$sucursalForeignKey,$sucursal_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$sucursalForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($sucursal_session==null) {
			$sucursal_session=new sucursal_session();
		}
		
		if($sucursal_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($sucursalForeignKey->idempresaDefaultFK==0) {
					$sucursalForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$sucursalForeignKey->empresasFK[$empresaLocal->getId()]=sucursal_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($sucursal_session->bigidempresaActual!=null && $sucursal_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($sucursal_session->bigidempresaActual);//WithConnection

				$sucursalForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=sucursal_util::getempresaDescripcion($empresaLogic->getempresa());
				$sucursalForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombospaissFK($connexion=null,$strRecargarFkQuery='',$sucursalForeignKey,$sucursal_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$paisLogic= new pais_logic();
		$pagination= new Pagination();
		$sucursalForeignKey->paissFK=array();

		$paisLogic->setConnexion($connexion);
		$paisLogic->getpaisDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($sucursal_session==null) {
			$sucursal_session=new sucursal_session();
		}
		
		if($sucursal_session->bitBusquedaDesdeFKSesionpais!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=pais_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalpais=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalpais=Funciones::GetFinalQueryAppend($finalQueryGlobalpais, '');
				$finalQueryGlobalpais.=pais_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalpais.$strRecargarFkQuery;		

				$paisLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($paisLogic->getpaiss() as $paisLocal ) {
				if($sucursalForeignKey->idpaisDefaultFK==0) {
					$sucursalForeignKey->idpaisDefaultFK=$paisLocal->getId();
				}

				$sucursalForeignKey->paissFK[$paisLocal->getId()]=sucursal_util::getpaisDescripcion($paisLocal);
			}

		} else {

			if($sucursal_session->bigidpaisActual!=null && $sucursal_session->bigidpaisActual > 0) {
				$paisLogic->getEntity($sucursal_session->bigidpaisActual);//WithConnection

				$sucursalForeignKey->paissFK[$paisLogic->getpais()->getId()]=sucursal_util::getpaisDescripcion($paisLogic->getpais());
				$sucursalForeignKey->idpaisDefaultFK=$paisLogic->getpais()->getId();
			}
		}
	}

	public function cargarCombosciudadsFK($connexion=null,$strRecargarFkQuery='',$sucursalForeignKey,$sucursal_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$ciudadLogic= new ciudad_logic();
		$pagination= new Pagination();
		$sucursalForeignKey->ciudadsFK=array();

		$ciudadLogic->setConnexion($connexion);
		$ciudadLogic->getciudadDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($sucursal_session==null) {
			$sucursal_session=new sucursal_session();
		}
		
		if($sucursal_session->bitBusquedaDesdeFKSesionciudad!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=ciudad_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalciudad=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalciudad=Funciones::GetFinalQueryAppend($finalQueryGlobalciudad, '');
				$finalQueryGlobalciudad.=ciudad_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalciudad.$strRecargarFkQuery;		

				$ciudadLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($ciudadLogic->getciudads() as $ciudadLocal ) {
				if($sucursalForeignKey->idciudadDefaultFK==0) {
					$sucursalForeignKey->idciudadDefaultFK=$ciudadLocal->getId();
				}

				$sucursalForeignKey->ciudadsFK[$ciudadLocal->getId()]=sucursal_util::getciudadDescripcion($ciudadLocal);
			}

		} else {

			if($sucursal_session->bigidciudadActual!=null && $sucursal_session->bigidciudadActual > 0) {
				$ciudadLogic->getEntity($sucursal_session->bigidciudadActual);//WithConnection

				$sucursalForeignKey->ciudadsFK[$ciudadLogic->getciudad()->getId()]=sucursal_util::getciudadDescripcion($ciudadLogic->getciudad());
				$sucursalForeignKey->idciudadDefaultFK=$ciudadLogic->getciudad()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($sucursal) {
		$this->saveRelacionesBase($sucursal,true);
	}

	public function saveRelaciones($sucursal) {
		$this->saveRelacionesBase($sucursal,false);
	}

	public function saveRelacionesBase($sucursal,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setsucursal($sucursal);

			if(true) {

				//sucursal_logic_add::updateRelacionesToSave($sucursal,$this);

				if(($this->sucursal->getIsNew() || $this->sucursal->getIsChanged()) && !$this->sucursal->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->sucursal->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//sucursal_logic_add::updateRelacionesToSaveAfter($sucursal,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $sucursals,sucursal_param_return $sucursalParameterGeneral) : sucursal_param_return {
		$sucursalReturnGeneral=new sucursal_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $sucursalReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $sucursals,sucursal_param_return $sucursalParameterGeneral) : sucursal_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$sucursalReturnGeneral=new sucursal_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $sucursalReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $sucursals,sucursal $sucursal,sucursal_param_return $sucursalParameterGeneral,bool $isEsNuevosucursal,array $clases) : sucursal_param_return {
		 try {	
			$sucursalReturnGeneral=new sucursal_param_return();
	
			$sucursalReturnGeneral->setsucursal($sucursal);
			$sucursalReturnGeneral->setsucursals($sucursals);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$sucursalReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $sucursalReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $sucursals,sucursal $sucursal,sucursal_param_return $sucursalParameterGeneral,bool $isEsNuevosucursal,array $clases) : sucursal_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$sucursalReturnGeneral=new sucursal_param_return();
	
			$sucursalReturnGeneral->setsucursal($sucursal);
			$sucursalReturnGeneral->setsucursals($sucursals);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$sucursalReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $sucursalReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $sucursals,sucursal $sucursal,sucursal_param_return $sucursalParameterGeneral,bool $isEsNuevosucursal,array $clases) : sucursal_param_return {
		 try {	
			$sucursalReturnGeneral=new sucursal_param_return();
	
			$sucursalReturnGeneral->setsucursal($sucursal);
			$sucursalReturnGeneral->setsucursals($sucursals);
			
			
			
			return $sucursalReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $sucursals,sucursal $sucursal,sucursal_param_return $sucursalParameterGeneral,bool $isEsNuevosucursal,array $clases) : sucursal_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$sucursalReturnGeneral=new sucursal_param_return();
	
			$sucursalReturnGeneral->setsucursal($sucursal);
			$sucursalReturnGeneral->setsucursals($sucursals);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $sucursalReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,sucursal $sucursal,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,sucursal $sucursal,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		sucursal_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(sucursal $sucursal,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//sucursal_logic_add::updatesucursalToGet($this->sucursal);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$sucursal->setempresa($this->sucursalDataAccess->getempresa($this->connexion,$sucursal));
		$sucursal->setpais($this->sucursalDataAccess->getpais($this->connexion,$sucursal));
		$sucursal->setciudad($this->sucursalDataAccess->getciudad($this->connexion,$sucursal));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$sucursal->setempresa($this->sucursalDataAccess->getempresa($this->connexion,$sucursal));
				continue;
			}

			if($clas->clas==pais::$class.'') {
				$sucursal->setpais($this->sucursalDataAccess->getpais($this->connexion,$sucursal));
				continue;
			}

			if($clas->clas==ciudad::$class.'') {
				$sucursal->setciudad($this->sucursalDataAccess->getciudad($this->connexion,$sucursal));
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
			$sucursal->setempresa($this->sucursalDataAccess->getempresa($this->connexion,$sucursal));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==pais::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$sucursal->setpais($this->sucursalDataAccess->getpais($this->connexion,$sucursal));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==ciudad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$sucursal->setciudad($this->sucursalDataAccess->getciudad($this->connexion,$sucursal));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$sucursal->setempresa($this->sucursalDataAccess->getempresa($this->connexion,$sucursal));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($sucursal->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$sucursal->setpais($this->sucursalDataAccess->getpais($this->connexion,$sucursal));
		$paisLogic= new pais_logic($this->connexion);
		$paisLogic->deepLoad($sucursal->getpais(),$isDeep,$deepLoadType,$clases);
				
		$sucursal->setciudad($this->sucursalDataAccess->getciudad($this->connexion,$sucursal));
		$ciudadLogic= new ciudad_logic($this->connexion);
		$ciudadLogic->deepLoad($sucursal->getciudad(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$sucursal->setempresa($this->sucursalDataAccess->getempresa($this->connexion,$sucursal));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($sucursal->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==pais::$class.'') {
				$sucursal->setpais($this->sucursalDataAccess->getpais($this->connexion,$sucursal));
				$paisLogic= new pais_logic($this->connexion);
				$paisLogic->deepLoad($sucursal->getpais(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==ciudad::$class.'') {
				$sucursal->setciudad($this->sucursalDataAccess->getciudad($this->connexion,$sucursal));
				$ciudadLogic= new ciudad_logic($this->connexion);
				$ciudadLogic->deepLoad($sucursal->getciudad(),$isDeep,$deepLoadType,$clases);				
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
			$sucursal->setempresa($this->sucursalDataAccess->getempresa($this->connexion,$sucursal));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($sucursal->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==pais::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$sucursal->setpais($this->sucursalDataAccess->getpais($this->connexion,$sucursal));
			$paisLogic= new pais_logic($this->connexion);
			$paisLogic->deepLoad($sucursal->getpais(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ciudad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$sucursal->setciudad($this->sucursalDataAccess->getciudad($this->connexion,$sucursal));
			$ciudadLogic= new ciudad_logic($this->connexion);
			$ciudadLogic->deepLoad($sucursal->getciudad(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(sucursal $sucursal,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//sucursal_logic_add::updatesucursalToSave($this->sucursal);			
			
			if(!$paraDeleteCascade) {				
				sucursal_data::save($sucursal, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($sucursal->getempresa(),$this->connexion);
		pais_data::save($sucursal->getpais(),$this->connexion);
		ciudad_data::save($sucursal->getciudad(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($sucursal->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==pais::$class.'') {
				pais_data::save($sucursal->getpais(),$this->connexion);
				continue;
			}

			if($clas->clas==ciudad::$class.'') {
				ciudad_data::save($sucursal->getciudad(),$this->connexion);
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
			empresa_data::save($sucursal->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==pais::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			pais_data::save($sucursal->getpais(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ciudad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ciudad_data::save($sucursal->getciudad(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($sucursal->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($sucursal->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		pais_data::save($sucursal->getpais(),$this->connexion);
		$paisLogic= new pais_logic($this->connexion);
		$paisLogic->deepSave($sucursal->getpais(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		ciudad_data::save($sucursal->getciudad(),$this->connexion);
		$ciudadLogic= new ciudad_logic($this->connexion);
		$ciudadLogic->deepSave($sucursal->getciudad(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($sucursal->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($sucursal->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==pais::$class.'') {
				pais_data::save($sucursal->getpais(),$this->connexion);
				$paisLogic= new pais_logic($this->connexion);
				$paisLogic->deepSave($sucursal->getpais(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==ciudad::$class.'') {
				ciudad_data::save($sucursal->getciudad(),$this->connexion);
				$ciudadLogic= new ciudad_logic($this->connexion);
				$ciudadLogic->deepSave($sucursal->getciudad(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
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
			empresa_data::save($sucursal->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($sucursal->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==pais::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			pais_data::save($sucursal->getpais(),$this->connexion);
			$paisLogic= new pais_logic($this->connexion);
			$paisLogic->deepSave($sucursal->getpais(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ciudad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ciudad_data::save($sucursal->getciudad(),$this->connexion);
			$ciudadLogic= new ciudad_logic($this->connexion);
			$ciudadLogic->deepSave($sucursal->getciudad(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				sucursal_data::save($sucursal, $this->connexion);
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
			
			$this->deepLoad($this->sucursal,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->sucursals as $sucursal) {
				$this->deepLoad($sucursal,$isDeep,$deepLoadType,$clases);
								
				sucursal_util::refrescarFKDescripciones($this->sucursals);
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
			
			foreach($this->sucursals as $sucursal) {
				$this->deepLoad($sucursal,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->sucursal,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->sucursals as $sucursal) {
				$this->deepSave($sucursal,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->sucursals as $sucursal) {
				$this->deepSave($sucursal,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(pais::$class);
				$classes[]=new Classe(ciudad::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==pais::$class) {
						$classes[]=new Classe(pais::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==ciudad::$class) {
						$classes[]=new Classe(ciudad::$class);
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
					if($clas->clas==pais::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(pais::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==ciudad::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(ciudad::$class);
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
	
	
	
	
	
	
	
	public function getsucursal() : ?sucursal {	
		/*
		sucursal_logic_add::checksucursalToGet($this->sucursal,$this->datosCliente);
		sucursal_logic_add::updatesucursalToGet($this->sucursal);
		*/
			
		return $this->sucursal;
	}
		
	public function setsucursal(sucursal $newsucursal) {
		$this->sucursal = $newsucursal;
	}
	
	public function getsucursals() : array {		
		/*
		sucursal_logic_add::checksucursalToGets($this->sucursals,$this->datosCliente);
		
		foreach ($this->sucursals as $sucursalLocal ) {
			sucursal_logic_add::updatesucursalToGet($sucursalLocal);
		}
		*/
		
		return $this->sucursals;
	}
	
	public function setsucursals(array $newsucursals) {
		$this->sucursals = $newsucursals;
	}
	
	public function getsucursalDataAccess() : sucursal_data {
		return $this->sucursalDataAccess;
	}
	
	public function setsucursalDataAccess(sucursal_data $newsucursalDataAccess) {
		$this->sucursalDataAccess = $newsucursalDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        sucursal_carga::$CONTROLLER;;        
		
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
