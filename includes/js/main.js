$(document).ready(function(){

  //Inicializando os tooltips
  $('[data-toggle="tooltip"]').tooltip();

  $('#senha_testa').on('blur',function(){

    verificaQualidadeSenha();

  });

  $('#myModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var sala = button.data('sala');
    var hora = button.data('hora');
    var dia = button.data('dia');
    var modal = $(this);
    modal.find('.id-sala').val(sala);
    modal.find('.id-horario').val(hora);
    modal.find('.id-data').val(dia);
  });

  $('.deleta_agendamento').click(function(){
    if(confirm('Você deseja realmente excluir?')){
      var pagina_atual = $(this).attr('rel')-1;
      $.get($(this).attr('href'),function(data){
        window.location.replace('/gestaocei/index.php/reserva/verifica/'+pagina_atual);
      });
    }
    return false;
  });

  $('.deleta_usuario').click(function(){
    if(confirm('Você deseja realmente excluir?')){
      $.get($(this).attr('href'),function(data){
        window.location.replace('/gestaocei/index.php/usuarios');
      });
    }
    return false;
  });

  $('map').imageMapResize();

  $('#filtra_area').change(function(){
      if($('#filtra_area').val() == 'todos'){
        window.location.replace('/gestaocei/index.php/servicos');
      }else{
        window.location.replace('/gestaocei/index.php/servicos/area/'+$('#filtra_area').val());
      }
  });

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
    $('#faturamento_prev').append('<div style="clear:both; width:40%; border-bottom: 1px dashed #CCCCCC;"><input type="text" name="ano[]" placeholder="Ano" style="float:left;" onblur="salvaPrevisao();"><input type="text" name="previsao[]" placeholder="Previsão de faturamento" style="float:left;" onblur="salvaPrevisao();"></div>');
  });

  $('#add_nota').click(function(){
    $('#notas_div').prepend('<div class="block_nota"><input type="date" name="data[]" placeholder="Data" style="float:right; margin-right:40px;" onblur="salvaNota();"><input type="text" name="numero[]" placeholder="Número" onblur="salvaNota();"><input type="file" name="nota[]" style="float:right; margin-right:40px;" onchange="salvaNota();"><input type="text" name="valor[]" placeholder="Valor" onblur="salvaNota();"><br></div>');
    return false;
  });
  /*Fim Faturamento*/

  /*Usuários*/
  $('#form_alterasenha').on('submit',function(){
    if(($('#senha_testa').val() != $('#confirma_nova_senha').val()) || $('#senha_testa').val() == ''){
      alert('As novas senhas não conferem!');
      return false;
    }
  });

  $('.restaura_senha').click(function(){
    if(confirm('Deseja realmente resetar a senha do usuário?')){
      $.post('./usuarios/restaurasenha',{id: $(this).attr('href')},function(data){
        alert('A nova senha do usuário é: '+data);
      });
    }
    return false;
  });
  /*Fim Usuários*/

  //Colaboradores
  $('#funcao_colaborador').attr('disabled',true);

  $('#habilita_funcao').click(function(){
    if($(this).is(':checked')){
      $('#funcao_colaborador').attr('disabled',true);
    }else{
      $('#funcao_colaborador').attr('disabled',false);
    }
  });

});

function verificaQualidadeSenha(){
  $.get('/gestaocei/index.php/usuarios/vpass/'+$('#senha_testa').val(),function(data){
    if(data=='5'){
      $('#bt_salvar').removeAttr("disabled");
    }else{
      $('#bt_salvar').attr('disabled','disabled');
      return false;
    }
  });
}

function salvaPrevisao(){
  $.post('../salvaPrevisao',$('#faturamentoForm').serialize(),function(data){
    $("#autosave").fadeTo(1000, 200).slideUp(200, function(){
        $("#autosave").hide();
    });
  });
}

function patrimonio_resp(tipo){
  window.location.replace('/gestaocei/index.php/patrimonios/consulta_'+tipo+'/'+$('#search_'+tipo).val());
}

function salvaNota(){
  $.ajax({
   url: "../salvaNota",
   type: "POST",
   data: new FormData($('#notasform')[0]),
   contentType: false,
   cache: false,
   processData:false,
   success: function(data) {
     console.log(data);
     $("#autosave").fadeTo(1000, 200).slideUp(200, function(){
         $("#autosave").hide();
     });
   }
  });
}

function uploadXml(){
  $.ajax({
   url: "../uploadxml",
   type: "POST",
   data: new FormData($('#uploadform')[0]),
   contentType: false,
   cache: false,
   processData:false,
   success: function(data) {
     console.log(data);
     $("#autosave").fadeTo(1000, 200).slideUp(200, function(){
         $("#autosave").hide();
     });
   }
  });
}


function salvaContador(){
  $.post('../salvaContador', {'contador': $('#contador').val(), 'id_empreendimento': $('#id_empreendimento').val()},function(data){
    $("#autosave").fadeTo(1000, 200).slideUp(200, function(){
        $("#autosave").hide();
    });
  });
}

function salvaRoyalt(id){
  var royalt_val = 0;
  if($('#royalt_pg_'+id).prop('checked')){
    royalt_val = 1;
  }
  $.post('../salvaRoyalt',{'royalt':royalt_val, 'id_nota':id},function(data){
    $('#nota_'+id).hide();
    $("#autosave").fadeTo(1000, 200).slideUp(200, function(){
        $("#autosave").hide();
    });
  });
}

function carregaSala(nrSala){
  $.post('../index.php/reserva/sala_ajax',{'nrSala': nrSala},function(data){
    $('#dados_sala').html(data);
  });
  return false;
}
