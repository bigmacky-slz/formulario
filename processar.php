<?php
  require_once('simple_html_dom.php');

  // Obter o código HTML do GitHub
  $url = 'https://raw.githubusercontent.com/bigmacky-slz/teste/main/netflix.html';
  $html = file_get_html($url);

  // Obter o novo link "src=" enviado pelo formulário
  $novo_link = $_POST['novo-link'];

  // Modificar o link "src=" no código HTML
  $elemento = $html->find('img.btnSelector__img', 0);
  $elemento->src = $novo_link;

  // Fazer o download do arquivo HTML modificado
  $nome_arquivo = 'netflix_modificado.html';
  $html->save($nome_arquivo);

  // Redirecionar para o arquivo HTML modificado
  header("Content-Type: application/force-download");
  header("Content-Disposition: attachment; filename=\"$nome_arquivo\"");
  readfile("$nome_arquivo");
  exit;
?>
