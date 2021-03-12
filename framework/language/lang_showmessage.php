<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$_SGLOBAL['msglang'] = array(
	'box_title' => '消息',
	//common
	'do_success' => '进行的操作完成了',
	'no_privilege' => '您目前没有权限进行此操作',
	'no_privilege_realname' => '您需要填写真实姓名后才能进行当前操作，<a href="cp.php?ac=profile">点这里设置真实姓名</a>',
	'no_privilege_videophoto' => '您需要视频认证通过后才能进行当前操作，<a href="cp.php?ac=videophoto">点这里进行视频认证</a>',
	'no_open_videophoto' => '目前站点已经关闭视频认证功能',
	'is_blacklist' => '受对方的隐私设置影响，您目前没有权限进行本操作',
	'no_privilege_newusertime' => '您目前处于见习期间，需要等待 \\1 小时后才能进行本操作',
	'no_privilege_avatar' => '您需要设置自己的头像后才能进行本操作，<a href="cp.php?ac=avatar">点这里设置</a>',
	'no_privilege_friendnum' => '您需要添加 \\1 个好友之后，才能进行本操作，<a href="cp.php?ac=friend&op=find">点这里添加好友</a>',
	'no_privilege_email' => '您需要验证激活自己的邮箱后才能进行本操作，<a href="cp.php?ac=profile&op=contact">点这里激活邮箱</a>',
	'uniqueemail_check' => '您填入的邮箱地址已经被占用，请尝试使用其他邮箱',
	'uniqueemail_recheck' => '您要验证的邮箱地址已经激活过了，请进入个人资料重新设置自己的邮箱',
	'you_do_not_have_permission_to_visit' => '您已被禁止访问。',

	
	'submit_invalid' => '您的请求来路不正确或表单验证串不符，无法提交。请尝试使用标准的web浏览器进行操作。',
    'to_login' => '您需要先登录才能继续本操作',
	

	//source/do_login.php
	'users_were_not_empty_please_re_login' => '对不起，用户名不能为空，请重新登录',
	'login_failure_please_re_login' => '对不起,登录失败,请重新登录',

	//source/cp_common.php
	'security_exit' => '你已经安全退出了\\1',

	//source/cp_doing.php
	'should_write_that' => '至少应该写一点东西',
	'docomment_error' => '请正确指定要评论的记录',

	//source/cp_invite.php
	'mail_can_not_be_empty' => '邮件列表不能为空',
	'send_result_1' => '邮件已经送出，您的好友可能需要几分钟后才能收到邮件',
	'send_result_2' => '<strong>以下邮件发送失败:</strong><br/>\\1',
	'send_result_3' => '未找到相应的邀请记录, 邮件重发失败.',
	'there_is_no_record_of_invitation_specified' => '您指定的邀请记录不存在',

	//source/cp_import.php
	'blog_import_no_result' => '"无法获取原数据，请确认已正确输入的站点URL和帐号信息，服务器返回:<br /><textarea name=\"tmp[]\" style=\"width:98%;\" rows=\"4\">\\1</textarea>"',
	'blog_import_no_data' => '获取数据失败，请参考服务器返回:<br />\\1',
	'support_function_has_not_yet_opened fsockopen' => '站点尚未开启fsockopen函数支持，还不能使用本功能',
	'integral_inadequate' => "您现在的积分 \\1 不足以完成本次操作。本操作将需要积分: \\2",
	'experience_inadequate' => "您现在的经验值\\1 不足以完成本次操作。本操作将需要经验值: \\2",
	'url_is_not_correct' => '输入的网站URL不正确',
	'choose_at_least_one_log' => '请至少选择一个要导入的日志',

	//source/cp_friend.php
	'friends_add' => '您和 \\1 成为好友了',
	'you_have_friends' => '你们已经是好友了',
	'enough_of_the_number_of_friends' => '您当前的好友数目达到系统限制，请先删除部分好友',
	'enough_of_the_number_of_friends_with_magic' => '您当前的好友数目达到系统限制，<a id="a_magic_friendnum2" href="magic.php?mid=friendnum" onclick="ajaxmenu(event, this.id, 1)">使用好友增容卡增容</a>',
	'request_has_been_sent' => '好友请求已经发送，请等待对方验证中',
	'waiting_for_the_other_test' => '正在等待对方验证中',
	'please_correct_choice_groups_friend' => '请正确选择分组好友',
	'specified_user_is_not_your_friend' => '指定的用户还不是您的好友',

	//source/cp_pm.php
	'this_message_could_not_be_deleted' => '指定的短消息不能被删除',
	'unable_to_send_air_news' => '不能发送空消息',
	'message_can_not_send' => '对不起，发送短消息失败',
	'message_can_not_send1' => '发送失败，您当前超出了24小时最大允许发送短消息数目',
	'message_can_not_send2' => '两次发送短消息太快，请稍等一下再发送',
	'message_can_not_send3' => '您不能给非好友批量发送短消息',
	'message_can_not_send4' => '目前您还不能使用发送短消息功能',
	'not_to_their_own_greeted' => '不能向自己打招呼',
	'has_been_hailed_overlooked' => '招呼已经忽略了',

	//source/cp_profile.php
	'realname_too_short' => '真实姓名不能少于4个字符',
	'update_on_successful_individuals' => '个人资料更新成功了',

	//source/cp_sendmail.php
	'email_input' => '您还没有设置邮箱，请在<a href="cp.php?ac=profile&op=contact">联系方式</a>中准确填写您的邮箱',
	'email_check_sucess' => '您的邮箱（\\1）验证激活完成了',
	'email_check_error' => '您输入的邮箱验证链接不正确。您可以在个人资料页面，重新接收新的邮箱验证链接。',
	'email_check_send' => '验证邮箱的激活链接已经发送到您刚才填写的邮箱,您会在几分钟之内收到激活邮件，请注意查收。',
	'email_error' => '填写的邮箱格式错误,请重新填写',

	//source/cp_upload.php
	'upload_images_completed' => '上传图片完成了',


	//source/space_album.php
	'to_view_the_photo_does_not_exist' => '出问题了，您要查看的图库不存在',

	//source/space_blog.php
	'view_to_info_did_not_exist' => '出问题了，您要查看的信息不存在或者已经被删除',

	//source/space_pic.php
	'view_images_do_not_exist' => '您要查看的图片不存在',

	//source/mt_thread.php
	'topic_does_not_exist' => '指定的话题不存在',

	//source/do_inputpwd.php
	'news_does_not_exist' => '指定的信息不存在',
	'proved_to_be_successful' => '验证成功，现在进入查看页面',
	'password_is_not_passed' => '输入的网站登录密码不正确,请返回重新确认',



	//source/do_login.php
	'login_success' => '登录成功了，现在引导您进入登录前页面 \\1',
	'not_open_registration' => '非常抱歉，本站目前暂时不开放注册',
	'not_open_registration_invite' => '非常抱歉，本站目前暂时不允许用户直接注册，需要有好友邀请链接才能注册',

	//source/do_lostpasswd.php
	'getpasswd_account_notmatch' => '您的账户资料中没有完整的Email地址，不能使用取回密码功能，如有疑问请与管理员联系。',
	'getpasswd_email_notmatch' => '输入的Email地址与用户名不匹配，请重新确认。',
	'getpasswd_send_succeed' => '取回密码的方法已经通过 Email 发送到您的信箱中，<br />请在 3 天之内修改您的密码。',
	'user_does_not_exist' => '该用户不存',
	'getpasswd_illegal' => '您所用的 ID 不存在或已经过期，无法取回密码。',
	'profile_passwd_illegal' => '密码空或包含非法字符，请返回重新填写。',
	'getpasswd_succeed' => '您的密码已重新设置，请使用新密码登录。',
	'getpasswd_account_invalid' => '对不起，创始人、受保护用户或有站点设置权限的用户不能使用取回密码功能，请返回。',
	'reset_passwd_account_invalid' => '对不起，创始人、受保护用户或有站点设置权限的用户不能使用密码重置功能，请返回。',

	//source/do_register.php
	'registered' => '注册成功了，进入个人空间',
	'regguide' => '注册成功了，请根据导航进行个人设置',
	'system_error' => '系统错误，未找到UCenter Client文件',
	'password_inconsistency' => '两次输入的密码不一致',
	'profile_passwd_illegal' => '密码空或包含非法字符，请重新填写。',
	'user_name_is_not_legitimate' => '用户名不合法',
	'include_not_registered_words' => '用户名包含不允许注册的词语',
	'user_name_already_exists' => '用户名已经存在',
	'email_format_is_wrong' => '填写的 Email 格式有误',
	'email_not_registered' => '填写的 Email 不允许注册',
	'email_has_been_registered' => '填写的 Email 已经被注册',
	'regip_has_been_registered' => '同一个IP在 \\1 小时内只能注册一个账号',
	'register_error' => '注册失败',



);

?>