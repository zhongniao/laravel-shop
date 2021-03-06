<?php

namespace App\Admin\Controllers;

use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Grid;

class UserController extends AdminController
{
    protected $title = 'User';

    protected function grid()
    {
        $grid = new Grid(new User);

        $grid->column('id', 'ID');
        $grid->column('name', '用户名');
        $grid->column('email', '邮箱');
        $grid->email_verified_at('已验证邮箱')->display(function ($value) {
            return $value ? '是' : '否';
        });
        $grid->created_at('注册时间');
        $grid->disableCreateButton();
        $grid->disableActions();
        $grid->tools(function ($tools) {
            $tools->batch(function ($batch) {
                $batch->disableDelete();
            });
        });

        return $grid;
    }
}
