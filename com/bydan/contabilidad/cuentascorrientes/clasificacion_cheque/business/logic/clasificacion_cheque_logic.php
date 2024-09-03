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

namespace com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\util\clasificacion_cheque_carga;
use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\util\clasificacion_cheque_param_return;

use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\presentation\session\clasificacion_cheque_session;

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

use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\util\clasificacion_cheque_util;
use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\business\entity\clasificacion_cheque;
use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\business\data\clasificacion_cheque_data;

//FK


use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\business\entity\cuenta_corriente_detalle;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\business\data\cuenta_corriente_detalle_data;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\business\logic\cuenta_corriente_detalle_logic;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\util\cuenta_corriente_detalle_util;

use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\business\entity\categoria_cheque;
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\business\data\categoria_cheque_data;
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\business\logic\categoria_cheque_logic;
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\util\categoria_cheque_util;

//REL


//REL DETALLES




class clasificacion_cheque_logic  extends GeneralEntityLogic implements clasificacion_cheque_logicI {	
	/*GENERAL*/
	public clasificacion_cheque_data $clasificacion_chequeDataAccess;
	//public ?clasificacion_cheque_logic_add $clasificacion_chequeLogicAdditional=null;
	public ?clasificacion_cheque $clasificacion_cheque;
	public array $clasificacion_cheques;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->clasificacion_chequeDataAccess = new clasificacion_cheque_data();			
			$this->clasificacion_cheques = array();
			$this->clasificacion_cheque = new clasificacion_cheque();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->clasificacion_chequeLogicAdditional = new clasificacion_cheque_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->clasificacion_chequeLogicAdditional==null) {
		//	$this->clasificacion_chequeLogicAdditional=new clasificacion_cheque_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->clasificacion_chequeDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->clasificacion_chequeDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->clasificacion_chequeDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->clasificacion_chequeDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->clasificacion_cheques = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->clasificacion_cheques=$this->clasificacion_chequeDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				clasificacion_cheque_util::refrescarFKDescripciones($this->clasificacion_cheques);
			}
			
			//clasificacion_cheque_logic_add::checkclasificacion_chequeToGets($this->clasificacion_cheques,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->clasificacion_cheques);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->clasificacion_cheques = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->clasificacion_cheques=$this->clasificacion_chequeDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				clasificacion_cheque_util::refrescarFKDescripciones($this->clasificacion_cheques);
			}
			
			//clasificacion_cheque_logic_add::checkclasificacion_chequeToGets($this->clasificacion_cheques,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->clasificacion_cheques);
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
		$this->clasificacion_cheque = new clasificacion_cheque();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->clasificacion_cheque=$this->clasificacion_chequeDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->clasificacion_cheque,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				clasificacion_cheque_util::refrescarFKDescripcion($this->clasificacion_cheque);
			}
						
			//clasificacion_cheque_logic_add::checkclasificacion_chequeToGet($this->clasificacion_cheque,$this->datosCliente);
			//clasificacion_cheque_logic_add::updateclasificacion_chequeToGet($this->clasificacion_cheque);
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
		$this->clasificacion_cheque = new  clasificacion_cheque();
		  		  
        try {		
			$this->clasificacion_cheque=$this->clasificacion_chequeDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->clasificacion_cheque,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				clasificacion_cheque_util::refrescarFKDescripcion($this->clasificacion_cheque);
			}
			
			//clasificacion_cheque_logic_add::checkclasificacion_chequeToGet($this->clasificacion_cheque,$this->datosCliente);
			//clasificacion_cheque_logic_add::updateclasificacion_chequeToGet($this->clasificacion_cheque);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?clasificacion_cheque {
		$clasificacion_chequeLogic = new  clasificacion_cheque_logic();
		  		  
        try {		
			$clasificacion_chequeLogic->setConnexion($connexion);			
			$clasificacion_chequeLogic->getEntity($id);			
			return $clasificacion_chequeLogic->getclasificacion_cheque();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->clasificacion_cheque = new  clasificacion_cheque();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->clasificacion_cheque=$this->clasificacion_chequeDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->clasificacion_cheque,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				clasificacion_cheque_util::refrescarFKDescripcion($this->clasificacion_cheque);
			}
			
			//clasificacion_cheque_logic_add::checkclasificacion_chequeToGet($this->clasificacion_cheque,$this->datosCliente);
			//clasificacion_cheque_logic_add::updateclasificacion_chequeToGet($this->clasificacion_cheque);
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
		$this->clasificacion_cheque = new  clasificacion_cheque();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->clasificacion_cheque=$this->clasificacion_chequeDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->clasificacion_cheque,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				clasificacion_cheque_util::refrescarFKDescripcion($this->clasificacion_cheque);
			}
			
			//clasificacion_cheque_logic_add::checkclasificacion_chequeToGet($this->clasificacion_cheque,$this->datosCliente);
			//clasificacion_cheque_logic_add::updateclasificacion_chequeToGet($this->clasificacion_cheque);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?clasificacion_cheque {
		$clasificacion_chequeLogic = new  clasificacion_cheque_logic();
		  		  
        try {		
			$clasificacion_chequeLogic->setConnexion($connexion);			
			$clasificacion_chequeLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $clasificacion_chequeLogic->getclasificacion_cheque();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->clasificacion_cheques = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->clasificacion_cheques=$this->clasificacion_chequeDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				clasificacion_cheque_util::refrescarFKDescripciones($this->clasificacion_cheques);
			}
			
			//clasificacion_cheque_logic_add::checkclasificacion_chequeToGets($this->clasificacion_cheques,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->clasificacion_cheques);			
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
		$this->clasificacion_cheques = array();
		  		  
        try {			
			$this->clasificacion_cheques=$this->clasificacion_chequeDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				clasificacion_cheque_util::refrescarFKDescripciones($this->clasificacion_cheques);
			}
			
			//clasificacion_cheque_logic_add::checkclasificacion_chequeToGets($this->clasificacion_cheques,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->clasificacion_cheques);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->clasificacion_cheques = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->clasificacion_cheques=$this->clasificacion_chequeDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				clasificacion_cheque_util::refrescarFKDescripciones($this->clasificacion_cheques);
			}
			
			//clasificacion_cheque_logic_add::checkclasificacion_chequeToGets($this->clasificacion_cheques,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->clasificacion_cheques);
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
		$this->clasificacion_cheques = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->clasificacion_cheques=$this->clasificacion_chequeDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				clasificacion_cheque_util::refrescarFKDescripciones($this->clasificacion_cheques);
			}
			
			//clasificacion_cheque_logic_add::checkclasificacion_chequeToGets($this->clasificacion_cheques,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->clasificacion_cheques);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$clasificacion_chequeLogic = new  clasificacion_cheque_logic();
		  		  
        try {		
			$clasificacion_chequeLogic->setConnexion($connexion);			
			$clasificacion_chequeLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $clasificacion_chequeLogic->getclasificacion_cheques();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->clasificacion_cheques = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->clasificacion_cheques=$this->clasificacion_chequeDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				clasificacion_cheque_util::refrescarFKDescripciones($this->clasificacion_cheques);
			}
			
			//clasificacion_cheque_logic_add::checkclasificacion_chequeToGets($this->clasificacion_cheques,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->clasificacion_cheques);
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
		$this->clasificacion_cheques = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->clasificacion_cheques=$this->clasificacion_chequeDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				clasificacion_cheque_util::refrescarFKDescripciones($this->clasificacion_cheques);
			}
			
			//clasificacion_cheque_logic_add::checkclasificacion_chequeToGets($this->clasificacion_cheques,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->clasificacion_cheques);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->clasificacion_cheques = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->clasificacion_cheques=$this->clasificacion_chequeDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				clasificacion_cheque_util::refrescarFKDescripciones($this->clasificacion_cheques);
			}
			
			//clasificacion_cheque_logic_add::checkclasificacion_chequeToGets($this->clasificacion_cheques,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->clasificacion_cheques);
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
		$this->clasificacion_cheques = array();
		  		  
        try {			
			$this->clasificacion_cheques=$this->clasificacion_chequeDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				clasificacion_cheque_util::refrescarFKDescripciones($this->clasificacion_cheques);
			}	
			
			//clasificacion_cheque_logic_add::checkclasificacion_chequeToGets($this->clasificacion_cheques,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->clasificacion_cheques);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->clasificacion_cheques = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->clasificacion_cheques=$this->clasificacion_chequeDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				clasificacion_cheque_util::refrescarFKDescripciones($this->clasificacion_cheques);
			}
			
			//clasificacion_cheque_logic_add::checkclasificacion_chequeToGets($this->clasificacion_cheques,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->clasificacion_cheques);
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
		$this->clasificacion_cheques = array();
		  		  
        try {		
			$this->clasificacion_cheques=$this->clasificacion_chequeDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				clasificacion_cheque_util::refrescarFKDescripciones($this->clasificacion_cheques);
			}
			
			//clasificacion_cheque_logic_add::checkclasificacion_chequeToGets($this->clasificacion_cheques,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->clasificacion_cheques);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_Idcategoria_chequeWithConnection(string $strFinalQuery,Pagination $pagination,int $id_categoria_cheque) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_categoria_cheque= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_categoria_cheque->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_categoria_cheque,clasificacion_cheque_util::$ID_CATEGORIA_CHEQUE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_categoria_cheque);

			$this->clasificacion_cheques=$this->clasificacion_chequeDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				clasificacion_cheque_util::refrescarFKDescripciones($this->clasificacion_cheques);
			}
			//clasificacion_cheque_logic_add::checkclasificacion_chequeToGets($this->clasificacion_cheques,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->clasificacion_cheques);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcategoria_cheque(string $strFinalQuery,Pagination $pagination,int $id_categoria_cheque) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_categoria_cheque= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_categoria_cheque->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_categoria_cheque,clasificacion_cheque_util::$ID_CATEGORIA_CHEQUE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_categoria_cheque);

			$this->clasificacion_cheques=$this->clasificacion_chequeDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				clasificacion_cheque_util::refrescarFKDescripciones($this->clasificacion_cheques);
			}
			//clasificacion_cheque_logic_add::checkclasificacion_chequeToGets($this->clasificacion_cheques,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->clasificacion_cheques);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idcuenta_corriente_detalleWithConnection(string $strFinalQuery,Pagination $pagination,int $id_cuenta_corriente_detalle) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_corriente_detalle= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_corriente_detalle->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_corriente_detalle,clasificacion_cheque_util::$ID_CUENTA_CORRIENTE_DETALLE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_corriente_detalle);

			$this->clasificacion_cheques=$this->clasificacion_chequeDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				clasificacion_cheque_util::refrescarFKDescripciones($this->clasificacion_cheques);
			}
			//clasificacion_cheque_logic_add::checkclasificacion_chequeToGets($this->clasificacion_cheques,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->clasificacion_cheques);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcuenta_corriente_detalle(string $strFinalQuery,Pagination $pagination,int $id_cuenta_corriente_detalle) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_corriente_detalle= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_corriente_detalle->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_corriente_detalle,clasificacion_cheque_util::$ID_CUENTA_CORRIENTE_DETALLE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_corriente_detalle);

			$this->clasificacion_cheques=$this->clasificacion_chequeDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				clasificacion_cheque_util::refrescarFKDescripciones($this->clasificacion_cheques);
			}
			//clasificacion_cheque_logic_add::checkclasificacion_chequeToGets($this->clasificacion_cheques,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->clasificacion_cheques);
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
						
			//clasificacion_cheque_logic_add::checkclasificacion_chequeToSave($this->clasificacion_cheque,$this->datosCliente,$this->connexion);	       
			//clasificacion_cheque_logic_add::updateclasificacion_chequeToSave($this->clasificacion_cheque);			
			clasificacion_cheque_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->clasificacion_cheque,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->clasificacion_chequeLogicAdditional->checkGeneralEntityToSave($this,$this->clasificacion_cheque,$this->datosCliente,$this->connexion);
			
			
			clasificacion_cheque_data::save($this->clasificacion_cheque, $this->connexion);	    	       	 				
			//clasificacion_cheque_logic_add::checkclasificacion_chequeToSaveAfter($this->clasificacion_cheque,$this->datosCliente,$this->connexion);			
			//$this->clasificacion_chequeLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->clasificacion_cheque,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->clasificacion_cheque,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->clasificacion_cheque,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				clasificacion_cheque_util::refrescarFKDescripcion($this->clasificacion_cheque);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->clasificacion_cheque->getIsDeleted()) {
				$this->clasificacion_cheque=null;
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
						
			/*clasificacion_cheque_logic_add::checkclasificacion_chequeToSave($this->clasificacion_cheque,$this->datosCliente,$this->connexion);*/	        
			//clasificacion_cheque_logic_add::updateclasificacion_chequeToSave($this->clasificacion_cheque);			
			//$this->clasificacion_chequeLogicAdditional->checkGeneralEntityToSave($this,$this->clasificacion_cheque,$this->datosCliente,$this->connexion);			
			clasificacion_cheque_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->clasificacion_cheque,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			clasificacion_cheque_data::save($this->clasificacion_cheque, $this->connexion);	    	       	 						
			/*clasificacion_cheque_logic_add::checkclasificacion_chequeToSaveAfter($this->clasificacion_cheque,$this->datosCliente,$this->connexion);*/			
			//$this->clasificacion_chequeLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->clasificacion_cheque,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->clasificacion_cheque,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->clasificacion_cheque,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				clasificacion_cheque_util::refrescarFKDescripcion($this->clasificacion_cheque);				
			}
			
			if($this->clasificacion_cheque->getIsDeleted()) {
				$this->clasificacion_cheque=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(clasificacion_cheque $clasificacion_cheque,Connexion $connexion)  {
		$clasificacion_chequeLogic = new  clasificacion_cheque_logic();		  		  
        try {		
			$clasificacion_chequeLogic->setConnexion($connexion);			
			$clasificacion_chequeLogic->setclasificacion_cheque($clasificacion_cheque);			
			$clasificacion_chequeLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*clasificacion_cheque_logic_add::checkclasificacion_chequeToSaves($this->clasificacion_cheques,$this->datosCliente,$this->connexion);*/	        	
			//$this->clasificacion_chequeLogicAdditional->checkGeneralEntitiesToSaves($this,$this->clasificacion_cheques,$this->datosCliente,$this->connexion);
			
	   		foreach($this->clasificacion_cheques as $clasificacion_chequeLocal) {				
								
				//clasificacion_cheque_logic_add::updateclasificacion_chequeToSave($clasificacion_chequeLocal);	        	
				clasificacion_cheque_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$clasificacion_chequeLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				clasificacion_cheque_data::save($clasificacion_chequeLocal, $this->connexion);				
			}
			
			/*clasificacion_cheque_logic_add::checkclasificacion_chequeToSavesAfter($this->clasificacion_cheques,$this->datosCliente,$this->connexion);*/			
			//$this->clasificacion_chequeLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->clasificacion_cheques,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				clasificacion_cheque_util::refrescarFKDescripciones($this->clasificacion_cheques);
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
			/*clasificacion_cheque_logic_add::checkclasificacion_chequeToSaves($this->clasificacion_cheques,$this->datosCliente,$this->connexion);*/			
			//$this->clasificacion_chequeLogicAdditional->checkGeneralEntitiesToSaves($this,$this->clasificacion_cheques,$this->datosCliente,$this->connexion);
			
	   		foreach($this->clasificacion_cheques as $clasificacion_chequeLocal) {				
								
				//clasificacion_cheque_logic_add::updateclasificacion_chequeToSave($clasificacion_chequeLocal);	        	
				clasificacion_cheque_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$clasificacion_chequeLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				clasificacion_cheque_data::save($clasificacion_chequeLocal, $this->connexion);				
			}			
			
			/*clasificacion_cheque_logic_add::checkclasificacion_chequeToSavesAfter($this->clasificacion_cheques,$this->datosCliente,$this->connexion);*/			
			//$this->clasificacion_chequeLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->clasificacion_cheques,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				clasificacion_cheque_util::refrescarFKDescripciones($this->clasificacion_cheques);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $clasificacion_cheques,Connexion $connexion)  {
		$clasificacion_chequeLogic = new  clasificacion_cheque_logic();
		  		  
        try {		
			$clasificacion_chequeLogic->setConnexion($connexion);			
			$clasificacion_chequeLogic->setclasificacion_cheques($clasificacion_cheques);			
			$clasificacion_chequeLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$clasificacion_chequesAux=array();
		
		foreach($this->clasificacion_cheques as $clasificacion_cheque) {
			if($clasificacion_cheque->getIsDeleted()==false) {
				$clasificacion_chequesAux[]=$clasificacion_cheque;
			}
		}
		
		$this->clasificacion_cheques=$clasificacion_chequesAux;
	}
	
	public function updateToGetsAuxiliar(array &$clasificacion_cheques) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->clasificacion_cheques as $clasificacion_cheque) {
				
				$clasificacion_cheque->setid_cuenta_corriente_detalle_Descripcion(clasificacion_cheque_util::getcuenta_corriente_detalleDescripcion($clasificacion_cheque->getcuenta_corriente_detalle()));
				$clasificacion_cheque->setid_categoria_cheque_Descripcion(clasificacion_cheque_util::getcategoria_chequeDescripcion($clasificacion_cheque->getcategoria_cheque()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$clasificacion_cheque_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$clasificacion_cheque_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$clasificacion_cheque_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$clasificacion_cheque_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$clasificacion_cheque_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$clasificacion_chequeForeignKey=new clasificacion_cheque_param_return();//clasificacion_chequeForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_corriente_detalle',$strRecargarFkTipos,',')) {
				$this->cargarComboscuenta_corriente_detallesFK($this->connexion,$strRecargarFkQuery,$clasificacion_chequeForeignKey,$clasificacion_cheque_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_categoria_cheque',$strRecargarFkTipos,',')) {
				$this->cargarComboscategoria_chequesFK($this->connexion,$strRecargarFkQuery,$clasificacion_chequeForeignKey,$clasificacion_cheque_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cuenta_corriente_detalle',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscuenta_corriente_detallesFK($this->connexion,' where id=-1 ',$clasificacion_chequeForeignKey,$clasificacion_cheque_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_categoria_cheque',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscategoria_chequesFK($this->connexion,' where id=-1 ',$clasificacion_chequeForeignKey,$clasificacion_cheque_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $clasificacion_chequeForeignKey;
			
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
	
	
	public function cargarComboscuenta_corriente_detallesFK($connexion=null,$strRecargarFkQuery='',$clasificacion_chequeForeignKey,$clasificacion_cheque_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$cuenta_corriente_detalleLogic= new cuenta_corriente_detalle_logic();
		$pagination= new Pagination();
		$clasificacion_chequeForeignKey->cuenta_corriente_detallesFK=array();

		$cuenta_corriente_detalleLogic->setConnexion($connexion);
		$cuenta_corriente_detalleLogic->getcuenta_corriente_detalleDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($clasificacion_cheque_session==null) {
			$clasificacion_cheque_session=new clasificacion_cheque_session();
		}
		
		if($clasificacion_cheque_session->bitBusquedaDesdeFKSesioncuenta_corriente_detalle!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=cuenta_corriente_detalle_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalcuenta_corriente_detalle=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcuenta_corriente_detalle=Funciones::GetFinalQueryAppend($finalQueryGlobalcuenta_corriente_detalle, '');
				$finalQueryGlobalcuenta_corriente_detalle.=cuenta_corriente_detalle_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcuenta_corriente_detalle.$strRecargarFkQuery;		

				$cuenta_corriente_detalleLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($cuenta_corriente_detalleLogic->getcuenta_corriente_detalles() as $cuenta_corriente_detalleLocal ) {
				if($clasificacion_chequeForeignKey->idcuenta_corriente_detalleDefaultFK==0) {
					$clasificacion_chequeForeignKey->idcuenta_corriente_detalleDefaultFK=$cuenta_corriente_detalleLocal->getId();
				}

				$clasificacion_chequeForeignKey->cuenta_corriente_detallesFK[$cuenta_corriente_detalleLocal->getId()]=clasificacion_cheque_util::getcuenta_corriente_detalleDescripcion($cuenta_corriente_detalleLocal);
			}

		} else {

			if($clasificacion_cheque_session->bigidcuenta_corriente_detalleActual!=null && $clasificacion_cheque_session->bigidcuenta_corriente_detalleActual > 0) {
				$cuenta_corriente_detalleLogic->getEntity($clasificacion_cheque_session->bigidcuenta_corriente_detalleActual);//WithConnection

				$clasificacion_chequeForeignKey->cuenta_corriente_detallesFK[$cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->getId()]=clasificacion_cheque_util::getcuenta_corriente_detalleDescripcion($cuenta_corriente_detalleLogic->getcuenta_corriente_detalle());
				$clasificacion_chequeForeignKey->idcuenta_corriente_detalleDefaultFK=$cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->getId();
			}
		}
	}

	public function cargarComboscategoria_chequesFK($connexion=null,$strRecargarFkQuery='',$clasificacion_chequeForeignKey,$clasificacion_cheque_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$categoria_chequeLogic= new categoria_cheque_logic();
		$pagination= new Pagination();
		$clasificacion_chequeForeignKey->categoria_chequesFK=array();

		$categoria_chequeLogic->setConnexion($connexion);
		$categoria_chequeLogic->getcategoria_chequeDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($clasificacion_cheque_session==null) {
			$clasificacion_cheque_session=new clasificacion_cheque_session();
		}
		
		if($clasificacion_cheque_session->bitBusquedaDesdeFKSesioncategoria_cheque!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=categoria_cheque_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalcategoria_cheque=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcategoria_cheque=Funciones::GetFinalQueryAppend($finalQueryGlobalcategoria_cheque, '');
				$finalQueryGlobalcategoria_cheque.=categoria_cheque_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcategoria_cheque.$strRecargarFkQuery;		

				$categoria_chequeLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($categoria_chequeLogic->getcategoria_cheques() as $categoria_chequeLocal ) {
				if($clasificacion_chequeForeignKey->idcategoria_chequeDefaultFK==0) {
					$clasificacion_chequeForeignKey->idcategoria_chequeDefaultFK=$categoria_chequeLocal->getId();
				}

				$clasificacion_chequeForeignKey->categoria_chequesFK[$categoria_chequeLocal->getId()]=clasificacion_cheque_util::getcategoria_chequeDescripcion($categoria_chequeLocal);
			}

		} else {

			if($clasificacion_cheque_session->bigidcategoria_chequeActual!=null && $clasificacion_cheque_session->bigidcategoria_chequeActual > 0) {
				$categoria_chequeLogic->getEntity($clasificacion_cheque_session->bigidcategoria_chequeActual);//WithConnection

				$clasificacion_chequeForeignKey->categoria_chequesFK[$categoria_chequeLogic->getcategoria_cheque()->getId()]=clasificacion_cheque_util::getcategoria_chequeDescripcion($categoria_chequeLogic->getcategoria_cheque());
				$clasificacion_chequeForeignKey->idcategoria_chequeDefaultFK=$categoria_chequeLogic->getcategoria_cheque()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($clasificacion_cheque) {
		$this->saveRelacionesBase($clasificacion_cheque,true);
	}

	public function saveRelaciones($clasificacion_cheque) {
		$this->saveRelacionesBase($clasificacion_cheque,false);
	}

	public function saveRelacionesBase($clasificacion_cheque,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setclasificacion_cheque($clasificacion_cheque);

			if(true) {

				//clasificacion_cheque_logic_add::updateRelacionesToSave($clasificacion_cheque,$this);

				if(($this->clasificacion_cheque->getIsNew() || $this->clasificacion_cheque->getIsChanged()) && !$this->clasificacion_cheque->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->clasificacion_cheque->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//clasificacion_cheque_logic_add::updateRelacionesToSaveAfter($clasificacion_cheque,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $clasificacion_cheques,clasificacion_cheque_param_return $clasificacion_chequeParameterGeneral) : clasificacion_cheque_param_return {
		$clasificacion_chequeReturnGeneral=new clasificacion_cheque_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $clasificacion_chequeReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $clasificacion_cheques,clasificacion_cheque_param_return $clasificacion_chequeParameterGeneral) : clasificacion_cheque_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$clasificacion_chequeReturnGeneral=new clasificacion_cheque_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $clasificacion_chequeReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $clasificacion_cheques,clasificacion_cheque $clasificacion_cheque,clasificacion_cheque_param_return $clasificacion_chequeParameterGeneral,bool $isEsNuevoclasificacion_cheque,array $clases) : clasificacion_cheque_param_return {
		 try {	
			$clasificacion_chequeReturnGeneral=new clasificacion_cheque_param_return();
	
			$clasificacion_chequeReturnGeneral->setclasificacion_cheque($clasificacion_cheque);
			$clasificacion_chequeReturnGeneral->setclasificacion_cheques($clasificacion_cheques);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$clasificacion_chequeReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $clasificacion_chequeReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $clasificacion_cheques,clasificacion_cheque $clasificacion_cheque,clasificacion_cheque_param_return $clasificacion_chequeParameterGeneral,bool $isEsNuevoclasificacion_cheque,array $clases) : clasificacion_cheque_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$clasificacion_chequeReturnGeneral=new clasificacion_cheque_param_return();
	
			$clasificacion_chequeReturnGeneral->setclasificacion_cheque($clasificacion_cheque);
			$clasificacion_chequeReturnGeneral->setclasificacion_cheques($clasificacion_cheques);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$clasificacion_chequeReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $clasificacion_chequeReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $clasificacion_cheques,clasificacion_cheque $clasificacion_cheque,clasificacion_cheque_param_return $clasificacion_chequeParameterGeneral,bool $isEsNuevoclasificacion_cheque,array $clases) : clasificacion_cheque_param_return {
		 try {	
			$clasificacion_chequeReturnGeneral=new clasificacion_cheque_param_return();
	
			$clasificacion_chequeReturnGeneral->setclasificacion_cheque($clasificacion_cheque);
			$clasificacion_chequeReturnGeneral->setclasificacion_cheques($clasificacion_cheques);
			
			
			
			return $clasificacion_chequeReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $clasificacion_cheques,clasificacion_cheque $clasificacion_cheque,clasificacion_cheque_param_return $clasificacion_chequeParameterGeneral,bool $isEsNuevoclasificacion_cheque,array $clases) : clasificacion_cheque_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$clasificacion_chequeReturnGeneral=new clasificacion_cheque_param_return();
	
			$clasificacion_chequeReturnGeneral->setclasificacion_cheque($clasificacion_cheque);
			$clasificacion_chequeReturnGeneral->setclasificacion_cheques($clasificacion_cheques);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $clasificacion_chequeReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,clasificacion_cheque $clasificacion_cheque,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,clasificacion_cheque $clasificacion_cheque,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		clasificacion_cheque_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(clasificacion_cheque $clasificacion_cheque,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//clasificacion_cheque_logic_add::updateclasificacion_chequeToGet($this->clasificacion_cheque);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$clasificacion_cheque->setcuenta_corriente_detalle($this->clasificacion_chequeDataAccess->getcuenta_corriente_detalle($this->connexion,$clasificacion_cheque));
		$clasificacion_cheque->setcategoria_cheque($this->clasificacion_chequeDataAccess->getcategoria_cheque($this->connexion,$clasificacion_cheque));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente_detalle::$class.'') {
				$clasificacion_cheque->setcuenta_corriente_detalle($this->clasificacion_chequeDataAccess->getcuenta_corriente_detalle($this->connexion,$clasificacion_cheque));
				continue;
			}

			if($clas->clas==categoria_cheque::$class.'') {
				$clasificacion_cheque->setcategoria_cheque($this->clasificacion_chequeDataAccess->getcategoria_cheque($this->connexion,$clasificacion_cheque));
				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente_detalle::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clasificacion_cheque->setcuenta_corriente_detalle($this->clasificacion_chequeDataAccess->getcuenta_corriente_detalle($this->connexion,$clasificacion_cheque));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==categoria_cheque::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clasificacion_cheque->setcategoria_cheque($this->clasificacion_chequeDataAccess->getcategoria_cheque($this->connexion,$clasificacion_cheque));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$clasificacion_cheque->setcuenta_corriente_detalle($this->clasificacion_chequeDataAccess->getcuenta_corriente_detalle($this->connexion,$clasificacion_cheque));
		$cuenta_corriente_detalleLogic= new cuenta_corriente_detalle_logic($this->connexion);
		$cuenta_corriente_detalleLogic->deepLoad($clasificacion_cheque->getcuenta_corriente_detalle(),$isDeep,$deepLoadType,$clases);
				
		$clasificacion_cheque->setcategoria_cheque($this->clasificacion_chequeDataAccess->getcategoria_cheque($this->connexion,$clasificacion_cheque));
		$categoria_chequeLogic= new categoria_cheque_logic($this->connexion);
		$categoria_chequeLogic->deepLoad($clasificacion_cheque->getcategoria_cheque(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente_detalle::$class.'') {
				$clasificacion_cheque->setcuenta_corriente_detalle($this->clasificacion_chequeDataAccess->getcuenta_corriente_detalle($this->connexion,$clasificacion_cheque));
				$cuenta_corriente_detalleLogic= new cuenta_corriente_detalle_logic($this->connexion);
				$cuenta_corriente_detalleLogic->deepLoad($clasificacion_cheque->getcuenta_corriente_detalle(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==categoria_cheque::$class.'') {
				$clasificacion_cheque->setcategoria_cheque($this->clasificacion_chequeDataAccess->getcategoria_cheque($this->connexion,$clasificacion_cheque));
				$categoria_chequeLogic= new categoria_cheque_logic($this->connexion);
				$categoria_chequeLogic->deepLoad($clasificacion_cheque->getcategoria_cheque(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente_detalle::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clasificacion_cheque->setcuenta_corriente_detalle($this->clasificacion_chequeDataAccess->getcuenta_corriente_detalle($this->connexion,$clasificacion_cheque));
			$cuenta_corriente_detalleLogic= new cuenta_corriente_detalle_logic($this->connexion);
			$cuenta_corriente_detalleLogic->deepLoad($clasificacion_cheque->getcuenta_corriente_detalle(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==categoria_cheque::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clasificacion_cheque->setcategoria_cheque($this->clasificacion_chequeDataAccess->getcategoria_cheque($this->connexion,$clasificacion_cheque));
			$categoria_chequeLogic= new categoria_cheque_logic($this->connexion);
			$categoria_chequeLogic->deepLoad($clasificacion_cheque->getcategoria_cheque(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(clasificacion_cheque $clasificacion_cheque,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//clasificacion_cheque_logic_add::updateclasificacion_chequeToSave($this->clasificacion_cheque);			
			
			if(!$paraDeleteCascade) {				
				clasificacion_cheque_data::save($clasificacion_cheque, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		cuenta_corriente_detalle_data::save($clasificacion_cheque->getcuenta_corriente_detalle(),$this->connexion);
		categoria_cheque_data::save($clasificacion_cheque->getcategoria_cheque(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente_detalle::$class.'') {
				cuenta_corriente_detalle_data::save($clasificacion_cheque->getcuenta_corriente_detalle(),$this->connexion);
				continue;
			}

			if($clas->clas==categoria_cheque::$class.'') {
				categoria_cheque_data::save($clasificacion_cheque->getcategoria_cheque(),$this->connexion);
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente_detalle::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_corriente_detalle_data::save($clasificacion_cheque->getcuenta_corriente_detalle(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==categoria_cheque::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			categoria_cheque_data::save($clasificacion_cheque->getcategoria_cheque(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		cuenta_corriente_detalle_data::save($clasificacion_cheque->getcuenta_corriente_detalle(),$this->connexion);
		$cuenta_corriente_detalleLogic= new cuenta_corriente_detalle_logic($this->connexion);
		$cuenta_corriente_detalleLogic->deepSave($clasificacion_cheque->getcuenta_corriente_detalle(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		categoria_cheque_data::save($clasificacion_cheque->getcategoria_cheque(),$this->connexion);
		$categoria_chequeLogic= new categoria_cheque_logic($this->connexion);
		$categoria_chequeLogic->deepSave($clasificacion_cheque->getcategoria_cheque(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente_detalle::$class.'') {
				cuenta_corriente_detalle_data::save($clasificacion_cheque->getcuenta_corriente_detalle(),$this->connexion);
				$cuenta_corriente_detalleLogic= new cuenta_corriente_detalle_logic($this->connexion);
				$cuenta_corriente_detalleLogic->deepSave($clasificacion_cheque->getcuenta_corriente_detalle(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==categoria_cheque::$class.'') {
				categoria_cheque_data::save($clasificacion_cheque->getcategoria_cheque(),$this->connexion);
				$categoria_chequeLogic= new categoria_cheque_logic($this->connexion);
				$categoria_chequeLogic->deepSave($clasificacion_cheque->getcategoria_cheque(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente_detalle::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_corriente_detalle_data::save($clasificacion_cheque->getcuenta_corriente_detalle(),$this->connexion);
			$cuenta_corriente_detalleLogic= new cuenta_corriente_detalle_logic($this->connexion);
			$cuenta_corriente_detalleLogic->deepSave($clasificacion_cheque->getcuenta_corriente_detalle(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==categoria_cheque::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			categoria_cheque_data::save($clasificacion_cheque->getcategoria_cheque(),$this->connexion);
			$categoria_chequeLogic= new categoria_cheque_logic($this->connexion);
			$categoria_chequeLogic->deepSave($clasificacion_cheque->getcategoria_cheque(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				clasificacion_cheque_data::save($clasificacion_cheque, $this->connexion);
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
			
			$this->deepLoad($this->clasificacion_cheque,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->clasificacion_cheques as $clasificacion_cheque) {
				$this->deepLoad($clasificacion_cheque,$isDeep,$deepLoadType,$clases);
								
				clasificacion_cheque_util::refrescarFKDescripciones($this->clasificacion_cheques);
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
			
			foreach($this->clasificacion_cheques as $clasificacion_cheque) {
				$this->deepLoad($clasificacion_cheque,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->clasificacion_cheque,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->clasificacion_cheques as $clasificacion_cheque) {
				$this->deepSave($clasificacion_cheque,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->clasificacion_cheques as $clasificacion_cheque) {
				$this->deepSave($clasificacion_cheque,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(cuenta_corriente_detalle::$class);
				$classes[]=new Classe(categoria_cheque::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==cuenta_corriente_detalle::$class) {
						$classes[]=new Classe(cuenta_corriente_detalle::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==categoria_cheque::$class) {
						$classes[]=new Classe(categoria_cheque::$class);
					}
				}

			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==cuenta_corriente_detalle::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta_corriente_detalle::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==categoria_cheque::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(categoria_cheque::$class);
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
	
	
	
	
	
	
	
	public function getclasificacion_cheque() : ?clasificacion_cheque {	
		/*
		clasificacion_cheque_logic_add::checkclasificacion_chequeToGet($this->clasificacion_cheque,$this->datosCliente);
		clasificacion_cheque_logic_add::updateclasificacion_chequeToGet($this->clasificacion_cheque);
		*/
			
		return $this->clasificacion_cheque;
	}
		
	public function setclasificacion_cheque(clasificacion_cheque $newclasificacion_cheque) {
		$this->clasificacion_cheque = $newclasificacion_cheque;
	}
	
	public function getclasificacion_cheques() : array {		
		/*
		clasificacion_cheque_logic_add::checkclasificacion_chequeToGets($this->clasificacion_cheques,$this->datosCliente);
		
		foreach ($this->clasificacion_cheques as $clasificacion_chequeLocal ) {
			clasificacion_cheque_logic_add::updateclasificacion_chequeToGet($clasificacion_chequeLocal);
		}
		*/
		
		return $this->clasificacion_cheques;
	}
	
	public function setclasificacion_cheques(array $newclasificacion_cheques) {
		$this->clasificacion_cheques = $newclasificacion_cheques;
	}
	
	public function getclasificacion_chequeDataAccess() : clasificacion_cheque_data {
		return $this->clasificacion_chequeDataAccess;
	}
	
	public function setclasificacion_chequeDataAccess(clasificacion_cheque_data $newclasificacion_chequeDataAccess) {
		$this->clasificacion_chequeDataAccess = $newclasificacion_chequeDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        clasificacion_cheque_carga::$CONTROLLER;;        
		
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
