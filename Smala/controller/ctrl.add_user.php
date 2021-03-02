<?php

  // je suis un contrôleur, un chef d'orchestre !

  // d'abord j'appelle un modèle, pour en récupérer une $info
  // include("model/model.user.php");
  
  // puis j'appelle une vue, pour afficher cette $info dans une belle page web
  include("controller/ctrl.session_start.php");
  include("controller/ctrl.session_portal.php");
  
  include("model/model.pdo.php");
  include("model/model.user.php");
  
  include("view/view.header.php");
  include("view/view.backoffice_admin.php");
  include("view/view.footer.php");

  // et puis voilou, on s'arrête là
  exit;