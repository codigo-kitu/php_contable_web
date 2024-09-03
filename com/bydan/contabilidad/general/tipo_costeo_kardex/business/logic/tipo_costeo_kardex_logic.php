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

namespace com\bydan\contabilidad\general\tipo_costeo_kardex\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\general\tipo_costeo_kardex\util\tipo_costeo_kardex_carga;
use com\bydan\contabilidad\general\tipo_costeo_kardex\util\tipo_costeo_kardex_param_return;


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

use com\bydan\contabilidad\general\tipo_costeo_kardex\util\tipo_costeo_kardex_util;
use com\bydan\contabilidad\general\tipo_costeo_kardex\business\entity\tipo_costeo_kardex;
use com\bydan\contabilidad\general\tipo_costeo_kardex\business\data\tipo_costeo_kardex_data;

//FK


//REL


use com\bydan\contabilidad\general\parametro_auxiliar\business\entity\parametro_auxiliar;
use com\bydan\contabilidad\general\parametro_auxiliar\business\data\parametro_auxiliar_data;
use com\bydan\contabilidad\general\parametro_auxiliar\business\logic\parametro_auxiliar_logic;
use com\bydan\contabilidad\general\parametro_auxiliar\util\parametro_auxiliar_carga;
use com\bydan\contabilidad\general\parametro_auxiliar\util\parametro_auxiliar_util;

use com\bydan\contabilidad\inventario\parametro_inventario\business\entity\parametro_inventario;
use com\bydan\contabilidad\inventario\parametro_inventario\business\data\parametro_inventario_data;
use com\bydan\contabilidad\inventario\parametro_inventario\business\logic\parametro_inventario_logic;
use com\bydan\contabilidad\inventario\parametro_inventario\util\parametro_inventario_carga;
use com\bydan\contabilidad\inventario\parametro_inventario\util\parametro_inventario_util;

//REL DETALLES




