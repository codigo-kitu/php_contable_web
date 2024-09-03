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

namespace com\bydan\contabilidad\inventario\categoria_producto\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\inventario\categoria_producto\util\categoria_producto_carga;
use com\bydan\contabilidad\inventario\categoria_producto\util\categoria_producto_param_return;

use com\bydan\contabilidad\inventario\categoria_producto\presentation\session\categoria_producto_session;

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

use com\bydan\contabilidad\inventario\categoria_producto\util\categoria_producto_util;
use com\bydan\contabilidad\inventario\categoria_producto\business\entity\categoria_producto;
use com\bydan\contabilidad\inventario\categoria_producto\business\data\categoria_producto_data;

//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

//REL


use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\business\data\producto_data;
use com\bydan\contabilidad\inventario\producto\business\logic\producto_logic;
use com\bydan\contabilidad\inventario\producto\util\producto_carga;
use com\bydan\contabilidad\inventario\producto\util\producto_util;

use com\bydan\contabilidad\inventario\sub_categoria_producto\business\entity\sub_categoria_producto;
use com\bydan\contabilidad\inventario\sub_categoria_producto\business\data\sub_categoria_producto_data;
use com\bydan\contabilidad\inventario\sub_categoria_producto\business\logic\sub_categoria_producto_logic;
use com\bydan\contabilidad\inventario\sub_categoria_producto\util\sub_categoria_producto_carga;
use com\bydan\contabilidad\inventario\sub_categoria_producto\util\sub_categoria_producto_util;

use com\bydan\contabilidad\inventario\lista_producto\business\entity\lista_producto;
use com\bydan\contabilidad\inventario\lista_producto\business\data\lista_producto_data;
use com\bydan\contabilidad\inventario\lista_producto\business\logic\lista_producto_logic;
use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_carga;
use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_util;

//REL DETALLES




