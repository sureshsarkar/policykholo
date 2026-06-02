<?php

namespace App\Helper;

use App\Models\BasicSetting;
use App\Models\Deal;
use App\Models\WelcomePackage;
use DB;
use Auth;
use Mail;
use App\Models\EmailTemplete;
use App\Models\User;
use MailHelper;
use Session;
use LiveCart;
use Helper;
use App\Models\PropertyGallery;
use App\Models\Blogs\BlogCategory;
use App\Models\Location;
use App\Models\Brand;
use App\Models\Collection;
use App\Models\Manufacture;
use App\Models\Store;
use App\Models\Property;
use App\Models\PropertyRate;
use App\Models\CareerCategory;
use App\Models\Country;
use App\Models\Service;

use App\Models\Cms;

/**
 * Class ModelHelper
 * @package App\Helper
 */
class ModelHelper{


    function getCareerCategorySelect(){
         $data=[];
        $all=CareerCategory::all();
        foreach($all as $a){
            $data[$a->id]=$a->title;
        }
        return $data;
    }

    function getCareerLocationSelect(){
        $data=[];
        $all=Deal::where('publish','published')->get();
        foreach($all as $a){
            $data[$a->id]=$a->title;
        }
        return $data;
    }
    function getCareerSkillSelect(){
        $data=[];
        $all=WelcomePackage::all();
        foreach($all as $a){
            $data[$a->id]=$a->name;
        }
        return $data;
    }
    function getImageByProduct($product_id){
        return PropertyGallery::where("property_id",$product_id)->orderBy("sorting","asc")->get();
    }

    function getBlogCategoriesSelect(){

        $data=[];
        $all=BlogCategory::all();
        foreach($all as $a){
            $data[$a->id]=$a->title;
        }
        return $data;
    }
    function getcountryList(){

        $data=[];
        $all=Country::all();
        foreach($all as $a){
            $data[$a->id]=$a->title;
        }
        return $data;
    }

    function getBrandList(){

        $data=[];
        $all=Brand::all();
        foreach($all as $a){
            $data[$a->id]=$a->title;
        }
        return $data;
    }

    function getCollectionList(){

        $data=[];
        $all=Collection::all();
        foreach($all as $a){
            $data[$a->id]=$a->title;
        }
        return $data;
    }


    function getManufactureList(){

        $data=[];
        $all=Manufacture::all();
        foreach($all as $a){
            $data[$a->id]=$a->title;
        }
        return $data;
    }


    function getStoreList(){

        $data=[];
        $all=Store::all();
        foreach($all as $a){
            $data[$a->id]=$a->title;
        }
        return $data;
    }

    function getStoreListCountry($country_id){

        $data=[];
        $all=Store::where("country_id",$country_id)->get();
        foreach($all as $a){
            $data[$a->id]=$a->title;
        }
        return $data;
    }





    function getProperptySelectList(){

        $data=[];
        $all=Property::all();
        foreach($all as $a){
            $data[$a->id]=$a->name;
        }
        return $data;
    }




    function getLocationSelectList(){

        $data=[];
        $all=Location::all();
        foreach($all as $a){
            $data[$a->id]=$a->name;
        }
        return $data;
    }


    function getLocationParentSelectList(){

        $data=[];
        $all=Location::whereNull("is_parent")->get();
        foreach($all as $a){
            $data[$a->id]=$a->name;
        }
        return $data;
    }




    function getPolicySelectList(){

        $data=[];
        $all=Service::all();
        foreach($all as $a){
            $data[$a->id]=$a->name;
        }
        return $data;
    }


    function getPageSelectList(){

        $data=[];
        $all=Cms::all();
        foreach($all as $a){
            $data[$a->id]=$a->name;
        }
        return $data;
    }



    function getProppertySelectList(){

        $data=[];
        $all=Property::all();
        foreach($all as $a){
            $data[$a->id]=$a->name;
        }
        return $data;
    }

	public function getDataFromSetting($name){
		$result=null;
		$data=BasicSetting::where("name",$name)->first();
		if($data){
			$result=$data->value;
		}

		return $result;
	}





}
