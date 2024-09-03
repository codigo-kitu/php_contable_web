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

namespace com\bydan\contabilidad\general\tabla\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\general\tabla\util\tabla_carga;
use com\bydan\contabilidad\general\tabla\util\tabla_param_return;

use com\bydan\contabilidad\general\tabla\presentation\session\tabla_session;

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

use com\bydan\contabilidad\general\tabla\util\tabla_util;
use com\bydan\contabilidad\general\tabla\business\entity\tabla;
use com\bydan\contabilidad\general\tabla\business\data\tabla_data;

//FK


use com\bydan\contabilidad\seguridad\modulo\business\data\modulo_data;
use com\bydan\contabilidad\seguridad\modulo\business\logic\modulo_logic;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_util;

//REL


use com\bydan\contabilidad\inventario\costo_producto\business\entity\costo_producto;
use com\bydan\contabilidad\inventario\costo_producto\business\data\costo_producto_data;
use com\bydan\contabilidad\inventario\costo_producto\business\logic\costo_producto_logic;
use com\bydan\contabilidad\inventario\costo_producto\util\costo_producto_carga;
use com\bydan\contabilidad\inventario\costo_producto\util\costo_producto_util;

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\business\entity\cuenta_corriente_detalle;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\business\data\cuenta_corriente_detalle_data;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\business\logic\cuenta_corriente_detalle_logic;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\util\cuenta_corriente_detalle_carga;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\util\cuenta_corriente_detalle_util;

//REL DETALLES

use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\util\clasificacion_cheque_carga;
use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\business\logic\clasificacion_cheque_logic;



