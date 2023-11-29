
 
function listar_campo(id_deregistro){
    //alert(id_deregistro);
    //alert("de listar campos js");
    $.ajax({
        //url:'view/controlador_listar_campo.php',  //JCV HAY QUE PONER DESDE LA CARPETA DONDE ESTA AUNQUE SEA OTRA RUTA
        url:'controller/Listarcampo_controller.php',  //JCV HAY QUE PONER DESDE LA CARPETA DONDE ESTA AUNQUE SEA OTRA RUTA
        type:'POST',
        data:{
            id_deregistro:id_deregistro
        }
    }).done(function(resp){
        var data = JSON.parse(resp);
        var cadena="";
        var cadena2="";
        var cadenaid=0;
        var cadenaidacumulativa=0;
        if(data.length>0){
            for (var i =0; i < data.length; i++) {
                
                cadena2 +=data[i][5]; //JCV PARA OTRO CAMPO (NOMBRE_ACUMULATIVA)
                cadena +=data[i][6]; ///JCV PARA LISTAR EL PRIMER CAMPO o es el primer campo, 1 el segundo y asi sucesivamente EN ESTE CASO: NATURALEZA
                cadenaid +=data[i][0]; //JCV PARA OTRO CAMPO (id_deregistro)
                cadenaidacumulativa+= data[i][4]; //JCV PARA id_acumulativa
            }
            //alert('de listar campos acumulativa naturaleza variable:  '+cadena);
            $("#txtAcumulativa").val(cadena2);
            
            $("#txtNaturaleza").val(cadena);
           // var natu = $("#txtNaturaleza").val();
             
            //alert('de listar campos. naturaleza campo despues de aignar valor:  '+ natu);
            $("#txtidderegistroR").val(cadenaid);
            //var idprovincia = $("#sel_provincia").val();
            //listar_distrito(idprovincia);
            
            $("#txtidacumulativa").val(cadenaidacumulativa);
            
        }else{
            cadena +="nO SE ENCONTRARON REGISTROS";
            $("#txtNaturaleza").val(cadena);
        }
        
       
        
        //alert(cadena);
    })
}


function listar_cuentadeBancos(id_debancos){
    //alert(id_deregistro);
    //alert("de listar campos js");
    $.ajax({
        //url:'view/controlador_listar_campo.php',  //JCV HAY QUE PONER DESDE LA CARPETA DONDE ESTA AUNQUE SEA OTRA RUTA
        url:'controller/Listarcuentadebancos_controller.php',  //JCV HAY QUE PONER DESDE LA CARPETA DONDE ESTA AUNQUE SEA OTRA RUTA
        type:'POST',
        data:{
            id_debancos:id_debancos
        }
    }).done(function(resp){
        var data = JSON.parse(resp);
        //var cadena="";
        //var cadena2="";
        var cadenaid=0;
        if(data.length>0){
            for (var i =0; i < data.length; i++) {
                
               // cadena2 +=data[i][5]; //JCV PARA OTRO CAMPO (NOMBRE_ACUMULATIVA)
                //cadena +=data[i][6]; ///JCV PARA LISTAR EL PRIMER CAMPO o es el primer campo, 1 el segundo y asi sucesivamente EN ESTE CASO: NATURALEZA
                cadenaid +=data[i][0]; //JCV PARA OTRO CAMPO (id_deregistro)
            }
            //alert('de listar campos acumulativa:  '+cadena2);
            //$("#txtAcumulativa").val(cadena2);
            //$("#txtNaturaleza").val(cadena);
            $("#txtiddebancosL").val(cadenaid);
            //var idprovincia = $("#sel_provincia").val();
            //listar_distrito(idprovincia);
        }else{
            cadenaid +="nO SE ENCONTRARON REGISTROS";
            $("#txtiddebancosL").val(cadenaid);
        }
        
       
        
        //alert(cadena);
    })
}










