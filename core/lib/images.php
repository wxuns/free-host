<?php
namespace core\lib;
/**
 * 图片处理类
 * @author wxuns
 * @link http://www.wxuns.cn
 * @since 2017年10月22日
 */
class Images{
	/**
	 * 创建缩略图
	 * @param string $filename
	 * @param string $dw
	 * @param string $dh
	 * @param string $savepath
	 */
	function createSrc($filename,$dw,$dh,$savepath) {
		//创建画布
		//①源画布
		list($sw,$sh,$type) = getimagesize($filename);
		$arr = array(
				1 => 'imagecreatefromgif',
				2 => 'imagecreatefromjpeg',
				3 => 'imagecreatefrompng',
				4 => 'imagecreatefromswf',
				5 => 'imagecreatefrompsd'
		);
		$src = $arr[$type]($filename);
		//②目标画布
		$dct = imagecreatetruecolor($dw, $dh);
		//创建颜料
		$white = imagecolorallocate($dct, 34, 34, 34);
		//填充颜料
		imagefill($dct, 0, 0, $white);
		//计算缩略比
		$pro = min($dw/$sw,$dh/$sh);
		$pw = $sw*$pro;
		$ph = $sh*$pro;
		//copy图片至缩略图
		imagecopyresampled($dct, $src, ($dw-$pw)/2,  ($dh-$ph)/2, 0, 0, $pw, $ph, $sw, $sh);
		//保存图片
		imagepng($dct,$savepath);
		//销毁画布
		imagedestroy($src);
		imagedestroy($dct);
	}
	/**
	 * 获得随机字符串
	 * @param number $num
	 * @return string
	 */
	function getRand($num = 6) {
		$str = 'qwertyuiopasdfghjklzxcvbnm123456789QWERTYUIOPASDFGHJKLZXCVBNM';
		return substr(str_shuffle($str), 0,$num);
	}
}