<?php
  $nome='';
  $telefone='';
  $celular='';
  $email='';
  $dt_nasc='';
  $obs='';
  
  
  if(isset($contato)){
    $id = $contato->getCodigo();
    $nome = $contato->getNome();
    $telefone = $contato->getTelefone();
    $celular = $contato->getCelular();
    $email = $contato->getEmail();
    $dt_nasc = $contato->getDatanascimento();
    $obs = $contato->getObservacao();

    $acao = "router.php?controller=contatos&modo=atualizar&id=".$id;

  }else{
    $acao = "router.php?controller=contatos&modo=inserir";
  }
?>
<div id="cadastro">
      <form name="frmcontatos" method="post" action="<?php echo $acao ?>">
          <table id="tblcadastro">
            <tr>
              <td colspan="2" class="titulo_tabela">Cadastro de Contatos</td>
            </tr>
            <tr>
              <td class="tblcadastro_td">Nome:</td>
              <td><input id="nome" value="<?php echo $nome ?>" name="txtnome" type="text"  required placeholder="Nome"  /></td>
            </tr>
            <tr>
              <td class="tblcadastro_td">Telefone:</td>
              <td><input id="telefone" name="txttelefone" type="tel" value="<?php echo $telefone ?>"  /></td>
            </tr>
            <tr>
              <td class="tblcadastro_td">Celular:</td>
              <td><input value="<?php echo $celular ?>" name="txtcelular" type="tel"  placeholder="Ex:011 99999-9999" pattern="[0-9]{3} [0-9]{5}-[0-9]{4}" /></td>
            </tr>
            <tr>
              <td class="tblcadastro_td">Email:</td>
              <td><input value="<?php echo $email ?>" name="txtemail" type="email"  /></td>
            </tr>
    <tr>
              <td class="tblcadastro_td">Data Nascimento:</td>
              <td><input value="<?php echo $dt_nasc ?>" name="txtdatanasc" type="text" /></td>
            </tr>  
    <tr>
              <td class="tblcadastro_td">Obs:</td>
              <td><textarea name="txtobs" cols="20" rows="5"><?php echo $obs ?></textarea></td>
            </tr>
            <tr>
              <td><input name="btnsalvar" type="submit" value="Salvar" /></td>
              <td><input name="btnlimpar" type="reset" value="Limpar" /></td>
            </tr>
          </table>
      </form>
  </div>
<div id="consulta">
    <table id="tblconsulta">
        <tr>
          <td class="titulo_tabela" colspan="5">Consulta de Contatos</td>
        </tr>
        <tr class="tblcadastro_td">
          <td>Nome</td>
          <td>Telefone</td>
          <td>Celular</td>
          <td>Email</td>
          <td>Opções</td>
        </tr>
        <tr class="tblconsulta_dados">
          <td></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <?php 
            //Importe da controller de contato
            require_once('controller/controllerContato.php');
            
            //Instância da controller de contato
            $listContato = new ControllerContato();

            //Chamada para o método de chamar o contato
            $rs = $listContato->listarContatos();
            
            //Controle do while que exibe os contatos na tela
            $count = 0; 
            while($count < count($rs)){
        ?> 
                <tr class="tblconsulta_dados">
                  <td> <?php echo $rs[$count]->getNome(); ?> </td>
                  <td> <?php echo $rs[$count]->getTelefone(); ?> </td>
                  <td> <?php echo $rs[$count]->getCelular(); ?> </td>
                  <td> <?php echo $rs[$count]->getEmail(); ?> </td>
                    <td>
                      <a href="router.php?controller=contatos&modo=buscar&id=<?php echo $rs[$count]->getCodigo(); ?>">
                          <img src="icones/modify16.png" title="Modificar"> 
                      </a>|
                      
                          <a href="router.php?controller=contatos&modo=excluir&id=<?php echo $rs[$count]->getCodigo(); ?>">
                              <img src="icones/delete16.png" title="Excluir">
                          </a>|
                  
                  </td>
                </tr>
          <?php 
            $count++;
            }
          ?>
      </table>
  </div>



	

