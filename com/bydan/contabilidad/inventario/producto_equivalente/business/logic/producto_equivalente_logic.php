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

namespace com\bydan\contabilidad\inventario\producto_equivalente\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\inventario\producto_equivalente\util\producto_equivalente_carga;
use com\bydan\contabilidad\inventario\producto_equivalente\util\producto_equivalente_param_return;

use com\bydan\contabilidad\inventario\producto_equivalente\presentation\session\producto_equivalente_session;

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

use com\bydan\contabilidad\inventario\producto_equivalente\util\producto_equivalente_util;
use com\bydan\contabilidad\inventario\producto_equivalente\business\entity\producto_equivalente;
use com\bydan\contabilidad\inventario\producto_equivalente\business\data\producto_equivalente_data;

//FK


use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\business\data\producto_data;
use com\bydan\contabilidad\inventario\producto\business\logic\producto_logic;
use com\bydan\contabilidad\inventario\producto\util\producto_util;

//REL


//REL DETALLES




class producto_equivalente_logic  extends GeneralEntityLogic implements producto_equivalente_logicI {	
	/*GENERAL*/
	public producto_equivalente_data $producto_equivalenteDataAccess;
	//public ?producto_equivalente_logic_add $producto_equivalenteLogicAdditional=null;
	public ?producto_equivalente $producto_equivalente;
	public array $producto_equivalentes;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->producto_equivalenteDataAccess = new producto_equivalente_data();			
			$this->producto_equivalentes = array();
			$this->producto_equivalente = new producto_equivalente();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->producto_equivalenteLogicAdditional = new producto_equivalente_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->producto_equivalenteLogicAdditional==null) {
		//	$this->producto_equivalenteLogicAdditional=new producto_equivalente_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->producto_equivalenteDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->producto_equivalenteDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->producto_equivalenteDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->producto_equivalenteDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->producto_equivalentes = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->producto_equivalentes=$this->producto_equivalenteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				producto_equivalente_util::refrescarFKDescripciones($this->producto_equivalentes);
			}
			
			//producto_equivalente_logic_add::checkproducto_equivalenteToGets($this->producto_equivalentes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->producto_equivalentes);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->producto_equivalentes = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->producto_equivalentes=$this->producto_equivalenteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				producto_equivalente_util::refrescarFKDescripciones($this->producto_equivalentes);
			}
			
			//producto_equivalente_logic_add::checkproducto_equivalenteToGets($this->producto_equivalentes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->producto_equivalentes);
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
		$this->producto_equivalente = new producto_equivalente();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->producto_equivalente=$this->producto_equivalenteDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->producto_equivalente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				producto_equivalente_util::refrescarFKDescripcion($this->producto_equivalente);
			}
						
			//producto_equivalente_logic_add::checkproducto_equivalenteToGet($this->producto_equivalente,$this->datosCliente);
			//producto_equivalente_logic_add::updateproducto_equivalenteToGet($this->producto_equivalente);
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
		$this->producto_equivalente = new  producto_equivalente();
		  		  
        try {		
			$this->producto_equivalente=$this->producto_equivalenteDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->producto_equivalente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				producto_equivalente_util::refrescarFKDescripcion($this->producto_equivalente);
			}
			
			//producto_equivalente_logic_add::checkproducto_equivalenteToGet($this->producto_equivalente,$this->datosCliente);
			//producto_equivalente_logic_add::updateproducto_equivalenteToGet($this->producto_equivalente);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?producto_equivalente {
		$producto_equivalenteLogic = new  producto_equivalente_logic();
		  		  
        try {		
			$producto_equivalenteLogic->setConnexion($connexion);			
			$producto_equivalenteLogic->getEntity($id);			
			return $producto_equivalenteLogic->getproducto_equivalente();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->producto_equivalente = new  producto_equivalente();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->producto_equivalente=$this->producto_equivalenteDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->producto_equivalente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				producto_equivalente_util::refrescarFKDescripcion($this->producto_equivalente);
			}
			
			//producto_equivalente_logic_add::checkproducto_equivalenteToGet($this->producto_equivalente,$this->datosCliente);
			//producto_equivalente_logic_add::updateproducto_equivalenteToGet($this->producto_equivalente);
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
		$this->producto_equivalente = new  producto_equivalente();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->producto_equivalente=$this->producto_equivalenteDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->producto_equivalente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				producto_equivalente_util::refrescarFKDescripcion($this->producto_equivalente);
			}
			
			//producto_equivalente_logic_add::checkproducto_equivalenteToGet($this->producto_equivalente,$this->datosCliente);
			//producto_equivalente_logic_add::updateproducto_equivalenteToGet($this->producto_equivalente);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?producto_equivalente {
		$producto_equivalenteLogic = new  producto_equivalente_logic();
		  		  
        try {		
			$producto_equivalenteLogic->setConnexion($connexion);			
			$producto_equivalenteLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $producto_equivalenteLogic->getproducto_equivalente();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->producto_equivalentes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->producto_equivalentes=$this->producto_equivalenteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				producto_equivalente_util::refrescarFKDescripciones($this->producto_equivalentes);
			}
			
			//producto_equivalente_logic_add::checkproducto_equivalenteToGets($this->producto_equivalentes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->producto_equivalentes);			
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
		$this->producto_equivalentes = array();
		  		  
        try {			
			$this->producto_equivalentes=$this->producto_equivalenteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				producto_equivalente_util::refrescarFKDescripciones($this->producto_equivalentes);
			}
			
			//producto_equivalente_logic_add::checkproducto_equivalenteToGets($this->producto_equivalentes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->producto_equivalentes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->producto_equivalentes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->producto_equivalentes=$this->producto_equivalenteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				producto_equivalente_util::refrescarFKDescripciones($this->producto_equivalentes);
			}
			
			//producto_equivalente_logic_add::checkproducto_equivalenteToGets($this->producto_equivalentes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->producto_equivalentes);
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
		$this->producto_equivalentes = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->producto_equivalentes=$this->producto_equivalenteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				producto_equivalente_util::refrescarFKDescripciones($this->producto_equivalentes);
			}
			
			//producto_equivalente_logic_add::checkproducto_equivalenteToGets($this->producto_equivalentes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->producto_equivalentes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$producto_equivalenteLogic = new  producto_equivalente_logic();
		  		  
        try {		
			$producto_equivalenteLogic->setConnexion($connexion);			
			$producto_equivalenteLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $producto_equivalenteLogic->getproducto_equivalentes();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->producto_equivalentes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->producto_equivalentes=$this->producto_equivalenteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				producto_equivalente_util::refrescarFKDescripciones($this->producto_equivalentes);
			}
			
			//producto_equivalente_logic_add::checkproducto_equivalenteToGets($this->producto_equivalentes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->producto_equivalentes);
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
		$this->producto_equivalentes = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->producto_equivalentes=$this->producto_equivalenteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				producto_equivalente_util::refrescarFKDescripciones($this->producto_equivalentes);
			}
			
			//producto_equivalente_logic_add::checkproducto_equivalenteToGets($this->producto_equivalentes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->producto_equivalentes);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->producto_equivalentes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->producto_equivalentes=$this->producto_equivalenteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				producto_equivalente_util::refrescarFKDescripciones($this->producto_equivalentes);
			}
			
			//producto_equivalente_logic_add::checkproducto_equivalenteToGets($this->producto_equivalentes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->producto_equivalentes);
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
		$this->producto_equivalentes = array();
		  		  
        try {			
			$this->producto_equivalentes=$this->producto_equivalenteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				producto_equivalente_util::refrescarFKDescripciones($this->producto_equivalentes);
			}	
			
			//producto_equivalente_logic_add::checkproducto_equivalenteToGets($this->producto_equivalentes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->producto_equivalentes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->producto_equivalentes = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->producto_equivalentes=$this->producto_equivalenteDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				producto_equivalente_util::refrescarFKDescripciones($this->producto_equivalentes);
			}
			
			//producto_equivalente_logic_add::checkproducto_equivalenteToGets($this->producto_equivalentes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->producto_equivalentes);
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
		$this->producto_equivalentes = array();
		  		  
        try {		
			$this->producto_equivalentes=$this->producto_equivalenteDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				producto_equivalente_util::refrescarFKDescripciones($this->producto_equivalentes);
			}
			
			//producto_equivalente_logic_add::checkproducto_equivalenteToGets($this->producto_equivalentes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->producto_equivalentes);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_Idproducto_equivalenteWithConnection(string $strFinalQuery,Pagination $pagination,int $id_producto_equivalente) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_producto_equivalente= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_producto_equivalente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_producto_equivalente,producto_equivalente_util::$ID_PRODUCTO_EQUIVALENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_producto_equivalente);

			$this->producto_equivalentes=$this->producto_equivalenteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				producto_equivalente_util::refrescarFKDescripciones($this->producto_equivalentes);
			}
			//producto_equivalente_logic_add::checkproducto_equivalenteToGets($this->producto_equivalentes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->producto_equivalentes);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idproducto_equivalente(string $strFinalQuery,Pagination $pagination,int $id_producto_equivalente) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_producto_equivalente= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_producto_equivalente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_producto_equivalente,producto_equivalente_util::$ID_PRODUCTO_EQUIVALENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_producto_equivalente);

			$this->producto_equivalentes=$this->producto_equivalenteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				producto_equivalente_util::refrescarFKDescripciones($this->producto_equivalentes);
			}
			//producto_equivalente_logic_add::checkproducto_equivalenteToGets($this->producto_equivalentes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->producto_equivalentes);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idproducto_principalWithConnection(string $strFinalQuery,Pagination $pagination,int $id_producto_principal) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_producto_principal= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_producto_principal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_producto_principal,producto_equivalente_util::$ID_PRODUCTO_PRINCIPAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_producto_principal);

			$this->producto_equivalentes=$this->producto_equivalenteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				producto_equivalente_util::refrescarFKDescripciones($this->producto_equivalentes);
			}
			//producto_equivalente_logic_add::checkproducto_equivalenteToGets($this->producto_equivalentes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->producto_equivalentes);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idproducto_principal(string $strFinalQuery,Pagination $pagination,int $id_producto_principal) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_producto_principal= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_producto_principal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_producto_principal,producto_equivalente_util::$ID_PRODUCTO_PRINCIPAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_producto_principal);

			$this->producto_equivalentes=$this->producto_equivalenteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				producto_equivalente_util::refrescarFKDescripciones($this->producto_equivalentes);
			}
			//producto_equivalente_logic_add::checkproducto_equivalenteToGets($this->producto_equivalentes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->producto_equivalentes);
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
						
			//producto_equivalente_logic_add::checkproducto_equivalenteToSave($this->producto_equivalente,$this->datosCliente,$this->connexion);	       
			//producto_equivalente_logic_add::updateproducto_equivalenteToSave($this->producto_equivalente);			
			producto_equivalente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->producto_equivalente,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->producto_equivalenteLogicAdditional->checkGeneralEntityToSave($this,$this->producto_equivalente,$this->datosCliente,$this->connexion);
			
			
			producto_equivalente_data::save($this->producto_equivalente, $this->connexion);	    	       	 				
			//producto_equivalente_logic_add::checkproducto_equivalenteToSaveAfter($this->producto_equivalente,$this->datosCliente,$this->connexion);			
			//$this->producto_equivalenteLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->producto_equivalente,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->producto_equivalente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->producto_equivalente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				producto_equivalente_util::refrescarFKDescripcion($this->producto_equivalente);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->producto_equivalente->getIsDeleted()) {
				$this->producto_equivalente=null;
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
						
			/*producto_equivalente_logic_add::checkproducto_equivalenteToSave($this->producto_equivalente,$this->datosCliente,$this->connexion);*/	        
			//producto_equivalente_logic_add::updateproducto_equivalenteToSave($this->producto_equivalente);			
			//$this->producto_equivalenteLogicAdditional->checkGeneralEntityToSave($this,$this->producto_equivalente,$this->datosCliente,$this->connexion);			
			producto_equivalente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->producto_equivalente,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			producto_equivalente_data::save($this->producto_equivalente, $this->connexion);	    	       	 						
			/*producto_equivalente_logic_add::checkproducto_equivalenteToSaveAfter($this->producto_equivalente,$this->datosCliente,$this->connexion);*/			
			//$this->producto_equivalenteLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->producto_equivalente,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->producto_equivalente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->producto_equivalente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				producto_equivalente_util::refrescarFKDescripcion($this->producto_equivalente);				
			}
			
			if($this->producto_equivalente->getIsDeleted()) {
				$this->producto_equivalente=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(producto_equivalente $producto_equivalente,Connexion $connexion)  {
		$producto_equivalenteLogic = new  producto_equivalente_logic();		  		  
        try {		
			$producto_equivalenteLogic->setConnexion($connexion);			
			$producto_equivalenteLogic->setproducto_equivalente($producto_equivalente);			
			$producto_equivalenteLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*producto_equivalente_logic_add::checkproducto_equivalenteToSaves($this->producto_equivalentes,$this->datosCliente,$this->connexion);*/	        	
			//$this->producto_equivalenteLogicAdditional->checkGeneralEntitiesToSaves($this,$this->producto_equivalentes,$this->datosCliente,$this->connexion);
			
	   		foreach($this->producto_equivalentes as $producto_equivalenteLocal) {				
								
				//producto_equivalente_logic_add::updateproducto_equivalenteToSave($producto_equivalenteLocal);	        	
				producto_equivalente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$producto_equivalenteLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				producto_equivalente_data::save($producto_equivalenteLocal, $this->connexion);				
			}
			
			/*producto_equivalente_logic_add::checkproducto_equivalenteToSavesAfter($this->producto_equivalentes,$this->datosCliente,$this->connexion);*/			
			//$this->producto_equivalenteLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->producto_equivalentes,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				producto_equivalente_util::refrescarFKDescripciones($this->producto_equivalentes);
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
			/*producto_equivalente_logic_add::checkproducto_equivalenteToSaves($this->producto_equivalentes,$this->datosCliente,$this->connexion);*/			
			//$this->producto_equivalenteLogicAdditional->checkGeneralEntitiesToSaves($this,$this->producto_equivalentes,$this->datosCliente,$this->connexion);
			
	   		foreach($this->producto_equivalentes as $producto_equivalenteLocal) {				
								
				//producto_equivalente_logic_add::updateproducto_equivalenteToSave($producto_equivalenteLocal);	        	
				producto_equivalente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$producto_equivalenteLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				producto_equivalente_data::save($producto_equivalenteLocal, $this->connexion);				
			}			
			
			/*producto_equivalente_logic_add::checkproducto_equivalenteToSavesAfter($this->producto_equivalentes,$this->datosCliente,$this->connexion);*/			
			//$this->producto_equivalenteLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->producto_equivalentes,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				producto_equivalente_util::refrescarFKDescripciones($this->producto_equivalentes);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $producto_equivalentes,Connexion $connexion)  {
		$producto_equivalenteLogic = new  producto_equivalente_logic();
		  		  
        try {		
			$producto_equivalenteLogic->setConnexion($connexion);			
			$producto_equivalenteLogic->setproducto_equivalentes($producto_equivalentes);			
			$producto_equivalenteLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$producto_equivalentesAux=array();
		
		foreach($this->producto_equivalentes as $producto_equivalente) {
			if($producto_equivalente->getIsDeleted()==false) {
				$producto_equivalentesAux[]=$producto_equivalente;
			}
		}
		
		$this->producto_equivalentes=$producto_equivalentesAux;
	}
	
	public function updateToGetsAuxiliar(array &$producto_equivalentes) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->producto_equivalentes as $producto_equivalente) {
				
				$producto_equivalente->setid_producto_principal_Descripcion(producto_equivalente_util::getproducto_principalDescripcion($producto_equivalente->getproducto_principal()));
				$producto_equivalente->setid_producto_equivalente_Descripcion(producto_equivalente_util::getproducto_equivalenteDescripcion($producto_equivalente->getproducto_equivalente()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$producto_equivalente_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$producto_equivalente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$producto_equivalente_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$producto_equivalente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$producto_equivalente_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$producto_equivalenteForeignKey=new producto_equivalente_param_return();//producto_equivalenteForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_producto_principal',$strRecargarFkTipos,',')) {
				$this->cargarCombosproducto_principalsFK($this->connexion,$strRecargarFkQuery,$producto_equivalenteForeignKey,$producto_equivalente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_producto_equivalente',$strRecargarFkTipos,',')) {
				$this->cargarCombosproducto_equivalentesFK($this->connexion,$strRecargarFkQuery,$producto_equivalenteForeignKey,$producto_equivalente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_producto_principal',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosproducto_principalsFK($this->connexion,' where id=-1 ',$producto_equivalenteForeignKey,$producto_equivalente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_producto_equivalente',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosproducto_equivalentesFK($this->connexion,' where id=-1 ',$producto_equivalenteForeignKey,$producto_equivalente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $producto_equivalenteForeignKey;
			
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
	
	
	public function cargarCombosproducto_principalsFK($connexion=null,$strRecargarFkQuery='',$producto_equivalenteForeignKey,$producto_equivalente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$productoLogic= new producto_logic();
		$pagination= new Pagination();
		$producto_equivalenteForeignKey->producto_principalsFK=array();

		$productoLogic->setConnexion($connexion);
		$productoLogic->getproductoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($producto_equivalente_session==null) {
			$producto_equivalente_session=new producto_equivalente_session();
		}
		
		if($producto_equivalente_session->bitBusquedaDesdeFKSesionproducto_principal!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=producto_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalproducto=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalproducto=Funciones::GetFinalQueryAppend($finalQueryGlobalproducto, '');
				$finalQueryGlobalproducto.=producto_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalproducto.$strRecargarFkQuery;		

				$productoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($productoLogic->getproductos() as $productoLocal ) {
				if($producto_equivalenteForeignKey->idproducto_principalDefaultFK==0) {
					$producto_equivalenteForeignKey->idproducto_principalDefaultFK=$productoLocal->getId();
				}

				$producto_equivalenteForeignKey->producto_principalsFK[$productoLocal->getId()]=producto_equivalente_util::getproducto_principalDescripcion($productoLocal);
			}

		} else {

			if($producto_equivalente_session->bigidproducto_principalActual!=null && $producto_equivalente_session->bigidproducto_principalActual > 0) {
				$productoLogic->getEntity($producto_equivalente_session->bigidproducto_principalActual);//WithConnection

				$producto_equivalenteForeignKey->producto_principalsFK[$productoLogic->getproducto()->getId()]=producto_equivalente_util::getproducto_principalDescripcion($productoLogic->getproducto());
				$producto_equivalenteForeignKey->idproducto_principalDefaultFK=$productoLogic->getproducto()->getId();
			}
		}
	}

	public function cargarCombosproducto_equivalentesFK($connexion=null,$strRecargarFkQuery='',$producto_equivalenteForeignKey,$producto_equivalente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$producto_equivalenteLogic= new producto_equivalente_logic();
		$pagination= new Pagination();
		$producto_equivalenteForeignKey->producto_equivalentesFK=array();

		$producto_equivalenteLogic->setConnexion($connexion);
		$producto_equivalenteLogic->getproducto_equivalenteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($producto_equivalente_session==null) {
			$producto_equivalente_session=new producto_equivalente_session();
		}
		
		if($producto_equivalente_session->bitBusquedaDesdeFKSesionproducto_equivalente!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=producto_equivalente_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalproducto_equivalente=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalproducto_equivalente=Funciones::GetFinalQueryAppend($finalQueryGlobalproducto_equivalente, '');
				$finalQueryGlobalproducto_equivalente.=producto_equivalente_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalproducto_equivalente.$strRecargarFkQuery;		

				$producto_equivalenteLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($producto_equivalenteLogic->getproducto_equivalentes() as $producto_equivalenteLocal ) {
				if($producto_equivalenteForeignKey->idproducto_equivalenteDefaultFK==0) {
					$producto_equivalenteForeignKey->idproducto_equivalenteDefaultFK=$producto_equivalenteLocal->getId();
				}

				$producto_equivalenteForeignKey->producto_equivalentesFK[$producto_equivalenteLocal->getId()]=producto_equivalente_util::getproducto_equivalenteDescripcion($producto_equivalenteLocal);
			}

		} else {

			if($producto_equivalente_session->bigidproducto_equivalenteActual!=null && $producto_equivalente_session->bigidproducto_equivalenteActual > 0) {
				$producto_equivalenteLogic->getEntity($producto_equivalente_session->bigidproducto_equivalenteActual);//WithConnection

				$producto_equivalenteForeignKey->producto_equivalentesFK[$producto_equivalenteLogic->getproducto_equivalente()->getId()]=producto_equivalente_util::getproducto_equivalenteDescripcion($producto_equivalenteLogic->getproducto_equivalente());
				$producto_equivalenteForeignKey->idproducto_equivalenteDefaultFK=$producto_equivalenteLogic->getproducto_equivalente()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($producto_equivalente,$productoequivalentes) {
		$this->saveRelacionesBase($producto_equivalente,$productoequivalentes,true);
	}

	public function saveRelaciones($producto_equivalente,$productoequivalentes) {
		$this->saveRelacionesBase($producto_equivalente,$productoequivalentes,false);
	}

	public function saveRelacionesBase($producto_equivalente,$productoequivalentes=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$producto_equivalente->setproducto_equivalentes($productoequivalentes);
			$this->setproducto_equivalente($producto_equivalente);

			if(true) {

				//producto_equivalente_logic_add::updateRelacionesToSave($producto_equivalente,$this);

				if(($this->producto_equivalente->getIsNew() || $this->producto_equivalente->getIsChanged()) && !$this->producto_equivalente->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($productoequivalentes);

				} else if($this->producto_equivalente->getIsDeleted()) {
					$this->saveRelacionesDetalles($productoequivalentes);
					$this->save();
				}

				//producto_equivalente_logic_add::updateRelacionesToSaveAfter($producto_equivalente,$this);

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
	
	
	public function saveRelacionesDetalles($productoequivalentes=array()) {
		try {
	

			$idproducto_equivalenteActual=$this->getproducto_equivalente()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/producto_equivalente_carga.php');
			producto_equivalente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$productoequivalenteLogicHijos_Desde_producto_equivalente=new producto_equivalente_logic();
			$productoequivalenteLogicHijos_Desde_producto_equivalente->setproducto_equivalentes($productoequivalentes);

			$productoequivalenteLogicHijos_Desde_producto_equivalente->setConnexion($this->getConnexion());
			$productoequivalenteLogicHijos_Desde_producto_equivalente->setDatosCliente($this->datosCliente);

			foreach($productoequivalenteLogicHijos_Desde_producto_equivalente->getproducto_equivalentes() as $productoequivalenteHijos_Desde_producto_equivalente) {
				$productoequivalenteHijos_Desde_producto_equivalente->setid_producto_equivalente($idproducto_equivalenteActual);

				$productoequivalenteLogicHijos_Desde_producto_equivalente->setproducto_equivalente($productoequivalenteHijos_Desde_producto_equivalente);
				$productoequivalenteLogicHijos_Desde_producto_equivalente->save();
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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $producto_equivalentes,producto_equivalente_param_return $producto_equivalenteParameterGeneral) : producto_equivalente_param_return {
		$producto_equivalenteReturnGeneral=new producto_equivalente_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $producto_equivalenteReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $producto_equivalentes,producto_equivalente_param_return $producto_equivalenteParameterGeneral) : producto_equivalente_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$producto_equivalenteReturnGeneral=new producto_equivalente_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $producto_equivalenteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $producto_equivalentes,producto_equivalente $producto_equivalente,producto_equivalente_param_return $producto_equivalenteParameterGeneral,bool $isEsNuevoproducto_equivalente,array $clases) : producto_equivalente_param_return {
		 try {	
			$producto_equivalenteReturnGeneral=new producto_equivalente_param_return();
	
			$producto_equivalenteReturnGeneral->setproducto_equivalente($producto_equivalente);
			$producto_equivalenteReturnGeneral->setproducto_equivalentes($producto_equivalentes);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$producto_equivalenteReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $producto_equivalenteReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $producto_equivalentes,producto_equivalente $producto_equivalente,producto_equivalente_param_return $producto_equivalenteParameterGeneral,bool $isEsNuevoproducto_equivalente,array $clases) : producto_equivalente_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$producto_equivalenteReturnGeneral=new producto_equivalente_param_return();
	
			$producto_equivalenteReturnGeneral->setproducto_equivalente($producto_equivalente);
			$producto_equivalenteReturnGeneral->setproducto_equivalentes($producto_equivalentes);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$producto_equivalenteReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $producto_equivalenteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $producto_equivalentes,producto_equivalente $producto_equivalente,producto_equivalente_param_return $producto_equivalenteParameterGeneral,bool $isEsNuevoproducto_equivalente,array $clases) : producto_equivalente_param_return {
		 try {	
			$producto_equivalenteReturnGeneral=new producto_equivalente_param_return();
	
			$producto_equivalenteReturnGeneral->setproducto_equivalente($producto_equivalente);
			$producto_equivalenteReturnGeneral->setproducto_equivalentes($producto_equivalentes);
			
			
			
			return $producto_equivalenteReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $producto_equivalentes,producto_equivalente $producto_equivalente,producto_equivalente_param_return $producto_equivalenteParameterGeneral,bool $isEsNuevoproducto_equivalente,array $clases) : producto_equivalente_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$producto_equivalenteReturnGeneral=new producto_equivalente_param_return();
	
			$producto_equivalenteReturnGeneral->setproducto_equivalente($producto_equivalente);
			$producto_equivalenteReturnGeneral->setproducto_equivalentes($producto_equivalentes);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $producto_equivalenteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,producto_equivalente $producto_equivalente,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,producto_equivalente $producto_equivalente,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		producto_equivalente_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		producto_equivalente_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(producto_equivalente $producto_equivalente,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//producto_equivalente_logic_add::updateproducto_equivalenteToGet($this->producto_equivalente);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$producto_equivalente->setproducto_principal($this->producto_equivalenteDataAccess->getproducto_principal($this->connexion,$producto_equivalente));
		$producto_equivalente->setproducto_equivalente($this->producto_equivalenteDataAccess->getproducto_equivalente($this->connexion,$producto_equivalente));
		$producto_equivalente->setproducto_equivalentes($this->producto_equivalenteDataAccess->getproducto_equivalentes($this->connexion,$producto_equivalente));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'_principal') {
				$producto_equivalente->setproducto_principal($this->producto_equivalenteDataAccess->getproducto_principal($this->connexion,$producto_equivalente));
				continue;
			}

			if($clas->clas==producto_equivalente::$class.'') {
				$producto_equivalente->setproducto_equivalente($this->producto_equivalenteDataAccess->getproducto_equivalente($this->connexion,$producto_equivalente));
				continue;
			}

			if($clas->clas==producto_equivalente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$producto_equivalente->setproducto_equivalentes($this->producto_equivalenteDataAccess->getproducto_equivalentes($this->connexion,$producto_equivalente));

				if($this->isConDeep) {
					$productoequivalenteLogic= new producto_equivalente_logic($this->connexion);
					$productoequivalenteLogic->setproducto_equivalentes($producto_equivalente->getproducto_equivalentes());
					$classesLocal=producto_equivalente_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$productoequivalenteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					producto_equivalente_util::refrescarFKDescripciones($productoequivalenteLogic->getproducto_equivalentes());
					$producto_equivalente->setproducto_equivalentes($productoequivalenteLogic->getproducto_equivalentes());
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'_principal') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$producto_equivalente->setproducto_principal($this->producto_equivalenteDataAccess->getproducto_principal($this->connexion,$producto_equivalente));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto_equivalente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$producto_equivalente->setproducto_equivalente($this->producto_equivalenteDataAccess->getproducto_equivalente($this->connexion,$producto_equivalente));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto_equivalente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(producto_equivalente::$class);
			$producto_equivalente->setproducto_equivalentes($this->producto_equivalenteDataAccess->getproducto_equivalentes($this->connexion,$producto_equivalente));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$producto_equivalente->setproducto_principal($this->producto_equivalenteDataAccess->getproducto_principal($this->connexion,$producto_equivalente));
		$producto_principalLogic= new producto_logic($this->connexion);
		$producto_principalLogic->deepLoad($producto_equivalente->getproducto_principal(),$isDeep,$deepLoadType,$clases);
				
		$producto_equivalente->setproducto_equivalente($this->producto_equivalenteDataAccess->getproducto_equivalente($this->connexion,$producto_equivalente));
		$producto_equivalenteLogic= new producto_equivalente_logic($this->connexion);
		$producto_equivalenteLogic->deepLoad($producto_equivalente->getproducto_equivalente(),$isDeep,$deepLoadType,$clases);
				

		$producto_equivalente->setproducto_equivalentes($this->producto_equivalenteDataAccess->getproducto_equivalentes($this->connexion,$producto_equivalente));

		foreach($producto_equivalente->getproducto_equivalentes() as $productoequivalente) {
			$productoequivalenteLogic= new producto_equivalente_logic($this->connexion);
			$productoequivalenteLogic->deepLoad($productoequivalente,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'_principal') {
				$producto_equivalente->setproducto_principal($this->producto_equivalenteDataAccess->getproducto_principal($this->connexion,$producto_equivalente));
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepLoad($producto_equivalente->getproducto_principal(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==producto_equivalente::$class.'') {
				$producto_equivalente->setproducto_equivalente($this->producto_equivalenteDataAccess->getproducto_equivalente($this->connexion,$producto_equivalente));
				$producto_equivalenteLogic= new producto_equivalente_logic($this->connexion);
				$producto_equivalenteLogic->deepLoad($producto_equivalente->getproducto_equivalente(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==producto_equivalente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$producto_equivalente->setproducto_equivalentes($this->producto_equivalenteDataAccess->getproducto_equivalentes($this->connexion,$producto_equivalente));

				foreach($producto_equivalente->getproducto_equivalentes() as $productoequivalente) {
					$productoequivalenteLogic= new producto_equivalente_logic($this->connexion);
					$productoequivalenteLogic->deepLoad($productoequivalente,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'_principal') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$producto_equivalente->setproducto_principal($this->producto_equivalenteDataAccess->getproducto_principal($this->connexion,$producto_equivalente));
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepLoad($producto_equivalente->getproducto_principal(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto_equivalente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$producto_equivalente->setproducto_equivalente($this->producto_equivalenteDataAccess->getproducto_equivalente($this->connexion,$producto_equivalente));
			$producto_equivalenteLogic= new producto_equivalente_logic($this->connexion);
			$producto_equivalenteLogic->deepLoad($producto_equivalente->getproducto_equivalente(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto_equivalente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(producto_equivalente::$class);
			$producto_equivalente->setproducto_equivalentes($this->producto_equivalenteDataAccess->getproducto_equivalentes($this->connexion,$producto_equivalente));

			foreach($producto_equivalente->getproducto_equivalentes() as $productoequivalente) {
				$productoequivalenteLogic= new producto_equivalente_logic($this->connexion);
				$productoequivalenteLogic->deepLoad($productoequivalente,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(producto_equivalente $producto_equivalente,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//producto_equivalente_logic_add::updateproducto_equivalenteToSave($this->producto_equivalente);			
			
			if(!$paraDeleteCascade) {				
				producto_equivalente_data::save($producto_equivalente, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		producto_data::save($producto_equivalente->getproducto_principal(),$this->connexion);
		producto_equivalente_data::save($producto_equivalente->getproducto_equivalente(),$this->connexion);

		foreach($producto_equivalente->getproducto_equivalentes() as $productoequivalente) {
			$productoequivalente->setid_producto_equivalente($producto_equivalente->getId());
			producto_equivalente_data::save($productoequivalente,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'_principal') {
				producto_data::save($producto_equivalente->getproducto_principal(),$this->connexion);
				continue;
			}

			if($clas->clas==producto_equivalente::$class.'') {
				producto_equivalente_data::save($producto_equivalente->getproducto_equivalente(),$this->connexion);
				continue;
			}


			if($clas->clas==producto_equivalente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($producto_equivalente->getproducto_equivalentes() as $productoequivalente) {
					$productoequivalente->setid_producto_equivalente($producto_equivalente->getId());
					producto_equivalente_data::save($productoequivalente,$this->connexion);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'_principal') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			producto_data::save($producto_equivalente->getproducto_principal(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto_equivalente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			producto_equivalente_data::save($producto_equivalente->getproducto_equivalente(),$this->connexion);
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto_equivalente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(producto_equivalente::$class);

			foreach($producto_equivalente->getproducto_equivalentes() as $productoequivalente) {
				$productoequivalente->setid_producto_equivalente($producto_equivalente->getId());
				producto_equivalente_data::save($productoequivalente,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		producto_data::save($producto_equivalente->getproducto_principal(),$this->connexion);
		$producto_principalLogic= new producto_logic($this->connexion);
		$producto_principalLogic->deepSave($producto_equivalente->getproducto_principal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		producto_equivalente_data::save($producto_equivalente->getproducto_equivalente(),$this->connexion);
		$producto_equivalenteLogic= new producto_equivalente_logic($this->connexion);
		$producto_equivalenteLogic->deepSave($producto_equivalente->getproducto_equivalente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($producto_equivalente->getproducto_equivalentes() as $productoequivalente) {
			$productoequivalenteLogic= new producto_equivalente_logic($this->connexion);
			$productoequivalente->setid_producto_equivalente($producto_equivalente->getId());
			producto_equivalente_data::save($productoequivalente,$this->connexion);
			$productoequivalenteLogic->deepSave($productoequivalente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'_principal') {
				producto_data::save($producto_equivalente->getproducto_principal(),$this->connexion);
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepSave($producto_equivalente->getproducto_principal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==producto_equivalente::$class.'') {
				producto_equivalente_data::save($producto_equivalente->getproducto_equivalente(),$this->connexion);
				$producto_equivalenteLogic= new producto_equivalente_logic($this->connexion);
				$producto_equivalenteLogic->deepSave($producto_equivalente->getproducto_equivalente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==producto_equivalente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($producto_equivalente->getproducto_equivalentes() as $productoequivalente) {
					$productoequivalenteLogic= new producto_equivalente_logic($this->connexion);
					$productoequivalente->setid_producto_equivalente($producto_equivalente->getId());
					producto_equivalente_data::save($productoequivalente,$this->connexion);
					$productoequivalenteLogic->deepSave($productoequivalente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'_principal') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			producto_data::save($producto_equivalente->getproducto(),$this->connexion);
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepSave($producto_equivalente->getproducto_principal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto_equivalente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			producto_equivalente_data::save($producto_equivalente->getproducto_equivalente(),$this->connexion);
			$producto_equivalenteLogic= new producto_equivalente_logic($this->connexion);
			$producto_equivalenteLogic->deepSave($producto_equivalente->getproducto_equivalente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto_equivalente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(producto_equivalente::$class);

			foreach($producto_equivalente->getproducto_equivalentes() as $productoequivalente) {
				$productoequivalenteLogic= new producto_equivalente_logic($this->connexion);
				$productoequivalente->setid_producto_equivalente($producto_equivalente->getId());
				producto_equivalente_data::save($productoequivalente,$this->connexion);
				$productoequivalenteLogic->deepSave($productoequivalente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				producto_equivalente_data::save($producto_equivalente, $this->connexion);
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
			
			$this->deepLoad($this->producto_equivalente,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->producto_equivalentes as $producto_equivalente) {
				$this->deepLoad($producto_equivalente,$isDeep,$deepLoadType,$clases);
								
				producto_equivalente_util::refrescarFKDescripciones($this->producto_equivalentes);
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
			
			foreach($this->producto_equivalentes as $producto_equivalente) {
				$this->deepLoad($producto_equivalente,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->producto_equivalente,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->producto_equivalentes as $producto_equivalente) {
				$this->deepSave($producto_equivalente,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->producto_equivalentes as $producto_equivalente) {
				$this->deepSave($producto_equivalente,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(producto::$class);
				$classes[]=new Classe(producto_equivalente::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==producto::$class) {
						$classes[]=new Classe(producto::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==producto_equivalente::$class) {
						$classes[]=new Classe(producto_equivalente::$class);
					}
				}

			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==producto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(producto::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==producto_equivalente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(producto_equivalente::$class);
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
				
				$classes[]=new Classe(producto_equivalente::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==producto_equivalente::$class) {
						$classes[]=new Classe(producto_equivalente::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==producto_equivalente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(producto_equivalente::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getproducto_equivalente() : ?producto_equivalente {	
		/*
		producto_equivalente_logic_add::checkproducto_equivalenteToGet($this->producto_equivalente,$this->datosCliente);
		producto_equivalente_logic_add::updateproducto_equivalenteToGet($this->producto_equivalente);
		*/
			
		return $this->producto_equivalente;
	}
		
	public function setproducto_equivalente(producto_equivalente $newproducto_equivalente) {
		$this->producto_equivalente = $newproducto_equivalente;
	}
	
	public function getproducto_equivalentes() : array {		
		/*
		producto_equivalente_logic_add::checkproducto_equivalenteToGets($this->producto_equivalentes,$this->datosCliente);
		
		foreach ($this->producto_equivalentes as $producto_equivalenteLocal ) {
			producto_equivalente_logic_add::updateproducto_equivalenteToGet($producto_equivalenteLocal);
		}
		*/
		
		return $this->producto_equivalentes;
	}
	
	public function setproducto_equivalentes(array $newproducto_equivalentes) {
		$this->producto_equivalentes = $newproducto_equivalentes;
	}
	
	public function getproducto_equivalenteDataAccess() : producto_equivalente_data {
		return $this->producto_equivalenteDataAccess;
	}
	
	public function setproducto_equivalenteDataAccess(producto_equivalente_data $newproducto_equivalenteDataAccess) {
		$this->producto_equivalenteDataAccess = $newproducto_equivalenteDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        producto_equivalente_carga::$CONTROLLER;;        
		
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
