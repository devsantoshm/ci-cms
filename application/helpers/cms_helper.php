<?php

function btn_edit($uri)
{
	return anchor($uri, '<i class="glyphicon glyphicon-edit"></i>');
}

function btn_delete($uri)
{
	return anchor($uri, '<i class="glyphicon glyphicon-remove"></i>', array(
		'onclick' => "return confirm('Do you want to delete this record?')"
	));
}

function article_link($article)
{
    return 'article/' . intval($article->id) . '/' . e($article->slug);
}

function article_links($articles)
{
    $string = '<ul>';
    
    foreach ($articles as $article) {
        $url = article_link($article);
        $string .= '<li>';
        $string .= '<h3>' . anchor($url, e($article->title)) . '</h3>';
        $string .= '<p class="pubdate">' . e($article->pubdate) . '</p>';
        $string .= '</li>';
    }

    $string .= '</ul>';

    return $string;
}

//strip_tags — Retira las etiquetas HTML y PHP de un string
function get_excerpt($article, $numwords = 50)
{
    $string = '';
    $url = article_link($article);
    $string .= '<h2>' . anchor($url, e($article->title)) . '</h2>';
    $string .= '<p class="pubdate">' . e($article->pubdate) . '</p>';
    $string .= '<p>' . e(limit_to_numwords(strip_tags($article->body), $numwords)) . '</p>';
    $string .= '<p>' . anchor($url, 'Read more...', array('title' => e($article->title))) . '</p>';

    return $string;
}

/*
explode — Divide un string en varios string
$str = 'uno|dos|tres|cuatro';

// límite positivo
print_r(explode('|', $str, 2));

Array
(
    [0] => uno
    [1] => dos|tres|cuatro
)

array_pop — Extrae el último elemento del final del array

implode() = une elementos de un array en un string

$array = array('apellido', 'email', 'teléfono');
$separado_por_comas = implode(",", $array);

echo $separado_por_comas; // apellido,email,teléfono
*/

function limit_to_numwords($string, $numwords)
{
    $excerpt = explode(' ', $string, $numwords + 1);
   
    if (count($excerpt) >= $numwords) {
        array_pop($excerpt);
    }

    $excerpt = implode(' ', $excerpt);

    return $excerpt;
}

/*
$str = "A 'quote' is <b>bold</b>";
echo htmlentities($str);
// Produce: A 'quote' is &lt;b&gt;bold&lt;/b&gt;
*/
function e($string)
{
    return htmlentities($string);
}

function get_menu($array, $child = FALSE)
{
    $CI =& get_instance();
    $str = '';

    if (count($array)) {
        $str .= $child == FALSE ? '<ul class="nav navbar-nav">'.PHP_EOL : '<ul class="dropdown-menu">'.PHP_EOL;

        foreach ($array as $item) {
            $active = $CI->uri->segment(1) == $item['slug'] ? TRUE : FALSE;
            //Do we have any children?
            if (isset($item['children']) && count($item['children'])) {
                $str .= $active ? '<li class="dropdown active">' : '<li class="dropdown">';
                $str .= '<a href="'.site_url(e($item['slug'])).'">'.e($item['title']);  
                $str .= ' <b class="caret"></b></a>'.PHP_EOL;
                $str .= get_menu($item['children'], TRUE);
            }
            else {
                $str .= $active ? '<li class="active">' : '<li>';
                $str .= '<a href="'.site_url($item['slug']).'">'.e($item['title']).'</a>';
            }

            $str .= '</li>'.PHP_EOL;
        }

        $str .= '</ul>' . PHP_EOL;
    }

    return $str;
}

/**
 * Dump helper. Functions to dump variables to the screen, in a nicley formatted manner.
 * @author Joost van Veen
 * @version 1.0
 */
if (!function_exists('dump')) {
    function dump ($var, $label = 'Dump', $echo = TRUE)
    {
        // Store dump in variable 
        ob_start();
        var_dump($var);
        $output = ob_get_clean();
        
        // Add formatting
        $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
        $output = '<pre style="background: #FFFEEF; color: #000; border: 1px dotted #000; padding: 10px; margin: 10px 0; text-align: left;">' . $label . ' => ' . $output . '</pre>';
        
        // Output
        if ($echo == TRUE) {
            echo $output;
        }
        else {
            return $output;
        }
    }
}


if (!function_exists('dump_exit')) {
    function dump_exit($var, $label = 'Dump', $echo = TRUE) {
        dump ($var, $label, $echo);
        exit;
    }
}