<?php

require_once '../classes/user.php';

$title = "News";
$bodyname = "bodyuser";

session_start();
/*if (!isset($_SESSION['user'])) {
    header('location: connexion.php');
}
if($_SESSION['user']->getNewsletter() == 1){

}

else{
    header('location: newsletter.php');
}

*/
?>
<?php include '../includes/header_user.php'; ?>
<main>
<h1>NEWS OF THE MOMENT</h1>


<p>Hey! You can get this site, in e-mail form, delivered to your inbox. Use the form below to sign up and I’ll e-mail you the FULL CONTENT of new blog posts or podcast announcements when they are published. Not just excerpts</p>

    <p>As a great man once said, life moves pretty fast. Anything that saves you time is a godsend, freeing you up to do whatever else you value in life. Which is where the GamesRadar newsletter comes in. Everyday it brings the biggest games, movies and TV news straight to your inbox, so even if you don't have time to browse feeds or check your social, you'll still be up to date with what's going on. </p>


<h3>IS PLAYING VIDEO GAMES MAKING CLIMATE CHANGE WORSE?</h3>

    <p>Since the 1980s, video games have become an increasingly important part of the entertainment industry. The first game of the 80s was Pac-Man, a simple concept involving a yellow, pie-shaped character who travels around a maze trying to eat dots and avoid ghosts. Pac-Man became a cultural icon and to this day remains one of the most popular video games in history. Nowadays, action-adventure games like Grand Theft Auto and Fortnite dominate the market, alongside family-friendly racing games like Mario Kart and football franchise FIFA. But how sustainable is the gaming industry when it comes to its carbon footprint? The gaming industry is now the sixth biggest in the world, and the second largest in Europe, worth £4.3 billion. But as you might expect, with that comes a substantial cost to the environment. A recent study, entitled Console Carbon Footprint, looked into the sustainability of games consoles and concluded that two damaging factors are at play. The first, the mass production of physical products which are shipped out to players across the globe, and the second, the lack of energy efficiency in consoles.
<a href="https://www.euronews.com/living/2020/02/17/is-playing-video-games-making-climate-change-worse">TO CONTINUE ...</a>
    </p>
</main>
<?php include '../includes/footer.php'; ?>