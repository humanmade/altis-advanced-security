<?php
/**
 * Tests for Altis Advanced Security module.
 *
 * phpcs:disable WordPress.Files, WordPress.NamingConventions, PSR1.Classes.ClassDeclaration.MissingNamespace, HM.Functions.NamespacedFunctions
 */

/**
 * Test documentation module renders correctly.
 */
class AdvancedSecurityCest {

	/**
	 * Advanced Security link is shown, and page renders correctly.
	 *
	 * @param AcceptanceTester $I Tester
	 */
	public function testAdvancedSecurityLink( AcceptanceTester $I ) {
		$I->wantToTest( 'Documentation > Advanced Security link is shown, and page renders correctly.' );

		$I->resizeWindow( 1920, 1080 );

		$I->loginAsAdmin();
		$I->amOnAdminPage( 'admin.php?page=altis-documentation' );

		// See the Documentation > Advanced Security link.
		$I->seeLink( 'Advanced Security' );

		$I->click( 'Advanced Security' );
		// See the page title
		$I->seeLink( 'Advanced Security powered by Patchstack', '#advanced-security-powered-by-patchstack' );

	}

}
