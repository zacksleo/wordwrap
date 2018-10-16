<?php
namespace zacksleo\wordwrap\tests;

use zacksleo\wordwrap\Wordwrap;

/**
 *
 */
class WordwrapTest extends \PHPUnit_Framework_TestCase
{
    public function testStr2arr()
    {
        $wordwrap = new Wordwrap();
        $res = $wordwrap->str2arr('特价 澳洲进口Aptamil pro爱他美白金版牛奶4段900g/罐【包邮】【税费补贴】', 18);
        $this->assertSame('特价 澳洲进口Aptamil pro爱他美白金版', $res[0]);

        $res2 = $wordwrap->str2arr('日本Shiseido资生堂悦薇珀翡塑颜亮肤霜 50ml国际版【香港直邮】', 11);
        $this->assertSame('日本Shiseido资生堂悦薇', $res2[0]);

        $res3 = $wordwrap->str2arr("美国KIEHL'S科颜氏3件套套装高保湿面霜125ml+金盏花水500ml+牛油果眼霜28g【香港直邮】", 11);
        $this->assertSame("美国KIEHL'S科颜氏3件套", $res3[0]);

        $res4 = $wordwrap->str2arr("ALBION/奥尔滨 爽肤精萃液 330ML + 清新莹白渗透乳 保湿型 200G 组合装", 11);
        $this->assertSame("ALBION/奥尔滨 爽肤精萃", $res4[0]);

        $res5 = $wordwrap->str2arr("【3盒】韩国MEDIHEAL美迪惠尔/可莱丝NMF补水保湿针剂面膜 10片", 11);
        $this->assertSame("【3盒】韩国MEDIHEAL美迪", $res5[0]);

        $res6 = $wordwrap->str2arr("【韩国直邮】Sulwhasoo雪花秀 雪花秀 宫中蜜皂礼盒套装 100g", 11);
        $this->assertSame("【韩国直邮】Sulwhasoo雪", $res6[0]);
    }
}
