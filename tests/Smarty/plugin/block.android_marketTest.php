<?php
class Smarty_Plugin_Block_AndroidMarketTest extends PHPUnit_Framework_TestCase
{
    protected $smarty;

    public function setUp()
    {
        $this->smarty = new stdClass;
    }

    /**
     * @test
     */
    public function idを指定するとdetailsにリンクする()
    {
        $this->assertEquals(
            '<a href="http://play.google.com/store/apps/details?id=com.example">Example</a>',
            smarty_block_android_market(
                array('appid' => 'com.example'),
                'Example',
                $this->smarty
            )
        );
    }
}
