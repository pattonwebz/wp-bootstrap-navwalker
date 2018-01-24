<?php
/**
 * Class SampleTest
 *
 * @package Wp_Bootstrap_Navwalker
 */

/**
 * Test_WP_Bootstrap_NavWalker class.
 *
 * @extends WP_UnitTestCase
 */
class Test_WP_Bootstrap_NavWalker extends WP_UnitTestCase {

	/**
	 * The setUp function.
	 *
	 * @access public
	 * @return void
	 */
	function setUp() {

		parent::setUp();

		$this->walker = new WP_Bootstrap_Navwalker();

	}

	/**
	 * Test NavWalker File Exists.
	 *
	 * @access public
	 * @return void
	 */
	function test_navwalker_file_exists() {
		$this->assertFileExists( 'class-wp-bootstrap-navwalker.php' );
	}

	/**
	 * Test Start LVL Function.
	 *
	 * @access public
	 * @return void
	 */
	function test_startlvl_function_exists() {

		$wp_bootstrap_navwalker = $this->walker;

		$this->assertTrue(
			method_exists( $wp_bootstrap_navwalker, 'start_lvl' ),
			'Class does not have method start_lvl.'
		);

	}

	/**
	 * Test Start El Function.
	 *
	 * @access public
	 * @return void
	 */
	function test_start_el_function_exists() {

		$wp_bootstrap_navwalker = $this->walker;

		$this->assertTrue(
			method_exists( $wp_bootstrap_navwalker, 'start_el' ),
			'Class does not have method start_el.'
		);

	}

	/**
	 * Test for Display Element.
	 *
	 * @access public
	 * @return void
	 */
	function test_display_element_function_exists() {

		$wp_bootstrap_navwalker = $this->walker;

		$this->assertTrue(
			method_exists( $wp_bootstrap_navwalker, 'display_element' ),
			'Class does not have method display_element.'
		);

	}

	/**
	 * Test Fallback Function exists.
	 *
	 * @access public
	 * @return void
	 */
	function test_fallback_function_exists() {

		$wp_bootstrap_navwalker = $this->walker;

		$this->assertTrue(
			method_exists( $wp_bootstrap_navwalker, 'fallback' ),
			'Class does not have method fallback.'
		);

	}

	function test_fallback_function_outputs() {

		// sample args.
		$args = array(
			'container'       => 'div',
			'container_id'    => 'a_container_id',
			'container_class' => 'a_container_class',
			'menu_class'      => 'a_menu_class',
			'menu_id'         => 'a_menu_id',
		);

		// default is to echo reults, buffer.
		ob_start();
		WP_Bootstrap_Navwalker::fallback( $args );
		$fallback_output_echo = ob_get_clean();
		$this->assertNotEmpty( $fallback_output_echo );

		// set 'echo' to false and request the markup returned.
		$args['echo'] = false;
		$fallback_output_return = WP_Bootstrap_Navwalker::fallback( $args );
		$this->assertNotEmpty( $fallback_output_return );
		// return and echo should result in the same values.
		$this->assertEquals( $fallback_output_echo, $fallback_output_return );
	}
}
