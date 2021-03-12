<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

class SC_Model {
    private static $_instance = array();//对象数组实例，保证单例
    /**获取对象唯一实例**/
    public function &instance($model) {
        global $_SCLIENT,$_PSC;
		$model = ucfirst($model);
        if (!isset(self::$_instance[$model]) || !(self::$_instance[$model] instanceof self)) {
            //实例化模型对象
            $model_file = S_ROOT."./source/".$_SCLIENT['type']."/model/".strtolower($model).'.php';
            $model_class = $model.'Model';
            if(file_exists($model_file)) {
                include($model_file);
            }else {
				$model_file = S_ROOT."./admin/model/".strtolower($model).'.php';
				if(file_exists($model_file)){
					include($model_file);
				}else{
					echo '数据模型类文件不存在('.$model_file.')';
					exit;
				}
            }
            if(!class_exists($model_class)) {
				echo '未提供有效的数据模型类('.$model_class.')';
				exit;
            }
            $provider = new $model_class();
            if(!($provider instanceof SC_Model)) {
                echo '未提供有效的数据模型类('.$model_class.')';
				exit;
            }
            self::$_instance[$model] = $provider;
        }
        return self::$_instance[$model];
    }
}

class PSC_Model {
    private static $_instance = array();//对象数组实例，保证单例
    /**获取对象唯一实例**/
    public function &instance($model) {
        global $_SCLIENT,$_PSC;
		$model = ucfirst($model);
        if (!isset(self::$_instance[$model]) || !(self::$_instance[$model] instanceof self)) {
            //实例化模型对象
            $model_file = S_ROOT."./plugin/".$_PSC['name']."/".$_SCLIENT['type']."/model/".strtolower($model).'.php';
            $model_class = "Plug".$model.'Model';
            if(file_exists($model_file)) {
				include($model_file);
            }else {
				echo '数据模型类文件不存在('.$model_file.')';
				exit;
            }
            if(!class_exists($model_class)) {
				echo '未提供有效的数据模型类('.$model_class.')';
				exit;
            }
            $provider = new $model_class();
            if(!($provider instanceof PSC_Model)) {
                echo '未提供有效的数据模型类('.$model_class.')';
				exit;
            }
            self::$_instance[$model] = $provider;
        }
        return self::$_instance[$model];
    }
}
?>