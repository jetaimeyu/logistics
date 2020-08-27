<?php

namespace App\Admin\Controllers;

use App\Models\LogisticsLine;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class LogisticsLineController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\LogisticsLine';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new LogisticsLine());

        $grid->column('id', __('Id'))->hide();
        $grid->column('user_id', __('User id'))->hide();
        $grid->column('start_province', __('Start province'));
        $grid->column('start_city', __('Start city'));
        $grid->column('start_district', __('Start district'));
        $grid->column('start_contact', __('Start contact'));
        $grid->column('start_phone', __('Start phone'));
        $grid->column('end_province', __('End province'));
        $grid->column('end_city', __('End city'));
        $grid->column('end_district', __('End district'));
        $grid->column('end_contact', __('End contact'));
        $grid->column('end_phone', __('End phone'));
        $grid->column('description', __('Description'));
        $grid->column('state', __('State'))->editable('select', [0 => '未审核', 1 => '已审核', 2=> '审核失败']);
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'))->hide();;
        $grid->column('deleted_at', __('Deleted at'))->hide();;

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(LogisticsLine::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('start_province', __('Start province'));
        $show->field('start_city', __('Start city'));
        $show->field('start_district', __('Start district'));
        $show->field('start_contact', __('Start contact'));
        $show->field('start_phone', __('Start phone'));
        $show->field('end_province', __('End province'));
        $show->field('end_city', __('End city'));
        $show->field('end_district', __('End district'));
        $show->field('end_contact', __('End contact'));
        $show->field('end_phone', __('End phone'));
        $show->field('description', __('Description'));
        $show->field('state', __('State'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('deleted_at', __('Deleted at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new LogisticsLine());

//        $form->number('user_id', __('User id'));
        $form->text('start_province', __('Start province'));
        $form->text('start_city', __('Start city'));
        $form->text('start_district', __('Start district'));
        $form->text('start_contact', __('Start contact'));
        $form->text('start_phone', __('Start phone'));
        $form->text('end_province', __('End province'));
        $form->text('end_city', __('End city'));
        $form->text('end_district', __('End district'));
        $form->text('end_contact', __('End contact'));
        $form->text('end_phone', __('End phone'));
        $form->text('description', __('Description'));
        $form->number('state', __('审核状态'));

        return $form;
    }
}
