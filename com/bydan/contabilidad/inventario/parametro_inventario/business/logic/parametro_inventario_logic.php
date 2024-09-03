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

namespace com\bydan\contabilidad\inventario\parametro_inventario\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\inventario\parametro_inventario\util\parametro_inventario_carga;
use com\bydan\contabilidad\inventario\parametro_inventario\util\parametro_inventario_param_return;

use com\bydan\contabilidad\inventario\parametro_inventario\presentation\session\parametro_inventario_session;

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

use com\bydan\contabilidad\inventario\parametro_inventario\util\parametro_inventario_util;
use com\bydan\contabilidad\inventario\parametro_inventario\business\entity\parametro_inventario;
use com\bydan\contabilidad\inventario\parametro_inventario\business\data\parametro_inventario_data;

//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\entity\termino_pago_proveedor;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\data\termino_pago_proveedor_data;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\logic\termino_pago_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_util;

use com\bydan\contabilidad\general\tipo_costeo_kardex\business\entity\tipo_costeo_kardex;
use com\bydan\contabilidad\general\tipo_costeo_kardex\business\data\tipo_costeo_kardex_data;
use com\bydan\contabilidad\general\tipo_costeo_kardex\business\logic\tipo_costeo_kardex_logic;
use com\bydan\contabilidad\general\tipo_costeo_kardex\util\tipo_costeo_kardex_util;

use com\bydan\contabilidad\inventario\tipo_kardex\business\entity\tipo_kardex;
use com\bydan\contabilidad\inventario\tipo_kardex\business\data\tipo_kardex_data;
use com\bydan\contabilidad\inventario\tipo_kardex\business\logic\tipo_kardex_logic;
use com\bydan\contabilidad\inventario\tipo_kardex\util\tipo_kardex_util;

//REL


//REL DETALLES




