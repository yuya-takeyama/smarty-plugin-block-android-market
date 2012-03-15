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
    public function appを指定するとアプリ詳細画面にリンクする()
    {
        $this->assertEquals(
            '<a href="http://play.google.com/store/apps/details?id=com.example">Example</a>',
            smarty_block_android_market(
                array('app' => 'com.example'),
                'Example',
                $this->smarty
            )
        );
    }

    /**
     * @test
     */
    public function developerを指定すると開発者詳細画面にリンクする()
    {
        $this->assertEquals(
            '<a href="http://play.google.com/store/apps/developer?id=foo-dev">Example</a>',
            smarty_block_android_market(
                array('developer' => 'foo-dev'),
                'Example',
                $this->smarty
            )
        );
    }

    /**
     * @test
     */
    public function searchを指定すると検索結果にリンクする()
    {
        $this->assertEquals(
            '<a href="http://play.google.com/store/search?q=some%20word">Example</a>',
            smarty_block_android_market(
                array('search' => 'some word'),
                'Example',
                $this->smarty
            )
        );
    }
}
