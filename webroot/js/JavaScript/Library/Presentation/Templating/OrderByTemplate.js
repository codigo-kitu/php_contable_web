<script id="orderby_template" type="text/x-handlebars-template">

	<form id="frmOrderBy" name="frmOrderBy">
		<table>
			<tr>
				<td>
					<span class="busquedatitulocampo">ORDEN</span>
					<input id="to-paraorden_orderby" name="to-paraorden_orderby" type="checkbox"></input>
				</td>
				
				<td>
					<span class="busquedatitulocampo">REPORTE</span>
					<input id="to-parareporte_orderby" name="to-parareporte_orderby" type="checkbox"></input>
				</td>
			</tr>
			
		</table>
			
		<input type="hidden" id="to-maxima_fila_orderby" name="to-maxima_fila_orderby" value="{{this.arrOrderBy.length}}"/>
		<!-- <span class="titulotabla">ORDEN</span> -->
		
		<table cellpadding="0" cellspacing="3">
	
			<tr class="cabeceratabla">
				<th><b><pre>ID</pre></th>
				<th><b><pre>SEL</pre></th>
				<th><b><pre>NOMBRE</pre></th>
				<th><b><pre>ES DESC</pre></th>
			</tr>
			
		 {{#each this.arrOrderBy}}
			
			<tr class="{{class}}" onmouseover="funcionGeneral.activarFilaTabla(this);" onmouseout="funcionGeneral.desactivarFilaTabla(this,\'{{class}}\');">			
				<td>
					{{i}}
				</td>			
				<td>
					<input id="to-issel_{{i}}" name="to-issel_{{i}}" type="checkbox">{{i}}</input>
				</td>			
				<td> 
					{{nombre}}
				</td>
				<td>
					<input id="to-esdesc_{{i}}" name="to-esdesc_{{i}}" type="checkbox"></input>
				</td>			
			</tr>
				
		 {{/each}}
			
		</table>
		
	</form>
	
</script>