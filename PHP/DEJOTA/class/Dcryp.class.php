<?php

class Dcryp {


  public static function encrypt($text){
    $encrypted = self::$keyde[rand(0,255)];
    $tam = strlen($text);
    for ($i=0; $i < $tam; $i++) {
      $encrypted .= self::$keyde[ord($text[$i])];
    }
    $encrypted .= self::$keyde[rand(0,255)];
    return $encrypted;
  }

  public static function decrypt($text){
    $decrypted = '';
    $tam = (strlen($text)/2)-1;
    for ($i=1; $i < $tam; $i++) {
      $j = $i*2;
      $decrypted .= chr(self::$keyen[$text[$j].$text[$j+1]]);
    }
    return $decrypted;
  }

  private static $keyde = array('F4','j8','p9','R5', 'O3', 'E5', 'T8', 'V4', 'J7', 'B1', 'U7', 'X1', 'z0', 'S4', 'g4', 'I3', 'i9', 'z6', 'T7', 'T5', 'u6', 'F2', 'l1', 'U1', 'j2', 'H3', 'P6', 'q4', 'd2', 'L9', 'q9', 'D9', 'l8', 'o5', 'G6', 'N5', 'u4', 'Z8', 'M3', 'v1', 'k3', 'w0', 'f4', 'b6', 'o8', 'f5', 'i4', 'k7', 'e1', 'q5', 'K9', 'i2', 'w5', 'A0', 'e6', 'u5', 'l0', 'i6', 'r3', 'f1', 'e7', 'H5', 'I6', 'y6', 'B5', 'U8', 'f7', 'j1', 'L6', 'X2', 'N4', 'Z0', 'z7', 't6', 'A7', 'J2', 't1', 'm7', 'H9', 'g2', 'J4', 'M2', 'D0', 'H0', 'X5', 'P7', 't2', 'U2', 'Q9', 'D6', 'y7', 'S2', 's2', 'Y5', 'm5', 't7', 'S9', 'e9', 'j0', 'T6', 'K8', 'w3', 'G2', 'g1', 'E8', 'N7', 'v7', 'H4', 'w1', 'i3', 'h9', 'i5', 'y0', 'J9', 'v3', 'p8', 'G0', 'D8', 'h1', 'P2', 'S8', 'd1', 'C4', 'W1', 'y1', 'R1', 'V3', 'A5', 'P8', 'p4', 'B8', 's1', 'n5', 'W0', 'B3', 'g0', 'C8', 'L2', 'Q8', 'r5', 'r6', 'S5', 'o3', 'E9', 't3', 'x0', 'R0', 'b1', 'D3', 'M6', 'g5', 'G3', 't5', 'V1', 'R4', 'o4', 'h6', 'g9', 'o6', 'f0', 'o2', 'D1', 'M7', 'O8', 'N8', 'Q4', 'u3', 'd5', 'n8', 'r0', 'e0', 'z4', 'j3', 'm4', 't4', 'L8', 'Y7', 'Q6', 'D7', 'c4', 'P1', 'W5', 'r1', 'g3', 'V9', 'q0', 'B9', 'w7', 'Y0', 'd7', 'q1', 'K4', 'l4', 'L0', 'P9', 'I7', 'n0', 'O0', 'r8', 'L5', 'M5', 'X0', 'q8', 'a0', 'G1', 'm9', 'T1', 'B6', 'G7', 'c7', 'E4', 'D4', 'z8', 'h3', 'm0', 'y8', 'M0', 'V5', 'j4', 'Y2', 'N3', 'P3', 'x5', 'K6', 'E0', 'i7', 'E6', 's8', 's9', 'Q1', 'l9', 'a4', 'R3', 'x6', 'z5', 'D5', 'p5', 'p7', 'n9', 'u8', 'U0', 'I4', 'L3', 'R9', 'i8', 'w8', 'O4', 'Y8', 'W3', 's3', 'H2', 'U5', 'u1', 'T3', 'e4', 'w6');

