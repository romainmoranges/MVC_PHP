<h1>Accueil</h1>
<a href="<?php echo WEBROOT ?>">Accueil</a>
<h2>Catégories</h2>
<ul>
    <?php foreach($categories as $category){ ?>
    <li><a href="category/liste?id=<?php echo $category->id ?>"><?php echo $category->name?></a><p><?php echo $category->description ?></p></li>
    <?php } ?>
</ul>
<br />
<br />
<a href="<?php echo WEBROOT ?>category/creermodifier">Ajouter une catégorie</a>