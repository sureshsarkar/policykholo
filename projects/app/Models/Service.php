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
		'detail_hero_title',
		'detail_hero_subtitle',
		'detail_hero_tags',
		'detail_hero_stats',
		'detail_trust_items',
		'detail_feature_intro',
		'detail_feature_items',
		'detail_recommended_plan_label',
		'detail_recommended_plan_title',
		'detail_recommended_plan_description',
		'detail_recommended_plan_items',
		'detail_overview_content',
		'detail_policy_types_intro',
		'detail_policy_types',
		'detail_insurer_intro',
		'detail_how_it_works_title',
		'detail_how_it_works_description',
		'detail_how_it_works_steps',
		'detail_benefits_title',
		'detail_benefits_description',
		'detail_benefits',
		'detail_buying_guide_title',
		'detail_buying_guide_description',
		'detail_buying_guide_items',
		'detail_claims_title',
		'detail_claims_description',
		'detail_claim_processes',
		'detail_testimonial_title',
		'detail_testimonial_description',
		'detail_testimonials',
		'detail_trust_stats',
		'detail_faqs',
		'detail_final_content',

	//	'header_section',
	//	'footer_section'

    ];

	protected $casts = [
		'detail_hero_tags' => 'array',
		'detail_hero_stats' => 'array',
		'detail_trust_items' => 'array',
		'detail_feature_items' => 'array',
		'detail_recommended_plan_items' => 'array',
		'detail_policy_types' => 'array',
		'detail_how_it_works_steps' => 'array',
		'detail_benefits' => 'array',
		'detail_buying_guide_items' => 'array',
		'detail_claim_processes' => 'array',
		'detail_testimonials' => 'array',
		'detail_trust_stats' => 'array',
		'detail_faqs' => 'array',
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

