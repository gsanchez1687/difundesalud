<?php /*


class PageSize extends CWidget
{
	public $mPageSizeOptions = array(10=>10, 25=>25, 50=>50, 75=>75, 100=>100);
	public $mPageSize = 10;
	public $mGridId = '';
	public $mDefPageSize = 10;
	
	public function run()
	{			
		Yii::app()->user->setState('pageSize', $this->mPageSize);
		
		$this->mPageSize = null == $this->mPageSize ? $this->mDefPageSize : $this->mPageSize;
		
		echo 'Perpage: ';
		echo CHtml::dropDownList('pageSize', $this->mPageSize, $this->mPageSizeOptions,array(
				'onchange'=>"$.fn.yiiGridView.update('$this->mGridId',{ data:{pageSize: $(this).val() }})",
		));
	}
} */


/**
 * Date: 12-2-13
 * Time: pm 8:22
 *  @author Aruna Attanayake <aruna470@gmail.com> && yiqing95 <yiqing_95@qq.com>
 */
class PageSize extends CWidget
{
    /**
     * @var array
     * the optional pageSize you can select
     */
    public $pageSizeOptions = array(10=>10, 25=>25, 50=>50, 75=>75, 100=>100);
 
    /**
     * @var int
     * current pageSize will be used for
     * GridView or ListView
     */
    public $pageSize = 10;
 
    /**
     * @var string
     * ---------------------
     * the gridViewId
     * ---------------------
     */
    public $gridViewId = '';
 
    /**
     * @var string
     * --------------------
     * the listViewId
     * --------------------
     */
    public $listViewId = '';
 
    /**
     * @var int
     * ----------------------
     * default pageSize for gridView or listView
     * ----------------------
     */
    public $defaultPageSize = 10;
 
    public $beforeLabel = '';
 
    /**
     * @var array
     * -------------------------------------
     * the htmlOptions passed to the underlying dropDownList
     *  note:  the name options will be ignored , will always use
     *  the pageSize .
     * -------------------------------------
     */
    public $dropDownListHtmlOptions = array();
 
    /**
     * @var string
     * -----------------------
     * the list type , the CGridView and the CListView
     * both inherit from CBaseListView , so they are all
     * listView ;  this param used to determine the sub type of CBaseListView
     *
     * -----------------------
     */
    protected $listViewType = 'Grid';
    /**
     * @var string
     * ------------------------
     * the CGridView or CListView id
     * ------------------------
     */
    protected $updateId ;
    /**
     * @throws CException
     */
    public function init(){
        if(! empty($this->gridViewId)){
            $this->listViewType = 'Grid';
            $this->updateId = $this->gridViewId;
        }elseif(! empty($this->listViewId)){
            $this->listViewType = 'List';
            $this->updateId = $this->listViewId ;
        }else{
            //if(empty($this->gridViewId) || empty($this->listViewId))
            throw new CException('you must specify the gridViewId or listViewId for using this widget!');
        }
 
        parent::init();
    }
 
    public function run()
    {
        //>  store the current pageSize to user 's session
        Yii::app()->user->setState('pageSize', $this->pageSize);
        //>  current pageSize to initialize the dropDownList
        $this->pageSize = (null == $this->pageSize) ? $this->defaultPageSize : $this->pageSize;
        //> the class property for the DropDownList
        //$class4ddl = __CLASS__.'-'.$this->id . time();
        $class4ddl = 'form-control size-xs pagesize-select';
 
        // handle the  ddlHtmlOptions , we add a unique css class to the dropDownList, and unset the name property.
        if(is_array($this->dropDownListHtmlOptions)){
            if(isset($this->dropDownListHtmlOptions['name'])){
                unset($this->dropDownListHtmlOptions['name']);
            }
           if(isset($this->dropDownListHtmlOptions['class'])){
               $this->dropDownListHtmlOptions['class'] .= (' '.$class4ddl);
           }else{
              $this->dropDownListHtmlOptions['class'] = $this->gridViewId.' '.$class4ddl;
           }
        }else{
            $this->dropDownListHtmlOptions = array('class' => $class4ddl);
        }
 
        echo $this->beforeLabel ,
         CHtml::dropDownList('pageSize', $this->pageSize, $this->pageSizeOptions,$this->dropDownListHtmlOptions);
 
        $jsPluginName = "$.fn.yii{$this->listViewType}View";
 
        $jsCode = <<<ON_CHANGE
         $(".{$this->gridViewId}").change(function(){
             var url = {$jsPluginName}.getUrl('{$this->updateId}'),
                 pageSize = $(this).val();
             //handle the url String ,  pathInfo and queryString
             url = url.replace(/pageSize\/\d+/, "pageSize/"+pageSize);
             url = url.replace(/pageSize=\d+/, "pageSize="+pageSize);
             /*  you can refer here for Regexp study:https://developer.mozilla.org/en/JavaScript/Guide/Regular_Expressions 
 */
 
             {$jsPluginName}.update('{$this->updateId}',{url:url,data:{pageSize:$(this).val() }} );
         });
ON_CHANGE;
 
 
       Yii::app()->getClientScript()->registerScript($this->gridViewId,$jsCode,CClientScript::POS_READY);
 
    }
}


?>