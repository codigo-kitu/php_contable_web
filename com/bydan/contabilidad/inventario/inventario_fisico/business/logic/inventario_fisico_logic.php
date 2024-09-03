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

namespace com\bydan\contabilidad\inventario\inventario_fisico\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\inventario\inventario_fisico\util\inventario_fisico_carga;
use com\bydan\contabilidad\inventario\inventario_fisico\util\inventario_fisico_param_return;

use com\bydan\contabilidad\inventario\inventario_fisico\presentation\session\inventario_fisico_session;

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

use com\bydan\contabilidad\inventario\inventario_fisico\util\inventario_fisico_util;
use com\bydan\contabilidad\inventario\inventario_fisico\business\entity\inventario_fisico;
use com\bydan\contabilidad\inventario\inventario_fisico\business\data\inventario_fisico_data;

//FK


use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;
use com\bydan\contabilidad\inventario\bodega\business\data\bodega_data;
use com\bydan\contabilidad\inventario\bodega\business\logic\bodega_logic;
use com\bydan\contabilidad\inventario\bodega\util\bodega_util;

//REL


use com\bydan\contabilidad\inventario\inventario_fisico_detalle\business\entity\inventario_fisico_detalle;
use com\bydan\contabilidad\inventario\inventario_fisico_detalle\business\data\inventario_fisico_detalle_data;
use com\bydan\contabilidad\inventario\inventario_fisico_detalle\business\logic\inventario_fisico_detalle_logic;
use com\bydan\contabilidad\inventario\inventario_fisico_detalle\util\inventario_fisico_detalle_carga;
use com\bydan\contabilidad\inventario\inventario_fisico_detalle\util\inventario_fisico_detalle_util;

//REL DETALLES




