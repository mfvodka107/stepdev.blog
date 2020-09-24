<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use App\Models\Post;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PostController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Post';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Post());

        $grid->column('id', __('Id'));
        $grid->column('cat_id', __('Cat id'));
        $grid->column('title', __('Title'));
        $grid->column('slug', __('Slug'));
        $grid->column('summary', __('Summary'));
        $grid->column('feature_image', __('Feature image'));
        $grid->column('content', __('Content'));
        $grid->column('images', __('Images'));
        $grid->column('navs', __('Navs'));
        $grid->column('status', __('Status'));
        $grid->column('seo_title', __('Seo title'));
        $grid->column('seo_desc', __('Seo desc'));
        $grid->column('seo_keys', __('Seo keys'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('author_id', __('Author id'));

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
        $show = new Show(Post::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('cat_id', __('Cat id'));
        $show->field('title', __('Title'));
        $show->field('slug', __('Slug'));
        $show->field('summary', __('Summary'));
        $show->field('feature_image', __('Feature image'));
        $show->field('content', __('Content'));
        $show->field('images', __('Images'));
        $show->field('navs', __('Navs'));
        $show->field('status', __('Status'));
        $show->field('seo_title', __('Seo title'));
        $show->field('seo_desc', __('Seo desc'));
        $show->field('seo_keys', __('Seo keys'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('author_id', __('Author id'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Post());

        $form->select('cat_id', 'Category')->options(Category::all()->pluck('name', 'id'));
        $form->text('title', __('Title'));
        $form->textarea('summary', __('Summary'));
        $form->cropper('feature_image', __('Feature image'));
        $form->simditor('content', __('Content'));
        $form->textarea('navs', __('Navs'));
        $form->switch('status', __('Status'));
        $form->text('seo_title', __('Seo title'));
        $form->textarea('seo_desc', __('Seo desc'));
        $form->textarea('seo_keys', __('Seo keys'));
        $form->hidden('author_id')->default(\Admin::user()->id);

        return $form;
    }
}
