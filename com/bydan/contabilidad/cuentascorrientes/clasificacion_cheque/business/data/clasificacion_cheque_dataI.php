<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\business\data;

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

use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\business\entity\clasificacion_cheque;

//FK


use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\business\data\cuenta_corriente_detalle_data;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\business\entity\cuenta_corriente_detalle;

use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\business\data\categoria_cheque_data;
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\business\entity\categoria_cheque;

//REL



interface clasificacion_cheque_dataI {	
	
	/*MANTENIMIENTO*/
	public static function save(clasificacion_cheque $clasificacion_cheque,Connexion $connexion);	
	public static function savePrepared(clasificacion_cheque $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures);	
	public static function insert(clasificacion_cheque $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures);	
	public static function update(clasificacion_cheque $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures);	
	public static function delete(clasificacion_cheque $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures);
	
	/*EJECUTAR QUERY*/
	public function executeQuery(Connexion $connexion, string $sQueryExecute);	
	public function executeQueryValor(Connexion $connexion, string $sQueryExecuteValor,string $sNombreCampo);
	
	/*TRAER ENTITY*/
	public function getEntity(Connexion $connexion, ?int $id) : ?clasificacion_cheque;	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?clasificacion_cheque;
	 
	/*TRAER ENTITIES*/
	public function getEntities(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : array;	
	public function getEntitiesConnexionQuerySelectQueryWhere(Connexion $connexion,string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) : array;	
	public function getEntitiesSimpleQueryBuild(Connexion $connexion,string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) : array;
	
	/*----------------------- SELECT COUNT ------------------------*/	
	public function getCountSelect(Connexion $connexion) : int;	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,clasificacion_cheque $entity,Connexion $connexion);
		
	/*-------------------------------- AUXILIARES --------------------------------*/	
	public function getEntityBaseResult(string $strPrefijo,clasificacion_cheque $entity,$resultSet) : clasificacion_cheque;	
	public static function addPrepareStatementParams(string $type,clasificacion_cheque $clasificacion_cheque,$prepare_statement,Connexion $connexion);	
	public static function getPrepareStatementParamsArray(string $type,clasificacion_cheque $clasificacion_cheque,$prepare_statement,Connexion $connexion) : array;	
	public static function preparedQuery(string $sql,array $params) : string;
	
}
?>
