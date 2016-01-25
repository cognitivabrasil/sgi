$(document).ready(function(){

  $('map').imageMapResize();

  /*Empreendimentos*/
  $('#add_produto').click(function(){
      $('#produtos_container').append('<hr><input type="text" name="nome_produto[]" placeholder="Nome"><textarea name="descricao_produto[]" placeholder="Descrição" style="clear:both; width:70%; height:150px;"></textarea>');
  });
  $('#add_contrato').click(function(){
      $('#contrato_container').append('<hr><input type="text" name="assinatura_contrato[]" placeholder="Data de assinatura"><label for="contrato" style="margin-left:5px; font-weight:normal;">Contrato: </label><input type="file" name="contrato[]" id="contrato">');
  });
  /*Fim Empreendimentos*/

});
