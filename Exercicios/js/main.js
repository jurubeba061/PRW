	$(document).ready(function(){
      //side nav do materialize
        $(".button-collapse").sideNav();
        num1 = null;
        num2 = null;
    		
        $('.poltrona').click(function(){
          //verifica se a poltrona está reservada
          if($(this).hasClass('reservado')) {
              Materialize.toast("Já está reservado",1000);
          }
          //verifica se a poltrona foi selecionada 
    			else if($(this).hasClass('check')) {

    				$(this).css('color','#b71c1c');
    				$(this).removeClass('check');
    			}
    			else{
            //muda a cor da poltrona e adiciona a classe check para mostrar que ela foi escolhida
    				$(this).css('color','#00897b');
    				$(this).addClass('check');
            //pega as coordenadas da poltrona
    				num1 = $(this).data('valor1');
    				num2 = $(this).data('valor2');
    			}
    			
    		});

        $('form').submit(function(){
          //verifica quais poltronas tem a classe check se houver adiciona a classe reservado
          if($('a').hasClass('check')){
            $('.check').addClass('reservado');
          //faz uma requisição ajax enviando as coordenadas da poltrona
            $.ajax({
              type: 'POST',
              url:  'reservar.php',
              data:{valor1: num1, valor2: num2}
            }).done(function(resp){
              //resposta da requisição ajax
              Materialize.toast(resp, 3000);
              
            });
            //serve para não recarregar a pagina
            return false;
        }
        else{
          //se nenhuma poltrona tem a classe check emite o alerta para selecionar um assento e não
          //faz a requisição ajax
          alert("Escolha um assento!");
        }
        
        });


    	});