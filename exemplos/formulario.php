<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulário para criar etiquetas.</title>
</head>
<body>
  <?php 
      $action = 'http://localhost:9000/exemplos/helper-criar-pre-lista.php';
  ?>

  <form action="<?php echo $action; ?>" method="POST">
    <span>Nome:<span> <input type="text" placeholder="Nome" name="name" />
    <span>Logradouro:<span> <input type="text" placeholder="Logradouro" name="logradouro" />

    <input type="submit" value="Enviar"/>
  </form>
</body>
</html>