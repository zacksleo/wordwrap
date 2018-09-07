<?php

namespace zacksleo\wordwrap;

class Wordwrap
{
    public function str2arr($str, $width)
    {
        preg_match_all('/\b[\w\s]+\b/', $str, $matches, PREG_OFFSET_CAPTURE);
        $words = array();
        foreach ($matches[0] as $match) {
            $words[$match[1]] = $match[0];
        }
        var_dump($words);
        $chars = preg_split('//u', $str, -1, PREG_SPLIT_NO_EMPTY);
        $res = array();
        $len = 0;
        $line = '';
        $index = 0;
        $j = 0;
        foreach ($chars as $i => $char) {
            if ($len >= $width * 2) {
                $res[] = $line;
                $line = '';
                $len = 0;
            }
            //英文单词
            if (mb_strwidth($char) == 1) {
                if (in_array($index, array_keys($words))) {
                    if ($len + mb_strwidth($words[$index]) >= $width * 2) {
                        $res[] = $line;
                        $line = '';
                        $len = 0;
                        continue;
                    } else {
                        $word = $words[$index];
                        $line .= $word;
                        $len += mb_strwidth($word);
                        $index += strlen($word);
                        continue;
                    }
                } else {
                    $len++;
                }
            } else {
                $len += 2;
            }
            $index += strlen($char);
            $line .= $char;
        }
        return $res;
    }
}
