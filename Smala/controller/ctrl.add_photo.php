<?php

  // je suis un contrôleur, un chef d'orchestre !

  // d'abord j'appelle un modèle, pour en récupérer une $info
  // include("model/model.user.php");
  
  // puis j'appelle une vue, pour afficher cette $info dans une belle page web
  include("view/view.header.php");

  include("view/view.add_photo.php");

  include("view/view.footer.php");

  // et puis voilou, on s'arrête là
  exit;