<?php

class Codex_Basictests_Test_Selenium_SearchTest extends Codex_Xtest_Xtest_Selenium_TestCase {

    /**
     * Extrahiere anhand eines Produktes einen Namen und suche diesen
     */
    public function testFindSomething()
    {
        /** @var Codex_Xtest_Xtest_Pageobject_Abstract $page */
        $page = $this->getPageObject('xtest/pageobject_abstract');

        $product = Mage::getModel('catalog/product');
        $col = $product->getCollection();

        $col->addStoreFilter( Mage::app()->getStore()->getId() );
        $col->setVisibility( Mage::getSingleton('catalog/product_visibility')->getVisibleInCatalogIds() );

        foreach( $col AS $product )
        {
            $product->load( $product->getId() );
            if( $product->getId() && strtolower($product->getName()) != strtolower($product->getSku()) )
            {
                $page->url( Mage::getUrl('catalogsearch/result') . '?q='.$product->getName() );
                $page->takeResponsiveScreenshots();

                $text = $page->byTag('body')->text();
                $this->assertNotContains( 'Ihre Suchanfrage lieferte keine Ergebnisse' ,$text);
                return;

            }
        }

        $this->markTestIncomplete('no products found');
    }

    /**
     * Nach unique-id suchen, sollte kein Ergebnis liefern
     */
    public function testFindNothing()
    {
        /** @var Codex_Xtest_Xtest_Pageobject_Abstract $page */
        $page = $this->getPageObject('xtest/pageobject_abstract');

        $page->url( Mage::getUrl('catalogsearch/result') . '?q='.uniqid() );
        $page->takeResponsiveScreenshots();

        $text = $page->byTag('body')->text();
        $this->assertContains( 'Ihre Suchanfrage lieferte keine Ergebnisse' ,$text);

    }


}