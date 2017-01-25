<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HashController extends Controller
{

    /**
     * Show the page for creating new hashes.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('hashes.create');
    }

    private function hasLessThan3IdenticalChars($comb){
        $chars = str_split($comb);
        $c = count($chars);
        for($i=0; $i < $c; $i++){
            $count = 0;
            for($j=0; $j < $c; $j++){
                if($chars[$i] == $chars[$j]){
                    if(++$count > 3)
                        return false;
                }
            }
        }
        return true;
    }

    /**
     * Store new hashes in DB.
     */
    public function store()
    {
        //Number(s): (5) server keyword = oEXHmuQPsmIObzXc - format

        set_time_limit(60*60*24);

        $limit = new DateTime("2017-01-25 07:00:00");

        $chars = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        $chars = str_split($chars);
        $c = count($chars);

        $nr = 1;
        for ($i = 0; $i < $c; ++$i) { //1
            for ($j = 0; $j < $c; ++$j) { //2
                for ($k = 0; $k < $c; ++$k) { //3
                    for ($l = 0; $l < $c; ++$l) { //4
                        for ($m = 0; $m < $c; ++$m) { //5
                            for ($n = 0; $n < $c; ++$n) { //6
                                for ($o = 0; $o < $c; ++$o) { //7
                                    for ($p = 0; $p < $c; ++$p) { //8
                                        for ($q = 0; $q < $c; ++$q) { //9
                                            for ($r = 0; $r < $c; ++$r) { //10
                                                for ($s = 0; $s < $c; ++$s) { //11
                                                    for ($t = 0; $t < $c; ++$t) { //12
                                                        for ($u = 0; $u < $c; ++$u) { //13
                                                            for ($v = 0; $v < $c; ++$v) { //14
                                                                for ($w = 0; $w < $c; ++$w) { //15
                                                                    for ($x = 0; $x < $c; ++$x) { //16
                                                                        $comb = $chars[$i] . $chars[$j] . $chars[$k] . $chars[$l] . $chars[$m] . $chars[$n] . $chars[$o] . $chars[$p] . $chars[$q] . $chars[$r] . $chars[$s] . $chars[$t]  . $chars[$u]. $chars[$v] . $chars[$w]. $chars[$x];

                                                                        if($nr >= 1000000 || new DateTime() >= $limit){
                                                                            DB::table('stages')->insert(
                                                                                ['i' => $i, 'j' => $j, 'k' => $k, 'l' => $l, 'm' => $m, 'n' => $n, 'o' => $o, 'p' => $p, 'q' => $q, 'r' => $r, 's' => $s, 't' => $t, 'u' => $u, 'v' => $v, 'w' => $w, 'x' => $x, 'nr' => $nr, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]
                                                                            );
                                                                            break;
                                                                        }

                                                                        if( preg_match( '~[A-Z]~', $comb) &&
                                                                            preg_match( '~[a-z]~', $comb) &&
                                                                            preg_match( '~\d~', $comb) &&
                                                                            $this->hasLessThan3IdenticalChars($comb)) {

                                                                            for($y=0; $y <= 36; $y++) {
                                                                                DB::table('hashes')->insert(
                                                                                    ['number' => $y, 'value' => md5("Number(s): (".$y.") server keyword = ".$comb)]
                                                                                );
                                                                            }
                                                                            $nr++;
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        return response('Created', 201);
    }
}
