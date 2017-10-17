<?php
namespace core\lib;
/**
 * 微信文章采集
 * @author wxuns
 * @link http://www.wxuns.cn
 * @since 2017年10月17日
 */
class WxCurl{
	static public $ch = '';
	public $data = [];
	public $match = [];
	/**
	 * 读取html信息
	 * @param string $url
	 * @return mixed
	 */
	public function con($url){
		self::$ch = curl_init($url);
		curl_setopt(self::$ch, CURLOPT_RETURNTRANSFER, 1);
		$content = curl_exec(self::$ch);
		curl_close(self::$ch);//关闭请求
		return $content;
	}
	/**
	 * curl筛选
	 * @param string $url
	 * @param string $patt
	 * @return array
	 */
	public function pat($url,$patt){
		$content = $this->con($url);
		//根据规则查询
		preg_match_all($patt,$content,$this->match);
		return $this->match;
	}
	/**
	 * 标题
	 * @param unknown $url
	 * @return unknown
	 */
	public function title($url){
		//把找到的数据放到数组中
		$this->match = $this->pat($url,'/<title>(.*?)<\/title>/');
		$data['title'] = $this->match[1][0];
		return $data;
	}
	/**
	 * 内容
	 * @param unknown $url
	 * @return mixed
	 */
	public function content($url){
		//把找到的数据放到数组中
		$this->match = $this->pat($url,'/<div class="rich_media_content " id="js_content">[\s\S]*?<\/div>/');
		$data['content'] = str_replace('data-src','src',str_replace('0?wx_fmt=gif', '', $this->match[0][0]));
		return $data;
	}
	/**
	 * 时间
	 * @param unknown $url
	 * @return number
	 */
	public function time($url){
		//把找到的数据放到数组中
		$this->match = $this->pat($url,'/<em id="post-date" class="rich_media_meta rich_media_meta_text">(.*?)<\/em>/');
		$data['uptime'] = strtotime($this->match[1][0]);
		return $data;
	}
	/**
	 * 图片
	 * @param unknown $url
	 * @return unknown
	 */
	public function images($url){
		//把找到的数据放到数组中
		$this->match = $this->pat($url,'/<img.*?data-src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png|\.jpeg|\.?]))[\'|\"].*?[\/]?>/');
		$data['img'] = $this->match[1];
		return $data;
	}
	/**
	 * 作者
	 * @param unknown $url
	 * @return unknown
	 */
	public function author($url){
		$this->match = $this->pat($url,'/<span class="profile_meta_value">([\s\S]*?)<\/span>/');
		$data['author'] = $this->match[1][0];
		return $data;
	}
	/**
	 * 关键字
	 * @param unknown $url
	 * @return unknown
	 */
	public function keyword($url){
		$this->match = $this->pat($url,'/<span id="copyright_logo" class="rich_media_meta meta_original_tag">(.*?)<\/span>/');
		$data['keyword'] = $this->match[1][0];
		return $data;
	}
	/**
	 * 所有
	 * @param unknown $url
	 * @return array
	 */
	public function all($url){
		$this->data = array_merge($this->title($url),
				$this->content($url),$this->time($url),$this->images($url),$this->author($url),$this->keyword($url));
		return $this->data;
	}
}