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

namespace com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\util\estado_deposito_retiro_carga;
use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\util\estado_deposito_retiro_param_return;


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

use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\util\estado_deposito_retiro_util;
use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\business\entity\estado_deposito_retiro;
use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\business\data\estado_deposito_retiro_data;

//FK


//REL


//REL DETALLES




class estado_deposito_retiro_logic  extends GeneralEntityLogic implements estado_deposito_retiro_logicI {	
	/*GENERAL*/
	public estado_deposito_retiro_data $estado_deposito_retiroDataAccess;
	public ?estado_deposito_retiro_logic_add $estado_deposito_retiroLogicAdditional=null;
	public ?estado_deposito_retiro $estado_deposito_retiro;
	public array $estado_deposito_retiros;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->estado_deposito_retiroDataAccess = new estado_deposito_retiro_data();			
			$this->estado_deposito_retiros = array();
			$this->estado_deposito_retiro = new estado_deposito_retiro();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->estado_deposito_retiroLogicAdditional = new estado_deposito_retiro_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		if($this->estado_deposito_retiroLogicAdditional==null) {
			$this->estado_deposito_retiroLogicAdditional=new estado_deposito_retiro_logic_add();
		}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->estado_deposito_retiroDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->estado_deposito_retiroDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->estado_deposito_retiroDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->estado_deposito_retiroDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->estado_deposito_retiros = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estado_deposito_retiros=$this->estado_deposito_retiroDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_deposito_retiro_util::refrescarFKDescripciones($this->estado_deposito_retiros);
			}
			
			estado_deposito_retiro_logic_add::checkestado_deposito_retiroToGets($this->estado_deposito_retiros,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_deposito_retiros);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->estado_deposito_retiros = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estado_deposito_retiros=$this->estado_deposito_retiroDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_deposito_retiro_util::refrescarFKDescripciones($this->estado_deposito_retiros);
			}
			
			estado_deposito_retiro_logic_add::checkestado_deposito_retiroToGets($this->estado_deposito_retiros,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_deposito_retiros);
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
		$this->estado_deposito_retiro = new estado_deposito_retiro();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->estado_deposito_retiro=$this->estado_deposito_retiroDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->estado_deposito_retiro,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				estado_deposito_retiro_util::refrescarFKDescripcion($this->estado_deposito_retiro);
			}
						
			estado_deposito_retiro_logic_add::checkestado_deposito_retiroToGet($this->estado_deposito_retiro,$this->datosCliente);
			estado_deposito_retiro_logic_add::updateestado_deposito_retiroToGet($this->estado_deposito_retiro);
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
		$this->estado_deposito_retiro = new  estado_deposito_retiro();
		  		  
        try {		
			$this->estado_deposito_retiro=$this->estado_deposito_retiroDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->estado_deposito_retiro,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				estado_deposito_retiro_util::refrescarFKDescripcion($this->estado_deposito_retiro);
			}
			
			estado_deposito_retiro_logic_add::checkestado_deposito_retiroToGet($this->estado_deposito_retiro,$this->datosCliente);
			estado_deposito_retiro_logic_add::updateestado_deposito_retiroToGet($this->estado_deposito_retiro);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?estado_deposito_retiro {
		$estado_deposito_retiroLogic = new  estado_deposito_retiro_logic();
		  		  
        try {		
			$estado_deposito_retiroLogic->setConnexion($connexion);			
			$estado_deposito_retiroLogic->getEntity($id);			
			return $estado_deposito_retiroLogic->getestado_deposito_retiro();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->estado_deposito_retiro = new  estado_deposito_retiro();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->estado_deposito_retiro=$this->estado_deposito_retiroDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->estado_deposito_retiro,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				estado_deposito_retiro_util::refrescarFKDescripcion($this->estado_deposito_retiro);
			}
			
			estado_deposito_retiro_logic_add::checkestado_deposito_retiroToGet($this->estado_deposito_retiro,$this->datosCliente);
			estado_deposito_retiro_logic_add::updateestado_deposito_retiroToGet($this->estado_deposito_retiro);
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
		$this->estado_deposito_retiro = new  estado_deposito_retiro();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estado_deposito_retiro=$this->estado_deposito_retiroDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->estado_deposito_retiro,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				estado_deposito_retiro_util::refrescarFKDescripcion($this->estado_deposito_retiro);
			}
			
			estado_deposito_retiro_logic_add::checkestado_deposito_retiroToGet($this->estado_deposito_retiro,$this->datosCliente);
			estado_deposito_retiro_logic_add::updateestado_deposito_retiroToGet($this->estado_deposito_retiro);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?estado_deposito_retiro {
		$estado_deposito_retiroLogic = new  estado_deposito_retiro_logic();
		  		  
        try {		
			$estado_deposito_retiroLogic->setConnexion($connexion);			
			$estado_deposito_retiroLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $estado_deposito_retiroLogic->getestado_deposito_retiro();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->estado_deposito_retiros = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->estado_deposito_retiros=$this->estado_deposito_retiroDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_deposito_retiro_util::refrescarFKDescripciones($this->estado_deposito_retiros);
			}
			
			estado_deposito_retiro_logic_add::checkestado_deposito_retiroToGets($this->estado_deposito_retiros,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_deposito_retiros);			
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
		$this->estado_deposito_retiros = array();
		  		  
        try {			
			$this->estado_deposito_retiros=$this->estado_deposito_retiroDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_deposito_retiro_util::refrescarFKDescripciones($this->estado_deposito_retiros);
			}
			
			estado_deposito_retiro_logic_add::checkestado_deposito_retiroToGets($this->estado_deposito_retiros,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_deposito_retiros);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->estado_deposito_retiros = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estado_deposito_retiros=$this->estado_deposito_retiroDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_deposito_retiro_util::refrescarFKDescripciones($this->estado_deposito_retiros);
			}
			
			estado_deposito_retiro_logic_add::checkestado_deposito_retiroToGets($this->estado_deposito_retiros,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_deposito_retiros);
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
		$this->estado_deposito_retiros = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estado_deposito_retiros=$this->estado_deposito_retiroDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_deposito_retiro_util::refrescarFKDescripciones($this->estado_deposito_retiros);
			}
			
			estado_deposito_retiro_logic_add::checkestado_deposito_retiroToGets($this->estado_deposito_retiros,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_deposito_retiros);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$estado_deposito_retiroLogic = new  estado_deposito_retiro_logic();
		  		  
        try {		
			$estado_deposito_retiroLogic->setConnexion($connexion);			
			$estado_deposito_retiroLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $estado_deposito_retiroLogic->getestado_deposito_retiros();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->estado_deposito_retiros = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->estado_deposito_retiros=$this->estado_deposito_retiroDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_deposito_retiro_util::refrescarFKDescripciones($this->estado_deposito_retiros);
			}
			
			estado_deposito_retiro_logic_add::checkestado_deposito_retiroToGets($this->estado_deposito_retiros,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_deposito_retiros);
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
		$this->estado_deposito_retiros = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estado_deposito_retiros=$this->estado_deposito_retiroDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_deposito_retiro_util::refrescarFKDescripciones($this->estado_deposito_retiros);
			}
			
			estado_deposito_retiro_logic_add::checkestado_deposito_retiroToGets($this->estado_deposito_retiros,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_deposito_retiros);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->estado_deposito_retiros = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estado_deposito_retiros=$this->estado_deposito_retiroDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_deposito_retiro_util::refrescarFKDescripciones($this->estado_deposito_retiros);
			}
			
			estado_deposito_retiro_logic_add::checkestado_deposito_retiroToGets($this->estado_deposito_retiros,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_deposito_retiros);
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
		$this->estado_deposito_retiros = array();
		  		  
        try {			
			$this->estado_deposito_retiros=$this->estado_deposito_retiroDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_deposito_retiro_util::refrescarFKDescripciones($this->estado_deposito_retiros);
			}	
			
			estado_deposito_retiro_logic_add::checkestado_deposito_retiroToGets($this->estado_deposito_retiros,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_deposito_retiros);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->estado_deposito_retiros = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->estado_deposito_retiros=$this->estado_deposito_retiroDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_deposito_retiro_util::refrescarFKDescripciones($this->estado_deposito_retiros);
			}
			
			estado_deposito_retiro_logic_add::checkestado_deposito_retiroToGets($this->estado_deposito_retiros,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_deposito_retiros);
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
		$this->estado_deposito_retiros = array();
		  		  
        try {		
			$this->estado_deposito_retiros=$this->estado_deposito_retiroDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_deposito_retiro_util::refrescarFKDescripciones($this->estado_deposito_retiros);
			}
			
			estado_deposito_retiro_logic_add::checkestado_deposito_retiroToGets($this->estado_deposito_retiros,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_deposito_retiros);

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
						
			//estado_deposito_retiro_logic_add::checkestado_deposito_retiroToSave($this->estado_deposito_retiro,$this->datosCliente,$this->connexion);	       
			estado_deposito_retiro_logic_add::updateestado_deposito_retiroToSave($this->estado_deposito_retiro);			
			estado_deposito_retiro_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->estado_deposito_retiro,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			$this->estado_deposito_retiroLogicAdditional->checkGeneralEntityToSave($this,$this->estado_deposito_retiro,$this->datosCliente,$this->connexion);
			
			
			estado_deposito_retiro_data::save($this->estado_deposito_retiro, $this->connexion);	    	       	 				
			//estado_deposito_retiro_logic_add::checkestado_deposito_retiroToSaveAfter($this->estado_deposito_retiro,$this->datosCliente,$this->connexion);			
			$this->estado_deposito_retiroLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->estado_deposito_retiro,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->estado_deposito_retiro,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->estado_deposito_retiro,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				estado_deposito_retiro_util::refrescarFKDescripcion($this->estado_deposito_retiro);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->estado_deposito_retiro->getIsDeleted()) {
				$this->estado_deposito_retiro=null;
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
						
			/*estado_deposito_retiro_logic_add::checkestado_deposito_retiroToSave($this->estado_deposito_retiro,$this->datosCliente,$this->connexion);*/	        
			estado_deposito_retiro_logic_add::updateestado_deposito_retiroToSave($this->estado_deposito_retiro);			
			$this->estado_deposito_retiroLogicAdditional->checkGeneralEntityToSave($this,$this->estado_deposito_retiro,$this->datosCliente,$this->connexion);			
			estado_deposito_retiro_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->estado_deposito_retiro,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			estado_deposito_retiro_data::save($this->estado_deposito_retiro, $this->connexion);	    	       	 						
			/*estado_deposito_retiro_logic_add::checkestado_deposito_retiroToSaveAfter($this->estado_deposito_retiro,$this->datosCliente,$this->connexion);*/			
			$this->estado_deposito_retiroLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->estado_deposito_retiro,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->estado_deposito_retiro,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->estado_deposito_retiro,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				estado_deposito_retiro_util::refrescarFKDescripcion($this->estado_deposito_retiro);				
			}
			
			if($this->estado_deposito_retiro->getIsDeleted()) {
				$this->estado_deposito_retiro=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(estado_deposito_retiro $estado_deposito_retiro,Connexion $connexion)  {
		$estado_deposito_retiroLogic = new  estado_deposito_retiro_logic();		  		  
        try {		
			$estado_deposito_retiroLogic->setConnexion($connexion);			
			$estado_deposito_retiroLogic->setestado_deposito_retiro($estado_deposito_retiro);			
			$estado_deposito_retiroLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*estado_deposito_retiro_logic_add::checkestado_deposito_retiroToSaves($this->estado_deposito_retiros,$this->datosCliente,$this->connexion);*/	        	
			$this->estado_deposito_retiroLogicAdditional->checkGeneralEntitiesToSaves($this,$this->estado_deposito_retiros,$this->datosCliente,$this->connexion);
			
	   		foreach($this->estado_deposito_retiros as $estado_deposito_retiroLocal) {				
								
				estado_deposito_retiro_logic_add::updateestado_deposito_retiroToSave($estado_deposito_retiroLocal);	        	
				estado_deposito_retiro_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$estado_deposito_retiroLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				estado_deposito_retiro_data::save($estado_deposito_retiroLocal, $this->connexion);				
			}
			
			/*estado_deposito_retiro_logic_add::checkestado_deposito_retiroToSavesAfter($this->estado_deposito_retiros,$this->datosCliente,$this->connexion);*/			
			$this->estado_deposito_retiroLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->estado_deposito_retiros,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_deposito_retiro_util::refrescarFKDescripciones($this->estado_deposito_retiros);
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
			/*estado_deposito_retiro_logic_add::checkestado_deposito_retiroToSaves($this->estado_deposito_retiros,$this->datosCliente,$this->connexion);*/			
			$this->estado_deposito_retiroLogicAdditional->checkGeneralEntitiesToSaves($this,$this->estado_deposito_retiros,$this->datosCliente,$this->connexion);
			
	   		foreach($this->estado_deposito_retiros as $estado_deposito_retiroLocal) {				
								
				estado_deposito_retiro_logic_add::updateestado_deposito_retiroToSave($estado_deposito_retiroLocal);	        	
				estado_deposito_retiro_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$estado_deposito_retiroLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				estado_deposito_retiro_data::save($estado_deposito_retiroLocal, $this->connexion);				
			}			
			
			/*estado_deposito_retiro_logic_add::checkestado_deposito_retiroToSavesAfter($this->estado_deposito_retiros,$this->datosCliente,$this->connexion);*/			
			$this->estado_deposito_retiroLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->estado_deposito_retiros,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_deposito_retiro_util::refrescarFKDescripciones($this->estado_deposito_retiros);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $estado_deposito_retiros,Connexion $connexion)  {
		$estado_deposito_retiroLogic = new  estado_deposito_retiro_logic();
		  		  
        try {		
			$estado_deposito_retiroLogic->setConnexion($connexion);			
			$estado_deposito_retiroLogic->setestado_deposito_retiros($estado_deposito_retiros);			
			$estado_deposito_retiroLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$estado_deposito_retirosAux=array();
		
		foreach($this->estado_deposito_retiros as $estado_deposito_retiro) {
			if($estado_deposito_retiro->getIsDeleted()==false) {
				$estado_deposito_retirosAux[]=$estado_deposito_retiro;
			}
		}
		
		$this->estado_deposito_retiros=$estado_deposito_retirosAux;
	}
	
	public function updateToGetsAuxiliar(array &$estado_deposito_retiros) {
		if($this->estado_deposito_retiroLogicAdditional==null) {
			$this->estado_deposito_retiroLogicAdditional=new estado_deposito_retiro_logic_add();
		}
		
		
		$this->estado_deposito_retiroLogicAdditional->updateToGets($estado_deposito_retiros,$this);					
		$this->estado_deposito_retiroLogicAdditional->updateToGetsReferencia($estado_deposito_retiros,$this);			
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
	
	
	
	public function saveRelacionesWithConnection($estado_deposito_retiro) {
		$this->saveRelacionesBase($estado_deposito_retiro,true);
	}

	public function saveRelaciones($estado_deposito_retiro) {
		$this->saveRelacionesBase($estado_deposito_retiro,false);
	}

	public function saveRelacionesBase($estado_deposito_retiro,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setestado_deposito_retiro($estado_deposito_retiro);

				if(($this->estado_deposito_retiro->getIsNew() || $this->estado_deposito_retiro->getIsChanged()) && !$this->estado_deposito_retiro->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->estado_deposito_retiro->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $estado_deposito_retiros,estado_deposito_retiro_param_return $estado_deposito_retiroParameterGeneral) : estado_deposito_retiro_param_return {
		$estado_deposito_retiroReturnGeneral=new estado_deposito_retiro_param_return();
	
		 try {	
			
			if($this->estado_deposito_retiroLogicAdditional==null) {
				$this->estado_deposito_retiroLogicAdditional=new estado_deposito_retiro_logic_add();
			}
			
			$this->estado_deposito_retiroLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$sProceso,$estado_deposito_retiros,$estado_deposito_retiroParameterGeneral,$estado_deposito_retiroReturnGeneral);
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $estado_deposito_retiroReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $estado_deposito_retiros,estado_deposito_retiro_param_return $estado_deposito_retiroParameterGeneral) : estado_deposito_retiro_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$estado_deposito_retiroReturnGeneral=new estado_deposito_retiro_param_return();
	
			
			if($this->estado_deposito_retiroLogicAdditional==null) {
				$this->estado_deposito_retiroLogicAdditional=new estado_deposito_retiro_logic_add();
			}
			
			$this->estado_deposito_retiroLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$strProceso,$estado_deposito_retiros,$estado_deposito_retiroParameterGeneral,$estado_deposito_retiroReturnGeneral);
			
			$this->connexion->getConnection()->commit();			
			
			return $estado_deposito_retiroReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $estado_deposito_retiros,estado_deposito_retiro $estado_deposito_retiro,estado_deposito_retiro_param_return $estado_deposito_retiroParameterGeneral,bool $isEsNuevoestado_deposito_retiro,array $clases) : estado_deposito_retiro_param_return {
		 try {	
			$estado_deposito_retiroReturnGeneral=new estado_deposito_retiro_param_return();
	
			$estado_deposito_retiroReturnGeneral->setestado_deposito_retiro($estado_deposito_retiro);
			$estado_deposito_retiroReturnGeneral->setestado_deposito_retiros($estado_deposito_retiros);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$estado_deposito_retiroReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			if($this->estado_deposito_retiroLogicAdditional==null) {
				$this->estado_deposito_retiroLogicAdditional=new estado_deposito_retiro_logic_add();
			}
			
			$estado_deposito_retiroReturnGeneral=$this->estado_deposito_retiroLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$estado_deposito_retiros,$estado_deposito_retiro,$estado_deposito_retiroParameterGeneral,$estado_deposito_retiroReturnGeneral,$isEsNuevoestado_deposito_retiro,$clases);
			
			/*estado_deposito_retiroLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$estado_deposito_retiros,$estado_deposito_retiro,$estado_deposito_retiroParameterGeneral,$estado_deposito_retiroReturnGeneral,$isEsNuevoestado_deposito_retiro,$clases);*/
			
			return $estado_deposito_retiroReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $estado_deposito_retiros,estado_deposito_retiro $estado_deposito_retiro,estado_deposito_retiro_param_return $estado_deposito_retiroParameterGeneral,bool $isEsNuevoestado_deposito_retiro,array $clases) : estado_deposito_retiro_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$estado_deposito_retiroReturnGeneral=new estado_deposito_retiro_param_return();
	
			$estado_deposito_retiroReturnGeneral->setestado_deposito_retiro($estado_deposito_retiro);
			$estado_deposito_retiroReturnGeneral->setestado_deposito_retiros($estado_deposito_retiros);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$estado_deposito_retiroReturnGeneral->setConRecargarPropiedades(true);
			}
			
			if($this->estado_deposito_retiroLogicAdditional==null) {
				$this->estado_deposito_retiroLogicAdditional=new estado_deposito_retiro_logic_add();
			}
			
			$estado_deposito_retiroReturnGeneral=$this->estado_deposito_retiroLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$estado_deposito_retiros,$estado_deposito_retiro,$estado_deposito_retiroParameterGeneral,$estado_deposito_retiroReturnGeneral,$isEsNuevoestado_deposito_retiro,$clases);
			
			/*estado_deposito_retiroLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$estado_deposito_retiros,$estado_deposito_retiro,$estado_deposito_retiroParameterGeneral,$estado_deposito_retiroReturnGeneral,$isEsNuevoestado_deposito_retiro,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $estado_deposito_retiroReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $estado_deposito_retiros,estado_deposito_retiro $estado_deposito_retiro,estado_deposito_retiro_param_return $estado_deposito_retiroParameterGeneral,bool $isEsNuevoestado_deposito_retiro,array $clases) : estado_deposito_retiro_param_return {
		 try {	
			$estado_deposito_retiroReturnGeneral=new estado_deposito_retiro_param_return();
	
			$estado_deposito_retiroReturnGeneral->setestado_deposito_retiro($estado_deposito_retiro);
			$estado_deposito_retiroReturnGeneral->setestado_deposito_retiros($estado_deposito_retiros);
			
			
			
			if($this->estado_deposito_retiroLogicAdditional==null) {
				$this->estado_deposito_retiroLogicAdditional=new estado_deposito_retiro_logic_add();
			}
			
			$estado_deposito_retiroReturnGeneral=$this->estado_deposito_retiroLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$estado_deposito_retiros,$estado_deposito_retiro,$estado_deposito_retiroParameterGeneral,$estado_deposito_retiroReturnGeneral,$isEsNuevoestado_deposito_retiro,$clases);
			
			/*estado_deposito_retiroLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$estado_deposito_retiros,$estado_deposito_retiro,$estado_deposito_retiroParameterGeneral,$estado_deposito_retiroReturnGeneral,$isEsNuevoestado_deposito_retiro,$clases);*/
			
			return $estado_deposito_retiroReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $estado_deposito_retiros,estado_deposito_retiro $estado_deposito_retiro,estado_deposito_retiro_param_return $estado_deposito_retiroParameterGeneral,bool $isEsNuevoestado_deposito_retiro,array $clases) : estado_deposito_retiro_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$estado_deposito_retiroReturnGeneral=new estado_deposito_retiro_param_return();
	
			$estado_deposito_retiroReturnGeneral->setestado_deposito_retiro($estado_deposito_retiro);
			$estado_deposito_retiroReturnGeneral->setestado_deposito_retiros($estado_deposito_retiros);
			
			
			if($this->estado_deposito_retiroLogicAdditional==null) {
				$this->estado_deposito_retiroLogicAdditional=new estado_deposito_retiro_logic_add();
			}
			
			$estado_deposito_retiroReturnGeneral=$this->estado_deposito_retiroLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$estado_deposito_retiros,$estado_deposito_retiro,$estado_deposito_retiroParameterGeneral,$estado_deposito_retiroReturnGeneral,$isEsNuevoestado_deposito_retiro,$clases);
			
			/*estado_deposito_retiroLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$estado_deposito_retiros,$estado_deposito_retiro,$estado_deposito_retiroParameterGeneral,$estado_deposito_retiroReturnGeneral,$isEsNuevoestado_deposito_retiro,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $estado_deposito_retiroReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,estado_deposito_retiro $estado_deposito_retiro,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,estado_deposito_retiro $estado_deposito_retiro,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		estado_deposito_retiro_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(estado_deposito_retiro $estado_deposito_retiro,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			estado_deposito_retiro_logic_add::updateestado_deposito_retiroToGet($this->estado_deposito_retiro);
			
			
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(estado_deposito_retiro $estado_deposito_retiro,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			estado_deposito_retiro_logic_add::updateestado_deposito_retiroToSave($this->estado_deposito_retiro);			
			
			if(!$paraDeleteCascade) {				
				estado_deposito_retiro_data::save($estado_deposito_retiro, $this->connexion);
			}
			
			
			
			if($paraDeleteCascade) {				
				estado_deposito_retiro_data::save($estado_deposito_retiro, $this->connexion);
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
			
			$this->deepLoad($this->estado_deposito_retiro,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->estado_deposito_retiros as $estado_deposito_retiro) {
				$this->deepLoad($estado_deposito_retiro,$isDeep,$deepLoadType,$clases);
								
				estado_deposito_retiro_util::refrescarFKDescripciones($this->estado_deposito_retiros);
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
			
			foreach($this->estado_deposito_retiros as $estado_deposito_retiro) {
				$this->deepLoad($estado_deposito_retiro,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->estado_deposito_retiro,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->estado_deposito_retiros as $estado_deposito_retiro) {
				$this->deepSave($estado_deposito_retiro,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->estado_deposito_retiros as $estado_deposito_retiro) {
				$this->deepSave($estado_deposito_retiro,$isDeep,$deepLoadType,$clases,false);
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
	
	
	
	
	
	
	
	public function getestado_deposito_retiro() : ?estado_deposito_retiro {	
		/*
		estado_deposito_retiro_logic_add::checkestado_deposito_retiroToGet($this->estado_deposito_retiro,$this->datosCliente);
		estado_deposito_retiro_logic_add::updateestado_deposito_retiroToGet($this->estado_deposito_retiro);
		*/
			
		return $this->estado_deposito_retiro;
	}
		
	public function setestado_deposito_retiro(estado_deposito_retiro $newestado_deposito_retiro) {
		$this->estado_deposito_retiro = $newestado_deposito_retiro;
	}
	
	public function getestado_deposito_retiros() : array {		
		/*
		estado_deposito_retiro_logic_add::checkestado_deposito_retiroToGets($this->estado_deposito_retiros,$this->datosCliente);
		
		foreach ($this->estado_deposito_retiros as $estado_deposito_retiroLocal ) {
			estado_deposito_retiro_logic_add::updateestado_deposito_retiroToGet($estado_deposito_retiroLocal);
		}
		*/
		
		return $this->estado_deposito_retiros;
	}
	
	public function setestado_deposito_retiros(array $newestado_deposito_retiros) {
		$this->estado_deposito_retiros = $newestado_deposito_retiros;
	}
	
	public function getestado_deposito_retiroDataAccess() : estado_deposito_retiro_data {
		return $this->estado_deposito_retiroDataAccess;
	}
	
	public function setestado_deposito_retiroDataAccess(estado_deposito_retiro_data $newestado_deposito_retiroDataAccess) {
		$this->estado_deposito_retiroDataAccess = $newestado_deposito_retiroDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        estado_deposito_retiro_carga::$CONTROLLER;;        
		
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
