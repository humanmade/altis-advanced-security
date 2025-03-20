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
		$I->wantToTest( 'Settings > Security link is shown, and page renders correctly.' );

		$I->resizeWindow( 1200, 800 );

		$I->loginAsAdmin();
		$I->amOnAdminPage( '/' );

		// See the Settings > Security link in menu.

		$I->seeLink( 'Settings' );
		$I->click( 'Settings' );

		$I->seeLink( 'Security', '/wp-admin/options-general.php?page=patchstack' );

		// Click the link to open the Patchstack page.
		$I->click( 'Security' );

		// See the Patchstack header.
		$I->seeElement( '.patchstack-top-logo' );
	}

}
