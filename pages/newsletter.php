<?php




?>



<main>

    <form method='post' action='delete_newsletter.php'>
        <input type="hidden" value="<?= $cat['id_category'] ?>" name="id">
        <input type='submit' name='removeCat' value='Delete Category'>

    </form>

</main>
