<head>

	<link rel="icon" href="/projet/projet-tutore/icon.png">
    <meta charset="utf-8">
    <title><?php if(isset($titrePage)){echo $titrePage. " ~ Dokeos";}else{echo "Dokeos";}?></title>
    <link rel="stylesheet" type="text/css" href="css3.css" />
</head>

<?php
if(isset($retourPage))
{
?>
<a href="<?php echo $retourPage; ?>" class="retourbutton"></a>
<?php
}
else
{
?>
<a href="/projet/projet-tutore/accueil.php" class="homebutton"></a>
<?php
}
?>
