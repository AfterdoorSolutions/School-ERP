<?php


// GET DATA FROM DYNAMIC URL//
function get_id_from_url()
{
if(isset($_GET['param']))
{
	include(THEME_PATH."ajax/".$_GET['param']);
}
else
{
global $category_id;
global $product_id;
global $page_id;

     	$geturl=$_SERVER['REQUEST_URI'];
		$url=explode('/', $geturl);
		 $index = array_search(INSTALL_DIR,$url);
		if($index != FALSE){
		    unset($url[$index]);
		}
		$final_url=array_filter($url);
		if(empty($final_url))
			include THEME_PATH.'index.php';
		$count=1;
		foreach ($final_url as $key => $value) {
				$find_category=get_where("category","*","seo_link='".$value."'");
				$find_product=get_where("products","*","seo_link='".$value."'");
				$find_page=get_where("static_page","*","seo_link='".$value."'");
				$category=$find_category->fetch_array();
				$product=$find_product->fetch_array();
				$page=$find_page->fetch_array();


				if($find_category->num_rows>0 || $find_product->num_rows>0 || $find_page->num_rows>0)
				{
					if($find_category->num_rows>0)
						$category_id=$category['category_id'];
					if($find_product->num_rows>0)
					{
						$product_id=$product['product_id'];
						unset($category_id);
					}
					if($find_page->num_rows>0)
						{
						$page_id=$page['static_page_id'];
						$page_slug=$page['seo_link'];
						unset($product_id);
						unset($category_id);
						}
				}
				else
					 $error=404;
			
			

			$count++;

		}
		if(isset($error))
				include THEME_PATH.'404.php';
			else{
				if(isset($category_id))
        		include THEME_PATH.'page.php';
				elseif(isset($product_id))
        		include THEME_PATH.'product.php';
				elseif(isset($page_id))
				{
					switch ($page_slug)
					{
						case 'shipping':
						include THEME_PATH.'summary.php';
						break;
						case $page_slug:
						include THEME_PATH.$page_slug.'.php';
						break;
						
					}
				}
			}
}}
?>