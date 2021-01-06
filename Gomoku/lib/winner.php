<?php

function convert_board(&$orig_board)
{
    $board = [];
    foreach ($orig_board as $i => &$row) {
        $board[$row['x']][$row['y']] = &$row;
    }
    return ($board);
}


function check_winner(){

    global $mysqli;
    $orig_board = read_board();
    $board = convert_board($orig_board);

    $Bcount = 0;
    $Wcount = 0;
}

//Checking horizontally from left to right
if ($Bcount == 0 && $Wcount == 0) {

    for ($i = 15; $i >= 1; $i--) {
        for($j = 1; $j <= 15; $j++){
            if ($Bcount != 5 && $Wcount != 5) {
                if ($board[$i][$j]['piece_color'] == 'B') {
                    $Bcount++;
                    $Wcount = 0;
                } elseif ($board[$i][$j]['piece_color'] == 'W') {
                    $Bcount = 0;
                    $Wcount++;
                } elseif ($board[$i][$j]['piece_color'] != 'W' || $board[$i][$j]['piece_color'] != 'B') {
                    $Bcount = 0;
                    $Wcount = 0;
                }
            }
        }
        if ($Bcount == 5 || $Wcount == 5) {
            break;
        } else {
            $Wcount = 0;
            $Bcount = 0;
        }
        }

    }

//Checking vertically from bottom to top
if ($Bcount == 0 && $Wcount == 0) {
    for ($i = 15; $i >= 1; $i--) {
        for ($j = 15; $j >= 1; $j--) {
            if ($Bcount != 5 && $Wcount != 5) {
                if ($Bcount[$j][$i]['piece_color'] == 'B') {
                    $Bcount++;
                    $Wcount = 0;
                } elseif ($board[$j][$i]['piece_color'] == 'W') {
                    $Bcount = 0;
                    $Wcount++;
                } elseif ($board[$j][$i]['piece_color'] != 'W' || $board[$i][$j]['piece_color'] != 'B') {
                    $Bcount = 0;
                    $Wcount = 0;
                }
            }
        }
        if ($Bcount == 5 || $Wcount == 5) {
            break;
        } else {
            $Bcount = 0;
            $Wcount = 0;
        }
    }
}



    //checking diagonals from bottom row 
    if ($Bcount == 0 && $Wcount == 0) {
        $c = 15;
        for ($r = 1; $r <= 11; $r++) {
            if ($r == 1) {
                $f = 1;
                $l = 15;
                $y = $r;
                $x = $c;
            } elseif ($r == 2) {
                $f = 2;
                $l = 15;
                $y = $r;
                $x = $c;
            } elseif ($r == 3) {
                $f = 3;
                $l = 15;
                $y = $r;
                $x = $c;
            } elseif ($r == 4) {
                $f = 4;
                $l = 15;
                $y = $r;
                $x = $c;
            } elseif ($r == 5) {
                $f = 5;
                $l = 15;
                $y = $r;
                $x = $c;
            }elseif ($r == 6) {
                $f = 6;
                $l = 15;
                $y = $r;
                $x = $c;
            }elseif ($r == 7) {
                $f = 7;
                $l = 15;
                $y = $r;
                $x = $c;
            }elseif ($r == 8) {
                $f = 8;
                $l = 15;
                $y = $r;
                $x = $c;
            }elseif ($r == 9) {
                $f = 9;
                $l = 15;
                $y = $r;
                $x = $c;
            }elseif ($r == 10) {
                $f = 10;
                $l = 15;
                $y = $r;
                $x = $c;
            }elseif ($r == 11) {
                $f = 11;
                $l = 15;
                $y = $r;
                $x = $c;
            }

            while ($x >= $f && $y <= $l) {
                if ($Bcount != 5 && $Wcount != 5) {
                    if ($board[$x][$y]['piece_color'] == 'B') {
                        $Bcount++;
                        $Wcount = 0;
                    } elseif ($board[$x][$y]['piece_color'] == 'W') {
                        $Wcount++;
                        $Bcount = 0;
                    } elseif ($board[$x][$y]['piece_color'] != 'W' || $board[$x][$y]['piece_color'] != 'B') {
                        $Bcount = 0;
                        $Wcount = 0;
                    }
                }

                $x--;
                $y++;
            }
            if ($Bcount == 5 || $Wcount == 5) {
                break;
            } else {
                $Bcount = 0;
                $Wcount = 0;
            }
        }
    }

    //checking diagonals from bottom row 
    if ($Bcount == 0 && $Wcount == 0) {
        $c = 15;
        for ($r = 15; $r >= 11; $r--) {
            if ($r == 15) {
                $f = 1;
                $l = 1;
                $y = $r;
                $x = $c;
            } elseif ($r == 14) {
                $f = 2;
                $l = 1;
                $y = $r;
                $x = $c;
            } elseif ($r == 13) {
                $f = 3;
                $l = 1;
                $y = $r;
                $x = $c;
            } elseif ($r == 12) {
                $f = 4;
                $l = 1;
                $y = $r;
                $x = $c;
            } elseif ($r == 11) {
                $f = 5;
                $l = 1;
                $y = $r;
                $x = $c;
            }elseif ($r == 10) {
                $f = 6;
                $l = 1;
                $y = $r;
                $x = $c;
            }elseif ($r == 9) {
                $f = 7;
                $l = 1;
                $y = $r;
                $x = $c;
            }elseif ($r == 8) {
                $f = 8;
                $l = 1;
                $y = $r;
                $x = $c;
            }elseif ($r == 7) {
                $f = 9;
                $l = 1;
                $y = $r;
                $x = $c;
            }elseif ($r == 6) {
                $f = 10;
                $l = 1;
                $y = $r;
                $x = $c;
            }elseif ($r == 5) {
                $f = 11;
                $l = 1;
                $y = $r;
                $x = $c;
            }

            while ($x >= $f && $y <= $l) {
                if ($Bcount != 5 && $Wcount != 5) {
                    if ($board[$x][$y]['piece_color'] == 'B') {
                        $Bcount++;
                        $Wcount = 0;
                    } elseif ($board[$x][$y]['piece_color'] == 'W') {
                        $Wcount++;
                        $Bcount = 0;
                    } elseif ($board[$x][$y]['piece_color'] != 'W' || $board[$x][$y]['piece_color'] != 'B') {
                        $Bcount = 0;
                        $Wcount = 0;
                    }
                }

                $x--;
                $y--;
            }
            if ($Bcount == 5 || $Wcount == 5) {
                break;
            } else {
                $Bcount = 0;
                $Wcount = 0;
            }
        }
    }
