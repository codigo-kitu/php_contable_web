<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\business\data;

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

use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\business\entity\estado_deposito_retiro;

//FK


//REL



interface estado_deposito_retiro_dataI {	
	
	/*MANTENIMIENTO*/
	public static function save(estado_deposito_retiro $estado_deposito_retiro,Connexion $connexion);	
	public static function savePrepared(estado_deposito_retiro $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures);	
	public static function insert(estado_deposito_retiro $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures);	
	public static function update(estado_deposito_retiro $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures);	
	public static function delete(estado_deposito_retiro $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures);
	
	/*EJECUTAR QUERY*/
	public function executeQuery(Connexion $connexion, string $sQueryExecute);	
	public function executeQueryValor(Connexion $connexion, string $sQueryExecuteValor,string $sNombreCampo);
	
	/*TRAER ENTITY*/
	public function getEntity(Connexion $connexion, ?int $id) : ?estado_deposito_retiro;	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?estado_deposito_retiro;
	 
	/*TRAER ENTITIES*/
	public function getEntities(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : array;	
	public function getEntitiesConnexionQuerySelectQueryWhere(Connexion $connexion,string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) : array;	
	public function getEntitiesSimpleQueryBuild(Connexion $connexion,string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) : array;
	
	/*----------------------- SELECT COUNT ------------------------*/	
	public function getCountSelect(Connexion $connexion) : int;	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,estado_deposito_retiro $entity,Connexion $connexion);
		
	/*-------------------------------- AUXILIARES --------------------------------*/	
	public function getEntityBaseResult(string $strPrefijo,estado_deposito_retiro $entity,$resultSet) : estado_deposito_retiro;	
	public static function addPrepareStatementParams(string $type,estado_deposito_retiro $estado_deposito_retiro,$prepare_statement,Connexion $connexion);	
	public static function getPrepareStatementParamsArray(string $type,estado_deposito_retiro $estado_deposito_retiro,$prepare_statement,Connexion $connexion) : array;	
	public static function preparedQuery(string $sql,array $params) : string;
	
}
?>
