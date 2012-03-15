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
    public function 必要なパラメータが無ければリンク無しで文字列をそのまま返す()
    {
        $this->assertEquals(
            'Example',
            smarty_block_android_market(
                array(),
                'Example',
                $this->smarty
            )
        );
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

    /**
     * @test
     */
    public function app_developer_search以外のパラメータはHTMLの属性になる()
    {
        $this->assertEquals(
            '<a href="http://play.google.com/store/apps/details?id=com.example" id="foo" data-text="&amp;">Example</a>',
            smarty_block_android_market(
                array('app' => 'com.example', 'id' => 'foo', 'data-text' => '&'),
                'Example',
                $this->smarty
            )
        );
    }

    /**
     * @test
     */
    public function data_attribute_should_be_replaced_underscore_with_hyphen()
    {
        $this->assertEquals(
            '<a href="http://play.google.com/store/apps/details?id=com.example" data-text="Foo &amp; Bar">Example</a>',
            smarty_block_android_market(
                array('app' => 'com.example', 'data_text' => 'Foo & Bar'),
                'Example',
                $this->smarty
            )
        );
    }
}
