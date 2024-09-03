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

namespace com\bydan\contabilidad\seguridad\pais\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\seguridad\pais\util\pais_carga;
use com\bydan\contabilidad\seguridad\pais\util\pais_param_return;


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

use com\bydan\contabilidad\seguridad\pais\util\pais_util;
use com\bydan\contabilidad\seguridad\pais\business\entity\pais;
use com\bydan\contabilidad\seguridad\pais\business\data\pais_data;

//FK


//REL


use com\bydan\contabilidad\general\parametro_general\business\entity\parametro_general;
use com\bydan\contabilidad\general\parametro_general\business\data\parametro_general_data;
use com\bydan\contabilidad\general\parametro_general\business\logic\parametro_general_logic;
use com\bydan\contabilidad\general\parametro_general\util\parametro_general_carga;
use com\bydan\contabilidad\general\parametro_general\util\parametro_general_util;

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

use com\bydan\contabilidad\seguridad\dato_general_usuario\business\entity\dato_general_usuario;
use com\bydan\contabilidad\seguridad\dato_general_usuario\business\data\dato_general_usuario_data;
use com\bydan\contabilidad\seguridad\dato_general_usuario\business\logic\dato_general_usuario_logic;
use com\bydan\contabilidad\seguridad\dato_general_usuario\util\dato_general_usuario_carga;
use com\bydan\contabilidad\seguridad\dato_general_usuario\util\dato_general_usuario_util;

use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;
use com\bydan\contabilidad\general\sucursal\business\data\sucursal_data;
use com\bydan\contabilidad\general\sucursal\business\logic\sucursal_logic;
use com\bydan\contabilidad\general\sucursal\util\sucursal_carga;
use com\bydan\contabilidad\general\sucursal\util\sucursal_util;

use com\bydan\contabilidad\seguridad\provincia\business\entity\provincia;
use com\bydan\contabilidad\seguridad\provincia\business\data\provincia_data;
use com\bydan\contabilidad\seguridad\provincia\business\logic\provincia_logic;
use com\bydan\contabilidad\seguridad\provincia\util\provincia_carga;
use com\bydan\contabilidad\seguridad\provincia\util\provincia_util;

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

//REL DETALLES

use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_carga;



