<?php
function nav_item(string $lien, string $titre, string $linkClasse)
{
    $classe = "nav-link";
    if ($_SERVER['SCRIPT_NAME'] === $lien) {
        $classe .= ' active';
    }
    return <<<HTML
  <li class=$linkClasse>
     <a class="$classe" aria-current="page" href="$lien ">$titre</a>
 </li>
HTML;
}

function nav_menu(string $linkClasse): string
{
    return
        nav_item('/index.php', 'Home', $linkClasse) .
        nav_item('../pages/inscription.php', 'Inscription', $linkClasse);
       
}