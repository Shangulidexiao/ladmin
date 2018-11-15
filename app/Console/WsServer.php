<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;
use swoole_websocket_server;

class WsServer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ws:server';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '启动客服服务器';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $server = new swoole_websocket_server("0.0.0.0", 9000);

        $server->on('open', function (swoole_websocket_server $server, $request) {
            echo "server: handshake success with fd{$request->fd}\n";
        });
        $server->on('message', function (swoole_websocket_server $server, $frame) {
            $msg = json_decode($frame->data,true);
            var_dump($frame->data);
            $sendUser = Redis::get($msg['to']);
            Redis::get($msg['uid']) || Redis::set($msg['uid'],$frame->fd);
            
            if($sendUser){
                $server->push($sendUser, $msg['msg']);
                $server->push($frame->fd, '发送成功');
            }else{
                $server->push($frame->fd, '发送失败');
            }
        });

        $server->on('close', function ($ser, $fd) {
            echo "client {$fd} closed\n";
        });

        $server->start();
    }
}
