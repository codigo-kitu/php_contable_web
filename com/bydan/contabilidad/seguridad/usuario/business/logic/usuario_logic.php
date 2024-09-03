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

namespace com\bydan\contabilidad\seguridad\usuario\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\seguridad\usuario\util\usuario_carga;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_param_return;


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


use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
use com\bydan\contabilidad\seguridad\opcion\business\entity\opcion;
use com\bydan\contabilidad\seguridad\auditoria\business\entity\auditoria;

use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;
use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
use com\bydan\contabilidad\seguridad\usuario\business\data\usuario_data;

//FK


//REL


use com\bydan\contabilidad\seguridad\historial_cambio_clave\business\entity\historial_cambio_clave;
use com\bydan\contabilidad\seguridad\historial_cambio_clave\business\data\historial_cambio_clave_data;
use com\bydan\contabilidad\seguridad\historial_cambio_clave\business\logic\historial_cambio_clave_logic;
use com\bydan\contabilidad\seguridad\historial_cambio_clave\util\historial_cambio_clave_carga;
use com\bydan\contabilidad\seguridad\historial_cambio_clave\util\historial_cambio_clave_util;

use com\bydan\contabilidad\seguridad\resumen_usuario\business\entity\resumen_usuario;
use com\bydan\contabilidad\seguridad\resumen_usuario\business\data\resumen_usuario_data;
use com\bydan\contabilidad\seguridad\resumen_usuario\business\logic\resumen_usuario_logic;
use com\bydan\contabilidad\seguridad\resumen_usuario\util\resumen_usuario_carga;
use com\bydan\contabilidad\seguridad\resumen_usuario\util\resumen_usuario_util;

use com\bydan\contabilidad\seguridad\auditoria\business\data\auditoria_data;
use com\bydan\contabilidad\seguridad\auditoria\business\logic\auditoria_logic;
use com\bydan\contabilidad\seguridad\auditoria\util\auditoria_carga;
use com\bydan\contabilidad\seguridad\auditoria\util\auditoria_util;

use com\bydan\contabilidad\seguridad\perfil\business\entity\perfil;
use com\bydan\contabilidad\seguridad\perfil\business\data\perfil_data;
use com\bydan\contabilidad\seguridad\perfil\business\logic\perfil_logic;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_carga;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_util;

use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\data\parametro_general_usuario_data;
use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\logic\parametro_general_usuario_logic;
use com\bydan\contabilidad\seguridad\parametro_general_usuario\util\parametro_general_usuario_carga;
use com\bydan\contabilidad\seguridad\parametro_general_usuario\util\parametro_general_usuario_util;

use com\bydan\contabilidad\seguridad\perfil_usuario\business\entity\perfil_usuario;
use com\bydan\contabilidad\seguridad\perfil_usuario\business\data\perfil_usuario_data;
use com\bydan\contabilidad\seguridad\perfil_usuario\business\logic\perfil_usuario_logic;
use com\bydan\contabilidad\seguridad\perfil_usuario\util\perfil_usuario_carga;
use com\bydan\contabilidad\seguridad\perfil_usuario\util\perfil_usuario_util;

use com\bydan\contabilidad\seguridad\dato_general_usuario\business\entity\dato_general_usuario;
use com\bydan\contabilidad\seguridad\dato_general_usuario\business\data\dato_general_usuario_data;
use com\bydan\contabilidad\seguridad\dato_general_usuario\business\logic\dato_general_usuario_logic;
use com\bydan\contabilidad\seguridad\dato_general_usuario\util\dato_general_usuario_carga;
use com\bydan\contabilidad\seguridad\dato_general_usuario\util\dato_general_usuario_util;

//REL DETALLES

use com\bydan\contabilidad\seguridad\auditoria_detalle\util\auditoria_detalle_carga;



