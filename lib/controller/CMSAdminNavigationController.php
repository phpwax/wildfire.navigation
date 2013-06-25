<?
class CMSAdminNavigationController extends AdminContentController{
  public static $restricted_tree = false;
  public $module_name = "navigation";
  public $model_class = 'WildfireNavigationItem';
  public $display_name = "Navigation";
  public $dashboard = false;
  public $tree_layout = true;
  public $singular = "Item";
  public $sortable = true;
  public $sort_scope = "live";
  public $filter_fields=array(
                          'text' => array('columns'=>array('title'), 'partial'=>'_filters_text', 'fuzzy'=>true),
                          'language' => array('columns'=>array('language'), 'partial'=>"_filters_language"),
                          'parent' => array('columns'=>array('parent_id'), 'partial'=>false)
	                      );

}
?>