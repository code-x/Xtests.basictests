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
        $this->markTestIncomplete();

        /** @var Codex_Xtest_Xtest_Pageobject_Frontend_Customer $customerPageObject */
        $customerPageObject = $this->getPageObject('xtest/pageobject_frontend_customer');
        $customerPageObject->open();
        $customerPageObject->takeResponsiveScreenshots('account login');

        $customerPageObject->login( self::$_customerFixture->getEmail(), self::$_customerFixture->getPassword() );
    }

    public function _testDashboard()
    {
        /** @var Codex_Xtest_Xtest_Pageobject_Frontend_Customer $customerPageObject */
        $customerPageObject = $this->getPageObject('xtest/pageobject_frontend_customer');

        $this->markTestIncomplete();
    }

    public function _testAccountEdit()
    {
        /** @var Codex_Xtest_Xtest_Pageobject_Frontend_Customer $customerPageObject */
        $customerPageObject = $this->getPageObject('xtest/pageobject_frontend_customer');

        /**
        @javascript
        Scenario: Welcome Screen
        Given I am logged in as customer "behat@code-x.de"

        Given I go to "customer/account"
        And I take a screenshot

        And I should not see text "Zahlungsfreigaben"
        And I take a screenshot
         */

        $this->markTestIncomplete();
    }

    public function _testAddressbook()
    {
        /** @var Codex_Xtest_Xtest_Pageobject_Frontend_Customer $customerPageObject */
        $customerPageObject = $this->getPageObject('xtest/pageobject_frontend_customer');

        /**
        Given I am logged in as customer "behat@code-x.de"
        And I go to "customer/account"

        When I follow "Adressbuch"
        Then I should see text "Standardadressen"
        And I take a screenshot

        When I follow "Rechnungsadresse ändern"
        Then I should see text "Adresse bearbeiten"
        And I take a screenshot

        When I click on element ".back-link a"
        Then I should see text "Adressbuch"

        When I follow "Rechnungsadresse ändern"
        Then I should see text "Adresse bearbeiten"

        When I click on element "#form-validate button"
        Then I should see text "Die Adresse wurde gespeichert"
         */
        $this->markTestIncomplete();
    }

    public function _testOrderHistory()
    {
        /** @var Codex_Xtest_Xtest_Pageobject_Frontend_Customer $customerPageObject */
        $customerPageObject = $this->getPageObject('xtest/pageobject_frontend_customer');

        /**
        Given I am logged in as customer "behat@code-x.de"
        And I go to "customer/account"

        When I follow "Meine Bestellungen"
        Then I should see text "Meine Bestellungen"
        And I take a screenshot
         */
        $this->markTestIncomplete();
    }

    public function _testLogout()
    {
        /** @var Codex_Xtest_Xtest_Pageobject_Frontend_Customer $customerPageObject */
        $customerPageObject = $this->getPageObject('xtest/pageobject_frontend_customer');

        /*
         Given I am logged in as customer "behat@code-x.de"
        And I go to "customer/account"

        When I follow "Abmelden"
        Then I should see text "abgemeldet"
        And I take a screenshot
         */
        $this->markTestIncomplete();
    }

}