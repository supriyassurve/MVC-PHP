<?php

$nav = '<div class="header">';
$nav .= anchor_tag_current('Dashboard', SITE_URL, array(), 
        anchor_tag('Dashboard Current', SITE_URL, array('class' => 'current'))
);
$nav .= ' &nbsp; &nbsp; &nbsp; &nbsp; ' . 
        anchor_tag_current('Demo Page', INC_URL_DEMO, array(), 
        anchor_tag('Demo Page Current', INC_URL_DEMO, array('class' => 'current'))
);

$nav .= ' &nbsp; &nbsp; &nbsp; &nbsp; ' . anchor_tag('Logout', SITE_URL . DS . "logout.php");
$nav .= "</div>";
echo $nav;