class inventario_fisico_logic  extends GeneralEntityLogic implements inventario_fisico_logicI {	
	/*GENERAL*/
	public inventario_fisico_data $inventario_fisicoDataAccess;
	//public ?inventario_fisico_logic_add $inventario_fisicoLogicAdditional=null;
	public ?inventario_fisico $inventario_fisico;
	public array $inventario_fisicos;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->inventario_fisicoDataAccess = new inventario_fisico_data();			
			$this->inventario_fisicos = array();
			$this->inventario_fisico = new inventario_fisico();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->inventario_fisicoLogicAdditional = new inventario_fisico_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->inventario_fisicoLogicAdditional==null) {
		//	$this->inventario_fisicoLogicAdditional=new inventario_fisico_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->inventario_fisicoDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->inventario_fisicoDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->inventario_fisicoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->inventario_fisicoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->inventario_fisicos = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->inventario_fisicos=$this->inventario_fisicoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				inventario_fisico_util::refrescarFKDescripciones($this->inventario_fisicos);
			}
			
			//inventario_fisico_logic_add::checkinventario_fisicoToGets($this->inventario_fisicos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->inventario_fisicos);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->inventario_fisicos = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->inventario_fisicos=$this->inventario_fisicoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				inventario_fisico_util::refrescarFKDescripciones($this->inventario_fisicos);
			}
			
			//inventario_fisico_logic_add::checkinventario_fisicoToGets($this->inventario_fisicos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->inventario_fisicos);
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
		$this->inventario_fisico = new inventario_fisico();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->inventario_fisico=$this->inventario_fisicoDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->inventario_fisico,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				inventario_fisico_util::refrescarFKDescripcion($this->inventario_fisico);
			}
						
			//inventario_fisico_logic_add::checkinventario_fisicoToGet($this->inventario_fisico,$this->datosCliente);
			//inventario_fisico_logic_add::updateinventario_fisicoToGet($this->inventario_fisico);
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
		$this->inventario_fisico = new  inventario_fisico();
		  		  
        try {		
			$this->inventario_fisico=$this->inventario_fisicoDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->inventario_fisico,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				inventario_fisico_util::refrescarFKDescripcion($this->inventario_fisico);
			}
			
			//inventario_fisico_logic_add::checkinventario_fisicoToGet($this->inventario_fisico,$this->datosCliente);
			//inventario_fisico_logic_add::updateinventario_fisicoToGet($this->inventario_fisico);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?inventario_fisico {
		$inventario_fisicoLogic = new  inventario_fisico_logic();
		  		  
        try {		
			$inventario_fisicoLogic->setConnexion($connexion);			
			$inventario_fisicoLogic->getEntity($id);			
			return $inventario_fisicoLogic->getinventario_fisico();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->inventario_fisico = new  inventario_fisico();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->inventario_fisico=$this->inventario_fisicoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->inventario_fisico,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				inventario_fisico_util::refrescarFKDescripcion($this->inventario_fisico);
			}
			
			//inventario_fisico_logic_add::checkinventario_fisicoToGet($this->inventario_fisico,$this->datosCliente);
			//inventario_fisico_logic_add::updateinventario_fisicoToGet($this->inventario_fisico);
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
		$this->inventario_fisico = new  inventario_fisico();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->inventario_fisico=$this->inventario_fisicoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->inventario_fisico,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				inventario_fisico_util::refrescarFKDescripcion($this->inventario_fisico);
			}
			
			//inventario_fisico_logic_add::checkinventario_fisicoToGet($this->inventario_fisico,$this->datosCliente);
			//inventario_fisico_logic_add::updateinventario_fisicoToGet($this->inventario_fisico);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?inventario_fisico {
		$inventario_fisicoLogic = new  inventario_fisico_logic();
		  		  
        try {		
			$inventario_fisicoLogic->setConnexion($connexion);			
			$inventario_fisicoLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $inventario_fisicoLogic->getinventario_fisico();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->inventario_fisicos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->inventario_fisicos=$this->inventario_fisicoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				inventario_fisico_util::refrescarFKDescripciones($this->inventario_fisicos);
			}
			
			//inventario_fisico_logic_add::checkinventario_fisicoToGets($this->inventario_fisicos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->inventario_fisicos);			
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
		$this->inventario_fisicos = array();
		  		  
        try {			
			$this->inventario_fisicos=$this->inventario_fisicoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				inventario_fisico_util::refrescarFKDescripciones($this->inventario_fisicos);
			}
			
			//inventario_fisico_logic_add::checkinventario_fisicoToGets($this->inventario_fisicos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->inventario_fisicos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->inventario_fisicos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->inventario_fisicos=$this->inventario_fisicoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				inventario_fisico_util::refrescarFKDescripciones($this->inventario_fisicos);
			}
			
			//inventario_fisico_logic_add::checkinventario_fisicoToGets($this->inventario_fisicos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->inventario_fisicos);
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
		$this->inventario_fisicos = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->inventario_fisicos=$this->inventario_fisicoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				inventario_fisico_util::refrescarFKDescripciones($this->inventario_fisicos);
			}
			
			//inventario_fisico_logic_add::checkinventario_fisicoToGets($this->inventario_fisicos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->inventario_fisicos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$inventario_fisicoLogic = new  inventario_fisico_logic();
		  		  
        try {		
			$inventario_fisicoLogic->setConnexion($connexion);			
			$inventario_fisicoLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $inventario_fisicoLogic->getinventario_fisicos();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->inventario_fisicos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->inventario_fisicos=$this->inventario_fisicoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				inventario_fisico_util::refrescarFKDescripciones($this->inventario_fisicos);
			}
			
			//inventario_fisico_logic_add::checkinventario_fisicoToGets($this->inventario_fisicos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->inventario_fisicos);
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
		$this->inventario_fisicos = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->inventario_fisicos=$this->inventario_fisicoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				inventario_fisico_util::refrescarFKDescripciones($this->inventario_fisicos);
			}
			
			//inventario_fisico_logic_add::checkinventario_fisicoToGets($this->inventario_fisicos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->inventario_fisicos);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->inventario_fisicos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->inventario_fisicos=$this->inventario_fisicoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				inventario_fisico_util::refrescarFKDescripciones($this->inventario_fisicos);
			}
			
			//inventario_fisico_logic_add::checkinventario_fisicoToGets($this->inventario_fisicos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->inventario_fisicos);
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
		$this->inventario_fisicos = array();
		  		  
        try {			
			$this->inventario_fisicos=$this->inventario_fisicoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				inventario_fisico_util::refrescarFKDescripciones($this->inventario_fisicos);
			}	
			
			//inventario_fisico_logic_add::checkinventario_fisicoToGets($this->inventario_fisicos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->inventario_fisicos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->inventario_fisicos = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->inventario_fisicos=$this->inventario_fisicoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				inventario_fisico_util::refrescarFKDescripciones($this->inventario_fisicos);
			}
			
			//inventario_fisico_logic_add::checkinventario_fisicoToGets($this->inventario_fisicos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->inventario_fisicos);
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
		$this->inventario_fisicos = array();
		  		  
        try {		
			$this->inventario_fisicos=$this->inventario_fisicoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				inventario_fisico_util::refrescarFKDescripciones($this->inventario_fisicos);
			}
			
			//inventario_fisico_logic_add::checkinventario_fisicoToGets($this->inventario_fisicos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->inventario_fisicos);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_IdbodegaWithConnection(string $strFinalQuery,Pagination $pagination,int $id_bodega) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_bodega= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_bodega->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_bodega,inventario_fisico_util::$ID_BODEGA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_bodega);

			$this->inventario_fisicos=$this->inventario_fisicoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				inventario_fisico_util::refrescarFKDescripciones($this->inventario_fisicos);
			}
			//inventario_fisico_logic_add::checkinventario_fisicoToGets($this->inventario_fisicos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->inventario_fisicos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idbodega(string $strFinalQuery,Pagination $pagination,int $id_bodega) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_bodega= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_bodega->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_bodega,inventario_fisico_util::$ID_BODEGA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_bodega);

			$this->inventario_fisicos=$this->inventario_fisicoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				inventario_fisico_util::refrescarFKDescripciones($this->inventario_fisicos);
			}
			//inventario_fisico_logic_add::checkinventario_fisicoToGets($this->inventario_fisicos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->inventario_fisicos);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idinventario_fisicoWithConnection(string $strFinalQuery,Pagination $pagination,int $id_inventario_fisico) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_inventario_fisico= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_inventario_fisico->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_inventario_fisico,inventario_fisico_util::$ID_INVENTARIO_FISICO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_inventario_fisico);

			$this->inventario_fisicos=$this->inventario_fisicoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				inventario_fisico_util::refrescarFKDescripciones($this->inventario_fisicos);
			}
			//inventario_fisico_logic_add::checkinventario_fisicoToGets($this->inventario_fisicos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->inventario_fisicos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idinventario_fisico(string $strFinalQuery,Pagination $pagination,int $id_inventario_fisico) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_inventario_fisico= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_inventario_fisico->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_inventario_fisico,inventario_fisico_util::$ID_INVENTARIO_FISICO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_inventario_fisico);

			$this->inventario_fisicos=$this->inventario_fisicoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				inventario_fisico_util::refrescarFKDescripciones($this->inventario_fisicos);
			}
			//inventario_fisico_logic_add::checkinventario_fisicoToGets($this->inventario_fisicos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->inventario_fisicos);
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
						
			//inventario_fisico_logic_add::checkinventario_fisicoToSave($this->inventario_fisico,$this->datosCliente,$this->connexion);	       
			//inventario_fisico_logic_add::updateinventario_fisicoToSave($this->inventario_fisico);			
			inventario_fisico_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->inventario_fisico,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->inventario_fisicoLogicAdditional->checkGeneralEntityToSave($this,$this->inventario_fisico,$this->datosCliente,$this->connexion);
			
			
			inventario_fisico_data::save($this->inventario_fisico, $this->connexion);	    	       	 				
			//inventario_fisico_logic_add::checkinventario_fisicoToSaveAfter($this->inventario_fisico,$this->datosCliente,$this->connexion);			
			//$this->inventario_fisicoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->inventario_fisico,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->inventario_fisico,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->inventario_fisico,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				inventario_fisico_util::refrescarFKDescripcion($this->inventario_fisico);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->inventario_fisico->getIsDeleted()) {
				$this->inventario_fisico=null;
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
						
			/*inventario_fisico_logic_add::checkinventario_fisicoToSave($this->inventario_fisico,$this->datosCliente,$this->connexion);*/	        
			//inventario_fisico_logic_add::updateinventario_fisicoToSave($this->inventario_fisico);			
			//$this->inventario_fisicoLogicAdditional->checkGeneralEntityToSave($this,$this->inventario_fisico,$this->datosCliente,$this->connexion);			
			inventario_fisico_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->inventario_fisico,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			inventario_fisico_data::save($this->inventario_fisico, $this->connexion);	    	       	 						
			/*inventario_fisico_logic_add::checkinventario_fisicoToSaveAfter($this->inventario_fisico,$this->datosCliente,$this->connexion);*/			
			//$this->inventario_fisicoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->inventario_fisico,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->inventario_fisico,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->inventario_fisico,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				inventario_fisico_util::refrescarFKDescripcion($this->inventario_fisico);				
			}
			
			if($this->inventario_fisico->getIsDeleted()) {
				$this->inventario_fisico=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(inventario_fisico $inventario_fisico,Connexion $connexion)  {
		$inventario_fisicoLogic = new  inventario_fisico_logic();		  		  
        try {		
			$inventario_fisicoLogic->setConnexion($connexion);			
			$inventario_fisicoLogic->setinventario_fisico($inventario_fisico);			
			$inventario_fisicoLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*inventario_fisico_logic_add::checkinventario_fisicoToSaves($this->inventario_fisicos,$this->datosCliente,$this->connexion);*/	        	
			//$this->inventario_fisicoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->inventario_fisicos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->inventario_fisicos as $inventario_fisicoLocal) {				
								
				//inventario_fisico_logic_add::updateinventario_fisicoToSave($inventario_fisicoLocal);	        	
				inventario_fisico_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$inventario_fisicoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				inventario_fisico_data::save($inventario_fisicoLocal, $this->connexion);				
			}
			
			/*inventario_fisico_logic_add::checkinventario_fisicoToSavesAfter($this->inventario_fisicos,$this->datosCliente,$this->connexion);*/			
			//$this->inventario_fisicoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->inventario_fisicos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				inventario_fisico_util::refrescarFKDescripciones($this->inventario_fisicos);
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
			/*inventario_fisico_logic_add::checkinventario_fisicoToSaves($this->inventario_fisicos,$this->datosCliente,$this->connexion);*/			
			//$this->inventario_fisicoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->inventario_fisicos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->inventario_fisicos as $inventario_fisicoLocal) {				
								
				//inventario_fisico_logic_add::updateinventario_fisicoToSave($inventario_fisicoLocal);	        	
				inventario_fisico_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$inventario_fisicoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				inventario_fisico_data::save($inventario_fisicoLocal, $this->connexion);				
			}			
			
			/*inventario_fisico_logic_add::checkinventario_fisicoToSavesAfter($this->inventario_fisicos,$this->datosCliente,$this->connexion);*/			
			//$this->inventario_fisicoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->inventario_fisicos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				inventario_fisico_util::refrescarFKDescripciones($this->inventario_fisicos);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $inventario_fisicos,Connexion $connexion)  {
		$inventario_fisicoLogic = new  inventario_fisico_logic();
		  		  
        try {		
			$inventario_fisicoLogic->setConnexion($connexion);			
			$inventario_fisicoLogic->setinventario_fisicos($inventario_fisicos);			
			$inventario_fisicoLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$inventario_fisicosAux=array();
		
		foreach($this->inventario_fisicos as $inventario_fisico) {
			if($inventario_fisico->getIsDeleted()==false) {
				$inventario_fisicosAux[]=$inventario_fisico;
			}
		}
		
		$this->inventario_fisicos=$inventario_fisicosAux;
	}
	
	public function updateToGetsAuxiliar(array &$inventario_fisicos) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->inventario_fisicos as $inventario_fisico) {
				
				$inventario_fisico->setid_inventario_fisico_Descripcion(inventario_fisico_util::getinventario_fisicoDescripcion($inventario_fisico->getinventario_fisico()));
				$inventario_fisico->setid_bodega_Descripcion(inventario_fisico_util::getbodegaDescripcion($inventario_fisico->getbodega()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$inventario_fisico_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$inventario_fisico_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$inventario_fisico_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$inventario_fisico_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$inventario_fisico_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$inventario_fisicoForeignKey=new inventario_fisico_param_return();//inventario_fisicoForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_inventario_fisico',$strRecargarFkTipos,',')) {
				$this->cargarCombosinventario_fisicosFK($this->connexion,$strRecargarFkQuery,$inventario_fisicoForeignKey,$inventario_fisico_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_bodega',$strRecargarFkTipos,',')) {
				$this->cargarCombosbodegasFK($this->connexion,$strRecargarFkQuery,$inventario_fisicoForeignKey,$inventario_fisico_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_inventario_fisico',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosinventario_fisicosFK($this->connexion,' where id=-1 ',$inventario_fisicoForeignKey,$inventario_fisico_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_bodega',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosbodegasFK($this->connexion,' where id=-1 ',$inventario_fisicoForeignKey,$inventario_fisico_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $inventario_fisicoForeignKey;
			
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
	
	
	public function cargarCombosinventario_fisicosFK($connexion=null,$strRecargarFkQuery='',$inventario_fisicoForeignKey,$inventario_fisico_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$inventario_fisicoLogic= new inventario_fisico_logic();
		$pagination= new Pagination();
		$inventario_fisicoForeignKey->inventario_fisicosFK=array();

		$inventario_fisicoLogic->setConnexion($connexion);
		$inventario_fisicoLogic->getinventario_fisicoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($inventario_fisico_session==null) {
			$inventario_fisico_session=new inventario_fisico_session();
		}
		
		if($inventario_fisico_session->bitBusquedaDesdeFKSesioninventario_fisico!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=inventario_fisico_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalinventario_fisico=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalinventario_fisico=Funciones::GetFinalQueryAppend($finalQueryGlobalinventario_fisico, '');
				$finalQueryGlobalinventario_fisico.=inventario_fisico_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalinventario_fisico.$strRecargarFkQuery;		

				$inventario_fisicoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($inventario_fisicoLogic->getinventario_fisicos() as $inventario_fisicoLocal ) {
				if($inventario_fisicoForeignKey->idinventario_fisicoDefaultFK==0) {
					$inventario_fisicoForeignKey->idinventario_fisicoDefaultFK=$inventario_fisicoLocal->getId();
				}

				$inventario_fisicoForeignKey->inventario_fisicosFK[$inventario_fisicoLocal->getId()]=inventario_fisico_util::getinventario_fisicoDescripcion($inventario_fisicoLocal);
			}

		} else {

			if($inventario_fisico_session->bigidinventario_fisicoActual!=null && $inventario_fisico_session->bigidinventario_fisicoActual > 0) {
				$inventario_fisicoLogic->getEntity($inventario_fisico_session->bigidinventario_fisicoActual);//WithConnection

				$inventario_fisicoForeignKey->inventario_fisicosFK[$inventario_fisicoLogic->getinventario_fisico()->getId()]=inventario_fisico_util::getinventario_fisicoDescripcion($inventario_fisicoLogic->getinventario_fisico());
				$inventario_fisicoForeignKey->idinventario_fisicoDefaultFK=$inventario_fisicoLogic->getinventario_fisico()->getId();
			}
		}
	}

	public function cargarCombosbodegasFK($connexion=null,$strRecargarFkQuery='',$inventario_fisicoForeignKey,$inventario_fisico_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$bodegaLogic= new bodega_logic();
		$pagination= new Pagination();
		$inventario_fisicoForeignKey->bodegasFK=array();

		$bodegaLogic->setConnexion($connexion);
		$bodegaLogic->getbodegaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($inventario_fisico_session==null) {
			$inventario_fisico_session=new inventario_fisico_session();
		}
		
		if($inventario_fisico_session->bitBusquedaDesdeFKSesionbodega!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=bodega_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalbodega=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalbodega=Funciones::GetFinalQueryAppend($finalQueryGlobalbodega, '');
				$finalQueryGlobalbodega.=bodega_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalbodega.$strRecargarFkQuery;		

				$bodegaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($bodegaLogic->getbodegas() as $bodegaLocal ) {
				if($inventario_fisicoForeignKey->idbodegaDefaultFK==0) {
					$inventario_fisicoForeignKey->idbodegaDefaultFK=$bodegaLocal->getId();
				}

				$inventario_fisicoForeignKey->bodegasFK[$bodegaLocal->getId()]=inventario_fisico_util::getbodegaDescripcion($bodegaLocal);
			}

		} else {

			if($inventario_fisico_session->bigidbodegaActual!=null && $inventario_fisico_session->bigidbodegaActual > 0) {
				$bodegaLogic->getEntity($inventario_fisico_session->bigidbodegaActual);//WithConnection

				$inventario_fisicoForeignKey->bodegasFK[$bodegaLogic->getbodega()->getId()]=inventario_fisico_util::getbodegaDescripcion($bodegaLogic->getbodega());
				$inventario_fisicoForeignKey->idbodegaDefaultFK=$bodegaLogic->getbodega()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($inventario_fisico,$inventariofisicodetalles,$inventariofisicos) {
		$this->saveRelacionesBase($inventario_fisico,$inventariofisicodetalles,$inventariofisicos,true);
	}

	public function saveRelaciones($inventario_fisico,$inventariofisicodetalles,$inventariofisicos) {
		$this->saveRelacionesBase($inventario_fisico,$inventariofisicodetalles,$inventariofisicos,false);
	}

	public function saveRelacionesBase($inventario_fisico,$inventariofisicodetalles=array(),$inventariofisicos=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$inventario_fisico->setinventario_fisico_detalles($inventariofisicodetalles);
			$inventario_fisico->setinventario_fisicos($inventariofisicos);
			$this->setinventario_fisico($inventario_fisico);

			if(true) {

				//inventario_fisico_logic_add::updateRelacionesToSave($inventario_fisico,$this);

				if(($this->inventario_fisico->getIsNew() || $this->inventario_fisico->getIsChanged()) && !$this->inventario_fisico->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($inventariofisicodetalles,$inventariofisicos);

				} else if($this->inventario_fisico->getIsDeleted()) {
					$this->saveRelacionesDetalles($inventariofisicodetalles,$inventariofisicos);
					$this->save();
				}

				//inventario_fisico_logic_add::updateRelacionesToSaveAfter($inventario_fisico,$this);

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
	
	
	public function saveRelacionesDetalles($inventariofisicodetalles=array(),$inventariofisicos=array()) {
		try {
	

			$idinventario_fisicoActual=$this->getinventario_fisico()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/inventario_fisico_detalle_carga.php');
			inventario_fisico_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$inventariofisicodetalleLogic_Desde_inventario_fisico=new inventario_fisico_detalle_logic();
			$inventariofisicodetalleLogic_Desde_inventario_fisico->setinventario_fisico_detalles($inventariofisicodetalles);

			$inventariofisicodetalleLogic_Desde_inventario_fisico->setConnexion($this->getConnexion());
			$inventariofisicodetalleLogic_Desde_inventario_fisico->setDatosCliente($this->datosCliente);

			foreach($inventariofisicodetalleLogic_Desde_inventario_fisico->getinventario_fisico_detalles() as $inventariofisicodetalle_Desde_inventario_fisico) {
				$inventariofisicodetalle_Desde_inventario_fisico->setid_inventario_fisico($idinventario_fisicoActual);
			}

			$inventariofisicodetalleLogic_Desde_inventario_fisico->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/inventario_fisico_carga.php');
			inventario_fisico_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$inventariofisicoLogicHijos_Desde_inventario_fisico=new inventario_fisico_logic();
			$inventariofisicoLogicHijos_Desde_inventario_fisico->setinventario_fisicos($inventariofisicos);

			$inventariofisicoLogicHijos_Desde_inventario_fisico->setConnexion($this->getConnexion());
			$inventariofisicoLogicHijos_Desde_inventario_fisico->setDatosCliente($this->datosCliente);

			foreach($inventariofisicoLogicHijos_Desde_inventario_fisico->getinventario_fisicos() as $inventariofisicoHijos_Desde_inventario_fisico) {
				$inventariofisicoHijos_Desde_inventario_fisico->setid_inventario_fisico($idinventario_fisicoActual);

				$inventariofisicoLogicHijos_Desde_inventario_fisico->setinventario_fisico($inventariofisicoHijos_Desde_inventario_fisico);
				$inventariofisicoLogicHijos_Desde_inventario_fisico->save();
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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $inventario_fisicos,inventario_fisico_param_return $inventario_fisicoParameterGeneral) : inventario_fisico_param_return {
		$inventario_fisicoReturnGeneral=new inventario_fisico_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $inventario_fisicoReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $inventario_fisicos,inventario_fisico_param_return $inventario_fisicoParameterGeneral) : inventario_fisico_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$inventario_fisicoReturnGeneral=new inventario_fisico_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $inventario_fisicoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $inventario_fisicos,inventario_fisico $inventario_fisico,inventario_fisico_param_return $inventario_fisicoParameterGeneral,bool $isEsNuevoinventario_fisico,array $clases) : inventario_fisico_param_return {
		 try {	
			$inventario_fisicoReturnGeneral=new inventario_fisico_param_return();
	
			$inventario_fisicoReturnGeneral->setinventario_fisico($inventario_fisico);
			$inventario_fisicoReturnGeneral->setinventario_fisicos($inventario_fisicos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$inventario_fisicoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $inventario_fisicoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $inventario_fisicos,inventario_fisico $inventario_fisico,inventario_fisico_param_return $inventario_fisicoParameterGeneral,bool $isEsNuevoinventario_fisico,array $clases) : inventario_fisico_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$inventario_fisicoReturnGeneral=new inventario_fisico_param_return();
	
			$inventario_fisicoReturnGeneral->setinventario_fisico($inventario_fisico);
			$inventario_fisicoReturnGeneral->setinventario_fisicos($inventario_fisicos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$inventario_fisicoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $inventario_fisicoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $inventario_fisicos,inventario_fisico $inventario_fisico,inventario_fisico_param_return $inventario_fisicoParameterGeneral,bool $isEsNuevoinventario_fisico,array $clases) : inventario_fisico_param_return {
		 try {	
			$inventario_fisicoReturnGeneral=new inventario_fisico_param_return();
	
			$inventario_fisicoReturnGeneral->setinventario_fisico($inventario_fisico);
			$inventario_fisicoReturnGeneral->setinventario_fisicos($inventario_fisicos);
			
			
			
			return $inventario_fisicoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $inventario_fisicos,inventario_fisico $inventario_fisico,inventario_fisico_param_return $inventario_fisicoParameterGeneral,bool $isEsNuevoinventario_fisico,array $clases) : inventario_fisico_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$inventario_fisicoReturnGeneral=new inventario_fisico_param_return();
	
			$inventario_fisicoReturnGeneral->setinventario_fisico($inventario_fisico);
			$inventario_fisicoReturnGeneral->setinventario_fisicos($inventario_fisicos);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $inventario_fisicoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,inventario_fisico $inventario_fisico,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,inventario_fisico $inventario_fisico,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		inventario_fisico_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		inventario_fisico_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(inventario_fisico $inventario_fisico,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//inventario_fisico_logic_add::updateinventario_fisicoToGet($this->inventario_fisico);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$inventario_fisico->setinventario_fisico($this->inventario_fisicoDataAccess->getinventario_fisico($this->connexion,$inventario_fisico));
		$inventario_fisico->setbodega($this->inventario_fisicoDataAccess->getbodega($this->connexion,$inventario_fisico));
		$inventario_fisico->setinventario_fisico_detalles($this->inventario_fisicoDataAccess->getinventario_fisico_detalles($this->connexion,$inventario_fisico));
		$inventario_fisico->setinventario_fisicos($this->inventario_fisicoDataAccess->getinventario_fisicos($this->connexion,$inventario_fisico));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==inventario_fisico::$class.'') {
				$inventario_fisico->setinventario_fisico($this->inventario_fisicoDataAccess->getinventario_fisico($this->connexion,$inventario_fisico));
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				$inventario_fisico->setbodega($this->inventario_fisicoDataAccess->getbodega($this->connexion,$inventario_fisico));
				continue;
			}

			if($clas->clas==inventario_fisico_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$inventario_fisico->setinventario_fisico_detalles($this->inventario_fisicoDataAccess->getinventario_fisico_detalles($this->connexion,$inventario_fisico));

				if($this->isConDeep) {
					$inventariofisicodetalleLogic= new inventario_fisico_detalle_logic($this->connexion);
					$inventariofisicodetalleLogic->setinventario_fisico_detalles($inventario_fisico->getinventario_fisico_detalles());
					$classesLocal=inventario_fisico_detalle_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$inventariofisicodetalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					inventario_fisico_detalle_util::refrescarFKDescripciones($inventariofisicodetalleLogic->getinventario_fisico_detalles());
					$inventario_fisico->setinventario_fisico_detalles($inventariofisicodetalleLogic->getinventario_fisico_detalles());
				}

				continue;
			}

			if($clas->clas==inventario_fisico::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$inventario_fisico->setinventario_fisicos($this->inventario_fisicoDataAccess->getinventario_fisicos($this->connexion,$inventario_fisico));

				if($this->isConDeep) {
					$inventariofisicoLogic= new inventario_fisico_logic($this->connexion);
					$inventariofisicoLogic->setinventario_fisicos($inventario_fisico->getinventario_fisicos());
					$classesLocal=inventario_fisico_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$inventariofisicoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					inventario_fisico_util::refrescarFKDescripciones($inventariofisicoLogic->getinventario_fisicos());
					$inventario_fisico->setinventario_fisicos($inventariofisicoLogic->getinventario_fisicos());
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==inventario_fisico::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$inventario_fisico->setinventario_fisico($this->inventario_fisicoDataAccess->getinventario_fisico($this->connexion,$inventario_fisico));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$inventario_fisico->setbodega($this->inventario_fisicoDataAccess->getbodega($this->connexion,$inventario_fisico));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==inventario_fisico_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(inventario_fisico_detalle::$class);
			$inventario_fisico->setinventario_fisico_detalles($this->inventario_fisicoDataAccess->getinventario_fisico_detalles($this->connexion,$inventario_fisico));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==inventario_fisico::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(inventario_fisico::$class);
			$inventario_fisico->setinventario_fisicos($this->inventario_fisicoDataAccess->getinventario_fisicos($this->connexion,$inventario_fisico));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$inventario_fisico->setinventario_fisico($this->inventario_fisicoDataAccess->getinventario_fisico($this->connexion,$inventario_fisico));
		$inventario_fisicoLogic= new inventario_fisico_logic($this->connexion);
		$inventario_fisicoLogic->deepLoad($inventario_fisico->getinventario_fisico(),$isDeep,$deepLoadType,$clases);
				
		$inventario_fisico->setbodega($this->inventario_fisicoDataAccess->getbodega($this->connexion,$inventario_fisico));
		$bodegaLogic= new bodega_logic($this->connexion);
		$bodegaLogic->deepLoad($inventario_fisico->getbodega(),$isDeep,$deepLoadType,$clases);
				

		$inventario_fisico->setinventario_fisico_detalles($this->inventario_fisicoDataAccess->getinventario_fisico_detalles($this->connexion,$inventario_fisico));

		foreach($inventario_fisico->getinventario_fisico_detalles() as $inventariofisicodetalle) {
			$inventariofisicodetalleLogic= new inventario_fisico_detalle_logic($this->connexion);
			$inventariofisicodetalleLogic->deepLoad($inventariofisicodetalle,$isDeep,$deepLoadType,$clases);
		}

		$inventario_fisico->setinventario_fisicos($this->inventario_fisicoDataAccess->getinventario_fisicos($this->connexion,$inventario_fisico));

		foreach($inventario_fisico->getinventario_fisicos() as $inventariofisico) {
			$inventariofisicoLogic= new inventario_fisico_logic($this->connexion);
			$inventariofisicoLogic->deepLoad($inventariofisico,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==inventario_fisico::$class.'') {
				$inventario_fisico->setinventario_fisico($this->inventario_fisicoDataAccess->getinventario_fisico($this->connexion,$inventario_fisico));
				$inventario_fisicoLogic= new inventario_fisico_logic($this->connexion);
				$inventario_fisicoLogic->deepLoad($inventario_fisico->getinventario_fisico(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				$inventario_fisico->setbodega($this->inventario_fisicoDataAccess->getbodega($this->connexion,$inventario_fisico));
				$bodegaLogic= new bodega_logic($this->connexion);
				$bodegaLogic->deepLoad($inventario_fisico->getbodega(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==inventario_fisico_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$inventario_fisico->setinventario_fisico_detalles($this->inventario_fisicoDataAccess->getinventario_fisico_detalles($this->connexion,$inventario_fisico));

				foreach($inventario_fisico->getinventario_fisico_detalles() as $inventariofisicodetalle) {
					$inventariofisicodetalleLogic= new inventario_fisico_detalle_logic($this->connexion);
					$inventariofisicodetalleLogic->deepLoad($inventariofisicodetalle,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==inventario_fisico::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$inventario_fisico->setinventario_fisicos($this->inventario_fisicoDataAccess->getinventario_fisicos($this->connexion,$inventario_fisico));

				foreach($inventario_fisico->getinventario_fisicos() as $inventariofisico) {
					$inventariofisicoLogic= new inventario_fisico_logic($this->connexion);
					$inventariofisicoLogic->deepLoad($inventariofisico,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==inventario_fisico::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$inventario_fisico->setinventario_fisico($this->inventario_fisicoDataAccess->getinventario_fisico($this->connexion,$inventario_fisico));
			$inventario_fisicoLogic= new inventario_fisico_logic($this->connexion);
			$inventario_fisicoLogic->deepLoad($inventario_fisico->getinventario_fisico(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$inventario_fisico->setbodega($this->inventario_fisicoDataAccess->getbodega($this->connexion,$inventario_fisico));
			$bodegaLogic= new bodega_logic($this->connexion);
			$bodegaLogic->deepLoad($inventario_fisico->getbodega(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==inventario_fisico_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(inventario_fisico_detalle::$class);
			$inventario_fisico->setinventario_fisico_detalles($this->inventario_fisicoDataAccess->getinventario_fisico_detalles($this->connexion,$inventario_fisico));

			foreach($inventario_fisico->getinventario_fisico_detalles() as $inventariofisicodetalle) {
				$inventariofisicodetalleLogic= new inventario_fisico_detalle_logic($this->connexion);
				$inventariofisicodetalleLogic->deepLoad($inventariofisicodetalle,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==inventario_fisico::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(inventario_fisico::$class);
			$inventario_fisico->setinventario_fisicos($this->inventario_fisicoDataAccess->getinventario_fisicos($this->connexion,$inventario_fisico));

			foreach($inventario_fisico->getinventario_fisicos() as $inventariofisico) {
				$inventariofisicoLogic= new inventario_fisico_logic($this->connexion);
				$inventariofisicoLogic->deepLoad($inventariofisico,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(inventario_fisico $inventario_fisico,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//inventario_fisico_logic_add::updateinventario_fisicoToSave($this->inventario_fisico);			
			
			if(!$paraDeleteCascade) {				
				inventario_fisico_data::save($inventario_fisico, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		inventario_fisico_data::save($inventario_fisico->getinventario_fisico(),$this->connexion);
		bodega_data::save($inventario_fisico->getbodega(),$this->connexion);

		foreach($inventario_fisico->getinventario_fisico_detalles() as $inventariofisicodetalle) {
			$inventariofisicodetalle->setid_inventario_fisico($inventario_fisico->getId());
			inventario_fisico_detalle_data::save($inventariofisicodetalle,$this->connexion);
		}


		foreach($inventario_fisico->getinventario_fisicos() as $inventariofisico) {
			$inventariofisico->setid_inventario_fisico($inventario_fisico->getId());
			inventario_fisico_data::save($inventariofisico,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==inventario_fisico::$class.'') {
				inventario_fisico_data::save($inventario_fisico->getinventario_fisico(),$this->connexion);
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				bodega_data::save($inventario_fisico->getbodega(),$this->connexion);
				continue;
			}


			if($clas->clas==inventario_fisico_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($inventario_fisico->getinventario_fisico_detalles() as $inventariofisicodetalle) {
					$inventariofisicodetalle->setid_inventario_fisico($inventario_fisico->getId());
					inventario_fisico_detalle_data::save($inventariofisicodetalle,$this->connexion);
				}

				continue;
			}

			if($clas->clas==inventario_fisico::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($inventario_fisico->getinventario_fisicos() as $inventariofisico) {
					$inventariofisico->setid_inventario_fisico($inventario_fisico->getId());
					inventario_fisico_data::save($inventariofisico,$this->connexion);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==inventario_fisico::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			inventario_fisico_data::save($inventario_fisico->getinventario_fisico(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			bodega_data::save($inventario_fisico->getbodega(),$this->connexion);
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==inventario_fisico_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(inventario_fisico_detalle::$class);

			foreach($inventario_fisico->getinventario_fisico_detalles() as $inventariofisicodetalle) {
				$inventariofisicodetalle->setid_inventario_fisico($inventario_fisico->getId());
				inventario_fisico_detalle_data::save($inventariofisicodetalle,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==inventario_fisico::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(inventario_fisico::$class);

			foreach($inventario_fisico->getinventario_fisicos() as $inventariofisico) {
				$inventariofisico->setid_inventario_fisico($inventario_fisico->getId());
				inventario_fisico_data::save($inventariofisico,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		inventario_fisico_data::save($inventario_fisico->getinventario_fisico(),$this->connexion);
		$inventario_fisicoLogic= new inventario_fisico_logic($this->connexion);
		$inventario_fisicoLogic->deepSave($inventario_fisico->getinventario_fisico(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		bodega_data::save($inventario_fisico->getbodega(),$this->connexion);
		$bodegaLogic= new bodega_logic($this->connexion);
		$bodegaLogic->deepSave($inventario_fisico->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($inventario_fisico->getinventario_fisico_detalles() as $inventariofisicodetalle) {
			$inventariofisicodetalleLogic= new inventario_fisico_detalle_logic($this->connexion);
			$inventariofisicodetalle->setid_inventario_fisico($inventario_fisico->getId());
			inventario_fisico_detalle_data::save($inventariofisicodetalle,$this->connexion);
			$inventariofisicodetalleLogic->deepSave($inventariofisicodetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($inventario_fisico->getinventario_fisicos() as $inventariofisico) {
			$inventariofisicoLogic= new inventario_fisico_logic($this->connexion);
			$inventariofisico->setid_inventario_fisico($inventario_fisico->getId());
			inventario_fisico_data::save($inventariofisico,$this->connexion);
			$inventariofisicoLogic->deepSave($inventariofisico,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==inventario_fisico::$class.'') {
				inventario_fisico_data::save($inventario_fisico->getinventario_fisico(),$this->connexion);
				$inventario_fisicoLogic= new inventario_fisico_logic($this->connexion);
				$inventario_fisicoLogic->deepSave($inventario_fisico->getinventario_fisico(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				bodega_data::save($inventario_fisico->getbodega(),$this->connexion);
				$bodegaLogic= new bodega_logic($this->connexion);
				$bodegaLogic->deepSave($inventario_fisico->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==inventario_fisico_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($inventario_fisico->getinventario_fisico_detalles() as $inventariofisicodetalle) {
					$inventariofisicodetalleLogic= new inventario_fisico_detalle_logic($this->connexion);
					$inventariofisicodetalle->setid_inventario_fisico($inventario_fisico->getId());
					inventario_fisico_detalle_data::save($inventariofisicodetalle,$this->connexion);
					$inventariofisicodetalleLogic->deepSave($inventariofisicodetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==inventario_fisico::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($inventario_fisico->getinventario_fisicos() as $inventariofisico) {
					$inventariofisicoLogic= new inventario_fisico_logic($this->connexion);
					$inventariofisico->setid_inventario_fisico($inventario_fisico->getId());
					inventario_fisico_data::save($inventariofisico,$this->connexion);
					$inventariofisicoLogic->deepSave($inventariofisico,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==inventario_fisico::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			inventario_fisico_data::save($inventario_fisico->getinventario_fisico(),$this->connexion);
			$inventario_fisicoLogic= new inventario_fisico_logic($this->connexion);
			$inventario_fisicoLogic->deepSave($inventario_fisico->getinventario_fisico(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			bodega_data::save($inventario_fisico->getbodega(),$this->connexion);
			$bodegaLogic= new bodega_logic($this->connexion);
			$bodegaLogic->deepSave($inventario_fisico->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==inventario_fisico_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(inventario_fisico_detalle::$class);

			foreach($inventario_fisico->getinventario_fisico_detalles() as $inventariofisicodetalle) {
				$inventariofisicodetalleLogic= new inventario_fisico_detalle_logic($this->connexion);
				$inventariofisicodetalle->setid_inventario_fisico($inventario_fisico->getId());
				inventario_fisico_detalle_data::save($inventariofisicodetalle,$this->connexion);
				$inventariofisicodetalleLogic->deepSave($inventariofisicodetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==inventario_fisico::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(inventario_fisico::$class);

			foreach($inventario_fisico->getinventario_fisicos() as $inventariofisico) {
				$inventariofisicoLogic= new inventario_fisico_logic($this->connexion);
				$inventariofisico->setid_inventario_fisico($inventario_fisico->getId());
				inventario_fisico_data::save($inventariofisico,$this->connexion);
				$inventariofisicoLogic->deepSave($inventariofisico,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				inventario_fisico_data::save($inventario_fisico, $this->connexion);
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
			
			$this->deepLoad($this->inventario_fisico,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->inventario_fisicos as $inventario_fisico) {
				$this->deepLoad($inventario_fisico,$isDeep,$deepLoadType,$clases);
								
				inventario_fisico_util::refrescarFKDescripciones($this->inventario_fisicos);
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
			
			foreach($this->inventario_fisicos as $inventario_fisico) {
				$this->deepLoad($inventario_fisico,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->inventario_fisico,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->inventario_fisicos as $inventario_fisico) {
				$this->deepSave($inventario_fisico,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->inventario_fisicos as $inventario_fisico) {
				$this->deepSave($inventario_fisico,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(inventario_fisico::$class);
				$classes[]=new Classe(bodega::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==inventario_fisico::$class) {
						$classes[]=new Classe(inventario_fisico::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==bodega::$class) {
						$classes[]=new Classe(bodega::$class);
					}
				}

			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==inventario_fisico::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(inventario_fisico::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==bodega::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(bodega::$class);
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
				
				$classes[]=new Classe(inventario_fisico_detalle::$class);
				$classes[]=new Classe(inventario_fisico::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==inventario_fisico_detalle::$class) {
						$classes[]=new Classe(inventario_fisico_detalle::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==inventario_fisico::$class) {
						$classes[]=new Classe(inventario_fisico::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==inventario_fisico_detalle::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(inventario_fisico_detalle::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==inventario_fisico::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(inventario_fisico::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getinventario_fisico() : ?inventario_fisico {	
		/*
		inventario_fisico_logic_add::checkinventario_fisicoToGet($this->inventario_fisico,$this->datosCliente);
		inventario_fisico_logic_add::updateinventario_fisicoToGet($this->inventario_fisico);
		*/
			
		return $this->inventario_fisico;
	}
		
	public function setinventario_fisico(inventario_fisico $newinventario_fisico) {
		$this->inventario_fisico = $newinventario_fisico;
	}
	
	public function getinventario_fisicos() : array {		
		/*
		inventario_fisico_logic_add::checkinventario_fisicoToGets($this->inventario_fisicos,$this->datosCliente);
		
		foreach ($this->inventario_fisicos as $inventario_fisicoLocal ) {
			inventario_fisico_logic_add::updateinventario_fisicoToGet($inventario_fisicoLocal);
		}
		*/
		
		return $this->inventario_fisicos;
	}
	
	public function setinventario_fisicos(array $newinventario_fisicos) {
		$this->inventario_fisicos = $newinventario_fisicos;
	}
	
	public function getinventario_fisicoDataAccess() : inventario_fisico_data {
		return $this->inventario_fisicoDataAccess;
	}
	
	public function setinventario_fisicoDataAccess(inventario_fisico_data $newinventario_fisicoDataAccess) {
		$this->inventario_fisicoDataAccess = $newinventario_fisicoDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        inventario_fisico_carga::$CONTROLLER;;        
		
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
