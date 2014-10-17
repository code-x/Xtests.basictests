<?php

class Codex_Basictests_Test_Selenium_NotFoundTest extends Codex_Xtest_Xtest_Selenium_TestCase {

    /**
     * Screenshot von 404 Seite inkl. Prüfung auf nicht Whoops
     */
    public function testNotFound()
    {
        /** @var Codex_Xtest_Xtest_Pageobject_Abstract $page */
        $page = $this->getPageObject('xtest/pageobject_abstract');

        $page->url( Mage::getUrl().DS.'seite-nicht-gefunden-'.uniqid() );
        $page->takeResponsiveScreenshots('404');

        $this->assertNotContains( 'Whoops', $page->byTag('body')->text(), 'Whoops message sucks' );
    }

}