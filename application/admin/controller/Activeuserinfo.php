<?php

namespace app\admin\controller;

use app\common\controller\Backend;
use think\Db;
use fast\score;
/**
 * 学生基本信息管理
 *
 * @icon fa fa-circle-o
 */
class Activeuserinfo extends Backend
{
    
    /**
     * Activeuserinfo模型对象
     * @var \app\admin\model\Activeuserinfo
     */
    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = new \app\admin\model\Activeuserinfo;

    }
    public function index()
    {

        //设置过滤方法
        $this->request->filter(['strip_tags']);

        if ($this->request->isAjax()) {
            //如果发送的来源是Selectpage，则转发到Selectpage
            if ($this->request->request('keyField')) {
                return $this->selectpage();
            }

            list($where, $sort, $order, $offset, $limit,$search) = $this->buildparams();
            $total = $this->model
                ->where($where)
                ->order($sort, $order)
                ->count();


            $list = $this->model
                ->where($where)
                ->order($sort, $order)
                ->limit($offset, $limit)
                ->select();

            $list = collection($list)->toArray();
            for($i=0;$i<count($list);$i++)
                $list[$i]['score']=(string)$this->getscore($list[$i]['schoolnum']);
            $result = array("total" => $total, "rows" => $list);
            if(strlen($search)!=0){
                $mylist=[];
                $search = explode(",", $search);
                for($i=0;$i<count($list);$i++){
                    if((double)$list[$i]['score']>=(double)$search[0]&&(double)$list[$i]['score']<=(double)$search[1]){
                        array_push($mylist,$list[$i]);
                    }
                }
                $result = array("total" =>$total, "rows" => $mylist);
            }
            return json($result);
        }
      return $this->view->fetch();
    }
    public function import(){
        return parent::import();
    }
    public  function getscore($username)
    {

        //获取报名成功的列数
        $up = Db::table('activejoin')->where('schoolnum',$username)->where("switch", 1)->column("typeid");

        $data = Db::table('activescore')
            ->where('schoolnum',$username)
            ->order('actives asc')
            ->select();
        //学生默认得分

        if(count($data)!=0) {
            $defaultscore = $data[0]['score'];

            //获取学生的总得分

            $sum = 0;

            $arr = array();

            for ($i = 1; $i < count($data); $i++) {
                $personalscore = new score();
                $activeitem = Db::table('activeinfo')->where('id', $data[$i]["actives"])->find();
                $personalscore->score = $data[$i]["score"];
                $sum += $personalscore->score;
                $arr[] = $personalscore;

            }
        }
        else
        {
            $defaultscore=0;
            $sum=0;
        }
        return $defaultscore+$sum;
    }




    
    /**
     * 默认生成的控制器所继承的父类中有index/add/edit/del/multi五个基础方法、destroy/restore/recyclebin三个回收站方法
     * 因此在当前控制器中可不用编写增删改查的代码,除非需要自己控制这部分逻辑
     * 需要将application/admin/library/traits/Backend.php中对应的方法复制到当前控制器,然后进行修改
     */
    

}
