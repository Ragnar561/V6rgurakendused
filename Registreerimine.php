<!doctype html>
<html>
    <head>
        <meta charset="utf8" />
        <title>Registreeri konto</title>
		
		<link rel="stylesheet" type="text/css" href="vorm.css">
    </head>
    <body>
	
		<?php foreach (message_list() as $message):?>
            <p style="border: 1px solid red; background: #EEE;">
                <?= $message; ?>
            </p>
        <?php endforeach; ?>

        <h1 class="kiri">Registreeri konto</h1>

        <form method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
		
			<?php include("footer.php"); ?>

            <input type="hidden" name="action" value="register">
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
                        <input type="password" name="parool" placeholder="Sisesta siia parool" required>
                    </td>
                </tr>
				<tr>
				<td>
					Korda parool
				</td>
				<td>
					<input type="password" name="password2" placeholder="Korda parooli" required>
				</td>
			</tr>
            </table>

            <p class="nupp">
                <button type="submit">Registreeri konto</button>
            </p>

        </form>
    </body>
</html>