<?
CMSApplication::register_module("navigation", array("display_name"=>"Navigation", "link"=>"/admin/navigation/", 'split'=>true));

if(!defined("CONTENT_MODEL")){
  $con = new ApplicationController(false, false);
  define("CONTENT_MODEL", $con->cms_content_class);
}

WaxEvent::add(CONTENT_MODEL.".setup", function(){
  $model = WaxEvent::data();
  if(!$model->columns['navigation_items']) $model->define("navigation_items", "ManyToManyField", array('target_model'=>'WildfireNavigationItem', 'group'=>'relationships'));
});
?>