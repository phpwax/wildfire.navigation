<?
class WildfireNavigationItem extends WildfireContent{

  public $table = "wildfire_navigation_item";
  public static $content_model_class = false;

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
    $this->columns['status'][1]['editable'] = true;
    $this->columns['status'][1]['group'] = false;    
    //find the content model
    
    $this->define("content_model_class", "CharField", array('widget'=>'HiddenInput'));
    WildfireNavigationItem::$content_model_class = CONTENT_MODEL;
    //choices for the content item
    $this->define("content_item", "ManyToManyField", array('target_model'=>WildfireNavigationItem::$content_model_class, 'scaffold'=>true, 'group'=>'relationships'));
    //an alternative url to use
    $this->define("nav_url", "CharField", array('label'=>'External url'));
    //option to load in a partial as well
    $this->define("extra_partial", "CharField", array('widget'=>'SelectInput', 'choices'=>$this->navigation_partials()) );

  }
  
  public function scope_live(){
    return $this->filter("revision", 0)->order("sort ASC");
  }

  public function before_save(){
    if(!$this->title) $this->title = "Navigation item";
    parent::before_save();
  }

  public function map_live(){
    return $this;
  }
  public function map_revision(){
    return $this;
  }
  public function map_hide(){
    return $this;
  }

  public function navigation_partials(){
    $partials = array(''=>'-- Select --');
    //glob over a app directory for this
    foreach(glob(VIEW_DIR."nav/*.html") as $nav) $partials[str_replace(VIEW_DIR, "", $nav)] = trim(str_replace("_", " ", basename($nav, ".html")));
    return $partials;
  }
}
?>