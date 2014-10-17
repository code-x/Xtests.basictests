<?php

class Codex_Basictests_Test_Selenium_AccountTest extends Codex_Xtest_Xtest_Selenium_TestCase
{

    /** @var Codex_Xtest_Xtest_Fixture_Customer */
    protected static $_customerFixture;

    /** @var Mage_Customer_Model_Customer */
    protected static $_customer;

    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();

        self::$_customerFixture = Xtest::getXtest('xtest/fixture_customer');
        self::$_customer = self::$_customerFixture->getTest();
    }

    public function testLogin()
    {
        /** @var Codex_Xtest_Xtest_Pageobject_Frontend_Customer $customerPageObject */
        $customerPageObject = $this->getPageObject('xtest/pageobject_frontend_customer');
        $customerPageObject->open();
        $customerPageObject->takeResponsiveScreenshots('account login');

        $customerPageObject->login( self::$_customerFixture->getEmail(), self::$_customerFixture->getPassword() );
        $customerPageObject->takeResponsiveScreenshots('dashboard');


    }


}