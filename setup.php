<?
CMSApplication::register_module("navigation", array("display_name"=>"Navigation", "link"=>"/admin/navigation/", 'split'=>true));

if(defined("CONTENT_MODEL")){
  WaxEvent::add(CONTENT_MODEL.".setup", function(){
    $model = WaxEvent::data();
    if(!$model->columns['navigation_items']) $model->define("navigation_items", "ManyToManyField", array('target_model'=>'WildfireNavigationItem', 'group'=>'relationships'));
  });
}
?>