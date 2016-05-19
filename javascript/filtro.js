/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//<![CDATA[

$(window).load(function(){
// Con estas 3 lÃ­neas sobreescribimos el Constains para que no sea case sensitive pues por default en jquery  viene con case sensitive. Si no lo pones, queda como Case sensitive
        $.expr[':'].Contains = function(x, y, z){
                return jQuery(x).text().toLowerCase().indexOf(z[3].toLowerCase())>=0;
        };

        // cada que escribamos, vamos a revisar lo que hay escrito 
        $('#search_string').keyup(function() 
        {
                //tomamos el valor que tiene el input
                var search = $('#search_string').val();
                //mostramos todos los valores, para despues ir ocultando los que no coinciden
                $('#municipios tr').show();

                //esto es para revisar si tenemos algo que buscar, sino, que no lo haga.
                if(search.length>0)
                {
                        // con la clase .nombre le decimos en cual de las celdas buscar y si no coincide, ocultamos el tr que contiene a esa celda. 
                        $("#municipios tr td.nombre").not(":Contains('"+search+"')").parent().hide();
                }

        });

	// para región
        $('#search_string2').keyup(function() 
        {
                //tomamos el valor que tiene el input
                var search = $('#search_string2').val();
                //mostramos todos los valores, para despues ir ocultando los que no coinciden
                $('#municipios tr').show();

                //esto es para revisar si tenemos algo que buscar, sino, que no lo haga.
                if(search.length>0)
                {
                        // con la clase .nombre le decimos en cual de las celdas buscar y si no coincide, ocultamos el tr que contiene a esa celda. 
                        $("#municipios tr td.region").not(":Contains('"+search+"')").parent().hide();
                }

        });

	// para piso
        $('#search_string3').keyup(function() 
        {
                //tomamos el valor que tiene el input
                var search = $('#search_string3').val();
                //mostramos todos los valores, para despues ir ocultando los que no coinciden
                $('#municipios tr').show();

                //esto es para revisar si tenemos algo que buscar, sino, que no lo haga.
                if(search.length>0)
                {
                        // con la clase .nombre le decimos en cual de las celdas buscar y si no coincide, ocultamos el tr que contiene a esa celda. 
                        $("#municipios tr td.piso").not(":Contains('"+search+"')").parent().hide();
                }

        });
});//]]>


