<?php


namespace app\admin\model;


use think\Model;

class UserSignUp extends Model
{
    /**
     * 获取报名列表
     * @param $aid
     * @param $param
     * @return array
     */
    public function getUserSignUpSelect($aid,$param)
    {
        $rows = empty($param['limit']) ? get_config('app.page_size') : $param['limit'];
        $result = $this->alias('usu')
            ->where('aid','=',$aid)
            ->field('usu.uid,usu.aid,usu.sign_in,usu.sign_out,a.title,u.username,u.nickname,u.mobile,u.headimgurl')
            ->join('Activity a','a.id = usu.aid')
            ->join('User u','u.id = usu.uid')
            ->order('usu.create_time desc')
            ->paginate($rows, false, ['query' => $param]);

        return empty($result)?[]:$result;
    }
}