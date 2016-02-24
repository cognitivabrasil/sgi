<div id="container-central">
  <div>
    <div id="autosave" class='alert alert-success fade in' style="display:none;"><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Salvo!</div>
    <p id="titulo_usuario">Faturamento</p>
    <div id="block_usuario">
      <form method="post" action="faturamento/salvaPrevisao" id="faturamentoForm">
        <div id="faturamento_prev">
          <input type="text" name="ano[]" placeholder="Ano" style="float:left;" onblur="salvaPrevisao();"><input type="text" name="previsao[]" placeholder="Previsão de faturamento" style="float:left;" onblur="salvaPrevisao();">
        </div>
        <input type="button" value="Adicionar Ano" id="add_ano" style="float:left; margin-left:10px;">
        <input type="text" name="contador" placeholder="Contador responsável" style="clear:both; float:left;">
        <input type="submit">
      </form>
      <p id="titulo_usuario" style="clear:both;">Notas</p>
      <div id="block_nota">
        <input type="text" name="data" placeholder="Data" style="float:right; margin-right:40px;">
        <input type="text" name="numero" placeholder="Número">
        <input type="text" name="valor" placeholder="Valor" style="margin:0 auto;">
        <div style="width:20%; height:30px;"><input type="checkbox" name="royalt" style="float:left; width:10px;"><span style="float:left;">Royalt Pago</span></div>
      </div>
      <div id="block_nota">
        <input type="text" name="data" placeholder="Data" style="float:right; margin-right:40px;">
        <input type="text" name="numero" placeholder="Número">
        <input type="text" name="valor" placeholder="Valor" style="margin:0 auto;">
        <div style="width:20%; height:30px;"><input type="checkbox" name="royalt" style="float:left; width:10px;"><span style="float:left;">Royalt Pago</span></div>
      </div>
      <div id="block_nota">
        <input type="text" name="data" placeholder="Data" style="float:right; margin-right:40px;">
        <input type="text" name="numero" placeholder="Número">
        <input type="text" name="valor" placeholder="Valor" style="margin:0 auto;">
        <div style="width:20%; height:30px;"><input type="checkbox" name="royalt" style="float:left; width:10px;"><span style="float:left;">Royalt Pago</span></div>
      </div>
      <div id="block_nota">
        <input type="text" name="data" placeholder="Data" style="float:right; margin-right:40px;">
        <input type="text" name="numero" placeholder="Número">
        <input type="text" name="valor" placeholder="Valor" style="margin:0 auto;">
        <div style="width:20%; height:30px;"><input type="checkbox" name="royalt" style="float:left; width:10px;"><span style="float:left;">Royalt Pago</span></div>
      </div>
      <div style="text-align:center; margin-top:15px;">
        <a href="#" id="add_nota">Adicionar mais notas</a>
      </div>
    </div>
  </div>
</div>
</div>
