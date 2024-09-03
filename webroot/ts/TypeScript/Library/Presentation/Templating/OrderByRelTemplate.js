<script id="orderby_rel_template" type="text/x-handlebars-template">

<form id="frmOrderByRel" name="frmOrderByRel">

	<table>
	
		<tr>
		    <!-- <td><span class="busquedatitulocampo">ORDEN</span><input id="tor-paraorden_orderbyrel" name="tor-paraorden_orderbyrel" type="checkbox"></input></td> -->
			<td>
				<span class="busquedatitulocampo">REPORTE</span>
				<input id="tor-parareporte_orderbyrel" name="tor-parareporte_orderbyrel" type="checkbox"></input>
			</td>
		</tr>
		
	</table>
		
		<input type="hidden" id="tor-maxima_fila_orderbyrel" name="tor-maxima_fila_orderbyrel" value="{{this.arrOrderByRel.length}}"/>
		
		<table cellpadding="0" cellspacing="3">

			<tr class="cabeceratabla">
				<th><b><pre>ID</pre></th>
				<th><b><pre>SEL</pre></th>
				<th><b><pre>NOMBRE</pre></th>
		        <!-- <th><b><pre>ES DESC</pre></th> -->
			</tr>
			
		 {{#each this.arrOrderByRel}}
						
			<tr class="{{class}}" onmouseover="funcionGeneral.activarFilaTabla(this);" onmouseout="funcionGeneral.desactivarFilaTabla(this,\'{{class}}\');">
			
				<td>
					{{i}}
				</td>
				
				<td>
			    	<input id="tor-issel_{{i}}" name="tor-issel_{{i}}" type="checkbox">{{i}}</input>
				</td>
				
				<td> 
					{{nombre}}
				</td>
				 <!-- <td><input id="tor-esdesc_{{i}}" name="tor-esdesc_{{i}}" type="checkbox"></input></td>'; -->
			</tr>
							
		 {{/each}}
		
		</table>
				
</form>

</script>