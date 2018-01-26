<?php

namespace app\push\controller;

use think\worker\Server;
use Workerman\Lib\Timer;

class Worker extends Server
{
    protected $socket = 'websocket://192.168.0.74:2346';

    protected $repeat_time = 25;

    protected $global_uid = 0;

    /**
     * 收到信息
     * @param $connection
     * @param $data
     */
    public function onMessage($connection, $data)
    {

        $connection->send($connection->uid);
        var_dump($connection->uid);
        $connection->lastMessageTime = time();
    }

    /**
     * 当连接建立时触发的回调函数
     * @param $connection
     */
    public function onConnect($connection)
    {
        $connection->onWebSocketConnect = function($connection , $http_header)
        {
//            var_dump($http_header);
//
            // 为这个连接分配一个uid
//            $connection->uid = ++$this->global_uid;
//            $connection->uid = rand('5','100');
            echo "aa";
            // 可以在这里判断连接来源是否合法，不合法就关掉连接
            // $_SERVER['HTTP_ORIGIN']标识来自哪个站点的页面发起的websocket连接
//            if($_SERVER['HTTP_ORIGIN'] != 'http://chat.workerman.net')
//            {
//                $connection->close();
//            }
            // onWebSocketConnect 里面$_GET $_SERVER是可用的
            // var_dump($_GET, $_SERVER);
        };
    }

    /**
     * 当连接断开时触发的回调函数
     * @param $connection
     */
    public function onClose($connection)
    {
        echo "connection Closed ,connectuid is".$connection->uid;
    }

    /**
     * 当客户端的连接上发生错误时触发
     * @param $connection
     * @param $code
     * @param $msg
     */
    public function onError($connection, $code, $msg)
    {

        echo "error $code $msg\n";
    }

    /**
     * 每个进程启动
     * @param $worker
     */
    public function onWorkerStart($worker)
    {
        // 定时，每10秒一次
//        Timer::add(10, function()use($worker)
//        {
//            // 遍历当前进程所有的客户端连接，发送当前服务器的时间
//            foreach($worker->connections as $connection)
//            {
//                $connection->send(time());
//            }
//        });
//        Timer::add(1, function()use($worker){
//            $time_now = time();
//            foreach($worker->connections as $connection) {
//                // 有可能该connection还没收到过消息，则lastMessageTime设置为当前时间
//                if (empty($connection->lastMessageTime)) {
//                    $connection->lastMessageTime = $time_now;
//                    continue;
//                }
//                // 上次通讯时间间隔大于心跳间隔，则认为客户端已经下线，关闭连接
//                if ($time_now - $connection->lastMessageTime > $this->repeat_time) {
//                    $connection->close();
//                }
//            }
//        });
    }

}
