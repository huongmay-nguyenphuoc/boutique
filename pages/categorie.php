<?php $title = 'Category' ?>

<?php require_once('../includes/header.php'); ?>


    <main id="mainCat">
        <article>
            <div class="catDiv" id="catDiv1">
                <a class="catLink" href="souscategorie.php?cat=nintendo"><p>Nintendo</p></a>
            </div>
            <div class="catDiv" id="catDiv2">
                <a class="catLink" href="souscategorie.php?cat=playstation"><p>Playstation</p></a>
            </div>
        </article>
        <article>
            <div class="catDiv" id="catDiv3">
                <a class="catLink" href="souscategorie.php?cat=xbox"><p>xBox</p></a>
            </div>
            <div  class="catDiv" id="catDiv4">
                <div>
                    <p>Hello, stranger! Which island<br> will you visit now? Choose wisely ...</p>
                    <p><span style="color: red">Red</span> is the color of passion,</p>
                    <p><span style="color: lightgreen">Green</span> is the color of hope,</p>
                    <p><span style="color: lightskyblue">Blue</span> is the color of courage.</p>
                </div>
            </div>
        </article>
    </main>

<?php require_once('../includes/footer.php'); ?>