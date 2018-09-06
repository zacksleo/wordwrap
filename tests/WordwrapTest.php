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
        $res = $wordwrap->str2arr('特价 澳洲进口Aptamil pro爱他美白金版牛奶4段900g/罐【包邮】【税费补贴】', 10);
        $this->assertSame('特价 澳洲进口Aptamil', $res[0]);
    }
}
