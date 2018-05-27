<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Http\Models\UserLabel;
use App\Http\Models\User;

class UserLabelTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testUserLabelClean()
    {
        $ids = User::query()->pluck('id');
        dump($ids);
        UserLabel::query()->whereNotIn('user_id', $ids)->delete();

        $xiangtong = UserLabel::query()->

        var_dump($xiangtong);
        $this->assertTrue(true);

    }
}
