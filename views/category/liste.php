<h1>Catégorie <?php echo $category->name ?></h1>
<a href="<?php echo WEBROOT ?>">Accueil</a> > <a href="<?php echo WEBROOT ?>category/liste?id=<?php echo $category->id ?>">Categorie</a>

<h2>Produits :</h2>
    <ul>
        <?php foreach($products as $product){ ?>
            <li>
                <h4><a href="<?php echo WEBROOT; ?>product/detail?id_product=<?php echo $product->id ?>"><?php echo $product->name ?></a></h4>
                <ul><li><?php echo $product->short_description?></li></ul>
                <ul><li><?php echo $product->price?>€</li></ul>
            </li>
                <a href="<?php echo WEBROOT; ?>product/supprimer?id_product=<?php echo $product->id ?>"><i>supprimer le produit</i></a>
        <?php } ?>
    </ul>

<br>
<br>
<a href="<?php echo WEBROOT ?>category/creermodifier?id=<?php echo $category->id ?>">Modifier la catégorie</a>
<br>
<br>
<a href="<?php echo WEBROOT ?>product/creermodifier">Ajouter un produit</a>
