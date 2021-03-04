<?php

require_once '../classes/admin.php';
require_once '../classes/user.php';

$title = 'mail';

if (!isset($_SESSION['user']) or $_SESSION['user']->getStatus() != 1) {
    header('location:../pages/connexion.php');
} else {

    $admin = new admin;

}

?>



<?php include 'includes/header.php'; ?>
<main>

    <h1>All Messages</h1>
    <section class="mail">
        <table>
            <thead>
            <tr>
                <th>date</th>
                <th>Login</th>
                <th>title</th>
                <th>message</th>
                <th>action</th>


            </tr>
            </thead>
            <tbody>
            <?php foreach ($admin->showEmail() as $mail) {

                ?>
                <tr>
                    <td><?= $mail['date_message']; ?></td>
                    <td><?= $mail['login']; ?></td>
                    <td><?= $mail['title']; ?></td>
                    <td><?= $mail['message']; ?></td>
                    <td>
                        <a class="button" href="../pages/contact.php">
                            <button>Answer</button>
                        </a>
                        <form method='post' action='delete_mail.php'>
                            <input type="hidden" value="<?= $mail['id_message'] ?>" name="id">
                            <input type='submit' name='removeMail' value='Delete it'>
                        </form>
                    </td>

                </tr>

            <?php } ?>
            </tbody>
        </table>
    </section>

</main>


<?php include 'includes/footer.php'; ?>
