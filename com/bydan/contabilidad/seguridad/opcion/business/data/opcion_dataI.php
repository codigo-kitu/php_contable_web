<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\seguridad\opcion\business\data;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\FuncionesSql;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\data\GetEntitiesDataAccessHelper;

/*use com\bydan\framework\contabilidad\business\entity\GeneralEntity;*/
use com\bydan\framework\contabilidad\business\entity\DatoGeneral;
use com\bydan\framework\contabilidad\business\entity\DatoGeneralMinimo;
use com\bydan\framework\contabilidad\business\entity\DatoGeneralMaximo;
use com\bydan\framework\contabilidad\business\logic\QueryWhereSelectParameters;
use com\bydan\framework\contabilidad\business\logic\Pagination;
use com\bydan\framework\contabilidad\business\data\DataAccessHelper;
use com\bydan\framework\contabilidad\util\Connexion;
use com\bydan\framework\contabilidad\util\ParametersType;

use com\bydan\contabilidad\seguridad\opcion\business\entity\opcion;

//FK


use com\bydan\contabilidad\seguridad\sistema\business\data\sistema_data;
use com\bydan\contabilidad\seguridad\sistema\business\entity\sistema;

use com\bydan\contabilidad\seguridad\grupo_opcion\business\data\grupo_opcion_data;
use com\bydan\contabilidad\seguridad\grupo_opcion\business\entity\grupo_opcion;

use com\bydan\contabilidad\seguridad\modulo\business\data\modulo_data;
use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;

//REL

use com\bydan\contabilidad\seguridad\perfil\business\data\perfil_data;
use com\bydan\contabilidad\seguridad\accion\business\data\accion_data;
use com\bydan\contabilidad\seguridad\perfil_opcion\business\data\perfil_opcion_data;
use com\bydan\contabilidad\seguridad\campo\business\data\campo_data;


interface opcion_dataI {	
	
	/*MANTENIMIENTO*/
	public static function save(opcion $opcion,Connexion $connexion);	
	public static function savePrepared(opcion $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures);	
	public static function insert(opcion $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures);	
	public static function update(opcion $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures);	
	public static function delete(opcion $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures);
	
	/*EJECUTAR QUERY*/
	public function executeQuery(Connexion $connexion, string $sQueryExecute);	
	public function executeQueryValor(Connexion $connexion, string $sQueryExecuteValor,string $sNombreCampo);
	
	/*TRAER ENTITY*/
	public function getEntity(Connexion $connexion, ?int $id) : ?opcion;	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?opcion;
	 
	/*TRAER ENTITIES*/
	public function getEntities(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : array;	
	public function getEntitiesConnexionQuerySelectQueryWhere(Connexion $connexion,string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) : array;	
	public function getEntitiesSimpleQueryBuild(Connexion $connexion,string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) : array;
	
	/*----------------------- SELECT COUNT ------------------------*/	
	public function getCountSelect(Connexion $connexion) : int;	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,opcion $entity,Connexion $connexion);
		
	/*-------------------------------- AUXILIARES --------------------------------*/	
	public function getEntityBaseResult(string $strPrefijo,opcion $entity,$resultSet) : opcion;	
	public static function addPrepareStatementParams(string $type,opcion $opcion,$prepare_statement,Connexion $connexion);	
	public static function getPrepareStatementParamsArray(string $type,opcion $opcion,$prepare_statement,Connexion $connexion) : array;	
	public static function preparedQuery(string $sql,array $params) : string;
	
}
?>
