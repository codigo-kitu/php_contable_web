<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\business\entity;

use Exception;

class GeneralEntitySessionBean {
	  
	/*GENERAL*/
	public bool $bitPermiteNavegacionHaciaFKDesde=false;
	public string $strPermiteRecargarInformacion='display:none';
	public ?string $strNombrePaginaNavegacionHaciaFKDesde=null;
	public bool $bitBusquedaDesdeFKSesionFK=false;
	public ?int $bigIdActualFK=0;	
	public ?int $bigIdActual=0;	
	
	public ?int $bigIdActualFKParaPosibleAtras=0;
	public bool $bitBusquedaDesdeFKSesionFKParaPosibleAtras=false;
	public ?string $strUltimaBusqueda=null;
	public ?string $strServletGenerarHtmlReporte=null;
	
	public int $intNumeroPaginacion=0;
	public int $intNumeroPaginacionPagina=0;
	
	public string $strPathNavegacionActual='';	
	public bool $bitPaginaPopup=false;	
	public string $strPermisoReporte='none';
	public string $strStyleDivHeader='';	
	public string $strStyleDivArbol='';	
	public string $strStyleDivContent='';
	public string $strStyleDivOpcionesBanner='';	
	public string $strStyleDivExpandirColapsar='';	
	
	public string $strFuncionBusquedaRapida='';
	
	public bool $conGuardarRelaciones=false;
	public bool $estaModoGuardarRelaciones=false;
	public bool $esGuardarRelacionado=false;
	public bool $estaModoBusqueda=false;
	public bool $noMantenimiento=false;
	public string $strFuncionJsPadre='';

	public bool $bitEsPopup=false;
	public bool $bitEsBusqueda=false;
	public bool $bitEsRelaciones=false;
	public bool $bitEsRelacionado=false;

	public string $strFuncionJs='';
	
	public string $strTypeOnLoad='';
	public string $strTipoPaginaAuxiliar='';
	public string $strTipoUsuarioAuxiliar='';

	function __construct () {		
		
		try	{

			$this->bitPermiteNavegacionHaciaFKDesde=false;		
			$this->strNombrePaginaNavegacionHaciaFKDesde='';
			$this->bitBusquedaDesdeFKSesionFK=false;
			$this->bigIdActualFK=0;
			$this->bigIdActualFKParaPosibleAtras=0;
			$this->bitBusquedaDesdeFKSesionFKParaPosibleAtras=false;
			$this->strUltimaBusqueda ='';
			$this->strServletGenerarHtmlReporte='';
			
			$this->strFuncionBusquedaRapida='';
			
			$this->conGuardarRelaciones=false;
			$this->estaModoGuardarRelaciones=false;
			$this->esGuardarRelacionado=false;
			$this->estaModoBusqueda=false;
			$this->noMantenimiento=false;
			$this->strFuncionJsPadre='';
			 
			$this->intNumeroPaginacionPagina=0;
			$this->strPathNavegacionActual='';
			
			$this->strStyleDivHeader='display:table-row';
			
		} catch(Exception $e) {
			//Funciones->manageException(logger,e);
			throw $e;
		}	 
	} 		
	
	public function setPaginaPopupVariables(bool $bitPopupVariables) {
		/*NO ENTIENDO PORQUE*/
		if($bitPopupVariables==true) {
			/*if($this->bitPaginaPopup==false) {*/
				$this->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';
				$this->strStyleDivContent='width:93%;height:100%';
				$this->strStyleDivOpcionesBanner='display:none';
				$this->strStyleDivExpandirColapsar='display:none';
				$this->bitPaginaPopup=true;								
			/*}*/
		} else {
			/*if($this->bitPaginaPopup==true) {*/
				$this->strStyleDivArbol='display:table-row';	
				$this->strStyleDivContent='height:600px';
				$this->strStyleDivOpcionesBanner='display:table-row';
				$this->strStyleDivExpandirColapsar='display:table-row';
				$this->bitPaginaPopup=false;				
			/*}*/
		}
	}
	
	public function setPaginaPopupVariablesIFrame() {
		$this->strStyleDivArbol='display:none';
		$this->strStyleDivHeader='display:none';
		$this->strStyleDivContent='width:100%;height:100%';
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