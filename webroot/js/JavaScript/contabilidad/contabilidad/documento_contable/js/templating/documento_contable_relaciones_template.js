
<script id="documento_contable_relaciones_template" type="text/x-handlebars-template">


<form id="frmAccionesRelacionesdocumento_contable" name="frmAccionesRelacionesdocumento_contable">
	<table class="elementos">
		
		<tr id="trdocumento_contableAccionesRelaciones" class="elementos" style="display:table-row">
			<td>
				<table id="tblAccionesRelacionesdocumento_contable" width="50%" align="left">
		
				

		
		<tr>
			<td class="titulocampo">
				<label class="form-label">Asiento_ORIGENs<label>
			</td>
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img id="imgdivrelacionasiento" name="imgdivrelaciondivasiento" idactualdocumento_contable="{{id}}" title="AsientoS DE Documento Contable" src="{{PATH_IMAGEN}}/Imagenes/asientos.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		</tr>

		
		<tr>
			<td class="titulocampo">
				<label class="form-label">Asiento Predefinidos<label>
			</td>
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img id="imgdivrelacionasiento_predefinido" name="imgdivrelaciondivasiento_predefinido" idactualdocumento_contable="{{id}}" title="Asiento PredefinidoS DE Documento Contable" src="{{PATH_IMAGEN}}/Imagenes/asiento_predefinidos.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		</tr>
						
				</table>
			</td>
		</tr>
		
	</table>
</form>



</script>