class tabla_logic  extends GeneralEntityLogic implements tabla_logicI {	
	/*GENERAL*/
	public tabla_data $tablaDataAccess;
	//public ?tabla_logic_add $tablaLogicAdditional=null;
	public ?tabla $tabla;
	public array $tablas;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->tablaDataAccess = new tabla_data();			
			$this->tablas = array();
			$this->tabla = new tabla();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->tablaLogicAdditional = new tabla_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->tablaLogicAdditional==null) {
		//	$this->tablaLogicAdditional=new tabla_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->tablaDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->tablaDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->tablaDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->tablaDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->tablas = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tablas=$this->tablaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tabla_util::refrescarFKDescripciones($this->tablas);
			}
			
			//tabla_logic_add::checktablaToGets($this->tablas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tablas);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->tablas = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tablas=$this->tablaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tabla_util::refrescarFKDescripciones($this->tablas);
			}
			
			//tabla_logic_add::checktablaToGets($this->tablas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tablas);
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
		$this->tabla = new tabla();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->tabla=$this->tablaDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->tabla,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tabla_util::refrescarFKDescripcion($this->tabla);
			}
						
			//tabla_logic_add::checktablaToGet($this->tabla,$this->datosCliente);
			//tabla_logic_add::updatetablaToGet($this->tabla);
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
		$this->tabla = new  tabla();
		  		  
        try {		
			$this->tabla=$this->tablaDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->tabla,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tabla_util::refrescarFKDescripcion($this->tabla);
			}
			
			//tabla_logic_add::checktablaToGet($this->tabla,$this->datosCliente);
			//tabla_logic_add::updatetablaToGet($this->tabla);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?tabla {
		$tablaLogic = new  tabla_logic();
		  		  
        try {		
			$tablaLogic->setConnexion($connexion);			
			$tablaLogic->getEntity($id);			
			return $tablaLogic->gettabla();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->tabla = new  tabla();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->tabla=$this->tablaDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->tabla,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tabla_util::refrescarFKDescripcion($this->tabla);
			}
			
			//tabla_logic_add::checktablaToGet($this->tabla,$this->datosCliente);
			//tabla_logic_add::updatetablaToGet($this->tabla);
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
		$this->tabla = new  tabla();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tabla=$this->tablaDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->tabla,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tabla_util::refrescarFKDescripcion($this->tabla);
			}
			
			//tabla_logic_add::checktablaToGet($this->tabla,$this->datosCliente);
			//tabla_logic_add::updatetablaToGet($this->tabla);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?tabla {
		$tablaLogic = new  tabla_logic();
		  		  
        try {		
			$tablaLogic->setConnexion($connexion);			
			$tablaLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $tablaLogic->gettabla();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->tablas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->tablas=$this->tablaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tabla_util::refrescarFKDescripciones($this->tablas);
			}
			
			//tabla_logic_add::checktablaToGets($this->tablas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tablas);			
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
		$this->tablas = array();
		  		  
        try {			
			$this->tablas=$this->tablaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tabla_util::refrescarFKDescripciones($this->tablas);
			}
			
			//tabla_logic_add::checktablaToGets($this->tablas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tablas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->tablas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tablas=$this->tablaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tabla_util::refrescarFKDescripciones($this->tablas);
			}
			
			//tabla_logic_add::checktablaToGets($this->tablas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tablas);
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
		$this->tablas = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tablas=$this->tablaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tabla_util::refrescarFKDescripciones($this->tablas);
			}
			
			//tabla_logic_add::checktablaToGets($this->tablas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tablas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$tablaLogic = new  tabla_logic();
		  		  
        try {		
			$tablaLogic->setConnexion($connexion);			
			$tablaLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $tablaLogic->gettablas();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->tablas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->tablas=$this->tablaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tabla_util::refrescarFKDescripciones($this->tablas);
			}
			
			//tabla_logic_add::checktablaToGets($this->tablas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tablas);
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
		$this->tablas = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tablas=$this->tablaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tabla_util::refrescarFKDescripciones($this->tablas);
			}
			
			//tabla_logic_add::checktablaToGets($this->tablas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tablas);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->tablas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tablas=$this->tablaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tabla_util::refrescarFKDescripciones($this->tablas);
			}
			
			//tabla_logic_add::checktablaToGets($this->tablas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tablas);
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
		$this->tablas = array();
		  		  
        try {			
			$this->tablas=$this->tablaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tabla_util::refrescarFKDescripciones($this->tablas);
			}	
			
			//tabla_logic_add::checktablaToGets($this->tablas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tablas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->tablas = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->tablas=$this->tablaDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tabla_util::refrescarFKDescripciones($this->tablas);
			}
			
			//tabla_logic_add::checktablaToGets($this->tablas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tablas);
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
		$this->tablas = array();
		  		  
        try {		
			$this->tablas=$this->tablaDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tabla_util::refrescarFKDescripciones($this->tablas);
			}
			
			//tabla_logic_add::checktablaToGets($this->tablas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tablas);

		}  catch(Exception $e) {						
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
			$parameterSelectionGeneralid_modulo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_modulo,tabla_util::$ID_MODULO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_modulo);

			$this->tablas=$this->tablaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				tabla_util::refrescarFKDescripciones($this->tablas);
			}
			//tabla_logic_add::checktablaToGets($this->tablas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->tablas);

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
			$parameterSelectionGeneralid_modulo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_modulo,tabla_util::$ID_MODULO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_modulo);

			$this->tablas=$this->tablaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				tabla_util::refrescarFKDescripciones($this->tablas);
			}
			//tabla_logic_add::checktablaToGets($this->tablas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->tablas);
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
						
			//tabla_logic_add::checktablaToSave($this->tabla,$this->datosCliente,$this->connexion);	       
			//tabla_logic_add::updatetablaToSave($this->tabla);			
			tabla_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->tabla,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->tablaLogicAdditional->checkGeneralEntityToSave($this,$this->tabla,$this->datosCliente,$this->connexion);
			
			
			tabla_data::save($this->tabla, $this->connexion);	    	       	 				
			//tabla_logic_add::checktablaToSaveAfter($this->tabla,$this->datosCliente,$this->connexion);			
			//$this->tablaLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->tabla,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->tabla,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->tabla,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				tabla_util::refrescarFKDescripcion($this->tabla);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->tabla->getIsDeleted()) {
				$this->tabla=null;
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
						
			/*tabla_logic_add::checktablaToSave($this->tabla,$this->datosCliente,$this->connexion);*/	        
			//tabla_logic_add::updatetablaToSave($this->tabla);			
			//$this->tablaLogicAdditional->checkGeneralEntityToSave($this,$this->tabla,$this->datosCliente,$this->connexion);			
			tabla_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->tabla,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			tabla_data::save($this->tabla, $this->connexion);	    	       	 						
			/*tabla_logic_add::checktablaToSaveAfter($this->tabla,$this->datosCliente,$this->connexion);*/			
			//$this->tablaLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->tabla,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->tabla,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->tabla,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				tabla_util::refrescarFKDescripcion($this->tabla);				
			}
			
			if($this->tabla->getIsDeleted()) {
				$this->tabla=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(tabla $tabla,Connexion $connexion)  {
		$tablaLogic = new  tabla_logic();		  		  
        try {		
			$tablaLogic->setConnexion($connexion);			
			$tablaLogic->settabla($tabla);			
			$tablaLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*tabla_logic_add::checktablaToSaves($this->tablas,$this->datosCliente,$this->connexion);*/	        	
			//$this->tablaLogicAdditional->checkGeneralEntitiesToSaves($this,$this->tablas,$this->datosCliente,$this->connexion);
			
	   		foreach($this->tablas as $tablaLocal) {				
								
				//tabla_logic_add::updatetablaToSave($tablaLocal);	        	
				tabla_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$tablaLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				tabla_data::save($tablaLocal, $this->connexion);				
			}
			
			/*tabla_logic_add::checktablaToSavesAfter($this->tablas,$this->datosCliente,$this->connexion);*/			
			//$this->tablaLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->tablas,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tabla_util::refrescarFKDescripciones($this->tablas);
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
			/*tabla_logic_add::checktablaToSaves($this->tablas,$this->datosCliente,$this->connexion);*/			
			//$this->tablaLogicAdditional->checkGeneralEntitiesToSaves($this,$this->tablas,$this->datosCliente,$this->connexion);
			
	   		foreach($this->tablas as $tablaLocal) {				
								
				//tabla_logic_add::updatetablaToSave($tablaLocal);	        	
				tabla_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$tablaLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				tabla_data::save($tablaLocal, $this->connexion);				
			}			
			
			/*tabla_logic_add::checktablaToSavesAfter($this->tablas,$this->datosCliente,$this->connexion);*/			
			//$this->tablaLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->tablas,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tabla_util::refrescarFKDescripciones($this->tablas);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $tablas,Connexion $connexion)  {
		$tablaLogic = new  tabla_logic();
		  		  
        try {		
			$tablaLogic->setConnexion($connexion);			
			$tablaLogic->settablas($tablas);			
			$tablaLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$tablasAux=array();
		
		foreach($this->tablas as $tabla) {
			if($tabla->getIsDeleted()==false) {
				$tablasAux[]=$tabla;
			}
		}
		
		$this->tablas=$tablasAux;
	}
	
	public function updateToGetsAuxiliar(array &$tablas) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->tablas as $tabla) {
				
				$tabla->setid_modulo_Descripcion(tabla_util::getmoduloDescripcion($tabla->getmodulo()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$tabla_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$tabla_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$tabla_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$tabla_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$tabla_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$tablaForeignKey=new tabla_param_return();//tablaForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_modulo',$strRecargarFkTipos,',')) {
				$this->cargarCombosmodulosFK($this->connexion,$strRecargarFkQuery,$tablaForeignKey,$tabla_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_modulo',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosmodulosFK($this->connexion,' where id=-1 ',$tablaForeignKey,$tabla_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $tablaForeignKey;
			
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
	
	
	public function cargarCombosmodulosFK($connexion=null,$strRecargarFkQuery='',$tablaForeignKey,$tabla_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$moduloLogic= new modulo_logic();
		$pagination= new Pagination();
		$tablaForeignKey->modulosFK=array();

		$moduloLogic->setConnexion($connexion);
		$moduloLogic->getmoduloDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($tabla_session==null) {
			$tabla_session=new tabla_session();
		}
		
		if($tabla_session->bitBusquedaDesdeFKSesionmodulo!=true) {
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
				if($tablaForeignKey->idmoduloDefaultFK==0) {
					$tablaForeignKey->idmoduloDefaultFK=$moduloLocal->getId();
				}

				$tablaForeignKey->modulosFK[$moduloLocal->getId()]=tabla_util::getmoduloDescripcion($moduloLocal);
			}

		} else {

			if($tabla_session->bigidmoduloActual!=null && $tabla_session->bigidmoduloActual > 0) {
				$moduloLogic->getEntity($tabla_session->bigidmoduloActual);//WithConnection

				$tablaForeignKey->modulosFK[$moduloLogic->getmodulo()->getId()]=tabla_util::getmoduloDescripcion($moduloLogic->getmodulo());
				$tablaForeignKey->idmoduloDefaultFK=$moduloLogic->getmodulo()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($tabla,$costoproductos,$cuentacorrientedetalles) {
		$this->saveRelacionesBase($tabla,$costoproductos,$cuentacorrientedetalles,true);
	}

	public function saveRelaciones($tabla,$costoproductos,$cuentacorrientedetalles) {
		$this->saveRelacionesBase($tabla,$costoproductos,$cuentacorrientedetalles,false);
	}

	public function saveRelacionesBase($tabla,$costoproductos=array(),$cuentacorrientedetalles=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$tabla->setcosto_productos($costoproductos);
			$tabla->setcuenta_corriente_detalles($cuentacorrientedetalles);
			$this->settabla($tabla);

			if(true) {

				//tabla_logic_add::updateRelacionesToSave($tabla,$this);

				if(($this->tabla->getIsNew() || $this->tabla->getIsChanged()) && !$this->tabla->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($costoproductos,$cuentacorrientedetalles);

				} else if($this->tabla->getIsDeleted()) {
					$this->saveRelacionesDetalles($costoproductos,$cuentacorrientedetalles);
					$this->save();
				}

				//tabla_logic_add::updateRelacionesToSaveAfter($tabla,$this);

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
	
	
	public function saveRelacionesDetalles($costoproductos=array(),$cuentacorrientedetalles=array()) {
		try {
	

			$idtablaActual=$this->gettabla()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/costo_producto_carga.php');
			costo_producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$costoproductoLogic_Desde_tabla=new costo_producto_logic();
			$costoproductoLogic_Desde_tabla->setcosto_productos($costoproductos);

			$costoproductoLogic_Desde_tabla->setConnexion($this->getConnexion());
			$costoproductoLogic_Desde_tabla->setDatosCliente($this->datosCliente);

			foreach($costoproductoLogic_Desde_tabla->getcosto_productos() as $costoproducto_Desde_tabla) {
				$costoproducto_Desde_tabla->setid_tabla($idtablaActual);
			}

			$costoproductoLogic_Desde_tabla->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/util/cuenta_corriente_detalle_carga.php');
			cuenta_corriente_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$cuentacorrientedetalleLogic_Desde_tabla=new cuenta_corriente_detalle_logic();
			$cuentacorrientedetalleLogic_Desde_tabla->setcuenta_corriente_detalles($cuentacorrientedetalles);

			$cuentacorrientedetalleLogic_Desde_tabla->setConnexion($this->getConnexion());
			$cuentacorrientedetalleLogic_Desde_tabla->setDatosCliente($this->datosCliente);

			foreach($cuentacorrientedetalleLogic_Desde_tabla->getcuenta_corriente_detalles() as $cuentacorrientedetalle_Desde_tabla) {
				$cuentacorrientedetalle_Desde_tabla->setid_tabla($idtablaActual);

				$cuentacorrientedetalleLogic_Desde_tabla->setcuenta_corriente_detalle($cuentacorrientedetalle_Desde_tabla);
				$cuentacorrientedetalleLogic_Desde_tabla->save();

				$idcuenta_corriente_detalleActual=$cuenta_corriente_detalle_Desde_tabla->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/util/clasificacion_cheque_carga.php');
				clasificacion_cheque_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$clasificacionchequeLogic_Desde_cuenta_corriente_detalle=new clasificacion_cheque_logic();

				if($cuenta_corriente_detalle_Desde_tabla->getclasificacion_cheques()==null){
					$cuenta_corriente_detalle_Desde_tabla->setclasificacion_cheques(array());
				}

				$clasificacionchequeLogic_Desde_cuenta_corriente_detalle->setclasificacion_cheques($cuenta_corriente_detalle_Desde_tabla->getclasificacion_cheques());

				$clasificacionchequeLogic_Desde_cuenta_corriente_detalle->setConnexion($this->getConnexion());
				$clasificacionchequeLogic_Desde_cuenta_corriente_detalle->setDatosCliente($this->datosCliente);

				foreach($clasificacionchequeLogic_Desde_cuenta_corriente_detalle->getclasificacion_cheques() as $clasificacioncheque_Desde_cuenta_corriente_detalle) {
					$clasificacioncheque_Desde_cuenta_corriente_detalle->setid_cuenta_corriente_detalle($idcuenta_corriente_detalleActual);
				}

				$clasificacionchequeLogic_Desde_cuenta_corriente_detalle->saves();
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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $tablas,tabla_param_return $tablaParameterGeneral) : tabla_param_return {
		$tablaReturnGeneral=new tabla_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $tablaReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $tablas,tabla_param_return $tablaParameterGeneral) : tabla_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$tablaReturnGeneral=new tabla_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $tablaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tablas,tabla $tabla,tabla_param_return $tablaParameterGeneral,bool $isEsNuevotabla,array $clases) : tabla_param_return {
		 try {	
			$tablaReturnGeneral=new tabla_param_return();
	
			$tablaReturnGeneral->settabla($tabla);
			$tablaReturnGeneral->settablas($tablas);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$tablaReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $tablaReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tablas,tabla $tabla,tabla_param_return $tablaParameterGeneral,bool $isEsNuevotabla,array $clases) : tabla_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$tablaReturnGeneral=new tabla_param_return();
	
			$tablaReturnGeneral->settabla($tabla);
			$tablaReturnGeneral->settablas($tablas);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$tablaReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $tablaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tablas,tabla $tabla,tabla_param_return $tablaParameterGeneral,bool $isEsNuevotabla,array $clases) : tabla_param_return {
		 try {	
			$tablaReturnGeneral=new tabla_param_return();
	
			$tablaReturnGeneral->settabla($tabla);
			$tablaReturnGeneral->settablas($tablas);
			
			
			
			return $tablaReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tablas,tabla $tabla,tabla_param_return $tablaParameterGeneral,bool $isEsNuevotabla,array $clases) : tabla_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$tablaReturnGeneral=new tabla_param_return();
	
			$tablaReturnGeneral->settabla($tabla);
			$tablaReturnGeneral->settablas($tablas);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $tablaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,tabla $tabla,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,tabla $tabla,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		tabla_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		tabla_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(tabla $tabla,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//tabla_logic_add::updatetablaToGet($this->tabla);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$tabla->setmodulo($this->tablaDataAccess->getmodulo($this->connexion,$tabla));
		$tabla->setcosto_productos($this->tablaDataAccess->getcosto_productos($this->connexion,$tabla));
		$tabla->setcuenta_corriente_detalles($this->tablaDataAccess->getcuenta_corriente_detalles($this->connexion,$tabla));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==modulo::$class.'') {
				$tabla->setmodulo($this->tablaDataAccess->getmodulo($this->connexion,$tabla));
				continue;
			}

			if($clas->clas==costo_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tabla->setcosto_productos($this->tablaDataAccess->getcosto_productos($this->connexion,$tabla));

				if($this->isConDeep) {
					$costoproductoLogic= new costo_producto_logic($this->connexion);
					$costoproductoLogic->setcosto_productos($tabla->getcosto_productos());
					$classesLocal=costo_producto_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$costoproductoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					costo_producto_util::refrescarFKDescripciones($costoproductoLogic->getcosto_productos());
					$tabla->setcosto_productos($costoproductoLogic->getcosto_productos());
				}

				continue;
			}

			if($clas->clas==cuenta_corriente_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tabla->setcuenta_corriente_detalles($this->tablaDataAccess->getcuenta_corriente_detalles($this->connexion,$tabla));

				if($this->isConDeep) {
					$cuentacorrientedetalleLogic= new cuenta_corriente_detalle_logic($this->connexion);
					$cuentacorrientedetalleLogic->setcuenta_corriente_detalles($tabla->getcuenta_corriente_detalles());
					$classesLocal=cuenta_corriente_detalle_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$cuentacorrientedetalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					cuenta_corriente_detalle_util::refrescarFKDescripciones($cuentacorrientedetalleLogic->getcuenta_corriente_detalles());
					$tabla->setcuenta_corriente_detalles($cuentacorrientedetalleLogic->getcuenta_corriente_detalles());
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==modulo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$tabla->setmodulo($this->tablaDataAccess->getmodulo($this->connexion,$tabla));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==costo_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(costo_producto::$class);
			$tabla->setcosto_productos($this->tablaDataAccess->getcosto_productos($this->connexion,$tabla));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_corriente_detalle::$class);
			$tabla->setcuenta_corriente_detalles($this->tablaDataAccess->getcuenta_corriente_detalles($this->connexion,$tabla));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$tabla->setmodulo($this->tablaDataAccess->getmodulo($this->connexion,$tabla));
		$moduloLogic= new modulo_logic($this->connexion);
		$moduloLogic->deepLoad($tabla->getmodulo(),$isDeep,$deepLoadType,$clases);
				

		$tabla->setcosto_productos($this->tablaDataAccess->getcosto_productos($this->connexion,$tabla));

		foreach($tabla->getcosto_productos() as $costoproducto) {
			$costoproductoLogic= new costo_producto_logic($this->connexion);
			$costoproductoLogic->deepLoad($costoproducto,$isDeep,$deepLoadType,$clases);
		}

		$tabla->setcuenta_corriente_detalles($this->tablaDataAccess->getcuenta_corriente_detalles($this->connexion,$tabla));

		foreach($tabla->getcuenta_corriente_detalles() as $cuentacorrientedetalle) {
			$cuentacorrientedetalleLogic= new cuenta_corriente_detalle_logic($this->connexion);
			$cuentacorrientedetalleLogic->deepLoad($cuentacorrientedetalle,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==modulo::$class.'') {
				$tabla->setmodulo($this->tablaDataAccess->getmodulo($this->connexion,$tabla));
				$moduloLogic= new modulo_logic($this->connexion);
				$moduloLogic->deepLoad($tabla->getmodulo(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==costo_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tabla->setcosto_productos($this->tablaDataAccess->getcosto_productos($this->connexion,$tabla));

				foreach($tabla->getcosto_productos() as $costoproducto) {
					$costoproductoLogic= new costo_producto_logic($this->connexion);
					$costoproductoLogic->deepLoad($costoproducto,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==cuenta_corriente_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tabla->setcuenta_corriente_detalles($this->tablaDataAccess->getcuenta_corriente_detalles($this->connexion,$tabla));

				foreach($tabla->getcuenta_corriente_detalles() as $cuentacorrientedetalle) {
					$cuentacorrientedetalleLogic= new cuenta_corriente_detalle_logic($this->connexion);
					$cuentacorrientedetalleLogic->deepLoad($cuentacorrientedetalle,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==modulo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$tabla->setmodulo($this->tablaDataAccess->getmodulo($this->connexion,$tabla));
			$moduloLogic= new modulo_logic($this->connexion);
			$moduloLogic->deepLoad($tabla->getmodulo(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==costo_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(costo_producto::$class);
			$tabla->setcosto_productos($this->tablaDataAccess->getcosto_productos($this->connexion,$tabla));

			foreach($tabla->getcosto_productos() as $costoproducto) {
				$costoproductoLogic= new costo_producto_logic($this->connexion);
				$costoproductoLogic->deepLoad($costoproducto,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_corriente_detalle::$class);
			$tabla->setcuenta_corriente_detalles($this->tablaDataAccess->getcuenta_corriente_detalles($this->connexion,$tabla));

			foreach($tabla->getcuenta_corriente_detalles() as $cuentacorrientedetalle) {
				$cuentacorrientedetalleLogic= new cuenta_corriente_detalle_logic($this->connexion);
				$cuentacorrientedetalleLogic->deepLoad($cuentacorrientedetalle,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(tabla $tabla,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//tabla_logic_add::updatetablaToSave($this->tabla);			
			
			if(!$paraDeleteCascade) {				
				tabla_data::save($tabla, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		modulo_data::save($tabla->getmodulo(),$this->connexion);

		foreach($tabla->getcosto_productos() as $costoproducto) {
			$costoproducto->setid_tabla($tabla->getId());
			costo_producto_data::save($costoproducto,$this->connexion);
		}


		foreach($tabla->getcuenta_corriente_detalles() as $cuentacorrientedetalle) {
			$cuentacorrientedetalle->setid_tabla($tabla->getId());
			cuenta_corriente_detalle_data::save($cuentacorrientedetalle,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==modulo::$class.'') {
				modulo_data::save($tabla->getmodulo(),$this->connexion);
				continue;
			}


			if($clas->clas==costo_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tabla->getcosto_productos() as $costoproducto) {
					$costoproducto->setid_tabla($tabla->getId());
					costo_producto_data::save($costoproducto,$this->connexion);
				}

				continue;
			}

			if($clas->clas==cuenta_corriente_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tabla->getcuenta_corriente_detalles() as $cuentacorrientedetalle) {
					$cuentacorrientedetalle->setid_tabla($tabla->getId());
					cuenta_corriente_detalle_data::save($cuentacorrientedetalle,$this->connexion);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==modulo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			modulo_data::save($tabla->getmodulo(),$this->connexion);
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==costo_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(costo_producto::$class);

			foreach($tabla->getcosto_productos() as $costoproducto) {
				$costoproducto->setid_tabla($tabla->getId());
				costo_producto_data::save($costoproducto,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_corriente_detalle::$class);

			foreach($tabla->getcuenta_corriente_detalles() as $cuentacorrientedetalle) {
				$cuentacorrientedetalle->setid_tabla($tabla->getId());
				cuenta_corriente_detalle_data::save($cuentacorrientedetalle,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		modulo_data::save($tabla->getmodulo(),$this->connexion);
		$moduloLogic= new modulo_logic($this->connexion);
		$moduloLogic->deepSave($tabla->getmodulo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($tabla->getcosto_productos() as $costoproducto) {
			$costoproductoLogic= new costo_producto_logic($this->connexion);
			$costoproducto->setid_tabla($tabla->getId());
			costo_producto_data::save($costoproducto,$this->connexion);
			$costoproductoLogic->deepSave($costoproducto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($tabla->getcuenta_corriente_detalles() as $cuentacorrientedetalle) {
			$cuentacorrientedetalleLogic= new cuenta_corriente_detalle_logic($this->connexion);
			$cuentacorrientedetalle->setid_tabla($tabla->getId());
			cuenta_corriente_detalle_data::save($cuentacorrientedetalle,$this->connexion);
			$cuentacorrientedetalleLogic->deepSave($cuentacorrientedetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==modulo::$class.'') {
				modulo_data::save($tabla->getmodulo(),$this->connexion);
				$moduloLogic= new modulo_logic($this->connexion);
				$moduloLogic->deepSave($tabla->getmodulo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==costo_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tabla->getcosto_productos() as $costoproducto) {
					$costoproductoLogic= new costo_producto_logic($this->connexion);
					$costoproducto->setid_tabla($tabla->getId());
					costo_producto_data::save($costoproducto,$this->connexion);
					$costoproductoLogic->deepSave($costoproducto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==cuenta_corriente_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tabla->getcuenta_corriente_detalles() as $cuentacorrientedetalle) {
					$cuentacorrientedetalleLogic= new cuenta_corriente_detalle_logic($this->connexion);
					$cuentacorrientedetalle->setid_tabla($tabla->getId());
					cuenta_corriente_detalle_data::save($cuentacorrientedetalle,$this->connexion);
					$cuentacorrientedetalleLogic->deepSave($cuentacorrientedetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==modulo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			modulo_data::save($tabla->getmodulo(),$this->connexion);
			$moduloLogic= new modulo_logic($this->connexion);
			$moduloLogic->deepSave($tabla->getmodulo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==costo_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(costo_producto::$class);

			foreach($tabla->getcosto_productos() as $costoproducto) {
				$costoproductoLogic= new costo_producto_logic($this->connexion);
				$costoproducto->setid_tabla($tabla->getId());
				costo_producto_data::save($costoproducto,$this->connexion);
				$costoproductoLogic->deepSave($costoproducto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_corriente_detalle::$class);

			foreach($tabla->getcuenta_corriente_detalles() as $cuentacorrientedetalle) {
				$cuentacorrientedetalleLogic= new cuenta_corriente_detalle_logic($this->connexion);
				$cuentacorrientedetalle->setid_tabla($tabla->getId());
				cuenta_corriente_detalle_data::save($cuentacorrientedetalle,$this->connexion);
				$cuentacorrientedetalleLogic->deepSave($cuentacorrientedetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				tabla_data::save($tabla, $this->connexion);
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
			
			$this->deepLoad($this->tabla,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->tablas as $tabla) {
				$this->deepLoad($tabla,$isDeep,$deepLoadType,$clases);
								
				tabla_util::refrescarFKDescripciones($this->tablas);
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
			
			foreach($this->tablas as $tabla) {
				$this->deepLoad($tabla,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->tabla,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->tablas as $tabla) {
				$this->deepSave($tabla,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->tablas as $tabla) {
				$this->deepSave($tabla,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(modulo::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==modulo::$class) {
						$classes[]=new Classe(modulo::$class);
					}
				}

			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

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
				
				$classes[]=new Classe(costo_producto::$class);
				$classes[]=new Classe(cuenta_corriente_detalle::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==costo_producto::$class) {
						$classes[]=new Classe(costo_producto::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==cuenta_corriente_detalle::$class) {
						$classes[]=new Classe(cuenta_corriente_detalle::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==costo_producto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(costo_producto::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==cuenta_corriente_detalle::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta_corriente_detalle::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function gettabla() : ?tabla {	
		/*
		tabla_logic_add::checktablaToGet($this->tabla,$this->datosCliente);
		tabla_logic_add::updatetablaToGet($this->tabla);
		*/
			
		return $this->tabla;
	}
		
	public function settabla(tabla $newtabla) {
		$this->tabla = $newtabla;
	}
	
	public function gettablas() : array {		
		/*
		tabla_logic_add::checktablaToGets($this->tablas,$this->datosCliente);
		
		foreach ($this->tablas as $tablaLocal ) {
			tabla_logic_add::updatetablaToGet($tablaLocal);
		}
		*/
		
		return $this->tablas;
	}
	
	public function settablas(array $newtablas) {
		$this->tablas = $newtablas;
	}
	
	public function gettablaDataAccess() : tabla_data {
		return $this->tablaDataAccess;
	}
	
	public function settablaDataAccess(tabla_data $newtablaDataAccess) {
		$this->tablaDataAccess = $newtablaDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        tabla_carga::$CONTROLLER;;        
		
		//REL DETALLES
		
		clasificacion_cheque_logic::$logger;
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
