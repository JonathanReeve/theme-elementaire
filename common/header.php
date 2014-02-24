<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>" class="<?php echo (get_theme_option('Style Sheet') ? get_theme_option('Style Sheet') : 'vertical'); ?>"> 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ($description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>">
    <?php endif; ?>

    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>

    <?php echo auto_discovery_link_tags(); ?>

    <!-- Plugin Stuff -->
    <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>

    <!-- Stylesheets -->
    <?php
    queue_css_url('http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic');
    queue_css_file('normalize');
    queue_css_file('style');
    echo head_css();
    ?>

    <!-- JavaScripts -->
    <?php queue_js_file('vendor/modernizr'); ?>
    <?php queue_js_file('vendor/selectivizr'); ?>
    <?php queue_js_file('jquery-extra-selectors'); ?>
    <?php queue_js_file('vendor/respond'); ?>
    <?php queue_js_file('globals'); ?>
    <?php echo head_js(); ?>

<!-- Load Google Font Stylesheet for Header--> 
<?php 
	if (get_theme_option('Heading Text Font') != NULL) {
		$headingTextFont=get_theme_option('Heading Text Font');  
		$googleLink="<link href='http://fonts.googleapis.com/css?family=".$headingTextFont."' rel='stylesheet' type='text/css'>";
		echo $googleLink;
	} 
    
        // Load Google Font Stylesheet for Body--> 
	if (get_theme_option('Body Text Font') != NULL) {
		$bodyTextFont=get_theme_option('Body Text Font');  
		$googleLink="<link href='http://fonts.googleapis.com/css?family=".$bodyTextFont."' rel='stylesheet' type='text/css'>";
		echo $googleLink;
	} 
	
	// Load Google Font Stylesheet for Nav
	if (get_theme_option('Navigation Font') != NULL) {
		$navigationFont=get_theme_option('Navigation Font');  
		$googleLink="<link href='http://fonts.googleapis.com/css?family=".$navigationFont."' rel='stylesheet' type='text/css'>";
		echo $googleLink;
	} 
	
	// Get Variables for Navigation Colors to be Used in Custom Styles Below
	if (get_theme_option('Navigation Color One') != NULL) {
		$navColorOne=get_theme_option('Navigation Color One');
	} 
	if (get_theme_option('Navigation Color Two') != NULL) {
		$navColorTwo=get_theme_option('Navigation Color Two');
	} 
?>
    	
<!-- Custom Styles --> 
<style type="text/css"> 
	body.exhibits { 
		background-color: <?php echo get_theme_option('Background Color'); ?>;
		background-image: url('<?php echo elementaire_custom_background(); ?>');
	} 
	.exhibits #wrap { 
		background-color: <?php echo get_theme_option('Page Background Color'); ?>;
	}
	.exhibits #content { 
		<?php if (get_theme_option('Hide Dividers')) echo 'border-left: none;'; ?>
        }
	.exhibits #banner { 
		<?php if (get_theme_option('Header Background')): ?> 
			background-image: url('<?php echo elementaire_custom_header_background(); ?>');
		<?php else: ?> 
			display: none; 
		<?php endif; ?> 
	}
	.exhibits h1 { 
		<?php if (get_theme_option('Hide Header Text')): ?> 
			display: none; 
		<?php endif; ?> 
	} 
	.exhibits #exhibit-nav { 
		font-family: <?php echo get_theme_option('Navigation Font'); ?>;
        }
	.horizontal .exhibit-section-nav li a { 
		background-color: <?php echo get_theme_option('Navigation Color One'); ?>;
		color: <?php echo get_theme_option('Navigation Color Two'); ?>;
	}
	.horizontal .exhibit-section-nav li.current a, .horizontal .exhibit-section-nav li a:hover { 
		background-color: <?php echo get_theme_option('Navigation Color Two'); ?>;
		color: <?php echo get_theme_option('Navigation Color One'); ?>;
	} 
	.horizontal .exhibit-page-nav li a { 
		background-color: <?php echo get_theme_option('Navigation Color One'); ?>;
		color: <?php echo get_theme_option('Navigation Color Two'); ?>;
	}	
	.horizontal .exhibit-page-nav li.current a, .horizontal .exhibit-page-nav li a:hover { 
		background-color: <?php echo get_theme_option('Navigation Color Two'); ?>;
		color: <?php echo get_theme_option('Navigation Color One'); ?>;
	} 
	.vertical a.exhibit-section-title, .vertical .exhibit-page-nav li a { 
		background-color: <?php echo get_theme_option('Navigation Color One'); ?>;
		color: <?php echo get_theme_option('Navigation Color Two'); ?>;
	} 
	.vertical .exhibit-page-nav li.current a, .vertical .exhibit-page-nav li a:hover, .vertical li.exhibit-nested-section.current a.exhibit-section-title, .vertical li.exhibit-nested-section a.exhibit-section-title:hover { 
		border-left-color: <?php echo get_theme_option('Navigation Color Two'); ?>; 
	}

	h1, h2, h3, h4, h5, h1 a, h1 a:visited { 
		color: <?php echo get_theme_option('Heading Color'); ?>;
		font-family: <?php echo get_theme_option('Heading Text Font'); ?>;			
	}
	h1 { 
		font-size: <?php echo get_theme_option('Heading Font Size'); ?>; 
	} 
	.exhibit-text, p { 
		color: <?php echo get_theme_option('Body Text Color'); ?>;
		font-family: <?php echo get_theme_option('Body Text Font'); ?>;
		font-size: <?php echo get_theme_option('Body Font Size'); ?>; 
	} 	
	#exhibit-sections { 
		<?php if ((int)get_theme_option('Display Exhibit Sections')==0) echo 'display: none;' ?> 
	}
	</style>

</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
        <header>
            <div id="site-title">
                <?php echo link_to_home_page(theme_logo()); ?>
            </div>
            <div id="search-container">
                <?php echo search_form(array('show_advanced' => true)); ?>
            </div>
            <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>
        </header>

    <div id="wrap">
        <nav class="top">
            <?php echo public_nav_main(); ?>
        </nav>

	<div id="banner"> <!-- Placeholder for custom header image --> 
	</div> 

        <div id="content">
