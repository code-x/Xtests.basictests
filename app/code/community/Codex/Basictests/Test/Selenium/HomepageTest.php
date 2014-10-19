<?php

class Codex_Basictests_Test_Selenium_HomepageTest extends Codex_Xtest_Xtest_Selenium_TestCase {

    public function testSceenshot()
    {
        /** @var Codex_Xtest_Xtest_Pageobject_Frontend_Homepage $homepage */
        $homepage = $this->getPageObject('xtest/pageobject_frontend_homepage');

        $homepage->open();
        $homepage->takeResponsiveScreenshots('homepage');
    }

    /**
     * Prüfe ob Impressum, AGB und Kontakt hinterlegt sind
     */
    public function testLawLinks()
    {
        /** @var Codex_Xtest_Xtest_Pageobject_Frontend_Homepage $homepage */
        $homepage = $this->getPageObject('xtest/pageobject_frontend_homepage');
        $homepage->open();

        $text = $homepage->byTag('body')->text();

        $this->assertContains( Mage::helper('core')->__('Imprint'), $text );
        $this->assertContains( Mage::helper('core')->__('AGB'), $text );
        $this->assertContains( Mage::helper('core')->__('Kontakt'), $text );
    }

    /**
     * Von Startseite zu AGB und Screenshot
     */
    public function textAgbPage()
    {
        /** @var Codex_Xtest_Xtest_Pageobject_Frontend_Homepage $homepage */
        $homepage = $this->getPageObject('xtest/pageobject_frontend_homepage');
        $homepage->open();

        $homepage->byLinkText(  Mage::helper('core')->__('AGB') )->click();
        $homepage->takeResponsiveScreenshots('agb');
    }

    /**
     * Von Startseite zu Impressum und Screenshot
     */
    public function textImprintPage()
    {
        /** @var Codex_Xtest_Xtest_Pageobject_Frontend_Homepage $homepage */
        $homepage = $this->getPageObject('xtest/pageobject_frontend_homepage');
        $homepage->open();

        $homepage->byLinkText(  Mage::helper('core')->__('Imprint') )->click();
        $homepage->takeResponsiveScreenshots('imprint');
    }

}