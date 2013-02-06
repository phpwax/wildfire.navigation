<?
CMSApplication::register_module("navigation", array("display_name"=>"Navigation", "link"=>"/admin/navigation/", 'split'=>true));

AutoLoader::register_view_path("plugin", __DIR__."/view/");
AutoLoader::register_controller_path("plugin", __DIR__."/lib/controller/");
AutoLoader::register_controller_path("plugin", __DIR__."/resources/app/controller/");
AutoLoader::$plugin_array[] = array("name"=>"wildfire.categories","dir"=>__DIR__);


if(defined("CONTENT_MODEL")){
  WaxEvent::add(CONTENT_MODEL.".setup", function(){
    $model = WaxEvent::data();
    if(!$model->columns['navigation_items']) $model->define("navigation_items", "ManyToManyField", array('target_model'=>'WildfireNavigationItem', 'group'=>'relationships'));
  });
}
?>