class usuario_logic  extends GeneralEntityLogic implements usuario_logicI {	
	/*GENERAL*/
	public usuario_data $usuarioDataAccess;
	public ?usuario_logic_add $usuarioLogicAdditional=null;
	public ?usuario $usuario;
	public array $usuarios;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->usuarioDataAccess = new usuario_data();			
			$this->usuarios = array();
			$this->usuario = new usuario();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->usuarioLogicAdditional = new usuario_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		if($this->usuarioLogicAdditional==null) {
			$this->usuarioLogicAdditional=new usuario_logic_add();
		}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->usuarioDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->usuarioDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->usuarioDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->usuarioDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->usuarios = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->usuarios=$this->usuarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				usuario_util::refrescarFKDescripciones($this->usuarios);
			}
			
			usuario_logic_add::checkusuarioToGets($this->usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->usuarios);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->usuarios = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->usuarios=$this->usuarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				usuario_util::refrescarFKDescripciones($this->usuarios);
			}
			
			usuario_logic_add::checkusuarioToGets($this->usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->usuarios);
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
		$this->usuario = new usuario();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->usuario=$this->usuarioDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				usuario_util::refrescarFKDescripcion($this->usuario);
			}
						
			usuario_logic_add::checkusuarioToGet($this->usuario,$this->datosCliente);
			usuario_logic_add::updateusuarioToGet($this->usuario);
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
		$this->usuario = new  usuario();
		  		  
        try {		
			$this->usuario=$this->usuarioDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				usuario_util::refrescarFKDescripcion($this->usuario);
			}
			
			usuario_logic_add::checkusuarioToGet($this->usuario,$this->datosCliente);
			usuario_logic_add::updateusuarioToGet($this->usuario);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?usuario {
		$usuarioLogic = new  usuario_logic();
		  		  
        try {		
			$usuarioLogic->setConnexion($connexion);			
			$usuarioLogic->getEntity($id);			
			return $usuarioLogic->getusuario();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->usuario = new  usuario();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->usuario=$this->usuarioDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				usuario_util::refrescarFKDescripcion($this->usuario);
			}
			
			usuario_logic_add::checkusuarioToGet($this->usuario,$this->datosCliente);
			usuario_logic_add::updateusuarioToGet($this->usuario);
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
		$this->usuario = new  usuario();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->usuario=$this->usuarioDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				usuario_util::refrescarFKDescripcion($this->usuario);
			}
			
			usuario_logic_add::checkusuarioToGet($this->usuario,$this->datosCliente);
			usuario_logic_add::updateusuarioToGet($this->usuario);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?usuario {
		$usuarioLogic = new  usuario_logic();
		  		  
        try {		
			$usuarioLogic->setConnexion($connexion);			
			$usuarioLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $usuarioLogic->getusuario();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->usuarios = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->usuarios=$this->usuarioDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				usuario_util::refrescarFKDescripciones($this->usuarios);
			}
			
			usuario_logic_add::checkusuarioToGets($this->usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->usuarios);			
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
		$this->usuarios = array();
		  		  
        try {			
			$this->usuarios=$this->usuarioDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				usuario_util::refrescarFKDescripciones($this->usuarios);
			}
			
			usuario_logic_add::checkusuarioToGets($this->usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->usuarios);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->usuarios = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->usuarios=$this->usuarioDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				usuario_util::refrescarFKDescripciones($this->usuarios);
			}
			
			usuario_logic_add::checkusuarioToGets($this->usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->usuarios);
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
		$this->usuarios = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->usuarios=$this->usuarioDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				usuario_util::refrescarFKDescripciones($this->usuarios);
			}
			
			usuario_logic_add::checkusuarioToGets($this->usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->usuarios);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$usuarioLogic = new  usuario_logic();
		  		  
        try {		
			$usuarioLogic->setConnexion($connexion);			
			$usuarioLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $usuarioLogic->getusuarios();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->usuarios = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->usuarios=$this->usuarioDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				usuario_util::refrescarFKDescripciones($this->usuarios);
			}
			
			usuario_logic_add::checkusuarioToGets($this->usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->usuarios);
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
		$this->usuarios = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->usuarios=$this->usuarioDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				usuario_util::refrescarFKDescripciones($this->usuarios);
			}
			
			usuario_logic_add::checkusuarioToGets($this->usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->usuarios);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->usuarios = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->usuarios=$this->usuarioDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				usuario_util::refrescarFKDescripciones($this->usuarios);
			}
			
			usuario_logic_add::checkusuarioToGets($this->usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->usuarios);
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
		$this->usuarios = array();
		  		  
        try {			
			$this->usuarios=$this->usuarioDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				usuario_util::refrescarFKDescripciones($this->usuarios);
			}	
			
			usuario_logic_add::checkusuarioToGets($this->usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->usuarios);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->usuarios = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->usuarios=$this->usuarioDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				usuario_util::refrescarFKDescripciones($this->usuarios);
			}
			
			usuario_logic_add::checkusuarioToGets($this->usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->usuarios);
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
		$this->usuarios = array();
		  		  
        try {		
			$this->usuarios=$this->usuarioDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				usuario_util::refrescarFKDescripciones($this->usuarios);
			}
			
			usuario_logic_add::checkusuarioToGets($this->usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->usuarios);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsBusquedaPorNombreWithConnection(string $strFinalQuery,Pagination $pagination,string $nombre) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralnombre= new ParameterSelectionGeneral();
			$parameterSelectionGeneralnombre->setParameterSelectionGeneralLike(ParameterType::$STRING,"%".$nombre."%",usuario_util::$NOMBRE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralnombre);

			$this->usuarios=$this->usuarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				usuario_util::refrescarFKDescripciones($this->usuarios);
			}
			usuario_logic_add::checkusuarioToGets($this->usuarios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->usuarios);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsBusquedaPorNombre(string $strFinalQuery,Pagination $pagination,string $nombre) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralnombre= new ParameterSelectionGeneral();
			$parameterSelectionGeneralnombre->setParameterSelectionGeneralLike(ParameterType::$STRING,"%".$nombre."%",usuario_util::$NOMBRE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralnombre);

			$this->usuarios=$this->usuarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				usuario_util::refrescarFKDescripciones($this->usuarios);
			}
			usuario_logic_add::checkusuarioToGets($this->usuarios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->usuarios);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsBusquedaPorUserNameWithConnection(string $strFinalQuery,Pagination $pagination,string $user_name) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneraluser_name= new ParameterSelectionGeneral();
			$parameterSelectionGeneraluser_name->setParameterSelectionGeneralLike(ParameterType::$STRING,"%".$user_name."%",usuario_util::$USER_NAME,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneraluser_name);

			$this->usuarios=$this->usuarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				usuario_util::refrescarFKDescripciones($this->usuarios);
			}
			usuario_logic_add::checkusuarioToGets($this->usuarios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->usuarios);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsBusquedaPorUserName(string $strFinalQuery,Pagination $pagination,string $user_name) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneraluser_name= new ParameterSelectionGeneral();
			$parameterSelectionGeneraluser_name->setParameterSelectionGeneralLike(ParameterType::$STRING,"%".$user_name."%",usuario_util::$USER_NAME,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneraluser_name);

			$this->usuarios=$this->usuarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				usuario_util::refrescarFKDescripciones($this->usuarios);
			}
			usuario_logic_add::checkusuarioToGets($this->usuarios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->usuarios);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getPorCodigoAlternoWithConnection(string $codigo_alterno) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$parameterSelectionGeneralcodigo_alterno= new ParameterSelectionGeneral();
			$parameterSelectionGeneralcodigo_alterno->setParameterSelectionGeneralEqual(ParameterType::$STRING,$codigo_alterno,usuario_util::$CODIGO_ALTERNO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralcodigo_alterno);

			$this->usuario=$this->usuarioDataAccess->getEntityConnexionWhereSelect($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoad($this->usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());

				usuario_util::refrescarFKDescripcion($this->usuario);
			}

			usuario_logic_add::checkusuarioToGet($this->usuario,$this->datosCliente);
			usuario_logic_add::updateusuarioToGet($this->usuario);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();
		}
	}

	public function getPorCodigoAlterno(string $codigo_alterno) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$parameterSelectionGeneralcodigo_alterno= new ParameterSelectionGeneral();
			$parameterSelectionGeneralcodigo_alterno->setParameterSelectionGeneralEqual(ParameterType::$STRING,$codigo_alterno,usuario_util::$CODIGO_ALTERNO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralcodigo_alterno);

			$this->usuario=$this->usuarioDataAccess->getEntityConnexionWhereSelect($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoad($this->usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());

				usuario_util::refrescarFKDescripcion($this->usuario);
			}

			usuario_logic_add::checkusuarioToGet($this->usuario,$this->datosCliente);
			usuario_logic_add::updateusuarioToGet($this->usuario);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getPorUserNameWithConnection(string $user_name) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$parameterSelectionGeneraluser_name= new ParameterSelectionGeneral();
			$parameterSelectionGeneraluser_name->setParameterSelectionGeneralEqual(ParameterType::$STRING,$user_name,usuario_util::$USER_NAME,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneraluser_name);

			$this->usuario=$this->usuarioDataAccess->getEntityConnexionWhereSelect($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoad($this->usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());

				usuario_util::refrescarFKDescripcion($this->usuario);
			}

			usuario_logic_add::checkusuarioToGet($this->usuario,$this->datosCliente);
			usuario_logic_add::updateusuarioToGet($this->usuario);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();
		}
	}

	public function getPorUserName(string $user_name) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$parameterSelectionGeneraluser_name= new ParameterSelectionGeneral();
			$parameterSelectionGeneraluser_name->setParameterSelectionGeneralEqual(ParameterType::$STRING,$user_name,usuario_util::$USER_NAME,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneraluser_name);

			$this->usuario=$this->usuarioDataAccess->getEntityConnexionWhereSelect($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoad($this->usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());

				usuario_util::refrescarFKDescripcion($this->usuario);
			}

			usuario_logic_add::checkusuarioToGet($this->usuario,$this->datosCliente);
			usuario_logic_add::updateusuarioToGet($this->usuario);
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
						
			//usuario_logic_add::checkusuarioToSave($this->usuario,$this->datosCliente,$this->connexion);	       
			usuario_logic_add::updateusuarioToSave($this->usuario);			
			usuario_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->usuario,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			$this->usuarioLogicAdditional->checkGeneralEntityToSave($this,$this->usuario,$this->datosCliente,$this->connexion);
			
			
			usuario_data::save($this->usuario, $this->connexion);	    	       	 				
			//usuario_logic_add::checkusuarioToSaveAfter($this->usuario,$this->datosCliente,$this->connexion);			
			$this->usuarioLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->usuario,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				usuario_util::refrescarFKDescripcion($this->usuario);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->usuario->getIsDeleted()) {
				$this->usuario=null;
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
						
			/*usuario_logic_add::checkusuarioToSave($this->usuario,$this->datosCliente,$this->connexion);*/	        
			usuario_logic_add::updateusuarioToSave($this->usuario);			
			$this->usuarioLogicAdditional->checkGeneralEntityToSave($this,$this->usuario,$this->datosCliente,$this->connexion);			
			usuario_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->usuario,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			usuario_data::save($this->usuario, $this->connexion);	    	       	 						
			/*usuario_logic_add::checkusuarioToSaveAfter($this->usuario,$this->datosCliente,$this->connexion);*/			
			$this->usuarioLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->usuario,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				usuario_util::refrescarFKDescripcion($this->usuario);				
			}
			
			if($this->usuario->getIsDeleted()) {
				$this->usuario=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(usuario $usuario,Connexion $connexion)  {
		$usuarioLogic = new  usuario_logic();		  		  
        try {		
			$usuarioLogic->setConnexion($connexion);			
			$usuarioLogic->setusuario($usuario);			
			$usuarioLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*usuario_logic_add::checkusuarioToSaves($this->usuarios,$this->datosCliente,$this->connexion);*/	        	
			$this->usuarioLogicAdditional->checkGeneralEntitiesToSaves($this,$this->usuarios,$this->datosCliente,$this->connexion);
			
	   		foreach($this->usuarios as $usuarioLocal) {				
								
				usuario_logic_add::updateusuarioToSave($usuarioLocal);	        	
				usuario_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$usuarioLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				usuario_data::save($usuarioLocal, $this->connexion);				
			}
			
			/*usuario_logic_add::checkusuarioToSavesAfter($this->usuarios,$this->datosCliente,$this->connexion);*/			
			$this->usuarioLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->usuarios,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				usuario_util::refrescarFKDescripciones($this->usuarios);
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
			/*usuario_logic_add::checkusuarioToSaves($this->usuarios,$this->datosCliente,$this->connexion);*/			
			$this->usuarioLogicAdditional->checkGeneralEntitiesToSaves($this,$this->usuarios,$this->datosCliente,$this->connexion);
			
	   		foreach($this->usuarios as $usuarioLocal) {				
								
				usuario_logic_add::updateusuarioToSave($usuarioLocal);	        	
				usuario_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$usuarioLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				usuario_data::save($usuarioLocal, $this->connexion);				
			}			
			
			/*usuario_logic_add::checkusuarioToSavesAfter($this->usuarios,$this->datosCliente,$this->connexion);*/			
			$this->usuarioLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->usuarios,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				usuario_util::refrescarFKDescripciones($this->usuarios);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $usuarios,Connexion $connexion)  {
		$usuarioLogic = new  usuario_logic();
		  		  
        try {		
			$usuarioLogic->setConnexion($connexion);			
			$usuarioLogic->setusuarios($usuarios);			
			$usuarioLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$usuariosAux=array();
		
		foreach($this->usuarios as $usuario) {
			if($usuario->getIsDeleted()==false) {
				$usuariosAux[]=$usuario;
			}
		}
		
		$this->usuarios=$usuariosAux;
	}
	
	public function updateToGetsAuxiliar(array &$usuarios) {
		if($this->usuarioLogicAdditional==null) {
			$this->usuarioLogicAdditional=new usuario_logic_add();
		}
		
		
		$this->usuarioLogicAdditional->updateToGets($usuarios,$this);					
		$this->usuarioLogicAdditional->updateToGetsReferencia($usuarios,$this);			
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
	
	
	
	public function saveRelacionesWithConnection($usuario,$historialcambioclaves,$resumenusuarios,$auditorias,$parametrogeneralusuario,$perfilusuarios,$datogeneralusuario) {
		$this->saveRelacionesBase($usuario,$historialcambioclaves,$resumenusuarios,$auditorias,$parametrogeneralusuario,$perfilusuarios,$datogeneralusuario,true);
	}

	public function saveRelaciones($usuario,$historialcambioclaves,$resumenusuarios,$auditorias,$parametrogeneralusuario,$perfilusuarios,$datogeneralusuario) {
		$this->saveRelacionesBase($usuario,$historialcambioclaves,$resumenusuarios,$auditorias,$parametrogeneralusuario,$perfilusuarios,$datogeneralusuario,false);
	}

	public function saveRelacionesBase($usuario,$historialcambioclaves=array(),$resumenusuarios=array(),$auditorias=array(),$parametrogeneralusuario=null,$perfilusuarios=array(),$datogeneralusuario=null,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$usuario->sethistorial_cambio_claves($historialcambioclaves);
			$usuario->setresumen_usuarios($resumenusuarios);
			$usuario->setauditorias($auditorias);
			$usuario->setparametro_general_usuario($parametrogeneralusuario);
			$usuario->setperfil_usuarios($perfilusuarios);
			$usuario->setdato_general_usuario($datogeneralusuario);
			$this->setusuario($usuario);

			if(usuario_logic_add::validarSaveRelaciones($usuario,$this)) {

				usuario_logic_add::updateRelacionesToSave($usuario,$this);

				if(($this->usuario->getIsNew() || $this->usuario->getIsChanged()) && !$this->usuario->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($historialcambioclaves,$resumenusuarios,$auditorias,$parametrogeneralusuario,$perfilusuarios,$datogeneralusuario);

				} else if($this->usuario->getIsDeleted()) {
					$this->saveRelacionesDetalles($historialcambioclaves,$resumenusuarios,$auditorias,$parametrogeneralusuario,$perfilusuarios,$datogeneralusuario);
					$this->save();
				}

				usuario_logic_add::updateRelacionesToSaveAfter($usuario,$this);

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
	
	
	public function saveRelacionesDetalles($historialcambioclaves=array(),$resumenusuarios=array(),$auditorias=array(),$parametrogeneralusuario=null,$perfilusuarios=array(),$datogeneralusuario=null) {
		try {
	

			$idusuarioActual=$this->getusuario()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/util/historial_cambio_clave_carga.php');
			historial_cambio_clave_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$historialcambioclaveLogic_Desde_usuario=new historial_cambio_clave_logic();
			$historialcambioclaveLogic_Desde_usuario->sethistorial_cambio_claves($historialcambioclaves);

			$historialcambioclaveLogic_Desde_usuario->setConnexion($this->getConnexion());
			$historialcambioclaveLogic_Desde_usuario->setDatosCliente($this->datosCliente);

			foreach($historialcambioclaveLogic_Desde_usuario->gethistorial_cambio_claves() as $historialcambioclave_Desde_usuario) {
				$historialcambioclave_Desde_usuario->setid_usuario($idusuarioActual);
			}

			$historialcambioclaveLogic_Desde_usuario->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/util/resumen_usuario_carga.php');
			resumen_usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$resumenusuarioLogic_Desde_usuario=new resumen_usuario_logic();
			$resumenusuarioLogic_Desde_usuario->setresumen_usuarios($resumenusuarios);

			$resumenusuarioLogic_Desde_usuario->setConnexion($this->getConnexion());
			$resumenusuarioLogic_Desde_usuario->setDatosCliente($this->datosCliente);

			foreach($resumenusuarioLogic_Desde_usuario->getresumen_usuarios() as $resumenusuario_Desde_usuario) {
				$resumenusuario_Desde_usuario->setid_usuario($idusuarioActual);
			}

			$resumenusuarioLogic_Desde_usuario->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/util/auditoria_carga.php');
			auditoria_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$auditoriaLogic_Desde_usuario=new auditoria_logic();
			$auditoriaLogic_Desde_usuario->setauditorias($auditorias);

			$auditoriaLogic_Desde_usuario->setConnexion($this->getConnexion());
			$auditoriaLogic_Desde_usuario->setDatosCliente($this->datosCliente);

			foreach($auditoriaLogic_Desde_usuario->getauditorias() as $auditoria_Desde_usuario) {
				$auditoria_Desde_usuario->setid_usuario($idusuarioActual);

				$auditoriaLogic_Desde_usuario->setauditoria($auditoria_Desde_usuario);
				$auditoriaLogic_Desde_usuario->save();

				$idauditoriaActual=$auditoria_Desde_usuario->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/util/auditoria_detalle_carga.php');
				auditoria_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$auditoriadetalleLogic_Desde_auditoria=new auditoria_detalle_logic();

				if($auditoria_Desde_usuario->getauditoria_detalles()==null){
					$auditoria_Desde_usuario->setauditoria_detalles(array());
				}

				$auditoriadetalleLogic_Desde_auditoria->setauditoria_detalles($auditoria_Desde_usuario->getauditoria_detalles());

				$auditoriadetalleLogic_Desde_auditoria->setConnexion($this->getConnexion());
				$auditoriadetalleLogic_Desde_auditoria->setDatosCliente($this->datosCliente);

				foreach($auditoriadetalleLogic_Desde_auditoria->getauditoria_detalles() as $auditoriadetalle_Desde_auditoria) {
					$auditoriadetalle_Desde_auditoria->setid_auditoria($idauditoriaActual);
				}

				$auditoriadetalleLogic_Desde_auditoria->saves();
			}


			$parametrogeneralusuarioLogic_Desde_usuario=new parametro_general_usuario_logic();
			$parametrogeneralusuarioLogic_Desde_usuario.setparametro_general_usuario($parametrogeneralusuario);

			if($parametrogeneralusuarioLogic_Desde_usuario->getparametro_general_usuario()!=null) {
			$parametrogeneralusuarioLogic_Desde_usuario->getparametro_general_usuario()->setId($idusuarioActual);
			}

			$parametrogeneralusuarioLogic_Desde_usuario->setConnexion($this->getConnexion());
			$parametrogeneralusuarioLogic_Desde_usuario->setDatosCliente($this->datosCliente);
			$parametrogeneralusuarioLogic_Desde_usuario->save();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/util/perfil_usuario_carga.php');
			perfil_usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$perfilusuarioLogic_Desde_usuario=new perfil_usuario_logic();
			$perfilusuarioLogic_Desde_usuario->setperfil_usuarios($perfilusuarios);

			$perfilusuarioLogic_Desde_usuario->setConnexion($this->getConnexion());
			$perfilusuarioLogic_Desde_usuario->setDatosCliente($this->datosCliente);

			foreach($perfilusuarioLogic_Desde_usuario->getperfil_usuarios() as $perfilusuario_Desde_usuario) {
				$perfilusuario_Desde_usuario->setid_usuario($idusuarioActual);
			}

			$perfilusuarioLogic_Desde_usuario->saves();

			$datogeneralusuarioLogic_Desde_usuario=new dato_general_usuario_logic();
			$datogeneralusuarioLogic_Desde_usuario.setdato_general_usuario($datogeneralusuario);

			if($datogeneralusuarioLogic_Desde_usuario->getdato_general_usuario()!=null) {
			$datogeneralusuarioLogic_Desde_usuario->getdato_general_usuario()->setId($idusuarioActual);
			}

			$datogeneralusuarioLogic_Desde_usuario->setConnexion($this->getConnexion());
			$datogeneralusuarioLogic_Desde_usuario->setDatosCliente($this->datosCliente);
			$datogeneralusuarioLogic_Desde_usuario->save();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $usuarios,usuario_param_return $usuarioParameterGeneral) : usuario_param_return {
		$usuarioReturnGeneral=new usuario_param_return();
	
		 try {	
			
			if($this->usuarioLogicAdditional==null) {
				$this->usuarioLogicAdditional=new usuario_logic_add();
			}
			
			$this->usuarioLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$sProceso,$usuarios,$usuarioParameterGeneral,$usuarioReturnGeneral);
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $usuarioReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $usuarios,usuario_param_return $usuarioParameterGeneral) : usuario_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$usuarioReturnGeneral=new usuario_param_return();
	
			
			if($this->usuarioLogicAdditional==null) {
				$this->usuarioLogicAdditional=new usuario_logic_add();
			}
			
			$this->usuarioLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$strProceso,$usuarios,$usuarioParameterGeneral,$usuarioReturnGeneral);
			
			$this->connexion->getConnection()->commit();			
			
			return $usuarioReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $usuarios,usuario $usuario,usuario_param_return $usuarioParameterGeneral,bool $isEsNuevousuario,array $clases) : usuario_param_return {
		 try {	
			$usuarioReturnGeneral=new usuario_param_return();
	
			$usuarioReturnGeneral->setusuario($usuario);
			$usuarioReturnGeneral->setusuarios($usuarios);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$usuarioReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			if($this->usuarioLogicAdditional==null) {
				$this->usuarioLogicAdditional=new usuario_logic_add();
			}
			
			$usuarioReturnGeneral=$this->usuarioLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$usuarios,$usuario,$usuarioParameterGeneral,$usuarioReturnGeneral,$isEsNuevousuario,$clases);
			
			/*usuarioLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$usuarios,$usuario,$usuarioParameterGeneral,$usuarioReturnGeneral,$isEsNuevousuario,$clases);*/
			
			return $usuarioReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $usuarios,usuario $usuario,usuario_param_return $usuarioParameterGeneral,bool $isEsNuevousuario,array $clases) : usuario_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$usuarioReturnGeneral=new usuario_param_return();
	
			$usuarioReturnGeneral->setusuario($usuario);
			$usuarioReturnGeneral->setusuarios($usuarios);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$usuarioReturnGeneral->setConRecargarPropiedades(true);
			}
			
			if($this->usuarioLogicAdditional==null) {
				$this->usuarioLogicAdditional=new usuario_logic_add();
			}
			
			$usuarioReturnGeneral=$this->usuarioLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$usuarios,$usuario,$usuarioParameterGeneral,$usuarioReturnGeneral,$isEsNuevousuario,$clases);
			
			/*usuarioLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$usuarios,$usuario,$usuarioParameterGeneral,$usuarioReturnGeneral,$isEsNuevousuario,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $usuarioReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $usuarios,usuario $usuario,usuario_param_return $usuarioParameterGeneral,bool $isEsNuevousuario,array $clases) : usuario_param_return {
		 try {	
			$usuarioReturnGeneral=new usuario_param_return();
	
			$usuarioReturnGeneral->setusuario($usuario);
			$usuarioReturnGeneral->setusuarios($usuarios);
			
			
			
			if($this->usuarioLogicAdditional==null) {
				$this->usuarioLogicAdditional=new usuario_logic_add();
			}
			
			$usuarioReturnGeneral=$this->usuarioLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$usuarios,$usuario,$usuarioParameterGeneral,$usuarioReturnGeneral,$isEsNuevousuario,$clases);
			
			/*usuarioLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$usuarios,$usuario,$usuarioParameterGeneral,$usuarioReturnGeneral,$isEsNuevousuario,$clases);*/
			
			return $usuarioReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $usuarios,usuario $usuario,usuario_param_return $usuarioParameterGeneral,bool $isEsNuevousuario,array $clases) : usuario_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$usuarioReturnGeneral=new usuario_param_return();
	
			$usuarioReturnGeneral->setusuario($usuario);
			$usuarioReturnGeneral->setusuarios($usuarios);
			
			
			if($this->usuarioLogicAdditional==null) {
				$this->usuarioLogicAdditional=new usuario_logic_add();
			}
			
			$usuarioReturnGeneral=$this->usuarioLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$usuarios,$usuario,$usuarioParameterGeneral,$usuarioReturnGeneral,$isEsNuevousuario,$clases);
			
			/*usuarioLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$usuarios,$usuario,$usuarioParameterGeneral,$usuarioReturnGeneral,$isEsNuevousuario,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $usuarioReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,usuario $usuario,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,usuario $usuario,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		usuario_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(usuario $usuario,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			usuario_logic_add::updateusuarioToGet($this->usuario);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$usuario->sethistorial_cambio_claves($this->usuarioDataAccess->gethistorial_cambio_claves($this->connexion,$usuario));
		$usuario->setresumen_usuarios($this->usuarioDataAccess->getresumen_usuarios($this->connexion,$usuario));
		$usuario->setauditorias($this->usuarioDataAccess->getauditorias($this->connexion,$usuario));
		$usuario->setperfils($this->usuarioDataAccess->getperfils($this->connexion,$usuario));
		$usuario->setparametro_general_usuario($this->usuarioDataAccess->getparametro_general_usuario($this->connexion,$usuario));
		$usuario->setperfil_usuarios($this->usuarioDataAccess->getperfil_usuarios($this->connexion,$usuario));
		$usuario->setdato_general_usuario($this->usuarioDataAccess->getdato_general_usuario($this->connexion,$usuario));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==historial_cambio_clave::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$usuario->sethistorial_cambio_claves($this->usuarioDataAccess->gethistorial_cambio_claves($this->connexion,$usuario));

				if($this->isConDeep) {
					$historialcambioclaveLogic= new historial_cambio_clave_logic($this->connexion);
					$historialcambioclaveLogic->sethistorial_cambio_claves($usuario->gethistorial_cambio_claves());
					$classesLocal=historial_cambio_clave_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$historialcambioclaveLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					historial_cambio_clave_util::refrescarFKDescripciones($historialcambioclaveLogic->gethistorial_cambio_claves());
					$usuario->sethistorial_cambio_claves($historialcambioclaveLogic->gethistorial_cambio_claves());
				}

				continue;
			}

			if($clas->clas==resumen_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$usuario->setresumen_usuarios($this->usuarioDataAccess->getresumen_usuarios($this->connexion,$usuario));

				if($this->isConDeep) {
					$resumenusuarioLogic= new resumen_usuario_logic($this->connexion);
					$resumenusuarioLogic->setresumen_usuarios($usuario->getresumen_usuarios());
					$classesLocal=resumen_usuario_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$resumenusuarioLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					resumen_usuario_util::refrescarFKDescripciones($resumenusuarioLogic->getresumen_usuarios());
					$usuario->setresumen_usuarios($resumenusuarioLogic->getresumen_usuarios());
				}

				continue;
			}

			if($clas->clas==auditoria::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$usuario->setauditorias($this->usuarioDataAccess->getauditorias($this->connexion,$usuario));

				if($this->isConDeep) {
					$auditoriaLogic= new auditoria_logic($this->connexion);
					$auditoriaLogic->setauditorias($usuario->getauditorias());
					$classesLocal=auditoria_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$auditoriaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					auditoria_util::refrescarFKDescripciones($auditoriaLogic->getauditorias());
					$usuario->setauditorias($auditoriaLogic->getauditorias());
				}

				continue;
			}

			if($clas->clas==perfil::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$usuario->setperfils($this->usuarioDataAccess->getperfils($this->connexion,$usuario));

				if($this->isConDeep) {
					$perfilLogic= new perfil_logic($this->connexion);
					$perfilLogic->setperfils($usuario->getperfils());
					$classesLocal=perfil_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$perfilLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					perfil_util::refrescarFKDescripciones($perfilLogic->getperfils());
					$usuario->setperfils($perfilLogic->getperfils());
				}

				continue;
			}

			if($clas->clas==parametro_general_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$usuario->setparametro_general_usuario($this->usuarioDataAccess->getparametro_general_usuario($this->connexion,$usuario));

				if($this->isConDeep) {
					$parametrogeneralusuarioLogic= new parametro_general_usuario_logic($this->connexion);
					$parametrogeneralusuarioLogic->setparametro_general_usuario($usuario->getparametro_general_usuario());
					$classesLocal=parametro_general_usuario_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$parametrogeneralusuarioLogic->deepLoad(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					parametro_general_usuario_util::refrescarFKDescripciones($parametrogeneralusuarioLogic->getparametro_general_usuario());
					$usuario->setparametro_general_usuario($parametrogeneralusuarioLogic->getparametro_general_usuario());
				}

				continue;
			}

			if($clas->clas==perfil_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$usuario->setperfil_usuarios($this->usuarioDataAccess->getperfil_usuarios($this->connexion,$usuario));

				if($this->isConDeep) {
					$perfilusuarioLogic= new perfil_usuario_logic($this->connexion);
					$perfilusuarioLogic->setperfil_usuarios($usuario->getperfil_usuarios());
					$classesLocal=perfil_usuario_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$perfilusuarioLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					perfil_usuario_util::refrescarFKDescripciones($perfilusuarioLogic->getperfil_usuarios());
					$usuario->setperfil_usuarios($perfilusuarioLogic->getperfil_usuarios());
				}

				continue;
			}

			if($clas->clas==dato_general_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$usuario->setdato_general_usuario($this->usuarioDataAccess->getdato_general_usuario($this->connexion,$usuario));

				if($this->isConDeep) {
					$datogeneralusuarioLogic= new dato_general_usuario_logic($this->connexion);
					$datogeneralusuarioLogic->setdato_general_usuario($usuario->getdato_general_usuario());
					$classesLocal=dato_general_usuario_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$datogeneralusuarioLogic->deepLoad(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					dato_general_usuario_util::refrescarFKDescripciones($datogeneralusuarioLogic->getdato_general_usuario());
					$usuario->setdato_general_usuario($datogeneralusuarioLogic->getdato_general_usuario());
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==historial_cambio_clave::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(historial_cambio_clave::$class);
			$usuario->sethistorial_cambio_claves($this->usuarioDataAccess->gethistorial_cambio_claves($this->connexion,$usuario));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==resumen_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(resumen_usuario::$class);
			$usuario->setresumen_usuarios($this->usuarioDataAccess->getresumen_usuarios($this->connexion,$usuario));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==auditoria::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(auditoria::$class);
			$usuario->setauditorias($this->usuarioDataAccess->getauditorias($this->connexion,$usuario));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==perfil::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(perfil::$class);
			$usuario->setperfils($this->usuarioDataAccess->getperfils($this->connexion,$usuario));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==parametro_general_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(parametro_general_usuario::$class);
			$usuario->setparametro_general_usuario($this->usuarioDataAccess->getparametro_general_usuario($this->connexion,$usuario));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==perfil_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(perfil_usuario::$class);
			$usuario->setperfil_usuarios($this->usuarioDataAccess->getperfil_usuarios($this->connexion,$usuario));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==dato_general_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(dato_general_usuario::$class);
			$usuario->setdato_general_usuario($this->usuarioDataAccess->getdato_general_usuario($this->connexion,$usuario));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {


		$usuario->sethistorial_cambio_claves($this->usuarioDataAccess->gethistorial_cambio_claves($this->connexion,$usuario));

		foreach($usuario->gethistorial_cambio_claves() as $historialcambioclave) {
			$historialcambioclaveLogic= new historial_cambio_clave_logic($this->connexion);
			$historialcambioclaveLogic->deepLoad($historialcambioclave,$isDeep,$deepLoadType,$clases);
		}

		$usuario->setresumen_usuarios($this->usuarioDataAccess->getresumen_usuarios($this->connexion,$usuario));

		foreach($usuario->getresumen_usuarios() as $resumenusuario) {
			$resumenusuarioLogic= new resumen_usuario_logic($this->connexion);
			$resumenusuarioLogic->deepLoad($resumenusuario,$isDeep,$deepLoadType,$clases);
		}

		$usuario->setauditorias($this->usuarioDataAccess->getauditorias($this->connexion,$usuario));

		foreach($usuario->getauditorias() as $auditoria) {
			$auditoriaLogic= new auditoria_logic($this->connexion);
			$auditoriaLogic->deepLoad($auditoria,$isDeep,$deepLoadType,$clases);
		}

		$usuario->setperfils($this->usuarioDataAccess->getperfils($this->connexion,$usuario));

		foreach($usuario->getperfils() as $perfil) {
			$perfilLogic= new perfil_logic($this->connexion);
			$perfilLogic->deepLoad($perfil,$isDeep,$deepLoadType,$clases);
		}
					$usuario->setparametro_general_usuario($this->usuarioDataAccess->getparametro_general_usuario($this->connexion,$usuario));

						$parametrogeneralusuarioLogic= new parametro_general_usuario_logic($this->connexion);

					$parametrogeneralusuarioLogic->deepLoad($usuario->getParametroGeneralUsuario(),$isDeep,$deepLoadType,$clases);

		$usuario->setperfil_usuarios($this->usuarioDataAccess->getperfil_usuarios($this->connexion,$usuario));

		foreach($usuario->getperfil_usuarios() as $perfilusuario) {
			$perfilusuarioLogic= new perfil_usuario_logic($this->connexion);
			$perfilusuarioLogic->deepLoad($perfilusuario,$isDeep,$deepLoadType,$clases);
		}
					$usuario->setdato_general_usuario($this->usuarioDataAccess->getdato_general_usuario($this->connexion,$usuario));

						$datogeneralusuarioLogic= new dato_general_usuario_logic($this->connexion);

					$datogeneralusuarioLogic->deepLoad($usuario->getDatoGeneralUsuario(),$isDeep,$deepLoadType,$clases);
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==historial_cambio_clave::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$usuario->sethistorial_cambio_claves($this->usuarioDataAccess->gethistorial_cambio_claves($this->connexion,$usuario));

				foreach($usuario->gethistorial_cambio_claves() as $historialcambioclave) {
					$historialcambioclaveLogic= new historial_cambio_clave_logic($this->connexion);
					$historialcambioclaveLogic->deepLoad($historialcambioclave,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==resumen_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$usuario->setresumen_usuarios($this->usuarioDataAccess->getresumen_usuarios($this->connexion,$usuario));

				foreach($usuario->getresumen_usuarios() as $resumenusuario) {
					$resumenusuarioLogic= new resumen_usuario_logic($this->connexion);
					$resumenusuarioLogic->deepLoad($resumenusuario,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==auditoria::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$usuario->setauditorias($this->usuarioDataAccess->getauditorias($this->connexion,$usuario));

				foreach($usuario->getauditorias() as $auditoria) {
					$auditoriaLogic= new auditoria_logic($this->connexion);
					$auditoriaLogic->deepLoad($auditoria,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==perfil::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$usuario->setperfils($this->usuarioDataAccess->getperfils($this->connexion,$usuario));

				foreach($usuario->getperfils() as $perfil) {
					$perfilLogic= new perfil_logic($this->connexion);
					$perfilLogic->deepLoad($perfil,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==parametro_general_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$usuario->setparametro_general_usuario($this->usuarioDataAccess->getparametro_general_usuario($this->connexion,$usuario));

				$parametrogeneralusuarioLogic= new parametro_general_usuario_logic($this->connexion);

				$parametrogeneralusuarioLogic->deepLoad($usuario->getParametroGeneralUsuario(),$isDeep,$deepLoadType,$clases);
			}

			if($clas->clas==perfil_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$usuario->setperfil_usuarios($this->usuarioDataAccess->getperfil_usuarios($this->connexion,$usuario));

				foreach($usuario->getperfil_usuarios() as $perfilusuario) {
					$perfilusuarioLogic= new perfil_usuario_logic($this->connexion);
					$perfilusuarioLogic->deepLoad($perfilusuario,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==dato_general_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$usuario->setdato_general_usuario($this->usuarioDataAccess->getdato_general_usuario($this->connexion,$usuario));

				$datogeneralusuarioLogic= new dato_general_usuario_logic($this->connexion);

				$datogeneralusuarioLogic->deepLoad($usuario->getDatoGeneralUsuario(),$isDeep,$deepLoadType,$clases);
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==historial_cambio_clave::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(historial_cambio_clave::$class);
			$usuario->sethistorial_cambio_claves($this->usuarioDataAccess->gethistorial_cambio_claves($this->connexion,$usuario));

			foreach($usuario->gethistorial_cambio_claves() as $historialcambioclave) {
				$historialcambioclaveLogic= new historial_cambio_clave_logic($this->connexion);
				$historialcambioclaveLogic->deepLoad($historialcambioclave,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==resumen_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(resumen_usuario::$class);
			$usuario->setresumen_usuarios($this->usuarioDataAccess->getresumen_usuarios($this->connexion,$usuario));

			foreach($usuario->getresumen_usuarios() as $resumenusuario) {
				$resumenusuarioLogic= new resumen_usuario_logic($this->connexion);
				$resumenusuarioLogic->deepLoad($resumenusuario,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==auditoria::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(auditoria::$class);
			$usuario->setauditorias($this->usuarioDataAccess->getauditorias($this->connexion,$usuario));

			foreach($usuario->getauditorias() as $auditoria) {
				$auditoriaLogic= new auditoria_logic($this->connexion);
				$auditoriaLogic->deepLoad($auditoria,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==perfil::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(perfil::$class);
			$usuario->setperfils($this->usuarioDataAccess->getperfils($this->connexion,$usuario));

			foreach($usuario->getperfils() as $perfil) {
				$perfilLogic= new perfil_logic($this->connexion);
				$perfilLogic->deepLoad($perfil,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==parametro_general_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
				$clases[]=new Classe(parametro_general_usuario::$class);
				$usuario->setparametro_general_usuario($this->usuarioDataAccess->getparametro_general_usuario($this->connexion,$usuario));

					$parametrogeneralusuarioLogic= new parametro_general_usuario_logic($this->connexion);

				$parametrogeneralusuarioLogic->deepLoad($usuario->getParametroGeneralUsuario(),$isDeep,$deepLoadType,$clases);
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==perfil_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(perfil_usuario::$class);
			$usuario->setperfil_usuarios($this->usuarioDataAccess->getperfil_usuarios($this->connexion,$usuario));

			foreach($usuario->getperfil_usuarios() as $perfilusuario) {
				$perfilusuarioLogic= new perfil_usuario_logic($this->connexion);
				$perfilusuarioLogic->deepLoad($perfilusuario,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==dato_general_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
				$clases[]=new Classe(dato_general_usuario::$class);
				$usuario->setdato_general_usuario($this->usuarioDataAccess->getdato_general_usuario($this->connexion,$usuario));

					$datogeneralusuarioLogic= new dato_general_usuario_logic($this->connexion);

				$datogeneralusuarioLogic->deepLoad($usuario->getDatoGeneralUsuario(),$isDeep,$deepLoadType,$clases);
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(usuario $usuario,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			usuario_logic_add::updateusuarioToSave($this->usuario);			
			
			if(!$paraDeleteCascade) {				
				usuario_data::save($usuario, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($usuario->gethistorial_cambio_claves() as $historialcambioclave) {
			$historialcambioclave->setid_usuario($usuario->getId());
			historial_cambio_clave_data::save($historialcambioclave,$this->connexion);
		}


		foreach($usuario->getresumen_usuarios() as $resumenusuario) {
			$resumenusuario->setid_usuario($usuario->getId());
			resumen_usuario_data::save($resumenusuario,$this->connexion);
		}


		foreach($usuario->getauditorias() as $auditoria) {
			$auditoria->setid_usuario($usuario->getId());
			auditoria_data::save($auditoria,$this->connexion);
		}

		foreach($usuario->getperfils() as $perfil) {
			perfil_data::save($perfil,$this->connexion);
		}

			$usuario->getParametroGeneralUsuario()->setId($usuario->getId());
		parametro_general_usuario_data::save($usuario->getParametroGeneralUsuario(),$this->connexion);


		foreach($usuario->getperfil_usuarios() as $perfilusuario) {
			$perfilusuario->setid_usuario($usuario->getId());
			perfil_usuario_data::save($perfilusuario,$this->connexion);
		}

			$usuario->getDatoGeneralUsuario()->setId($usuario->getId());
		dato_general_usuario_data::save($usuario->getDatoGeneralUsuario(),$this->connexion);
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==historial_cambio_clave::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($usuario->gethistorial_cambio_claves() as $historialcambioclave) {
					$historialcambioclave->setid_usuario($usuario->getId());
					historial_cambio_clave_data::save($historialcambioclave,$this->connexion);
				}

				continue;
			}

			if($clas->clas==resumen_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($usuario->getresumen_usuarios() as $resumenusuario) {
					$resumenusuario->setid_usuario($usuario->getId());
					resumen_usuario_data::save($resumenusuario,$this->connexion);
				}

				continue;
			}

			if($clas->clas==auditoria::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($usuario->getauditorias() as $auditoria) {
					$auditoria->setid_usuario($usuario->getId());
					auditoria_data::save($auditoria,$this->connexion);
				}

				continue;
			}

			if($clas->clas==perfil::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($usuario->getperfils() as $perfil) {
					perfil_data::save($perfil,$this->connexion);
				}

				continue;
			}

			if($clas->clas==parametro_general_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				$usuario->getParametroGeneralUsuario()->setId($usuario->getId());
		parametro_general_usuario_data::save($usuario->getParametroGeneralUsuario(),$this->connexion);
			}

			if($clas->clas==perfil_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($usuario->getperfil_usuarios() as $perfilusuario) {
					$perfilusuario->setid_usuario($usuario->getId());
					perfil_usuario_data::save($perfilusuario,$this->connexion);
				}

				continue;
			}

			if($clas->clas==dato_general_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				$usuario->getDatoGeneralUsuario()->setId($usuario->getId());
		dato_general_usuario_data::save($usuario->getDatoGeneralUsuario(),$this->connexion);
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==historial_cambio_clave::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(historial_cambio_clave::$class);

			foreach($usuario->gethistorial_cambio_claves() as $historialcambioclave) {
				$historialcambioclave->setid_usuario($usuario->getId());
				historial_cambio_clave_data::save($historialcambioclave,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==resumen_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(resumen_usuario::$class);

			foreach($usuario->getresumen_usuarios() as $resumenusuario) {
				$resumenusuario->setid_usuario($usuario->getId());
				resumen_usuario_data::save($resumenusuario,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==auditoria::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(auditoria::$class);

			foreach($usuario->getauditorias() as $auditoria) {
				$auditoria->setid_usuario($usuario->getId());
				auditoria_data::save($auditoria,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==perfil::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(perfil::$class);

			foreach($usuario->getperfils() as $perfil) {
				perfil_data::save($perfil,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==parametro_general_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
				$clases[]=new Classe(parametro_general_usuario::$class);

				$usuario->getParametroGeneralUsuario()->setId($usuario->getId());
		parametro_general_usuario_data::save($usuario->getParametroGeneralUsuario(),$this->connexion);

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==perfil_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(perfil_usuario::$class);

			foreach($usuario->getperfil_usuarios() as $perfilusuario) {
				$perfilusuario->setid_usuario($usuario->getId());
				perfil_usuario_data::save($perfilusuario,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==dato_general_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
				$clases[]=new Classe(dato_general_usuario::$class);

				$usuario->getDatoGeneralUsuario()->setId($usuario->getId());
		dato_general_usuario_data::save($usuario->getDatoGeneralUsuario(),$this->connexion);

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($usuario->gethistorial_cambio_claves() as $historialcambioclave) {
			$historialcambioclaveLogic= new historial_cambio_clave_logic($this->connexion);
			$historialcambioclave->setid_usuario($usuario->getId());
			historial_cambio_clave_data::save($historialcambioclave,$this->connexion);
			$historialcambioclaveLogic->deepSave($historialcambioclave,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($usuario->getresumen_usuarios() as $resumenusuario) {
			$resumenusuarioLogic= new resumen_usuario_logic($this->connexion);
			$resumenusuario->setid_usuario($usuario->getId());
			resumen_usuario_data::save($resumenusuario,$this->connexion);
			$resumenusuarioLogic->deepSave($resumenusuario,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($usuario->getauditorias() as $auditoria) {
			$auditoriaLogic= new auditoria_logic($this->connexion);
			$auditoria->setid_usuario($usuario->getId());
			auditoria_data::save($auditoria,$this->connexion);
			$auditoriaLogic->deepSave($auditoria,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($usuario->getperfils() as $perfil) {
			$perfilLogic= new perfil_logic($this->connexion);
			perfil_data::save($perfil,$this->connexion);
			$perfilLogic->deepSave($perfil,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}

					$parametrogeneralusuarioLogic= new parametro_general_usuario_logic($this->connexion);

				$usuario->getParametroGeneralUsuario()->setId($usuario->getId());
					parametro_general_usuario_data::save($usuario->getParametroGeneralUsuario(),$this->connexion);
					$parametrogeneralusuarioLogic->deepSave($usuario->getParametroGeneralUsuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);


		foreach($usuario->getperfil_usuarios() as $perfilusuario) {
			$perfilusuarioLogic= new perfil_usuario_logic($this->connexion);
			$perfilusuario->setid_usuario($usuario->getId());
			perfil_usuario_data::save($perfilusuario,$this->connexion);
			$perfilusuarioLogic->deepSave($perfilusuario,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}

					$datogeneralusuarioLogic= new dato_general_usuario_logic($this->connexion);

				$usuario->getDatoGeneralUsuario()->setId($usuario->getId());
					dato_general_usuario_data::save($usuario->getDatoGeneralUsuario(),$this->connexion);
					$datogeneralusuarioLogic->deepSave($usuario->getDatoGeneralUsuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==historial_cambio_clave::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($usuario->gethistorial_cambio_claves() as $historialcambioclave) {
					$historialcambioclaveLogic= new historial_cambio_clave_logic($this->connexion);
					$historialcambioclave->setid_usuario($usuario->getId());
					historial_cambio_clave_data::save($historialcambioclave,$this->connexion);
					$historialcambioclaveLogic->deepSave($historialcambioclave,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==resumen_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($usuario->getresumen_usuarios() as $resumenusuario) {
					$resumenusuarioLogic= new resumen_usuario_logic($this->connexion);
					$resumenusuario->setid_usuario($usuario->getId());
					resumen_usuario_data::save($resumenusuario,$this->connexion);
					$resumenusuarioLogic->deepSave($resumenusuario,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==auditoria::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($usuario->getauditorias() as $auditoria) {
					$auditoriaLogic= new auditoria_logic($this->connexion);
					$auditoria->setid_usuario($usuario->getId());
					auditoria_data::save($auditoria,$this->connexion);
					$auditoriaLogic->deepSave($auditoria,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==perfil::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($usuario->getperfils() as $perfil) {
					$perfilLogic= new perfil_logic($this->connexion);
					perfil_data::save($perfil,$this->connexion);
					$perfilLogic->deepSave($perfil,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==parametro_general_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
					$parametrogeneralusuarioLogic= new parametro_general_usuario_logic($this->connexion);

				$usuario->getParametroGeneralUsuario()->setId($usuario->getId());
					parametro_general_usuario_data::save($usuario->getParametroGeneralUsuario(),$this->connexion);
					$parametrogeneralusuarioLogic->deepSave($usuario->getParametroGeneralUsuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}

			if($clas->clas==perfil_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($usuario->getperfil_usuarios() as $perfilusuario) {
					$perfilusuarioLogic= new perfil_usuario_logic($this->connexion);
					$perfilusuario->setid_usuario($usuario->getId());
					perfil_usuario_data::save($perfilusuario,$this->connexion);
					$perfilusuarioLogic->deepSave($perfilusuario,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==dato_general_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
					$datogeneralusuarioLogic= new dato_general_usuario_logic($this->connexion);

				$usuario->getDatoGeneralUsuario()->setId($usuario->getId());
					dato_general_usuario_data::save($usuario->getDatoGeneralUsuario(),$this->connexion);
					$datogeneralusuarioLogic->deepSave($usuario->getDatoGeneralUsuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {



		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==historial_cambio_clave::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(historial_cambio_clave::$class);

			foreach($usuario->gethistorial_cambio_claves() as $historialcambioclave) {
				$historialcambioclaveLogic= new historial_cambio_clave_logic($this->connexion);
				$historialcambioclave->setid_usuario($usuario->getId());
				historial_cambio_clave_data::save($historialcambioclave,$this->connexion);
				$historialcambioclaveLogic->deepSave($historialcambioclave,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==resumen_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(resumen_usuario::$class);

			foreach($usuario->getresumen_usuarios() as $resumenusuario) {
				$resumenusuarioLogic= new resumen_usuario_logic($this->connexion);
				$resumenusuario->setid_usuario($usuario->getId());
				resumen_usuario_data::save($resumenusuario,$this->connexion);
				$resumenusuarioLogic->deepSave($resumenusuario,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==auditoria::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(auditoria::$class);

			foreach($usuario->getauditorias() as $auditoria) {
				$auditoriaLogic= new auditoria_logic($this->connexion);
				$auditoria->setid_usuario($usuario->getId());
				auditoria_data::save($auditoria,$this->connexion);
				$auditoriaLogic->deepSave($auditoria,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==perfil::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(perfil::$class);

			foreach($usuario->getperfils() as $perfil) {
				$perfilLogic= new perfil_logic($this->connexion);
				perfil_data::save($perfil,$this->connexion);
				$perfilLogic->deepSave($perfil,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==parametro_general_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
				$clases[]=new Classe(parametro_general_usuario::$class);
				$parametrogeneralusuarioLogic= new parametro_general_usuario_logic($this->connexion);

				$usuario->getParametroGeneralUsuario()->setId($usuario->getId());
				parametro_general_usuario_data::save($usuario->getParametroGeneralUsuario(),$this->connexion);
				$parametrogeneralusuarioLogic->deepSave($usuario->getParametroGeneralUsuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==perfil_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(perfil_usuario::$class);

			foreach($usuario->getperfil_usuarios() as $perfilusuario) {
				$perfilusuarioLogic= new perfil_usuario_logic($this->connexion);
				$perfilusuario->setid_usuario($usuario->getId());
				perfil_usuario_data::save($perfilusuario,$this->connexion);
				$perfilusuarioLogic->deepSave($perfilusuario,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==dato_general_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
				$clases[]=new Classe(dato_general_usuario::$class);
				$datogeneralusuarioLogic= new dato_general_usuario_logic($this->connexion);

				$usuario->getDatoGeneralUsuario()->setId($usuario->getId());
				dato_general_usuario_data::save($usuario->getDatoGeneralUsuario(),$this->connexion);
				$datogeneralusuarioLogic->deepSave($usuario->getDatoGeneralUsuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
}
			
			if($paraDeleteCascade) {				
				usuario_data::save($usuario, $this->connexion);
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
			
			$this->deepLoad($this->usuario,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->usuarios as $usuario) {
				$this->deepLoad($usuario,$isDeep,$deepLoadType,$clases);
								
				usuario_util::refrescarFKDescripciones($this->usuarios);
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
			
			foreach($this->usuarios as $usuario) {
				$this->deepLoad($usuario,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->usuario,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->usuarios as $usuario) {
				$this->deepSave($usuario,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->usuarios as $usuario) {
				$this->deepSave($usuario,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(historial_cambio_clave::$class);
				$classes[]=new Classe(resumen_usuario::$class);
				$classes[]=new Classe(auditoria::$class);
				$classes[]=new Classe(perfil::$class);
				$classes[]=new Classe(parametro_general_usuario::$class);
				$classes[]=new Classe(perfil_usuario::$class);
				$classes[]=new Classe(dato_general_usuario::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==historial_cambio_clave::$class) {
						$classes[]=new Classe(historial_cambio_clave::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==resumen_usuario::$class) {
						$classes[]=new Classe(resumen_usuario::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==auditoria::$class) {
						$classes[]=new Classe(auditoria::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==perfil::$class) {
						$classes[]=new Classe(perfil::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==parametro_general_usuario::$class) {
						$classes[]=new Classe(parametro_general_usuario::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==perfil_usuario::$class) {
						$classes[]=new Classe(perfil_usuario::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==dato_general_usuario::$class) {
						$classes[]=new Classe(dato_general_usuario::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==historial_cambio_clave::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(historial_cambio_clave::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==resumen_usuario::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(resumen_usuario::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==auditoria::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(auditoria::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==perfil::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(perfil::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==parametro_general_usuario::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(parametro_general_usuario::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==perfil_usuario::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(perfil_usuario::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==dato_general_usuario::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(dato_general_usuario::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getusuario() : ?usuario {	
		/*
		usuario_logic_add::checkusuarioToGet($this->usuario,$this->datosCliente);
		usuario_logic_add::updateusuarioToGet($this->usuario);
		*/
			
		return $this->usuario;
	}
		
	public function setusuario(usuario $newusuario) {
		$this->usuario = $newusuario;
	}
	
	public function getusuarios() : array {		
		/*
		usuario_logic_add::checkusuarioToGets($this->usuarios,$this->datosCliente);
		
		foreach ($this->usuarios as $usuarioLocal ) {
			usuario_logic_add::updateusuarioToGet($usuarioLocal);
		}
		*/
		
		return $this->usuarios;
	}
	
	public function setusuarios(array $newusuarios) {
		$this->usuarios = $newusuarios;
	}
	
	public function getusuarioDataAccess() : usuario_data {
		return $this->usuarioDataAccess;
	}
	
	public function setusuarioDataAccess(usuario_data $newusuarioDataAccess) {
		$this->usuarioDataAccess = $newusuarioDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        usuario_carga::$CONTROLLER;;        
		
		//REL DETALLES
		
		auditoria_detalle_logic::$logger;
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
