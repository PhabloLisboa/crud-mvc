<?php

echo <<<EOT
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<h1>teste</h1>
  {include($viewName)}
</body>
</html>
EOT;

?>