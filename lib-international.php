<?php

include_once('lib-misc.php');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///// LANGUAGES /////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$__language_families = array(
	'han' => array('zh-tw', 'ja'),
	'latin' => array('en', 'fr', 'es', 'de')
);
$__languages_to_family = array();
foreach($__language_families as $family => $languages) {
	foreach($languages as $language) {
		$__languages_to_family[$language] = $family;
	}
}
$__language_to_symbol = array('zh-tw' => '中', 'ja' => '日', 'en' => '英', 'fr' => '法', 'es' => '西', 'de' => '德');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///// MULTILINGUAL //////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function _ml($array) {
	global $__language_families;
	global $__languages_to_family;
	
	$lang = _se_get('lang');
	$family = $__languages_to_family[$lang];
	
	$return = '';
	if(isset($array[$lang]))
		$return = $array[$lang];
	else {
		foreach($__language_families[$family] as $alt) {
			if(isset($array[$alt])) {
				$return = $array[$alt];
				break;
			}
		}
		if($return == '') {
			$return = (isset($array['all']) ? $array['all'] : reset($array));
		}
	}
	return $return;
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///// MULTILINGUAL DICTIONARY ///////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$__ml_dictionary = array(
	'full_title_with_link'	=> array(
		'en'	=> '<a href="http://www.letterpress.org.tw/">Taiwanese Letterpress Association</a>',
		'zh-tw' => '<a href="http://www.letterpress.org.tw/">臺灣活版印刷文化保存協會</a>',
		'ja'	=> '<a href="http://www.letterpress.org.tw/">台湾活版印刷文化保存協会</a>',
		'es'	=> '<a href="http://www.letterpress.org.tw/">Asociación de la Imprenta Tipográfica Taiwanesa</a>'),
	'full_title'	=> array(
		'en'	=> 'Taiwanese Letterpress Association',
		'zh-tw' => '臺灣活版印刷文化保存協會',
		'ja'	=> '台湾活版印刷文化保存協会',
		'es'	=> 'Asociación de la Imprenta Tipográfica Taiwanesa'),
	'full_address'	=> array(
		'en'	=> 'No 13 Lane 97 Taiyuan Rd, Datong District, Taipei City 10356 Taiwan R.O.C.',
		'zh-tw'	=> '10356 臺灣臺北市大同區太原路97巷13號',
		'ja'	=> '10356 台湾台北市大同区太原路97巷13号'),
	'license_with_link' => array(
		'en'	=> 'Creative Commons 3.0 BY-NC-SA',
		'zh-tw'	=> '<a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/tw/">創用 CC 姓名標示—非商業性—相同方式分享 3.0 台灣</a>',
		'ja'	=> 'クリエイティブコモンズ BY-NC-SA 3.0 '),
	'information_system' 	=> array('en' => 'Information System', 'zh-tw' => '資訊系統', 'ja' => '情報システム'),
	'agreement'				=> array('en' => 'Agreement',	'zh-tw' => '同意書',		'ja' => '同意書'),
	'recruiting'			=> array('en' => 'Recruiting',	'zh-tw' => '志工招募',	'ja' => 'ボランティア募集'),
	'yes'					=> array('en' => 'yes',			'zh-tw' => '是',			'ja' => 'はい',		'fr' => 'oui', 'es' => 'si'),
	'no'					=> array('en' => 'no',			'zh-tw' => '否',			'ja' => 'いいえ',		'fr' => 'non', 'es' => 'no'),
	'id'					=> array('en' => 'id',			'zh-tw' => '帳號',		'ja' => 'id'),
	'password'				=> array('en' => 'password',	'zh-tw' => '密碼',		'ja' => 'パスワード'),
	'last_name'				=> array('en' => 'last name',	'zh-tw' => '姓'),
	'first_name'			=> array('en' => 'first name',	'zh-tw' => '名'),
	'phone'					=> array('en' => 'phone',		'zh-tw' => '電話',		'ja' => '電話番号'),
	'email'					=> array('en' => 'email',		'zh-tw' => '電子郵件信箱',	'ja' => 'メールアドレス'),
	'others'				=> array('en' => 'others',		'zh-tw' => '其他',		'ja' => 'その他'),
	'anonymous'				=> array('en' => 'anonymous',	'zh-tw' => '神祕人士',	'ja' => '神秘的な人間'),
	'login'					=> array('en' => 'login',		'zh-tw' => '登入',		'ja' => 'ログイン'),
	'logout'				=> array('en' => 'logout',		'zh-tw' => '登出',		'ja' => 'ログアウト'),
	'permission_root'		=> array('en' => 'creator',	'zh-tw' => '創造者'),
	'permission_core'		=> array('en' => 'core',	'zh-tw' => '核心'),
	'permission_member'		=> array('en' => 'member',	'zh-tw' => '會員'),
	'move'			=> array('en' => 'move',			'zh-tw' => '移動'),
	'remove'		=> array('en' => 'remove',			'zh-tw' => '移除'),
	'add'			=> array('en' => 'add',				'zh-tw' => '新增'),
	'modify'		=> array('en' => 'modify',			'zh-tw' => '修改'),
	'reply'			=> array('en' => 'reply',			'zh-tw' => '回應'),
	'mark'			=> array('en' => 'mark',			'zh-tw' => '標記'),
	'generate'		=> array('en' => 'generate',		'zh-tw' => '產生'),
	'mailing_list'	=> array('en' => 'mailing list',	'zh-tw' => '電郵清單'),
	'contact_list'	=> array('en' => 'contact list',	'zh-tw' => '聯絡人清單'),
	'ok'			=> array('en' => 'ok',			'zh-tw' => '確定',			'ja' => 'ok'),
	'cancel'		=> array('en' => 'cancel',		'zh-tw' => '取消'),
	'select'		=> array('en' => 'select',		'zh-tw' => '選擇'),
	'browse'		=> array('en' => 'browse',		'zh-tw' => '瀏覽'),
	'edit'			=> array('en' => 'edit',		'zh-tw' => '編輯'),
	'organize'		=> array('en' => 'organize',	'zh-tw' => '組織'),
	'rename'		=> array('en' => 'rename',		'zh-tw' => '重新命名'),
	'title'			=> array('en' => 'title',		'zh-tw' => '標題'),
	'text'			=> array('en' => 'text',		'zh-tw' => '文字'),
	'event_none'	=> array('en' => 'no event',	'zh-tw' => '無事件'),
	'event_quicker'	=> array('en' => 'quicker',		'zh-tw' => '加速器'),
	'event_picker'	=> array('en' => 'picker',		'zh-tw' => '選擇器'),
	'event_all_day'					=> array('en' => 'all day',			'zh-tw' => '全天'),
	'event_repeat'					=> array('en' => 'repeats',			'zh-tw' => '重複'),
	'submit'						=> array('en' => 'submit',			'zh-tw' => '送出',		'ja' => 'ok'),
	'gallery_link'					=> array('en' => 'link',			'zh-tw' => '連結內容'),
	'gallery_add_to_post'			=> array('en' => 'add to post',		'zh-tw' => '加入文章'),
	'gallery_sort_by_date_desc'		=> array('en' => 'by date desc',	'zh-tw' => '時間遞減'),
	'gallery_sort_by_date_asc'		=> array('en' => 'by date asc',		'zh-tw' => '時間遞增'),
	'gallery_sort_by_name'			=> array('en' => 'by name',			'zh-tw' => '檔名'),
	'open_to_everyone'				=> array('en' => 'everyone',		'zh-tw' => '公開'),
	'open_to_member'				=> array('en' => 'member',			'zh-tw' => '會員'),
	'open_to_core'					=> array('en' => 'core',			'zh-tw' => '核心'),
	'calendar_week'					=> array('en' => 'week',			'zh-tw' => '週曆'),
	'calendar_month'				=> array('en' => 'month',			'zh-tw' => '月曆'),
	'calendar_list'					=> array('en' => 'list',			'zh-tw' => '行程表'),
	'anchor_top'					=> array('en' => 'TOP',				'zh-tw' => '頁首',		'ja' => 'TOP'),
	'anchor_calendar'				=> array('en' => 'calendar',		'zh-tw' => '行事曆',		'ja' => 'カレンダー'),
	'anchor_post_form'				=> array('en' => 'post form',		'zh-tw' => '張貼文章',	'ja' => 'フォーム'),
	'anchor_gallery'				=> array('en' => 'gallery',			'zh-tw' => '多媒體',		'ja' => 'ギャラリー'),
	'anchor_file_uploader'			=> array('en' => 'file uploader',	'zh-tw' => '檔案上傳',	'ja' => 'ファイルアップローダー'),
	'anchor_posts'					=> array('en' => 'posts',			'zh-tw' => '文章列表',	'ja' => '記事一覧'),
	'su_abbr'			=> array('en' => 'su', 'zh-tw' => '日', 'ja' => '日'),
	'mo_abbr'			=> array('en' => 'mo', 'zh-tw' => '一', 'ja' => '月'),
	'tu_abbr'			=> array('en' => 'tu', 'zh-tw' => '二', 'ja' => '火'),
	'we_abbr'			=> array('en' => 'we', 'zh-tw' => '三', 'ja' => '水'),
	'th_abbr'			=> array('en' => 'th', 'zh-tw' => '四', 'ja' => '木'),
	'fr_abbr'			=> array('en' => 'fr', 'zh-tw' => '五', 'ja' => '金'),
	'sa_abbr'			=> array('en' => 'sa', 'zh-tw' => '六', 'ja' => '土'),
	'rixing'			=> array('en' => 'Ri Xing Type Foundry', 'zh-tw' => '日星鑄字行', 'ja' => '日星鋳字行'),
	'facebook_page'		=> array('en' => 'Facebook Page',	'zh-tw' => 'Facebook 專頁',	'ja' => 'Facebook ページ')
);

function _ml_lookup($string) {
	global $__ml_dictionary;
	if(array_key_exists($string, $__ml_dictionary))
		return _ml($__ml_dictionary[$string]);
	else
		return "$string*";
}

// session
// user
function _se_user_name() {
	if(_se_exist('first_name') && _se_exist('last_name')) {
		if(_se_exist('first_name_first') && _se_get('first_name_first') == '0')
			return _se_get('last_name') . _se_get('first_name');
		return _se_get('first_name') . ' ' . _se_get('last_name');
	}
	else
		return _ml_lookup('anonymous');
}

// cal
function _se_cal_show() {
	if(!_se_exist('cal_show'))
		_se_set('cal_show', 'yes');
	return _se_get('cal_show');
}
function _se_cal_range() {
	if(!_se_exist('cal_range'))
		_se_set('cal_range', 'week');
	return _se_get('cal_range');
}

?>