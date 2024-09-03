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

namespace com\bydan\contabilidad\inventario\kardex\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\inventario\kardex\util\kardex_carga;
use com\bydan\contabilidad\inventario\kardex\util\kardex_param_return;

use com\bydan\contabilidad\inventario\kardex\presentation\session\kardex_session;

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

use com\bydan\contabilidad\inventario\kardex\util\kardex_util;
use com\bydan\contabilidad\inventario\kardex\business\entity\kardex;
use com\bydan\contabilidad\inventario\kardex\business\data\kardex_data;

//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;
use com\bydan\contabilidad\general\sucursal\business\data\sucursal_data;
use com\bydan\contabilidad\general\sucursal\business\logic\sucursal_logic;
use com\bydan\contabilidad\general\sucursal\util\sucursal_util;

use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;
use com\bydan\contabilidad\contabilidad\ejercicio\business\data\ejercicio_data;
use com\bydan\contabilidad\contabilidad\ejercicio\business\logic\ejercicio_logic;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_util;

use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;
use com\bydan\contabilidad\contabilidad\periodo\business\data\periodo_data;
use com\bydan\contabilidad\contabilidad\periodo\business\logic\periodo_logic;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_util;

use com\bydan\contabilidad\seguridad\usuario\business\data\usuario_data;
use com\bydan\contabilidad\seguridad\usuario\business\logic\usuario_logic;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

use com\bydan\contabilidad\seguridad\modulo\business\data\modulo_data;
use com\bydan\contabilidad\seguridad\modulo\business\logic\modulo_logic;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_util;

use com\bydan\contabilidad\inventario\tipo_kardex\business\entity\tipo_kardex;
use com\bydan\contabilidad\inventario\tipo_kardex\business\data\tipo_kardex_data;
use com\bydan\contabilidad\inventario\tipo_kardex\business\logic\tipo_kardex_logic;
use com\bydan\contabilidad\inventario\tipo_kardex\util\tipo_kardex_util;

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\data\proveedor_data;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\business\data\cliente_data;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;

use com\bydan\contabilidad\general\estado\business\entity\estado;
use com\bydan\contabilidad\general\estado\business\data\estado_data;
use com\bydan\contabilidad\general\estado\business\logic\estado_logic;
use com\bydan\contabilidad\general\estado\util\estado_util;

//REL


use com\bydan\contabilidad\inventario\kardex_detalle\business\entity\kardex_detalle;
use com\bydan\contabilidad\inventario\kardex_detalle\business\data\kardex_detalle_data;
use com\bydan\contabilidad\inventario\kardex_detalle\business\logic\kardex_detalle_logic;
use com\bydan\contabilidad\inventario\kardex_detalle\util\kardex_detalle_carga;
use com\bydan\contabilidad\inventario\kardex_detalle\util\kardex_detalle_util;

//REL DETALLES




