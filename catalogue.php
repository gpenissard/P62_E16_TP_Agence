<?php
    require_once('data/data.php');
?>

<?php /*Affichage du catalogue*/ ?>
<ul>
<?php foreach ($data as $id => $item) { ?>
     <li>
         <div>
             <p><?= $item['nom'] ?>, <span class=".prix"><?= $item['prix'] ?></span></p>
             <img src="<?= $item['photo'] ?>" alt=""/>
         </div>
     </li>
<?php } ?>
</ul>
