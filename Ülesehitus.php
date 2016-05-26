<!doctype HTML>
<html>

<head>
    <title>Laoprogramm</title>
    <meta charset="utf-8">
	
	<link rel="stylesheet" type="text/css" href="vorm.css">

    <style>
        #lisa-vorm {
            display: none;
        }
    </style>

</head>

<body>
		
		<div class="image">
		<img src="http://enos.itcollege.ee/~rrastas/Võrgurakendused (Praktikumid)/pildid/Ladu.jpg" alt="ladu" /> <!--Pilt on pärit (http://parkplacerecycling.com/warehouse-storage/) veebilehelt-->
		</div>
		

	 <?php foreach (message_list() as $message):?>
        <p style="color: red; font-weight: bold;">
            <?= $message; ?>
        </p>
	 <?php endforeach; ?>

    <div style="float: right;">
        <form method="post"  action="<?= $_SERVER['PHP_SELF']; ?>">
            <input type="hidden" name="action" value="logout">
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
            <button type="submit">Logi välja</button>
        </form>
    </div>

    <h1>Laoprogramm</h1>

    <p id="kuva-nupp">
        <button type="button"><em>Kuva lisamise vorm</em></button>
    </p>

    <form id="lisa-vorm" method="post" action="<?= $_SERVER['PHP_SELF']; ?>">

        <input type="hidden" name="action" value="add">
        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">

        <p id="peida-nupp">
            <button type="button"><em>Peida lisamise vorm</em></button>
        </p>

        <table>
            <tr>
                <td>Nimetus</td>
                <td>
                    <input type="text" id="nimetus" name="nimetus" placeholder="Sisesta siia kauba nimetus">
                </td>
            </tr>
            <tr>
                <td class="border">Kogus</td>
                <td>
                    <input type="number" id="kogus" name="kogus" placeholder="Sisesta siia kauba kogus">
                </td>
            </tr>
        </table>

        <p>
            <button type="submit"><em>Lisa kaup</em></button>
        </p>

    </form>
	
		<?php include("footer.php"); ?>

    <table id="ladu" border="1">
        <thead>
            <tr>
                <th>Nimetus</th>
                <th>Kogus</th>
                <th>Tegevused</th>
            </tr>
        </thead>

        <tbody>

        <?php
      
        foreach (mudel_load($page) as $rida): ?>

            <tr>
                <td>
                    <?=
                        
                        htmlspecialchars($rida['nimetus']);
                    ?>
                </td>
                <td>
                	 <form method="post" action="<?= $_SERVER['PHP_SELF'];?>">
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                        <input type="hidden" name="id" value="<?= $rida['id']; ?>">
                        <input type="number" name="kogus" value="<?= $rida['kogus']; ?>"
                        style="with: 6em; text-align: right;">
                        <button type="submit"><em>Uuenda</em></button>
                    </form>
                </td>
                <td>

                    <form method="post" action="<?= $_SERVER['PHP_SELF'];?>">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                        <input type="hidden" name="id" value="<?= $rida['id']; ?>">
                        <button type="submit"><em>Kustuta rida</em></button>
                    </form>

                </td>
            </tr>

        <?php endforeach; ?>
		
		

        </tbody>
    </table>

    <p>
    	<a href="<?= $_SERVER['PHP_SELF']?>?page=<?= $page - 1 ?>">
    		eelmisele lehele
    	</a>
		
		<a>
		    või
		</a>
    	
    	<a href="<?= $_SERVER['PHP_SELF']?>?page=<?= $page + 1 ?>">
    		järgmisele lehele
    	</a>
    <p>
    
    <script src="Laoprogramm.js"></script>
</body>

<div style="clear:both"></div>

</html>