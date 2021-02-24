<?php if($newsletterexist == 0) { ?>
    <form method="POST">
        <label>Adresse e-mail</label><br />
        <input type="email" name="newsletter" /><br /><br />
        <input type="submit" name="newsletterform" value="Envoyer"/>
    </form>
<?php } else { ?>
    <label>Adresse e-mail</label><br />
    <input type="email" name="newsletter" disabled/><br /><br />
    <?php while($news = $reqnewsletter->fetch()) { ?>
        <a href="?deinscription=<?= $news['id'] ?>">Me déinscrire de la Newsletter</a>
    <?php } ?>
<?php } ?>


<!DOCTYPE html>
<html>
<head>
    <title>Tuto PHP - Création d'une Newsletter</title>
</head>
<body>
<?php if($newsletterexist == 0) { ?>
    <form method="POST">
        <label>Adresse e-mail</label><br />
        <input type="email" name="newsletter" /><br /><br />
        <input type="submit" name="newsletterform" value="Envoyer"/>
    </form>
<?php } else { ?>
    <label>Adresse e-mail</label><br />
    <input type="email" name="newsletter" disabled/><br /><br />
    <?php while($news = $reqnewsletter->fetch()) { ?>
        <a href="?deinscription=<?= $news['id'] ?>">Me déinscrire de la Newsletter</a>
    <?php } ?>
<?php } ?>
</body>
</html>
