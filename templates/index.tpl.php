<?php session_start(); ?>
<?php if(file_exists('./logicals/'.$keres['fajl'].'.php')) { include("./logicals/{$keres['fajl']}.php"); } ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

	<meta charset="utf-8">
	<title><?= $ablakcim['cim'] . ( (isset($ablakcim['mottó'])) ? ('|' . $ablakcim['mottó']) : '' ) ?></title>
	<link rel="stylesheet" href="./styles/stilus.css" type="text/css">
	<?php if(file_exists('./styles/'.$keres['fajl'].'.css')) { ?><link rel="stylesheet" href="./styles/<?= $keres['fajl']?>.css" type="text/css"><?php } ?>
</head>
<body>
   <nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href=".">Webprog Beadandó</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainMenu">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainMenu">
        <ul class="navbar-nav mr-auto">

            <?php foreach ($oldalak as $url => $oldal): ?>
                <?php
                    $megjelenhet = (!isset($_SESSION['login']) && $oldal['menun'][0])
                                   || (isset($_SESSION['login']) && $oldal['menun'][1]);
                ?>

                <?php if ($megjelenhet): ?>
                    <li class="nav-item <?= ($oldal == $keres) ? 'active' : '' ?>">
                        <a class="nav-link" href="<?= ($url == '/') ? '.' : $url ?>">
                            <?= $oldal['szoveg'] ?>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>

        </ul>

        <?php if (isset($_SESSION['login'])): ?>
            <span class="navbar-text text-white">
                Bejelentkezve: <?= $_SESSION['csn'] . " " . $_SESSION['un'] ?> (<?= $_SESSION['login'] ?>)
            </span>
        <?php endif; ?>
    </div>
</nav>

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <?php include("./templates/pages/{$keres['fajl']}.tpl.php"); ?>
        </div>
    </div>
</div>

</div>
    <footer>
        <?php if(isset($lablec['copyright'])) { ?>&copy;&nbsp;<?= $lablec['copyright'] ?> <?php } ?>
		&nbsp;
        <?php if(isset($lablec['ceg'])) { ?><?= $lablec['ceg']; ?><?php } ?>
    </footer>
</body>
</html>