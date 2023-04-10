<?php declare(strict_types=1);
include "Function.php";
use PHPUnit\Framework\TestCase;
class FunctionTestDate extends TestCase {

    //<!-- ======= DateFunctionTC ======= -->
    public function testDayc01(){
        $obj = new DataAndGrade();
        $this->assertEquals(true,$obj->DateFunction("20","02","2023"));        //  tc1 Fulldate true (Pass)
        $this->assertEquals(false,$obj->DateFunction("","02","2023"));         //  tc2 errorFulldate false (Pass)
        $this->assertEquals(true,$obj->DateFunction("20","02","4"));           //  tc3 month2day29 true (Pass)
        $this->assertEquals(true,$obj->DateFunction("20","02","1"));           //  tc3 month2day29-Is D1 true (Pass)
        $this->assertEquals(true,$obj->DateFunction("20","02","5"));           //  tc4 month2 - Have 28 day true (Pass)
        $this->assertEquals(false,$obj->DateFunction("20","02","-1"));         //  tc5 errorYear-Too much false (Pass)
        $this->assertEquals(false,$obj->DateFunction("20","02","2024"));       //  tc6 errorYear-Too little false (Pass)
        $this->assertEquals(false,$obj->DateFunction("20","00","2023"));       //  tc7 errorMonth-Too little false (Pass)
        $this->assertEquals(false,$obj->DateFunction("20","13","2023"));       //  tc8 errorMonth-Too much false (Pass)
        $this->assertEquals(true,$obj->DateFunction("20","12","2023"));        //  tc9 successMonth true (Pass)
        $this->assertEquals(true,$obj->DateFunction("20","01","4"));           //  tc10 checkMonth31day true (Pass) array[ 1,3,5,7,8,10,12 ]
        $this->assertEquals(true,$obj->DateFunction("20","04","4"));           //  tc11 checkMonth30day true (Pass) array[ 4,6,9,11 ]
        $this->assertEquals(true,$obj->DateFunction("20","02","4"));           //  tc12 checkMonth 28/29day true (Pass) 
        $this->assertEquals(false,$obj->DateFunction("00","01","4"));          //  tc13 checkDay-D31-Too little false (Pass)
        $this->assertEquals(false,$obj->DateFunction("32","01","4"));          //  tc14 checkDay-D31-Too much false (Pass)
        $this->assertEquals(true,$obj->DateFunction("25","01","4"));           //  tc15 successDay-D31 true (Pass) 
        $this->assertEquals(false,$obj->DateFunction("00","04","4"));          //  tc16 checkDay-D30-Too little false (Pass)
        $this->assertEquals(false,$obj->DateFunction("31","04","4"));          //  tc17 checkDay-D30-Too much false (Pass)
        $this->assertEquals(true,$obj->DateFunction("30","04","4"));           //  tc18 successDay-D30 true (Pass) 
        $this->assertEquals(false,$obj->DateFunction("00","02","4"));          //  tc19 checkDay-D29M2-Too little false (Pass)
        $this->assertEquals(false,$obj->DateFunction("30","02","4"));          //  tc20 checkDay-D29M2-Too much false (Pass)
        $this->assertEquals(true,$obj->DateFunction("29","02","4"));           //  tc21 successDay-D29M2 true (Pass)
        $this->assertEquals(true,$obj->DateFunction("29","02","1"));           //  tc22 successDay-D29M2 true (Pass) 
        $this->assertEquals(false,$obj->DateFunction("00","02","5"));          //  tc23 checkDay-D28M2-Too little false (Pass)
        $this->assertEquals(false,$obj->DateFunction("29","02","5"));          //  tc24 checkDay-D28M2-Too much false (Pass)
        $this->assertEquals(true,$obj->DateFunction("28","02","5"));           //  tc25 successDay-D28M2 true (Pass)
    }

}

?> 