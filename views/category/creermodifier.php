<h1>Ajouter ou modifier une catégorie</h1>

<a href="<?php echo WEBROOT ?>">Accueil</a> >
<?php if($category->id){ ?>
    <a href="<?php echo WEBROOT ?>category/liste?id=<?php echo $category->id ?>">Catégorie</a> > Modification
<?php }else{ ?>
    Nouvelle catégorie
<?php } ?>
<br />
<h2><?php  echo $category->name ?></h2>
<form method="post" action="<?php echo WEBROOT ?>category/creermodifier?id=<?php echo $category->id ?>">
    <label for="name">Nom : </label><input name="name" id="name" value="<?php echo $category->name ?>" /><br />
    <label for="description">Description : </label><input name="description" id="description" value="<?php echo $category->description ?>" /><br />

    <input type="submit">
</form>