class tipo_costeo_kardex_logic  extends GeneralEntityLogic implements tipo_costeo_kardex_logicI {	
	/*GENERAL*/
	public tipo_costeo_kardex_data $tipo_costeo_kardexDataAccess;
	//public ?tipo_costeo_kardex_logic_add $tipo_costeo_kardexLogicAdditional=null;
	public ?tipo_costeo_kardex $tipo_costeo_kardex;
	public array $tipo_costeo_kardexs;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->tipo_costeo_kardexDataAccess = new tipo_costeo_kardex_data();			
			$this->tipo_costeo_kardexs = array();
			$this->tipo_costeo_kardex = new tipo_costeo_kardex();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->tipo_costeo_kardexLogicAdditional = new tipo_costeo_kardex_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->tipo_costeo_kardexLogicAdditional==null) {
		//	$this->tipo_costeo_kardexLogicAdditional=new tipo_costeo_kardex_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->tipo_costeo_kardexDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->tipo_costeo_kardexDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->tipo_costeo_kardexDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->tipo_costeo_kardexDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->tipo_costeo_kardexs = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_costeo_kardexs=$this->tipo_costeo_kardexDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_costeo_kardex_util::refrescarFKDescripciones($this->tipo_costeo_kardexs);
			}
			
			//tipo_costeo_kardex_logic_add::checktipo_costeo_kardexToGets($this->tipo_costeo_kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_costeo_kardexs);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->tipo_costeo_kardexs = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_costeo_kardexs=$this->tipo_costeo_kardexDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_costeo_kardex_util::refrescarFKDescripciones($this->tipo_costeo_kardexs);
			}
			
			//tipo_costeo_kardex_logic_add::checktipo_costeo_kardexToGets($this->tipo_costeo_kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_costeo_kardexs);
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
		$this->tipo_costeo_kardex = new tipo_costeo_kardex();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->tipo_costeo_kardex=$this->tipo_costeo_kardexDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_costeo_kardex,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_costeo_kardex_util::refrescarFKDescripcion($this->tipo_costeo_kardex);
			}
						
			//tipo_costeo_kardex_logic_add::checktipo_costeo_kardexToGet($this->tipo_costeo_kardex,$this->datosCliente);
			//tipo_costeo_kardex_logic_add::updatetipo_costeo_kardexToGet($this->tipo_costeo_kardex);
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
		$this->tipo_costeo_kardex = new  tipo_costeo_kardex();
		  		  
        try {		
			$this->tipo_costeo_kardex=$this->tipo_costeo_kardexDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_costeo_kardex,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_costeo_kardex_util::refrescarFKDescripcion($this->tipo_costeo_kardex);
			}
			
			//tipo_costeo_kardex_logic_add::checktipo_costeo_kardexToGet($this->tipo_costeo_kardex,$this->datosCliente);
			//tipo_costeo_kardex_logic_add::updatetipo_costeo_kardexToGet($this->tipo_costeo_kardex);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?tipo_costeo_kardex {
		$tipo_costeo_kardexLogic = new  tipo_costeo_kardex_logic();
		  		  
        try {		
			$tipo_costeo_kardexLogic->setConnexion($connexion);			
			$tipo_costeo_kardexLogic->getEntity($id);			
			return $tipo_costeo_kardexLogic->gettipo_costeo_kardex();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->tipo_costeo_kardex = new  tipo_costeo_kardex();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->tipo_costeo_kardex=$this->tipo_costeo_kardexDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_costeo_kardex,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_costeo_kardex_util::refrescarFKDescripcion($this->tipo_costeo_kardex);
			}
			
			//tipo_costeo_kardex_logic_add::checktipo_costeo_kardexToGet($this->tipo_costeo_kardex,$this->datosCliente);
			//tipo_costeo_kardex_logic_add::updatetipo_costeo_kardexToGet($this->tipo_costeo_kardex);
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
		$this->tipo_costeo_kardex = new  tipo_costeo_kardex();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_costeo_kardex=$this->tipo_costeo_kardexDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_costeo_kardex,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_costeo_kardex_util::refrescarFKDescripcion($this->tipo_costeo_kardex);
			}
			
			//tipo_costeo_kardex_logic_add::checktipo_costeo_kardexToGet($this->tipo_costeo_kardex,$this->datosCliente);
			//tipo_costeo_kardex_logic_add::updatetipo_costeo_kardexToGet($this->tipo_costeo_kardex);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?tipo_costeo_kardex {
		$tipo_costeo_kardexLogic = new  tipo_costeo_kardex_logic();
		  		  
        try {		
			$tipo_costeo_kardexLogic->setConnexion($connexion);			
			$tipo_costeo_kardexLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $tipo_costeo_kardexLogic->gettipo_costeo_kardex();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->tipo_costeo_kardexs = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->tipo_costeo_kardexs=$this->tipo_costeo_kardexDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_costeo_kardex_util::refrescarFKDescripciones($this->tipo_costeo_kardexs);
			}
			
			//tipo_costeo_kardex_logic_add::checktipo_costeo_kardexToGets($this->tipo_costeo_kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_costeo_kardexs);			
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
		$this->tipo_costeo_kardexs = array();
		  		  
        try {			
			$this->tipo_costeo_kardexs=$this->tipo_costeo_kardexDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_costeo_kardex_util::refrescarFKDescripciones($this->tipo_costeo_kardexs);
			}
			
			//tipo_costeo_kardex_logic_add::checktipo_costeo_kardexToGets($this->tipo_costeo_kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_costeo_kardexs);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->tipo_costeo_kardexs = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_costeo_kardexs=$this->tipo_costeo_kardexDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_costeo_kardex_util::refrescarFKDescripciones($this->tipo_costeo_kardexs);
			}
			
			//tipo_costeo_kardex_logic_add::checktipo_costeo_kardexToGets($this->tipo_costeo_kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_costeo_kardexs);
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
		$this->tipo_costeo_kardexs = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_costeo_kardexs=$this->tipo_costeo_kardexDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_costeo_kardex_util::refrescarFKDescripciones($this->tipo_costeo_kardexs);
			}
			
			//tipo_costeo_kardex_logic_add::checktipo_costeo_kardexToGets($this->tipo_costeo_kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_costeo_kardexs);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$tipo_costeo_kardexLogic = new  tipo_costeo_kardex_logic();
		  		  
        try {		
			$tipo_costeo_kardexLogic->setConnexion($connexion);			
			$tipo_costeo_kardexLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $tipo_costeo_kardexLogic->gettipo_costeo_kardexs();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->tipo_costeo_kardexs = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->tipo_costeo_kardexs=$this->tipo_costeo_kardexDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_costeo_kardex_util::refrescarFKDescripciones($this->tipo_costeo_kardexs);
			}
			
			//tipo_costeo_kardex_logic_add::checktipo_costeo_kardexToGets($this->tipo_costeo_kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_costeo_kardexs);
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
		$this->tipo_costeo_kardexs = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_costeo_kardexs=$this->tipo_costeo_kardexDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_costeo_kardex_util::refrescarFKDescripciones($this->tipo_costeo_kardexs);
			}
			
			//tipo_costeo_kardex_logic_add::checktipo_costeo_kardexToGets($this->tipo_costeo_kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_costeo_kardexs);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->tipo_costeo_kardexs = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_costeo_kardexs=$this->tipo_costeo_kardexDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_costeo_kardex_util::refrescarFKDescripciones($this->tipo_costeo_kardexs);
			}
			
			//tipo_costeo_kardex_logic_add::checktipo_costeo_kardexToGets($this->tipo_costeo_kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_costeo_kardexs);
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
		$this->tipo_costeo_kardexs = array();
		  		  
        try {			
			$this->tipo_costeo_kardexs=$this->tipo_costeo_kardexDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_costeo_kardex_util::refrescarFKDescripciones($this->tipo_costeo_kardexs);
			}	
			
			//tipo_costeo_kardex_logic_add::checktipo_costeo_kardexToGets($this->tipo_costeo_kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_costeo_kardexs);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->tipo_costeo_kardexs = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->tipo_costeo_kardexs=$this->tipo_costeo_kardexDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_costeo_kardex_util::refrescarFKDescripciones($this->tipo_costeo_kardexs);
			}
			
			//tipo_costeo_kardex_logic_add::checktipo_costeo_kardexToGets($this->tipo_costeo_kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_costeo_kardexs);
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
		$this->tipo_costeo_kardexs = array();
		  		  
        try {		
			$this->tipo_costeo_kardexs=$this->tipo_costeo_kardexDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_costeo_kardex_util::refrescarFKDescripciones($this->tipo_costeo_kardexs);
			}
			
			//tipo_costeo_kardex_logic_add::checktipo_costeo_kardexToGets($this->tipo_costeo_kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_costeo_kardexs);

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
						
			//tipo_costeo_kardex_logic_add::checktipo_costeo_kardexToSave($this->tipo_costeo_kardex,$this->datosCliente,$this->connexion);	       
			//tipo_costeo_kardex_logic_add::updatetipo_costeo_kardexToSave($this->tipo_costeo_kardex);			
			tipo_costeo_kardex_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->tipo_costeo_kardex,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->tipo_costeo_kardexLogicAdditional->checkGeneralEntityToSave($this,$this->tipo_costeo_kardex,$this->datosCliente,$this->connexion);
			
			
			tipo_costeo_kardex_data::save($this->tipo_costeo_kardex, $this->connexion);	    	       	 				
			//tipo_costeo_kardex_logic_add::checktipo_costeo_kardexToSaveAfter($this->tipo_costeo_kardex,$this->datosCliente,$this->connexion);			
			//$this->tipo_costeo_kardexLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->tipo_costeo_kardex,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->tipo_costeo_kardex,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->tipo_costeo_kardex,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				tipo_costeo_kardex_util::refrescarFKDescripcion($this->tipo_costeo_kardex);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->tipo_costeo_kardex->getIsDeleted()) {
				$this->tipo_costeo_kardex=null;
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
						
			/*tipo_costeo_kardex_logic_add::checktipo_costeo_kardexToSave($this->tipo_costeo_kardex,$this->datosCliente,$this->connexion);*/	        
			//tipo_costeo_kardex_logic_add::updatetipo_costeo_kardexToSave($this->tipo_costeo_kardex);			
			//$this->tipo_costeo_kardexLogicAdditional->checkGeneralEntityToSave($this,$this->tipo_costeo_kardex,$this->datosCliente,$this->connexion);			
			tipo_costeo_kardex_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->tipo_costeo_kardex,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			tipo_costeo_kardex_data::save($this->tipo_costeo_kardex, $this->connexion);	    	       	 						
			/*tipo_costeo_kardex_logic_add::checktipo_costeo_kardexToSaveAfter($this->tipo_costeo_kardex,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_costeo_kardexLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->tipo_costeo_kardex,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->tipo_costeo_kardex,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->tipo_costeo_kardex,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				tipo_costeo_kardex_util::refrescarFKDescripcion($this->tipo_costeo_kardex);				
			}
			
			if($this->tipo_costeo_kardex->getIsDeleted()) {
				$this->tipo_costeo_kardex=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(tipo_costeo_kardex $tipo_costeo_kardex,Connexion $connexion)  {
		$tipo_costeo_kardexLogic = new  tipo_costeo_kardex_logic();		  		  
        try {		
			$tipo_costeo_kardexLogic->setConnexion($connexion);			
			$tipo_costeo_kardexLogic->settipo_costeo_kardex($tipo_costeo_kardex);			
			$tipo_costeo_kardexLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*tipo_costeo_kardex_logic_add::checktipo_costeo_kardexToSaves($this->tipo_costeo_kardexs,$this->datosCliente,$this->connexion);*/	        	
			//$this->tipo_costeo_kardexLogicAdditional->checkGeneralEntitiesToSaves($this,$this->tipo_costeo_kardexs,$this->datosCliente,$this->connexion);
			
	   		foreach($this->tipo_costeo_kardexs as $tipo_costeo_kardexLocal) {				
								
				//tipo_costeo_kardex_logic_add::updatetipo_costeo_kardexToSave($tipo_costeo_kardexLocal);	        	
				tipo_costeo_kardex_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$tipo_costeo_kardexLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				tipo_costeo_kardex_data::save($tipo_costeo_kardexLocal, $this->connexion);				
			}
			
			/*tipo_costeo_kardex_logic_add::checktipo_costeo_kardexToSavesAfter($this->tipo_costeo_kardexs,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_costeo_kardexLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->tipo_costeo_kardexs,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_costeo_kardex_util::refrescarFKDescripciones($this->tipo_costeo_kardexs);
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
			/*tipo_costeo_kardex_logic_add::checktipo_costeo_kardexToSaves($this->tipo_costeo_kardexs,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_costeo_kardexLogicAdditional->checkGeneralEntitiesToSaves($this,$this->tipo_costeo_kardexs,$this->datosCliente,$this->connexion);
			
	   		foreach($this->tipo_costeo_kardexs as $tipo_costeo_kardexLocal) {				
								
				//tipo_costeo_kardex_logic_add::updatetipo_costeo_kardexToSave($tipo_costeo_kardexLocal);	        	
				tipo_costeo_kardex_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$tipo_costeo_kardexLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				tipo_costeo_kardex_data::save($tipo_costeo_kardexLocal, $this->connexion);				
			}			
			
			/*tipo_costeo_kardex_logic_add::checktipo_costeo_kardexToSavesAfter($this->tipo_costeo_kardexs,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_costeo_kardexLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->tipo_costeo_kardexs,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_costeo_kardex_util::refrescarFKDescripciones($this->tipo_costeo_kardexs);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $tipo_costeo_kardexs,Connexion $connexion)  {
		$tipo_costeo_kardexLogic = new  tipo_costeo_kardex_logic();
		  		  
        try {		
			$tipo_costeo_kardexLogic->setConnexion($connexion);			
			$tipo_costeo_kardexLogic->settipo_costeo_kardexs($tipo_costeo_kardexs);			
			$tipo_costeo_kardexLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$tipo_costeo_kardexsAux=array();
		
		foreach($this->tipo_costeo_kardexs as $tipo_costeo_kardex) {
			if($tipo_costeo_kardex->getIsDeleted()==false) {
				$tipo_costeo_kardexsAux[]=$tipo_costeo_kardex;
			}
		}
		
		$this->tipo_costeo_kardexs=$tipo_costeo_kardexsAux;
	}
	
	public function updateToGetsAuxiliar(array &$tipo_costeo_kardexs) {
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
	
	
	
	public function saveRelacionesWithConnection($tipo_costeo_kardex,$parametroauxiliars,$parametroinventarios) {
		$this->saveRelacionesBase($tipo_costeo_kardex,$parametroauxiliars,$parametroinventarios,true);
	}

	public function saveRelaciones($tipo_costeo_kardex,$parametroauxiliars,$parametroinventarios) {
		$this->saveRelacionesBase($tipo_costeo_kardex,$parametroauxiliars,$parametroinventarios,false);
	}

	public function saveRelacionesBase($tipo_costeo_kardex,$parametroauxiliars=array(),$parametroinventarios=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$tipo_costeo_kardex->setparametro_auxiliars($parametroauxiliars);
			$tipo_costeo_kardex->setparametro_inventarios($parametroinventarios);
			$this->settipo_costeo_kardex($tipo_costeo_kardex);

				if(($this->tipo_costeo_kardex->getIsNew() || $this->tipo_costeo_kardex->getIsChanged()) && !$this->tipo_costeo_kardex->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($parametroauxiliars,$parametroinventarios);

				} else if($this->tipo_costeo_kardex->getIsDeleted()) {
					$this->saveRelacionesDetalles($parametroauxiliars,$parametroinventarios);
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
	
	
	public function saveRelacionesDetalles($parametroauxiliars=array(),$parametroinventarios=array()) {
		try {
	

			$idtipo_costeo_kardexActual=$this->gettipo_costeo_kardex()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/general/util/parametro_auxiliar_carga.php');
			parametro_auxiliar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$parametroauxiliarLogic_Desde_tipo_costeo_kardex=new parametro_auxiliar_logic();
			$parametroauxiliarLogic_Desde_tipo_costeo_kardex->setparametro_auxiliars($parametroauxiliars);

			$parametroauxiliarLogic_Desde_tipo_costeo_kardex->setConnexion($this->getConnexion());
			$parametroauxiliarLogic_Desde_tipo_costeo_kardex->setDatosCliente($this->datosCliente);

			foreach($parametroauxiliarLogic_Desde_tipo_costeo_kardex->getparametro_auxiliars() as $parametroauxiliar_Desde_tipo_costeo_kardex) {
				$parametroauxiliar_Desde_tipo_costeo_kardex->setid_tipo_costeo_kardex($idtipo_costeo_kardexActual);
			}

			$parametroauxiliarLogic_Desde_tipo_costeo_kardex->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/parametro_inventario_carga.php');
			parametro_inventario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$parametroinventarioLogic_Desde_tipo_costeo_kardex=new parametro_inventario_logic();
			$parametroinventarioLogic_Desde_tipo_costeo_kardex->setparametro_inventarios($parametroinventarios);

			$parametroinventarioLogic_Desde_tipo_costeo_kardex->setConnexion($this->getConnexion());
			$parametroinventarioLogic_Desde_tipo_costeo_kardex->setDatosCliente($this->datosCliente);

			foreach($parametroinventarioLogic_Desde_tipo_costeo_kardex->getparametro_inventarios() as $parametroinventario_Desde_tipo_costeo_kardex) {
				$parametroinventario_Desde_tipo_costeo_kardex->setid_tipo_costeo_kardex($idtipo_costeo_kardexActual);
			}

			$parametroinventarioLogic_Desde_tipo_costeo_kardex->saves();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $tipo_costeo_kardexs,tipo_costeo_kardex_param_return $tipo_costeo_kardexParameterGeneral) : tipo_costeo_kardex_param_return {
		$tipo_costeo_kardexReturnGeneral=new tipo_costeo_kardex_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $tipo_costeo_kardexReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $tipo_costeo_kardexs,tipo_costeo_kardex_param_return $tipo_costeo_kardexParameterGeneral) : tipo_costeo_kardex_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$tipo_costeo_kardexReturnGeneral=new tipo_costeo_kardex_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $tipo_costeo_kardexReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_costeo_kardexs,tipo_costeo_kardex $tipo_costeo_kardex,tipo_costeo_kardex_param_return $tipo_costeo_kardexParameterGeneral,bool $isEsNuevotipo_costeo_kardex,array $clases) : tipo_costeo_kardex_param_return {
		 try {	
			$tipo_costeo_kardexReturnGeneral=new tipo_costeo_kardex_param_return();
	
			$tipo_costeo_kardexReturnGeneral->settipo_costeo_kardex($tipo_costeo_kardex);
			$tipo_costeo_kardexReturnGeneral->settipo_costeo_kardexs($tipo_costeo_kardexs);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$tipo_costeo_kardexReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $tipo_costeo_kardexReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_costeo_kardexs,tipo_costeo_kardex $tipo_costeo_kardex,tipo_costeo_kardex_param_return $tipo_costeo_kardexParameterGeneral,bool $isEsNuevotipo_costeo_kardex,array $clases) : tipo_costeo_kardex_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$tipo_costeo_kardexReturnGeneral=new tipo_costeo_kardex_param_return();
	
			$tipo_costeo_kardexReturnGeneral->settipo_costeo_kardex($tipo_costeo_kardex);
			$tipo_costeo_kardexReturnGeneral->settipo_costeo_kardexs($tipo_costeo_kardexs);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$tipo_costeo_kardexReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $tipo_costeo_kardexReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_costeo_kardexs,tipo_costeo_kardex $tipo_costeo_kardex,tipo_costeo_kardex_param_return $tipo_costeo_kardexParameterGeneral,bool $isEsNuevotipo_costeo_kardex,array $clases) : tipo_costeo_kardex_param_return {
		 try {	
			$tipo_costeo_kardexReturnGeneral=new tipo_costeo_kardex_param_return();
	
			$tipo_costeo_kardexReturnGeneral->settipo_costeo_kardex($tipo_costeo_kardex);
			$tipo_costeo_kardexReturnGeneral->settipo_costeo_kardexs($tipo_costeo_kardexs);
			
			
			
			return $tipo_costeo_kardexReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_costeo_kardexs,tipo_costeo_kardex $tipo_costeo_kardex,tipo_costeo_kardex_param_return $tipo_costeo_kardexParameterGeneral,bool $isEsNuevotipo_costeo_kardex,array $clases) : tipo_costeo_kardex_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$tipo_costeo_kardexReturnGeneral=new tipo_costeo_kardex_param_return();
	
			$tipo_costeo_kardexReturnGeneral->settipo_costeo_kardex($tipo_costeo_kardex);
			$tipo_costeo_kardexReturnGeneral->settipo_costeo_kardexs($tipo_costeo_kardexs);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $tipo_costeo_kardexReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,tipo_costeo_kardex $tipo_costeo_kardex,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,tipo_costeo_kardex $tipo_costeo_kardex,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		tipo_costeo_kardex_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(tipo_costeo_kardex $tipo_costeo_kardex,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//tipo_costeo_kardex_logic_add::updatetipo_costeo_kardexToGet($this->tipo_costeo_kardex);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$tipo_costeo_kardex->setparametro_auxiliars($this->tipo_costeo_kardexDataAccess->getparametro_auxiliars($this->connexion,$tipo_costeo_kardex));
		$tipo_costeo_kardex->setparametro_inventarios($this->tipo_costeo_kardexDataAccess->getparametro_inventarios($this->connexion,$tipo_costeo_kardex));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==parametro_auxiliar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tipo_costeo_kardex->setparametro_auxiliars($this->tipo_costeo_kardexDataAccess->getparametro_auxiliars($this->connexion,$tipo_costeo_kardex));

				if($this->isConDeep) {
					$parametroauxiliarLogic= new parametro_auxiliar_logic($this->connexion);
					$parametroauxiliarLogic->setparametro_auxiliars($tipo_costeo_kardex->getparametro_auxiliars());
					$classesLocal=parametro_auxiliar_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$parametroauxiliarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					parametro_auxiliar_util::refrescarFKDescripciones($parametroauxiliarLogic->getparametro_auxiliars());
					$tipo_costeo_kardex->setparametro_auxiliars($parametroauxiliarLogic->getparametro_auxiliars());
				}

				continue;
			}

			if($clas->clas==parametro_inventario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tipo_costeo_kardex->setparametro_inventarios($this->tipo_costeo_kardexDataAccess->getparametro_inventarios($this->connexion,$tipo_costeo_kardex));

				if($this->isConDeep) {
					$parametroinventarioLogic= new parametro_inventario_logic($this->connexion);
					$parametroinventarioLogic->setparametro_inventarios($tipo_costeo_kardex->getparametro_inventarios());
					$classesLocal=parametro_inventario_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$parametroinventarioLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					parametro_inventario_util::refrescarFKDescripciones($parametroinventarioLogic->getparametro_inventarios());
					$tipo_costeo_kardex->setparametro_inventarios($parametroinventarioLogic->getparametro_inventarios());
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==parametro_auxiliar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(parametro_auxiliar::$class);
			$tipo_costeo_kardex->setparametro_auxiliars($this->tipo_costeo_kardexDataAccess->getparametro_auxiliars($this->connexion,$tipo_costeo_kardex));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==parametro_inventario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(parametro_inventario::$class);
			$tipo_costeo_kardex->setparametro_inventarios($this->tipo_costeo_kardexDataAccess->getparametro_inventarios($this->connexion,$tipo_costeo_kardex));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {


		$tipo_costeo_kardex->setparametro_auxiliars($this->tipo_costeo_kardexDataAccess->getparametro_auxiliars($this->connexion,$tipo_costeo_kardex));

		foreach($tipo_costeo_kardex->getparametro_auxiliars() as $parametroauxiliar) {
			$parametroauxiliarLogic= new parametro_auxiliar_logic($this->connexion);
			$parametroauxiliarLogic->deepLoad($parametroauxiliar,$isDeep,$deepLoadType,$clases);
		}

		$tipo_costeo_kardex->setparametro_inventarios($this->tipo_costeo_kardexDataAccess->getparametro_inventarios($this->connexion,$tipo_costeo_kardex));

		foreach($tipo_costeo_kardex->getparametro_inventarios() as $parametroinventario) {
			$parametroinventarioLogic= new parametro_inventario_logic($this->connexion);
			$parametroinventarioLogic->deepLoad($parametroinventario,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==parametro_auxiliar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tipo_costeo_kardex->setparametro_auxiliars($this->tipo_costeo_kardexDataAccess->getparametro_auxiliars($this->connexion,$tipo_costeo_kardex));

				foreach($tipo_costeo_kardex->getparametro_auxiliars() as $parametroauxiliar) {
					$parametroauxiliarLogic= new parametro_auxiliar_logic($this->connexion);
					$parametroauxiliarLogic->deepLoad($parametroauxiliar,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==parametro_inventario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tipo_costeo_kardex->setparametro_inventarios($this->tipo_costeo_kardexDataAccess->getparametro_inventarios($this->connexion,$tipo_costeo_kardex));

				foreach($tipo_costeo_kardex->getparametro_inventarios() as $parametroinventario) {
					$parametroinventarioLogic= new parametro_inventario_logic($this->connexion);
					$parametroinventarioLogic->deepLoad($parametroinventario,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==parametro_auxiliar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(parametro_auxiliar::$class);
			$tipo_costeo_kardex->setparametro_auxiliars($this->tipo_costeo_kardexDataAccess->getparametro_auxiliars($this->connexion,$tipo_costeo_kardex));

			foreach($tipo_costeo_kardex->getparametro_auxiliars() as $parametroauxiliar) {
				$parametroauxiliarLogic= new parametro_auxiliar_logic($this->connexion);
				$parametroauxiliarLogic->deepLoad($parametroauxiliar,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==parametro_inventario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(parametro_inventario::$class);
			$tipo_costeo_kardex->setparametro_inventarios($this->tipo_costeo_kardexDataAccess->getparametro_inventarios($this->connexion,$tipo_costeo_kardex));

			foreach($tipo_costeo_kardex->getparametro_inventarios() as $parametroinventario) {
				$parametroinventarioLogic= new parametro_inventario_logic($this->connexion);
				$parametroinventarioLogic->deepLoad($parametroinventario,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(tipo_costeo_kardex $tipo_costeo_kardex,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//tipo_costeo_kardex_logic_add::updatetipo_costeo_kardexToSave($this->tipo_costeo_kardex);			
			
			if(!$paraDeleteCascade) {				
				tipo_costeo_kardex_data::save($tipo_costeo_kardex, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($tipo_costeo_kardex->getparametro_auxiliars() as $parametroauxiliar) {
			$parametroauxiliar->setid_tipo_costeo_kardex($tipo_costeo_kardex->getId());
			parametro_auxiliar_data::save($parametroauxiliar,$this->connexion);
		}


		foreach($tipo_costeo_kardex->getparametro_inventarios() as $parametroinventario) {
			$parametroinventario->setid_tipo_costeo_kardex($tipo_costeo_kardex->getId());
			parametro_inventario_data::save($parametroinventario,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==parametro_auxiliar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tipo_costeo_kardex->getparametro_auxiliars() as $parametroauxiliar) {
					$parametroauxiliar->setid_tipo_costeo_kardex($tipo_costeo_kardex->getId());
					parametro_auxiliar_data::save($parametroauxiliar,$this->connexion);
				}

				continue;
			}

			if($clas->clas==parametro_inventario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tipo_costeo_kardex->getparametro_inventarios() as $parametroinventario) {
					$parametroinventario->setid_tipo_costeo_kardex($tipo_costeo_kardex->getId());
					parametro_inventario_data::save($parametroinventario,$this->connexion);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==parametro_auxiliar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(parametro_auxiliar::$class);

			foreach($tipo_costeo_kardex->getparametro_auxiliars() as $parametroauxiliar) {
				$parametroauxiliar->setid_tipo_costeo_kardex($tipo_costeo_kardex->getId());
				parametro_auxiliar_data::save($parametroauxiliar,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==parametro_inventario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(parametro_inventario::$class);

			foreach($tipo_costeo_kardex->getparametro_inventarios() as $parametroinventario) {
				$parametroinventario->setid_tipo_costeo_kardex($tipo_costeo_kardex->getId());
				parametro_inventario_data::save($parametroinventario,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($tipo_costeo_kardex->getparametro_auxiliars() as $parametroauxiliar) {
			$parametroauxiliarLogic= new parametro_auxiliar_logic($this->connexion);
			$parametroauxiliar->setid_tipo_costeo_kardex($tipo_costeo_kardex->getId());
			parametro_auxiliar_data::save($parametroauxiliar,$this->connexion);
			$parametroauxiliarLogic->deepSave($parametroauxiliar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($tipo_costeo_kardex->getparametro_inventarios() as $parametroinventario) {
			$parametroinventarioLogic= new parametro_inventario_logic($this->connexion);
			$parametroinventario->setid_tipo_costeo_kardex($tipo_costeo_kardex->getId());
			parametro_inventario_data::save($parametroinventario,$this->connexion);
			$parametroinventarioLogic->deepSave($parametroinventario,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==parametro_auxiliar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tipo_costeo_kardex->getparametro_auxiliars() as $parametroauxiliar) {
					$parametroauxiliarLogic= new parametro_auxiliar_logic($this->connexion);
					$parametroauxiliar->setid_tipo_costeo_kardex($tipo_costeo_kardex->getId());
					parametro_auxiliar_data::save($parametroauxiliar,$this->connexion);
					$parametroauxiliarLogic->deepSave($parametroauxiliar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==parametro_inventario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tipo_costeo_kardex->getparametro_inventarios() as $parametroinventario) {
					$parametroinventarioLogic= new parametro_inventario_logic($this->connexion);
					$parametroinventario->setid_tipo_costeo_kardex($tipo_costeo_kardex->getId());
					parametro_inventario_data::save($parametroinventario,$this->connexion);
					$parametroinventarioLogic->deepSave($parametroinventario,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {



		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==parametro_auxiliar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(parametro_auxiliar::$class);

			foreach($tipo_costeo_kardex->getparametro_auxiliars() as $parametroauxiliar) {
				$parametroauxiliarLogic= new parametro_auxiliar_logic($this->connexion);
				$parametroauxiliar->setid_tipo_costeo_kardex($tipo_costeo_kardex->getId());
				parametro_auxiliar_data::save($parametroauxiliar,$this->connexion);
				$parametroauxiliarLogic->deepSave($parametroauxiliar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==parametro_inventario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(parametro_inventario::$class);

			foreach($tipo_costeo_kardex->getparametro_inventarios() as $parametroinventario) {
				$parametroinventarioLogic= new parametro_inventario_logic($this->connexion);
				$parametroinventario->setid_tipo_costeo_kardex($tipo_costeo_kardex->getId());
				parametro_inventario_data::save($parametroinventario,$this->connexion);
				$parametroinventarioLogic->deepSave($parametroinventario,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				tipo_costeo_kardex_data::save($tipo_costeo_kardex, $this->connexion);
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
			
			$this->deepLoad($this->tipo_costeo_kardex,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->tipo_costeo_kardexs as $tipo_costeo_kardex) {
				$this->deepLoad($tipo_costeo_kardex,$isDeep,$deepLoadType,$clases);
								
				tipo_costeo_kardex_util::refrescarFKDescripciones($this->tipo_costeo_kardexs);
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
			
			foreach($this->tipo_costeo_kardexs as $tipo_costeo_kardex) {
				$this->deepLoad($tipo_costeo_kardex,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->tipo_costeo_kardex,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->tipo_costeo_kardexs as $tipo_costeo_kardex) {
				$this->deepSave($tipo_costeo_kardex,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->tipo_costeo_kardexs as $tipo_costeo_kardex) {
				$this->deepSave($tipo_costeo_kardex,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(parametro_auxiliar::$class);
				$classes[]=new Classe(parametro_inventario::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==parametro_auxiliar::$class) {
						$classes[]=new Classe(parametro_auxiliar::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==parametro_inventario::$class) {
						$classes[]=new Classe(parametro_inventario::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==parametro_auxiliar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(parametro_auxiliar::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==parametro_inventario::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(parametro_inventario::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function gettipo_costeo_kardex() : ?tipo_costeo_kardex {	
		/*
		tipo_costeo_kardex_logic_add::checktipo_costeo_kardexToGet($this->tipo_costeo_kardex,$this->datosCliente);
		tipo_costeo_kardex_logic_add::updatetipo_costeo_kardexToGet($this->tipo_costeo_kardex);
		*/
			
		return $this->tipo_costeo_kardex;
	}
		
	public function settipo_costeo_kardex(tipo_costeo_kardex $newtipo_costeo_kardex) {
		$this->tipo_costeo_kardex = $newtipo_costeo_kardex;
	}
	
	public function gettipo_costeo_kardexs() : array {		
		/*
		tipo_costeo_kardex_logic_add::checktipo_costeo_kardexToGets($this->tipo_costeo_kardexs,$this->datosCliente);
		
		foreach ($this->tipo_costeo_kardexs as $tipo_costeo_kardexLocal ) {
			tipo_costeo_kardex_logic_add::updatetipo_costeo_kardexToGet($tipo_costeo_kardexLocal);
		}
		*/
		
		return $this->tipo_costeo_kardexs;
	}
	
	public function settipo_costeo_kardexs(array $newtipo_costeo_kardexs) {
		$this->tipo_costeo_kardexs = $newtipo_costeo_kardexs;
	}
	
	public function gettipo_costeo_kardexDataAccess() : tipo_costeo_kardex_data {
		return $this->tipo_costeo_kardexDataAccess;
	}
	
	public function settipo_costeo_kardexDataAccess(tipo_costeo_kardex_data $newtipo_costeo_kardexDataAccess) {
		$this->tipo_costeo_kardexDataAccess = $newtipo_costeo_kardexDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        tipo_costeo_kardex_carga::$CONTROLLER;;        
		
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
