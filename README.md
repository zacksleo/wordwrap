# wordwrap

中英混排字符串均等分割


## install

`composer require zacksleo/wordwrap`

## usage

```php
$wordwrap = new Wordwrap();
$res = $wordwrap->str2arr('特价 澳洲进口Aptamil pro爱他美白金版牛奶4段900g/罐【包邮】【税费补贴】', 18);
print_r($res);
```

```text
Array
(
    [0] => 特价 澳洲进口Aptamil pro爱他美白金版
    [1] => 牛奶4段900g/罐【包邮】【税费补贴】
)
```

```php
$res2 = $wordwrap->str2arr('日本Shiseido资生堂悦薇珀翡塑颜亮肤霜 50ml国际版【香港直邮】', 11);
print_r($res2);
```

```text
Array
(
    [0] => 日本Shiseido资生堂悦薇
    [1] => 珀翡塑颜亮肤霜 50ml国际
    [2] => 版【香港直邮】
)
```

```php
$res3 = $wordwrap->str2arr("美国KIEHL'S科颜氏3件套套装高保湿面霜125ml+金盏花水500ml+牛油果眼霜28g【香港直邮】", 11);
print_r($res3);
```

```text
Array
(
    [0] => 美国KIEHL'S科颜氏3件套
    [1] => 套装高保湿面霜125ml+金
    [2] => 盏花水500ml+牛油果眼霜
    [3] => 28g【香港直邮】
)
```

```php
$res4 = $wordwrap->str2arr("ALBION/奥尔滨 爽肤精萃液 330ML + 清新莹白渗透乳 保湿型 200G 组合装", 11);
print_r($res4);
```

```text
Array
(
    [0] => ALBION/奥尔滨 爽肤精萃
    [1] => 液 330ML + 清新莹白渗透
    [2] => 乳 保湿型 200G 组合装
)
```

```php
$res5 = $wordwrap->str2arr("【3盒】韩国MEDIHEAL美迪惠尔/可莱丝NMF补水保湿针剂面膜 10片", 11);
print_r($res5);
```

```text
Array
(
    [0] => 【3盒】韩国MEDIHEAL美迪
    [1] => 惠尔/可莱丝NMF补水保湿
    [2] => 针剂面膜 10片
)
```

```php
$res6 = $wordwrap->str2arr("【韩国直邮】Sulwhasoo雪花秀 雪花秀 宫中蜜皂礼盒套装 100g", 11);
print_r($res6);
```

```text
Array
(
    [0] => 【韩国直邮】Sulwhasoo雪
    [1] => 花秀 雪花秀 宫中蜜皂礼
    [2] => 盒套装 100g
)
```