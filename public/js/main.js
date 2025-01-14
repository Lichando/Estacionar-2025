$(document).ready(function() { 
  /*search*/
  if ($('#inputBuscar').length > 0) {
    $('#inputBuscar').select();
  }

  $('#inputBuscar').focus(function(event) {
    $('#inputBuscar').select();
  });


  /*main*/
  $('.sub-menu-li>a').click(function(event) {
    return false;
  });

  var categoria = 0;
  $('#menu-v-categoria>a').click(function(event) {
    if (categoria == 0) {
      $('#categoria').css('height', 'initial');
        categoria = 1;
    }else{
       var temp_height = $('#menu-v-categoria>a').height();
       temp_height = temp_height + 30;
        $('#categoria').css('height', temp_height);
        categoria = 0;
    } 
    return false; 
  });


  /*res menu */
    var deploy = 0;
    $('#res-menu-icon').click(function(e) {
        if (deploy == 0) {
          $('.menu-container').css('display', 'block');

          $('#bars-menu').removeClass('fas fa-bars');
          $('#bars-menu').addClass('far fa-window-close');

            deploy = 1;
        }else{
          $('.menu-container').removeAttr("style");
            deploy = 0;
          $('#bars-menu').addClass('fas fa-bars');
          $('#bars-menu').removeClass('far fa-window-close');
        }
    });

    $('#menu-container').click(function(e) {
        if (deploy == 0) {
          $('.menu-container').css('display', 'block');
          $('#bars-menu').removeClass('fas fa-bars');
          $('#bars-menu').addClass('far fa-window-close');
            deploy = 1;
        }else{
          $('.menu-container').removeAttr("style");
          $('#bars-menu').addClass('fas fa-bars');
          $('#bars-menu').removeClass('far fa-window-close');
            deploy = 0;
        }
    });

  //Efecto de placeholder con label para input
  $('.input_group>input').change(function() {
    if($.trim($(this).val())==''){
        $(this).attr('data-value', '');
    }else{
      $(this).attr('data-value', 'true');
    }
  });

  //Efecto de placeholder con label para textarea input
  $(".input_textarea").on('input',function(e){
    if(e.target.value != ''){
      $(this).attr('data-value', 'true');
    }else{
      $(this).attr('data-value', '');
    }
  });

  //fin efecto inputs




/*single_producto_galery*/
  var anchoMiniaturas = 0;
  var anchoIndividual = 0;
  $('.miniaturas_galery').find('li').each(function( index ) {
    anchoIndividual = 0;
    anchoIndividual = parseInt($( this ).width()) + (parseInt($( this ).width())*0.1);
    anchoMiniaturas = anchoMiniaturas+ anchoIndividual;
    $(this).css('width', $(this).width());

    $(this).click(function(event) {
      $('.single_producto_unit img').attr('src', $(this).find('img').attr('rel'));
      $('.single_producto_unit > img').attr('onclick', "producto_imgPreview('"+$(this).find('img').attr('rel')+"')");
      $('.miniaturas_galery li').removeClass('miniaturaActive');
      $(this).addClass('miniaturaActive');
    });
  });
  $('.miniaturas_galery').css('width', anchoMiniaturas);


  var avanceMiniaturas = 0;
  var posiCionMiniatura = 0;
  $('#next_galery>i').click(function(event) {
    avanceMiniaturas = avanceMiniaturas + (anchoIndividual-6);
    posiCionMiniatura++;
    $('.miniaturas_galery').animate({
      left: (avanceMiniaturas*-1),
      }, 100, function() {
        // Animation complete.
      });
  });

  $('#prev_galery>i').click(function(event) {
    if (posiCionMiniatura>0) {
      avanceMiniaturas = (parseInt($('.miniaturas_galery').css('left'))+anchoIndividual-6);
      posiCionMiniatura--;
      $('.miniaturas_galery').animate({
        left: (avanceMiniaturas),
        }, 100, function() {
          // Animation complete.
        });
    }
  });


var tablaGeneric = document.querySelectorAll(".generic-table");

// Iterar sobre cada tabla
tablaGeneric.forEach(function(table) {
    // Obtener todas las celdas en la primera columna de la tabla
    var cellsGeneric = table.querySelectorAll("td:first-child");

    // Encontrar la longitud máxima de texto en la primera columna
    var maxLength = 0;
    cellsGeneric.forEach(function(cell) {
        var cellTextLength = cell.innerText.length;
        if (cellTextLength > maxLength) {
            maxLength = cellTextLength;
        }
    });

    // Aplicar el ancho máximo a todas las celdas en la primera columna
    cellsGeneric.forEach(function(cell) {
        cell.style.width = maxLength + "ch"; // "ch" es una unidad de medida que representa el ancho del carácter "0"
    });
});

});

/*notification*/
  function notificacion(msg, clase, delay, id){
    if ($.isArray(msg)) {
      var notificationElement = new Array();

      for (var i = 0; i < msg.length; i++) {
        // alert(msg[i]);
        notificationElement[i] = '<div id="notificacion_'+i+'" class="notificacion '+clase+' notifx"><span id="cerrar_noti_'+i+'" class="cerrar-noti"><i class="far fa-times-circle"></i></span><p>'+ msg[i]+'</p></div>';
        notificacion_set(i,delay,notificationElement[i]);
      }

    }else{    
      var notificationElement = '<div id="notificacion_'+id+'" class="notificacion '+clase+' notifx"><span id="cerrar_noti_'+id+'" class="cerrar-noti"><i class="far fa-times-circle"></i></span><p>'+msg+'</p></div>';
      setTimeout(function() {
        notificacion_set(id,delay,notificationElement);
      }, delay);
    } 
  }

  function notificacion_set(id, delay, notificationElement){
      $('.notificacion-area').append(notificationElement);
      $('#cerrar_noti_'+id).click(function() {
        $('#notificacion_'+id).hide(400);
      });

      setTimeout(function() {
        $('#notificacion_'+id).hide(400, function() {
          $('#notificacion_'+id).remove();
        });
      }, delay+5000);
  }
  /*end notification*/


/* producto img preview */
function producto_imgPreview(linkImg){
    $('.previewGalery').css('display', 'flex');
    $('.previewImg>#img-container').css('background-image', 'url("'+linkImg+'")');
}

function producto_imgPreviewClose(){
    $('.previewGalery').css('display', 'none');
}
/*end vista previda de imagen en click*/


/*back*/
function goBack() {
  window.history.back();
}

