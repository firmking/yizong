<?php

declare (strict_types = 1);
namespace app\admin\controller;


use app\admin\BaseController;
use app\admin\model\Activity as ActivityModel;
use app\admin\model\UserSignUp;
use app\admin\validate\ActivityValidate;
use app\admin\validate\ArticleValidate;
use think\exception\ValidateException;
use think\facade\Db;
use think\facade\View;

class Activity extends BaseController
{
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->model = new ActivityModel();
        $this->uid = get_login_admin('id');
    }

    /**
     * 数据列表
     */
    public function datalist()
    {
        if (request()->isAjax()) {
            $param = get_params();
            $where = [];
            if (!empty($param['keywords'])) {
                $where[] = ['a.id|a.title|a.keywords|a.desc|a.content|c.title', 'like', '%' . $param['keywords'] . '%'];
            }
            if (!empty($param['cate_id'])) {
                $where[] = ['a.cate_id', '=', $param['cate_id']];
            }
            $where[] = ['a.delete_time', '=', 0];

            $ArticleModel = new ActivityModel();
            $list = $ArticleModel->getArticleList($where, $param);
            return table_assign(0, '', $list);
        }
        else{
            return view();
        }
    }

    /**
     * 报名列表
     * @return \json|\think\response\View
     */
    public function sign_up(){
        if (request()->isAjax()) {
            $param = get_params();
            if(empty($param['aid'])){
                return to_assign(1,'缺少必要参数');
            }
            try {
                $userSignUp = new UserSignUp();
                $result = $userSignUp->getUserSignUpSelect($param['aid'],$param);
            } catch (\Exception $e){
                // 验证失败 输出错误信息
                return to_assign(0, $e->getMessage());
            }
            if($result){
                return to_assign(1,'获取成功',$result);
            }else{
                return to_assign(0,'获取失败');
            }
        }else{
            $param = get_params();
            View::assign('aid',$param['id']);
            return view();
        }

    }


    /**
     * 添加
     */
    public function add()
    {
        if (request()->isAjax()) {
            $param = get_params();
            if (isset($param['table-align'])) {
                unset($param['table-align']);
            }
            if (isset($param['content'])) {
                $param['md_content'] = '';
            }
            if (isset($param['docContent-html-code'])) {
                $param['content'] = $param['docContent-html-code'];
                $param['md_content'] = $param['docContent-markdown-doc'];
                unset($param['docContent-html-code']);
                unset($param['docContent-markdown-doc']);
            }
            $param['admin_id'] = $this->uid;
            // 检验完整性
            try {
                validate(ActivityValidate::class)->check($param);
            } catch (ValidateException $e) {
                // 验证失败 输出错误信息
                return to_assign(1, $e->getError());
            }

            $ArticleModel = new ActivityModel();
            $ArticleModel->addArticle($param);
        }else{
            View::assign('editor', get_system_config('other','editor'));
            return view();
        }
    }


    /**
     * 编辑
     */
    public function edit()
    {
        $param = get_params();
        $ArticleModel = new ActivityModel();

        if (request()->isAjax()) {
            if (isset($param['table-align'])) {
                unset($param['table-align']);
            }
            if (isset($param['content'])) {
                $param['md_content'] = '';
            }
            if (isset($param['docContent-html-code'])) {
                $param['content'] = $param['docContent-html-code'];
                $param['md_content'] = $param['docContent-markdown-doc'];
                unset($param['docContent-html-code']);
                unset($param['docContent-markdown-doc']);
            }
            // 检验完整性
            try {
                validate(ArticleValidate::class)->check($param);
            } catch (ValidateException $e) {
                // 验证失败 输出错误信息
                return to_assign(1, $e->getError());
            }
            $ArticleModel->editArticle($param);
        }else{
            $id = isset($param['id']) ? $param['id'] : 0;
            $detail = $ArticleModel->getArticleById($id);
            View::assign('editor', get_system_config('other','editor'));
            if (!empty($detail)) {
                if(!empty($article['md_content'])){
                    View::assign('editor',1);
                }
                $keyword_array = Db::name('ArticleKeywords')
                    ->field('i.aid,i.keywords_id,k.title')
                    ->alias('i')
                    ->join('keywords k', 'k.id = i.keywords_id', 'LEFT')
                    ->order('i.create_time asc')
                    ->where(array('i.aid' => $id, 'k.status' => 1))
                    ->select()->toArray();
                $detail['keyword_ids'] = implode(",", array_column($keyword_array, 'keywords_id'));
                $detail['keyword_names'] = implode(',', array_column($keyword_array, 'title'));
                $detail['keyword_array'] = $keyword_array;
                View::assign('detail', $detail);
                return view();
            }
            else{
                throw new \think\exception\HttpException(404, '找不到页面');
            }
        }
    }


    /**
     * 查看信息
     */
    public function read()
    {
        $param = get_params();
        $id = isset($param['id']) ? $param['id'] : 0;
        $ArticleModel = new ActivityModel();
        $detail = $ArticleModel->getArticleById($id);
        if (!empty($detail)) {
            $keyword_array = Db::name('ArticleKeywords')
                ->field('i.aid,i.keywords_id,k.title')
                ->alias('i')
                ->join('keywords k', 'k.id = i.keywords_id', 'LEFT')
                ->order('i.create_time asc')
                ->where(array('i.aid' => $id, 'k.status' => 1))
                ->select()->toArray();
            $detail['keyword_ids'] = implode(",", array_column($keyword_array, 'keywords_id'));
            $detail['keyword_names'] = implode(',', array_column($keyword_array, 'title'));
            $detail['keyword_array'] = $keyword_array;

            View::assign('detail', $detail);
            return view();
        }
        else{
            throw new \think\exception\HttpException(404, '找不到页面');
        }
    }

    /**
     * 删除
     */
    public function del()
    {
        $param = get_params();
        $param = get_params();
        $id = isset($param['id']) ? $param['id'] : 0;
        $type = isset($param['type']) ? $param['type'] : 0;

        $ArticleModel = new ActivityModel();
        $ArticleModel->delArticleById($id,$type);
    }
}