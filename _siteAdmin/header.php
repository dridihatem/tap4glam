<div class="header navbar navbar-inverse ">

<div class="navbar-inner">
<div class="header-seperation">
<ul class="nav pull-left notifcation-center visible-xs visible-sm">
<li class="dropdown">
<a href="#main-menu" data-webarch="toggle-left-side">
<i class="material-icons">menu</i>
</a>
</li>
</ul>



<ul class="nav pull-right notifcation-center">
<li class="dropdown hidden-xs hidden-sm">
<a href="index.php" class="dropdown-toggle active" data-toggle="">
<i class="material-icons">home</i>
</a>
</li>
<li class="dropdown hidden-xs hidden-sm">
<a href="#" class="dropdown-toggle">
<i class="material-icons">email</i><span class="badge bubble-only"></span>
</a>
</li>

</ul>
</div>

<div class="header-quick-nav">

<div class="pull-left">
<ul class="nav quick-section">
<li class="quicklinks">
<a href="#" class="" id="layout-condensed-toggle">
<i class="material-icons">menu</i>
</a>
</li>
</ul>
<ul class="nav quick-section">
<li class="quicklinks  m-r-10">
<a href="#" class="">
<i class="material-icons">refresh</i>
</a>
</li>

<li class="quicklinks"> <span class="h-seperate"></span></li>
<li class="quicklinks">
<a href="#" class="" id="my-task-list" data-placement="bottom" data-content='' data-toggle="dropdown" data-original-title="Notifications">
<i class="material-icons">notifications_none</i>
<span class="badge badge-important bubble-only"></span>
</a>
</li>
<li class="quicklinks"> <span class="h-seperate"></span></li>
<li class="quicklinks"><a href="../index.php"><i class="fa fa-globe"></i> Vers le site</li>

</ul>
</div>


<div class="pull-right">
<ul class="nav quick-section ">
<li class="quicklinks">
<a data-toggle="dropdown" class="dropdown-toggle  pull-right " href="#" id="user-options">
<i class="material-icons">tune</i>
</a>
<ul class="dropdown-menu  pull-right" role="menu" aria-labelledby="user-options">
<li>
<a href="index.php?pg=formUser&id=<?php echo $_SESSION['idadmin']; ?>"> Mon compte</a>
</li>
<li>
<a href="index.php?pg=formModif">Paramètre</a>
</li>
<li>
<a href="#"> Boite de réception
<span class="badge badge-important animated bounceIn">2</span>
</a>
</li>
<li class="divider"></li>
<li>
<a href="index.php?disconnect&idmemnbre=<?php echo $_SESSION['idadmin']; ?>"><i class="material-icons">power_settings_new</i>&nbsp;&nbsp;Déconnexion</a>
</li>
</ul>
</li>


</ul>
</div>

</div>

</div>

</div>
