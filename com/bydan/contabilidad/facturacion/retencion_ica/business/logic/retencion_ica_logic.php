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

namespace com\bydan\contabilidad\facturacion\retencion_ica\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\facturacion\retencion_ica\util\retencion_ica_carga;
use com\bydan\contabilidad\facturacion\retencion_ica\util\retencion_ica_param_return;

use com\bydan\contabilidad\facturacion\retencion_ica\presentation\session\retencion_ica_session;

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

use com\bydan\contabilidad\facturacion\retencion_ica\util\retencion_ica_util;
use com\bydan\contabilidad\facturacion\retencion_ica\business\entity\retencion_ica;
use com\bydan\contabilidad\facturacion\retencion_ica\business\data\retencion_ica_data;

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


use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\data\proveedor_data;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\business\data\cliente_data;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;

//REL DETALLES




class retencion_ica_logic  extends GeneralEntityLogic implements retencion_ica_logicI {	
	/*GENERAL*/
	public retencion_ica_data $retencion_icaDataAccess;
	//public ?retencion_ica_logic_add $retencion_icaLogicAdditional=null;
	public ?retencion_ica $retencion_ica;
	public array $retencion_icas;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->retencion_icaDataAccess = new retencion_ica_data();			
			$this->retencion_icas = array();
			$this->retencion_ica = new retencion_ica();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->retencion_icaLogicAdditional = new retencion_ica_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->retencion_icaLogicAdditional==null) {
		//	$this->retencion_icaLogicAdditional=new retencion_ica_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->retencion_icaDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->retencion_icaDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->retencion_icaDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->retencion_icaDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->retencion_icas = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->retencion_icas=$this->retencion_icaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				retencion_ica_util::refrescarFKDescripciones($this->retencion_icas);
			}
			
			//retencion_ica_logic_add::checkretencion_icaToGets($this->retencion_icas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->retencion_icas);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->retencion_icas = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->retencion_icas=$this->retencion_icaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				retencion_ica_util::refrescarFKDescripciones($this->retencion_icas);
			}
			
			//retencion_ica_logic_add::checkretencion_icaToGets($this->retencion_icas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->retencion_icas);
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
		$this->retencion_ica = new retencion_ica();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->retencion_ica=$this->retencion_icaDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->retencion_ica,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				retencion_ica_util::refrescarFKDescripcion($this->retencion_ica);
			}
						
			//retencion_ica_logic_add::checkretencion_icaToGet($this->retencion_ica,$this->datosCliente);
			//retencion_ica_logic_add::updateretencion_icaToGet($this->retencion_ica);
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
		$this->retencion_ica = new  retencion_ica();
		  		  
        try {		
			$this->retencion_ica=$this->retencion_icaDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->retencion_ica,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				retencion_ica_util::refrescarFKDescripcion($this->retencion_ica);
			}
			
			//retencion_ica_logic_add::checkretencion_icaToGet($this->retencion_ica,$this->datosCliente);
			//retencion_ica_logic_add::updateretencion_icaToGet($this->retencion_ica);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?retencion_ica {
		$retencion_icaLogic = new  retencion_ica_logic();
		  		  
        try {		
			$retencion_icaLogic->setConnexion($connexion);			
			$retencion_icaLogic->getEntity($id);			
			return $retencion_icaLogic->getretencion_ica();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->retencion_ica = new  retencion_ica();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->retencion_ica=$this->retencion_icaDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->retencion_ica,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				retencion_ica_util::refrescarFKDescripcion($this->retencion_ica);
			}
			
			//retencion_ica_logic_add::checkretencion_icaToGet($this->retencion_ica,$this->datosCliente);
			//retencion_ica_logic_add::updateretencion_icaToGet($this->retencion_ica);
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
		$this->retencion_ica = new  retencion_ica();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->retencion_ica=$this->retencion_icaDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->retencion_ica,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				retencion_ica_util::refrescarFKDescripcion($this->retencion_ica);
			}
			
			//retencion_ica_logic_add::checkretencion_icaToGet($this->retencion_ica,$this->datosCliente);
			//retencion_ica_logic_add::updateretencion_icaToGet($this->retencion_ica);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?retencion_ica {
		$retencion_icaLogic = new  retencion_ica_logic();
		  		  
        try {		
			$retencion_icaLogic->setConnexion($connexion);			
			$retencion_icaLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $retencion_icaLogic->getretencion_ica();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->retencion_icas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->retencion_icas=$this->retencion_icaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				retencion_ica_util::refrescarFKDescripciones($this->retencion_icas);
			}
			
			//retencion_ica_logic_add::checkretencion_icaToGets($this->retencion_icas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->retencion_icas);			
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
		$this->retencion_icas = array();
		  		  
        try {			
			$this->retencion_icas=$this->retencion_icaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				retencion_ica_util::refrescarFKDescripciones($this->retencion_icas);
			}
			
			//retencion_ica_logic_add::checkretencion_icaToGets($this->retencion_icas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->retencion_icas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->retencion_icas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->retencion_icas=$this->retencion_icaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				retencion_ica_util::refrescarFKDescripciones($this->retencion_icas);
			}
			
			//retencion_ica_logic_add::checkretencion_icaToGets($this->retencion_icas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->retencion_icas);
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
		$this->retencion_icas = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->retencion_icas=$this->retencion_icaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				retencion_ica_util::refrescarFKDescripciones($this->retencion_icas);
			}
			
			//retencion_ica_logic_add::checkretencion_icaToGets($this->retencion_icas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->retencion_icas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$retencion_icaLogic = new  retencion_ica_logic();
		  		  
        try {		
			$retencion_icaLogic->setConnexion($connexion);			
			$retencion_icaLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $retencion_icaLogic->getretencion_icas();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->retencion_icas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->retencion_icas=$this->retencion_icaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				retencion_ica_util::refrescarFKDescripciones($this->retencion_icas);
			}
			
			//retencion_ica_logic_add::checkretencion_icaToGets($this->retencion_icas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->retencion_icas);
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
		$this->retencion_icas = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->retencion_icas=$this->retencion_icaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				retencion_ica_util::refrescarFKDescripciones($this->retencion_icas);
			}
			
			//retencion_ica_logic_add::checkretencion_icaToGets($this->retencion_icas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->retencion_icas);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->retencion_icas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->retencion_icas=$this->retencion_icaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				retencion_ica_util::refrescarFKDescripciones($this->retencion_icas);
			}
			
			//retencion_ica_logic_add::checkretencion_icaToGets($this->retencion_icas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->retencion_icas);
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
		$this->retencion_icas = array();
		  		  
        try {			
			$this->retencion_icas=$this->retencion_icaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				retencion_ica_util::refrescarFKDescripciones($this->retencion_icas);
			}	
			
			//retencion_ica_logic_add::checkretencion_icaToGets($this->retencion_icas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->retencion_icas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->retencion_icas = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->retencion_icas=$this->retencion_icaDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				retencion_ica_util::refrescarFKDescripciones($this->retencion_icas);
			}
			
			//retencion_ica_logic_add::checkretencion_icaToGets($this->retencion_icas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->retencion_icas);
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
		$this->retencion_icas = array();
		  		  
        try {		
			$this->retencion_icas=$this->retencion_icaDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				retencion_ica_util::refrescarFKDescripciones($this->retencion_icas);
			}
			
			//retencion_ica_logic_add::checkretencion_icaToGets($this->retencion_icas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->retencion_icas);

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
			$parameterSelectionGeneralid_cuenta_compras->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_compras,retencion_ica_util::$ID_CUENTA_COMPRAS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_compras);

			$this->retencion_icas=$this->retencion_icaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				retencion_ica_util::refrescarFKDescripciones($this->retencion_icas);
			}
			//retencion_ica_logic_add::checkretencion_icaToGets($this->retencion_icas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->retencion_icas);

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
			$parameterSelectionGeneralid_cuenta_compras->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_compras,retencion_ica_util::$ID_CUENTA_COMPRAS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_compras);

			$this->retencion_icas=$this->retencion_icaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				retencion_ica_util::refrescarFKDescripciones($this->retencion_icas);
			}
			//retencion_ica_logic_add::checkretencion_icaToGets($this->retencion_icas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->retencion_icas);
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
			$parameterSelectionGeneralid_cuenta_ventas->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_ventas,retencion_ica_util::$ID_CUENTA_VENTAS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_ventas);

			$this->retencion_icas=$this->retencion_icaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				retencion_ica_util::refrescarFKDescripciones($this->retencion_icas);
			}
			//retencion_ica_logic_add::checkretencion_icaToGets($this->retencion_icas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->retencion_icas);

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
			$parameterSelectionGeneralid_cuenta_ventas->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_ventas,retencion_ica_util::$ID_CUENTA_VENTAS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_ventas);

			$this->retencion_icas=$this->retencion_icaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				retencion_ica_util::refrescarFKDescripciones($this->retencion_icas);
			}
			//retencion_ica_logic_add::checkretencion_icaToGets($this->retencion_icas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->retencion_icas);
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,retencion_ica_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->retencion_icas=$this->retencion_icaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				retencion_ica_util::refrescarFKDescripciones($this->retencion_icas);
			}
			//retencion_ica_logic_add::checkretencion_icaToGets($this->retencion_icas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->retencion_icas);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,retencion_ica_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->retencion_icas=$this->retencion_icaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				retencion_ica_util::refrescarFKDescripciones($this->retencion_icas);
			}
			//retencion_ica_logic_add::checkretencion_icaToGets($this->retencion_icas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->retencion_icas);
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
						
			//retencion_ica_logic_add::checkretencion_icaToSave($this->retencion_ica,$this->datosCliente,$this->connexion);	       
			//retencion_ica_logic_add::updateretencion_icaToSave($this->retencion_ica);			
			retencion_ica_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->retencion_ica,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->retencion_icaLogicAdditional->checkGeneralEntityToSave($this,$this->retencion_ica,$this->datosCliente,$this->connexion);
			
			
			retencion_ica_data::save($this->retencion_ica, $this->connexion);	    	       	 				
			//retencion_ica_logic_add::checkretencion_icaToSaveAfter($this->retencion_ica,$this->datosCliente,$this->connexion);			
			//$this->retencion_icaLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->retencion_ica,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->retencion_ica,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->retencion_ica,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				retencion_ica_util::refrescarFKDescripcion($this->retencion_ica);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->retencion_ica->getIsDeleted()) {
				$this->retencion_ica=null;
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
						
			/*retencion_ica_logic_add::checkretencion_icaToSave($this->retencion_ica,$this->datosCliente,$this->connexion);*/	        
			//retencion_ica_logic_add::updateretencion_icaToSave($this->retencion_ica);			
			//$this->retencion_icaLogicAdditional->checkGeneralEntityToSave($this,$this->retencion_ica,$this->datosCliente,$this->connexion);			
			retencion_ica_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->retencion_ica,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			retencion_ica_data::save($this->retencion_ica, $this->connexion);	    	       	 						
			/*retencion_ica_logic_add::checkretencion_icaToSaveAfter($this->retencion_ica,$this->datosCliente,$this->connexion);*/			
			//$this->retencion_icaLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->retencion_ica,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->retencion_ica,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->retencion_ica,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				retencion_ica_util::refrescarFKDescripcion($this->retencion_ica);				
			}
			
			if($this->retencion_ica->getIsDeleted()) {
				$this->retencion_ica=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(retencion_ica $retencion_ica,Connexion $connexion)  {
		$retencion_icaLogic = new  retencion_ica_logic();		  		  
        try {		
			$retencion_icaLogic->setConnexion($connexion);			
			$retencion_icaLogic->setretencion_ica($retencion_ica);			
			$retencion_icaLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*retencion_ica_logic_add::checkretencion_icaToSaves($this->retencion_icas,$this->datosCliente,$this->connexion);*/	        	
			//$this->retencion_icaLogicAdditional->checkGeneralEntitiesToSaves($this,$this->retencion_icas,$this->datosCliente,$this->connexion);
			
	   		foreach($this->retencion_icas as $retencion_icaLocal) {				
								
				//retencion_ica_logic_add::updateretencion_icaToSave($retencion_icaLocal);	        	
				retencion_ica_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$retencion_icaLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				retencion_ica_data::save($retencion_icaLocal, $this->connexion);				
			}
			
			/*retencion_ica_logic_add::checkretencion_icaToSavesAfter($this->retencion_icas,$this->datosCliente,$this->connexion);*/			
			//$this->retencion_icaLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->retencion_icas,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				retencion_ica_util::refrescarFKDescripciones($this->retencion_icas);
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
			/*retencion_ica_logic_add::checkretencion_icaToSaves($this->retencion_icas,$this->datosCliente,$this->connexion);*/			
			//$this->retencion_icaLogicAdditional->checkGeneralEntitiesToSaves($this,$this->retencion_icas,$this->datosCliente,$this->connexion);
			
	   		foreach($this->retencion_icas as $retencion_icaLocal) {				
								
				//retencion_ica_logic_add::updateretencion_icaToSave($retencion_icaLocal);	        	
				retencion_ica_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$retencion_icaLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				retencion_ica_data::save($retencion_icaLocal, $this->connexion);				
			}			
			
			/*retencion_ica_logic_add::checkretencion_icaToSavesAfter($this->retencion_icas,$this->datosCliente,$this->connexion);*/			
			//$this->retencion_icaLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->retencion_icas,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				retencion_ica_util::refrescarFKDescripciones($this->retencion_icas);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $retencion_icas,Connexion $connexion)  {
		$retencion_icaLogic = new  retencion_ica_logic();
		  		  
        try {		
			$retencion_icaLogic->setConnexion($connexion);			
			$retencion_icaLogic->setretencion_icas($retencion_icas);			
			$retencion_icaLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$retencion_icasAux=array();
		
		foreach($this->retencion_icas as $retencion_ica) {
			if($retencion_ica->getIsDeleted()==false) {
				$retencion_icasAux[]=$retencion_ica;
			}
		}
		
		$this->retencion_icas=$retencion_icasAux;
	}
	
	public function updateToGetsAuxiliar(array &$retencion_icas) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->retencion_icas as $retencion_ica) {
				
				$retencion_ica->setid_empresa_Descripcion(retencion_ica_util::getempresaDescripcion($retencion_ica->getempresa()));
				$retencion_ica->setid_cuenta_ventas_Descripcion(retencion_ica_util::getcuenta_ventasDescripcion($retencion_ica->getcuenta_ventas()));
				$retencion_ica->setid_cuenta_compras_Descripcion(retencion_ica_util::getcuenta_comprasDescripcion($retencion_ica->getcuenta_compras()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$retencion_ica_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$retencion_ica_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$retencion_ica_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$retencion_ica_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$retencion_ica_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$retencion_icaForeignKey=new retencion_ica_param_return();//retencion_icaForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$retencion_icaForeignKey,$retencion_ica_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_ventas',$strRecargarFkTipos,',')) {
				$this->cargarComboscuenta_ventassFK($this->connexion,$strRecargarFkQuery,$retencion_icaForeignKey,$retencion_ica_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_compras',$strRecargarFkTipos,',')) {
				$this->cargarComboscuenta_comprassFK($this->connexion,$strRecargarFkQuery,$retencion_icaForeignKey,$retencion_ica_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$retencion_icaForeignKey,$retencion_ica_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cuenta_ventas',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscuenta_ventassFK($this->connexion,' where id=-1 ',$retencion_icaForeignKey,$retencion_ica_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cuenta_compras',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscuenta_comprassFK($this->connexion,' where id=-1 ',$retencion_icaForeignKey,$retencion_ica_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $retencion_icaForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$retencion_icaForeignKey,$retencion_ica_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$retencion_icaForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($retencion_ica_session==null) {
			$retencion_ica_session=new retencion_ica_session();
		}
		
		if($retencion_ica_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($retencion_icaForeignKey->idempresaDefaultFK==0) {
					$retencion_icaForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$retencion_icaForeignKey->empresasFK[$empresaLocal->getId()]=retencion_ica_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($retencion_ica_session->bigidempresaActual!=null && $retencion_ica_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($retencion_ica_session->bigidempresaActual);//WithConnection

				$retencion_icaForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=retencion_ica_util::getempresaDescripcion($empresaLogic->getempresa());
				$retencion_icaForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarComboscuenta_ventassFK($connexion=null,$strRecargarFkQuery='',$retencion_icaForeignKey,$retencion_ica_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$cuentaLogic= new cuenta_logic();
		$pagination= new Pagination();
		$retencion_icaForeignKey->cuenta_ventassFK=array();

		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($retencion_ica_session==null) {
			$retencion_ica_session=new retencion_ica_session();
		}
		
		if($retencion_ica_session->bitBusquedaDesdeFKSesioncuenta_ventas!=true) {
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
				if($retencion_icaForeignKey->idcuenta_ventasDefaultFK==0) {
					$retencion_icaForeignKey->idcuenta_ventasDefaultFK=$cuentaLocal->getId();
				}

				$retencion_icaForeignKey->cuenta_ventassFK[$cuentaLocal->getId()]=retencion_ica_util::getcuenta_ventasDescripcion($cuentaLocal);
			}

		} else {

			if($retencion_ica_session->bigidcuenta_ventasActual!=null && $retencion_ica_session->bigidcuenta_ventasActual > 0) {
				$cuentaLogic->getEntity($retencion_ica_session->bigidcuenta_ventasActual);//WithConnection

				$retencion_icaForeignKey->cuenta_ventassFK[$cuentaLogic->getcuenta()->getId()]=retencion_ica_util::getcuenta_ventasDescripcion($cuentaLogic->getcuenta());
				$retencion_icaForeignKey->idcuenta_ventasDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	public function cargarComboscuenta_comprassFK($connexion=null,$strRecargarFkQuery='',$retencion_icaForeignKey,$retencion_ica_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$cuentaLogic= new cuenta_logic();
		$pagination= new Pagination();
		$retencion_icaForeignKey->cuenta_comprassFK=array();

		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($retencion_ica_session==null) {
			$retencion_ica_session=new retencion_ica_session();
		}
		
		if($retencion_ica_session->bitBusquedaDesdeFKSesioncuenta_compras!=true) {
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
				if($retencion_icaForeignKey->idcuenta_comprasDefaultFK==0) {
					$retencion_icaForeignKey->idcuenta_comprasDefaultFK=$cuentaLocal->getId();
				}

				$retencion_icaForeignKey->cuenta_comprassFK[$cuentaLocal->getId()]=retencion_ica_util::getcuenta_comprasDescripcion($cuentaLocal);
			}

		} else {

			if($retencion_ica_session->bigidcuenta_comprasActual!=null && $retencion_ica_session->bigidcuenta_comprasActual > 0) {
				$cuentaLogic->getEntity($retencion_ica_session->bigidcuenta_comprasActual);//WithConnection

				$retencion_icaForeignKey->cuenta_comprassFK[$cuentaLogic->getcuenta()->getId()]=retencion_ica_util::getcuenta_comprasDescripcion($cuentaLogic->getcuenta());
				$retencion_icaForeignKey->idcuenta_comprasDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($retencion_ica,$proveedors,$clientes) {
		$this->saveRelacionesBase($retencion_ica,$proveedors,$clientes,true);
	}

	public function saveRelaciones($retencion_ica,$proveedors,$clientes) {
		$this->saveRelacionesBase($retencion_ica,$proveedors,$clientes,false);
	}

	public function saveRelacionesBase($retencion_ica,$proveedors=array(),$clientes=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$retencion_ica->setproveedors($proveedors);
			$retencion_ica->setclientes($clientes);
			$this->setretencion_ica($retencion_ica);

			if(true) {

				//retencion_ica_logic_add::updateRelacionesToSave($retencion_ica,$this);

				if(($this->retencion_ica->getIsNew() || $this->retencion_ica->getIsChanged()) && !$this->retencion_ica->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($proveedors,$clientes);

				} else if($this->retencion_ica->getIsDeleted()) {
					$this->saveRelacionesDetalles($proveedors,$clientes);
					$this->save();
				}

				//retencion_ica_logic_add::updateRelacionesToSaveAfter($retencion_ica,$this);

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
	
	
	public function saveRelacionesDetalles($proveedors=array(),$clientes=array()) {
		try {
	

			$idretencion_icaActual=$this->getretencion_ica()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/proveedor_carga.php');
			proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$proveedorLogic_Desde_retencion_ica=new proveedor_logic();
			$proveedorLogic_Desde_retencion_ica->setproveedors($proveedors);

			$proveedorLogic_Desde_retencion_ica->setConnexion($this->getConnexion());
			$proveedorLogic_Desde_retencion_ica->setDatosCliente($this->datosCliente);

			foreach($proveedorLogic_Desde_retencion_ica->getproveedors() as $proveedor_Desde_retencion_ica) {
				$proveedor_Desde_retencion_ica->setid_retencion_ica($idretencion_icaActual);

				$proveedorLogic_Desde_retencion_ica->setproveedor($proveedor_Desde_retencion_ica);
				$proveedorLogic_Desde_retencion_ica->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/cliente_carga.php');
			cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$clienteLogic_Desde_retencion_ica=new cliente_logic();
			$clienteLogic_Desde_retencion_ica->setclientes($clientes);

			$clienteLogic_Desde_retencion_ica->setConnexion($this->getConnexion());
			$clienteLogic_Desde_retencion_ica->setDatosCliente($this->datosCliente);

			foreach($clienteLogic_Desde_retencion_ica->getclientes() as $cliente_Desde_retencion_ica) {
				$cliente_Desde_retencion_ica->setid_retencion_ica($idretencion_icaActual);

				$clienteLogic_Desde_retencion_ica->setcliente($cliente_Desde_retencion_ica);
				$clienteLogic_Desde_retencion_ica->save();
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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $retencion_icas,retencion_ica_param_return $retencion_icaParameterGeneral) : retencion_ica_param_return {
		$retencion_icaReturnGeneral=new retencion_ica_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $retencion_icaReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $retencion_icas,retencion_ica_param_return $retencion_icaParameterGeneral) : retencion_ica_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$retencion_icaReturnGeneral=new retencion_ica_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $retencion_icaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $retencion_icas,retencion_ica $retencion_ica,retencion_ica_param_return $retencion_icaParameterGeneral,bool $isEsNuevoretencion_ica,array $clases) : retencion_ica_param_return {
		 try {	
			$retencion_icaReturnGeneral=new retencion_ica_param_return();
	
			$retencion_icaReturnGeneral->setretencion_ica($retencion_ica);
			$retencion_icaReturnGeneral->setretencion_icas($retencion_icas);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$retencion_icaReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $retencion_icaReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $retencion_icas,retencion_ica $retencion_ica,retencion_ica_param_return $retencion_icaParameterGeneral,bool $isEsNuevoretencion_ica,array $clases) : retencion_ica_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$retencion_icaReturnGeneral=new retencion_ica_param_return();
	
			$retencion_icaReturnGeneral->setretencion_ica($retencion_ica);
			$retencion_icaReturnGeneral->setretencion_icas($retencion_icas);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$retencion_icaReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $retencion_icaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $retencion_icas,retencion_ica $retencion_ica,retencion_ica_param_return $retencion_icaParameterGeneral,bool $isEsNuevoretencion_ica,array $clases) : retencion_ica_param_return {
		 try {	
			$retencion_icaReturnGeneral=new retencion_ica_param_return();
	
			$retencion_icaReturnGeneral->setretencion_ica($retencion_ica);
			$retencion_icaReturnGeneral->setretencion_icas($retencion_icas);
			
			
			
			return $retencion_icaReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $retencion_icas,retencion_ica $retencion_ica,retencion_ica_param_return $retencion_icaParameterGeneral,bool $isEsNuevoretencion_ica,array $clases) : retencion_ica_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$retencion_icaReturnGeneral=new retencion_ica_param_return();
	
			$retencion_icaReturnGeneral->setretencion_ica($retencion_ica);
			$retencion_icaReturnGeneral->setretencion_icas($retencion_icas);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $retencion_icaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,retencion_ica $retencion_ica,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,retencion_ica $retencion_ica,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		retencion_ica_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		retencion_ica_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(retencion_ica $retencion_ica,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//retencion_ica_logic_add::updateretencion_icaToGet($this->retencion_ica);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$retencion_ica->setempresa($this->retencion_icaDataAccess->getempresa($this->connexion,$retencion_ica));
		$retencion_ica->setcuenta_ventas($this->retencion_icaDataAccess->getcuenta_ventas($this->connexion,$retencion_ica));
		$retencion_ica->setcuenta_compras($this->retencion_icaDataAccess->getcuenta_compras($this->connexion,$retencion_ica));
		$retencion_ica->setproveedors($this->retencion_icaDataAccess->getproveedors($this->connexion,$retencion_ica));
		$retencion_ica->setclientes($this->retencion_icaDataAccess->getclientes($this->connexion,$retencion_ica));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$retencion_ica->setempresa($this->retencion_icaDataAccess->getempresa($this->connexion,$retencion_ica));
				continue;
			}

			if($clas->clas==cuenta::$class.'_ventas') {
				$retencion_ica->setcuenta_ventas($this->retencion_icaDataAccess->getcuenta_ventas($this->connexion,$retencion_ica));
				continue;
			}

			if($clas->clas==cuenta::$class.'_compras') {
				$retencion_ica->setcuenta_compras($this->retencion_icaDataAccess->getcuenta_compras($this->connexion,$retencion_ica));
				continue;
			}

			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$retencion_ica->setproveedors($this->retencion_icaDataAccess->getproveedors($this->connexion,$retencion_ica));

				if($this->isConDeep) {
					$proveedorLogic= new proveedor_logic($this->connexion);
					$proveedorLogic->setproveedors($retencion_ica->getproveedors());
					$classesLocal=proveedor_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$proveedorLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					proveedor_util::refrescarFKDescripciones($proveedorLogic->getproveedors());
					$retencion_ica->setproveedors($proveedorLogic->getproveedors());
				}

				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$retencion_ica->setclientes($this->retencion_icaDataAccess->getclientes($this->connexion,$retencion_ica));

				if($this->isConDeep) {
					$clienteLogic= new cliente_logic($this->connexion);
					$clienteLogic->setclientes($retencion_ica->getclientes());
					$classesLocal=cliente_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$clienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					cliente_util::refrescarFKDescripciones($clienteLogic->getclientes());
					$retencion_ica->setclientes($clienteLogic->getclientes());
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
			$retencion_ica->setempresa($this->retencion_icaDataAccess->getempresa($this->connexion,$retencion_ica));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_ventas') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$retencion_ica->setcuenta_ventas($this->retencion_icaDataAccess->getcuenta_ventas($this->connexion,$retencion_ica));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_compras') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$retencion_ica->setcuenta_compras($this->retencion_icaDataAccess->getcuenta_compras($this->connexion,$retencion_ica));
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
			$retencion_ica->setproveedors($this->retencion_icaDataAccess->getproveedors($this->connexion,$retencion_ica));
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
			$retencion_ica->setclientes($this->retencion_icaDataAccess->getclientes($this->connexion,$retencion_ica));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$retencion_ica->setempresa($this->retencion_icaDataAccess->getempresa($this->connexion,$retencion_ica));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($retencion_ica->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$retencion_ica->setcuenta_ventas($this->retencion_icaDataAccess->getcuenta_ventas($this->connexion,$retencion_ica));
		$cuenta_ventasLogic= new cuenta_logic($this->connexion);
		$cuenta_ventasLogic->deepLoad($retencion_ica->getcuenta_ventas(),$isDeep,$deepLoadType,$clases);
				
		$retencion_ica->setcuenta_compras($this->retencion_icaDataAccess->getcuenta_compras($this->connexion,$retencion_ica));
		$cuenta_comprasLogic= new cuenta_logic($this->connexion);
		$cuenta_comprasLogic->deepLoad($retencion_ica->getcuenta_compras(),$isDeep,$deepLoadType,$clases);
				

		$retencion_ica->setproveedors($this->retencion_icaDataAccess->getproveedors($this->connexion,$retencion_ica));

		foreach($retencion_ica->getproveedors() as $proveedor) {
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedorLogic->deepLoad($proveedor,$isDeep,$deepLoadType,$clases);
		}

		$retencion_ica->setclientes($this->retencion_icaDataAccess->getclientes($this->connexion,$retencion_ica));

		foreach($retencion_ica->getclientes() as $cliente) {
			$clienteLogic= new cliente_logic($this->connexion);
			$clienteLogic->deepLoad($cliente,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$retencion_ica->setempresa($this->retencion_icaDataAccess->getempresa($this->connexion,$retencion_ica));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($retencion_ica->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cuenta::$class.'_ventas') {
				$retencion_ica->setcuenta_ventas($this->retencion_icaDataAccess->getcuenta_ventas($this->connexion,$retencion_ica));
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepLoad($retencion_ica->getcuenta_ventas(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cuenta::$class.'_compras') {
				$retencion_ica->setcuenta_compras($this->retencion_icaDataAccess->getcuenta_compras($this->connexion,$retencion_ica));
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepLoad($retencion_ica->getcuenta_compras(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$retencion_ica->setproveedors($this->retencion_icaDataAccess->getproveedors($this->connexion,$retencion_ica));

				foreach($retencion_ica->getproveedors() as $proveedor) {
					$proveedorLogic= new proveedor_logic($this->connexion);
					$proveedorLogic->deepLoad($proveedor,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$retencion_ica->setclientes($this->retencion_icaDataAccess->getclientes($this->connexion,$retencion_ica));

				foreach($retencion_ica->getclientes() as $cliente) {
					$clienteLogic= new cliente_logic($this->connexion);
					$clienteLogic->deepLoad($cliente,$isDeep,$deepLoadType,$clases);
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
			$retencion_ica->setempresa($this->retencion_icaDataAccess->getempresa($this->connexion,$retencion_ica));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($retencion_ica->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_ventas') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$retencion_ica->setcuenta_ventas($this->retencion_icaDataAccess->getcuenta_ventas($this->connexion,$retencion_ica));
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepLoad($retencion_ica->getcuenta_ventas(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_compras') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$retencion_ica->setcuenta_compras($this->retencion_icaDataAccess->getcuenta_compras($this->connexion,$retencion_ica));
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepLoad($retencion_ica->getcuenta_compras(),$isDeep,$deepLoadType,$clases);
				
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
			$retencion_ica->setproveedors($this->retencion_icaDataAccess->getproveedors($this->connexion,$retencion_ica));

			foreach($retencion_ica->getproveedors() as $proveedor) {
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedorLogic->deepLoad($proveedor,$isDeep,$deepLoadType,$clases);
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
			$retencion_ica->setclientes($this->retencion_icaDataAccess->getclientes($this->connexion,$retencion_ica));

			foreach($retencion_ica->getclientes() as $cliente) {
				$clienteLogic= new cliente_logic($this->connexion);
				$clienteLogic->deepLoad($cliente,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(retencion_ica $retencion_ica,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//retencion_ica_logic_add::updateretencion_icaToSave($this->retencion_ica);			
			
			if(!$paraDeleteCascade) {				
				retencion_ica_data::save($retencion_ica, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($retencion_ica->getempresa(),$this->connexion);
		cuenta_data::save($retencion_ica->getcuenta_ventas(),$this->connexion);
		cuenta_data::save($retencion_ica->getcuenta_compras(),$this->connexion);

		foreach($retencion_ica->getproveedors() as $proveedor) {
			$proveedor->setid_retencion_ica($retencion_ica->getId());
			proveedor_data::save($proveedor,$this->connexion);
		}


		foreach($retencion_ica->getclientes() as $cliente) {
			$cliente->setid_retencion_ica($retencion_ica->getId());
			cliente_data::save($cliente,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($retencion_ica->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==cuenta::$class.'_ventas') {
				cuenta_data::save($retencion_ica->getcuenta_ventas(),$this->connexion);
				continue;
			}

			if($clas->clas==cuenta::$class.'_compras') {
				cuenta_data::save($retencion_ica->getcuenta_compras(),$this->connexion);
				continue;
			}


			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($retencion_ica->getproveedors() as $proveedor) {
					$proveedor->setid_retencion_ica($retencion_ica->getId());
					proveedor_data::save($proveedor,$this->connexion);
				}

				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($retencion_ica->getclientes() as $cliente) {
					$cliente->setid_retencion_ica($retencion_ica->getId());
					cliente_data::save($cliente,$this->connexion);
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
			empresa_data::save($retencion_ica->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_ventas') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($retencion_ica->getcuenta_ventas(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_compras') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($retencion_ica->getcuenta_compras(),$this->connexion);
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

			foreach($retencion_ica->getproveedors() as $proveedor) {
				$proveedor->setid_retencion_ica($retencion_ica->getId());
				proveedor_data::save($proveedor,$this->connexion);
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

			foreach($retencion_ica->getclientes() as $cliente) {
				$cliente->setid_retencion_ica($retencion_ica->getId());
				cliente_data::save($cliente,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($retencion_ica->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($retencion_ica->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cuenta_data::save($retencion_ica->getcuenta_ventas(),$this->connexion);
		$cuenta_ventasLogic= new cuenta_logic($this->connexion);
		$cuenta_ventasLogic->deepSave($retencion_ica->getcuenta_ventas(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cuenta_data::save($retencion_ica->getcuenta_compras(),$this->connexion);
		$cuenta_comprasLogic= new cuenta_logic($this->connexion);
		$cuenta_comprasLogic->deepSave($retencion_ica->getcuenta_compras(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($retencion_ica->getproveedors() as $proveedor) {
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedor->setid_retencion_ica($retencion_ica->getId());
			proveedor_data::save($proveedor,$this->connexion);
			$proveedorLogic->deepSave($proveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($retencion_ica->getclientes() as $cliente) {
			$clienteLogic= new cliente_logic($this->connexion);
			$cliente->setid_retencion_ica($retencion_ica->getId());
			cliente_data::save($cliente,$this->connexion);
			$clienteLogic->deepSave($cliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($retencion_ica->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($retencion_ica->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cuenta::$class.'_ventas') {
				cuenta_data::save($retencion_ica->getcuenta_ventas(),$this->connexion);
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepSave($retencion_ica->getcuenta_ventas(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cuenta::$class.'_compras') {
				cuenta_data::save($retencion_ica->getcuenta_compras(),$this->connexion);
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepSave($retencion_ica->getcuenta_compras(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($retencion_ica->getproveedors() as $proveedor) {
					$proveedorLogic= new proveedor_logic($this->connexion);
					$proveedor->setid_retencion_ica($retencion_ica->getId());
					proveedor_data::save($proveedor,$this->connexion);
					$proveedorLogic->deepSave($proveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($retencion_ica->getclientes() as $cliente) {
					$clienteLogic= new cliente_logic($this->connexion);
					$cliente->setid_retencion_ica($retencion_ica->getId());
					cliente_data::save($cliente,$this->connexion);
					$clienteLogic->deepSave($cliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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
			empresa_data::save($retencion_ica->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($retencion_ica->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_ventas') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($retencion_ica->getcuenta(),$this->connexion);
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepSave($retencion_ica->getcuenta_ventas(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_compras') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($retencion_ica->getcuenta(),$this->connexion);
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepSave($retencion_ica->getcuenta_compras(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
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

			foreach($retencion_ica->getproveedors() as $proveedor) {
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedor->setid_retencion_ica($retencion_ica->getId());
				proveedor_data::save($proveedor,$this->connexion);
				$proveedorLogic->deepSave($proveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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

			foreach($retencion_ica->getclientes() as $cliente) {
				$clienteLogic= new cliente_logic($this->connexion);
				$cliente->setid_retencion_ica($retencion_ica->getId());
				cliente_data::save($cliente,$this->connexion);
				$clienteLogic->deepSave($cliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				retencion_ica_data::save($retencion_ica, $this->connexion);
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
			
			$this->deepLoad($this->retencion_ica,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->retencion_icas as $retencion_ica) {
				$this->deepLoad($retencion_ica,$isDeep,$deepLoadType,$clases);
								
				retencion_ica_util::refrescarFKDescripciones($this->retencion_icas);
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
			
			foreach($this->retencion_icas as $retencion_ica) {
				$this->deepLoad($retencion_ica,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->retencion_ica,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->retencion_icas as $retencion_ica) {
				$this->deepSave($retencion_ica,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->retencion_icas as $retencion_ica) {
				$this->deepSave($retencion_ica,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(proveedor::$class);
				$classes[]=new Classe(cliente::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==proveedor::$class) {
						$classes[]=new Classe(proveedor::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==cliente::$class) {
						$classes[]=new Classe(cliente::$class);
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

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getretencion_ica() : ?retencion_ica {	
		/*
		retencion_ica_logic_add::checkretencion_icaToGet($this->retencion_ica,$this->datosCliente);
		retencion_ica_logic_add::updateretencion_icaToGet($this->retencion_ica);
		*/
			
		return $this->retencion_ica;
	}
		
	public function setretencion_ica(retencion_ica $newretencion_ica) {
		$this->retencion_ica = $newretencion_ica;
	}
	
	public function getretencion_icas() : array {		
		/*
		retencion_ica_logic_add::checkretencion_icaToGets($this->retencion_icas,$this->datosCliente);
		
		foreach ($this->retencion_icas as $retencion_icaLocal ) {
			retencion_ica_logic_add::updateretencion_icaToGet($retencion_icaLocal);
		}
		*/
		
		return $this->retencion_icas;
	}
	
	public function setretencion_icas(array $newretencion_icas) {
		$this->retencion_icas = $newretencion_icas;
	}
	
	public function getretencion_icaDataAccess() : retencion_ica_data {
		return $this->retencion_icaDataAccess;
	}
	
	public function setretencion_icaDataAccess(retencion_ica_data $newretencion_icaDataAccess) {
		$this->retencion_icaDataAccess = $newretencion_icaDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        retencion_ica_carga::$CONTROLLER;;        
		
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
