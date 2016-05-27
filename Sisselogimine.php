<!doctype html>
<html>
    <head>
        <meta charset="utf8" />
        <title>Sisselogimine</title>
		
		<link rel="stylesheet" type="text/css" href="vorm.css">
    </head>
    <body>
	
		<?php foreach (message_list() as $message):?>
            <p style="border: 1px solid red; background: #EEE;">
                <?= $message; ?>
            </p>
        <?php endforeach; ?>

        <h1 class="kiri">Sisselogimine</h1>

        <form method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
		
			<?php include("footer.php"); ?>

            <input type="hidden" name="action" value="login">
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">

            <table class="kesk">
                <tr>
                    <td>Kasutajanimi</td>
                    <td>
                        <input type="text" name="kasutajanimi" placeholder="Sisesta siia kasutajanimi"required>
                    </td>
                </tr>
                <tr>
                    <td>Parool</td>
                    <td>
                        <input type="password" name="parool" placeholder="Sisesta siia parool"required>
                    </td>
                </tr>
            </table>

            <p class="nupp">
                <button type="submit">Logi sisse</button> või <a href="<?= $_SERVER['PHP_SELF']; ?>?view=register">registreeri konto</a>
            </p>

        </form>
    </body>
</html>