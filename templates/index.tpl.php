<?php session_start(); ?>
<?php if(file_exists('./logicals/'.$keres['fajl'].'.php')) { include("./logicals/{$keres['fajl']}.php"); } ?>
<!DOCTYPE html>
<html lang="hu">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <title><?= $ablakcim['cim'] . ( (isset($fejlec['motto'])) ? (' | ' . $fejlec['motto']) : '' ) ?></title>
	<link rel="stylesheet" href="./styles/stilus.css" type="text/css">
	<?php if(file_exists('./styles/'.$keres['fajl'].'.css')) { ?><link rel="stylesheet" href="./styles/<?= $keres['fajl']?>.css" type="text/css"><?php } ?>
</head>
<body>
    <div class="site-container">
        <header>
            <div class="header-titles">
                <h1><?= $fejlec['cim'] ?></h1>
                <?php if (isset($fejlec['motto'])) { ?><h2><?= $fejlec['motto'] ?></h2><?php } ?>
            </div>
            <div class="header-user">
                <?php if(isset($_SESSION['login'])) { ?>
                    <span>Bejelentkezett: <strong><?= $_SESSION['csn']." ".$_SESSION['un']." (".$_SESSION['login'].")" ?></strong></span>
                <?php } ?>
            </div>
        </header>

        <nav>
            <ul>
                <?php foreach ($oldalak as $url => $oldal) { ?>
                    <?php if(! isset($_SESSION['login']) && $oldal['menun'][0] || isset($_SESSION['login']) && $oldal['menun'][1]) { ?>
                        <li<?= (($oldal == $keres) ? ' class="active"' : '') ?>>
                        <a href="<?= ($url == '/') ? '.' : $url ?>">
                        <?= $oldal['szoveg'] ?></a>
                        </li>
                    <?php } ?>
                <?php } ?>
            </ul>
        </nav>

        <main id="content">
            <?php include("./templates/pages/{$keres['fajl']}.tpl.php"); ?>
        </main>

        <footer>
            <div class="footer-content">
                <?php if(isset($lablec['copyright'])) { ?><span>&copy; <?= $lablec['copyright'] ?></span><?php } ?>
                <?php if(isset($lablec['ceg'])) { ?><span><?= $lablec['ceg']; ?></span><?php } ?>
            </div>
        </footer>
    </div>
</body>
</html>