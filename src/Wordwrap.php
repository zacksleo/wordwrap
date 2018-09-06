<?php

namespace zacksleo\wordwrap;

class Wordwrap
{
    public function str2arr($str, $width)
    {
        preg_match_all('/\b[\w\s]+\b/', $str, $matches, PREG_OFFSET_CAPTURE);
        $words = array();
        foreach ($matches[0] as $match) {
            $words[] = array(
                $match[1] => $match[0]
            );
        }
        $chars = preg_split('//u', $str, -1, PREG_SPLIT_NO_EMPTY);
        $res = array();
        $len = 0;
        $line = '';
        $index = 0;
        foreach ($chars as $char) {
            if ($len >= $width * 2) {
                $res[] = $line;
                $line = '';
                $len = 0;
                continue;
            }
            //utf8
            if (mb_strwidth($char) == 2) {
                $len += 2;
            } else {
                if (in_array($index, array_keys($words)) && $len + mb_strwidth($words[$index]) > $width) {
                    $res[] = $line;
                    $line = '';
                    $len = 0;
                    continue;
                } else {
                    $len++;
                }
            }
            $index += strlen($char);
            $line .= $char;
        }
        return $res;
    }
}
