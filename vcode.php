<?php
function rcode($size = 4)
{
    if($size <= 0 || empty($size) || !isset($size))
    {
        $size = 4;
    }

    //验证码内容
    $code_array = array(
        0,1,2,3,4,5,6,7,8,9
    );

    $random_keys = array();
    for($i = 0; $i < $size; $i++)
    {
        $keys = array_rand($code_array,1);

        array_push($random_keys,$code_array[$keys]);
    }

    //数组转成字符串
    $verification_code = implode('',$random_keys);

    return $verification_code;

}
/**
 * 生成随机数字验证码图片
 *
 * @param string $code 验证码内容
 *
 * @param string $member_id 会员id
 *
 * @param string $width 图片宽度
 *
 * @param string $height 图片宽度
 *
 * @return string
 */
function vcode($member_id = '',$width = 80,$height = 40)
{
    $code = rcode();
    if(empty($member_id) || !isset($member_id))
    {
        return false;
    }

    //验证码图片保存路径，文件名称
    $file_name = '../img/vcode/'.$member_id.'.png';

    $img = imagecreatetruecolor($width, $height);
    $black = imagecolorallocate($img, 0x00, 0x00, 0x00);
    $green = imagecolorallocate($img, 0x00, 0xFF, 0x00);
    $white = imagecolorallocate($img, 0xFF, 0xFF, 0xFF);
    imagefill($img,0,0,$white);

    imagestring($img, 5, 22, 12, $code, $black);
    //加入噪点干扰
    for($i=0;$i<100;$i++) {
        imagesetpixel($img, rand(0, $width) , rand(0, $width) , $black);
        imagesetpixel($img, rand(0, $width) , rand(0, $width) , $green);
    }
    imagepng($img,$file_name);  //保存图片
    imagedestroy($img);  //图像处理完成后，使用 imagedestroy() 指令销毁图像资源以释放内存，虽然该函数不是必须的，但使用它是一个好习惯。
    //echo ;
    return $code;
}