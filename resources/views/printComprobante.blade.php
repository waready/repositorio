<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Example 2</title>
    
    	
        <!--link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" /-->

        
        <link href="assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        
        <link href="assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        
        <link href="assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />

        <style type="text/css">

        p {
  font-family: courier;
}
        </style>

  </head>
  <body>
 
    <main>
      <div id="details" class="clearfix">
        <div id="invoice">

        	<table>
        		<thead>
	            <tr>
	                <th> <img src="img/cip.png" alt="logo" class="logo-default" height="80"  /></th>
	                <th> <H3>COLEGIO DE INGENIEROS DEL PERU - SEDE PUNO </H3></th>
	                
	            </tr>
	        </thead>
        	</table>

        	<table>
        		<thead>
        		<tr>
        			<td> Nro. Recibo: </td>
	                <td> {{$colegiado[0]->nroRecibo}}</td>
	                <td> Fecha: </td>
	                <td> {{$colegiado[0]->fechaCreacion}}</td>
        		</tr>
	            	
	        </thead>
        	</table>

			<table>
        		<thead>
        		<tr>
        			<td colspan="3"> Detalle del Pago </td>
	                <td> </td>
	                <td> </td>
	                <td> </td>
        		</tr>
        		<tr>
        			<td> Nombre: </td>
	                <td> {{$colegiado[0]->name}} </td>
	                <td> Codigo CIP:</td>
	                <td> {{$colegiado[0]->codigoCIP}}</td>
        		</tr>
	            	
	        </thead>
        	</table>        	
        
        </div>
      </div>
      <div class="table-scrollable">
	    <table class="table table-hover">
	        <thead>
	            <tr>
	                <th> Periodo</th>
	                <th> Concepto</th>
	                <th> Total </th>
	            </tr>
	        </thead>
	        <tbody>
	            @foreach($pagos as $pago)
	            	<tr>
	            		<td>{{$pago->periodoPago}}</td>
	            		<td>{{$pago->conceptoPago}}</td>
	            		<td>{{number_format($pago->montoPago, 2, '.', '')}}</td>
	            	</tr>
	            @endforeach
	            	<tr>
	            		<td></td>
	            		<td></td>
	            		<td><b>{{number_format($colegiado[0]->total, 2, '.', '')}}</b></td>
	            	</tr>
	        </tbody>
	    </table>
	</div>
  </body>
</html>