<?
class WildfireNavigationItem extends WildfireContent{

  public $table = "wildfire_navigation_item";
  
  public function setup(){
    parent::setup();
    //unset all the extra stuff
    unset($this->columns['content'],
          $this->columns['view'],
          $this->columns['layout'],
          $this->columns['date_start'],
          $this->columns['date_end'],
          $this->columns['categories'],
          $this->columns['excerpt'],
          $this->columns['meta_keywords'],
          $this->columns['meta_description'],
          $this->columns['files']
          );
    //remove some the of tabs
    $this->columns['permalink'][1]['group']= false;
    $this->columns['permalink'][1]['editable']= false;    
    //find the content model
    $comp = new AdminContentController(false, false);
    $model_class = $comp->model_class;
    $this->define("content_model_class", "CharField", array('widget'=>'HiddenInput'));
    //set the class
    $this->content_model_class = $model_class;
    //choices for the content item
    $this->define("content_item", "ManyToManyField", array('target_model'=>$model_class, 'scaffold'=>true, 'group'=>'relationships'));
    //an alternative url to use
    $this->define("nav_url", "CharField", array('label'=>'Alternative url'));


  }



  public function before_save(){
    if(!$this->title) $this->title = "Navigation item";
    parent::before_save();
  }
}
?>