class kardex_logic  extends GeneralEntityLogic implements kardex_logicI {	
	/*GENERAL*/
	public kardex_data $kardexDataAccess;
	public ?kardex_logic_add $kardexLogicAdditional=null;
	public ?kardex $kardex;
	public array $kardexs;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->kardexDataAccess = new kardex_data();			
			$this->kardexs = array();
			$this->kardex = new kardex();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->kardexLogicAdditional = new kardex_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		if($this->kardexLogicAdditional==null) {
			$this->kardexLogicAdditional=new kardex_logic_add();
		}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->kardexDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->kardexDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->kardexDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->kardexDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->kardexs = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->kardexs=$this->kardexDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				kardex_util::refrescarFKDescripciones($this->kardexs);
			}
			
			kardex_logic_add::checkkardexToGets($this->kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->kardexs);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->kardexs = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->kardexs=$this->kardexDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				kardex_util::refrescarFKDescripciones($this->kardexs);
			}
			
			kardex_logic_add::checkkardexToGets($this->kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->kardexs);
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
		$this->kardex = new kardex();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->kardex=$this->kardexDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->kardex,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				kardex_util::refrescarFKDescripcion($this->kardex);
			}
						
			kardex_logic_add::checkkardexToGet($this->kardex,$this->datosCliente);
			kardex_logic_add::updatekardexToGet($this->kardex);
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
		$this->kardex = new  kardex();
		  		  
        try {		
			$this->kardex=$this->kardexDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->kardex,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				kardex_util::refrescarFKDescripcion($this->kardex);
			}
			
			kardex_logic_add::checkkardexToGet($this->kardex,$this->datosCliente);
			kardex_logic_add::updatekardexToGet($this->kardex);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?kardex {
		$kardexLogic = new  kardex_logic();
		  		  
        try {		
			$kardexLogic->setConnexion($connexion);			
			$kardexLogic->getEntity($id);			
			return $kardexLogic->getkardex();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->kardex = new  kardex();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->kardex=$this->kardexDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->kardex,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				kardex_util::refrescarFKDescripcion($this->kardex);
			}
			
			kardex_logic_add::checkkardexToGet($this->kardex,$this->datosCliente);
			kardex_logic_add::updatekardexToGet($this->kardex);
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
		$this->kardex = new  kardex();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->kardex=$this->kardexDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->kardex,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				kardex_util::refrescarFKDescripcion($this->kardex);
			}
			
			kardex_logic_add::checkkardexToGet($this->kardex,$this->datosCliente);
			kardex_logic_add::updatekardexToGet($this->kardex);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?kardex {
		$kardexLogic = new  kardex_logic();
		  		  
        try {		
			$kardexLogic->setConnexion($connexion);			
			$kardexLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $kardexLogic->getkardex();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->kardexs = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->kardexs=$this->kardexDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				kardex_util::refrescarFKDescripciones($this->kardexs);
			}
			
			kardex_logic_add::checkkardexToGets($this->kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->kardexs);			
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
		$this->kardexs = array();
		  		  
        try {			
			$this->kardexs=$this->kardexDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				kardex_util::refrescarFKDescripciones($this->kardexs);
			}
			
			kardex_logic_add::checkkardexToGets($this->kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->kardexs);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->kardexs = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->kardexs=$this->kardexDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				kardex_util::refrescarFKDescripciones($this->kardexs);
			}
			
			kardex_logic_add::checkkardexToGets($this->kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->kardexs);
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
		$this->kardexs = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->kardexs=$this->kardexDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				kardex_util::refrescarFKDescripciones($this->kardexs);
			}
			
			kardex_logic_add::checkkardexToGets($this->kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->kardexs);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$kardexLogic = new  kardex_logic();
		  		  
        try {		
			$kardexLogic->setConnexion($connexion);			
			$kardexLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $kardexLogic->getkardexs();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->kardexs = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->kardexs=$this->kardexDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				kardex_util::refrescarFKDescripciones($this->kardexs);
			}
			
			kardex_logic_add::checkkardexToGets($this->kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->kardexs);
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
		$this->kardexs = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->kardexs=$this->kardexDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				kardex_util::refrescarFKDescripciones($this->kardexs);
			}
			
			kardex_logic_add::checkkardexToGets($this->kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->kardexs);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->kardexs = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->kardexs=$this->kardexDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				kardex_util::refrescarFKDescripciones($this->kardexs);
			}
			
			kardex_logic_add::checkkardexToGets($this->kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->kardexs);
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
		$this->kardexs = array();
		  		  
        try {			
			$this->kardexs=$this->kardexDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				kardex_util::refrescarFKDescripciones($this->kardexs);
			}	
			
			kardex_logic_add::checkkardexToGets($this->kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->kardexs);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->kardexs = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->kardexs=$this->kardexDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				kardex_util::refrescarFKDescripciones($this->kardexs);
			}
			
			kardex_logic_add::checkkardexToGets($this->kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->kardexs);
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
		$this->kardexs = array();
		  		  
        try {		
			$this->kardexs=$this->kardexDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				kardex_util::refrescarFKDescripciones($this->kardexs);
			}
			
			kardex_logic_add::checkkardexToGets($this->kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->kardexs);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_IdclienteWithConnection(string $strFinalQuery,Pagination $pagination,?int $id_cliente) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cliente= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cliente,kardex_util::$ID_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cliente);

			$this->kardexs=$this->kardexDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				kardex_util::refrescarFKDescripciones($this->kardexs);
			}
			kardex_logic_add::checkkardexToGets($this->kardexs,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->kardexs);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcliente(string $strFinalQuery,Pagination $pagination,?int $id_cliente) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cliente= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cliente,kardex_util::$ID_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cliente);

			$this->kardexs=$this->kardexDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				kardex_util::refrescarFKDescripciones($this->kardexs);
			}
			kardex_logic_add::checkkardexToGets($this->kardexs,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->kardexs);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdejercicioWithConnection(string $strFinalQuery,Pagination $pagination,int $id_ejercicio) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_ejercicio= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,kardex_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->kardexs=$this->kardexDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				kardex_util::refrescarFKDescripciones($this->kardexs);
			}
			kardex_logic_add::checkkardexToGets($this->kardexs,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->kardexs);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idejercicio(string $strFinalQuery,Pagination $pagination,int $id_ejercicio) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_ejercicio= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,kardex_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->kardexs=$this->kardexDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				kardex_util::refrescarFKDescripciones($this->kardexs);
			}
			kardex_logic_add::checkkardexToGets($this->kardexs,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->kardexs);
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,kardex_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->kardexs=$this->kardexDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				kardex_util::refrescarFKDescripciones($this->kardexs);
			}
			kardex_logic_add::checkkardexToGets($this->kardexs,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->kardexs);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,kardex_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->kardexs=$this->kardexDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				kardex_util::refrescarFKDescripciones($this->kardexs);
			}
			kardex_logic_add::checkkardexToGets($this->kardexs,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->kardexs);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdestadoWithConnection(string $strFinalQuery,Pagination $pagination,int $id_estado) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_estado= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_estado->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_estado,kardex_util::$ID_ESTADO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_estado);

			$this->kardexs=$this->kardexDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				kardex_util::refrescarFKDescripciones($this->kardexs);
			}
			kardex_logic_add::checkkardexToGets($this->kardexs,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->kardexs);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idestado(string $strFinalQuery,Pagination $pagination,int $id_estado) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_estado= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_estado->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_estado,kardex_util::$ID_ESTADO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_estado);

			$this->kardexs=$this->kardexDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				kardex_util::refrescarFKDescripciones($this->kardexs);
			}
			kardex_logic_add::checkkardexToGets($this->kardexs,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->kardexs);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdmoduloWithConnection(string $strFinalQuery,Pagination $pagination,int $id_modulo) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_modulo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_modulo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_modulo,kardex_util::$ID_MODULO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_modulo);

			$this->kardexs=$this->kardexDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				kardex_util::refrescarFKDescripciones($this->kardexs);
			}
			kardex_logic_add::checkkardexToGets($this->kardexs,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->kardexs);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idmodulo(string $strFinalQuery,Pagination $pagination,int $id_modulo) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_modulo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_modulo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_modulo,kardex_util::$ID_MODULO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_modulo);

			$this->kardexs=$this->kardexDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				kardex_util::refrescarFKDescripciones($this->kardexs);
			}
			kardex_logic_add::checkkardexToGets($this->kardexs,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->kardexs);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdperiodoWithConnection(string $strFinalQuery,Pagination $pagination,int $id_periodo) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_periodo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,kardex_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->kardexs=$this->kardexDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				kardex_util::refrescarFKDescripciones($this->kardexs);
			}
			kardex_logic_add::checkkardexToGets($this->kardexs,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->kardexs);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idperiodo(string $strFinalQuery,Pagination $pagination,int $id_periodo) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_periodo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,kardex_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->kardexs=$this->kardexDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				kardex_util::refrescarFKDescripciones($this->kardexs);
			}
			kardex_logic_add::checkkardexToGets($this->kardexs,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->kardexs);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdproveedorWithConnection(string $strFinalQuery,Pagination $pagination,?int $id_proveedor) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_proveedor= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_proveedor,kardex_util::$ID_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_proveedor);

			$this->kardexs=$this->kardexDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				kardex_util::refrescarFKDescripciones($this->kardexs);
			}
			kardex_logic_add::checkkardexToGets($this->kardexs,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->kardexs);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idproveedor(string $strFinalQuery,Pagination $pagination,?int $id_proveedor) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_proveedor= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_proveedor,kardex_util::$ID_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_proveedor);

			$this->kardexs=$this->kardexDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				kardex_util::refrescarFKDescripciones($this->kardexs);
			}
			kardex_logic_add::checkkardexToGets($this->kardexs,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->kardexs);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdsucursalWithConnection(string $strFinalQuery,Pagination $pagination,int $id_sucursal) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_sucursal= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,kardex_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->kardexs=$this->kardexDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				kardex_util::refrescarFKDescripciones($this->kardexs);
			}
			kardex_logic_add::checkkardexToGets($this->kardexs,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->kardexs);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idsucursal(string $strFinalQuery,Pagination $pagination,int $id_sucursal) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_sucursal= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,kardex_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->kardexs=$this->kardexDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				kardex_util::refrescarFKDescripciones($this->kardexs);
			}
			kardex_logic_add::checkkardexToGets($this->kardexs,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->kardexs);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idtipo_kardexWithConnection(string $strFinalQuery,Pagination $pagination,int $id_tipo_kardex) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_tipo_kardex= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_tipo_kardex->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_kardex,kardex_util::$ID_TIPO_KARDEX,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_kardex);

			$this->kardexs=$this->kardexDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				kardex_util::refrescarFKDescripciones($this->kardexs);
			}
			kardex_logic_add::checkkardexToGets($this->kardexs,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->kardexs);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idtipo_kardex(string $strFinalQuery,Pagination $pagination,int $id_tipo_kardex) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_tipo_kardex= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_tipo_kardex->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_kardex,kardex_util::$ID_TIPO_KARDEX,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_kardex);

			$this->kardexs=$this->kardexDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				kardex_util::refrescarFKDescripciones($this->kardexs);
			}
			kardex_logic_add::checkkardexToGets($this->kardexs,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->kardexs);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdusuarioWithConnection(string $strFinalQuery,Pagination $pagination,int $id_usuario) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_usuario= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,kardex_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->kardexs=$this->kardexDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				kardex_util::refrescarFKDescripciones($this->kardexs);
			}
			kardex_logic_add::checkkardexToGets($this->kardexs,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->kardexs);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idusuario(string $strFinalQuery,Pagination $pagination,int $id_usuario) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_usuario= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,kardex_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->kardexs=$this->kardexDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				kardex_util::refrescarFKDescripciones($this->kardexs);
			}
			kardex_logic_add::checkkardexToGets($this->kardexs,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->kardexs);
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
						
			//kardex_logic_add::checkkardexToSave($this->kardex,$this->datosCliente,$this->connexion);	       
			kardex_logic_add::updatekardexToSave($this->kardex);			
			kardex_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->kardex,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			$this->kardexLogicAdditional->checkGeneralEntityToSave($this,$this->kardex,$this->datosCliente,$this->connexion);
			
			
			kardex_data::save($this->kardex, $this->connexion);	    	       	 				
			//kardex_logic_add::checkkardexToSaveAfter($this->kardex,$this->datosCliente,$this->connexion);			
			$this->kardexLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->kardex,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->kardex,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->kardex,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				kardex_util::refrescarFKDescripcion($this->kardex);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->kardex->getIsDeleted()) {
				$this->kardex=null;
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
						
			/*kardex_logic_add::checkkardexToSave($this->kardex,$this->datosCliente,$this->connexion);*/	        
			kardex_logic_add::updatekardexToSave($this->kardex);			
			$this->kardexLogicAdditional->checkGeneralEntityToSave($this,$this->kardex,$this->datosCliente,$this->connexion);			
			kardex_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->kardex,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			kardex_data::save($this->kardex, $this->connexion);	    	       	 						
			/*kardex_logic_add::checkkardexToSaveAfter($this->kardex,$this->datosCliente,$this->connexion);*/			
			$this->kardexLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->kardex,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->kardex,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->kardex,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				kardex_util::refrescarFKDescripcion($this->kardex);				
			}
			
			if($this->kardex->getIsDeleted()) {
				$this->kardex=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(kardex $kardex,Connexion $connexion)  {
		$kardexLogic = new  kardex_logic();		  		  
        try {		
			$kardexLogic->setConnexion($connexion);			
			$kardexLogic->setkardex($kardex);			
			$kardexLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*kardex_logic_add::checkkardexToSaves($this->kardexs,$this->datosCliente,$this->connexion);*/	        	
			$this->kardexLogicAdditional->checkGeneralEntitiesToSaves($this,$this->kardexs,$this->datosCliente,$this->connexion);
			
	   		foreach($this->kardexs as $kardexLocal) {				
								
				kardex_logic_add::updatekardexToSave($kardexLocal);	        	
				kardex_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$kardexLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				kardex_data::save($kardexLocal, $this->connexion);				
			}
			
			/*kardex_logic_add::checkkardexToSavesAfter($this->kardexs,$this->datosCliente,$this->connexion);*/			
			$this->kardexLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->kardexs,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				kardex_util::refrescarFKDescripciones($this->kardexs);
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
			/*kardex_logic_add::checkkardexToSaves($this->kardexs,$this->datosCliente,$this->connexion);*/			
			$this->kardexLogicAdditional->checkGeneralEntitiesToSaves($this,$this->kardexs,$this->datosCliente,$this->connexion);
			
	   		foreach($this->kardexs as $kardexLocal) {				
								
				kardex_logic_add::updatekardexToSave($kardexLocal);	        	
				kardex_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$kardexLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				kardex_data::save($kardexLocal, $this->connexion);				
			}			
			
			/*kardex_logic_add::checkkardexToSavesAfter($this->kardexs,$this->datosCliente,$this->connexion);*/			
			$this->kardexLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->kardexs,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				kardex_util::refrescarFKDescripciones($this->kardexs);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $kardexs,Connexion $connexion)  {
		$kardexLogic = new  kardex_logic();
		  		  
        try {		
			$kardexLogic->setConnexion($connexion);			
			$kardexLogic->setkardexs($kardexs);			
			$kardexLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$kardexsAux=array();
		
		foreach($this->kardexs as $kardex) {
			if($kardex->getIsDeleted()==false) {
				$kardexsAux[]=$kardex;
			}
		}
		
		$this->kardexs=$kardexsAux;
	}
	
	public function updateToGetsAuxiliar(array &$kardexs) {
		if($this->kardexLogicAdditional==null) {
			$this->kardexLogicAdditional=new kardex_logic_add();
		}
		
		
		$this->kardexLogicAdditional->updateToGets($kardexs,$this);					
		$this->kardexLogicAdditional->updateToGetsReferencia($kardexs,$this);			
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->kardexs as $kardex) {
				
				$kardex->setid_empresa_Descripcion(kardex_util::getempresaDescripcion($kardex->getempresa()));
				$kardex->setid_sucursal_Descripcion(kardex_util::getsucursalDescripcion($kardex->getsucursal()));
				$kardex->setid_ejercicio_Descripcion(kardex_util::getejercicioDescripcion($kardex->getejercicio()));
				$kardex->setid_periodo_Descripcion(kardex_util::getperiodoDescripcion($kardex->getperiodo()));
				$kardex->setid_usuario_Descripcion(kardex_util::getusuarioDescripcion($kardex->getusuario()));
				$kardex->setid_modulo_Descripcion(kardex_util::getmoduloDescripcion($kardex->getmodulo()));
				$kardex->setid_tipo_kardex_Descripcion(kardex_util::gettipo_kardexDescripcion($kardex->gettipo_kardex()));
				$kardex->setid_proveedor_Descripcion(kardex_util::getproveedorDescripcion($kardex->getproveedor()));
				$kardex->setid_cliente_Descripcion(kardex_util::getclienteDescripcion($kardex->getcliente()));
				$kardex->setid_estado_Descripcion(kardex_util::getestadoDescripcion($kardex->getestado()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$kardex_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$kardex_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$kardex_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$kardex_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$kardex_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$kardexForeignKey=new kardex_param_return();//kardexForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$kardexForeignKey,$kardex_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTipos,',')) {
				$this->cargarCombossucursalsFK($this->connexion,$strRecargarFkQuery,$kardexForeignKey,$kardex_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTipos,',')) {
				$this->cargarCombosejerciciosFK($this->connexion,$strRecargarFkQuery,$kardexForeignKey,$kardex_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTipos,',')) {
				$this->cargarCombosperiodosFK($this->connexion,$strRecargarFkQuery,$kardexForeignKey,$kardex_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTipos,',')) {
				$this->cargarCombosusuariosFK($this->connexion,$strRecargarFkQuery,$kardexForeignKey,$kardex_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_modulo',$strRecargarFkTipos,',')) {
				$this->cargarCombosmodulosFK($this->connexion,$strRecargarFkQuery,$kardexForeignKey,$kardex_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tipo_kardex',$strRecargarFkTipos,',')) {
				$this->cargarCombostipo_kardexsFK($this->connexion,$strRecargarFkQuery,$kardexForeignKey,$kardex_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_proveedor',$strRecargarFkTipos,',')) {
				$this->cargarCombosproveedorsFK($this->connexion,$strRecargarFkQuery,$kardexForeignKey,$kardex_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cliente',$strRecargarFkTipos,',')) {
				$this->cargarCombosclientesFK($this->connexion,$strRecargarFkQuery,$kardexForeignKey,$kardex_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_estado',$strRecargarFkTipos,',')) {
				$this->cargarCombosestadosFK($this->connexion,$strRecargarFkQuery,$kardexForeignKey,$kardex_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$kardexForeignKey,$kardex_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombossucursalsFK($this->connexion,' where id=-1 ',$kardexForeignKey,$kardex_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosejerciciosFK($this->connexion,' where id=-1 ',$kardexForeignKey,$kardex_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosperiodosFK($this->connexion,' where id=-1 ',$kardexForeignKey,$kardex_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosusuariosFK($this->connexion,' where id=-1 ',$kardexForeignKey,$kardex_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_modulo',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosmodulosFK($this->connexion,' where id=-1 ',$kardexForeignKey,$kardex_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_tipo_kardex',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombostipo_kardexsFK($this->connexion,' where id=-1 ',$kardexForeignKey,$kardex_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_proveedor',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosproveedorsFK($this->connexion,' where id=-1 ',$kardexForeignKey,$kardex_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cliente',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosclientesFK($this->connexion,' where id=-1 ',$kardexForeignKey,$kardex_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_estado',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosestadosFK($this->connexion,' where id=-1 ',$kardexForeignKey,$kardex_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $kardexForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$kardexForeignKey,$kardex_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$kardexForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($kardex_session==null) {
			$kardex_session=new kardex_session();
		}
		
		if($kardex_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($kardexForeignKey->idempresaDefaultFK==0) {
					$kardexForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$kardexForeignKey->empresasFK[$empresaLocal->getId()]=kardex_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($kardex_session->bigidempresaActual!=null && $kardex_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($kardex_session->bigidempresaActual);//WithConnection

				$kardexForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=kardex_util::getempresaDescripcion($empresaLogic->getempresa());
				$kardexForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombossucursalsFK($connexion=null,$strRecargarFkQuery='',$kardexForeignKey,$kardex_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$sucursalLogic= new sucursal_logic();
		$pagination= new Pagination();
		$kardexForeignKey->sucursalsFK=array();

		$sucursalLogic->setConnexion($connexion);
		$sucursalLogic->getsucursalDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($kardex_session==null) {
			$kardex_session=new kardex_session();
		}
		
		if($kardex_session->bitBusquedaDesdeFKSesionsucursal!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=sucursal_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalsucursal=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalsucursal=Funciones::GetFinalQueryAppend($finalQueryGlobalsucursal, '');
				$finalQueryGlobalsucursal.=sucursal_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalsucursal.$strRecargarFkQuery;		

				$sucursalLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($sucursalLogic->getsucursals() as $sucursalLocal ) {
				if($kardexForeignKey->idsucursalDefaultFK==0) {
					$kardexForeignKey->idsucursalDefaultFK=$sucursalLocal->getId();
				}

				$kardexForeignKey->sucursalsFK[$sucursalLocal->getId()]=kardex_util::getsucursalDescripcion($sucursalLocal);
			}

		} else {

			if($kardex_session->bigidsucursalActual!=null && $kardex_session->bigidsucursalActual > 0) {
				$sucursalLogic->getEntity($kardex_session->bigidsucursalActual);//WithConnection

				$kardexForeignKey->sucursalsFK[$sucursalLogic->getsucursal()->getId()]=kardex_util::getsucursalDescripcion($sucursalLogic->getsucursal());
				$kardexForeignKey->idsucursalDefaultFK=$sucursalLogic->getsucursal()->getId();
			}
		}
	}

	public function cargarCombosejerciciosFK($connexion=null,$strRecargarFkQuery='',$kardexForeignKey,$kardex_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$ejercicioLogic= new ejercicio_logic();
		$pagination= new Pagination();
		$kardexForeignKey->ejerciciosFK=array();

		$ejercicioLogic->setConnexion($connexion);
		$ejercicioLogic->getejercicioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($kardex_session==null) {
			$kardex_session=new kardex_session();
		}
		
		if($kardex_session->bitBusquedaDesdeFKSesionejercicio!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=ejercicio_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalejercicio=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalejercicio=Funciones::GetFinalQueryAppend($finalQueryGlobalejercicio, '');
				$finalQueryGlobalejercicio.=ejercicio_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalejercicio.$strRecargarFkQuery;		

				$ejercicioLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($ejercicioLogic->getejercicios() as $ejercicioLocal ) {
				if($kardexForeignKey->idejercicioDefaultFK==0) {
					$kardexForeignKey->idejercicioDefaultFK=$ejercicioLocal->getId();
				}

				$kardexForeignKey->ejerciciosFK[$ejercicioLocal->getId()]=kardex_util::getejercicioDescripcion($ejercicioLocal);
			}

		} else {

			if($kardex_session->bigidejercicioActual!=null && $kardex_session->bigidejercicioActual > 0) {
				$ejercicioLogic->getEntity($kardex_session->bigidejercicioActual);//WithConnection

				$kardexForeignKey->ejerciciosFK[$ejercicioLogic->getejercicio()->getId()]=kardex_util::getejercicioDescripcion($ejercicioLogic->getejercicio());
				$kardexForeignKey->idejercicioDefaultFK=$ejercicioLogic->getejercicio()->getId();
			}
		}
	}

	public function cargarCombosperiodosFK($connexion=null,$strRecargarFkQuery='',$kardexForeignKey,$kardex_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$periodoLogic= new periodo_logic();
		$pagination= new Pagination();
		$kardexForeignKey->periodosFK=array();

		$periodoLogic->setConnexion($connexion);
		$periodoLogic->getperiodoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($kardex_session==null) {
			$kardex_session=new kardex_session();
		}
		
		if($kardex_session->bitBusquedaDesdeFKSesionperiodo!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=periodo_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalperiodo=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalperiodo=Funciones::GetFinalQueryAppend($finalQueryGlobalperiodo, '');
				$finalQueryGlobalperiodo.=periodo_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalperiodo.$strRecargarFkQuery;		

				$periodoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($periodoLogic->getperiodos() as $periodoLocal ) {
				if($kardexForeignKey->idperiodoDefaultFK==0) {
					$kardexForeignKey->idperiodoDefaultFK=$periodoLocal->getId();
				}

				$kardexForeignKey->periodosFK[$periodoLocal->getId()]=kardex_util::getperiodoDescripcion($periodoLocal);
			}

		} else {

			if($kardex_session->bigidperiodoActual!=null && $kardex_session->bigidperiodoActual > 0) {
				$periodoLogic->getEntity($kardex_session->bigidperiodoActual);//WithConnection

				$kardexForeignKey->periodosFK[$periodoLogic->getperiodo()->getId()]=kardex_util::getperiodoDescripcion($periodoLogic->getperiodo());
				$kardexForeignKey->idperiodoDefaultFK=$periodoLogic->getperiodo()->getId();
			}
		}
	}

	public function cargarCombosusuariosFK($connexion=null,$strRecargarFkQuery='',$kardexForeignKey,$kardex_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$usuarioLogic= new usuario_logic();
		$pagination= new Pagination();
		$kardexForeignKey->usuariosFK=array();

		$usuarioLogic->setConnexion($connexion);
		$usuarioLogic->getusuarioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($kardex_session==null) {
			$kardex_session=new kardex_session();
		}
		
		if($kardex_session->bitBusquedaDesdeFKSesionusuario!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=usuario_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalusuario=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalusuario=Funciones::GetFinalQueryAppend($finalQueryGlobalusuario, '');
				$finalQueryGlobalusuario.=usuario_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalusuario.$strRecargarFkQuery;		

				$usuarioLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($usuarioLogic->getusuarios() as $usuarioLocal ) {
				if($kardexForeignKey->idusuarioDefaultFK==0) {
					$kardexForeignKey->idusuarioDefaultFK=$usuarioLocal->getId();
				}

				$kardexForeignKey->usuariosFK[$usuarioLocal->getId()]=kardex_util::getusuarioDescripcion($usuarioLocal);
			}

		} else {

			if($kardex_session->bigidusuarioActual!=null && $kardex_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($kardex_session->bigidusuarioActual);//WithConnection

				$kardexForeignKey->usuariosFK[$usuarioLogic->getusuario()->getId()]=kardex_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$kardexForeignKey->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	public function cargarCombosmodulosFK($connexion=null,$strRecargarFkQuery='',$kardexForeignKey,$kardex_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$moduloLogic= new modulo_logic();
		$pagination= new Pagination();
		$kardexForeignKey->modulosFK=array();

		$moduloLogic->setConnexion($connexion);
		$moduloLogic->getmoduloDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($kardex_session==null) {
			$kardex_session=new kardex_session();
		}
		
		if($kardex_session->bitBusquedaDesdeFKSesionmodulo!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=modulo_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalmodulo=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalmodulo=Funciones::GetFinalQueryAppend($finalQueryGlobalmodulo, '');
				$finalQueryGlobalmodulo.=modulo_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalmodulo.$strRecargarFkQuery;		

				$moduloLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($moduloLogic->getmodulos() as $moduloLocal ) {
				if($kardexForeignKey->idmoduloDefaultFK==0) {
					$kardexForeignKey->idmoduloDefaultFK=$moduloLocal->getId();
				}

				$kardexForeignKey->modulosFK[$moduloLocal->getId()]=kardex_util::getmoduloDescripcion($moduloLocal);
			}

		} else {

			if($kardex_session->bigidmoduloActual!=null && $kardex_session->bigidmoduloActual > 0) {
				$moduloLogic->getEntity($kardex_session->bigidmoduloActual);//WithConnection

				$kardexForeignKey->modulosFK[$moduloLogic->getmodulo()->getId()]=kardex_util::getmoduloDescripcion($moduloLogic->getmodulo());
				$kardexForeignKey->idmoduloDefaultFK=$moduloLogic->getmodulo()->getId();
			}
		}
	}

	public function cargarCombostipo_kardexsFK($connexion=null,$strRecargarFkQuery='',$kardexForeignKey,$kardex_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$tipo_kardexLogic= new tipo_kardex_logic();
		$pagination= new Pagination();
		$kardexForeignKey->tipo_kardexsFK=array();

		$tipo_kardexLogic->setConnexion($connexion);
		$tipo_kardexLogic->gettipo_kardexDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($kardex_session==null) {
			$kardex_session=new kardex_session();
		}
		
		if($kardex_session->bitBusquedaDesdeFKSesiontipo_kardex!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=tipo_kardex_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobaltipo_kardex=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltipo_kardex=Funciones::GetFinalQueryAppend($finalQueryGlobaltipo_kardex, '');
				$finalQueryGlobaltipo_kardex.=tipo_kardex_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltipo_kardex.$strRecargarFkQuery;		

				$tipo_kardexLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($tipo_kardexLogic->gettipo_kardexs() as $tipo_kardexLocal ) {
				if($kardexForeignKey->idtipo_kardexDefaultFK==0) {
					$kardexForeignKey->idtipo_kardexDefaultFK=$tipo_kardexLocal->getId();
				}

				$kardexForeignKey->tipo_kardexsFK[$tipo_kardexLocal->getId()]=kardex_util::gettipo_kardexDescripcion($tipo_kardexLocal);
			}

		} else {

			if($kardex_session->bigidtipo_kardexActual!=null && $kardex_session->bigidtipo_kardexActual > 0) {
				$tipo_kardexLogic->getEntity($kardex_session->bigidtipo_kardexActual);//WithConnection

				$kardexForeignKey->tipo_kardexsFK[$tipo_kardexLogic->gettipo_kardex()->getId()]=kardex_util::gettipo_kardexDescripcion($tipo_kardexLogic->gettipo_kardex());
				$kardexForeignKey->idtipo_kardexDefaultFK=$tipo_kardexLogic->gettipo_kardex()->getId();
			}
		}
	}

	public function cargarCombosproveedorsFK($connexion=null,$strRecargarFkQuery='',$kardexForeignKey,$kardex_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$proveedorLogic= new proveedor_logic();
		$pagination= new Pagination();
		$kardexForeignKey->proveedorsFK=array();

		$proveedorLogic->setConnexion($connexion);
		$proveedorLogic->getproveedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($kardex_session==null) {
			$kardex_session=new kardex_session();
		}
		
		if($kardex_session->bitBusquedaDesdeFKSesionproveedor!=true) {
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
				if($kardexForeignKey->idproveedorDefaultFK==0) {
					$kardexForeignKey->idproveedorDefaultFK=$proveedorLocal->getId();
				}

				$kardexForeignKey->proveedorsFK[$proveedorLocal->getId()]=kardex_util::getproveedorDescripcion($proveedorLocal);
			}

		} else {

			if($kardex_session->bigidproveedorActual!=null && $kardex_session->bigidproveedorActual > 0) {
				$proveedorLogic->getEntity($kardex_session->bigidproveedorActual);//WithConnection

				$kardexForeignKey->proveedorsFK[$proveedorLogic->getproveedor()->getId()]=kardex_util::getproveedorDescripcion($proveedorLogic->getproveedor());
				$kardexForeignKey->idproveedorDefaultFK=$proveedorLogic->getproveedor()->getId();
			}
		}
	}

	public function cargarCombosclientesFK($connexion=null,$strRecargarFkQuery='',$kardexForeignKey,$kardex_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$clienteLogic= new cliente_logic();
		$pagination= new Pagination();
		$kardexForeignKey->clientesFK=array();

		$clienteLogic->setConnexion($connexion);
		$clienteLogic->getclienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($kardex_session==null) {
			$kardex_session=new kardex_session();
		}
		
		if($kardex_session->bitBusquedaDesdeFKSesioncliente!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=cliente_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalcliente=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcliente=Funciones::GetFinalQueryAppend($finalQueryGlobalcliente, '');
				$finalQueryGlobalcliente.=cliente_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcliente.$strRecargarFkQuery;		

				$clienteLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($clienteLogic->getclientes() as $clienteLocal ) {
				if($kardexForeignKey->idclienteDefaultFK==0) {
					$kardexForeignKey->idclienteDefaultFK=$clienteLocal->getId();
				}

				$kardexForeignKey->clientesFK[$clienteLocal->getId()]=kardex_util::getclienteDescripcion($clienteLocal);
			}

		} else {

			if($kardex_session->bigidclienteActual!=null && $kardex_session->bigidclienteActual > 0) {
				$clienteLogic->getEntity($kardex_session->bigidclienteActual);//WithConnection

				$kardexForeignKey->clientesFK[$clienteLogic->getcliente()->getId()]=kardex_util::getclienteDescripcion($clienteLogic->getcliente());
				$kardexForeignKey->idclienteDefaultFK=$clienteLogic->getcliente()->getId();
			}
		}
	}

	public function cargarCombosestadosFK($connexion=null,$strRecargarFkQuery='',$kardexForeignKey,$kardex_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$estadoLogic= new estado_logic();
		$pagination= new Pagination();
		$kardexForeignKey->estadosFK=array();

		$estadoLogic->setConnexion($connexion);
		$estadoLogic->getestadoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($kardex_session==null) {
			$kardex_session=new kardex_session();
		}
		
		if($kardex_session->bitBusquedaDesdeFKSesionestado!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=estado_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalestado=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalestado=Funciones::GetFinalQueryAppend($finalQueryGlobalestado, '');
				$finalQueryGlobalestado.=estado_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalestado.$strRecargarFkQuery;		

				$estadoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($estadoLogic->getestados() as $estadoLocal ) {
				if($kardexForeignKey->idestadoDefaultFK==0) {
					$kardexForeignKey->idestadoDefaultFK=$estadoLocal->getId();
				}

				$kardexForeignKey->estadosFK[$estadoLocal->getId()]=kardex_util::getestadoDescripcion($estadoLocal);
			}

		} else {

			if($kardex_session->bigidestadoActual!=null && $kardex_session->bigidestadoActual > 0) {
				$estadoLogic->getEntity($kardex_session->bigidestadoActual);//WithConnection

				$kardexForeignKey->estadosFK[$estadoLogic->getestado()->getId()]=kardex_util::getestadoDescripcion($estadoLogic->getestado());
				$kardexForeignKey->idestadoDefaultFK=$estadoLogic->getestado()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($kardex,$kardexdetalles) {
		$this->saveRelacionesBase($kardex,$kardexdetalles,true);
	}

	public function saveRelaciones($kardex,$kardexdetalles) {
		$this->saveRelacionesBase($kardex,$kardexdetalles,false);
	}

	public function saveRelacionesBase($kardex,$kardexdetalles=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$kardex->setkardex_detalles($kardexdetalles);
			$this->setkardex($kardex);

			if(kardex_logic_add::validarSaveRelaciones($kardex,$this)) {

				kardex_logic_add::updateRelacionesToSave($kardex,$this);

				if(($this->kardex->getIsNew() || $this->kardex->getIsChanged()) && !$this->kardex->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($kardexdetalles);

				} else if($this->kardex->getIsDeleted()) {
					$this->saveRelacionesDetalles($kardexdetalles);
					$this->save();
				}

				kardex_logic_add::updateRelacionesToSaveAfter($kardex,$this);

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
	
	
	public function saveRelacionesDetalles($kardexdetalles=array()) {
		try {
	

			$idkardexActual=$this->getkardex()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/kardex_detalle_carga.php');
			kardex_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$kardexdetalleLogic_Desde_kardex=new kardex_detalle_logic();
			$kardexdetalleLogic_Desde_kardex->setkardex_detalles($kardexdetalles);

			$kardexdetalleLogic_Desde_kardex->setConnexion($this->getConnexion());
			$kardexdetalleLogic_Desde_kardex->setDatosCliente($this->datosCliente);

			foreach($kardexdetalleLogic_Desde_kardex->getkardex_detalles() as $kardexdetalle_Desde_kardex) {
				$kardexdetalle_Desde_kardex->setid_kardex($idkardexActual);
			}

			$kardexdetalleLogic_Desde_kardex->saves();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $kardexs,kardex_param_return $kardexParameterGeneral) : kardex_param_return {
		$kardexReturnGeneral=new kardex_param_return();
	
		 try {	
			
			if($this->kardexLogicAdditional==null) {
				$this->kardexLogicAdditional=new kardex_logic_add();
			}
			
			$this->kardexLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$sProceso,$kardexs,$kardexParameterGeneral,$kardexReturnGeneral);
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $kardexReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $kardexs,kardex_param_return $kardexParameterGeneral) : kardex_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$kardexReturnGeneral=new kardex_param_return();
	
			
			if($this->kardexLogicAdditional==null) {
				$this->kardexLogicAdditional=new kardex_logic_add();
			}
			
			$this->kardexLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$strProceso,$kardexs,$kardexParameterGeneral,$kardexReturnGeneral);
			
			$this->connexion->getConnection()->commit();			
			
			return $kardexReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $kardexs,kardex $kardex,kardex_param_return $kardexParameterGeneral,bool $isEsNuevokardex,array $clases) : kardex_param_return {
		 try {	
			$kardexReturnGeneral=new kardex_param_return();
	
			$kardexReturnGeneral->setkardex($kardex);
			$kardexReturnGeneral->setkardexs($kardexs);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$kardexReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			if($this->kardexLogicAdditional==null) {
				$this->kardexLogicAdditional=new kardex_logic_add();
			}
			
			$kardexReturnGeneral=$this->kardexLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$kardexs,$kardex,$kardexParameterGeneral,$kardexReturnGeneral,$isEsNuevokardex,$clases);
			
			/*kardexLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$kardexs,$kardex,$kardexParameterGeneral,$kardexReturnGeneral,$isEsNuevokardex,$clases);*/
			
			return $kardexReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $kardexs,kardex $kardex,kardex_param_return $kardexParameterGeneral,bool $isEsNuevokardex,array $clases) : kardex_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$kardexReturnGeneral=new kardex_param_return();
	
			$kardexReturnGeneral->setkardex($kardex);
			$kardexReturnGeneral->setkardexs($kardexs);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$kardexReturnGeneral->setConRecargarPropiedades(true);
			}
			
			if($this->kardexLogicAdditional==null) {
				$this->kardexLogicAdditional=new kardex_logic_add();
			}
			
			$kardexReturnGeneral=$this->kardexLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$kardexs,$kardex,$kardexParameterGeneral,$kardexReturnGeneral,$isEsNuevokardex,$clases);
			
			/*kardexLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$kardexs,$kardex,$kardexParameterGeneral,$kardexReturnGeneral,$isEsNuevokardex,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $kardexReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $kardexs,kardex $kardex,kardex_param_return $kardexParameterGeneral,bool $isEsNuevokardex,array $clases) : kardex_param_return {
		 try {	
			$kardexReturnGeneral=new kardex_param_return();
	
			$kardexReturnGeneral->setkardex($kardex);
			$kardexReturnGeneral->setkardexs($kardexs);
			
			
			
			if($this->kardexLogicAdditional==null) {
				$this->kardexLogicAdditional=new kardex_logic_add();
			}
			
			$kardexReturnGeneral=$this->kardexLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$kardexs,$kardex,$kardexParameterGeneral,$kardexReturnGeneral,$isEsNuevokardex,$clases);
			
			/*kardexLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$kardexs,$kardex,$kardexParameterGeneral,$kardexReturnGeneral,$isEsNuevokardex,$clases);*/
			
			return $kardexReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $kardexs,kardex $kardex,kardex_param_return $kardexParameterGeneral,bool $isEsNuevokardex,array $clases) : kardex_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$kardexReturnGeneral=new kardex_param_return();
	
			$kardexReturnGeneral->setkardex($kardex);
			$kardexReturnGeneral->setkardexs($kardexs);
			
			
			if($this->kardexLogicAdditional==null) {
				$this->kardexLogicAdditional=new kardex_logic_add();
			}
			
			$kardexReturnGeneral=$this->kardexLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$kardexs,$kardex,$kardexParameterGeneral,$kardexReturnGeneral,$isEsNuevokardex,$clases);
			
			/*kardexLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$kardexs,$kardex,$kardexParameterGeneral,$kardexReturnGeneral,$isEsNuevokardex,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $kardexReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,kardex $kardex,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,kardex $kardex,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		kardex_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		kardex_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(kardex $kardex,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			kardex_logic_add::updatekardexToGet($this->kardex);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$kardex->setempresa($this->kardexDataAccess->getempresa($this->connexion,$kardex));
		$kardex->setsucursal($this->kardexDataAccess->getsucursal($this->connexion,$kardex));
		$kardex->setejercicio($this->kardexDataAccess->getejercicio($this->connexion,$kardex));
		$kardex->setperiodo($this->kardexDataAccess->getperiodo($this->connexion,$kardex));
		$kardex->setusuario($this->kardexDataAccess->getusuario($this->connexion,$kardex));
		$kardex->setmodulo($this->kardexDataAccess->getmodulo($this->connexion,$kardex));
		$kardex->settipo_kardex($this->kardexDataAccess->gettipo_kardex($this->connexion,$kardex));
		$kardex->setproveedor($this->kardexDataAccess->getproveedor($this->connexion,$kardex));
		$kardex->setcliente($this->kardexDataAccess->getcliente($this->connexion,$kardex));
		$kardex->setestado($this->kardexDataAccess->getestado($this->connexion,$kardex));
		$kardex->setkardex_detalles($this->kardexDataAccess->getkardex_detalles($this->connexion,$kardex));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$kardex->setempresa($this->kardexDataAccess->getempresa($this->connexion,$kardex));
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$kardex->setsucursal($this->kardexDataAccess->getsucursal($this->connexion,$kardex));
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$kardex->setejercicio($this->kardexDataAccess->getejercicio($this->connexion,$kardex));
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$kardex->setperiodo($this->kardexDataAccess->getperiodo($this->connexion,$kardex));
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$kardex->setusuario($this->kardexDataAccess->getusuario($this->connexion,$kardex));
				continue;
			}

			if($clas->clas==modulo::$class.'') {
				$kardex->setmodulo($this->kardexDataAccess->getmodulo($this->connexion,$kardex));
				continue;
			}

			if($clas->clas==tipo_kardex::$class.'') {
				$kardex->settipo_kardex($this->kardexDataAccess->gettipo_kardex($this->connexion,$kardex));
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				$kardex->setproveedor($this->kardexDataAccess->getproveedor($this->connexion,$kardex));
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				$kardex->setcliente($this->kardexDataAccess->getcliente($this->connexion,$kardex));
				continue;
			}

			if($clas->clas==estado::$class.'') {
				$kardex->setestado($this->kardexDataAccess->getestado($this->connexion,$kardex));
				continue;
			}

			if($clas->clas==kardex_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$kardex->setkardex_detalles($this->kardexDataAccess->getkardex_detalles($this->connexion,$kardex));

				if($this->isConDeep) {
					$kardexdetalleLogic= new kardex_detalle_logic($this->connexion);
					$kardexdetalleLogic->setkardex_detalles($kardex->getkardex_detalles());
					$classesLocal=kardex_detalle_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$kardexdetalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					kardex_detalle_util::refrescarFKDescripciones($kardexdetalleLogic->getkardex_detalles());
					$kardex->setkardex_detalles($kardexdetalleLogic->getkardex_detalles());
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
			$kardex->setempresa($this->kardexDataAccess->getempresa($this->connexion,$kardex));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$kardex->setsucursal($this->kardexDataAccess->getsucursal($this->connexion,$kardex));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$kardex->setejercicio($this->kardexDataAccess->getejercicio($this->connexion,$kardex));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$kardex->setperiodo($this->kardexDataAccess->getperiodo($this->connexion,$kardex));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$kardex->setusuario($this->kardexDataAccess->getusuario($this->connexion,$kardex));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==modulo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$kardex->setmodulo($this->kardexDataAccess->getmodulo($this->connexion,$kardex));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==tipo_kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$kardex->settipo_kardex($this->kardexDataAccess->gettipo_kardex($this->connexion,$kardex));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$kardex->setproveedor($this->kardexDataAccess->getproveedor($this->connexion,$kardex));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$kardex->setcliente($this->kardexDataAccess->getcliente($this->connexion,$kardex));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$kardex->setestado($this->kardexDataAccess->getestado($this->connexion,$kardex));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==kardex_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(kardex_detalle::$class);
			$kardex->setkardex_detalles($this->kardexDataAccess->getkardex_detalles($this->connexion,$kardex));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$kardex->setempresa($this->kardexDataAccess->getempresa($this->connexion,$kardex));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($kardex->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$kardex->setsucursal($this->kardexDataAccess->getsucursal($this->connexion,$kardex));
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepLoad($kardex->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		$kardex->setejercicio($this->kardexDataAccess->getejercicio($this->connexion,$kardex));
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepLoad($kardex->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		$kardex->setperiodo($this->kardexDataAccess->getperiodo($this->connexion,$kardex));
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepLoad($kardex->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		$kardex->setusuario($this->kardexDataAccess->getusuario($this->connexion,$kardex));
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepLoad($kardex->getusuario(),$isDeep,$deepLoadType,$clases);
				
		$kardex->setmodulo($this->kardexDataAccess->getmodulo($this->connexion,$kardex));
		$moduloLogic= new modulo_logic($this->connexion);
		$moduloLogic->deepLoad($kardex->getmodulo(),$isDeep,$deepLoadType,$clases);
				
		$kardex->settipo_kardex($this->kardexDataAccess->gettipo_kardex($this->connexion,$kardex));
		$tipo_kardexLogic= new tipo_kardex_logic($this->connexion);
		$tipo_kardexLogic->deepLoad($kardex->gettipo_kardex(),$isDeep,$deepLoadType,$clases);
				
		$kardex->setproveedor($this->kardexDataAccess->getproveedor($this->connexion,$kardex));
		$proveedorLogic= new proveedor_logic($this->connexion);
		$proveedorLogic->deepLoad($kardex->getproveedor(),$isDeep,$deepLoadType,$clases);
				
		$kardex->setcliente($this->kardexDataAccess->getcliente($this->connexion,$kardex));
		$clienteLogic= new cliente_logic($this->connexion);
		$clienteLogic->deepLoad($kardex->getcliente(),$isDeep,$deepLoadType,$clases);
				
		$kardex->setestado($this->kardexDataAccess->getestado($this->connexion,$kardex));
		$estadoLogic= new estado_logic($this->connexion);
		$estadoLogic->deepLoad($kardex->getestado(),$isDeep,$deepLoadType,$clases);
				

		$kardex->setkardex_detalles($this->kardexDataAccess->getkardex_detalles($this->connexion,$kardex));

		foreach($kardex->getkardex_detalles() as $kardexdetalle) {
			$kardexdetalleLogic= new kardex_detalle_logic($this->connexion);
			$kardexdetalleLogic->deepLoad($kardexdetalle,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$kardex->setempresa($this->kardexDataAccess->getempresa($this->connexion,$kardex));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($kardex->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$kardex->setsucursal($this->kardexDataAccess->getsucursal($this->connexion,$kardex));
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepLoad($kardex->getsucursal(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$kardex->setejercicio($this->kardexDataAccess->getejercicio($this->connexion,$kardex));
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepLoad($kardex->getejercicio(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$kardex->setperiodo($this->kardexDataAccess->getperiodo($this->connexion,$kardex));
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepLoad($kardex->getperiodo(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$kardex->setusuario($this->kardexDataAccess->getusuario($this->connexion,$kardex));
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepLoad($kardex->getusuario(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==modulo::$class.'') {
				$kardex->setmodulo($this->kardexDataAccess->getmodulo($this->connexion,$kardex));
				$moduloLogic= new modulo_logic($this->connexion);
				$moduloLogic->deepLoad($kardex->getmodulo(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==tipo_kardex::$class.'') {
				$kardex->settipo_kardex($this->kardexDataAccess->gettipo_kardex($this->connexion,$kardex));
				$tipo_kardexLogic= new tipo_kardex_logic($this->connexion);
				$tipo_kardexLogic->deepLoad($kardex->gettipo_kardex(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				$kardex->setproveedor($this->kardexDataAccess->getproveedor($this->connexion,$kardex));
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedorLogic->deepLoad($kardex->getproveedor(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				$kardex->setcliente($this->kardexDataAccess->getcliente($this->connexion,$kardex));
				$clienteLogic= new cliente_logic($this->connexion);
				$clienteLogic->deepLoad($kardex->getcliente(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==estado::$class.'') {
				$kardex->setestado($this->kardexDataAccess->getestado($this->connexion,$kardex));
				$estadoLogic= new estado_logic($this->connexion);
				$estadoLogic->deepLoad($kardex->getestado(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==kardex_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$kardex->setkardex_detalles($this->kardexDataAccess->getkardex_detalles($this->connexion,$kardex));

				foreach($kardex->getkardex_detalles() as $kardexdetalle) {
					$kardexdetalleLogic= new kardex_detalle_logic($this->connexion);
					$kardexdetalleLogic->deepLoad($kardexdetalle,$isDeep,$deepLoadType,$clases);
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
			$kardex->setempresa($this->kardexDataAccess->getempresa($this->connexion,$kardex));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($kardex->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$kardex->setsucursal($this->kardexDataAccess->getsucursal($this->connexion,$kardex));
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepLoad($kardex->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$kardex->setejercicio($this->kardexDataAccess->getejercicio($this->connexion,$kardex));
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepLoad($kardex->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$kardex->setperiodo($this->kardexDataAccess->getperiodo($this->connexion,$kardex));
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepLoad($kardex->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$kardex->setusuario($this->kardexDataAccess->getusuario($this->connexion,$kardex));
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepLoad($kardex->getusuario(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==modulo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$kardex->setmodulo($this->kardexDataAccess->getmodulo($this->connexion,$kardex));
			$moduloLogic= new modulo_logic($this->connexion);
			$moduloLogic->deepLoad($kardex->getmodulo(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$kardex->settipo_kardex($this->kardexDataAccess->gettipo_kardex($this->connexion,$kardex));
			$tipo_kardexLogic= new tipo_kardex_logic($this->connexion);
			$tipo_kardexLogic->deepLoad($kardex->gettipo_kardex(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$kardex->setproveedor($this->kardexDataAccess->getproveedor($this->connexion,$kardex));
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedorLogic->deepLoad($kardex->getproveedor(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$kardex->setcliente($this->kardexDataAccess->getcliente($this->connexion,$kardex));
			$clienteLogic= new cliente_logic($this->connexion);
			$clienteLogic->deepLoad($kardex->getcliente(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$kardex->setestado($this->kardexDataAccess->getestado($this->connexion,$kardex));
			$estadoLogic= new estado_logic($this->connexion);
			$estadoLogic->deepLoad($kardex->getestado(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==kardex_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(kardex_detalle::$class);
			$kardex->setkardex_detalles($this->kardexDataAccess->getkardex_detalles($this->connexion,$kardex));

			foreach($kardex->getkardex_detalles() as $kardexdetalle) {
				$kardexdetalleLogic= new kardex_detalle_logic($this->connexion);
				$kardexdetalleLogic->deepLoad($kardexdetalle,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(kardex $kardex,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			kardex_logic_add::updatekardexToSave($this->kardex);			
			
			if(!$paraDeleteCascade) {				
				kardex_data::save($kardex, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($kardex->getempresa(),$this->connexion);
		sucursal_data::save($kardex->getsucursal(),$this->connexion);
		ejercicio_data::save($kardex->getejercicio(),$this->connexion);
		periodo_data::save($kardex->getperiodo(),$this->connexion);
		usuario_data::save($kardex->getusuario(),$this->connexion);
		modulo_data::save($kardex->getmodulo(),$this->connexion);
		tipo_kardex_data::save($kardex->gettipo_kardex(),$this->connexion);
		proveedor_data::save($kardex->getproveedor(),$this->connexion);
		cliente_data::save($kardex->getcliente(),$this->connexion);
		estado_data::save($kardex->getestado(),$this->connexion);

		foreach($kardex->getkardex_detalles() as $kardexdetalle) {
			$kardexdetalle->setid_kardex($kardex->getId());
			kardex_detalle_data::save($kardexdetalle,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($kardex->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($kardex->getsucursal(),$this->connexion);
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($kardex->getejercicio(),$this->connexion);
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($kardex->getperiodo(),$this->connexion);
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($kardex->getusuario(),$this->connexion);
				continue;
			}

			if($clas->clas==modulo::$class.'') {
				modulo_data::save($kardex->getmodulo(),$this->connexion);
				continue;
			}

			if($clas->clas==tipo_kardex::$class.'') {
				tipo_kardex_data::save($kardex->gettipo_kardex(),$this->connexion);
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				proveedor_data::save($kardex->getproveedor(),$this->connexion);
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				cliente_data::save($kardex->getcliente(),$this->connexion);
				continue;
			}

			if($clas->clas==estado::$class.'') {
				estado_data::save($kardex->getestado(),$this->connexion);
				continue;
			}


			if($clas->clas==kardex_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($kardex->getkardex_detalles() as $kardexdetalle) {
					$kardexdetalle->setid_kardex($kardex->getId());
					kardex_detalle_data::save($kardexdetalle,$this->connexion);
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
			empresa_data::save($kardex->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($kardex->getsucursal(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($kardex->getejercicio(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($kardex->getperiodo(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($kardex->getusuario(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==modulo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			modulo_data::save($kardex->getmodulo(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_kardex_data::save($kardex->gettipo_kardex(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			proveedor_data::save($kardex->getproveedor(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cliente_data::save($kardex->getcliente(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			estado_data::save($kardex->getestado(),$this->connexion);
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==kardex_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(kardex_detalle::$class);

			foreach($kardex->getkardex_detalles() as $kardexdetalle) {
				$kardexdetalle->setid_kardex($kardex->getId());
				kardex_detalle_data::save($kardexdetalle,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($kardex->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($kardex->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		sucursal_data::save($kardex->getsucursal(),$this->connexion);
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepSave($kardex->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		ejercicio_data::save($kardex->getejercicio(),$this->connexion);
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepSave($kardex->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		periodo_data::save($kardex->getperiodo(),$this->connexion);
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepSave($kardex->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		usuario_data::save($kardex->getusuario(),$this->connexion);
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepSave($kardex->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		modulo_data::save($kardex->getmodulo(),$this->connexion);
		$moduloLogic= new modulo_logic($this->connexion);
		$moduloLogic->deepSave($kardex->getmodulo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		tipo_kardex_data::save($kardex->gettipo_kardex(),$this->connexion);
		$tipo_kardexLogic= new tipo_kardex_logic($this->connexion);
		$tipo_kardexLogic->deepSave($kardex->gettipo_kardex(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		proveedor_data::save($kardex->getproveedor(),$this->connexion);
		$proveedorLogic= new proveedor_logic($this->connexion);
		$proveedorLogic->deepSave($kardex->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cliente_data::save($kardex->getcliente(),$this->connexion);
		$clienteLogic= new cliente_logic($this->connexion);
		$clienteLogic->deepSave($kardex->getcliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		estado_data::save($kardex->getestado(),$this->connexion);
		$estadoLogic= new estado_logic($this->connexion);
		$estadoLogic->deepSave($kardex->getestado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($kardex->getkardex_detalles() as $kardexdetalle) {
			$kardexdetalleLogic= new kardex_detalle_logic($this->connexion);
			$kardexdetalle->setid_kardex($kardex->getId());
			kardex_detalle_data::save($kardexdetalle,$this->connexion);
			$kardexdetalleLogic->deepSave($kardexdetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($kardex->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($kardex->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($kardex->getsucursal(),$this->connexion);
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepSave($kardex->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($kardex->getejercicio(),$this->connexion);
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepSave($kardex->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($kardex->getperiodo(),$this->connexion);
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepSave($kardex->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($kardex->getusuario(),$this->connexion);
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepSave($kardex->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==modulo::$class.'') {
				modulo_data::save($kardex->getmodulo(),$this->connexion);
				$moduloLogic= new modulo_logic($this->connexion);
				$moduloLogic->deepSave($kardex->getmodulo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==tipo_kardex::$class.'') {
				tipo_kardex_data::save($kardex->gettipo_kardex(),$this->connexion);
				$tipo_kardexLogic= new tipo_kardex_logic($this->connexion);
				$tipo_kardexLogic->deepSave($kardex->gettipo_kardex(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				proveedor_data::save($kardex->getproveedor(),$this->connexion);
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedorLogic->deepSave($kardex->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				cliente_data::save($kardex->getcliente(),$this->connexion);
				$clienteLogic= new cliente_logic($this->connexion);
				$clienteLogic->deepSave($kardex->getcliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==estado::$class.'') {
				estado_data::save($kardex->getestado(),$this->connexion);
				$estadoLogic= new estado_logic($this->connexion);
				$estadoLogic->deepSave($kardex->getestado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==kardex_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($kardex->getkardex_detalles() as $kardexdetalle) {
					$kardexdetalleLogic= new kardex_detalle_logic($this->connexion);
					$kardexdetalle->setid_kardex($kardex->getId());
					kardex_detalle_data::save($kardexdetalle,$this->connexion);
					$kardexdetalleLogic->deepSave($kardexdetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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
			empresa_data::save($kardex->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($kardex->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($kardex->getsucursal(),$this->connexion);
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepSave($kardex->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($kardex->getejercicio(),$this->connexion);
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepSave($kardex->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($kardex->getperiodo(),$this->connexion);
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepSave($kardex->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($kardex->getusuario(),$this->connexion);
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepSave($kardex->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==modulo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			modulo_data::save($kardex->getmodulo(),$this->connexion);
			$moduloLogic= new modulo_logic($this->connexion);
			$moduloLogic->deepSave($kardex->getmodulo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_kardex_data::save($kardex->gettipo_kardex(),$this->connexion);
			$tipo_kardexLogic= new tipo_kardex_logic($this->connexion);
			$tipo_kardexLogic->deepSave($kardex->gettipo_kardex(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			proveedor_data::save($kardex->getproveedor(),$this->connexion);
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedorLogic->deepSave($kardex->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cliente_data::save($kardex->getcliente(),$this->connexion);
			$clienteLogic= new cliente_logic($this->connexion);
			$clienteLogic->deepSave($kardex->getcliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			estado_data::save($kardex->getestado(),$this->connexion);
			$estadoLogic= new estado_logic($this->connexion);
			$estadoLogic->deepSave($kardex->getestado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==kardex_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(kardex_detalle::$class);

			foreach($kardex->getkardex_detalles() as $kardexdetalle) {
				$kardexdetalleLogic= new kardex_detalle_logic($this->connexion);
				$kardexdetalle->setid_kardex($kardex->getId());
				kardex_detalle_data::save($kardexdetalle,$this->connexion);
				$kardexdetalleLogic->deepSave($kardexdetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				kardex_data::save($kardex, $this->connexion);
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
			
			$this->deepLoad($this->kardex,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->kardexs as $kardex) {
				$this->deepLoad($kardex,$isDeep,$deepLoadType,$clases);
								
				kardex_util::refrescarFKDescripciones($this->kardexs);
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
			
			foreach($this->kardexs as $kardex) {
				$this->deepLoad($kardex,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->kardex,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->kardexs as $kardex) {
				$this->deepSave($kardex,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->kardexs as $kardex) {
				$this->deepSave($kardex,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(sucursal::$class);
				$classes[]=new Classe(ejercicio::$class);
				$classes[]=new Classe(periodo::$class);
				$classes[]=new Classe(usuario::$class);
				$classes[]=new Classe(modulo::$class);
				$classes[]=new Classe(tipo_kardex::$class);
				$classes[]=new Classe(proveedor::$class);
				$classes[]=new Classe(cliente::$class);
				$classes[]=new Classe(estado::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==sucursal::$class) {
						$classes[]=new Classe(sucursal::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==ejercicio::$class) {
						$classes[]=new Classe(ejercicio::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==periodo::$class) {
						$classes[]=new Classe(periodo::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==usuario::$class) {
						$classes[]=new Classe(usuario::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==modulo::$class) {
						$classes[]=new Classe(modulo::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==tipo_kardex::$class) {
						$classes[]=new Classe(tipo_kardex::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==proveedor::$class) {
						$classes[]=new Classe(proveedor::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==cliente::$class) {
						$classes[]=new Classe(cliente::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==estado::$class) {
						$classes[]=new Classe(estado::$class);
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
					if($clas->clas==sucursal::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(sucursal::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==ejercicio::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(ejercicio::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==periodo::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(periodo::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==usuario::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(usuario::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==modulo::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(modulo::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==tipo_kardex::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(tipo_kardex::$class);
				}

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

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==cliente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cliente::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==estado::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(estado::$class);
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
				
				$classes[]=new Classe(kardex_detalle::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==kardex_detalle::$class) {
						$classes[]=new Classe(kardex_detalle::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==kardex_detalle::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(kardex_detalle::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getkardex() : ?kardex {	
		/*
		kardex_logic_add::checkkardexToGet($this->kardex,$this->datosCliente);
		kardex_logic_add::updatekardexToGet($this->kardex);
		*/
			
		return $this->kardex;
	}
		
	public function setkardex(kardex $newkardex) {
		$this->kardex = $newkardex;
	}
	
	public function getkardexs() : array {		
		/*
		kardex_logic_add::checkkardexToGets($this->kardexs,$this->datosCliente);
		
		foreach ($this->kardexs as $kardexLocal ) {
			kardex_logic_add::updatekardexToGet($kardexLocal);
		}
		*/
		
		return $this->kardexs;
	}
	
	public function setkardexs(array $newkardexs) {
		$this->kardexs = $newkardexs;
	}
	
	public function getkardexDataAccess() : kardex_data {
		return $this->kardexDataAccess;
	}
	
	public function setkardexDataAccess(kardex_data $newkardexDataAccess) {
		$this->kardexDataAccess = $newkardexDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        kardex_carga::$CONTROLLER;;        
		
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
