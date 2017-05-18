<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Todos los vegetales</title>
</head>
<body>
  <p>Todos los vegetales</p>

  <?php foreach ($vegetales as $vegetal) : ?>
		<li><?= $vegetal->nombre ?></li>	
	<?php endforeach ?>
</body>
</html>