class categoria_producto_logic  extends GeneralEntityLogic implements categoria_producto_logicI {	
	/*GENERAL*/
	public categoria_producto_data $categoria_productoDataAccess;
	//public ?categoria_producto_logic_add $categoria_productoLogicAdditional=null;
	public ?categoria_producto $categoria_producto;
	public array $categoria_productos;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->categoria_productoDataAccess = new categoria_producto_data();			
			$this->categoria_productos = array();
			$this->categoria_producto = new categoria_producto();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->categoria_productoLogicAdditional = new categoria_producto_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->categoria_productoLogicAdditional==null) {
		//	$this->categoria_productoLogicAdditional=new categoria_producto_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->categoria_productoDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->categoria_productoDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->categoria_productoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->categoria_productoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->categoria_productos = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->categoria_productos=$this->categoria_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_producto_util::refrescarFKDescripciones($this->categoria_productos);
			}
			
			//categoria_producto_logic_add::checkcategoria_productoToGets($this->categoria_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_productos);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->categoria_productos = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->categoria_productos=$this->categoria_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_producto_util::refrescarFKDescripciones($this->categoria_productos);
			}
			
			//categoria_producto_logic_add::checkcategoria_productoToGets($this->categoria_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_productos);
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
		$this->categoria_producto = new categoria_producto();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->categoria_producto=$this->categoria_productoDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->categoria_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				categoria_producto_util::refrescarFKDescripcion($this->categoria_producto);
			}
						
			//categoria_producto_logic_add::checkcategoria_productoToGet($this->categoria_producto,$this->datosCliente);
			//categoria_producto_logic_add::updatecategoria_productoToGet($this->categoria_producto);
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
		$this->categoria_producto = new  categoria_producto();
		  		  
        try {		
			$this->categoria_producto=$this->categoria_productoDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->categoria_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				categoria_producto_util::refrescarFKDescripcion($this->categoria_producto);
			}
			
			//categoria_producto_logic_add::checkcategoria_productoToGet($this->categoria_producto,$this->datosCliente);
			//categoria_producto_logic_add::updatecategoria_productoToGet($this->categoria_producto);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?categoria_producto {
		$categoria_productoLogic = new  categoria_producto_logic();
		  		  
        try {		
			$categoria_productoLogic->setConnexion($connexion);			
			$categoria_productoLogic->getEntity($id);			
			return $categoria_productoLogic->getcategoria_producto();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->categoria_producto = new  categoria_producto();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->categoria_producto=$this->categoria_productoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->categoria_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				categoria_producto_util::refrescarFKDescripcion($this->categoria_producto);
			}
			
			//categoria_producto_logic_add::checkcategoria_productoToGet($this->categoria_producto,$this->datosCliente);
			//categoria_producto_logic_add::updatecategoria_productoToGet($this->categoria_producto);
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
		$this->categoria_producto = new  categoria_producto();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->categoria_producto=$this->categoria_productoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->categoria_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				categoria_producto_util::refrescarFKDescripcion($this->categoria_producto);
			}
			
			//categoria_producto_logic_add::checkcategoria_productoToGet($this->categoria_producto,$this->datosCliente);
			//categoria_producto_logic_add::updatecategoria_productoToGet($this->categoria_producto);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?categoria_producto {
		$categoria_productoLogic = new  categoria_producto_logic();
		  		  
        try {		
			$categoria_productoLogic->setConnexion($connexion);			
			$categoria_productoLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $categoria_productoLogic->getcategoria_producto();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->categoria_productos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->categoria_productos=$this->categoria_productoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_producto_util::refrescarFKDescripciones($this->categoria_productos);
			}
			
			//categoria_producto_logic_add::checkcategoria_productoToGets($this->categoria_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_productos);			
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
		$this->categoria_productos = array();
		  		  
        try {			
			$this->categoria_productos=$this->categoria_productoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_producto_util::refrescarFKDescripciones($this->categoria_productos);
			}
			
			//categoria_producto_logic_add::checkcategoria_productoToGets($this->categoria_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_productos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->categoria_productos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->categoria_productos=$this->categoria_productoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_producto_util::refrescarFKDescripciones($this->categoria_productos);
			}
			
			//categoria_producto_logic_add::checkcategoria_productoToGets($this->categoria_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_productos);
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
		$this->categoria_productos = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->categoria_productos=$this->categoria_productoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_producto_util::refrescarFKDescripciones($this->categoria_productos);
			}
			
			//categoria_producto_logic_add::checkcategoria_productoToGets($this->categoria_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_productos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$categoria_productoLogic = new  categoria_producto_logic();
		  		  
        try {		
			$categoria_productoLogic->setConnexion($connexion);			
			$categoria_productoLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $categoria_productoLogic->getcategoria_productos();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->categoria_productos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->categoria_productos=$this->categoria_productoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_producto_util::refrescarFKDescripciones($this->categoria_productos);
			}
			
			//categoria_producto_logic_add::checkcategoria_productoToGets($this->categoria_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_productos);
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
		$this->categoria_productos = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->categoria_productos=$this->categoria_productoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_producto_util::refrescarFKDescripciones($this->categoria_productos);
			}
			
			//categoria_producto_logic_add::checkcategoria_productoToGets($this->categoria_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_productos);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->categoria_productos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->categoria_productos=$this->categoria_productoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_producto_util::refrescarFKDescripciones($this->categoria_productos);
			}
			
			//categoria_producto_logic_add::checkcategoria_productoToGets($this->categoria_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_productos);
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
		$this->categoria_productos = array();
		  		  
        try {			
			$this->categoria_productos=$this->categoria_productoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_producto_util::refrescarFKDescripciones($this->categoria_productos);
			}	
			
			//categoria_producto_logic_add::checkcategoria_productoToGets($this->categoria_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_productos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->categoria_productos = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->categoria_productos=$this->categoria_productoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_producto_util::refrescarFKDescripciones($this->categoria_productos);
			}
			
			//categoria_producto_logic_add::checkcategoria_productoToGets($this->categoria_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_productos);
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
		$this->categoria_productos = array();
		  		  
        try {		
			$this->categoria_productos=$this->categoria_productoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_producto_util::refrescarFKDescripciones($this->categoria_productos);
			}
			
			//categoria_producto_logic_add::checkcategoria_productoToGets($this->categoria_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_productos);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,categoria_producto_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->categoria_productos=$this->categoria_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				categoria_producto_util::refrescarFKDescripciones($this->categoria_productos);
			}
			//categoria_producto_logic_add::checkcategoria_productoToGets($this->categoria_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->categoria_productos);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,categoria_producto_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->categoria_productos=$this->categoria_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				categoria_producto_util::refrescarFKDescripciones($this->categoria_productos);
			}
			//categoria_producto_logic_add::checkcategoria_productoToGets($this->categoria_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->categoria_productos);
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
						
			//categoria_producto_logic_add::checkcategoria_productoToSave($this->categoria_producto,$this->datosCliente,$this->connexion);	       
			//categoria_producto_logic_add::updatecategoria_productoToSave($this->categoria_producto);			
			categoria_producto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->categoria_producto,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->categoria_productoLogicAdditional->checkGeneralEntityToSave($this,$this->categoria_producto,$this->datosCliente,$this->connexion);
			
			
			categoria_producto_data::save($this->categoria_producto, $this->connexion);	    	       	 				
			//categoria_producto_logic_add::checkcategoria_productoToSaveAfter($this->categoria_producto,$this->datosCliente,$this->connexion);			
			//$this->categoria_productoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->categoria_producto,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->categoria_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->categoria_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				categoria_producto_util::refrescarFKDescripcion($this->categoria_producto);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->categoria_producto->getIsDeleted()) {
				$this->categoria_producto=null;
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
						
			/*categoria_producto_logic_add::checkcategoria_productoToSave($this->categoria_producto,$this->datosCliente,$this->connexion);*/	        
			//categoria_producto_logic_add::updatecategoria_productoToSave($this->categoria_producto);			
			//$this->categoria_productoLogicAdditional->checkGeneralEntityToSave($this,$this->categoria_producto,$this->datosCliente,$this->connexion);			
			categoria_producto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->categoria_producto,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			categoria_producto_data::save($this->categoria_producto, $this->connexion);	    	       	 						
			/*categoria_producto_logic_add::checkcategoria_productoToSaveAfter($this->categoria_producto,$this->datosCliente,$this->connexion);*/			
			//$this->categoria_productoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->categoria_producto,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->categoria_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->categoria_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				categoria_producto_util::refrescarFKDescripcion($this->categoria_producto);				
			}
			
			if($this->categoria_producto->getIsDeleted()) {
				$this->categoria_producto=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(categoria_producto $categoria_producto,Connexion $connexion)  {
		$categoria_productoLogic = new  categoria_producto_logic();		  		  
        try {		
			$categoria_productoLogic->setConnexion($connexion);			
			$categoria_productoLogic->setcategoria_producto($categoria_producto);			
			$categoria_productoLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*categoria_producto_logic_add::checkcategoria_productoToSaves($this->categoria_productos,$this->datosCliente,$this->connexion);*/	        	
			//$this->categoria_productoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->categoria_productos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->categoria_productos as $categoria_productoLocal) {				
								
				//categoria_producto_logic_add::updatecategoria_productoToSave($categoria_productoLocal);	        	
				categoria_producto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$categoria_productoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				categoria_producto_data::save($categoria_productoLocal, $this->connexion);				
			}
			
			/*categoria_producto_logic_add::checkcategoria_productoToSavesAfter($this->categoria_productos,$this->datosCliente,$this->connexion);*/			
			//$this->categoria_productoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->categoria_productos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_producto_util::refrescarFKDescripciones($this->categoria_productos);
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
			/*categoria_producto_logic_add::checkcategoria_productoToSaves($this->categoria_productos,$this->datosCliente,$this->connexion);*/			
			//$this->categoria_productoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->categoria_productos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->categoria_productos as $categoria_productoLocal) {				
								
				//categoria_producto_logic_add::updatecategoria_productoToSave($categoria_productoLocal);	        	
				categoria_producto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$categoria_productoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				categoria_producto_data::save($categoria_productoLocal, $this->connexion);				
			}			
			
			/*categoria_producto_logic_add::checkcategoria_productoToSavesAfter($this->categoria_productos,$this->datosCliente,$this->connexion);*/			
			//$this->categoria_productoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->categoria_productos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_producto_util::refrescarFKDescripciones($this->categoria_productos);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $categoria_productos,Connexion $connexion)  {
		$categoria_productoLogic = new  categoria_producto_logic();
		  		  
        try {		
			$categoria_productoLogic->setConnexion($connexion);			
			$categoria_productoLogic->setcategoria_productos($categoria_productos);			
			$categoria_productoLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$categoria_productosAux=array();
		
		foreach($this->categoria_productos as $categoria_producto) {
			if($categoria_producto->getIsDeleted()==false) {
				$categoria_productosAux[]=$categoria_producto;
			}
		}
		
		$this->categoria_productos=$categoria_productosAux;
	}
	
	public function updateToGetsAuxiliar(array &$categoria_productos) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->categoria_productos as $categoria_producto) {
				
				$categoria_producto->setid_empresa_Descripcion(categoria_producto_util::getempresaDescripcion($categoria_producto->getempresa()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$categoria_producto_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$categoria_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$categoria_producto_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$categoria_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$categoria_producto_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$categoria_productoForeignKey=new categoria_producto_param_return();//categoria_productoForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$categoria_productoForeignKey,$categoria_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$categoria_productoForeignKey,$categoria_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $categoria_productoForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$categoria_productoForeignKey,$categoria_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$categoria_productoForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($categoria_producto_session==null) {
			$categoria_producto_session=new categoria_producto_session();
		}
		
		if($categoria_producto_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($categoria_productoForeignKey->idempresaDefaultFK==0) {
					$categoria_productoForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$categoria_productoForeignKey->empresasFK[$empresaLocal->getId()]=categoria_producto_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($categoria_producto_session->bigidempresaActual!=null && $categoria_producto_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($categoria_producto_session->bigidempresaActual);//WithConnection

				$categoria_productoForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=categoria_producto_util::getempresaDescripcion($empresaLogic->getempresa());
				$categoria_productoForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($categoria_producto,$productos,$subcategoriaproductos,$listaproductos) {
		$this->saveRelacionesBase($categoria_producto,$productos,$subcategoriaproductos,$listaproductos,true);
	}

	public function saveRelaciones($categoria_producto,$productos,$subcategoriaproductos,$listaproductos) {
		$this->saveRelacionesBase($categoria_producto,$productos,$subcategoriaproductos,$listaproductos,false);
	}

	public function saveRelacionesBase($categoria_producto,$productos=array(),$subcategoriaproductos=array(),$listaproductos=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$categoria_producto->setproductos($productos);
			$categoria_producto->setsub_categoria_productos($subcategoriaproductos);
			$categoria_producto->setlista_productos($listaproductos);
			$this->setcategoria_producto($categoria_producto);

			if(true) {

				//categoria_producto_logic_add::updateRelacionesToSave($categoria_producto,$this);

				if(($this->categoria_producto->getIsNew() || $this->categoria_producto->getIsChanged()) && !$this->categoria_producto->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($productos,$subcategoriaproductos,$listaproductos);

				} else if($this->categoria_producto->getIsDeleted()) {
					$this->saveRelacionesDetalles($productos,$subcategoriaproductos,$listaproductos);
					$this->save();
				}

				//categoria_producto_logic_add::updateRelacionesToSaveAfter($categoria_producto,$this);

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
	
	
	public function saveRelacionesDetalles($productos=array(),$subcategoriaproductos=array(),$listaproductos=array()) {
		try {
	

			$idcategoria_productoActual=$this->getcategoria_producto()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/producto_carga.php');
			producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$productoLogic_Desde_categoria_producto=new producto_logic();
			$productoLogic_Desde_categoria_producto->setproductos($productos);

			$productoLogic_Desde_categoria_producto->setConnexion($this->getConnexion());
			$productoLogic_Desde_categoria_producto->setDatosCliente($this->datosCliente);

			foreach($productoLogic_Desde_categoria_producto->getproductos() as $producto_Desde_categoria_producto) {
				$producto_Desde_categoria_producto->setid_categoria_producto($idcategoria_productoActual);

				$productoLogic_Desde_categoria_producto->setproducto($producto_Desde_categoria_producto);
				$productoLogic_Desde_categoria_producto->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/sub_categoria_producto_carga.php');
			sub_categoria_producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$subcategoriaproductoLogic_Desde_categoria_producto=new sub_categoria_producto_logic();
			$subcategoriaproductoLogic_Desde_categoria_producto->setsub_categoria_productos($subcategoriaproductos);

			$subcategoriaproductoLogic_Desde_categoria_producto->setConnexion($this->getConnexion());
			$subcategoriaproductoLogic_Desde_categoria_producto->setDatosCliente($this->datosCliente);

			foreach($subcategoriaproductoLogic_Desde_categoria_producto->getsub_categoria_productos() as $subcategoriaproducto_Desde_categoria_producto) {
				$subcategoriaproducto_Desde_categoria_producto->setid_categoria_producto($idcategoria_productoActual);

				$subcategoriaproductoLogic_Desde_categoria_producto->setsub_categoria_producto($subcategoriaproducto_Desde_categoria_producto);
				$subcategoriaproductoLogic_Desde_categoria_producto->save();

				$idsub_categoria_productoActual=$sub_categoria_producto_Desde_categoria_producto->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/producto_carga.php');
				producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$productoLogic_Desde_sub_categoria_producto=new producto_logic();

				if($sub_categoria_producto_Desde_categoria_producto->getproductos()==null){
					$sub_categoria_producto_Desde_categoria_producto->setproductos(array());
				}

				$productoLogic_Desde_sub_categoria_producto->setproductos($sub_categoria_producto_Desde_categoria_producto->getproductos());

				$productoLogic_Desde_sub_categoria_producto->setConnexion($this->getConnexion());
				$productoLogic_Desde_sub_categoria_producto->setDatosCliente($this->datosCliente);

				foreach($productoLogic_Desde_sub_categoria_producto->getproductos() as $producto_Desde_sub_categoria_producto) {
					$producto_Desde_sub_categoria_producto->setid_sub_categoria_producto($idsub_categoria_productoActual);

					$productoLogic_Desde_sub_categoria_producto->setproducto($producto_Desde_sub_categoria_producto);
					$productoLogic_Desde_sub_categoria_producto->save();
				}


				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/lista_producto_carga.php');
				lista_producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$listaproductoLogic_Desde_sub_categoria_producto=new lista_producto_logic();

				if($sub_categoria_producto_Desde_categoria_producto->getlista_productos()==null){
					$sub_categoria_producto_Desde_categoria_producto->setlista_productos(array());
				}

				$listaproductoLogic_Desde_sub_categoria_producto->setlista_productos($sub_categoria_producto_Desde_categoria_producto->getlista_productos());

				$listaproductoLogic_Desde_sub_categoria_producto->setConnexion($this->getConnexion());
				$listaproductoLogic_Desde_sub_categoria_producto->setDatosCliente($this->datosCliente);

				foreach($listaproductoLogic_Desde_sub_categoria_producto->getlista_productos() as $listaproducto_Desde_sub_categoria_producto) {
					$listaproducto_Desde_sub_categoria_producto->setid_sub_categoria_producto($idsub_categoria_productoActual);
				}

				$listaproductoLogic_Desde_sub_categoria_producto->saves();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/lista_producto_carga.php');
			lista_producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$listaproductoLogic_Desde_categoria_producto=new lista_producto_logic();
			$listaproductoLogic_Desde_categoria_producto->setlista_productos($listaproductos);

			$listaproductoLogic_Desde_categoria_producto->setConnexion($this->getConnexion());
			$listaproductoLogic_Desde_categoria_producto->setDatosCliente($this->datosCliente);

			foreach($listaproductoLogic_Desde_categoria_producto->getlista_productos() as $listaproducto_Desde_categoria_producto) {
				$listaproducto_Desde_categoria_producto->setid_categoria_producto($idcategoria_productoActual);
			}

			$listaproductoLogic_Desde_categoria_producto->saves();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $categoria_productos,categoria_producto_param_return $categoria_productoParameterGeneral) : categoria_producto_param_return {
		$categoria_productoReturnGeneral=new categoria_producto_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $categoria_productoReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $categoria_productos,categoria_producto_param_return $categoria_productoParameterGeneral) : categoria_producto_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$categoria_productoReturnGeneral=new categoria_producto_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $categoria_productoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $categoria_productos,categoria_producto $categoria_producto,categoria_producto_param_return $categoria_productoParameterGeneral,bool $isEsNuevocategoria_producto,array $clases) : categoria_producto_param_return {
		 try {	
			$categoria_productoReturnGeneral=new categoria_producto_param_return();
	
			$categoria_productoReturnGeneral->setcategoria_producto($categoria_producto);
			$categoria_productoReturnGeneral->setcategoria_productos($categoria_productos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$categoria_productoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $categoria_productoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $categoria_productos,categoria_producto $categoria_producto,categoria_producto_param_return $categoria_productoParameterGeneral,bool $isEsNuevocategoria_producto,array $clases) : categoria_producto_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$categoria_productoReturnGeneral=new categoria_producto_param_return();
	
			$categoria_productoReturnGeneral->setcategoria_producto($categoria_producto);
			$categoria_productoReturnGeneral->setcategoria_productos($categoria_productos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$categoria_productoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $categoria_productoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $categoria_productos,categoria_producto $categoria_producto,categoria_producto_param_return $categoria_productoParameterGeneral,bool $isEsNuevocategoria_producto,array $clases) : categoria_producto_param_return {
		 try {	
			$categoria_productoReturnGeneral=new categoria_producto_param_return();
	
			$categoria_productoReturnGeneral->setcategoria_producto($categoria_producto);
			$categoria_productoReturnGeneral->setcategoria_productos($categoria_productos);
			
			
			
			return $categoria_productoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $categoria_productos,categoria_producto $categoria_producto,categoria_producto_param_return $categoria_productoParameterGeneral,bool $isEsNuevocategoria_producto,array $clases) : categoria_producto_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$categoria_productoReturnGeneral=new categoria_producto_param_return();
	
			$categoria_productoReturnGeneral->setcategoria_producto($categoria_producto);
			$categoria_productoReturnGeneral->setcategoria_productos($categoria_productos);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $categoria_productoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,categoria_producto $categoria_producto,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,categoria_producto $categoria_producto,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		categoria_producto_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		categoria_producto_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(categoria_producto $categoria_producto,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//categoria_producto_logic_add::updatecategoria_productoToGet($this->categoria_producto);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$categoria_producto->setempresa($this->categoria_productoDataAccess->getempresa($this->connexion,$categoria_producto));
		$categoria_producto->setproductos($this->categoria_productoDataAccess->getproductos($this->connexion,$categoria_producto));
		$categoria_producto->setsub_categoria_productos($this->categoria_productoDataAccess->getsub_categoria_productos($this->connexion,$categoria_producto));
		$categoria_producto->setlista_productos($this->categoria_productoDataAccess->getlista_productos($this->connexion,$categoria_producto));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$categoria_producto->setempresa($this->categoria_productoDataAccess->getempresa($this->connexion,$categoria_producto));
				continue;
			}

			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$categoria_producto->setproductos($this->categoria_productoDataAccess->getproductos($this->connexion,$categoria_producto));

				if($this->isConDeep) {
					$productoLogic= new producto_logic($this->connexion);
					$productoLogic->setproductos($categoria_producto->getproductos());
					$classesLocal=producto_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$productoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					producto_util::refrescarFKDescripciones($productoLogic->getproductos());
					$categoria_producto->setproductos($productoLogic->getproductos());
				}

				continue;
			}

			if($clas->clas==sub_categoria_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$categoria_producto->setsub_categoria_productos($this->categoria_productoDataAccess->getsub_categoria_productos($this->connexion,$categoria_producto));

				if($this->isConDeep) {
					$subcategoriaproductoLogic= new sub_categoria_producto_logic($this->connexion);
					$subcategoriaproductoLogic->setsub_categoria_productos($categoria_producto->getsub_categoria_productos());
					$classesLocal=sub_categoria_producto_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$subcategoriaproductoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					sub_categoria_producto_util::refrescarFKDescripciones($subcategoriaproductoLogic->getsub_categoria_productos());
					$categoria_producto->setsub_categoria_productos($subcategoriaproductoLogic->getsub_categoria_productos());
				}

				continue;
			}

			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$categoria_producto->setlista_productos($this->categoria_productoDataAccess->getlista_productos($this->connexion,$categoria_producto));

				if($this->isConDeep) {
					$listaproductoLogic= new lista_producto_logic($this->connexion);
					$listaproductoLogic->setlista_productos($categoria_producto->getlista_productos());
					$classesLocal=lista_producto_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$listaproductoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					lista_producto_util::refrescarFKDescripciones($listaproductoLogic->getlista_productos());
					$categoria_producto->setlista_productos($listaproductoLogic->getlista_productos());
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
			$categoria_producto->setempresa($this->categoria_productoDataAccess->getempresa($this->connexion,$categoria_producto));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(producto::$class);
			$categoria_producto->setproductos($this->categoria_productoDataAccess->getproductos($this->connexion,$categoria_producto));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==sub_categoria_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(sub_categoria_producto::$class);
			$categoria_producto->setsub_categoria_productos($this->categoria_productoDataAccess->getsub_categoria_productos($this->connexion,$categoria_producto));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(lista_producto::$class);
			$categoria_producto->setlista_productos($this->categoria_productoDataAccess->getlista_productos($this->connexion,$categoria_producto));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$categoria_producto->setempresa($this->categoria_productoDataAccess->getempresa($this->connexion,$categoria_producto));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($categoria_producto->getempresa(),$isDeep,$deepLoadType,$clases);
				

		$categoria_producto->setproductos($this->categoria_productoDataAccess->getproductos($this->connexion,$categoria_producto));

		foreach($categoria_producto->getproductos() as $producto) {
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepLoad($producto,$isDeep,$deepLoadType,$clases);
		}

		$categoria_producto->setsub_categoria_productos($this->categoria_productoDataAccess->getsub_categoria_productos($this->connexion,$categoria_producto));

		foreach($categoria_producto->getsub_categoria_productos() as $subcategoriaproducto) {
			$subcategoriaproductoLogic= new sub_categoria_producto_logic($this->connexion);
			$subcategoriaproductoLogic->deepLoad($subcategoriaproducto,$isDeep,$deepLoadType,$clases);
		}

		$categoria_producto->setlista_productos($this->categoria_productoDataAccess->getlista_productos($this->connexion,$categoria_producto));

		foreach($categoria_producto->getlista_productos() as $listaproducto) {
			$listaproductoLogic= new lista_producto_logic($this->connexion);
			$listaproductoLogic->deepLoad($listaproducto,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$categoria_producto->setempresa($this->categoria_productoDataAccess->getempresa($this->connexion,$categoria_producto));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($categoria_producto->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$categoria_producto->setproductos($this->categoria_productoDataAccess->getproductos($this->connexion,$categoria_producto));

				foreach($categoria_producto->getproductos() as $producto) {
					$productoLogic= new producto_logic($this->connexion);
					$productoLogic->deepLoad($producto,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==sub_categoria_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$categoria_producto->setsub_categoria_productos($this->categoria_productoDataAccess->getsub_categoria_productos($this->connexion,$categoria_producto));

				foreach($categoria_producto->getsub_categoria_productos() as $subcategoriaproducto) {
					$subcategoriaproductoLogic= new sub_categoria_producto_logic($this->connexion);
					$subcategoriaproductoLogic->deepLoad($subcategoriaproducto,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$categoria_producto->setlista_productos($this->categoria_productoDataAccess->getlista_productos($this->connexion,$categoria_producto));

				foreach($categoria_producto->getlista_productos() as $listaproducto) {
					$listaproductoLogic= new lista_producto_logic($this->connexion);
					$listaproductoLogic->deepLoad($listaproducto,$isDeep,$deepLoadType,$clases);
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
			$categoria_producto->setempresa($this->categoria_productoDataAccess->getempresa($this->connexion,$categoria_producto));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($categoria_producto->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(producto::$class);
			$categoria_producto->setproductos($this->categoria_productoDataAccess->getproductos($this->connexion,$categoria_producto));

			foreach($categoria_producto->getproductos() as $producto) {
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepLoad($producto,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==sub_categoria_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(sub_categoria_producto::$class);
			$categoria_producto->setsub_categoria_productos($this->categoria_productoDataAccess->getsub_categoria_productos($this->connexion,$categoria_producto));

			foreach($categoria_producto->getsub_categoria_productos() as $subcategoriaproducto) {
				$subcategoriaproductoLogic= new sub_categoria_producto_logic($this->connexion);
				$subcategoriaproductoLogic->deepLoad($subcategoriaproducto,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(lista_producto::$class);
			$categoria_producto->setlista_productos($this->categoria_productoDataAccess->getlista_productos($this->connexion,$categoria_producto));

			foreach($categoria_producto->getlista_productos() as $listaproducto) {
				$listaproductoLogic= new lista_producto_logic($this->connexion);
				$listaproductoLogic->deepLoad($listaproducto,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(categoria_producto $categoria_producto,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//categoria_producto_logic_add::updatecategoria_productoToSave($this->categoria_producto);			
			
			if(!$paraDeleteCascade) {				
				categoria_producto_data::save($categoria_producto, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($categoria_producto->getempresa(),$this->connexion);

		foreach($categoria_producto->getproductos() as $producto) {
			$producto->setid_categoria_producto($categoria_producto->getId());
			producto_data::save($producto,$this->connexion);
		}


		foreach($categoria_producto->getsub_categoria_productos() as $subcategoriaproducto) {
			$subcategoriaproducto->setid_categoria_producto($categoria_producto->getId());
			sub_categoria_producto_data::save($subcategoriaproducto,$this->connexion);
		}


		foreach($categoria_producto->getlista_productos() as $listaproducto) {
			$listaproducto->setid_categoria_producto($categoria_producto->getId());
			lista_producto_data::save($listaproducto,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($categoria_producto->getempresa(),$this->connexion);
				continue;
			}


			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($categoria_producto->getproductos() as $producto) {
					$producto->setid_categoria_producto($categoria_producto->getId());
					producto_data::save($producto,$this->connexion);
				}

				continue;
			}

			if($clas->clas==sub_categoria_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($categoria_producto->getsub_categoria_productos() as $subcategoriaproducto) {
					$subcategoriaproducto->setid_categoria_producto($categoria_producto->getId());
					sub_categoria_producto_data::save($subcategoriaproducto,$this->connexion);
				}

				continue;
			}

			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($categoria_producto->getlista_productos() as $listaproducto) {
					$listaproducto->setid_categoria_producto($categoria_producto->getId());
					lista_producto_data::save($listaproducto,$this->connexion);
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
			empresa_data::save($categoria_producto->getempresa(),$this->connexion);
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(producto::$class);

			foreach($categoria_producto->getproductos() as $producto) {
				$producto->setid_categoria_producto($categoria_producto->getId());
				producto_data::save($producto,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==sub_categoria_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(sub_categoria_producto::$class);

			foreach($categoria_producto->getsub_categoria_productos() as $subcategoriaproducto) {
				$subcategoriaproducto->setid_categoria_producto($categoria_producto->getId());
				sub_categoria_producto_data::save($subcategoriaproducto,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(lista_producto::$class);

			foreach($categoria_producto->getlista_productos() as $listaproducto) {
				$listaproducto->setid_categoria_producto($categoria_producto->getId());
				lista_producto_data::save($listaproducto,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($categoria_producto->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($categoria_producto->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($categoria_producto->getproductos() as $producto) {
			$productoLogic= new producto_logic($this->connexion);
			$producto->setid_categoria_producto($categoria_producto->getId());
			producto_data::save($producto,$this->connexion);
			$productoLogic->deepSave($producto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($categoria_producto->getsub_categoria_productos() as $subcategoriaproducto) {
			$subcategoriaproductoLogic= new sub_categoria_producto_logic($this->connexion);
			$subcategoriaproducto->setid_categoria_producto($categoria_producto->getId());
			sub_categoria_producto_data::save($subcategoriaproducto,$this->connexion);
			$subcategoriaproductoLogic->deepSave($subcategoriaproducto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($categoria_producto->getlista_productos() as $listaproducto) {
			$listaproductoLogic= new lista_producto_logic($this->connexion);
			$listaproducto->setid_categoria_producto($categoria_producto->getId());
			lista_producto_data::save($listaproducto,$this->connexion);
			$listaproductoLogic->deepSave($listaproducto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($categoria_producto->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($categoria_producto->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($categoria_producto->getproductos() as $producto) {
					$productoLogic= new producto_logic($this->connexion);
					$producto->setid_categoria_producto($categoria_producto->getId());
					producto_data::save($producto,$this->connexion);
					$productoLogic->deepSave($producto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==sub_categoria_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($categoria_producto->getsub_categoria_productos() as $subcategoriaproducto) {
					$subcategoriaproductoLogic= new sub_categoria_producto_logic($this->connexion);
					$subcategoriaproducto->setid_categoria_producto($categoria_producto->getId());
					sub_categoria_producto_data::save($subcategoriaproducto,$this->connexion);
					$subcategoriaproductoLogic->deepSave($subcategoriaproducto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($categoria_producto->getlista_productos() as $listaproducto) {
					$listaproductoLogic= new lista_producto_logic($this->connexion);
					$listaproducto->setid_categoria_producto($categoria_producto->getId());
					lista_producto_data::save($listaproducto,$this->connexion);
					$listaproductoLogic->deepSave($listaproducto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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
			empresa_data::save($categoria_producto->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($categoria_producto->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(producto::$class);

			foreach($categoria_producto->getproductos() as $producto) {
				$productoLogic= new producto_logic($this->connexion);
				$producto->setid_categoria_producto($categoria_producto->getId());
				producto_data::save($producto,$this->connexion);
				$productoLogic->deepSave($producto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==sub_categoria_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(sub_categoria_producto::$class);

			foreach($categoria_producto->getsub_categoria_productos() as $subcategoriaproducto) {
				$subcategoriaproductoLogic= new sub_categoria_producto_logic($this->connexion);
				$subcategoriaproducto->setid_categoria_producto($categoria_producto->getId());
				sub_categoria_producto_data::save($subcategoriaproducto,$this->connexion);
				$subcategoriaproductoLogic->deepSave($subcategoriaproducto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(lista_producto::$class);

			foreach($categoria_producto->getlista_productos() as $listaproducto) {
				$listaproductoLogic= new lista_producto_logic($this->connexion);
				$listaproducto->setid_categoria_producto($categoria_producto->getId());
				lista_producto_data::save($listaproducto,$this->connexion);
				$listaproductoLogic->deepSave($listaproducto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				categoria_producto_data::save($categoria_producto, $this->connexion);
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
			
			$this->deepLoad($this->categoria_producto,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->categoria_productos as $categoria_producto) {
				$this->deepLoad($categoria_producto,$isDeep,$deepLoadType,$clases);
								
				categoria_producto_util::refrescarFKDescripciones($this->categoria_productos);
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
			
			foreach($this->categoria_productos as $categoria_producto) {
				$this->deepLoad($categoria_producto,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->categoria_producto,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->categoria_productos as $categoria_producto) {
				$this->deepSave($categoria_producto,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->categoria_productos as $categoria_producto) {
				$this->deepSave($categoria_producto,$isDeep,$deepLoadType,$clases,false);
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
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
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
				
				$classes[]=new Classe(producto::$class);
				$classes[]=new Classe(sub_categoria_producto::$class);
				$classes[]=new Classe(lista_producto::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==producto::$class) {
						$classes[]=new Classe(producto::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==sub_categoria_producto::$class) {
						$classes[]=new Classe(sub_categoria_producto::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==lista_producto::$class) {
						$classes[]=new Classe(lista_producto::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==producto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(producto::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==sub_categoria_producto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(sub_categoria_producto::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==lista_producto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(lista_producto::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getcategoria_producto() : ?categoria_producto {	
		/*
		categoria_producto_logic_add::checkcategoria_productoToGet($this->categoria_producto,$this->datosCliente);
		categoria_producto_logic_add::updatecategoria_productoToGet($this->categoria_producto);
		*/
			
		return $this->categoria_producto;
	}
		
	public function setcategoria_producto(categoria_producto $newcategoria_producto) {
		$this->categoria_producto = $newcategoria_producto;
	}
	
	public function getcategoria_productos() : array {		
		/*
		categoria_producto_logic_add::checkcategoria_productoToGets($this->categoria_productos,$this->datosCliente);
		
		foreach ($this->categoria_productos as $categoria_productoLocal ) {
			categoria_producto_logic_add::updatecategoria_productoToGet($categoria_productoLocal);
		}
		*/
		
		return $this->categoria_productos;
	}
	
	public function setcategoria_productos(array $newcategoria_productos) {
		$this->categoria_productos = $newcategoria_productos;
	}
	
	public function getcategoria_productoDataAccess() : categoria_producto_data {
		return $this->categoria_productoDataAccess;
	}
	
	public function setcategoria_productoDataAccess(categoria_producto_data $newcategoria_productoDataAccess) {
		$this->categoria_productoDataAccess = $newcategoria_productoDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        categoria_producto_carga::$CONTROLLER;;        
		
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
