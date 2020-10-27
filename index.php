<?php

require_once "controllers/template.php";

require_once "controllers/gestorGaleria.php";
require_once "controllers/gestorNoticia.php";

require_once "models/gestorGaleria.php";
require_once "models/gestorNoticia.php";

$template = new TemplateController();
$template -> template();
