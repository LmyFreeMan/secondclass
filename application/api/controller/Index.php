<?php

namespace app\api\controller;
use fast\score;
use app\common\controller\Api;
use think\Db;

/**
 * 首页接口
 */
class Index extends Api
{

    protected $noNeedLogin = ['*'];
    protected $noNeedRight = ['*'];

    /**
     * 首页
     * 
     */
    public function index()
    {
        $this->success('请求成功');
    }
    public  function getscore()
    {


        //获取报名成功的列数
        $up = Db::table('activejoin')->where('schoolnum', $_POST["username"])->where("switch", 1)->column("typeid");

        $data = Db::table('activescore')
            ->where('schoolnum', $_POST["username"])
            ->order('actives asc')
            ->select();
        //学生默认得分

        $defaultscore = $data[0]['score'];

        //获取学生的总得分

        $sum = 0;

        $arr = array();

        for ($i = 1; $i < count($data); $i++) {
            $personalscore = new score();
            $activeitem = Db::table('activeinfo')->where('id', $data[$i]["actives"])->find();
            $personalscore->score = $activeitem["value"];
            $sum += $personalscore->score;
            $arr[] = $personalscore;

        }
        return $defaultscore+$sum;
    }

}
