
<script id="sistema_resumen_template" type="text/x-handlebars-template">


<div id="divTablaDatosAuxiliarsistemasAjaxWebPart" style="width:100%;height:100%;overflow:auto;">

{{#each sistemasReporte}}

			<table id="tablesistema{{id}}" {{../strAuxStyleBackgroundTablaPrincipal}} width="{{../strTamanioTablaPrincipal}}" align="center" cellspacing="0" cellpadding="0" border="{{../borderValue}}">
						
				<tr>
					<td align="center" {{../strAuxStyleBackgroundTitulo}} >
						<p class="tituloficha">
							<b>{{strtoupper nombre_principal}}</b>
						</p>
					</td>
				</tr>
			
				

			{{#if (existeCadenaArrayOrderBy 'Codigo' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Codigo</b>
								</td>
								<td>{{trim codigo}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}

			{{#if (existeCadenaArrayOrderBy 'Nombre Principal' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Nombre Principal</b>
								</td>
								<td>{{trim nombre_principal}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}

			{{#if (existeCadenaArrayOrderBy 'Nombre Secundario' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Nombre Secundario</b>
								</td>
								<td>{{trim nombre_secundario}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}

			{{#if (existeCadenaArrayOrderBy 'Estado' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Estado</b>
								</td>
								<td>{{ getCheckBox estado 'none' true}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}
				
			</table>
{{/each}}
				
				
	{{#if paraReporte}}			
			
				<table>
					<tr>
						<td>
							<input type="button" onclick="{{proceso_print}}" style="visibility:visible" value="Imprimir" />
						</td>
					</tr>
				</table>
	{{/if}}
	
</div>


</script>

