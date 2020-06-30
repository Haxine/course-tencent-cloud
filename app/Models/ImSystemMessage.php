<?php

namespace App\Models;

use Phalcon\Mvc\Model\Behavior\SoftDelete;

class ImSystemMessage extends Model
{

    /**
     * 请求状态
     */
    const REQUEST_PENDING = 'pending'; // 待处理
    const REQUEST_ACCEPTED = 'accepted'; // 已接受
    const REQUEST_REFUSED = 'refused'; // 已拒绝

    /**
     * 消息类型
     */
    const TYPE_FRIEND_REQUEST = 1; // 好友请求
    const TYPE_FRIEND_ACCEPTED = 2; // 好友被接受
    const TYPE_FRIEND_REFUSED = 3; // 好友被拒绝
    const TYPE_GROUP_REQUEST = 4; // 入群请求
    const TYPE_GROUP_ACCEPTED = 5; // 入群被接受
    const TYPE_GROUP_REFUSED = 6; // 入群被拒绝

    /**
     * 主键编号
     *
     * @var integer
     */
    public $id;

    /**
     * 发送方编号
     *
     * @var integer
     */
    public $sender_id;

    /**
     * 接收方编号
     *
     * @var integer
     */
    public $receiver_id;

    /**
     * 条目类型
     *
     * @var string
     */
    public $item_type;

    /**
     * 条目内容
     *
     * @var string
     */
    public $item_info;

    /**
     * 优先级
     *
     * @var integer
     */
    public $priority;

    /**
     * 阅读标识
     *
     * @var integer
     */
    public $viewed;

    /**
     * 删除标识
     *
     * @var integer
     */
    public $deleted;

    /**
     * 创建时间
     *
     * @var integer
     */
    public $create_time;

    /**
     * 更新时间
     *
     * @var integer
     */
    public $update_time;

    public function getSource()
    {
        return 'kg_im_system_message';
    }

    public function initialize()
    {
        parent::initialize();

        $this->addBehavior(
            new SoftDelete([
                'field' => 'deleted',
                'value' => 1,
            ])
        );
    }

    public function beforeCreate()
    {
        $this->create_time = time();

        if (!empty($this->item_info)) {
            $this->item_info = kg_json_encode($this->item_info);
        } else {
            $this->item_info = '';
        }
    }

    public function beforeUpdate()
    {
        $this->update_time = time();

        if (is_array($this->item_info) && !empty($this->item_info)) {
            $this->item_info = kg_json_encode($this->item_info);
        }
    }

    public function afterFetch()
    {
        if (!empty($this->item_info)) {
            $this->item_info = json_decode($this->item_info, true);
        }
    }

}