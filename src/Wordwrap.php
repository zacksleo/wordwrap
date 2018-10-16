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
        $chars = preg_split('//u', $str, -1, PREG_SPLIT_NO_EMPTY);
        $res = array();
        $len = 0;
        $line = '';
        $index = 0;
        $j = 0;

        for ($i = 0; $i < count($chars); $i++) {
            $char = $chars[$i];
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
                        $i = $i + mb_strwidth($word)-1;
                        if ($i >= count($chars)) {
                            $res[] = $line;
                        }
                        continue;
                    }
                } else {
                    $len++;
                }
            } else {
                $len += 2;
            }
           $line .= $char;
           $index += strlen($char);
            if ($len >= $width * 2) {
                $res[] = $line;
                $line = '';
                $len = 0;
            }
        }
        if(!empty($line)){
            $res[] = $line;
        }
        return $res;
    }
}
