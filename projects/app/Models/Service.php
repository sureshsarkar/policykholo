<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class Service extends Model
{
    public $table = "services";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
		'id',
		'user_id',
		'name',
		'cms_id',
		'category_id',
		'seo_url',
		'icon_class',
		'campaign_name',
		'link_work',
		'shortDescription',
		//'mediumDescription',
		////'longDescription',
       // 'exlongDescription',
		'description',
		'image',
		'meta_title',
		'meta_keywords',
		'meta_description',
		//'templete',
		'bannerImage',
		'publish',

	//	'header_section',
	//	'footer_section'

    ];

    public static $rules = [
        // create rules
    ];

    public function company()
    {
        return $this->belongsTo(Customer::class,'user_id');
    }

    public function category(){
        return $this->belongsTo(Deal::class,'category_id');
    }

	public function pageType(){
		return $this->belongsTo(Cms::class,'cms_id','id');
    }

	 public function faqs(){
         return $this->hasMany(Faq::class,'type');
    }

}

