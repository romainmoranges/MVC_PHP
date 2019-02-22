<h1>Produit</h1>
<a href="<?php echo WEBROOT ?>">Accueil</a> >
<?php if($product->id){ ?>
    <a href="<?php echo WEBROOT ?>category/liste?id=<?php echo $product->id_category ?>">Catégorie</a> > Modification
<?php }else{ ?>
    Nouveau produit
<?php } ?><br />
<h2><?php  echo $product->name ?></h2>

<form method="post" action="<?php echo WEBROOT ?>product/creermodifier?id_product=<?php echo $product->id ?>">
    <label for="name">Nom : </label><input name="name" id="name" value="<?php echo $product->name ?>" /><br />
    <label for="price">Prix : </label><input name="price" id="price" value="<?php echo $product->price ?>" /><br />
    <label for="quantity">Quantité : </label><input name="quantity" id="quantity" value="<?php echo $product->quantity ?>" /><br />
    <label for="reference">Référence : </label><input name="reference" id="reference" value="<?php echo $product->reference ?>" /><br />
    <label for="short_description">Description courte : </label><input name="short_description" id="short_description" value="<?php echo $product->short_description ?>" /><br />
    <label for="id_category">Catégorie </label>
    <select name="id_category" id="id_category">Catégorie
        <?php foreach($categories as $category){ ?>
            <option value="<?php echo $category->id ?>" <?php echo $category->id == $product->id_category?'selected':'' ?>><?php echo $category->name?></option>
        <?php } ?>
    </select><br>
    <label for="description">Description : </label><textarea rows="10" cols="30" name="description" id="description"><?php echo $product->description ?></textarea><br />
    <input type="submit">
</form>