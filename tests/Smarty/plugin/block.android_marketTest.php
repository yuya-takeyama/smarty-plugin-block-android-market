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
    public function it_should_be_content_only_if_no_paramete_is_specified()
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
    public function it_should_be_link_to_app_detail_page_with_app_parameter()
    {
        $this->assertEquals(
            '<a href="https://play.google.com/store/apps/details?id=com.example">Example</a>',
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
    public function it_should_be_link_to_developer_page_with_developer_parameter()
    {
        $this->assertEquals(
            '<a href="https://play.google.com/store/apps/developer?id=foo-dev">Example</a>',
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
    public function it_should_be_search_result_with_search_parameter()
    {
        $this->assertEquals(
            '<a href="https://play.google.com/store/search?q=some%20word">Example</a>',
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
            '<a href="https://play.google.com/store/apps/details?id=com.example" id="foo" data-text="&amp;">Example</a>',
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
            '<a href="https://play.google.com/store/apps/details?id=com.example" data-text="Foo &amp; Bar">Example</a>',
            smarty_block_android_market(
                array('app' => 'com.example', 'data_text' => 'Foo & Bar'),
                'Example',
                $this->smarty
            )
        );
    }
}
