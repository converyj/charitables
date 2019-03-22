<?php 
$baby = $pdo->prepare("SELECT * FROM `FoodImages` WHERE `id`= 1");
$beans = $pdo->prepare("SELECT * FROM `FoodImages` WHERE `id`= 2");
$condiments = $pdo->prepare("SELECT * FROM `FoodImages` WHERE `id`= 4");
$dairy = $pdo->prepare("SELECT * FROM `FoodImages` WHERE `id`= 5");
$eggssoy = $pdo->prepare("SELECT * FROM `FoodImages` WHERE `id`= 6");
$fruits = $pdo->prepare("SELECT * FROM `FoodImages` WHERE `id`= 7");
$grains = $pdo->prepare("SELECT * FROM `FoodImages` WHERE `id`= 8");
$meat = $pdo->prepare("SELECT * FROM `FoodImages` WHERE `id`= 9");
$nonperish = $pdo->prepare("SELECT * FROM `FoodImages` WHERE `id`= 10");
$otherbev = $pdo->prepare("SELECT * FROM `FoodImages` WHERE `id`= 11");
$sauce = $pdo->prepare("SELECT * FROM `FoodImages` WHERE `id`= 12");
$seafood = $pdo->prepare("SELECT * FROM `FoodImages` WHERE `id`= 13");
$snacks = $pdo->prepare("SELECT * FROM `FoodImages` WHERE `id`= 14");
$spices = $pdo->prepare("SELECT * FROM `FoodImages` WHERE `id`= 15");
$vege = $pdo->prepare("SELECT * FROM `FoodImages` WHERE `id`= 16");
$water = $pdo->prepare("SELECT * FROM `FoodImages` WHERE `id`= 17");

$tops = $pdo->prepare("SELECT * FROM `ClothesImages` WHERE `id`= 1");
$bottoms = $pdo->prepare("SELECT * FROM `ClothesImages` WHERE `id`= 2");
$accesaries = $pdo->prepare("SELECT * FROM `ClothesImages` WHERE `id`= 3");
$outerwear = $pdo->prepare("SELECT * FROM `ClothesImages` WHERE `id`= 4");
$innerwear = $pdo->prepare("SELECT * FROM `ClothesImages` WHERE `id`= 5");
$onepiece = $pdo->prepare("SELECT * FROM `ClothesImages` WHERE `id`= 6");
$shoes = $pdo->prepare("SELECT * FROM `ClothesImages` WHERE `id`= 7");



$baby->execute();
$beans->execute();
$condiments->execute();
$dairy->execute();
$eggssoy->execute();
$fruits->execute();
$grains->execute();
$meat->execute();
$nonperish->execute();
$otherbev->execute();
$sauce->execute();
$seafood->execute();
$snacks->execute();
$spices->execute();
$vege->execute();
$water->execute();

$tops->execute();
$bottoms->execute();
$accesaries->execute();
$outerwear->execute();
$innerwear->execute();
$onepiece->execute();
$shoes->execute();

$b = $baby->fetch(); 
$be = $beans->fetch();
$c = $condiments->fetch();
$d = $dairy->fetch();
$e = $eggssoy->fetch(); 
$f = $fruits->fetch(); 
$g = $grains->fetch(); 
$m = $meat->fetch(); 
$non = $nonperish->fetch(); 
$other = $otherbev->fetch(); 
$sau = $sauce->fetch(); 
$sea = $seafood->fetch(); 
$sna = $snacks->fetch(); 
$sp = $spices->fetch(); 
$ve = $vege->fetch(); 
$wa = $water->fetch(); 

$tops = $tops->fetch();
$bots = $bottoms->fetch();
$acc =  $accesaries->fetch();
$out = $outerwear->fetch();
$in = $innerwear->fetch();
$one = $onepiece->fetch();
$shoe = $shoes->fetch();
?>