class pais_logic  extends GeneralEntityLogic implements pais_logicI {	
	/*GENERAL*/
	public pais_data $paisDataAccess;
	//public ?pais_logic_add $paisLogicAdditional=null;
	public ?pais $pais;
	public array $paiss;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->paisDataAccess = new pais_data();			
			$this->paiss = array();
			$this->pais = new pais();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->paisLogicAdditional = new pais_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->paisLogicAdditional==null) {
		//	$this->paisLogicAdditional=new pais_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->paisDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->paisDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->paisDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->paisDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->paiss = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->paiss=$this->paisDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				pais_util::refrescarFKDescripciones($this->paiss);
			}
			
			//pais_logic_add::checkpaisToGets($this->paiss,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->paiss);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->paiss = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->paiss=$this->paisDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				pais_util::refrescarFKDescripciones($this->paiss);
			}
			
			//pais_logic_add::checkpaisToGets($this->paiss,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->paiss);
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
		$this->pais = new pais();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->pais=$this->paisDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->pais,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				pais_util::refrescarFKDescripcion($this->pais);
			}
						
			//pais_logic_add::checkpaisToGet($this->pais,$this->datosCliente);
			//pais_logic_add::updatepaisToGet($this->pais);
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
		$this->pais = new  pais();
		  		  
        try {		
			$this->pais=$this->paisDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->pais,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				pais_util::refrescarFKDescripcion($this->pais);
			}
			
			//pais_logic_add::checkpaisToGet($this->pais,$this->datosCliente);
			//pais_logic_add::updatepaisToGet($this->pais);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?pais {
		$paisLogic = new  pais_logic();
		  		  
        try {		
			$paisLogic->setConnexion($connexion);			
			$paisLogic->getEntity($id);			
			return $paisLogic->getpais();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->pais = new  pais();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->pais=$this->paisDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->pais,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				pais_util::refrescarFKDescripcion($this->pais);
			}
			
			//pais_logic_add::checkpaisToGet($this->pais,$this->datosCliente);
			//pais_logic_add::updatepaisToGet($this->pais);
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
		$this->pais = new  pais();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->pais=$this->paisDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->pais,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				pais_util::refrescarFKDescripcion($this->pais);
			}
			
			//pais_logic_add::checkpaisToGet($this->pais,$this->datosCliente);
			//pais_logic_add::updatepaisToGet($this->pais);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?pais {
		$paisLogic = new  pais_logic();
		  		  
        try {		
			$paisLogic->setConnexion($connexion);			
			$paisLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $paisLogic->getpais();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->paiss = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->paiss=$this->paisDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				pais_util::refrescarFKDescripciones($this->paiss);
			}
			
			//pais_logic_add::checkpaisToGets($this->paiss,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->paiss);			
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
		$this->paiss = array();
		  		  
        try {			
			$this->paiss=$this->paisDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				pais_util::refrescarFKDescripciones($this->paiss);
			}
			
			//pais_logic_add::checkpaisToGets($this->paiss,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->paiss);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->paiss = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->paiss=$this->paisDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				pais_util::refrescarFKDescripciones($this->paiss);
			}
			
			//pais_logic_add::checkpaisToGets($this->paiss,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->paiss);
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
		$this->paiss = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->paiss=$this->paisDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				pais_util::refrescarFKDescripciones($this->paiss);
			}
			
			//pais_logic_add::checkpaisToGets($this->paiss,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->paiss);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$paisLogic = new  pais_logic();
		  		  
        try {		
			$paisLogic->setConnexion($connexion);			
			$paisLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $paisLogic->getpaiss();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->paiss = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->paiss=$this->paisDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				pais_util::refrescarFKDescripciones($this->paiss);
			}
			
			//pais_logic_add::checkpaisToGets($this->paiss,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->paiss);
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
		$this->paiss = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->paiss=$this->paisDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				pais_util::refrescarFKDescripciones($this->paiss);
			}
			
			//pais_logic_add::checkpaisToGets($this->paiss,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->paiss);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->paiss = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->paiss=$this->paisDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				pais_util::refrescarFKDescripciones($this->paiss);
			}
			
			//pais_logic_add::checkpaisToGets($this->paiss,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->paiss);
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
		$this->paiss = array();
		  		  
        try {			
			$this->paiss=$this->paisDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				pais_util::refrescarFKDescripciones($this->paiss);
			}	
			
			//pais_logic_add::checkpaisToGets($this->paiss,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->paiss);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->paiss = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->paiss=$this->paisDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				pais_util::refrescarFKDescripciones($this->paiss);
			}
			
			//pais_logic_add::checkpaisToGets($this->paiss,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->paiss);
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
		$this->paiss = array();
		  		  
        try {		
			$this->paiss=$this->paisDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				pais_util::refrescarFKDescripciones($this->paiss);
			}
			
			//pais_logic_add::checkpaisToGets($this->paiss,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->paiss);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsBusquedaPorCodigoWithConnection(string $strFinalQuery,Pagination $pagination,string $codigo) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralcodigo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralcodigo->setParameterSelectionGeneralLike(ParameterType::$STRING,"%".$codigo."%",pais_util::$CODIGO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralcodigo);

			$this->paiss=$this->paisDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				pais_util::refrescarFKDescripciones($this->paiss);
			}
			//pais_logic_add::checkpaisToGets($this->paiss,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->paiss);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsBusquedaPorCodigo(string $strFinalQuery,Pagination $pagination,string $codigo) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralcodigo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralcodigo->setParameterSelectionGeneralLike(ParameterType::$STRING,"%".$codigo."%",pais_util::$CODIGO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralcodigo);

			$this->paiss=$this->paisDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				pais_util::refrescarFKDescripciones($this->paiss);
			}
			//pais_logic_add::checkpaisToGets($this->paiss,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->paiss);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsBusquedaPorNombreWithConnection(string $strFinalQuery,Pagination $pagination,string $nombre) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralnombre= new ParameterSelectionGeneral();
			$parameterSelectionGeneralnombre->setParameterSelectionGeneralLike(ParameterType::$STRING,"%".$nombre."%",pais_util::$NOMBRE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralnombre);

			$this->paiss=$this->paisDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				pais_util::refrescarFKDescripciones($this->paiss);
			}
			//pais_logic_add::checkpaisToGets($this->paiss,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->paiss);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsBusquedaPorNombre(string $strFinalQuery,Pagination $pagination,string $nombre) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralnombre= new ParameterSelectionGeneral();
			$parameterSelectionGeneralnombre->setParameterSelectionGeneralLike(ParameterType::$STRING,"%".$nombre."%",pais_util::$NOMBRE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralnombre);

			$this->paiss=$this->paisDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				pais_util::refrescarFKDescripciones($this->paiss);
			}
			//pais_logic_add::checkpaisToGets($this->paiss,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->paiss);
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
						
			//pais_logic_add::checkpaisToSave($this->pais,$this->datosCliente,$this->connexion);	       
			//pais_logic_add::updatepaisToSave($this->pais);			
			pais_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->pais,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->paisLogicAdditional->checkGeneralEntityToSave($this,$this->pais,$this->datosCliente,$this->connexion);
			
			
			pais_data::save($this->pais, $this->connexion);	    	       	 				
			//pais_logic_add::checkpaisToSaveAfter($this->pais,$this->datosCliente,$this->connexion);			
			//$this->paisLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->pais,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->pais,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->pais,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				pais_util::refrescarFKDescripcion($this->pais);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->pais->getIsDeleted()) {
				$this->pais=null;
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
						
			/*pais_logic_add::checkpaisToSave($this->pais,$this->datosCliente,$this->connexion);*/	        
			//pais_logic_add::updatepaisToSave($this->pais);			
			//$this->paisLogicAdditional->checkGeneralEntityToSave($this,$this->pais,$this->datosCliente,$this->connexion);			
			pais_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->pais,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			pais_data::save($this->pais, $this->connexion);	    	       	 						
			/*pais_logic_add::checkpaisToSaveAfter($this->pais,$this->datosCliente,$this->connexion);*/			
			//$this->paisLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->pais,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->pais,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->pais,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				pais_util::refrescarFKDescripcion($this->pais);				
			}
			
			if($this->pais->getIsDeleted()) {
				$this->pais=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(pais $pais,Connexion $connexion)  {
		$paisLogic = new  pais_logic();		  		  
        try {		
			$paisLogic->setConnexion($connexion);			
			$paisLogic->setpais($pais);			
			$paisLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*pais_logic_add::checkpaisToSaves($this->paiss,$this->datosCliente,$this->connexion);*/	        	
			//$this->paisLogicAdditional->checkGeneralEntitiesToSaves($this,$this->paiss,$this->datosCliente,$this->connexion);
			
	   		foreach($this->paiss as $paisLocal) {				
								
				//pais_logic_add::updatepaisToSave($paisLocal);	        	
				pais_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$paisLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				pais_data::save($paisLocal, $this->connexion);				
			}
			
			/*pais_logic_add::checkpaisToSavesAfter($this->paiss,$this->datosCliente,$this->connexion);*/			
			//$this->paisLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->paiss,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				pais_util::refrescarFKDescripciones($this->paiss);
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
			/*pais_logic_add::checkpaisToSaves($this->paiss,$this->datosCliente,$this->connexion);*/			
			//$this->paisLogicAdditional->checkGeneralEntitiesToSaves($this,$this->paiss,$this->datosCliente,$this->connexion);
			
	   		foreach($this->paiss as $paisLocal) {				
								
				//pais_logic_add::updatepaisToSave($paisLocal);	        	
				pais_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$paisLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				pais_data::save($paisLocal, $this->connexion);				
			}			
			
			/*pais_logic_add::checkpaisToSavesAfter($this->paiss,$this->datosCliente,$this->connexion);*/			
			//$this->paisLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->paiss,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				pais_util::refrescarFKDescripciones($this->paiss);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $paiss,Connexion $connexion)  {
		$paisLogic = new  pais_logic();
		  		  
        try {		
			$paisLogic->setConnexion($connexion);			
			$paisLogic->setpaiss($paiss);			
			$paisLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$paissAux=array();
		
		foreach($this->paiss as $pais) {
			if($pais->getIsDeleted()==false) {
				$paissAux[]=$pais;
			}
		}
		
		$this->paiss=$paissAux;
	}
	
	public function updateToGetsAuxiliar(array &$paiss) {
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
	
	
	
	public function saveRelacionesWithConnection($pais,$parametrogenerals,$clientes,$proveedors,$datogeneralusuarios,$sucursals,$provincias,$empresas) {
		$this->saveRelacionesBase($pais,$parametrogenerals,$clientes,$proveedors,$datogeneralusuarios,$sucursals,$provincias,$empresas,true);
	}

	public function saveRelaciones($pais,$parametrogenerals,$clientes,$proveedors,$datogeneralusuarios,$sucursals,$provincias,$empresas) {
		$this->saveRelacionesBase($pais,$parametrogenerals,$clientes,$proveedors,$datogeneralusuarios,$sucursals,$provincias,$empresas,false);
	}

	public function saveRelacionesBase($pais,$parametrogenerals=array(),$clientes=array(),$proveedors=array(),$datogeneralusuarios=array(),$sucursals=array(),$provincias=array(),$empresas=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$pais->setparametro_generals($parametrogenerals);
			$pais->setclientes($clientes);
			$pais->setproveedors($proveedors);
			$pais->setdato_general_usuarios($datogeneralusuarios);
			$pais->setsucursals($sucursals);
			$pais->setprovincias($provincias);
			$pais->setempresas($empresas);
			$this->setpais($pais);

			if(true) {

				//pais_logic_add::updateRelacionesToSave($pais,$this);

				if(($this->pais->getIsNew() || $this->pais->getIsChanged()) && !$this->pais->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($parametrogenerals,$clientes,$proveedors,$datogeneralusuarios,$sucursals,$provincias,$empresas);

				} else if($this->pais->getIsDeleted()) {
					$this->saveRelacionesDetalles($parametrogenerals,$clientes,$proveedors,$datogeneralusuarios,$sucursals,$provincias,$empresas);
					$this->save();
				}

				//pais_logic_add::updateRelacionesToSaveAfter($pais,$this);

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
	
	
	public function saveRelacionesDetalles($parametrogenerals=array(),$clientes=array(),$proveedors=array(),$datogeneralusuarios=array(),$sucursals=array(),$provincias=array(),$empresas=array()) {
		try {
	

			$idpaisActual=$this->getpais()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/general/util/parametro_general_carga.php');
			parametro_general_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$parametrogeneralLogic_Desde_pais=new parametro_general_logic();
			$parametrogeneralLogic_Desde_pais->setparametro_generals($parametrogenerals);

			$parametrogeneralLogic_Desde_pais->setConnexion($this->getConnexion());
			$parametrogeneralLogic_Desde_pais->setDatosCliente($this->datosCliente);

			foreach($parametrogeneralLogic_Desde_pais->getparametro_generals() as $parametrogeneral_Desde_pais) {
				$parametrogeneral_Desde_pais->setid_pais($idpaisActual);
			}

			$parametrogeneralLogic_Desde_pais->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/cliente_carga.php');
			cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$clienteLogic_Desde_pais=new cliente_logic();
			$clienteLogic_Desde_pais->setclientes($clientes);

			$clienteLogic_Desde_pais->setConnexion($this->getConnexion());
			$clienteLogic_Desde_pais->setDatosCliente($this->datosCliente);

			foreach($clienteLogic_Desde_pais->getclientes() as $cliente_Desde_pais) {
				$cliente_Desde_pais->setid_pais($idpaisActual);

				$clienteLogic_Desde_pais->setcliente($cliente_Desde_pais);
				$clienteLogic_Desde_pais->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/proveedor_carga.php');
			proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$proveedorLogic_Desde_pais=new proveedor_logic();
			$proveedorLogic_Desde_pais->setproveedors($proveedors);

			$proveedorLogic_Desde_pais->setConnexion($this->getConnexion());
			$proveedorLogic_Desde_pais->setDatosCliente($this->datosCliente);

			foreach($proveedorLogic_Desde_pais->getproveedors() as $proveedor_Desde_pais) {
				$proveedor_Desde_pais->setid_pais($idpaisActual);

				$proveedorLogic_Desde_pais->setproveedor($proveedor_Desde_pais);
				$proveedorLogic_Desde_pais->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/util/dato_general_usuario_carga.php');
			dato_general_usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$datogeneralusuarioLogic_Desde_pais=new dato_general_usuario_logic();
			$datogeneralusuarioLogic_Desde_pais->setdato_general_usuarios($datogeneralusuarios);

			$datogeneralusuarioLogic_Desde_pais->setConnexion($this->getConnexion());
			$datogeneralusuarioLogic_Desde_pais->setDatosCliente($this->datosCliente);

			foreach($datogeneralusuarioLogic_Desde_pais->getdato_general_usuarios() as $datogeneralusuario_Desde_pais) {
				$datogeneralusuario_Desde_pais->setid_pais($idpaisActual);
			}

			$datogeneralusuarioLogic_Desde_pais->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/general/util/sucursal_carga.php');
			sucursal_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$sucursalLogic_Desde_pais=new sucursal_logic();
			$sucursalLogic_Desde_pais->setsucursals($sucursals);

			$sucursalLogic_Desde_pais->setConnexion($this->getConnexion());
			$sucursalLogic_Desde_pais->setDatosCliente($this->datosCliente);

			foreach($sucursalLogic_Desde_pais->getsucursals() as $sucursal_Desde_pais) {
				$sucursal_Desde_pais->setid_pais($idpaisActual);
			}

			$sucursalLogic_Desde_pais->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/util/provincia_carga.php');
			provincia_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$provinciaLogic_Desde_pais=new provincia_logic();
			$provinciaLogic_Desde_pais->setprovincias($provincias);

			$provinciaLogic_Desde_pais->setConnexion($this->getConnexion());
			$provinciaLogic_Desde_pais->setDatosCliente($this->datosCliente);

			foreach($provinciaLogic_Desde_pais->getprovincias() as $provincia_Desde_pais) {
				$provincia_Desde_pais->setid_pais($idpaisActual);

				$provinciaLogic_Desde_pais->setprovincia($provincia_Desde_pais);
				$provinciaLogic_Desde_pais->save();

				$idprovinciaActual=$provincia_Desde_pais->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/util/ciudad_carga.php');
				ciudad_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$ciudadLogic_Desde_provincia=new ciudad_logic();

				if($provincia_Desde_pais->getciudads()==null){
					$provincia_Desde_pais->setciudads(array());
				}

				$ciudadLogic_Desde_provincia->setciudads($provincia_Desde_pais->getciudads());

				$ciudadLogic_Desde_provincia->setConnexion($this->getConnexion());
				$ciudadLogic_Desde_provincia->setDatosCliente($this->datosCliente);

				foreach($ciudadLogic_Desde_provincia->getciudads() as $ciudad_Desde_provincia) {
					$ciudad_Desde_provincia->setid_provincia($idprovinciaActual);

					$ciudadLogic_Desde_provincia->setciudad($ciudad_Desde_provincia);
					$ciudadLogic_Desde_provincia->save();

					$idciudadActual=$ciudad_Desde_provincia->getId();

					include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/proveedor_carga.php');
					proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

					$proveedorLogic_Desde_ciudad=new proveedor_logic();

					if($ciudad_Desde_provincia->getproveedors()==null){
						$ciudad_Desde_provincia->setproveedors(array());
					}

					$proveedorLogic_Desde_ciudad->setproveedors($ciudad_Desde_provincia->getproveedors());

					$proveedorLogic_Desde_ciudad->setConnexion($this->getConnexion());
					$proveedorLogic_Desde_ciudad->setDatosCliente($this->datosCliente);

					foreach($proveedorLogic_Desde_ciudad->getproveedors() as $proveedor_Desde_ciudad) {
						$proveedor_Desde_ciudad->setid_ciudad($idciudadActual);

						$proveedorLogic_Desde_ciudad->setproveedor($proveedor_Desde_ciudad);
						$proveedorLogic_Desde_ciudad->save();
					}


					include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/cliente_carga.php');
					cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

					$clienteLogic_Desde_ciudad=new cliente_logic();

					if($ciudad_Desde_provincia->getclientes()==null){
						$ciudad_Desde_provincia->setclientes(array());
					}

					$clienteLogic_Desde_ciudad->setclientes($ciudad_Desde_provincia->getclientes());

					$clienteLogic_Desde_ciudad->setConnexion($this->getConnexion());
					$clienteLogic_Desde_ciudad->setDatosCliente($this->datosCliente);

					foreach($clienteLogic_Desde_ciudad->getclientes() as $cliente_Desde_ciudad) {
						$cliente_Desde_ciudad->setid_ciudad($idciudadActual);

						$clienteLogic_Desde_ciudad->setcliente($cliente_Desde_ciudad);
						$clienteLogic_Desde_ciudad->save();
					}


					include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/util/dato_general_usuario_carga.php');
					dato_general_usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

					$datogeneralusuarioLogic_Desde_ciudad=new dato_general_usuario_logic();

					if($ciudad_Desde_provincia->getdato_general_usuarios()==null){
						$ciudad_Desde_provincia->setdato_general_usuarios(array());
					}

					$datogeneralusuarioLogic_Desde_ciudad->setdato_general_usuarios($ciudad_Desde_provincia->getdato_general_usuarios());

					$datogeneralusuarioLogic_Desde_ciudad->setConnexion($this->getConnexion());
					$datogeneralusuarioLogic_Desde_ciudad->setDatosCliente($this->datosCliente);

					foreach($datogeneralusuarioLogic_Desde_ciudad->getdato_general_usuarios() as $datogeneralusuario_Desde_ciudad) {
						$datogeneralusuario_Desde_ciudad->setid_ciudad($idciudadActual);
					}

					$datogeneralusuarioLogic_Desde_ciudad->saves();

					include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/general/util/sucursal_carga.php');
					sucursal_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

					$sucursalLogic_Desde_ciudad=new sucursal_logic();

					if($ciudad_Desde_provincia->getsucursals()==null){
						$ciudad_Desde_provincia->setsucursals(array());
					}

					$sucursalLogic_Desde_ciudad->setsucursals($ciudad_Desde_provincia->getsucursals());

					$sucursalLogic_Desde_ciudad->setConnexion($this->getConnexion());
					$sucursalLogic_Desde_ciudad->setDatosCliente($this->datosCliente);

					foreach($sucursalLogic_Desde_ciudad->getsucursals() as $sucursal_Desde_ciudad) {
						$sucursal_Desde_ciudad->setid_ciudad($idciudadActual);
					}

					$sucursalLogic_Desde_ciudad->saves();

					include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/general/util/empresa_carga.php');
					empresa_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

					$empresaLogic_Desde_ciudad=new empresa_logic();

					if($ciudad_Desde_provincia->getempresas()==null){
						$ciudad_Desde_provincia->setempresas(array());
					}

					$empresaLogic_Desde_ciudad->setempresas($ciudad_Desde_provincia->getempresas());

					$empresaLogic_Desde_ciudad->setConnexion($this->getConnexion());
					$empresaLogic_Desde_ciudad->setDatosCliente($this->datosCliente);

					foreach($empresaLogic_Desde_ciudad->getempresas() as $empresa_Desde_ciudad) {
						$empresa_Desde_ciudad->setid_ciudad($idciudadActual);
					}

					$empresaLogic_Desde_ciudad->saves();
				}


				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/proveedor_carga.php');
				proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$proveedorLogic_Desde_provincia=new proveedor_logic();

				if($provincia_Desde_pais->getproveedors()==null){
					$provincia_Desde_pais->setproveedors(array());
				}

				$proveedorLogic_Desde_provincia->setproveedors($provincia_Desde_pais->getproveedors());

				$proveedorLogic_Desde_provincia->setConnexion($this->getConnexion());
				$proveedorLogic_Desde_provincia->setDatosCliente($this->datosCliente);

				foreach($proveedorLogic_Desde_provincia->getproveedors() as $proveedor_Desde_provincia) {
					$proveedor_Desde_provincia->setid_provincia($idprovinciaActual);

					$proveedorLogic_Desde_provincia->setproveedor($proveedor_Desde_provincia);
					$proveedorLogic_Desde_provincia->save();
				}


				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/cliente_carga.php');
				cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$clienteLogic_Desde_provincia=new cliente_logic();

				if($provincia_Desde_pais->getclientes()==null){
					$provincia_Desde_pais->setclientes(array());
				}

				$clienteLogic_Desde_provincia->setclientes($provincia_Desde_pais->getclientes());

				$clienteLogic_Desde_provincia->setConnexion($this->getConnexion());
				$clienteLogic_Desde_provincia->setDatosCliente($this->datosCliente);

				foreach($clienteLogic_Desde_provincia->getclientes() as $cliente_Desde_provincia) {
					$cliente_Desde_provincia->setid_provincia($idprovinciaActual);

					$clienteLogic_Desde_provincia->setcliente($cliente_Desde_provincia);
					$clienteLogic_Desde_provincia->save();
				}


				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/util/dato_general_usuario_carga.php');
				dato_general_usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$datogeneralusuarioLogic_Desde_provincia=new dato_general_usuario_logic();

				if($provincia_Desde_pais->getdato_general_usuarios()==null){
					$provincia_Desde_pais->setdato_general_usuarios(array());
				}

				$datogeneralusuarioLogic_Desde_provincia->setdato_general_usuarios($provincia_Desde_pais->getdato_general_usuarios());

				$datogeneralusuarioLogic_Desde_provincia->setConnexion($this->getConnexion());
				$datogeneralusuarioLogic_Desde_provincia->setDatosCliente($this->datosCliente);

				foreach($datogeneralusuarioLogic_Desde_provincia->getdato_general_usuarios() as $datogeneralusuario_Desde_provincia) {
					$datogeneralusuario_Desde_provincia->setid_provincia($idprovinciaActual);
				}

				$datogeneralusuarioLogic_Desde_provincia->saves();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/general/util/empresa_carga.php');
			empresa_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$empresaLogic_Desde_pais=new empresa_logic();
			$empresaLogic_Desde_pais->setempresas($empresas);

			$empresaLogic_Desde_pais->setConnexion($this->getConnexion());
			$empresaLogic_Desde_pais->setDatosCliente($this->datosCliente);

			foreach($empresaLogic_Desde_pais->getempresas() as $empresa_Desde_pais) {
				$empresa_Desde_pais->setid_pais($idpaisActual);
			}

			$empresaLogic_Desde_pais->saves();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $paiss,pais_param_return $paisParameterGeneral) : pais_param_return {
		$paisReturnGeneral=new pais_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $paisReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $paiss,pais_param_return $paisParameterGeneral) : pais_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$paisReturnGeneral=new pais_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $paisReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $paiss,pais $pais,pais_param_return $paisParameterGeneral,bool $isEsNuevopais,array $clases) : pais_param_return {
		 try {	
			$paisReturnGeneral=new pais_param_return();
	
			$paisReturnGeneral->setpais($pais);
			$paisReturnGeneral->setpaiss($paiss);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$paisReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $paisReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $paiss,pais $pais,pais_param_return $paisParameterGeneral,bool $isEsNuevopais,array $clases) : pais_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$paisReturnGeneral=new pais_param_return();
	
			$paisReturnGeneral->setpais($pais);
			$paisReturnGeneral->setpaiss($paiss);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$paisReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $paisReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $paiss,pais $pais,pais_param_return $paisParameterGeneral,bool $isEsNuevopais,array $clases) : pais_param_return {
		 try {	
			$paisReturnGeneral=new pais_param_return();
	
			$paisReturnGeneral->setpais($pais);
			$paisReturnGeneral->setpaiss($paiss);
			
			
			
			return $paisReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $paiss,pais $pais,pais_param_return $paisParameterGeneral,bool $isEsNuevopais,array $clases) : pais_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$paisReturnGeneral=new pais_param_return();
	
			$paisReturnGeneral->setpais($pais);
			$paisReturnGeneral->setpaiss($paiss);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $paisReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,pais $pais,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,pais $pais,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		pais_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(pais $pais,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//pais_logic_add::updatepaisToGet($this->pais);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$pais->setparametro_generals($this->paisDataAccess->getparametro_generals($this->connexion,$pais));
		$pais->setclientes($this->paisDataAccess->getclientes($this->connexion,$pais));
		$pais->setproveedors($this->paisDataAccess->getproveedors($this->connexion,$pais));
		$pais->setdato_general_usuarios($this->paisDataAccess->getdato_general_usuarios($this->connexion,$pais));
		$pais->setsucursals($this->paisDataAccess->getsucursals($this->connexion,$pais));
		$pais->setprovincias($this->paisDataAccess->getprovincias($this->connexion,$pais));
		$pais->setempresas($this->paisDataAccess->getempresas($this->connexion,$pais));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==parametro_general::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$pais->setparametro_generals($this->paisDataAccess->getparametro_generals($this->connexion,$pais));

				if($this->isConDeep) {
					$parametrogeneralLogic= new parametro_general_logic($this->connexion);
					$parametrogeneralLogic->setparametro_generals($pais->getparametro_generals());
					$classesLocal=parametro_general_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$parametrogeneralLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					parametro_general_util::refrescarFKDescripciones($parametrogeneralLogic->getparametro_generals());
					$pais->setparametro_generals($parametrogeneralLogic->getparametro_generals());
				}

				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$pais->setclientes($this->paisDataAccess->getclientes($this->connexion,$pais));

				if($this->isConDeep) {
					$clienteLogic= new cliente_logic($this->connexion);
					$clienteLogic->setclientes($pais->getclientes());
					$classesLocal=cliente_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$clienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					cliente_util::refrescarFKDescripciones($clienteLogic->getclientes());
					$pais->setclientes($clienteLogic->getclientes());
				}

				continue;
			}

			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$pais->setproveedors($this->paisDataAccess->getproveedors($this->connexion,$pais));

				if($this->isConDeep) {
					$proveedorLogic= new proveedor_logic($this->connexion);
					$proveedorLogic->setproveedors($pais->getproveedors());
					$classesLocal=proveedor_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$proveedorLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					proveedor_util::refrescarFKDescripciones($proveedorLogic->getproveedors());
					$pais->setproveedors($proveedorLogic->getproveedors());
				}

				continue;
			}

			if($clas->clas==dato_general_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$pais->setdato_general_usuarios($this->paisDataAccess->getdato_general_usuarios($this->connexion,$pais));

				if($this->isConDeep) {
					$datogeneralusuarioLogic= new dato_general_usuario_logic($this->connexion);
					$datogeneralusuarioLogic->setdato_general_usuarios($pais->getdato_general_usuarios());
					$classesLocal=dato_general_usuario_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$datogeneralusuarioLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					dato_general_usuario_util::refrescarFKDescripciones($datogeneralusuarioLogic->getdato_general_usuarios());
					$pais->setdato_general_usuarios($datogeneralusuarioLogic->getdato_general_usuarios());
				}

				continue;
			}

			if($clas->clas==sucursal::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$pais->setsucursals($this->paisDataAccess->getsucursals($this->connexion,$pais));

				if($this->isConDeep) {
					$sucursalLogic= new sucursal_logic($this->connexion);
					$sucursalLogic->setsucursals($pais->getsucursals());
					$classesLocal=sucursal_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$sucursalLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					sucursal_util::refrescarFKDescripciones($sucursalLogic->getsucursals());
					$pais->setsucursals($sucursalLogic->getsucursals());
				}

				continue;
			}

			if($clas->clas==provincia::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$pais->setprovincias($this->paisDataAccess->getprovincias($this->connexion,$pais));

				if($this->isConDeep) {
					$provinciaLogic= new provincia_logic($this->connexion);
					$provinciaLogic->setprovincias($pais->getprovincias());
					$classesLocal=provincia_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$provinciaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					provincia_util::refrescarFKDescripciones($provinciaLogic->getprovincias());
					$pais->setprovincias($provinciaLogic->getprovincias());
				}

				continue;
			}

			if($clas->clas==empresa::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$pais->setempresas($this->paisDataAccess->getempresas($this->connexion,$pais));

				if($this->isConDeep) {
					$empresaLogic= new empresa_logic($this->connexion);
					$empresaLogic->setempresas($pais->getempresas());
					$classesLocal=empresa_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$empresaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					empresa_util::refrescarFKDescripciones($empresaLogic->getempresas());
					$pais->setempresas($empresaLogic->getempresas());
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==parametro_general::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(parametro_general::$class);
			$pais->setparametro_generals($this->paisDataAccess->getparametro_generals($this->connexion,$pais));
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
			$pais->setclientes($this->paisDataAccess->getclientes($this->connexion,$pais));
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
			$pais->setproveedors($this->paisDataAccess->getproveedors($this->connexion,$pais));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==dato_general_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(dato_general_usuario::$class);
			$pais->setdato_general_usuarios($this->paisDataAccess->getdato_general_usuarios($this->connexion,$pais));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(sucursal::$class);
			$pais->setsucursals($this->paisDataAccess->getsucursals($this->connexion,$pais));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==provincia::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(provincia::$class);
			$pais->setprovincias($this->paisDataAccess->getprovincias($this->connexion,$pais));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(empresa::$class);
			$pais->setempresas($this->paisDataAccess->getempresas($this->connexion,$pais));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {


		$pais->setparametro_generals($this->paisDataAccess->getparametro_generals($this->connexion,$pais));

		foreach($pais->getparametro_generals() as $parametrogeneral) {
			$parametrogeneralLogic= new parametro_general_logic($this->connexion);
			$parametrogeneralLogic->deepLoad($parametrogeneral,$isDeep,$deepLoadType,$clases);
		}

		$pais->setclientes($this->paisDataAccess->getclientes($this->connexion,$pais));

		foreach($pais->getclientes() as $cliente) {
			$clienteLogic= new cliente_logic($this->connexion);
			$clienteLogic->deepLoad($cliente,$isDeep,$deepLoadType,$clases);
		}

		$pais->setproveedors($this->paisDataAccess->getproveedors($this->connexion,$pais));

		foreach($pais->getproveedors() as $proveedor) {
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedorLogic->deepLoad($proveedor,$isDeep,$deepLoadType,$clases);
		}

		$pais->setdato_general_usuarios($this->paisDataAccess->getdato_general_usuarios($this->connexion,$pais));

		foreach($pais->getdato_general_usuarios() as $datogeneralusuario) {
			$datogeneralusuarioLogic= new dato_general_usuario_logic($this->connexion);
			$datogeneralusuarioLogic->deepLoad($datogeneralusuario,$isDeep,$deepLoadType,$clases);
		}

		$pais->setsucursals($this->paisDataAccess->getsucursals($this->connexion,$pais));

		foreach($pais->getsucursals() as $sucursal) {
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepLoad($sucursal,$isDeep,$deepLoadType,$clases);
		}

		$pais->setprovincias($this->paisDataAccess->getprovincias($this->connexion,$pais));

		foreach($pais->getprovincias() as $provincia) {
			$provinciaLogic= new provincia_logic($this->connexion);
			$provinciaLogic->deepLoad($provincia,$isDeep,$deepLoadType,$clases);
		}

		$pais->setempresas($this->paisDataAccess->getempresas($this->connexion,$pais));

		foreach($pais->getempresas() as $empresa) {
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($empresa,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==parametro_general::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$pais->setparametro_generals($this->paisDataAccess->getparametro_generals($this->connexion,$pais));

				foreach($pais->getparametro_generals() as $parametrogeneral) {
					$parametrogeneralLogic= new parametro_general_logic($this->connexion);
					$parametrogeneralLogic->deepLoad($parametrogeneral,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$pais->setclientes($this->paisDataAccess->getclientes($this->connexion,$pais));

				foreach($pais->getclientes() as $cliente) {
					$clienteLogic= new cliente_logic($this->connexion);
					$clienteLogic->deepLoad($cliente,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$pais->setproveedors($this->paisDataAccess->getproveedors($this->connexion,$pais));

				foreach($pais->getproveedors() as $proveedor) {
					$proveedorLogic= new proveedor_logic($this->connexion);
					$proveedorLogic->deepLoad($proveedor,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==dato_general_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$pais->setdato_general_usuarios($this->paisDataAccess->getdato_general_usuarios($this->connexion,$pais));

				foreach($pais->getdato_general_usuarios() as $datogeneralusuario) {
					$datogeneralusuarioLogic= new dato_general_usuario_logic($this->connexion);
					$datogeneralusuarioLogic->deepLoad($datogeneralusuario,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==sucursal::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$pais->setsucursals($this->paisDataAccess->getsucursals($this->connexion,$pais));

				foreach($pais->getsucursals() as $sucursal) {
					$sucursalLogic= new sucursal_logic($this->connexion);
					$sucursalLogic->deepLoad($sucursal,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==provincia::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$pais->setprovincias($this->paisDataAccess->getprovincias($this->connexion,$pais));

				foreach($pais->getprovincias() as $provincia) {
					$provinciaLogic= new provincia_logic($this->connexion);
					$provinciaLogic->deepLoad($provincia,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==empresa::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$pais->setempresas($this->paisDataAccess->getempresas($this->connexion,$pais));

				foreach($pais->getempresas() as $empresa) {
					$empresaLogic= new empresa_logic($this->connexion);
					$empresaLogic->deepLoad($empresa,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==parametro_general::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(parametro_general::$class);
			$pais->setparametro_generals($this->paisDataAccess->getparametro_generals($this->connexion,$pais));

			foreach($pais->getparametro_generals() as $parametrogeneral) {
				$parametrogeneralLogic= new parametro_general_logic($this->connexion);
				$parametrogeneralLogic->deepLoad($parametrogeneral,$isDeep,$deepLoadType,$clases);
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
			$pais->setclientes($this->paisDataAccess->getclientes($this->connexion,$pais));

			foreach($pais->getclientes() as $cliente) {
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
			$pais->setproveedors($this->paisDataAccess->getproveedors($this->connexion,$pais));

			foreach($pais->getproveedors() as $proveedor) {
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedorLogic->deepLoad($proveedor,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==dato_general_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(dato_general_usuario::$class);
			$pais->setdato_general_usuarios($this->paisDataAccess->getdato_general_usuarios($this->connexion,$pais));

			foreach($pais->getdato_general_usuarios() as $datogeneralusuario) {
				$datogeneralusuarioLogic= new dato_general_usuario_logic($this->connexion);
				$datogeneralusuarioLogic->deepLoad($datogeneralusuario,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(sucursal::$class);
			$pais->setsucursals($this->paisDataAccess->getsucursals($this->connexion,$pais));

			foreach($pais->getsucursals() as $sucursal) {
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepLoad($sucursal,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==provincia::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(provincia::$class);
			$pais->setprovincias($this->paisDataAccess->getprovincias($this->connexion,$pais));

			foreach($pais->getprovincias() as $provincia) {
				$provinciaLogic= new provincia_logic($this->connexion);
				$provinciaLogic->deepLoad($provincia,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(empresa::$class);
			$pais->setempresas($this->paisDataAccess->getempresas($this->connexion,$pais));

			foreach($pais->getempresas() as $empresa) {
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($empresa,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(pais $pais,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//pais_logic_add::updatepaisToSave($this->pais);			
			
			if(!$paraDeleteCascade) {				
				pais_data::save($pais, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($pais->getparametro_generals() as $parametrogeneral) {
			$parametrogeneral->setid_pais($pais->getId());
			parametro_general_data::save($parametrogeneral,$this->connexion);
		}


		foreach($pais->getclientes() as $cliente) {
			$cliente->setid_pais($pais->getId());
			cliente_data::save($cliente,$this->connexion);
		}


		foreach($pais->getproveedors() as $proveedor) {
			$proveedor->setid_pais($pais->getId());
			proveedor_data::save($proveedor,$this->connexion);
		}


		foreach($pais->getdato_general_usuarios() as $datogeneralusuario) {
			$datogeneralusuario->setid_pais($pais->getId());
			dato_general_usuario_data::save($datogeneralusuario,$this->connexion);
		}


		foreach($pais->getsucursals() as $sucursal) {
			$sucursal->setid_pais($pais->getId());
			sucursal_data::save($sucursal,$this->connexion);
		}


		foreach($pais->getprovincias() as $provincia) {
			$provincia->setid_pais($pais->getId());
			provincia_data::save($provincia,$this->connexion);
		}


		foreach($pais->getempresas() as $empresa) {
			$empresa->setid_pais($pais->getId());
			empresa_data::save($empresa,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==parametro_general::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($pais->getparametro_generals() as $parametrogeneral) {
					$parametrogeneral->setid_pais($pais->getId());
					parametro_general_data::save($parametrogeneral,$this->connexion);
				}

				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($pais->getclientes() as $cliente) {
					$cliente->setid_pais($pais->getId());
					cliente_data::save($cliente,$this->connexion);
				}

				continue;
			}

			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($pais->getproveedors() as $proveedor) {
					$proveedor->setid_pais($pais->getId());
					proveedor_data::save($proveedor,$this->connexion);
				}

				continue;
			}

			if($clas->clas==dato_general_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($pais->getdato_general_usuarios() as $datogeneralusuario) {
					$datogeneralusuario->setid_pais($pais->getId());
					dato_general_usuario_data::save($datogeneralusuario,$this->connexion);
				}

				continue;
			}

			if($clas->clas==sucursal::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($pais->getsucursals() as $sucursal) {
					$sucursal->setid_pais($pais->getId());
					sucursal_data::save($sucursal,$this->connexion);
				}

				continue;
			}

			if($clas->clas==provincia::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($pais->getprovincias() as $provincia) {
					$provincia->setid_pais($pais->getId());
					provincia_data::save($provincia,$this->connexion);
				}

				continue;
			}

			if($clas->clas==empresa::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($pais->getempresas() as $empresa) {
					$empresa->setid_pais($pais->getId());
					empresa_data::save($empresa,$this->connexion);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==parametro_general::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(parametro_general::$class);

			foreach($pais->getparametro_generals() as $parametrogeneral) {
				$parametrogeneral->setid_pais($pais->getId());
				parametro_general_data::save($parametrogeneral,$this->connexion);
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

			foreach($pais->getclientes() as $cliente) {
				$cliente->setid_pais($pais->getId());
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

			foreach($pais->getproveedors() as $proveedor) {
				$proveedor->setid_pais($pais->getId());
				proveedor_data::save($proveedor,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==dato_general_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(dato_general_usuario::$class);

			foreach($pais->getdato_general_usuarios() as $datogeneralusuario) {
				$datogeneralusuario->setid_pais($pais->getId());
				dato_general_usuario_data::save($datogeneralusuario,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(sucursal::$class);

			foreach($pais->getsucursals() as $sucursal) {
				$sucursal->setid_pais($pais->getId());
				sucursal_data::save($sucursal,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==provincia::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(provincia::$class);

			foreach($pais->getprovincias() as $provincia) {
				$provincia->setid_pais($pais->getId());
				provincia_data::save($provincia,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(empresa::$class);

			foreach($pais->getempresas() as $empresa) {
				$empresa->setid_pais($pais->getId());
				empresa_data::save($empresa,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($pais->getparametro_generals() as $parametrogeneral) {
			$parametrogeneralLogic= new parametro_general_logic($this->connexion);
			$parametrogeneral->setid_pais($pais->getId());
			parametro_general_data::save($parametrogeneral,$this->connexion);
			$parametrogeneralLogic->deepSave($parametrogeneral,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($pais->getclientes() as $cliente) {
			$clienteLogic= new cliente_logic($this->connexion);
			$cliente->setid_pais($pais->getId());
			cliente_data::save($cliente,$this->connexion);
			$clienteLogic->deepSave($cliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($pais->getproveedors() as $proveedor) {
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedor->setid_pais($pais->getId());
			proveedor_data::save($proveedor,$this->connexion);
			$proveedorLogic->deepSave($proveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($pais->getdato_general_usuarios() as $datogeneralusuario) {
			$datogeneralusuarioLogic= new dato_general_usuario_logic($this->connexion);
			$datogeneralusuario->setid_pais($pais->getId());
			dato_general_usuario_data::save($datogeneralusuario,$this->connexion);
			$datogeneralusuarioLogic->deepSave($datogeneralusuario,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($pais->getsucursals() as $sucursal) {
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursal->setid_pais($pais->getId());
			sucursal_data::save($sucursal,$this->connexion);
			$sucursalLogic->deepSave($sucursal,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($pais->getprovincias() as $provincia) {
			$provinciaLogic= new provincia_logic($this->connexion);
			$provincia->setid_pais($pais->getId());
			provincia_data::save($provincia,$this->connexion);
			$provinciaLogic->deepSave($provincia,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($pais->getempresas() as $empresa) {
			$empresaLogic= new empresa_logic($this->connexion);
			$empresa->setid_pais($pais->getId());
			empresa_data::save($empresa,$this->connexion);
			$empresaLogic->deepSave($empresa,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==parametro_general::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($pais->getparametro_generals() as $parametrogeneral) {
					$parametrogeneralLogic= new parametro_general_logic($this->connexion);
					$parametrogeneral->setid_pais($pais->getId());
					parametro_general_data::save($parametrogeneral,$this->connexion);
					$parametrogeneralLogic->deepSave($parametrogeneral,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($pais->getclientes() as $cliente) {
					$clienteLogic= new cliente_logic($this->connexion);
					$cliente->setid_pais($pais->getId());
					cliente_data::save($cliente,$this->connexion);
					$clienteLogic->deepSave($cliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($pais->getproveedors() as $proveedor) {
					$proveedorLogic= new proveedor_logic($this->connexion);
					$proveedor->setid_pais($pais->getId());
					proveedor_data::save($proveedor,$this->connexion);
					$proveedorLogic->deepSave($proveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==dato_general_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($pais->getdato_general_usuarios() as $datogeneralusuario) {
					$datogeneralusuarioLogic= new dato_general_usuario_logic($this->connexion);
					$datogeneralusuario->setid_pais($pais->getId());
					dato_general_usuario_data::save($datogeneralusuario,$this->connexion);
					$datogeneralusuarioLogic->deepSave($datogeneralusuario,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==sucursal::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($pais->getsucursals() as $sucursal) {
					$sucursalLogic= new sucursal_logic($this->connexion);
					$sucursal->setid_pais($pais->getId());
					sucursal_data::save($sucursal,$this->connexion);
					$sucursalLogic->deepSave($sucursal,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==provincia::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($pais->getprovincias() as $provincia) {
					$provinciaLogic= new provincia_logic($this->connexion);
					$provincia->setid_pais($pais->getId());
					provincia_data::save($provincia,$this->connexion);
					$provinciaLogic->deepSave($provincia,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==empresa::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($pais->getempresas() as $empresa) {
					$empresaLogic= new empresa_logic($this->connexion);
					$empresa->setid_pais($pais->getId());
					empresa_data::save($empresa,$this->connexion);
					$empresaLogic->deepSave($empresa,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {



		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==parametro_general::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(parametro_general::$class);

			foreach($pais->getparametro_generals() as $parametrogeneral) {
				$parametrogeneralLogic= new parametro_general_logic($this->connexion);
				$parametrogeneral->setid_pais($pais->getId());
				parametro_general_data::save($parametrogeneral,$this->connexion);
				$parametrogeneralLogic->deepSave($parametrogeneral,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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

			foreach($pais->getclientes() as $cliente) {
				$clienteLogic= new cliente_logic($this->connexion);
				$cliente->setid_pais($pais->getId());
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

			foreach($pais->getproveedors() as $proveedor) {
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedor->setid_pais($pais->getId());
				proveedor_data::save($proveedor,$this->connexion);
				$proveedorLogic->deepSave($proveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==dato_general_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(dato_general_usuario::$class);

			foreach($pais->getdato_general_usuarios() as $datogeneralusuario) {
				$datogeneralusuarioLogic= new dato_general_usuario_logic($this->connexion);
				$datogeneralusuario->setid_pais($pais->getId());
				dato_general_usuario_data::save($datogeneralusuario,$this->connexion);
				$datogeneralusuarioLogic->deepSave($datogeneralusuario,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(sucursal::$class);

			foreach($pais->getsucursals() as $sucursal) {
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursal->setid_pais($pais->getId());
				sucursal_data::save($sucursal,$this->connexion);
				$sucursalLogic->deepSave($sucursal,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==provincia::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(provincia::$class);

			foreach($pais->getprovincias() as $provincia) {
				$provinciaLogic= new provincia_logic($this->connexion);
				$provincia->setid_pais($pais->getId());
				provincia_data::save($provincia,$this->connexion);
				$provinciaLogic->deepSave($provincia,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(empresa::$class);

			foreach($pais->getempresas() as $empresa) {
				$empresaLogic= new empresa_logic($this->connexion);
				$empresa->setid_pais($pais->getId());
				empresa_data::save($empresa,$this->connexion);
				$empresaLogic->deepSave($empresa,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				pais_data::save($pais, $this->connexion);
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
			
			$this->deepLoad($this->pais,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->paiss as $pais) {
				$this->deepLoad($pais,$isDeep,$deepLoadType,$clases);
								
				pais_util::refrescarFKDescripciones($this->paiss);
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
			
			foreach($this->paiss as $pais) {
				$this->deepLoad($pais,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->pais,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->paiss as $pais) {
				$this->deepSave($pais,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->paiss as $pais) {
				$this->deepSave($pais,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(parametro_general::$class);
				$classes[]=new Classe(cliente::$class);
				$classes[]=new Classe(proveedor::$class);
				$classes[]=new Classe(dato_general_usuario::$class);
				$classes[]=new Classe(sucursal::$class);
				$classes[]=new Classe(provincia::$class);
				$classes[]=new Classe(empresa::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==parametro_general::$class) {
						$classes[]=new Classe(parametro_general::$class);
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

				foreach($classesP as $clas) {
					if($clas->clas==dato_general_usuario::$class) {
						$classes[]=new Classe(dato_general_usuario::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==sucursal::$class) {
						$classes[]=new Classe(sucursal::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==provincia::$class) {
						$classes[]=new Classe(provincia::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==parametro_general::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(parametro_general::$class);
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

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==dato_general_usuario::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(dato_general_usuario::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==sucursal::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(sucursal::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==provincia::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(provincia::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==empresa::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(empresa::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getpais() : ?pais {	
		/*
		pais_logic_add::checkpaisToGet($this->pais,$this->datosCliente);
		pais_logic_add::updatepaisToGet($this->pais);
		*/
			
		return $this->pais;
	}
		
	public function setpais(pais $newpais) {
		$this->pais = $newpais;
	}
	
	public function getpaiss() : array {		
		/*
		pais_logic_add::checkpaisToGets($this->paiss,$this->datosCliente);
		
		foreach ($this->paiss as $paisLocal ) {
			pais_logic_add::updatepaisToGet($paisLocal);
		}
		*/
		
		return $this->paiss;
	}
	
	public function setpaiss(array $newpaiss) {
		$this->paiss = $newpaiss;
	}
	
	public function getpaisDataAccess() : pais_data {
		return $this->paisDataAccess;
	}
	
	public function setpaisDataAccess(pais_data $newpaisDataAccess) {
		$this->paisDataAccess = $newpaisDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        pais_carga::$CONTROLLER;;        
		
		//REL DETALLES
		
		ciudad_logic::$logger;
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