  private static $keyen = array('F4' => 0, 'j8' => 1, 'p9' => 2, 'R5' => 3, 'O3' => 4, 'E5' => 5, 'T8' => 6, 'V4' => 7, 'J7' => 8, 'B1' => 9, 'U7' => 10, 'X1' => 11, 'z0' => 12, 'S4' => 13, 'g4' => 14, 'I3' => 15, 'i9' => 16, 'z6' => 17, 'T7' => 18, 'T5' => 19, 'u6' => 20, 'F2' => 21, 'l1' => 22, 'U1' => 23, 'j2' => 24, 'H3' => 25, 'P6' => 26, 'q4' => 27, 'd2' => 28, 'L9' => 29, 'q9' => 30, 'D9' => 31, 'l8' => 32, 'o5' => 33, 'G6' => 34, 'N5' => 35, 'u4' => 36, 'Z8' => 37, 'M3' => 38, 'v1' => 39, 'k3' => 40, 'w0' => 41, 'f4' => 42, 'b6' => 43, 'o8' => 44, 'f5' => 45, 'i4' => 46, 'k7' => 47, 'e1' => 48, 'q5' => 49, 'K9' => 50, 'i2' => 51, 'w5' => 52, 'A0' => 53, 'e6' => 54, 'u5' => 55, 'l0' => 56, 'i6' => 57, 'r3' => 58, 'f1' => 59, 'e7' => 60, 'H5' => 61, 'I6' => 62, 'y6' => 63, 'B5' => 64, 'U8' => 65, 'f7' => 66, 'j1' => 67, 'L6' => 68, 'X2' => 69, 'N4' => 70, 'Z0' => 71, 'z7' => 72, 't6' => 73, 'A7' => 74, 'J2' => 75, 't1' => 76, 'm7' => 77, 'H9' => 78, 'g2' => 79, 'J4' => 80, 'M2' => 81, 'D0' => 82, 'H0' => 83, 'X5' => 84, 'P7' => 85, 't2' => 86, 'U2' => 87, 'Q9' => 88, 'D6' => 89, 'y7' => 90, 'S2' => 91, 's2' => 92, 'Y5' => 93, 'm5' => 94, 't7' => 95, 'S9' => 96, 'e9' => 97, 'j0' => 98, 'T6' => 99, 'K8' => 100, 'w3' => 101, 'G2' => 102, 'g1' => 103, 'E8' => 104, 'N7' => 105, 'v7' => 106, 'H4' => 107, 'w1' => 108, 'i3' => 109, 'h9' => 110, 'i5' => 111, 'y0' => 112, 'J9' => 113, 'v3' => 114, 'p8' => 115, 'G0' => 116, 'D8' => 117, 'h1' => 118, 'P2' => 119, 'S8' => 120, 'd1' => 121, 'C4' => 122, 'W1' => 123, 'y1' => 124, 'R1' => 125, 'V3' => 126, 'A5' => 127, 'P8' => 128, 'p4' => 129, 'B8' => 130, 's1' => 131, 'n5' => 132, 'W0' => 133, 'B3' => 134, 'g0' => 135, 'C8' => 136, 'L2' => 137, 'Q8' => 138, 'r5' => 139, 'r6' => 140, 'S5' => 141, 'o3' => 142, 'E9' => 143, 't3' => 144, 'x0' => 145, 'R0' => 146, 'b1' => 147, 'D3' => 148, 'M6' => 149, 'g5' => 150, 'G3' => 151, 't5' => 152, 'V1' => 153, 'R4' => 154, 'o4' => 155, 'h6' => 156, 'g9' => 157, 'o6' => 158, 'f0' => 159, 'o2' => 160, 'D1' => 161, 'M7' => 162, 'O8' => 163, 'N8' => 164, 'Q4' => 165, 'u3' => 166, 'd5' => 167, 'n8' => 168, 'r0' => 169, 'e0' => 170, 'z4' => 171, 'j3' => 172, 'm4' => 173, 't4' => 174, 'L8' => 175, 'Y7' => 176, 'Q6' => 177, 'D7' => 178, 'c4' => 179, 'P1' => 180, 'W5' => 181, 'r1' => 182, 'g3' => 183, 'V9' => 184, 'q0' => 185, 'B9' => 186, 'w7' => 187, 'Y0' => 188, 'd7' => 189, 'q1' => 190, 'K4' => 191, 'l4' => 192, 'L0' => 193, 'P9' => 194, 'I7' => 195, 'n0' => 196, 'O0' => 197, 'r8' => 198, 'L5' => 199, 'M5' => 200, 'X0' => 201, 'q8' => 202, 'a0' => 203, 'G1' => 204, 'm9' => 205, 'T1' => 206, 'B6' => 207, 'G7' => 208, 'c7' => 209, 'E4' => 210, 'D4' => 211, 'z8' => 212, 'h3' => 213, 'm0' => 214, 'y8' => 215, 'M0' => 216, 'V5' => 217, 'j4' => 218, 'Y2' => 219, 'N3' => 220, 'P3' => 221, 'x5' => 222, 'K6' => 223, 'E0' => 224, 'i7' => 225, 'E6' => 226, 's8' => 227, 's9' => 228, 'Q1' => 229, 'l9' => 230, 'a4' => 231, 'R3' => 232, 'x6' => 233, 'z5' => 234, 'D5' => 235, 'p5' => 236, 'p7' => 237, 'n9' => 238, 'u8' => 239, 'U0' => 240, 'I4' => 241, 'L3' => 242, 'R9' => 243, 'i8' => 244, 'w8' => 245, 'O4' => 246, 'Y8' => 247, 'W3' => 248, 's3' => 249, 'H2' => 250, 'U5' => 251, 'u1' => 252, 'T3' => 253, 'e4' => 254, 'w6' => 255);



}
// $array = [];
// //91 a 96 remove
// for ($i=0; $i <= 255 ; $i++) {
//   while (true) {
//     $r = rand(65, 122);
//     $key = chr($r).rand(0,9);
//     if (($r<91 || $r>96) && !in_array($key, $array) ):
//       $array[] = $key;
//       break;
//     endif;
//   }
// }
