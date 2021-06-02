<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulário para criar etiquetas.</title>
</head>
<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    padding: 0 15px;
  }

  .form-php {
    display: flex;
    flex-direction: column;
    max-width: 320px;
    margin: 0 auto;
  }

  .form-php input {
    margin-bottom: 8px;
  }

  .form-php-input {
    cursor: pointer;
  }

  input {
    padding-left: 4px;
  }
</style>
<body>
  <?php 
      $action = '/exemplos/helper-criar-pre-lista.php';
  ?>

  <form target="_blank" class="form-php" action="<?php echo $action; ?>" method="POST">
    <span>Nome *:</span> <input required type="text" placeholder="Nome completo" name="name" />
    <span>Logradouro *:</span> <input required type="text" placeholder="Ex: Rua Leopoldo" name="logradouro" />
    <span>Número *:</span> <input required type="text" placeholder="Ex: 320" name="numero" />
    <span>Complemento:</span> <input type="text" placeholder="Ex: Apt 201" name="complemento" />
    <span>Bairro *:</span> <input required type="text" placeholder="Andarai" name="bairro" />
    <span>Cep *:</span> <input required type="text" placeholder="Cep 00000-000" name="cep" />
    <span>Cidade *:</span> <input required type="text" placeholder="Rio de Janeiro" name="cidade" />
    <span>UF *:</span> <input required type="text" placeholder="RJ" name="uf" />
    <span>Nº nota fiscal *:</span> <input required type="number" placeholder="nº nota fiscal" name="nNota" />
    <span>Nº Pedido *:</span> <input required type="text" placeholder="nº pedido" name="nPedido" />
    <span>Nº Etiqueta *:</span> <input required type="text" placeholder="nº etiqueta" name="nEtiqueta" />
    <span>Peso *:</span> <input required type="text" placeholder="Utilizar ponto '.' ex: 0.500" name="peso" />

    <input class="form-php-input" type="submit" value="Enviar"/>
  </form>
</body>
</html>
