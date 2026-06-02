<?php header('Content-type: text/xml'); ?>

<?= '<?xml version="1.0" encoding="UTF-8" ?>' ?>
<urlset  xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">




<?php foreach(App\Models\Cms::all() as $c):
	if($c->seo_url=="home"){
		$seo='';
	}else{
		$seo=$c->seo_url;
	}
	$date = date("Y-m-d", strtotime($c->updated_at));
	
	 
?>
    <url>
        <loc><?= url($seo)?>/</loc>
        <lastmod><?= $date?></lastmod>
        <changefreq>always</changefreq>
        <priority>1.00</priority>
    </url>
<?php endforeach;?>


  


  
  

<?php foreach(App\Models\Location::where("publish","published")->get() as $c):
	$seo='products/'.$c->seo_url;
	$date = date("Y-m-d", strtotime($c->updated_at));
?>
    <url>
        <loc><?= url($seo)?>/</loc>
        <lastmod><?= $date?></lastmod>
        <changefreq>always</changefreq>
        <priority>1.00</priority>
    </url>
<?php endforeach;?>





<url>
    <loc><?= url('career/category-listing')?>/</loc>
    <lastmod><?= date('Y-m-d')?></lastmod>
    <changefreq>always</changefreq>
    <priority>1.00</priority>
</url>

<?php foreach(App\Models\CareerCategory::orderBy("id","desc")->get() as $c):
    $seo='career/category/'.$c->seo_url;
    $date = date("Y-m-d", strtotime($c->updated_at));
?>
    <url>
        <loc><?= url($seo)?>/</loc>
        <lastmod><?= $date?></lastmod>
        <changefreq>always</changefreq>
        <priority>1.00</priority>
    </url>
<?php endforeach;?>

  
<?php foreach(App\Models\Career::orderBy("id","desc")->get() as $c):
    $seo='career/detail/'.$c->id;
    $date = date("Y-m-d", strtotime($c->updated_at));
?>
    <url>
        <loc><?= url($seo)?>/</loc>
        <lastmod><?= $date?></lastmod>
        <changefreq>always</changefreq>
        <priority>1.00</priority>
    </url>
<?php endforeach;?>

  
  
<?php foreach(App\Models\Blogs\BlogCategory::orderBy("id","desc")->get() as $c):
    $seo='blogs/category/'.$c->seo_url;
    $date = date("Y-m-d", strtotime($c->updated_at));
?>
    <url>
        <loc><?= url($seo)?></loc>
        <lastmod><?= $date?></lastmod>
        <changefreq>always</changefreq>
        <priority>1.00</priority>
    </url>
<?php endforeach;?>

  
  
<?php foreach(App\Models\Blogs\Blog::where("publish","published")->where("status","active")->orderBy("id","desc")->get() as $c):
    $seo='blog/'.$c->seo_url;
    $date = date("Y-m-d", strtotime($c->updated_at));
?>
    <url>
        <loc><?= url($seo)?></loc>
        <lastmod><?= $date?></lastmod>
        <changefreq>always</changefreq>
        <priority>1.00</priority>
    </url>
<?php endforeach;?>

  



</urlset>

<?php /**PATH /var/www/aa979065-84f9-4bb7-9de3-6056bbd0d343/public_html/kharido-policy/projects/resources/views/front/sitemap.blade.php ENDPATH**/ ?>