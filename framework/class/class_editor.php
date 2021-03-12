<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

class SC_EDITOR{
    // 编辑器POST提交时的字段名
    public $instanceName = 'tq_editor';
    // 编辑器相当网络的根目录可以是相对或绝对,以 '/' 结束
    public $basePath = './include/Editor/';
    // 编辑器的高度,可以是 '%' 或 'px'
    public $width = '100%';
    // 只能是 'px'
    public $height = '250px';
    // 使用在线编辑器的位置 0为前台使用 1为后台使用
	public $cptype = 0;
	// 图片管理类型 0为普通类型 1为指定类型
	public $imgManagerType = 0;
    // 编辑器的初始值 html
    public $initValue = '';
    // 窗口模式 0:不能拖动 1:只能改变高度 2:可以拖动改变宽度和高度
    public $resizeMode = 1;
    // 是否显示上传图片 0:不显示 1:显示
    public $allowUpload = 1;
    // 是否显示服务器的图片 0:不显示 1:显示
    public $allowFileManager = 1;

    /**得到编辑器HTML代码**/
    public function editor(){
        if(!function_exists('_addsl')){
            function _addsl($val){
                return "'{$val}'";
            }
        }
		if(!$this->cptype){
		  $uploadJson = "cp.php?ac=editorfileupload";
		  $imgManagerJson = "cp.php?ac=editorimgmanager";
		  $fileManagerJson = "cp.php?ac=editorfilemanager";
		}else{
		  $uploadJson = "admin.php?view=editorfileupload";
		  $imgManagerJson = "admin.php?view=editorimgmanager";
		  $fileManagerJson = "admin.php?view=editorfilemanager";
		}
        $name = $this->instanceName;
        $path = $this->basePath;
        $width = $this->width;
        $height = $this->height;
		$toolbar = $this->toolbar;
		$designMode = $this->designMode;
        $items = implode(',',array_map('_addsl',$this->toolbarSet($toolbar)));
        $value  = htmlspecialchars($this->initValue);
        $resizeMode = $this->resizeMode;
        $allowUpload = $this->allowUpload;
        $allowFileManager = $this->allowFileManager;
		$imgManagerType = $this->imgManagerType;
		$html = "<script  src='{$path}kindeditor.js' type='text/javascript'></script>\n";
		$html.= "<script  src='{$path}lang/zh_CN.js' type='text/javascript'></script>\n";
		$html.="<script>
				var editor;
				KindEditor.ready(function(K) {
					editor = K.create('#$name', {
						width : '$width',
						height : '$height',
        				items :  [$items],
						uploadJson : '$uploadJson',
						imgManagerType : '$imgManagerType',
						imgManagerJson : '$imgManagerJson',
						fileManagerJson : '$fileManagerJson',
						resizeMode : $resizeMode,
						allowUpload : $allowUpload,
						designMode : $designMode,
						allowFileManager : $allowFileManager
					});
				});	
				</script>\n";
		$html.="<textarea id=".$name." name=".$name." style='visibility:hidden;'>{$value}</textarea>";
        return $html;
    }
	
	public function toolbarSet($toolbar=""){
		switch ($toolbar) {
		case "simple":
			$toolbar = array(
			'undo', 'redo', 'cut', 'copy', 'paste',
			'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
			'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
			'superscript', '|','title', 'fontname', 'fontsize', '|', 'textcolor', 'bgcolor',
			'bold','italic', 'underline', 'strikethrough', 'removeformat'
			);
			break;
		default:
			$toolbar = array(
			'source', '|', 'undo', 'redo', '|', 'preview', 'print', 'template', 'code', 'cut', 'copy', 'paste',
			'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
			'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
			'superscript', 'clearhtml', 'quickformat', '/',
			'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
			'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image', 
			'flash', 'media', 'insertfile', 'table', 'hr',  'pagebreak', 
			'anchor', 'link', 'unlink','selectall', 'fullscreen' 
			);
	    }
		return $toolbar;
	}
}

?>