//checking diagonal 14,2
    if ($Bcount == 0 && $Wcount == 0) {
        $r = 1;
        for ($c = 14; $c >=10 ; $c--) {
            if ($c == 14) {
                $f = 1;
                $l = 14;
                $y = $r;
                $x = $c;
            } elseif ($c == 13) {
                $f = 1;
                $l = 13;
                $y = $r;
                $x = $c;
            } elseif ($c == 12) {
                $f = 1;
                $l = 12;
                $y = $r;
                $x = $c;
            } elseif ($c == 11) {
                $f = 1;
                $l = 11;
                $y = $r;
                $x = $c;
            } elseif ($c == 10) {
                $f = 1;
                $l = 10;
                $y = $r;
                $x = $c;
            }elseif ($c == 9) {
                $f = 1;
                $l = 9;
                $y = $r;
                $x = $c;
            }elseif ($r == 8) {
                $f = 1;
                $l = 8;
                $y = $r;
                $x = $c;
            }elseif ($c == 7) {
                $f = 1;
                $l = 7;
                $y = $r;
                $x = $c;
            }elseif ($c == 6) {
                $f = 1;
                $l = 6;
                $y = $r;
                $x = $c;
            }elseif ($c == 5) {
                $f = 1;
                $l = 5;
                $y = $r;
                $x = $c;
            }

            while ($x >= $f && $y <= $l) {
                if ($Bcount != 5 && $Wcount != 5) {
                    if ($board[$x][$y]['piece_color'] == 'B') {
                        $Bcount++;
                        $Wcount = 0;
                    } elseif ($board[$x][$y]['piece_color'] == 'W') {
                        $Wcount++;
                        $Bcount = 0;
                    } elseif ($board[$x][$y]['piece_color'] != 'W' || $board[$x][$y]['piece_color'] != 'B') {
                        $Bcount = 0;
                        $Wcount = 0;
                    }
                }

                $x--;
                $y++;
            }
            if ($Bcount == 5 || $Wcount == 5) {
                break;
            } else {
                $Bcount = 0;
                $Wcount = 0;
            }
        }
    }

    if ($Bcount == 0 && $Wcount == 0) {
        $r = 15;
        for ($c = 14; $c >= 10; $c--) {
            if ($c == 14) {
                $f = 1;
                $l = 2;
                $y = $r;
                $x = $c;
            } elseif ($c == 13) {
                $f = 1;
                $l = 3;
                $y = $r;
                $x = $c;
            } elseif ($c == 12) {
                $f = 1;
                $l = 4;
                $y = $r;
                $x = $c;
            } elseif ($c == 11) {
                $f = 1;
                $l = 5;
                $y = $r;
                $x = $c;
            } elseif ($c == 10) {
                $f = 1;
                $l = 6;
                $y = $r;
                $x = $c;
            }elseif ($c == 9) {
                $f = 1;
                $l = 7;
                $y = $r;
                $x = $c;
            }elseif ($r == 8) {
                $f = 1;
                $l = 8;
                $y = $r;
                $x = $c;
            }elseif ($c == 7) {
                $f = 1;
                $l = 9;
                $y = $r;
                $x = $c;
            }elseif ($c == 6) {
                $f = 1;
                $l = 10;
                $y = $r;
                $x = $c;
            }elseif ($c == 5) {
                $f = 1;
                $l = 11;
                $y = $r;
                $x = $c;
            }

            while ($x >= $f && $y <= $l) {
                if ($Bcount != 5 && $Wcount != 5) {
                    if ($board[$x][$y]['piece_color'] == 'B') {
                        $Bcount++;
                        $Wcount = 0;
                    } elseif ($board[$x][$y]['piece_color'] == 'W') {
                        $Wcount++;
                        $Bcount = 0;
                    } elseif ($board[$x][$y]['piece_color'] != 'W' || $board[$x][$y]['piece_color'] != 'B') {
                        $Bcount = 0;
                        $Wcount = 0;
                    }
                }

                $x--;
                $y--;
            }
            if ($Bcount == 5 || $Wcount == 5) {
                break;
            } else {
                $Bcount = 0;
                $Wcount = 0;
            }
        }
    }



    if ($Bcount == 5) {
        $sql = "update game_status set status='ended', result='B',p_turn=null where p_turn is not null and status='started'";
        $st = $mysqli->prepare($sql);
        $r = $st->execute();
    } elseif ($Wcount == 5) {
        $sql = "update game_status set status='ended', result='W',p_turn=null where p_turn is not null and status='started'";
        $st = $mysqli->prepare($sql);
        $r = $st->execute();
    }


?>