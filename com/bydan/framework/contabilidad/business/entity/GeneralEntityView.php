<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\business\entity;

use Exception;

/*
 PROCESO:
 1.-Con CONADDIT_VIEW=true, en la descripcion de la Tabla(Se adiciona View y JavaScript).
 2.-Adicionar Funciones según necesidades(Sobrecarga), primero aqui GeneralEntityView.
 3.-Segun requerimientos se debe modificar Templates con condicion. if(blnConAdditionalView)
*/

class GeneralEntityView {
	
	function __construct () {	
	    
		try	{
			
			
		} catch(Exception $e) {
			//Funciones->manageException(logger,e);
			throw $e;
		}	 
	} 		
	
//BYDAN_ADDITIONAL

//BYDAN_ADDITIONAL_FIN

//import com->bydan->erp->puntoventa->business->dataaccess->MesaDataAccess;
//import com->bydan->erp->puntoventa->business->entity->Mesa;
//import com->bydan->erp->puntoventa->business->logic->MesaLogic;
//import com->bydan->framework->ConstantesCommon;
//import com->bydan->framework->erp->business->logic->DatosCliente;
//import com->bydan->framework->erp->business->logic->DatosDeep;
//import com->bydan->framework->erp->util->Connexion;
//import com->bydan->framework->erp->util->ConnexionType;
//import com->bydan->framework->erp->util->Constantes;
//import com->bydan->framework->erp->util->Funciones;
//import com->bydan->framework->erp->util->ParameterDbType;

}
?>