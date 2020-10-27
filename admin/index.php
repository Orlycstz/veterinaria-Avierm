<?php

require_once "controllers/template.php";
require_once "controllers/enlaces.php";

require_once "controllers/gestorPerfiles.php";
require_once "controllers/usuario.php";
require_once "controllers/gestorHistorialMedico.php";
require_once "controllers/vacunas.php";
require_once "controllers/gestorGaleria.php";
require_once "controllers/gestorArticulos.php";
require_once "controllers/gestorNoticia.php";

require_once "models/enlaces.php";

require_once "models/gestorPerfiles.php";
require_once "models/usuario.php";
require_once "models/gestorHistorialMedico.php";
require_once "models/vacunas.php";
require_once "models/gestorGaleria.php";
require_once "models/gestorArticulos.php";
require_once "models/gestorNoticia.php";


$template = new Template();
$template -> templateController();