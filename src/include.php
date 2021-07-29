<?php
$p=dirname(__FILE__);
define("SRC",$p);
define("ROOT",dirname(SRC,1));
const SP=DIRECTORY_SEPARATOR;
const VIEWS=ROOT.SP."views";
const MODEL=ROOT.SP."model";
const CONFIG=ROOT.SP."config";
Global $count;
//import du model
require CONFIG.SP."config.php";
require MODEL.SP."ProductManager.php";
require MODEL.SP."DataLayer.class.php";
require MODEL.SP."CustomerManager.php";
require MODEL.SP."Customer.php";



//fonctions appeler par le controlleur
require "functions.php";