class parametro_inventario_logic  extends GeneralEntityLogic implements parametro_inventario_logicI {	
	/*GENERAL*/
	public parametro_inventario_data $parametro_inventarioDataAccess;
	public ?parametro_inventario_logic_add $parametro_inventarioLogicAdditional=null;
	public ?parametro_inventario $parametro_inventario;
	public array $parametro_inventarios;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->parametro_inventarioDataAccess = new parametro_inventario_data();			
			$this->parametro_inventarios = array();
			$this->parametro_inventario = new parametro_inventario();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->parametro_inventarioLogicAdditional = new parametro_inventario_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		if($this->parametro_inventarioLogicAdditional==null) {
			$this->parametro_inventarioLogicAdditional=new parametro_inventario_logic_add();
		}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->parametro_inventarioDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->parametro_inventarioDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->parametro_inventarioDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->parametro_inventarioDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->parametro_inventarios = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_inventarios=$this->parametro_inventarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_inventario_util::refrescarFKDescripciones($this->parametro_inventarios);
			}
			
			parametro_inventario_logic_add::checkparametro_inventarioToGets($this->parametro_inventarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_inventarios);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->parametro_inventarios = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_inventarios=$this->parametro_inventarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_inventario_util::refrescarFKDescripciones($this->parametro_inventarios);
			}
			
			parametro_inventario_logic_add::checkparametro_inventarioToGets($this->parametro_inventarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_inventarios);
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
		$this->parametro_inventario = new parametro_inventario();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->parametro_inventario=$this->parametro_inventarioDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_inventario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_inventario_util::refrescarFKDescripcion($this->parametro_inventario);
			}
						
			parametro_inventario_logic_add::checkparametro_inventarioToGet($this->parametro_inventario,$this->datosCliente);
			parametro_inventario_logic_add::updateparametro_inventarioToGet($this->parametro_inventario);
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
		$this->parametro_inventario = new  parametro_inventario();
		  		  
        try {		
			$this->parametro_inventario=$this->parametro_inventarioDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_inventario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_inventario_util::refrescarFKDescripcion($this->parametro_inventario);
			}
			
			parametro_inventario_logic_add::checkparametro_inventarioToGet($this->parametro_inventario,$this->datosCliente);
			parametro_inventario_logic_add::updateparametro_inventarioToGet($this->parametro_inventario);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?parametro_inventario {
		$parametro_inventarioLogic = new  parametro_inventario_logic();
		  		  
        try {		
			$parametro_inventarioLogic->setConnexion($connexion);			
			$parametro_inventarioLogic->getEntity($id);			
			return $parametro_inventarioLogic->getparametro_inventario();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->parametro_inventario = new  parametro_inventario();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->parametro_inventario=$this->parametro_inventarioDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_inventario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_inventario_util::refrescarFKDescripcion($this->parametro_inventario);
			}
			
			parametro_inventario_logic_add::checkparametro_inventarioToGet($this->parametro_inventario,$this->datosCliente);
			parametro_inventario_logic_add::updateparametro_inventarioToGet($this->parametro_inventario);
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
		$this->parametro_inventario = new  parametro_inventario();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_inventario=$this->parametro_inventarioDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_inventario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_inventario_util::refrescarFKDescripcion($this->parametro_inventario);
			}
			
			parametro_inventario_logic_add::checkparametro_inventarioToGet($this->parametro_inventario,$this->datosCliente);
			parametro_inventario_logic_add::updateparametro_inventarioToGet($this->parametro_inventario);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?parametro_inventario {
		$parametro_inventarioLogic = new  parametro_inventario_logic();
		  		  
        try {		
			$parametro_inventarioLogic->setConnexion($connexion);			
			$parametro_inventarioLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $parametro_inventarioLogic->getparametro_inventario();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->parametro_inventarios = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->parametro_inventarios=$this->parametro_inventarioDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_inventario_util::refrescarFKDescripciones($this->parametro_inventarios);
			}
			
			parametro_inventario_logic_add::checkparametro_inventarioToGets($this->parametro_inventarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_inventarios);			
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
		$this->parametro_inventarios = array();
		  		  
        try {			
			$this->parametro_inventarios=$this->parametro_inventarioDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_inventario_util::refrescarFKDescripciones($this->parametro_inventarios);
			}
			
			parametro_inventario_logic_add::checkparametro_inventarioToGets($this->parametro_inventarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_inventarios);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->parametro_inventarios = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_inventarios=$this->parametro_inventarioDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_inventario_util::refrescarFKDescripciones($this->parametro_inventarios);
			}
			
			parametro_inventario_logic_add::checkparametro_inventarioToGets($this->parametro_inventarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_inventarios);
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
		$this->parametro_inventarios = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_inventarios=$this->parametro_inventarioDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_inventario_util::refrescarFKDescripciones($this->parametro_inventarios);
			}
			
			parametro_inventario_logic_add::checkparametro_inventarioToGets($this->parametro_inventarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_inventarios);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$parametro_inventarioLogic = new  parametro_inventario_logic();
		  		  
        try {		
			$parametro_inventarioLogic->setConnexion($connexion);			
			$parametro_inventarioLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $parametro_inventarioLogic->getparametro_inventarios();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->parametro_inventarios = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->parametro_inventarios=$this->parametro_inventarioDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_inventario_util::refrescarFKDescripciones($this->parametro_inventarios);
			}
			
			parametro_inventario_logic_add::checkparametro_inventarioToGets($this->parametro_inventarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_inventarios);
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
		$this->parametro_inventarios = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_inventarios=$this->parametro_inventarioDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_inventario_util::refrescarFKDescripciones($this->parametro_inventarios);
			}
			
			parametro_inventario_logic_add::checkparametro_inventarioToGets($this->parametro_inventarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_inventarios);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->parametro_inventarios = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_inventarios=$this->parametro_inventarioDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_inventario_util::refrescarFKDescripciones($this->parametro_inventarios);
			}
			
			parametro_inventario_logic_add::checkparametro_inventarioToGets($this->parametro_inventarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_inventarios);
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
		$this->parametro_inventarios = array();
		  		  
        try {			
			$this->parametro_inventarios=$this->parametro_inventarioDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_inventario_util::refrescarFKDescripciones($this->parametro_inventarios);
			}	
			
			parametro_inventario_logic_add::checkparametro_inventarioToGets($this->parametro_inventarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_inventarios);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->parametro_inventarios = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->parametro_inventarios=$this->parametro_inventarioDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_inventario_util::refrescarFKDescripciones($this->parametro_inventarios);
			}
			
			parametro_inventario_logic_add::checkparametro_inventarioToGets($this->parametro_inventarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_inventarios);
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
		$this->parametro_inventarios = array();
		  		  
        try {		
			$this->parametro_inventarios=$this->parametro_inventarioDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_inventario_util::refrescarFKDescripciones($this->parametro_inventarios);
			}
			
			parametro_inventario_logic_add::checkparametro_inventarioToGets($this->parametro_inventarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_inventarios);

		}  catch(Exception $e) {						
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,parametro_inventario_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->parametro_inventarios=$this->parametro_inventarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				parametro_inventario_util::refrescarFKDescripciones($this->parametro_inventarios);
			}
			parametro_inventario_logic_add::checkparametro_inventarioToGets($this->parametro_inventarios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->parametro_inventarios);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,parametro_inventario_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->parametro_inventarios=$this->parametro_inventarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				parametro_inventario_util::refrescarFKDescripciones($this->parametro_inventarios);
			}
			parametro_inventario_logic_add::checkparametro_inventarioToGets($this->parametro_inventarios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->parametro_inventarios);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idtermino_pago_proveedorWithConnection(string $strFinalQuery,Pagination $pagination,int $id_termino_pago_proveedor) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_termino_pago_proveedor= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_termino_pago_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_termino_pago_proveedor,parametro_inventario_util::$ID_TERMINO_PAGO_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_termino_pago_proveedor);

			$this->parametro_inventarios=$this->parametro_inventarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				parametro_inventario_util::refrescarFKDescripciones($this->parametro_inventarios);
			}
			parametro_inventario_logic_add::checkparametro_inventarioToGets($this->parametro_inventarios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->parametro_inventarios);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idtermino_pago_proveedor(string $strFinalQuery,Pagination $pagination,int $id_termino_pago_proveedor) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_termino_pago_proveedor= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_termino_pago_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_termino_pago_proveedor,parametro_inventario_util::$ID_TERMINO_PAGO_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_termino_pago_proveedor);

			$this->parametro_inventarios=$this->parametro_inventarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				parametro_inventario_util::refrescarFKDescripciones($this->parametro_inventarios);
			}
			parametro_inventario_logic_add::checkparametro_inventarioToGets($this->parametro_inventarios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->parametro_inventarios);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idtipo_costeo_kardexWithConnection(string $strFinalQuery,Pagination $pagination,int $id_tipo_costeo_kardex) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_tipo_costeo_kardex= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_tipo_costeo_kardex->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_costeo_kardex,parametro_inventario_util::$ID_TIPO_COSTEO_KARDEX,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_costeo_kardex);

			$this->parametro_inventarios=$this->parametro_inventarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				parametro_inventario_util::refrescarFKDescripciones($this->parametro_inventarios);
			}
			parametro_inventario_logic_add::checkparametro_inventarioToGets($this->parametro_inventarios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->parametro_inventarios);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idtipo_costeo_kardex(string $strFinalQuery,Pagination $pagination,int $id_tipo_costeo_kardex) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_tipo_costeo_kardex= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_tipo_costeo_kardex->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_costeo_kardex,parametro_inventario_util::$ID_TIPO_COSTEO_KARDEX,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_costeo_kardex);

			$this->parametro_inventarios=$this->parametro_inventarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				parametro_inventario_util::refrescarFKDescripciones($this->parametro_inventarios);
			}
			parametro_inventario_logic_add::checkparametro_inventarioToGets($this->parametro_inventarios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->parametro_inventarios);
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
			$parameterSelectionGeneralid_tipo_kardex->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_kardex,parametro_inventario_util::$ID_TIPO_KARDEX,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_kardex);

			$this->parametro_inventarios=$this->parametro_inventarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				parametro_inventario_util::refrescarFKDescripciones($this->parametro_inventarios);
			}
			parametro_inventario_logic_add::checkparametro_inventarioToGets($this->parametro_inventarios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->parametro_inventarios);

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
			$parameterSelectionGeneralid_tipo_kardex->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_kardex,parametro_inventario_util::$ID_TIPO_KARDEX,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_kardex);

			$this->parametro_inventarios=$this->parametro_inventarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				parametro_inventario_util::refrescarFKDescripciones($this->parametro_inventarios);
			}
			parametro_inventario_logic_add::checkparametro_inventarioToGets($this->parametro_inventarios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->parametro_inventarios);
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
						
			//parametro_inventario_logic_add::checkparametro_inventarioToSave($this->parametro_inventario,$this->datosCliente,$this->connexion);	       
			parametro_inventario_logic_add::updateparametro_inventarioToSave($this->parametro_inventario);			
			parametro_inventario_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->parametro_inventario,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			$this->parametro_inventarioLogicAdditional->checkGeneralEntityToSave($this,$this->parametro_inventario,$this->datosCliente,$this->connexion);
			
			
			parametro_inventario_data::save($this->parametro_inventario, $this->connexion);	    	       	 				
			//parametro_inventario_logic_add::checkparametro_inventarioToSaveAfter($this->parametro_inventario,$this->datosCliente,$this->connexion);			
			$this->parametro_inventarioLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->parametro_inventario,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->parametro_inventario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->parametro_inventario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				parametro_inventario_util::refrescarFKDescripcion($this->parametro_inventario);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->parametro_inventario->getIsDeleted()) {
				$this->parametro_inventario=null;
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
						
			/*parametro_inventario_logic_add::checkparametro_inventarioToSave($this->parametro_inventario,$this->datosCliente,$this->connexion);*/	        
			parametro_inventario_logic_add::updateparametro_inventarioToSave($this->parametro_inventario);			
			$this->parametro_inventarioLogicAdditional->checkGeneralEntityToSave($this,$this->parametro_inventario,$this->datosCliente,$this->connexion);			
			parametro_inventario_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->parametro_inventario,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			parametro_inventario_data::save($this->parametro_inventario, $this->connexion);	    	       	 						
			/*parametro_inventario_logic_add::checkparametro_inventarioToSaveAfter($this->parametro_inventario,$this->datosCliente,$this->connexion);*/			
			$this->parametro_inventarioLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->parametro_inventario,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->parametro_inventario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->parametro_inventario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				parametro_inventario_util::refrescarFKDescripcion($this->parametro_inventario);				
			}
			
			if($this->parametro_inventario->getIsDeleted()) {
				$this->parametro_inventario=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(parametro_inventario $parametro_inventario,Connexion $connexion)  {
		$parametro_inventarioLogic = new  parametro_inventario_logic();		  		  
        try {		
			$parametro_inventarioLogic->setConnexion($connexion);			
			$parametro_inventarioLogic->setparametro_inventario($parametro_inventario);			
			$parametro_inventarioLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*parametro_inventario_logic_add::checkparametro_inventarioToSaves($this->parametro_inventarios,$this->datosCliente,$this->connexion);*/	        	
			$this->parametro_inventarioLogicAdditional->checkGeneralEntitiesToSaves($this,$this->parametro_inventarios,$this->datosCliente,$this->connexion);
			
	   		foreach($this->parametro_inventarios as $parametro_inventarioLocal) {				
								
				parametro_inventario_logic_add::updateparametro_inventarioToSave($parametro_inventarioLocal);	        	
				parametro_inventario_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$parametro_inventarioLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				parametro_inventario_data::save($parametro_inventarioLocal, $this->connexion);				
			}
			
			/*parametro_inventario_logic_add::checkparametro_inventarioToSavesAfter($this->parametro_inventarios,$this->datosCliente,$this->connexion);*/			
			$this->parametro_inventarioLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->parametro_inventarios,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_inventario_util::refrescarFKDescripciones($this->parametro_inventarios);
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
			/*parametro_inventario_logic_add::checkparametro_inventarioToSaves($this->parametro_inventarios,$this->datosCliente,$this->connexion);*/			
			$this->parametro_inventarioLogicAdditional->checkGeneralEntitiesToSaves($this,$this->parametro_inventarios,$this->datosCliente,$this->connexion);
			
	   		foreach($this->parametro_inventarios as $parametro_inventarioLocal) {				
								
				parametro_inventario_logic_add::updateparametro_inventarioToSave($parametro_inventarioLocal);	        	
				parametro_inventario_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$parametro_inventarioLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				parametro_inventario_data::save($parametro_inventarioLocal, $this->connexion);				
			}			
			
			/*parametro_inventario_logic_add::checkparametro_inventarioToSavesAfter($this->parametro_inventarios,$this->datosCliente,$this->connexion);*/			
			$this->parametro_inventarioLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->parametro_inventarios,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_inventario_util::refrescarFKDescripciones($this->parametro_inventarios);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $parametro_inventarios,Connexion $connexion)  {
		$parametro_inventarioLogic = new  parametro_inventario_logic();
		  		  
        try {		
			$parametro_inventarioLogic->setConnexion($connexion);			
			$parametro_inventarioLogic->setparametro_inventarios($parametro_inventarios);			
			$parametro_inventarioLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$parametro_inventariosAux=array();
		
		foreach($this->parametro_inventarios as $parametro_inventario) {
			if($parametro_inventario->getIsDeleted()==false) {
				$parametro_inventariosAux[]=$parametro_inventario;
			}
		}
		
		$this->parametro_inventarios=$parametro_inventariosAux;
	}
	
	public function updateToGetsAuxiliar(array &$parametro_inventarios) {
		if($this->parametro_inventarioLogicAdditional==null) {
			$this->parametro_inventarioLogicAdditional=new parametro_inventario_logic_add();
		}
		
		
		$this->parametro_inventarioLogicAdditional->updateToGets($parametro_inventarios,$this);					
		$this->parametro_inventarioLogicAdditional->updateToGetsReferencia($parametro_inventarios,$this);			
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->parametro_inventarios as $parametro_inventario) {
				
				$parametro_inventario->setid_empresa_Descripcion(parametro_inventario_util::getempresaDescripcion($parametro_inventario->getempresa()));
				$parametro_inventario->setid_termino_pago_proveedor_Descripcion(parametro_inventario_util::gettermino_pago_proveedorDescripcion($parametro_inventario->gettermino_pago_proveedor()));
				$parametro_inventario->setid_tipo_costeo_kardex_Descripcion(parametro_inventario_util::gettipo_costeo_kardexDescripcion($parametro_inventario->gettipo_costeo_kardex()));
				$parametro_inventario->setid_tipo_kardex_Descripcion(parametro_inventario_util::gettipo_kardexDescripcion($parametro_inventario->gettipo_kardex()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$parametro_inventario_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$parametro_inventario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$parametro_inventario_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$parametro_inventario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$parametro_inventario_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$parametro_inventarioForeignKey=new parametro_inventario_param_return();//parametro_inventarioForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$parametro_inventarioForeignKey,$parametro_inventario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_termino_pago_proveedor',$strRecargarFkTipos,',')) {
				$this->cargarCombostermino_pago_proveedorsFK($this->connexion,$strRecargarFkQuery,$parametro_inventarioForeignKey,$parametro_inventario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tipo_costeo_kardex',$strRecargarFkTipos,',')) {
				$this->cargarCombostipo_costeo_kardexsFK($this->connexion,$strRecargarFkQuery,$parametro_inventarioForeignKey,$parametro_inventario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tipo_kardex',$strRecargarFkTipos,',')) {
				$this->cargarCombostipo_kardexsFK($this->connexion,$strRecargarFkQuery,$parametro_inventarioForeignKey,$parametro_inventario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$parametro_inventarioForeignKey,$parametro_inventario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_termino_pago_proveedor',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombostermino_pago_proveedorsFK($this->connexion,' where id=-1 ',$parametro_inventarioForeignKey,$parametro_inventario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_tipo_costeo_kardex',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombostipo_costeo_kardexsFK($this->connexion,' where id=-1 ',$parametro_inventarioForeignKey,$parametro_inventario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_tipo_kardex',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombostipo_kardexsFK($this->connexion,' where id=-1 ',$parametro_inventarioForeignKey,$parametro_inventario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $parametro_inventarioForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$parametro_inventarioForeignKey,$parametro_inventario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$parametro_inventarioForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($parametro_inventario_session==null) {
			$parametro_inventario_session=new parametro_inventario_session();
		}
		
		if($parametro_inventario_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($parametro_inventarioForeignKey->idempresaDefaultFK==0) {
					$parametro_inventarioForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$parametro_inventarioForeignKey->empresasFK[$empresaLocal->getId()]=parametro_inventario_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($parametro_inventario_session->bigidempresaActual!=null && $parametro_inventario_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($parametro_inventario_session->bigidempresaActual);//WithConnection

				$parametro_inventarioForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=parametro_inventario_util::getempresaDescripcion($empresaLogic->getempresa());
				$parametro_inventarioForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombostermino_pago_proveedorsFK($connexion=null,$strRecargarFkQuery='',$parametro_inventarioForeignKey,$parametro_inventario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$termino_pago_proveedorLogic= new termino_pago_proveedor_logic();
		$pagination= new Pagination();
		$parametro_inventarioForeignKey->termino_pago_proveedorsFK=array();

		$termino_pago_proveedorLogic->setConnexion($connexion);
		$termino_pago_proveedorLogic->gettermino_pago_proveedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($parametro_inventario_session==null) {
			$parametro_inventario_session=new parametro_inventario_session();
		}
		
		if($parametro_inventario_session->bitBusquedaDesdeFKSesiontermino_pago_proveedor!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=termino_pago_proveedor_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobaltermino_pago_proveedor=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltermino_pago_proveedor=Funciones::GetFinalQueryAppend($finalQueryGlobaltermino_pago_proveedor, '');
				$finalQueryGlobaltermino_pago_proveedor.=termino_pago_proveedor_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltermino_pago_proveedor.$strRecargarFkQuery;		

				$termino_pago_proveedorLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($termino_pago_proveedorLogic->gettermino_pago_proveedors() as $termino_pago_proveedorLocal ) {
				if($parametro_inventarioForeignKey->idtermino_pago_proveedorDefaultFK==0) {
					$parametro_inventarioForeignKey->idtermino_pago_proveedorDefaultFK=$termino_pago_proveedorLocal->getId();
				}

				$parametro_inventarioForeignKey->termino_pago_proveedorsFK[$termino_pago_proveedorLocal->getId()]=parametro_inventario_util::gettermino_pago_proveedorDescripcion($termino_pago_proveedorLocal);
			}

		} else {

			if($parametro_inventario_session->bigidtermino_pago_proveedorActual!=null && $parametro_inventario_session->bigidtermino_pago_proveedorActual > 0) {
				$termino_pago_proveedorLogic->getEntity($parametro_inventario_session->bigidtermino_pago_proveedorActual);//WithConnection

				$parametro_inventarioForeignKey->termino_pago_proveedorsFK[$termino_pago_proveedorLogic->gettermino_pago_proveedor()->getId()]=parametro_inventario_util::gettermino_pago_proveedorDescripcion($termino_pago_proveedorLogic->gettermino_pago_proveedor());
				$parametro_inventarioForeignKey->idtermino_pago_proveedorDefaultFK=$termino_pago_proveedorLogic->gettermino_pago_proveedor()->getId();
			}
		}
	}

	public function cargarCombostipo_costeo_kardexsFK($connexion=null,$strRecargarFkQuery='',$parametro_inventarioForeignKey,$parametro_inventario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$tipo_costeo_kardexLogic= new tipo_costeo_kardex_logic();
		$pagination= new Pagination();
		$parametro_inventarioForeignKey->tipo_costeo_kardexsFK=array();

		$tipo_costeo_kardexLogic->setConnexion($connexion);
		$tipo_costeo_kardexLogic->gettipo_costeo_kardexDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($parametro_inventario_session==null) {
			$parametro_inventario_session=new parametro_inventario_session();
		}
		
		if($parametro_inventario_session->bitBusquedaDesdeFKSesiontipo_costeo_kardex!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=tipo_costeo_kardex_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobaltipo_costeo_kardex=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltipo_costeo_kardex=Funciones::GetFinalQueryAppend($finalQueryGlobaltipo_costeo_kardex, '');
				$finalQueryGlobaltipo_costeo_kardex.=tipo_costeo_kardex_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltipo_costeo_kardex.$strRecargarFkQuery;		

				$tipo_costeo_kardexLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($tipo_costeo_kardexLogic->gettipo_costeo_kardexs() as $tipo_costeo_kardexLocal ) {
				if($parametro_inventarioForeignKey->idtipo_costeo_kardexDefaultFK==0) {
					$parametro_inventarioForeignKey->idtipo_costeo_kardexDefaultFK=$tipo_costeo_kardexLocal->getId();
				}

				$parametro_inventarioForeignKey->tipo_costeo_kardexsFK[$tipo_costeo_kardexLocal->getId()]=parametro_inventario_util::gettipo_costeo_kardexDescripcion($tipo_costeo_kardexLocal);
			}

		} else {

			if($parametro_inventario_session->bigidtipo_costeo_kardexActual!=null && $parametro_inventario_session->bigidtipo_costeo_kardexActual > 0) {
				$tipo_costeo_kardexLogic->getEntity($parametro_inventario_session->bigidtipo_costeo_kardexActual);//WithConnection

				$parametro_inventarioForeignKey->tipo_costeo_kardexsFK[$tipo_costeo_kardexLogic->gettipo_costeo_kardex()->getId()]=parametro_inventario_util::gettipo_costeo_kardexDescripcion($tipo_costeo_kardexLogic->gettipo_costeo_kardex());
				$parametro_inventarioForeignKey->idtipo_costeo_kardexDefaultFK=$tipo_costeo_kardexLogic->gettipo_costeo_kardex()->getId();
			}
		}
	}

	public function cargarCombostipo_kardexsFK($connexion=null,$strRecargarFkQuery='',$parametro_inventarioForeignKey,$parametro_inventario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$tipo_kardexLogic= new tipo_kardex_logic();
		$pagination= new Pagination();
		$parametro_inventarioForeignKey->tipo_kardexsFK=array();

		$tipo_kardexLogic->setConnexion($connexion);
		$tipo_kardexLogic->gettipo_kardexDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($parametro_inventario_session==null) {
			$parametro_inventario_session=new parametro_inventario_session();
		}
		
		if($parametro_inventario_session->bitBusquedaDesdeFKSesiontipo_kardex!=true) {
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
				if($parametro_inventarioForeignKey->idtipo_kardexDefaultFK==0) {
					$parametro_inventarioForeignKey->idtipo_kardexDefaultFK=$tipo_kardexLocal->getId();
				}

				$parametro_inventarioForeignKey->tipo_kardexsFK[$tipo_kardexLocal->getId()]=parametro_inventario_util::gettipo_kardexDescripcion($tipo_kardexLocal);
			}

		} else {

			if($parametro_inventario_session->bigidtipo_kardexActual!=null && $parametro_inventario_session->bigidtipo_kardexActual > 0) {
				$tipo_kardexLogic->getEntity($parametro_inventario_session->bigidtipo_kardexActual);//WithConnection

				$parametro_inventarioForeignKey->tipo_kardexsFK[$tipo_kardexLogic->gettipo_kardex()->getId()]=parametro_inventario_util::gettipo_kardexDescripcion($tipo_kardexLogic->gettipo_kardex());
				$parametro_inventarioForeignKey->idtipo_kardexDefaultFK=$tipo_kardexLogic->gettipo_kardex()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($parametro_inventario) {
		$this->saveRelacionesBase($parametro_inventario,true);
	}

	public function saveRelaciones($parametro_inventario) {
		$this->saveRelacionesBase($parametro_inventario,false);
	}

	public function saveRelacionesBase($parametro_inventario,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setparametro_inventario($parametro_inventario);

			if(parametro_inventario_logic_add::validarSaveRelaciones($parametro_inventario,$this)) {

				parametro_inventario_logic_add::updateRelacionesToSave($parametro_inventario,$this);

				if(($this->parametro_inventario->getIsNew() || $this->parametro_inventario->getIsChanged()) && !$this->parametro_inventario->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->parametro_inventario->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				parametro_inventario_logic_add::updateRelacionesToSaveAfter($parametro_inventario,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $parametro_inventarios,parametro_inventario_param_return $parametro_inventarioParameterGeneral) : parametro_inventario_param_return {
		$parametro_inventarioReturnGeneral=new parametro_inventario_param_return();
	
		 try {	
			
			if($this->parametro_inventarioLogicAdditional==null) {
				$this->parametro_inventarioLogicAdditional=new parametro_inventario_logic_add();
			}
			
			$this->parametro_inventarioLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$sProceso,$parametro_inventarios,$parametro_inventarioParameterGeneral,$parametro_inventarioReturnGeneral);
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $parametro_inventarioReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $parametro_inventarios,parametro_inventario_param_return $parametro_inventarioParameterGeneral) : parametro_inventario_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$parametro_inventarioReturnGeneral=new parametro_inventario_param_return();
	
			
			if($this->parametro_inventarioLogicAdditional==null) {
				$this->parametro_inventarioLogicAdditional=new parametro_inventario_logic_add();
			}
			
			$this->parametro_inventarioLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$strProceso,$parametro_inventarios,$parametro_inventarioParameterGeneral,$parametro_inventarioReturnGeneral);
			
			$this->connexion->getConnection()->commit();			
			
			return $parametro_inventarioReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_inventarios,parametro_inventario $parametro_inventario,parametro_inventario_param_return $parametro_inventarioParameterGeneral,bool $isEsNuevoparametro_inventario,array $clases) : parametro_inventario_param_return {
		 try {	
			$parametro_inventarioReturnGeneral=new parametro_inventario_param_return();
	
			$parametro_inventarioReturnGeneral->setparametro_inventario($parametro_inventario);
			$parametro_inventarioReturnGeneral->setparametro_inventarios($parametro_inventarios);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$parametro_inventarioReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			if($this->parametro_inventarioLogicAdditional==null) {
				$this->parametro_inventarioLogicAdditional=new parametro_inventario_logic_add();
			}
			
			$parametro_inventarioReturnGeneral=$this->parametro_inventarioLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$parametro_inventarios,$parametro_inventario,$parametro_inventarioParameterGeneral,$parametro_inventarioReturnGeneral,$isEsNuevoparametro_inventario,$clases);
			
			/*parametro_inventarioLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$parametro_inventarios,$parametro_inventario,$parametro_inventarioParameterGeneral,$parametro_inventarioReturnGeneral,$isEsNuevoparametro_inventario,$clases);*/
			
			return $parametro_inventarioReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_inventarios,parametro_inventario $parametro_inventario,parametro_inventario_param_return $parametro_inventarioParameterGeneral,bool $isEsNuevoparametro_inventario,array $clases) : parametro_inventario_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$parametro_inventarioReturnGeneral=new parametro_inventario_param_return();
	
			$parametro_inventarioReturnGeneral->setparametro_inventario($parametro_inventario);
			$parametro_inventarioReturnGeneral->setparametro_inventarios($parametro_inventarios);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$parametro_inventarioReturnGeneral->setConRecargarPropiedades(true);
			}
			
			if($this->parametro_inventarioLogicAdditional==null) {
				$this->parametro_inventarioLogicAdditional=new parametro_inventario_logic_add();
			}
			
			$parametro_inventarioReturnGeneral=$this->parametro_inventarioLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$parametro_inventarios,$parametro_inventario,$parametro_inventarioParameterGeneral,$parametro_inventarioReturnGeneral,$isEsNuevoparametro_inventario,$clases);
			
			/*parametro_inventarioLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$parametro_inventarios,$parametro_inventario,$parametro_inventarioParameterGeneral,$parametro_inventarioReturnGeneral,$isEsNuevoparametro_inventario,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $parametro_inventarioReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_inventarios,parametro_inventario $parametro_inventario,parametro_inventario_param_return $parametro_inventarioParameterGeneral,bool $isEsNuevoparametro_inventario,array $clases) : parametro_inventario_param_return {
		 try {	
			$parametro_inventarioReturnGeneral=new parametro_inventario_param_return();
	
			$parametro_inventarioReturnGeneral->setparametro_inventario($parametro_inventario);
			$parametro_inventarioReturnGeneral->setparametro_inventarios($parametro_inventarios);
			
			
			
			if($this->parametro_inventarioLogicAdditional==null) {
				$this->parametro_inventarioLogicAdditional=new parametro_inventario_logic_add();
			}
			
			$parametro_inventarioReturnGeneral=$this->parametro_inventarioLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$parametro_inventarios,$parametro_inventario,$parametro_inventarioParameterGeneral,$parametro_inventarioReturnGeneral,$isEsNuevoparametro_inventario,$clases);
			
			/*parametro_inventarioLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$parametro_inventarios,$parametro_inventario,$parametro_inventarioParameterGeneral,$parametro_inventarioReturnGeneral,$isEsNuevoparametro_inventario,$clases);*/
			
			return $parametro_inventarioReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_inventarios,parametro_inventario $parametro_inventario,parametro_inventario_param_return $parametro_inventarioParameterGeneral,bool $isEsNuevoparametro_inventario,array $clases) : parametro_inventario_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$parametro_inventarioReturnGeneral=new parametro_inventario_param_return();
	
			$parametro_inventarioReturnGeneral->setparametro_inventario($parametro_inventario);
			$parametro_inventarioReturnGeneral->setparametro_inventarios($parametro_inventarios);
			
			
			if($this->parametro_inventarioLogicAdditional==null) {
				$this->parametro_inventarioLogicAdditional=new parametro_inventario_logic_add();
			}
			
			$parametro_inventarioReturnGeneral=$this->parametro_inventarioLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$parametro_inventarios,$parametro_inventario,$parametro_inventarioParameterGeneral,$parametro_inventarioReturnGeneral,$isEsNuevoparametro_inventario,$clases);
			
			/*parametro_inventarioLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$parametro_inventarios,$parametro_inventario,$parametro_inventarioParameterGeneral,$parametro_inventarioReturnGeneral,$isEsNuevoparametro_inventario,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $parametro_inventarioReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,parametro_inventario $parametro_inventario,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,parametro_inventario $parametro_inventario,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		parametro_inventario_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(parametro_inventario $parametro_inventario,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			parametro_inventario_logic_add::updateparametro_inventarioToGet($this->parametro_inventario);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$parametro_inventario->setempresa($this->parametro_inventarioDataAccess->getempresa($this->connexion,$parametro_inventario));
		$parametro_inventario->settermino_pago_proveedor($this->parametro_inventarioDataAccess->gettermino_pago_proveedor($this->connexion,$parametro_inventario));
		$parametro_inventario->settipo_costeo_kardex($this->parametro_inventarioDataAccess->gettipo_costeo_kardex($this->connexion,$parametro_inventario));
		$parametro_inventario->settipo_kardex($this->parametro_inventarioDataAccess->gettipo_kardex($this->connexion,$parametro_inventario));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$parametro_inventario->setempresa($this->parametro_inventarioDataAccess->getempresa($this->connexion,$parametro_inventario));
				continue;
			}

			if($clas->clas==termino_pago_proveedor::$class.'') {
				$parametro_inventario->settermino_pago_proveedor($this->parametro_inventarioDataAccess->gettermino_pago_proveedor($this->connexion,$parametro_inventario));
				continue;
			}

			if($clas->clas==tipo_costeo_kardex::$class.'') {
				$parametro_inventario->settipo_costeo_kardex($this->parametro_inventarioDataAccess->gettipo_costeo_kardex($this->connexion,$parametro_inventario));
				continue;
			}

			if($clas->clas==tipo_kardex::$class.'') {
				$parametro_inventario->settipo_kardex($this->parametro_inventarioDataAccess->gettipo_kardex($this->connexion,$parametro_inventario));
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
			$parametro_inventario->setempresa($this->parametro_inventarioDataAccess->getempresa($this->connexion,$parametro_inventario));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==termino_pago_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$parametro_inventario->settermino_pago_proveedor($this->parametro_inventarioDataAccess->gettermino_pago_proveedor($this->connexion,$parametro_inventario));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==tipo_costeo_kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$parametro_inventario->settipo_costeo_kardex($this->parametro_inventarioDataAccess->gettipo_costeo_kardex($this->connexion,$parametro_inventario));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==tipo_kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$parametro_inventario->settipo_kardex($this->parametro_inventarioDataAccess->gettipo_kardex($this->connexion,$parametro_inventario));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$parametro_inventario->setempresa($this->parametro_inventarioDataAccess->getempresa($this->connexion,$parametro_inventario));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($parametro_inventario->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$parametro_inventario->settermino_pago_proveedor($this->parametro_inventarioDataAccess->gettermino_pago_proveedor($this->connexion,$parametro_inventario));
		$termino_pago_proveedorLogic= new termino_pago_proveedor_logic($this->connexion);
		$termino_pago_proveedorLogic->deepLoad($parametro_inventario->gettermino_pago_proveedor(),$isDeep,$deepLoadType,$clases);
				
		$parametro_inventario->settipo_costeo_kardex($this->parametro_inventarioDataAccess->gettipo_costeo_kardex($this->connexion,$parametro_inventario));
		$tipo_costeo_kardexLogic= new tipo_costeo_kardex_logic($this->connexion);
		$tipo_costeo_kardexLogic->deepLoad($parametro_inventario->gettipo_costeo_kardex(),$isDeep,$deepLoadType,$clases);
				
		$parametro_inventario->settipo_kardex($this->parametro_inventarioDataAccess->gettipo_kardex($this->connexion,$parametro_inventario));
		$tipo_kardexLogic= new tipo_kardex_logic($this->connexion);
		$tipo_kardexLogic->deepLoad($parametro_inventario->gettipo_kardex(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$parametro_inventario->setempresa($this->parametro_inventarioDataAccess->getempresa($this->connexion,$parametro_inventario));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($parametro_inventario->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==termino_pago_proveedor::$class.'') {
				$parametro_inventario->settermino_pago_proveedor($this->parametro_inventarioDataAccess->gettermino_pago_proveedor($this->connexion,$parametro_inventario));
				$termino_pago_proveedorLogic= new termino_pago_proveedor_logic($this->connexion);
				$termino_pago_proveedorLogic->deepLoad($parametro_inventario->gettermino_pago_proveedor(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==tipo_costeo_kardex::$class.'') {
				$parametro_inventario->settipo_costeo_kardex($this->parametro_inventarioDataAccess->gettipo_costeo_kardex($this->connexion,$parametro_inventario));
				$tipo_costeo_kardexLogic= new tipo_costeo_kardex_logic($this->connexion);
				$tipo_costeo_kardexLogic->deepLoad($parametro_inventario->gettipo_costeo_kardex(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==tipo_kardex::$class.'') {
				$parametro_inventario->settipo_kardex($this->parametro_inventarioDataAccess->gettipo_kardex($this->connexion,$parametro_inventario));
				$tipo_kardexLogic= new tipo_kardex_logic($this->connexion);
				$tipo_kardexLogic->deepLoad($parametro_inventario->gettipo_kardex(),$isDeep,$deepLoadType,$clases);				
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
			$parametro_inventario->setempresa($this->parametro_inventarioDataAccess->getempresa($this->connexion,$parametro_inventario));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($parametro_inventario->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==termino_pago_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$parametro_inventario->settermino_pago_proveedor($this->parametro_inventarioDataAccess->gettermino_pago_proveedor($this->connexion,$parametro_inventario));
			$termino_pago_proveedorLogic= new termino_pago_proveedor_logic($this->connexion);
			$termino_pago_proveedorLogic->deepLoad($parametro_inventario->gettermino_pago_proveedor(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_costeo_kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$parametro_inventario->settipo_costeo_kardex($this->parametro_inventarioDataAccess->gettipo_costeo_kardex($this->connexion,$parametro_inventario));
			$tipo_costeo_kardexLogic= new tipo_costeo_kardex_logic($this->connexion);
			$tipo_costeo_kardexLogic->deepLoad($parametro_inventario->gettipo_costeo_kardex(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$parametro_inventario->settipo_kardex($this->parametro_inventarioDataAccess->gettipo_kardex($this->connexion,$parametro_inventario));
			$tipo_kardexLogic= new tipo_kardex_logic($this->connexion);
			$tipo_kardexLogic->deepLoad($parametro_inventario->gettipo_kardex(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(parametro_inventario $parametro_inventario,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			parametro_inventario_logic_add::updateparametro_inventarioToSave($this->parametro_inventario);			
			
			if(!$paraDeleteCascade) {				
				parametro_inventario_data::save($parametro_inventario, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($parametro_inventario->getempresa(),$this->connexion);
		termino_pago_proveedor_data::save($parametro_inventario->gettermino_pago_proveedor(),$this->connexion);
		tipo_costeo_kardex_data::save($parametro_inventario->gettipo_costeo_kardex(),$this->connexion);
		tipo_kardex_data::save($parametro_inventario->gettipo_kardex(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($parametro_inventario->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==termino_pago_proveedor::$class.'') {
				termino_pago_proveedor_data::save($parametro_inventario->gettermino_pago_proveedor(),$this->connexion);
				continue;
			}

			if($clas->clas==tipo_costeo_kardex::$class.'') {
				tipo_costeo_kardex_data::save($parametro_inventario->gettipo_costeo_kardex(),$this->connexion);
				continue;
			}

			if($clas->clas==tipo_kardex::$class.'') {
				tipo_kardex_data::save($parametro_inventario->gettipo_kardex(),$this->connexion);
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
			empresa_data::save($parametro_inventario->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==termino_pago_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			termino_pago_proveedor_data::save($parametro_inventario->gettermino_pago_proveedor(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_costeo_kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_costeo_kardex_data::save($parametro_inventario->gettipo_costeo_kardex(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_kardex_data::save($parametro_inventario->gettipo_kardex(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($parametro_inventario->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($parametro_inventario->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		termino_pago_proveedor_data::save($parametro_inventario->gettermino_pago_proveedor(),$this->connexion);
		$termino_pago_proveedorLogic= new termino_pago_proveedor_logic($this->connexion);
		$termino_pago_proveedorLogic->deepSave($parametro_inventario->gettermino_pago_proveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		tipo_costeo_kardex_data::save($parametro_inventario->gettipo_costeo_kardex(),$this->connexion);
		$tipo_costeo_kardexLogic= new tipo_costeo_kardex_logic($this->connexion);
		$tipo_costeo_kardexLogic->deepSave($parametro_inventario->gettipo_costeo_kardex(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		tipo_kardex_data::save($parametro_inventario->gettipo_kardex(),$this->connexion);
		$tipo_kardexLogic= new tipo_kardex_logic($this->connexion);
		$tipo_kardexLogic->deepSave($parametro_inventario->gettipo_kardex(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($parametro_inventario->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($parametro_inventario->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==termino_pago_proveedor::$class.'') {
				termino_pago_proveedor_data::save($parametro_inventario->gettermino_pago_proveedor(),$this->connexion);
				$termino_pago_proveedorLogic= new termino_pago_proveedor_logic($this->connexion);
				$termino_pago_proveedorLogic->deepSave($parametro_inventario->gettermino_pago_proveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==tipo_costeo_kardex::$class.'') {
				tipo_costeo_kardex_data::save($parametro_inventario->gettipo_costeo_kardex(),$this->connexion);
				$tipo_costeo_kardexLogic= new tipo_costeo_kardex_logic($this->connexion);
				$tipo_costeo_kardexLogic->deepSave($parametro_inventario->gettipo_costeo_kardex(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==tipo_kardex::$class.'') {
				tipo_kardex_data::save($parametro_inventario->gettipo_kardex(),$this->connexion);
				$tipo_kardexLogic= new tipo_kardex_logic($this->connexion);
				$tipo_kardexLogic->deepSave($parametro_inventario->gettipo_kardex(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
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
			empresa_data::save($parametro_inventario->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($parametro_inventario->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==termino_pago_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			termino_pago_proveedor_data::save($parametro_inventario->gettermino_pago_proveedor(),$this->connexion);
			$termino_pago_proveedorLogic= new termino_pago_proveedor_logic($this->connexion);
			$termino_pago_proveedorLogic->deepSave($parametro_inventario->gettermino_pago_proveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_costeo_kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_costeo_kardex_data::save($parametro_inventario->gettipo_costeo_kardex(),$this->connexion);
			$tipo_costeo_kardexLogic= new tipo_costeo_kardex_logic($this->connexion);
			$tipo_costeo_kardexLogic->deepSave($parametro_inventario->gettipo_costeo_kardex(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_kardex_data::save($parametro_inventario->gettipo_kardex(),$this->connexion);
			$tipo_kardexLogic= new tipo_kardex_logic($this->connexion);
			$tipo_kardexLogic->deepSave($parametro_inventario->gettipo_kardex(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				parametro_inventario_data::save($parametro_inventario, $this->connexion);
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
			
			$this->deepLoad($this->parametro_inventario,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->parametro_inventarios as $parametro_inventario) {
				$this->deepLoad($parametro_inventario,$isDeep,$deepLoadType,$clases);
								
				parametro_inventario_util::refrescarFKDescripciones($this->parametro_inventarios);
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
			
			foreach($this->parametro_inventarios as $parametro_inventario) {
				$this->deepLoad($parametro_inventario,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->parametro_inventario,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->parametro_inventarios as $parametro_inventario) {
				$this->deepSave($parametro_inventario,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->parametro_inventarios as $parametro_inventario) {
				$this->deepSave($parametro_inventario,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(termino_pago_proveedor::$class);
				$classes[]=new Classe(tipo_costeo_kardex::$class);
				$classes[]=new Classe(tipo_kardex::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==termino_pago_proveedor::$class) {
						$classes[]=new Classe(termino_pago_proveedor::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==tipo_costeo_kardex::$class) {
						$classes[]=new Classe(tipo_costeo_kardex::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==tipo_kardex::$class) {
						$classes[]=new Classe(tipo_kardex::$class);
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
					if($clas->clas==termino_pago_proveedor::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(termino_pago_proveedor::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==tipo_costeo_kardex::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(tipo_costeo_kardex::$class);
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
	
	
	
	
	
	
	
	public function getparametro_inventario() : ?parametro_inventario {	
		/*
		parametro_inventario_logic_add::checkparametro_inventarioToGet($this->parametro_inventario,$this->datosCliente);
		parametro_inventario_logic_add::updateparametro_inventarioToGet($this->parametro_inventario);
		*/
			
		return $this->parametro_inventario;
	}
		
	public function setparametro_inventario(parametro_inventario $newparametro_inventario) {
		$this->parametro_inventario = $newparametro_inventario;
	}
	
	public function getparametro_inventarios() : array {		
		/*
		parametro_inventario_logic_add::checkparametro_inventarioToGets($this->parametro_inventarios,$this->datosCliente);
		
		foreach ($this->parametro_inventarios as $parametro_inventarioLocal ) {
			parametro_inventario_logic_add::updateparametro_inventarioToGet($parametro_inventarioLocal);
		}
		*/
		
		return $this->parametro_inventarios;
	}
	
	public function setparametro_inventarios(array $newparametro_inventarios) {
		$this->parametro_inventarios = $newparametro_inventarios;
	}
	
	public function getparametro_inventarioDataAccess() : parametro_inventario_data {
		return $this->parametro_inventarioDataAccess;
	}
	
	public function setparametro_inventarioDataAccess(parametro_inventario_data $newparametro_inventarioDataAccess) {
		$this->parametro_inventarioDataAccess = $newparametro_inventarioDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        parametro_inventario_carga::$CONTROLLER;;        
		
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
