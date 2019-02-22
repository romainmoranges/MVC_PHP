<h1>Details</h1>
<?php //d($product);?>
<a href="<?php echo WEBROOT ?>">Accueil</a> > <a href="<?php echo WEBROOT ?>category/liste?id=<?php echo $product->id_category ?>">Catégorie</a> > <a href="<?php echo WEBROOT ?>product/detail?id_product=<?php echo $product->id ?>">Détail</a>


<br>


<h2><?php echo $product->name?></h2>

<ul>
    <li>ID : <?php echo $product->id ?></li>
    <li>DESCRIPTION : <?php echo $product->description ?></li>
    <li>NOM : <?php echo $product->name ?></li>
    <li>PRIX : <?php echo $product->price ?>€</li>
    <li>QUANTITE : <?php echo $product->quantity ?></li>
    <li>REFERENCE : <?php echo $product->reference ?></li>
    <li>DESCRIPTION COURTE : <?php echo $product->short_description ?></li>
    <li>ID CATEGORIE :<?php echo $product->id_category ?></li>
</ul>

<a href="<?php echo WEBROOT ?>product/creermodifier?id_product=<?= $product->id?>">Modifier le produit</a>
