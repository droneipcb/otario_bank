<?php
    echo "<texto id='username'> $username </texto>";

    echo "<a href='logout.php'><img id='logout' src='logout.png'></img></a>";
    echo "<br><br><br>";
    
    echo "<a href='welcome.php'><p class='menuitem'>Home</p><a>";
    
    if ($role == 'user' || $role == 'admin')
      echo "<a href='enviar_mensagem.php'><p class='menuitem'>Enviar mensagem ao gestor</p></a>";
    
    if ($role == 'gestor' || $role == 'admin')
      echo "<a href='ver_mensagens.php'><p class='menuitem'>Ver mensagens de clientes</p></a>";
    
    if ($role == 'admin')
      echo "<a href='gerir_utilizadores.php'><p class='menuitem'>Gerir utilizadores</p></a>";
?>
