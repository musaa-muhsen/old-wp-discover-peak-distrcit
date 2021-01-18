<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<header class="main-header-container">
<div id="main-header">
<div class='logo'>
    <div><a href="<?php echo site_url() ?>">
    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="20" cy="20" r="20" fill="white"/>
<rect x="20" y="13.5529" width="9.11765" height="9.11765" transform="rotate(45 20 13.5529)" fill="#1D3458"/>
</svg></a>
</div>
<div>
    <p><a class="make-white" href="<?php echo site_url() ?>">Discover the <br><span>Peak District</span></a></p>
</div>

</div>
<div class="empty"></div>

<div class="menu-button-hidden-container">
<div class="menu-button-hidden-holder">
<p class="menu-button-hidden" onclick="openNav()">Menu</p>
</div>
</div>
<ul> 
<li <?php if (is_page('home')) echo 'class="current-menu-item"' ?>> <a href="<?php echo site_url() ?>">Home</a></li>
<li <?php if (get_post_type() == 'guide') echo 'class="current-menu-item"'; ?>><a href="<?php echo get_post_type_archive_link('guide'); ?>">Guides</a></li>
<li <?php if (get_post_type() == 'map') echo 'class="current-menu-item"'; ?>><a href="<?php echo get_post_type_archive_link('map'); ?>">Map</a></li>
<li <?php if (get_post_type() == 'event' OR is_page('past-events')) echo 'class="current-menu-item"'; ?>> <a href="<?php echo get_post_type_archive_link('event'); ?>">Events</a></li>
<li <?php if (is_page('about')) echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/about-this-project') ?>">About</a></li>
</ul>
</div>
</header>

<div id="myNav" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
    <a href="<?php echo site_url() ?>">Home</a>
    <a href="<?php echo get_post_type_archive_link('guide'); ?>">Guides</a>
    <a href="<?php echo get_post_type_archive_link('map'); ?>">Map</a>
    <a href="<?php echo get_post_type_archive_link('event'); ?>">Events</a>
   <a href="<?php echo site_url('/about-this-project') ?>">About</a>

  </div>
</div>