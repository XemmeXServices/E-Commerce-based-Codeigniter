<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
	<meta http-equiv="Expires" content="-1">
	<meta http-equiv="Last-Modified" content="<?php echo date('D, j M Y H:i:s'); ?> GMT">
	<meta http-equiv="Cache-Control" content="no-cache, must-revalidate">
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="Content-Style-Type" content="text/css">
        <meta name="robots" content="all">
	<meta name="distribution" content="Global">
	<meta name="rating" content="Safe For Kids">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <title>{function:title_for_layout}</title>
        <meta property="og:title" content="All_Star - Motorsport | {function:title_for_layout}" />
        <meta property="og:type" content="article" />
        <meta property="og:url" content="http://www.allstar-motorsport.com/" />
        <meta property="og:description" content="" />
        <meta property="og:site_name" content="www.allstar-motorsport.com" />
        <?php if(isset($includes_for_layout['css']) AND count($includes_for_layout['css']) > 0):
            foreach($includes_for_layout['css'] as $css): ?>
                <link rel="stylesheet" type="text/css" href="<?php echo $css['file']; ?>"<?php echo ($css['options'] === NULL ? '' : ' media="' . $css['options'] . '"'); ?>>
            <?php endforeach;
        endif;
        ?>
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Oswald:300,400,700|Source+Sans+Pro:300,400,600,700&amp;subset=latin,latin-ext" />
        <!--[if lt IE 9 ]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!--[if IE]><style type="text/css">#overlay{filter:alpha(opacity=80);}</style><![endif]-->
	<!--[if lte IE 6]><style type="text/css">img,div,input{behavior:url('{function:assets_images}images/iepngfix.htc');}</style><![endif]-->
    </head>
    <body>
        <?php $this->load->view('partials/header'); ?>
        <?php echo $content_for_layout; ?>
        <?php 
        $this->load->view('partials/footer');
        if(isset($includes_for_layout['js']) AND count($includes_for_layout['js']) > 0): 
            foreach($includes_for_layout['js'] as $js): 
                if($js['options'] === NULL OR $js['options'] == 'footer'): ?>
                    <script type="text/javascript" src="<?php echo $js['file']; ?>"></script>
                <?php endif; 
            endforeach; 
        endif; 
        ?>
        <script type="text/javascript" charset="utf-8">
            function search(){
		var $j = jQuery.noConflict();
		var search = URLEncode($j("#search").val());
		parent.location='{function:base_url}search/s/'+search;
            }
            function refresh_page(){
		parent.location=URLDecode('<?php echo urlencode($_SERVER["REQUEST_URI"]); ?>');
            }
            function cancel_basket(){
		var $j = jQuery.noConflict();
		$j.post("{function:base_url}_ajax/reset_basket",{reset: 'true'},
		function(data){
                    if (data!=''){
                        $j("#cancel_status").html(data);
                        refresh_page();
                    }
		});
		return false;
            }
	</script>
    </body>
</html>