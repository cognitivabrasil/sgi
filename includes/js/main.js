$(document).ready(function(){

  $('map').imageMapResize();

  /*Empreendimentos*/
  $('#add_produto').click(function(){
      $('#produtos_container').append('<hr><input type="text" name="nome_produto[]" placeholder="Nome"><textarea name="descricao_produto[]" placeholder="Descrição" style="clear:both; width:70%; height:150px;"></textarea>');
  });
  $('#add_contrato').click(function(){
      $('#contrato_container').append('<hr><input type="date" name="assinatura_contrato[]" placeholder="Data de assinatura"><label for="contrato" style="margin-left:5px; font-weight:normal;">Contrato: </label><input type="file" name="contrato[]" id="contrato">');
  });
  /*Fim Empreendimentos*/

  /*Faturamento*/
  $('#add_ano').click(function(){
    $('#faturamento_prev').append('<div style="clear:both;"><input type="text" name="ano[]" placeholder="Ano" style="float:left;" onblur="salvaPrevisao();"><input type="text" name="previsao[]" placeholder="Previsão de faturamento" style="float:left;" onblur="salvaPrevisao();"></div>');
  });

  $('#add_nota').click(function(){
    $('#notas_div').append('<div class="block_nota"><input type="text" name="data[]" placeholder="Data" style="float:right; margin-right:40px;" onblur="salvaNota();"><input type="text" name="numero[]" placeholder="Número" onblur="salvaNota();"><input type="text" name="valor[]" placeholder="Valor" style="margin:0 auto;" onblur="salvaNota();"><div style="width:20%; height:30px;"><input type="checkbox" name="royalt[]" style="float:left; width:10px;"><span style="float:left;">Royalt Pago</span></div></div>');
  });
  /*Fim Faturamento*/

  /*Usuários*/
  $('#altera_senha').click(function(){
    if(($('#nova_senha').val() != $('#confirma_nova_senha').val()) || $('#nova_senha').val() == ''){
      alert('As novas senhas não conferem!');
      return false;
    }
  });
  /*Fim Usuários*/

});

function salvaPrevisao(){
  $.post('faturamento/salvaPrevisao',$('#faturamentoForm').serialize(),function(data){
    $("#autosave").fadeTo(1000, 200).slideUp(200, function(){
        $("#autosave").hide();
    });
  });
}

function salvaNota(){
  $.post('faturamento/salvaNota',$('#notasform').serialize(),function(data){
    console.log(data);
    $("#autosave").fadeTo(1000, 200).slideUp(200, function(){
        $("#autosave").hide();
    });
  });
}

function salvaRoyalt(){
  $.post('faturamento/salvaRoyalt',{'royalt':1},function(data){
    console.log(data);
    $("#autosave").fadeTo(1000, 200).slideUp(200, function(){
        $("#autosave").hide();
    });
  });
}

function carregaSala(nrSala){
  $.post('reserva/sala_ajax',{'nrSala':nrSala},function(data){
    $('#dados_sala').html(data);
  });
  return false;
}
