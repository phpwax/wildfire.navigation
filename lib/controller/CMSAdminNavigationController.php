<?
class CMSAdminNavigationController extends AdminContentController{
  
  public $module_name = "navigation";
  public $model_class = 'WildfireNavigationItem';
  public $display_name = "Navigation";
  public $dashboard = false;
  public $tree_layout = true;
  public $sortable = true;
  public $sort_scope = "live";
  public $filter_fields=array(
                          'text' => array('columns'=>array('title'), 'partial'=>'_filters_text', 'fuzzy'=>true),
                          'parent' => array('columns'=>array('parent_id'), 'partial'=>'_filters_parent'),
                          'which' => array('columns'=>array('which_navigation'), 'partial'=>"_filters_grouped_column"),
                          'language' => array('columns'=>array('language'), 'partial'=>"_filters_language")
	                      );
  
}
?>