<?php

namespace Tests\Unit;

use Tests\TestCase;
use FunctionalTester as Tester;

class Login2Test extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        /*$tester = new Tester();
        $this->assertTrue(true);
        $tester->visit('/login');*/
        $request = $this->post('/login');
        /*$request->fillField('email','raleigh90@example.org');
        $request->fillField('password','secret321');*/

        //$request->send(['email' => 'celestine42@example.com','password' => 'secret321']);
        //$response->assertStatus(200);
        /*$this->visit('/login')*/
        //->dontSee('/home');
            /*->amOnPage('/login')
            ->submitForm('form#login_form',
                ['email' => 'celestine42@example.com','password' => 'secret321'])
            ->seeInCurrentUrl('/home');*/

        /*$I->click('Pages');
        $I->click('New');
        $I->see('New Page');
        $I->;
        $I->see('page created'); // notice generated
        $I->see('Movie Review','h1'); // head of page of is our title
        $I->seeInCurrentUrl('pages/movie-review'); // slug is generated
        $I->seeInDatabase('pages', ['title' => 'Movie Review']);
         // data is stored in database */
    }
}
