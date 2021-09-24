<?php

include('../../controller/db_functions.php');
$pdo = conectar();
$acao = $_POST["acao"];
$id =  $_POST["id"];
if ($acao == 'DeleteLavratura') {
  // Bloco if utilizado pela etapa Delete
      try {
          $stmt = $pdo->prepare("DELETE FROM notas_lavratura WHERE id = ?");
          $stmt->bindParam(1, $id, PDO::PARAM_INT);
          if ($stmt->execute()) {
              echo "Registo,  foi excluído com êxito";
              $id = null;
          } else {
              echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
          }
      } catch (PDOException $erro) {
          echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</a>";
      }

}

if ($acao == 'DeleteEncerrarProtTD') {
  // Bloco if utilizado pela etapa Delete
      try {
          $stmt = $pdo->prepare("DELETE FROM tdpj_td_registro_protocolo WHERE id = ?");
          $stmt->bindParam(1, $id, PDO::PARAM_INT);
          if ($stmt->execute()) {
              echo "Registo,  foi excluído com êxito";
              $id = null;
          } else {
              echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
          }
      } catch (PDOException $erro) {
          echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</a>";
      }

}

if ($acao == 'DeleteEncerrarProtPJ') {
  // Bloco if utilizado pela etapa Delete
      try {
          $stmt = $pdo->prepare("DELETE FROM tdpj_pj_registro_protocolo WHERE id = ?");
          $stmt->bindParam(1, $id, PDO::PARAM_INT);
          if ($stmt->execute()) {
              echo "Registo,  foi excluído com êxito";
              $id = null;
          } else {
              echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
          }
      } catch (PDOException $erro) {
          echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</a>";
      }

}

if ($acao == 'DeleteMinuta') {
  // Bloco if utilizado pela etapa Delete
      try {
          $stmt = $pdo->prepare("DELETE FROM minuta WHERE id = ?");
          $stmt->bindParam(1, $id, PDO::PARAM_INT);
          if ($stmt->execute()) {
              echo "Registo,  foi excluído com êxito";
              $id = null;
          } else {
              echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
          }
      } catch (PDOException $erro) {
          echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</a>";
      }

}


if ($acao == 'EtiquetaPadrao') {
  UPDATE_CAMPO_ID('configuracao_etiqueta','LARGURA',$_POST['LARGURA'],$id);
  UPDATE_CAMPO_ID('configuracao_etiqueta','ALTURA',$_POST['ALTURA'],$id);
  UPDATE_CAMPO_ID('configuracao_etiqueta','POSICAO_VERTICAL',$_POST['POSICAO_VERTICAL'],$id);
  UPDATE_CAMPO_ID('configuracao_etiqueta','POSICAO_HORIZONTAL',$_POST['POSICAO_HORIZONTAL'],$id);
  UPDATE_CAMPO_ID('configuracao_etiqueta','MARGEM_ESQUERDA',$_POST['MARGEM_ESQUERDA'],$id);
  UPDATE_CAMPO_ID('configuracao_etiqueta','MARGEM_DIREITA',$_POST['MARGEM_DIREITA'],$id);
  UPDATE_CAMPO_ID('configuracao_etiqueta','VERTICAL_QR_CODE',$_POST['VERTICAL_QR_CODE'],$id);

}


if ($acao == 'EtiquetaReconhecimento') {
  UPDATE_CAMPO_ID('configuracao_etiqueta','LARGURA',$_POST['LARGURA'],$id);
  UPDATE_CAMPO_ID('configuracao_etiqueta','ALTURA',$_POST['ALTURA'],$id);
  UPDATE_CAMPO_ID('configuracao_etiqueta','POSICAO_VERTICAL',$_POST['POSICAO_VERTICAL'],$id);
  UPDATE_CAMPO_ID('configuracao_etiqueta','POSICAO_HORIZONTAL',$_POST['POSICAO_HORIZONTAL'],$id);
  UPDATE_CAMPO_ID('configuracao_etiqueta','MARGEM_ESQUERDA',$_POST['MARGEM_ESQUERDA'],$id);
  UPDATE_CAMPO_ID('configuracao_etiqueta','MARGEM_DIREITA',$_POST['MARGEM_DIREITA'],$id);
  UPDATE_CAMPO_ID('configuracao_etiqueta','VERTICAL_QR_CODE',$_POST['VERTICAL_QR_CODE'],$id);

}


if ($acao == 'EtiquetaAutenticacao') {
  UPDATE_CAMPO_ID('configuracao_etiqueta','LARGURA',$_POST['LARGURA'],$id);
  UPDATE_CAMPO_ID('configuracao_etiqueta','ALTURA',$_POST['ALTURA'],$id);
  UPDATE_CAMPO_ID('configuracao_etiqueta','POSICAO_VERTICAL',$_POST['POSICAO_VERTICAL'],$id);
  UPDATE_CAMPO_ID('configuracao_etiqueta','POSICAO_HORIZONTAL',$_POST['POSICAO_HORIZONTAL'],$id);
  UPDATE_CAMPO_ID('configuracao_etiqueta','MARGEM_ESQUERDA',$_POST['MARGEM_ESQUERDA'],$id);
  UPDATE_CAMPO_ID('configuracao_etiqueta','MARGEM_DIREITA',$_POST['MARGEM_DIREITA'],$id);
  UPDATE_CAMPO_ID('configuracao_etiqueta','VERTICAL_QR_CODE',$_POST['VERTICAL_QR_CODE'],$id);

}

?>
